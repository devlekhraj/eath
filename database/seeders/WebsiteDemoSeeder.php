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
        $tablesToTruncate = [
            'journey_month', 'experience_journey', 'guide_journey', 'article_journey',
            'journey_departures', 'journey_itinerary_days', 'journey_itinerary_highlights',
            'journey_highlights', 'journey_prices', 'journey_services', 'article_sections',
            'articles', 'article_categories', 'traveler_stories', 'faqs', 'website_page_sections',
            'website_pages', 'website_sections', 'website_settings', 'journey_safety_items',
            'journeys', 'guides', 'travel_months', 'experience_highlights',
            'experience_prep_questions', 'experiences', 'destination_logistics', 'destinations',
            'media_attachments', 'comparison_presets',
        ];
        foreach ($tablesToTruncate as $tbl) {
            if (Schema::hasTable($tbl)) {
                DB::table($tbl)->truncate();
            }
        }
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
        $this->seedComparisonPresets();
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
        $monthEditorials = [
            1 => [
                'overview' => 'January features quiet winter trails with deep blue skies and crisp mountain silhouettes. High mountain passes are typically snowbound, making this month best suited for lower-elevation valley walks and cultural explorations.',
                'trail_vibe' => 'Peaceful, uncrowded villages with warm teahouse hearths.',
                'pack_tip' => 'Down jackets, thermal layering systems, and warm sleeping bag liners are essential for chilly evenings.',
            ],
            2 => [
                'overview' => 'February marks late winter with lengthening daylight hours and gradually warming afternoon sunshine. Mid-elevation forest trails begin to stir as early wild primulas appear in southern foothills.',
                'trail_vibe' => 'Quiet, contemplative walking with minimal trail congestion.',
                'pack_tip' => 'Four-season warmth for high points with flexible daytime layers as sun intensity builds.',
            ],
            3 => [
                'overview' => 'March ushers in the vibrant Himalayan spring. Lower forests burst into bloom with crimson rhododendrons and magnolia blossoms, while mountain passes become accessible under steady daytime warming.',
                'trail_vibe' => 'Re-awakening trail energy with cheerful lodges and lively trailside stops.',
                'pack_tip' => 'Windproof outer shell for gusty ridges and sun protection for bright snow glare.',
            ],
            4 => [
                'overview' => 'April is one of the premier spring trekking periods. Sub-alpine ridges present full wildflower canopies and comfortable walking conditions across both Annapurna and Everest regions.',
                'trail_vibe' => 'Active, vibrant trail community with climbers and trekkers sharing expedition stories.',
                'pack_tip' => 'Sun hat, high-SPF block, and breathable trekking shirts for sunlit afternoon ascents.',
            ],
            5 => [
                'overview' => 'May offers warm daytime temperatures and long hours of daylight. High pass traverses are at their most snow-free, though afternoon cloud buildups can introduce occasional localized pre-monsoon showers.',
                'trail_vibe' => 'Expedition peak season with festive base-camp atmospheres.',
                'pack_tip' => 'Moisture-wicking base layers and compact rain shells for late afternoon mountain mists.',
            ],
            6 => [
                'overview' => 'June brings the arrival of summer monsoon winds to southern Nepal, transforming low valleys into emerald terraces. Rain-shadow sanctuaries like Upper Mustang remain shielded from moisture, offering dry desert trail conditions.',
                'trail_vibe' => 'Serene and exclusive in rain-shadow havens; quiet elsewhere.',
                'pack_tip' => 'Gaiters and sturdy footwear for damp sections; windproof protection for arid Tibetan plateau walks.',
            ],
            7 => [
                'overview' => 'July is the heart of trans-Himalayan trekking. While lower hills receive regular rain, northern arid valleys behind the Annapurna and Dhaulagiri barriers enjoy dry, temperate walking amidst golden barley fields.',
                'trail_vibe' => 'Unique cultural immersion during high summer village farming cycles.',
                'pack_tip' => 'Lightweight sun protection, dust buffs, and water filtration for remote desert paths.',
            ],
            8 => [
                'overview' => 'August continues favorable conditions in northern rain-shadow zones while southern alpine meadows host luxuriant high-pasture wildflowers and grazing yaks.',
                'trail_vibe' => 'Intimate, slow-paced village interactions in isolated mountain enclaves.',
                'pack_tip' => 'Breathable trail clothes with quick-dry fabrics and waterproof pack liners.',
            ],
            9 => [
                'overview' => 'September marks the post-monsoon transition as skies wash clean of moisture, revealing vivid turquoise horizons and gleaming snow peaks. Late September initiates Nepal\'s celebrated autumn trekking window.',
                'trail_vibe' => 'Anticipation and pristine visibility as prime season unfolds.',
                'pack_tip' => 'Mid-weight fleece and adaptable shell jackets for shifting alpine conditions.',
            ],
            10 => [
                'overview' => 'October stands as the most famous trekking month in the Himalayas. Ultra-stable weather, dry footing, and breathtaking panoramic clarity across all major ranges make it ideal for classic passes and base camp approaches.',
                'trail_vibe' => 'Bustling international camaraderie, fully operational teahouses, and vibrant evening dining halls.',
                'pack_tip' => 'Standard three-season kit with quality boots, headlamp, and warm evening layers.',
            ],
            11 => [
                'overview' => 'November delivers crystalline skies, crisp morning air, and tapering crowd numbers. As temperatures cool, the high-altitude vistas reach their sharpest photographic clarity.',
                'trail_vibe' => 'Tranquil late-autumn pacing with crisp, unhurried lodge stays.',
                'pack_tip' => 'Substantial down jacket and thermal gloves for early morning summits and passes.',
            ],
            12 => [
                'overview' => 'December introduces dry, sunny winter days with brilliant daylight sharpness and freezing nighttime temperatures. It is ideal for lower-elevation circuits, cultural trails, and hill ridges with unobstructed mountain backdrops.',
                'trail_vibe' => 'Crisp stillness, uncrowded teahouses, and deep winter hospitality.',
                'pack_tip' => 'Heavyweight insulating layers, wool socks, and cold-rated sleeping gear.',
            ],
        ];

        $monthDetails = [
            1 => [
                'summary' => 'January presents cold, dry winter trail conditions characterized by crystal-clear dawn skies, sharp mountain horizons, and exceptionally peaceful trails. High alpine passes above 5,000 meters are typically snowbound, making lower-altitude foothill walks and cultural trails the primary recommendation.',
                'reasons' => [
                    ['title' => 'Serene, Uncrowded Corridors', 'description' => 'Walk popular foothill trails with minimal foot traffic and enjoy personal lodge hospitality.'],
                    ['title' => 'Crisp Morning Visibility', 'description' => 'Winter high pressure creates sharp photographic contrast and cloudless mountain silhouettes.'],
                    ['title' => 'Vibrant Valley Cultural Life', 'description' => 'Witness authentic village winter rhythms and traditional mid-hill celebrations without tourist crowds.'],
                ],
                'limitations' => [
                    'Are you prepared for sub-zero nighttime temperatures and limited dining hall heating above 3,000 meters?',
                    'Does your schedule allow buffer days for potential frost or fog delays on mountain airstrips?',
                    'Have you confirmed with your guide that high-pass sections are excluded from your winter route?',
                ],
                'faqs' => [
                    ['question' => 'Can travelers trek in Nepal during January?', 'answer' => 'Yes, but primarily on lower to mid-altitude foothill circuits such as the Ghorepani ridge or Kathmandu Valley rim. High-altitude pass crossings are not recommended due to winter snow.'],
                    ['question' => 'How cold does it get during a January trek?', 'answer' => 'Daytime walking in direct sunlight can feel pleasant at 10°C to 15°C in lower valleys, but nighttime temperatures drop well below freezing, requiring a 4-season down sleeping bag.'],
                    ['question' => 'Are teahouses open along the routes in January?', 'answer' => 'Lodges on popular lower routes remain open year-round, while high-altitude seasonal camps close until spring.'],
                ],
            ],
            2 => [
                'summary' => 'February marks the late-winter transition as daylight hours steadily lengthen and direct afternoon sunshine begins to warm lower valleys. Mid-elevation forests stir with early seasonal blooms while higher ridges remain snowbound.',
                'reasons' => [
                    ['title' => 'Lengthening Daylight & Mild Days', 'description' => 'Enjoy longer hiking windows and comfortable daytime warmth across mid-elevation paths.'],
                    ['title' => 'Uncrowded Tea-House Lodges', 'description' => 'Experience genuine Himalayan warmth and quiet evenings beside lodge stoves.'],
                    ['title' => 'Early Southern Blooms', 'description' => 'Spot early wildflower buds and rhododendron shoots across lower pine forest tracks.'],
                ],
                'limitations' => [
                    'Have you confirmed that snowmelt on shaded northern slopes has not created icy trail patches?',
                    'Are you packing layered clothing for cold early mornings and warming afternoon ascents?',
                    'Are high passes like Thorong La or Cho La confirmed to be closed or requiring specialist equipment?',
                ],
                'faqs' => [
                    ['question' => 'Is February suitable for first-time trekkers in Nepal?', 'answer' => 'Yes, especially for shorter cultural foothill treks. It offers quiet trails and bright weather before the peak spring influx arrives.'],
                    ['question' => 'Will high passes be open in February?', 'answer' => 'Most high passes above 5,000m remain heavily snowbound or closed. Trekkers should plan lower circuits with alternate valley routings.'],
                    ['question' => 'What sleeping gear is needed for February?', 'answer' => 'A rated down sleeping bag (-10°C or warmer) is essential as lodge rooms are unheated.'],
                ],
            ],
            3 => [
                'summary' => 'March announces the grand arrival of Himalayan spring. Warmer daytime temperatures thaw mid-elevation paths while entire hillsides between 2,000m and 3,200m explode with crimson, pink, and white rhododendron blossoms.',
                'reasons' => [
                    ['title' => 'Wild Rhododendron Canopies', 'description' => 'Traverse ancient cloud forests ablaze with spectacular native rhododendron blooms.'],
                    ['title' => 'Awakening Trail Energy', 'description' => 'Share trails with returning lodge keepers and international hikers as the season opens.'],
                    ['title' => 'Warming Alpine Temperatures', 'description' => 'Experience comfortable hiking temperatures without the biting cold of mid-winter.'],
                ],
                'limitations' => [
                    'Are high mountain passes fully thawed or still carrying lingering winter snowpacks?',
                    'Have you factored in early afternoon cloud build-ups that occasionally obscure summit views?',
                    'Are your seasonal allergy precautions in place for dense blooming forest zones?',
                ],
                'faqs' => [
                    ['question' => 'When do the rhododendrons bloom in Nepal?', 'answer' => 'Rhododendrons bloom from early March through late April, starting at lower elevations and progressing up mountain slopes.'],
                    ['question' => 'Is March very crowded on popular routes?', 'answer' => 'March is moderately busy as the season begins, but generally sees fewer travelers than peak April or October.'],
                    ['question' => 'Do I need crampons or microspikes for March trekking?', 'answer' => 'For routes with high-altitude passes or base camps, microspikes are strongly advised for early-morning frozen sections.'],
                ],
            ],
            4 => [
                'summary' => 'April is universally celebrated as one of Nepal\'s premier trekking months. Stable atmospheric conditions, radiant forest blooms, and excellent mountain views make it ideal for classic high-altitude base camps and passes.',
                'reasons' => [
                    ['title' => 'Premier High-Altitude Window', 'description' => 'Optimal conditions for high passes and base camp approaches across all major ranges.'],
                    ['title' => 'Peak Floral Splendor', 'description' => 'Upper rhododendron and magnolia canopies reach their most vibrant blooming zenith.'],
                    ['title' => 'Expedition Trail Atmosphere', 'description' => 'Encounter international climbing teams and sherpa crews during peak mountaineering season.'],
                ],
                'limitations' => [
                    'Have you pre-arranged domestic flight bookings to Lukla or Pokhara to avoid sold-out departures?',
                    'Are lodge rooms secured in advance for popular high-density villages like Namche or Dingboche?',
                    'Are you prepared for bright alpine sun exposure requiring high-grade UV eye protection?',
                ],
                'faqs' => [
                    ['question' => 'Why is April so popular for Himalayan trekking?', 'answer' => 'April combines dry, stable weather, warm daytime walking temperatures, and vibrant rhododendron blooms with open high passes.'],
                    ['question' => 'How busy are the teahouses in April?', 'answer' => 'April is peak season; popular trails like Everest Base Camp and Annapurna Circuit see high occupancy. Early booking is recommended.'],
                    ['question' => 'What are daytime temperatures like in April?', 'answer' => 'In lower valleys, daytime temperatures reach 18°C to 22°C. At high elevations (above 4,000m), expect 5°C to 10°C during sunny days.'],
                ],
            ],
            5 => [
                'summary' => 'May offers warm daytime walking conditions, snow-free high-altitude passes, and long daylight hours. While afternoon convective clouds can introduce localized haze, morning summit vistas remain spectacular.',
                'reasons' => [
                    ['title' => 'Warmest High-Pass Traversals', 'description' => 'Cross passes like Thorong La and Cho La with minimal snowpack under mild conditions.'],
                    ['title' => 'Thriving Alpine Biodiversity', 'description' => 'Observe high-altitude summer flora, alpine herbs, and grazing herds moving to high pastures.'],
                    ['title' => 'Summit Atmosphere in Base Camps', 'description' => 'Experience the anticipation as major Everest and Lhotse summit pushes take place.'],
                ],
                'limitations' => [
                    'Are you prepared to start trail days early to maximize clear morning mountain viewing before afternoon cloud buildup?',
                    'Have you packed quick-dry waterproof gear for occasional localized late-afternoon showers?',
                    'Are hydration and electrolyte supplies adequate for warmer valley ascents?',
                ],
                'faqs' => [
                    ['question' => 'Does May get rain before the monsoon?', 'answer' => 'Late May can experience occasional pre-monsoon afternoon showers or heat haze, but mornings are typically clear and dry.'],
                    ['question' => 'Is May too warm for trekking in Nepal?', 'answer' => 'Lower valleys can feel warm during steep midday climbs, but high-altitude regions enjoy very comfortable, mild hiking weather.'],
                    ['question' => 'Are high mountain passes accessible in May?', 'answer' => 'Yes. May is one of the most reliable months for crossing high passes with snow clear from trail paths.'],
                ],
            ],
            6 => [
                'summary' => 'June heralds the onset of summer monsoon rains across southern Nepal, transforming mid-hills into lush emerald terraces. Trans-Himalayan rain-shadow sanctuaries like Upper Mustang remain dry, shielded by the 8,000m peaks.',
                'reasons' => [
                    ['title' => 'Rain-Shadow Plateau Trekking', 'description' => 'Explore the arid Tibetan plateau of Upper Mustang in dry, temperate summer conditions.'],
                    ['title' => 'Emerald Agricultural Terraces', 'description' => 'Witness vibrant paddy planting cycles and rich green hillsides on lower transitions.'],
                    ['title' => 'Exclusive Trail Solitude', 'description' => 'Experience remote trails with minimal tourist presence and deep cultural immersion.'],
                ],
                'limitations' => [
                    'Have you verified that your route lies within a verified trans-Himalayan rain-shadow zone (e.g. Upper Mustang)?',
                    'Have you built extra contingency days into your itinerary for domestic road or flight transit into the mountains?',
                    'Are you carrying protective waterproof packs for travel days across lower foothills?',
                ],
                'faqs' => [
                    ['question' => 'Can you trek in Nepal during the June monsoon?', 'answer' => 'Yes, specifically in rain-shadow regions like Upper Mustang and Nar Phu, which sit behind the high Himalayan barrier and receive very little rainfall.'],
                    ['question' => 'Are flights to Jomsom operational in June?', 'answer' => 'Morning flights between Pokhara and Jomsom operate regularly before wind and clouds build up, though buffer days are recommended.'],
                    ['question' => 'What is the trail condition in rain-shadow areas in June?', 'answer' => 'Trails in Upper Mustang remain dry, dusty, and well-graded, making for pleasant summer trekking.'],
                ],
            ],
            7 => [
                'summary' => 'July is the heart of the summer monsoon in the south, but high-altitude rain-shadow valleys behind Annapurna and Dhaulagiri flourish under dry skies, dramatic sunlit cloud formations, and golden barley fields.',
                'reasons' => [
                    ['title' => 'Golden Summer Barley Harvests', 'description' => 'Witness traditional village agricultural ceremonies across high-desert Mustang hamlets.'],
                    ['title' => 'Dramatic Sky Scapes', 'description' => 'Marvel at theatrical monsoon cloud banks drifting south while northern plateaus remain clear.'],
                    ['title' => 'Cultural Festivals in Ancient Monasteries', 'description' => 'Attend monastic ceremonies and local horse festivals in secluded northern villages.'],
                ],
                'limitations' => [
                    'Are your domestic travel links to mountain gateway towns resilient against road washouts or flight holds?',
                    'Have you packed dust protection buffs and UV eye gear for arid, windy afternoon valley walks?',
                    'Are you prepared for warmer daytime walking in desert terrain requiring disciplined hydration?',
                ],
                'faqs' => [
                    ['question' => 'How rainy is Upper Mustang in July?', 'answer' => 'Upper Mustang receives minimal rainfall due to the Himalayan rain-shadow effect. Showers are rare and usually brief.'],
                    ['question' => 'Do leeches exist on the trails in July?', 'answer' => 'Leeches inhabit wet southern subtropical forests during the monsoon, but they do NOT exist in the dry, arid plateaus of Upper Mustang.'],
                    ['question' => 'What permits are required for July Mustang trekking?', 'answer' => 'A Restricted Area Permit ($500 for 10 days) and Annapurna Conservation Area Permit (ACAP) are required.'],
                ],
            ],
            8 => [
                'summary' => 'August continues favorable conditions in northern rain-shadow zones while southern alpine pastures bloom with wildflowers. Late August often sees the initial tapering of monsoon moisture, offering early hints of autumn.',
                'reasons' => [
                    ['title' => 'High Alpine Meadow Wildflowers', 'description' => 'High pastures and yak grazing grounds display lush biodiversity and summer greenery.'],
                    ['title' => 'Historic Fortress & Cave Exploration', 'description' => 'Walk undisturbed ancient salt-trade routes and explore thousand-year-old cliff caves.'],
                    ['title' => 'Quiet, Intimate Local Homestays', 'description' => 'Enjoy genuine hospitality from families in secluded mountain communities.'],
                ],
                'limitations' => [
                    'Have you factored in weather buffer days for Kathmandu-to-gateway travel connections?',
                    'Are trail shoes equipped for gravel and dust paths rather than deep mud?',
                    'Are licensed guides with trans-Himalayan expertise accompanying your journey?',
                ],
                'faqs' => [
                    ['question' => 'Is late August good for starting an autumn trek?', 'answer' => 'Late August can offer quiet trails, though southern corridors may still experience monsoon showers until mid-September.'],
                    ['question' => 'What is the temperature in Mustang during August?', 'answer' => 'Expect pleasant daytime temperatures around 20°C with cool, comfortable evenings around 8°C to 12°C.'],
                    ['question' => 'How physically demanding is summer rain-shadow trekking?', 'answer' => 'Mustang features undulating terrain without extreme high-pass crossings, making it a moderate, accessible journey.'],
                ],
            ],
            9 => [
                'summary' => 'September marks the post-monsoon transition as skies wash clean of moisture, revealing vivid turquoise horizons and glistening snow peaks. Late September initiates Nepal\'s celebrated autumn trekking season across all regions.',
                'reasons' => [
                    ['title' => 'Fresh Post-Monsoon Air', 'description' => 'Breathe crystalline air as lingering cloud systems wash away to reveal pristine mountain massifs.'],
                    ['title' => 'Lush Green Lower Valleys', 'description' => 'Enjoy the unique contrast of verdant terraced hillsides against snow-covered 8,000m summits.'],
                    ['title' => 'Season Opening Excitement', 'description' => 'Experience the buoyant mood as teahouses reopen and trail guides prepare for autumn.'],
                ],
                'limitations' => [
                    'Have you accounted for lingering early-September rainfall before the monsoon officially retreats?',
                    'Are you prepared for rapidly changing trail conditions as high camps transition into autumn mode?',
                    'Are your acclimatization rest days preserved to adapt safely to higher elevations?',
                ],
                'faqs' => [
                    ['question' => 'When in September is it best to start trekking?', 'answer' => 'Mid to late September is generally ideal, as monsoon rains clear away and mountain visibility improves dramatically.'],
                    ['question' => 'Are all teahouses open by September?', 'answer' => 'Yes, teahouses across all major trekking routes are open, staffed, and well-stocked for the autumn season.'],
                    ['question' => 'Is September crowded on Everest and Annapurna routes?', 'answer' => 'Early September is quiet; traveler numbers ramp up in late September, remaining lighter than peak October.'],
                ],
            ],
            10 => [
                'summary' => 'October stands as the undisputed gold standard for Himalayan trekking. Unbeatable atmospheric stability, dry trails, crisp sunny days, and peerless mountain panoramas make it ideal for classic passes and base camps.',
                'reasons' => [
                    ['title' => 'Legendary Panoramic Clarity', 'description' => 'Unsurpassed crisp visibility extending hundreds of kilometers across the Himalayan chain.'],
                    ['title' => 'Dry, Confident Footing', 'description' => 'Enjoy dry trails and dependable crossing conditions on high passes like Thorong La and Cho La.'],
                    ['title' => 'Festive Cultural Atmosphere', 'description' => 'Share in Nepal\'s festive joy as the major Dashain celebrations illuminate mountain villages.'],
                ],
                'limitations' => [
                    'Have you secured advance lodge and flight bookings for high-demand hubs like Lukla, Namche, and Pokhara?',
                    'Are you prepared for bustling dining halls and shared communal trail energy during peak weeks?',
                    'Do you have warm evening layers for freezing high-altitude camp nights?',
                ],
                'faqs' => [
                    ['question' => 'Why is October considered the best month to trek in Nepal?', 'answer' => 'October offers the most dependable dry weather, stable skies, moderate daytime temperatures, and spectacular mountain views.'],
                    ['question' => 'Do I need advance bookings for October trekking?', 'answer' => 'Yes, October is peak season. Flights to Lukla and popular lodges in Namche or Ghorepani should be booked well in advance.'],
                    ['question' => 'How cold does it get at night in October?', 'answer' => 'At 4,000m and above, nighttime temperatures regularly dip to -5°C to -10°C, requiring a warm down sleeping bag and jacket.'],
                ],
            ],
            11 => [
                'summary' => 'November delivers crystalline skies, crisp morning air, and tapering crowd numbers. As temperatures cool, the high-altitude vistas reach their sharpest photographic clarity before winter sets in.',
                'reasons' => [
                    ['title' => 'Peerless Photographic Clarity', 'description' => 'Crystalline, deep-blue skies and razor-sharp snow ridges make November a photographer\'s paradise.'],
                    ['title' => 'Tapering Crowd Numbers', 'description' => 'Enjoy peaceful trails, quieter lodges, and attentive teahouse hospitality after peak October.'],
                    ['title' => 'Dry, Stable Weather', 'description' => 'Extremely low precipitation risk ensures uninterrupted trekking schedules and clear days.'],
                ],
                'limitations' => [
                    'Are you equipped with thermal underwear and a heavy down jacket for sharp sub-zero nights?',
                    'Have you confirmed that high teahouses remain open through late November?',
                    'Are you prepared for shorter daylight hours requiring earlier morning starts?',
                ],
                'faqs' => [
                    ['question' => 'Is November too cold for trekking in Nepal?', 'answer' => 'Daytime walking in the sun is pleasantly cool and crisp (10°C to 15°C). Nights at high elevations are cold (-10°C), but easily managed with quality gear.'],
                    ['question' => 'Are high passes open in November?', 'answer' => 'Yes, through early to mid-November high passes like Thorong La and Larkya La remain open, though late-month snow can occasionally prompt early closures.'],
                    ['question' => 'How clear is the mountain view in November?', 'answer' => 'November offers some of the clearest skies of the entire year, with virtually no humidity or haze.'],
                ],
            ],
            12 => [
                'summary' => 'December introduces dry, sunny winter days with brilliant daylight sharpness and freezing nighttime temperatures. It is ideal for lower-elevation circuits, cultural trails, and hill ridges with unobstructed mountain backdrops.',
                'reasons' => [
                    ['title' => 'Brilliant Blue Skies & Sunshine', 'description' => 'Warm, direct daytime sun and sparkling cloudless skies provide excellent foothill walking.'],
                    ['title' => 'Tranquil Trail Flow', 'description' => 'Experience genuine solitude on popular trails without competing for lodge space.'],
                    ['title' => 'Crisp Mountain Backdrops', 'description' => 'Enjoy uninterrupted snow peaks rising dramatically over golden terraced valleys.'],
                ],
                'limitations' => [
                    'Are you planning routes that remain below 3,800 meters to avoid winter pass closures?',
                    'Have you confirmed that lodges on your chosen trail remain open during the winter period?',
                    'Do you have comprehensive winter insulation for sub-zero lodge bedrooms?',
                ],
                'faqs' => [
                    ['question' => 'Can you trek in Nepal in December?', 'answer' => 'Yes. Lower-altitude and mid-hill treks such as Poon Hill, Mardi Himal (lower ridge), or Langtang Valley are wonderful in December, with sunny days and clear views.'],
                    ['question' => 'Are high-altitude passes open in December?', 'answer' => 'Most passes above 5,000m are closed by heavy winter snow or risk extreme sub-zero conditions.'],
                    ['question' => 'What gear is essential for December trekking?', 'answer' => 'A 4-season sleeping bag, quality thermal base layers, insulated down jacket, warm beanie, and windproof gloves.'],
                ],
            ],
        ];

        $ids = [];
        foreach ($months as $month) {
            $monthNum = (int) $month['id'];
            $editorial = $monthEditorials[$monthNum] ?? [];
            $detail = $monthDetails[$monthNum] ?? [];

            $ratingsMap = [
                1  => ['clarity_score' => 3, 'clarity_label' => 'Crisp Silhouettes', 'footprint_score' => 1, 'footprint_label' => 'Quiet', 'badge' => 'Winter Window'],
                2  => ['clarity_score' => 3, 'clarity_label' => 'Morning Clarity', 'footprint_score' => 1, 'footprint_label' => 'Low Footprint', 'badge' => 'Late Winter'],
                3  => ['clarity_score' => 4, 'clarity_label' => 'Wildflower Bloom', 'footprint_score' => 3, 'footprint_label' => 'Steady Flow', 'badge' => 'Spring Awakening'],
                4  => ['clarity_score' => 5, 'clarity_label' => 'Prime Panoramic', 'footprint_score' => 4, 'footprint_label' => 'Active & Social', 'badge' => 'Prime Spring Window'],
                5  => ['clarity_score' => 4, 'clarity_label' => 'Extended Daylight', 'footprint_score' => 4, 'footprint_label' => 'Expedition Peak', 'badge' => 'High Passes Open'],
                6  => ['clarity_score' => 2, 'clarity_label' => 'Rain-Shadow Arid', 'footprint_score' => 1, 'footprint_label' => 'Quiet Sanctuaries', 'badge' => 'Rain-Shadow Plateau'],
                7  => ['clarity_score' => 2, 'clarity_label' => 'Dry Plateau Skies', 'footprint_score' => 1, 'footprint_label' => 'Serene Enclaves', 'badge' => 'Trans-Himalayan'],
                8  => ['clarity_score' => 2, 'clarity_label' => 'High Pastures', 'footprint_score' => 1, 'footprint_label' => 'Tranquil', 'badge' => 'Rain-Shadow Sanctuaries'],
                9  => ['clarity_score' => 4, 'clarity_label' => 'Post-Monsoon Wash', 'footprint_score' => 3, 'footprint_label' => 'Rising Vitality', 'badge' => 'Post-Monsoon Clarity'],
                10 => ['clarity_score' => 5, 'clarity_label' => 'Crystal 360° Clarity', 'footprint_score' => 5, 'footprint_label' => 'Peak Vitality', 'badge' => 'Peak Trekking Season'],
                11 => ['clarity_score' => 5, 'clarity_label' => 'Razor-Sharp Vistas', 'footprint_score' => 3, 'footprint_label' => 'Tapering Steady', 'badge' => 'Sharp Panoramas'],
                12 => ['clarity_score' => 4, 'clarity_label' => 'Dry Azure Skies', 'footprint_score' => 2, 'footprint_label' => 'Quiet Valleys', 'badge' => 'Winter Sunshine'],
            ];
            $curRating = $ratingsMap[$monthNum] ?? ['clarity_score' => 3, 'clarity_label' => 'Good', 'footprint_score' => 3, 'footprint_label' => 'Moderate', 'badge' => 'Seasonal Window'];

            $contentPayload = [
                'overview' => $editorial['overview'] ?? ($month['intro'] ?? ''),
                'trail_vibe' => $editorial['trail_vibe'] ?? '',
                'pack_tip' => $editorial['pack_tip'] ?? '',
                'reasons' => $detail['reasons'] ?? [],
                'limitations' => $detail['limitations'] ?? [],
                'clarity_score' => $curRating['clarity_score'],
                'clarity_label' => $curRating['clarity_label'],
                'footprint_score' => $curRating['footprint_score'],
                'footprint_label' => $curRating['footprint_label'],
                'badge' => $curRating['badge'],
            ];

            $id = DB::table('travel_months')->insertGetId([
                'month_number' => $monthNum,
                'name' => $month['name'],
                'slug' => $month['slug'],
                'season' => $month['season_website'] ?? 'spring',
                'summary' => $detail['summary'] ?? ($month['intro'] ?? null),
                'conditions_note' => $editorial['trail_vibe'] ?? null,
                'description' => $editorial['pack_tip'] ?? ($month['intro'] ?? null),
                'content' => json_encode($contentPayload),
                'sort_order' => $monthNum,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            // Seed polymorphic FAQs for the month
            if (!empty($detail['faqs'])) {
                foreach ($detail['faqs'] as $sortIdx => $faqItem) {
                    DB::table('faqs')->insert([
                        'question' => $faqItem['question'],
                        'answer' => $faqItem['answer'],
                        'faqable_type' => 'Admin\Models\TravelMonth',
                        'faqable_id' => $id,
                        'category' => 'Seasonal Planning',
                        'sort_order' => $sortIdx + 1,
                        'is_active' => true,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                }
            }

            $ids[$monthNum] = $id;
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

        $pillarsData = [
            'seasons' => [
                'name' => 'Seasons & Timing',
                'slug' => 'seasons',
                'description' => 'Weather windows, pre-monsoon rhododendron blooms, crisp autumn visibility, and high-pass winter considerations.',
                'kicker' => 'EXPEDITION PILLAR 01 · TIMING',
                'tagline' => 'Weather Windows & Trail Conditions',
                'summary' => 'High-altitude Himalayan weather is defined by the Indian monsoon cycle, subtropical jet stream movements, and severe diurnal temperature swings.',
                'lead' => 'Timing your trek to the appropriate climatic window dictates mountain clarity, snow pass viability, and daily comfort. Choosing correctly between pre-monsoon rhododendron blooms and post-monsoon crystal clarity is the foundation of every successful expedition.',
                'icon' => 'sun',
                'sort_order' => 1,
                'is_active' => true,
                'rules' => json_encode([
                    ['rule' => 'Post-Monsoon Peak (Oct – Nov)', 'detail' => 'The premier window for crystal-clear 360° panoramas. Washed clean by autumn winds, skies remain brilliant from sunrise to dusk, though night temperatures at high camp drop below freezing.'],
                    ['rule' => 'Pre-Monsoon Bloom (Mar – May)', 'detail' => 'Rising temperatures and longer daylight hours awaken the lower foothills in brilliant rhododendron blossoms. Afternoon cloud build-up is common, requiring early-morning ridge crossings.'],
                    ['rule' => 'Trans-Himalayan Sanctuaries (Jun – Aug)', 'detail' => 'While monsoon rains soak the southern slopes, rain-shadow regions like Upper Mustang and Upper Dolpo remain dry, arid, and ideal for summer high-plateau walking.'],
                    ['rule' => 'Winter Threshold (Dec – Feb)', 'detail' => 'Characterized by bone-dry azure skies and tranquil, crowd-free teahouses. However, high-altitude passes over 5,000m face heavy drift snow and closed high-camps.'],
                    ['rule' => 'Flight Weather Contingencies', 'detail' => 'Always budget at least 1–2 contingency buffer days in Kathmandu, especially when flying to visual-flight-dependent airstrips like Lukla or Jomsom.'],
                ]),
                'hazards' => json_encode([
                    'Attempting high pass crossings in late December without technical winter mountaineering equipment.',
                    'Booking tight international flight connections less than 24 hours after a scheduled mountain domestic flight.',
                    'Neglecting rain gear during early September shoulder-season transitions.',
                ]),
                'checklists' => json_encode([
                    'Cross-check trail status with Sagarmatha or Annapurna park headquarters.',
                    'Verify current pass clearance reports with local teahouse operators.',
                    'Ensure travel insurance covers high-altitude helicopter repatriation up to 6,000m.',
                ]),
            ],
            'packing' => [
                'name' => 'Packing & Gear',
                'slug' => 'packing',
                'description' => 'Tested layering systems, cold-rated sleeping bags, footwear selection, and pack weight discipline.',
                'kicker' => 'EXPEDITION PILLAR 02 · DISCIPLINE',
                'tagline' => 'Alpine Layering & Teahouse Kit Discipline',
                'summary' => 'Warmth at 5,000 meters is generated through modular trapped air layers, not bulky single garments. Strict pack discipline preserves stamina.',
                'lead' => 'High-altitude teahouses provide wooden beds and foam mattresses in unheated rooms where interior temperatures frequently drop below -10°C. Your personal duffel and daypack comprise your survival shelter on the move.',
                'icon' => 'backpack',
                'sort_order' => 2,
                'is_active' => true,
                'rules' => json_encode([
                    ['rule' => 'The 3-Layer Thermodynamic System', 'detail' => 'Base layer (merino wool to wick sweat without odor), Mid layer (breathable grid fleece or lightweight down for insulation), and Outer layer (windproof, waterproof breathable Gore-Tex shell).'],
                    ['rule' => '-15°C Sleeping Bag Minimum', 'detail' => 'Never rely solely on teahouse blankets. A certified 4-season down sleeping bag with a comfort rating of -15°C to -20°C is mandatory for high-pass sanctuaries.'],
                    ['rule' => 'Strict 15kg Duffel Cap', 'detail' => 'For porter welfare and trail ergonomics, your main waterproof duffel must not exceed 15kg (33 lbs). Daypacks should stay under 5–7kg including 2 liters of water.'],
                    ['rule' => 'Footwear Readiness', 'detail' => 'Sturdy, ankle-supporting waterproof trekking boots broken in at least 6 weeks before departure. Pack lightweight camp shoes or down booties for evenings.'],
                    ['rule' => 'Cold-Proof Electronics & Power', 'detail' => 'Sub-zero temperatures deplete phone and camera batteries rapidly. Keep devices in inner jacket pockets near your body heat, and carry a 20,000mAh insulated power bank.'],
                ]),
                'hazards' => json_encode([
                    'Wearing cotton garments: cotton absorbs sweat, dries slowly, and rapidly induces hypothermia when you halt.',
                    'Brand-new unproven trekking boots that cause debilitating heel blisters on Day 2.',
                    'Single-bottle hydration setups that freeze solid on early morning alpine pass crossings.',
                ]),
                'checklists' => json_encode([
                    'Dual water purification: chlorine dioxide tablets + UV SteriPEN or Sawyer squeeze filter.',
                    'UV Category 3 or 4 polarized sunglasses with side-shields to prevent snow blindness.',
                    'Waterproof dry-bags to compartmentalize clothing inside your porter duffel.',
                ]),
            ],
            'preparation' => [
                'name' => 'Preparation & Health',
                'slug' => 'preparation',
                'description' => 'Safe elevation gains, hydration baselines, AMS recognition, and physical endurance baselines.',
                'kicker' => 'EXPEDITION PILLAR 03 · PHYSIOLOGY',
                'tagline' => 'Altitude Acclimatization Curves & Safety',
                'summary' => 'High-altitude illness (AMS) is indifferent to physical fitness. Safety is governed by biological adaptation rates and sensible ascent curves.',
                'lead' => 'At 5,000m, effective atmospheric oxygen is reduced to approximately 50% of sea-level density. Acclimatization is an active physiological process requiring measured ascent pacing, disciplined hydration, and immediate honesty regarding symptoms.',
                'icon' => 'shield',
                'sort_order' => 3,
                'is_active' => true,
                'rules' => json_encode([
                    ['rule' => '300m–500m Daily Sleeping Gain Cap', 'detail' => 'Above 3,000m (Namche Bazaar / Manang), limit net sleeping elevation gains to no more than 300m to 500m per 24-hour cycle, regardless of physical energy.'],
                    ['rule' => 'Mandatory Rest / Active Acclimatization Days', 'detail' => 'Schedule structured rest days every 1,000m of total ascent. Use these days for afternoon active walks ("climb high, sleep low") gaining 200m–300m before returning to sleep.'],
                    ['rule' => '3–4 Liters Daily Hydration', 'detail' => 'Hyperventilation in dry mountain air dramatically accelerates fluid loss. Drink a minimum of 3 to 4 liters of purified water or electrolyte tea daily.'],
                    ['rule' => 'The Golden Rule of Altitude', 'detail' => 'Any headache, nausea, or dizziness above 2,500m is assumed to be Acute Mountain Sickness (AMS) until proven otherwise. Never ascend with symptoms.'],
                    ['rule' => 'Daily Oximeter Monitoring', 'detail' => 'Our lead guides conduct twice-daily pulse-oximeter and Lake Louise Score assessments every morning and evening before dinner.'],
                ]),
                'hazards' => json_encode([
                    'Concealing headaches or mild nausea from your guide out of pride or peer pressure.',
                    'Consuming alcohol, sedatives, or sleeping pills at or above 3,000m.',
                    'Pushing forward to "keep up with the group" when an extra acclimatization night is warranted.',
                ]),
                'checklists' => json_encode([
                    'Comprehensive personal medical kit including ibuprofen, blister pads, rehydration salts, and Diamox.',
                    'Consult your personal travel physician regarding acetazolamide (Diamox) suitability.',
                    'Familiarity with HAPE/HACE warning indicators (ataxia, confusion, persistent wet cough).',
                ]),
            ],
            'planning' => [
                'name' => 'Route Planning',
                'slug' => 'planning',
                'description' => 'Comparing daily walking hours, teahouse versus camping logistics, and contingency buffer days.',
                'kicker' => 'EXPEDITION PILLAR 04 · ROUTE ARCHITECTURE',
                'tagline' => 'Shortlists, Pacing & Technicality Matching',
                'summary' => 'Matching route difficulty, duration, and group physical comfort creates a transformative, sustainable journey.',
                'lead' => 'Nepal offers routes ranging from gentle foothill cultural walks with luxury lodges to remote restricted-area wilderness circuits traversing glaciers. Choosing the right trail requires realistic self-assessment.',
                'icon' => 'map',
                'sort_order' => 4,
                'is_active' => true,
                'rules' => json_encode([
                    ['rule' => 'Daily Walking Budgets (5–7 Hours)', 'detail' => 'A sustainable pace averages 5 to 7 hours of walking per day, allowing leisurely lunch stops, photo breaks, and arrival at camp before late-afternoon chill.'],
                    ['rule' => 'Pre-Dawn Alpine Starts (Pass Days)', 'detail' => 'Major pass crossings like Thorong La (5,416m), Cho La (5,420m), or Larkya La (5,106m) demand departures at 4:00 AM to cross before noon wind gusts.'],
                    ['rule' => 'Permit & Restricted Area Compliance', 'detail' => 'Restricted circuits (Manaslu, Upper Mustang, Nar Phu) require a minimum of two travelers, government-licensed guide accompaniment, and special immigration permits.'],
                    ['rule' => 'Teahouse vs. Wilderness Camping', 'detail' => 'Teahouse routes offer hot dal bhat and fireside dining. Remote trails require full autonomous support teams, kitchen tents, and pack mules.'],
                    ['rule' => 'Pacing Homogeneity', 'detail' => 'In private parties, pace to the rhythm of the slowest walker. Rushing separates groups and risks navigational or hypothermic exposure.'],
                ]),
                'hazards' => json_encode([
                    'Selecting high-pass circuits for first-time multi-day hikers without prior foothill experience.',
                    'Compressing 14-day itineraries into 10 days by eliminating mandatory rest camps.',
                    'Attempting unescorted solo treks in restricted conservation corridors.',
                ]),
                'checklists' => json_encode([
                    'Review interactive route elevation profiles and daily kilometer distances.',
                    'Confirm your fitness training (stair climbing with weighted pack) 12 weeks prior.',
                    'Compare alternative circuit spurs (e.g. adding Gokyo Lakes to EBC).',
                ]),
            ],
            'culture' => [
                'name' => 'Himalayan Culture',
                'slug' => 'culture',
                'description' => 'Buddhist mani stone customs, stupa circumambulation, prayer flags, and mountain etiquette.',
                'kicker' => 'EXPEDITION PILLAR 05 · REVERENCE',
                'tagline' => 'Monasteries, Sherpa Heritage & Etiquette',
                'summary' => 'The high valleys are sacred Buddhist and Hindu sanctuaries. Walking with humility enriches your experience and honors host communities.',
                'lead' => 'From the Sherpa settlements of Khumbu to the Gurung villages of Annapurna and the Tibetan-origin clans of Manaslu, centuries-old traditions flourish along mountain trails. Understanding local etiquette transforms tourism into genuine human exchange.',
                'icon' => 'compass',
                'sort_order' => 5,
                'is_active' => true,
                'rules' => json_encode([
                    ['rule' => 'Clockwise Circumambulation', 'detail' => 'Always pass mani walls (carved prayer stones), chortens, and stupas on your left, walking clockwise. This honors sacred Buddhist custom.'],
                    ['rule' => 'Monastery Protocol', 'detail' => 'Remove hats, sunglasses, and shoes before entering monastery prayer halls (gompas). Never point the soles of your feet toward an altar or monk.'],
                    ['rule' => 'Dignified Photography', 'detail' => 'Always seek verbal permission before photographing monks, elderly residents, or children. Respect interior photography bans inside ancient shrines.'],
                    ['rule' => 'Modesty in Mountain Villages', 'detail' => 'Dress modestly in rural settlements. Avoid sleeveless tops or short shorts; covered shoulders and knees demonstrate cultural respect.'],
                    ['rule' => 'Direct Economic Reciprocity', 'detail' => 'Support village economies directly: purchase seasonal apples, handwoven woolen items, and locally made tea rather than commercial imports.'],
                ]),
                'hazards' => json_encode([
                    'Stepping directly over religious offerings, fire hearths, or sacred stones.',
                    'Distributing candy, pens, or money to village children, which encourages begging.',
                    'Disturbing quiet monastic meditation or evening pujas with loud flash photography.',
                ]),
                'checklists' => json_encode([
                    'Learn fundamental Nepali greetings: "Namaste" and Sherpa "Tashi Delek".',
                    'Carry small NPR denomination cash for temple maintenance donations (butter lamps).',
                    'Familiarize yourself with local Tibetan prayer flag meanings and wind-horse symbols.',
                ]),
            ],
            'logistics' => [
                'name' => 'Travel Logistics',
                'slug' => 'logistics',
                'description' => 'Lukla flight weather buffers, TIMS card permits, national park entry fees, and mountain transfers.',
                'kicker' => 'EXPEDITION PILLAR 06 · EXPEDITION BASELINE',
                'tagline' => 'Permits, Mountain Flights & Checkpoints',
                'summary' => 'Remote mountain transit requires realistic time buffers, localized coordination, and adaptability to alpine conditions.',
                'lead' => 'Mountain logistics in Nepal operate in challenging topography where weather patterns dictate flight safety and landslides can alter road corridors. Smooth transit relies on experienced local dispatch and realistic buffer days.',
                'icon' => 'plane',
                'sort_order' => 6,
                'is_active' => true,
                'rules' => json_encode([
                    ['rule' => 'Mountain Flight Realities (VFR Windows)', 'detail' => 'High-altitude airstrips (Lukla, Jomsom, Talcha) operate under Visual Flight Rules only. Morning clear-sky windows dictate operations; afternoon winds frequently halt departures.'],
                    ['rule' => 'Ramechhap / Manthali Rerouting', 'detail' => 'During peak autumn and spring seasons, civil aviation frequently reroutes Lukla flights through Ramechhap Airport (a 4-hour night drive from Kathmandu) to decongest airspace.'],
                    ['rule' => 'Hard Cash Currency Requirement', 'detail' => 'High teahouses have no ATMs or card machines. Carry sufficient Nepalese Rupees (NPR) from Kathmandu for hot showers, battery charging, and personal refreshments.'],
                    ['rule' => 'SIM Cards & Teahouse Wi-Fi', 'detail' => 'NTC and Ncell SIM cards provide 4G in major valley hubs like Namche and Pokhara. In higher camps, teahouses offer satellite Wi-Fi vouchers (AirJaldi / Everest Link).'],
                    ['rule' => 'Licensed Mountain Leadership', 'detail' => 'Nepal regulations mandate licensed guide accompaniment on most major routes. Always ensure your guide holds certified Ministry of Tourism credentials and wilderness first aid training.'],
                ]),
                'hazards' => json_encode([
                    'Carrying only credit cards and finding yourself stranded without cash for teahouse charging or Wi-Fi.',
                    'Leaving zero buffer days before long-haul international flights home.',
                    'Failing to keep passport copies and physical permits in waterproof ziplock bags.',
                ]),
                'checklists' => json_encode([
                    'Secure 4 passport photos in advance for TIMS and National Park permits.',
                    'Exchange sufficient cash in Kathmandu (budget ~$25–$35 USD/day for personal incidentals).',
                    'Register emergency contact details with your embassy in Kathmandu.',
                ]),
            ],
        ];

        foreach ($pillarsData as $pSlug => $pData) {
            $existingCat = DB::table('article_categories')->where('slug', $pSlug)->first();
            if ($existingCat) {
                DB::table('article_categories')->where('id', $existingCat->id)->update(array_merge($pData, ['updated_at' => now()]));
                $categoryIds[$pSlug] = $existingCat->id;
            } else {
                $categoryIds[$pSlug] = DB::table('article_categories')->insertGetId(array_merge($pData, [
                    'created_at' => now(),
                    'updated_at' => now(),
                ]));
            }
        }

        foreach ($articles as $article) {
            $category = $article['category'] ?? 'planning';
            if (!isset($categoryIds[$category])) {
                $categoryIds[$category] = DB::table('article_categories')->insertGetId([
                    'name' => Str::headline($category),
                    'slug' => Str::slug($category),
                    'is_active' => true,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }

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

        $this->seedSafetyPage();
        $this->seedAboutPage();
        $this->seedContactPage();
        $this->seedWhenToGoPage();
        $this->seedPolicyPages();
        $this->seedResponsibleTravelPage($heroAssetId);
    }

    protected function seedSafetyPage(): void
    {
        $safetyAssetId = DB::table('media_assets')->where('filename', 'safety-hero.jpg')->value('id');
        if (!$safetyAssetId) {
            $safetyAssetId = DB::table('media_assets')->insertGetId([
                'filename' => 'safety-hero.jpg',
                'path' => 'https://thumb.wikimedia.org/wikipedia/commons/thumb/2/29/Himalayas%2C_Ama_Dablam%2C_Nepal.jpg/1920px-Himalayas%2C_Ama_Dablam%2C_Nepal.jpg',
                'mime_type' => 'image/jpeg',
                'width' => 1920,
                'height' => 1080,
                'title' => 'Expansive alpine ridgeline beneath the iconic summit of Ama Dablam',
                'alt_text' => 'Expansive alpine ridgeline beneath the iconic summit of Ama Dablam',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        $safetyPageId = DB::table('website_pages')->insertGetId([
            'title' => 'Himalayan Safety & Field Support Framework',
            'slug' => 'safety',
            'type' => 'safety',
            'summary' => 'Trekking in high-altitude environments requires structured acclimatization, open communication, and proactive trail decision-making. Explore our proposed preparation framework and discussion guidelines below.',
            'body' => '<p>At E.A.T.H. Travels, field safety is not an afterthought or a marketing slogan. It is a continuous, disciplined operational protocol governing every hour on the trail, from initial medical review in Kathmandu to high-pass crossings and contingency descent routing.</p>',
            'notice_title' => 'Sample editorial layout — operational content must be verified',
            'notice_body' => 'This page is an editorial preview showing how safety policies, health check routines, and field coordination topics could be structured. It does not constitute verified company policy, medical advice, or real-time emergency dispatch instructions. In live operations, all guidelines must be verified with certified mountain leaders and official health authorities.',
            'cta_title' => 'Have Questions About Trail Pacing or Altitude Preparation?',
            'cta_description' => 'Our team can help design an itinerary structured around your fitness and acclimatization comfort. Submit a simulated planning question or build a tailored route proposal.',
            'cta_primary_btn_text' => 'Ask a Planning Question →',
            'cta_primary_btn_url' => '/contact',
            'cta_secondary_btn_text' => 'Start Custom Journey Planner',
            'cta_secondary_btn_url' => '/plan-my-trek',
            'meta_title' => 'Safety & Field Support Framework | EATH Trekking Website',
            'meta_description' => 'Explore our proposed safety discussion framework, acclimatization pacing questions, and field coordination standards for Himalayan trekking.',
            'is_active' => true,
            'is_published' => true,
            'published_at' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('media_attachments')->insert([
            'media_asset_id' => $safetyAssetId,
            'attachable_type' => 'website_page',
            'attachable_id' => $safetyPageId,
            'collection' => 'hero',
            'title' => 'Safety & Field Support Hero',
            'alt_text' => 'Expansive alpine ridgeline beneath the iconic summit of Ama Dablam',
            'sort_order' => 0,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $safetySections = [
            [
                'heading' => 'Proposed Preparation-Discussion Framework',
                'layout_key' => 'cards_grid',
                'sort_order' => 1,
                'body' => 'Before embarking on a mountain journey, travelers and expedition planners should align across three critical preparation phases:',
                'content' => json_encode([
                    'tag' => 'Three-Stage Model',
                    'items' => [
                        [
                            'title' => 'Pre-Trip Medical & Conditioning Alignment',
                            'tag' => 'Phase 1',
                            'description' => 'Review cardiovascular fitness, personal medications, and previous high-altitude exposure with a physician. Confirm an itinerary designed with gradual daily ascent increments.',
                        ],
                        [
                            'title' => 'Daily Trail Monitoring & Pacing Checks',
                            'tag' => 'Phase 2',
                            'description' => 'Establish routine morning and evening health check-ins, assess hydration and appetite, and evaluate daily walking pace against group fatigue markers.',
                        ],
                        [
                            'title' => 'Contingency Buffers & Descent Routing',
                            'tag' => 'Phase 3',
                            'description' => 'Ensure the route contains built-in weather rest days and clearly mapped lower-elevation fallback trails in the event of persistent symptoms or sudden snowstorms.',
                        ],
                    ],
                ]),
            ],
            [
                'heading' => 'Questions About Guide Support & Responsibilities',
                'layout_key' => 'checklist',
                'sort_order' => 2,
                'body' => 'Before a real trip, confirm who provides support and what the actual itinerary includes. Key questions to discuss with your operator include:',
                'content' => json_encode([
                    'tag' => 'Field Leadership',
                    'items' => [
                        [
                            'title' => 'Field Leadership Ratio',
                            'tag' => 'Guide Standards',
                            'description' => 'What is the ratio of licensed guides and assistant guides to clients on technical or steep trail sections?',
                        ],
                        [
                            'title' => 'Wilderness First Aid Qualifications',
                            'tag' => 'Medical Training',
                            'description' => 'Are all accompanying guides currently certified in Wilderness First Aid (WFA) or Wilderness First Responder (WFR)?',
                        ],
                        [
                            'title' => 'Turn-Around Authority',
                            'tag' => 'Operational Command',
                            'description' => 'Does the lead guide have explicit authority to mandate a rest day or initiate a descent if a trekker exhibits acute altitude symptoms?',
                        ],
                        [
                            'title' => 'Porter & Crew Welfare',
                            'tag' => 'Fair Employment',
                            'description' => 'Are porters and support staff provided with fair wages, load limits (maximum 20–25kg), adequate cold-weather clothing, and rescue insurance?',
                        ],
                    ],
                ]),
            ],
            [
                'heading' => 'Itinerary & Acclimatization Information to Confirm',
                'layout_key' => 'cards_grid',
                'sort_order' => 3,
                'body' => 'Ascent rate is the single most controllable risk factor in preventing Acute Mountain Sickness (AMS). When reviewing any proposed trekking schedule, verify the following details:',
                'content' => json_encode([
                    'tag' => 'Altitude Physiology',
                    'items' => [
                        [
                            'title' => 'Sleeping Elevation Increments',
                            'tag' => 'Max 500m / Day',
                            'description' => 'Confirm that sleeping elevation gains above 3,000 meters do not exceed recommended thresholds (typically 300 to 500 meters per day) without an intervening rest night.',
                        ],
                        [
                            'title' => 'Active Acclimatization Days',
                            'tag' => 'Climb High, Sleep Low',
                            'description' => 'Confirm that rest days include optional “climb high, sleep low” day hikes to stimulate physiological adaptation without overexertion.',
                        ],
                    ],
                ]),
            ],
            [
                'heading' => 'Communication Arrangements to Confirm',
                'layout_key' => 'checklist',
                'sort_order' => 4,
                'body' => 'Himalayan valleys vary widely in mobile cellular reception. Confirm communication contingencies before departing the trailhead:',
                'content' => json_encode([
                    'tag' => 'Connectivity & Dispatch',
                    'items' => [
                        [
                            'title' => 'Satellite Messaging & Tracking',
                            'tag' => 'Satellite Mesh',
                            'description' => 'Verify whether the field crew carries two-way satellite messengers (e.g. Garmin inReach) for remote valley communication.',
                        ],
                        [
                            'title' => 'Base Operations Check-ins',
                            'tag' => 'Kathmandu Base',
                            'description' => 'Confirm the frequency of routine status updates between the trail leader and the central operations base in Kathmandu.',
                        ],
                        [
                            'title' => 'Cellular Dead Zones',
                            'tag' => 'Offline Expectations',
                            'description' => 'Clarify which specific valleys or high camps on your itinerary have no cellular connectivity so family members understand expected offline periods.',
                        ],
                    ],
                ]),
            ],
            [
                'heading' => 'Weather & Itinerary Decision Questions',
                'layout_key' => 'cards_grid',
                'sort_order' => 5,
                'body' => 'Mountain weather is dynamic, especially during seasonal transition windows. Formulate clear decision rules with your team:',
                'content' => json_encode([
                    'tag' => 'Alpine Meteorology',
                    'items' => [
                        [
                            'title' => 'Pass Crossing Windows',
                            'tag' => 'Early Departure',
                            'description' => 'Ask what local meteorological indicators are monitored before committing to high pass crossings like Cho La, Thorong La, or Larkya La.',
                        ],
                        [
                            'title' => 'Buffer Days for Domestic Flights',
                            'tag' => 'Flight Contingency',
                            'description' => 'Ensure at least one to two contingency days in Kathmandu following Lukla or Jomsom flights to avoid missing international departure flights during weather delays.',
                        ],
                    ],
                ]),
            ],
            [
                'heading' => 'Emergency-Coordination Protocols & Dispatch Boundaries',
                'layout_key' => 'disclosure',
                'sort_order' => 6,
                'body' => 'In active commercial operations, an expedition provider must maintain formal emergency dispatch coordination with helicopter charter services, high-altitude medical clinics in Pheriche and Manang, and international insurance assistance providers.',
                'content' => json_encode([
                    'tag' => 'Protocols',
                    'items' => [
                        [
                            'title' => 'Commercial Dispatch Infrastructure',
                            'tag' => 'Verified Protocol',
                            'description' => 'Direct radio and satellite links connect field leaders to private helicopter charters in Kathmandu and Pokhara for expedited medical evacuation.',
                        ],
                        [
                            'title' => 'Prototype Boundary Disclosure',
                            'tag' => 'Transparency Standard',
                            'description' => 'Notice: The EATH preview platform does not provide active emergency rescue telephone numbers, medical dispatch, or guaranteed helicopter evacuation capabilities. For real emergencies in Nepal, contact certified emergency services or your travel insurance assistance provider directly.',
                        ],
                    ],
                ]),
            ],
            [
                'heading' => 'Traveler Responsibilities & Insurance Questions',
                'layout_key' => 'checklist',
                'sort_order' => 7,
                'body' => 'Every participant shares responsibility for collective group safety on Himalayan trails:',
                'content' => json_encode([
                    'tag' => 'Traveler Care',
                    'items' => [
                        [
                            'title' => 'Mandatory Helicopter Evacuation Coverage',
                            'tag' => 'Up to 6,000m',
                            'description' => 'Does your policy explicitly cover emergency helicopter search, rescue, and repatriation up to the highest altitude of your route (e.g. 5,600m or 6,000m)? Standard travel policies frequently cap coverage at 3,000m.',
                        ],
                        [
                            'title' => 'Cashless Guarantee of Payment',
                            'tag' => 'Direct Billing',
                            'description' => 'Does your insurer have established direct-billing relationships with Kathmandu emergency hospitals, or are you required to pay upfront?',
                        ],
                        [
                            'title' => 'Medical Condition Transparency',
                            'tag' => 'Health Disclosure',
                            'description' => 'Disclose any asthma, hypertension, or past altitude sickness to your expedition leader before reaching the trailhead.',
                        ],
                        [
                            'title' => 'Honest Self-Assessment',
                            'tag' => 'Early Reporting',
                            'description' => 'Commit to reporting headaches, nausea, or sleeplessness immediately rather than attempting to “push through” symptoms.',
                        ],
                    ],
                ]),
            ],
        ];

        foreach ($safetySections as $sec) {
            DB::table('website_page_sections')->insert([
                'website_page_id' => $safetyPageId,
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

    protected function seedAboutPage(): void
    {
        $aboutAssetId = DB::table('media_assets')->where('filename', 'about-hero.jpg')->value('id');
        if (!$aboutAssetId) {
            $aboutAssetId = DB::table('media_assets')->insertGetId([
                'filename' => 'about-hero.jpg',
                'path' => 'https://images.unsplash.com/photo-1605559424843-9e4c228bf1c2?auto=format&fit=crop&w=1000&q=75',
                'mime_type' => 'image/jpeg',
                'width' => 1600,
                'height' => 900,
                'title' => 'Vast panoramic view of the Greater Himalaya mountain chain at sunrise',
                'alt_text' => 'Vast panoramic view of the Greater Himalaya mountain chain at sunrise',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        $aboutPageId = DB::table('website_pages')->insertGetId([
            'title' => 'About EATH: Elevated Alpine Trekking & Hospitality',
            'slug' => 'about',
            'type' => 'about',
            'summary' => 'A modern approach to Himalayan journey planning built around transparent pacing, traveler preferences, and honest environmental boundaries.',
            'body' => '<p>Founded in Kathmandu, E.A.T.H. Travels brings clarity, transparency, and unhurried alpine pacing to high-mountain exploration across Nepal, Tibet, and Bhutan. We believe mountain travel should be measured by the depth of your connection with the trails and people, not by rushed schedules or superficial bucket lists.</p>',
            'notice_title' => 'Sample Brand Narrative Notice',
            'notice_body' => 'This page presents proposed brand positioning and architectural design for the EATH platform. Descriptions of operational methods, guide profiles, and service philosophies represent sample editorial content for testing and evaluation, not verified historical records.',
            'cta_title' => 'Design Your Tailored Himalayan Journey',
            'cta_description' => 'Step away from rigid tour packages. Use our interactive planner to find routes matched to your experience, duration, and personal mountain rhythm.',
            'cta_primary_btn_text' => 'Launch Journey Planner →',
            'cta_primary_btn_url' => '/plan-my-trek',
            'cta_secondary_btn_text' => 'Explore Trek Catalog',
            'cta_secondary_btn_url' => '/treks',
            'meta_title' => 'About EATH · Proposed Brand Story & Philosophy · EATH Website',
            'meta_description' => 'Proposed brand story, planning philosophy, and architectural design for the EATH Himalayan trekking website platform.',
            'is_active' => true,
            'is_published' => true,
            'published_at' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('media_attachments')->insert([
            'media_asset_id' => $aboutAssetId,
            'attachable_type' => 'website_page',
            'attachable_id' => $aboutPageId,
            'collection' => 'hero',
            'title' => 'About EATH Hero',
            'alt_text' => 'Vast panoramic view of the Greater Himalaya mountain chain at sunrise',
            'sort_order' => 0,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $aboutSections = [
            [
                'heading' => 'Rethinking the Himalayan Trekking Experience',
                'layout_key' => 'standard',
                'sort_order' => 1,
                'body' => '<p>Himalayan trekking has historically been presented through rigid package formulas, crowded high-volume corridors, and marketing superlatives that obscure the genuine physical and logistical realities of mountain travel.</p><p>EATH is conceived to shift the focus back to where it belongs: thoughtful itinerary pacing, transparent trade-offs, and traveler self-determination. Rather than pressuring visitors with artificial scarcity or rushed departures, our digital platform organizes routes according to real-world considerations—acclimatization safety, seasonal suitability, and personal travel rhythm.</p><p>Whether you seek the quiet tranquility of lateral valley trails, photographic dawn pacing, or authentic interactions with high-mountain communities, the platform provides clear, grounded criteria to help you design an intentional journey.</p>',
                'content' => json_encode(['tag' => 'Our Approach']),
            ],
            [
                'heading' => 'How Our Planning Platform Operates',
                'layout_key' => 'cards_grid',
                'sort_order' => 2,
                'body' => 'A three-step guided progression designed to replace high-pressure sales with transparent exploration.',
                'content' => json_encode([
                    'tag' => 'The Workflow',
                    'items' => [
                        [
                            'title' => 'Explore by Season & Region',
                            'tag' => 'Step 01',
                            'description' => 'Filter itineraries using historical climatic windows and regional terrain characters rather than generalized promises.',
                        ],
                        [
                            'title' => 'Guided Criteria Matching',
                            'tag' => 'Step 02',
                            'description' => 'Define your available days, party composition, physical comfort zone, and preferred pacing to evaluate deterministic route recommendations.',
                        ],
                        [
                            'title' => 'Transparent Review & Synthesis',
                            'tag' => 'Step 03',
                            'description' => 'Review itemized illustrative estimates and route trade-offs before generating a non-PII plan receipt—with zero forced deposits.',
                        ],
                    ],
                ]),
            ],
            [
                'heading' => 'Our Core Planning & Guiding Principles',
                'layout_key' => 'checklist',
                'sort_order' => 3,
                'body' => 'Four foundational commitments guide our route architecture, client consultations, and field operations:',
                'content' => json_encode([
                    'tag' => 'Operational Ethos',
                    'items' => [
                        [
                            'title' => 'Conservative Acclimatization Pacing',
                            'tag' => 'Safety First',
                            'description' => 'We reject compressed schedules. Every high-altitude itinerary mandates conservative sleeping elevation profiles and built-in contingency buffers.',
                        ],
                        [
                            'title' => 'Fair Staff Protections',
                            'tag' => 'Porter Welfare',
                            'description' => 'Porters, guides, and kitchen crew receive fair market-leading wages, strict 20kg weight limits, and equal emergency medical coverage.',
                        ],
                        [
                            'title' => 'Sacred Landscape Stewardship',
                            'tag' => 'Leave No Trace',
                            'description' => 'Active commitment to single-use plastic elimination, water source preservation, and reverence for centuries-old monastic traditions.',
                        ],
                        [
                            'title' => 'Honest, Unbundled Pricing',
                            'tag' => 'Full Transparency',
                            'description' => 'No hidden permit fees, unexpected tipping surcharges, or forced gear rentals. Every quote itemizes field costs openly.',
                        ],
                    ],
                ]),
            ],
            [
                'heading' => 'Indigenous Leadership & Field Guide Network',
                'layout_key' => 'cards_grid',
                'sort_order' => 4,
                'body' => 'Our expeditions are led exclusively by certified native mountain guides born and raised in the valleys they navigate.',
                'content' => json_encode([
                    'tag' => 'Mountain Leadership',
                    'items' => [
                        [
                            'title' => 'Wilderness First Responders',
                            'tag' => 'Medical Certification',
                            'description' => 'All lead guides carry active Wilderness First Responder (WFR) credentials with annual high-altitude pulse oximetry retraining.',
                        ],
                        [
                            'title' => 'Native Valley Heritage',
                            'tag' => 'Cultural Roots',
                            'description' => 'Guides share firsthand cultural lineage with Sherpa, Gurung, Tamang, and Thakali mountain communities.',
                        ],
                        [
                            'title' => 'Uncompromising Safety Authority',
                            'tag' => 'Guide Discretion',
                            'description' => 'Lead guides have unreserved authority to mandate rest days or initiate immediate descent if altitude symptoms develop.',
                        ],
                    ],
                ]),
            ],
        ];

        foreach ($aboutSections as $sec) {
            DB::table('website_page_sections')->insert([
                'website_page_id' => $aboutPageId,
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

    protected function seedContactPage(): void
    {
        $contactAssetId = DB::table('media_assets')->where('filename', 'contact-hero.jpg')->value('id');
        if (!$contactAssetId) {
            $contactAssetId = DB::table('media_assets')->insertGetId([
                'filename' => 'contact-hero.jpg',
                'path' => 'https://images.unsplash.com/photo-1578328819058-b69f3a3b0f6b?auto=format&fit=crop&w=1000&q=75',
                'mime_type' => 'image/jpeg',
                'width' => 1600,
                'height' => 900,
                'title' => 'Serene morning atmosphere overlooking the Himalayan foothills',
                'alt_text' => 'Serene morning atmosphere overlooking the Himalayan foothills',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        $contactPageId = DB::table('website_pages')->insertGetId([
            'title' => 'Contact Our Trekking Team (Website)',
            'slug' => 'contact',
            'type' => 'contact',
            'summary' => 'Have questions about route feasibility, seasonal timing, or physical preparation? Test our simulated inquiry workflow below.',
            'body' => '<p>Our Kathmandu expedition operations base is staffed year-round by certified mountain planners and logistical coordinators. Whether you are inquiring about a customized Khumbu itinerary or seeking advice on monsoon transitions, our team provides realistic, unvarnished guidance.</p>',
            'notice_title' => 'Simulated Contact Notice — Real Database Storage in Inquiries Table',
            'notice_body' => 'This form models customer inquiry intake for the EATH platform. In this preview environment, submissions are saved locally to the inquiries database table and displayed inside the Admin Panel Leads & Operations module.',
            'meta_title' => 'Contact Our Trekking Team (Website) | EATH Trekking Website',
            'meta_description' => 'Simulate sending an expedition inquiry or route planning question to our Himalayan trekking team in this preview preview.',
            'is_active' => true,
            'is_published' => true,
            'published_at' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('media_attachments')->insert([
            'media_asset_id' => $contactAssetId,
            'attachable_type' => 'website_page',
            'attachable_id' => $contactPageId,
            'collection' => 'hero',
            'title' => 'Contact Team Hero',
            'alt_text' => 'Serene morning atmosphere overlooking the Himalayan foothills',
            'sort_order' => 0,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    protected function seedWhenToGoPage(): void
    {
        $assetId = DB::table('media_assets')->where('filename', 'when-to-go-hero.jpg')->value('id');
        if (!$assetId) {
            $assetId = DB::table('media_assets')->insertGetId([
                'filename' => 'when-to-go-hero.jpg',
                'path' => 'https://thumb.wikimedia.org/wikipedia/commons/thumb/e/e7/Everest_North_Face_toward_Base_Camp_Tibet_Luca_Galuzzi_2006.jpg/1920px-Everest_North_Face_toward_Base_Camp_Tibet_Luca_Galuzzi_2006.jpg',
                'mime_type' => 'image/jpeg',
                'width' => 1920,
                'height' => 1080,
                'title' => 'Himalayan seasonal trekking vistas across Nepal',
                'alt_text' => 'Panoramic seasonal view of Himalayan peaks and walking trails',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        $pageId = DB::table('website_pages')->insertGetId([
            'title' => 'When to Trek in Nepal: Month-by-Month Guide',
            'slug' => 'when-to-go',
            'type' => 'standard',
            'summary' => 'Himalayan trekking conditions shift markedly across elevation zones and seasons. Use this interactive calendar to review seasonal patterns, historical trail rhythms, and catalog itineraries matched to each travel month.',
            'body' => '<p>Planning the timing of a Himalayan journey involves weighing altitude, temperature, mountain visibility, and trail atmosphere across four distinct seasons.</p>',
            'notice_title' => 'Sample Seasonality Notice',
            'notice_body' => 'Monthly suitability profiles reflect historical climatic patterns and catalog fixture tags. They do not constitute real-time weather forecasts, guarantee trail passability, or confirm departure operation. Independent route verification is essential before real-world travel.',
            'cta_title' => 'Need Advice on Timing Your Expedition?',
            'cta_description' => 'Our mountain coordinators can help you align trail conditions, pass openings, and regional festival dates with your preferred travel window.',
            'cta_primary_btn_text' => 'Ask Timing Specialist',
            'cta_primary_btn_url' => '/contact',
            'meta_title' => 'When to Trek in Nepal · Month-by-Month Guide · EATH Website',
            'meta_description' => 'Explore the month-by-month guide to trekking in Nepal. Compare seasons, trail conditions, and catalog journeys.',
            'is_active' => true,
            'is_published' => true,
            'published_at' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('media_attachments')->insert([
            'media_asset_id' => $assetId,
            'attachable_type' => 'website_page',
            'attachable_id' => $pageId,
            'collection' => 'hero',
            'title' => 'When to Go Hero',
            'alt_text' => 'Panoramic seasonal view of Himalayan peaks and walking trails',
            'sort_order' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Four Himalayan Seasons Section
        DB::table('website_page_sections')->insert([
            'website_page_id' => $pageId,
            'heading' => 'Four Himalayan Seasons',
            'layout_key' => 'cards_grid',
            'sort_order' => 1,
            'body' => 'Season wording represents an illustrative organizational label based on historical regional trends, not current weather guidance or operational promises.',
            'content' => json_encode([
                'tag' => 'Climatic Framework',
                'items' => [
                    [
                        'name' => 'Spring',
                        'title' => 'Spring',
                        'months' => 'March – May',
                        'month_ids' => [3, 4, 5],
                        'summary' => 'Mild temperatures, vibrant rhododendron blooms along mid-elevation ridges, and extended daytime hours. Excellent visibility in early mornings before afternoon cloud developments.',
                        'trail_flow' => 'High enthusiasm; popular corridors experience steady traveler traffic.',
                    ],
                    [
                        'name' => 'Summer / Monsoon',
                        'title' => 'Summer / Monsoon',
                        'months' => 'June – August',
                        'month_ids' => [6, 7, 8],
                        'summary' => 'Lush terraced hillsides and dramatic cloud formations. Southern flanks receive seasonal precipitation, while trans-Himalayan rain-shadow zones (like Upper Mustang) remain dry and serene.',
                        'trail_flow' => 'Quiet trails; limited departures on southern faces with regular departures in rain-shadow regions.',
                    ],
                    [
                        'name' => 'Autumn',
                        'title' => 'Autumn',
                        'months' => 'September – November',
                        'month_ids' => [9, 10, 11],
                        'summary' => 'Crisp post-monsoon atmosphere, exceptional crystal-clear mountain panoramas, and dependable daytime trail conditions across all major Himalayan massifs.',
                        'trail_flow' => 'Peak trekking window with high social vitality across classic tea-house junctions.',
                    ],
                    [
                        'name' => 'Winter',
                        'title' => 'Winter',
                        'months' => 'December – February',
                        'month_ids' => [12, 1, 2],
                        'summary' => 'Dry, bright daytime sunshine with sharp, sub-zero nighttime temperatures. Lower and mid-elevation routes offer tranquil walking, while high-altitude passes frequently experience heavy snow.',
                        'trail_flow' => 'Low footprint and minimal trail encounters; some high-altitude teahouses close for winter break.',
                    ],
                ],
            ]),
            'is_active' => true,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    protected function seedPolicyPages(): void
    {
        $policies = [
            'privacy' => [
                'title' => 'Privacy Policy',
                'summary' => 'Learn how EATH collects, protects, and handles traveler information across our platform and booking inquiries.',
                'notice_title' => 'Website Policy Layout — Professional Review Required',
                'notice_body' => 'Website policy layout — not binding terms; professional and business review required before launch.',
                'sections' => [
                    [
                        'heading' => '1. Information We Collect',
                        'body' => 'We collect personal information necessary to plan and coordinate Himalayan mountain journeys. This includes your name, email address, nationality, contact phone numbers, emergency contact details, dietary requirements, and high-altitude medical fitness disclosures provided during planning inquiries or booking submissions.',
                    ],
                    [
                        'heading' => '2. Purpose & Legal Basis for Processing',
                        'body' => 'Your information is used exclusively to facilitate route proposals, issue official government national park permits, register TIMS cards, coordinate domestic STOL flights (e.g. Lukla, Jomsom), arrange village teahouse lodgings, and establish mountain safety rosters for field expedition leaders.',
                    ],
                    [
                        'heading' => '3. Information Sharing & Field Third Parties',
                        'body' => 'We share essential travel details strictly with authorized operational partners required to deliver your journey: licensed native trekking guides, regional national park authorities, domestic aviation carriers, and certified emergency helicopter evacuation services when rapid dispatch is required.',
                    ],
                    [
                        'heading' => '4. Data Retention & Safeguards',
                        'body' => 'We implement encryption, role-based access restrictions, and secure database backups to safeguard your information. Personal information is retained only as long as required to fulfill operational, accounting, and legal requirements under Nepal tourism regulations.',
                    ],
                    [
                        'heading' => '5. Cookies & Local Browser Storage',
                        'body' => 'We use non-invasive session tokens and functional cookies to remember your shortlisted journeys in the Compare Treks tool and preserve your step progression in the Journey Planner. We do not deploy third-party advertising tracking or sell behavioral profiles.',
                    ],
                    [
                        'heading' => '6. Your Privacy Rights & Access Requests',
                        'body' => 'You have the right to request access to the personal data we hold about you, request corrections to inaccurate information, or request deletion of non-essential records. To exercise these rights, please contact our team via privacy@eath.test.',
                    ],
                ],
            ],
            'terms' => [
                'title' => 'Terms & Conditions',
                'summary' => 'Standard terms governing the use of the EATH platform, route planning tools, and trekking service agreements.',
                'notice_title' => 'Website Terms Layout — Professional Review Required',
                'notice_body' => 'Website policy layout — not binding terms; professional and business review required before launch.',
                'sections' => [
                    [
                        'heading' => '1. Acceptance of Terms & Platform Use',
                        'body' => 'By accessing the EATH website and utilizing our interactive journey planning tools, you agree to comply with these terms of use. All content, route diagrams, and software interfaces are the proprietary property of E.A.T.H. Travels (P) Ltd.',
                    ],
                    [
                        'heading' => '2. Booking Confirmation & Reservations',
                        'body' => 'A reservation is deemed provisional until the required deposit has been received and verified by our operations team. Upon payment verification, an official expedition dossier and confirmation itinerary will be dispatched.',
                    ],
                    [
                        'heading' => '3. Pricing, Inclusions & Currency Fluctuations',
                        'body' => 'All published prices are quoted in USD and include licensed guide services, porter allocations, national park entry permits, and standard teahouse accommodations as itemized. Personal equipment, international airfare, Nepal visa fees, and personal travel insurance are excluded.',
                    ],
                    [
                        'heading' => '4. Traveler Health, Acclimatization & Safety Authority',
                        'body' => 'Trekkers agree to abide by the safety instructions of the designated lead guide at all times. The lead guide holds absolute and unreserved operational authority to mandate an acclimatization rest day, modify trail routing, or order immediate descent if a traveler demonstrates acute altitude symptoms.',
                    ],
                    [
                        'heading' => '5. Inherent Mountain Risks & Limitation of Liability',
                        'body' => 'Himalayan mountain travel involves inherent risks including extreme weather, rockfall, altitude sickness, landslide delays, and unpredictable flight cancellations. Travelers voluntarily accept these hazards and agree that EATH is not liable for disruptions beyond reasonable operational control.',
                    ],
                    [
                        'heading' => '6. Governing Law & Dispute Resolution',
                        'body' => 'These terms are governed by and construed in accordance with the laws of Nepal. Any disputes arising from services shall first be submitted to informal mediation via the Nepal Tourism Board before formal proceedings in the courts of Kathmandu.',
                    ],
                ],
            ],
            'booking-conditions' => [
                'title' => 'Booking Conditions',
                'summary' => 'Essential booking requirements, payment milestones, and mandatory travel criteria for Himalayan expeditions.',
                'notice_title' => 'Booking Conditions Layout — Professional Review Required',
                'notice_body' => 'Website policy layout — not binding terms; professional and business review required before launch.',
                'sections' => [
                    [
                        'heading' => '1. Advance Deposit & Reservation Confirmation',
                        'body' => 'To secure guide assignments, advance hotel blocks, and high-demand domestic flights (such as Kathmandu/Manthali to Lukla), a non-refundable deposit of 25% of the total journey price is required at the time of booking.',
                    ],
                    [
                        'heading' => '2. Final Balance Payment Schedule',
                        'body' => 'The remaining 75% balance is due 30 days prior to your scheduled trip start date. Bookings made within 30 days of departure must be settled in full at the time of reservation confirmation.',
                    ],
                    [
                        'heading' => '3. Mandatory High-Altitude Emergency Insurance',
                        'body' => 'Every participant must hold active travel insurance that explicitly covers emergency helicopter search, evacuation, and medical repatriation up to 6,000 meters above sea level. Proof of policy must be presented before trailhead departure.',
                    ],
                    [
                        'heading' => '4. Passport Validity & Nepal Visa Requirements',
                        'body' => 'All foreign travelers must hold a passport valid for at least 6 months beyond the intended departure date from Nepal. Tourist visas may be obtained on arrival at Tribhuvan International Airport in Kathmandu or via the official Nepal Immigration online portal.',
                    ],
                    [
                        'heading' => '5. Operator Itinerary Amendments',
                        'body' => 'We reserve the right to alter route schedules, campsite locations, or lodge choices due to sudden weather shifts, trail washouts, heavy snow conditions, or group acclimatization pacing. Alternative arrangements of equal standard will be provided wherever possible.',
                    ],
                ],
            ],
            'cancellation' => [
                'title' => 'Cancellation Policy',
                'summary' => 'Clear rules on cancellation timelines, refunds, postponement options, and uncontrollable weather interruptions.',
                'notice_title' => 'Cancellation Policy Layout — Professional Review Required',
                'notice_body' => 'Website policy layout — not binding terms; professional and business review required before launch.',
                'sections' => [
                    [
                        'heading' => '1. Client Cancellation Notice & Refund Tiers',
                        'body' => 'If you cancel your expedition, notice must be received in writing. Refund amounts depend on the timeline: 60+ days prior to departure: 100% refund minus deposit; 30 to 59 days prior: 50% refund of balance; fewer than 30 days prior: no refund applicable.',
                    ],
                    [
                        'heading' => '2. Non-Refundable Sunk Costs',
                        'body' => 'Government national park entry permits, special restricted area permits (e.g. Upper Mustang, Manaslu), and non-transferable domestic flight tickets become non-refundable immediately upon formal issuance.',
                    ],
                    [
                        'heading' => '3. Uncontrollable Delays & Weather Interruptions',
                        'body' => 'In the event of severe weather causing flight cancellations to or from mountain airstrips (e.g. Lukla), we assist travelers with priority rebooking, helicopter charter upgrades (at traveler expense), or modified overland itineraries. Additional hotel nights in Kathmandu during weather groundings are the traveler’s responsibility.',
                    ],
                    [
                        'heading' => '4. Trip Postponement & Credit Transfers',
                        'body' => 'Travelers wishing to postpone their expedition rather than cancel may transfer their deposit to any departure within 12 months of the original date, subject to a nominal administrative rescheduling fee and notice provided at least 45 days in advance.',
                    ],
                    [
                        'heading' => '5. Medical Evacuation & Early Descent',
                        'body' => 'If a traveler descends early from a trek due to injury, altitude sickness, or personal choice, no refunds or credits are granted for unused itinerary days, lodge bookings, or guide services.',
                    ],
                ],
            ],
            'cookies' => [
                'title' => 'Cookie Policy',
                'summary' => 'Information on how cookies and browser local storage are used to enhance your route planning experience.',
                'notice_title' => 'Cookie Policy Layout — Professional Review Required',
                'notice_body' => 'Website policy layout — not binding terms; professional and business review required before launch.',
                'sections' => [
                    [
                        'heading' => '1. What Are Cookies & Local Storage',
                        'body' => 'Cookies and local browser storage are small text elements saved on your device by your web browser. They allow our website to remember your session state, maintain security tokens, and retain interactive selections as you browse.',
                    ],
                    [
                        'heading' => '2. Essential Cookies We Use',
                        'body' => 'Essential cookies are strictly necessary to deliver core platform functionality, including CSRF security protection, user session authentication, and maintaining safe form submissions across our planning interfaces.',
                    ],
                    [
                        'heading' => '3. Functional Preferences & Trek Comparison',
                        'body' => 'We use functional cookies to remember your shortlisted journeys in the Compare Treks module, preserve step inputs in the Journey Planner wizard, and respect your high-contrast or text readability display preferences.',
                    ],
                    [
                        'heading' => '4. Managing & Clearing Cookies',
                        'body' => 'You can configure your browser to reject cookies or notify you when a cookie is placed. You can also clear all stored session tokens at any time using the on-site reset controls located in the website footer.',
                    ],
                ],
            ],
        ];

        foreach ($policies as $slug => $policy) {
            $pageId = DB::table('website_pages')->insertGetId([
                'title' => $policy['title'],
                'slug' => $slug,
                'type' => 'policy',
                'summary' => $policy['summary'],
                'body' => '<p>' . e($policy['summary']) . '</p>',
                'notice_title' => $policy['notice_title'],
                'notice_body' => $policy['notice_body'],
                'meta_title' => $policy['title'] . ' | EATH Trekking Website',
                'meta_description' => $policy['summary'],
                'is_active' => true,
                'is_published' => true,
                'published_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            foreach ($policy['sections'] as $index => $sec) {
                DB::table('website_page_sections')->insert([
                    'website_page_id' => $pageId,
                    'heading' => $sec['heading'],
                    'layout_key' => 'standard',
                    'sort_order' => $index + 1,
                    'body' => $sec['body'],
                    'content' => json_encode(['tag' => 'Policy Section']),
                    'is_active' => true,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }

    protected function seedResponsibleTravelPage(int $heroAssetId): void
    {
        $responsiblePageId = DB::table('website_pages')->insertGetId([
            'title' => 'Responsible Mountain Travel & Porter Welfare',
            'slug' => 'responsible-travel',
            'type' => 'responsible',
            'summary' => 'The Himalayas are home to ancient living cultures, sensitive high-altitude ecosystems, and hardworking mountain communities. Explore our proposed operational code for ethical field leadership and environmental stewardship.',
            'body' => '<p>Responsible Himalayan trekking balances deep exploration with cultural integrity, fair employment practices, and proactive trail preservation.</p>',
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

    protected function seedComparisonPresets(): void
    {
        $presets = [
            [
                'name' => 'Classic Trio: EBC vs ABC vs Langtang',
                'slug' => 'classic-trio',
                'description' => "Direct head-to-head comparison of Nepal's three iconic teahouse trails across Khumbu, Annapurna, and Langtang.",
                'trek_ids' => json_encode(['everest-base-camp', 'annapurna-base-camp', 'langtang-valley']),
                'sort_order' => 1,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Annapurna Ridges: Mardi Himal vs Khopra',
                'slug' => 'annapurna-ridges',
                'description' => 'Compare scenic panoramic ridge walks in the Annapurna sanctuary with high alpine vantage points and peaceful trails.',
                'trek_ids' => json_encode(['mardi-himal', 'khopra-ridge']),
                'sort_order' => 2,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Everest Routes: Base Camp vs Gokyo Lakes',
                'slug' => 'everest-routes',
                'description' => 'Decide between the iconic Khumbu glacier classic trail and the turquoise high-altitude lake sanctuary of Gokyo Ri.',
                'trek_ids' => json_encode(['everest-base-camp', 'gokyo-lakes']),
                'sort_order' => 3,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        foreach ($presets as $preset) {
            DB::table('comparison_presets')->insert($preset);
        }
    }
}
