<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Campaign extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'user_id',
        'subject',
        'content',
        'status',
        'sent_count',
        'open_count',
        'click_count',
        'scheduled_at',
        'sent_at',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'scheduled_at' => 'datetime',
        'sent_at' => 'datetime',
    ];

    /**
     * Get the user that owns the campaign.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Calculate the open rate for the campaign.
     */
    public function getOpenRateAttribute(): float
    {
        if ($this->sent_count <= 0) {
            return 0;
        }
        
        return round(($this->open_count / $this->sent_count) * 100, 1);
    }

    /**
     * Calculate the click rate for the campaign.
     */
    public function getClickRateAttribute(): float
    {
        if ($this->sent_count <= 0) {
            return 0;
        }
        
        return round(($this->click_count / $this->sent_count) * 100, 1);
    }
} 