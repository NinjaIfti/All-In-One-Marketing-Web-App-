<?php

namespace App\Providers;

use App\Http\Middleware\TrackUserActivity;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Vite;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Vite::prefetch(concurrency: 3);
        
        // Register the TrackUserActivity middleware to web routes
        $router = $this->app->make(Router::class);
        $router->aliasMiddleware('track.user.activity', TrackUserActivity::class);
        
        // Apply middleware to web group
        $router->pushMiddlewareToGroup('web', TrackUserActivity::class);
    }
}
