<?php

namespace Website\Http\Controllers;

use Admin\Models\TravelMonth;
use Admin\Models\WebsitePage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Website\Services\WebsiteCatalogRepository;
use Website\Support\WebsiteAssetRegistry;

class TravelMonthController extends Controller
{
    public function index(Request $request)
    {
        $allMonths = WebsiteCatalogRepository::getMonths();

        $page = WebsitePage::with([
            'sections' => fn ($q) => $q->where('is_active', true)->orderBy('sort_order'),
            'heroAttachment.mediaAsset',
        ])
        ->where('slug', 'when-to-go')
        ->first();

        $requestedMonth = $request->query('month');
        $isDefault = empty($requestedMonth);

        // Find requested month or fallback safely to September (id = 9)
        $selectedMonth = null;
        if (!empty($requestedMonth)) {
            $selectedMonth = WebsiteCatalogRepository::findMonth($requestedMonth);
        }

        if (!$selectedMonth) {
            $selectedMonth = WebsiteCatalogRepository::findMonth(9);
            $isDefault = true;
        }

        // Matching treks for selected month
        $matchingTreks = $selectedMonth['treks'] ?? [];

        // Four labeled sample season groups (from dynamic section with fallback)
        $seasonSection = $page?->sections?->first(fn ($s) => $s->layout_key === 'cards_grid');
        $seasons = (!empty($seasonSection?->content['items']))
            ? $seasonSection->content['items']
            : null;

        if (empty($seasons)) {
            $seasons = [
            [
                'name' => 'Spring',
                'months' => 'March – May',
                'month_ids' => [3, 4, 5],
                'summary' => 'Mild temperatures, vibrant rhododendron blooms along mid-elevation ridges, and extended daytime hours. Excellent visibility in early mornings before afternoon cloud developments.',
                'trail_flow' => 'High enthusiasm; popular corridors experience steady traveler traffic.',
            ],
            [
                'name' => 'Summer / Monsoon',
                'months' => 'June – August',
                'month_ids' => [6, 7, 8],
                'summary' => 'Lush terraced hillsides and dramatic cloud formations. Southern flanks receive seasonal precipitation, while trans-Himalayan rain-shadow zones (like Upper Mustang) remain dry and serene.',
                'trail_flow' => 'Quiet trails; limited departures on southern faces with regular departures in rain-shadow regions.',
            ],
            [
                'name' => 'Autumn',
                'months' => 'September – November',
                'month_ids' => [9, 10, 11],
                'summary' => 'Crisp post-monsoon atmosphere, exceptional crystal-clear mountain panoramas, and dependable daytime trail conditions across all major Himalayan massifs.',
                'trail_flow' => 'Peak trekking window with high social vitality across classic tea-house junctions.',
            ],
            [
                'name' => 'Winter',
                'months' => 'December – February',
                'month_ids' => [12, 1, 2],
                'summary' => 'Dry, bright daytime sunshine with sharp, sub-zero nighttime temperatures. Lower and mid-elevation routes offer tranquil walking, while high-altitude passes frequently experience heavy snow.',
                'trail_flow' => 'Low footprint and minimal trail encounters; some high-altitude teahouses close for winter break.',
            ],
        ];
    }

        // Month-specific editorial descriptions
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

        $editorialFallback = $monthEditorials[$selectedMonth['id']] ?? $monthEditorials[9];
        $content = $selectedMonth['content'] ?? [];
        $currentEditorial = [
            'overview' => !empty($content['overview']) ? $content['overview'] : (!empty($selectedMonth['summary']) ? $selectedMonth['summary'] : $editorialFallback['overview']),
            'trail_vibe' => !empty($content['trail_vibe']) ? $content['trail_vibe'] : (!empty($selectedMonth['conditions_note']) ? $selectedMonth['conditions_note'] : $editorialFallback['trail_vibe']),
            'pack_tip' => !empty($content['pack_tip']) ? $content['pack_tip'] : (!empty($selectedMonth['description']) ? $selectedMonth['description'] : $editorialFallback['pack_tip']),
        ];
        $article = WebsiteCatalogRepository::findArticle('choosing-a-travel-month');

        return view('website_preview.pages.months.index', [
            'page' => $page,
            'months' => $allMonths,
            'seasons' => $seasons,
            'selectedMonth' => $selectedMonth,
            'isDefault' => $isDefault,
            'currentEditorial' => $currentEditorial,
            'matchingTreks' => $matchingTreks,
            'article' => $article,
            'title' => $page?->meta_title ?: ($page?->title ?: 'When to Trek in Nepal · Month-by-Month Guide · EATH Website'),
            'metaDescription' => $page?->meta_description ?: ($page?->summary ?: 'Himalayan trekking conditions shift markedly across elevation zones and seasons. Review seasonal patterns and matching itineraries.'),
            'breadcrumbs' => [
                ['label' => 'Home', 'url' => route('website.home')],
                ['label' => 'When to Go'],
            ],
        ]);
    }

