<?php

namespace Admin\Http\Controllers\Guide;


use Admin\Models\Blog;
use Admin\Models\Guide;
use Admin\Models\Gallery;
use Admin\Models\GuideTrip;
use Admin\Models\GuideReview;
use Illuminate\Support\Str;
use Admin\Models\GalleryUsage;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Resources\GuideResource;


class GuideController extends Controller
{
    public function index()
    {
        $guideList = Guide::with(['mediaAttachments.mediaAsset'])->latest()->get();

        return response()->json([
            'success' => true,
            'data' => GuideResource::collection($guideList)
        ], 200);
    }

    public function storeUpdate(Request $request)
    {
        $id = $request->id;

        // Validation rules
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:guides,email' . ($id ? ',' . $id . ',id' : ''),
            'phone_no' => 'required|string|max:20',
            'language_spoken' => 'required|array',
            'language_spoken.*' => 'string|max:50', // each language must be string max 50 chars
            'bio' => 'nullable|string',
            'license_number' => 'nullable|string|max:100',
            'experience_years' => 'nullable|integer|min:0|max:100',
            'status' => 'nullable|in:active,inactive,deleted,pending,suspended',
            'media' => ['nullable', 'array'],
            'media.avatar' => ['nullable', 'integer', 'exists:media_assets,id'],
        ]);

        $mediaData = $validated['media'] ?? [];
        unset($validated['media']);

        if ($id) {
            $guide = Guide::findOrFail($id);
            $guide->update($validated);
        } else {
            $guide = Guide::create($validated);
        }

        if ($request->has('media')) {
            $guide->syncMediaFromRequest($mediaData);
        }

        $guide->load(['mediaAttachments.mediaAsset', 'reviews', 'trips']);

        return response()->json([
            'message' => 'Guide saved successfully',
            'data' => new GuideResource($guide),
        ]);
    }


    public function show(Request $request, $id)
    {
        $guide = Guide::with(['mediaAttachments.mediaAsset', 'reviews', 'trips'])->findOrFail($id);

        return response()->json([
            'success' => true,
            'data' => new GuideResource($guide),
        ], 200);
    }

    public function updateBio(Request $request, $id)
    {
        // Logic to retrieve travel packages
        $guide = Guide::find($id);
        $guide->bio = $request->bio;
        $guide->save();


        return response()->json([
            'success' => true,
            'data' => $guide,
            "message" => "Bio updated",
        ], 200);
    }


    public function guideReview(Request $request, $guideId)
    {
        $request->validate([
            'comment' => 'required|string',
            'rating' => 'required|integer|min:1|max:5',
            'id' => 'sometimes|integer|exists:guide_reviews,id',
        ]);

        $reviewer = auth()->user();

        if ($request->filled('id')) {
            // Update existing review
            $review = GuideReview::where('id', $request->id)
                ->where('reviewer_id', $reviewer->id)
                ->where('reviewer_type', get_class($reviewer))
                ->firstOrFail();

            $review->rating = $request->input('rating');
            $review->comment = $request->input('comment');
            $review->is_approved = false; // reset approval on update
            $review->save();

            $message = 'Review updated successfully';
        } else {
            // Create new review
            $review = GuideReview::create([
                'guide_id' => $guideId,
                'reviewer_id' => $reviewer->id,
                'reviewer_type' => get_class($reviewer),
                'rating' => $request->input('rating'),
                'comment' => $request->input('comment'),
                'is_approved' => false,
            ]);

            $message = 'Review submitted successfully';
        }

        return response()->json([
            'message' => $message,
            'review' => $review,
        ]);
    }

    public function guideTrip(Request $request, $guideId)
    {
        $validated = $request->validate([
            'id' => 'nullable|exists:guide_trips,id',
            'travel_package_id' => 'nullable|exists:travel_packages,id',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'group_size' => 'required|integer|min:1',
            'notes' => 'nullable|string',
        ]);


        $validated['start_date'] = Carbon::parse($validated['start_date'])->format('Y-m-d');
        $validated['end_date'] = Carbon::parse($validated['end_date'])->format('Y-m-d');

        if (isset($validated['id'])) {
            // Update existing trip
            $trip = GuideTrip::where('id', $validated['id'])
                ->where('guide_id', $guideId)
                ->firstOrFail();

            $trip->update([
                'travel_package_id' => $validated['travel_package_id'] ?? null,
                'start_date' => $validated['start_date'],
                'end_date' => $validated['end_date'],
                'group_size' => $validated['group_size'],
                'notes' => $validated['notes'] ?? null,
            ]);

            $message = 'Guide trip updated successfully';
        } else {
            // Create new trip
            $trip = GuideTrip::create([
                'guide_id' => $guideId,
                'travel_package_id' => $validated['travel_package_id'] ?? null,
                'start_date' => $validated['start_date'],
                'end_date' => $validated['end_date'],
                'group_size' => $validated['group_size'],
                'notes' => $validated['notes'] ?? null,
            ]);

            $message = 'Guide trip added successfully';
        }

        return response()->json([
            'message' => $message,
            'trip' => $trip,
        ]);
    }




    public function uploadImage(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        $image = $request->file('image');

        $originalName = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);
        $safeName = Str::slug($originalName, '-');
        $extension = $image->getClientOriginalExtension();

        $year = now()->format('Y');
        $month = now()->format('m');
        $relativePath = "gallery/{$year}/{$month}";
        $fullPath = storage_path($relativePath);

        if (!File::exists($fullPath)) {
            File::makeDirectory($fullPath, 0755, true);
        }

        $filename = $safeName . '.' . $extension;
        $counter = 0;
        while (File::exists($fullPath . '/' . $filename)) {
            $counter++;
            $filename = $safeName . '-' . $counter . '.' . $extension;
        }

        $mimeType = $image->getMimeType();
        $image->move($fullPath, $filename);

        $filepath = "{$relativePath}/{$filename}";
        $fileSize = File::size($fullPath . '/' . $filename); // in bytes
        $gallery = Gallery::create([
            'filename' => $filename,
            'filepath' => $filepath,
            'mime_type' => $mimeType,
            'file_size' => $fileSize,
            'alt_text' => null,
            'image_url' => route('image.view', ['filename' => $filename]),
        ]);


        if ($request->has('usage_type') && $request->has('usage_id')) {
            $usageType = $request->input('usage_type');
            $usageId = $request->input('usage_id');
            $gallery->usages()->create([
                "usage_type" => $usageType,
                "usage_id" => $usageId
            ]);

            switch ($request->usage_type) {
                case 'blogs':
                    $blog = Blog::find($request->usage_id);
                    $blog->cover_image = $filename;
                    $blog->save();
                    break;
                default:
                    break;
            }
        }

        return response()->json([
            'success' => true,
            "filename" => $filename,
            'data' => $gallery,
            'url' => route('image.view', ['filename' => $filename]),
        ], 201);
    }

    public function getImage($filename)
    {
        $file = Gallery::where('filename', $filename)->first();
        if (!$file) {
            return response()->file(public_path('images/logo.png'));
        }

        $filePath = storage_path($file->filepath);

        if (!file_exists($filePath)) {
            return response()->file(public_path('images/logo.png'));
        }

        return response()->file($filePath, [
            'Content-Type' => mime_content_type($filePath),
        ]);
    }

    public function deleteGuide($id)
    {
        $guide = Guide::find($id);

        if (!$guide) {
            return response()->json(['message' => 'guide not found'], 404);
        }

        $guide->delete();

        return response()->json(['message' => $guide->name . ' deleted successfully']);
    }
}
