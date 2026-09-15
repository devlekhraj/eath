<!doctype html>
<html lang="en-NP">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="theme-color" content="#0284c7">

    @php
        $seoTitle = trim($__env->yieldContent('title', 'EATH Ways — Himalayan Trekking & Local Guided Expeditions'));
        $seoDescription = trim($__env->yieldContent('meta_description', 'Explore authentic Himalayan trekking itineraries across Everest, Annapurna, Langtang, Manaslu, and Mustang with licensed local guides and careful altitude pacing.'));
        $seoCanonical = url(request()->getPathInfo());
        $seoImage = url('/images/hero.webp');
    @endphp

    <title>{{ $seoTitle }}</title>
    <meta name="description" content="{{ $seoDescription }}">
    <link rel="canonical" href="{{ $seoCanonical }}">
    <link rel="alternate" hreflang="en-np" href="{{ $seoCanonical }}">
    <link rel="alternate" hreflang="x-default" href="{{ $seoCanonical }}">
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="EATH Ways">
    <meta property="og:title" content="{{ $seoTitle }}">
    <meta property="og:description" content="{{ $seoDescription }}">
    <meta property="og:url" content="{{ $seoCanonical }}">
    <meta property="og:image" content="{{ $seoImage }}">
    <meta property="og:image:alt" content="Himalayan trekking landscape by EATH Ways">
    <meta property="og:locale" content="en_NP">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $seoTitle }}">
    <meta name="twitter:description" content="{{ $seoDescription }}">
    <meta name="twitter:image" content="{{ $seoImage }}">
    <script type="application/ld+json">
        {!! json_encode([
            '@context' => 'https://schema.org',
            '@type' => 'TravelAgency',
            'name' => 'EATH Ways',
            'url' => url('/website'),
            'logo' => url('/images/logo.png'),
            'image' => $seoImage,
            'description' => $seoDescription,
            'areaServed' => 'Nepal',
            'knowsAbout' => ['Everest trekking', 'Annapurna trekking', 'Langtang trekking', 'Manaslu trekking', 'Mustang trekking'],
        ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}
    </script>
    <script type="application/ld+json">
        {!! json_encode([
            '@context' => 'https://schema.org',
            '@type' => 'WebSite',
            'name' => 'EATH Ways',
            'url' => url('/website'),
            'inLanguage' => 'en-NP',
        ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}
    </script>

    @stack('preload')

    <!-- Scoped Website Assets (Vite CSS & Progressive Enhancement JS) -->
    @vite(['packages/website/resources/website/scss/website-preview.scss', 'packages/website/resources/website/js/website-preview.js'])

    @stack('head')
</head>
<body class="eath-website">
    @include('website_preview.layout.header')

    @if(!empty($breadcrumbs) && empty($hideTopBreadcrumbs))
        <div class="website-container">
            @include('website_preview.components.breadcrumbs', ['breadcrumbs' => $breadcrumbs])
        </div>
    @endif

    <main id="website-main-content" tabindex="-1">
        @yield('content')
    </main>

    <!-- Comparison Tray and 4th Trek Replacement Modal -->
    @include('website_preview.components.comparison-tray')

    <!-- Global Centered Dynamic Modal Shell -->
    @include('website_preview.components.global-modal')

    <!-- Global Right-side Dynamic Offcanvas Shell -->
    @include('website_preview.components.global-offcanvas')

    @include('website_preview.layout.footer')

    @php
        $compareEndpoints = [
            'state' => route('website.compare.state'),
            'store' => route('website.compare.items.store'),
            'set' => route('website.compare.items.set'),
            'replace' => route('website.compare.items.replace'),
            'clear' => route('website.compare.items.clear'),
            'destroyBase' => url('/compare-treks/items'),
        ];
    @endphp

    <!-- Lightweight Server-Emitted Whitelist for Shared Client Comparison State -->
    <script id="website-trek-whitelist" type="application/json" data-whitelist="{{ base64_encode(json_encode(\Website\Services\WebsiteCatalogRepository::getTrekWhitelist())) }}"></script>
    <script id="website-compare-endpoints" type="application/json">{!! json_encode($compareEndpoints, JSON_UNESCAPED_SLASHES) !!}</script>
    <script>
        window.__WEBSITE_COMPARE_URL__ = "{{ route('website.compare') }}";
        window.__WEBSITE_COMPARE_ENDPOINTS__ = JSON.parse(document.getElementById('website-compare-endpoints')?.textContent || '{}');
    </script>

    @stack('scripts')
</body>
</html>
