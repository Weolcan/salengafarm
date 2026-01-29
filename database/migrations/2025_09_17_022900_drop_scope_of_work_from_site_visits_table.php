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
        Schema::table('site_visits', function (Blueprint $table) {
            if (Schema::hasColumn('site_visits', 'scope_of_work')) {
                $table->dropColumn('scope_of_work');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('site_visits', function (Blueprint $table) {
            if (!Schema::hasColumn('site_visits', 'scope_of_work')) {
                $table->text('scope_of_work')->nullable();
            }
        });
    }
};
