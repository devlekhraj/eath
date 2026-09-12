<?php

namespace Website\Services;

use Admin\Models\Article;
use Admin\Models\Destination;
use Admin\Models\Experience;
use Admin\Models\Faq;
use Admin\Models\Guide;
use Admin\Models\Journey;
use Admin\Models\JourneyDeparture;
use Admin\Models\TravelMonth;
use Admin\Models\TravelerStory;
use Admin\Models\WebsitePage;
use Website\Support\WebsiteAssetRegistry;
use Website\Support\WebsiteMoneyFormatter;

class WebsiteCatalogRepository
{
    public static function rawCatalog(): array
    {
        return [
            'regions' => self::getRegions(),
            'experiences' => self::getExperiences(),
            'months' => self::getMonths(),
            'treks' => self::getTreks(),
        ];
    }

    public static function rawContent(): array
    {
        return [
            'articles' => self::getArticles(),
            'guides' => self::getGuides(),
            'stories' => self::getStories(),
            'faqs' => self::getFaqs(),
        ];
    }

    public static function getRegions(): array
    {
        $treks = self::getTreks();

        return Destination::query()
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->orderBy('name')
            ->get()
            ->map(function (Destination $destination) use ($treks) {
                $regionTreks = array_values(array_filter($treks, fn ($trek) => (int) $trek['destination_db_id'] === (int) $destination->id));

                return [
                    'id' => $destination->slug,
                    'db_id' => $destination->id,
                    'slug' => $destination->slug,
                    'name' => $destination->name,
                    'intro' => $destination->summary,
                    'summary' => $destination->summary,
                    'description' => $destination->description,
                    'gateway' => $destination->gateway,
                    'trailheads' => $destination->trailheads,
                    'permits' => $destination->permits,
                    'pacing' => $destination->pacing_note,
                    'trek_count' => count($regionTreks),
                    'treks' => $regionTreks,
                    'image' => WebsiteAssetRegistry::resolve("region-{$destination->slug}", $destination->name),
                ];
            })
            ->values()
            ->all();
    }

    public static function findRegion(string $idOrSlug): ?array
    {
        return collect(self::getRegions())->first(fn ($region) => $region['id'] === $idOrSlug || $region['slug'] === $idOrSlug);
    }

    public static function getExperiences(): array
    {
        $treks = self::getTreks();

        return Experience::query()
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->orderBy('name')
            ->get()
            ->map(function (Experience $experience) use ($treks) {
                $experienceTreks = array_values(array_filter($treks, fn ($trek) => in_array($experience->slug, $trek['experience_ids'], true)));

                return [
                    'id' => $experience->slug,
                    'db_id' => $experience->id,
                    'slug' => $experience->slug,
                    'name' => $experience->name,
                    'intro' => $experience->summary,
                    'summary' => $experience->summary,
                    'description' => $experience->description,
                    'trek_count' => count($experienceTreks),
                    'treks' => $experienceTreks,
                    'image' => WebsiteAssetRegistry::resolve("experience-{$experience->slug}", $experience->name),
                ];
            })
            ->values()
            ->all();
    }

    public static function findExperience(string $idOrSlug): ?array
    {
        return collect(self::getExperiences())->first(fn ($experience) => $experience['id'] === $idOrSlug || $experience['slug'] === $idOrSlug);
    }

    public static function getAddons(): array
    {
        return [];
    }

    public static function getMonths(): array
    {
        $treks = self::getTreks();

        return TravelMonth::query()
            ->where('is_active', true)
            ->orderBy('month_number')
            ->get()
            ->map(function (TravelMonth $month) use ($treks) {
                $monthTreks = array_values(array_filter($treks, fn ($trek) => in_array((int) $month->month_number, $trek['suitable_months'], true)));

                return [
                    'id' => (int) $month->month_number,
                    'db_id' => $month->id,
                    'slug' => $month->slug,
                    'name' => $month->name,
                    'season_website' => $month->season,
                    'season' => ucfirst($month->season),
                    'intro' => $month->summary,
                    'summary' => $month->summary,
                    'description' => $month->description,
                    'trek_count' => count($monthTreks),
                    'treks' => $monthTreks,
                ];
            })
            ->values()
            ->all();
    }

    public static function findMonth(int|string $idOrSlug): ?array
    {
        return collect(self::getMonths())->first(fn ($month) => (string) $month['id'] === (string) $idOrSlug || strtolower($month['slug']) === strtolower((string) $idOrSlug));
    }

