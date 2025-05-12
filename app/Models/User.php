<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected $fillable = [
        'name',
        'first_name',
        'last_name',
        'contact_number',
        'company_name',
        'email',
        'password',
        'role',
        'avatar',
        'is_client',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'is_client' => 'boolean',
        ];
    }

    /**
     * Check if the user is an admin.
     *
     * @return bool
     */
    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }

    /**
     * Check if the user is a manager.
     *
     * @return bool
     */
    public function isManager(): bool
    {
        return $this->role === 'manager';
    }

    /**
     * Check if the user is a regular user.
     *
     * @return bool
     */
    public function isUser(): bool
    {
        return $this->role === 'user';
    }

    /**
     * Check if the user has access to admin features.
     *
     * @return bool
     */
    public function hasAdminAccess(): bool
    {
        return in_array($this->role, ['admin', 'manager']);
    }

    /**
     * Check if the user is pending approval.
     *
     * @return bool
     */
    public function isPending(): bool
    {
        return $this->role === 'pending';
    }

    /**
     * Check if the user is a client.
     *
     * @return bool
     */
    public function isClient(): bool
    {
        return (bool)$this->is_client;
    }

    /**
     * Check if the user has access to client features.
     *
     * @return bool
     */
    public function hasClientAccess(): bool
    {
        return (bool)$this->is_client || in_array($this->role, ['admin', 'manager']);
    }
}