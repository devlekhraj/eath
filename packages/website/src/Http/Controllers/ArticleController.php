<?php

namespace Website\Http\Controllers;

use Admin\Models\ArticleCategory;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Website\Services\WebsiteCatalogRepository;
use Website\Support\WebsiteAssetRegistry;

class ArticleController extends Controller
{
    public function index(Request $request)
    {
        // Load active categories from database with robust fallback
        $categoriesCollection = ArticleCategory::query()
            ->with(['heroAttachment.mediaAsset'])
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->get();

        $defaultImages = [
            'seasons' => ['key' => 'article-seasons', 'alt' => 'Clear autumn skies across the Nepal Himalayas'],
            'packing' => ['key' => 'homepage-safety', 'alt' => 'Mountain trekker equipped with alpine backpack and boots'],
            'preparation' => ['key' => 'article-altitude', 'alt' => 'High-altitude snow and glacial crossing at Cho La Pass'],
            'planning' => ['key' => 'article-compare', 'alt' => 'Stone footpath winding through Himalayan valleys for route planning'],
            'culture' => ['key' => 'homepage-responsible-travel', 'alt' => 'Colorful Buddhist prayer flags and mountain village'],
            'logistics' => ['key' => 'article-logistics', 'alt' => 'High mountain suspension bridge across deep river gorge'],
        ];

        $allowedCategories = [];
        $topicPillars = [];

        if ($categoriesCollection->isNotEmpty()) {
            foreach ($categoriesCollection as $cat) {
                $allowedCategories[$cat->slug] = $cat->name;
                $heroUrl = $cat->heroAttachment?->mediaAsset?->url;
                $defaultImg = $defaultImages[$cat->slug] ?? ['key' => "article-{$cat->slug}", 'alt' => $cat->name];
                $resolvedAsset = WebsiteAssetRegistry::resolve($defaultImg['key']);
                $imageUrl = $heroUrl ?: ($resolvedAsset['url'] ?? '');

                $topicPillars[$cat->slug] = [
                    'title' => $cat->name,
                    'tagline' => $cat->tagline ?: ($cat->description ?: 'Expedition Planning'),
                    'description' => $cat->summary ?: ($cat->description ?: ''),
                    'icon' => $cat->icon ?: 'compass',
                    'image' => $imageUrl,
                    'image_alt' => $defaultImg['alt'] ?? $cat->name,
                ];
            }
        } else {
            $allowedCategories = [
                'seasons' => 'Seasons & Timing',
                'packing' => 'Packing & Gear',
                'preparation' => 'Preparation & Health',
                'planning' => 'Route Planning',
                'culture' => 'Himalayan Culture',
                'logistics' => 'Travel Logistics',
            ];
            foreach ($allowedCategories as $catSlug => $catName) {
                $defaultImg = $defaultImages[$catSlug] ?? ['key' => "article-{$catSlug}", 'alt' => $catName];
                $resolvedAsset = WebsiteAssetRegistry::resolve($defaultImg['key']);
                $topicPillars[$catSlug] = [
                    'title' => $catName,
                    'tagline' => 'Expedition Planning Guidance',
                    'description' => 'Tested field advice and logistics.',
                    'icon' => 'compass',
                    'image' => $resolvedAsset['url'] ?? '',
                    'image_alt' => $defaultImg['alt'] ?? $catName,
                ];
            }
        }

        $rawQ = $request->query('q');
        $q = is_string($rawQ) ? trim(mb_substr($rawQ, 0, 120)) : '';
        if ($q === '') {
            $q = null;
        }

        $rawCategory = $request->query('category');
        $selectedCategory = null;
        if (is_string($rawCategory) && array_key_exists(strtolower($rawCategory), $allowedCategories)) {
            $selectedCategory = strtolower($rawCategory);
        }

        // All canonical articles
        $allArticles = WebsiteCatalogRepository::getArticles();

        // Calculate counts per category
        $categoryCounts = [];
        foreach (array_keys($allowedCategories) as $catKey) {
            $categoryCounts[$catKey] = count(array_filter($allArticles, fn ($a) => $a['category'] === $catKey));
        }

        // Filtered articles
        $filteredArticles = WebsiteCatalogRepository::getArticles([
            'q' => $q,
            'category' => $selectedCategory,
        ]);

        $totalCount = count($filteredArticles);

        // Featured sample article
        $featuredArticle = null;
        if ($q === null && ($request->query('page', 1) == 1) && $selectedCategory === null) {
            $featuredArticle = WebsiteCatalogRepository::findArticle('choosing-a-travel-month');
        }

        // Pagination
        $page = max(1, (int) $request->query('page', 1));
        $perPage = 6;
        $totalPages = max(1, (int) ceil($totalCount / $perPage));
        $page = min($page, $totalPages);
        $offset = ($page - 1) * $perPage;
        $pageArticles = array_slice($filteredArticles, $offset, $perPage);

        // Enrich articles
        $treks = WebsiteCatalogRepository::getTreks();
        $treksMap = [];
        foreach ($treks as $t) {
            $treksMap[$t['id']] = $t;
        }

        $enrichArticle = function (?array $art) use ($treksMap) {
            if (!$art) {
                return null;
            }
            $related = [];
            foreach ($art['trek_ids'] ?? [] as $tId) {
                if (isset($treksMap[$tId])) {
                    $related[] = [
                        'id' => $tId,
                        'name' => $treksMap[$tId]['name'],
                        'slug' => $treksMap[$tId]['slug'],
                        'region' => $treksMap[$tId]['region']['name'] ?? 'Nepal',
                    ];
                }
            }
            $art['related_treks'] = $related;

            // Compute reading time estimate (approx 130 words/min)
            $wordCount = str_word_count($art['summary'] ?? '');
            foreach ($art['sections'] ?? [] as $s) {
                $wordCount += str_word_count($s['heading'] ?? '') + str_word_count($s['body'] ?? '');
            }
            $art['reading_time'] = max(3, (int) ceil($wordCount / 130)) . ' min read';

            return $art;
        };

        $pageArticles = array_map($enrichArticle, $pageArticles);
        if ($featuredArticle) {
            $featuredArticle = $enrichArticle($featuredArticle);
        }

        return view('website_preview.pages.articles.index', [
            'articles' => $pageArticles,
            'featuredArticle' => $featuredArticle,
            'totalCount' => $totalCount,
            'page' => $page,
            'perPage' => $perPage,
            'totalPages' => $totalPages,
            'q' => $q,
            'selectedCategory' => $selectedCategory,
            'allowedCategories' => $allowedCategories,
            'categoryCounts' => $categoryCounts,
            'topicPillars' => $topicPillars,
            'breadcrumbs' => [
                ['label' => 'Home', 'url' => route('website.home')],
                ['label' => 'Travel Guide'],
            ],
        ]);
    }

