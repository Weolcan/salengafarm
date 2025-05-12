<?php

namespace Database\Seeders;

use App\Models\Plant;
use Illuminate\Database\Seeder;

class PlantSeeder extends Seeder
{
    public function run()
    {
        $plants = [
            [
                'name' => 'Sampaguita (Arabian Jasmine)',
                'description' => 'National flower of the Philippines, fragrant white flowers, perfect for gardens',
                'price' => 150.00,
                'quantity' => 50,
                'category' => 'shrub',
                'code' => 'SJ-001',
                'scientific_name' => 'Jasminum sambac',
                'height_mm' => 150,
                'spread_mm' => 100,
                'spacing_mm' => 50,
                'oc' => 'C3',
                'cost_per_sqm' => 100.00,
                'pieces_per_sqm' => 100,
                'cost_per_mm' => 0.50
            ],
            [
                'name' => 'Gumamela (Hibiscus)',
                'description' => 'Colorful tropical flower, commonly used for hedges and ornamental purposes',
                'price' => 200.00,
                'quantity' => 40,
                'category' => 'shrub',
                'code' => 'HB-001',
                'scientific_name' => 'Hibiscus rosa-sinensis',
                'height_mm' => 100,
                'spread_mm' => 80,
                'spacing_mm' => 60,
                'oc' => 'C3',
                'cost_per_sqm' => 120.00,
                'pieces_per_sqm' => 80,
                'cost_per_mm' => 0.60
            ],
            [
                'name' => 'Bougainvillea',
                'description' => 'Vibrant flowering vine, drought-resistant, ideal for Filipino gardens',
                'price' => 350.00,
                'quantity' => 30,
                'category' => 'vine',
                'code' => 'BV-001',
                'scientific_name' => 'Bougainvillea spectabilis',
                'height_mm' => 300,
                'spread_mm' => 200,
                'spacing_mm' => 100,
                'oc' => 'C3',
                'cost_per_sqm' => 150.00,
                'pieces_per_sqm' => 50,
                'cost_per_mm' => 0.70
            ],
            [
                'name' => 'San Francisco (Croton)',
                'description' => 'Colorful foliage plant with varied leaf patterns, low maintenance',
                'price' => 250.00,
                'quantity' => 45,
                'category' => 'shrub',
                'code' => 'CF-001',
                'scientific_name' => 'Codiaeum variegatum',
                'height_mm' => 100,
                'spread_mm' => 80,
                'spacing_mm' => 50,
                'oc' => 'C3',
                'cost_per_sqm' => 120.00,
                'pieces_per_sqm' => 70,
                'cost_per_mm' => 0.50
            ],
            [
                'name' => 'Mayana (Coleus)',
                'description' => 'Popular ornamental with colorful leaves, easy to grow',
                'price' => 100.00,
                'quantity' => 60,
                'category' => 'shrub',
                'code' => 'MC-001',
                'scientific_name' => 'Soleirolia soleirolii',
                'height_mm' => 50,
                'spread_mm' => 40,
                'spacing_mm' => 30,
                'oc' => 'C3',
                'cost_per_sqm' => 80.00,
                'pieces_per_sqm' => 100,
                'cost_per_mm' => 0.30
            ],
            [
                'name' => 'Fortune Plant (Money Tree)',
                'description' => 'Believed to bring good luck, popular indoor plant',
                'price' => 1500.00,
                'quantity' => 20,
                'category' => 'shrub',
                'code' => 'MP-001',
                'scientific_name' => 'Pachira aquatica',
                'height_mm' => 150,
                'spread_mm' => 100,
                'spacing_mm' => 50,
                'oc' => 'C3',
                'cost_per_sqm' => 1000.00,
                'pieces_per_sqm' => 20,
                'cost_per_mm' => 5.00
            ],
            [
                'name' => 'Caladium',
                'description' => 'Heart-shaped leaves with beautiful patterns, perfect for shaded areas',
                'price' => 180.00,
                'quantity' => 35,
                'category' => 'shrub',
                'code' => 'CL-001',
                'scientific_name' => 'Caladium bicolor',
                'height_mm' => 60,
                'spread_mm' => 40,
                'spacing_mm' => 30,
                'oc' => 'C3',
                'cost_per_sqm' => 120.00,
                'pieces_per_sqm' => 50,
                'cost_per_mm' => 0.40
            ],
            [
                'name' => 'Santan',
                'description' => 'Small flowering shrub with red, pink, or yellow blooms',
                'price' => 120.00,
                'quantity' => 55,
                'category' => 'shrub',
                'code' => 'ST-001',
                'scientific_name' => 'Santalum spp.',
                'height_mm' => 80,
                'spread_mm' => 60,
                'spacing_mm' => 40,
                'oc' => 'C3',
                'cost_per_sqm' => 100.00,
                'pieces_per_sqm' => 70,
                'cost_per_mm' => 0.30
            ],
            [
                'name' => 'Oregano',
                'description' => 'Medicinal and culinary herb, commonly grown in Filipino gardens',
                'price' => 80.00,
                'quantity' => 70,
                'category' => 'herb',
                'code' => 'OG-001',
                'scientific_name' => 'Origanum vulgare',
                'height_mm' => 30,
                'spread_mm' => 20,
                'spacing_mm' => 15,
                'oc' => 'C3',
                'cost_per_sqm' => 60.00,
                'pieces_per_sqm' => 100,
                'cost_per_mm' => 0.20
            ],
            [
                'name' => 'Monstera Deliciosa',
                'description' => 'Tropical plant with split leaves, popular indoor choice',
                'price' => 2500.00,
                'quantity' => 15,
                'category' => 'tree',
                'code' => 'MD-001',
                'scientific_name' => 'Monstera deliciosa',
                'height_mm' => 200,
                'spread_mm' => 150,
                'spacing_mm' => 100,
                'oc' => 'C3',
                'cost_per_sqm' => 1500.00,
                'pieces_per_sqm' => 15,
                'cost_per_mm' => 10.00
            ],
            [
                'name' => 'Cactus (Various)',
                'description' => 'Low maintenance succulents, perfect for sunny spots',
                'price' => 150.00,
                'quantity' => 40,
                'category' => 'succulent',
                'code' => 'CA-001',
                'scientific_name' => 'Cactaceae',
                'height_mm' => 50,
                'spread_mm' => 40,
                'spacing_mm' => 30,
                'oc' => 'C3',
                'cost_per_sqm' => 100.00,
                'pieces_per_sqm' => 50,
                'cost_per_mm' => 0.30
            ],
            [
                'name' => 'Aloe Vera',
                'description' => 'Medicinal plant good for burns and skin care',
                'price' => 200.00,
                'quantity' => 45,
                'category' => 'succulent',
                'code' => 'AV-001',
                'scientific_name' => 'Aloe barbadensis',
                'height_mm' => 50,
                'spread_mm' => 40,
                'spacing_mm' => 30,
                'oc' => 'C3',
                'cost_per_sqm' => 120.00,
                'pieces_per_sqm' => 70,
                'cost_per_mm' => 0.40
            ]
        ];

        foreach ($plants as $plant) {
            Plant::create($plant);
        }
    }
}