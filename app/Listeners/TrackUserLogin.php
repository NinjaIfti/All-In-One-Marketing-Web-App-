<?php

namespace App\Listeners;

use App\Services\AnalyticsService;
use Illuminate\Auth\Events\Login;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Http\Request;
use Illuminate\Queue\InteractsWithQueue;

class TrackUserLogin
{
    protected $analyticsService;
    protected $request;
    
    /**
     * Create the event listener.
     */
    public function __construct(AnalyticsService $analyticsService, Request $request)
    {
        $this->analyticsService = $analyticsService;
        $this->request = $request;
    }

    /**
     * Handle the event.
     */
    public function handle(Login $event): void
    {
        // Track the user login
        $this->analyticsService->trackUserAction(
            $event->user,
            'login',
            'User logged in',
            [
                'guard' => $event->guard,
            ],
            $this->request
        );
    }
}
