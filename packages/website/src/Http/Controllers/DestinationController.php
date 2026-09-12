<?php

namespace Website\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Website\Services\WebsiteCatalogRepository;

class DestinationController extends Controller
{
    public function index()
    {
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
    }

    public function show(string $slug, Request $request)
    {
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
    }
}