    public static function getTreks(): array
    {
        return Journey::query()
            ->with(['destination', 'experiences', 'travelMonths', 'itineraryDays', 'highlights', 'services', 'departures'])
            ->where('is_active', true)
            ->where('is_published', true)
            ->orderByRaw('featured_rank is null')
            ->orderBy('featured_rank')
            ->orderBy('sort_order')
            ->get()
            ->map(fn (Journey $journey) => self::journeyToArray($journey))
            ->values()
            ->all();
    }

    public static function findTrek(string $idOrSlug): ?array
    {
        $journey = Journey::query()
            ->with(['destination', 'experiences', 'travelMonths', 'itineraryDays', 'highlights', 'services', 'departures'])
            ->where(function ($query) use ($idOrSlug) {
                $query->where('slug', $idOrSlug);
                if (is_numeric($idOrSlug)) {
                    $query->orWhere('id', (int) $idOrSlug);
                }
            })
            ->first();

        return $journey ? self::journeyToArray($journey) : null;
    }

    public static function filterTreks(array $params = []): array
    {
        $treks = self::getTreks();

        if (!empty($params['q'])) {
            $q = mb_strtolower(trim(mb_substr($params['q'], 0, 120)));
            $treks = array_filter($treks, fn ($trek) => str_contains(mb_strtolower($trek['name']), $q)
                || str_contains(mb_strtolower($trek['summary']), $q)
                || str_contains(mb_strtolower($trek['region']['name'] ?? ''), $q)
                || str_contains(mb_strtolower(implode(' ', array_column($trek['experiences'], 'name'))), $q));
        }

        if (!empty($params['region'])) {
            $region = trim($params['region']);
            $treks = array_filter($treks, fn ($trek) => $trek['region_id'] === $region || ($trek['region']['slug'] ?? null) === $region);
        }

        if (!empty($params['experience'])) {
            $experience = trim($params['experience']);
            $treks = array_filter($treks, fn ($trek) => in_array($experience, $trek['experience_ids'], true));
        }

        if (!empty($params['month'])) {
            $month = (int) $params['month'];
            $treks = array_filter($treks, fn ($trek) => in_array($month, $trek['suitable_months'], true));
        }

        if (isset($params['days_min']) && is_numeric($params['days_min'])) {
            $treks = array_filter($treks, fn ($trek) => $trek['duration_days'] >= (int) $params['days_min']);
        }

        if (isset($params['days_max']) && is_numeric($params['days_max'])) {
            $treks = array_filter($treks, fn ($trek) => $trek['duration_days'] <= (int) $params['days_max']);
        }

        if (!empty($params['difficulty'])) {
            $difficulty = strtolower(trim($params['difficulty']));
            $treks = array_filter($treks, fn ($trek) => $trek['difficulty'] === $difficulty);
        }

        if (isset($params['budget_max']) && is_numeric($params['budget_max'])) {
            $budgetMinor = ((int) $params['budget_max']) * 100;
            $treks = array_filter($treks, fn ($trek) => $trek['price_minor'] <= $budgetMinor);
        }

        $treks = array_values($treks);
        $sort = $params['sort'] ?? 'recommended';
        usort($treks, function ($a, $b) use ($sort) {
            $result = match ($sort) {
                'duration_asc' => $a['duration_days'] <=> $b['duration_days'],
                'duration_desc' => $b['duration_days'] <=> $a['duration_days'],
                'price_asc' => $a['price_minor'] <=> $b['price_minor'],
                'price_desc' => $b['price_minor'] <=> $a['price_minor'],
                default => ($a['featured_rank'] ?? 999) <=> ($b['featured_rank'] ?? 999),
            };

            return $result !== 0 ? $result : strcmp($a['id'], $b['id']);
        });

        return $treks;
    }

    public static function getDepartures(array $filters = []): array
    {
        $query = JourneyDeparture::query()
            ->with('journey.destination')
            ->where('is_active', true)
            ->orderBy('start_date');

        if (!empty($filters['trek_id'])) {
            $value = $filters['trek_id'];
            $query->whereHas('journey', fn ($journey) => $journey->where('slug', $value)->orWhere('id', is_numeric($value) ? (int) $value : 0));
        }

        if (!empty($filters['region_id'])) {
            $value = $filters['region_id'];
            $query->whereHas('journey.destination', fn ($destination) => $destination->where('slug', $value)->orWhere('id', is_numeric($value) ? (int) $value : 0));
        }

        if (!empty($filters['month'])) {
            $query->whereMonth('start_date', (int) $filters['month']);
        }

        return $query->get()->map(fn (JourneyDeparture $departure) => self::departureToArray($departure))->values()->all();
    }

