<?php

require __DIR__.'/vendor/autoload.php';

$app = require_once __DIR__.'/bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

// First, delete the existing plants to avoid duplicates
App\Models\Plant::where('category', 'shrub')->delete();

$plants = [
    // 15 MAR 2022
    ['code' => 'AGCO', 'name' => 'AGLAONEMA', 'scientific_name' => 'AGLAONEMA COMMUTATUM', 'height_mm' => 500, 'spread_mm' => 600, 'spacing_mm' => 400, 'cost_per_sqm' => 8550, 'pieces_per_sqm' => 9, 'price' => 950],
    ['code' => 'BOSP', 'name' => 'BOUGAINVILLEA', 'scientific_name' => 'BOUGAINVILLEA SP.', 'height_mm' => 700, 'spread_mm' => 600, 'spacing_mm' => 400, 'cost_per_sqm' => 3500, 'pieces_per_sqm' => 1, 'price' => 3500],
    ['code' => 'CAIN', 'name' => 'RED CANNA', 'scientific_name' => 'CANNA INDICA', 'height_mm' => 700, 'spread_mm' => 500, 'spacing_mm' => 400, 'cost_per_sqm' => 10800, 'pieces_per_sqm' => 9, 'price' => 1200],
    ['code' => 'CYPA', 'name' => 'PAPYRUS', 'scientific_name' => 'CYPERUS PAPYRUS', 'height_mm' => 600, 'spread_mm' => 500, 'spacing_mm' => 300, 'cost_per_sqm' => 6750, 'pieces_per_sqm' => 9, 'price' => 750],
    ['code' => 'HYLI', 'name' => 'SPIDER LILY', 'scientific_name' => 'HYMENOCALLIS LITTORALIS', 'height_mm' => 600, 'spread_mm' => 400, 'spacing_mm' => 100, 'cost_per_sqm' => 350, 'pieces_per_sqm' => 24, 'price' => 15],
    ['code' => 'OMLI', 'name' => 'BOSTON FERN', 'scientific_name' => 'OSMOXYLUM LINEARE \'YELLOW\'', 'height_mm' => 500, 'spread_mm' => 400, 'spacing_mm' => 100, 'cost_per_sqm' => 3750, 'pieces_per_sqm' => 25, 'price' => 150],
    ['code' => '', 'name' => 'GOLDEN MIAGOS', 'scientific_name' => '-', 'height_mm' => 500, 'spread_mm' => 450, 'spacing_mm' => 350, 'cost_per_sqm' => 2160, 'pieces_per_sqm' => 9, 'price' => 240],
    ['code' => 'PASP', 'name' => 'GOLDEN PANDANUS', 'scientific_name' => 'PANDANUS SPP. GOLDEN', 'height_mm' => 500, 'spread_mm' => 400, 'spacing_mm' => 100, 'cost_per_sqm' => 3750, 'pieces_per_sqm' => 25, 'price' => 150],
    ['code' => 'PEAL', 'name' => 'GREEN FOUNTAIN GRASS', 'scientific_name' => 'PENNISETUM ALOPECUROIDES', 'height_mm' => 700, 'spread_mm' => 500, 'spacing_mm' => 400, 'cost_per_sqm' => 6750, 'pieces_per_sqm' => 9, 'price' => 750],
    ['code' => 'PESE', 'name' => 'RED COGON GRASS', 'scientific_name' => 'PENNISETUM SETACEUM \'RUBRUM\'', 'height_mm' => 600, 'spread_mm' => 500, 'spacing_mm' => 400, 'cost_per_sqm' => 6750, 'pieces_per_sqm' => 9, 'price' => 750],
    ['code' => 'PHSE', 'name' => 'SELLOUM', 'scientific_name' => 'PHILODENDRON SELLOUM', 'height_mm' => 800, 'spread_mm' => 600, 'spacing_mm' => 350, 'cost_per_sqm' => 8100, 'pieces_per_sqm' => 9, 'price' => 900],
    ['code' => 'PLAU', 'name' => 'BLUE PLUMBAGO', 'scientific_name' => 'PLUMBAGO AURICULATA', 'height_mm' => 400, 'spread_mm' => 350, 'spacing_mm' => 250, 'cost_per_sqm' => 12500, 'pieces_per_sqm' => 25, 'price' => 500],
    ['code' => 'SCAR', 'name' => 'HONGKONG SCHEFFLERA', 'scientific_name' => 'SCHEFFLERA ARBORICOLA', 'height_mm' => 400, 'spread_mm' => 300, 'spacing_mm' => 250, 'cost_per_sqm' => 6250, 'pieces_per_sqm' => 25, 'price' => 250],
    ['code' => 'SCAR', 'name' => 'GREEN SCHEFFLERA', 'scientific_name' => 'SCHEFFLERA ARBORICOLA', 'height_mm' => 500, 'spread_mm' => 400, 'spacing_mm' => 350, 'cost_per_sqm' => 2250, 'pieces_per_sqm' => 9, 'price' => 250],
    ['code' => 'SYCA', 'name' => 'EUGENIA', 'scientific_name' => 'SYZYGIUM CAMPANULATUM', 'height_mm' => 800, 'spread_mm' => 600, 'spacing_mm' => 500, 'cost_per_sqm' => 2500, 'pieces_per_sqm' => 5, 'price' => 500],
    ['code' => 'TYAN', 'name' => 'TYPHA', 'scientific_name' => 'TYPHA ANGUSTIFOLIA', 'height_mm' => 600, 'spread_mm' => 400, 'spacing_mm' => 300, 'cost_per_sqm' => 8550, 'pieces_per_sqm' => 9, 'price' => 950],
    ['code' => 'BOSP', 'name' => 'DWARF BOUGAINVILLEA', 'scientific_name' => 'BOUGAINVILLEA SP.', 'height_mm' => 800, 'spread_mm' => 800, 'spacing_mm' => 400, 'cost_per_sqm' => null, 'pieces_per_sqm' => null, 'price' => null],
    ['code' => 'HYLI', 'name' => 'SPIDER LILY', 'scientific_name' => 'HYMENOCALLIS LITTORALIS', 'height_mm' => 400, 'spread_mm' => 500, 'spacing_mm' => 200, 'cost_per_sqm' => null, 'pieces_per_sqm' => null, 'price' => null],
    ['code' => 'MUPA', 'name' => 'KAMUNING', 'scientific_name' => 'MURAYA PANICULATA', 'height_mm' => 600, 'spread_mm' => 600, 'spacing_mm' => 300, 'cost_per_sqm' => null, 'pieces_per_sqm' => null, 'price' => null],
    ['code' => 'PHMY', 'name' => 'MOUSETAIL PLANT', 'scientific_name' => 'PHYLLANTHUS MYRTIFOLIUS', 'height_mm' => 600, 'spread_mm' => 600, 'spacing_mm' => 300, 'cost_per_sqm' => null, 'pieces_per_sqm' => null, 'price' => null],
    ['code' => 'PIGU', 'name' => 'DWARF CAMACHILE', 'scientific_name' => 'HYMENOCALLIS LITTORALIS', 'height_mm' => 500, 'spread_mm' => 500, 'spacing_mm' => 200, 'cost_per_sqm' => null, 'pieces_per_sqm' => null, 'price' => null],
    
    // 2019
    ['code' => '', 'name' => 'ANGEL\'S WING', 'scientific_name' => '', 'height_mm' => 300, 'spread_mm' => null, 'spacing_mm' => null, 'cost_per_sqm' => null, 'pieces_per_sqm' => null, 'price' => 150],
    ['code' => '', 'name' => 'CUPHEA', 'scientific_name' => '', 'height_mm' => 200, 'spread_mm' => null, 'spacing_mm' => null, 'cost_per_sqm' => null, 'pieces_per_sqm' => null, 'price' => 15],
    ['code' => '', 'name' => 'YELLOW WATER PLANT', 'scientific_name' => '', 'height_mm' => 100, 'spread_mm' => null, 'spacing_mm' => null, 'cost_per_sqm' => null, 'pieces_per_sqm' => null, 'price' => 20],
    ['code' => '', 'name' => 'MAKI', 'scientific_name' => 'Podocarpus Macrophylla', 'height_mm' => 600, 'spread_mm' => null, 'spacing_mm' => null, 'cost_per_sqm' => null, 'pieces_per_sqm' => null, 'price' => 750, 'cost_per_mm' => 1.25],
    ['code' => '', 'name' => 'VAR. SCHEFFLERA', 'scientific_name' => '', 'height_mm' => 400, 'spread_mm' => null, 'spacing_mm' => null, 'cost_per_sqm' => null, 'pieces_per_sqm' => null, 'price' => 110],
    ['code' => '', 'name' => 'EUGENIA', 'scientific_name' => '', 'height_mm' => 800, 'spread_mm' => null, 'spacing_mm' => null, 'cost_per_sqm' => null, 'pieces_per_sqm' => null, 'price' => 100],
    ['code' => '', 'name' => 'WANDERING JEW', 'scientific_name' => '', 'height_mm' => 200, 'spread_mm' => null, 'spacing_mm' => null, 'cost_per_sqm' => null, 'pieces_per_sqm' => null, 'price' => 25],
    ['code' => '', 'name' => 'WHITE RAIN LILY', 'scientific_name' => '', 'height_mm' => 250, 'spread_mm' => null, 'spacing_mm' => null, 'cost_per_sqm' => null, 'pieces_per_sqm' => null, 'price' => 45],
    
    // 1 APR 2022
    ['code' => '', 'name' => 'YUCCA', 'scientific_name' => '', 'height_mm' => 600, 'spread_mm' => null, 'spacing_mm' => null, 'cost_per_sqm' => null, 'pieces_per_sqm' => null, 'price' => 500, 'cost_per_mm' => 0.83],
    
    // 25 APR 2022
    ['code' => '', 'name' => 'MAKI', 'scientific_name' => 'Podocarpus Macrophylla', 'height_mm' => 1800, 'spread_mm' => null, 'spacing_mm' => null, 'cost_per_sqm' => null, 'pieces_per_sqm' => null, 'price' => 450, 'cost_per_mm' => 0.25],
    
    // 20 Jun 2022
    ['code' => 'CRA', 'name' => 'RED CRINUM', 'scientific_name' => '', 'height_mm' => 800, 'spread_mm' => 1000, 'spacing_mm' => 600, 'cost_per_sqm' => null, 'pieces_per_sqm' => null, 'price' => null],
    ['code' => 'WET', 'name' => 'CREEPING DAISY', 'scientific_name' => '', 'height_mm' => 100, 'spread_mm' => 100, 'spacing_mm' => 100, 'cost_per_sqm' => null, 'pieces_per_sqm' => null, 'price' => null],
    ['code' => 'IRP', 'name' => 'YELLOW IRIS', 'scientific_name' => '', 'height_mm' => 300, 'spread_mm' => 150, 'spacing_mm' => 100, 'cost_per_sqm' => null, 'pieces_per_sqm' => null, 'price' => null],
    ['code' => 'EXC', 'name' => 'PICARRA', 'scientific_name' => '', 'height_mm' => 300, 'spread_mm' => 400, 'spacing_mm' => 300, 'cost_per_sqm' => null, 'pieces_per_sqm' => null, 'price' => null],
    
    // 16 Aug 2022
    ['code' => 'CRA', 'name' => 'RED CRINUM', 'scientific_name' => 'CRINUM ASIATICUM VAR. PROCEUM', 'height_mm' => null, 'spread_mm' => null, 'spacing_mm' => null, 'cost_per_sqm' => null, 'pieces_per_sqm' => null, 'price' => null],
    ['code' => 'ASN', 'name' => 'BIRD\'S NEST FERN', 'scientific_name' => 'ASPLENIUM NIDUS', 'height_mm' => null, 'spread_mm' => null, 'spacing_mm' => null, 'cost_per_sqm' => null, 'pieces_per_sqm' => null, 'price' => null],
    ['code' => 'CAL', 'name' => 'TOBACCO PLANT', 'scientific_name' => 'CALATHEA LUTEA', 'height_mm' => null, 'spread_mm' => null, 'spacing_mm' => null, 'cost_per_sqm' => null, 'pieces_per_sqm' => null, 'price' => null],
    ['code' => 'PHM', 'name' => 'JAPANESE BUSH', 'scientific_name' => 'PHYLLANTUS MYRTIFOLIUS', 'height_mm' => null, 'spread_mm' => null, 'spacing_mm' => null, 'cost_per_sqm' => null, 'pieces_per_sqm' => null, 'price' => null],
    ['code' => 'PHT', 'name' => 'PHILODENDRON TRICOLOR', 'scientific_name' => 'PHILODENDRON \'WEND-IMBE TRICOLOR\'', 'height_mm' => null, 'spread_mm' => null, 'spacing_mm' => null, 'cost_per_sqm' => null, 'pieces_per_sqm' => null, 'price' => null],
    ['code' => 'RHE', 'name' => 'RHAPIS', 'scientific_name' => 'RHAPIS EXCELSA', 'height_mm' => null, 'spread_mm' => null, 'spacing_mm' => null, 'cost_per_sqm' => null, 'pieces_per_sqm' => null, 'price' => null],
    ['code' => 'SPC', 'name' => 'PEACE LILY', 'scientific_name' => 'SPATHIPHYLLUM COMMUTATUM', 'height_mm' => null, 'spread_mm' => null, 'spacing_mm' => null, 'cost_per_sqm' => null, 'pieces_per_sqm' => null, 'price' => null],
];

$count = 0;
foreach ($plants as $plantData) {
    $plant = new App\Models\Plant();
    $plant->code = $plantData['code'] ?: 'N/A';
    $plant->name = $plantData['name'];
    $plant->scientific_name = $plantData['scientific_name'] ?: '-';
    $plant->height_mm = $plantData['height_mm'] ?? 0;
    $plant->spread_mm = $plantData['spread_mm'] ?? 0;
    $plant->spacing_mm = $plantData['spacing_mm'] ?? 0;
    $plant->cost_per_sqm = $plantData['cost_per_sqm'] ?? 0;
    $plant->pieces_per_sqm = $plantData['pieces_per_sqm'] ?? 0;
    $plant->price = $plantData['price'] ?? 0;
    $plant->cost_per_mm = $plantData['cost_per_mm'] ?? 0;
    $plant->category = 'shrub';
    $plant->quantity = 0;
    $plant->description = '';
    $plant->save();
    $count++;
    echo "✓ Added: {$plantData['name']}\n";
}

echo "\n✓ Successfully added {$count} shrub plants to the database!\n";
