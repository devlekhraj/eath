<?php

namespace Admin\Http\Controllers\Journey;

use App\Http\Controllers\Controller;
use Admin\Models\Destination;
use Admin\Models\Journey;
use Admin\Models\JourneyDeparture;
use Admin\Models\JourneyHighlight;
use Admin\Models\JourneyService;
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
            ])
            ->findOrFail($id);

        return response()->json([
            'success' => true,
            'data' => $this->serializeJourney($journey),
            'message' => 'Journey retrieved successfully.',
        ]);
    }

    public function storeUpdate(Request $request)
    {
        $id = $request->input('id');

        $rules = [
            'id' => ['nullable', 'integer', 'exists:journeys,id'],
            'destination_id' => ['nullable', 'integer', 'exists:destinations,id'],
            'guide_id' => ['nullable', 'integer', 'exists:guides,id'],
            'name' => [
                'required',
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
            'sort_order' => ['nullable', 'integer', 'min:0'],
            'meta_title' => ['nullable', 'string', 'max:255'],
            'meta_description' => ['nullable', 'string', 'max:300'],
            'experience_ids' => ['nullable', 'array'],
            'experience_ids.*' => ['integer', 'exists:experiences,id'],
            'travel_month_ids' => ['nullable', 'array'],
            'travel_month_ids.*' => ['integer', 'exists:travel_months,id'],
        ];

        $validated = $request->validate($rules);
        $validated['slug'] = $validated['slug'] ?? Str::slug($validated['name']);

        if (array_key_exists('price', $validated) && !array_key_exists('price_minor', $validated)) {
            $validated['price_minor'] = (int) round(((float) $validated['price']) * 100);
        }

        $validated['destination_id'] = $validated['destination_id']
            ?? Journey::query()->whereKey($id)->value('destination_id')
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

        $journey = Journey::query()->updateOrCreate(['id' => $id], $payload);

        if (array_key_exists('experience_ids', $validated)) {
            $journey->experiences()->sync($validated['experience_ids'] ?? []);
        }

        if (array_key_exists('travel_month_ids', $validated)) {
            $journey->travelMonths()->sync($validated['travel_month_ids'] ?? []);
        }

        return response()->json([
            'success' => true,
            'data' => $this->serializeJourney($journey->fresh()->load(['destination', 'guide:id,name', 'experiences', 'travelMonths'])),
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
            'hero_image_id' => $journey->hero_image_id,
            'card_image_id' => $journey->card_image_id,
            'route_map_image_id' => $journey->route_map_image_id,
            'accommodation_note' => $journey->accommodation_note,
            'logistics_note' => $journey->logistics_note,
            'safety_note' => $journey->safety_note,
            'route_map_note' => $journey->route_map_note,
            'sort_order' => $journey->sort_order,
            'meta_title' => $journey->meta_title,
            'meta_description' => $journey->meta_description,
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
}
