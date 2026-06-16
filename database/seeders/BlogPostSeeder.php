<?php

namespace Database\Seeders;

use App\Models\BlogPost;
use Illuminate\Database\Seeder;

class BlogPostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $posts = [
            [
                'title' => 'Exploring Luxor: The Heart of Ancient Egypt',
                'slug' => 'exploring-luxor-heart-of-ancient-egypt',
                'image' => 'images/destinations/dest-luxor.png',
                'excerpt' => "Often called the world's greatest open-air museum, Luxor sits on the site of ancient Thebes and holds more pharaonic monuments than anywhere else on earth.",
                'category' => 'Destinations',
                'tags' => ['Luxor', 'Nile Valley', 'Ancient Egypt', 'Temples'],
                'author_name' => 'Layla Mansour',
                'author_role' => 'Experience Director',
                'author_image' => 'images/about/team-layla-mansour.png',
                'reading_time' => '5 min read',
                'content' => [
                    'intro' => "Few places on earth compress so much history into so small an area as Luxor. Once the capital of pharaonic Egypt under the name Thebes, the modern city straddles the Nile between a living East Bank and the great funerary landscape of the West Bank - a division that still shapes how visitors experience it today.",
                    'sections' => [
                        [
                            'heading' => 'A City Divided by the Nile',
                            'image' => 'images/about/hero-luxor-temple-sunset.png',
                            'body' => "Ancient Egyptians believed the sun's daily journey - rising in the east and setting in the west - mirrored the cycle of life and death. They built accordingly: the temples of Karnak and Luxor, dedicated to the living gods and pharaohs, rose on the East Bank, while the West Bank became a vast necropolis of tombs and mortuary temples. That same geography defines Luxor today, with the bustling modern town facing the quiet hills where pharaohs were laid to rest.",
                        ],
                        [
                            'heading' => 'Karnak and Luxor Temples',
                            'body' => 'Karnak is the largest religious complex ever built, its Hypostyle Hall containing 134 columns so massive that several people can stand inside the carved capitals. A short distance away, Luxor Temple was once connected to Karnak by a two-mile avenue lined with sphinxes, much of which has now been excavated and reopened to visitors.',
                        ],
                        [
                            'heading' => 'The Valley of the Kings',
                            'body' => 'Across the river, the Valley of the Kings holds more than sixty tombs cut into the limestone hills, including the small but spectacularly decorated tomb of Tutankhamun. Each tomb follows a similar plan - a long corridor descending toward a burial chamber - but the painted scenes inside vary enormously, offering a vivid record of how each pharaoh imagined the afterlife.',
                        ],
                        [
                            'heading' => 'Making the Most of Your Visit',
                            'body' => 'Most travelers underestimate how much time Luxor deserves. A minimum of two full days allows for an early start at the West Bank tombs before the heat sets in, an afternoon at Karnak, and an evening at Luxor Temple when the columns are lit dramatically against the night sky. A sunrise hot air balloon ride over the West Bank is, for many visitors, the single most memorable moment of their entire trip to Egypt.',
                        ],
                    ],
                    'conclusion' => "Luxor rewards travelers who slow down. Beyond the headline monuments, the city's open-air museum quality means history is woven into everyday life - donkeys still cross fields within sight of three-thousand-year-old temple walls. Give it the time it deserves, and Luxor will likely become the highlight of your Egyptian journey.",
                ],
                'published_at' => '2020-10-03',
            ],
            [
                'title' => 'The Great Pyramids of Giza: A Comprehensive Exploration',
                'slug' => 'great-pyramids-of-giza-comprehensive-exploration',
                'image' => 'images/trips/trip-pyramid-heritage.png',
                'excerpt' => "The last surviving wonder of the ancient world, the pyramids of Giza have fascinated travelers for over four thousand years. Here's what makes them so extraordinary.",
                'category' => 'History & Heritage',
                'tags' => ['Pyramids', 'Giza', 'Ancient Egypt', 'Sphinx'],
                'author_name' => 'Dr. Omar Farouk',
                'author_role' => 'Lead Egyptologist',
                'author_image' => 'images/about/team-omar-farouk.png',
                'reading_time' => '7 min read',
                'content' => [
                    'intro' => 'Rising from the desert on the edge of modern Cairo, the pyramids of Giza are the only one of the Seven Wonders of the Ancient World still standing. Built more than 4,500 years ago, they remain among the most precisely engineered structures ever created - and they still guard a few secrets we have yet to fully understand.',
                    'sections' => [
                        [
                            'heading' => 'Historical Origins',
                            'image' => 'images/home/hero-pyramids.png',
                            'body' => 'The three main pyramids were built during Egypt\'s Fourth Dynasty for the pharaohs Khufu, Khafre, and Menkaure, roughly between 2580 and 2510 BCE. The Great Pyramid of Khufu was the tallest man-made structure on earth for nearly 4,000 years, a record unbroken until the construction of Lincoln Cathedral in the 14th century.',
                        ],
                        [
                            'heading' => 'Architectural Marvels',
                            'body' => "Each side of the Great Pyramid's base is aligned to the cardinal points with an accuracy of a fraction of a degree, and the structure contains an estimated 2.3 million limestone and granite blocks, some weighing as much as 80 tons. How these blocks were quarried, transported, and raised into place using only Bronze Age tools remains one of engineering history's most studied questions.",
                        ],
                        [
                            'heading' => 'The Great Sphinx and Its Significance',
                            'body' => 'Carved from a single outcrop of limestone, the Great Sphinx has the body of a lion and a human head believed to represent the pharaoh Khafre. For the ancient Egyptians it served as a guardian figure for the pyramid complex, watching over the necropolis and the eastern horizon where the sun rose each day.',
                        ],
                        [
                            'heading' => 'Tips for Visiting',
                            'body' => 'Arrive at opening time to avoid both the crowds and the heat, and allow at least half a day to see the three pyramids, the Sphinx, and the nearby Solar Boat Museum. Camel and horse rides around the plateau are widely available, and the evening Sound and Light Show offers a different perspective on the monuments after dark.',
                        ],
                    ],
                    'conclusion' => "More than four millennia after they were built, the pyramids of Giza still convey the ambition of the civilization that raised them. Whether it's your first glimpse of Egypt or your fifth, standing beside blocks of stone larger than a car, placed with millimeter precision by hand, is an experience that never loses its power.",
                ],
                'published_at' => '2024-09-18',
            ],
            [
                'title' => 'Karnak Temple Complex: Marveling at the Grandeur of Luxor\'s Largest Temple',
                'slug' => 'karnak-temple-complex-grandeur-of-luxors-largest-temple',
                'image' => 'images/about/mission-archaeological-discovery.png',
                'excerpt' => 'Built and expanded by generations of pharaohs over two thousand years, Karnak is the largest religious complex ever constructed - and Luxor\'s most awe-inspiring site.',
                'category' => 'History & Heritage',
                'tags' => ['Karnak', 'Luxor', 'Temples', 'Hieroglyphics'],
                'author_name' => 'Dr. Omar Farouk',
                'author_role' => 'Lead Egyptologist',
                'author_image' => 'images/about/team-omar-farouk.png',
                'reading_time' => '6 min read',
                'content' => [
                    'intro' => 'On the East Bank of the Nile at Luxor lies Karnak, a temple complex so vast that it could comfortably contain ten European cathedrals. Unlike most ancient monuments, Karnak was not built by a single ruler - it grew over more than two thousand years as successive pharaohs added their own halls, pylons, and obelisks.',
                    'sections' => [
                        [
                            'heading' => 'A Temple Built by Generations',
                            'body' => "Construction at Karnak began around 2000 BCE and continued for two millennia, with more than thirty pharaohs contributing additions. Each new ruler sought to leave a mark larger than their predecessor's, resulting in a complex that grew outward in every direction - a layered record of Egyptian history carved in stone.",
                        ],
                        [
                            'heading' => 'The Great Hypostyle Hall',
                            'image' => 'images/about/mission-archaeological-discovery.png',
                            'body' => 'The most famous part of Karnak is its Hypostyle Hall, a forest of 134 massive columns covering an area large enough to hold the cathedral of Notre Dame. The central columns rise over 21 meters and are carved and painted with scenes of the pharaohs making offerings to the gods, much of the original color still visible in protected areas.',
                        ],
                        [
                            'heading' => 'The Avenue of Sphinxes',
                            'body' => 'A processional avenue once lined with thousands of ram-headed and human-headed sphinxes connected Karnak to Luxor Temple nearly three kilometers away. Long buried beneath the modern town, large sections of the avenue have been excavated in recent decades and are now open to visitors walking the same route ancient priests once used during festival processions.',
                        ],
                        [
                            'heading' => 'Visiting Karnak Today',
                            'body' => 'Karnak rewards an early morning visit, both for the light on the columns and to avoid the midday heat in the open courtyards. In the evening, a Sound and Light Show guides visitors through the complex with narration and dramatic lighting - a striking way to appreciate the scale of the site after dark.',
                        ],
                    ],
                    'conclusion' => "Karnak is less a single temple than a timeline carved in stone, each pharaoh's contribution layered onto the last. Walking through its halls, it's possible to trace two thousand years of ancient Egyptian history in a single afternoon - making it, for many visitors, the most awe-inspiring site in all of Luxor.",
                ],
                'published_at' => '2022-07-01',
            ],
        ];

        foreach ($posts as $index => $post) {
            BlogPost::create($post + ['order' => $index]);
        }
    }
}
