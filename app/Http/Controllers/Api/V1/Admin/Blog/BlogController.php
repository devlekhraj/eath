<?php

namespace App\Http\Controllers\Api\V1\Admin\Blog;


use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use App\Http\Resources\BlogResource;
use Illuminate\Validation\ValidationException;

class BlogController extends Controller
{
    public function index()
    {
        // Logic to retrieve travel packages
        $blogs = Blog::with(['categories', 'coverImage', 'images.gallery.variants'])
            ->orderBy('created_at','desc')
            ->get();

        return response()->json([
            'success' => true,
            'data' => BlogResource::collection($blogs)
        ], 200);
    }
    public function show(Request $request, $id)
    {
        // Retrieve the travel package by ID or fail with 404
        $blog = Blog::with(['category','images.gallery.variants'])->findOrFail($id);

        return response()->json([
            'success' => true,
            'data' => new BlogResource($blog),  // Use `new` here
            'message' => 'Blog retrieved.'
        ], 200);
    }
    public function delete(Request $request, $id)
    {
        // Retrieve the travel package by ID or fail with 404
        $blog = Blog::findOrFail($id);
        $blog->delete();

        return response()->json([
            'success' => true,
            'message' => $blog->title.' deleted.'
        ], 200);

    }

    public function store(Request $request)
    {
        $validated = $this->validatePayload($request, false);
        $validated = $this->normalizePayload($validated, $request, false);

        $blog = Blog::create($validated);

        if (isset($request['category_ids'])) {
            $blog->categories()->sync($request['category_ids']);
        }

        return response()->json([
            'message' => 'Blog created successfully.',
            'blog'    => $blog,
        ], 201);
    }

    public function update(Request $request, $id)
    {
        $blog = Blog::findOrFail($id);
        $validated = $this->validatePayload($request, true, $id);
        $validated = $this->normalizePayload($validated, $request, true);

        $blog->update($validated);

        if (isset($request['category_ids'])) {
            $blog->categories()->sync($request['category_ids']);
        } else {
            $blog->categories()->detach();
        }

        return response()->json([
            'message' => 'Blog updated successfully.',
            'blog'    => $blog,
        ], 200);
    }

    private function validatePayload(Request $request, bool $isUpdate, ?int $blogId = null): array
    {
        $rules = [
            'title' => $isUpdate ? 'sometimes|string|max:255' : 'required|string|max:255',
            'slug' => [
                'sometimes',
                'nullable',
                'string',
                'max:255',
                $isUpdate
                    ? Rule::unique('blogs', 'slug')->ignore($blogId)
                    : Rule::unique('blogs', 'slug'),
            ],
            'sub_title' => 'sometimes|nullable|string|max:255',
            'content' => 'sometimes|nullable|string',
            'cover_image' => 'sometimes|nullable|string',
            'author' => 'sometimes|nullable|string|max:100',
            'is_published' => 'sometimes|nullable|boolean',
            'is_active' => 'sometimes|nullable|boolean',
            'meta_title' => 'sometimes|nullable|string|max:255',
            'meta_description' => 'sometimes|nullable|string|max:255',
            'meta_keyword' => 'sometimes|nullable|string|max:255',
            'category_id' => 'sometimes|nullable|exists:blog_categories,id',
        ];

        $validated = $request->validate($rules);

        if ($isUpdate) {
            $updatableFields = [
                'title',
                'slug',
                'sub_title',
                'content',
                'cover_image',
                'author',
                'is_published',
                'is_active',
                'meta_title',
                'meta_description',
                'meta_keyword',
                'category_id',
            ];

            $hasAtLeastOneValue = collect($updatableFields)->contains(function ($field) use ($request) {
                if (! $request->has($field)) {
                    return false;
                }
                $value = $request->input($field);
                if (is_string($value)) {
                    return trim($value) !== '';
                }
                return ! is_null($value);
            });

            if (! $hasAtLeastOneValue) {
                throw ValidationException::withMessages([
                    'payload' => ['At least one field value is required.'],
                ]);
            }
        }

        return $validated;
    }

    private function normalizePayload(array $validated, Request $request, bool $isUpdate): array
    {
        $validated['author'] = isset($request->author) ? $request->author : 'admin';

        // Convert empty strings to null to avoid saving "" strings in DB
        foreach ($validated as $key => $value) {
            if (is_string($value) && trim($value) === '') {
                $validated[$key] = null;
            }
        }

        // Set default values if not present
        if (! $isUpdate) {
            $validated['is_published'] = $request->has('is_published') ? $validated['is_published'] : false;
            $validated['is_active'] = $request->has('is_active') ? $validated['is_active'] : false;
        }

        return $validated;
    }


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
