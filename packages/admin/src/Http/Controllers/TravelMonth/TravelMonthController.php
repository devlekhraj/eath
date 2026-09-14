<?php

namespace Admin\Http\Controllers\TravelMonth;

use App\Http\Controllers\Controller;
use Admin\Models\TravelMonth;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class TravelMonthController extends Controller
{
    public function index(Request $request)
    {
        $query = TravelMonth::query()
            ->withCount('journeys')
            ->orderBy('month_number', 'asc');

        if ($request->boolean('active_only')) {
            $query->where('is_active', true);
        }

        $months = $query->get();

        return response()->json([
            'success' => true,
            'data' => $months,
        ]);
    }

    public function show($id)
    {
        $month = TravelMonth::withCount('journeys')
            ->with(['faqs', 'heroAttachment.mediaAsset'])
            ->findOrFail($id);

        return response()->json([
            'success' => true,
            'data' => $month,
        ]);
    }

    public function update(Request $request, $id)
    {
        $month = TravelMonth::findOrFail($id);

        $validated = $request->validate([
            'season' => ['sometimes', 'required', Rule::in(TravelMonth::SEASONS)],
            'summary' => ['nullable', 'string'],
            'description' => ['nullable', 'string'],
            'conditions_note' => ['nullable', 'string'],
            'content' => ['nullable', 'array'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
            'is_active' => ['nullable', 'boolean'],
        ]);

        $month->update($validated);

        return response()->json([
            'success' => true,
            'message' => "Travel month '{$month->name}' updated successfully.",
            'data' => $month->fresh(),
        ]);
    }

    public function toggleActive($id, Request $request)
    {
        $month = TravelMonth::findOrFail($id);
        $month->is_active = $request->boolean('is_active');
        $month->save();

        $statusText = $month->is_active ? 'activated' : 'deactivated';

        return response()->json([
            'success' => true,
            'message' => "Travel month '{$month->name}' has been {$statusText}.",
            'is_active' => $month->is_active,
        ]);
    }
}
