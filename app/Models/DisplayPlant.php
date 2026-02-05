<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DisplayPlant extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'code',
        'scientific_name',
        'description',
        'category',
        'height_mm',
        'spread_mm',
        'spacing_mm',
        'photo_path',
        'care_watering',
        'care_sunlight',
        'care_soil',
        'care_temperature',
        'care_humidity',
        'care_fertilizing',
        'care_pruning',
        'care_propagation',
        'care_pests',
        'care_growth_rate',
        'care_toxicity',
        'care_notes'
    ];
} 