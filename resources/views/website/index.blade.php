@extends('website.layout.master')
@section('content')

    {{-- section hero --}}
    @include('website.pages.home.landing-hero')

    {{-- section taglines --}}
    @include('website.pages.home.landing-taglines')

    {{-- section search treks --}}
    @include('website.pages.home.landing-search-treks')

    {{-- section featured treks --}}
    @include('website.pages.home.landing-featured-treks')

    <!-- section custom trek -->
    @include('website.pages.home.landing-custom-trek')


    {{-- section top destinations --}}
    @include('website.pages.home.landing-destinations')

    {{-- section why choose us --}}
    @include('website.pages.home.landing-why-choose-us')


    {{-- section gallery --}}
    @include('website.pages.home.landing-gallery')

    {{-- responsible tourism --}}
    @include('website.pages.home.landing-responsible-tourism')


    {{-- section how we work --}}
    @include('website.pages.home.landing-how-we-work')


    {{-- section safety & preparation --}}
    @include('website.pages.home.landing-safety-preparation')


    {{-- section newsletter --}}
    @include('website.pages.home.landing-newsletter')
@endsection