    public static function findDeparture(string $id): ?array
    {
        $departure = JourneyDeparture::query()->with('journey.destination')->where('code', $id)->first();

        return $departure ? self::departureToArray($departure) : null;
    }

    public static function getArticles(array $filters = []): array
    {
        $query = Article::query()->with(['category', 'sections', 'journeys'])->where('is_active', true)->where('is_published', true);

        if (!empty($filters['category'])) {
            $query->whereHas('category', fn ($category) => $category->where('slug', $filters['category']));
        }

        if (!empty($filters['q'])) {
            $q = trim($filters['q']);
            $query->where(fn ($builder) => $builder->where('title', 'like', "%{$q}%")->orWhere('summary', 'like', "%{$q}%"));
        }

        return $query->latest('published_at')->get()->map(fn (Article $article) => self::articleToArray($article))->values()->all();
    }

    public static function findArticle(string $idOrSlug): ?array
    {
        $article = Article::query()->with(['category', 'sections', 'journeys'])->where('slug', $idOrSlug)->first();

        return $article ? self::articleToArray($article) : null;
    }

    public static function getGuides(): array
    {
        return Guide::query()
            ->with('journeys')
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->get()
            ->map(fn (Guide $guide) => [
                'id' => (string) $guide->id,
                'slug' => $guide->slug,
                'name' => $guide->name,
                'role' => $guide->role,
                'disclosure' => 'Website guide profile stored in the database for layout and journey association.',
                'biography' => $guide->biography,
                'languages' => $guide->languages ?? [],
                'qualifications' => $guide->qualifications ?? [],
                'years_experience' => $guide->years_experience,
                'image' => WebsiteAssetRegistry::resolve("guide-{$guide->slug}", $guide->name, 400, 400),
                'treks' => $guide->journeys->map(fn (Journey $journey) => self::journeyToArray($journey))->values()->all(),
            ])
            ->values()
            ->all();
    }

    public static function findGuide(string $idOrSlug): ?array
    {
        return collect(self::getGuides())->first(fn ($guide) => (string) $guide['id'] === (string) $idOrSlug || $guide['slug'] === $idOrSlug);
    }

    public static function getStories(array $filters = []): array
    {
        $query = TravelerStory::query()->with(['journey.destination', 'destination'])->where('is_active', true)->where('is_published', true);

        if (!empty($filters['trek_id']) || !empty($filters['trek'])) {
            $value = $filters['trek_id'] ?? $filters['trek'];
            $query->whereHas('journey', fn ($journey) => $journey->where('slug', $value)->orWhere('id', is_numeric($value) ? (int) $value : 0));
        }

        if (!empty($filters['region_id']) || !empty($filters['region'])) {
            $value = $filters['region_id'] ?? $filters['region'];
            $query->whereHas('journey.destination', fn ($destination) => $destination->where('slug', $value)->orWhere('id', is_numeric($value) ? (int) $value : 0));
        }

        return $query->latest('published_at')->get()->map(fn (TravelerStory $story) => self::storyToArray($story))->values()->all();
    }

    public static function findStory(string $idOrSlug): ?array
    {
        $story = TravelerStory::query()->with(['journey.destination', 'destination'])->where('slug', $idOrSlug)->first();

        return $story ? self::storyToArray($story) : null;
    }

    public static function getFaqs(?string $category = null, ?array $trekContext = null): array
    {
        $query = Faq::query()->where('is_active', true)->orderBy('sort_order');

        if ($category) {
            $query->where('category', $category);
        }

        if (!empty($trekContext['db_id'])) {
            $query->where(fn ($builder) => $builder->whereNull('journey_id')->orWhere('journey_id', $trekContext['db_id']));
        }

        return $query->get()->map(fn (Faq $faq) => [
            'id' => (string) $faq->id,
            'category' => $faq->category,
            'question' => $faq->question,
            'answer' => str_replace('{duration_days}', (string) ($trekContext['duration_days'] ?? ''), $faq->answer),
            'trek_specific' => (bool) $faq->journey_id,
        ])->values()->all();
    }

