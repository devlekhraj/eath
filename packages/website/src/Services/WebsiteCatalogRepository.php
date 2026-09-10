<?php

namespace Website\Services;

use Website\Support\WebsiteAssetRegistry;
use Website\Support\WebsiteClock;
use Carbon\CarbonImmutable;

class WebsiteCatalogRepository
{
    protected static ?array $catalogData = null;
    protected static ?array $contentData = null;
    protected static ?array $hydratedTreks = null;
    protected static ?array $generatedDepartures = null;

    /**
     * Load and cache raw catalog fixture JSON.
     */
    public static function rawCatalog(): array
    {
        if (self::$catalogData === null) {
            $path = dirname(__DIR__).'/Data/website-catalog.json';
            self::$catalogData = json_decode(file_get_contents($path), true) ?: [];
        }

        return self::$catalogData;
    }

    /**
     * Load and cache raw content fixture JSON.
     */
    public static function rawContent(): array
    {
        if (self::$contentData === null) {
            $path = dirname(__DIR__).'/Data/website-content.json';
            self::$contentData = json_decode(file_get_contents($path), true) ?: [];
        }

        return self::$contentData;
    }

    /**
     * Get all 5 regions with derived trek_count and associated treks.
     */
    public static function getRegions(): array
    {
        $raw = self::rawCatalog();
        $treks = self::getTreks();
        $regions = [];

        foreach ($raw['regions'] ?? [] as $region) {
            $regionTreks = array_values(array_filter($treks, fn ($t) => $t['region_id'] === $region['id']));
            $regions[] = array_merge($region, [
                'trek_count' => count($regionTreks),
                'treks' => $regionTreks,
                'image' => WebsiteAssetRegistry::resolve("region-{$region['slug']}", $region['name']),
            ]);
        }

        return $regions;
    }

    /**
     * Find a region by ID or slug.
     */
    public static function findRegion(string $idOrSlug): ?array
    {
        foreach (self::getRegions() as $region) {
            if ($region['id'] === $idOrSlug || $region['slug'] === $idOrSlug) {
                return $region;
            }
        }

        return null;
    }

    /**
     * Get all 6 experiences with derived trek_count and associated treks.
     */
    public static function getExperiences(): array
    {
        $raw = self::rawCatalog();
        $treks = self::getTreks();
        $experiences = [];

        foreach ($raw['experiences'] ?? [] as $exp) {
            $expTreks = array_values(array_filter($treks, fn ($t) => in_array($exp['id'], $t['experience_ids'], true)));
            $experiences[] = array_merge($exp, [
                'trek_count' => count($expTreks),
                'treks' => $expTreks,
                'image' => WebsiteAssetRegistry::resolve("experience-{$exp['slug']}", $exp['name']),
            ]);
        }

        return $experiences;
    }

    /**
     * Find an experience by ID or slug.
     */
    public static function findExperience(string $idOrSlug): ?array
    {
        foreach (self::getExperiences() as $exp) {
            if ($exp['id'] === $idOrSlug || $exp['slug'] === $idOrSlug) {
                return $exp;
            }
        }

        return null;
    }

    /**
     * Get all add-ons from catalog fixture.
     */
    public static function getAddons(): array
    {
        $raw = self::rawCatalog();
        return $raw['addons'] ?? [];
    }

    /**
     * Get all 12 calendar months with matching treks.
     */
    public static function getMonths(): array
    {
        $raw = self::rawCatalog();
        $treks = self::getTreks();
        $months = [];

        foreach ($raw['months'] ?? [] as $month) {
            $monthTreks = array_values(array_filter($treks, fn ($t) => in_array((int)$month['id'], $t['suitable_months'], true)));
            $months[] = array_merge($month, [
                'season' => ucfirst($month['season_website'] ?? 'season'),
                'trek_count' => count($monthTreks),
                'treks' => $monthTreks,
            ]);
        }

        return $months;
    }

    /**
     * Find month by integer ID (1-12) or slug ('january', etc.).
     */
    public static function findMonth(int|string $idOrSlug): ?array
    {
        foreach (self::getMonths() as $month) {
            if ((string)$month['id'] === (string)$idOrSlug || strtolower($month['slug']) === strtolower((string)$idOrSlug)) {
                return $month;
            }
        }

        return null;
    }

    /**
     * Get all 8 fully hydrated detail treks.
     */
    public static function getTreks(): array
    {
        if (self::$hydratedTreks !== null) {
            return self::$hydratedTreks;
        }

        $raw = self::rawCatalog();
        $treks = [];

        foreach ($raw['treks'] ?? [] as $seed) {
            $treks[$seed['id']] = self::hydrateTrek($seed, $raw);
        }

        self::$hydratedTreks = array_values($treks);

        return self::$hydratedTreks;
    }

    /**
     * Find a trek by ID or slug.
     */
    public static function findTrek(string $idOrSlug): ?array
    {
        foreach (self::getTreks() as $trek) {
            if ($trek['id'] === $idOrSlug || $trek['slug'] === $idOrSlug) {
                return $trek;
            }
        }

        return null;
    }

