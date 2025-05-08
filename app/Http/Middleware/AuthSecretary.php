<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Symfony\Component\HttpFoundation\Response;

class AuthSecretary
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if the user is authenticated and is an admin
        if (Auth::check() && auth()->user()->isSecretary()) {
            if ($request->is(LaravelLocalization::getCurrentLocale() . '/secretary*')) {
                return $next($request);
            }
            // Redirect to the admin dashboard if accessing non-admin routes
            return redirect()->route('secretary_dashboard');
        }

        // Redirect non-admin users to the welcome page
        return redirect()->route('guest_welcome');
    }
}
