<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AutomationStep extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'automation_id',
        'name',
        'type',
        'position',
        'config',
        'conditions',
        'is_active',
        'succeeded_count',
        'failed_count',
        'skipped_count',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'config' => 'array',
        'conditions' => 'array',
        'is_active' => 'boolean',
    ];
    
    /**
     * Get the config as an array
     * 
     * @param  string|null  $value
     * @return array|null
     */
    public function getConfigAttribute($value)
    {
        if (is_null($value)) {
            return null;
        }
        
        return json_decode($value, true);
    }
    
    /**
     * Set the config as JSON
     * 
     * @param  array|null  $value
     * @return void
     */
    public function setConfigAttribute($value)
    {
        $this->attributes['config'] = is_null($value) ? null : json_encode($value);
    }
    
    /**
     * Get the conditions as an array
     * 
     * @param  string|null  $value
     * @return array|null
     */
    public function getConditionsAttribute($value)
    {
        if (is_null($value)) {
            return null;
        }
        
        return json_decode($value, true);
    }
    
    /**
     * Set the conditions as JSON
     * 
     * @param  array|null  $value
     * @return void
     */
    public function setConditionsAttribute($value)
    {
        $this->attributes['conditions'] = is_null($value) ? null : json_encode($value);
    }

    /**
     * Get the automation that owns the step.
     */
    public function automation(): BelongsTo
    {
        return $this->belongsTo(Automation::class);
    }
}
