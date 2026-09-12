<?php

namespace Website\Http\Controllers;

use App\Http\Controllers\Controller;
use Website\Services\WebsiteCatalogRepository;
use Website\Support\WebsiteClock;

class HomeController extends Controller
{
    public function index()
    {
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
    }

    public function styleGuide()
    {
        return view('website_preview.pages.style-guide');
    }
}
