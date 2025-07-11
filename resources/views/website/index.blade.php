@extends('website.layout.master')
@section('content')
    <div class="pb-5 pt-4" >

        @include('website.pages.landing.banner')
        
        @include('website.pages.landing.home-category')

        @include('website.pages.landing.home-banner-1')

        @include('website.pages.landing.home-recommanded')

        @include('website.pages.landing.home-electronics-brands')

        @include('website.pages.landing.home-banner-2')
        
        @include('website.pages.landing.home-offers')
        
        @include('website.pages.landing.home-super-sale')
        
        @include('website.pages.landing.home-shopping-event')
        
        @include('website.pages.landing.home-top-washing-machine')
        
        @include('website.pages.landing.home-banner-3')

        @include('website.pages.landing.home-hot-deals')
        {{-- @include('website.pages.landing.home-banner-event') --}}

    </div>
@endsection
