<?php

use App\Http\Middleware\EnsureWebsiteAllowed;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;
use Website\Services\WebsiteCatalogRepository;
use Website\Support\WebsiteClock;

Route::name('website.')->middleware([EnsureWebsiteAllowed::class])->group(function () {
    // P01: Preview root / Homepage (Phase 05: Exact 20-section homepage)
    Route::get('/', function () {
        $allTreks = WebsiteCatalogRepository::getTreks();
        $regions = WebsiteCatalogRepository::getRegions();
        $experiences = WebsiteCatalogRepository::getExperiences();
        $months = WebsiteCatalogRepository::getMonths();
        $selectedMonth = WebsiteCatalogRepository::findMonth(WebsiteClock::month());
        $featuredTreks = array_slice($allTreks, 0, 3);
        $compareTreks = [
            WebsiteCatalogRepository::findTrek('t-ebc'),
            WebsiteCatalogRepository::findTrek('t-abc'),
            WebsiteCatalogRepository::findTrek('t-langtang'),
        ];
        $stories = WebsiteCatalogRepository::getStories();
        $guides = WebsiteCatalogRepository::getGuides();
        $articles = array_slice(WebsiteCatalogRepository::getArticles(), 0, 3);
        $upcomingDepartures = [
            array_merge(WebsiteCatalogRepository::findDeparture('t-ebc-a') ?? [], [
                'sample_day' => '18',
                'sample_month' => 'SEP',
                'sample_year' => '2026',
                'trek_name' => 'Everest Base Camp Trek',
                'sample_difficulty' => 'Moderate',
                'sample_spaces' => '8 / 12 spaces open',
                'sample_open' => 8,
                'sample_total' => 12,
            ]),
            array_merge(WebsiteCatalogRepository::findDeparture('t-abc-c') ?? [], [
                'sample_day' => '24',
                'sample_month' => 'SEP',
                'sample_year' => '2026',
                'trek_name' => 'Annapurna Base Camp',
                'sample_difficulty' => 'Moderate',
                'sample_spaces' => '6 / 12 spaces open',
                'sample_open' => 6,
                'sample_total' => 12,
                'is_bookable' => false,
            ]),
            array_merge(WebsiteCatalogRepository::findDeparture('t-khopra-a') ?? [], [
                'sample_day' => '29',
                'sample_month' => 'SEP',
                'sample_year' => '2026',
                'trek_name' => 'Khopra Ridge Trek',
                'sample_difficulty' => 'Moderate',
                'sample_spaces' => '10 / 12 spaces open',
                'sample_open' => 10,
                'sample_total' => 12,
            ]),
        ];

        return view('website_preview.pages.home', [
            'calendar_date' => WebsiteClock::date(),
            'disclosure' => WebsiteClock::disclosure(),
            'treks' => $allTreks,
            'featuredTreks' => $featuredTreks,
            'upcomingDepartures' => $upcomingDepartures,
            'regions' => $regions,
            'experiences' => $experiences,
            'months' => $months,
            'selectedMonth' => $selectedMonth,
            'compareTreks' => $compareTreks,
            'stories' => $stories,
            'guides' => $guides,
            'articles' => $articles,
        ]);
    })->name('home');

    // Design system & visual primitives review view (Phase 03)
    Route::get('/style-guide', function () {
        return view('website_preview.pages.style-guide');
    })->name('style-guide');

    // P02: Treks Index (Phase 06: Trek listing, search, filters and sorting)
    Route::get('/treks', function (Request $request) {
        $rawQuery = $request->query();

        // 1. Normalize query parameters
        $q = isset($rawQuery['q']) ? mb_substr(trim($rawQuery['q']), 0, 120) : null;
        $region = !empty($rawQuery['region']) ? trim($rawQuery['region']) : null;
        $experience = !empty($rawQuery['experience']) ? trim($rawQuery['experience']) : null;
        $month = isset($rawQuery['month']) && is_numeric($rawQuery['month']) ? (int) $rawQuery['month'] : null;
        $daysMin = isset($rawQuery['days_min']) && is_numeric($rawQuery['days_min']) ? (int) $rawQuery['days_min'] : null;
        $daysMax = isset($rawQuery['days_max']) && is_numeric($rawQuery['days_max']) ? (int) $rawQuery['days_max'] : null;
        $difficulty = !empty($rawQuery['difficulty']) && in_array(strtolower(trim($rawQuery['difficulty'])), ['easy', 'moderate', 'challenging'], true)
            ? strtolower(trim($rawQuery['difficulty']))
            : null;
        $budgetMax = isset($rawQuery['budget_max']) && is_numeric($rawQuery['budget_max']) ? (int) $rawQuery['budget_max'] : null;
        $sort = !empty($rawQuery['sort']) && in_array($rawQuery['sort'], ['recommended', 'duration_asc', 'duration_desc', 'price_asc', 'price_desc'], true)
            ? $rawQuery['sort']
            : 'recommended';

        // Check for invalid duration range
        $hasInvalidDuration = ($daysMin !== null && $daysMax !== null && $daysMin > $daysMax);

        $filterParams = [
            'q' => $q,
            'region' => $region,
            'experience' => $experience,
            'month' => $month,
            'days_min' => $daysMin,
            'days_max' => $daysMax,
            'difficulty' => $difficulty,
            'budget_max' => $budgetMax,
            'sort' => $sort,
        ];

        // 2. Filter collection
        $filteredTreks = WebsiteCatalogRepository::filterTreks($filterParams);
        $totalCount = count($filteredTreks);

        // 3. Pagination (page size 6)
        $pageSize = 6;
        $totalPages = max(1, (int) ceil($totalCount / $pageSize));
        $requestedPage = isset($rawQuery['page']) && is_numeric($rawQuery['page']) ? (int) $rawQuery['page'] : 1;

        // Clamp out-of-range page to valid range [1, $totalPages]
        $page = max(1, min($requestedPage, $totalPages));

        $pagedTreks = array_slice($filteredTreks, ($page - 1) * $pageSize, $pageSize);

        // 4. Build Active Filter Chips
        $activeFilters = [];
        $baseParams = array_filter([
            'q' => $q,
            'region' => $region,
            'experience' => $experience,
            'month' => $month,
            'days_min' => $daysMin,
            'days_max' => $daysMax,
            'difficulty' => $difficulty,
            'budget_max' => $budgetMax,
            'sort' => $sort !== 'recommended' ? $sort : null,
        ]);

        if (!empty($q)) {
            $p = $baseParams; unset($p['q']);
            $activeFilters[] = [
                'key' => 'q',
                'label' => 'Search: "' . $q . '"',
                'remove_url' => route('website.treks.index', $p),
            ];
        }
        if (!empty($region)) {
            $reg = WebsiteCatalogRepository::findRegion($region);
            $p = $baseParams; unset($p['region']);
            $activeFilters[] = [
                'key' => 'region',
                'label' => 'Region: ' . ($reg['name'] ?? ucfirst($region)),
                'remove_url' => route('website.treks.index', $p),
            ];
        }
        if (!empty($experience)) {
            $exp = WebsiteCatalogRepository::findExperience($experience);
            $p = $baseParams; unset($p['experience']);
            $activeFilters[] = [
                'key' => 'experience',
                'label' => 'Experience: ' . ($exp['name'] ?? ucfirst($experience)),
                'remove_url' => route('website.treks.index', $p),
            ];
        }
        if ($month !== null && $month >= 1 && $month <= 12) {
            $m = WebsiteCatalogRepository::findMonth($month);
            $p = $baseParams; unset($p['month']);
            $activeFilters[] = [
                'key' => 'month',
                'label' => 'Month: ' . ($m['name'] ?? 'Month ' . $month),
                'remove_url' => route('website.treks.index', $p),
            ];
        }
        if ($daysMin !== null || $daysMax !== null) {
            $p = $baseParams; unset($p['days_min'], $p['days_max']);
            $label = 'Duration: ';
            if ($daysMin !== null && $daysMax !== null) {
                $label .= "{$daysMin}–{$daysMax} days";
            } elseif ($daysMin !== null) {
                $label .= "from {$daysMin} days";
            } else {
                $label .= "up to {$daysMax} days";
            }
            $activeFilters[] = [
                'key' => 'duration',
                'label' => $label,
                'remove_url' => route('website.treks.index', $p),
            ];
        }
        if (!empty($difficulty)) {
            $p = $baseParams; unset($p['difficulty']);
            $activeFilters[] = [
                'key' => 'difficulty',
                'label' => 'Difficulty: ' . ucfirst($difficulty),
                'remove_url' => route('website.treks.index', $p),
            ];
        }
        if ($budgetMax !== null) {
            $p = $baseParams; unset($p['budget_max']);
            $activeFilters[] = [
                'key' => 'budget_max',
                'label' => 'Budget: Up to $' . number_format($budgetMax),
                'remove_url' => route('website.treks.index', $p),
            ];
        }

        $clearAllUrl = route('website.treks.index', array_filter(['sort' => $sort !== 'recommended' ? $sort : null]));
        $journeyTypes = [
            ['key' => 'iconic-routes', 'label' => 'Iconic Mountains', 'description' => 'Recognizable peaks and classic sample routes.'],
            ['key' => 'quiet-trails', 'label' => 'Quiet Trails', 'description' => 'Sample ideas tagged for a calmer trail theme.'],
            ['key' => 'cultural-trails', 'label' => 'Cultural Journey', 'description' => 'Village and cultural-context sample itineraries.'],
            ['key' => 'short-treks', 'label' => 'Short Escape', 'description' => 'Compact sample journeys for less time away.'],
            ['key' => 'photography', 'label' => 'Photography', 'description' => 'Viewpoint and observation-led sample routes.'],
            ['key' => 'custom', 'label' => 'Custom Journey', 'description' => 'Start with your own timing and preferences.'],
        ];
        $featuredByExperience = ['iconic-routes' => 't-ebc', 'quiet-trails' => 't-langtang', 'cultural-trails' => 't-mustang', 'short-treks' => 't-mardi', 'photography' => 't-gokyo'];
        $featuredJourney = null;
        if ($experience && isset($featuredByExperience[$experience])) {
            $candidate = WebsiteCatalogRepository::findTrek($featuredByExperience[$experience]);
            if ($candidate && collect($filteredTreks)->contains('id', $candidate['id'])) $featuredJourney = $candidate;
        }
        $featuredJourney ??= $filteredTreks[0] ?? null;

        return view('website_preview.pages.treks.index', [
            'treks' => $pagedTreks,
            'totalCount' => $totalCount,
            'page' => $page,
            'totalPages' => $totalPages,
            'pageSize' => $pageSize,
            'regions' => WebsiteCatalogRepository::getRegions(),
            'experiences' => WebsiteCatalogRepository::getExperiences(),
            'months' => WebsiteCatalogRepository::getMonths(),
            'activeFilters' => $activeFilters,
            'clearAllUrl' => $clearAllUrl,
            'journeyTypes' => $journeyTypes,
            'featuredJourney' => $featuredJourney,
            'hasInvalidDuration' => $hasInvalidDuration,
            'currentParams' => [
                'q' => $q,
                'region' => $region,
                'experience' => $experience,
                'month' => $month,
                'days_min' => $daysMin,
                'days_max' => $daysMax,
                'difficulty' => $difficulty,
                'budget_max' => $budgetMax,
                'sort' => $sort,
                'page' => $page,
            ],
            'breadcrumbs' => [
                ['label' => 'Home', 'url' => route('website.home')],
                ['label' => 'Treks'],
            ],
        ]);
    })->name('treks.index');

    Route::get('/treks/{slug}/itinerary-modal', function (string $slug) {
        $trek = WebsiteCatalogRepository::findTrek($slug);
        abort_unless($trek, 404, 'Trek itinerary not found');

        return view('website_preview.modals.trek-itinerary', [
            'trek' => $trek,
        ]);
    })->name('treks.itinerary.modal');

    Route::get('/treks/{slug}', function (string $slug) {
        $trek = WebsiteCatalogRepository::findTrek($slug);
        abort_unless($trek, 404);

        $departures = WebsiteCatalogRepository::getDepartures(['trek_id' => $trek['id']]);
        $stories = WebsiteCatalogRepository::getStories(['trek_id' => $trek['id']]);
        $faqs = WebsiteCatalogRepository::getFaqs(null, $trek);

        $relatedTreks = [];
        foreach ($trek['related_trek_ids'] ?? [] as $relId) {
            if ($rel = WebsiteCatalogRepository::findTrek($relId)) {
                $relatedTreks[] = $rel;
            }
        }

        return view('website_preview.pages.treks.show', [
            'trek' => $trek,
            'departures' => $departures,
            'stories' => $stories,
            'faqs' => $faqs,
            'relatedTreks' => $relatedTreks,
            'breadcrumbs' => [
                ['label' => 'Home', 'url' => route('website.home')],
                ['label' => 'Treks', 'url' => route('website.treks.index')],
                ['label' => $trek['region']['name'] . ' Region', 'url' => route('website.destinations.show', $trek['region']['slug'])],
                ['label' => $trek['name']],
            ],
        ]);
    })->name('treks.show');

    // P04 & P05: Destinations
    Route::get('/destinations', function () {
        $regions = WebsiteCatalogRepository::getRegions();
        $allTreks = WebsiteCatalogRepository::getTreks();

        // 3 curated sample treks across distinct regions
        $featuredTreks = array_slice(array_values(array_filter($allTreks, fn($t) => in_array($t['id'], ['t-ebc', 't-abc', 't-langtang'], true))), 0, 3);
        if (count($featuredTreks) < 3) {
            $featuredTreks = array_slice($allTreks, 0, 3);
        }

        return view('website_preview.pages.destinations.index', [
            'regions' => $regions,
            'featuredTreks' => $featuredTreks,
            'breadcrumbs' => [
                ['label' => 'Home', 'url' => route('website.home')],
                ['label' => 'Destinations'],
            ],
        ]);
    })->name('destinations.index');

    Route::get('/destinations/{slug}', function (string $slug, \Illuminate\Http\Request $request) {
        $region = WebsiteCatalogRepository::findRegion($slug);
        abort_unless($region, 404);

        // Treks in this region
        $allRegionTreks = $region['treks'] ?? [];
        $regionTrekIds = array_column($allRegionTreks, 'id');

        // Apply filters: difficulty, duration, month
        $filteredTreks = $allRegionTreks;

        $difficulty = $request->query('difficulty');
        if (!empty($difficulty) && in_array($difficulty, ['easy', 'moderate', 'challenging'], true)) {
            $filteredTreks = array_filter($filteredTreks, fn($t) => ($t['difficulty'] ?? '') === $difficulty);
        }

        $duration = $request->query('duration');
        if (!empty($duration)) {
            if ($duration === 'short') {
                $filteredTreks = array_filter($filteredTreks, fn($t) => ($t['duration_days'] ?? 0) <= 8);
            } elseif ($duration === 'medium') {
                $filteredTreks = array_filter($filteredTreks, fn($t) => ($t['duration_days'] ?? 0) >= 9 && ($t['duration_days'] ?? 0) <= 14);
            } elseif ($duration === 'long') {
                $filteredTreks = array_filter($filteredTreks, fn($t) => ($t['duration_days'] ?? 0) >= 15);
            }
        }

        $month = $request->query('month');
        if (!empty($month) && is_numeric($month)) {
            $m = (int) $month;
            if ($m >= 1 && $m <= 12) {
                $filteredTreks = array_filter($filteredTreks, fn($t) => in_array($m, $t['suitable_months'] ?? [], true));
            }
        }

        $filteredTreks = array_values($filteredTreks);

        // Derived experience highlights from treks
        $allExperiences = WebsiteCatalogRepository::getExperiences();
        $experienceIds = [];
        foreach ($allRegionTreks as $t) {
            foreach ($t['experience_ids'] ?? [] as $eid) {
                $experienceIds[$eid] = true;
            }
        }
        $regionExperiences = array_values(array_filter($allExperiences, fn($e) => isset($experienceIds[$e['id']])));

        // Derived sample best months union
        $monthSet = [];
        foreach ($allRegionTreks as $t) {
            foreach ($t['suitable_months'] ?? [] as $m) {
                $monthSet[$m] = true;
            }
        }
        ksort($monthSet);
        $allMonths = WebsiteCatalogRepository::getMonths();
        $regionMonths = array_values(array_filter($allMonths, fn($m) => isset($monthSet[$m['id']])));

        // Difficulty / altitude summary ranges
        $minDays = !empty($allRegionTreks) ? min(array_column($allRegionTreks, 'duration_days')) : 0;
        $maxDays = !empty($allRegionTreks) ? max(array_column($allRegionTreks, 'duration_days')) : 0;
        $maxAlt = !empty($allRegionTreks) ? max(array_column($allRegionTreks, 'max_altitude_m')) : 0;
        $difficultiesPresent = !empty($allRegionTreks) ? array_values(array_unique(array_column($allRegionTreks, 'difficulty'))) : [];

        // Related articles: match trek_ids or category, max 3
        $articles = WebsiteCatalogRepository::getArticles();
        $matchedArticles = [];
        foreach ($articles as $art) {
            $common = array_intersect($art['trek_ids'] ?? [], $regionTrekIds);
            if (!empty($common)) {
                $matchedArticles[] = $art;
            }
        }
        if (count($matchedArticles) < 3) {
            foreach ($articles as $art) {
                if (!in_array($art['id'], array_column($matchedArticles, 'id'), true)) {
                    $matchedArticles[] = $art;
                }
                if (count($matchedArticles) >= 3) break;
            }
        }
        $matchedArticles = array_slice($matchedArticles, 0, 3);

        // Regional logistics notes
        $logisticsMap = [
            'everest' => [
                'gateway' => 'Lukla (Tenzing-Hillary Airport) via Kathmandu or Ramechhap flight',
                'trailheads' => 'Lukla, Phakding, Namche Bazaar',
                'permits' => 'Sagarmatha National Park Permit, Khumbu Pasang Lhamu Rural Municipality Card',
                'pacing' => 'Strict acclimatization rest days in Namche Bazaar (3,440m) and Dingboche (4,410m) recommended.',
            ],
            'annapurna' => [
                'gateway' => 'Pokhara via road or domestic flight from Kathmandu',
                'trailheads' => 'Nayapul, Kande, Besisahar, Jagat',
                'permits' => 'Annapurna Conservation Area Project (ACAP), TIMS Card',
                'pacing' => 'Flexible route networks allowing both moderate ridge hikes and high-pass traverses.',
            ],
            'langtang' => [
                'gateway' => 'Syabrubesi via overland scenic drive (approx. 7–9 hrs north of Kathmandu)',
                'trailheads' => 'Syabrubesi, Lama Hotel, Kyanjin Gompa',
                'permits' => 'Langtang National Park Entry Permit, TIMS Card',
                'pacing' => 'Moderate gradient following the Langtang Khola river gorge, with basecamp exploration at Kyanjin Gompa.',
            ],
            'manaslu' => [
                'gateway' => 'Soti Khola / Machha Khola via vehicular drive from Kathmandu or Pokhara',
                'trailheads' => 'Machha Khola, Jagat, Deng, Samagaon',
                'permits' => 'Manaslu Restricted Area Permit (RAP), MCAP, ACAP (licensed guide required)',
                'pacing' => 'Methodical multi-week circuit requiring sustained stamina for Larkya La (5,106m) pass day.',
            ],
            'mustang' => [
                'gateway' => 'Jomsom via mountain flight from Pokhara or high-clearance 4WD corridor',
                'trailheads' => 'Kagbeni, Chele, Charang, Lo Manthang',
                'permits' => 'Upper Mustang Restricted Area Permit ($500 USD / 10 days baseline), ACAP',
                'pacing' => 'High-plateau walking in rain-shadow conditions; dry climate with afternoon canyon wind considerations.',
            ],
        ];

        $logistics = $logisticsMap[$region['slug']] ?? [
            'gateway' => 'Kathmandu transit connection',
            'trailheads' => 'Regional access points',
            'permits' => 'Local conservation and national park permits',
            'pacing' => 'Tailored to route altitude profiles.',
        ];

        // Regional FAQs
        $regionalFaqs = [
            [
                'question' => "What is the best trekking season for the {$region['name']} Region?",
                'answer' => "In this sample preview, optimal trekking windows are derived from associated route fixtures. Autumn (October–November) and Spring (March–May) offer clear mountain vistas across most Himalayan routes, while trans-Himalayan valleys like Mustang remain viable through summer rain-shadow windows. Real-world planning requires verified meteorological advice.",
            ],
            [
                'question' => "How physically demanding are treks in {$region['name']}?",
                'answer' => "Sample routes in {$region['name']} range up to {$maxAlt} meters in elevation. Pacing depends on route length and daily ascent rates. Acclimatization schedules should always be confirmed with professional mountain guides.",
            ],
            [
                'question' => "Are flights or road transfers required to reach {$region['name']}?",
                'answer' => "Access to {$region['name']} is typically organized via {$logistics['gateway']}. Transport arrangements, road passability, and mountain flight schedules depend on seasonal weather and operational conditions.",
            ],
            [
                'question' => "Can I customize a private itinerary in {$region['name']}?",
                'answer' => "Yes. You can start our interactive planner with {$region['name']} pre-selected to specify custom dates, private porter ratios, and lodge preferences without committing to fixed departures.",
            ],
        ];

        return view('website_preview.pages.destinations.show', [
            'region' => $region,
            'allRegionTreks' => $allRegionTreks,
            'filteredTreks' => $filteredTreks,
            'regionExperiences' => $regionExperiences,
            'regionMonths' => $regionMonths,
            'minDays' => $minDays,
            'maxDays' => $maxDays,
            'maxAlt' => $maxAlt,
            'difficultiesPresent' => $difficultiesPresent,
            'matchedArticles' => $matchedArticles,
            'logistics' => $logistics,
            'regionalFaqs' => $regionalFaqs,
            'activeFilters' => [
                'difficulty' => $difficulty,
                'duration' => $duration,
                'month' => $month,
            ],
            'breadcrumbs' => [
                ['label' => 'Home', 'url' => route('website.home')],
                ['label' => 'Destinations', 'url' => route('website.destinations.index')],
                ['label' => $region['name']],
            ],
        ]);
    })->name('destinations.show');

    // P06 & P07: Experiences
    Route::get('/experiences', function () {
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
    })->name('experiences.index');

    Route::get('/experiences/{slug}', function (string $slug) {
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
    })->name('experiences.show');

    // P08 & P09: When to go / Travel months
    Route::get('/when-to-go', function (\Illuminate\Http\Request $request) {
        $allMonths = WebsiteCatalogRepository::getMonths();
        
        $requestedMonth = $request->query('month');
        $isDefault = empty($requestedMonth);
        
        // Find requested month or fallback safely to September (id = 9)
        $selectedMonth = null;
        if (!empty($requestedMonth)) {
            $selectedMonth = WebsiteCatalogRepository::findMonth($requestedMonth);
        }
        
        // If not found or empty, default safely to September (id = 9)
        if (!$selectedMonth) {
            $selectedMonth = WebsiteCatalogRepository::findMonth(9);
            $isDefault = true;
        }

        // Matching treks for selected month
        $matchingTreks = $selectedMonth['treks'] ?? [];

        // Four labeled sample season groups
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

        // Month-specific editorial descriptions (honest, contextual, no fake temperature/rainfall numbers)
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

        $currentEditorial = $monthEditorials[$selectedMonth['id']] ?? $monthEditorials[9];

        // Related guide article
        $article = WebsiteCatalogRepository::findArticle('choosing-a-travel-month');

        return view('website_preview.pages.months.index', [
            'months' => $allMonths,
            'seasons' => $seasons,
            'selectedMonth' => $selectedMonth,
            'isDefault' => $isDefault,
            'currentEditorial' => $currentEditorial,
            'matchingTreks' => $matchingTreks,
            'article' => $article,
            'breadcrumbs' => [
                ['label' => 'Home', 'url' => route('website.home')],
                ['label' => 'When to Go'],
            ],
        ]);
    })->name('months.index');

    Route::get('/when-to-go/{month}', function (string $month) {
        $m = WebsiteCatalogRepository::findMonth($month);
        abort_unless($m, 404);

        // Previous and Next month with safe December/January wrapping
        $prevId = ($m['id'] === 1) ? 12 : ($m['id'] - 1);
        $nextId = ($m['id'] === 12) ? 1 : ($m['id'] + 1);
        $prevMonth = WebsiteCatalogRepository::findMonth($prevId);
        $nextMonth = WebsiteCatalogRepository::findMonth($nextId);

        // Matching destinations (strictly derived: only destinations with a matching sample trek in this month)
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

        // Contextual image for header from asset registry
        $heroImage = \Website\Support\WebsiteAssetRegistry::resolve('experience-mountain-scenery', 'Trekking in ' . $m['name']);

        // Month-specific editorial data
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

        $currentData = $monthData[$m['id']] ?? $monthData[9];

        // Related preparation and packing articles
        $prepArticles = [
            WebsiteCatalogRepository::findArticle('choosing-a-travel-month'),
            WebsiteCatalogRepository::findArticle('organizing-your-packing-questions'),
            WebsiteCatalogRepository::findArticle('questions-before-a-high-altitude-trip'),
        ];
        $prepArticles = array_values(array_filter($prepArticles));

        return view('website_preview.pages.months.show', [
            'month' => $m,
            'prevMonth' => $prevMonth,
            'nextMonth' => $nextMonth,
            'matchingDestinations' => $matchingDestinations,
            'matchingTreks' => $m['treks'] ?? [],
            'heroImage' => $heroImage,
            'currentData' => $currentData,
            'prepArticles' => $prepArticles,
            'breadcrumbs' => [
                ['label' => 'Home', 'url' => route('website.home')],
                ['label' => 'When to Go', 'url' => route('website.months.index')],
                ['label' => $m['name']],
            ],
        ]);
    })->name('months.show');

    // P10: Compare Treks
    Route::get('/compare-treks', function (\Illuminate\Http\Request $request) {
        $rawTreks = (array) $request->query('treks', []);
        $from = $request->query('from');

        $compareData = \Website\Services\WebsiteCatalogRepository::compareTreks($rawTreks);

        return view('website_preview.pages.compare', array_merge($compareData, [
            'from' => $from,
            'breadcrumbs' => [
                ['label' => 'Home', 'url' => route('website.home')],
                ['label' => 'Compare Treks'],
            ],
        ]));
    })->name('compare');

    // P11 - P14: Guided Planner
    Route::get('/plan-my-trek', function (\Illuminate\Http\Request $request) {
        $context = \Website\Services\WebsitePlannerDraftService::validateEntryContext($request->all());
        $existingDraft = \Website\Services\WebsitePlannerDraftService::getDraft();
        $nextStep = \Website\Services\WebsitePlannerDraftService::getNextAccessibleStep($existingDraft);
        $treks = \Website\Services\WebsiteCatalogRepository::getTreks();
        $treksKeyed = [];
        foreach ($treks as $t) {
            $treksKeyed[$t['id']] = $t;
        }

        // The planner page already contains the complete form. For panel
        // requests return that rendered view so its form scripts and state
        // remain identical to the full-page flow.
        $plannerView = 'website_preview.pages.planner.start';

        return view($plannerView, [
            'context' => $context,
            'existingDraft' => $existingDraft,
            'nextStep' => $nextStep,
            'treksKeyed' => $treksKeyed,
            'breadcrumbs' => [
                ['label' => 'Home', 'url' => route('website.home')],
                ['label' => 'Plan My Trek'],
            ],
        ]);
    })->name('planner.start');

    Route::get('/plan-my-trek/form', function (\Illuminate\Http\Request $request) {
        return view('website_preview.pages.planner.plan-trip-form', [
            'context' => \Website\Services\WebsitePlannerDraftService::validateEntryContext($request->all()),
            'existingDraft' => \Website\Services\WebsitePlannerDraftService::getDraft(),
        ]);
    })->name('planner.form');

    Route::post('/plan-my-trek/start', function (\Illuminate\Http\Request $request) {
        $draft = \Website\Services\WebsitePlannerDraftService::createDraft($request->all());
        $nextStep = \Website\Services\WebsitePlannerDraftService::getNextAccessibleStep($draft);
        return redirect()->route('website.planner.step', ['step' => $nextStep]);
    })->name('planner.begin');

    Route::post('/plan-my-trek/reset', function () {
        \Website\Services\WebsitePlannerDraftService::resetAll();
        return redirect()->route('website.planner.start');
    })->name('planner.reset');

    Route::get('/plan-my-trek/wizard', function (\Illuminate\Http\Request $request) {
        $draft = \Website\Services\WebsitePlannerDraftService::getDraft();
        if (!$draft) {
            return redirect()->route('website.planner.start')
                ->with('notice', 'Your previous website planning session has expired or was not started. Please begin a new plan below.');
        }

        $allSteps = [
            'timing' => [
                'short' => 'Timing',
                'title' => 'Travel Timing & Trip Duration',
                'description' => 'Select your ideal travel window or season, along with your planned duration in Nepal.',
            ],
            'travelers' => [
                'short' => 'Party',
                'title' => 'Travel Party & Group Size',
                'description' => 'Specify the number of adult travelers and any accompanying children.',
            ],
            'preferences' => [
                'short' => 'Pacing',
                'title' => 'Trail Preferences & Acclimatization Pacing',
                'description' => 'Indicate your alpine hiking experience, comfort ceiling, and preferred trip rhythm.',
            ],
            'budget' => [
                'short' => 'Budget',
                'title' => 'Ground Package Budget Guidelines',
                'description' => 'Establish per-person ground package expenditure guidelines.',
            ],
            'recommendations' => [
                'short' => 'Matches',
                'title' => 'Compatible Himalayan Journeys',
                'description' => 'Examine ranked route matches calculated from your input criteria.',
            ],
            'review' => [
                'short' => 'Review',
                'title' => 'Review Journey Itinerary & Selections',
                'description' => 'Inspect your complete draft choices before requesting final itinerary details.',
            ],
        ];

        $requestedStep = $request->query('step', 'timing');
        $stepKeys = array_keys($allSteps);

        if (!in_array($requestedStep, $stepKeys, true)) {
            $requestedStep = 'timing';
        }

        // Guard: enforce earliest accessible step
        if (!\Website\Services\WebsitePlannerDraftService::isStepAccessible($requestedStep, $draft)) {
            $earliest = \Website\Services\WebsitePlannerDraftService::getNextAccessibleStep($draft);
            return redirect()->route('website.planner.step', ['step' => $earliest]);
        }

        if ($requestedStep === 'review') {
            return redirect()->route('website.planner.review');
        }

        $stepIndex = array_search($requestedStep, $stepKeys, true);
        $prevStep = $stepIndex > 0 ? $stepKeys[$stepIndex - 1] : null;
        $nextStep = $stepIndex < count($stepKeys) - 1 ? $stepKeys[$stepIndex + 1] : null;

        $treks = \Website\Services\WebsiteCatalogRepository::getTreks();
        $treksKeyed = [];
        foreach ($treks as $t) {
            $treksKeyed[$t['id']] = $t;
        }

        $accessibleSteps = [];
        foreach ($stepKeys as $sk) {
            if (\Website\Services\WebsitePlannerDraftService::isStepAccessible($sk, $draft)) {
                $accessibleSteps[] = $sk;
            }
        }

        $experiences = \Website\Services\WebsiteCatalogRepository::getExperiences();
        $addons = \Website\Services\WebsiteCatalogRepository::getAddons();
        $months = \Website\Services\WebsiteCatalogRepository::getMonths();
        $minDate = \Website\Support\WebsiteClock::websiteDateString();

        $recommendationResult = null;
        if ($requestedStep === 'recommendations') {
            $recommendationResult = \Website\Services\WebsiteRecommendationService::evaluate($draft);
        }

        return view('website_preview.pages.planner.step', [
            'draft' => $draft,
            'currentStep' => $requestedStep,
            'stepIndex' => $stepIndex,
            'stepDetails' => $allSteps[$requestedStep],
            'allSteps' => $allSteps,
            'prevStep' => $prevStep,
            'nextStep' => $nextStep,
            'accessibleSteps' => $accessibleSteps,
            'treksKeyed' => $treksKeyed,
            'experiences' => $experiences,
            'addons' => $addons,
            'months' => $months,
            'minDate' => $minDate,
            'recommendationResult' => $recommendationResult,
            'breadcrumbs' => [
                ['label' => 'Home', 'url' => route('website.home')],
                ['label' => 'Plan My Trek', 'url' => route('website.planner.start')],
                ['label' => $allSteps[$requestedStep]['short']],
            ],
        ]);
    })->name('planner.step');

    Route::post('/plan-my-trek/step', function (\Illuminate\Http\Request $request) {
        $currentStep = $request->input('step', 'timing');
        $allSteps = ['timing', 'travelers', 'preferences', 'budget', 'recommendations', 'review'];
        if (!in_array($currentStep, $allSteps, true)) {
            return redirect()->route('website.planner.start');
        }

        $draft = \Website\Services\WebsitePlannerDraftService::getDraft();
        if (!$draft) {
            return redirect()->route('website.planner.start')
                ->with('notice', 'Your website planning session has expired. Please start a new plan.');
        }

        $validation = \Website\Services\WebsitePlannerDraftService::validateStep($currentStep, $request->all(), $draft);

        if (!$validation['valid']) {
            return redirect()->route('website.planner.step', ['step' => $currentStep])
                ->withErrors($validation['errors'])
                ->withInput();
        }

        // Merge and update draft
        $draft = \Website\Services\WebsitePlannerDraftService::updateDraft($validation['data']);

        // Check if custom request action was chosen in step 4
        if ($request->input('action') === 'custom_request') {
            $draft = \Website\Services\WebsitePlannerDraftService::updateDraft([
                'mode' => 'custom',
                'selected_trek_id' => null,
            ]);
        }

        $currentIndex = array_search($currentStep, $allSteps, true);
        $nextStep = ($currentIndex !== false && $currentIndex < count($allSteps) - 1) ? $allSteps[$currentIndex + 1] : 'review';

        $redirect = redirect()->route('website.planner.step', ['step' => $nextStep]);

        if (!empty($validation['warnings'])) {
            $redirect->with('warning', implode(' ', $validation['warnings']));
        }

        return $redirect;
    })->name('planner.save_step');

    // Dedicated recommendation selection action required by the route contract.
    Route::post('/plan-my-trek/select', function (Request $request) {
        $draft = \Website\Services\WebsitePlannerDraftService::getDraft();
        $trek = is_string($request->input('selected_trek_id'))
            ? WebsiteCatalogRepository::findTrek($request->input('selected_trek_id'))
            : null;

        if (!$draft || !$trek) {
            return redirect()->route('website.planner.start')
                ->with('notice', 'That sample trek selection is no longer available. Please choose another option.');
        }

        \Website\Services\WebsitePlannerDraftService::updateDraft([
            'selected_trek_id' => $trek['id'],
            'mode' => 'selected',
        ]);

        return redirect()->route('website.planner.review');
    })->name('planner.select');

    Route::get('/plan-my-trek/review', function () {
        $draft = \Website\Services\WebsitePlannerDraftService::getDraft();
        if (!$draft) {
            return redirect()->route('website.planner.start')
                ->with('notice', 'Your website planning session has expired or was not started. Please begin a new plan below.');
        }

        $completed = \Website\Services\WebsitePlannerDraftService::getCompletedSteps($draft);
        $requiredSteps = ['timing', 'travelers', 'preferences', 'budget'];
        foreach ($requiredSteps as $req) {
            if (!in_array($req, $completed, true)) {
                return redirect()->route('website.planner.step', ['step' => $req])
                    ->with('notice', 'Please complete the earlier steps before reviewing your plan.');
            }
        }

        $selectedTrek = null;
        if (!empty($draft['selected_trek_id'])) {
            $selectedTrek = \Website\Services\WebsiteCatalogRepository::findTrek($draft['selected_trek_id']);
        }

        $selectedDeparture = null;
        $unitPrice = $selectedTrek ? $selectedTrek['price_usd'] : null;
        if (!empty($draft['selected_departure_id'])) {
            $departures = \Website\Services\WebsiteCatalogRepository::getDepartures();
            $depIndex = array_search($draft['selected_departure_id'], array_column($departures, 'id'));
            if ($depIndex !== false) {
                $selectedDeparture = $departures[$depIndex];
                $unitPrice = $selectedDeparture['price_usd'];
            }
        }

        // Selection conflicts calculation
        $conflicts = [];
        if ($selectedTrek) {
            if (!empty($draft['available_days']) && $selectedTrek['duration_days'] > $draft['available_days']) {
                $conflicts[] = "The selected itinerary ({$selectedTrek['duration_days']} days) exceeds your planned travel window ({$draft['available_days']} days).";
            }
            if (!empty($draft['max_difficulty'])) {
                $diffRanks = ['easy' => 1, 'moderate' => 2, 'challenging' => 3];
                $trekRank = $diffRanks[$selectedTrek['difficulty']] ?? 2;
                $maxRank = $diffRanks[$draft['max_difficulty']] ?? 3;
                if ($trekRank > $maxRank) {
                    $conflicts[] = "The selected trek grade ({$selectedTrek['difficulty']}) exceeds your preferred maximum difficulty ceiling ({$draft['max_difficulty']}).";
                }
            }
            if ($selectedDeparture) {
                $totalParty = ($draft['adults'] ?? 2) + ($draft['children'] ?? 0);
                if ($totalParty > $selectedDeparture['sample_seats']) {
                    $conflicts[] = "Your party of {$totalParty} exceeds the illustrative open seats ({$selectedDeparture['sample_seats']}) on this departure.";
                }
            }
            if (!empty($draft['month']) && !in_array($draft['month'], $selectedTrek['best_months'] ?? [], true)) {
                $monthName = \Carbon\CarbonImmutable::create(2030, $draft['month'], 1)->format('F');
                $conflicts[] = "{$monthName} is outside the primary optimal trekking window for {$selectedTrek['name']}.";
            }
        }

        return view('website_preview.pages.planner.review', [
            'draft' => $draft,
            'selectedTrek' => $selectedTrek,
            'selectedDeparture' => $selectedDeparture,
            'unitPrice' => $unitPrice,
            'conflicts' => $conflicts,
        ]);
    })->name('planner.review');

    Route::get('/plan-my-trek/contact', function () {
        $draft = \Website\Services\WebsitePlannerDraftService::getDraft();
        if (!$draft) {
            return redirect()->route('website.planner.start')
                ->with('notice', 'Your website planning session has expired or was not started. Please begin a new plan below.');
        }

        $completed = \Website\Services\WebsitePlannerDraftService::getCompletedSteps($draft);
        $requiredSteps = ['timing', 'travelers', 'preferences', 'budget'];
        foreach ($requiredSteps as $req) {
            if (!in_array($req, $completed, true)) {
                return redirect()->route('website.planner.step', ['step' => $req]);
            }
        }

        $selectedTrek = null;
        if (!empty($draft['selected_trek_id'])) {
            $selectedTrek = \Website\Services\WebsiteCatalogRepository::findTrek($draft['selected_trek_id']);
        }

        $unitPrice = $selectedTrek ? $selectedTrek['price_usd'] : null;
        if (!empty($draft['selected_departure_id'])) {
            $departures = \Website\Services\WebsiteCatalogRepository::getDepartures();
            $depIndex = array_search($draft['selected_departure_id'], array_column($departures, 'id'));
            if ($depIndex !== false) {
                $unitPrice = $departures[$depIndex]['price_usd'];
            }
        }

        $idempotencyToken = \Website\Services\WebsitePlannerDraftService::getOrCreateIdempotencyToken();

        return view('website_preview.pages.planner.contact', [
            'draft' => $draft,
            'selectedTrek' => $selectedTrek,
            'unitPrice' => $unitPrice,
            'idempotencyToken' => $idempotencyToken,
        ]);
    })->name('planner.contact');

    Route::post('/plan-my-trek/submit', function (\Illuminate\Http\Request $request) {
        $draft = \Website\Services\WebsitePlannerDraftService::getDraft();
        if (!$draft) {
            return redirect()->route('website.planner.start')
                ->with('notice', 'Your website planning session expired. Please start fresh.');
        }

        // Validate idempotency token
        $expectedToken = \Website\Services\WebsitePlannerDraftService::getOrCreateIdempotencyToken();
        $submittedToken = $request->input('idempotency_token');

        // Check if this token was already used to generate an active receipt (idempotent duplicate submission)
        $existingReceipt = \Website\Services\WebsitePlannerDraftService::getReceipt();
        if ($existingReceipt && ($existingReceipt['idempotency_token'] ?? null) === $submittedToken) {
            return redirect()->route('website.planner.confirmation');
        }

        if (!$submittedToken || $submittedToken !== $expectedToken) {
            return redirect()->route('website.planner.contact')
                ->withErrors(['idempotency_token' => 'Invalid or expired submission token. Please submit again.']);
        }

        // Server validation of contact fields
        $request->validate([
            'name' => ['required', 'string', 'max:120'],
            'email' => ['required', 'string', 'email:rfc', 'max:254'],
            'phone' => ['nullable', 'string', 'max:32', 'regex:/^[+0-9\s().-]*$/'],
            'contact_method' => ['required', 'string', 'in:email,phone,whatsapp,unsure'],
        ], [
            'name.required' => 'Please provide a sample traveler name.',
            'name.max' => 'Traveler name cannot exceed 120 characters.',
            'email.required' => 'Please provide a sample email address.',
            'email.email' => 'Please provide a valid email syntax.',
            'email.max' => 'Email cannot exceed 254 characters.',
            'phone.max' => 'Phone number cannot exceed 32 characters.',
            'phone.regex' => 'Phone number contains invalid characters.',
            'contact_method.in' => 'Please select a valid contact method option.',
        ]);

        // Server-side recalculation of pricing (ignore any client-calculated money)
        $selectedTrek = null;
        $unitPriceCents = 0;
        if (!empty($draft['selected_trek_id'])) {
            $selectedTrek = \Website\Services\WebsiteCatalogRepository::findTrek($draft['selected_trek_id']);
            if ($selectedTrek) {
                $unitPrice = $selectedTrek['price_usd'];
                if (!empty($draft['selected_departure_id'])) {
                    $departures = \Website\Services\WebsiteCatalogRepository::getDepartures();
                    $depIndex = array_search($draft['selected_departure_id'], array_column($departures, 'id'));
                    if ($depIndex !== false && $departures[$depIndex]['trek_id'] === $selectedTrek['id']) {
                        $unitPrice = $departures[$depIndex]['price_usd'];
                    }
                }
                $unitPriceCents = (int) ($unitPrice * 100);
            }
        }

        $adults = (int) ($draft['adults'] ?? 2);
        $children = (int) ($draft['children'] ?? 0);
        $totalTravelers = $adults + $children;
        $totalPriceCents = $unitPriceCents * $totalTravelers;

        // Construct timing summary string
        if (($draft['timing_mode'] ?? '') === 'dates' && !empty($draft['start_date'])) {
            $dateStr = \Carbon\CarbonImmutable::parse($draft['start_date'])->format('M j, Y');
            $durStr = !empty($draft['available_days']) ? " ({$draft['available_days']} days)" : '';
            $timingSummary = "Dates: {$dateStr}{$durStr}";
        } elseif (($draft['timing_mode'] ?? '') === 'month' && !empty($draft['month'])) {
            $monthStr = \Carbon\CarbonImmutable::create(2030, $draft['month'], 1)->format('F 2030');
            $durStr = !empty($draft['available_days']) ? " ({$draft['available_days']} days)" : '';
            $timingSummary = "Month: {$monthStr}{$durStr}";
        } else {
            $timingSummary = !empty($draft['available_days']) ? "Flexible duration ({$draft['available_days']} days)" : 'Flexible / To discuss';
        }

        // Generate website reference
        $reference = 'WEBSITE-' . strtoupper(bin2hex(random_bytes(3)));

        // Create minimal non-PII receipt
        $receipt = [
            'reference' => $reference,
            'draft_id' => $draft['draft_id'] ?? bin2hex(random_bytes(8)),
            'idempotency_token' => $submittedToken,
            'mode' => $draft['mode'] ?? 'discover',
            'trek_id' => $selectedTrek['id'] ?? null,
            'trek_name' => $selectedTrek['name'] ?? null,
            'trek_slug' => $selectedTrek['slug'] ?? null,
            'departure_id' => $draft['selected_departure_id'] ?? null,
            'party_adults' => $adults,
            'party_children' => $children,
            'total_travelers' => $totalTravelers,
            'timing_summary' => $timingSummary,
            'illustrative_unit_price' => $unitPriceCents,
            'illustrative_total_price' => $totalPriceCents,
            'submitted_at' => \Website\Support\WebsiteClock::realTimestamp(),
        ];

        // Save receipt in website session
        \Website\Services\WebsitePlannerDraftService::saveReceipt($receipt);

        // Discard contact inputs and free-text notes from draft
        \Website\Services\WebsitePlannerDraftService::updateDraft([
            'special_requests' => '',
        ]);

        return redirect()->route('website.planner.confirmation');
    })->name('planner.submit');

    Route::get('/plan-my-trek/confirmation', function () {
        $receipt = \Website\Services\WebsitePlannerDraftService::getReceipt();
        if (!$receipt) {
            return redirect()->route('website.planner.start')
                ->with('notice', 'No active website receipt found. Please configure a trek plan to view a simulated confirmation.');
        }

        return view('website_preview.pages.planner.confirmation', [
            'receipt' => $receipt,
        ]);
    })->name('planner.confirmation');

    // P15: Fixed Departures
    Route::get('/departures', function (\Illuminate\Http\Request $request) {
        $rawMonth = $request->query('month');
        $rawRegion = $request->query('region');
        $rawTrek = $request->query('trek');

        // Normalization
        $filterMonth = null;
        if (!empty($rawMonth) && is_numeric($rawMonth)) {
            $mInt = (int) $rawMonth;
            if ($mInt >= 1 && $mInt <= 12) {
                $filterMonth = $mInt;
            }
        }

        $filterRegion = null;
        if (!empty($rawRegion) && is_string($rawRegion)) {
            $foundRegion = WebsiteCatalogRepository::findRegion($rawRegion);
            if ($foundRegion) {
                $filterRegion = $foundRegion['id'];
            }
        }

        $filterTrek = null;
        if (!empty($rawTrek) && is_string($rawTrek)) {
            $foundTrek = WebsiteCatalogRepository::findTrek($rawTrek);
            if ($foundTrek) {
                $filterTrek = $foundTrek['id'];
            }
        }

        // Fetch filtered departures
        $filteredDepartures = WebsiteCatalogRepository::getDepartures([
            'month' => $filterMonth,
            'region_id' => $filterRegion,
            'trek_id' => $filterTrek,
        ]);

        $totalCount = count($filteredDepartures);

        // Pagination: 12 per page by default
        $page = max(1, (int) $request->query('page', 1));
        $perPage = 12;
        $totalPages = max(1, (int) ceil($totalCount / $perPage));
        $page = min($page, $totalPages);
        $offset = ($page - 1) * $perPage;
        $pageDepartures = array_slice($filteredDepartures, $offset, $perPage);

        // Group the page's departures by departure month
        $groupedDepartures = [];
        foreach ($pageDepartures as $dep) {
            $monthKey = date('F Y', strtotime($dep['start_date']));
            $groupedDepartures[$monthKey][] = $dep;
        }

        // Options for filter dropdowns
        $allTreks = WebsiteCatalogRepository::getTreks();
        $allRegions = WebsiteCatalogRepository::getRegions();
        $allMonths = WebsiteCatalogRepository::getMonths();

        // Check if any filters are active
        $hasActiveFilters = ($filterMonth !== null || $filterRegion !== null || $filterTrek !== null);

        return view('website_preview.pages.departures.index', [
            'groupedDepartures' => $groupedDepartures,
            'totalCount' => $totalCount,
            'page' => $page,
            'perPage' => $perPage,
            'totalPages' => $totalPages,
            'allTreks' => $allTreks,
            'allRegions' => $allRegions,
            'allMonths' => $allMonths,
            'filterMonth' => $filterMonth,
            'filterRegion' => $filterRegion,
            'filterTrek' => $filterTrek,
            'hasActiveFilters' => $hasActiveFilters,
            'breadcrumbs' => [
                ['label' => 'Home', 'url' => route('website.home')],
                ['label' => 'Sample Departures'],
            ],
        ]);
    })->name('departures.index');

    // P16 & P17: Travel Guide & Articles
    Route::get('/travel-guide', function (\Illuminate\Http\Request $request) {
        $allowedCategories = [
            'seasons' => 'Seasons & Timing',
            'packing' => 'Packing & Gear',
            'preparation' => 'Preparation & Health',
            'planning' => 'Route Planning',
            'culture' => 'Himalayan Culture',
            'logistics' => 'Travel Logistics',
        ];

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

        // Featured sample article:
        // When not searching (no $q) and on page 1 with all categories, highlight choosing-a-travel-month
        $featuredArticle = null;
        if ($q === null && ($request->query('page', 1) == 1) && $selectedCategory === null) {
            $featuredArticle = WebsiteCatalogRepository::findArticle('choosing-a-travel-month');
        }

        $topicPillars = [
            'seasons' => [
                'title' => 'Seasons & Timing',
                'tagline' => 'Weather Windows & Trail Conditions',
                'description' => 'Pre-monsoon spring blooms, crisp autumn visibility, and high-pass winter considerations.',
                'icon' => 'sun',
                'image' => \Website\Support\WebsiteAssetRegistry::resolve('article-seasons')['url'],
                'image_alt' => 'Clear autumn skies across the Nepal Himalayas',
            ],
            'packing' => [
                'title' => 'Packing & Gear',
                'tagline' => 'Alpine Layering & Teahouse Kit',
                'description' => 'Tested layering systems, cold-rated sleeping bags, footwear selection, and pack weight discipline.',
                'icon' => 'backpack',
                'image' => \Website\Support\WebsiteAssetRegistry::resolve('homepage-safety')['url'],
                'image_alt' => 'Mountain trekker equipped with alpine backpack and boots',
            ],
            'preparation' => [
                'title' => 'Preparation & Health',
                'tagline' => 'Altitude Acclimatization Curves',
                'description' => 'Safe elevation gains, hydration baselines, AMS recognition, and physical endurance baselines.',
                'icon' => 'shield',
                'image' => \Website\Support\WebsiteAssetRegistry::resolve('article-altitude')['url'],
                'image_alt' => 'High-altitude snow and glacial crossing at Cho La Pass',
            ],
            'planning' => [
                'title' => 'Route Planning',
                'tagline' => 'Shortlists, Pacing & Difficulty',
                'description' => 'Comparing daily walking hours, teahouse versus camping logistics, and contingency buffer days.',
                'icon' => 'map',
                'image' => \Website\Support\WebsiteAssetRegistry::resolve('article-compare')['url'],
                'image_alt' => 'Stone footpath winding through Himalayan valleys for route planning',
            ],
            'culture' => [
                'title' => 'Himalayan Culture',
                'tagline' => 'Monasteries & Sherpa Traditions',
                'description' => 'Buddhist mani stone customs, stupa circumambulation, prayer flags, and mountain etiquette.',
                'icon' => 'compass',
                'image' => \Website\Support\WebsiteAssetRegistry::resolve('homepage-responsible-travel')['url'],
                'image_alt' => 'Colorful Buddhist prayer flags and mountain village',
            ],
            'logistics' => [
                'title' => 'Travel Logistics',
                'tagline' => 'Permits, Flights & Checkpoints',
                'description' => 'Lukla flight weather buffers, TIMS card permits, national park entry fees, and mountain transfers.',
                'icon' => 'plane',
                'image' => \Website\Support\WebsiteAssetRegistry::resolve('article-logistics')['url'],
                'image_alt' => 'High mountain suspension bridge across deep river gorge',
            ],
        ];

        // Pagination: page size = 6 to showcase a rich 3-column editorial grid
        $page = max(1, (int) $request->query('page', 1));
        $perPage = 6;
        $totalPages = max(1, (int) ceil($totalCount / $perPage));
        $page = min($page, $totalPages);
        $offset = ($page - 1) * $perPage;
        $pageArticles = array_slice($filteredArticles, $offset, $perPage);

        // Enrich articles with reading time and resolved related trek models
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
    })->name('articles.index');

    Route::get('/travel-guide/{slug}', function (string $slug) {
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

        // Related articles: prioritize same category or intersecting treks, deterministic deduplication
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
        // Fallback if needed to ensure reader has next articles to explore
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
    })->name('articles.show');

    // P18: About
    Route::get('/about', function () {
        $guides = WebsiteCatalogRepository::getGuides();
        $heroImage = \Website\Support\WebsiteAssetRegistry::resolve('about-hero', 'About EATH Himalayan Trekking');

        return view('website_preview.pages.about', [
            'guides' => $guides,
            'heroImage' => $heroImage,
            'breadcrumbs' => [
                ['label' => 'Home', 'url' => route('website.home')],
                ['label' => 'About Us'],
            ],
        ]);
    })->name('about');

    // P19 & P20: Guides
    Route::get('/guides', function () {
        $guides = WebsiteCatalogRepository::getGuides();

        return view('website_preview.pages.guides.index', [
            'title' => 'Meet Our Mountain Guides',
            'metaDescription' => 'Explore sample mountain guide and trek leader profiles illustrating Himalayan route leadership and expedition pacing for EATH.',
            'breadcrumbs' => [
                ['label' => 'Home', 'url' => route('website.home')],
                ['label' => 'Guides'],
            ],
            'guides' => $guides,
        ]);
    })->name('guides.index');

    Route::get('/guides/{slug}', function (string $slug) {
        $guide = WebsiteCatalogRepository::findGuide($slug);
        abort_unless($guide, 404);

        return view('website_preview.pages.guides.show', [
            'title' => "{$guide['name']} | Mountain Guide Profile",
            'metaDescription' => "Sample mountain guide profile for {$guide['name']} ({$guide['role']}) illustrating route leadership and expedition pacing for EATH.",
            'breadcrumbs' => [
                ['label' => 'Home', 'url' => route('website.home')],
                ['label' => 'Guides', 'url' => route('website.guides.index')],
                ['label' => $guide['name']],
            ],
            'guide' => $guide,
        ]);
    })->name('guides.show');

    // P21 & P22: Traveler Stories
    Route::get('/traveler-stories', function (\Illuminate\Http\Request $request) {
        $selectedRegion = $request->query('region');
        $selectedTrek = $request->query('trek');

        $allRegions = WebsiteCatalogRepository::getRegions();
        $allTreks = WebsiteCatalogRepository::getTreks();

        $filters = [];
        if (!empty($selectedRegion)) {
            $filters['region'] = $selectedRegion;
        }
        if (!empty($selectedTrek)) {
            $filters['trek'] = $selectedTrek;
        }

        $stories = WebsiteCatalogRepository::getStories($filters);
        $isFiltered = !empty($filters);

        if ($isFiltered) {
            $featuredStory = null;
            $supportingStories = $stories;
        } else {
            $featuredStory = $stories[0] ?? null;
            $supportingStories = array_slice($stories, 1);
        }

        return view('website_preview.pages.stories.index', [
            'title' => 'Traveler Stories & Field Perspectives',
            'metaDescription' => 'Explore sample traveler narratives and photo-led hiking stories illustrating route perspectives, daily pacing, and trail planning for EATH.',
            'breadcrumbs' => [
                ['label' => 'Home', 'url' => route('website.home')],
                ['label' => 'Traveler Stories'],
            ],
            'allRegions' => $allRegions,
            'allTreks' => $allTreks,
            'selectedRegion' => $selectedRegion,
            'selectedTrek' => $selectedTrek,
            'isFiltered' => $isFiltered,
            'featuredStory' => $featuredStory,
            'supportingStories' => $supportingStories,
            'stories' => $stories,
        ]);
    })->name('stories.index');

    Route::get('/traveler-stories/{slug}', function (string $slug) {
        $story = WebsiteCatalogRepository::findStory($slug);
        abort_unless($story, 404);

        $trek = $story['trek'] ?? WebsiteCatalogRepository::findTrek($story['trek_id']);
        $allStories = WebsiteCatalogRepository::getStories();
        $otherStories = array_values(array_filter($allStories, fn ($s) => $s['slug'] !== $story['slug']));

        return view('website_preview.pages.stories.show', [
            'title' => "{$story['title']} | Traveler Story",
            'metaDescription' => "Sample traveler narrative for {$story['title']} ({$story['traveler_name']}) illustrating route perspectives, trail pacing, and Himalayan planning for EATH.",
            'breadcrumbs' => [
                ['label' => 'Home', 'url' => route('website.home')],
                ['label' => 'Traveler Stories', 'url' => route('website.stories.index')],
                ['label' => $story['title']],
            ],
            'story' => $story,
            'trek' => $trek,
            'otherStories' => $otherStories,
        ]);
    })->name('stories.show');

    // P23: Safety
    Route::get('/safety', function () {
        $highAltitudeArticle = WebsiteCatalogRepository::findArticle('questions-before-a-high-altitude-trip');
        $packingArticle = WebsiteCatalogRepository::findArticle('organizing-your-packing-questions');

        return view('website_preview.pages.safety', [
            'heroImage' => \Website\Support\WebsiteAssetRegistry::resolve('safety-hero', 'Mountain trail support and preparation landscape'),
            'title' => 'Safety & Field Support Framework',
            'metaDescription' => 'Explore our proposed safety discussion framework, acclimatization pacing questions, and field coordination standards for Himalayan trekking.',
            'breadcrumbs' => [
                ['label' => 'Home', 'url' => route('website.home')],
                ['label' => 'Safety and Support'],
            ],
            'highAltitudeArticle' => $highAltitudeArticle,
            'packingArticle' => $packingArticle,
        ]);
    })->name('safety');

    // P24: Responsible Travel
    Route::get('/responsible-travel', function () {
        $cultureArticle = WebsiteCatalogRepository::findArticle('planning-a-culture-led-journey');

        return view('website_preview.pages.responsible', [
            'heroImage' => \Website\Support\WebsiteAssetRegistry::resolve('responsible-travel-hero', 'Nepal community and mountain environment landscape'),
            'title' => 'Responsible Mountain Travel & Porter Welfare',
            'metaDescription' => 'Explore our proposed framework for ethical porter welfare, local community benefit, trail waste reduction, and sacred Himalayan etiquette.',
            'breadcrumbs' => [
                ['label' => 'Home', 'url' => route('website.home')],
                ['label' => 'Responsible Travel'],
            ],
            'cultureArticle' => $cultureArticle,
        ]);
    })->name('responsible');

    // P25: Contact
    Route::get('/contact', function (Request $request) {
        $treks = WebsiteCatalogRepository::getTreks();
        $requestedTrek = $request->query('trek');
        $preselectedTrek = null;

        if (is_string($requestedTrek)) {
            $preselectedTrek = WebsiteCatalogRepository::findTrek($requestedTrek);
            $preselectedTrek = $preselectedTrek['slug'] ?? null;
        }

        return view('website_preview.pages.contact', [
            'heroImage' => \Website\Support\WebsiteAssetRegistry::resolve('contact-hero', 'Calm Nepal mountain landscape for contact planning'),
            'treks' => $treks,
            'preselectedTrek' => $preselectedTrek,
            'topics' => [
                'general' => 'General question',
                'trek' => 'A sample trek',
                'custom' => 'Custom trip idea',
                'departure' => 'Sample departure',
                'other' => 'Something else',
            ],
            'breadcrumbs' => [
                ['label' => 'Home', 'url' => route('website.home')],
                ['label' => 'Contact'],
            ],
        ]);
    })->name('contact');

    // Dynamic Modal Form Loader
    Route::get('/departures/{departure_id}/modal', function (Request $request, string $departure_id) {
        $departure = WebsiteCatalogRepository::findDeparture($departure_id);
        abort_if(!$departure, 404, 'Departure not found');

        $trek = WebsiteCatalogRepository::findTrek($departure['trek_id'] ?? '') ?? [
            'id' => $departure['trek_id'] ?? '',
            'name' => $departure['trek_name'] ?? 'Himalayan Expedition',
        ];

        return view('website_preview.modals.departure-form', [
            'departure' => $departure,
            'trek' => $trek,
        ]);
    })->name('departures.modal');

    Route::get('/departures/{departure_id}/wizard', function (string $departure_id) {
        $departure = WebsiteCatalogRepository::findDeparture($departure_id);
        abort_if(!$departure, 404, 'Departure not found');
        return view('website_preview.components.departure-wizard-modal', [
            'departure' => $departure,
        ]);
    })->name('departures.wizard');

    Route::post('/departures/inquire', function (Request $request) {
        $data = $request->validate([
            'departure_id' => ['required', 'string', 'max:100'],
            'travelers' => ['required', 'integer', 'min:1', 'max:12'],
            'name' => ['required', 'string', 'max:120'],
            'email' => ['required', 'email', 'max:254'],
            'dial_code' => ['nullable', 'string', 'max:10'],
            'phone' => ['nullable', 'string', 'max:32'],
            'country' => ['nullable', 'string', 'max:100'],
            'experience' => ['nullable', 'string', 'max:50'],
            'readiness' => ['nullable', 'string', 'max:50'],
            'notes' => ['nullable', 'string', 'max:1000'],
        ]);
        $departure = WebsiteCatalogRepository::findDeparture($data['departure_id']);
        $spaces = max(0, (int) ($departure['sample_seats'] ?? 8));
        if (!$departure || !($departure['is_bookable'] ?? ($departure['status'] !== 'full')) || $spaces < $data['travelers']) {
            throw \Illuminate\Validation\ValidationException::withMessages([
                'travelers' => 'This departure does not have enough available spaces. Please choose another date or reduce your group size.',
            ]);
        }

        // Website boundary: validate the inquiry without storing or transmitting personal details.
        return response()->json(['website' => true]);
    })->middleware('throttle:10,1')->name('departures.inquire');

    Route::post('/contact', function (Request $request) {
        $allowedTrekValues = array_merge(
            array_column(WebsiteCatalogRepository::getTreks(), 'id'),
            array_column(WebsiteCatalogRepository::getTreks(), 'slug')
        );

        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:120'],
            'email' => ['required', 'email', 'max:254'],
            'topic' => ['required', 'string', 'in:general,trek,custom,departure,other'],
            'trek' => ['nullable', 'string', 'in:' . implode(',', $allowedTrekValues)],
            'message' => ['required', 'string', 'max:1000'],
        ]);

        if ($validator->fails()) {
            $treks = WebsiteCatalogRepository::getTreks();
            $submittedTrek = $request->input('trek');
            $preselectedTrek = is_string($submittedTrek)
                ? (WebsiteCatalogRepository::findTrek($submittedTrek)['slug'] ?? null)
                : null;

            return response()->view('website_preview.pages.contact', [
                'heroImage' => \Website\Support\WebsiteAssetRegistry::resolve('contact-hero', 'Calm Nepal mountain landscape for contact planning'),
                'treks' => $treks,
                'preselectedTrek' => $preselectedTrek,
                'topics' => [
                    'general' => 'General question',
                    'trek' => 'A sample trek',
                    'custom' => 'Custom trip idea',
                    'departure' => 'Sample departure',
                    'other' => 'Something else',
                ],
                'breadcrumbs' => [
                    ['label' => 'Home', 'url' => route('website.home')],
                    ['label' => 'Contact'],
                ],
            ])->withErrors($validator);
        }

        // Only a non-PII success flag survives PRG; submitted values are never flashed or stored.
        $request->session()->flash('contact_success', true);

        return redirect()->route('website.contact');
    })->name('contact.submit');

    // P26: FAQs
    Route::get('/faqs', function (Request $request) {
        $query = is_string($request->query('q')) ? mb_substr(trim($request->query('q')), 0, 120) : '';
        $requestedCategory = is_string($request->query('category')) ? trim($request->query('category')) : '';
        $allFaqs = WebsiteCatalogRepository::getFaqs();
        $categories = [];

        foreach ($allFaqs as $faq) {
            $categories[$faq['category']] = ($categories[$faq['category']] ?? 0) + 1;
        }

        $category = array_key_exists($requestedCategory, $categories) ? $requestedCategory : '';
        $faqs = array_values(array_filter($allFaqs, function (array $faq) use ($query, $category): bool {
            if ($category !== '' && $faq['category'] !== $category) {
                return false;
            }

            if ($query === '') {
                return true;
            }

            return str_contains(mb_strtolower($faq['question']), mb_strtolower($query))
                || str_contains(mb_strtolower($faq['answer']), mb_strtolower($query));
        }));

        return view('website_preview.pages.faqs', [
            'heroImage' => \Website\Support\WebsiteAssetRegistry::resolve('faq-hero', 'Himalayan trail landscape for frequently asked questions'),
            'faqs' => $faqs,
            'categories' => $categories,
            'query' => $query,
            'category' => $category,
            'breadcrumbs' => [
                ['label' => 'Home', 'url' => route('website.home')],
                ['label' => 'FAQ'],
            ],
        ]);
    })->name('faqs');

    // P27a–e: Policies
    $renderPolicy = function (string $slug, string $label) {
        $policy = WebsiteCatalogRepository::getPolicy($slug);
        abort_unless($policy, 404);

        return view('website_preview.pages.policy', [
            'policy' => $policy,
            'breadcrumbs' => [
                ['label' => 'Home', 'url' => route('website.home')],
                ['label' => $label],
            ],
        ]);
    };

    Route::get('/privacy', fn () => $renderPolicy('privacy', 'Privacy Policy'))->name('policy.privacy');
    Route::get('/terms', fn () => $renderPolicy('terms', 'Terms & Conditions'))->name('policy.terms');
    Route::get('/booking-conditions', fn () => $renderPolicy('booking-conditions', 'Booking Conditions'))->name('policy.booking');
    Route::get('/cancellation', fn () => $renderPolicy('cancellation', 'Cancellation Policy'))->name('policy.cancellation');
    Route::get('/cookies', fn () => $renderPolicy('cookies', 'Cookie Policy'))->name('policy.cookies');

    // Mutating website state reset action
    Route::post('/reset', function (Request $request) {
        $prefix = config('website.session_prefix', 'eath_website_v1.');
        $rootPrefix = rtrim($prefix, '.');
        $request->session()->forget($rootPrefix);

        foreach (array_keys($request->session()->all()) as $key) {
            if (str_starts_with($key, $rootPrefix)) {
                $request->session()->forget($key);
            }
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Website session state cleared.',
        ]);
    })->name('reset');

    $websiteNotFound = function () {
        return response()->view('website_preview.pages.error', [
            'title' => 'Website page not found',
            'message' => 'That sample page is not available. Continue exploring the website from the homepage.',
        ], 404);
    };
    Route::fallback($websiteNotFound);
});
