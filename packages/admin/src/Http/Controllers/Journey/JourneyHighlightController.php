<?php

namespace Admin\Http\Controllers\Journey;

use App\Http\Controllers\Controller;
use Admin\Models\Journey;
use Admin\Models\JourneyHighlight;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class JourneyHighlightController extends Controller
{
    public function store(Request $request, $journeyId)
    {
        $validated = $request->validate([
            'id' => ['nullable', 'exists:journey_highlights,id'],
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'icon' => ['nullable', 'string', 'max:255'],
            'sort_order' => ['nullable', 'integer'],
            'is_active' => ['nullable', 'boolean'],
        ]);

        $journey = Journey::findOrFail($journeyId);
        $validated['journey_id'] = $journey->id;
        $validated['sort_order'] = $validated['sort_order'] ?? 0;
        $validated['is_active'] = $validated['is_active'] ?? true;

        $highlight = JourneyHighlight::query()->updateOrCreate(
            ['id' => $validated['id'] ?? null],
            Arr::except($validated, ['id'])
        );

        return response()->json([
            'success' => true,
            'data' => $highlight,
            'message' => ($validated['id'] ?? null) ? 'Journey highlight updated successfully.' : 'Journey highlight created successfully.',
        ]);
    }

    public function destroy($id)
    {
        $highlight = JourneyHighlight::findOrFail($id);
        $highlight->delete();

        return response()->json([
            'success' => true,
            'message' => $highlight->title . ' deleted successfully.',
        ]);
    }
}
