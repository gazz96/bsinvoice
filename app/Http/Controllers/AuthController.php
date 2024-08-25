<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    function login()
    {
        return view('login');
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