    public function show(string $slug)
    {
        $art = WebsiteCatalogRepository::findArticle($slug);
        abort_unless($art, 404);

        $categoryLabels = [
            'seasons' => 'Seasons & Timing',
            'packing' => 'Packing & Gear',
            'preparation' => 'Preparation & Health',
            'planning' => 'Route Planning',
            'culture' => 'Himalayan Culture',
            'logistics' => 'Travel Logistics',
        ];
        $categoryLabel = $categoryLabels[$art['category']] ?? ucfirst($art['category']);

        // Resolve relevant sample treks
        $relevantTreks = [];
        foreach ($art['trek_ids'] ?? [] as $tId) {
            $trek = WebsiteCatalogRepository::findTrek($tId);
            if ($trek) {
                $relevantTreks[] = $trek;
            }
        }

        // Related articles
        $allArticles = WebsiteCatalogRepository::getArticles();
        $relatedArticles = [];
        foreach ($allArticles as $other) {
            if ($other['id'] === $art['id']) {
                continue;
            }
            $isSameCategory = ($other['category'] === $art['category']);
            $intersectsTrek = !empty(array_intersect($other['trek_ids'] ?? [], $art['trek_ids'] ?? []));
            if ($isSameCategory || $intersectsTrek) {
                $relatedArticles[] = $other;
            }
        }

        if (count($relatedArticles) < 2) {
            foreach ($allArticles as $other) {
                if ($other['id'] !== $art['id'] && !in_array($other['id'], array_column($relatedArticles, 'id'), true)) {
                    $relatedArticles[] = $other;
                    if (count($relatedArticles) >= 3) break;
                }
            }
        }
        $relatedArticles = array_slice($relatedArticles, 0, 3);

        return view('website_preview.pages.articles.show', [
            'article' => $art,
            'categoryLabel' => $categoryLabel,
            'relevantTreks' => $relevantTreks,
            'relatedArticles' => $relatedArticles,
            'breadcrumbs' => [
                ['label' => 'Home', 'url' => route('website.home')],
                ['label' => 'Travel Guide', 'url' => route('website.articles.index')],
                ['label' => $categoryLabel, 'url' => route('website.articles.index', ['category' => $art['category']])],
                ['label' => $art['title']],
            ],
        ]);
    }

