<?php

require __DIR__.'/vendor/autoload.php';

$app = require_once __DIR__.'/bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

use App\Models\Plant;

$palms = [
    [
        'name' => 'DATE PALM',
        'code' => 'PHDA',
        'scientific_name' => 'PHOENIX DACTYLIFERA',
        'height_mm' => 1500,
        'spread_mm' => 2500,
        'spacing_mm' => 300,
        'cost_per_sqm' => 0,
        'pieces_per_sqm' => 0,
        'price' => 0,
        'cost_per_mm' => 0,
        'category' => 'palm',
    ],
    [
        'name' => 'ROYAL PALM',
        'code' => 'RORE',
        'scientific_name' => 'ROYSTONEA REGIA',
        'height_mm' => 5000, // OVER-ALL height
        'spread_mm' => 2000,
        'spacing_mm' => 350,
        'cost_per_sqm' => 0,
        'pieces_per_sqm' => 0,
        'price' => 0,
        'cost_per_mm' => 5,
        'category' => 'palm',
        'description' => 'OVER-ALL: 5000mm, TRUNK: 3000mm',
    ],
    [
        'name' => 'ANAHAW',
        'code' => '',
        'scientific_name' => '',
        'height_mm' => 2500,
        'spread_mm' => 0,
        'spacing_mm' => 0,
        'cost_per_sqm' => 0,
        'pieces_per_sqm' => 0,
        'price' => 15000,
        'cost_per_mm' => 0,
        'category' => 'palm',
    ],
    [
        'name' => 'ROYAL PALM',
        'code' => 'RORE',
        'scientific_name' => 'ROYSTONEA REGIA',
        'height_mm' => 3000,
        'spread_mm' => 0,
        'spacing_mm' => 0,
        'cost_per_sqm' => 0,
        'pieces_per_sqm' => 0,
        'price' => 9000,
        'cost_per_mm' => 0,
        'category' => 'palm',
        'description' => '3000mm height variant',
    ],
];

echo "Starting to add palm plants...\n\n";

foreach ($palms as $palmData) {
    try {
        // For ROYAL PALM, we need to check by both name and height since there are multiple variants
        if ($palmData['name'] == 'ROYAL PALM') {
            $existing = Plant::where('name', $palmData['name'])
                ->where('height_mm', $palmData['height_mm'])
                ->where('category', 'palm')
                ->first();
        } else {
            $existing = Plant::where('name', $palmData['name'])
                ->where('category', 'palm')
                ->first();
        }
        
        if ($existing) {
            echo "⚠ Skipped: {$palmData['name']} (height: {$palmData['height_mm']}mm) - already exists\n";
            continue;
        }
        
        // Create new palm
        Plant::create([
            'name' => $palmData['name'],
            'code' => $palmData['code'] ?: null,
            'scientific_name' => $palmData['scientific_name'] ?: null,
            'height_mm' => $palmData['height_mm'],
            'spread_mm' => $palmData['spread_mm'],
            'spacing_mm' => $palmData['spacing_mm'],
            'cost_per_sqm' => $palmData['cost_per_sqm'],
            'pieces_per_sqm' => $palmData['pieces_per_sqm'],
            'price' => $palmData['price'],
            'cost_per_mm' => $palmData['cost_per_mm'],
            'category' => $palmData['category'],
            'quantity' => 0,
            'description' => $palmData['description'] ?? '',
        ]);
        
        echo "✓ Added: {$palmData['name']} (height: {$palmData['height_mm']}mm, price: ₱{$palmData['price']})\n";
        
    } catch (Exception $e) {
        echo "✗ Error adding {$palmData['name']}: " . $e->getMessage() . "\n";
    }
}

echo "\n✓ Successfully completed palm restoration!\n";
echo "Total palms processed: " . count($palms) . "\n";
