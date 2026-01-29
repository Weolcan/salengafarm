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
        'phone',
        'request_date',
        'due_date',
        'items_json',
        'status',
        'request_type',
        'pdf_path'
    ];

    protected $casts = [
        'request_date' => 'datetime',
        'due_date' => 'datetime',
        'items_json' => 'array'
    ];
} 