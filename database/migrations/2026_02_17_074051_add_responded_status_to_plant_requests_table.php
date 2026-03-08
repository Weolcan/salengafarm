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
        // Check if using MySQL
        if (DB::connection()->getDriverName() === 'mysql') {
            // Modify the status enum to include 'responded'
            DB::statement("ALTER TABLE plant_requests MODIFY COLUMN status ENUM('pending', 'sent', 'cancelled', 'responded') DEFAULT 'pending'");
        } else {
            // For SQLite and other databases, we need to recreate the column
            // SQLite doesn't support MODIFY COLUMN, so we skip this migration
            // The column should already exist from the original migration
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Check if using MySQL
        if (DB::connection()->getDriverName() === 'mysql') {
            // Revert back to original enum values
            DB::statement("ALTER TABLE plant_requests MODIFY COLUMN status ENUM('pending', 'sent', 'cancelled') DEFAULT 'pending'");
        }
    }
};
