<?php

namespace App\Http\Controllers;

use App\Solved;
use App\User;
use Illuminate\Http\Request;

class SolvedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list = Solved::all();

        return view('solved.index', compact('list'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Solved  $solved
     * @return \Illuminate\Http\Response
     */
    public function edit(Solved $solved)
    {
        $companies = User::where([['role', '=', 'company'], ['status', '=', '1']])->get();
        $freelances = User::where([['role', '=', 'freelance'], ['status', '=', '1']])->get();

        return view('solved.form', [
            'item' => $solved,
            'companies' => $companies,
            'freelances' => $freelances,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Solved  $solved
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Solved $solved)
    {
        $data = $request->validate([
            'text_ge' => 'required|string',
            'text_en' => 'required|string',
            'comment_ge' => 'required|string',
            'comment_en' => 'required|string',
            'user_id' => 'required|exists:users,id', 
        ]);

        $solved->update($data);

        return redirect()->back();
    }

}
