<?php

namespace Admin\Http\Controllers\WebsitePage;

use App\Http\Controllers\Controller;
use Admin\Models\WebsitePage;
use Admin\Models\WebsitePageSection;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class WebsitePageController extends Controller
{
    public function index(Request $request)
    {
        $query = WebsitePage::query()
            ->with(['heroImage'])
            ->withCount('sections')
            ->orderBy('created_at', 'desc');

        if ($request->filled('search')) {
            $search = trim($request->input('search'));
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('slug', 'like', "%{$search}%")
                  ->orWhere('summary', 'like', "%{$search}%");
            });
        }

        if ($request->filled('type')) {
            $query->where('type', $request->input('type'));
        }

        if ($request->filled('is_active')) {
            $query->where('is_active', $request->boolean('is_active'));
        }

        if ($request->filled('is_published')) {
            $query->where('is_published', $request->boolean('is_published'));
        }

        $pages = $query->get()->map(function ($page) {
            return $this->formatPageListItem($page);
        });

        return response()->json([
            'success' => true,
            'data' => $pages,
        ]);
    }

    public function show($id)
    {
        $page = WebsitePage::with(['sections', 'heroImage'])->findOrFail($id);

        return response()->json([
            'success' => true,
            'data' => $this->formatPageDetail($page),
            'page' => $this->formatPageDetail($page),
            'message' => 'Page retrieved successfully.',
        ]);
    }

    public function store(Request $request)
    {
        $payload = $this->extractPayload($request);

        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255', Rule::unique('website_pages', 'slug')],
            'summary' => ['nullable', 'string'],
            'body' => ['nullable', 'string'],
            'content' => ['nullable', 'string'],
            'type' => ['nullable', 'string', Rule::in(WebsitePage::TYPES)],
            'hero_image_id' => ['nullable', 'integer', 'exists:media_assets,id'],
            'is_active' => ['nullable', 'boolean'],
            'is_published' => ['nullable', 'boolean'],
            'published_at' => ['nullable', 'date'],
            'meta_title' => ['nullable', 'string', 'max:255'],
            'meta_description' => ['nullable', 'string', 'max:300'],
        ]);

        $body = $payload['body'] ?? $payload['content'] ?? null;
        $slug = !empty($payload['slug']) ? Str::slug($payload['slug']) : Str::slug($payload['title']);
        $isPublished = $request->has('is_published') ? $request->boolean('is_published') : false;

        $page = WebsitePage::create([
            'title' => $payload['title'],
            'slug' => $slug,
            'summary' => $payload['summary'] ?? null,
            'body' => $body,
            'type' => $payload['type'] ?? WebsitePage::TYPE_STANDARD,
            'hero_image_id' => $payload['hero_image_id'] ?? null,
            'is_active' => $request->has('is_active') ? $request->boolean('is_active') : true,
            'is_published' => $isPublished,
            'published_at' => $payload['published_at'] ?? ($isPublished ? now() : null),
            'meta_title' => $payload['meta_title'] ?? null,
            'meta_description' => $payload['meta_description'] ?? null,
        ]);

        $page->load(['sections', 'heroImage']);

        return response()->json([
            'success' => true,
            'message' => 'Page created successfully.',
            'data' => $this->formatPageDetail($page),
            'page' => $this->formatPageDetail($page),
        ], 201);
    }

    public function update(Request $request, $id)
    {
        $page = WebsitePage::findOrFail($id);
        $payload = $this->extractPayload($request);

        $validated = $request->validate([
            'title' => ['sometimes', 'required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255', Rule::unique('website_pages', 'slug')->ignore($id)],
            'summary' => ['nullable', 'string'],
            'body' => ['nullable', 'string'],
            'content' => ['nullable', 'string'],
            'type' => ['nullable', 'string', Rule::in(WebsitePage::TYPES)],
            'hero_image_id' => ['nullable', 'integer', 'exists:media_assets,id'],
            'is_active' => ['nullable', 'boolean'],
            'is_published' => ['nullable', 'boolean'],
            'published_at' => ['nullable', 'date'],
            'meta_title' => ['nullable', 'string', 'max:255'],
            'meta_description' => ['nullable', 'string', 'max:300'],
        ]);

        $updateData = [];

        if (array_key_exists('title', $payload)) {
            $updateData['title'] = $payload['title'];
        }
        if (array_key_exists('slug', $payload)) {
            $updateData['slug'] = !empty($payload['slug'])
                ? Str::slug($payload['slug'])
                : (!empty($payload['title']) ? Str::slug($payload['title']) : $page->slug);
        }
        if (array_key_exists('summary', $payload)) {
            $updateData['summary'] = $payload['summary'];
        }
        if (array_key_exists('body', $payload) || array_key_exists('content', $payload)) {
            $updateData['body'] = $payload['body'] ?? $payload['content'] ?? null;
        }
        if (array_key_exists('type', $payload)) {
            $updateData['type'] = $payload['type'];
        }
        if (array_key_exists('hero_image_id', $payload)) {
            $updateData['hero_image_id'] = $payload['hero_image_id'];
        }
        if (array_key_exists('is_active', $payload)) {
            $updateData['is_active'] = $payload['is_active'];
        }
        if (array_key_exists('is_published', $payload)) {
            $updateData['is_published'] = $payload['is_published'];
            if ($payload['is_published'] && is_null($page->published_at) && !array_key_exists('published_at', $payload)) {
                $updateData['published_at'] = now();
            }
        }
        if (array_key_exists('published_at', $payload)) {
            $updateData['published_at'] = $payload['published_at'];
        }
        if (array_key_exists('meta_title', $payload)) {
            $updateData['meta_title'] = $payload['meta_title'];
        }
        if (array_key_exists('meta_description', $payload)) {
            $updateData['meta_description'] = $payload['meta_description'];
        }

        $page->update($updateData);
        $page->load(['sections', 'heroImage']);

        return response()->json([
            'success' => true,
            'message' => 'Page updated successfully.',
            'data' => $this->formatPageDetail($page),
            'page' => $this->formatPageDetail($page),
        ]);
    }

    public function storeUpdate(Request $request)
    {
        if ($request->filled('id')) {
            return $this->update($request, $request->input('id'));
        }

        return $this->store($request);
    }

    public function destroy($id)
    {
        $page = WebsitePage::findOrFail($id);
        $title = $page->title;
        $page->delete();

        return response()->json([
            'success' => true,
            'message' => "Page '{$title}' deleted successfully.",
        ]);
    }

    public function delete($id)
    {
        return $this->destroy($id);
    }

    public function pageDelete(Request $request, $id)
    {
        return $this->destroy($id);
    }

    public function toggleActive($id, Request $request)
    {
        $page = WebsitePage::findOrFail($id);
        $page->is_active = $request->has('is_active') ? $request->boolean('is_active') : !$page->is_active;
        $page->save();

        $statusText = $page->is_active ? 'active' : 'inactive';

        return response()->json([
            'success' => true,
            'message' => "Page is now {$statusText}.",
            'is_active' => $page->is_active,
        ]);
    }

    public function togglePublish($id, Request $request)
    {
        $page = WebsitePage::findOrFail($id);
        $page->is_published = $request->has('is_published') ? $request->boolean('is_published') : !$page->is_published;

        if ($page->is_published && is_null($page->published_at)) {
            $page->published_at = now();
        }

        $page->save();

        $statusText = $page->is_published ? 'published' : 'unpublished';

        return response()->json([
            'success' => true,
            'message' => "Page is now {$statusText}.",
            'is_published' => $page->is_published,
            'published_at' => $page->published_at,
        ]);
    }

    public function storeSection($id, Request $request)
    {
        $page = WebsitePage::findOrFail($id);

        $validated = $request->validate([
            'id' => ['nullable', 'integer', 'exists:website_page_sections,id'],
            'heading' => ['nullable', 'string', 'max:255'],
            'body' => ['nullable', 'string'],
            'layout_key' => ['nullable', 'string', 'max:100'],
            'image_id' => ['nullable', 'integer', 'exists:media_assets,id'],
            'content' => ['nullable'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
            'is_active' => ['nullable', 'boolean'],
        ]);

        $sectionId = $validated['id'] ?? null;
        $sortOrder = $validated['sort_order'] ?? ($sectionId ? 0 : ($page->sections()->max('sort_order') + 1));

        $section = $page->sections()->updateOrCreate(
            ['id' => $sectionId],
            [
                'heading' => $validated['heading'] ?? null,
                'body' => $validated['body'] ?? null,
                'layout_key' => $validated['layout_key'] ?? 'standard',
                'image_id' => $validated['image_id'] ?? null,
                'content' => $validated['content'] ?? null,
                'sort_order' => $sortOrder,
                'is_active' => $request->has('is_active') ? $request->boolean('is_active') : true,
            ]
        );

        return response()->json([
            'success' => true,
            'message' => $sectionId ? 'Section updated successfully.' : 'Section added successfully.',
            'data' => $section,
        ], $sectionId ? 200 : 201);
    }

    public function deleteSection($id, $sectionId)
    {
        $page = WebsitePage::findOrFail($id);
        $section = $page->sections()->findOrFail($sectionId);
        $section->delete();

        return response()->json([
            'success' => true,
            'message' => 'Section deleted successfully.',
        ]);
    }

    private function extractPayload(Request $request): array
    {
        $payload = [];

        foreach (['title', 'slug', 'summary', 'body', 'content', 'type', 'hero_image_id', 'published_at', 'meta_title', 'meta_description'] as $field) {
            if ($request->has($field)) {
                $payload[$field] = $request->input($field);
            }
        }

        if ($request->has('is_active')) {
            $payload['is_active'] = $request->boolean('is_active');
        }
        if ($request->has('is_published')) {
            $payload['is_published'] = $request->boolean('is_published');
        }

        return $payload;
    }

    private function formatPageListItem(WebsitePage $page): array
    {
        $bannerUrl = $page->heroImage ? $page->heroImage->path : null;

        return [
            'id' => $page->id,
            'title' => $page->title,
            'slug' => $page->slug,
            'summary' => $page->summary,
            'body' => $page->body,
            'content' => $page->body, // backward-compat alias
            'type' => $page->type,
            'hero_image_id' => $page->hero_image_id,
            'banner_url' => $bannerUrl,
            'is_active' => (bool) $page->is_active,
            'is_published' => (bool) $page->is_published,
            'published_at' => $page->published_at ? $page->published_at->toISOString() : null,
            'sections_count' => $page->sections_count ?? 0,
            'created_at' => $page->created_at ? $page->created_at->toISOString() : null,
            'updated_at' => $page->updated_at ? $page->updated_at->toISOString() : null,
        ];
    }

    private function formatPageDetail(WebsitePage $page): array
    {
        $bannerUrl = $page->heroImage ? $page->heroImage->path : null;

        return [
            'id' => $page->id,
            'title' => $page->title,
            'slug' => $page->slug,
            'summary' => $page->summary,
            'body' => $page->body,
            'content' => $page->body, // backward-compat alias
            'type' => $page->type,
            'hero_image_id' => $page->hero_image_id,
            'hero_image' => $page->heroImage,
            'banner_url' => $bannerUrl,
            'is_active' => (bool) $page->is_active,
            'is_published' => (bool) $page->is_published,
            'published_at' => $page->published_at ? $page->published_at->toISOString() : null,
            'meta_title' => $page->meta_title,
            'meta_description' => $page->meta_description,
            'sections' => $page->sections->map(function ($sec) {
                return [
                    'id' => $sec->id,
                    'website_page_id' => $sec->website_page_id,
                    'heading' => $sec->heading,
                    'body' => $sec->body,
                    'layout_key' => $sec->layout_key,
                    'image_id' => $sec->image_id,
                    'content' => $sec->content,
                    'sort_order' => $sec->sort_order,
                    'is_active' => (bool) $sec->is_active,
                ];
            }),
            'created_at' => $page->created_at ? $page->created_at->toISOString() : null,
            'updated_at' => $page->updated_at ? $page->updated_at->toISOString() : null,
        ];
    }
}
