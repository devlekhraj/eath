<?php

namespace Admin\Http\Controllers\ArticleCategory;

use App\Http\Controllers\Controller;
use Admin\Models\ArticleCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class ArticleCategoryController extends Controller
{
    public function index(Request $request)
    {
        return $this->getCategories($request);
    }

    public function getCategories(Request $request)
    {
        $query = ArticleCategory::query()
            ->withCount('articles')
            ->orderBy('sort_order', 'asc')
            ->orderBy('name', 'asc');

        if ($request->filled('search')) {
            $search = trim($request->input('search'));
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('slug', 'like', "%{$search}%");
            });
        }

        if ($request->boolean('active_only')) {
            $query->where('is_active', true);
        }

        $categories = $query->get();

        return response()->json([
            'success' => true,
            'data' => $categories,
        ]);
    }

    public function show($id)
    {
        $category = ArticleCategory::withCount('articles')->findOrFail($id);

        return response()->json([
            'success' => true,
            'data' => $category,
        ]);
    }

    public function store(Request $request)
    {
        return $this->saveCategory($request);
    }

    public function saveCategory(Request $request)
    {
        $id = $request->input('id');

        $validated = $request->validate([
            'id' => ['nullable', 'integer', 'exists:article_categories,id'],
            'name' => ['required', 'string', 'max:255', Rule::unique('article_categories', 'name')->ignore($id)],
            'slug' => ['nullable', 'string', 'max:255', Rule::unique('article_categories', 'slug')->ignore($id)],
            'description' => ['nullable', 'string'],
            'kicker' => ['nullable', 'string', 'max:255'],
            'tagline' => ['nullable', 'string', 'max:255'],
            'summary' => ['nullable', 'string'],
            'lead' => ['nullable', 'string'],
            'icon' => ['nullable', 'string', 'max:50'],
            'rules' => ['nullable', 'array'],
            'rules.*.rule' => ['nullable', 'string', 'max:255'],
            'rules.*.detail' => ['nullable', 'string'],
            'hazards' => ['nullable', 'array'],
            'hazards.*' => ['nullable', 'string'],
            'checklists' => ['nullable', 'array'],
            'checklists.*' => ['nullable', 'string'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
            'is_active' => ['nullable', 'boolean'],
        ]);

        $validated['slug'] = $validated['slug'] ?? Str::slug($validated['name']);
        $validated['sort_order'] = $validated['sort_order'] ?? 0;
        $validated['is_active'] = $request->has('is_active') ? $request->boolean('is_active') : true;

        $category = ArticleCategory::updateOrCreate(
            ['id' => $id],
            $validated
        );

        return response()->json([
            'success' => true,
            'message' => $id ? 'Article category updated successfully.' : 'Article category created successfully.',
            'data' => $category->fresh(),
        ], $id ? 200 : 201);
    }

    public function update(Request $request, $id)
    {
        $category = ArticleCategory::findOrFail($id);

        $validated = $request->validate([
            'name' => ['sometimes', 'required', 'string', 'max:255', Rule::unique('article_categories', 'name')->ignore($id)],
            'slug' => ['nullable', 'string', 'max:255', Rule::unique('article_categories', 'slug')->ignore($id)],
            'description' => ['nullable', 'string'],
            'kicker' => ['nullable', 'string', 'max:255'],
            'tagline' => ['nullable', 'string', 'max:255'],
            'summary' => ['nullable', 'string'],
            'lead' => ['nullable', 'string'],
            'icon' => ['nullable', 'string', 'max:50'],
            'rules' => ['nullable', 'array'],
            'rules.*.rule' => ['nullable', 'string', 'max:255'],
            'rules.*.detail' => ['nullable', 'string'],
            'hazards' => ['nullable', 'array'],
            'hazards.*' => ['nullable', 'string'],
            'checklists' => ['nullable', 'array'],
            'checklists.*' => ['nullable', 'string'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
            'is_active' => ['nullable', 'boolean'],
        ]);

        if (array_key_exists('name', $validated) && !array_key_exists('slug', $validated)) {
            $validated['slug'] = Str::slug($validated['name']);
        }

        $category->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Article category updated successfully.',
            'data' => $category->fresh(),
        ]);
    }

    public function delete($id, Request $request)
    {
        $category = ArticleCategory::findOrFail($id);
        $name = $category->name;
        $category->delete();

        return response()->json([
            'success' => true,
            'message' => "Category '{$name}' deleted successfully.",
        ]);
    }

    public function toggleActive($id, Request $request)
    {
        $category = ArticleCategory::findOrFail($id);
        $category->is_active = $request->has('is_active') ? $request->boolean('is_active') : !$category->is_active;
        $category->save();

        $statusText = $category->is_active ? 'activated' : 'deactivated';

        return response()->json([
            'success' => true,
            'message' => "Category '{$category->name}' has been {$statusText}.",
            'is_active' => $category->is_active,
        ]);
    }
}