    /**
     * Filter treks using canonical query parameters.
     */
    public static function filterTreks(array $params = []): array
    {
        $treks = self::getTreks();

        // 1. Text search (q)
        if (!empty($params['q'])) {
            $q = mb_strtolower(trim(mb_substr($params['q'], 0, 120)));
            $treks = array_filter($treks, function ($t) use ($q) {
                $expNames = implode(' ', array_column($t['experiences'] ?? [], 'name'));
                return str_contains(mb_strtolower($t['name']), $q)
                    || str_contains(mb_strtolower($t['summary']), $q)
                    || str_contains(mb_strtolower($t['region']['name'] ?? ''), $q)
                    || str_contains(mb_strtolower($expNames), $q);
            });
        }

        // 2. Region filter
        if (!empty($params['region'])) {
            $region = trim($params['region']);
            $treks = array_filter($treks, fn ($t) => $t['region_id'] === $region || ($t['region']['slug'] ?? '') === $region);
        }

        // 3. Experience filter
        if (!empty($params['experience'])) {
            $exp = trim($params['experience']);
            $treks = array_filter($treks, function ($t) use ($exp) {
                if (in_array($exp, $t['experience_ids'], true)) {
                    return true;
                }
                foreach ($t['experiences'] ?? [] as $e) {
                    if ($e['slug'] === $exp || $e['id'] === $exp) {
                        return true;
                    }
                }
                return false;
            });
        }

        // 4. Month filter (1-12)
        if (!empty($params['month'])) {
            $month = (int) $params['month'];
            if ($month >= 1 && $month <= 12) {
                $treks = array_filter($treks, fn ($t) => in_array($month, $t['suitable_months'], true));
            }
        }

        // 5. Days range
        if (isset($params['days_min']) && is_numeric($params['days_min'])) {
            $min = (int) $params['days_min'];
            $treks = array_filter($treks, fn ($t) => $t['duration_days'] >= $min);
        }
        if (isset($params['days_max']) && is_numeric($params['days_max'])) {
            $max = (int) $params['days_max'];
            $treks = array_filter($treks, fn ($t) => $t['duration_days'] <= $max);
        }

        // 6. Difficulty (easy/moderate/challenging)
        if (!empty($params['difficulty'])) {
            $diff = strtolower(trim($params['difficulty']));
            if (in_array($diff, ['easy', 'moderate', 'challenging'], true)) {
                $treks = array_filter($treks, fn ($t) => strtolower($t['difficulty']) === $diff);
            }
        }

        // 7. Budget max USD
        if (isset($params['budget_max']) && is_numeric($params['budget_max'])) {
            $budgetMax = (int) $params['budget_max'];
            $treks = array_filter($treks, fn ($t) => $t['price_usd'] <= $budgetMax);
        }

        // 8. Sorting with deterministic ID tie-break
        $sort = $params['sort'] ?? 'recommended';
        $treks = array_values($treks);

        usort($treks, function ($a, $b) use ($sort) {
            $res = match ($sort) {
                'duration_asc' => $a['duration_days'] <=> $b['duration_days'],
                'duration_desc' => $b['duration_days'] <=> $a['duration_days'],
                'price_asc' => $a['price_minor'] <=> $b['price_minor'],
                'price_desc' => $b['price_minor'] <=> $a['price_minor'],
                default => ($a['featured_rank'] ?? 999) <=> ($b['featured_rank'] ?? 999),
            };

            return $res !== 0 ? $res : ($a['id'] <=> $b['id']);
        });

        return $treks;
    }

    /**
     * Generate all 24 departures (3 templates per 8 treks).
     */
    public static function getDepartures(array $filters = []): array
    {
        if (self::$generatedDepartures === null) {
            $raw = self::rawCatalog();
            $treks = self::getTreks();
            $templates = $raw['departure_templates'] ?? [];
            $baseDate = WebsiteClock::now();
            $departures = [];

            foreach ($treks as $trek) {
                foreach ($templates as $tmpl) {
                    $depId = $trek['id'] . '-' . $tmpl['suffix'];
                    $startDate = $baseDate->addDays($tmpl['start_offset_days'])->format('Y-m-d');
                    $endDate = CarbonImmutable::parse($startDate)->addDays($trek['duration_days'] - 1)->format('Y-m-d');
                    $priceMinor = $trek['price_minor'] + ($tmpl['price_adjustment_minor'] ?? 0);

                    $departures[] = [
                        'id' => $depId,
                        'trek_id' => $trek['id'],
                        'trek_name' => $trek['name'],
                        'trek_slug' => $trek['slug'],
                        'region_id' => $trek['region_id'],
                        'start_date' => $startDate,
                        'end_date' => $endDate,
                        'duration_days' => $trek['duration_days'],
                        'status' => $tmpl['status'], // open, limited, full
                        'sample_seats' => $tmpl['sample_seats'],
                        'price_minor' => $priceMinor,
                        'price_usd' => (int) round($priceMinor / 100),
                        'is_bookable' => in_array($tmpl['status'], ['open', 'limited'], true) && $tmpl['sample_seats'] > 0,
                        'disclosure' => 'Sample departure dates: not confirmed flight or reservation dates.',
                    ];
                }
            }

            self::$generatedDepartures = $departures;
        }

        $list = self::$generatedDepartures;

        if (!empty($filters['trek_id'])) {
            $list = array_filter($list, fn ($d) => $d['trek_id'] === $filters['trek_id']);
        }
        if (!empty($filters['region_id'])) {
            $list = array_filter($list, fn ($d) => $d['region_id'] === $filters['region_id']);
        }
        if (!empty($filters['month'])) {
            $m = (int) $filters['month'];
            $list = array_filter($list, fn ($d) => (int) date('n', strtotime($d['start_date'])) === $m);
        }

        return array_values($list);
    }

