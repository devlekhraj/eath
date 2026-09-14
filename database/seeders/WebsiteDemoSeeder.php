<?php

namespace Database\Seeders;

use Carbon\CarbonImmutable;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class WebsiteDemoSeeder extends Seeder
{
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        DB::table('journey_month')->truncate();
        DB::table('experience_journey')->truncate();
        DB::table('guide_journey')->truncate();
        DB::table('article_journey')->truncate();
        DB::table('journey_departures')->truncate();
        DB::table('journey_itinerary_days')->truncate();
        DB::table('journey_itinerary_highlights')->truncate();
        DB::table('journey_highlights')->truncate();
        DB::table('journey_prices')->truncate();
        DB::table('journey_services')->truncate();
        DB::table('article_sections')->truncate();
        DB::table('articles')->truncate();
        DB::table('article_categories')->truncate();
        DB::table('traveler_stories')->truncate();
        DB::table('faqs')->truncate();
        DB::table('website_page_sections')->truncate();
        DB::table('website_pages')->truncate();
        DB::table('website_sections')->truncate();
        DB::table('website_settings')->truncate();
        DB::table('journey_safety_items')->truncate();
        DB::table('journeys')->truncate();
        DB::table('guides')->truncate();
        DB::table('travel_months')->truncate();
        DB::table('experience_highlights')->truncate();
        DB::table('experience_prep_questions')->truncate();
        DB::table('experiences')->truncate();
        DB::table('destination_logistics')->truncate();
        DB::table('destinations')->truncate();
        Schema::enableForeignKeyConstraints();

        $catalog = $this->readJson('packages/website/src/Data/website-catalog.json');
        $content = $this->readJson('packages/website/src/Data/website-content.json');
        $detailedCatalog = file_exists(base_path('packages/website/src/Data/trek-detailed-catalog.php'))
            ? require base_path('packages/website/src/Data/trek-detailed-catalog.php')
            : [];
        $detailedDestinations = file_exists(base_path('packages/website/src/Data/destination-detailed-catalog.php'))
            ? require base_path('packages/website/src/Data/destination-detailed-catalog.php')
            : [];

        $destinationIds = $this->seedDestinations($catalog['regions'] ?? [], $detailedDestinations);
        $this->seedDestinationLogistics($destinationIds);
        $experienceIds = $this->seedExperiences($catalog['experiences'] ?? []);
        $monthIds = $this->seedMonths($catalog['months'] ?? []);
        $guideIds = $this->seedGuides($content['guides'] ?? []);
        $journeyIds = $this->seedJourneys($catalog['treks'] ?? [], $destinationIds, $guideIds, $detailedCatalog);

        $this->seedJourneyRelations($catalog['treks'] ?? [], $journeyIds, $experienceIds, $monthIds, $catalog['departure_templates'] ?? []);
        $articleIds = $this->seedArticles($content['articles'] ?? [], $journeyIds);
        $this->seedStories($content['stories'] ?? [], $journeyIds, $destinationIds);
        $this->seedFaqs($content['faqs'] ?? [], $journeyIds);
        $this->seedWebsitePages();
        $this->seedSettings($content['brand'] ?? []);
    }

    protected function readJson(string $path): array
    {
        return json_decode(file_get_contents(base_path($path)), true) ?: [];
    }

    protected function seedDestinations(array $regions, array $detailedDestinations = []): array
    {
        $ids = [];
        foreach ($regions as $index => $region) {
            $key = $region['id'] ?? $region['slug'];
            $detailed = $detailedDestinations[$key] ?? $detailedDestinations[$region['slug']] ?? [];

            $id = DB::table('destinations')->insertGetId([
                'name' => $detailed['name'] ?? $region['name'],
                'slug' => $detailed['slug'] ?? $region['slug'],
                'region_label' => $detailed['region_label'] ?? null,
                'summary' => $detailed['summary'] ?? ($region['intro'] ?? null),
                'description' => $detailed['description'] ?? ($region['intro'] ?? null),
                'gateway' => $detailed['gateway'] ?? null,
                'trailheads' => $detailed['trailheads'] ?? null,
                'permits' => $detailed['permits'] ?? null,
                'pacing_note' => $detailed['pacing_note'] ?? null,
                'meta_title' => $detailed['meta_title'] ?? ("{$region['name']} Region | E.A.T.H. Travels"),
                'meta_description' => $detailed['meta_description'] ?? ($detailed['summary'] ?? null),
                'sort_order' => $index + 1,
                'is_featured' => true,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            $ids[$region['id']] = $id;
        }

        return $ids;
    }

    protected function seedExperiences(array $experiences): array
    {
        $details = [
            'mountain-scenery' => [
                'emphasis' => 'This travel theme emphasizes sweeping alpine vistas, glacial amphitheaters, and front-row perspectives of 8,000-meter Himalayan giants. Routes prioritize viewpoints like Kala Patthar, Gokyo Ri, and high sanctuary ridges where expansive mountain panoramas define the journey.',
                'cues' => 'Ideal for travelers motivated by open mountain horizons, dramatic summit silhouettes, and ridge-top vantage points.',
                'cta_title' => 'Ready to Experience Himalayan Mountain Scenery Up Close?',
                'cta_description' => 'Connect with our alpine expedition leaders to design a personalized Himalayan trekking itinerary tailored to your fitness and schedule.',
                'cta_primary_btn_text' => 'Plan Your Expedition',
                'cta_primary_btn_url' => '/plan-your-trip?mode=discover&experience=mountain-scenery',
                'cta_secondary_btn_text' => 'Compare Shortlisted Routes',
                'cta_secondary_btn_url' => '/compare',
                'highlights' => [
                    ['title' => 'Big Mountain Panoramas', 'description' => 'Unobstructed vistas of iconic peaks including Everest, Lhotse, Annapurna, and Dhaulagiri.'],
                    ['title' => 'Glacial Amphitheaters', 'description' => 'Hiking alongside moraines, hanging icefields, and high-altitude cirques.'],
                    ['title' => 'Iconic Viewpoint Ascents', 'description' => 'Morning walks to prominent outlook summits designed for 360-degree mountain visibility.'],
                ],
                'prep_questions' => [
                    ['title' => 'Morning Cold Readiness', 'body' => 'Are you prepared with insulated thermal layers and wind protection for sub-zero sunrise viewpoint walks?'],
                    ['title' => 'Terrain Comfort', 'body' => 'Are your trekking boots broken in for uneven moraine paths, loose gravel, and rocky ridgelines?'],
                    ['title' => 'Altitude Pacing', 'body' => 'Do you have schedule flexibility to maintain conservative ascent rates above 4,000 meters?'],
                ],
            ],
            'cultural-trails' => [
                'emphasis' => 'This travel theme emphasizes deep immersion in Himalayan heritage, ancient Buddhist monasteries, stone chortens, and welcoming Sherpa, Gurung, and Tamang mountain villages. It prioritizes meaningful village interactions and learning about high-altitude spiritual traditions.',
                'cues' => 'Suited for curious travelers who value heritage, monastic architecture, traditional agricultural terraces, and local storytelling as much as alpine topography.',
                'cta_title' => 'Immerse Yourself in Authentic Himalayan Cultures',
                'cta_description' => 'Explore ancient monastic heritage and vibrant mountain communities with our native local guides.',
                'cta_primary_btn_text' => 'Explore Cultural Itineraries',
                'cta_primary_btn_url' => '/plan-your-trip?mode=discover&experience=cultural-trails',
                'cta_secondary_btn_text' => 'Talk to an Expert',
                'cta_secondary_btn_url' => '/contact',
                'highlights' => [
                    ['title' => 'Living Monastic Traditions', 'description' => 'Visiting centuries-old gompas, attending morning prayers, and observing Buddhist ritual.'],
                    ['title' => 'Indigenous Village Life', 'description' => 'Experiencing daily rhythms in stone-built settlements with terraced barley and potato fields.'],
                    ['title' => 'Sacred Trail Features', 'description' => 'Walking clockwise past historic mani stone walls, prayer wheels, and chortens.'],
                ],
                'prep_questions' => [
                    ['title' => 'Cultural Etiquette', 'body' => 'Are you prepared to respect local customs, such as asking before taking portraits and walking clockwise around sacred structures?'],
                    ['title' => 'Modest Teahouse Stays', 'body' => 'Are you comfortable dining family-style around central wood stoves in village lodges?'],
                    ['title' => 'Engaged Pacing', 'body' => 'Are you willing to allocate time during walking days to stop at heritage sites and village museums?'],
                ],
            ],
            'quiet-trails' => [
                'emphasis' => 'This travel theme emphasizes secluded valley paths, lower-footprint alternative routes, and peaceful pine-forested ridgelines off the high-traffic express corridors. It offers a calmer, introspective trail rhythm.',
                'cues' => 'Ideal for hikers seeking stillness, natural soundscapes, and personal space away from bustling teahouse junctions.',
                'cta_title' => 'Seek Stillness on Nepal\'s Secluded Ridges',
                'cta_description' => 'Experience deep Himalayan tranquility far from standard trekking highways.',
                'cta_primary_btn_text' => 'Discover Quiet Trails',
                'cta_primary_btn_url' => '/plan-your-trip?mode=discover&experience=quiet-trails',
                'cta_secondary_btn_text' => 'Compare Routes',
                'cta_secondary_btn_url' => '/compare',
                'highlights' => [
                    ['title' => 'Intimate Trail Flow', 'description' => 'Walking with fewer trail encounters and quiet forest atmospheres.'],
                    ['title' => 'Alternative Route Network', 'description' => 'Traversing lateral ridges like Khopra Danda or pristine valleys like Langtang.'],
                    ['title' => 'Authentic Small-Lodge Hospitality', 'description' => 'Staying in community-managed lodges and family-run teahouses.'],
                ],
                'prep_questions' => [
                    ['title' => 'Simpler Amenities', 'body' => 'Are you comfortable with more rustic lodge facilities, shared bathrooms, and basic menus on less commercial routes?'],
                    ['title' => 'Self-Contained Pace', 'body' => 'Do you enjoy walking without the commercial hubs and bakeries found on mainstream tourist corridors?'],
                    ['title' => 'Trail Flexibility', 'body' => 'Are you adaptable to minor trail adjustments based on seasonal village livestock movements?'],
                ],
            ],
            'short-treks' => [
                'emphasis' => 'This travel theme emphasizes compact, highly rewarding itineraries under 8 to 10 days that deliver authentic Himalayan immersion within limited vacation windows. Routes prioritize quick access, rapid transitions to alpine ridges, and manageable physical pacing.',
                'cues' => 'Perfect for travelers with limited total days in Nepal who want to experience high viewpoints, rhododendron forests, and teahouse hospitality without multi-week commitments.',
                'cta_title' => 'Experience the Himalayas in 4 to 8 Days',
                'cta_description' => 'Discover fast-access high viewpoints and authentic teahouse culture on our compact guided routes.',
                'cta_primary_btn_text' => 'Plan a Short Trek',
                'cta_primary_btn_url' => '/plan-your-trip?mode=discover&experience=short-treks',
                'cta_secondary_btn_text' => 'Browse All Treks',
                'cta_secondary_btn_url' => '/treks',
                'highlights' => [
                    ['title' => 'Time-Efficient Access', 'description' => 'Reaching dramatic alpine ridge crests like Mardi Himal in under a week of trail time.'],
                    ['title' => 'Accessible Altitude Profiles', 'description' => 'Substantial mountain panoramas with lower exposure to extreme altitude strain.'],
                    ['title' => 'Comfortable Infrastructure', 'description' => 'Well-supported teahouses with convenient staging from Kathmandu or Pokhara.'],
                ],
                'prep_questions' => [
                    ['title' => 'Buffer Scheduling', 'body' => 'Does your international flight schedule allow 1–2 days buffer in Kathmandu for transit contingencies?'],
                    ['title' => 'Daily Ascent Readiness', 'body' => 'Are your legs prepared for concentrated daily elevation gain to reach viewpoints in fewer days?'],
                    ['title' => 'Minimalist Packing', 'body' => 'Can you travel light with a compact daypack suited for streamlined short itineraries?'],
                ],
            ],
            'photography' => [
                'emphasis' => 'This travel theme emphasizes deliberate walking paces, golden hour viewpoints, and varied Himalayan landscape textures. Routes are chosen for outstanding sunrise and sunset mountain illumination, mirrored alpine lakes, and traditional architectural details.',
                'cues' => 'Tailored for photographers and visual storytellers wanting unhurried schedules, time for tripod setups, and routes known for dramatic morning and sunset light.',
                'cta_title' => 'Capture Dramatic Himalayan Light & Landscapes',
                'cta_description' => 'Join photography-focused itineraries crafted around prime vantage points, golden hour light, and comfortable pacing.',
                'cta_primary_btn_text' => 'Plan Photography Trek',
                'cta_primary_btn_url' => '/plan-your-trip?mode=discover&experience=photography',
                'cta_secondary_btn_text' => 'Contact Our Team',
                'cta_secondary_btn_url' => '/contact',
                'highlights' => [
                    ['title' => 'Golden Hour Viewpoints', 'description' => 'Strategic lodge placements near ridge viewpoints for early morning and evening light.'],
                    ['title' => 'Diverse Visual Textures', 'description' => 'Contrasting turquoise glacial lakes, prayer-flagged passes, and rugged canyon cliffs.'],
                    ['title' => 'Unhurried Trail Rhythm', 'description' => 'Schedules structured with buffer time to observe weather shifts and capture golden light.'],
                ],
                'prep_questions' => [
                    ['title' => 'Battery Management', 'body' => 'Have you planned for cold-weather battery drainage with power banks and thermal camera wraps?'],
                    ['title' => 'Weight Distribution', 'body' => 'Is your camera kit safely balanced with personal trekking essentials in a supportive daypack?'],
                    ['title' => 'Lens Selection', 'body' => 'Do you have a versatile zoom range to capture both wide landscapes and peak details?'],
                ],
            ],
            'iconic-routes' => [
                'emphasis' => 'This travel theme highlights the world-renowned, bucket-list Himalayan trails that have inspired mountaineering lore for over seven decades. Routes feature well-established teahouse infrastructure, historic trailheads, and legendary base camps.',
                'cues' => 'Recommended for trekkers seeking the milestone achievement of legendary trails like Everest Base Camp or Annapurna Base Camp, with clear waymarking and rich mountaineering history.',
                'cta_title' => 'Trek Legendary Himalayan Corridors',
                'cta_description' => 'Experience iconic milestone routes with professional Sherpa leadership, premium teahouse bookings, and safety gear.',
                'cta_primary_btn_text' => 'Plan Classic Trek',
                'cta_primary_btn_url' => '/plan-your-trip?mode=discover&experience=iconic-routes',
                'cta_secondary_btn_text' => 'Compare Shortlisted Routes',
                'cta_secondary_btn_url' => '/compare',
                'highlights' => [
                    ['title' => 'Legendary Milestones', 'description' => 'Standing beneath the Khumbu Icefall or inside the sacred Annapurna Sanctuary.'],
                    ['title' => 'Rich Expedition Lore', 'description' => 'Following the footsteps of Hillary, Tenzing, Herzog, and generations of Sherpa mountaineers.'],
                    ['title' => 'Developed Infrastructure', 'description' => 'Reliable teahouse networks, diverse menus, and established emergency evacuation protocols.'],
                ],
                'prep_questions' => [
                    ['title' => 'Trail Activity Awareness', 'body' => 'Are you prepared for lively teahouse dining halls and encountering fellow international hikers during peak seasons?'],
                    ['title' => 'Milestone Dedication', 'body' => 'Are you motivated to sustain 12 to 16 days of progressive high-altitude trekking to reach your goal?'],
                    ['title' => 'Comparison Readiness', 'body' => 'Have you evaluated iconic routes side-by-side with alternative paths to ensure the experience fits your priorities?'],
                ],
            ],
        ];

        $ids = [];
        foreach ($experiences as $index => $experience) {
            $slug = $experience['slug'];
            $expDetail = $details[$slug] ?? [];

            $id = DB::table('experiences')->insertGetId([
                'name' => $experience['name'],
                'slug' => $slug,
                'summary' => $experience['intro'] ?? null,
                'description' => $experience['intro'] ?? null,
                'emphasis' => $expDetail['emphasis'] ?? null,
                'cues' => $expDetail['cues'] ?? null,
                'cta_title' => $expDetail['cta_title'] ?? null,
                'cta_description' => $expDetail['cta_description'] ?? null,
                'cta_primary_btn_text' => $expDetail['cta_primary_btn_text'] ?? null,
                'cta_primary_btn_url' => $expDetail['cta_primary_btn_url'] ?? null,
                'cta_secondary_btn_text' => $expDetail['cta_secondary_btn_text'] ?? null,
                'cta_secondary_btn_url' => $expDetail['cta_secondary_btn_url'] ?? null,
                'sort_order' => $index + 1,
                'is_featured' => true,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            if (!empty($expDetail['highlights'])) {
                foreach ($expDetail['highlights'] as $hIndex => $h) {
                    DB::table('experience_highlights')->insert([
                        'experience_id' => $id,
                        'title' => $h['title'],
                        'description' => $h['description'],
                        'sort_order' => $hIndex + 1,
                        'is_active' => true,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                }
            }

            if (!empty($expDetail['prep_questions'])) {
                foreach ($expDetail['prep_questions'] as $qIndex => $q) {
                    DB::table('experience_prep_questions')->insert([
                        'experience_id' => $id,
                        'title' => $q['title'],
                        'body' => $q['body'],
                        'sort_order' => $qIndex + 1,
                        'is_active' => true,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                }
            }

            $ids[$experience['id']] = $id;
        }

        return $ids;
    }

    protected function seedMonths(array $months): array
    {
        $ids = [];
        foreach ($months as $month) {
            $id = DB::table('travel_months')->insertGetId([
                'month_number' => $month['id'],
                'name' => $month['name'],
                'slug' => $month['slug'],
                'season' => $month['season_website'] ?? 'spring',
                'summary' => $month['intro'] ?? null,
                'description' => $month['intro'] ?? null,
                'sort_order' => $month['id'],
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            $ids[(int) $month['id']] = $id;
        }

        return $ids;
    }

    protected function seedGuides(array $guides): array
    {
        $ids = [];
        foreach ($guides as $index => $guide) {
            $id = DB::table('guides')->insertGetId([
                'name' => $guide['name'],
                'slug' => $guide['slug'],
                'role' => $guide['role'] ?? null,
                'biography' => $guide['biography'] ?? null,
                'languages' => json_encode($guide['languages'] ?? []),
                'qualifications' => json_encode($guide['qualifications'] ?? []),
                'years_experience' => $guide['years_experience'] ?? null,
                'is_featured' => true,
                'is_active' => true,
                'sort_order' => $index + 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            $ids[$guide['id']] = $id;
        }

        return $ids;
    }

    protected function seedJourneys(array $treks, array $destinationIds, array $guideIds, array $detailedCatalog = []): array
    {
        $ids = [];
        foreach ($treks as $index => $trek) {
            $detailed = $detailedCatalog[$trek['id']] ?? $detailedCatalog[$trek['slug']] ?? [];

            $id = DB::table('journeys')->insertGetId([
                'destination_id' => $destinationIds[$trek['region_id']] ?? reset($destinationIds),
                'guide_id' => $guideIds[$trek['guide_id'] ?? null] ?? null,
                'name' => $trek['name'],
                'slug' => $trek['slug'],
                'subtitle' => $detailed['subtitle'] ?? ($trek['tagline'] ?? null),
                'summary' => $trek['summary'],
                'description' => $detailed['description'] ?? $trek['summary'],
                'overview_secondary' => $detailed['overview_secondary'] ?? 'Authentic Himalayan itinerary with accredited local Sherpa guides.',
                'duration_days' => $trek['duration_days'],
                'duration_nights' => max(0, ((int) $trek['duration_days']) - 1),
                'difficulty' => $trek['difficulty'],
                'max_altitude_m' => $trek['max_altitude_m'] ?? null,
                'walking_hours_max' => $trek['walking_hours_max'] ?? null,
                'accommodation_style' => $this->normalizeAccommodation($trek['accommodation'] ?? null),
                'pace' => $trek['pace'] ?? null,
                'price_minor' => $trek['price_minor'],
                'currency' => $trek['currency'] ?? 'USD',
                'pricing_basis' => $trek['pricing_basis'] ?? 'per_person',
                'featured_rank' => $trek['featured_rank'] ?? ($index + 1),
                'is_featured' => true,
                'is_active' => true,
                'is_published' => true,
                'published_at' => now(),
                'accommodation_note' => $detailed['accommodation_note'] ?? 'Hand-picked local mountain teahouses and lodges.',
                'logistics_note' => $detailed['logistics_note'] ?? 'Licensed guide, porters, and national park permits included.',
                'safety_note' => $detailed['safety_note'] ?? 'Comprehensive first aid medical kit and daily pulse oximeter monitoring.',
                'route_map_note' => $detailed['route_map_note'] ?? 'Authentic Himalayan trail route.',
                'preparation_note' => $detailed['preparation_note'] ?? 'Cardiovascular conditioning and endurance training before travel are strongly recommended. Acclimatization days are built into the schedule to minimize acute mountain sickness (AMS) risks.',
                'packing_note' => $detailed['packing_note'] ?? 'High-altitude 4-season down jacket (-15°C rating), broken-in trekking boots, thermal base layers, and UV protection sunglasses required.',
                'operational_notice' => $detailed['operational_notice'] ?? null,
                'cta_title' => "Ready to plan your {$trek['name']} expedition?",
                'cta_description' => 'Build an unhurried, custom-paced itinerary draft with our licensed mountain team.',
                'cta_primary_btn_text' => 'Plan This Trek',
                'cta_primary_btn_url' => null,
                'cta_secondary_btn_text' => 'Ask a Question',
                'cta_secondary_btn_url' => '/contact',
                'sort_order' => $index + 1,
                'meta_title' => "{$trek['name']} | E.A.T.H. Travels",
                'meta_description' => $trek['summary'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            $ids[$trek['id']] = $id;
            $this->seedJourneyContent($id, $trek, $detailed);
        }

        return $ids;
    }

    protected function seedJourneyContent(int $journeyId, array $trek, array $detailed = []): void
    {
        $highlights = $detailed['highlights'] ?? $trek['highlights'] ?? [];
        foreach ($highlights as $index => $highlight) {
            DB::table('journey_highlights')->insert([
                'journey_id' => $journeyId,
                'title' => $highlight,
                'sort_order' => $index + 1,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        $duration = (int) $trek['duration_days'];
        $itinerary = $detailed['itinerary'] ?? [];

        for ($day = 1; $day <= $duration; $day++) {
            $dayData = $itinerary[$day] ?? [];

            DB::table('journey_itinerary_days')->insert([
                'journey_id' => $journeyId,
                'day_number' => $day,
                'title' => $dayData['title'] ?? ($day === 1 ? 'Arrival and journey briefing' : ($day === $duration ? 'Departure and onward plans' : "Trail day {$day}")),
                'route' => $dayData['route'] ?? ($day === 1 ? 'Kathmandu arrival' : 'Himalayan trail section'),
                'description' => $dayData['description'] ?? 'Trek through changing mountain landscapes with regular hydration and rest breaks.',
                'location_label' => $dayData['location_label'] ?? 'Nepal',
                'altitude_m' => $dayData['altitude_m'] ?? ($day === 1 ? 1400 : null),
                'altitude_label' => $dayData['altitude_label'] ?? ($day === 1 ? '1,400m' : null),
                'walking_hours' => $dayData['walking_hours'] ?? ($day === 1 ? 2.5 : min(6, (int) ($trek['walking_hours_max'] ?? 6))),
                'walking_hours_label' => $dayData['walking_hours_label'] ?? ($day === 1 ? '2–3 hrs' : (($trek['walking_hours_max'] ?? 6) . ' hrs')),
                'accommodation_label' => $dayData['accommodation_label'] ?? 'Standard tea house',
                'meal_note' => $dayData['meal_note'] ?? 'Breakfast, lunch and dinner included where applicable.',
                'is_acclimatization' => (bool) ($dayData['is_acclimatization'] ?? (in_array($day, [3, 6], true) && $duration >= 10)),
                'sort_order' => $day,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        $inclusions = $detailed['inclusions'] ?? [
            'Ground itinerary planning and professional guide support',
            'Standard teahouse and mountain lodge accommodation',
            'Conservation area and national park trekking permits',
        ];
        foreach ($inclusions as $index => $item) {
            DB::table('journey_services')->insert([
                'journey_id' => $journeyId,
                'type' => 'inclusion',
                'title' => $item,
                'sort_order' => $index + 1,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        $exclusions = $detailed['exclusions'] ?? [
            'International airfare and Nepal tourist visa fees',
            'Travel and high-altitude emergency medical rescue insurance',
            'Personal expenses, snacks, and gear purchases',
        ];
        foreach ($exclusions as $index => $item) {
            DB::table('journey_services')->insert([
                'journey_id' => $journeyId,
                'type' => 'exclusion',
                'title' => $item,
                'sort_order' => $index + 1,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        $safetyItems = [
            [
                'title' => 'Certified Wilderness Leadership',
                'description' => 'All lead guides hold government licensing, Wilderness First Responder (WFR) certification, and high-altitude navigation credentials.',
                'icon' => 'fa-shield-halved',
            ],
            [
                'title' => 'Twice-Daily Pulse Oximeter Monitoring',
                'description' => 'Morning and evening pulse oximetry and resting heart rate monitoring logged on the Lake Louise AMS acute mountain sickness scoring matrix.',
                'icon' => 'fa-heart-pulse',
            ],
            [
                'title' => 'Portable Hyperbaric & Emergency Oxygen',
                'description' => 'Expeditions carry bottled medical oxygen and high-altitude emergency first aid trauma supplies with direct satellite emergency dispatch.',
                'icon' => 'fa-kit-medical',
            ],
            [
                'title' => 'Garmin inReach & Heli-Evac Coverage',
                'description' => 'Continuous satellite GPS tracking, two-way communication with Kathmandu base operations, and pre-authorized helicopter evacuation coordination.',
                'icon' => 'fa-helicopter',
            ],
        ];
        foreach ($safetyItems as $index => $sItem) {
            DB::table('journey_safety_items')->insert([
                'journey_id' => $journeyId,
                'title' => $sItem['title'],
                'description' => $sItem['description'],
                'icon' => $sItem['icon'],
                'sort_order' => $index + 1,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        DB::table('journey_prices')->insert([
            'journey_id' => $journeyId,
            'name' => 'Standard per person rate',
            'price_minor' => $trek['price_minor'],
            'currency' => $trek['currency'] ?? 'USD',
            'pricing_basis' => $trek['pricing_basis'] ?? 'per_person',
            'is_primary' => true,
            'is_active' => true,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    protected function seedJourneyRelations(array $treks, array $journeyIds, array $experienceIds, array $monthIds, array $templates): void
    {
        $baseDate = CarbonImmutable::parse('2030-09-01');

        foreach ($treks as $trek) {
            $journeyId = $journeyIds[$trek['id']];

            foreach ($trek['experience_ids'] ?? [] as $index => $experienceKey) {
                if (isset($experienceIds[$experienceKey])) {
                    DB::table('experience_journey')->insert([
                        'experience_id' => $experienceIds[$experienceKey],
                        'journey_id' => $journeyId,
                        'sort_order' => $index + 1,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                }
            }

            foreach ($trek['suitable_months'] ?? [] as $index => $monthNumber) {
                if (isset($monthIds[(int) $monthNumber])) {
                    DB::table('journey_month')->insert([
                        'journey_id' => $journeyId,
                        'travel_month_id' => $monthIds[(int) $monthNumber],
                        'suitability' => 'ideal',
                        'sort_order' => $index + 1,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                }
            }

            foreach ($templates as $template) {
                $start = $baseDate->addDays($template['start_offset_days']);
                DB::table('journey_departures')->insert([
                    'journey_id' => $journeyId,
                    'code' => $trek['id'] . '-' . $template['suffix'],
                    'start_date' => $start->toDateString(),
                    'end_date' => $start->addDays(((int) $trek['duration_days']) - 1)->toDateString(),
                    'status' => $template['status'] === 'active' ? 'open' : $template['status'],
                    'total_seats' => 12,
                    'available_seats' => $template['sample_seats'] ?? null,
                    'price_minor' => ((int) $trek['price_minor']) + ((int) ($template['price_adjustment_minor'] ?? 0)),
                    'currency' => $trek['currency'] ?? 'USD',
                    'is_active' => true,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }

    protected function normalizeAccommodation(?string $value): ?string
    {
        return match ($value) {
            'upgraded' => 'comfort',
            'teahouse' => 'standard',
            default => in_array($value, ['standard', 'comfort', 'luxury', 'mixed'], true) ? $value : null,
        };
    }

    protected function seedArticles(array $articles, array $journeyIds): array
    {
        $categoryIds = [];
        $articleIds = [];

        foreach ($articles as $article) {
            $category = $article['category'] ?? 'planning';
            $categoryIds[$category] ??= DB::table('article_categories')->insertGetId([
                'name' => Str::headline($category),
                'slug' => Str::slug($category),
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            $id = DB::table('articles')->insertGetId([
                'article_category_id' => $categoryIds[$category],
                'title' => $article['title'],
                'slug' => $article['slug'],
                'summary' => $article['summary'] ?? null,
                'author_name' => $article['author_label'] ?? null,
                'updated_on' => $article['updated_date'] ?? null,
                'is_featured' => true,
                'is_active' => true,
                'is_published' => true,
                'published_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            $articleIds[$article['id']] = $id;

            foreach ($article['sections'] ?? [] as $index => $section) {
                DB::table('article_sections')->insert([
                    'article_id' => $id,
                    'heading' => $section['heading'],
                    'body' => $section['body'],
                    'sort_order' => $index + 1,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }

            foreach ($article['trek_ids'] ?? [] as $index => $trekId) {
                if (isset($journeyIds[$trekId])) {
                    DB::table('article_journey')->insert([
                        'article_id' => $id,
                        'journey_id' => $journeyIds[$trekId],
                        'sort_order' => $index + 1,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                }
            }
        }

        return $articleIds;
    }

    protected function seedStories(array $stories, array $journeyIds, array $destinationIds): void
    {
        foreach ($stories as $story) {
            $journeyId = $journeyIds[$story['trek_id'] ?? null] ?? null;
            DB::table('traveler_stories')->insert([
                'journey_id' => $journeyId,
                'title' => $story['title'],
                'slug' => $story['slug'],
                'summary' => $story['summary'] ?? null,
                'body' => $story['body'] ?? ($story['summary'] ?? null),
                'traveler_name' => $story['traveler_name'] ?? null,
                'traveler_country' => $story['traveler_country'] ?? null,
                'traveled_on' => $story['traveled_on'] ?? null,
                'is_featured' => true,
                'is_active' => true,
                'is_published' => true,
                'published_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }

    protected function seedFaqs(array $faqs, array $journeyIds): void
    {
        $destinations = DB::table('destinations')->get()->keyBy('slug');
        $journeys = DB::table('journeys')->get()->keyBy('slug');
        $experiences = DB::table('experiences')->get()->keyBy('slug');

        $sortOrder = 1;

        // 1. Global Website FAQs
        $globalFaqs = [
            [
                'question' => 'What comprehensive travel insurance is mandatory for trekking in Nepal?',
                'answer' => 'You must have specialized travel insurance that explicitly covers emergency medical evacuation by helicopter up to 6,000 meters altitude, hospital treatment, and trip cancellation. Standard travel policies typically cap altitude coverage at 3,000 meters.',
                'category' => 'Safety & Insurance',
            ],
            [
                'question' => 'How does the tourist visa on arrival work at Kathmandu Airport (KTM)?',
                'answer' => 'Most nationalities can obtain a tourist visa upon arrival at Tribhuvan International Airport (KTM). Fees are USD $30 for 15 days, $50 for 30 days, or $125 for 90 days, payable in cash (USD, EUR, GBP) or by card. Completing the online pre-arrival visa application within 15 days of departure expedites airport clearance.',
                'category' => 'Visas & Entry',
            ],
            [
                'question' => 'What is your policy regarding solo trekkers and mandatory guides?',
                'answer' => 'In accordance with Nepal Tourism Board regulations, solo independent trekking without a certified guide is prohibited in all national parks and conservation areas. E.A.T.H. Travels provides licensed, first-aid certified mountain guides and dedicated porters for all trips.',
                'category' => 'Safety & Guidelines',
            ],
            [
                'question' => 'How is drinking water managed responsibly during treks to minimize plastic?',
                'answer' => 'To preserve fragile alpine ecosystems from plastic pollution, we encourage trekkers to carry reusable insulated bottles or hydration bladders and use chlorine dioxide water purification tablets, UV SteriPENs, or purchase boiled filtered water available at local teahouses.',
                'category' => 'Responsible Travel',
            ],
            [
                'question' => 'What protocol is followed if a trekker experiences Acute Mountain Sickness (AMS)?',
                'answer' => 'Our guides conduct daily health checks with fingertip pulse oximeters to track blood oxygen saturation and heart rate. If severe AMS, HAPE, or HACE symptoms arise, our protocol mandates immediate descent to lower elevation, supplemental oxygen administration, and coordinating satellite helicopter rescue if needed.',
                'category' => 'Health & Altitude',
            ],
            [
                'question' => 'What currency should I bring and how do payments work on the trail?',
                'answer' => 'While trip packages are paid in advance, daily trail personal expenses (hot showers, device charging, Wi-Fi, snacks, tips) require local cash in Nepalese Rupees (NPR). ATMs are only reliable in Kathmandu and Pokhara (with limited, often offline ATMs in Namche Bazaar), so withdraw sufficient rupees before heading into the mountains.',
                'category' => 'Money & Payments',
            ],
        ];

        foreach ($globalFaqs as $faq) {
            DB::table('faqs')->insert([
                'question' => $faq['question'],
                'answer' => $faq['answer'],
                'category' => $faq['category'],
                'faqable_type' => null,
                'faqable_id' => null,
                'sort_order' => $sortOrder++,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // 2. Destination FAQs
        $destinationFaqs = [
            'everest' => [
                [
                    'question' => 'What permits are required to trek in the Everest (Khumbu) region?',
                    'answer' => 'Two permits are mandatory: the Sagarmatha National Park Entry Permit (NPR 3,000 + 13% VAT) and the Khumbu Pasang Lhamu Rural Municipality Entry Permit (NPR 3,000). Both are obtained directly at Monjo and Lukla checkpoints. TIMS cards are not required for Everest.',
                    'category' => 'Permits & Fees',
                ],
                [
                    'question' => 'How do Lukla flights operate during peak spring and autumn seasons?',
                    'answer' => 'To alleviate Kathmandu airspace congestion, the Civil Aviation Authority of Nepal frequently reroutes Lukla flights through Ramechhap (Manthali Airport) during peak months (April–May and October–November). This requires an early morning 4-hour scenic drive from Kathmandu to Ramechhap.',
                    'category' => 'Flights & Logistics',
                ],
                [
                    'question' => 'What is the standard altitude acclimatization strategy for Everest treks?',
                    'answer' => 'Itineraries incorporate essential rest and acclimatization days at Namche Bazaar (3,440m) with hikes to Everest View Hotel (3,880m), and Dingboche (4,410m) with ascents of Nagarjun Hill (5,050m). Elevation gains above 3,000m are strictly kept to 300–500 vertical meters per day.',
                    'category' => 'Acclimatization',
                ],
                [
                    'question' => 'When is the best weather window for trekking in the Everest region?',
                    'answer' => 'The pre-monsoon spring window (March to late May) features blooming rhododendrons and bustling mountaineering base camps. The post-monsoon autumn window (October to late November) delivers the clearest skies, dry trail conditions, and sharpest mountain panoramas.',
                    'category' => 'Seasons & Weather',
                ],
            ],
            'annapurna' => [
                [
                    'question' => 'What permits do I need for the Annapurna Conservation Area?',
                    'answer' => 'You need an Annapurna Conservation Area Project (ACAP) entry permit and a Trekkers Information Management System (TIMS) card. Under updated Nepal Tourism Board regulations, all foreign trekkers must be accompanied by a licensed guide.',
                    'category' => 'Permits & Regulations',
                ],
                [
                    'question' => 'How does road construction affect modern trekking routes in Annapurna?',
                    'answer' => 'Although unpaved roads now reach parts of the classic Circuit, our itineraries utilize alternative Natural Annapurna Trekking Trails (NATT) wherever possible to bypass road sections and preserve tranquil footpaths through traditional Gurung and Thakali villages.',
                    'category' => 'Trail Conditions',
                ],
                [
                    'question' => 'What standard of teahouse accommodation and dining can I expect in Annapurna?',
                    'answer' => 'Annapurna has some of the most comfortable lodges in Nepal. Teahouses offer twin-share rooms with clean bedding, hot gas or solar showers, charging points, and varied menus including Dal Bhat, Sherpa stew, pasta, pizza, and fresh apple pies.',
                    'category' => 'Lodges & Food',
                ],
                [
                    'question' => 'Can I trek Annapurna Base Camp or Poon Hill in the winter months?',
                    'answer' => 'Lower altitude routes like Ghorepani Poon Hill and Mardi Himal are accessible and clear throughout December and January with crisp blue skies. High passes like Thorong La and the narrow gorge leading into Annapurna Base Camp can face heavy snow and avalanche risks in deep winter.',
                    'category' => 'Winter Trekking',
                ],
            ],
            'langtang' => [
                [
                    'question' => 'How accessible is the Langtang Valley from Kathmandu?',
                    'answer' => 'Langtang is the closest high-Himalayan trekking area to Kathmandu. The trailhead at Syabrubesi is reached by a 6 to 8-hour private 4WD jeep or bus drive via Trishuli and Dunche, avoiding domestic flight delays and luggage restrictions entirely.',
                    'category' => 'Access & Transport',
                ],
                [
                    'question' => 'What is the current recovery status of the Langtang community after the 2015 earthquake?',
                    'answer' => 'Langtang Valley has undergone an inspiring rebuilding process. Modern, earthquake-resistant stone-and-timber lodges, solar-powered facilities, and community-run bakeries and cheese factories are fully operational, offering warm hospitality to visitors.',
                    'category' => 'Community & Heritage',
                ],
                [
                    'question' => 'Can the Langtang Valley trek be combined with the sacred lakes of Gosainkunda?',
                    'answer' => 'Yes. From Bamboo or Thulo Syabru, trails connect into the holy alpine lake basin of Gosainkunda (4,380m) and can extend across Laurebina Pass (4,610m) into the lush Helambu valley, creating a diverse 12 to 14-day loop.',
                    'category' => 'Route Variations',
                ],
            ],
            'manaslu' => [
                [
                    'question' => 'Why is the Manaslu region classified as a Restricted Area?',
                    'answer' => 'To conserve ancient Tibetan border cultures and pristine alpine biodiversity, Nepal designates Manaslu as a restricted zone. Trekkers must travel in groups of at least two with a government-licensed guide and obtain a Special Restricted Area Permit (RAP).',
                    'category' => 'Permits & Entry',
                ],
                [
                    'question' => 'What permits are required for the full Manaslu Circuit?',
                    'answer' => 'You need three permits: the Manaslu Restricted Area Permit (RAP, $100/week in autumn, $75/week other seasons), the Manaslu Conservation Area Project (MCAP) permit, and the Annapurna Conservation Area Project (ACAP) permit as the route finishes in Dharapani.',
                    'category' => 'Permits & Costs',
                ],
                [
                    'question' => 'How demanding is the crossing of Larkya La Pass (5,106m)?',
                    'answer' => 'Larkya La is a strenuous high-altitude alpine pass that begins before dawn from Dharmasala (4,460m). Trekkers traverse glacial moraines and snow slopes using microspikes before savoring views of Himlung Himal, Cheo Himal, and Annapurna II, followed by a long descent to Bimthang.',
                    'category' => 'High Passes & Difficulty',
                ],
            ],
            'mustang' => [
                [
                    'question' => 'What is the Restricted Area Permit fee for Upper Mustang?',
                    'answer' => 'The Department of Immigration charges USD $500 per person for the first 10 days in Upper Mustang (from Kagbeni northward), plus $50 for each additional day. An ACAP entry permit is also required.',
                    'category' => 'Permits & Regulations',
                ],
                [
                    'question' => 'Why is Upper Mustang the premier destination for summer monsoon trekking?',
                    'answer' => 'Upper Mustang lies in the rain-shadow behind the 8,000-meter Annapurna and Dhaulagiri massifs. While the rest of Nepal experiences monsoon rain from June to September, Upper Mustang enjoys dry, sunny desert conditions with blooming barley and buckwheat fields.',
                    'category' => 'Monsoon Trekking',
                ],
                [
                    'question' => 'What cultural customs should visitors respect in Lo Manthang?',
                    'answer' => 'Always walk clockwise around Buddhist chortens and mani prayer walls. Remove shoes and hats before entering ancient gompas, ask permission before taking photos of monks or murals, and avoid pointing the soles of your feet at sacred images or elders.',
                    'category' => 'Local Etiquette',
                ],
            ],
        ];

        foreach ($destinationFaqs as $slug => $faqList) {
            $dest = $destinations->get($slug);
            if (!$dest) continue;
            foreach ($faqList as $faq) {
                DB::table('faqs')->insert([
                    'question' => $faq['question'],
                    'answer' => $faq['answer'],
                    'category' => $faq['category'],
                    'faqable_type' => 'destination',
                    'faqable_id' => $dest->id,
                    'sort_order' => $sortOrder++,
                    'is_active' => true,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }

        // 3. Journey FAQs
        $journeyFaqs = [
            'everest-base-camp' => [
                [
                    'question' => 'Do trekkers sleep in tents at Everest Base Camp itself?',
                    'answer' => 'No. Commercial trekkers visit Everest Base Camp (5,364m) as a day hike and return to sleep in teahouse lodges at Gorak Shep (5,164m). Only climbing expedition teams with mountaineering permits camp at Base Camp during the spring climbing season.',
                    'category' => 'Itinerary Details',
                ],
                [
                    'question' => 'Why is the early morning climb of Kala Patthar (5,545m) considered essential?',
                    'answer' => 'Because Mount Everest summit is hidden behind the Nuptse-Lhotse ridge when standing at Base Camp. Kala Patthar provides the iconic unobstructed view of Everest summit, the Khumbu Icefall, and surrounding Himalayan giants illuminated by dawn light.',
                    'category' => 'Route Highlights',
                ],
                [
                    'question' => 'What physical fitness is required to complete the Everest Base Camp trek?',
                    'answer' => 'You should be able to comfortably hike 5 to 7 hours per day over uneven rocky terrain carrying a 5kg daypack. A consistent training regimen of stair-climbing, jogging, and weekend hill walks for 8–12 weeks prior to departure is strongly recommended.',
                    'category' => 'Fitness & Training',
                ],
            ],
            'annapurna-base-camp' => [
                [
                    'question' => 'What makes the Annapurna Base Camp Sanctuary amphitheater so special?',
                    'answer' => 'The trail leads directly into a 360-degree glacial bowl ringed by ten colossal peaks over 6,000 and 7,000 meters, dominated by the sheer south face of Annapurna I (8,091m) and the revered sacred peak Machapuchare (Fishtail).',
                    'category' => 'Scenery & Highlights',
                ],
                [
                    'question' => 'Are there natural hot springs along the Annapurna Base Camp trail?',
                    'answer' => 'Yes. On the return descent, the trail passes through Jhinu Danda, where natural geothermal mineral pools sit right on the banks of the Modi Khola river, offering the perfect therapeutic soak for tired leg muscles.',
                    'category' => 'Comfort & Recovery',
                ],
                [
                    'question' => 'How does the trail terrain vary on the ABC trek?',
                    'answer' => 'The trek transitions through diverse ecozones: terraced rice paddies and Gurung stone villages at the base, lush subtropical rhododendron and bamboo forests in the middle valleys, and dramatic alpine tundra inside the Sanctuary basin.',
                    'category' => 'Terrain & Ecozones',
                ],
            ],
            'langtang-valley' => [
                [
                    'question' => 'What excursions are available from Kyanjin Gompa (3,870m)?',
                    'answer' => 'Kyanjin Gompa serves as an alpine hub where you can hike up Kyanjin Ri (4,773m) for morning views, climb Tserko Ri (4,984m) for a 360-degree panorama of Langtang Lirung and peaks across Tibet, or visit the historic Swiss-established yak cheese factory.',
                    'category' => 'Side Trips & Excursions',
                ],
                [
                    'question' => 'Is the Langtang Valley trek suitable for beginner Himalayan hikers?',
                    'answer' => 'Yes. With a manageable duration of 7–8 days, moderate daily elevation gains, comfortable lodge stops, and a sleeping ceiling of 3,870m, it is widely considered one of the finest introductory Himalayan treks in Nepal.',
                    'category' => 'Difficulty & Suitability',
                ],
                [
                    'question' => 'What wildlife might I encounter in Langtang National Park?',
                    'answer' => 'Langtang is a sanctuary for Himalayan monal (Danphe), musk deer, red pandas, wild boars, grey langur monkeys, and Himalayan tahr grazing on high alpine slopes.',
                    'category' => 'Flora & Fauna',
                ],
            ],
            'mardi-himal' => [
                [
                    'question' => 'How does Mardi Himal differ from other Annapurna treks?',
                    'answer' => 'Mardi Himal follows a narrow, elevated ridge crest above the tree line directly beneath Machapuchare. It is shorter (5–6 days), significantly less crowded than Ghorepani or ABC, and delivers dramatic close-up views of the Annapurna peaks.',
                    'category' => 'Trek Highlights',
                ],
                [
                    'question' => 'What is the highest altitude reached on the Mardi Himal trek?',
                    'answer' => 'The highest sleeping point is High Camp at 3,580m. The sunrise hike leads up to the Mardi Himal Viewpoint (4,200m) and onward to Mardi Himal Base Camp (4,500m), right beneath the vertical south face of Mount Fishtail.',
                    'category' => 'Altitudes & Camps',
                ],
                [
                    'question' => 'Are teahouses and private rooms readily available on the Mardi ridge?',
                    'answer' => 'Accommodations on Mardi Himal have expanded rapidly. Clean teahouses with twin-share rooms and dining halls operate at Forest Camp, Low Camp, Badal Danda, and High Camp. Pre-booking during peak autumn is essential due to limited lodge capacity.',
                    'category' => 'Lodging',
                ],
            ],
            'gokyo-lakes' => [
                [
                    'question' => 'Why choose Gokyo Lakes over the standard Everest Base Camp route?',
                    'answer' => 'The Gokyo route offers six serene turquoise glacial lakes, expansive walks along the massive Ngozumpa Glacier, fewer trekkers, and an arguably superior panoramic vista from Gokyo Ri (5,357m) encompassing four 8,000m peaks: Everest, Lhotse, Makalu, and Cho Oyu.',
                    'category' => 'Route Comparisons',
                ],
                [
                    'question' => 'Can Gokyo Lakes be linked with Everest Base Camp via Cho La Pass?',
                    'answer' => 'Yes! The Gokyo to EBC circuit crosses the dramatic glaciated Cho La Pass (5,420m), joining the two majestic valleys into an exhilarating 16 to 18-day adventure for fit, confident trekkers.',
                    'category' => 'Pass Crossings',
                ],
                [
                    'question' => 'How cold does it get around Gokyo Lakes at night?',
                    'answer' => 'Nighttime temperatures at Gokyo village (4,790m) typically drop to between -5°C and -15°C in autumn and spring, and lower in winter. A four-season down sleeping bag (-15°C comfort rating) and thermal layers are essential.',
                    'category' => 'Gear & Temperatures',
                ],
            ],
            'manaslu-circuit' => [
                [
                    'question' => 'What makes the Manaslu Circuit a premier wilderness trek?',
                    'answer' => 'Manaslu maintains the raw, unhurried teahouse trekking character of classic Nepal before roads. It features restricted wilderness, sheer river gorge crossings on suspended bridges, Tibetan border villages, and no road vehicular traffic along the high trails.',
                    'category' => 'Wilderness Character',
                ],
                [
                    'question' => 'What are the accommodations like at Dharmasala (Larkya Phedi)?',
                    'answer' => 'Dharmasala (4,460m) is a high alpine base shelter before Larkya La pass. Facilities here are simpler and more communal than lower villages. Rooms are stone dormitory-style with dining tents and basic facilities.',
                    'category' => 'High Camp Logistics',
                ],
                [
                    'question' => 'Can we explore the hidden Tsum Valley from the Manaslu trail?',
                    'answer' => 'Yes. A 5 to 7-day detour from Philim branches eastward into the sacred Tsum Valley (the valley of non-violence), renowned for centuries-old cliffside meditation caves of Milarepa and historic Buddhist nunneries.',
                    'category' => 'Side Detours',
                ],
            ],
            'khopra-ridge' => [
                [
                    'question' => 'What is the community-based concept behind Khopra Ridge?',
                    'answer' => 'Khopra Ridge is part of an innovative community tourism initiative where lodge revenues directly fund local health clinics and educational scholarships for nearby mountain villages.',
                    'category' => 'Community Impact',
                ],
                [
                    'question' => 'How demanding is the day hike to sacred Khayer Lake (4,660m)?',
                    'answer' => 'The excursion from Khopra Danda to Khayer Lake takes 8–10 hours roundtrip over high alpine ridges. It is a rewarding challenge that brings pilgrims and trekkers to a crystal-clear sacred lake beneath Annapurna South.',
                    'category' => 'Day Excursions',
                ],
                [
                    'question' => 'How are the views from Khopra Danda compared to Poon Hill?',
                    'answer' => 'Khopra Danda sits at 3,660m—nearly 500 meters higher than Poon Hill—and places you directly across the world\'s deepest gorge (Kali Gandaki) overlooking the giant snowfaces of Dhaulagiri (8,167m) and Nilgiri.',
                    'category' => 'Vistas & Viewpoints',
                ],
            ],
            'upper-mustang' => [
                [
                    'question' => 'What historical treasures exist inside the walled city of Lo Manthang?',
                    'answer' => 'Founded in the 14th century, Lo Manthang features the four-story Palace of the former King, 15th-century gompas (Thubchen and Jampa) adorned with gold-leaf Tibetan murals, and ancient libraries preserving historic Buddhist texts.',
                    'category' => 'History & Culture',
                ],
                [
                    'question' => 'What are the mysterious Sky Caves of Mustang?',
                    'answer' => 'Mustang features thousands of man-made cliffside cave chambers carved high into vertical canyon walls. Archaeological excavations have revealed human remains, Buddhist paintings, and artifacts dating back over 2,000 years.',
                    'category' => 'Archaeology & Mysteries',
                ],
                [
                    'question' => 'Are 4WD overland vehicle options available in Upper Mustang?',
                    'answer' => 'Yes. For travelers preferring comfort or with limited walking mobility, we operate custom 4WD Land Cruiser expeditions along the Mustang corridor with day walks into cave complexes and monasteries.',
                    'category' => 'Overland Options',
                ],
            ],
        ];

        foreach ($journeyFaqs as $slug => $faqList) {
            $journey = $journeys->get($slug);
            if (!$journey) continue;
            foreach ($faqList as $faq) {
                DB::table('faqs')->insert([
                    'question' => $faq['question'],
                    'answer' => $faq['answer'],
                    'category' => $faq['category'],
                    'faqable_type' => 'journey',
                    'faqable_id' => $journey->id,
                    'sort_order' => $sortOrder++,
                    'is_active' => true,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }

        // 4. Experience FAQs
        $experienceFaqs = [
            'mountain-scenery' => [
                [
                    'question' => 'Which viewpoints in Nepal provide the premier 360-degree mountain panoramas?',
                    'answer' => 'The top alpine viewpoints include Kala Patthar (Everest), Gokyo Ri (Khumbu), Poon Hill (Annapurna), Kyanjin Ri (Langtang), and Mardi Himal High Camp, each offering unobstructed vistas of 7,000m and 8,000m peaks.',
                    'category' => 'Viewpoints',
                ],
                [
                    'question' => 'What time of day produces the clearest mountain views in the Himalayas?',
                    'answer' => 'Early mornings from 6:00 AM to 10:00 AM consistently offer crystal-clear visibility and calm winds. Afternoon valley thermal convection often brings light mist and clouds that clear again by sunset.',
                    'category' => 'Photography & Light',
                ],
            ],
            'cultural-trails' => [
                [
                    'question' => 'What indigenous ethnic groups and cultures are encountered along Nepal\'s trails?',
                    'answer' => 'Trekkers experience the Sherpa Buddhist traditions in the Khumbu, Gurung and Magar village life in Annapurna, Tamang heritage in Langtang, and ancient Tibetan-descended Loba culture in Upper Mustang.',
                    'category' => 'Cultural Diversity',
                ],
                [
                    'question' => 'What traditional festivals can be witnessed along cultural trekking trails?',
                    'answer' => 'Notable festivals include Mani Rimdu at Tengboche Monastery (October/November), Tiji Festival in Lo Manthang (May), and Buddha Jayanti at sacred monasteries across the country.',
                    'category' => 'Festivals & Events',
                ],
            ],
            'quiet-trails' => [
                [
                    'question' => 'Which trekking routes offer seclusion away from standard peak-season crowds?',
                    'answer' => 'Manaslu Circuit, Khopra Ridge, Tsum Valley, Nar Phu, and Upper Mustang receive a small fraction of the visitors seen on classic routes, offering tranquil lodges and untamed wilderness.',
                    'category' => 'Solitude & Nature',
                ],
                [
                    'question' => 'Do quiet trails have sufficient teahouse infrastructure?',
                    'answer' => 'Yes. While more rustic and authentic than the bustling lodges of Namche or Pokhara, comfortable family-run teahouses with hot meals and warm bedding operate along all our curated quiet routes.',
                    'category' => 'Infrastructure',
                ],
            ],
            'short-treks' => [
                [
                    'question' => 'Can I experience high Himalaya trekking in one week or less?',
                    'answer' => 'Absolutely! Ghorepani Poon Hill (4–5 days), Mardi Himal (5–6 days), and Langtang Valley (7 days) provide dramatic mountain vistas, alpine forests, and authentic lodge life within compact vacation schedules.',
                    'category' => 'Short Trips',
                ],
                [
                    'question' => 'Are short treks easier physically than longer high-pass treks?',
                    'answer' => 'Yes. Short treks feature lower maximum sleeping elevations (typically under 3,800m), reducing the risk of severe altitude sickness, while still providing invigorating daily hill hiking.',
                    'category' => 'Fitness & Difficulty',
                ],
            ],
            'photography' => [
                [
                    'question' => 'What camera gear is recommended for trekking photography in Nepal?',
                    'answer' => 'We suggest a weather-sealed camera body, an ultra-wide zoom (16-35mm) for grand landscapes, a telephoto lens (70-200mm) for distant snowpeaks and portraits, a circular polarizer, and plenty of spare batteries kept warm inside your sleeping bag.',
                    'category' => 'Gear Recommendations',
                ],
                [
                    'question' => 'How do trekkers recharge camera and drone batteries in mountain teahouses?',
                    'answer' => 'Teahouses provide charging facilities in communal dining halls, usually powered by solar or micro-hydro (typically NPR 200–500 per charge). Bringing a high-capacity 20,000mAh power bank is strongly advised.',
                    'category' => 'Power & Charging',
                ],
            ],
            'iconic-routes' => [
                [
                    'question' => 'What classifies a trek as an "Iconic Route"?',
                    'answer' => 'Iconic routes—like Everest Base Camp, Annapurna Circuit, and Annapurna Base Camp—are legendary trails that pioneered global adventure tourism and stand on the international bucket lists of travelers worldwide.',
                    'category' => 'Heritage & Lore',
                ],
                [
                    'question' => 'Are iconic routes too commercialized to enjoy?',
                    'answer' => 'Not at all. While they feature better bakeries, Wi-Fi, and coffee shops, the sheer scale of the mountains, ancient monasteries, and rugged trails remains as raw and awe-inspiring as ever.',
                    'category' => 'Experience & Expectations',
                ],
            ],
        ];

        foreach ($experienceFaqs as $slug => $faqList) {
            $exp = $experiences->get($slug);
            if (!$exp) continue;
            foreach ($faqList as $faq) {
                DB::table('faqs')->insert([
                    'question' => $faq['question'],
                    'answer' => $faq['answer'],
                    'category' => $faq['category'],
                    'faqable_type' => 'experience',
                    'faqable_id' => $exp->id,
                    'sort_order' => $sortOrder++,
                    'is_active' => true,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }

    protected function seedWebsitePages(): void
    {
        $heroAssetId = DB::table('media_assets')->where('path', 'like', '%photo-1530122037265%')->value('id');
        if (!$heroAssetId) {
            $heroAssetId = DB::table('media_assets')->insertGetId([
                'filename' => 'responsible-travel-hero.jpg',
                'path' => 'https://images.unsplash.com/photo-1530122037265-a5f1f91d3b99?auto=format&fit=crop&w=1000&q=75',
                'mime_type' => 'image/jpeg',
                'width' => 1600,
                'height' => 900,
                'title' => 'Untouched mountain wilderness and pristine river valley in Nepal',
                'alt_text' => 'Untouched mountain wilderness and pristine river valley in Nepal',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        $standardSlugs = ['about', 'contact', 'safety', 'privacy', 'terms', 'booking-conditions', 'cancellation', 'cookies'];
        foreach ($standardSlugs as $slug) {
            DB::table('website_pages')->insert([
                'title' => Str::headline($slug),
                'slug' => $slug,
                'summary' => 'Database-backed website page content.',
                'body' => 'This page is stored in the database and can be managed as website content.',
                'type' => in_array($slug, ['privacy', 'terms', 'booking-conditions', 'cancellation', 'cookies'], true) ? 'policy' : 'standard',
                'is_active' => true,
                'is_published' => true,
                'published_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // Realistic seed for Responsible Travel page
        $responsiblePageId = DB::table('website_pages')->insertGetId([
            'title' => 'Responsible Mountain Travel & Porter Welfare',
            'slug' => 'responsible-travel',
            'type' => 'responsible',
            'summary' => 'The Himalayas are home to ancient living cultures, sensitive high-altitude ecosystems, and hardworking mountain communities. Explore our proposed operational code for ethical field leadership and environmental stewardship.',
            'body' => '<p>Responsible Himalayan trekking balances deep exploration with cultural integrity, fair employment practices, and proactive trail preservation.</p>',
            'hero_image_id' => $heroAssetId,
            'notice_title' => 'Proposed Practices Notice — Not Verified Factual Achievements',
            'notice_body' => 'This editorial document outlines proposed environmental standards, porter protection policies, and cultural etiquette guidelines for the EATH platform prototype. It does not represent audited historical achievements, third-party eco-certifications, carbon offset claims, or verified conservation partnership data. In live commercial operations, sustainability policies require external verification and rigorous field compliance audits.',
            'cta_title' => 'Ready to Plan a Mindful Himalayan Trek?',
            'cta_description' => 'Explore our interactive journey planner to craft an itinerary built on sensible pacing, local valley stays, and respectful trail exploration.',
            'cta_primary_btn_text' => 'Start Custom Journey Planner →',
            'cta_primary_btn_url' => '/plan-your-trip',
            'cta_secondary_btn_text' => 'Ask a Planning Question',
            'cta_secondary_btn_url' => '/contact',
            'meta_title' => 'Responsible Mountain Travel & Porter Welfare | EATH Trekking Website',
            'meta_description' => 'Explore our proposed framework for ethical porter welfare, local community benefit, trail waste reduction, and sacred Himalayan etiquette.',
            'is_active' => true,
            'is_published' => true,
            'published_at' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('media_attachments')->insert([
            'media_asset_id' => $heroAssetId,
            'attachable_type' => 'website_page',
            'attachable_id' => $responsiblePageId,
            'collection' => 'hero',
            'title' => 'Responsible Mountain Travel Hero',
            'alt_text' => 'Untouched mountain wilderness and pristine river valley in Nepal',
            'sort_order' => 0,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $responsibleSections = [
            [
                'heading' => 'Supporting Himalayan Valley Communities',
                'layout_key' => 'checklist',
                'sort_order' => 1,
                'body' => 'Tourism should directly sustain the families and villages that maintain trail ways, bridges, and teahouses across remote valleys. Our proposed approach prioritizes distributed local benefit:',
                'content' => json_encode(['items' => [
                    [
                        'title' => 'Distributed Teahouse Patronage',
                        'tag' => 'Economic Equity',
                        'description' => 'Spreading overnight stays and meal orders across independently owned, family-run lodges rather than concentrating patronage in a small circle of commercial partners.',
                    ],
                    [
                        'title' => 'Locally Sourced Food Production',
                        'tag' => 'Local Agriculture',
                        'description' => 'Prioritizing indigenous grains, valley potatoes, seasonal vegetables, and locally milled flour (tsampa, buckwheat) to channel trip expenditures directly to agricultural households.',
                    ],
                    [
                        'title' => 'Infrastructure Respect',
                        'tag' => 'Civic Infrastructure',
                        'description' => 'Supporting community-maintained suspension bridges, solar power facilities, and trail maintenance efforts through responsible village fees and fair facility compensation.',
                    ],
                ]]),
            ],
            [
                'heading' => 'Porter Welfare & Field Crew Standards',
                'layout_key' => 'cards_grid',
                'sort_order' => 2,
                'body' => 'Porters and support staff are the physical backbone of Himalayan trekking. Any reputable operator must uphold uncompromising ethical labor protections:',
                'content' => json_encode(['items' => [
                    [
                        'title' => 'Strict Weight Ceilings',
                        'tag' => 'Safety 01',
                        'description' => 'Mandatory load limits capped at 20kg to 25kg per porter, strictly weighed before departure and never exceeded regardless of client luggage demands.',
                    ],
                    [
                        'title' => 'Cold-Weather Equipment',
                        'tag' => 'Gear Standard',
                        'description' => 'Provision of insulated mountain boots, thermal base layers, windproof jackets, warm hats, gloves, and UV-filtering sunglasses for all high-altitude staff.',
                    ],
                    [
                        'title' => 'Fair Wages & Rapid Settlement',
                        'tag' => 'Fair Compensation',
                        'description' => 'Fair, market-leading wages paid on transparent schedules, with clear tipping guidelines that treat tips as bonuses rather than wage substitutes.',
                    ],
                    [
                        'title' => 'Equal Medical & Rescue Rights',
                        'tag' => 'Human Dignity',
                        'description' => 'Full medical coverage and identical helicopter evacuation protocols for sick or injured porters as provided for international clients.',
                    ],
                ]]),
            ],
            [
                'heading' => 'Environmental Care & Trail Waste Reduction',
                'layout_key' => 'checklist',
                'sort_order' => 3,
                'body' => 'High-altitude waste decomposes at negligible rates due to low oxygen and sub-zero temperatures. Preserving fragile alpine corridors requires active prevention:',
                'content' => json_encode(['items' => [
                    [
                        'title' => 'Plastic Bottle Elimination',
                        'tag' => 'Zero Plastic',
                        'description' => 'Trekking teams must avoid single-use bottled water by utilizing boiled lodge water, UV purifiers (SteriPEN), or water filtration pumps.',
                    ],
                    [
                        'title' => 'Pack-It-In, Pack-It-Out',
                        'tag' => 'Leave No Trace',
                        'description' => 'All non-biodegradable trash, snack wrappers, battery cells, and personal hygiene products must be carried back to designated municipal disposal points.',
                    ],
                    [
                        'title' => 'Water Source Protection',
                        'tag' => 'Clean Waterways',
                        'description' => 'Washing clothing or utensils using biodegradable soap at least 50 meters away from natural glacial streams, springs, and community water supply pipes.',
                    ],
                ]]),
            ],
            [
                'heading' => 'Cultural Traditions & Sacred Etiquette',
                'layout_key' => 'cards_grid',
                'sort_order' => 4,
                'body' => 'Mountain trails pass through centuries of living Buddhist and Hindu traditions. Travelers should observe these respectful customs:',
                'content' => json_encode(['items' => [
                    [
                        'title' => 'Clockwise Circumambulation',
                        'tag' => 'Trail Etiquette',
                        'description' => 'Always pass mani stone walls, prayer wheels, and chortens on your right side (clockwise direction) as a traditional sign of reverence.',
                    ],
                    [
                        'title' => 'Monastery Protocol',
                        'tag' => 'Sacred Spaces',
                        'description' => 'Remove hats and shoes before entering shrines. Never touch sacred statues or paintings, and refrain from flash photography in active prayer halls.',
                    ],
                    [
                        'title' => 'Photography Consent',
                        'tag' => 'Personal Dignity',
                        'description' => 'Always ask permission before photographing village elders, children, or spiritual ceremonies. A polite question and smile establish mutual trust.',
                    ],
                ]]),
            ],
            [
                'heading' => 'Alpine Wildlife & Fragile Flora Considerations',
                'layout_key' => 'checklist',
                'sort_order' => 5,
                'body' => 'The high Himalaya supports elusive species such as blue sheep (bharal), Himalayan tahr, musk deer, snow leopards, and diverse birdlife. Our proposed operational code encourages non-intrusive observation:',
                'content' => json_encode(['items' => [
                    [
                        'title' => 'Maintain Distance',
                        'tag' => 'Wildlife Welfare',
                        'description' => 'Never pursue, corner, or attempt to feed mountain animals. Feeding wildlife alters natural foraging behaviors and creates dependency.',
                    ],
                    [
                        'title' => 'Tread Softly on Alpine Tundra',
                        'tag' => 'Tundra Protection',
                        'description' => 'Stay strictly on marked trails to avoid trampling slow-growing alpine vegetation, dwarf juniper scrub, and delicate moss cushions.',
                    ],
                    [
                        'title' => 'Preserve Habitat Integrity',
                        'tag' => 'Flora Conservation',
                        'description' => 'Do not harvest wild medicinal herbs, rhododendron branches, or pine boughs for trail souvenirs or camp fires.',
                    ],
                ]]),
            ],
            [
                'heading' => 'Questions Conscious Travelers Should Ask an Operator',
                'layout_key' => 'qa_grid',
                'sort_order' => 6,
                'body' => 'Holding trekking agencies accountable encourages higher industry standards across Nepal. We recommend asking these direct questions before booking any expedition:',
                'content' => json_encode(['items' => [
                    [
                        'title' => '“How are your porters equipped and protected?”',
                        'tag' => 'Accountability 01',
                        'description' => 'Ask if the operator enforces IPPG porter welfare guidelines, verifies footwear before high passes, and provides comprehensive rescue insurance for support crew.',
                    ],
                    [
                        'title' => '“How do you manage trail waste on high routes?”',
                        'tag' => 'Accountability 02',
                        'description' => 'Ask what specific procedures ensure that plastics, fuel canisters, and food packaging are accounted for and carried down to municipal recycling facilities.',
                    ],
                ]]),
            ],
            [
                'heading' => 'Auditing & Verified Partnership Disclosure',
                'layout_key' => 'disclosure',
                'sort_order' => 7,
                'body' => 'Genuine sustainability requires measurable verification rather than marketing claims. To uphold transparency in this prototype, we do not invent fictitious charity donation statistics, unverified eco-labels, or simulated carbon offset calculations.',
                'content' => json_encode(['items' => [
                    [
                        'title' => 'Prototype Integrity Standard',
                        'tag' => 'Verification Status',
                        'description' => 'Notice: In live deployment, partnerships with recognized organizations such as the International Porter Protection Group (IPPG) or the Kathmandu Environmental Education Project (KEEP) will be documented with verifiable third-party certification.',
                    ],
                ]]),
            ],
        ];

        foreach ($responsibleSections as $sec) {
            DB::table('website_page_sections')->insert([
                'website_page_id' => $responsiblePageId,
                'heading' => $sec['heading'],
                'layout_key' => $sec['layout_key'],
                'sort_order' => $sec['sort_order'],
                'body' => $sec['body'],
                'content' => $sec['content'],
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }

    protected function seedSettings(array $brand): void
    {
        DB::table('website_settings')->insert([
            'key' => 'brand',
            'value' => json_encode($brand),
            'group' => 'website',
            'type' => 'json',
            'is_public' => true,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    protected function seedDestinationLogistics(array $destinationIds): void
    {
        $logisticsByDestination = [
            'everest' => [
                [
                    'label' => 'Aviation Gateway & Flight Scheduling',
                    'value' => 'Lukla (Tenzing-Hillary Airport) is the principal aviation hub. During peak trekking windows (April–May and October–November), flights are seasonally redirected through Manthali/Ramechhap Airport (4–5 hours overland drive from Kathmandu) to reduce air traffic congestion. In off-peak months, flights operate directly from Kathmandu domestic airport.',
                    'icon' => 'mdi-airplane-takeoff',
                ],
                [
                    'label' => 'Baggage Allowance & Weight Restrictions',
                    'value' => 'Domestic twin-otter STOL flights to Lukla strictly enforce a 15kg (33 lbs) weight limit per passenger, divided into a 10kg checked duffle bag (carried by porters) and a 5kg personal daypack. Additional urban luggage may be stored securely at our Kathmandu partner hotel free of charge.',
                    'icon' => 'mdi-weight-kilogram',
                ],
                [
                    'label' => 'Conservation & Municipality Permits',
                    'value' => 'Two mandatory permits are required: Sagarmatha National Park entry (NPR 3,000 + 13% VAT) and the Khumbu Pasang Lhamu Rural Municipality card (NPR 3,000). Both are registered on arrival in Lukla and Monjo. TIMS cards are not applicable in the Khumbu region.',
                    'icon' => 'mdi-file-document-check-outline',
                ],
                [
                    'label' => 'Acclimatization Milestones & Pacing',
                    'value' => 'To mitigate Acute Mountain Sickness (AMS), itineraries mandate two consecutive nights in Namche Bazaar (3,440m) with an active hike to Everest View Hotel (3,880m), plus a second two-night staging in Dingboche (4,410m) with a climb up Nangkartshang Peak (5,083m). Sleeping gains above 4,000m never exceed 300–400 vertical meters per day.',
                    'icon' => 'mdi-heart-pulse',
                ],
                [
                    'label' => 'Emergency Evacuation & Satellite Communications',
                    'value' => 'Every expedition carries a Garmin inReach satellite two-way communicator and calibrated pulse oximeters. In the event of acute altitude illness or physical injury, high-altitude helicopter rescue standby is pre-authorized for rapid evacuation from helipads at Gorak Shep, Pheriche, or Namche directly to Kathmandu trauma hospitals.',
                    'icon' => 'mdi-helicopter',
                ],
            ],
            'annapurna' => [
                [
                    'label' => 'Transit Gateway & Road Approaches',
                    'value' => 'Pokhara (25-min flight or 6–8 hour tourist coach from Kathmandu) serves as the primary gateway. Southern trailheads at Nayapul, Birethanti, Ghandruk, and Jhinu Danda are accessible via private 4WD jeeps within 1.5 to 3 hours. Annapurna Circuit routes start eastward through Besisahar and Dharapani along the Marsyangdi gorge.',
                    'icon' => 'mdi-bus',
                ],
                [
                    'label' => 'ACAP & TIMS Permit Regulations',
                    'value' => 'Trekkers require an Annapurna Conservation Area Project (ACAP) permit (NPR 3,000 + VAT) and a Trekkers Information Management System (TIMS) card. Under updated Nepal Tourism Board directives, all foreign travelers must be accompanied by an accredited, government-licensed trekking guide.',
                    'icon' => 'mdi-shield-check-outline',
                ],
                [
                    'label' => 'Natural Footpaths vs Road Bypasses',
                    'value' => 'Where rural jeep tracks intersect traditional trekking lines, E.A.T.H. itineraries strictly utilize designated Natural Annapurna Trekking Trails (NATT) marked with red-white and blue-white waymarkers. This avoids motorable dirt roads and preserves pure wilderness walking through rhododendron forests and Gurung heritage hamlets.',
                    'icon' => 'mdi-map-marker-path',
                ],
                [
                    'label' => 'Thorong La Pass (5,416m) Crossing Protocol',
                    'value' => 'For circuit trekkers, Manang (3,540m) acts as the essential acclimatization hub. The ascent over Thorong La Pass commences at 3:30 AM to 4:30 AM from Thorong Phedi or High Camp to cross the 5,416m col before mid-morning gale-force winds and cloud cover develop. Microspikes and thermal gloves are mandatory.',
                    'icon' => 'mdi-weather-windy',
                ],
            ],
            'langtang' => [
                [
                    'label' => 'Overland 4WD Access from Kathmandu',
                    'value' => 'Langtang is Nepal\'s most flight-independent major trekking region. Trailheads at Syabrubesi and Dhunche are reached via a scenic 6 to 8-hour private 4WD jeep drive north through Trishuli along the Pasang Lhamu Highway, completely eliminating domestic flight delays and luggage weight limits.',
                    'icon' => 'mdi-car-estate',
                ],
                [
                    'label' => 'Langtang National Park Checkpoints',
                    'value' => 'Entry requires a Langtang National Park permit (NPR 3,000 + VAT) and a registered TIMS card. Rasuwa is a sensitive border district adjoining the Kerung/Tibet trade corridor; permits and drone compliance are verified at the Dhunche Nepal Army and police checkpoint.',
                    'icon' => 'mdi-file-document-outline',
                ],
                [
                    'label' => 'Rebuilt Resilient Teahouses & Solar Power',
                    'value' => 'Following the 2015 earthquake, local Tamang and Tibetan communities rebuilt all settlements with reinforced earthquake-resistant stone-and-timber architecture. Modern lodges in Langtang Village and Kyanjin Gompa (3,860m) provide cozy private rooms, warm woodstove dining halls, solar hot showers, and Wi-Fi connectivity.',
                    'icon' => 'mdi-home-outline',
                ],
                [
                    'label' => 'Rapid Elevation Gain & Viewpoint Pacing',
                    'value' => 'Because trails rise quickly from 1,460m at Syabrubesi to 3,860m at Kyanjin Gompa within 3 days, a rest and acclimatization day at Kyanjin is vital before climbing Kyanjin Ri (4,773m) or Tserko Ri (4,984m). High viewpoints should follow a strict "climb high, sleep low" strategy.',
                    'icon' => 'mdi-stairs-up',
                ],
            ],
            'manaslu' => [
                [
                    'label' => 'Special Restricted Area Permit (RAP) Rules',
                    'value' => 'Manaslu is a strictly regulated border zone. Independent solo trekking is prohibited; travelers must trek in a minimum group of 2 with a certified government-licensed guide. The Special Restricted Area Permit (RAP) costs USD $100/week (Autumn) or $75/week (Spring/Winter), plus $15/day additional. MCAP and ACAP conservation permits are also mandatory.',
                    'icon' => 'mdi-card-account-details-outline',
                ],
                [
                    'label' => '4WD Trailhead Overland Route',
                    'value' => 'Access begins with an 8 to 9-hour private 4WD jeep expedition from Kathmandu across Dhading and along the Budhi Gandaki river gorge to Machha Khola. We deploy rugged Mahindra Scorpio or Toyota 4WD vehicles equipped for rough riverbeds and dirt roads.',
                    'icon' => 'mdi-jeepney',
                ],
                [
                    'label' => 'Larkya La Pass (5,106m) Alpine Crossing',
                    'value' => 'Larkya La is a demanding high-altitude crossing over frozen moraines and snow fields connecting Dharmasala (4,460m) to Bimthang. The push begins at 4:00 AM by headlamp. Proper alpine clothing, UV-blocking glacier eyewear, and microspikes are mandatory.',
                    'icon' => 'mdi-compass',
                ],
                [
                    'label' => 'Tibetan Monastic Culture & Village Etiquette',
                    'value' => 'Upper Nubri villages (Lho, Shyala, Samagaun, Samdo) follow ancient Tibetan Nyingma and Kagyu Buddhist traditions. Trekkers must always pass chortens and mani walls on the left (clockwise), remove shoes and hats before entering monasteries, and obtain permission before photographing ceremonies or monks.',
                    'icon' => 'mdi-hands-pray',
                ],
            ],
            'mustang' => [
                [
                    'label' => 'Special Lo Manthang Restricted Area Permit',
                    'value' => 'Upper Mustang (from Kagbeni north to Lo Manthang and the Tibetan frontier) requires an Immigration Restricted Area Permit of USD $500 per person for the first 10 days ($50/day thereafter), along with an ACAP permit. A minimum group of two foreign trekkers and a certified licensed guide are required by law.',
                    'icon' => 'mdi-ticket-confirmation-outline',
                ],
                [
                    'label' => 'Jomsom Mountain Flight & 4WD Canyon Overland',
                    'value' => 'The journey stages via Pokhara. Morning 20-minute STOL flights fly between Annapurna and Dhaulagiri into Jomsom Airport (departing before 10:30 AM prior to fierce valley winds). Alternatively, rugged 4WD jeeps navigate the dramatic Kali Gandaki river canyon (8–10 hours) via Beni, Tatopani, and Marpha.',
                    'icon' => 'mdi-airplane-clock',
                ],
                [
                    'label' => 'Monsoon Rain-Shadow Weather Advantage',
                    'value' => 'Located behind the Himalayan barrier, Upper Mustang receives less than 200mm of annual rainfall. This arid microclimate makes Mustang Nepal\'s premier trekking destination during the summer monsoon months (June to September), featuring clear skies, blooming buckwheat fields, and ancient festival celebrations.',
                    'icon' => 'mdi-weather-sunny',
                ],
                [
                    'label' => 'Arid Plateau Winds & UV Protection',
                    'value' => 'Daily thermal canyon winds begin blowing strongly by late morning, accompanied by intense high-altitude solar radiation. Trekkers need windproof softshell outer layers, UV Category 3 or 4 sunglasses, dust buffs/neck gaiters to protect respiratory passages from blowing dust, and high SPF sun/lip protection.',
                    'icon' => 'mdi-sunglasses',
                ],
                [
                    'label' => 'Walled Medieval Capital & 2,500-Year-Old Sky Caves',
                    'value' => 'Lo Manthang is the historic walled royal capital of the Kingdom of Lo, housing the 15th-century Jampa and Thubchen Gompas. Nearby Chhoser features multi-story prehistoric sky cave dwellings carved directly into fluted sandstone cliffs. Modest monastery conservation entry donations (NPR 1,000–2,000) are paid locally.',
                    'icon' => 'mdi-temple-buddhist-outline',
                ],
            ],
        ];

        foreach ($logisticsByDestination as $slug => $items) {
            $destId = $destinationIds[$slug] ?? null;
            if (!$destId) continue;

            foreach ($items as $index => $item) {
                DB::table('destination_logistics')->insert([
                    'destination_id' => $destId,
                    'label' => $item['label'],
                    'value' => $item['value'],
                    'icon' => $item['icon'] ?? null,
                    'sort_order' => $index + 1,
                    'is_active' => true,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
