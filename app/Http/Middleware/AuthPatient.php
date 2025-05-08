<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Symfony\Component\HttpFoundation\Response;

class AuthPatient
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check() && auth()->user()->isPatient()) {
            if ($request->is(LaravelLocalization::getCurrentLocale() . '/patient*')) {
                return $next($request);
            }
            return redirect()->route('patient_dashboard');
        }

        // Redirect non-user users to the login page
        return redirect()->route('guest_welcome');
    }
}
