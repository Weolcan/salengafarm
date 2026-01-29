<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoleRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'account_type',
        'full_name',
        'contact_number',
        'email',
        'address',
        'gender',
        'company_name',
        'company_address',
        'message',
        'status',
        'admin_notes',
    ];

    /**
     * Get the user that owns the role request.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