    public static function getPolicy(string $slug): ?array
    {
        $page = WebsitePage::query()->with('sections')->where('slug', $slug)->where('is_active', true)->first();
        if (!$page) {
            return null;
        }

        return [
            'title' => $page->title,
            'intro' => $page->summary,
            'sections' => $page->sections->map(fn ($section) => [
                'heading' => $section->heading,
                'body' => $section->body,
            ])->values()->all(),
        ];
    }

    public static function getTrekWhitelist(): array
    {
        $whitelist = [];
        foreach (self::getTreks() as $trek) {
            $whitelist[$trek['id']] = [
                'id' => $trek['id'],
                'name' => $trek['name'],
                'slug' => $trek['slug'],
                'duration' => "{$trek['duration_days']} Days",
                'difficulty' => $trek['difficulty'],
                'max_altitude_m' => $trek['max_altitude_m'],
                'price' => WebsiteMoneyFormatter::format($trek['price_minor']),
                'url' => route('website.treks.show', $trek['slug']),
            ];
        }

        return $whitelist;
    }

    public static function compareTreks(array $trekIds): array
    {
        $allTreks = collect(self::getTreks())->keyBy('id');
        $notices = [];
        $selectedIds = [];

        foreach ($trekIds as $id) {
            $id = trim((string) $id);
            if ($id === '' || in_array($id, $selectedIds, true)) {
                continue;
            }
            if ($allTreks->has($id)) {
                $selectedIds[] = $id;
            } else {
                $notices[] = 'One or more unrecognized trek IDs were ignored.';
            }
        }

        if (count($selectedIds) > 3) {
            $notices[] = 'Comparison is limited to a maximum of 3 journeys. The first 3 selections are shown below.';
            $selectedIds = array_slice($selectedIds, 0, 3);
        }

        $selectedTreks = array_map(fn ($id) => $allTreks[$id], $selectedIds);
        $unselectedTreks = $allTreks->except($selectedIds)->values()->all();

        return [
            'selected_ids' => $selectedIds,
            'selectedIds' => $selectedIds,
            'selected_treks' => $selectedTreks,
            'selectedTreks' => $selectedTreks,
            'unselectedTreks' => $unselectedTreks,
            'treks' => $selectedTreks,
            'notices' => array_values(array_unique($notices)),
            'has_selection' => !empty($selectedTreks),
        ];
    }

    protected static function journeyToArray(Journey $journey): array
    {
        $region = $journey->destination ? [
            'id' => $journey->destination->slug,
            'db_id' => $journey->destination->id,
            'slug' => $journey->destination->slug,
            'name' => $journey->destination->name,
            'intro' => $journey->destination->summary,
        ] : null;

        $experiences = $journey->experiences->map(fn (Experience $experience) => [
            'id' => $experience->slug,
            'db_id' => $experience->id,
            'slug' => $experience->slug,
            'name' => $experience->name,
            'intro' => $experience->summary,
        ])->values()->all();

        $itinerary = $journey->itineraryDays->map(fn ($day) => [
            'day' => $day->day_number,
            'title' => $day->title,
            'description' => $day->description,
            'route' => $day->route,
            'altitude_m' => $day->altitude_m,
            'altitude_label' => $day->altitude_label,
            'walking_hours' => $day->walking_hours,
            'walking_hours_label' => $day->walking_hours_label,
            'is_acclimatization' => $day->is_acclimatization,
            'location_label' => $day->location_label,
            'accommodation_label' => $day->accommodation_label,
            'meal_note' => $day->meal_note,
        ])->values()->all();

        $services = $journey->services->where('is_active', true);

        return [
            'id' => $journey->slug,
            'db_id' => $journey->id,
            'slug' => $journey->slug,
            'name' => $journey->name,
            'summary' => $journey->summary,
            'description' => $journey->description,
            'overview_secondary' => $journey->overview_secondary,
            'region_id' => $journey->destination?->slug,
            'destination_db_id' => $journey->destination_id,
            'region' => $region,
            'guide_id' => (string) ($journey->guide_id ?? ''),
            'duration_days' => $journey->duration_days,
            'duration_nights' => $journey->duration_nights,
            'difficulty' => $journey->difficulty,
            'max_altitude_m' => $journey->max_altitude_m,
            'walking_hours_max' => $journey->walking_hours_max,
            'suitable_months' => $journey->travelMonths->pluck('month_number')->map(fn ($value) => (int) $value)->values()->all(),
            'price_minor' => $journey->price_minor,
            'price_usd' => (int) round($journey->price_minor / 100),
            'currency' => $journey->currency,
            'pricing_basis' => $journey->pricing_basis,
            'experience_ids' => array_column($experiences, 'slug'),
            'experiences' => $experiences,
            'accommodation' => $journey->accommodation_style,
            'pace' => $journey->pace,
            'featured_rank' => $journey->featured_rank,
            'highlights' => $journey->highlights->where('is_active', true)->pluck('title')->values()->all(),
            'itinerary' => $itinerary,
            'inclusions' => $services->where('type', 'inclusion')->pluck('title')->values()->all(),
            'exclusions' => $services->where('type', 'exclusion')->pluck('title')->values()->all(),
            'accommodation_note' => $journey->accommodation_note,
            'logistics_safety_note' => trim(($journey->logistics_note ?? '') . ' ' . ($journey->safety_note ?? '')),
            'route_map_note' => $journey->route_map_note,
            'related_trek_ids' => self::relatedJourneySlugs($journey),
            'image' => WebsiteAssetRegistry::resolve("trek-{$journey->slug}", $journey->name),
            'gallery' => [],
            'meta_title' => $journey->meta_title,
            'meta_description' => $journey->meta_description,
        ];
    }

