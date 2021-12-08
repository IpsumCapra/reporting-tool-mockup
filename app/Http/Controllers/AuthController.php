<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Session;

class AuthController extends Controller
{
    // Login route
    public function login(Request $request)
    {
        // Validate input
        $fields = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // Try to login when successful go to home page
        if (
        Auth::attempt([
            'email' => $fields['email'],
            'password' => $fields['password']
        ], true)
        ) {
            return redirect()->route('home');
        }

        // When not successfull go back with error
        return back()->withInput()->with('error', __('auth.login.error'));
    }

    // Logout route
    public function logout()
    {
        // Logout user
        Session::flush();
        Auth::logout();

        // Go to login page
        return redirect()->route('auth.login');
    }
}
