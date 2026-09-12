<?php

namespace Admin\Http\Controllers\Journey;

use App\Http\Controllers\Controller;
use Admin\Models\Journey;
use Admin\Models\JourneyPrice;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class JourneyPriceController extends Controller
{
    public function store(Request $request, $journeyId)
    {
        $validated = $request->validate([
            'id' => ['nullable', 'exists:journey_prices,id'],
            'name' => ['nullable', 'string', 'max:255'],
            'title' => ['nullable', 'string', 'max:255'],
            'price' => ['nullable', 'numeric', 'min:0'],
            'price_minor' => ['nullable', 'integer', 'min:0'],
            'currency' => ['nullable', 'string', 'size:3'],
            'pricing_basis' => ['nullable', Rule::in(JourneyPrice::PRICING_BASES)],
            'description' => ['nullable', 'string'],
            'min_travelers' => ['nullable', 'integer', 'min:1'],
            'max_travelers' => ['nullable', 'integer', 'min:1'],
            'starts_on' => ['nullable', 'date'],
            'ends_on' => ['nullable', 'date', 'after_or_equal:starts_on'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
            'is_primary' => ['nullable', 'boolean'],
            'is_default' => ['nullable', 'boolean'],
            'is_active' => ['nullable', 'boolean'],
        ]);

        $journey = Journey::findOrFail($journeyId);
        $validated['journey_id'] = $journey->id;
        $validated['name'] = $validated['name'] ?? $validated['title'] ?? null;
        $validated['price_minor'] = $validated['price_minor'] ?? (isset($validated['price']) ? (int) round(((float) $validated['price']) * 100) : null);

        validator($validated, [
            'name' => ['required', 'string', 'max:255'],
            'price_minor' => ['required', 'integer', 'min:0'],
        ])->validate();

        $validated['currency'] = strtoupper($validated['currency'] ?? JourneyPrice::DEFAULT_CURRENCY);
        $validated['pricing_basis'] = $validated['pricing_basis'] ?? JourneyPrice::PRICING_BASIS_PER_PERSON;
        $validated['sort_order'] = $validated['sort_order'] ?? 0;
        $validated['is_primary'] = $validated['is_primary'] ?? $validated['is_default'] ?? false;
        $validated['is_active'] = $validated['is_active'] ?? true;

        if (!empty($validated['is_primary'])) {
            JourneyPrice::query()
                ->where('journey_id', $journey->id)
                ->when(!empty($validated['id']), fn ($query) => $query->whereKeyNot($validated['id']))
                ->update(['is_primary' => false]);
        }

        $price = JourneyPrice::query()->updateOrCreate(
            ['id' => $validated['id'] ?? null],
            [
                'journey_id' => $journey->id,
                'name' => $validated['name'],
                'price_minor' => $validated['price_minor'],
                'currency' => $validated['currency'],
                'pricing_basis' => $validated['pricing_basis'],
                'description' => $validated['description'] ?? null,
                'min_travelers' => $validated['min_travelers'] ?? null,
                'max_travelers' => $validated['max_travelers'] ?? null,
                'starts_on' => $validated['starts_on'] ?? null,
                'ends_on' => $validated['ends_on'] ?? null,
                'sort_order' => $validated['sort_order'],
                'is_primary' => $validated['is_primary'],
                'is_active' => $validated['is_active'],
            ]
        );

        return response()->json([
            'success' => true,
            'data' => [
                'id' => $price->id,
                'journey_id' => $price->journey_id,
                'name' => $price->name,
                'title' => $price->name,
                'price_minor' => $price->price_minor,
                'price' => round($price->price_minor / 100, 2),
                'currency' => $price->currency,
                'pricing_basis' => $price->pricing_basis,
                'description' => $price->description,
                'min_travelers' => $price->min_travelers,
                'max_travelers' => $price->max_travelers,
                'starts_on' => $price->starts_on?->toDateString(),
                'ends_on' => $price->ends_on?->toDateString(),
                'sort_order' => $price->sort_order,
                'is_primary' => $price->is_primary,
                'is_default' => $price->is_primary,
                'is_active' => $price->is_active,
            ],
            'message' => 'Price tier ' . (isset($validated['id']) ? 'updated' : 'created') . ' successfully.',
        ]);
    }

    public function destroy($id)
    {
        $price = JourneyPrice::findOrFail($id);
        $price->delete();

        return response()->json([
            'success' => true,
            'message' => 'Price tier deleted successfully.',
        ]);
    }
}