    protected static function relatedJourneySlugs(Journey $journey): array
    {
        return Journey::query()
            ->where('id', '!=', $journey->id)
            ->where('is_active', true)
            ->where('is_published', true)
            ->orderByRaw('destination_id = ? desc', [$journey->destination_id])
            ->orderByRaw('abs(cast(duration_days as signed) - ?)', [(int) $journey->duration_days])
            ->limit(3)
            ->pluck('slug')
            ->all();
    }

    protected static function departureToArray(JourneyDeparture $departure): array
    {
        return [
            'id' => $departure->code ?? (string) $departure->id,
            'db_id' => $departure->id,
            'trek_id' => $departure->journey?->slug,
            'trek_name' => $departure->journey?->name,
            'trek_slug' => $departure->journey?->slug,
            'region_id' => $departure->journey?->destination?->slug,
            'start_date' => optional($departure->start_date)->toDateString(),
            'end_date' => optional($departure->end_date)->toDateString(),
            'duration_days' => $departure->journey?->duration_days,
            'status' => $departure->status,
            'sample_seats' => $departure->available_seats,
            'price_minor' => $departure->price_minor ?? $departure->journey?->price_minor,
            'price_usd' => (int) round(($departure->price_minor ?? $departure->journey?->price_minor ?? 0) / 100),
            'is_bookable' => in_array($departure->status, ['open', 'limited'], true) && (int) $departure->available_seats > 0,
        ];
    }

    protected static function articleToArray(Article $article): array
    {
        return [
            'id' => (string) $article->id,
            'slug' => $article->slug,
            'title' => $article->title,
            'category' => $article->category?->slug,
            'summary' => $article->summary,
            'author_label' => $article->author_name,
            'updated_date' => optional($article->updated_on)->toDateString(),
            'trek_ids' => $article->journeys->pluck('slug')->values()->all(),
            'sections' => $article->sections->map(fn ($section) => [
                'heading' => $section->heading,
                'body' => $section->body,
            ])->values()->all(),
            'image' => WebsiteAssetRegistry::resolve("article-{$article->slug}", $article->title),
        ];
    }

    protected static function storyToArray(TravelerStory $story): array
    {
        $journey = $story->journey ? self::journeyToArray($story->journey) : null;
        $region = $journey['region'] ?? null;

        return [
            'id' => (string) $story->id,
            'slug' => $story->slug,
            'title' => $story->title,
            'summary' => $story->summary,
            'body' => $story->body,
            'traveler_name' => $story->traveler_name,
            'traveler_country' => $story->traveler_country,
            'traveled_on' => optional($story->traveled_on)->toDateString(),
            'trek_id' => $journey['id'] ?? null,
            'trek' => $journey,
            'region_id' => $region['id'] ?? null,
            'region' => $region,
            'disclosure' => 'Fictional website story — not a customer testimonial.',
            'image' => WebsiteAssetRegistry::resolve("story-{$story->slug}", $story->title),
        ];
    }
}
