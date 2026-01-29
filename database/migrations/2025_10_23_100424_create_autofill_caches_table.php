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
        Schema::create('autofill_caches', function (Blueprint $table) {
            $table->id();
            $table->decimal('lat_rounded', 6, 3);
            $table->decimal('lon_rounded', 6, 3);
            $table->string('city')->nullable();
            $table->string('province')->nullable();
            $table->json('cached_data');
            $table->json('data_sources')->nullable();
            $table->timestamp('expires_at')->nullable();
            $table->timestamps();
            
            // Unique constraint on coordinates
            $table->unique(['lat_rounded', 'lon_rounded']);
            
            // Index for expiration cleanup
            $table->index('expires_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('autofill_caches');
    }
};
