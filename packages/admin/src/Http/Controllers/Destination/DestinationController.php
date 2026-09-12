<?php

namespace Admin\Http\Controllers\Destination;

use App\Http\Controllers\Controller;
use App\Http\Resources\DestinationListResource;
use App\Http\Resources\DestinationResource;
use Admin\Models\Destination;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class DestinationController extends Controller
{
    public function index(Request $request)
    {
        return $this->getDestinations($request);
    }

    public function getDestinations(Request $request)
    {
        $query = Destination::query()
            ->withCount('journeys')
            ->orderBy('sort_order', 'asc')
            ->orderBy('name', 'asc');

        if ($request->filled('search')) {
            $search = trim($request->input('search'));
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('slug', 'like', "%{$search}%")
                  ->orWhere('region_label', 'like', "%{$search}%")
                  ->orWhere('summary', 'like', "%{$search}%");
            });
        }

        if ($request->boolean('active_only')) {
            $query->where('is_active', true);
        }

        $destinations = $query->get();

        return response()->json([
            'success' => true,
            'data' => DestinationListResource::collection($destinations),
        ]);
    }

    public function show($id)
    {
        $destination = Destination::query()
            ->withCount('journeys')
            ->with(['journeys' => function ($q) {
                $q->select(['id', 'destination_id', 'name', 'slug', 'duration_days', 'price_minor', 'is_active'])
                  ->orderBy('sort_order')
                  ->orderBy('name');
            }])
            ->findOrFail($id);

        return response()->json([
            'success' => true,
            'data' => new DestinationResource($destination),
        ]);
    }

    public function saveDestination(Request $request)
    {
        $id = $request->input('id');

        $validated = $request->validate([
            'id' => ['nullable', 'integer', 'exists:destinations,id'],
            'name' => ['required', 'string', 'max:255', Rule::unique('destinations', 'name')->ignore($id)],
            'slug' => ['nullable', 'string', 'max:255', Rule::unique('destinations', 'slug')->ignore($id)],
            'summary' => ['nullable', 'string'],
            'description' => ['nullable', 'string'],
            'region_label' => ['nullable', 'string', 'max:255'],
            'gateway' => ['nullable', 'string', 'max:255'],
            'trailheads' => ['nullable', 'string'],
            'permits' => ['nullable', 'string'],
            'pacing_note' => ['nullable', 'string'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
            'is_featured' => ['nullable', 'boolean'],
            'is_active' => ['nullable', 'boolean'],
            'meta_title' => ['nullable', 'string', 'max:255'],
            'meta_description' => ['nullable', 'string', 'max:300'],
            'hero_image_id' => ['nullable', 'integer', 'exists:media_assets,id'],
            'card_image_id' => ['nullable', 'integer', 'exists:media_assets,id'],
        ]);

        $validated['slug'] = $validated['slug'] ?? Str::slug($validated['name']);
        $validated['sort_order'] = $validated['sort_order'] ?? 0;
        $validated['is_featured'] = $request->boolean('is_featured');
        $validated['is_active'] = $request->has('is_active') ? $request->boolean('is_active') : true;

        $destination = Destination::updateOrCreate(
            ['id' => $id],
            $validated
        );

        return response()->json([
            'success' => true,
            'data' => new DestinationResource($destination->fresh()->loadCount('journeys')),
            'message' => $id ? 'Destination updated successfully.' : 'Destination created successfully.',
        ], $id ? 200 : 201);
    }

    public function updateDestination(Request $request, $id)
    {
        $destination = Destination::findOrFail($id);

        $validated = $request->validate([
            'name' => ['sometimes', 'required', 'string', 'max:255', Rule::unique('destinations', 'name')->ignore($id)],
            'slug' => ['nullable', 'string', 'max:255', Rule::unique('destinations', 'slug')->ignore($id)],
            'summary' => ['nullable', 'string'],
            'description' => ['nullable', 'string'],
            'region_label' => ['nullable', 'string', 'max:255'],
            'gateway' => ['nullable', 'string', 'max:255'],
            'trailheads' => ['nullable', 'string'],
            'permits' => ['nullable', 'string'],
            'pacing_note' => ['nullable', 'string'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
            'is_featured' => ['nullable', 'boolean'],
            'is_active' => ['nullable', 'boolean'],
            'meta_title' => ['nullable', 'string', 'max:255'],
            'meta_description' => ['nullable', 'string', 'max:300'],
            'hero_image_id' => ['nullable', 'integer', 'exists:media_assets,id'],
            'card_image_id' => ['nullable', 'integer', 'exists:media_assets,id'],
        ]);

        if (array_key_exists('name', $validated) && !array_key_exists('slug', $validated)) {
            $validated['slug'] = Str::slug($validated['name']);
        }

        $destination->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Destination updated successfully.',
            'data' => new DestinationResource($destination->fresh()->loadCount('journeys')),
        ]);
    }

    public function toggleActive($id, Request $request)
    {
        $destination = Destination::findOrFail($id);
        $destination->is_active = $request->boolean('is_active');
        $destination->save();

        $statusText = $destination->is_active ? 'activated' : 'deactivated';

        return response()->json([
            'success' => true,
            'message' => "Destination '{$destination->name}' has been {$statusText}.",
            'name' => $destination->name,
            'is_active' => $destination->is_active,
        ]);
    }

    public function delete($id, Request $request)
    {
        $destination = Destination::findOrFail($id);
        $name = $destination->name;
        $destination->delete();

        return response()->json([
            'success' => true,
            'message' => "Destination '{$name}' deleted successfully.",
            'name' => $name,
        ]);
    }
}
