<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $status = $request->get('status', 0);
        $role = $request->get('role', '');

        $list = User::where('role', '!=', 'admin')->orderBy('id', 'desc')->
            when($status, function ($query, $status) {
                return $query->where('status', $status);
            })->
            when($role, function ($query, $role) {
                return $query->where('role', $role);
            })->
        paginate(10);

        if ($status || $role) {
            $list->appends([
                'status' => $status,
                'role' => $role,
            ]);
        }

        return view('user.index', compact('list'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('user.form.'.$user->role, [
            'item' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $role = $request->get('role', null);
        $data = [];

        if ($role === 'company') {
            $data = $this->validateCompany($request);
        } elseif ($role === 'freelance') {
            $data = $this->validateFreelance($request);
        } else {
            return redirect()->back()->withErrors('როლი ვერ მოიძებნა');
        }

        $user->update($data);

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if ($user->role == 'admin') {
            return redirect()->back()->withErrors('ადმინის წაშლა შეუძლებელია');
        }
        $user->delete();

        return redirect()->back();
    }

    public function setStatus(Request $request, User $user)
    {
        $data = $request->validate(['status' => 'required|integer|min:1|max:2']);

        $user->update($data);

        return response()->json([
            'status' => 'success',
            'message' => 'მონაცემები განახლდა'
        ]);
    }

    private function validateCompany(Request $request)
    {
        return $request->validate([
            'company_name' => 'required|string|max:255',
            'identity' => 'required|integer',
            'employes' => 'required|integer|min:0',
            'working_hours' => 'sometimes|regex:/^[0-9]{2}:00 - [0-9]{2}:00$/',
            'message' => 'sometimes|string|nullable',
            'phone' => 'required|regex:/^(?:\?995)?5(?:[0-9]\s*){8}$/',
            'email' => 'required|string|email|max:255|unique:users',
        ]);
    }
    
    private function validateFreelance(Request $request)
    {
        return $request->validate([
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'working_hours' => 'sometimes|regex:/^[0-9]{2}:00 - [0-9]{2}:00$/',
            'email' => 'required|string|email|max:255|unique:users',
            'message' => 'sometimes|string|nullable',
            'phone' => 'required|regex:/^(?:\?995)?5(?:[0-9]\s*){8}$/',
        ]);
    }
}
