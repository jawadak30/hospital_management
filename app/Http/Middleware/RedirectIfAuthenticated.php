<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string ...$guards): Response
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                $user = Auth::user();
                $locale = LaravelLocalization::getCurrentLocale();
                if ($user->isDoctor()) {
                    return redirect(LaravelLocalization::getLocalizedURL($locale, route('doctor_dashboard')));
                }
                if ($user->isPatient()) {
                    return redirect(LaravelLocalization::getLocalizedURL($locale, route('patient_dashboard')));
                }
                if ($user->isSecretary()) {
                    return redirect(LaravelLocalization::getLocalizedURL($locale, route('secretary_dashboard')));
                }
                if ($user->isSuperAdmin()) {
                    return redirect(LaravelLocalization::getLocalizedURL($locale, route('admin_dashboard')));
                }
            }
        }

        return $next($request);
    }
}
