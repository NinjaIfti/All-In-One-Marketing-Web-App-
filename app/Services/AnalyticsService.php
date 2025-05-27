<?php

namespace App\Services;

use App\Models\User;
use App\Models\UserAnalytics;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class AnalyticsService
{
    /**
     * Track a user action for analytics.
     *
     * @param User $user
     * @param string $action
     * @param string|null $description
     * @param array|null $metadata
     * @param Request|null $request
     * @return UserAnalytics
     */
    public function trackUserAction(User $user, string $action, ?string $description = null, ?array $metadata = null, ?Request $request = null): UserAnalytics
    {
        $data = [
            'user_id' => $user->id,
            'action' => $action,
            'description' => $description,
            'metadata' => $metadata ? json_encode($metadata) : null,
        ];
        
        // Add request information if provided
        if ($request) {
            $data['ip_address'] = $request->ip();
            $data['user_agent'] = $request->userAgent();
        }
        
        return UserAnalytics::create($data);
    }
    
    /**
     * Get analytics summary for a specific user.
     *
     * @param User $user
     * @param int $days
     * @return array
     */
    public function getUserActivitySummary(User $user, int $days = 30): array
    {
        $startDate = Carbon::now()->subDays($days)->startOfDay();
        
        $activityByDay = $user->analytics()
            ->where('created_at', '>=', $startDate)
            ->selectRaw('DATE(created_at) as date, COUNT(*) as count')
            ->groupBy(DB::raw('DATE(created_at)'))
            ->orderBy('date')
            ->get()
            ->pluck('count', 'date')
            ->toArray();
            
        $activityByType = $user->analytics()
            ->where('created_at', '>=', $startDate)
            ->selectRaw('action, COUNT(*) as count')
            ->groupBy('action')
            ->orderBy('count', 'desc')
            ->get()
            ->pluck('count', 'action')
            ->toArray();
            
        $mostRecentActivities = $user->analytics()
            ->with('user')
            ->latest()
            ->take(10)
            ->get();
            
        return [
            'total' => $user->analytics()->where('created_at', '>=', $startDate)->count(),
            'byDay' => $this->normalizeDateRange($activityByDay, $days),
            'byType' => $activityByType,
            'recent' => $mostRecentActivities,
        ];
    }
    
    /**
     * Get login analytics for a specific user.
     *
     * @param User $user
     * @param int $days
     * @return array
     */
    public function getUserLoginAnalytics(User $user, int $days = 30): array
    {
        $startDate = Carbon::now()->subDays($days)->startOfDay();
        
        $loginsByDay = $user->analytics()
            ->where('action', 'login')
            ->where('created_at', '>=', $startDate)
            ->selectRaw('DATE(created_at) as date, COUNT(*) as count')
            ->groupBy(DB::raw('DATE(created_at)'))
            ->orderBy('date')
            ->get()
            ->pluck('count', 'date')
            ->toArray();
            
        return [
            'total' => $user->analytics()->where('action', 'login')->where('created_at', '>=', $startDate)->count(),
            'byDay' => $this->normalizeDateRange($loginsByDay, $days),
            'lastLogin' => $user->analytics()->where('action', 'login')->latest()->first(),
        ];
    }
    
    /**
     * Ensure we have entries for all dates in the range.
     * This helps with charts that need consistent date ranges.
     *
     * @param array $data
     * @param int $days
     * @return array
     */
    private function normalizeDateRange(array $data, int $days): array
    {
        $result = [];
        $currentDate = Carbon::now()->subDays($days)->startOfDay();
        $endDate = Carbon::now()->endOfDay();
        
        while ($currentDate <= $endDate) {
            $dateStr = $currentDate->format('Y-m-d');
            $result[$dateStr] = $data[$dateStr] ?? 0;
            $currentDate->addDay();
        }
        
        return $result;
    }
} 