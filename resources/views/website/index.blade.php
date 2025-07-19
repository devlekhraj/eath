@extends('website.layout.master')
@section('content')
    <div>

        @include('website.pages.home.home-banner')
        @include('website.pages.home.home-grand-package')
        @include('website.pages.home.home-package-list')
        
        @include('website.pages.home.home-travel-guide')

        @include('website.pages.home.home-why-choose-us')

        @include('website.pages.home.home-reviews')



    </div>
@endsection
