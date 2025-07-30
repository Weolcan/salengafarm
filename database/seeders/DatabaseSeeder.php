<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            AdminUserSeeder::class,
        ]);

        // Commented out until plants table is properly migrated
        // $this->call([
        //     PlantSeeder::class,
        // ]);
    }
}
