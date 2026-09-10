<?php

namespace Admin\Http\Controllers\Booking;

use App\Http\Controllers\Controller;
use Admin\Models\TrekBooking;
use Illuminate\Http\Request;
use App\Http\Resources\TrekBookingResource;

class BookingController extends Controller
{
    /**
     * Display a listing of bookings.
     */
    public function index(Request $request)
    {
        $perPage = $request->input('per_page', 20);
        $search = $request->input('search');

        $query = TrekBooking::with(['package', 'departure', 'user'])
            ->orderBy('created_at', 'desc');

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->whereHas('user', function ($qu) use ($search) {
                    $qu->where('fname', 'like', "%{$search}%")
                        ->orWhere('lname', 'like', "%{$search}%")
                        ->orWhere('email', 'like', "%{$search}%");
                })->orWhereHas('package', function ($qp) use ($search) {
                    $qp->where('name', 'like', "%{$search}%");
                });
            });
        }

        $bookings = $query->paginate($perPage);

        return response()->json([
            'success' => true,
            'data' => TrekBookingResource::collection($bookings->items())->resolve(),
            'meta' => [
                'current_page' => $bookings->currentPage(),
                'last_page' => $bookings->lastPage(),
                'per_page' => $bookings->perPage(),
                'total' => $bookings->total(),
            ],
        ], 200);
    }

    /**
     * Display the specified booking.
     */
    public function show($id)
    {
        $booking = TrekBooking::with(['package', 'departure', 'user'])
            ->findOrFail($id);

        return response()->json([
            'success' => true,
            'data' => $booking
        ]);
    }

    /**
     * Update the specified booking in storage (Placeholder for future use).
     */
    public function storeUpdate(Request $request)
    {
        $validated = $request->validate([
            'id' => 'nullable|exists:trek_bookings,id',
            'package_id' => 'required|exists:travel_packages,id',
            'departure_id' => 'required|exists:trek_departures,id',
            'user_id' => 'required|exists:users,id',
            'travellers' => 'required|array',
            'total_travellers' => 'required|integer',
            'flight' => 'nullable|string',
            'insurance' => 'nullable|string',
            'special_requirements' => 'nullable|string',
            'referral' => 'nullable|string',
        ]);

        $booking = TrekBooking::updateOrCreate(
            ['id' => $request->id],
            $validated
        );

        return response()->json([
            'success' => true,
            'message' => $request->id ? 'Booking updated successfully.' : 'Booking created successfully.',
            'data' => $booking
        ]);
    }

    /**
     * Remove the specified booking from storage.
     */
    public function delete($id)
    {
        $booking = TrekBooking::findOrFail($id);
        $booking->delete();

        return response()->json([
            'success' => true,
            'message' => 'Booking deleted successfully.'
        ]);
    }
}
