<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlantRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'email',
        'name',
        'request_date',
        'due_date',
        'items_json',
        'status',
        'pdf_path'
    ];

    protected $casts = [
        'request_date' => 'datetime',
        'due_date' => 'datetime',
        'items_json' => 'array'
    ];
} 