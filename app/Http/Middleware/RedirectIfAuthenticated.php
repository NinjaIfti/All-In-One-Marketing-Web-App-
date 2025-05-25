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
                $user = Auth::guard($guard)->user();
                
                // Redirect admin users to admin dashboard
                if ($user->isAdmin()) {
                    return redirect()->route('admin.dashboard');
                }
                
                // Redirect regular users to user dashboard
                return redirect()->route('user.dashboard');
            }
        }

        return $next($request);
    }
} 