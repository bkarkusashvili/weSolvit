<?php

namespace App\Http\Controllers;

use App\Application;
use App\Solved;
use App\User;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    
    public function home(Request $request)
    {
        $solved = Solved::all();
        $partners = User::where([
            ['role', 'company'],
            ['status', '2'],
        ])->limit(6)->get();
        
        
        $stats = [
            'total' => Application::total(),
            'progress' => Application::progress(),
            'solved' => Application::solved(),
        ];
        
        return view('front.home', compact('solved', 'partners', 'stats'));
    }

}
