<?php

namespace Admin\Http\Controllers\Journey;

use App\Http\Controllers\Controller;
use Admin\Models\Journey;
use Admin\Models\JourneyService;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Validation\Rule;

class JourneyServiceController extends Controller
{
    public function store(Request $request, $journeyId)
    {
        $validated = $request->validate([
            'id' => ['nullable', 'exists:journey_services,id'],
            'type' => ['nullable', Rule::in(JourneyService::TYPES)],
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
            'is_excluded' => ['nullable', 'boolean'],
            'is_active' => ['nullable', 'boolean'],
        ]);

        $journey = Journey::findOrFail($journeyId);
        $validated['journey_id'] = $journey->id;
        $validated['type'] = $validated['type']
            ?? (!empty($validated['is_excluded']) ? JourneyService::TYPE_EXCLUSION : JourneyService::TYPE_INCLUSION);
        $validated['sort_order'] = $validated['sort_order'] ?? 0;
        $validated['is_active'] = $validated['is_active'] ?? true;

        $service = JourneyService::query()->updateOrCreate(
            ['id' => $validated['id'] ?? null],
            Arr::only($validated, (new JourneyService())->getFillable())
        );

        return response()->json([
            'success' => true,
            'data' => $this->serializeService($service),
            'message' => 'Service ' . (isset($validated['id']) ? 'updated' : 'created') . ' successfully.',
        ]);
    }

    public function destroy($id)
    {
        $item = JourneyService::findOrFail($id);
        $item->delete();

        return response()->json([
            'success' => true,
            'message' => $item->title . ' deleted successfully.',
        ]);
    }

    private function serializeService(JourneyService $service): array
    {
        return [
            'id' => $service->id,
            'journey_id' => $service->journey_id,
            'title' => $service->title,
            'description' => $service->description,
            'type' => $service->type,
            'is_excluded' => $service->type === JourneyService::TYPE_EXCLUSION,
            'sort_order' => $service->sort_order,
            'is_active' => $service->is_active,
        ];
    }
}
