<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        if (! Auth::attempt($request->only('email', 'password'))) {
            return to_route('login')->withErrors([
                'email' => 'Akun tersebut tidak terdaftar di sistem!',
            ])->withInput($request->only('email'));
        }

        $request->session()->regenerate();

        return to_route('home');
    }
}
