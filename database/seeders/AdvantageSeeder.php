<?php

namespace Database\Seeders;

use App\Models\Advantage;
use Illuminate\Database\Seeder;

class AdvantageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $advantages = [
            ['icon' => 'person_pin', 'title' => 'Best Local Guides', 'description' => 'Passionate narrators of history with deep local roots.'],
            ['icon' => 'diamond', 'title' => 'Affordable Luxury', 'description' => 'Premium experiences accessible through curated pricing.'],
            ['icon' => 'support_agent', 'title' => '24/7 Global Support', 'description' => 'A dedicated team always within your reach.'],
            ['icon' => 'psychology', 'title' => 'AI Recommendations', 'description' => 'Personalized itineraries powered by travel intelligence.'],
        ];

        foreach ($advantages as $index => $advantage) {
            Advantage::create($advantage + ['order' => $index]);
        }
    }
}
