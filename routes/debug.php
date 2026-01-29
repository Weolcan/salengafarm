<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

// TEMPORARY DEBUG ROUTE - DELETE AFTER USE!
Route::get('/debug-db-info', function () {
    if (app()->environment('production')) {
        return response()->json([
            'error' => 'Debug route disabled in production for security'
        ], 403);
    }
    
    $tables = DB::select("SELECT name FROM sqlite_master WHERE type='table' ORDER BY name");
    
    $data = [
        'database_type' => config('database.default'),
        'tables' => array_column($tables, 'name'),
        'user_count' => DB::table('users')->count(),
        'admin_exists' => DB::table('users')->where('role', 'admin')->exists(),
    ];
    
    // Try to get plant count if table exists
    if (Schema::hasTable('plants')) {
        $data['plant_count'] = DB::table('plants')->count();
    }
    
    return response()->json($data);
});
