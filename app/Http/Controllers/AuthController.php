<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\User;

class AuthController extends Controller
{
    public function index()
{
    return view('auth.login');
}



public function login(Request $request)
{
    // Validate the request
    $request->validate([
        'email' => 'required|email',
        'password' => 'required'
    ]);

    // Retrieve user by email
    $user = User::where('email', $request->email)->first();

    if (!$user) {
        return back()->withErrors(['email' => 'No account found for this email.']);
    }

    // Verify the password
    if (!Hash::check($request->password, $user->password)) {
        return back()->withErrors(['password' => 'Incorrect password.']);
    }

    // Log in the user
    Auth::login($user);

    return redirect()->route('dashboard')->with('success', 'Login successful!');
}

// In AuthController
public function logout()
{
    Session::flush(); // Clear all session data
    return redirect()->route('auth.login')->with('success', 'Logged out successfully!');
}

}
