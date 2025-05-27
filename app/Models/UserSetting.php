<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserSetting extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'key',
        'value',
        'group',
    ];

    /**
     * Cast value based on key
     * 
     * @param string|null $value
     * @return mixed
     */
    public function getValueAttribute($value)
    {
        if ($value === null) {
            return null;
        }

        // Check if the value is JSON
        $decoded = json_decode($value, true);
        if (json_last_error() === JSON_ERROR_NONE && is_array($decoded)) {
            return $decoded;
        }

        // Check if value is boolean
        if ($value === 'true' || $value === 'false') {
            return $value === 'true';
        }

        // Check if value is numeric
        if (is_numeric($value)) {
            if (strpos($value, '.') !== false) {
                return (float) $value;
            }
            return (int) $value;
        }

        return $value;
    }

    /**
     * Set value attribute
     * 
     * @param mixed $value
     * @return void
     */
    public function setValueAttribute($value)
    {
        if (is_array($value) || is_object($value)) {
            $this->attributes['value'] = json_encode($value);
        } elseif (is_bool($value)) {
            $this->attributes['value'] = $value ? 'true' : 'false';
        } else {
            $this->attributes['value'] = $value;
        }
    }

    /**
     * Get the user that owns the setting.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
