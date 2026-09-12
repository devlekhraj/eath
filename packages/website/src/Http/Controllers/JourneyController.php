<?php

namespace Website\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Website\Services\WebsiteCatalogRepository;

class JourneyController extends Controller
{
    public function index(Request $request)
    {
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
        $featuredByExperience = [
            'iconic-routes' => 't-ebc',
            'quiet-trails' => 't-langtang',
            'cultural-trails' => 't-mustang',
            'short-treks' => 't-mardi',
            'photography' => 't-gokyo',
        ];
        $featuredJourney = null;
        if ($experience && isset($featuredByExperience[$experience])) {
            $candidate = WebsiteCatalogRepository::findTrek($featuredByExperience[$experience]);
            if ($candidate && collect($filteredTreks)->contains('id', $candidate['id'])) {
                $featuredJourney = $candidate;
            }
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
    }

    public function itineraryModal(string $slug)
    {
        $trek = WebsiteCatalogRepository::findTrek($slug);
        abort_unless($trek, 404, 'Trek itinerary not found');

        return view('website_preview.modals.trek-itinerary', [
            'trek' => $trek,
        ]);
    }

    public function show(string $slug)
    {
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
    }
}
