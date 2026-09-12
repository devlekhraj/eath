<?php

namespace Admin\Http\Controllers\Dashboard;

use Admin\Models\Article;
use Admin\Models\Destination;
use Admin\Models\Experience;
use Admin\Models\Guide;
use Admin\Models\Inquiry;
use Admin\Models\Journey;
use Admin\Models\JourneyDeparture;
use Admin\Models\NewsletterSubscription;
use Admin\Models\PlannerSubmission;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $totalJourneys = Journey::query()->count();
        $publishedJourneys = Journey::query()->where('is_published', true)->count();
        $activeJourneys = Journey::query()->where('is_active', true)->count();
        $totalDestinations = Destination::query()->count();
        $activeDestinations = Destination::query()->where('is_active', true)->count();
        $totalExperiences = Experience::query()->count();
        $totalGuides = Guide::query()->count();
        $totalArticles = Article::query()->count();
        $publishedArticles = Article::query()->where('is_published', true)->count();
        $totalDepartures = JourneyDeparture::query()->count();
        $upcomingDeparturesCount = JourneyDeparture::query()
            ->whereDate('start_date', '>=', now()->toDateString())
            ->count();
        $totalInquiries = Inquiry::query()->count();
        $newInquiries = Inquiry::query()->where('status', 'new')->count();
        $reviewingInquiries = Inquiry::query()->where('status', 'reviewing')->count();
        $repliedInquiries = Inquiry::query()->where('status', 'replied')->count();
        $totalPlannerSubmissions = PlannerSubmission::query()->count();
        $newPlannerSubmissions = PlannerSubmission::query()->where('status', 'new')->count();
        $newsletterSubscribers = NewsletterSubscription::query()->where('is_subscribed', true)->count();

        $recentInquiries = Inquiry::query()
            ->latest()
            ->take(5)
            ->get()
            ->map(fn (Inquiry $inquiry) => [
                'id' => $inquiry->id,
                'name' => $inquiry->name,
                'email' => $inquiry->email,
                'phone' => $inquiry->phone,
                'mobile_no' => $inquiry->phone,
                'country' => $inquiry->country,
                'type' => $inquiry->inquiry_type,
                'destination' => $inquiry->subject ?? $inquiry->inquiry_type,
                'travel_date' => null,
                'number_of_people' => 1,
                'status' => $inquiry->status,
                'message' => $inquiry->message,
                'created_at' => $inquiry->created_at?->toIso8601String(),
            ]);

        $recentPlannerSubmissions = PlannerSubmission::query()
            ->with(['journey:id,name,slug', 'departure:id,start_date,end_date'])
            ->latest()
            ->take(5)
            ->get()
            ->map(fn (PlannerSubmission $submission) => [
                'id' => $submission->id,
                'reference_code' => $submission->reference_code,
                'contact_name' => $submission->contact_name,
                'contact_email' => $submission->contact_email,
                'journey_name' => $submission->journey?->name,
                'departure_date' => $submission->departure?->start_date?->format('Y-m-d'),
                'user_name' => $submission->contact_name,
                'user_email' => $submission->contact_email,
                'package_name' => $submission->journey?->name ?? 'Custom Journey',
                'package_slug' => $submission->journey?->slug ?? '',
                'traveller_count' => ((int) $submission->adults) + ((int) $submission->children),
                'status' => $submission->status,
                'created_at' => $submission->created_at?->toIso8601String(),
            ]);

        $upcomingDepartures = JourneyDeparture::query()
            ->with('journey:id,name,slug')
            ->whereDate('start_date', '>=', now()->toDateString())
            ->orderBy('start_date')
            ->take(5)
            ->get()
            ->map(fn (JourneyDeparture $departure) => [
                'id' => $departure->id,
                'journey_name' => $departure->journey?->name ?? 'Unassigned Journey',
                'journey_id' => $departure->journey_id,
                'start_date' => $departure->start_date?->format('Y-m-d'),
                'end_date' => $departure->end_date?->format('Y-m-d'),
                'price_minor' => $departure->price_minor,
                'available_seats' => $departure->available_seats,
                'total_seats' => $departure->total_seats,
                'status' => $departure->status,
            ]);

        $destinationsSummary = Destination::query()
            ->withCount('journeys')
            ->orderBy('sort_order')
            ->get()
            ->map(fn (Destination $destination) => [
                'id' => $destination->id,
                'name' => $destination->name,
                'slug' => $destination->slug,
                'journeys_count' => $destination->journeys_count,
                'packages_count' => $destination->journeys_count,
                'is_featured' => (bool) $destination->is_featured,
                'is_active' => (bool) $destination->is_active,
            ]);

        $monthlyTrend = [];
        for ($i = 5; $i >= 0; $i--) {
            $monthStart = Carbon::now()->subMonths($i)->startOfMonth();
            $monthEnd = Carbon::now()->subMonths($i)->endOfMonth();

            $monthlyTrend[] = [
                'month' => $monthStart->format('M Y'),
                'short_month' => $monthStart->format('M'),
                'planner_submissions' => PlannerSubmission::query()->whereBetween('created_at', [$monthStart, $monthEnd])->count(),
                'inquiries' => Inquiry::query()->whereBetween('created_at', [$monthStart, $monthEnd])->count(),
                'bookings' => PlannerSubmission::query()->whereBetween('created_at', [$monthStart, $monthEnd])->count(),
            ];
        }

        return response()->json([
            'success' => true,
            'data' => [
                'metrics' => [
                    'total_journeys' => $totalJourneys,
                    'published_journeys' => $publishedJourneys,
                    'active_journeys' => $activeJourneys,
                    'total_destinations' => $totalDestinations,
                    'active_destinations' => $activeDestinations,
                    'total_experiences' => $totalExperiences,
                    'total_departures' => $totalDepartures,
                    'upcoming_departures_count' => $upcomingDeparturesCount,
                    'total_guides' => $totalGuides,
                    'total_articles' => $totalArticles,
                    'published_articles' => $publishedArticles,
                    'total_inquiries' => $totalInquiries,
                    'new_inquiries' => $newInquiries,
                    'reviewing_inquiries' => $reviewingInquiries,
                    'replied_inquiries' => $repliedInquiries,
                    'total_planner_submissions' => $totalPlannerSubmissions,
                    'new_planner_submissions' => $newPlannerSubmissions,
                    'newsletter_subscribers' => $newsletterSubscribers,
                    'total_bookings' => $totalPlannerSubmissions,
                    'total_travellers' => PlannerSubmission::query()->sum('adults') + PlannerSubmission::query()->sum('children'),
                    'in_progress_inquiries' => $reviewingInquiries,
                    'resolved_inquiries' => $repliedInquiries,
                    'total_packages' => $totalJourneys,
                    'active_packages' => $publishedJourneys,
                    'total_blogs' => $totalArticles,
                    'total_customers' => $newsletterSubscribers,
                ],
                'recent_inquiries' => $recentInquiries,
                'recent_planner_submissions' => $recentPlannerSubmissions,
                'recent_bookings' => $recentPlannerSubmissions,
                'upcoming_departures' => $upcomingDepartures,
                'destinations_summary' => $destinationsSummary,
                'monthly_trend' => $monthlyTrend,
            ],
        ]);
    }
}
