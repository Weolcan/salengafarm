<?php

/*
 * Practice Debugging Script - Laravel Inventory System
 * Use this to practice common debugging scenarios
 */

require_once __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

use App\Models\Plant;
use App\Http\Controllers\PlantController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

echo "=== Laravel Inventory System - Debug Practice ===\n\n";

try {
    // 1. Basic Model Operations
    echo "1. Testing Plant Model...\n";
    
    $plantCount = Plant::count();
    echo "Total plants in database: {$plantCount}\n";
    
    if ($plantCount > 0) {
        $firstPlant = Plant::first();
        echo "First plant: {$firstPlant->name}\n";
        
        // Debug: Show plant data structure
        echo "Plant fields available:\n";
        foreach ($firstPlant->getFillable() as $field) {
            echo "  - {$field}\n";
        }
    }
    
    echo "\n";
    
    // 2. Query Debugging
    echo "2. Testing Query Debugging...\n";
    
    DB::enableQueryLog();
    $recentPlants = Plant::orderBy('created_at', 'desc')->limit(3)->get();
    $queries = DB::getQueryLog();
    
    echo "Recent plants query executed:\n";
    echo "SQL: " . $queries[0]['query'] . "\n";
    echo "Time: " . $queries[0]['time'] . "ms\n\n";
    
    // 3. Controller Testing
    echo "3. Testing PlantController...\n";
    
    $controller = new PlantController();
    echo "PlantController instantiated successfully\n";
    
    // Test search functionality
    $searchRequest = Request::create('/plants/search', 'GET', ['search' => 'plant']);
    // Note: You can set breakpoints here to debug the search method
    
    echo "\n";
    
    // 4. Validation Testing
    echo "4. Testing Validation Rules...\n";
    
    $validationRules = Plant::validationRules();
    echo "Plant validation rules:\n";
    foreach ($validationRules as $field => $rule) {
        echo "  - {$field}: {$rule}\n";
    }
    
    echo "\n";
    
    // 5. Relationship Testing
    echo "5. Testing Relationships...\n";
    
    if ($plantCount > 0) {
        $plant = Plant::first();
        $salesCount = $plant->sales()->count();
        echo "Plant '{$plant->name}' has {$salesCount} sales records\n";
    }
    
    echo "\n=== Debug Practice Complete ===\n";
    echo "Set breakpoints in this file and step through to practice debugging!\n";
    
    // Practice Questions:
    echo "\n=== Practice Questions ===\n";
    echo "1. How would you debug a validation error in PlantController@store?\n";
    echo "2. How would you check why a plant search is returning no results?\n";
    echo "3. How would you debug a file upload that's failing?\n";
    echo "4. How would you trace a mass assignment error?\n";
    echo "5. How would you debug a slow database query?\n";
    
} catch (Exception $e) {
    echo "Error occurred: " . $e->getMessage() . "\n";
    echo "File: " . $e->getFile() . " Line: " . $e->getLine() . "\n";
    echo "Stack trace:\n" . $e->getTraceAsString() . "\n";
}
