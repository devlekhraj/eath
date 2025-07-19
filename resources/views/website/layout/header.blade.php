<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>E.A.T.H Travel - Explore Adventure Tourism & Hospitality</title>

    {{-- Google Fonts (load from CDN for better performance) --}}
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    {{-- Vite CSS & JS --}}
    @vite(['resources/website/scss/website.scss', 'resources/website/js/website.js'])

    <style>

    </style>

</head>

<body>
    @include('website.layout._main_nav')
