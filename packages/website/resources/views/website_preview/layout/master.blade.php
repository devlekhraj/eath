<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex, nofollow">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'EATH Ways — Himalayan Trekking & Local Guided Expeditions (Website)')</title>
    <meta name="description" content="@yield('meta_description', 'Explore sample Himalayan trek journeys in the EATH preview website.')">
    <link rel="canonical" href="{{ url(request()->getPathInfo()) }}">
    <meta property="og:type" content="website">
    <meta property="og:title" content="@yield('title', 'EATH Ways Website')">
    <meta property="og:description" content="@yield('meta_description', 'Explore sample Himalayan trek journeys in the EATH preview website.')">
    <meta property="og:url" content="{{ url(request()->getPathInfo()) }}">

    <!-- Google Fonts Preconnect & Non-Render-Blocking Stylesheet -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preload" as="style" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Newsreader:opsz,wght@6..72,500;6..72,600;6..72,700&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Newsreader:opsz,wght@6..72,500;6..72,600;6..72,700&display=swap" media="print" onload="this.media='all'">
    <noscript>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Newsreader:opsz,wght@6..72,500;6..72,600;6..72,700&display=swap">
    </noscript>

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

    <!-- Lightweight Server-Emitted Whitelist for Shared Client Comparison State -->
    <script id="website-trek-whitelist" type="application/json" data-whitelist="{{ base64_encode(json_encode(\Website\Services\WebsiteCatalogRepository::getTrekWhitelist())) }}"></script>
    <script>
        window.__WEBSITE_COMPARE_URL__ = "{{ route('website.compare') }}";
    </script>

    @stack('scripts')
</body>
</html>
