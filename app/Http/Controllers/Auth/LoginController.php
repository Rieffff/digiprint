<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        if (auth()->check()) {
            return redirect('/dashboard'); // Redirect to the dashboard if the user is already logged in.
        }

        return view('auth/login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->intended('/dashboard'); // Replace '/dashboard' with your desired redirect route after login. 
        } else {
            return back()->withErrors(['email' => 'Invalid credentials. Please try again.']);
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();

        // Redirect to the login page after logout
        return redirect()->route('login');
    }
}
