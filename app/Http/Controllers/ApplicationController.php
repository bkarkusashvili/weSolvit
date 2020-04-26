<?php

namespace App\Http\Controllers;

use App\Application;
use App\Category;
use App\Notifications\ApplicationCreate;
use App\Notifications\AssignNotification;
use App\User;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('viewAny', Application::class);
        
        $status = $request->get('status', 0);
        $partner = $request->get('partner', 0);
        $priority = $request->get('priority', 0);
        $category = $request->get('category', 0);
        $nonAdmin = !$request->user()->isAdmin();
        $userId = $request->user()->id;

        $list = Application::latest()->
        when($status, function ($query, $status) {
            return $query->where('status', $status);
        })->when($partner, function ($query, $partner) {
            return $query->where('user_id', $partner);
        })->when($priority, function ($query, $priority) {
            return $query->where('priority', $priority);
        })->when($category, function ($query, $category) {
            return $query->where('category_id', $category);
        })->when($nonAdmin, function ($query, $userId) {
            return $query->where('user_id', $userId);
        })->paginate(10);
        
        $companies = User::where([['role', '=', 'company'], ['status', '=', '1']])->get();
        $freelances = User::where([['role', '=', 'freelance'], ['status', '=', '1']])->get();
        $categories = Category::all();

        if ($status || $partner || $priority || $category) {
            $list->appends([
                'status' => $status,
                'partner' => $partner,
                'priority' => $priority,
                'category' => $category,
            ]);
        }

        return view('application.index', compact('list', 'companies', 'freelances', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $this->validateRequest($request);
        
        $application = Application::create($data);
        $application->notify(new ApplicationCreate());

        return redirect()->back()->with('status', 'success');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Application  $application
     * @return \Illuminate\Http\Response
     */
    public function edit(Application $application)
    {
        $users = User::all();

        return view('application.form', [
            'item' => $application,
            'users' => $users
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Application  $application
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Application $application)
    {
        $this->authorize('update', $application);

        $data = $this->validateRequest($request);

        $application->update($data);

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Application  $application
     * @return \Illuminate\Http\Response
     */
    public function destroy(Application $application)
    {
        $this->authorize('delete', $application);

        $application->delete();

        return redirect()->back();
    }

    public function setStatus(Request $request, Application $application)
    {
        $this->authorize('setStatus', $application);

        $data = $request->validate(['status' => 'required|integer|min:1|max:4']);

        $application->update($data); 

        return response()->json([
            'status' => 'success',
            'message' => 'მონაცემები განახლდა'
        ]);
    }

    public function setPriority(Request $request, Application $application)
    {
        $this->authorize('update', $application);

        $data = $request->validate(['priority' => 'required|integer|min:1|max:3']);

        $application->update($data);

        return response()->json([
            'status' => 'success',
            'message' => 'მონაცემები განახლდა'
        ]);
    }

    public function setCategory(Request $request, Application $application)
    {
        $this->authorize('update', $application);

        $data = $request->validate(['category_id' => 'required|exists:categories,id']);

        $application->update($data); 

        return response()->json([
            'status' => 'success',
            'message' => 'მონაცემები განახლდა'
        ]);
    }

    public function setPartner(Request $request, Application $application)
    {
        $this->authorize('update', $application);

        $data = $request->validate(['user_id' => 'required|exists:users,id']);

        User::find($request->get('user_id'))->notify(new AssignNotification());

        $application->update($data);

        return response()->json([
            'status' => 'success',
            'message' => 'მონაცემები განახლდა'
        ]);
    }

    private function validateRequest(Request $request)
    {
        return $request->validate([
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'company' => 'required|string|max:255',
            'identity' => 'required|integer',
            'employes' => 'required|integer|min:0',
            'email' => 'required|string|email|max:255',
            'phone' => 'required|regex:/^(?:\?995)?5(?:[0-9]\s*){8}$/',
            'type' => 'required|string|max:255',
            'message' => 'required|string',
        ]);
    }
}
