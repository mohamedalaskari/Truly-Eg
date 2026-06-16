<?php

namespace Database\Seeders;

use App\Models\GalleryImage;
use Illuminate\Database\Seeder;

class GalleryImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $images = [
            ['image' => 'images/home/gallery-abu-simbel.png', 'alt' => 'Abu Simbel Temple'],
            ['image' => 'images/home/gallery-felucca.png', 'alt' => 'Nile Felucca'],
            ['image' => 'images/home/gallery-islamic-cairo.png', 'alt' => 'Islamic Cairo Architecture'],
            ['image' => 'images/home/gallery-bazaar.png', 'alt' => 'Bazaar Spices'],
            ['image' => 'images/home/gallery-coral.png', 'alt' => 'Red Sea Coral'],
        ];

        foreach ($images as $index => $image) {
            GalleryImage::create($image + ['order' => $index]);
        }
    }
}
