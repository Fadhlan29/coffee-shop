<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionController extends Controller
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
            'email.required' => 'Email wajib diisi',
            'password.required' => 'Password wajib diisi',
        ]);
        
        $userInfo = $request->only('email', 'password');

        if (Auth::attempt($userInfo)) {
            session(['role' => Auth::user()->role]);
            session(['name' => Auth::user()->name]);
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
