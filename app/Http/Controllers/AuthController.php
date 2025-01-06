<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    function login(Request $request)
    {
        return view('login');
        if($request->maintenance) {
            return view('login');    
        }
        
        return 'Updating...';
    }

    function checkLogin(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'password' => 'required'
        ]);
    
        if (Auth::attempt($validated, true))
        {
            return redirect()->intended('/dashboard');
        }
        

        return back()
            ->with('status', 'warning')
            ->with('message', 'Username and password not match');
    }

    function logout(){
        Auth::logout();
        return redirect('/');
    }
}