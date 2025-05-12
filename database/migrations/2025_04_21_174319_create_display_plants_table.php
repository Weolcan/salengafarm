<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('display_plants', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('code')->nullable();
            $table->string('scientific_name')->nullable();
            $table->text('description')->nullable();
            $table->string('category')->default('shrub');
            $table->integer('height_mm')->nullable();
            $table->integer('spread_mm')->nullable();
            $table->integer('spacing_mm')->nullable();
            $table->string('photo_path')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('display_plants');
    }
}; 