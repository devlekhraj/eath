<?php

namespace Admin\Http\Controllers\TravelPackage;


use Illuminate\Http\Request;
use Admin\Models\TravelPackage;
use Admin\Models\PackageCategory;
use App\Http\Controllers\Controller;
use App\Http\Resources\PackageCategoryResource;
use App\Http\Resources\TravelPackageResource;

class PackageCategoryController extends Controller
{


    public function saveCategory(Request $request)
    {
        $request->validate([
            'name'        => 'required|string|max:255|unique:package_categories,name,' . $request->id,
            'description' => 'nullable|string',
            'parent_id'   => 'nullable|exists:package_categories,id',
            'sort_order'  => 'nullable|integer',
            'id'          => 'nullable|exists:package_categories,id',
            'is_active'   => 'nullable|boolean',
        ]);


        $data = $request->only(['name', 'description', 'parent_id', 'sort_order']);

        $data["is_active"] = $request->boolean("is_active") ? 1 : 0;
        $category = PackageCategory::updateOrCreate(
            ['id' => $request->id],
            $data
        );

        return response()->json([
            'success' => true,
            'data'    => $category,
            'message' => $request->id ? 'Category updated successfully.' : 'Category created successfully.'
        ]);
    }

    public function getCategories(Request $request)
    {
        $query = PackageCategory::with(['parent', 'children']);

        if ($request->query('type') === 'parent') {
            $query->whereNull('parent_id');
        }

        $categories = $query->orderBy('sort_order', 'asc')->get();

        return response()->json([
            'success' => true,
            'data'    => PackageCategoryResource::collection($categories),
        ]);
    }

    public function toggleActive($id, Request $request)
    {
        $category = PackageCategory::findOrFail($id);
        $category->is_active = $request->boolean('is_active');
        $category->save();

        $statusText = $category->is_active ? 'activated' : 'deactivated';

        return response()->json([
            'success' => true,
            'message' => "{$category->name} has been {$statusText}.",
            'name' => $category->name,
            'is_active' => $category->is_active,
        ]);
    }

    // public function delete($id, Request $request)
    // {
    //     $category = PackageCategory::findOrFail($id);
    //     $category->delete(); // This will perform a soft delete

    //     return response()->json(['message' => 'Category deleted successfully.']);
    // }
    public function delete($id, Request $request)
    {
        $category = PackageCategory::findOrFail($id);
        $name = $category->name;
        $category->delete(); // Performs a soft delete

        return response()->json([
            'success' => true,
            'message' => "{$name} has been deleted.",
            'name' => $name,
        ]);
    }
}
