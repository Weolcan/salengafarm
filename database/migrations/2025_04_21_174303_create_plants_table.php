<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('plants', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('code')->nullable();
            $table->string('scientific_name')->nullable();
            $table->text('description')->nullable();
            $table->string('category')->default('shrub');
            $table->integer('height_mm')->nullable();
            $table->integer('spread_mm')->nullable();
            $table->integer('spacing_mm')->nullable();
            $table->string('oc')->nullable();
            $table->decimal('price', 10, 2)->default(0);
            $table->decimal('cost_per_sqm', 10, 2)->default(0);
            $table->integer('pieces_per_sqm')->default(0);
            $table->decimal('cost_per_mm', 10, 2)->default(0);
            $table->integer('quantity')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plants');
    }
};
