<?php

namespace Database\Seeders;

use App\Models\Destination;
use Illuminate\Database\Seeder;

class DestinationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Destination::query()->delete();

        $commonInfo = [
            'country' => 'Egypt',
            'language' => 'Arabic',
            'currency' => 'Egyptian Pound (E£)',
            'time_zone' => 'Eastern European Time (UTC+2)',
            'calling_code' => '+20',
            'drives_on' => 'Right',
        ];

        $destinations = [
            [
                'name' => 'Cairo',
                'slug' => 'cairo',
                'description' => "The beating heart of Egypt where modern skyscrapers shadow ancient minarets and the Great Pyramids stand as eternal sentinels of the desert.",
                'image' => 'images/destinations/dest-cairo.png',
                'gallery' => [
                    'images/home/hero-pyramids.png',
                    'images/home/gallery-islamic-cairo.png',
                    'images/home/gallery-bazaar.png',
                ],
                'history' => "Known to Egyptians as Umm al-Dunya, 'Mother of the World', Cairo was founded by the Fatimid dynasty in 969 CE, though the area has been continuously inhabited since the founding of Memphis nearby over 4,000 years earlier. As successive dynasties layered mosques, palaces, and citadels onto its medieval core, Cairo grew into the largest city in Africa and the cultural capital of the Arab world, all while the Pyramids of Giza have watched over it from the desert's edge for more than 4,500 years.",
                'attractions' => [
                    ['title' => 'The Pyramids of Giza & The Great Sphinx', 'description' => 'The last surviving wonder of the ancient world, the Pyramids of Khufu, Khafre, and Menkaure rise from the desert alongside the enigmatic Great Sphinx. Arrive at sunrise for the clearest views and the smallest crowds.'],
                    ['title' => 'The Egyptian Museum', 'description' => 'Home to over 120,000 artifacts spanning five thousand years, including the dazzling treasures recovered from the tomb of Tutankhamun. A guided visit helps make sense of the museum\'s vast, densely packed galleries.'],
                    ['title' => 'Khan el-Khalili Bazaar', 'description' => 'A labyrinth of narrow lanes in the heart of Islamic Cairo, this centuries-old market has traded in spices, gold, and handcrafted souvenirs since the 14th century. Stop for mint tea at the historic El Fishawy café.'],
                    ['title' => 'Islamic Cairo & Al-Azhar Mosque', 'description' => 'Wander past minarets, madrasas, and mausoleums along Al-Muizz Street, one of the world\'s richest concentrations of medieval Islamic architecture, anchored by the thousand-year-old Al-Azhar Mosque and University.'],
                    ['title' => 'Saqqara & the Step Pyramid of Djoser', 'description' => 'A short drive from Giza, Saqqara\'s Step Pyramid is the world\'s oldest large-scale stone monument and the birthplace of pyramid-building, set within a sprawling necropolis of tombs and temples.'],
                ],
                'cultural_experiences' => [
                    ['title' => 'Sunset Felucca Sail on the Nile', 'description' => 'Drift past the city skyline aboard a traditional wooden felucca as the call to prayer rises over the river at dusk - a timeless Cairo ritual.'],
                    ['title' => 'Traditional Egyptian Cuisine', 'description' => 'Sample koshari, ful medames, and freshly grilled kofta at a local eatery, then unwind with shisha and karkadeh (hibiscus tea) at a downtown ahwa.'],
                    ['title' => 'Tanoura & Sufi Dance Show', 'description' => 'Catch a mesmerizing whirling Tanoura performance at the Wikala El Ghouri cultural center, a centuries-old Sufi tradition set to live percussion and chanting.'],
                ],
                'travel_tips' => [
                    ['title' => 'Best Time to Visit', 'description' => 'October through April brings mild, comfortable temperatures for sightseeing - summer months can exceed 40°C (104°F).'],
                    ['title' => 'Getting Around', 'description' => 'Ride-hailing apps such as Uber and Careem are widely available and far more reliable than hailing a street taxi.'],
                    ['title' => 'Mosque Etiquette', 'description' => 'Dress modestly when visiting mosques - shoulders and knees covered, and a headscarf for women. Shoes are removed before entering prayer halls.'],
                ],
                'conclusion' => "From the timeless silhouette of the Pyramids to the bustling alleys of Khan el-Khalili, Cairo distills the full sweep of Egyptian history into a single, unforgettable city. It's the essential starting point for any journey through Egypt - and a destination worth lingering in on its own.",
                'info' => $commonInfo + ['best_time_to_visit' => 'October - April'],
                'map_position' => ['top' => '15%', 'left' => '60%', 'lat' => 30.0444, 'lng' => 31.2357, 'zoom' => 12],
                'col_span' => 8,
                'aspect_class' => 'aspect-[16/9]',
                'card_size' => 'large',
            ],
            [
                'name' => 'Luxor',
                'slug' => 'luxor',
                'description' => "The world's greatest open-air museum, home to the Valley of the Kings and the vast Karnak Temple complex.",
                'image' => 'images/destinations/dest-luxor.png',
                'gallery' => [
                    'images/about/hero-luxor-temple-sunset.png',
                    'images/contact/office-luxor-nile-sunset.png',
                ],
                'history' => "Ancient Thebes was the religious and political capital of Egypt during the New Kingdom, when pharaohs such as Ramesses II and Tutankhamun ruled from its temples and were laid to rest in the hills across the river. Today's Luxor occupies the same ground, with the living city on the East Bank facing the great necropolis of the West Bank - giving it an unmatched concentration of monumental architecture found nowhere else on earth.",
                'attractions' => [
                    ['title' => 'Karnak Temple Complex', 'description' => 'The largest religious building ever constructed, Karnak\'s Hypostyle Hall of 134 towering columns and avenue of ram-headed sphinxes were expanded by pharaohs over two thousand years.'],
                    ['title' => 'Valley of the Kings', 'description' => 'The royal burial ground of the New Kingdom holds more than 60 tombs, including that of Tutankhamun, their walls covered in vivid painted scenes guiding pharaohs into the afterlife.'],
                    ['title' => 'Luxor Temple', 'description' => 'Connected to Karnak by the Avenue of Sphinxes, this temple is especially striking after dark when its columns and statues are dramatically illuminated against the night sky.'],
                    ['title' => 'Temple of Hatshepsut', 'description' => 'Egypt\'s only female pharaoh built this strikingly modern-looking mortuary temple, its colonnaded terraces rising in tiers against the cliffs of Deir el-Bahari.'],
                    ['title' => 'Hot Air Balloon over the West Bank', 'description' => 'Drift silently above the Valley of the Kings and the green Nile floodplain at sunrise for a perspective on Luxor\'s monuments found no other way.'],
                ],
                'cultural_experiences' => [
                    ['title' => 'Karnak Sound & Light Show', 'description' => 'An evening walk through the illuminated temple complex, narrated with the stories of the pharaohs who built it.'],
                    ['title' => 'Felucca Sunset Sail', 'description' => 'Glide along the Nile as the sun sets behind the West Bank hills, a quiet counterpoint to a day among the temples.'],
                    ['title' => 'Alabaster & Papyrus Workshops', 'description' => 'Visit a family-run workshop on the West Bank to watch artisans hand-carve alabaster vessels and paint papyrus in techniques passed down for generations.'],
                ],
                'travel_tips' => [
                    ['title' => 'Beat the Heat', 'description' => 'Start sightseeing at dawn - temples have minimal shade and afternoons can be punishingly hot, especially May through September.'],
                    ['title' => 'Combo Ticket Passes', 'description' => 'A Luxor Pass covers entry to most East and West Bank sites and is more economical than paying per-site if visiting several tombs and temples.'],
                    ['title' => 'Hire a Licensed Egyptologist', 'description' => 'A qualified guide brings the hieroglyphs and reliefs to life - look for guides registered with the Ministry of Tourism and Antiquities.'],
                ],
                'conclusion' => "No city on earth holds a denser concentration of pharaonic monuments than Luxor. Spend at least three days here, splitting your time between the temples of the East Bank and the tombs of the West Bank, and the scale of ancient Egypt's ambition will stay with you long after you leave.",
                'info' => $commonInfo + ['best_time_to_visit' => 'October - April'],
                'map_position' => ['top' => '65%', 'left' => '55%', 'lat' => 25.6872, 'lng' => 32.6396, 'zoom' => 13],
                'col_span' => 4,
                'aspect_class' => 'aspect-[3/4] md:aspect-auto',
                'card_size' => 'small',
            ],
            [
                'name' => 'Aswan',
                'slug' => 'aswan',
                'description' => 'A peaceful riverside retreat where the Nile is at its most beautiful, weaving through granite islands and Nubian villages.',
                'image' => 'images/destinations/dest-aswan.png',
                'gallery' => [
                    'images/destinations/dest-aswan.png',
                    'images/home/gallery-felucca.png',
                ],
                'history' => "Egypt's southernmost city has guarded the country's frontier since antiquity, when its granite quarries supplied the obelisks and colossal statues found throughout the Nile Valley. Aswan's Nubian heritage - rooted in the kingdoms of ancient Nubia to the south - gives the city a distinct culture, cuisine, and music found nowhere else in Egypt, while the calm waters of the Nile here are framed by smooth granite boulders and palm-covered islands.",
                'attractions' => [
                    ['title' => 'Philae Temple', 'description' => 'Dedicated to the goddess Isis, this elegant temple complex was relocated stone by stone to Agilkia Island to save it from the rising waters of the Aswan High Dam - reached by a short boat ride.'],
                    ['title' => 'Aswan High Dam', 'description' => 'One of the largest dams in the world, its visitor terrace offers sweeping views over Lake Nasser and an introduction to the engineering feat that reshaped Egypt\'s modern history.'],
                    ['title' => 'Unfinished Obelisk', 'description' => 'Still lying in the quarry where it cracked during carving nearly 3,500 years ago, this would-be obelisk reveals exactly how ancient Egyptians worked granite on a monumental scale.'],
                    ['title' => 'Nubian Villages', 'description' => 'Take a boat to the colorful, hand-painted houses of Elephantine Island or the West Bank, where Nubian families welcome visitors for tea and traditional music.'],
                    ['title' => 'Abu Simbel Day Trip', 'description' => 'A three-hour journey (or short flight) brings you to Ramesses II\'s colossal rock-cut temples, famously realigned to preserve their twice-yearly solar alignment.'],
                ],
                'cultural_experiences' => [
                    ['title' => 'Felucca Sailing Among the Islands', 'description' => 'Aswan\'s calm waters and granite islets make for some of the most scenic felucca sailing on the entire Nile, especially around sunset.'],
                    ['title' => 'Nubian Music & Tea', 'description' => 'Join a small gathering in a Nubian home for traditional songs played on the tar drum and oud, paired with hibiscus tea and home-baked bread.'],
                    ['title' => 'Aswan Souq', 'description' => 'A spice-scented market street selling saffron, henna, dried hibiscus, and woven baskets - quieter and more local than Cairo\'s bazaars.'],
                ],
                'travel_tips' => [
                    ['title' => 'Plan Early for Abu Simbel', 'description' => 'Most tours depart around 4am to reach Abu Simbel by sunrise and avoid the midday heat - book a comfortable vehicle for the long drive.'],
                    ['title' => 'Sun Protection is Essential', 'description' => 'Aswan is regularly Egypt\'s hottest city. Carry water, wear a wide-brimmed hat, and schedule outdoor activities for early morning or late afternoon.'],
                    ['title' => 'Bargaining is Customary', 'description' => 'Prices in the souq are rarely fixed - a friendly, patient negotiation is part of the shopping experience.'],
                ],
                'conclusion' => "Aswan's slower pace, Nubian culture, and dramatic granite landscapes make it the perfect counterpoint to Luxor's monumental temples. Whether sailing at sunset or standing before the colossi of Abu Simbel, Aswan rewards travelers who linger a little longer.",
                'info' => $commonInfo + ['best_time_to_visit' => 'November - March'],
                'map_position' => ['top' => '80%', 'left' => '58%', 'lat' => 24.0889, 'lng' => 32.8998, 'zoom' => 13],
                'col_span' => 4,
                'aspect_class' => 'aspect-[3/4] md:aspect-auto',
                'card_size' => 'small',
            ],
            [
                'name' => 'Hurghada',
                'slug' => 'hurghada',
                'description' => 'Vibrant coral reefs and azure waters define this Red Sea paradise, offering world-class diving and boutique coastal living.',
                'image' => 'images/destinations/dest-hurghada.png',
                'gallery' => [
                    'images/services/service-beach-vacations.png',
                    'images/home/gallery-coral.png',
                ],
                'history' => "What began as a small fishing village on the Red Sea coast in the early 20th century has grown into Egypt's premier beach resort destination, drawing divers and sun-seekers from around the world. Its transformation was driven by the extraordinary marine life just offshore - vibrant coral gardens and clear, warm waters that rank among the best diving and snorkeling destinations on the planet.",
                'attractions' => [
                    ['title' => 'Giftun Island & Marine Park', 'description' => 'A short boat ride from the marina brings you to powder-white beaches and protected coral gardens teeming with reef fish, ideal for snorkeling straight off the sand.'],
                    ['title' => 'Red Sea Coral Reefs & Diving Sites', 'description' => 'From shallow house reefs to dramatic drop-offs and wrecks, Hurghada\'s dive sites suit everyone from first-timers to advanced divers chasing dolphins and reef sharks.'],
                    ['title' => 'Mahmya Island', 'description' => 'A picture-perfect island beach with turquoise shallows, sun loungers, and a relaxed beach-club atmosphere - popular for full-day boat excursions.'],
                    ['title' => 'Sahl Hasheesh Marina', 'description' => 'A polished waterfront promenade of restaurants, cafés, and boutiques set against a backdrop of yachts and Andalusian-style architecture.'],
                    ['title' => 'Eastern Desert Safari', 'description' => 'Swap the coast for the dunes on a 4x4 safari to a Bedouin camp, with quad biking, camel rides, and a traditional dinner under the stars.'],
                ],
                'cultural_experiences' => [
                    ['title' => 'Sunset Yacht Cruise', 'description' => 'Sail along the coastline as the sky turns gold, often with onboard refreshments and a stop for a final swim before dark.'],
                    ['title' => 'Bedouin Desert Dinner', 'description' => 'Share a traditional meal at a desert camp followed by stargazing far from city lights - the Eastern Desert\'s night skies are remarkably clear.'],
                    ['title' => 'El Dahar Old Market', 'description' => 'Hurghada\'s original old town retains a more local, unpolished character, with spice stalls, textile shops, and street food away from the resort strip.'],
                ],
                'travel_tips' => [
                    ['title' => 'Use Reef-Safe Sunscreen', 'description' => 'Many dive and snorkel operators require mineral-based, reef-safe sunscreen to help protect the coral ecosystems you\'re there to see.'],
                    ['title' => 'Book Through Licensed Operators', 'description' => 'Choose dive centers and boat trips affiliated with recognized certification bodies for safety standards and marine park compliance.'],
                    ['title' => 'Visit in Shoulder Seasons', 'description' => 'March-May and September-November offer warm water and milder air temperatures than the intense heat of midsummer.'],
                ],
                'conclusion' => "Hurghada delivers everything a Red Sea escape promises - warm turquoise water, vibrant reefs just offshore, and a relaxed resort atmosphere - all within easy reach of Cairo and Luxor for travelers combining culture with coastline.",
                'info' => $commonInfo + ['best_time_to_visit' => 'March - May & September - November'],
                'map_position' => ['top' => '52%', 'left' => '78%', 'lat' => 27.2579, 'lng' => 33.8116, 'zoom' => 13],
                'col_span' => 8,
                'aspect_class' => 'aspect-[16/9]',
                'card_size' => 'large',
            ],
            [
                'name' => 'Siwa Oasis',
                'slug' => 'siwa-oasis',
                'description' => 'A hidden gem in the Western Desert, where ancient mud-brick fortresses overlook crystal salt lakes and palm-fringed springs.',
                'image' => 'images/destinations/dest-siwa-oasis.png',
                'gallery' => [
                    'images/destinations/dest-siwa-oasis.png',
                    'images/trips/trip-siwa-oasis.png',
                ],
                'history' => "Isolated deep in the Western Desert near the Libyan border, Siwa has preserved its own Berber-speaking Siwan culture, language, and customs for centuries. Its most famous moment came in 331 BCE, when Alexander the Great made the perilous journey across the sand sea to consult the Oracle of Amun - a temple whose ruins still stand above the oasis today.",
                'attractions' => [
                    ['title' => 'Shali Fortress', 'description' => 'The crumbling mud-brick ruins of Siwa\'s medieval hilltop citadel glow amber at sunset and offer panoramic views over the surrounding palm groves.'],
                    ['title' => "Cleopatra's Spring", 'description' => 'A natural spring-fed pool said to have been visited by Cleopatra herself - still a popular spot for a swim amid date palms.'],
                    ['title' => 'Temple of the Oracle', 'description' => 'Perched on the village of Aghurmi, this is where Alexander the Great famously sought confirmation of his divine status from the Oracle of Amun.'],
                    ['title' => 'The Great Sand Sea', 'description' => 'An immense expanse of towering dunes stretching toward Libya, best explored on a 4x4 safari with stops to sandboard or watch the sunset paint the dunes gold.'],
                    ['title' => 'Mountain of the Dead', 'description' => 'Gebel al-Mawta is honeycombed with rock-cut tombs from the Pharaonic, Ptolemaic, and Roman periods, several with well-preserved painted interiors.'],
                ],
                'cultural_experiences' => [
                    ['title' => 'Traditional Siwan House Visit', 'description' => 'Share a home-cooked meal with a local family and learn about Siwan customs, handwoven textiles, and silver jewelry traditions.'],
                    ['title' => 'Desert Stargazing', 'description' => 'With virtually no light pollution, Siwa\'s night skies reveal the Milky Way in striking detail - many eco-lodges offer rooftop stargazing.'],
                    ['title' => 'Olive & Date Harvest', 'description' => 'Siwa is famous for its olive groves and date palms; visiting during harvest season (autumn) offers a taste of the oasis\'s agricultural heart.'],
                ],
                'travel_tips' => [
                    ['title' => 'Plan for a Long Journey', 'description' => 'Siwa is roughly 8-10 hours from Cairo by road via Marsa Matruh - many visitors break the journey or fly to Mersa Matruh first.'],
                    ['title' => 'Dress Conservatively', 'description' => 'Siwa is a traditional, conservative community - modest clothing is appreciated, particularly for women, both in the village and at the springs.'],
                    ['title' => 'Pack for Cold Desert Nights', 'description' => 'Daytime desert heat gives way to surprisingly cold nights, especially in winter - bring warm layers even in summer for evening excursions.'],
                ],
                'conclusion' => "Siwa Oasis feels like a different country altogether - a world of palm groves, salt lakes, and Berber traditions hidden deep in the Sahara. For travelers seeking silence, starlit skies, and a culture unlike anywhere else in Egypt, the journey here is part of the reward.",
                'info' => $commonInfo + ['best_time_to_visit' => 'October - April'],
                'map_position' => ['top' => '40%', 'left' => '10%', 'lat' => 29.2000, 'lng' => 25.5167, 'zoom' => 13],
                'col_span' => 6,
                'aspect_class' => 'aspect-[4/3]',
                'card_size' => 'small',
            ],
            [
                'name' => 'Sharm El Sheikh',
                'slug' => 'sharm-el-sheikh',
                'description' => "The 'City of Peace' nestled between the Sinai mountains and the Red Sea, famous for its luxury resorts and vibrant nightlife.",
                'image' => 'images/destinations/dest-sharm-el-sheikh.png',
                'gallery' => [
                    'images/destinations/dest-sharm-el-sheikh.png',
                    'images/trips/trip-red-sea-diving.png',
                ],
                'history' => "Sharm El Sheikh sits at the southern tip of the Sinai Peninsula, where the dramatic desert mountains of Sinai meet the Red Sea. Once a small Bedouin fishing settlement, it grew rapidly from the 1980s into one of the world's foremost diving destinations, earning its Arabic nickname 'Madinat al-Salam' - the City of Peace - as a venue for international summits.",
                'attractions' => [
                    ['title' => 'Ras Mohammed National Park', 'description' => 'Egypt\'s first national park protects some of the Red Sea\'s most spectacular reef walls and drop-offs, where the Gulf of Suez meets the Gulf of Aqaba.'],
                    ['title' => 'Naama Bay', 'description' => 'Sharm\'s lively waterfront promenade is lined with restaurants, dive shops, and cafés overlooking a sheltered, sandy-bottomed bay.'],
                    ['title' => 'SS Thistlegorm Wreck', 'description' => 'One of the world\'s most famous wreck dives, this WWII British cargo ship still holds motorcycles, trucks, and railway carriages in its holds.'],
                    ['title' => 'Tiran Island', 'description' => 'A boat trip to the reefs surrounding Tiran Island offers dramatic walls and the chance to spot eagle rays and reef sharks in the strait between Sinai and Saudi Arabia.'],
                    ['title' => 'Old Market (Sharm El Maya)', 'description' => 'A more low-key alternative to Naama Bay, with spice shops, souvenir stalls, and local cafés around the old fishing harbor.'],
                ],
                'cultural_experiences' => [
                    ['title' => 'Bedouin Tea in the Sinai Mountains', 'description' => 'Join a Bedouin family for traditional tea and bread in the mountains above Sharm, with views across the desert toward the Red Sea.'],
                    ['title' => 'Sunset Camel Ride', 'description' => 'Trek along the coastline by camel as the sun dips behind the Sinai peaks - a classic Sharm evening activity.'],
                    ['title' => 'Soho Square', 'description' => 'An entertainment plaza with fountains, restaurants, and live shows, popular for an evening out away from the beach.'],
                ],
                'travel_tips' => [
                    ['title' => 'Certification for Deep Dives', 'description' => 'Wreck and deep-water sites like the Thistlegorm require an advanced certification - many dive centers offer courses if you arrive uncertified.'],
                    ['title' => "Day Trip to St. Catherine's", 'description' => 'The monastery and Mount Sinai are a feasible (if long) day trip from Sharm for travelers interested in the peninsula\'s spiritual history.'],
                    ['title' => 'Marine Park Fees', 'description' => 'Diving and snorkeling in protected areas like Ras Mohammed involves a marine park fee, usually arranged through your dive center.'],
                ],
                'conclusion' => "With reef walls dropping straight from the shore and mountains rising behind the resorts, Sharm El Sheikh pairs world-class diving with easy resort comforts. It's an ideal base for marine adventures - and for a glimpse of the Sinai's older, quieter desert culture just beyond the hotels.",
                'info' => $commonInfo + ['best_time_to_visit' => 'March - May & September - November'],
                'map_position' => ['top' => '38%', 'left' => '88%', 'lat' => 27.9158, 'lng' => 34.3299, 'zoom' => 13],
                'col_span' => 6,
                'aspect_class' => 'aspect-[4/3]',
                'card_size' => 'small',
            ],
        ];

        foreach ($destinations as $index => $destination) {
            Destination::create($destination + ['order' => $index]);
        }
    }
}
