<?php

namespace Database\Seeders;

use App\Models\Testimonial;
use Illuminate\Database\Seeder;

class TestimonialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $testimonials = [
            [
                'name' => 'Elena Dubois',
                'location' => 'Paris, France',
                'initials' => 'ED',
                'rating' => 5,
                'content' => 'Our trip to Luxor was flawlessly executed. The blend of historical depth and modern luxury was exactly what we were looking for. Nile Odyssey is truly in a league of its own.',
            ],
            [
                'name' => 'Marcus Reed',
                'location' => 'New York, USA',
                'initials' => 'MR',
                'rating' => 5,
                'content' => 'The AI concierge was surprisingly helpful, helping us find the best local dining spots in Cairo after our tour. The guides were extremely knowledgeable.',
            ],
            [
                'name' => 'Sophia Kim',
                'location' => 'Seoul, Korea',
                'initials' => 'SK',
                'rating' => 5,
                'content' => 'Sailing the Nile on a private Dahabiya was the highlight of our decade. Absolute serenity, impeccable service, and breathtaking views every morning.',
            ],
        ];

        foreach ($testimonials as $index => $testimonial) {
            Testimonial::create($testimonial + ['order' => $index]);
        }
    }
}
