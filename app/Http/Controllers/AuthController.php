<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    function index()
    {
        return view('auth.login');
    }

    function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ], [
            'email.required' => 'Email must be filled in',
            'password.required' => 'Password must be filled in',
        ]);

        $userInfo = $request->only('email', 'password');

        if (Auth::attempt($userInfo)) {
            session()->put('role', Auth::user()->role);
            session()->put('user', Auth::user()->name);
            session()->put('image', Auth::user()->image);
            return redirect('dashboard');
        } else {
            return redirect('')->withErrors('Email dan Password tidak sesuai');
        }
    }

    function logout()
    {
        Auth::logout();
        return redirect('');
    }
}
