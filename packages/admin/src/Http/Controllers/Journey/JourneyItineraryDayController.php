<?php

namespace Admin\Http\Controllers\Journey;

use App\Http\Controllers\Controller;
use Admin\Models\Journey;
use Admin\Models\JourneyItineraryDay;
use Admin\Models\JourneyItineraryHighlight;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class JourneyItineraryDayController extends Controller
{
    public function store(Request $request, $journeyId)
    {
        $validated = $request->validate([
            'id' => ['nullable', 'exists:journey_itinerary_days,id'],
            'day_number' => ['nullable', 'integer', 'min:1', 'max:365'],
            'title' => ['required', 'string', 'max:255'],
            'route' => ['nullable', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'location_label' => ['nullable', 'string', 'max:255'],
            'altitude_m' => ['nullable', 'integer', 'min:0', 'max:9000'],
            'altitude_label' => ['nullable', 'string', 'max:255'],
            'walking_hours' => ['nullable', 'numeric', 'min:0', 'max:24'],
            'walking_hours_label' => ['nullable', 'string', 'max:255'],
            'accommodation_label' => ['nullable', 'string', 'max:255'],
            'meal_note' => ['nullable', 'string', 'max:255'],
            'is_acclimatization' => ['nullable', 'boolean'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
        ]);

        $journey = Journey::findOrFail($journeyId);
        $validated['journey_id'] = $journey->id;
        $validated['day_number'] = $validated['day_number']
            ?? (JourneyItineraryDay::query()->where('journey_id', $journey->id)->max('day_number') + 1);
        $validated['sort_order'] = $validated['sort_order'] ?? $validated['day_number'];
        $validated['is_acclimatization'] = $validated['is_acclimatization'] ?? false;

        $itinerary = JourneyItineraryDay::query()->updateOrCreate(
            ['id' => $validated['id'] ?? null],
            Arr::except($validated, ['id'])
        );

        return response()->json([
            'success' => true,
            'data' => $itinerary,
            'message' => 'Itinerary day ' . (isset($validated['id']) ? 'updated' : 'created') . ' successfully.',
        ]);
    }

    public function destroy($id)
    {
        $itinerary = JourneyItineraryDay::findOrFail($id);
        $itinerary->delete();

        return response()->json([
            'success' => true,
            'message' => 'Itinerary day deleted successfully.',
        ]);
    }

    public function storeHighlight(Request $request, $itineraryDayId)
    {
        $validated = $request->validate([
            'id' => ['nullable', 'exists:journey_itinerary_highlights,id'],
            'journey_itinerary_day_id' => ['nullable', 'exists:journey_itinerary_days,id'],
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
        ]);

        $validated['journey_itinerary_day_id'] = $validated['journey_itinerary_day_id'] ?? $itineraryDayId;
        $validated['sort_order'] = $validated['sort_order'] ?? 0;
        $highlight = JourneyItineraryHighlight::query()->updateOrCreate(
            ['id' => $validated['id'] ?? null],
            Arr::except($validated, ['id'])
        );

        return response()->json([
            'success' => true,
            'data' => $highlight,
            'message' => ($validated['id'] ?? null) ? 'Itinerary highlight updated successfully.' : 'Itinerary highlight created successfully.',
        ]);
    }

    public function destroyHighlight($id)
    {
        $highlight = JourneyItineraryHighlight::findOrFail($id);
        $highlight->delete();

        return response()->json([
            'success' => true,
            'message' => $highlight->title . ' deleted successfully.',
        ]);
    }
}
