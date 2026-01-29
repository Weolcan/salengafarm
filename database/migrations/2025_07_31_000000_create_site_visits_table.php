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
        Schema::create('site_visits', function (Blueprint $table) {
            $table->id();
            
            // Location data
            $table->decimal('latitude', 10, 8);
            $table->decimal('longitude', 11, 8);
            $table->string('location_address')->nullable();
            
            // Header Fields
            $table->string('client');
            $table->string('contact_number');
            $table->string('email');
            $table->string('job_no')->nullable();
            $table->string('project_code')->nullable();
            $table->string('project_no')->nullable();
            $table->string('location');
            $table->string('landscape_area')->nullable();
            $table->string('site_inspector');
            $table->date('visit_date');
            
            // Scope of Work (JSON for checkboxes)
            $table->json('scope_of_work')->nullable();
            
            // Physical Factors - Climate (JSON for Yes/No + Remarks)
            $table->json('climate_factors')->nullable();
            
            // Topography (JSON for Yes/No + Remarks)
            $table->json('topography')->nullable();
            
            // Geotechnical Soils (JSON for Yes/No + Remarks)
            $table->json('geotechnical_soils')->nullable();
            
            // Utilities (JSON for Yes/No + Remarks)
            $table->json('utilities')->nullable();
            
            // Immediate Surroundings (JSON for Yes/No + Remarks)
            $table->json('immediate_surroundings')->nullable();
            
            // Tools Checklist (JSON for selectable items)
            $table->json('tools_checklist')->nullable();
            
            // Additional Services (JSON for Yes/No + Remarks)
            $table->json('additional_services')->nullable();
            
            // Client's Data Checklist (JSON for checkboxes)
            $table->json('client_data_checklist')->nullable();
            
            // Proposal Checklist (JSON for checkboxes)
            $table->json('proposal_checklist')->nullable();
            
            // Status and notes
            $table->enum('status', ['pending', 'completed', 'follow_up'])->default('pending');
            $table->text('notes')->nullable();
            
            // Photos/videos paths (JSON array)
            $table->json('media_files')->nullable();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('site_visits');
    }
};
