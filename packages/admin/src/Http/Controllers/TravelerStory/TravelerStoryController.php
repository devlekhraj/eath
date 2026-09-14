<?php

namespace Admin\Http\Controllers\TravelerStory;

use App\Http\Controllers\Controller;
use Admin\Models\TravelerStory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class TravelerStoryController extends Controller
{
    public function index(Request $request)
    {
        $query = TravelerStory::query()
            ->with(['journey:id,name,slug', 'destination:id,name,slug', 'mediaAttachments.mediaAsset'])
            ->orderBy('created_at', 'desc');

        if ($request->filled('search')) {
            $search = trim($request->input('search'));
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('slug', 'like', "%{$search}%")
                  ->orWhere('traveler_name', 'like', "%{$search}%")
                  ->orWhere('traveler_country', 'like', "%{$search}%")
                  ->orWhere('summary', 'like', "%{$search}%");
            });
        }

        if ($request->filled('journey_id')) {
            $query->where('journey_id', $request->input('journey_id'));
        }

        if ($request->filled('destination_id')) {
            $query->where('destination_id', $request->input('destination_id'));
        }

        if ($request->filled('is_active')) {
            $query->where('is_active', $request->boolean('is_active'));
        }

        if ($request->filled('is_published')) {
            $query->where('is_published', $request->boolean('is_published'));
        }

        if ($request->filled('is_featured')) {
            $query->where('is_featured', $request->boolean('is_featured'));
        }

        $stories = $query->get()->map(function ($story) {
            return $this->formatStory($story);
        });

        return response()->json([
            'success' => true,
            'data' => $stories,
        ]);
    }

    public function show($id)
    {
        $story = TravelerStory::with(['journey:id,name,slug', 'destination:id,name,slug', 'mediaAttachments.mediaAsset'])->findOrFail($id);

        return response()->json([
            'success' => true,
            'data' => $this->formatStory($story),
            'story' => $this->formatStory($story),
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255', Rule::unique('traveler_stories', 'slug')],
            'journey_id' => ['nullable', 'integer', 'exists:journeys,id'],
            'destination_id' => ['nullable', 'integer', 'exists:destinations,id'],
            'summary' => ['nullable', 'string'],
            'body' => ['nullable', 'string'],
            'traveler_name' => ['nullable', 'string', 'max:255'],
            'traveler_country' => ['nullable', 'string', 'max:255'],
            'traveled_on' => ['nullable', 'date'],
            'media' => ['nullable', 'array'],
            'media.hero' => ['nullable', 'integer', 'exists:media_assets,id'],
            'is_featured' => ['nullable', 'boolean'],
            'is_active' => ['nullable', 'boolean'],
            'is_published' => ['nullable', 'boolean'],
            'published_at' => ['nullable', 'date'],
            'meta_title' => ['nullable', 'string', 'max:255'],
            'meta_description' => ['nullable', 'string', 'max:300'],
        ]);

        $mediaData = $validated['media'] ?? [];
        unset($validated['media']);

        $validated['slug'] = !empty($validated['slug']) ? Str::slug($validated['slug']) : Str::slug($validated['title']);
        $validated['is_featured'] = $request->has('is_featured') ? $request->boolean('is_featured') : false;
        $validated['is_active'] = $request->has('is_active') ? $request->boolean('is_active') : true;
        $validated['is_published'] = $request->has('is_published') ? $request->boolean('is_published') : false;

        if ($validated['is_published'] && empty($validated['published_at'])) {
            $validated['published_at'] = now();
        }

        $story = TravelerStory::create($validated);

        if ($request->has('media')) {
            $story->syncMediaFromRequest($mediaData);
        }

        $story->load(['journey:id,name,slug', 'destination:id,name,slug', 'mediaAttachments.mediaAsset']);

        return response()->json([
            'success' => true,
            'message' => 'Traveler story created successfully.',
            'data' => $this->formatStory($story),
            'story' => $this->formatStory($story),
        ], 201);
    }

    public function update(Request $request, $id)
    {
        $story = TravelerStory::findOrFail($id);

        $validated = $request->validate([
            'title' => ['sometimes', 'required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255', Rule::unique('traveler_stories', 'slug')->ignore($id)],
            'journey_id' => ['nullable', 'integer', 'exists:journeys,id'],
            'destination_id' => ['nullable', 'integer', 'exists:destinations,id'],
            'summary' => ['nullable', 'string'],
            'body' => ['nullable', 'string'],
            'traveler_name' => ['nullable', 'string', 'max:255'],
            'traveler_country' => ['nullable', 'string', 'max:255'],
            'traveled_on' => ['nullable', 'date'],
            'media' => ['nullable', 'array'],
            'media.hero' => ['nullable', 'integer', 'exists:media_assets,id'],
            'is_featured' => ['nullable', 'boolean'],
            'is_active' => ['nullable', 'boolean'],
            'is_published' => ['nullable', 'boolean'],
            'published_at' => ['nullable', 'date'],
            'meta_title' => ['nullable', 'string', 'max:255'],
            'meta_description' => ['nullable', 'string', 'max:300'],
        ]);

        $mediaData = $validated['media'] ?? [];
        unset($validated['media']);

        if (array_key_exists('title', $validated) && empty($validated['slug']) && empty($story->slug)) {
            $validated['slug'] = Str::slug($validated['title']);
        } elseif (!empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['slug']);
        }

        if ($request->has('is_published')) {
            $validated['is_published'] = $request->boolean('is_published');
            if ($validated['is_published'] && is_null($story->published_at) && !array_key_exists('published_at', $validated)) {
                $validated['published_at'] = now();
            }
        }

        $story->update($validated);

        if ($request->has('media')) {
            $story->syncMediaFromRequest($mediaData);
        }

        $story->load(['journey:id,name,slug', 'destination:id,name,slug', 'mediaAttachments.mediaAsset']);

        return response()->json([
            'success' => true,
            'message' => 'Traveler story updated successfully.',
            'data' => $this->formatStory($story),
            'story' => $this->formatStory($story),
        ]);
    }

    public function destroy($id)
    {
        $story = TravelerStory::findOrFail($id);
        $title = $story->title;
        $story->delete();

        return response()->json([
            'success' => true,
            'message' => "Traveler story '{$title}' deleted successfully.",
        ]);
    }

    public function delete($id)
    {
        return $this->destroy($id);
    }

    public function toggleActive($id, Request $request)
    {
        $story = TravelerStory::findOrFail($id);
        $story->is_active = $request->has('is_active') ? $request->boolean('is_active') : !$story->is_active;
        $story->save();

        $statusText = $story->is_active ? 'active' : 'inactive';

        return response()->json([
            'success' => true,
            'message' => "Traveler story is now {$statusText}.",
            'is_active' => $story->is_active,
        ]);
    }

    public function togglePublish($id, Request $request)
    {
        $story = TravelerStory::findOrFail($id);
        $story->is_published = $request->has('is_published') ? $request->boolean('is_published') : !$story->is_published;

        if ($story->is_published && is_null($story->published_at)) {
            $story->published_at = now();
        }

        $story->save();

        $statusText = $story->is_published ? 'published' : 'unpublished';

        return response()->json([
            'success' => true,
            'message' => "Traveler story is now {$statusText}.",
            'is_published' => $story->is_published,
            'published_at' => $story->published_at,
        ]);
    }

    private function formatStory(TravelerStory $story): array
    {
        $media = $story->getGroupedMedia();
        $bannerUrl = $media['hero']['url'] ?? null;

        return [
            'id' => $story->id,
            'journey_id' => $story->journey_id,
            'journey' => $story->journey ? [
                'id' => $story->journey->id,
                'title' => $story->journey->title,
                'slug' => $story->journey->slug,
            ] : null,
            'destination_id' => $story->destination_id,
            'destination' => $story->destination ? [
                'id' => $story->destination->id,
                'name' => $story->destination->name,
                'slug' => $story->destination->slug,
            ] : null,
            'title' => $story->title,
            'slug' => $story->slug,
            'summary' => $story->summary,
            'body' => $story->body,
            'traveler_name' => $story->traveler_name,
            'traveler_country' => $story->traveler_country,
            'traveled_on' => $story->traveled_on ? $story->traveled_on->toDateString() : null,
            'media' => $media,
            'banner_url' => $bannerUrl,
            'is_featured' => (bool) $story->is_featured,
            'is_active' => (bool) $story->is_active,
            'is_published' => (bool) $story->is_published,
            'published_at' => $story->published_at ? $story->published_at->toISOString() : null,
            'meta_title' => $story->meta_title,
            'meta_description' => $story->meta_description,
            'story_url' => "/traveler-stories/{$story->slug}",
            'created_at' => $story->created_at ? $story->created_at->toISOString() : null,
            'updated_at' => $story->updated_at ? $story->updated_at->toISOString() : null,
        ];
    }
}
