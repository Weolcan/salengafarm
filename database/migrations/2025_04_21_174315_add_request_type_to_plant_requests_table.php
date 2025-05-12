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
        Schema::table('plant_requests', function (Blueprint $table) {
            $table->string('request_type')->default('rfq')->after('status'); // 'rfq' or 'user'
            $table->string('phone')->nullable()->after('email');
            $table->text('address')->nullable()->after('phone');
            $table->text('message')->nullable()->after('address');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('plant_requests', function (Blueprint $table) {
            $table->dropColumn('request_type');
            $table->dropColumn('phone');
            $table->dropColumn('address');
            $table->dropColumn('message');
        });
    }
};
