<?php

namespace Website\Http\Controllers;

use App\Http\Controllers\Controller;
use Admin\Models\Inquiry;
use Admin\Models\Journey;
use Admin\Models\JourneyDeparture;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Website\Services\WebsiteCatalogRepository;

class DepartureController extends Controller
{
    public function index(Request $request)
    {
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
    }

    public function modal(Request $request, string $departure_id)
    {
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
    }

    public function wizard(string $departure_id)
    {
        $departure = WebsiteCatalogRepository::findDeparture($departure_id);
        abort_if(!$departure, 404, 'Departure not found');

        return view('website_preview.components.departure-wizard-modal', [
            'departure' => $departure,
        ]);
    }

    public function inquire(Request $request)
    {
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
            throw ValidationException::withMessages([
                'travelers' => 'This departure does not have enough available spaces. Please choose another date or reduce your group size.',
            ]);
        }

        // Real Database Persistence: Store in inquiries table
        try {
            $journeyModel = null;
            $departureModel = null;

            if (!empty($departure['db_id'])) {
                $departureModel = JourneyDeparture::find($departure['db_id']);
                $journeyModel = $departureModel?->journey;
            } elseif (!empty($departure['trek_id'])) {
                $trek = WebsiteCatalogRepository::findTrek($departure['trek_id']);
                if (!empty($trek['db_id'])) {
                    $journeyModel = Journey::find($trek['db_id']);
                }
            }

            Inquiry::create([
                'reference_code' => 'INQ-' . strtoupper(bin2hex(random_bytes(4))),
                'inquiry_type' => Inquiry::TYPE_DEPARTURE,
                'journey_id' => $journeyModel?->id,
                'departure_id' => $departureModel?->id,
                'name' => $data['name'],
                'email' => $data['email'],
                'phone' => trim(($data['dial_code'] ?? '') . ' ' . ($data['phone'] ?? '')),
                'country' => $data['country'] ?? null,
                'subject' => 'Departure Inquiry: ' . ($departure['trek_name'] ?? 'Trek') . ' (' . ($departure['start_date'] ?? '') . ')',
                'message' => ($data['notes'] ?? 'Departure booking inquiry') . "\nTravelers: " . $data['travelers'] . "\nExperience: " . ($data['experience'] ?? 'N/A') . "\nReadiness: " . ($data['readiness'] ?? 'N/A'),
                'status' => Inquiry::STATUS_NEW,
                'ip_address' => $request->ip(),
                'user_agent' => $request->userAgent(),
            ]);
        } catch (\Throwable $e) {
            report($e);
        }

        return response()->json(['website' => true]);
    }
}
