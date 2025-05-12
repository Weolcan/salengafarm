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
        'photo_path'
    ];
} 