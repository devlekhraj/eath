<?php

namespace Admin\Http\Controllers\WebsiteSection;

use App\Http\Controllers\Controller;
use Admin\Models\WebsiteSection;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class WebsiteSectionController extends Controller
{
    public function index(Request $request)
    {
        $query = WebsiteSection::query()
            ->with(['mediaAsset'])
            ->orderBy('page_key')
            ->orderBy('sort_order', 'asc');

        if ($request->filled('page_key')) {
            $query->where('page_key', $request->input('page_key'));
        }

        if ($request->filled('search')) {
            $search = trim($request->input('search'));
            $query->where(function ($q) use ($search) {
                $q->where('heading', 'like', "%{$search}%")
                  ->orWhere('page_key', 'like', "%{$search}%")
                  ->orWhere('section_key', 'like', "%{$search}%")
                  ->orWhere('eyebrow', 'like', "%{$search}%")
                  ->orWhere('body', 'like', "%{$search}%");
            });
        }

        if ($request->filled('is_active')) {
            $query->where('is_active', $request->boolean('is_active'));
        }

        $sections = $query->get();

        return response()->json([
            'success' => true,
            'data' => $sections,
        ]);
    }

    public function show($id)
    {
        $section = WebsiteSection::with(['mediaAsset'])->findOrFail($id);

        return response()->json([
            'success' => true,
            'data' => $section,
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'page_key' => ['required', 'string', 'max:100'],
            'section_key' => [
                'required',
                'string',
                'max:100',
                Rule::unique('website_sections')->where(fn ($q) => $q->where('page_key', $request->page_key)),
            ],
            'heading' => ['nullable', 'string', 'max:255'],
            'eyebrow' => ['nullable', 'string'],
            'body' => ['nullable', 'string'],
            'content' => ['nullable'],
            'media_asset_id' => ['nullable', 'integer', 'exists:media_assets,id'],
            'is_active' => ['nullable', 'boolean'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
        ]);

        $validated['is_active'] = $request->has('is_active') ? $request->boolean('is_active') : true;
        $validated['sort_order'] = $validated['sort_order'] ?? 0;

        $section = WebsiteSection::create($validated);
        $section->load('mediaAsset');

        return response()->json([
            'success' => true,
            'message' => 'Website section created successfully.',
            'data' => $section,
        ], 201);
    }

    public function update(Request $request, $id)
    {
        $section = WebsiteSection::findOrFail($id);

        $validated = $request->validate([
            'page_key' => ['sometimes', 'required', 'string', 'max:100'],
            'section_key' => [
                'sometimes',
                'required',
                'string',
                'max:100',
                Rule::unique('website_sections')->where(fn ($q) => $q->where('page_key', $request->input('page_key', $section->page_key)))->ignore($id),
            ],
            'heading' => ['nullable', 'string', 'max:255'],
            'eyebrow' => ['nullable', 'string'],
            'body' => ['nullable', 'string'],
            'content' => ['nullable'],
            'media_asset_id' => ['nullable', 'integer', 'exists:media_assets,id'],
            'is_active' => ['nullable', 'boolean'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
        ]);

        $section->update($validated);
        $section->load('mediaAsset');

        return response()->json([
            'success' => true,
            'message' => 'Website section updated successfully.',
            'data' => $section,
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
        $section = WebsiteSection::findOrFail($id);
        $section->delete();

        return response()->json([
            'success' => true,
            'message' => 'Website section deleted successfully.',
        ]);
    }

    public function delete($id)
    {
        return $this->destroy($id);
    }

    public function toggleActive($id, Request $request)
    {
        $section = WebsiteSection::findOrFail($id);
        $section->is_active = $request->has('is_active') ? $request->boolean('is_active') : !$section->is_active;
        $section->save();

        $statusText = $section->is_active ? 'active' : 'inactive';

        return response()->json([
            'success' => true,
            'message' => "Section is now {$statusText}.",
            'is_active' => $section->is_active,
        ]);
    }
}
