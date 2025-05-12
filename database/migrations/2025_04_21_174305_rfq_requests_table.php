<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('rfq_requests', function (Blueprint $table) {
            $table->id();
            $table->string('rfq_number')->unique();
            $table->string('client_name');
            $table->string('client_email');
            $table->string('company_name')->nullable();
            $table->string('contact_number')->nullable();
            $table->text('delivery_address')->nullable();
            $table->json('requested_plants');
            $table->enum('status', ['pending', 'processed', 'sent'])->default('pending');
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('rfq_requests');
    }
}; 