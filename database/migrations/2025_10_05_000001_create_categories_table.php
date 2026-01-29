<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('icon_path')->nullable();
            $table->timestamps();
        });

        // Backfill from existing plants
        if (Schema::hasTable('plants')) {
            $distinct = DB::table('plants')->select('category')->distinct()->pluck('category');
            foreach ($distinct as $cat) {
                if (!$cat) continue;
                $slug = Str::slug($cat);
                DB::table('categories')->updateOrInsert(
                    ['slug' => $slug],
                    ['name' => ucfirst($cat), 'slug' => $slug, 'created_at' => now(), 'updated_at' => now()]
                );
            }
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
