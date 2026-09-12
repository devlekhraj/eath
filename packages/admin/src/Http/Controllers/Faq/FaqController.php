<?php

namespace Admin\Http\Controllers\Faq;

use App\Http\Controllers\Controller;
use Admin\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index(Request $request)
    {
        $query = Faq::query()
            ->with([
                'journey:id,name,slug',
                'destination:id,name,slug',
                'experience:id,name,slug',
            ])
            ->orderBy('sort_order', 'asc')
            ->orderBy('id', 'asc');

        if ($request->filled('category')) {
            $query->where('category', $request->input('category'));
        }

        if ($request->filled('journey_id')) {
            $query->where('journey_id', $request->input('journey_id'));
        }

        if ($request->filled('destination_id')) {
            $query->where('destination_id', $request->input('destination_id'));
        }

        if ($request->filled('experience_id')) {
            $query->where('experience_id', $request->input('experience_id'));
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
        $faq = Faq::with([
            'journey:id,name,slug',
            'destination:id,name,slug',
            'experience:id,name,slug',
        ])->findOrFail($id);

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
            'journey_id' => ['nullable', 'integer', 'exists:journeys,id'],
            'destination_id' => ['nullable', 'integer', 'exists:destinations,id'],
            'experience_id' => ['nullable', 'integer', 'exists:experiences,id'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
            'is_active' => ['nullable', 'boolean'],
        ]);

        if (!isset($validated['sort_order'])) {
            $maxSortOrder = Faq::max('sort_order') ?? 0;
            $validated['sort_order'] = $maxSortOrder + 1;
        }

        $validated['is_active'] = $request->has('is_active') ? $request->boolean('is_active') : true;

        $faq = Faq::create($validated);
        $faq->load(['journey:id,name,slug', 'destination:id,name,slug', 'experience:id,name,slug']);

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
            'journey_id' => ['nullable', 'integer', 'exists:journeys,id'],
            'destination_id' => ['nullable', 'integer', 'exists:destinations,id'],
            'experience_id' => ['nullable', 'integer', 'exists:experiences,id'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
            'is_active' => ['nullable', 'boolean'],
        ]);

        if ($request->has('is_active')) {
            $validated['is_active'] = $request->boolean('is_active');
        }

        $faq->update($validated);
        $faq->load(['journey:id,name,slug', 'destination:id,name,slug', 'experience:id,name,slug']);

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
