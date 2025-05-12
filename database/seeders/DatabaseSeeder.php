<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Create admin user
        User::create([
            'name' => 'Admin',
            'email' => 'admin',
            'password' => Hash::make('admin'),
            'role' => 'admin',
        ]);

        // Commented out until plants table is properly migrated
        // $this->call([
        //     PlantSeeder::class,
        // ]);
    }
}
