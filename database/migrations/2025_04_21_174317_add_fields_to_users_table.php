<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('first_name');
            $table->string('last_name');
            $table->string('contact_number');
            $table->string('company_name');
            // Drop the existing name column if you want
            $table->dropColumn('name');
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Restore the original name column if you're dropping it
            $table->string('name');
            $table->dropColumn(['first_name', 'last_name', 'contact_number', 'company_name']);
        });
    }
}; 