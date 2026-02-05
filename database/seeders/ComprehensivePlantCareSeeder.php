<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\DisplayPlant;

class ComprehensivePlantCareSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * 
     * This seeder contains comprehensive care information for all plants.
     * To add care info for a new plant, simply add it to the appropriate category array.
     */
    public function run(): void
    {
        // Get all plant care data organized by category
        $plantCareData = array_merge(
            $this->getShrubsData(),
            $this->getHerbsData(),
            $this->getVeggiesData(),
            $this->getFruitsData(),
            $this->getPalmsData(),
            $this->getTreesData(),
            $this->getGrassData(),
            $this->getBambooData(),
            $this->getFertilizerData()
        );

        $updated = 0;
        $notFound = 0;

        foreach ($plantCareData as $plantName => $careData) {
            // Try to find in display_plants first
            $plant = DisplayPlant::where('name', $plantName)->first();
            
            if ($plant) {
                $plant->update($careData);
                $this->command->info("✓ Updated: {$plantName}");
                $updated++;
            } else {
                $this->command->warn("✗ Not found in display_plants: {$plantName}");
                $notFound++;
            }
        }

        $this->command->info("\n=== Summary ===");
        $this->command->info("Updated: {$updated} plants");
        $this->command->warn("Not found: {$notFound} plants");
        $this->command->info("Plant care information seeding completed!");
    }

    private function getShrubsData(): array
    {
        return [
            'AGLAONEMA' => [
                'care_watering' => 'Water when top 1-2 inches of soil is dry, typically once a week. Reduce watering in winter. Avoid overwatering as it can cause root rot.',
                'care_sunlight' => 'Thrives in low to medium indirect light. Can tolerate low light conditions. Avoid direct sunlight which can scorch leaves.',
                'care_soil' => 'Well-draining potting mix with peat moss and perlite. Prefers slightly acidic soil (pH 5.6-6.5).',
                'care_temperature' => 'Ideal temperature: 65-80°F (18-27°C). Avoid temperatures below 60°F (15°C). Protect from cold drafts.',
                'care_humidity' => 'Prefers moderate to high humidity (60-70%). Mist leaves regularly or use a humidity tray.',
                'care_fertilizing' => 'Feed monthly during spring and summer with balanced liquid fertilizer diluted to half strength.',
                'care_pruning' => 'Remove yellow or damaged leaves at the base. Prune to maintain shape and encourage bushier growth.',
                'care_propagation' => 'Propagate through stem cuttings or division. Best done in spring. Root cuttings in water or moist soil.',
                'care_pests' => 'Watch for spider mites, mealybugs, and scale. Treat with insecticidal soap or neem oil.',
                'care_growth_rate' => 'Slow to moderate grower. Reaches 1-3 feet tall indoors. Repot every 2-3 years.',
                'care_toxicity' => 'Toxic to pets and humans if ingested. Contains calcium oxalate crystals. Keep away from children and pets.',
                'care_notes' => 'Excellent air purifier. Very low maintenance and perfect for beginners. Variegated varieties need slightly more light.',
            ],
            'BLUE PLUMBAGO' => [
                'care_watering' => 'Water regularly during growing season, allowing soil to dry slightly between waterings. Drought-tolerant once established.',
                'care_sunlight' => 'Full sun to partial shade. Blooms best with 6+ hours of direct sunlight.',
                'care_soil' => 'Well-draining soil. Tolerates various soil types including sandy and clay. pH 6.0-7.5.',
                'care_temperature' => 'Hardy in zones 8-11. Prefers 60-85°F (15-29°C). Dies back in frost but returns from roots.',
                'care_humidity' => 'Tolerates average to high humidity. Adaptable to various conditions.',
                'care_fertilizing' => 'Feed monthly during growing season with balanced fertilizer. Promotes abundant flowering.',
                'care_pruning' => 'Prune in late winter or early spring. Cut back by 1/3 to maintain shape. Deadhead spent flowers.',
                'care_propagation' => 'Propagate from softwood cuttings in spring or summer. Also spreads by underground stems.',
                'care_pests' => 'Generally pest-free. Occasionally affected by spider mites or whiteflies.',
                'care_growth_rate' => 'Fast grower. Can reach 6-10 feet tall and wide. Blooms spring through fall.',
                'care_toxicity' => 'Generally non-toxic but may cause mild stomach upset if ingested.',
                'care_notes' => 'Beautiful sky-blue flowers attract butterflies. Excellent for hedges, borders, or containers.',
            ],
            'BOSTON FERN' => [
                'care_watering' => 'Keep soil consistently moist but not soggy. Water when top inch feels dry. Mist regularly.',
                'care_sunlight' => 'Bright indirect light. Avoid direct sunlight which burns fronds. Tolerates low light.',
                'care_soil' => 'Rich, well-draining potting mix with peat moss. Prefers slightly acidic soil (pH 5.0-5.5).',
                'care_temperature' => 'Ideal temperature: 60-75°F (15-24°C). Avoid temperatures below 50°F (10°C).',
                'care_humidity' => 'Requires high humidity (50-80%). Mist daily or use humidity tray. Low humidity causes brown fronds.',
                'care_fertilizing' => 'Feed monthly during growing season with diluted liquid fertilizer at half-strength.',
                'care_pruning' => 'Remove brown or dead fronds at the base. Trim runners to maintain shape.',
                'care_propagation' => 'Propagate by division in spring. Separate runners with roots attached.',
                'care_pests' => 'Watch for spider mites, mealybugs, and scale. Increase humidity to prevent spider mites.',
                'care_growth_rate' => 'Moderate grower. Can reach 2-3 feet tall and wide. Repot annually in spring.',
                'care_toxicity' => 'Non-toxic to pets and humans. Safe for homes with children and animals.',
                'care_notes' => 'Classic houseplant and excellent air purifier. Sensitive to chemicals in tap water - use filtered water.',
            ],
            'BOUGAINVILLEA' => [
                'care_watering' => 'Water deeply but infrequently. Allow soil to dry between waterings. Drought-tolerant once established.',
                'care_sunlight' => 'Full sun required. Needs at least 6 hours of direct sunlight daily for best flowering.',
                'care_soil' => 'Well-draining soil. Tolerates poor soil. pH 5.5-6.5. Add sand or perlite for drainage.',
                'care_temperature' => 'Hardy in zones 9-11. Prefers 70-85°F (21-29°C). Protect from frost.',
                'care_humidity' => 'Tolerates low to moderate humidity. Very adaptable to dry conditions.',
                'care_fertilizing' => 'Feed monthly with low-nitrogen, high-phosphorus fertilizer to promote blooming.',
                'care_pruning' => 'Prune after flowering to control size and shape. Wear gloves as thorns are sharp.',
                'care_propagation' => 'Propagate from semi-hardwood cuttings in spring or summer.',
                'care_pests' => 'Watch for aphids, caterpillars, and mealybugs. Generally pest-resistant.',
                'care_growth_rate' => 'Fast grower. Can reach 15-40 feet if not pruned. Blooms spring through fall.',
                'care_toxicity' => 'Sap may cause skin irritation. Mildly toxic if ingested. Keep away from pets and children.',
                'care_notes' => 'Spectacular colorful bracts. Stress from drought promotes better blooming. Excellent for tropical landscapes.',
            ],
            'PAPYRUS' => [
                'care_watering' => 'Loves water. Keep soil constantly moist or grow in standing water. Can grow in ponds. Never let soil dry out.',
                'care_sunlight' => 'Full sun to partial shade. Needs 4-6 hours of sunlight daily.',
                'care_soil' => 'Rich, heavy soil or aquatic planting medium. Can grow in pure water. pH 6.0-8.0.',
                'care_temperature' => 'Hardy in zones 9-11. Prefers 60-85°F (15-29°C). Protect from frost.',
                'care_humidity' => 'Loves high humidity. Perfect for water gardens, ponds, or bog gardens.',
                'care_fertilizing' => 'Feed monthly with aquatic plant fertilizer or balanced liquid fertilizer.',
                'care_pruning' => 'Remove dead or brown stems at base. Cut back in late winter. Divide clumps every 2-3 years.',
                'care_propagation' => 'Propagate by division of rhizomes. Can also root stem cuttings in water.',
                'care_pests' => 'Generally pest-free. Occasionally affected by aphids. Rinse with water to remove.',
                'care_growth_rate' => 'Fast grower. Reaches 4-8 feet tall. Can spread vigorously in ideal conditions.',
                'care_toxicity' => 'Non-toxic to humans and pets. Safe for water gardens with fish.',
                'care_notes' => 'Ancient plant used to make paper in Egypt. Distinctive umbrella-like flower heads. Excellent for water features.',
            ],
            'RED CANNA' => [
                'care_watering' => 'Water regularly to keep soil moist. Needs consistent moisture during growing season.',
                'care_sunlight' => 'Full sun to partial shade. Needs at least 4-6 hours of sunlight daily.',
                'care_soil' => 'Rich, moist soil with organic matter. Tolerates various soil types. pH 6.0-6.5.',
                'care_temperature' => 'Hardy in zones 7-11. Prefers 70-85°F (21-29°C). Rhizomes can be stored in cold climates.',
                'care_humidity' => 'Tolerates high humidity. Thrives in tropical and subtropical conditions.',
                'care_fertilizing' => 'Feed monthly with balanced fertilizer. High phosphorus promotes blooming.',
                'care_pruning' => 'Deadhead spent flowers. Remove dead leaves. Cut back to ground after frost.',
                'care_propagation' => 'Propagate by dividing rhizomes in spring. Each division should have 2-3 eyes.',
                'care_pests' => 'Watch for caterpillars, slugs, and Japanese beetles. Generally pest-resistant.',
                'care_growth_rate' => 'Fast grower. Reaches 3-6 feet tall. Blooms summer through fall.',
                'care_toxicity' => 'Mildly toxic if ingested. May cause digestive upset. Keep away from pets and children.',
                'care_notes' => 'Bold tropical appearance with large leaves and bright red flowers. Attracts hummingbirds and butterflies.',
            ],
            'SPIDER LILY' => [
                'care_watering' => 'Water regularly during growing season. Prefers consistently moist soil. Can grow in shallow water.',
                'care_sunlight' => 'Full sun to partial shade. Needs 4-6 hours of sunlight daily.',
                'care_soil' => 'Rich, moist to wet soil. Tolerates clay and sandy soils. pH 6.0-7.5.',
                'care_temperature' => 'Hardy in zones 8-11. Prefers 65-85°F (18-29°C). Protect from hard frost.',
                'care_humidity' => 'Prefers high humidity. Excellent for water features and coastal gardens.',
                'care_fertilizing' => 'Feed in spring with balanced fertilizer. Apply compost annually.',
                'care_pruning' => 'Remove spent flowers and dead leaves. Cut back foliage after frost. Divide clumps every 3-4 years.',
                'care_propagation' => 'Propagate by dividing bulbs in spring or fall. Separate offsets and replant.',
                'care_pests' => 'Generally pest-free. Occasionally affected by slugs or snails.',
                'care_growth_rate' => 'Moderate grower. Reaches 1-2 feet tall. Blooms in summer with fragrant white flowers.',
                'care_toxicity' => 'All parts toxic if ingested. Contains alkaloids. Keep away from children and pets.',
                'care_notes' => 'Stunning white spider-like flowers with sweet fragrance. Excellent for water gardens and wet areas.',
            ],
            'GOLDEN PANDANUS' => [
                'care_watering' => 'Water when top inch of soil is dry. Drought-tolerant once established.',
                'care_sunlight' => 'Full sun to partial shade. Golden color develops best in bright light.',
                'care_soil' => 'Well-draining sandy or loamy soil. Tolerates poor soil and salt. pH 6.0-7.5.',
                'care_temperature' => 'Hardy in zones 10-11. Prefers 60-85°F (15-29°C). Protect from frost.',
                'care_humidity' => 'Tolerates low to high humidity. Very adaptable to coastal conditions.',
                'care_fertilizing' => 'Feed 2-3 times per year with balanced fertilizer.',
                'care_pruning' => 'Remove dead or damaged leaves at base. Wear gloves as leaves have sharp spines.',
                'care_propagation' => 'Propagate from offshoots (pups) that form at base.',
                'care_pests' => 'Generally pest-resistant. Occasionally affected by scale or mealybugs.',
                'care_growth_rate' => 'Slow to moderate grower. Can reach 6-15 feet tall.',
                'care_toxicity' => 'Non-toxic but leaves have sharp spines. Handle with care.',
                'care_notes' => 'Striking golden-striped foliage. Excellent architectural plant. Very salt and wind tolerant.',
            ],
            'GOLDEN MIAGOS' => [
                'care_watering' => 'Water regularly to keep soil evenly moist during growing season. Reduce watering in winter.',
                'care_sunlight' => 'Full sun to partial shade. Needs 4-6 hours of sunlight daily for best color.',
                'care_soil' => 'Well-draining, fertile soil. pH 6.0-7.0. Add organic matter for nutrients.',
                'care_temperature' => 'Tropical plant. Prefers 65-85°F (18-29°C). Protect from frost.',
                'care_humidity' => 'Prefers moderate to high humidity. Mist regularly if growing indoors.',
                'care_fertilizing' => 'Feed monthly during growing season with balanced fertilizer.',
                'care_pruning' => 'Prune to maintain shape and size. Remove dead or damaged leaves.',
                'care_propagation' => 'Propagate from stem cuttings. Root in water or moist soil.',
                'care_pests' => 'Watch for aphids, mealybugs, and spider mites. Treat with insecticidal soap.',
                'care_growth_rate' => 'Moderate grower. Reaches 2-4 feet tall. Compact growth habit.',
                'care_toxicity' => 'Generally non-toxic but verify specific variety.',
                'care_notes' => 'Attractive golden-yellow foliage. Excellent for adding color to gardens and containers.',
            ],
            // Add more shrubs as needed...
        ];
    }

    private function getHerbsData(): array
    {
        return [
            'BASIL' => [
                'care_watering' => 'Water regularly to keep soil consistently moist but not waterlogged. Water at the base to avoid wetting leaves.',
                'care_sunlight' => 'Requires 6-8 hours of direct sunlight daily. Can tolerate partial shade in hot climates.',
                'care_soil' => 'Rich, well-draining soil with organic matter. pH 6.0-7.0. Add compost for nutrients.',
                'care_temperature' => 'Thrives in warm temperatures: 70-90°F (21-32°C). Very sensitive to frost.',
                'care_humidity' => 'Prefers moderate humidity (40-60%). Good air circulation prevents fungal diseases.',
                'care_fertilizing' => 'Feed every 2-3 weeks with balanced liquid fertilizer or fish emulsion.',
                'care_pruning' => 'Pinch off flower buds to encourage leaf growth. Harvest regularly from the top.',
                'care_propagation' => 'Easy to propagate from stem cuttings in water. Roots develop in 1-2 weeks.',
                'care_pests' => 'Watch for aphids, Japanese beetles, and slugs. Use organic pest control.',
                'care_growth_rate' => 'Fast grower. Reaches 12-24 inches tall. Ready to harvest in 3-4 weeks.',
                'care_toxicity' => 'Non-toxic to humans and pets. Safe for culinary use. Rich in vitamins and antioxidants.',
                'care_notes' => 'Popular culinary herb. Best flavor before flowering. Harvest in morning after dew dries.',
            ],
            'BAY LEAF' => [
                'care_watering' => 'Water when top inch of soil is dry. Prefers slightly dry conditions over wet.',
                'care_sunlight' => 'Full sun to partial shade. Needs at least 4-6 hours of sunlight daily.',
                'care_soil' => 'Well-draining soil with sand or perlite. pH 6.0-7.0.',
                'care_temperature' => 'Hardy in zones 8-10. Prefers 60-75°F (15-24°C). Protect from hard frost.',
                'care_humidity' => 'Tolerates average humidity. Mist occasionally if growing indoors.',
                'care_fertilizing' => 'Feed monthly during growing season with balanced fertilizer.',
                'care_pruning' => 'Prune in spring to maintain shape and size. Can be trained as topiary.',
                'care_propagation' => 'Propagate from semi-hardwood cuttings in summer. Very slow from seeds.',
                'care_pests' => 'Generally pest-resistant. Watch for scale insects and psyllids.',
                'care_growth_rate' => 'Slow grower. Can reach 10-60 feet outdoors but easily kept smaller in containers.',
                'care_toxicity' => 'Leaves are safe for culinary use when dried. Non-toxic to humans.',
                'care_notes' => 'Essential culinary herb. Leaves have better flavor when dried. Harvest mature leaves year-round.',
            ],
            'CAT\'S WHISKERS' => [
                'care_watering' => 'Water regularly to keep soil evenly moist. Increase watering during hot weather.',
                'care_sunlight' => 'Full sun to partial shade. Needs 4-6 hours of sunlight daily.',
                'care_soil' => 'Well-draining, fertile soil rich in organic matter. pH 6.0-7.0.',
                'care_temperature' => 'Tropical plant. Prefers 65-85°F (18-29°C). Not frost-tolerant.',
                'care_humidity' => 'Prefers moderate to high humidity. Tolerates average humidity with regular watering.',
                'care_fertilizing' => 'Feed every 2-3 weeks during growing season with balanced liquid fertilizer.',
                'care_pruning' => 'Deadhead spent flowers to encourage more blooms. Pinch tips to promote bushier growth.',
                'care_propagation' => 'Easy to propagate from stem cuttings. Root in water or moist soil.',
                'care_pests' => 'Generally pest-free. Occasionally affected by aphids or whiteflies.',
                'care_growth_rate' => 'Moderate to fast grower. Reaches 2-4 feet tall. Blooms continuously in warm weather.',
                'care_toxicity' => 'Non-toxic. Used in traditional medicine. Safe around pets and children.',
                'care_notes' => 'Unique white or purple flowers with long stamens. Attracts butterflies. Medicinal herb for kidney health.',
            ],
            // Add more herbs as needed...
        ];
    }

    private function getVeggiesData(): array
    {
        return [
            // Add vegetable care data here
        ];
    }

    private function getFruitsData(): array
    {
        return [
            // Add fruit care data here
        ];
    }

    private function getPalmsData(): array
    {
        return [
            'DATE PALM' => [
                'care_watering' => 'Water deeply but infrequently. Allow soil to dry between waterings. Drought-tolerant once established.',
                'care_sunlight' => 'Full sun. Needs 6-8 hours of direct sunlight daily. Tolerates intense heat and sun.',
                'care_soil' => 'Well-draining sandy or loamy soil. Tolerates poor soil and salt. pH 6.0-8.0.',
                'care_temperature' => 'Hardy in zones 9-11. Tolerates extreme heat up to 120°F (49°C).',
                'care_humidity' => 'Tolerates low humidity. Very drought-resistant once established.',
                'care_fertilizing' => 'Feed 2-3 times per year with palm fertilizer containing micronutrients.',
                'care_pruning' => 'Remove only dead or damaged fronds. Never cut green fronds as it weakens the palm.',
                'care_propagation' => 'Propagate from offshoots (pups) at base. Can grow from seeds but takes many years.',
                'care_pests' => 'Watch for palm weevils, scale, and spider mites. Maintain palm health to prevent infestations.',
                'care_growth_rate' => 'Slow grower. Takes 4-8 years to produce fruit. Can reach 50-80 feet tall outdoors.',
                'care_toxicity' => 'Non-toxic. Produces edible dates. Safe around pets and children.',
                'care_notes' => 'Ancient fruit tree cultivated for thousands of years. Requires male and female trees for fruit production.',
            ],
        ];
    }

    private function getTreesData(): array
    {
        return [
            'KALUMPIT' => [
                'care_watering' => 'Water regularly when young. Once established, drought-tolerant. Deep watering encourages strong roots.',
                'care_sunlight' => 'Full sun. Needs at least 6 hours of direct sunlight daily.',
                'care_soil' => 'Well-draining soil. Tolerates various soil types including clay and sandy. pH 6.0-7.5.',
                'care_temperature' => 'Tropical tree. Prefers 70-95°F (21-35°C). Not frost-tolerant.',
                'care_humidity' => 'Prefers high humidity. Tolerates moderate humidity once established.',
                'care_fertilizing' => 'Feed young trees 2-3 times per year with balanced fertilizer.',
                'care_pruning' => 'Prune to shape when young. Remove dead or crossing branches.',
                'care_propagation' => 'Propagate from seeds or cuttings. Seeds germinate readily.',
                'care_pests' => 'Generally pest-resistant. Occasionally affected by caterpillars.',
                'care_growth_rate' => 'Fast grower. Can reach 30-50 feet tall. Provides quick shade.',
                'care_toxicity' => 'Non-toxic. Fruit is edible. Leaves used in traditional medicine.',
                'care_notes' => 'Native Philippine tree. Produces edible fruit. Excellent shade tree. Attracts birds and wildlife.',
            ],
        ];
    }

    private function getGrassData(): array
    {
        return [
            'PEANUT' => [
                'care_watering' => 'Water regularly to keep soil evenly moist, especially during flowering and pod development. Needs 1-2 inches per week.',
                'care_sunlight' => 'Full sun required. Needs 6-8 hours of direct sunlight daily for good yield.',
                'care_soil' => 'Well-draining, loose sandy loam. pH 5.9-6.3. Add calcium (gypsum) for better pod development.',
                'care_temperature' => 'Warm season crop. Needs 120-150 frost-free days. Optimal: 70-85°F (21-29°C).',
                'care_humidity' => 'Tolerates moderate humidity. Good air circulation prevents fungal diseases.',
                'care_fertilizing' => 'Low nitrogen needs (legume fixes own nitrogen). Apply phosphorus and potassium at planting.',
                'care_pruning' => 'No pruning needed. Allow plants to grow naturally. Avoid disturbing plants when pegs enter soil.',
                'care_propagation' => 'Grow from raw, unroasted peanut seeds. Plant 1-2 inches deep after last frost.',
                'care_pests' => 'Watch for aphids, thrips, and leaf miners. Use row covers early season.',
                'care_growth_rate' => 'Matures in 120-150 days. Harvest when leaves turn yellow.',
                'care_toxicity' => 'Non-toxic. Produces edible peanuts. Common allergen - handle with care.',
                'care_notes' => 'Unique growth habit - flowers above ground, pods develop underground. Excellent nitrogen-fixing cover crop.',
            ],
        ];
    }

    private function getBambooData(): array
    {
        return [
            'GIANT OR DRAGON' => [
                'care_watering' => 'Water regularly during growing season. Needs consistent moisture but well-drained soil.',
                'care_sunlight' => 'Full sun to partial shade. Prefers 4-6 hours of sunlight daily.',
                'care_soil' => 'Rich, well-draining soil with organic matter. pH 6.0-6.5. Mulch to retain moisture.',
                'care_temperature' => 'Hardy in zones 8-11. Tolerates temperatures down to 15°F (-9°C).',
                'care_humidity' => 'Prefers moderate to high humidity. Tolerates various humidity levels.',
                'care_fertilizing' => 'Feed in spring with high-nitrogen fertilizer. Apply compost or organic matter annually.',
                'care_pruning' => 'Remove dead or damaged culms at ground level. Thin crowded clumps to improve air circulation.',
                'care_propagation' => 'Propagate by division of clumps. Separate rhizomes with shoots attached. Best done in spring.',
                'care_pests' => 'Generally pest-resistant. Occasionally affected by aphids or mealybugs.',
                'care_growth_rate' => 'Very fast grower. Can grow 3-4 feet per day during peak season. Reaches 60-100 feet tall.',
                'care_toxicity' => 'Non-toxic. Shoots are edible when young. Safe around pets and children.',
                'care_notes' => 'One of the largest bamboo species. Clumping type (non-invasive). Used for construction and edible shoots.',
            ],
        ];
    }

    private function getFertilizerData(): array
    {
        return [
            'ORGANIC FERTILIZER' => [
                'care_watering' => 'Not applicable - this is a fertilizer product, not a living plant.',
                'care_sunlight' => 'Store in cool, dry place away from direct sunlight to maintain quality.',
                'care_soil' => 'Apply to soil as directed. Works with all soil types. Improves soil structure and fertility.',
                'care_temperature' => 'Store at room temperature. Keep away from extreme heat or cold.',
                'care_humidity' => 'Store in dry conditions. Keep container sealed to prevent moisture absorption.',
                'care_fertilizing' => 'This IS the fertilizer. Apply according to package directions. Use for vegetables, flowers, trees, and lawns.',
                'care_pruning' => 'Not applicable to fertilizer product.',
                'care_propagation' => 'Not applicable to fertilizer product.',
                'care_pests' => 'Store properly to prevent contamination. Keep away from pests and rodents.',
                'care_growth_rate' => 'Improves plant growth rate when applied correctly. Results visible in 2-4 weeks.',
                'care_toxicity' => 'Generally safe but avoid ingestion. Keep away from children and pets. Wash hands after handling.',
                'care_notes' => 'Organic fertilizer enriches soil with natural nutrients. Slow-release formula. Environmentally friendly.',
            ],
        ];
    }
}
