<?php

namespace Admin\Http\Controllers\Article;

use App\Http\Controllers\Controller;
use Admin\Models\Article;
use Admin\Models\ArticleSection;
use Admin\Models\Journey;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class ArticleController extends Controller
{
    public function index(Request $request)
    {
        $query = Article::query()
            ->with(['category', 'heroImage'])
            ->withCount(['sections', 'journeys'])
            ->orderBy('created_at', 'desc');

        if ($request->filled('search')) {
            $search = trim($request->input('search'));
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('slug', 'like', "%{$search}%")
                  ->orWhere('author_name', 'like', "%{$search}%")
                  ->orWhere('summary', 'like', "%{$search}%");
            });
        }

        if ($request->filled('category_id')) {
            $query->where('article_category_id', $request->input('category_id'));
        }

        if ($request->filled('is_active')) {
            $query->where('is_active', $request->boolean('is_active'));
        }

        if ($request->filled('is_published')) {
            $query->where('is_published', $request->boolean('is_published'));
        }

        $articles = $query->get()->map(function ($article) {
            return $this->formatArticleListItem($article);
        });

        return response()->json([
            'success' => true,
            'data' => $articles,
        ]);
    }

    public function show($id)
    {
        $article = Article::with(['category', 'heroImage', 'sections', 'journeys'])->findOrFail($id);

        return response()->json([
            'success' => true,
            'data' => $this->formatArticleDetail($article),
            'article' => $this->formatArticleDetail($article),
        ]);
    }

    public function store(Request $request)
    {
        $payload = $this->extractPayload($request);

        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255', Rule::unique('articles', 'slug')],
            'article_category_id' => ['nullable', 'integer', 'exists:article_categories,id'],
            'summary' => ['nullable', 'string'],
            'body' => ['nullable', 'string'],
            'author_name' => ['nullable', 'string', 'max:255'],
            'hero_image_id' => ['nullable', 'integer', 'exists:media_assets,id'],
            'is_featured' => ['nullable', 'boolean'],
            'is_active' => ['nullable', 'boolean'],
            'is_published' => ['nullable', 'boolean'],
            'published_at' => ['nullable', 'date'],
            'updated_on' => ['nullable', 'date'],
            'meta_title' => ['nullable', 'string', 'max:255'],
            'meta_description' => ['nullable', 'string', 'max:300'],
            'sections' => ['nullable', 'array'],
            'sections.*.heading' => ['required_with:sections', 'string', 'max:255'],
            'sections.*.body' => ['required_with:sections', 'string'],
            'sections.*.sort_order' => ['nullable', 'integer', 'min:0'],
            'journey_ids' => ['nullable', 'array'],
            'journey_ids.*' => ['integer', 'exists:journeys,id'],
        ]);

        $createData = [
            'title' => $payload['title'],
            'slug' => !empty($payload['slug']) ? Str::slug($payload['slug']) : Str::slug($payload['title']),
            'article_category_id' => $payload['article_category_id'] ?? null,
            'summary' => $payload['summary'] ?? null,
            'body' => $payload['body'] ?? null,
            'author_name' => $payload['author_name'] ?? 'Admin',
            'hero_image_id' => $payload['hero_image_id'] ?? null,
            'is_featured' => $payload['is_featured'] ?? false,
            'is_active' => $payload['is_active'] ?? true,
            'is_published' => $payload['is_published'] ?? false,
            'published_at' => $payload['published_at'] ?? ($payload['is_published'] ? now() : null),
            'updated_on' => $payload['updated_on'] ?? now()->toDateString(),
            'meta_title' => $payload['meta_title'] ?? null,
            'meta_description' => $payload['meta_description'] ?? null,
        ];

        $article = Article::create($createData);

        if (!empty($validated['sections'])) {
            foreach ($validated['sections'] as $idx => $sec) {
                $article->sections()->create([
                    'heading' => $sec['heading'],
                    'body' => $sec['body'],
                    'sort_order' => $sec['sort_order'] ?? $idx,
                ]);
            }
        }

        if (isset($validated['journey_ids'])) {
            $article->journeys()->sync($validated['journey_ids']);
        }

        $article->load(['category', 'heroImage', 'sections', 'journeys']);

        return response()->json([
            'success' => true,
            'message' => 'Article created successfully.',
            'data' => $this->formatArticleDetail($article),
            'article' => $this->formatArticleDetail($article),
            'blog' => $this->formatArticleDetail($article), // backward compat
        ], 201);
    }

    public function update(Request $request, $id)
    {
        $article = Article::findOrFail($id);
        $payload = $this->extractPayload($request);

        $validated = $request->validate([
            'title' => ['sometimes', 'required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255', Rule::unique('articles', 'slug')->ignore($id)],
            'article_category_id' => ['nullable', 'integer', 'exists:article_categories,id'],
            'summary' => ['nullable', 'string'],
            'body' => ['nullable', 'string'],
            'author_name' => ['nullable', 'string', 'max:255'],
            'hero_image_id' => ['nullable', 'integer', 'exists:media_assets,id'],
            'is_featured' => ['nullable', 'boolean'],
            'is_active' => ['nullable', 'boolean'],
            'is_published' => ['nullable', 'boolean'],
            'published_at' => ['nullable', 'date'],
            'updated_on' => ['nullable', 'date'],
            'meta_title' => ['nullable', 'string', 'max:255'],
            'meta_description' => ['nullable', 'string', 'max:300'],
            'sections' => ['nullable', 'array'],
            'journey_ids' => ['nullable', 'array'],
            'journey_ids.*' => ['integer', 'exists:journeys,id'],
        ]);

        $updateData = [];

        if (array_key_exists('title', $payload)) {
            $updateData['title'] = $payload['title'];
        }
        if (array_key_exists('slug', $payload)) {
            $updateData['slug'] = !empty($payload['slug'])
                ? Str::slug($payload['slug'])
                : (!empty($payload['title']) ? Str::slug($payload['title']) : $article->slug);
        }
        if (array_key_exists('article_category_id', $payload)) {
            $updateData['article_category_id'] = $payload['article_category_id'];
        }
        if (array_key_exists('summary', $payload)) {
            $updateData['summary'] = $payload['summary'];
        }
        if (array_key_exists('body', $payload)) {
            $updateData['body'] = $payload['body'];
        }
        if (array_key_exists('author_name', $payload)) {
            $updateData['author_name'] = $payload['author_name'];
        }
        if (array_key_exists('hero_image_id', $payload)) {
            $updateData['hero_image_id'] = $payload['hero_image_id'];
        }
        if (array_key_exists('is_featured', $payload)) {
            $updateData['is_featured'] = $payload['is_featured'];
        }
        if (array_key_exists('is_active', $payload)) {
            $updateData['is_active'] = $payload['is_active'];
        }
        if (array_key_exists('is_published', $payload)) {
            $updateData['is_published'] = $payload['is_published'];
            if ($payload['is_published'] && is_null($article->published_at) && !array_key_exists('published_at', $payload)) {
                $updateData['published_at'] = now();
            }
        }
        if (array_key_exists('published_at', $payload)) {
            $updateData['published_at'] = $payload['published_at'];
        }
        if (array_key_exists('updated_on', $payload)) {
            $updateData['updated_on'] = $payload['updated_on'];
        }
        if (array_key_exists('meta_title', $payload)) {
            $updateData['meta_title'] = $payload['meta_title'];
        }
        if (array_key_exists('meta_description', $payload)) {
            $updateData['meta_description'] = $payload['meta_description'];
        }

        $article->update($updateData);

        if (array_key_exists('journey_ids', $validated)) {
            $article->journeys()->sync($validated['journey_ids'] ?? []);
        }

        $article->load(['category', 'heroImage', 'sections', 'journeys']);

        return response()->json([
            'success' => true,
            'message' => 'Article updated successfully.',
            'data' => $this->formatArticleDetail($article),
            'article' => $this->formatArticleDetail($article),
            'blog' => $this->formatArticleDetail($article), // backward compat
        ]);
    }

    public function delete($id)
    {
        $article = Article::findOrFail($id);
        $title = $article->title;
        $article->delete();

        return response()->json([
            'success' => true,
            'message' => "Article '{$title}' deleted successfully.",
        ]);
    }

    public function destroy($id)
    {
        return $this->delete($id);
    }

    public function toggleActive($id, Request $request)
    {
        $article = Article::findOrFail($id);
        $article->is_active = $request->has('is_active') ? $request->boolean('is_active') : !$article->is_active;
        $article->save();

        $statusText = $article->is_active ? 'active' : 'inactive';

        return response()->json([
            'success' => true,
            'message' => "Article is now {$statusText}.",
            'is_active' => $article->is_active,
            'status' => $article->is_active,
        ]);
    }

    public function togglePublish($id, Request $request)
    {
        $article = Article::findOrFail($id);
        $article->is_published = $request->has('is_published') ? $request->boolean('is_published') : !$article->is_published;

        if ($article->is_published && is_null($article->published_at)) {
            $article->published_at = now();
        }

        $article->save();

        $statusText = $article->is_published ? 'published' : 'unpublished';

        return response()->json([
            'success' => true,
            'message' => "Article is now {$statusText}.",
            'is_published' => $article->is_published,
            'published_at' => $article->published_at,
        ]);
    }

    public function storeSection($id, Request $request)
    {
        $article = Article::findOrFail($id);

        $validated = $request->validate([
            'id' => ['nullable', 'integer', 'exists:article_sections,id'],
            'heading' => ['required', 'string', 'max:255'],
            'body' => ['required', 'string'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
        ]);

        $sectionId = $validated['id'] ?? null;
        $sortOrder = $validated['sort_order'] ?? ($sectionId ? 0 : ($article->sections()->max('sort_order') + 1));

        $section = $article->sections()->updateOrCreate(
            ['id' => $sectionId],
            [
                'heading' => $validated['heading'],
                'body' => $validated['body'],
                'sort_order' => $sortOrder,
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
        $article = Article::findOrFail($id);
        $section = $article->sections()->findOrFail($sectionId);
        $section->delete();

        return response()->json([
            'success' => true,
            'message' => 'Section deleted successfully.',
        ]);
    }

    public function syncJourneys($id, Request $request)
    {
        $article = Article::findOrFail($id);

        $validated = $request->validate([
            'journey_ids' => ['required', 'array'],
            'journey_ids.*' => ['integer', 'exists:journeys,id'],
        ]);

        $article->journeys()->sync($validated['journey_ids']);

        return response()->json([
            'success' => true,
            'message' => 'Related journeys synchronized successfully.',
            'journeys' => $article->fresh()->journeys,
        ]);
    }

    private function extractPayload(Request $request): array
    {
        $payload = [];

        if ($request->has('title')) {
            $payload['title'] = $request->input('title');
        }
        if ($request->has('slug')) {
            $payload['slug'] = $request->input('slug');
        }

        // Category aliases
        if ($request->has('article_category_id')) {
            $payload['article_category_id'] = $request->input('article_category_id');
        } elseif ($request->has('category_id')) {
            $payload['article_category_id'] = $request->input('category_id');
        }

        // Summary / sub_title aliases
        if ($request->has('summary')) {
            $payload['summary'] = $request->input('summary');
        } elseif ($request->has('sub_title')) {
            $payload['summary'] = $request->input('sub_title');
        }

        // Body / content aliases
        if ($request->has('body')) {
            $payload['body'] = $request->input('body');
        } elseif ($request->has('content')) {
            $payload['body'] = $request->input('content');
        }

        // Author / author_name aliases
        if ($request->has('author_name')) {
            $payload['author_name'] = $request->input('author_name');
        } elseif ($request->has('author')) {
            $payload['author_name'] = $request->input('author');
        }

        if ($request->has('hero_image_id')) {
            $payload['hero_image_id'] = $request->input('hero_image_id');
        }
        if ($request->has('is_featured')) {
            $payload['is_featured'] = $request->boolean('is_featured');
        }
        if ($request->has('is_active')) {
            $payload['is_active'] = $request->boolean('is_active');
        }
        if ($request->has('is_published')) {
            $payload['is_published'] = $request->boolean('is_published');
        }
        if ($request->has('published_at')) {
            $payload['published_at'] = $request->input('published_at');
        }
        if ($request->has('updated_on')) {
            $payload['updated_on'] = $request->input('updated_on');
        }
        if ($request->has('meta_title')) {
            $payload['meta_title'] = $request->input('meta_title');
        }
        if ($request->has('meta_description')) {
            $payload['meta_description'] = $request->input('meta_description');
        }

        return $payload;
    }

    private function formatArticleListItem(Article $article): array
    {
        $bannerUrl = $article->heroImage ? $article->heroImage->path : null;

        return [
            'id' => $article->id,
            'title' => $article->title,
            'slug' => $article->slug,
            'summary' => $article->summary,
            'sub_title' => $article->summary, // alias
            'author_name' => $article->author_name,
            'author' => $article->author_name, // alias
            'article_category_id' => $article->article_category_id,
            'category_id' => $article->article_category_id, // alias
            'category' => $article->category ? [
                'id' => $article->category->id,
                'name' => $article->category->name,
                'slug' => $article->category->slug,
            ] : null,
            'status' => (bool) $article->is_active, // alias
            'is_active' => (bool) $article->is_active,
            'is_published' => (bool) $article->is_published,
            'is_featured' => (bool) $article->is_featured,
            'published_at' => $article->published_at ? $article->published_at->toISOString() : null,
            'updated_on' => $article->updated_on ? $article->updated_on->toDateString() : null,
            'banner_url' => $bannerUrl,
            'sections_count' => $article->sections_count ?? 0,
            'journeys_count' => $article->journeys_count ?? 0,
            'created_at' => $article->created_at ? $article->created_at->toISOString() : null,
            'updated_at' => $article->updated_at ? $article->updated_at->toISOString() : null,
        ];
    }

    private function formatArticleDetail(Article $article): array
    {
        $categorySlug = $article->category ? $article->category->slug : 'general';
        $bannerUrl = $article->heroImage ? $article->heroImage->path : null;

        return [
            'id' => $article->id,
            'title' => $article->title,
            'slug' => $article->slug,
            'summary' => $article->summary,
            'sub_title' => $article->summary, // alias
            'body' => $article->body,
            'content' => $article->body, // alias
            'author_name' => $article->author_name,
            'author' => $article->author_name, // alias
            'article_category_id' => $article->article_category_id,
            'category_id' => $article->article_category_id, // alias
            'category' => $article->category ? [
                'id' => $article->category->id,
                'name' => $article->category->name,
                'slug' => $article->category->slug,
            ] : null,
            'hero_image_id' => $article->hero_image_id,
            'hero_image' => $article->heroImage,
            'banner_url' => $bannerUrl,
            'status' => (bool) $article->is_active,
            'is_active' => (bool) $article->is_active,
            'is_published' => (bool) $article->is_published,
            'is_featured' => (bool) $article->is_featured,
            'published_at' => $article->published_at ? $article->published_at->toISOString() : null,
            'updated_on' => $article->updated_on ? $article->updated_on->toDateString() : null,
            'meta_title' => $article->meta_title,
            'meta_description' => $article->meta_description,
            'meta_keyword' => $article->meta_title, // alias
            'meta_keywords' => $article->meta_title, // alias
            'blog_url' => "/articles/{$article->slug}",
            'sections' => $article->sections->map(function ($sec) {
                return [
                    'id' => $sec->id,
                    'article_id' => $sec->article_id,
                    'heading' => $sec->heading,
                    'body' => $sec->body,
                    'sort_order' => $sec->sort_order,
                ];
            }),
            'journeys' => $article->journeys->map(function ($j) {
                return [
                    'id' => $j->id,
                    'title' => $j->title,
                    'slug' => $j->slug,
                    'sort_order' => $j->pivot->sort_order ?? 0,
                ];
            }),
            'journey_ids' => $article->journeys->pluck('id'),
            'created_at' => $article->created_at ? $article->created_at->toISOString() : null,
            'updated_at' => $article->updated_at ? $article->updated_at->toISOString() : null,
        ];
    }
}