    /**
     * Find a departure by ID (e.g. 't-ebc-a').
     */
    public static function findDeparture(string $id): ?array
    {
        foreach (self::getDepartures() as $dep) {
            if ($dep['id'] === $id) {
                return $dep;
            }
        }

        return null;
    }

    /**
     * Get all 6 articles.
     */
    public static function getArticles(array $filters = []): array
    {
        $raw = self::rawContent();
        $articles = [];

        foreach ($raw['articles'] ?? [] as $art) {
            $articles[] = array_merge($art, [
                'image' => WebsiteAssetRegistry::resolve("article-{$art['slug']}", $art['title']),
            ]);
        }

        if (!empty($filters['category'])) {
            $articles = array_filter($articles, fn ($a) => $a['category'] === $filters['category']);
        }

        if (!empty($filters['q'])) {
            $q = mb_strtolower(trim($filters['q']));
            $articles = array_filter($articles, function ($a) use ($q) {
                if (str_contains(mb_strtolower($a['title']), $q) || str_contains(mb_strtolower($a['summary']), $q)) {
                    return true;
                }
                foreach ($a['sections'] ?? [] as $sec) {
                    if (str_contains(mb_strtolower($sec['heading'] ?? ''), $q) || str_contains(mb_strtolower($sec['body'] ?? ''), $q)) {
                        return true;
                    }
                }
                return false;
            });
        }

        return array_values($articles);
    }

    /**
     * Find an article by ID or slug.
     */
    public static function findArticle(string $idOrSlug): ?array
    {
        foreach (self::getArticles() as $art) {
            if ($art['id'] === $idOrSlug || $art['slug'] === $idOrSlug) {
                return $art;
            }
        }

        return null;
    }

    /**
     * Get all 3 fictional guides.
     */
    public static function getGuides(): array
    {
        $raw = self::rawContent();
        $guides = [];

        foreach ($raw['guides'] ?? [] as $guide) {
            $associatedTreks = [];
            foreach ($guide['trek_ids'] ?? [] as $tId) {
                if ($trek = self::findTrek($tId)) {
                    $associatedTreks[] = $trek;
                }
            }
            $guides[] = array_merge($guide, [
                'image' => WebsiteAssetRegistry::resolve($guide['image_key'] ?? "guide-{$guide['id']}", $guide['name'], 400, 400),
                'treks' => $associatedTreks,
            ]);
        }

        return $guides;
    }

    /**
     * Find a guide by ID or slug.
     */
    public static function findGuide(string $idOrSlug): ?array
    {
        foreach (self::getGuides() as $guide) {
            if ($guide['id'] === $idOrSlug || $guide['slug'] === $idOrSlug) {
                return $guide;
            }
        }

        return null;
    }

    /**
     * Get all 3 fictional stories.
     */
    public static function getStories(array $filters = []): array
    {
        $raw = self::rawContent();
        $stories = [];

        foreach ($raw['stories'] ?? [] as $story) {
            $trek = self::findTrek($story['trek_id']);
            $region = $trek['region'] ?? (isset($trek['region_id']) ? self::findRegion($trek['region_id']) : null);
            $stories[] = array_merge($story, [
                'trek' => $trek,
                'region' => $region,
                'region_id' => $trek['region_id'] ?? null,
                'image' => WebsiteAssetRegistry::resolve($story['image_key'] ?? "story-{$story['id']}", $story['title']),
            ]);
        }

        if (!empty($filters['trek_id']) || !empty($filters['trek'])) {
            $val = $filters['trek_id'] ?? $filters['trek'];
            $stories = array_filter($stories, fn ($s) => $s['trek_id'] === $val || ($s['trek']['slug'] ?? null) === $val || ($s['trek']['id'] ?? null) === $val);
        }
        if (!empty($filters['region_id']) || !empty($filters['region'])) {
            $val = $filters['region_id'] ?? $filters['region'];
            $stories = array_filter($stories, fn ($s) => $s['region_id'] === $val || ($s['region']['slug'] ?? null) === $val || ($s['region']['id'] ?? null) === $val);
        }

        return array_values($stories);
    }

    /**
     * Find a story by ID or slug.
     */
    public static function findStory(string $idOrSlug): ?array
    {
        foreach (self::getStories() as $story) {
            if ($story['id'] === $idOrSlug || $story['slug'] === $idOrSlug) {
                return $story;
            }
        }

        return null;
    }

    /**
     * Get all FAQs with optional category and trek context interpolation.
     */
    public static function getFaqs(?string $category = null, ?array $trekContext = null): array
    {
        $raw = self::rawContent();
        $faqs = $raw['faqs'] ?? [];
        $result = [];

        foreach ($faqs as $faq) {
            // General FAQ listing excludes trek-specific duration question unless trekContext resolves it
            if ($faq['trek_specific'] && empty($trekContext)) {
                continue;
            }

            if ($category && $faq['category'] !== $category) {
                continue;
            }

            $answer = $faq['answer_template'];
            if (!empty($trekContext['duration_days'])) {
                $answer = str_replace('{duration_days}', (string)$trekContext['duration_days'], $answer);
            }

            $result[] = [
                'id' => $faq['id'],
                'category' => $faq['category'],
                'question' => $faq['question'],
                'answer' => $answer,
                'trek_specific' => $faq['trek_specific'],
            ];
        }

        return $result;
    }

