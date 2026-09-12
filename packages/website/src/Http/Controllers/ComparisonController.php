<?php

namespace Website\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Website\Services\WebsiteCatalogRepository;

class ComparisonController extends Controller
{
    public function index(Request $request)
    {
        $rawTreks = (array) $request->query('treks', []);
        $from = $request->query('from');

        $compareData = WebsiteCatalogRepository::compareTreks($rawTreks);

        return view('website_preview.pages.compare', array_merge($compareData, [
            'from' => $from,
            'breadcrumbs' => [
                ['label' => 'Home', 'url' => route('website.home')],
                ['label' => 'Compare Treks'],
            ],
        ]));
    }
}
