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
        Schema::table('sales', function (Blueprint $table) {
            $table->integer('height')->nullable()->after('total_price');
            $table->integer('spread')->nullable()->after('height');
            $table->integer('spacing')->nullable()->after('spread');
            $table->json('custom_attributes')->nullable()->after('spacing');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('sales', function (Blueprint $table) {
            $table->dropColumn('height');
            $table->dropColumn('spread');
            $table->dropColumn('spacing');
            $table->dropColumn('custom_attributes');
        });
    }
};
