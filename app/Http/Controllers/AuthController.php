<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
 
    public function loginForm()
{
    return view('backend.pages.login.login');
}

public function login(Request $request)
{
    $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    if (Auth::attempt($credentials)) {
        return redirect('/admin')->with('success', 'Login Success');
    }

    return back()->withInput()->withErrors(['email' => 'Invalid email or password']);

    // if (Auth::attempt($credentials)) {
    //     $user = Auth::user();

    //     // Check user's role and redirect accordingly
    //     if ($user->role === 'admin') {
    //         return redirect()->route('admin.dashboard')->with('success', 'Login Success');
    //     } elseif ($user->role === 'user') {
    //         return redirect()->route('user.dashboard')->with('success', 'Login Success');
    //     }
}

public function logout()
{
    Auth::logout();

    return redirect()->route('backend.login');
}

}
