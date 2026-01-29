<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Only create admin if it doesn't exist
        if (!\App\Models\User::where('email', 'admin@salenga.com')->exists()) {
            \App\Models\User::create([
                'first_name' => 'Admin',
                'last_name' => 'User',
                'email' => 'admin@salenga.com',
                'email_verified_at' => now(),
                'password' => \Illuminate\Support\Facades\Hash::make('admin@salenga.com'),
                'role' => 'admin',
                'contact_number' => '0000000000',
                'company_name' => 'Admin Company',
                'is_client' => false,
            ]);
            
            echo "Admin user created successfully!\n";
        } else {
            echo "Admin user already exists.\n";
        }
    }
}
