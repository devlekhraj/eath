<?php

namespace Website\Http\Controllers;

use App\Http\Controllers\Controller;
use Website\Services\WebsiteCatalogRepository;

class ExperienceController extends Controller
{
    public function index()
    {
        $experiences = WebsiteCatalogRepository::getExperiences();
        $allTreks = WebsiteCatalogRepository::getTreks();

        // Curate 3 diversified example treks
        $exampleTreks = array_slice(array_values(array_filter($allTreks, fn($t) => in_array($t['id'], ['t-ebc', 't-abc', 't-mardi'], true))), 0, 3);
        if (count($exampleTreks) < 3) {
            $exampleTreks = array_slice($allTreks, 0, 3);
        }

        return view('website_preview.pages.experiences.index', [
            'experiences' => $experiences,
            'exampleTreks' => $exampleTreks,
            'breadcrumbs' => [
                ['label' => 'Home', 'url' => route('website.home')],
                ['label' => 'Experiences'],
            ],
        ]);
    }

    public function show(string $slug)
    {
        $exp = WebsiteCatalogRepository::findExperience($slug);
        abort_unless($exp, 404);

        $matchingTreks = $exp['treks'] ?? [];
        $trekIds = array_column($matchingTreks, 'id');

        // Associated regions from matching treks
        $regionsMap = [];
        foreach ($matchingTreks as $t) {
            if (!empty($t['region'])) {
                $regionsMap[$t['region']['id']] = $t['region'];
            }
        }
        $associatedRegions = array_values($regionsMap);

        // Associated months union from matching treks
        $monthSet = [];
        foreach ($matchingTreks as $t) {
            foreach ($t['suitable_months'] ?? [] as $m) {
                $monthSet[$m] = true;
            }
        }
        ksort($monthSet);
        $allMonths = WebsiteCatalogRepository::getMonths();
        $associatedMonths = array_values(array_filter($allMonths, fn($m) => isset($monthSet[$m['id']])));

        // Related articles: match trek_ids or category, max 3
        $allArticles = WebsiteCatalogRepository::getArticles();
        $matchedArticles = [];
        foreach ($allArticles as $art) {
            $common = array_intersect($art['trek_ids'] ?? [], $trekIds);
            if (!empty($common)) {
                $matchedArticles[] = $art;
            }
        }
        if (count($matchedArticles) < 3) {
            foreach ($allArticles as $art) {
                if (!in_array($art['id'], array_column($matchedArticles, 'id'), true)) {
                    $matchedArticles[] = $art;
                }
                if (count($matchedArticles) >= 3) break;
            }
        }
        $matchedArticles = array_slice($matchedArticles, 0, 3);

        // Curated editorial content for each of the 6 themes
        $contentMap = [
            'mountain-scenery' => [
                'emphasis' => 'This travel theme emphasizes sweeping alpine vistas, glacial amphitheaters, and front-row perspectives of 8,000-meter Himalayan giants. Routes prioritize viewpoints like Kala Patthar, Gokyo Ri, and high sanctuary ridges where expansive mountain panoramas define the journey.',
                'cues' => 'Ideal for travelers motivated by open mountain horizons, dramatic summit silhouettes, and ridge-top vantage points.',
                'highlights' => [
                    ['title' => 'Big Mountain Panoramas', 'description' => 'Unobstructed vistas of iconic peaks including Everest, Lhotse, Annapurna, and Dhaulagiri.'],
                    ['title' => 'Glacial Amphitheaters', 'description' => 'Hiking alongside moraines, hanging icefields, and high-altitude cirques.'],
                    ['title' => 'Iconic Viewpoint Ascents', 'description' => 'Morning walks to prominent outlook summits designed for 360-degree mountain visibility.'],
                ],
                'prepQuestions' => [
                    ['title' => 'Morning Cold Readiness', 'body' => 'Are you prepared with insulated thermal layers and wind protection for sub-zero sunrise viewpoint walks?'],
                    ['title' => 'Terrain Comfort', 'body' => 'Are your trekking boots broken in for uneven moraine paths, loose gravel, and rocky ridgelines?'],
                    ['title' => 'Altitude Pacing', 'body' => 'Do you have schedule flexibility to maintain conservative ascent rates above 4,000 meters?'],
                ],
                'faqs' => [
                    ['question' => 'How high are the main viewpoints in mountain scenery routes?', 'answer' => 'Catalog routes under this theme reach maximum elevations between 4,130m (Annapurna Base Camp) and 5,545m (Kala Patthar). All high viewpoints require gradual acclimatization.'],
                    ['question' => 'What are the clearest months for mountain views?', 'answer' => 'Autumn (October to November) offers exceptionally clear skies following the monsoon, while Spring (March to April) pairs crisp mornings with blossoming lower forests.'],
                    ['question' => 'Does selecting mountain scenery mean the trek is technically difficult?', 'answer' => 'Not necessarily. While high-altitude viewpoints require good cardiovascular fitness, they remain non-technical hiking trails without mountaineering equipment.'],
                ],
            ],
            'cultural-trails' => [
                'emphasis' => 'This travel theme emphasizes deep immersion in Himalayan heritage, ancient Buddhist monasteries, stone chortens, and welcoming Sherpa, Gurung, and Tamang mountain villages. It prioritizes meaningful village interactions and learning about high-altitude spiritual traditions.',
                'cues' => 'Suited for curious travelers who value heritage, monastic architecture, traditional agricultural terraces, and local storytelling as much as alpine topography.',
                'highlights' => [
                    ['title' => 'Living Monastic Traditions', 'description' => 'Visiting centuries-old gompas, attending morning prayers, and observing Buddhist ritual.'],
                    ['title' => 'Indigenous Village Life', 'description' => 'Experiencing daily rhythms in stone-built settlements with terraced barley and potato fields.'],
                    ['title' => 'Sacred Trail Features', 'description' => 'Walking clockwise past historic mani stone walls, prayer wheels, and chortens.'],
                ],
                'prepQuestions' => [
                    ['title' => 'Cultural Etiquette', 'body' => 'Are you prepared to respect local customs, such as asking before taking portraits and walking clockwise around sacred structures?'],
                    ['title' => 'Modest Teahouse Stays', 'body' => 'Are you comfortable dining family-style around central wood stoves in village lodges?'],
                    ['title' => 'Engaged Pacing', 'body' => 'Are you willing to allocate time during walking days to stop at heritage sites and village museums?'],
                ],
                'faqs' => [
                    ['question' => 'Which ethnic communities inhabit these cultural trails?', 'answer' => 'Depending on the route, you will encounter Sherpa communities in the Khumbu, Gurung and Magar villages in the Annapurna foothills, Tamang families in Langtang, and Tibetan-lineage communities in Manaslu and Mustang.'],
                    ['question' => 'Can travelers visit monasteries along the trails?', 'answer' => 'Yes. Historic monasteries like Tengboche in Everest, Kyanjin in Langtang, and Lo Gekar in Mustang welcome respectful visitors, often allowing attendance at daily prayers.'],
                    ['question' => 'Are special permits required for cultural regions?', 'answer' => 'Standard conservation permits apply, while sensitive northern border areas like Upper Mustang and Manaslu require dedicated restricted-area permits and licensed guide accompaniment.'],
                ],
            ],
            'quiet-trails' => [
                'emphasis' => 'This travel theme emphasizes secluded valley paths, lower-footprint alternative routes, and peaceful pine-forested ridgelines off the high-traffic express corridors. It offers a calmer, introspective trail rhythm. Note: This describes relative trail character, not an absolute crowd forecast or guarantee of solitude.',
                'cues' => 'Ideal for hikers seeking stillness, natural soundscapes, and personal space away from bustling teahouse junctions.',
                'highlights' => [
                    ['title' => 'Intimate Trail Flow', 'description' => 'Walking with fewer trail encounters and quiet forest atmospheres.'],
                    ['title' => 'Alternative Route Network', 'description' => 'Traversing lateral ridges like Khopra Danda or pristine valleys like Langtang.'],
                    ['title' => 'Authentic Small-Lodge Hospitality', 'description' => 'Staying in community-managed lodges and family-run teahouses.'],
                ],
                'prepQuestions' => [
                    ['title' => 'Simpler Amenities', 'body' => 'Are you comfortable with more rustic lodge facilities, shared bathrooms, and basic menus on less commercial routes?'],
                    ['title' => 'Self-Contained Pace', 'body' => 'Do you enjoy walking without the commercial hubs and bakeries found on mainstream tourist corridors?'],
                    ['title' => 'Trail Flexibility', 'body' => 'Are you adaptable to minor trail adjustments based on seasonal village livestock movements?'],
                ],
                'faqs' => [
                    ['question' => 'Does "quieter" mean these routes are dangerous or unmarked?', 'answer' => 'No. All routes in our catalog follow recognized, safe trekking trails accompanied by professional local guides and established teahouse networks.'],
                    ['question' => 'When is the best time for quiet-trail trekking?', 'answer' => 'Shoulder months like late November or early spring offer exceptionally tranquil trail experiences, while Upper Mustang provides peaceful trekking even during summer.'],
                    ['question' => 'Is cell service and Wi-Fi available on quiet trails?', 'answer' => 'Connectivity is often more intermittent on alternative trails. We recommend travelers embrace digital disconnect opportunities.'],
                ],
            ],
            'short-treks' => [
                'emphasis' => 'This travel theme emphasizes compact, highly rewarding itineraries under 8 to 10 days that deliver authentic Himalayan immersion within limited vacation windows. Routes prioritize quick access, rapid transitions to alpine ridges, and manageable physical pacing.',
                'cues' => 'Perfect for travelers with limited total days in Nepal who want to experience high viewpoints, rhododendron forests, and teahouse hospitality without multi-week commitments.',
                'highlights' => [
                    ['title' => 'Time-Efficient Access', 'description' => 'Reaching dramatic alpine ridge crests like Mardi Himal in under a week of trail time.'],
                    ['title' => 'Accessible Altitude Profiles', 'description' => 'Substantial mountain panoramas with lower exposure to extreme altitude strain.'],
                    ['title' => 'Comfortable Infrastructure', 'description' => 'Well-supported teahouses with convenient staging from Kathmandu or Pokhara.'],
                ],
                'prepQuestions' => [
                    ['title' => 'Buffer Scheduling', 'body' => 'Does your international flight schedule allow 1–2 days buffer in Kathmandu for transit contingencies?'],
                    ['title' => 'Daily Ascent Readiness', 'body' => 'Are your legs prepared for concentrated daily elevation gain to reach viewpoints in fewer days?'],
                    ['title' => 'Minimalist Packing', 'body' => 'Can you travel light with a compact daypack suited for streamlined short itineraries?'],
                ],
                'faqs' => [
                    ['question' => 'How short can a Nepal trek realistically be?', 'answer' => 'Our catalog includes routes like Mardi Himal (7 days) and Langtang Valley (10 days) that deliver genuine alpine landscapes in compact timelines.'],
                    ['question' => 'Do short treks reach high altitudes?', 'answer' => 'Yes, routes like Mardi Himal reach Mardi High Camp (3,580m) and Viewpoint (4,500m), providing high alpine vistas without weeks of approach.'],
                    ['question' => 'Can a short trek be combined with cultural tours in Kathmandu or Pokhara?', 'answer' => 'Absolutely. Short itineraries are ideal for pairing with valley heritage sightseeing, wildlife safaris in Chitwan, or lakeside rest in Pokhara.'],
                ],
            ],
            'photography' => [
                'emphasis' => 'This travel theme emphasizes deliberate walking paces, golden hour viewpoints, and varied Himalayan landscape textures. Routes are chosen for outstanding sunrise and sunset mountain illumination, mirrored alpine lakes, and traditional architectural details.',
                'cues' => 'Tailored for photographers and visual storytellers wanting unhurried schedules, time for tripod setups, and routes known for dramatic morning and sunset light.',
                'highlights' => [
                    ['title' => 'Golden Hour Viewpoints', 'description' => 'Strategic lodge placements near ridge viewpoints for early morning and evening light.'],
                    ['title' => 'Diverse Visual Textures', 'description' => 'Contrasting turquoise glacial lakes, prayer-flagged passes, and rugged canyon cliffs.'],
                    ['title' => 'Unhurried Trail Rhythm', 'description' => 'Schedules structured with buffer time to observe weather shifts and capture golden light.'],
                ],
                'prepQuestions' => [
                    ['title' => 'Battery Management', 'body' => 'Have you planned for cold-weather battery drainage with power banks and thermal camera wraps?'],
                    ['title' => 'Weight Distribution', 'body' => 'Is your camera kit safely balanced with personal trekking essentials in a supportive daypack?'],
                    ['title' => 'Lens Selection', 'body' => 'Do you have a versatile zoom range (e.g. 24–70mm and 70–200mm) to capture both wide landscapes and peak details?'],
                ],
                'faqs' => [
                    ['question' => 'Are drones permitted on these photography routes?', 'answer' => 'Drone operation in Nepal requires strict multi-agency permits from the Civil Aviation Authority and national park administrations. Unauthorized drone flight is strictly prohibited.'],
                    ['question' => 'Can I charge camera batteries in teahouses?', 'answer' => 'Most teahouses offer solar or hydro charging stations in communal dining areas, typically for a small local fee per device. Bringing high-capacity power banks is recommended.'],
                    ['question' => 'Which routes offer the most dramatic mountain photography?', 'answer' => 'Gokyo Lakes (reflections of Cho Oyu), Everest Base Camp (Kala Patthar sunrise), and Upper Mustang (ochre canyons and medieval walled architecture) are standout visual corridors.'],
                ],
            ],
            'iconic-routes' => [
                'emphasis' => 'This travel theme highlights the world-renowned, bucket-list Himalayan trails that have inspired mountaineering lore for over seven decades. Routes feature well-established teahouse infrastructure, historic trailheads, and legendary base camps.',
                'cues' => 'Recommended for trekkers seeking the milestone achievement of legendary trails like Everest Base Camp or Annapurna Base Camp, with clear waymarking and rich mountaineering history.',
                'highlights' => [
                    ['title' => 'Legendary Milestones', 'description' => 'Standing beneath the Khumbu Icefall or inside the sacred Annapurna Sanctuary.'],
                    ['title' => 'Rich Expedition Lore', 'description' => 'Following the footsteps of Hillary, Tenzing, Herzog, and generations of Sherpa mountaineers.'],
                    ['title' => 'Developed Infrastructure', 'description' => 'Reliable teahouse networks, diverse menus, and established emergency evacuation protocols.'],
                ],
                'prepQuestions' => [
                    ['title' => 'Trail Activity Awareness', 'body' => 'Are you prepared for lively teahouse dining halls and encountering fellow international hikers during peak seasons?'],
                    ['title' => 'Milestone Dedication', 'body' => 'Are you motivated to sustain 12 to 16 days of progressive high-altitude trekking to reach your goal?'],
                    ['title' => 'Comparison Readiness', 'body' => 'Have you evaluated iconic routes side-by-side with alternative paths to ensure the experience fits your priorities?'],
                ],
                'faqs' => [
                    ['question' => 'How crowded are iconic routes during peak season?', 'answer' => 'Everest and Annapurna see significant international visitation during October, November, and April. Starting trail days early ensures peaceful walking between teahouses.'],
                    ['question' => 'What is the physical difference between EBC and ABC?', 'answer' => 'Everest Base Camp reaches higher maximum altitudes (5,545m) and involves 14–15 days of progressive ascent, while Annapurna Base Camp tops out at 4,130m with more stone steps in lower forest gorges.'],
                    ['question' => 'Can iconic routes be customized?', 'answer' => 'Yes. Even classic itineraries can incorporate lateral detours, extra acclimatization days, or lodge upgrades through our customized trip planner.'],
                ],
            ],
        ];

        $editorialContent = $contentMap[$slug] ?? $contentMap['mountain-scenery'];

        return view('website_preview.pages.experiences.show', [
            'exp' => $exp,
            'matchingTreks' => $matchingTreks,
            'associatedRegions' => $associatedRegions,
            'associatedMonths' => $associatedMonths,
            'matchedArticles' => $matchedArticles,
            'editorialContent' => $editorialContent,
            'breadcrumbs' => [
                ['label' => 'Home', 'url' => route('website.home')],
                ['label' => 'Experiences', 'url' => route('website.experiences.index')],
                ['label' => $exp['name']],
            ],
        ]);
    }
}
