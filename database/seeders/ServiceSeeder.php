<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $services = [
            ['icon' => 'tour', 'title' => 'Guided Tours', 'description' => 'Expert Egyptologists at your side.'],
            ['icon' => 'directions_boat', 'title' => 'Nile Cruises', 'description' => 'Luxury sailing through history.'],
            ['icon' => 'landscape', 'title' => 'Desert Safari', 'description' => 'Adventure across golden dunes.'],
            ['icon' => 'beach_access', 'title' => 'Beach Vacations', 'description' => 'Serenity by the Red Sea.'],
            ['icon' => 'history_edu', 'title' => 'Historical Trips', 'description' => 'Deep dives into antiquity.'],
            ['icon' => 'commute', 'title' => 'Transportation', 'description' => 'Seamless VIP transfers.'],
            ['icon' => 'hotel', 'title' => 'Hotel Booking', 'description' => 'Hand-picked luxury stays.'],
            ['icon' => 'smart_toy', 'title' => 'AI Concierge', 'description' => '24/7 Intelligent assistance.'],
        ];

        foreach ($services as $index => $service) {
            Service::create($service + ['order' => $index]);
        }
    }
}
