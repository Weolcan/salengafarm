<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Sale extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected $fillable = [
        'plant_id',
        'quantity',
        'price',
        'total_price',
        'height',
        'spread',
        'spacing',
        'custom_attributes',
        'customer_name',
        'customer_email',
        'payment_method',
        'notes',
        'sale_date'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'sale_date' => 'datetime',
        'total_price' => 'decimal:2',
        'price' => 'decimal:2',
        'height' => 'integer',
        'spread' => 'integer',
        'spacing' => 'integer',
        'custom_attributes' => 'array'
    ];

    /**
     * Get the plant associated with the sale.
     */
    public function plant(): BelongsTo
    {
        return $this->belongsTo(Plant::class);
    }
}