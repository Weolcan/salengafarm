<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('site_visits', function (Blueprint $table) {
            if (!Schema::hasColumn('site_visits', 'physical_factors')) {
                $table->json('physical_factors')->nullable();
            }
            if (Schema::hasColumn('site_visits', 'climate_factors')) {
                $table->dropColumn('climate_factors');
            }
        });
    }

    public function down(): void
    {
        Schema::table('site_visits', function (Blueprint $table) {
            if (!Schema::hasColumn('site_visits', 'climate_factors')) {
                $table->json('climate_factors')->nullable();
            }
            if (Schema::hasColumn('site_visits', 'physical_factors')) {
                $table->dropColumn('physical_factors');
            }
        });
    }
};
