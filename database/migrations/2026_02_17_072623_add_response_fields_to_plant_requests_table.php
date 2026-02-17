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
            $table->timestamp('response_sent_at')->nullable()->after('status');
            $table->unsignedBigInteger('responded_by')->nullable()->after('response_sent_at');
            $table->foreign('responded_by')->references('id')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('plant_requests', function (Blueprint $table) {
            $table->dropForeign(['responded_by']);
            $table->dropColumn(['response_sent_at', 'responded_by']);
        });
    }
};
