<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    public function handle(Request $request, Closure $next, string ...$guards): mixed
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                // Redirect admin users to admin dashboard
                if (Auth::user()->isAdmin()) {
                    return redirect(RouteServiceProvider::ADMIN_HOME);
                }
                
                // Redirect regular users to user dashboard
                return redirect(RouteServiceProvider::HOME);
            }
        }

        return $next($request);
    }
} 