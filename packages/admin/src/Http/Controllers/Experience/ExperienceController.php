<?php

namespace Admin\Http\Controllers\Experience;

use App\Http\Controllers\Controller;
use Admin\Models\Experience;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class ExperienceController extends Controller
{
    public function index(Request $request)
    {
        $query = Experience::query()
            ->withCount('journeys')
            ->orderBy('sort_order', 'asc')
            ->orderBy('name', 'asc');

        if ($request->filled('search')) {
            $search = trim($request->input('search'));
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('slug', 'like', "%{$search}%")
                  ->orWhere('summary', 'like', "%{$search}%");
            });
        }

        if ($request->boolean('active_only')) {
            $query->where('is_active', true);
        }

        if ($request->has('per_page') && $request->input('per_page') !== 'all') {
            $perPage = max(1, min((int) $request->input('per_page', 20), 100));
            $data = $query->paginate($perPage);
        } else {
            $data = $query->get();
        }

        return response()->json([
            'success' => true,
            'data' => $data,
        ]);
    }

    public function show($id)
    {
        $experience = Experience::withCount('journeys')->findOrFail($id);

        return response()->json([
            'success' => true,
            'data' => $experience,
        ]);
    }

    public function store(Request $request)
    {
        $id = $request->input('id');

        $validated = $request->validate([
            'id' => ['nullable', 'integer', 'exists:experiences,id'],
            'name' => ['required', 'string', 'max:255', Rule::unique('experiences', 'name')->ignore($id)],
            'slug' => ['nullable', 'string', 'max:255', Rule::unique('experiences', 'slug')->ignore($id)],
            'summary' => ['nullable', 'string'],
            'description' => ['nullable', 'string'],
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

        $experience = Experience::updateOrCreate(
            ['id' => $id],
            $validated
        );

        return response()->json([
            'success' => true,
            'message' => $id ? 'Experience updated successfully.' : 'Experience created successfully.',
            'data' => $experience->fresh(),
        ], $id ? 200 : 201);
    }

    public function update(Request $request, $id)
    {
        $experience = Experience::findOrFail($id);

        $validated = $request->validate([
            'name' => ['sometimes', 'required', 'string', 'max:255', Rule::unique('experiences', 'name')->ignore($id)],
            'slug' => ['nullable', 'string', 'max:255', Rule::unique('experiences', 'slug')->ignore($id)],
            'summary' => ['nullable', 'string'],
            'description' => ['nullable', 'string'],
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

        $experience->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Experience updated successfully.',
            'data' => $experience->fresh(),
        ]);
    }

    public function destroy($id)
    {
        $experience = Experience::findOrFail($id);
        $name = $experience->name;
        $experience->delete();

        return response()->json([
            'success' => true,
            'message' => "Experience '{$name}' deleted successfully.",
        ]);
    }

    public function toggleActive($id, Request $request)
    {
        $experience = Experience::findOrFail($id);
        $experience->is_active = $request->boolean('is_active');
        $experience->save();

        $statusText = $experience->is_active ? 'activated' : 'deactivated';

        return response()->json([
            'success' => true,
            'message' => "Experience '{$experience->name}' has been {$statusText}.",
            'is_active' => $experience->is_active,
        ]);
    }
}
