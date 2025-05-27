<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserAnalytics extends Model
{
    use HasFactory;
    
    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'user_id',
        'action',
        'description',
        'metadata',
        'ip_address',
        'user_agent',
    ];
    
    /**
     * The attributes that should be cast.
     */
    protected $casts = [
        'metadata' => 'array',
    ];
    
    /**
     * Get the metadata as an array
     * 
     * @param  string|null  $value
     * @return array|null
     */
    public function getMetadataAttribute($value)
    {
        if (is_null($value)) {
            return null;
        }
        
        return json_decode($value, true);
    }
    
    /**
     * Set the metadata as JSON
     * 
     * @param  array|null  $value
     * @return void
     */
    public function setMetadataAttribute($value)
    {
        $this->attributes['metadata'] = is_null($value) ? null : json_encode($value);
    }
    
    /**
     * Get the user that owns the analytics record.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    
    /**
     * Scope a query to only include analytics for a specific action.
     */
    public function scopeAction($query, $action)
    {
        return $query->where('action', $action);
    }
    
    /**
     * Scope a query to only include analytics from a specific time period.
     */
    public function scopeInPeriod($query, $startDate, $endDate)
    {
        return $query->whereBetween('created_at', [$startDate, $endDate]);
    }
}
