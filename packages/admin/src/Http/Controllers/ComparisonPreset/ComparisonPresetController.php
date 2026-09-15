<?php

namespace Admin\Http\Controllers\ComparisonPreset;

use Admin\Models\ComparisonPreset;
use Admin\Models\Journey;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class ComparisonPresetController extends Controller
{
    public function index(Request $request)
    {
        $presets = ComparisonPreset::query()
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get();

        $availableJourneys = Journey::query()
            ->where('is_active', true)
            ->where('is_published', true)
            ->select('id', 'name', 'slug')
            ->orderBy('name')
            ->get();

        return response()->json([
            'success' => true,
            'data' => $presets,
            'journeys' => $availableJourneys,
        ]);
    }

    public function show($id)
    {
        $preset = ComparisonPreset::findOrFail($id);

        return response()->json([
            'success' => true,
            'data' => $preset,
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255', 'unique:comparison_presets,slug'],
            'description' => ['nullable', 'string'],
            'trek_ids' => ['required', 'array', 'min:1', 'max:3'],
            'trek_ids.*' => ['required', 'string', 'max:120'],
            'sort_order' => ['nullable', 'integer'],
            'is_active' => ['nullable', 'boolean'],
        ]);

        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['name']);
        }

        $validated['sort_order'] = $validated['sort_order'] ?? 0;
        $validated['is_active'] = $validated['is_active'] ?? true;

        $preset = ComparisonPreset::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Comparison preset created successfully.',
            'data' => $preset,
        ], 201);
    }

    public function update(Request $request, $id)
    {
        $preset = ComparisonPreset::findOrFail($id);

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255', Rule::unique('comparison_presets', 'slug')->ignore($preset->id)],
            'description' => ['nullable', 'string'],
            'trek_ids' => ['required', 'array', 'min:1', 'max:3'],
            'trek_ids.*' => ['required', 'string', 'max:120'],
            'sort_order' => ['nullable', 'integer'],
            'is_active' => ['nullable', 'boolean'],
        ]);

        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['name']);
        }

        $preset->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Comparison preset updated successfully.',
            'data' => $preset,
        ]);
    }

    public function destroy($id)
    {
        $preset = ComparisonPreset::findOrFail($id);
        $name = $preset->name;
        $preset->delete();

        return response()->json([
            'success' => true,
            'message' => "Preset '{$name}' deleted successfully.",
        ]);
    }
}
