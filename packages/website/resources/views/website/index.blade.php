@extends('website.layout.master')

@section('content')
    {{-- ========================================================================= --}}
    {{-- EATH WAYS HOMEPAGE ARCHITECTURE (SECTIONS 03–19)                          --}}
    {{-- Locked sequence per docs/eath-homepage-antigravity-prompts/04-homepage-architecture.md --}}
    {{-- ========================================================================= --}}

    {{-- 03 Hero --}}
    @include('website.pages.home.landing-hero')

    {{-- 04 Trek Discovery / Search --}}
    @include('website.pages.home.landing-trek-search')

    {{-- 05 Upcoming Fixed Departures --}}
    @if(isset($departures) && count($departures) > 0)
        @include('website.pages.home.landing-departures')
    @endif

    {{-- 06 Experience Discovery --}}
    @include('website.pages.home.landing-experiences')

    {{-- 06 Featured Treks (includes Fixed Departures tab) --}}
    @include('website.pages.home.landing-featured-treks')

    {{-- 07 Destination Explorer --}}
    @include('website.pages.home.landing-destinations')

    {{-- 08 Find My Trek --}}
    @include('website.pages.home.landing-find-my-trek')

    {{-- 09 Travel By Month --}}
    @include('website.pages.home.landing-travel-month')

    {{-- 10 Compare Treks --}}
    @include('website.pages.home.landing-compare-treks')

    {{-- 11 Why EATH (Credible differentiation absorbing verified proof points) --}}
    @include('website.pages.home.landing-why-choose-us')

    {{-- 12 Reviews / Traveler Stories --}}
    @include('website.pages.home.landing-reviews')

    {{-- 13 Safety & Support --}}
    @include('website.pages.home.landing-safety')

    {{-- 14 Custom Trip (Tailored itineraries) --}}
    @include('website.pages.home.landing-custom-trek')

    {{-- 15 How It Works --}}
    @include('website.pages.home.landing-how-we-work')

    {{-- 16 Meet Your Guides --}}
    @include('website.pages.home.landing-guides')

    {{-- 17 Responsible Travel --}}
    @include('website.pages.home.landing-responsible-tourism')

    {{-- 18 Nepal Travel Guide (Educational SEO articles) --}}
    @include('website.pages.home.landing-travel-guide')

    {{-- 19 Final Conversion CTA --}}
    @include('website.pages.home.landing-final-cta')
@endsection