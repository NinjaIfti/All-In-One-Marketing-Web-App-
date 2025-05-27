<?php

namespace App\Http\Middleware;

use App\Services\AnalyticsService;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class TrackUserActivity
{
    protected $analyticsService;
    
    /**
     * Create a new middleware instance.
     */
    public function __construct(AnalyticsService $analyticsService)
    {
        $this->analyticsService = $analyticsService;
    }
    
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);
        
        // Track user activity after the request is processed
        if (Auth::check() && !$request->ajax()) {
            $user = Auth::user();
            $route = $request->route();
            $routeName = $route ? ($route->getName() ?? 'unknown') : 'unknown';
            
            // Don't track analytics routes to avoid recursion
            if (!str_contains($routeName, 'analytics')) {
                $this->analyticsService->trackUserAction(
                    $user,
                    'page_view',
                    "User viewed page: {$routeName}",
                    [
                        'route' => $routeName,
                        'url' => $request->fullUrl(),
                        'method' => $request->method(),
                    ],
                    $request
                );
            }
        }
        
        return $response;
    }
}