    /**
     * Get policy page content by slug.
     */
    public static function getPolicy(string $slug): ?array
    {
        $policies = [
            'privacy' => [
                'title' => 'Privacy Policy (Website Draft)',
                'intro' => 'This sample privacy policy illustrates how traveler privacy notices are laid out. In this website preview, no personal data, marketing cookies, or third-party tracking pixels are processed.',
                'sections' => [
                    ['heading' => 'Scope of Website Data', 'body' => 'All inputs submitted via website forms are handled locally in session storage and discarded upon confirmation. No email or CRM records are created.'],
                    ['heading' => 'Cookies & Local Storage', 'body' => 'The website utilizes only essential HTTP session cookies for wizard progress and browser localStorage for comparison shortlists. No advertising cookies exist.'],
                    ['heading' => 'Verification Required', 'body' => 'This document is an illustrative draft for UI review and does not constitute a legally binding agreement.'],
                ],
            ],
            'terms' => [
                'title' => 'Terms & Conditions (Website Draft)',
                'intro' => 'Illustrative terms of service for exploring the EATH website preview. No commercial trekking contract is established through this preview.',
                'sections' => [
                    ['heading' => 'Illustrative Service Only', 'body' => 'Prices, routes, and seat availability shown on this website preview are illustrative samples. Real travel quotes require direct consultation with the operator.'],
                    ['heading' => 'Simulated Booking Flow', 'body' => 'No payment gateway is integrated. Confirmations generated on this preview represent simulated non-binding receipts.'],
                    ['heading' => 'Intellectual Property', 'body' => 'All preview text and design patterns are for review purposes.'],
                ],
            ],
            'booking-conditions' => [
                'title' => 'Booking Conditions (Website Draft)',
                'intro' => 'Sample booking terms explaining deposit structures, group sizes, and preparation milestones.',
                'sections' => [
                    ['heading' => 'Deposit & Final Payment', 'body' => 'Operational booking policies typically require a deposit upon confirmation. In this website, no financial transaction takes place.'],
                    ['heading' => 'Itinerary Adjustments', 'body' => 'Mountain itineraries depend on weather, trail conditions, and health pacing. All published days are representative models.'],
                    ['heading' => 'Insurance Mandate', 'body' => 'High-altitude trekking requires comprehensive medical and helicopter evacuation insurance verified before departure.'],
                ],
            ],
            'cancellation' => [
                'title' => 'Cancellation & Refund Policy (Website Draft)',
                'intro' => 'Sample policy layout covering cancellation timelines and non-refundable operational costs.',
                'sections' => [
                    ['heading' => 'Traveler Notice Periods', 'body' => 'Cancellation requests in actual operations are evaluated based on advance notice relative to the expedition start date.'],
                    ['heading' => 'Permit & Flight Exclusions', 'body' => 'Non-recoverable fees such as national park permits and domestic flights are strictly non-refundable once issued.'],
                    ['heading' => 'Force Majeure', 'body' => 'Natural events, route closures, and government regulations may require itinerary modification without liability.'],
                ],
            ],
            'cookies' => [
                'title' => 'Cookie Policy (Website Draft)',
                'intro' => 'Information on essential session tracking used exclusively to power website interactions.',
                'sections' => [
                    ['heading' => 'Strictly Necessary Cookies', 'body' => 'We use standard CSRF tokens and an encrypted session cookie solely to maintain your interactive website draft.'],
                    ['heading' => 'Local Browser Storage', 'body' => 'The trek comparison tray stores up to 3 trek identifiers in your browser\'s local storage for cross-page convenience.'],
                    ['heading' => 'Zero Third-Party Trackers', 'body' => 'No Google Analytics, Meta pixels, or third-party advertising scripts are loaded in this website environment.'],
                ],
            ],
        ];

        return $policies[$slug] ?? null;
    }

