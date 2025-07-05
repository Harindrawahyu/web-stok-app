<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // if (User::where('email', $request->email)->exists()) {
        //     return to_route('register')->withErrors(['email' => 'Email sudah terdaftar!'])->withInput();
        // }

        // Create the user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        // Assign the role to the user
        $user->assignRole('Supplier'); // Assuming 'Supplier' is a valid role

        // Log the user in
        Auth::login($user);

        return redirect()->route('login')->with('success', 'Registrasi Berhasil!');
    }
}
