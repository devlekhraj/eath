<?php

namespace App\Http\Controllers\Api\V1\Admin\BlogCategory;


use App\Models\Blog;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\TravelPackage;
use App\Models\PackageCategory;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use App\Http\Resources\BlogCategoryResource;
use App\Http\Resources\PackageCategoryResource;
use App\Models\BlogCategory;

class BlogCategoryController extends Controller
{
    // public function index()
    // {
    //     // Logic to retrieve travel packages
    //     $blogCategories = BlogCategory::orderBy('sort_order','asc')->get();
    //     dd($blogCategories);

    //     return response()->json([
    //         'success' => true,
    //         'data' => $blogCategories
    //     ], 200);
    // }
    public function show(Request $request, $id)
    {
        // Logic to retrieve travel packages
        $package = BlogCategory::find($id);

        return response()->json([
            'success' => true,
            'data' => $package
        ], 200);
    }



    public function storeUpdate(Request $request)
    {
        $isUpdate = $request->has('id');

        $rules = [
            'id'                => 'nullable|exists:blog_categories,id',
            'title'             => 'required|string|max:255',
            'slug'              => [
                'required',
                'string',
                'max:255',
                $isUpdate
                    ? Rule::unique('blog_categories', 'slug')->ignore($request->id)
                    : Rule::unique('blog_categories', 'slug'),
            ],
            'sub_title'         => 'nullable|string|max:255',
            'content'           => 'required|string',
            'cover_image'       => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
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
        if ($request->hasFile('cover_image')) {
            $image = $request->file('cover_image');
            $imageName = time() . '_' . Str::slug($validated['title']) . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/blogs'), $imageName);
            $validated['cover_image'] = 'uploads/blogs/' . $imageName;
        }

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

        return response()->json([
            'message' => $message,
            'blog'    => $blog,
        ], $isUpdate ? 200 : 201);
    }



    public function saveCategory(Request $request)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'nullable|string',
            'parent_id'   => 'nullable|exists:blog_categories,id',
            'sort_order' => 'nullable|integer',
            'id'          => 'nullable|exists:blog_categories,id',
            'is_active' => 'nullable|boolean',
        ]);


        $data = $request->only(['name', 'description', 'parent_id','sort_order']);

        $data['is_active'] = $request->boolean('is_active') ? 1 : 0;

        $category = BlogCategory::updateOrCreate(
            ['id' => $request->id],
            $data
        );

        return response()->json([
            'success' => true,
            'data'    => $category,
            'message' => $request->id ? $category->name . ' category updated.' : $category->name . ' category created.'
        ]);
    }

    public function getCategories(Request $request)
    {
        $categories = BlogCategory::with('parent')
            ->orderBy('sort_order','asc')
            ->get();

        return response()->json([
            'success' => true,
            'data'    => BlogCategoryResource::collection($categories),
        ]);
    }


    public function toggleActive($id, Request $request)
    {
        $category = BlogCategory::findOrFail($id);
        $isActive = $request->boolean('is_active');

        $category->is_active = $isActive;
        $category->save();

        $status = $isActive ? 'active' : 'inactive';
        $message = "{$category->name} is now {$status}.";

        return response()->json(['success' => true, 'message' => $message]);
    }

    public function delete($id, Request $request)
    {
        $category = BlogCategory::findOrFail($id);
        $categoryName = $category->name;
        $category->delete(); // This will perform a soft delete

        return response()->json(['message' => "{$categoryName} deleted successfully."]);
    }
}