    public function pillarPanel(Request $request, string $key)
    {
        $category = ArticleCategory::query()
            ->with(['heroAttachment.mediaAsset'])
            ->where('slug', $key)
            ->first();

        $fallbackData = $this->getPillarsStaticData($key);

        abort_unless($category || $fallbackData, 404, 'Pillar not found');

        $defaultImages = [
            'seasons' => 'article-seasons',
            'packing' => 'homepage-safety',
            'preparation' => 'article-altitude',
            'planning' => 'article-compare',
            'culture' => 'homepage-responsible-travel',
            'logistics' => 'article-logistics',
        ];

        if ($category) {
            $heroUrl = $category->heroAttachment?->mediaAsset?->url;
            $imageKey = $defaultImages[$category->slug] ?? "article-{$category->slug}";
            $fallbackAsset = WebsiteAssetRegistry::resolve($imageKey);

            $pillar = [
                'id' => $category->id,
                'key' => $category->slug,
                'number' => str_pad($category->sort_order ?: 1, 2, '0', STR_PAD_LEFT),
                'kicker' => $category->kicker ?: ('EXPEDITION PILLAR ' . str_pad($category->sort_order ?: 1, 2, '0', STR_PAD_LEFT)),
                'title' => $category->name,
                'tagline' => $category->tagline ?: ($category->description ?: 'Expedition Planning Guidance'),
                'summary' => $category->summary ?: ($category->description ?: ($fallbackData['summary'] ?? '')),
                'lead' => $category->lead ?: ($category->summary ?: ($fallbackData['lead'] ?? '')),
                'icon' => $category->icon ?: ($fallbackData['icon'] ?? 'compass'),
                'image_url' => $heroUrl ?: ($fallbackAsset['url'] ?? ''),
                'image_key' => $imageKey,
                'rules' => !empty($category->rules) ? $category->rules : ($fallbackData['rules'] ?? []),
                'hazards' => !empty($category->hazards) ? $category->hazards : ($fallbackData['hazards'] ?? []),
                'checklists' => !empty($category->checklists) ? $category->checklists : ($fallbackData['checklists'] ?? []),
            ];
        } else {
            $pillar = $fallbackData;
        }

        $articles = WebsiteCatalogRepository::getArticles(['category' => $key]);

        return view('website_preview.pages.articles.partials.pillar_panel', [
            'pillar' => $pillar,
            'articles' => array_slice($articles, 0, 3),
        ]);
    }

    public function quickviewPanel(Request $request, string $slug)
    {
        $article = WebsiteCatalogRepository::findArticle($slug);
        abort_unless($article, 404, 'Guide not found');

        $categoryLabels = [
            'seasons' => 'Seasons & Timing',
            'packing' => 'Packing & Gear',
            'preparation' => 'Preparation & Health',
            'planning' => 'Route Planning',
            'culture' => 'Himalayan Culture',
            'logistics' => 'Travel Logistics',
        ];
        $categoryLabel = $categoryLabels[$article['category']] ?? ucfirst($article['category']);

        // Resolve related sample treks
        $treks = WebsiteCatalogRepository::getTreks();
        $treksMap = [];
        foreach ($treks as $t) {
            $treksMap[$t['id']] = $t;
        }

        $related = [];
        foreach ($article['trek_ids'] ?? [] as $tId) {
            if (isset($treksMap[$tId])) {
                $related[] = [
                    'id' => $tId,
                    'name' => $treksMap[$tId]['name'],
                    'slug' => $treksMap[$tId]['slug'],
                    'region' => $treksMap[$tId]['region']['name'] ?? 'Nepal',
                ];
            }
        }
        $article['related_treks'] = $related;

        // Reading time estimate
        $wordCount = str_word_count($article['summary'] ?? '');
        foreach ($article['sections'] ?? [] as $s) {
            $wordCount += str_word_count($s['heading'] ?? '') + str_word_count($s['body'] ?? '');
        }
        $article['reading_time'] = max(3, (int) ceil($wordCount / 130)) . ' min read';

        return view('website_preview.pages.articles.partials.quickview_panel', [
            'article' => $article,
            'categoryLabel' => $categoryLabel,
        ]);
    }

