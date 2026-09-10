@extends('website_preview.layout.master')

@section('title', 'EATH Ways — Himalayan Trekking in Nepal (Website)')
@section('meta_description', 'Explore authentic Himalayan trekking itineraries across Everest, Annapurna, and Manaslu with licensed local guides and conservative altitude pacing.')

@push('head')
    <link rel="preload" as="image" href="/images/hero-mobile.webp" media="(max-width: 640px)" type="image/webp" fetchpriority="high">
    <link rel="preload" as="image" href="/images/hero.webp" media="(min-width: 641px)" type="image/webp" fetchpriority="high">
@endpush

@section('content')
    {{-- Section 03: Hero with Eyebrow, H1, Supporting Sentence and Primary CTAs --}}
    @include('website_preview.pages.home.section-03-hero')

    {{-- Section 04: Live Stats & Impact Counter below Hero --}}
    @include('website_preview.pages.home.section-04-stats')

    {{-- Upcoming Fixed Departures below Hero --}}
    @include('website_preview.pages.home.section-05-departures', [
        'upcomingDepartures' => $upcomingDepartures ?? [],
    ])

    {{-- Section 05: Experience Discovery (All 6 populated categories) --}}
    @include('website_preview.pages.home.section-05-experiences', [
        'experiences' => $experiences,
    ])

    {{-- Section 06: Featured Treks (First 3 by featured_rank + departures link) --}}
    @include('website_preview.pages.home.section-06-featured-treks', [
        'treks' => $featuredTreks,
        'upcomingDepartures' => $upcomingDepartures ?? [],
    ])

    {{-- Section 07: Destination Explorer (Five region tiles with varied spans) --}}
    @include('website_preview.pages.home.section-07-destinations', [
        'regions' => $regions,
    ])

    {{-- Section 08: Find My Trek (Warm editorial split with 4 preference cues) --}}
    @include('website_preview.pages.home.section-08-find-my-trek')

    {{-- Section 09: Travel by Month (12 month selector + in-place sample departure table) --}}
    @include('website_preview.pages.home.section-09-travel-by-month', [
        'months' => $months,
        'selectedMonth' => $selectedMonth,
        'treks' => $treks,
    ])

    {{-- Section 10: Compare Treks (Intro + EBC / ABC / Langtang facts & actions) --}}
    @include('website_preview.pages.home.section-10-compare-treks', [
        'compareTreks' => $compareTreks,
    ])

    {{-- Section 11: Why EATH (Three minimal editorial planning approach columns) --}}
    @include('website_preview.pages.home.section-11-why-eath')

    {{-- Section 12: Reviews / Traveler Stories (Three photo-led fictional story cards) --}}
    @include('website_preview.pages.home.section-12-stories', [
        'stories' => $stories,
    ])

    {{-- Section 13: Safety & Mountain Support (Image/text split with 3 protocols) --}}
    @include('website_preview.pages.home.section-13-safety')

    {{-- Section 14: Custom Trip (Large image + tailoring dimensions) --}}
    @include('website_preview.pages.home.section-14-custom-trip')

    {{-- Section 15: How It Works (Four numbered steps + website simulation boundary) --}}
    @include('website_preview.pages.home.section-15-how-it-works')

    {{-- Section 16: Meet Your Guides (Three fictional guide profiles) --}}
    @include('website_preview.pages.home.section-16-guides', [
        'guides' => $guides,
    ])

    {{-- Section 17: Responsible Travel (Three sustainability themes & proposed practices) --}}
    @include('website_preview.pages.home.section-17-responsible-travel')

    {{-- Section 18: Nepal Travel Guide (Three featured educational articles) --}}
    @include('website_preview.pages.home.section-18-travel-guide', [
        'articles' => $articles,
    ])

    {{-- Section 19: Final CTA (Forest background, headline, planner & contact action) --}}
    @include('website_preview.pages.home.section-19-final-cta')
@endsection
