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
        $user = Auth::user();
        
        if ($user->role->name === 'Admin' || $user->role->name === 'User') {
            return redirect()->route('backend.dashboard')->with('success', 'Login Success');
        } else {
            Auth::logout();
            return redirect('admin/login')->withErrors(['email' => 'You are not authorized to access the admin panel.']);
        }
    }

    return back()->withInput()->withErrors(['email' => 'Invalid email or password']);
}

public function logout()
{
    Auth::logout();

    return redirect('admin/login');
}

}
