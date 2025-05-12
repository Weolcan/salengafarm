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
            $table->string('pricing')->default('None')->after('items_json');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('plant_requests', function (Blueprint $table) {
            $table->dropColumn('pricing');
        });
    }
};
