<?php

namespace App\Http\Controllers\Api\V1\Admin\Blog;


use App\Models\Blog;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\TravelPackage;
use App\Models\PackageCategory;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use App\Http\Resources\BlogResource;
use App\Http\Resources\PackageCategoryResource;

class BlogController extends Controller
{
    public function index()
    {
        // Logic to retrieve travel packages
        $packages = Blog::all();

        return response()->json([
            'success' => true,
            'data' => $packages
        ], 200);
    }
    public function show(Request $request, $id)
    {
        // Retrieve the travel package by ID or fail with 404
        $blog = Blog::with('categories')->findOrFail($id);

        return response()->json([
            'success' => true,
            'data' => new BlogResource($blog),  // Use `new` here
            'message' => 'Blog retrieved successfully.'
        ], 200);
    }



    public function storeUpdate(Request $request)
    {
        $isUpdate = $request->has('id');

        $rules = [
            'id'                => 'nullable|exists:blogs,id',
            'title'             => 'required|string|max:255',
            'slug'              => [
                'required',
                'string',
                'max:255',
                $isUpdate
                    ? Rule::unique('blogs', 'slug')->ignore($request->id)
                    : Rule::unique('blogs', 'slug'),
            ],
            'sub_title'         => 'nullable|string|max:255',
            'content'           => 'required|string',
            'cover_image'       => 'nullable|string',
            'author'            => 'required|string|max:100',
            'is_published'      => 'nullable|boolean',
            'is_active'         => 'nullable|boolean',
            'meta_title'        => 'nullable|string|max:255',
            'meta_description'  => 'nullable|string|max:255',
            // 'meta_keyword'   => 'nullable|string|max:255',
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
        //     $image->move(public_path('uploads/blogs'), $imageName);
        //     $validated['cover_image'] = 'uploads/blogs/' . $imageName;
        // }

        // Set default values if not present
        $validated['is_published'] = $request->has('is_published') ? $validated['is_published'] : false;
        $validated['is_active'] = $request->has('is_active') ? $validated['is_active'] : false;

        if ($isUpdate) {

            $blog = Blog::findOrFail($request->id);
            $blog->update($validated);
            $message = 'Blog updated successfully.';
        } else {

            $blog = Blog::create($validated);
            $message = 'Blog created successfully.';
        }
        if (isset($request['category_ids'])) {
            $blog->categories()->sync($request['category_ids']);
        } else if ($isUpdate) {
            $blog->categories()->detach();
        }

        return response()->json([
            'message' => $message,
            'blog'    => $blog,
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
        $blog = Blog::findOrFail($id);
        $isActive = $request->boolean('is_active');

        $blog->is_active = $isActive ? 1 : 0;
        $blog->save();

        $message = $isActive ? 'Blog is now active.' : 'Blog is now inactive.';

        return response()->json(['success' => true, 'message' => $message]);
    }

    public function togglePublish($id, Request $request)
    {
        $blog = Blog::findOrFail($id);
        $isPublished = $request->boolean('is_published');

        $blog->is_published = $isPublished ? 1 : 0;

        if ($isPublished && is_null($blog->published_at)) {
            $blog->published_at = now();  // Set current datetime if null
        }

        $blog->save();

        $message = $isPublished ? 'Blog is published now.' : 'Blog is unpublished now.';

        return response()->json(['success' => true, 'message' => $message]);
    }
}
