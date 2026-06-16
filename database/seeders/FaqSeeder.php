<?php

namespace Database\Seeders;

use App\Models\Faq;
use Illuminate\Database\Seeder;

class FaqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faqs = [
            [
                'question' => 'Can tours be fully customized?',
                'answer' => 'Absolutely. Every itinerary we create is a unique collaboration between your desires and our local expertise. We specialize in bespoke, non-linear travel paths.',
            ],
            [
                'question' => 'How does the AI Concierge work?',
                'answer' => 'Our AI Concierge is a real-time digital assistant integrated with our ground teams. It can translate, provide historical context on the fly, and manage all logistical changes instantly via your preferred messaging app.',
            ],
            [
                'question' => 'Are the Egyptologists certified?',
                'answer' => 'We only work with PhD-level or exceptionally high-ranking certified Egyptologists who possess not only the knowledge but the storytelling prowess to bring history to life.',
            ],
            [
                'question' => 'What is your safety protocol?',
                'answer' => 'Your safety is our paramount concern. We provide private security details for all high-profile trips and maintain constant communication with local authorities and satellite tracking for desert expeditions.',
            ],
        ];

        foreach ($faqs as $index => $faq) {
            Faq::create($faq + ['order' => $index]);
        }
    }
}
