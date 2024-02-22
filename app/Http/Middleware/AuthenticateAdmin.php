<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class AuthenticateAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        // Check if the user is authenticated
        if (!Auth::check()) {
            // Redirect to the login page if not authenticated
            return redirect()->route('backend.login')->with('error', 'Please log in to access this page.');
        }

        // // Check if the user has admin role or necessary permissions
        // if (!$request->user()->isAdmin()) {
        //     // Redirect to unauthorized page or handle it as needed
        //     abort(403, 'Unauthorized access.');
        // }

        return $next($request);
    }
}