    public function show(string $month)
    {
        $m = WebsiteCatalogRepository::findMonth($month);
        abort_unless($m, 404);

        $monthModel = TravelMonth::query()
            ->with([
                'faqs' => fn ($q) => $q->where('is_active', true)->orderBy('sort_order'),
                'heroAttachment.mediaAsset',
            ])
            ->where(function ($q) use ($month) {
                $q->where('slug', $month);
                if (is_numeric($month)) {
                    $q->orWhere('month_number', (int) $month);
                }
            })
            ->first();

        // Previous and Next month with safe December/January wrapping
        $prevId = ($m['id'] === 1) ? 12 : ($m['id'] - 1);
        $nextId = ($m['id'] === 12) ? 1 : ($m['id'] + 1);
        $prevMonth = WebsiteCatalogRepository::findMonth($prevId);
        $nextMonth = WebsiteCatalogRepository::findMonth($nextId);

        // Matching destinations strictly derived
        $matchingDestinations = [];
        $regionSlugs = [];
        foreach ($m['treks'] as $t) {
            $rSlug = is_array($t['region']) ? ($t['region']['slug'] ?? $t['region']['id'] ?? null) : ($t['region_slug'] ?? $t['region'] ?? null);
            if ($rSlug && !in_array($rSlug, $regionSlugs, true)) {
                $regionSlugs[] = $rSlug;
            }
        }
        foreach ($regionSlugs as $rSlug) {
            $dest = WebsiteCatalogRepository::findRegion($rSlug);
            if ($dest) {
                $matchingDestinations[] = $dest;
            }
        }

        $heroUrl = $monthModel?->heroAttachment?->mediaAsset?->url ?? null;
        $fallbackHero = WebsiteAssetRegistry::resolve('experience-mountain-scenery', 'Trekking in ' . $m['name']);
        $heroImage = [
            'url' => $heroUrl ?: $fallbackHero['url'],
            'alt' => $monthModel?->heroAttachment?->alt_text ?: $fallbackHero['alt'],
            'width' => 1920,
            'height' => 1080,
        ];

        $monthData = [
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

        $dbContent = $monthModel?->content ?? [];
        $dbFaqs = ($monthModel && $monthModel->faqs->isNotEmpty())
            ? $monthModel->faqs->map(fn ($f) => ['question' => $f->question, 'answer' => $f->answer])->all()
            : [];

        $defaultMonthData = $monthData[$m['id']] ?? $monthData[9];

        $currentData = [
            'summary' => $monthModel?->summary ?: ($defaultMonthData['summary'] ?? ''),
            'reasons' => !empty($dbContent['reasons']) ? $dbContent['reasons'] : ($defaultMonthData['reasons'] ?? []),
            'limitations' => !empty($dbContent['limitations']) ? $dbContent['limitations'] : ($defaultMonthData['limitations'] ?? []),
            'faqs' => !empty($dbFaqs) ? $dbFaqs : ($defaultMonthData['faqs'] ?? []),
        ];

        $prepArticles = [
            WebsiteCatalogRepository::findArticle('choosing-a-travel-month'),
            WebsiteCatalogRepository::findArticle('organizing-your-packing-questions'),
            WebsiteCatalogRepository::findArticle('questions-before-a-high-altitude-trip'),
        ];
        $prepArticles = array_values(array_filter($prepArticles));

        return view('website_preview.pages.months.show', [
            'month' => $m,
            'monthModel' => $monthModel,
            'prevMonth' => $prevMonth,
            'nextMonth' => $nextMonth,
            'matchingDestinations' => $matchingDestinations,
            'matchingTreks' => $m['treks'] ?? [],
            'heroImage' => $heroImage,
            'currentData' => $currentData,
            'prepArticles' => $prepArticles,
            'title' => 'Planning a Trek in ' . $m['name'] . ' · EATH Himalayan Website',
            'metaDescription' => $currentData['summary'] ?? ('Explore our ' . $m['name'] . ' Himalayan trekking guide, trail conditions, and seasonal itineraries.'),
            'breadcrumbs' => [
                ['label' => 'Home', 'url' => route('website.home')],
                ['label' => 'When to Go', 'url' => route('website.months.index')],
                ['label' => $m['name']],
            ],
        ]);
    }
}
