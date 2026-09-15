<?php

namespace Website\Http\Controllers;

use Admin\Models\ComparisonPreset;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Website\Services\WebsiteCatalogRepository;
use Website\Services\WebsiteComparisonService;

class ComparisonController extends Controller
{
    public function __construct(protected WebsiteComparisonService $comparisonService)
    {
    }

    public function index(Request $request)
    {
        $from = $request->query('from');

        if ($request->query('clear') === '1') {
            $this->comparisonService->clear($request);
        } elseif ($request->filled('preset')) {
            $preset = ComparisonPreset::query()
                ->where('slug', $request->query('preset'))
                ->where('is_active', true)
                ->first();
            if ($preset && !empty($preset->trek_ids)) {
                $this->comparisonService->set($request, $preset->trek_ids);
            }
        } elseif ($request->filled('treks')) {
            $trekIds = is_array($request->query('treks'))
                ? $request->query('treks')
                : explode(',', (string) $request->query('treks'));
            if (!empty($trekIds)) {
                $this->comparisonService->set($request, $trekIds);
            }
        }

        $presets = ComparisonPreset::query()
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get();

        $compareData = WebsiteCatalogRepository::compareTreks($this->comparisonService->selectedIds($request));

        return view('website_preview.pages.compare', array_merge($compareData, [
            'from' => $from,
            'presets' => $presets,
            'breadcrumbs' => [
                ['label' => 'Home', 'url' => route('website.home')],
                ['label' => 'Compare Treks'],
            ],
        ]));
    }

    public function state(Request $request)
    {
        return response()->json($this->comparisonService->state($request));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'trek_id' => ['required', 'string', 'max:120'],
            'request_timezone' => ['nullable', 'string', 'max:100'],
            'latitude' => ['nullable', 'numeric', 'between:-90,90'],
            'longitude' => ['nullable', 'numeric', 'between:-180,180'],
        ]);

        return response()->json($this->comparisonService->add($request, $data['trek_id']));
    }

    public function replace(Request $request)
    {
        $data = $request->validate([
            'old_trek_id' => ['required', 'string', 'max:120'],
            'new_trek_id' => ['required', 'string', 'max:120'],
            'request_timezone' => ['nullable', 'string', 'max:100'],
            'latitude' => ['nullable', 'numeric', 'between:-90,90'],
            'longitude' => ['nullable', 'numeric', 'between:-180,180'],
        ]);

        return response()->json($this->comparisonService->replace($request, $data['old_trek_id'], $data['new_trek_id']));
    }

    public function set(Request $request)
    {
        $data = $request->validate([
            'treks' => ['nullable', 'array', 'max:3'],
            'treks.*' => ['string', 'max:120'],
            'preset' => ['nullable', 'string', 'max:120'],
            'request_timezone' => ['nullable', 'string', 'max:100'],
            'latitude' => ['nullable', 'numeric', 'between:-90,90'],
            'longitude' => ['nullable', 'numeric', 'between:-180,180'],
        ]);

        if (!empty($data['preset'])) {
            $preset = ComparisonPreset::query()
                ->where('slug', $data['preset'])
                ->where('is_active', true)
                ->first();
            if ($preset && !empty($preset->trek_ids)) {
                return response()->json($this->comparisonService->set($request, $preset->trek_ids));
            }
        }

        return response()->json($this->comparisonService->set($request, $data['treks'] ?? []));
    }

    public function destroy(Request $request, string $trekId)
    {
        return response()->json($this->comparisonService->remove($request, $trekId));
    }

    public function clear(Request $request)
    {
        return response()->json($this->comparisonService->clear($request));
    }
}
