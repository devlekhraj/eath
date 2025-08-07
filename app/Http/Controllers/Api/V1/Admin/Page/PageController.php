<?php

namespace App\Http\Controllers\Api\V1\Admin\Page;


use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;

class PageController extends Controller
{
    public function index()
    {
        // Logic to retrieve travel packages
        $pages = Page::orderBy('created_at','desc')->get();

        return response()->json([
            'success' => true,
            'data' => $pages
        ], 200);
    }
    public function show(Request $request, $id)
    {
        // Retrieve the travel package by ID or fail with 404
        $page = Page::findOrFail($id);

        return response()->json([
            'success' => true,
            'data' => $page,
            'message' => 'Page retrieved.'
        ], 200);
    }
    public function pageDelete(Request $request, $id)
    {
        // Retrieve the travel package by ID or fail with 404
        $page = Page::findOrFail($id);
        $page->delete();

        return response()->json([
            'success' => true,
            'message' => $page->title.' deleted.'
        ], 200);

    }



    public function storeUpdate(Request $request)
    {
        $isUpdate = $request->has('id');

        $rules = [
            'id'                => 'nullable|exists:pages,id',
            'title'             => 'required|string|max:255',
            'slug'              => [
                'nullable',
                'string',
                'max:255',
                $isUpdate
                    ? Rule::unique('pages', 'slug')->ignore($request->id)
                    : Rule::unique('pages', 'slug'),
            ],
            'content'           => 'nullable|string',
            'is_active'         => 'nullable|boolean',
        ];

        $validated = $request->validate($rules);


        // Convert empty strings to null to avoid saving "" strings in DB
        foreach ($validated as $key => $value) {
            if (is_string($value) && trim($value) === '') {
                $validated[$key] = null;
            }
        }

        // Handle image upload
        // if ($request->hasFile('cover_image')) {
        //     $image = $request->file('cover_image');
        //     $imageName = time() . '_' . Str::slug($validated['title']) . '.' . $image->getClientOriginalExtension();
        //     $image->move(public_path('uploads/pages'), $imageName);
        //     $validated['cover_image'] = 'uploads/pages/' . $imageName;
        // }

        // Set default values if not present
  
        $validated['is_active'] = $request->has('is_active') ? $validated['is_active'] : false;

        if ($isUpdate) {
            $page = Page::findOrFail($request->id);
            $page->update($validated);
            $message = 'page updated successfully.';
        } else {

            $page = Page::create($validated);
            $message = 'page created successfully.';
        }
     
        return response()->json([
            'message' => $message,
            'page'    => $page,
        ], $isUpdate ? 200 : 201);
    }









    // public function saveCategory(Request $request)
    // {
    //     $request->validate([
    //         'name'        => 'required|string|max:255',
    //         'description' => 'nullable|string',
    //         'parent_id'   => 'nullable|exists:package_categories,id',
    //         'seq_no' => 'nullable|integer',
    //         'id'          => 'nullable|exists:package_categories,id',
    //     ]);

    //     $data = $request->only(['name', 'description', 'parent_id']);

    //     $category = PackageCategory::updateOrCreate(
    //         ['id' => $request->id],
    //         $data
    //     );

    //     return response()->json([
    //         'success' => true,
    //         'data'    => $category,
    //         'message' => $request->id ? 'Category updated successfully.' : 'Category created successfully.'
    //     ]);
    // }

    // public function getCategories(Request $request)
    // {
    //     $query = PackageCategory::with(['parent', 'children']);

    //     if ($request->query('type') === 'parent') {
    //         $query->whereNull('parent_id');
    //     }

    //     $categories = $query->get();

    //     return response()->json([
    //         'success' => true,
    //         'data'    => PackageCategoryResource::collection($categories),
    //     ]);
    // }

    public function toggleActive($id, Request $request)
    {
        $page = Page::findOrFail($id);
        $isActive = $request->boolean('is_active');

        $page->is_active = $isActive ? 1 : 0;
        $page->save();

        $message = $isActive ? 'page is now active.' : 'page is now inactive.';

        return response()->json(['success' => true, 'message' => $message]);
    }

    public function togglePublish($id, Request $request)
    {
        $page = Page::findOrFail($id);
        $isPublished = $request->boolean('is_published');

        $page->is_published = $isPublished ? 1 : 0;

        if ($isPublished && is_null($page->published_at)) {
            $page->published_at = now();  // Set current datetime if null
        }

        $page->save();

        $message = $isPublished ? 'page is published now.' : 'page is unpublished now.';

        return response()->json(['success' => true, 'message' => $message]);
    }
}
