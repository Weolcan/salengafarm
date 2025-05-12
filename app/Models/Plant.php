<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Plant extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected $fillable = [
        'name',
        'code',
        'scientific_name',
        'description',
        'category',
        'height_mm',
        'spread_mm',
        'spacing_mm',
        'oc',
        'price',
        'cost_per_sqm',
        'pieces_per_sqm',
        'cost_per_mm',
        'quantity',
        'photo_path'
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'cost_per_sqm' => 'decimal:2',
        'cost_per_mm' => 'decimal:2',
        'height_mm' => 'integer',
        'spread_mm' => 'integer',
        'spacing_mm' => 'integer',
        'pieces_per_sqm' => 'integer',
        'quantity' => 'integer'
    ];

    /**
     * Get the validation rules for the model.
     *
     * @return array<string, mixed>
     */
    public static function validationRules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'nullable|numeric|min:0',
            'quantity' => 'nullable|integer|min:0',
            'category' => 'nullable|string',
            'code' => 'nullable|string',
            'scientific_name' => 'nullable|string',
            'height_mm' => 'nullable|numeric',
            'spread_mm' => 'nullable|numeric',
            'spacing_mm' => 'nullable|numeric',
            'oc' => 'nullable|string',
            'cost_per_sqm' => 'nullable|numeric',
            'pieces_per_sqm' => 'nullable|numeric',
            'cost_per_mm' => 'nullable|numeric'
        ];
    }

    /**
     * Get the sales associated with the plant.
     */
    public function sales(): HasMany
    {
        return $this->hasMany(Sale::class);
    }
}