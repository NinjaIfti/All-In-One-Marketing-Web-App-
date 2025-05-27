<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Services\AnalyticsService;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AnalyticsController extends Controller
{
    protected $analyticsService;
    
    /**
     * Create a new controller instance.
     */
    public function __construct(AnalyticsService $analyticsService)
    {
        $this->analyticsService = $analyticsService;
    }
    
    /**
     * Display the user analytics dashboard.
     */
    public function index(Request $request)
    {
        $user = $request->user();
        $timeframe = $request->get('timeframe', 30); // Default to 30 days
        
        // Track that the user viewed analytics
        $this->analyticsService->trackUserAction(
            $user,
            'view_analytics',
            'User viewed analytics dashboard',
            ['timeframe' => $timeframe],
            $request
        );
        
        // Get activity data
        $activityData = $this->analyticsService->getUserActivitySummary($user, $timeframe);
        $loginData = $this->analyticsService->getUserLoginAnalytics($user, $timeframe);
        
        return Inertia::render('user/Analytics/Index', [
            'activityData' => $activityData,
            'loginData' => $loginData,
            'timeframe' => $timeframe,
        ]);
    }
    
    /**
     * Get user activity data for charts via AJAX.
     */
    public function getActivityData(Request $request)
    {
        $user = $request->user();
        $timeframe = $request->get('timeframe', 30);
        
        $activityData = $this->analyticsService->getUserActivitySummary($user, $timeframe);
        
        return response()->json($activityData);
    }
    
    /**
     * Get login data for charts via AJAX.
     */
    public function getLoginData(Request $request)
    {
        $user = $request->user();
        $timeframe = $request->get('timeframe', 30);
        
        $loginData = $this->analyticsService->getUserLoginAnalytics($user, $timeframe);
        
        return response()->json($loginData);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
