<?php

namespace Admin\Http\Controllers\Faq;

use App\Http\Controllers\Controller;
use Admin\Models\Faq;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index(Request $request)
    {
        $query = Faq::query()
            ->with(['faqable'])
            ->orderBy('sort_order', 'asc')
            ->orderBy('id', 'asc');

        if ($request->filled('category')) {
            $query->where('category', $request->input('category'));
        }

        if ($request->filled('faqable_type')) {
            $alias = Relation::getMorphAlias($request->input('faqable_type')) ?? $request->input('faqable_type');
            $query->where('faqable_type', $alias);
        }

        if ($request->filled('faqable_id')) {
            $query->where('faqable_id', $request->input('faqable_id'));
        }

        if ($request->filled('is_active')) {
            $query->where('is_active', $request->boolean('is_active'));
        }

        if ($request->filled('search')) {
            $search = trim($request->input('search'));
            $query->where(function ($q) use ($search) {
                $q->where('question', 'like', "%{$search}%")
                  ->orWhere('answer', 'like', "%{$search}%")
                  ->orWhere('category', 'like', "%{$search}%");
            });
        }

        $faqs = $query->get();

        return response()->json([
            'success' => true,
            'data' => $faqs,
        ]);
    }

    public function show($id)
    {
        $faq = Faq::with('faqable')->findOrFail($id);

        return response()->json([
            'success' => true,
            'data' => $faq,
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'question' => ['required', 'string', 'max:500'],
            'answer' => ['required', 'string'],
            'category' => ['nullable', 'string', 'max:100'],
            'faqable_type' => ['nullable', 'string', 'max:255'],
            'faqable_id' => ['nullable', 'integer'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
            'is_active' => ['nullable', 'boolean'],
        ]);

        if (!empty($validated['faqable_type'])) {
            $validated['faqable_type'] = Relation::getMorphAlias($validated['faqable_type']) ?? $validated['faqable_type'];
        }

        if (!isset($validated['sort_order'])) {
            $maxSortOrder = Faq::max('sort_order') ?? 0;
            $validated['sort_order'] = $maxSortOrder + 1;
        }

        $validated['is_active'] = $request->has('is_active') ? $request->boolean('is_active') : true;

        $faq = Faq::create($validated);
        $faq->load('faqable');

        return response()->json([
            'success' => true,
            'message' => 'FAQ created successfully.',
            'data' => $faq,
        ], 201);
    }

    public function update(Request $request, $id)
    {
        $faq = Faq::findOrFail($id);

        $validated = $request->validate([
            'question' => ['sometimes', 'required', 'string', 'max:500'],
            'answer' => ['sometimes', 'required', 'string'],
            'category' => ['nullable', 'string', 'max:100'],
            'faqable_type' => ['nullable', 'string', 'max:255'],
            'faqable_id' => ['nullable', 'integer'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
            'is_active' => ['nullable', 'boolean'],
        ]);

        if (array_key_exists('faqable_type', $validated)) {
            $type = $validated['faqable_type'];
            $validated['faqable_type'] = $type ? (Relation::getMorphAlias($type) ?? $type) : null;
        }

        if ($request->has('is_active')) {
            $validated['is_active'] = $request->boolean('is_active');
        }

        $faq->update($validated);
        $faq->load('faqable');

        return response()->json([
            'success' => true,
            'message' => 'FAQ updated successfully.',
            'data' => $faq,
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
        $faq = Faq::findOrFail($id);
        $faq->delete();

        return response()->json([
            'success' => true,
            'message' => 'FAQ deleted successfully.',
        ]);
    }

    public function delete($id)
    {
        return $this->destroy($id);
    }

    public function toggleActive($id, Request $request)
    {
        $faq = Faq::findOrFail($id);
        $faq->is_active = $request->has('is_active') ? $request->boolean('is_active') : !$faq->is_active;
        $faq->save();

        $statusText = $faq->is_active ? 'active' : 'inactive';

        return response()->json([
            'success' => true,
            'message' => "FAQ is now {$statusText}.",
            'is_active' => $faq->is_active,
        ]);
    }

    public function categories()
    {
        $savedCategories = Faq::whereNotNull('category')
            ->where('category', '!=', '')
            ->distinct()
            ->pluck('category')
            ->toArray();

        $defaultCategories = [
            'General',
            'Booking & Payment',
            'Gear & Equipment',
            'Health & Safety',
            'Permits & Visas',
            'Itinerary & Pacing',
            'Weather & Seasons',
        ];

        $categories = array_values(array_unique(array_merge($defaultCategories, $savedCategories)));
        sort($categories);

        return response()->json([
            'success' => true,
            'data' => $categories,
        ]);
    }
}