    protected function getPillarsStaticData(?string $key = null): ?array
    {
        $pillars = [
            'seasons' => [
                'key' => 'seasons',
                'number' => '01',
                'kicker' => 'EXPEDITION PILLAR 01 · TIMING',
                'title' => 'Seasons & Timing',
                'tagline' => 'Weather Windows & Trail Conditions',
                'summary' => 'High-altitude Himalayan weather is defined by the Indian monsoon cycle, subtropical jet stream movements, and severe diurnal temperature swings.',
                'lead' => 'Timing your trek to the appropriate climatic window dictates mountain clarity, snow pass viability, and daily comfort. Choosing correctly between pre-monsoon rhododendron blooms and post-monsoon crystal clarity is the foundation of every successful expedition.',
                'icon' => 'sun',
                'image_key' => 'article-seasons',
                'rules' => [
                    [
                        'rule' => 'Post-Monsoon Peak (Oct – Nov)',
                        'detail' => 'The premier window for crystal-clear 360° panoramas. Washed clean by autumn winds, skies remain brilliant from sunrise to dusk, though night temperatures at high camp drop below freezing.',
                    ],
                    [
                        'rule' => 'Pre-Monsoon Bloom (Mar – May)',
                        'detail' => 'Rising temperatures and longer daylight hours awaken the lower foothills in brilliant rhododendron blossoms. Afternoon cloud build-up is common, requiring early-morning ridge crossings.',
                    ],
                    [
                        'rule' => 'Trans-Himalayan Sanctuaries (Jun – Aug)',
                        'detail' => 'While monsoon rains soak the southern slopes, rain-shadow regions like Upper Mustang and Upper Dolpo remain dry, arid, and ideal for summer high-plateau walking.',
                    ],
                    [
                        'rule' => 'Winter Threshold (Dec – Feb)',
                        'detail' => 'Characterized by bone-dry azure skies and tranquil, crowd-free teahouses. However, high-altitude passes over 5,000m face heavy drift snow and closed high-camps.',
                    ],
                    [
                        'rule' => 'Flight Weather Contingencies',
                        'detail' => 'Always budget at least 1–2 contingency buffer days in Kathmandu, especially when flying to visual-flight-dependent airstrips like Lukla or Jomsom.',
                    ],
                ],
                'hazards' => [
                    'Attempting high pass crossings in late December without technical winter mountaineering equipment.',
                    'Booking tight international flight connections less than 24 hours after a scheduled mountain domestic flight.',
                    'Neglecting rain gear during early September shoulder-season transitions.',
                ],
                'checklists' => [
                    'Cross-check trail status with Sagarmatha or Annapurna park headquarters.',
                    'Verify current pass clearance reports with local teahouse operators.',
                    'Ensure travel insurance covers high-altitude helicopter repatriation up to 6,000m.',
                ],
            ],
            'packing' => [
                'key' => 'packing',
                'number' => '02',
                'kicker' => 'EXPEDITION PILLAR 02 · DISCIPLINE',
                'title' => 'Packing & Gear',
                'tagline' => 'Alpine Layering & Teahouse Kit Discipline',
                'summary' => 'Warmth at 5,000 meters is generated through modular trapped air layers, not bulky single garments. Strict pack discipline preserves stamina.',
                'lead' => 'High-altitude teahouses provide wooden beds and foam mattresses in unheated rooms where interior temperatures frequently drop below -10°C. Your personal duffel and daypack comprise your survival shelter on the move.',
                'icon' => 'backpack',
                'image_key' => 'homepage-safety',
                'rules' => [
                    [
                        'rule' => 'The 3-Layer Thermodynamic System',
                        'detail' => 'Base layer (merino wool to wick sweat without odor), Mid layer (breathable grid fleece or lightweight down for insulation), and Outer layer (windproof, waterproof breathable Gore-Tex shell).',
                    ],
                    [
                        'rule' => '-15°C Sleeping Bag Minimum',
                        'detail' => 'Never rely solely on teahouse blankets. A certified 4-season down sleeping bag with a comfort rating of -15°C to -20°C is mandatory for high-pass sanctuaries.',
                    ],
                    [
                        'rule' => 'Strict 15kg Duffel Cap',
                        'detail' => 'For porter welfare and trail ergonomics, your main waterproof duffel must not exceed 15kg (33 lbs). Daypacks should stay under 5–7kg including 2 liters of water.',
                    ],
                    [
                        'rule' => 'Footwear Readiness',
                        'detail' => 'Sturdy, ankle-supporting waterproof trekking boots broken in at least 6 weeks before departure. Pack lightweight camp shoes or down booties for evenings.',
                    ],
                    [
                        'rule' => 'Cold-Proof Electronics & Power',
                        'detail' => 'Sub-zero temperatures deplete phone and camera batteries rapidly. Keep devices in inner jacket pockets near your body heat, and carry a 20,000mAh insulated power bank.',
                    ],
                ],
                'hazards' => [
                    'Wearing cotton garments: cotton absorbs sweat, dries slowly, and rapidly induces hypothermia when you halt.',
                    'Brand-new unproven trekking boots that cause debilitating heel blisters on Day 2.',
                    'Single-bottle hydration setups that freeze solid on early morning alpine pass crossings.',
                ],
                'checklists' => [
                    'Dual water purification: chlorine dioxide tablets + UV SteriPEN or Sawyer squeeze filter.',
                    'UV Category 3 or 4 polarized sunglasses with side-shields to prevent snow blindness.',
                    'Waterproof dry-bags to compartmentalize clothing inside your porter duffel.',
                ],
            ],
            'preparation' => [
                'key' => 'preparation',
                'number' => '03',
                'kicker' => 'EXPEDITION PILLAR 03 · PHYSIOLOGY',
                'title' => 'Preparation & Health',
                'tagline' => 'Altitude Acclimatization Curves & Safety',
                'summary' => 'High-altitude illness (AMS) is indifferent to physical fitness. Safety is governed by biological adaptation rates and sensible ascent curves.',
                'lead' => 'At 5,000m, effective atmospheric oxygen is reduced to approximately 50% of sea-level density. Acclimatization is an active physiological process requiring measured ascent pacing, disciplined hydration, and immediate honesty regarding symptoms.',
                'icon' => 'shield',
                'image_key' => 'article-altitude',
                'rules' => [
                    [
                        'rule' => '300m–500m Daily Sleeping Gain Cap',
                        'detail' => 'Above 3,000m (Namche Bazaar / Manang), limit net sleeping elevation gains to no more than 300m to 500m per 24-hour cycle, regardless of physical energy.',
                    ],
                    [
                        'rule' => 'Mandatory Rest / Active Acclimatization Days',
                        'detail' => 'Schedule structured rest days every 1,000m of total ascent. Use these days for afternoon active walks ("climb high, sleep low") gaining 200m–300m before returning to sleep.',
                    ],
                    [
                        'rule' => '3–4 Liters Daily Hydration',
                        'detail' => 'Hyperventilation in dry mountain air dramatically accelerates fluid loss. Drink a minimum of 3 to 4 liters of purified water or electrolyte tea daily.',
                    ],
                    [
                        'rule' => 'The Golden Rule of Altitude',
                        'detail' => 'Any headache, nausea, or dizziness above 2,500m is assumed to be Acute Mountain Sickness (AMS) until proven otherwise. Never ascend with symptoms.',
                    ],
                    [
                        'rule' => 'Daily Oximeter Monitoring',
                        'detail' => 'Our lead guides conduct twice-daily pulse-oximeter and Lake Louise Score assessments every morning and evening before dinner.',
                    ],
                ],
                'hazards' => [
                    'Concealing headaches or mild nausea from your guide out of pride or peer pressure.',
                    'Consuming alcohol, sedatives, or sleeping pills at or above 3,000m.',
                    'Pushing forward to "keep up with the group" when an extra acclimatization night is warranted.',
                ],
                'checklists' => [
                    'Comprehensive personal medical kit including ibuprofen, blister pads, rehydration salts, and Diamox.',
                    'Consult your personal travel physician regarding acetazolamide (Diamox) suitability.',
                    'Familiarity with HAPE/HACE warning indicators (ataxia, confusion, persistent wet cough).',
                ],
            ],
            'planning' => [
                'key' => 'planning',
                'number' => '04',
                'kicker' => 'EXPEDITION PILLAR 04 · ROUTE ARCHITECTURE',
                'title' => 'Route Planning',
                'tagline' => 'Shortlists, Pacing & Technicality Matching',
                'summary' => 'Matching route difficulty, duration, and group physical comfort creates a transformative, sustainable journey.',
                'lead' => 'Nepal offers routes ranging from gentle foothill cultural walks with luxury lodges to remote restricted-area wilderness circuits traversing glaciers. Choosing the right trail requires realistic self-assessment.',
                'icon' => 'map',
                'image_key' => 'article-compare',
                'rules' => [
                    [
                        'rule' => 'Daily Walking Budgets (5–7 Hours)',
                        'detail' => 'A sustainable pace averages 5 to 7 hours of walking per day, allowing leisurely lunch stops, photo breaks, and arrival at camp before late-afternoon chill.',
                    ],
                    [
                        'rule' => 'Pre-Dawn Alpine Starts (Pass Days)',
                        'detail' => 'Major pass crossings like Thorong La (5,416m), Cho La (5,420m), or Larkya La (5,106m) demand departures at 4:00 AM to cross before noon wind gusts.',
                    ],
                    [
                        'rule' => 'Permit & Restricted Area Compliance',
                        'detail' => 'Restricted circuits (Manaslu, Upper Mustang, Nar Phu) require a minimum of two travelers, government-licensed guide accompaniment, and special immigration permits.',
                    ],
                    [
                        'rule' => 'Teahouse vs. Wilderness Camping',
                        'detail' => 'Teahouse routes offer hot dal bhat and fireside dining. Remote trails require full autonomous support teams, kitchen tents, and pack mules.',
                    ],
                    [
                        'rule' => 'Pacing Homogeneity',
                        'detail' => 'In private parties, pace to the rhythm of the slowest walker. Rushing separates groups and risks navigational or hypothermic exposure.',
                    ],
                ],
                'hazards' => [
                    'Selecting high-pass circuits for first-time multi-day hikers without prior foothill experience.',
                    'Compressing 14-day itineraries into 10 days by eliminating mandatory rest camps.',
                    'Attempting unescorted solo treks in restricted conservation corridors.',
                ],
                'checklists' => [
                    'Review interactive route elevation profiles and daily kilometer distances.',
                    'Confirm your fitness training (stair climbing with weighted pack) 12 weeks prior.',
                    'Compare alternative circuit spurs (e.g. adding Gokyo Lakes to EBC).',
                ],
            ],
            'culture' => [
                'key' => 'culture',
                'number' => '05',
                'kicker' => 'EXPEDITION PILLAR 05 · REVERENCE',
                'title' => 'Himalayan Culture',
                'tagline' => 'Monasteries, Sherpa Heritage & Etiquette',
                'summary' => 'The high valleys are sacred Buddhist and Hindu sanctuaries. Walking with humility enriches your experience and honors host communities.',
                'lead' => 'From the Sherpa settlements of Khumbu to the Gurung villages of Annapurna and the Tibetan-origin clans of Manaslu, centuries-old traditions flourish along mountain trails. Understanding local etiquette transforms tourism into genuine human exchange.',
                'icon' => 'compass',
                'image_key' => 'homepage-responsible-travel',
                'rules' => [
                    [
                        'rule' => 'Clockwise Circumambulation',
                        'detail' => 'Always pass mani walls (carved prayer stones), chortens, and stupas on your left, walking clockwise. This honors sacred Buddhist custom.',
                    ],
                    [
                        'rule' => 'Monastery Protocol',
                        'detail' => 'Remove hats, sunglasses, and shoes before entering monastery prayer halls (gompas). Never point the soles of your feet toward an altar or monk.',
                    ],
                    [
                        'rule' => 'Dignified Photography',
                        'detail' => 'Always seek verbal permission before photographing monks, elderly residents, or children. Respect interior photography bans inside ancient shrines.',
                    ],
                    [
                        'rule' => 'Modesty in Mountain Villages',
                        'detail' => 'Dress modestly in rural settlements. Avoid sleeveless tops or short shorts; covered shoulders and knees demonstrate cultural respect.',
                    ],
                    [
                        'rule' => 'Direct Economic Reciprocity',
                        'detail' => 'Support village economies directly: purchase seasonal apples, handwoven woolen items, and locally made tea rather than commercial imports.',
                    ],
                ],
                'hazards' => [
                    'Stepping directly over religious offerings, fire hearths, or sacred stones.',
                    'Distributing candy, pens, or money to village children, which encourages begging.',
                    'Disturbing quiet monastic meditation or evening pujas with loud flash photography.',
                ],
                'checklists' => [
                    'Learn fundamental Nepali greetings: "Namaste" and Sherpa "Tashi Delek".',
                    'Carry small NPR denomination cash for temple maintenance donations (butter lamps).',
                    'Familiarize yourself with local Tibetan prayer flag meanings and wind-horse symbols.',
                ],
            ],
            'logistics' => [
                'key' => 'logistics',
                'number' => '06',
                'kicker' => 'EXPEDITION PILLAR 06 · EXPEDITION BASELINE',
                'title' => 'Travel Logistics',
                'tagline' => 'Permits, Mountain Flights & Checkpoints',
                'summary' => 'Remote mountain transit requires realistic time buffers, localized coordination, and adaptability to alpine conditions.',
                'lead' => 'Mountain logistics in Nepal operate in challenging topography where weather patterns dictate flight safety and landslides can alter road corridors. Smooth transit relies on experienced local dispatch and realistic buffer days.',
                'icon' => 'plane',
                'image_key' => 'article-logistics',
                'rules' => [
                    [
                        'rule' => 'Mountain Flight Realities (VFR Windows)',
                        'detail' => 'High-altitude airstrips (Lukla, Jomsom, Talcha) operate under Visual Flight Rules only. Morning clear-sky windows dictate operations; afternoon winds frequently halt departures.',
                    ],
                    [
                        'rule' => 'Ramechhap / Manthali Rerouting',
                        'detail' => 'During peak autumn and spring seasons, civil aviation frequently reroutes Lukla flights through Ramechhap Airport (a 4-hour night drive from Kathmandu) to decongest airspace.',
                    ],
                    [
                        'rule' => 'Hard Cash Currency Requirement',
                        'detail' => 'High teahouses have no ATMs or card machines. Carry sufficient Nepalese Rupees (NPR) from Kathmandu for hot showers, battery charging, and personal refreshments.',
                    ],
                    [
                        'rule' => 'SIM Cards & Teahouse Wi-Fi',
                        'detail' => 'NTC and Ncell SIM cards provide 4G in major valley hubs like Namche and Pokhara. In higher camps, teahouses offer satellite Wi-Fi vouchers (AirJaldi / Everest Link).',
                    ],
                    [
                        'rule' => 'Licensed Mountain Leadership',
                        'detail' => 'Nepal regulations mandate licensed guide accompaniment on most major routes. Always ensure your guide holds certified Ministry of Tourism credentials and wilderness first aid training.',
                    ],
                ],
                'hazards' => [
                    'Carrying only credit cards and finding yourself stranded without cash for teahouse charging or Wi-Fi.',
                    'Leaving zero buffer days before long-haul international flights home.',
                    'Failing to keep passport copies and physical permits in waterproof ziplock bags.',
                ],
                'checklists' => [
                    'Secure 4 passport photos in advance for TIMS and National Park permits.',
                    'Exchange sufficient cash in Kathmandu (budget ~$25–$35 USD/day for personal incidentals).',
                    'Register emergency contact details with your embassy in Kathmandu.',
                ],
            ],
        ];

        return $key ? ($pillars[$key] ?? null) : $pillars;
    }
}
