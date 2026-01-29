<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RegionalPreset extends Model
{
    protected $fillable = [
        'name',
        'city',
        'province',
        'region',
        'latitude',
        'longitude',
        'radius',
        'preset_data',
        'is_active'
    ];

    protected $casts = [
        'preset_data' => 'array',
        'latitude' => 'decimal:8',
        'longitude' => 'decimal:8',
        'radius' => 'decimal:2',
        'is_active' => 'boolean'
    ];

    /**
     * Scope to get only active presets
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
}
