<?php
namespace Admin\Http\Controllers\TravelPackage;



use Illuminate\Http\Request;
use Admin\Models\TravelPackage;
use App\Http\Controllers\Controller;
use Admin\Models\TrekDeparture;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class TrekDepartureController extends Controller
{
    public function store(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'departures' => ['required', 'array', 'min:1'],
            'departures.*.start_date' => ['required', 'date', 'after_or_equal:today'],
            'departures.*.end_date' => ['required', 'date', 'after:start_date'],
            'departures.*.total_seat' => ['nullable', 'integer', 'min:0'],
            'departures.*.cost' => ['nullable', 'numeric', 'min:0'],
            'departures.*.status' => ['nullable', 'in:active,inactive'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validation failed',
                'errors' => $validator->errors(),
            ], 422);
        }

        $trek = TravelPackage::findOrFail($id);
        $data = $validator->validated();

        $created = collect($data['departures'])
            ->values()
            ->map(function ($dep, $index) use ($trek) {
                return $trek->departures()->create([
                    'start_date' => $dep['start_date'],
                    'end_date' => $dep['end_date'],
                    'available_seats' => $dep['total_seat'] ?? null,
                    'cost' => $dep['cost'] ?? null,
                    'seq_no' => $index,
                    'status' => $dep['status'] ?? 'active',
                ]);
            });

        return response()->json([
            'message' => 'Fixed departures saved successfully',
            'data' => $created,
        ], 201);
    }

    public function update(Request $request, $trekId, $departureId)
    {
        $validator = Validator::make($request->all(), [
            'start_date' => ['required', 'date', 'after_or_equal:today'],
            'end_date' => ['required', 'date', 'after:start_date'],
            'total_seat' => ['nullable', 'integer', 'min:0'],
            'cost' => ['nullable', 'numeric', 'min:0'],
            'status' => ['nullable', 'in:active,inactive'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validation failed',
                'errors' => $validator->errors(),
            ], 422);
        }

        $departure = TrekDeparture::where('trek_id', $trekId)->where('id', $departureId)->first();

        if (!$departure) {
            return response()->json(['message' => 'Departure not found'], Response::HTTP_NOT_FOUND);
        }

        $data = $validator->validated();

        $departure->update([
            'start_date' => $data['start_date'],
            'end_date' => $data['end_date'],
            'available_seats' => $data['total_seat'] ?? $departure->available_seats,
            'cost' => $data['cost'] ?? $departure->cost,
            'status' => $data['status'] ?? $departure->status,
        ]);

        return response()->json([
            'message' => 'Fixed departure updated successfully',
            'data' => $departure->fresh(),
        ], 200);
    }

    public function destroy($trekId, $departureId)
    {
        $departure = TrekDeparture::where('trek_id', $trekId)->where('id', $departureId)->first();
        if (!$departure) {
            return response()->json(['message' => 'Departure not found'], Response::HTTP_NOT_FOUND);
        }
        $departure->delete();
        return response()->json(['message' => 'Departure deleted'], 200);
    }
}
