<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('site_visits', function (Blueprint $table) {
            if (!Schema::hasColumn('site_visits', 'client_data_statuses')) {
                $table->json('client_data_statuses')->nullable();
            }
            if (!Schema::hasColumn('site_visits', 'proposal_item_statuses')) {
                $table->json('proposal_item_statuses')->nullable();
            }
            if (!Schema::hasColumn('site_visits', 'proposal_approval')) {
                $table->json('proposal_approval')->nullable();
            }
        });
    }

    public function down(): void
    {
        Schema::table('site_visits', function (Blueprint $table) {
            if (Schema::hasColumn('site_visits', 'client_data_statuses')) {
                $table->dropColumn('client_data_statuses');
            }
            if (Schema::hasColumn('site_visits', 'proposal_item_statuses')) {
                $table->dropColumn('proposal_item_statuses');
            }
            if (Schema::hasColumn('site_visits', 'proposal_approval')) {
                $table->dropColumn('proposal_approval');
            }
        });
    }
};