    /**
     * Hydrate a complete 12-section trek detail record from seed data.
     */
    protected static function hydrateTrek(array $seed, array $rawCatalog): array
    {
        $duration = (int) $seed['duration_days'];
        $days = [];

        $dayTemplates = [
            'Forest and village walking',
            'Scenic trail exploration',
            'Time for views and photographs',
            'A slower exploration day',
            'Continuing the sample trail',
        ];

        // EBC curated itinerary matching authentic Khumbu route profile
        $ebcItinerary = [
            1 => [
                'title' => 'Fly to Lukla & Trek to Phakding',
                'route' => 'Kathmandu (1,400m) → Phakding (2,610m)',
                'altitude_label' => '2,610m',
                'walking_hours_label' => '3–4 hrs',
                'is_acclimatization' => false,
                'desc' => 'Scenic mountain flight to Lukla (2,840m) followed by an introductory descent through Sherpa villages along the Dudh Koshi river to Phakding.',
            ],
            2 => [
                'title' => 'Trek to Namche Bazaar across Hillary Bridges',
                'route' => 'Phakding → Namche Bazaar (3,440m)',
                'altitude_label' => '3,440m',
                'walking_hours_label' => '5–6 hrs',
                'is_acclimatization' => false,
                'desc' => 'Cross dramatic suspension bridges including the famous Hillary Bridge before the steady climb into Namche Bazaar with first views of Everest.',
            ],
            3 => [
                'title' => 'Acclimatization Day in Namche Bazaar',
                'route' => 'Namche Bazaar → Namche Bazaar (3,440m)',
                'altitude_label' => '3,880m',
                'walking_hours_label' => '3–4 hrs',
                'is_acclimatization' => true,
                'desc' => 'Hike to the Everest View Hotel (3,880m) or Khumjung village to acclimatize, visiting the local Sherpa museum and artisan bakeries.',
            ],
            4 => [
                'title' => 'Trek to Tengboche Monastery',
                'route' => 'Namche Bazaar → Tengboche (3,860m)',
                'altitude_label' => '3,860m',
                'walking_hours_label' => '5 hrs',
                'is_acclimatization' => false,
                'desc' => 'Traverse scenic valley ridges before descending to Phunki Thenga and climbing through rhododendron forests to Tengboche Monastery.',
            ],
            5 => [
                'title' => 'Trek through Deboche & Pangboche to Dingboche',
                'route' => 'Tengboche → Dingboche (4,410m)',
                'altitude_label' => '4,410m',
                'walking_hours_label' => '5–6 hrs',
                'is_acclimatization' => false,
                'desc' => 'Pass ancient mani walls in Pangboche with up-close views of Ama Dablam, entering the high alpine valley of Dingboche.',
            ],
            6 => [
                'title' => 'Acclimatization Hike to Nangkartshang Peak',
                'route' => 'Dingboche → Dingboche (4,410m)',
                'altitude_label' => '5,083m',
                'walking_hours_label' => '4 hrs',
                'is_acclimatization' => true,
                'desc' => 'Climb Nangkartshang viewpoint (5,083m) for panoramic vistas of Makalu, Lhotse, and Ama Dablam before an afternoon of rest.',
            ],
            7 => [
                'title' => 'Trek to Lobuche via Thokla Pass Memorials',
                'route' => 'Dingboche → Lobuche (4,910m)',
                'altitude_label' => '4,910m',
                'walking_hours_label' => '5 hrs',
                'is_acclimatization' => false,
                'desc' => 'Gentle walking across Dughla alpine plateau followed by a steep climb to Thokla Pass memorials honoring legendary Himalayan climbers.',
            ],
            8 => [
                'title' => 'Gorak Shep & Everest Base Camp Expedition',
                'route' => 'Lobuche → Everest Base Camp / Gorak Shep (5,164m)',
                'altitude_label' => '5,364m',
                'walking_hours_label' => '7–8 hrs',
                'is_acclimatization' => false,
                'desc' => 'Trek along the Khumbu Glacier to Gorak Shep, drop packs, and push onward to Everest Base Camp (5,364m) standing beneath the Khumbu Icefall.',
            ],
            9 => [
                'title' => 'Kala Patthar Sunrise Climb & Trek to Pheriche',
                'route' => 'Gorak Shep (5,164m) → Kala Patthar (5,545m) → Pheriche (4,240m)',
                'altitude_label' => '5,545m',
                'walking_hours_label' => '6–7 hrs',
                'is_acclimatization' => false,
                'desc' => 'Early morning climb to Kala Patthar (5,545m) for the definitive 360-degree Everest sunrise panorama, descending to Pheriche valley.',
            ],
            10 => [
                'title' => 'Descend from Pheriche to Namche Bazaar',
                'route' => 'Pheriche (4,240m) → Namche Bazaar (3,440m)',
                'altitude_label' => '3,440m',
                'walking_hours_label' => '6–7 hrs',
                'is_acclimatization' => false,
                'desc' => 'Retrace steps with increasing oxygen levels, passing through Pangboche and Tengboche back to the bustling market of Namche.',
            ],
            11 => [
                'title' => 'Trek from Namche Bazaar to Lukla',
                'route' => 'Namche Bazaar (3,440m) → Lukla (2,840m)',
                'altitude_label' => '2,840m',
                'walking_hours_label' => '6–7 hrs',
                'is_acclimatization' => false,
                'desc' => 'Final walking day descending through pine forests and crossing suspension bridges back to Lukla for celebration with the mountain crew.',
            ],
            12 => [
                'title' => 'Scenic Morning Flight from Lukla to Kathmandu',
                'route' => 'Lukla (2,840m) → Kathmandu (1,400m)',
                'altitude_label' => '1,400m',
                'walking_hours_label' => 'Flight 35 min',
                'is_acclimatization' => false,
                'desc' => 'Early morning twin-otter flight out of Lukla back to Kathmandu, transfer to hotel with afternoon free for recovery.',
            ],
            13 => [
                'title' => 'Buffer Day & Kathmandu Valley Heritage Tour',
                'route' => 'Kathmandu Valley (1,400m)',
                'altitude_label' => '1,400m',
                'walking_hours_label' => '3–4 hrs',
                'is_acclimatization' => false,
                'desc' => 'Contingency day for mountain flights; optional guided exploration of UNESCO World Heritage sites in Patan and Swayambhunath.',
            ],
            14 => [
                'title' => 'Leisure & Exploration in Thamel & Farewell Dinner',
                'route' => 'Kathmandu (1,400m)',
                'altitude_label' => '1,400m',
                'walking_hours_label' => 'Rest Day',
                'is_acclimatization' => false,
                'desc' => 'Souvenir shopping and cafe time in Thamel followed by an evening celebration and farewell dinner with your expedition team.',
            ],
            15 => [
                'title' => 'Final Departure & Airport Transfer',
                'route' => 'Kathmandu Hotel → Tribhuvan International Airport (1,400m)',
                'altitude_label' => '1,400m',
                'walking_hours_label' => 'Departure Transfer',
                'is_acclimatization' => false,
                'desc' => 'Conclude your journey with private transfer to Tribhuvan International Airport for your homeward flight.',
            ],
        ];

        // 3. Itinerary: exactly duration_days numbered entries
        for ($d = 1; $d <= $duration; $d++) {
            if ($seed['id'] === 't-ebc' && isset($ebcItinerary[$d])) {
                $cur = $ebcItinerary[$d];
                $title = $cur['title'];
                $desc = $cur['desc'];
                $route = $cur['route'];
                $altitudeLabel = $cur['altitude_label'];
                $walkingHoursLabel = $cur['walking_hours_label'];
                $isAcclimatization = $cur['is_acclimatization'];
            } elseif ($d === 1) {
                $title = 'Arrival and sample planning session';
                $desc = 'Meet the sample team, review equipment, and discuss unhurried pacing for the days ahead.';
                $route = 'Kathmandu (1,400m) → Welcome Briefing';
                $altitudeLabel = '1,400m';
                $walkingHoursLabel = '2–3 hrs';
                $isAcclimatization = false;
            } elseif ($d === $duration) {
                $title = 'Departure and onward plans';
                $desc = 'Conclude the sample journey with breakfast and preparation for onward travel arrangements.';
                $route = 'Trail Gateway → Kathmandu (1,400m)';
                $altitudeLabel = '1,400m';
                $walkingHoursLabel = 'Departure Transfer';
                $isAcclimatization = false;
            } elseif ($d === $duration - 1) {
                $title = 'Return and unhurried wrap-up';
                $desc = 'Descend to the base location at a comfortable pace with space for rest and reflection.';
                $route = 'High Camp → Trailhead Base';
                $altitudeLabel = round(($seed['max_altitude_m'] ?? 3800) * 0.6) . 'm';
                $walkingHoursLabel = '4–5 hrs';
                $isAcclimatization = false;
            } else {
                $templateTitle = $dayTemplates[($d - 2) % count($dayTemplates)];
                $title = "Day {$d}: {$templateTitle}";
                $desc = "Follow the illustrative route through changing Himalayan valley scenery, stopping at trailside tea houses with unhurried breaks.";
                $route = "Trail Waypoint {$d} → Overnight Lodge";
                $altitudeLabel = round(1400 + (($seed['max_altitude_m'] ?? 4000) - 1400) * min(1, ($d / ($duration * 0.7)))) . 'm';
                $walkingHoursLabel = min(6, (int)($seed['walking_hours_max'] ?? 6)) . ' hrs';
                $isAcclimatization = ($d === 3 || $d === 6) && $duration >= 10;
            }

            $days[] = [
                'day' => $d,
                'title' => $title,
                'description' => $desc,
                'route' => $route,
                'altitude_label' => $altitudeLabel,
                'walking_hours_label' => $walkingHoursLabel,
                'is_acclimatization' => $isAcclimatization,
                'location_label' => 'Sample location',
                'walking_hours' => min(6, (int)($seed['walking_hours_max'] ?? 7)),
                'altitude_m' => null, // Intentionally null per website contract
                'accommodation_label' => 'Standard Tea House (Website)',
                'meal_note' => 'Breakfast, Lunch & Dinner included in sample ground package',
            ];
        }

        // Region & Experience derivations
        $region = null;
        foreach ($rawCatalog['regions'] ?? [] as $r) {
            if ($r['id'] === $seed['region_id']) {
                $region = $r;
                break;
            }
        }

        $experiences = [];
        foreach ($rawCatalog['experiences'] ?? [] as $exp) {
            if (in_array($exp['id'], $seed['experience_ids'], true)) {
                $experiences[] = $exp;
            }
        }

        // 9. Related treks: same region first, then nearest duration, then ID; exclude current trek, max 3
        $allSeeds = $rawCatalog['treks'] ?? [];
        $candidates = array_filter($allSeeds, fn ($s) => $s['id'] !== $seed['id']);
        usort($candidates, function ($a, $b) use ($seed) {
            $aSameRegion = ($a['region_id'] === $seed['region_id']) ? 0 : 1;
            $bSameRegion = ($b['region_id'] === $seed['region_id']) ? 0 : 1;
            if ($aSameRegion !== $bSameRegion) {
                return $aSameRegion <=> $bSameRegion;
            }
            $aDiffDuration = abs($a['duration_days'] - $seed['duration_days']);
            $bDiffDuration = abs($b['duration_days'] - $seed['duration_days']);
            if ($aDiffDuration !== $bDiffDuration) {
                return $aDiffDuration <=> $bDiffDuration;
            }
            return $a['id'] <=> $b['id'];
        });
        $relatedIds = array_slice(array_column($candidates, 'id'), 0, 3);

        // 11. Gallery: 4 gallery keys resolved through WebsiteAssetRegistry
        $gallery = [];
        foreach ($seed['gallery_keys'] ?? [] as $idx => $gKey) {
            $gallery[] = WebsiteAssetRegistry::resolve($gKey, "{$seed['name']} sample view " . ($idx + 1));
        }

        // 1. Overview
        $overviewSecondary = "This illustrative itinerary represents a balanced website experience theme. Pacing is designed to showcase trade-offs between trail hours and recovery time. Illustrative itinerary — not an operating route plan.";

        return array_merge($seed, [
            'region' => $region,
            'experiences' => $experiences,
            'overview_secondary' => $overviewSecondary,
            'itinerary' => $days,
            'inclusions' => [
                'Sample ground itinerary planning and route guidance',
                'Sample guide-support allocation throughout the route',
                'Sample lodge/tea house accommodation line',
                'Standard national park and conservation area sample permits',
            ],
            'exclusions' => [
                'International airfare and Nepal entry visa fees',
                'Comprehensive medical and high-altitude rescue insurance',
                'Personal gear, laundry, and alcoholic beverages',
                'Unpriced optional customization or private transfer requests',
            ],
            'accommodation_note' => 'Describe fixture accommodation category as a website preference; real lodge and hotel availability must be verified prior to booking.',
            'logistics_safety_note' => 'All operational details and altitude acclimatization specifics must be verified before launch. Values shown are test inputs.',
            'route_map_note' => 'Route map not supplied in this website.',
            'related_trek_ids' => $relatedIds,
            'image' => WebsiteAssetRegistry::resolve("trek-{$seed['id']}", $seed['name']),
            'gallery' => $gallery,
            'meta_title' => "{$seed['name']} | EATH Ways Himalayan Trekking Website",
            'meta_description' => "Sample trekking itinerary for {$seed['name']} in the {$region['name']} region ({$duration} days, {$seed['difficulty']}). Illustrative website profile.",
        ]);
    }

