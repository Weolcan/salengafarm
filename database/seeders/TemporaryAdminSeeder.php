<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class TemporaryAdminSeeder extends Seeder
{
    /**
     * Create a temporary admin user with a default password
     * This password should be changed immediately after first login
     */
    public function run(): void
    {
        // Create temporary admin with default credentials
        $tempAdmin = User::create([
            'first_name' => 'Temporary',
            'last_name' => 'Admin',
            'email' => 'temp.admin@salenga.farm',
            'contact_number' => '09123456789',
            'company_name' => 'Salenga Farm',
            'password' => Hash::make('admin'), // Hashed temporary password
            'role' => 'admin',
            'remember_token' => Str::random(10),
        ]);

        // Output confirmation message
        $this->command->info('Temporary admin created successfully!');
        $this->command->info('Email: temp.admin@salenga.farm');
        $this->command->info('Password: admin (PLEASE CHANGE IMMEDIATELY)');
    }
}
