<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use App\Models\User;

use Spatie\Permission\Models\Role;

class AuthController extends Controller
{
    // Show the login form
    public function showLoginForm()
    {
        return view('auth.login');
    }
    // register form
    public function showRegisterForm()
    {
        return view('auth.register');
    }
    // register process
    public function register(Request $request) {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,',
            'password' => 'required|string|min:6',
            'password_confirmation' => 'required|string|min:6|same:password',
            ]);

        // Update user details
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);
        $roles =['user'];

        $user->assignRole("User");

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Login successful, redirect to the intended page
            return redirect()->intended('/')->with('success', 'Logged In');
        }
    }

    // Handle the login process
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Attempt to log the user in
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Login successful, redirect to the intended page
            return redirect()->intended('/')->with('success', 'Logged In');
        }
        // Authentication failed, redirect back with an error
        return redirect()->back()->with('error', 'Invalid Credentials');
    }

    // Handle the logout process
    public function logout()
    {
        Auth::logout();
        return redirect('/login')->with('success', 'Logged Out');
    }
}
