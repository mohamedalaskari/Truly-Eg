<?php

namespace Database\Seeders;

use App\Models\TeamMember;
use Illuminate\Database\Seeder;

class TeamMemberSeeder extends Seeder
{
    public function run(): void
    {
        $teamMembers = [
            [
                'name' => 'Dr. Omar Farouk',
                'role' => 'Lead Egyptologist',
                'bio' => 'Ph.D. in New Kingdom archaeology with 20 years of field experience.',
                'image' => 'images/about/team-omar-farouk.png',
            ],
            [
                'name' => 'Layla Mansour',
                'role' => 'Experience Director',
                'bio' => 'Expert in high-end hospitality and bespoke luxury itinerary design.',
                'image' => 'images/about/team-layla-mansour.png',
            ],
            [
                'name' => 'Ahmed Hassan',
                'role' => 'Chief Concierge',
                'bio' => "Dedicated to fulfilling every traveler's request with precision and grace.",
                'image' => 'images/about/team-ahmed-hassan.png',
            ],
            [
                'name' => 'Nora Selim',
                'role' => 'Sustainability Lead',
                'bio' => 'Ensuring our impact is as positive as the journeys we create.',
                'image' => 'images/about/team-nora-selim.png',
            ],
        ];

        foreach ($teamMembers as $index => $teamMember) {
            TeamMember::create($teamMember + ['order' => $index]);
        }
    }
}
