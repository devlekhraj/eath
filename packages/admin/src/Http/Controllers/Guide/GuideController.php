<?php

namespace Admin\Http\Controllers\Guide;

use Admin\Models\Guide;
use Admin\Models\Journey;
use Admin\Services\AuthService;
use App\Http\Controllers\Controller;
use App\Http\Resources\GuideResource;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class GuideController extends Controller
{
    public function __construct(
        protected AuthService $authService
    ) {}

    public function index(Request $request)
    {
        $query = Guide::query()
            ->with(['mediaAttachments.mediaAsset'])
            ->withCount(['journeys', 'reviews']);

        if ($request->filled('search')) {
            $search = $request->string('search')->toString();
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('phone', 'like', "%{$search}%");
            });
        }

        if ($request->has('is_active')) {
            $query->where('is_active', $request->boolean('is_active'));
        }

        $guideList = $query->orderBy('sort_order')->latest('id')->get();

        return response()->json([
            'success' => true,
            'data' => GuideResource::collection($guideList),
        ], 200);
    }

    public function show(Request $request, $id)
    {
        $guide = Guide::with([
            'mediaAttachments.mediaAsset',
            'reviews',
            'journeys',
        ])->withCount(['journeys', 'reviews'])->findOrFail($id);

        return response()->json([
            'success' => true,
            'data' => new GuideResource($guide),
        ], 200);
    }

    public function storeUpdate(Request $request)
    {
        $id = $request->input('id');

        $validated = $request->validate([
            'id' => ['nullable', 'integer', 'exists:guides,id'],
            'name' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255', 'unique:guides,slug' . ($id ? ',' . $id . ',id' : '')],
            'role' => ['nullable', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:guides,email' . ($id ? ',' . $id . ',id' : '')],
            'phone' => ['nullable', 'string', 'max:50'],
            'phone_no' => ['nullable', 'string', 'max:50'],
            'biography' => ['nullable', 'string'],
            'bio' => ['nullable', 'string'],
            'languages' => ['nullable', 'array'],
            'languages.*' => ['string', 'max:50'],
            'language_spoken' => ['nullable', 'array'],
            'language_spoken.*' => ['string', 'max:50'],
            'qualifications' => ['nullable', 'array'],
            'qualifications.*' => ['string', 'max:100'],
            'years_experience' => ['nullable', 'integer', 'min:0', 'max:100'],
            'experience_years' => ['nullable', 'integer', 'min:0', 'max:100'],
            'is_featured' => ['nullable', 'boolean'],
            'is_active' => ['nullable', 'boolean'],
            'status' => ['nullable', 'string'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
            'meta_title' => ['nullable', 'string', 'max:255'],
            'meta_description' => ['nullable', 'string', 'max:300'],
            'media' => ['nullable', 'array'],
            'media.avatar' => ['nullable', 'integer', 'exists:media_assets,id'],
        ]);

        $payload = [
            'name' => $validated['name'],
            'slug' => !empty($validated['slug']) ? Str::slug($validated['slug']) : Str::slug($validated['name']),
            'role' => $validated['role'] ?? null,
            'email' => $validated['email'],
            'phone' => $validated['phone'] ?? $validated['phone_no'] ?? null,
            'biography' => $validated['biography'] ?? $validated['bio'] ?? null,
            'languages' => $validated['languages'] ?? $validated['language_spoken'] ?? [],
            'qualifications' => $validated['qualifications'] ?? [],
            'years_experience' => $validated['years_experience'] ?? $validated['experience_years'] ?? 0,
            'is_featured' => $request->boolean('is_featured'),
            'sort_order' => $validated['sort_order'] ?? 0,
            'meta_title' => $validated['meta_title'] ?? null,
            'meta_description' => $validated['meta_description'] ?? null,
        ];

        if ($request->has('is_active')) {
            $payload['is_active'] = $request->boolean('is_active');
        } elseif ($request->has('status')) {
            $payload['is_active'] = $request->input('status') === 'active';
        } else {
            $payload['is_active'] = true;
        }

        if ($id) {
            $guide = Guide::findOrFail($id);
            $guide->update($payload);
        } else {
            $guide = Guide::create($payload);
        }

        if ($request->has('media')) {
            $guide->syncMediaFromRequest($validated['media'] ?? []);
        }

        $guide->load([
            'mediaAttachments.mediaAsset',
            'reviews',
            'journeys',
        ])->loadCount(['journeys', 'reviews']);

        return response()->json([
            'success' => true,
            'message' => $id ? 'Guide updated successfully' : 'Guide created successfully',
            'data' => new GuideResource($guide),
        ]);
    }

    public function updateBio(Request $request, $id)
    {
        $validated = $request->validate([
            'bio' => ['nullable', 'string'],
            'biography' => ['nullable', 'string'],
        ]);

        $guide = Guide::findOrFail($id);
        $guide->biography = $validated['biography'] ?? $validated['bio'] ?? null;
        $guide->save();

        return response()->json([
            'success' => true,
            'message' => 'Bio updated successfully',
            'data' => new GuideResource($guide->load(['mediaAttachments.mediaAsset', 'reviews', 'journeys'])),
        ], 200);
    }

    public function guideReview(Request $request, $guideId)
    {
        $guide = Guide::findOrFail($guideId);

        $validated = $request->validate([
            'id' => ['nullable', 'integer', 'exists:guide_reviews,id'],
            'rating' => ['required', 'integer', 'min:1', 'max:5'],
            'comment' => ['nullable', 'string'],
            'body' => ['nullable', 'string'],
            'reviewer_name' => ['nullable', 'string', 'max:255'],
            'reviewer_country' => ['nullable', 'string', 'max:100'],
            'title' => ['nullable', 'string', 'max:255'],
            'reviewed_on' => ['nullable', 'date'],
            'is_published' => ['nullable', 'boolean'],
            'is_featured' => ['nullable', 'boolean'],
        ]);

        $body = $validated['body'] ?? $validated['comment'] ?? '';
        $reviewerName = $validated['reviewer_name'] ?? $this->authService->name('Anonymous Explorer');

        $reviewData = [
            'guide_id' => $guide->id,
            'rating' => $validated['rating'],
            'body' => $body,
            'reviewer_name' => $reviewerName,
            'reviewer_country' => $validated['reviewer_country'] ?? null,
            'title' => $validated['title'] ?? null,
            'reviewed_on' => $validated['reviewed_on'] ?? now()->toDateString(),
            'is_published' => $validated['is_published'] ?? true,
            'is_featured' => $validated['is_featured'] ?? false,
        ];

        if (!empty($validated['id'])) {
            $review = $guide->reviews()->findOrFail($validated['id']);
            $review->update($reviewData);
            $message = 'Review updated successfully';
        } else {
            $review = $guide->reviews()->create($reviewData);
            $message = 'Review submitted successfully';
        }

        return response()->json([
            'success' => true,
            'message' => $message,
            'data' => $review,
            'review' => $review,
        ]);
    }

    public function guideTrip(Request $request, $guideId)
    {
        $guide = Guide::findOrFail($guideId);

        $validated = $request->validate([
            'journey_id' => ['nullable', 'integer', 'exists:journeys,id'],
            'travel_package_id' => ['nullable', 'integer', 'exists:journeys,id'],
            'role' => ['nullable', 'string', 'max:255'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
            'start_date' => ['nullable', 'date'],
            'end_date' => ['nullable', 'date'],
            'group_size' => ['nullable', 'integer', 'min:1'],
            'notes' => ['nullable', 'string'],
        ]);

        $journeyId = $validated['journey_id'] ?? $validated['travel_package_id'] ?? null;
        if (!$journeyId) {
            return response()->json([
                'success' => false,
                'message' => 'Please select a valid journey or trek.',
            ], 422);
        }

        $role = $validated['role'] ?? $validated['notes'] ?? 'Lead Guide';
        $sortOrder = $validated['sort_order'] ?? 0;

        $guide->journeys()->syncWithoutDetaching([
            $journeyId => [
                'role' => $role,
                'sort_order' => $sortOrder,
            ],
        ]);

        $journey = Journey::find($journeyId);

        return response()->json([
            'success' => true,
            'message' => 'Guide assigned to journey successfully',
            'trip' => [
                'id' => $journeyId,
                'journey_id' => $journeyId,
                'travel_package_id' => $journeyId,
                'travel_package' => ['name' => $journey?->name],
                'role' => $role,
            ],
        ]);
    }

    public function deleteGuide($id)
    {
        $guide = Guide::findOrFail($id);
        $name = $guide->name;
        $guide->delete();

        return response()->json([
            'success' => true,
            'message' => "Guide '{$name}' deleted successfully",
        ]);
    }
}
