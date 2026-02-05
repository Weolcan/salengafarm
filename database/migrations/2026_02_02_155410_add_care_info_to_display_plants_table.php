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
        Schema::table('display_plants', function (Blueprint $table) {
            $table->text('care_watering')->nullable()->after('spacing_mm');
            $table->text('care_sunlight')->nullable()->after('care_watering');
            $table->text('care_soil')->nullable()->after('care_sunlight');
            $table->text('care_temperature')->nullable()->after('care_soil');
            $table->text('care_humidity')->nullable()->after('care_temperature');
            $table->text('care_fertilizing')->nullable()->after('care_humidity');
            $table->text('care_pruning')->nullable()->after('care_fertilizing');
            $table->text('care_propagation')->nullable()->after('care_pruning');
            $table->text('care_pests')->nullable()->after('care_propagation');
            $table->text('care_growth_rate')->nullable()->after('care_pests');
            $table->text('care_toxicity')->nullable()->after('care_growth_rate');
            $table->text('care_notes')->nullable()->after('care_toxicity');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('display_plants', function (Blueprint $table) {
            $table->dropColumn([
                'care_watering',
                'care_sunlight',
                'care_soil',
                'care_temperature',
                'care_humidity',
                'care_fertilizing',
                'care_pruning',
                'care_propagation',
                'care_pests',
                'care_growth_rate',
                'care_toxicity',
                'care_notes'
            ]);
        });
    }
};
