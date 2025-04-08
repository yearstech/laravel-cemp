<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CheckIfLoggedIn
{
    public function handle($request, Closure $next)
    {
        // Check if user is logged in
        if (!Auth::check()) {
            // If not logged in, redirect to login page
            return redirect()->route('login')->with('error', 'You must be logged in to access this page.');
        }

        // If logged in, allow the request to proceed
        return $next($request);
    }
}
