<?php

namespace App\Http\Controllers\Api\V1\Admin\Inquiry;


use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use App\Models\Faq;
use App\Models\Inquiry;
use App\Models\Setting;

class InquiryController extends Controller
{
    public function index()
    {
        // Logic to retrieve travel packages
        $inquiry = Inquiry::orderBy('created_at','desc')->get();

        return response()->json([
            'success' => true,
            'data' => $inquiry
        ], 200);
    }
    public function show(Request $request, $id)
    {
        // Retrieve the travel package by ID or fail with 404
        $page = Inquiry::findOrFail($id);

        return response()->json([
            'success' => true,
            'data' => $page,
            'message' => 'Page retrieved.'
        ], 200);
    }
    public function delete(Request $request, $id)
    {
        // Retrieve the travel package by ID or fail with 404
        $inquiry = Inquiry::findOrFail($id);
        $inquiry->delete();

        return response()->json([
            'success' => true,
            'message' => $inquiry->title.' deleted.'
        ], 200);

    }



    public function storeUpdate(Request $request)
    {
        $isUpdate = $request->has('id');

        $rules = [
            'id'                => 'nullable|exists:faqs,id',
            'question'             => 'required|string',
            'answer'             => 'required|string',
        ];

        $validated = $request->validate($rules);


      
        if ($isUpdate) {
            $inquiry = Inquiry::findOrFail($request->id);
            $inquiry->update($validated);
            $message = 'Setting updated successfully.';
        } else {

            $inquiry = Inquiry::create($validated);
            $message = 'Setting created successfully.';
        }
     
        return response()->json([
            'message' => $message,
            'Setting'    => $inquiry,
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
