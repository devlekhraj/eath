<?php

namespace Admin\Http\Controllers\Journey;

use App\Http\Controllers\Controller;
use Admin\Models\Journey;
use Admin\Models\JourneyDeparture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class JourneyDepartureController extends Controller
{
    public function index(Request $request)
    {
        $query = JourneyDeparture::with(['journey:id,name,slug,duration_days,duration_nights', 'journey.heroAttachment.mediaAsset'])
            ->orderBy('start_date', 'asc');

        if ($request->filled('journey_id')) {
            $query->where('journey_id', $request->query('journey_id'));
        }

        if ($request->filled('status')) {
            $query->where('status', $request->query('status'));
        }

        if ($request->has('is_active')) {
            $query->where('is_active', $request->boolean('is_active'));
        }

        if ($request->filled('search')) {
            $term = '%' . trim($request->query('search')) . '%';
            $query->where(function ($q) use ($term) {
                $q->where('code', 'like', $term)
                    ->orWhere('notes', 'like', $term)
                    ->orWhereHas('journey', function ($jq) use ($term) {
                        $jq->where('name', 'like', $term);
                    });
            });
        }

        $perPage = (int) $request->query('per_page', 25);
        $departures = $query->paginate($perPage);

        return response()->json([
            'success' => true,
            'data' => $departures->items(),
            'meta' => [
                'current_page' => $departures->currentPage(),
                'last_page' => $departures->lastPage(),
                'per_page' => $departures->perPage(),
                'total' => $departures->total(),
            ],
        ], 200);
    }

    public function store(Request $request, $id)
    {
        $journey = Journey::findOrFail($id);

        $payload = $request->all();
        $isBatch = array_key_exists('departures', $payload) && is_array($payload['departures']);
        $departuresInput = $isBatch ? $payload['departures'] : [$payload];

        $validator = Validator::make(['departures' => $departuresInput], [
            'departures' => ['required', 'array', 'min:1'],
            'departures.*.start_date' => ['required', 'date'],
            'departures.*.end_date' => ['required', 'date', 'after_or_equal:departures.*.start_date'],
            'departures.*.total_seat' => ['nullable', 'integer', 'min:0'],
            'departures.*.total_seats' => ['nullable', 'integer', 'min:0'],
            'departures.*.available_seats' => ['nullable', 'integer', 'min:0'],
            'departures.*.cost' => ['nullable', 'numeric', 'min:0'],
            'departures.*.price' => ['nullable', 'numeric', 'min:0'],
            'departures.*.price_minor' => ['nullable', 'integer', 'min:0'],
            'departures.*.currency' => ['nullable', 'string', 'size:3'],
            'departures.*.status' => ['nullable', 'string'],
            'departures.*.code' => ['nullable', 'string', 'max:255'],
            'departures.*.notes' => ['nullable', 'string'],
            'departures.*.booking_deadline' => ['nullable', 'date'],
            'departures.*.sort_order' => ['nullable', 'integer'],
            'departures.*.is_active' => ['nullable', 'boolean'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validation failed',
                'errors' => $validator->errors(),
            ], 422);
        }

        $validated = $validator->validated();

        $created = collect($validated['departures'])
            ->values()
            ->map(function ($dep, $index) use ($journey) {
                $totalSeats = $dep['total_seats'] ?? $dep['total_seat'] ?? null;
                $availableSeats = $dep['available_seats'] ?? $totalSeats;

                $priceMinor = null;
                if (isset($dep['price_minor'])) {
                    $priceMinor = (int) $dep['price_minor'];
                } elseif (isset($dep['cost'])) {
                    $priceMinor = (int) round(((float) $dep['cost']) * 100);
                } elseif (isset($dep['price'])) {
                    $priceMinor = (int) round(((float) $dep['price']) * 100);
                }

                $status = $this->normalizeStatus($dep['status'] ?? JourneyDeparture::STATUS_OPEN);

                return $journey->departures()->create([
                    'code' => $dep['code'] ?? null,
                    'start_date' => $dep['start_date'],
                    'end_date' => $dep['end_date'],
                    'total_seats' => $totalSeats !== null ? (int) $totalSeats : null,
                    'available_seats' => $availableSeats !== null ? (int) $availableSeats : null,
                    'price_minor' => $priceMinor,
                    'currency' => strtoupper($dep['currency'] ?? 'USD'),
                    'booking_deadline' => $dep['booking_deadline'] ?? null,
                    'notes' => $dep['notes'] ?? null,
                    'sort_order' => $dep['sort_order'] ?? $index,
                    'status' => $status,
                    'is_active' => $dep['is_active'] ?? true,
                ]);
            });

        return response()->json([
            'success' => true,
            'message' => 'Fixed departures saved successfully',
            'data' => $created,
        ], 201);
    }

    public function update(Request $request, $journeyId, $departureId)
    {
        $validator = Validator::make($request->all(), [
            'start_date' => ['sometimes', 'required', 'date'],
            'end_date' => ['sometimes', 'required', 'date', 'after_or_equal:start_date'],
            'total_seat' => ['nullable', 'integer', 'min:0'],
            'total_seats' => ['nullable', 'integer', 'min:0'],
            'available_seats' => ['nullable', 'integer', 'min:0'],
            'cost' => ['nullable', 'numeric', 'min:0'],
            'price' => ['nullable', 'numeric', 'min:0'],
            'price_minor' => ['nullable', 'integer', 'min:0'],
            'currency' => ['nullable', 'string', 'size:3'],
            'status' => ['nullable', 'string'],
            'code' => ['nullable', 'string', 'max:255'],
            'notes' => ['nullable', 'string'],
            'booking_deadline' => ['nullable', 'date'],
            'sort_order' => ['nullable', 'integer'],
            'is_active' => ['nullable', 'boolean'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validation failed',
                'errors' => $validator->errors(),
            ], 422);
        }

        $departure = JourneyDeparture::where('journey_id', $journeyId)->where('id', $departureId)->first();
        if (!$departure) {
            $departure = JourneyDeparture::where('id', $departureId)->first();
        }

        if (!$departure) {
            return response()->json(['message' => 'Departure not found'], Response::HTTP_NOT_FOUND);
        }

        $data = $validator->validated();
        $updateData = [];

        if (array_key_exists('start_date', $data)) {
            $updateData['start_date'] = $data['start_date'];
        }
        if (array_key_exists('end_date', $data)) {
            $updateData['end_date'] = $data['end_date'];
        }

        if (array_key_exists('total_seats', $data) || array_key_exists('total_seat', $data)) {
            $updateData['total_seats'] = (int) ($data['total_seats'] ?? $data['total_seat']);
        }
        if (array_key_exists('available_seats', $data)) {
            $updateData['available_seats'] = (int) $data['available_seats'];
        }

        if (array_key_exists('price_minor', $data)) {
            $updateData['price_minor'] = (int) $data['price_minor'];
        } elseif (array_key_exists('cost', $data)) {
            $updateData['price_minor'] = (int) round(((float) $data['cost']) * 100);
        } elseif (array_key_exists('price', $data)) {
            $updateData['price_minor'] = (int) round(((float) $data['price']) * 100);
        }

        if (array_key_exists('currency', $data)) {
            $updateData['currency'] = strtoupper($data['currency']);
        }
        if (array_key_exists('status', $data)) {
            $updateData['status'] = $this->normalizeStatus($data['status']);
        }
        if (array_key_exists('code', $data)) {
            $updateData['code'] = $data['code'];
        }
        if (array_key_exists('notes', $data)) {
            $updateData['notes'] = $data['notes'];
        }
        if (array_key_exists('booking_deadline', $data)) {
            $updateData['booking_deadline'] = $data['booking_deadline'];
        }
        if (array_key_exists('sort_order', $data)) {
            $updateData['sort_order'] = (int) $data['sort_order'];
        }
        if (array_key_exists('is_active', $data)) {
            $updateData['is_active'] = (bool) $data['is_active'];
        }

        $departure->update($updateData);

        return response()->json([
            'success' => true,
            'message' => 'Fixed departure updated successfully',
            'data' => $departure->fresh(),
        ], 200);
    }

    public function destroy(Request $request, $param1, $param2 = null)
    {
        if ($param2 !== null) {
            $departure = JourneyDeparture::where('journey_id', $param1)->where('id', $param2)->first();
            if (!$departure) {
                $departure = JourneyDeparture::where('id', $param2)->first();
            }
        } else {
            $departure = JourneyDeparture::find($param1);
        }

        if (!$departure) {
            return response()->json(['message' => 'Departure not found'], Response::HTTP_NOT_FOUND);
        }

        $departure->delete();

        return response()->json([
            'success' => true,
            'message' => 'Fixed departure deleted successfully',
        ], 200);
    }

    public function toggleActive(Request $request, $id)
    {
        $departure = JourneyDeparture::findOrFail($id);
        $departure->is_active = $request->has('is_active') ? $request->boolean('is_active') : !$departure->is_active;
        $departure->save();

        return response()->json([
            'success' => true,
            'message' => 'Departure status updated successfully',
            'data' => $departure,
        ], 200);
    }

    private function normalizeStatus(?string $status): string
    {
        if (!$status) {
            return JourneyDeparture::STATUS_OPEN;
        }

        $map = [
            'active' => JourneyDeparture::STATUS_OPEN,
            'inactive' => JourneyDeparture::STATUS_CLOSED,
        ];

        $lower = strtolower($status);
        if (isset($map[$lower])) {
            return $map[$lower];
        }

        if (in_array($lower, JourneyDeparture::STATUSES, true)) {
            return $lower;
        }

        return JourneyDeparture::STATUS_OPEN;
    }
}
