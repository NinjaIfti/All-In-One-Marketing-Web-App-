<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Automation extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'name',
        'description',
        'status',
        'type',
        'triggers',
        'total_contacts',
        'active_contacts',
        'completed_contacts',
        'last_execution',
        'next_scheduled_execution',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'triggers' => 'array',
        'last_execution' => 'datetime',
        'next_scheduled_execution' => 'datetime',
    ];

    /**
     * Get the triggers as an array
     * 
     * @param  string|null  $value
     * @return array|null
     */
    public function getTriggersAttribute($value)
    {
        if (is_null($value)) {
            return null;
        }
        
        return json_decode($value, true);
    }
    
    /**
     * Set the triggers as JSON
     * 
     * @param  array|null  $value
     * @return void
     */
    public function setTriggersAttribute($value)
    {
        $this->attributes['triggers'] = is_null($value) ? null : json_encode($value);
    }

    /**
     * Get the user that owns the automation.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the steps for the automation.
     */
    public function steps(): HasMany
    {
        return $this->hasMany(AutomationStep::class)->orderBy('position');
    }
    
    /**
     * Scope a query to only include active automations.
     */
    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }
    
    /**
     * Scope a query to only include automations of a specific type.
     */
    public function scopeOfType($query, $type)
    {
        return $query->where('type', $type);
    }
}
