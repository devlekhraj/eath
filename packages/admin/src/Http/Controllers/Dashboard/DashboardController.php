<?php

namespace Admin\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Admin\Models\Blog;
use Admin\Models\Destination;
use Admin\Models\Guide;
use Admin\Models\Inquiry;
use Admin\Models\TravelPackage;
use Admin\Models\TrekBooking;
use Admin\Models\TrekDeparture;
use Admin\Models\User;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        // 1. Core Metrics
        $totalBookings = TrekBooking::query()->count();
        $totalTravellers = TrekBooking::sum('total_travellers') ?: 0;
        $totalInquiries = Inquiry::query()->count();
        $newInquiries = Inquiry::query()->where('status', 'new')->count();
        $inProgressInquiries = Inquiry::query()->where('status', 'in_progress')->count();
        $resolvedInquiries = Inquiry::query()->where('status', 'resolved')->count();

        $totalPackages = TravelPackage::query()->count();
        $activePackages = TravelPackage::query()->where('is_active', 1)->count();
        $totalDestinations = Destination::query()->count();
        $totalGuides = Guide::query()->count();
        $totalBlogs = Blog::query()->count();
        $totalDepartures = TrekDeparture::query()->count();
        $upcomingDeparturesCount = TrekDeparture::query()->where('start_date', '>=', now()->startOfDay())->count();
        $totalCustomers = User::count();

        // 2. Recent Bookings (latest 5 with relations)
        $recentBookings = TrekBooking::with(['package:id,name,slug,price,duration_days,destination_id', 'departure:id,start_date,end_date,cost', 'user:id,fname,lname,email'])
            ->latest()
            ->take(5)
            ->get()
            ->map(function ($booking) {
                return [
                    'id' => $booking->id,
                    'user_name' => trim(($booking->user->fname ?? '') . ' ' . ($booking->user->lname ?? '')) ?: ($booking->travellers[0]['name'] ?? 'Guest'),
                    'user_email' => $booking->user->email ?? ($booking->travellers[0]['email'] ?? ''),
                    'package_name' => $booking->package->name ?? 'Custom Trek',
                    'package_slug' => $booking->package->slug ?? '',
                    'departure_date' => $booking->departure->start_date ?? null,
                    'traveller_count' => $booking->total_travellers ?: (is_array($booking->travellers) ? count($booking->travellers) : 1),
                    'flight' => $booking->flight,
                    'insurance' => $booking->insurance,
                    'status' => $booking->status ?: 'confirmed',
                    'created_at' => $booking->created_at ? $booking->created_at->toIso8601String() : null,
                ];
            });

        // 3. Recent Inquiries (latest 5)
        $recentInquiries = Inquiry::query()->latest()
            ->take(5)
            ->get()
            ->map(function ($inquiry) {
                return [
                    'id' => $inquiry->id,
                    'name' => trim($inquiry->fname . ' ' . $inquiry->lname),
                    'email' => $inquiry->email,
                    'mobile_no' => $inquiry->mobile_no,
                    'country' => $inquiry->country,
                    'destination' => $inquiry->custom_destination,
                    'travel_date' => $inquiry->travel_date,
                    'number_of_people' => $inquiry->number_of_people,
                    'status' => $inquiry->status ?: 'new',
                    'message' => $inquiry->message,
                    'created_at' => $inquiry->created_at ? $inquiry->created_at->toIso8601String() : null,
                ];
            });

        // 4. Upcoming Departures (next 5 departures)
        $upcomingDepartures = TrekDeparture::with('trek:id,name,slug,destination_id')
            ->orderBy('start_date', 'asc')
            ->take(5)
            ->get()
            ->map(function ($dep) {
                return [
                    'id' => $dep->id,
                    'trek_name' => $dep->trek->name ?? 'Unassigned Trek',
                    'trek_id' => $dep->trek_id,
                    'start_date' => $dep->start_date ? $dep->start_date->format('Y-m-d') : null,
                    'end_date' => $dep->end_date ? $dep->end_date->format('Y-m-d') : null,
                    'cost' => $dep->cost,
                    'available_seats' => $dep->available_seats,
                    'booked_seats' => $dep->booked_seats ?? 0,
                    'status' => $dep->status ?: 'active',
                ];
            });

        // 5. Destination Breakdown with package counts
        $destinationsSummary = Destination::withCount('treks')
            ->get()
            ->map(function ($dest) {
                return [
                    'id' => $dest->id,
                    'name' => $dest->name,
                    'slug' => $dest->slug,
                    'packages_count' => $dest->treks_count,
                    'is_featured' => (bool)$dest->is_featured,
                ];
            });

        // 6. Monthly Booking trend (last 6 months)
        $monthlyTrend = [];
        for ($i = 5; $i >= 0; $i--) {
            $monthStart = Carbon::now()->subMonths($i)->startOfMonth();
            $monthEnd = Carbon::now()->subMonths($i)->endOfMonth();
            $count = TrekBooking::query()->whereBetween('created_at', [$monthStart, $monthEnd])->count();
            $inquiryCount = Inquiry::query()->whereBetween('created_at', [$monthStart, $monthEnd])->count();
            $monthlyTrend[] = [
                'month' => $monthStart->format('M Y'),
                'short_month' => $monthStart->format('M'),
                'bookings' => $count,
                'inquiries' => $inquiryCount,
            ];
        }

        return response()->json([
            'success' => true,
            'data' => [
                'metrics' => [
                    'total_bookings' => $totalBookings,
                    'total_travellers' => $totalTravellers,
                    'total_inquiries' => $totalInquiries,
                    'new_inquiries' => $newInquiries,
                    'in_progress_inquiries' => $inProgressInquiries,
                    'resolved_inquiries' => $resolvedInquiries,
                    'total_packages' => $totalPackages,
                    'active_packages' => $activePackages,
                    'total_destinations' => $totalDestinations,
                    'total_departures' => $totalDepartures,
                    'upcoming_departures_count' => $upcomingDeparturesCount,
                    'total_guides' => $totalGuides,
                    'total_blogs' => $totalBlogs,
                    'total_customers' => $totalCustomers,
                ],
                'recent_bookings' => $recentBookings,
                'recent_inquiries' => $recentInquiries,
                'upcoming_departures' => $upcomingDepartures,
                'destinations_summary' => $destinationsSummary,
                'monthly_trend' => $monthlyTrend,
            ]
        ], 200);
    }
}
