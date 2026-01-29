<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AutofillCache extends Model
{
    protected $fillable = [
        'lat_rounded',
        'lon_rounded',
        'city',
        'province',
        'cached_data',
        'data_sources',
        'expires_at'
    ];

    protected $casts = [
        'cached_data' => 'array',
        'data_sources' => 'array',
        'expires_at' => 'datetime'
    ];

    /**
     * Scope to get non-expired cache entries
     */
    public function scopeNotExpired($query)
    {
        return $query->where('expires_at', '>', now());
    }
}
