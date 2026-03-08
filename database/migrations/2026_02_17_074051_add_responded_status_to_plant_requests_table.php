<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Only run on MySQL - skip for SQLite and other databases
        if (DB::connection()->getDriverName() !== 'mysql') {
            return;
        }
        
        // Modify the status enum to include 'responded'
        DB::statement("ALTER TABLE plant_requests MODIFY COLUMN status ENUM('pending', 'sent', 'cancelled', 'responded') DEFAULT 'pending'");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Only run on MySQL - skip for SQLite and other databases
        if (DB::connection()->getDriverName() !== 'mysql') {
            return;
        }
        
        // Revert back to original enum values
        DB::statement("ALTER TABLE plant_requests MODIFY COLUMN status ENUM('pending', 'sent', 'cancelled') DEFAULT 'pending'");
    }
};