    /**
     * Get a lightweight associative array mapping trek ID to key summary fields for client-side compare whitelist.
     */
    public static function getTrekWhitelist(): array
    {
        $treks = self::getTreks();
        $whitelist = [];

        foreach ($treks as $trek) {
            $whitelist[$trek['id']] = [
                'id' => $trek['id'],
                'name' => $trek['name'],
                'slug' => $trek['slug'],
                'duration' => "{$trek['duration_days']} Days",
                'difficulty' => $trek['difficulty'],
                'max_altitude_m' => $trek['max_altitude_m'],
                'price' => \Website\Support\WebsiteMoneyFormatter::format($trek['price_minor']),
                'url' => route('website.treks.show', $trek['slug']),
            ];
        }

        return $whitelist;
    }

    /**
     * Compute side-by-side comparison data for given trek IDs with canonical differences.
     */
    public static function compareTreks(array $trekIds): array
    {
        $allTreks = self::getTreks();
        $allTreksKeyed = [];
        foreach ($allTreks as $t) {
            $allTreksKeyed[$t['id']] = $t;
        }

        $notices = [];
        $uniqueIds = [];
        $duplicatesFound = false;
        $unknownFound = false;

        foreach ($trekIds as $id) {
            if (!is_string($id)) continue;
            $trimmed = trim($id);
            if ($trimmed === '') continue;

            if (in_array($trimmed, $uniqueIds, true)) {
                $duplicatesFound = true;
                continue;
            }

            if (!isset($allTreksKeyed[$trimmed])) {
                $unknownFound = true;
                continue;
            }

            $uniqueIds[] = $trimmed;
        }

        if (count($uniqueIds) > 3) {
            $notices[] = 'Comparison is limited to a maximum of 3 journeys. The first 3 selections are shown below.';
        }
        if ($duplicatesFound) {
            $notices[] = 'Duplicate trek selections were removed from comparison.';
        }
        if ($unknownFound) {
            $notices[] = 'One or more unrecognized trek IDs were ignored.';
        }

        $selectedIds = array_slice($uniqueIds, 0, 3);
        $selectedTreks = [];
        foreach ($selectedIds as $id) {
            $selectedTreks[] = $allTreksKeyed[$id];
        }

        $unselectedTreks = array_values(array_filter($allTreks, fn ($t) => !in_array($t['id'], $selectedIds, true)));

        $monthNames = [
            1 => 'Jan', 2 => 'Feb', 3 => 'Mar', 4 => 'Apr', 5 => 'May', 6 => 'Jun',
            7 => 'Jul', 8 => 'Aug', 9 => 'Sep', 10 => 'Oct', 11 => 'Nov', 12 => 'Dec'
        ];

        // Format and calculate rows
        $hasAtLeastTwo = count($selectedTreks) >= 2;

        $checkDifferent = function (callable $extractor) use ($selectedTreks, $hasAtLeastTwo): bool {
            if (!$hasAtLeastTwo) return false;
            $values = array_map($extractor, $selectedTreks);
            return count(array_unique($values)) > 1;
        };

        $checkSetDifferent = function (callable $extractor) use ($selectedTreks, $hasAtLeastTwo): bool {
            if (!$hasAtLeastTwo) return false;
            $sets = array_map(function ($t) use ($extractor) {
                $arr = (array) $extractor($t);
                sort($arr);
                return json_encode($arr);
            }, $selectedTreks);
            return count(array_unique($sets)) > 1;
        };

        $rowGroups = [
            'Overview' => [
                [
                    'key' => 'region',
                    'label' => 'Geographic Region',
                    'is_different' => $checkDifferent(fn ($t) => $t['region_id']),
                    'render_type' => 'text',
                    'values' => array_map(fn ($t) => $t['region']['name'] ?? 'Nepal', $selectedTreks),
                ],
                [
                    'key' => 'summary',
                    'label' => 'Trail Summary',
                    'is_different' => $checkDifferent(fn ($t) => $t['summary']),
                    'render_type' => 'text',
                    'values' => array_map(fn ($t) => $t['summary'], $selectedTreks),
                ],
            ],
            'Time & Pacing' => [
                [
                    'key' => 'duration',
                    'label' => 'Total Duration',
                    'is_different' => $checkDifferent(fn ($t) => $t['duration_days']),
                    'render_type' => 'badge',
                    'values' => array_map(fn ($t) => "{$t['duration_days']} Days", $selectedTreks),
                ],
                [
                    'key' => 'walking_hours',
                    'label' => 'Daily Walking Hours',
                    'is_different' => $checkDifferent(fn ($t) => $t['walking_hours_max']),
                    'render_type' => 'text',
                    'values' => array_map(fn ($t) => "Up to {$t['walking_hours_max']} hrs/day", $selectedTreks),
                ],
                [
                    'key' => 'pace',
                    'label' => 'Trekking Pace',
                    'is_different' => $checkDifferent(fn ($t) => $t['pace']),
                    'render_type' => 'text',
                    'values' => array_map(fn ($t) => ucfirst($t['pace']), $selectedTreks),
                ],
            ],
            'Physical Demands' => [
                [
                    'key' => 'difficulty',
                    'label' => 'Physical Difficulty',
                    'is_different' => $checkDifferent(fn ($t) => $t['difficulty']),
                    'render_type' => 'badge',
                    'values' => array_map(fn ($t) => ucfirst($t['difficulty']), $selectedTreks),
                ],
                [
                    'key' => 'max_altitude',
                    'label' => 'Maximum Elevation',
                    'is_different' => $checkDifferent(fn ($t) => $t['max_altitude_m']),
                    'render_type' => 'text',
                    'values' => array_map(fn ($t) => number_format($t['max_altitude_m']) . 'm', $selectedTreks),
                ],
            ],
            'Seasonality & Comfort' => [
                [
                    'key' => 'suitable_months',
                    'label' => 'Suitable Trekking Months',
                    'is_different' => $checkSetDifferent(fn ($t) => $t['suitable_months'] ?? []),
                    'render_type' => 'months',
                    'values' => array_map(function ($t) use ($monthNames) {
                        $mList = array_map(fn ($m) => $monthNames[$m] ?? $m, $t['suitable_months'] ?? []);
                        return implode(', ', $mList);
                    }, $selectedTreks),
                ],
                [
                    'key' => 'accommodation',
                    'label' => 'Accommodation Style',
                    'is_different' => $checkDifferent(fn ($t) => $t['accommodation']),
                    'render_type' => 'text',
                    'values' => array_map(fn ($t) => 'Standard Mountain Tea House & Lodges', $selectedTreks),
                ],
            ],
            'Experience & Highlights' => [
                [
                    'key' => 'experiences',
                    'label' => 'Trail Experience Styles',
                    'is_different' => $checkSetDifferent(fn ($t) => $t['experience_ids'] ?? []),
                    'render_type' => 'list',
                    'values' => array_map(function ($t) {
                        return array_column($t['experiences'] ?? [], 'name');
                    }, $selectedTreks),
                ],
                [
                    'key' => 'highlights',
                    'label' => 'Key Highlights',
                    'is_different' => $checkSetDifferent(fn ($t) => $t['highlights'] ?? []),
                    'render_type' => 'list',
                    'values' => array_map(fn ($t) => $t['highlights'] ?? [], $selectedTreks),
                ],
            ],
            'Ground Package Cost' => [
                [
                    'key' => 'price',
                    'label' => 'Illustrative Starting Price',
                    'is_different' => $checkDifferent(fn ($t) => $t['price_minor']),
                    'render_type' => 'price',
                    'values' => array_map(fn ($t) => \Website\Support\WebsiteMoneyFormatter::format($t['price_minor']) . ' USD', $selectedTreks),
                ],
                [
                    'key' => 'coverage',
                    'label' => 'Package Exclusions',
                    'is_different' => false,
                    'render_type' => 'text',
                    'values' => array_map(fn ($t) => 'Ground package arrangements; international flights, travel insurance, and personal gear excluded', $selectedTreks),
                ],
            ],
        ];

        // Count differences across all rows
        $differencesCount = 0;
        $totalRowsCount = 0;
        foreach ($rowGroups as $groupRows) {
            foreach ($groupRows as $r) {
                $totalRowsCount++;
                if ($r['is_different']) {
                    $differencesCount++;
                }
            }
        }

        return [
            'selectedTreks' => $selectedTreks,
            'selectedIds' => $selectedIds,
            'unselectedTreks' => $unselectedTreks,
            'notices' => $notices,
            'rowGroups' => $rowGroups,
            'differencesCount' => $differencesCount,
            'totalRowsCount' => $totalRowsCount,
        ];
    }
}
