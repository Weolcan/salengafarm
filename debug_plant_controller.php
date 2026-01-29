<?php

/*
 * Debug script for PlantController
 * This script properly bootstraps Laravel so you can debug the PlantController
 */

// Bootstrap Laravel
require_once __DIR__ . '/vendor/autoload.php';

$app = require_once __DIR__ . '/bootstrap/app.php';

// Boot the application
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

// Now you can use Laravel classes
use App\Http\Controllers\PlantController;
use Illuminate\Http\Request;
use App\Models\Plant;

// Example: Test the PlantController
try {
    echo "Laravel bootstrapped successfully!\n";
    echo "Testing PlantController...\n";
    
    // Create a mock request for testing
    $request = Request::create('/plants', 'GET');
    
    // Create controller instance
    $controller = new PlantController();
    
    echo "PlantController created successfully!\n";
    
    // You can set breakpoints here and debug the controller methods
    // For example, test the index method:
    // $response = $controller->index();
    
    echo "Debug setup complete. You can now set breakpoints and debug.\n";
    
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
    echo "Stack trace: " . $e->getTraceAsString() . "\n";
}
