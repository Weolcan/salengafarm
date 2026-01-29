<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Add account_type field
            $table->enum('account_type', ['individual', 'company'])->default('individual')->after('is_client');
            
            // Add individual-specific fields
            $table->string('address')->nullable()->after('account_type');
            $table->enum('gender', ['male', 'female', 'other'])->nullable()->after('address');
            
            // Add company-specific field
            $table->string('company_address')->nullable()->after('company_name');
            
            // Make company_name nullable since it's only for company accounts
            $table->string('company_name')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['account_type', 'address', 'gender', 'company_address']);
        });
    }
};
