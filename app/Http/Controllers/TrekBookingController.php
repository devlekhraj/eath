<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\TrekBooking;
use App\Models\TrekDeparture;

class TrekBookingController extends Controller
{
    public function store(Request $request)
    {
        $rules = [
            'package_id' => ['required', 'exists:travel_packages,id'],
            'departure_id' => ['nullable', 'exists:trek_departures,id'],
            'contact_name' => ['required', 'string', 'max:255'],
            'contact_email' => ['required', 'email', 'max:255'],
            'contact_phone' => ['required', 'string', 'max:255'],
            'flight' => ['nullable', 'in:booked,not_booked'],
            'insurance' => ['nullable', 'in:have,will_buy'],
            'special_requirements' => ['nullable', 'string', 'max:2000'],
            'referral' => ['nullable', 'string', 'max:255'],
            'travellers' => ['required', 'array', 'min:1'],
            'travellers.*.name' => ['required', 'string', 'max:255'],
            'travellers.*.email' => ['required', 'email', 'max:255'],
            'travellers.*.phone' => ['required', 'string', 'max:255'],
            'travellers.*.dob' => ['required', 'date'],
            'travellers.*.passport' => ['required', 'string', 'max:255'],
            'travellers.*.country' => ['required', 'string', 'max:10'],
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validation failed',
                'errors' => $validator->errors(),
            ], 422);
        }

        $data = $validator->validated();

        // Ensure selected departure belongs to the same package, if provided.
        if (!empty($data['departure_id'])) {
            $matchesPackage = TrekDeparture::where('id', $data['departure_id'])
                ->where('trek_id', $data['package_id'])
                ->exists();

            if (!$matchesPackage) {
                return response()->json([
                    'message' => 'Selected departure does not belong to the package.',
                ], 422);
            }
        }

        TrekBooking::create([
            'package_id' => $data['package_id'],
            'departure_id' => $data['departure_id'] ?? null,
            'total_travellers' => count($data['travellers']),
            'travellers' => $data['travellers'],
            'flight' => $data['flight'] ?? null,
            'insurance' => $data['insurance'] ?? null,
            'special_requirements' => $data['special_requirements'] ?? null,
            'referral' => $data['referral'] ?? null,
            'user_id' => $this->getOrCreateUser($data)->id,
        ]);

        Log::info('Trek booking submission', $data);

        return response()->json([
            'message' => 'Booking request received. We will email payment instructions shortly.',
        ]);
    }

    /**
     * Create or retrieve a user based on contact email/phone.
     */
    protected function getOrCreateUser(array $data): User
    {
        $nameParts = preg_split('/\s+/', trim($data['contact_name']), 2);
        $fname = $nameParts[0] ?? '';
        $lname = $nameParts[1] ?? '';

        $baseUsername = strtolower(preg_replace('/[^a-z0-9]+/i', '', $fname)) ?: 'traveller';
        $username = $baseUsername;
        $suffix = 1;
        while (User::where('username', $username)->exists()) {
            $username = $baseUsername . $suffix;
            $suffix++;
        }

        return User::firstOrCreate(
            ['email' => $data['contact_email']],
            [
                'fname' => $fname,
                'lname' => $lname,
                'username' => $username,
                'mobile_no' => $data['contact_phone'] ?? null,
                'password' => bcrypt(str()->random(16)),
                'is_active' => 0,
            ]
        );
    }
}
