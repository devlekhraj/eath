<?php

namespace Admin\Http\Controllers\Journey;

use App\Http\Controllers\Controller;
use Admin\Models\Destination;
use Admin\Models\Journey;
use Admin\Models\JourneyDeparture;
use Admin\Models\JourneyHighlight;
use Admin\Models\JourneyService;
use Admin\Models\MediaAttachment;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class JourneyController extends Controller
{
    public function index(Request $request)
    {
        $perPage = (int) $request->input('per_page', 20);
        $perPage = max(1, min($perPage, 100));
        $search = trim((string) $request->input('search', ''));

        $journeys = Journey::query()
            ->with(['destination:id,name,slug', 'guide:id,name'])
            ->withCount(['itineraryDays', 'departures'])
            ->when($search !== '', function ($query) use ($search) {
                $query->where(function ($inner) use ($search) {
                    $inner->where('name', 'like', "%{$search}%")
                        ->orWhere('slug', 'like', "%{$search}%")
                        ->orWhere('summary', 'like', "%{$search}%");
                });
            })
            ->orderBy('sort_order')
            ->orderBy('name')
            ->paginate($perPage);

        return response()->json([
            'success' => true,
            'data' => $journeys->getCollection()->map(fn (Journey $journey) => $this->serializeJourneyListItem($journey))->values(),
            'meta' => [
                'current_page' => $journeys->currentPage(),
                'last_page' => $journeys->lastPage(),
                'per_page' => $journeys->perPage(),
                'total' => $journeys->total(),
            ],
        ]);
    }

    public function show(Request $request, $id)
    {
        $journey = Journey::query()
            ->with([
                'destination:id,name,slug',
                'guide:id,name',
                'experiences:id,name,slug',
                'travelMonths:id,name,slug,month_number,season',
                'itineraryDays.highlights',
                'highlights',
                'services',
                'prices',
                'departures.plannerSubmissions',
                'guides:id,name',
                'heroAttachment.mediaAsset',
                'cardAttachment.mediaAsset',
                'routeMapAttachment.mediaAsset',
                'galleryAttachments.mediaAsset',
                'safetyItems',
            ])
            ->findOrFail($id);

        return response()->json([
            'success' => true,
            'data' => $this->serializeJourney($journey),
            'message' => 'Journey retrieved successfully.',
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->merge(['id' => $id]);
        return $this->storeUpdate($request);
    }

    public function storeUpdate(Request $request)
    {
        $id = $request->input('id') ?? $request->route('id');
        $isUpdate = !empty($id);

        $rules = [
            'id' => ['nullable', 'integer', 'exists:journeys,id'],
            'destination_id' => ['nullable', 'integer', 'exists:destinations,id'],
            'guide_id' => ['nullable', 'integer', 'exists:guides,id'],
            'name' => [
                $isUpdate ? 'sometimes' : 'required',
                'string',
                'max:255',
                Rule::unique('journeys', 'name')->ignore($id),
            ],
            'slug' => [
                'nullable',
                'string',
                'max:255',
                'regex:/^[a-z0-9]+(?:-[a-z0-9]+)*$/',
                Rule::unique('journeys', 'slug')->ignore($id),
            ],
            'subtitle' => ['nullable', 'string', 'max:255'],
            'summary' => ['nullable', 'string'],
            'description' => ['nullable', 'string'],
            'overview_secondary' => ['nullable', 'string'],
            'duration_days' => ['nullable', 'integer', 'min:1', 'max:365'],
            'duration_nights' => ['nullable', 'integer', 'min:0', 'max:365'],
            'difficulty' => ['nullable', Rule::in(Journey::DIFFICULTIES)],
            'max_altitude_m' => ['nullable', 'integer', 'min:0', 'max:9000'],
            'walking_hours_min' => ['nullable', 'integer', 'min:0', 'max:24'],
            'walking_hours_max' => ['nullable', 'integer', 'min:0', 'max:24'],
            'accommodation_style' => ['nullable', Rule::in(Journey::ACCOMMODATION_STYLES)],
            'pace' => ['nullable', Rule::in(Journey::PACES)],
            'price_minor' => ['nullable', 'integer', 'min:0'],
            'price' => ['nullable', 'numeric', 'min:0'],
            'currency' => ['nullable', 'string', 'size:3'],
            'pricing_basis' => ['nullable', Rule::in(Journey::PRICING_BASES)],
            'featured_rank' => ['nullable', 'integer', 'min:0'],
            'is_featured' => ['nullable', 'boolean'],
            'is_active' => ['nullable', 'boolean'],
            'is_published' => ['nullable', 'boolean'],
            'published_at' => ['nullable', 'date'],
            'hero_image_id' => ['nullable', 'integer', 'exists:media_assets,id'],
            'card_image_id' => ['nullable', 'integer', 'exists:media_assets,id'],
            'route_map_image_id' => ['nullable', 'integer', 'exists:media_assets,id'],
            'accommodation_note' => ['nullable', 'string'],
            'logistics_note' => ['nullable', 'string'],
            'safety_note' => ['nullable', 'string'],
            'route_map_note' => ['nullable', 'string'],
            'preparation_note' => ['nullable', 'string'],
            'packing_note' => ['nullable', 'string'],
            'operational_notice' => ['nullable', 'string'],
            'cta_title' => ['nullable', 'string', 'max:255'],
            'cta_description' => ['nullable', 'string'],
            'cta_primary_btn_text' => ['nullable', 'string', 'max:100'],
            'cta_primary_btn_url' => ['nullable', 'string', 'max:255'],
            'cta_secondary_btn_text' => ['nullable', 'string', 'max:100'],
            'cta_secondary_btn_url' => ['nullable', 'string', 'max:255'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
            'meta_title' => ['nullable', 'string', 'max:255'],
            'meta_description' => ['nullable', 'string', 'max:300'],
            'experience_ids' => ['nullable', 'array'],
            'experience_ids.*' => ['integer', 'exists:experiences,id'],
            'travel_month_ids' => ['nullable', 'array'],
            'travel_month_ids.*' => ['integer', 'exists:travel_months,id'],
            'safety_items' => ['nullable', 'array'],
        ];

        $validated = $request->validate($rules);

        if ($isUpdate) {
            $journey = Journey::query()->findOrFail($id);

            if (array_key_exists('name', $validated) && !array_key_exists('slug', $validated)) {
                $validated['slug'] = Str::slug($validated['name']);
            }

            if (array_key_exists('price', $validated) && !array_key_exists('price_minor', $validated)) {
                $validated['price_minor'] = (int) round(((float) $validated['price']) * 100);
            }

            if (array_key_exists('currency', $validated)) {
                $validated['currency'] = strtoupper((string) $validated['currency']);
            }

            if (!empty($validated['is_published']) && empty($validated['published_at']) && empty($journey->published_at)) {
                $validated['published_at'] = now();
            }

            $payload = Arr::only($validated, (new Journey())->getFillable());
            if (!empty($payload)) {
                $journey->update($payload);
            }
        } else {
            $validated['slug'] = $validated['slug'] ?? Str::slug($validated['name']);

            if (array_key_exists('price', $validated) && !array_key_exists('price_minor', $validated)) {
                $validated['price_minor'] = (int) round(((float) $validated['price']) * 100);
            }

            $validated['destination_id'] = $validated['destination_id']
                ?? Destination::query()->orderBy('sort_order')->orderBy('name')->value('id');

            abort_if(!$validated['destination_id'], 422, 'Please create at least one destination before creating a journey.');

            $payload = Arr::only($validated, (new Journey())->getFillable());
            $payload['summary'] = $payload['summary'] ?? "Draft journey summary for {$validated['name']}.";
            $payload['duration_days'] = $payload['duration_days'] ?? 1;
            $payload['duration_nights'] = $payload['duration_nights'] ?? max(0, $payload['duration_days'] - 1);
            $payload['price_minor'] = $payload['price_minor'] ?? 0;
            $payload['currency'] = strtoupper($payload['currency'] ?? 'USD');
            $payload['pricing_basis'] = $payload['pricing_basis'] ?? Journey::PRICING_BASIS_PER_PERSON;
            $payload['is_active'] = $payload['is_active'] ?? false;
            $payload['is_published'] = $payload['is_published'] ?? false;
            if (!empty($payload['is_published']) && empty($payload['published_at'])) {
                $payload['published_at'] = now();
            }

            $journey = Journey::query()->create($payload);
        }

        if ($request->has('hero_image_id')) {
            $heroId = $request->input('hero_image_id');
            if ($heroId) {
                $journey->syncMediaAttachment((int) $heroId, MediaAttachment::COLLECTION_HERO);
            } else {
                $journey->detachMediaCollection(MediaAttachment::COLLECTION_HERO);
            }
        }

        if ($request->has('card_image_id')) {
            $cardId = $request->input('card_image_id');
            if ($cardId) {
                $journey->syncMediaAttachment((int) $cardId, MediaAttachment::COLLECTION_CARD);
            } else {
                $journey->detachMediaCollection(MediaAttachment::COLLECTION_CARD);
            }
        }

        if ($request->has('route_map_image_id')) {
            $routeMapId = $request->input('route_map_image_id');
            if ($routeMapId) {
                $journey->syncMediaAttachment((int) $routeMapId, MediaAttachment::COLLECTION_ROUTE_MAP);
            } else {
                $journey->detachMediaCollection(MediaAttachment::COLLECTION_ROUTE_MAP);
            }
        }

        if (array_key_exists('experience_ids', $validated)) {
            $journey->experiences()->sync($validated['experience_ids'] ?? []);
        }

        if (array_key_exists('travel_month_ids', $validated)) {
            $journey->travelMonths()->sync($validated['travel_month_ids'] ?? []);
        }

        if ($request->has('safety_items')) {
            $submittedItems = $request->input('safety_items', []);
            $journey->safetyItems()->delete();
            foreach ($submittedItems as $index => $sItem) {
                if (!empty($sItem['title'])) {
                    $journey->safetyItems()->create([
                        'title' => $sItem['title'],
                        'description' => $sItem['description'] ?? '',
                        'icon' => $sItem['icon'] ?? null,
                        'sort_order' => $sItem['sort_order'] ?? ($index + 1),
                        'is_active' => $sItem['is_active'] ?? true,
                    ]);
                }
            }
        }

        return response()->json([
            'success' => true,
            'data' => $this->serializeJourney($journey->fresh()->load([
                'destination',
                'guide:id,name',
                'experiences',
                'travelMonths',
                'heroAttachment.mediaAsset',
                'cardAttachment.mediaAsset',
                'routeMapAttachment.mediaAsset',
                'galleryAttachments.mediaAsset',
                'safetyItems',
            ])),
            'message' => $id ? 'Journey updated successfully.' : 'Journey created successfully.',
        ]);
    }

    public function highlight($id, Request $request)
    {
        $validated = $request->validate([
            'id' => ['nullable', 'exists:journey_highlights,id'],
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'icon' => ['nullable', 'string', 'max:255'],
            'sort_order' => ['nullable', 'integer'],
            'is_active' => ['nullable', 'boolean'],
        ]);

        $validated['journey_id'] = $id;
        $validated['sort_order'] = $validated['sort_order'] ?? 0;
        $validated['is_active'] = $validated['is_active'] ?? true;
        $highlight = JourneyHighlight::query()->updateOrCreate(
            ['id' => $validated['id'] ?? null],
            Arr::except($validated, ['id'])
        );

        return response()->json([
            'success' => true,
            'data' => $highlight,
            'message' => ($validated['id'] ?? null) ? 'Journey highlight updated successfully.' : 'Journey highlight created successfully.',
        ]);
    }

    public function destroy($id)
    {
        $journey = Journey::findOrFail($id);
        $journey->delete();

        return response()->json(['message' => $journey->name . ' deleted successfully.']);
    }

    public function destroyHighlight($id)
    {
        $highlight = JourneyHighlight::findOrFail($id);
        $highlight->delete();

        return response()->json(['message' => $highlight->title . ' deleted successfully.']);
    }

    public function toggleActive($id, Request $request)
    {
        $journey = Journey::findOrFail($id);
        $journey->is_active = $request->boolean('is_active');
        $journey->save();

        $statusText = $journey->is_active ? 'activated' : 'deactivated';

        return response()->json([
            'success' => true,
            'message' => "{$journey->name} has been {$statusText}.",
            'name' => $journey->name,
            'is_active' => $journey->is_active,
        ]);
    }

    public function togglePublish($id, Request $request)
    {
        $journey = Journey::findOrFail($id);
        $isPublished = $request->boolean('is_published');

        $journey->is_published = $isPublished;

        if ($isPublished && is_null($journey->published_at)) {
            $journey->published_at = now();
        }

        $journey->save();

        $message = $isPublished ? $journey->name . ' is published now.' : $journey->name . ' is unpublished now.';

        return response()->json(['success' => true, 'message' => $message]);
    }

    private function serializeJourneyListItem(Journey $journey): array
    {
        return [
            'id' => $journey->id,
            'name' => $journey->name,
            'slug' => $journey->slug,
            'subtitle' => $journey->subtitle,
            'summary' => $journey->summary,
            'duration_days' => $journey->duration_days,
            'duration_nights' => $journey->duration_nights,
            'difficulty' => $journey->difficulty,
            'price_minor' => $journey->price_minor,
            'price' => round($journey->price_minor / 100, 2),
            'currency' => $journey->currency,
            'is_active' => $journey->is_active,
            'is_featured' => $journey->is_featured,
            'is_published' => $journey->is_published,
            'published_at' => $journey->published_at?->toIso8601String(),
            'destination_id' => $journey->destination_id,
            'destination' => $journey->destination,
            'guide_id' => $journey->guide_id,
            'guide' => $journey->guide,
            'itinerary_days_count' => $journey->itinerary_days_count ?? null,
            'departures_count' => $journey->departures_count ?? null,
            'created_at' => $journey->created_at?->toIso8601String(),
            'updated_at' => $journey->updated_at?->toIso8601String(),
        ];
    }

    private function serializeJourney(Journey $journey): array
    {
        return $this->serializeJourneyListItem($journey) + [
            'description' => $journey->description,
            'overview_secondary' => $journey->overview_secondary,
            'max_altitude_m' => $journey->max_altitude_m,
            'walking_hours_min' => $journey->walking_hours_min,
            'walking_hours_max' => $journey->walking_hours_max,
            'accommodation_style' => $journey->accommodation_style,
            'pace' => $journey->pace,
            'pricing_basis' => $journey->pricing_basis,
            'featured_rank' => $journey->featured_rank,
            'hero_image_id' => $journey->heroAttachment?->media_asset_id,
            'card_image_id' => $journey->cardAttachment?->media_asset_id,
            'hero_image' => $journey->heroAttachment?->mediaAsset ? [
                'id' => $journey->heroAttachment->mediaAsset->id,
                'attachment_id' => $journey->heroAttachment->id,
                'url' => $journey->heroAttachment->mediaAsset->url,
                'filename' => $journey->heroAttachment->mediaAsset->filename,
                'title' => $journey->heroAttachment->title ?? $journey->heroAttachment->mediaAsset->title,
                'alt_text' => $journey->heroAttachment->alt_text ?? $journey->heroAttachment->mediaAsset->alt_text,
                'caption' => $journey->heroAttachment->caption ?? $journey->heroAttachment->mediaAsset->caption,
            ] : null,
            'card_image' => $journey->cardAttachment?->mediaAsset ? [
                'id' => $journey->cardAttachment->mediaAsset->id,
                'attachment_id' => $journey->cardAttachment->id,
                'url' => $journey->cardAttachment->mediaAsset->url,
                'filename' => $journey->cardAttachment->mediaAsset->filename,
                'title' => $journey->cardAttachment->title ?? $journey->cardAttachment->mediaAsset->title,
                'alt_text' => $journey->cardAttachment->alt_text ?? $journey->cardAttachment->mediaAsset->alt_text,
                'caption' => $journey->cardAttachment->caption ?? $journey->cardAttachment->mediaAsset->caption,
            ] : null,
            'gallery' => ($journey->relationLoaded('galleryAttachments') && $journey->galleryAttachments) ? $journey->galleryAttachments->map(fn ($attachment) => [
                'attachment_id' => $attachment->id,
                'id' => $attachment->media_asset_id,
                'url' => $attachment->mediaAsset?->url,
                'filename' => $attachment->mediaAsset?->filename,
                'title' => $attachment->title ?? $attachment->mediaAsset?->title,
                'alt_text' => $attachment->alt_text ?? $attachment->mediaAsset?->alt_text,
                'caption' => $attachment->caption ?? $attachment->mediaAsset?->caption,
                'sort_order' => $attachment->sort_order,
            ])->values() : [],
            'route_map_image_id' => $journey->routeMapAttachment?->media_asset_id,
            'route_map_image' => $journey->routeMapAttachment?->mediaAsset ? [
                'id' => $journey->routeMapAttachment->mediaAsset->id,
                'attachment_id' => $journey->routeMapAttachment->id,
                'url' => $journey->routeMapAttachment->mediaAsset->url,
                'filename' => $journey->routeMapAttachment->mediaAsset->filename,
                'title' => $journey->routeMapAttachment->title ?? $journey->routeMapAttachment->mediaAsset->title,
                'alt_text' => $journey->routeMapAttachment->alt_text ?? $journey->routeMapAttachment->mediaAsset->alt_text,
                'caption' => $journey->routeMapAttachment->caption ?? $journey->routeMapAttachment->mediaAsset->caption,
            ] : null,
            'accommodation_note' => $journey->accommodation_note,
            'logistics_note' => $journey->logistics_note,
            'safety_note' => $journey->safety_note,
            'route_map_note' => $journey->route_map_note,
            'preparation_note' => $journey->preparation_note,
            'packing_note' => $journey->packing_note,
            'operational_notice' => $journey->operational_notice,
            'cta_title' => $journey->cta_title,
            'cta_description' => $journey->cta_description,
            'cta_primary_btn_text' => $journey->cta_primary_btn_text,
            'cta_primary_btn_url' => $journey->cta_primary_btn_url,
            'cta_secondary_btn_text' => $journey->cta_secondary_btn_text,
            'cta_secondary_btn_url' => $journey->cta_secondary_btn_url,
            'sort_order' => $journey->sort_order,
            'meta_title' => $journey->meta_title,
            'meta_description' => $journey->meta_description,
            'safety_items' => ($journey->relationLoaded('safetyItems') && $journey->safetyItems) ? $journey->safetyItems->map(fn ($item) => [
                'id' => $item->id,
                'journey_id' => $item->journey_id,
                'title' => $item->title,
                'description' => $item->description,
                'icon' => $item->icon,
                'sort_order' => $item->sort_order,
                'is_active' => $item->is_active,
            ])->values() : [],
            'experience_ids' => $journey->relationLoaded('experiences') ? $journey->experiences->pluck('id')->values() : [],
            'travel_month_ids' => $journey->relationLoaded('travelMonths') ? $journey->travelMonths->pluck('id')->values() : [],
            'experiences' => $journey->relationLoaded('experiences') ? $journey->experiences : [],
            'travel_months' => $journey->relationLoaded('travelMonths') ? $journey->travelMonths : [],
            'itinerary_days' => $journey->relationLoaded('itineraryDays') ? $journey->itineraryDays : [],
            'highlights' => $journey->relationLoaded('highlights') ? $journey->highlights->map(fn ($highlight) => [
                'id' => $highlight->id,
                'journey_id' => $highlight->journey_id,
                'title' => $highlight->title,
                'highlight_name' => $highlight->title,
                'description' => $highlight->description,
                'icon' => $highlight->icon,
                'icon_url' => $highlight->icon,
                'sort_order' => $highlight->sort_order,
                'is_active' => $highlight->is_active,
            ])->values() : [],
            'services' => $journey->relationLoaded('services') ? $journey->services->map(fn ($service) => $this->serializeService($service))->values() : [],
            'inclusions' => $journey->relationLoaded('services') ? $journey->services
                ->where('type', JourneyService::TYPE_INCLUSION)
                ->map(fn ($service) => $this->serializeService($service))
                ->values() : [],
            'exclusions' => $journey->relationLoaded('services') ? $journey->services
                ->where('type', JourneyService::TYPE_EXCLUSION)
                ->map(fn ($service) => $this->serializeService($service))
                ->values() : [],
            'prices' => $journey->relationLoaded('prices') ? $journey->prices->map(fn ($price) => [
                'id' => $price->id,
                'journey_id' => $price->journey_id,
                'name' => $price->name,
                'title' => $price->name,
                'price_minor' => $price->price_minor,
                'price' => round($price->price_minor / 100, 2),
                'currency' => $price->currency,
                'pricing_basis' => $price->pricing_basis,
                'description' => $price->description,
                'min_travelers' => $price->min_travelers,
                'max_travelers' => $price->max_travelers,
                'starts_on' => $price->starts_on?->toDateString(),
                'ends_on' => $price->ends_on?->toDateString(),
                'sort_order' => $price->sort_order,
                'is_primary' => $price->is_primary,
                'is_default' => $price->is_primary,
                'is_active' => $price->is_active,
            ]) : [],
            'departures' => $journey->relationLoaded('departures')
                ? $journey->departures->map(fn ($dep) => $this->serializeDeparture($dep))->values()
                : [],
            'guides' => $journey->relationLoaded('guides') ? $journey->guides : [],
        ];
    }

    private function serializeDeparture(JourneyDeparture $departure): array
    {
        $bookings = $departure->relationLoaded('plannerSubmissions')
            ? $departure->plannerSubmissions->map(function ($submission) {
                $preferences = is_array($submission->preferences) ? $submission->preferences : [];

                return [
                    'id' => $submission->id,
                    'reference_code' => $submission->reference_code,
                    'user' => [
                        'name' => $submission->contact_name,
                        'email' => $submission->contact_email,
                        'phone' => $submission->contact_phone,
                    ],
                    'created_at' => $submission->created_at?->format('Y-m-d H:i') ?? '',
                    'flight' => $preferences['flight'] ?? null,
                    'insurance' => $preferences['insurance'] ?? null,
                    'special_requirements' => $submission->message,
                    'total_travellers' => ($submission->adults ?? 1) + ($submission->children ?? 0),
                    'travellers' => [
                        [
                            'name' => $submission->contact_name,
                            'email' => $submission->contact_email,
                            'phone' => $submission->contact_phone,
                            'country' => $submission->country ?? '—',
                            'passport' => $preferences['passport'] ?? '—',
                        ],
                    ],
                ];
            })->values()
            : [];

        $cost = $departure->price_minor !== null ? round($departure->price_minor / 100, 2) : null;

        return [
            'id' => $departure->id,
            'journey_id' => $departure->journey_id,
            'code' => $departure->code,
            'start_date' => $departure->start_date?->toDateString(),
            'end_date' => $departure->end_date?->toDateString(),
            'status' => $departure->status,
            'total_seats' => $departure->total_seats,
            'total_seat' => $departure->total_seats,
            'available_seats' => $departure->available_seats,
            'price_minor' => $departure->price_minor,
            'cost' => $cost,
            'price' => $cost,
            'currency' => $departure->currency,
            'booking_deadline' => $departure->booking_deadline?->toDateString(),
            'notes' => $departure->notes,
            'sort_order' => $departure->sort_order,
            'is_active' => $departure->is_active,
            'bookings' => $bookings,
            'booking_count' => count($bookings),
            'created_at' => $departure->created_at?->toIso8601String(),
            'updated_at' => $departure->updated_at?->toIso8601String(),
        ];
    }

    private function serializeService(JourneyService $service): array
    {
        return [
            'id' => $service->id,
            'journey_id' => $service->journey_id,
            'title' => $service->title,
            'description' => $service->description,
            'type' => $service->type,
            'is_excluded' => $service->type === JourneyService::TYPE_EXCLUSION,
            'sort_order' => $service->sort_order,
            'is_active' => $service->is_active,
        ];
    }

    public function attachMedia(Request $request, $id)
    {
        $journey = Journey::findOrFail($id);

        $validated = $request->validate([
            'media_asset_id' => ['required', 'integer', 'exists:media_assets,id'],
            'collection' => ['required', 'string', 'max:50'],
            'alt_text' => ['nullable', 'string', 'max:255'],
            'title' => ['nullable', 'string', 'max:255'],
            'caption' => ['nullable', 'string', 'max:500'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
        ]);

        $mediaAssetId = (int) $validated['media_asset_id'];
        $collection = $validated['collection'];
        unset($validated['media_asset_id'], $validated['collection']);

        if (in_array($collection, [MediaAttachment::COLLECTION_HERO, MediaAttachment::COLLECTION_CARD], true)) {
            $journey->syncMediaAttachment($mediaAssetId, $collection, $validated);
        } else {
            $journey->attachMediaAsset($mediaAssetId, $collection, $validated);
        }

        return response()->json([
            'success' => true,
            'message' => 'Media attached successfully.',
            'data' => $this->serializeJourney($journey->fresh()->load([
                'destination:id,name,slug',
                'guide:id,name',
                'experiences:id,name,slug',
                'travelMonths:id,name,slug,month_number,season',
                'itineraryDays.highlights',
                'highlights',
                'services',
                'prices',
                'departures.plannerSubmissions',
                'guides:id,name',
                'heroAttachment.mediaAsset',
                'cardAttachment.mediaAsset',
                'routeMapAttachment.mediaAsset',
                'galleryAttachments.mediaAsset',
            ])),
        ]);
    }

    public function updateMediaAttachment(Request $request, $id, $attachmentId)
    {
        $journey = Journey::findOrFail($id);
        $attachment = $journey->mediaAttachments()->findOrFail($attachmentId);

        $validated = $request->validate([
            'alt_text' => ['nullable', 'string', 'max:255'],
            'title' => ['nullable', 'string', 'max:255'],
            'caption' => ['nullable', 'string', 'max:500'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
        ]);

        $attachment->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Image details updated successfully.',
            'data' => $this->serializeJourney($journey->fresh()->load([
                'destination:id,name,slug',
                'guide:id,name',
                'experiences:id,name,slug',
                'travelMonths:id,name,slug,month_number,season',
                'itineraryDays.highlights',
                'highlights',
                'services',
                'prices',
                'departures.plannerSubmissions',
                'guides:id,name',
                'heroAttachment.mediaAsset',
                'cardAttachment.mediaAsset',
                'routeMapAttachment.mediaAsset',
                'galleryAttachments.mediaAsset',
            ])),
        ]);
    }

    public function detachMedia($id, $attachmentId)
    {
        $journey = Journey::findOrFail($id);
        $attachment = $journey->mediaAttachments()->findOrFail($attachmentId);
        $attachment->delete();

        return response()->json([
            'success' => true,
            'message' => 'Media removed successfully.',
            'data' => $this->serializeJourney($journey->fresh()->load([
                'destination:id,name,slug',
                'guide:id,name',
                'experiences:id,name,slug',
                'travelMonths:id,name,slug,month_number,season',
                'itineraryDays.highlights',
                'highlights',
                'services',
                'prices',
                'departures.plannerSubmissions',
                'guides:id,name',
                'heroAttachment.mediaAsset',
                'cardAttachment.mediaAsset',
                'routeMapAttachment.mediaAsset',
                'galleryAttachments.mediaAsset',
            ])),
        ]);
    }
}
