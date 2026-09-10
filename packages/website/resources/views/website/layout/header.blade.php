<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>{{ $title ?? 'EATH Ways — Nepal Himalayan Trekking & Local Guided Expeditions' }}</title>
    <meta name="description"
        content="Safely guided Himalayan treks in Nepal with licensed local mountain leaders for Everest, Annapurna, and Manaslu regions." />
    <meta name="keywords"
        content="Nepal Himalayan trekking, Everest Base Camp Trek, Annapurna Base Camp Trek, Manaslu Circuit Trek, Nepal trekking company" />
    <meta name="author" content="EATH Travel Pvt Ltd" />
    <meta property="og:title" content="EATH Ways — Safely Guided Himalayan Treks in Nepal" />
    <meta property="og:description"
        content="Trek the Nepal Himalayas with licensed local guides, daily altitude briefings, and safety-led itineraries." />
    <meta property="og:type" content="website" />
    <meta property="og:locale" content="en_US" />
    <link rel="canonical" href="{{ url()->current() }}" />

    <!-- Google Fonts Preconnect -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <!-- Vite Assets (SCSS & JS) -->
    @vite(['packages/website/resources/website/scss/website.scss', 'packages/website/resources/website/js/website.js'])

    <!-- Tailwind CDN for utility classes & MDI icon font -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://unpkg.com/@mdi/font@6.x/css/materialdesignicons.min.css" rel="stylesheet" />

    <!-- Universal zero border-radius enforcement across all components -->
    <style>
        .eath-site,
        .eath-site *,
        .eath-site *::before,
        .eath-site *::after {
            border-radius: 0 !important;
        }
    </style>
    <!-- JSON-LD Structured Data for Travel Agency & Himalayan Expeditions -->
    <script type="application/ld+json">
    {
      "{{ '@context' }}": "https://schema.org",
      "{{ '@type' }}": "TravelAgency",
      "name": "EATH Ways - Himalayan Trekking & Local Guided Expeditions",
      "url": "{{ url('/') }}",
      "logo": "{{ asset('images/logo.png') }}",
      "description": "Licensed Nepal trekking company specializing in Everest, Annapurna, and Manaslu high-altitude trekking expeditions.",
      "telephone": "+977-9867666656",
      "email": "eathways@gmail.com",
      "address": {
        "{{ '@type' }}": "PostalAddress",
        "addressLocality": "Kathmandu",
        "addressCountry": "NP"
      },
      "priceRange": "$$$",
      "areaServed": [
        "Everest Region",
        "Annapurna Region",
        "Manaslu Region",
        "Langtang Region"
      ]
    }
    </script>
</head>

<body class="eath-site bg-canvas text-slate-900 antialiased">
    <!-- Skip to main content landmark for keyboard accessibility -->
    <a href="#main-content" class="skip-to-content">Skip to main content</a>

    <!-- 01 Top Trust Bar -->
    <aside class="top-trust-bar" aria-label="Trust and contact bar">
        <div class="content-container">
            <div class="trust-bar-inner">
                <div class="flex items-center gap-6">
                    <span class="trust-item">
                        <svg viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd"
                                d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z"
                                clip-rule="evenodd" />
                        </svg>
                        Licensed Nepal Trekking Operator
                    </span>
                    <span class="trust-item trust-secondary-item">
                        <svg viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd"
                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm.75-13a.75.75 0 00-1.5 0v5c0 .414.336.75.75.75h4a.75.75 0 000-1.5h-3.25V5z"
                                clip-rule="evenodd" />
                        </svg>
                        Safety-First Altitude Pacing
                    </span>
                    <span class="trust-item trust-secondary-item">
                        <svg viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path
                                d="M10 2a6 6 0 00-6 6v3.586l-.707.707A1 1 0 004 14h12a1 1 0 00.707-1.707L16 11.586V8a6 6 0 00-6-6zM10 18a3 3 0 01-3-3h6a3 3 0 01-3 3z" />
                        </svg>
                        24/7 On-Trail Support
                    </span>
                </div>
                <div class="trust-actions">
                    <a href="https://wa.me/9841927372" target="_blank" rel="noopener noreferrer"
                        aria-label="WhatsApp our trekking team at +977 9841927372">
                        <span class="text-[#25D366] font-bold">WhatsApp:</span> +977 984-1927372
                    </a>
                    <span class="text-slate-300 hidden sm:inline" aria-hidden="true">|</span>
                    <a href="{{ route('contact.us') }}" class="hidden sm:inline-flex">
                        Contact Us
                    </a>
                </div>
            </div>
        </div>
    </aside>

    <!-- 02 Main Header -->
    <header class="site-header" role="banner">
        <div class="content-container">
            <div class="nav-shell">
                <!-- Brand Logo -->
                <a href="{{ route('home') }}" class="brand-link" aria-label="EATH Ways — Nepal Himalayan Trekking Home">
                    <div class="brand-logo-wrap">
                        <img src="/images/logo.png" alt="EATH Ways Logo" width="110" height="36" />
                    </div>
                    <div class="brand-text-group">
                        <span class="brand-title">EATH Ways</span>
                        <span class="brand-tagline">Himalayas · Nepal</span>
                    </div>
                </a>

                <!-- Desktop Primary Navigation -->
                <nav class="nav-primary" aria-label="Primary site navigation">
                    <div class="nav-item">
                        <a href="{{ route('trek.list') }}"
                            class="{{ request()->routeIs('trek.list') ? 'is-active' : '' }}"
                            {{ request()->routeIs('trek.list') ? 'aria-current=page' : '' }}>
                            Treks
                        </a>
                    </div>

                    @if (!empty($menus) && count($menus) > 0)
                        <div class="nav-item">
                            <button type="button" aria-haspopup="true" aria-expanded="false" class="flex items-center gap-1">
                                Destinations
                                <svg class="nav-chevron" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z"
                                        clip-rule="evenodd" />
                                </svg>
                            </button>
                            <div class="nav-dropdown dropdown-wide" role="region" aria-label="Destinations menu">
                                <div class="grid grid-cols-2 gap-4">
                                    @foreach ($menus as $menu)
                                        <div>
                                            <a href="{{ route('destination.detail', ['slug' => $menu['slug']]) }}"
                                                class="dropdown-category-title text-primary hover:underline">
                                                {{ $menu['name'] }}
                                            </a>
                                            <div class="mt-1 space-y-1">
                                                @foreach ($menu['treks'] as $trek)
                                                    <a href="{{ route('trek.show', ['destination' => $menu['slug'], 'slug' => $trek['slug']]) }}"
                                                        class="dropdown-link text-xs">
                                                        {{ $trek['name'] }}
                                                    </a>
                                                @endforeach
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endif

                    @if (!empty($safetyBlogs) && count($safetyBlogs) > 0)
                        <div class="nav-item">
                            <button type="button" aria-haspopup="true" aria-expanded="false" class="flex items-center gap-1">
                                Safety
                                <svg class="nav-chevron" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z"
                                        clip-rule="evenodd" />
                                </svg>
                            </button>
                            <div class="nav-dropdown dropdown-standard" role="region" aria-label="Safety menu">
                                <div class="dropdown-grid">
                                    <span class="dropdown-category-title">Safety Protocols</span>
                                    @foreach ($safetyBlogs as $blog)
                                        <a href="{{ route('blog.detail', ['category_slug' => $blog->category['slug'] ?? 'safety', 'blog_slug' => $blog['slug']]) }}"
                                            class="dropdown-link">
                                            {{ $blog['title'] }}
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endif

                    <div class="nav-item">
                        <a href="{{ route('about.guide.profiles') }}"
                            class="{{ request()->routeIs('about.guide.profiles') ? 'is-active' : '' }}"
                            {{ request()->routeIs('about.guide.profiles') ? 'aria-current=page' : '' }}>
                            Guides
                        </a>
                    </div>

                    <div class="nav-item">
                        <a href="{{ route('blogs') }}" class="{{ request()->routeIs('blogs') ? 'is-active' : '' }}"
                            {{ request()->routeIs('blogs') ? 'aria-current=page' : '' }}>
                            Travel Guide
                        </a>
                    </div>

                    <div class="nav-item">
                        <button type="button" aria-haspopup="true" aria-expanded="false" class="flex items-center gap-1">
                            About
                            <svg class="nav-chevron" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd"
                                    d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z"
                                    clip-rule="evenodd" />
                            </svg>
                        </button>
                        <div class="nav-dropdown dropdown-standard" role="region" aria-label="About menu">
                            <div class="dropdown-grid">
                                <a href="{{ route('about.our.story') }}" class="dropdown-link">
                                    Our Story & Mission
                                </a>
                                <a href="{{ route('responsible.travels') }}" class="dropdown-link">
                                    Responsible Tourism
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="nav-item">
                        <a href="{{ route('contact.us') }}"
                            class="{{ request()->routeIs('contact.us') ? 'is-active' : '' }}"
                            {{ request()->routeIs('contact.us') ? 'aria-current=page' : '' }}>
                            Contact
                        </a>
                    </div>
                </nav>

                <!-- Header Actions & Dominant Planning CTA -->
                <div class="header-actions">
                    <button type="button" class="btn-eath btn-primary btn-sm btnOpenInquiry"
                        aria-label="Plan My Himalayan Trek">
                        <span>Plan My Trek</span>
                        <svg class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd"
                                d="M3 10a.75.75 0 01.75-.75h10.638L10.23 5.29a.75.75 0 111.04-1.08l5.5 5.25a.75.75 0 010 1.08l-5.5 5.25a.75.75 0 11-1.04-1.08l4.158-3.96H3.75A.75.75 0 013 10z"
                                clip-rule="evenodd" />
                        </svg>
                    </button>

                    <!-- Mobile Menu Hamburger -->
                    <button id="mobile-menu-button" type="button" class="mobile-toggle"
                        aria-label="Toggle navigation menu" aria-expanded="false" aria-controls="mobile-menu">
                        <span class="sr-only">Toggle navigation</span>
                        <svg id="mobile-icon-bars" class="h-6 w-6" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round"
                            aria-hidden="true">
                            <line x1="4" y1="6" x2="20" y2="6" />
                            <line x1="4" y1="12" x2="20" y2="12" />
                            <line x1="4" y1="18" x2="20" y2="18" />
                        </svg>
                        <svg id="mobile-icon-x" class="h-6 w-6 hidden" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round"
                            aria-hidden="true">
                            <line x1="18" y1="6" x2="6" y2="18" />
                            <line x1="6" y1="6" x2="18" y2="18" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Drawer Navigation -->
        <div id="mobile-menu" class="mobile-menu-drawer hidden" role="dialog" aria-modal="true"
            aria-label="Mobile Navigation">
            <div class="drawer-inner">
                <a href="{{ route('trek.list') }}" class="direct-nav-link">
                    All Himalayan Treks
                </a>

                @if (!empty($menus) && count($menus) > 0)
                    <div>
                        <button type="button" class="accordion-trigger" data-mobile-accordion="destinations"
                            aria-expanded="false">
                            <span>Destinations</span>
                            <svg viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd"
                                    d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z"
                                    clip-rule="evenodd" />
                            </svg>
                        </button>
                        <div class="accordion-content hidden" id="mobile-panel-destinations">
                            @foreach ($menus as $menu)
                                <a href="{{ route('destination.detail', ['slug' => $menu['slug']]) }}"
                                    class="font-semibold text-slate-800">
                                    {{ $menu['name'] }}
                                </a>
                                @foreach ($menu['treks'] as $trek)
                                    <a href="{{ route('trek.show', ['destination' => $menu['slug'], 'slug' => $trek['slug']]) }}"
                                        class="pl-2">
                                        {{ $trek['name'] }}
                                    </a>
                                @endforeach
                            @endforeach
                        </div>
                    </div>
                @endif

                @if (!empty($safetyBlogs) && count($safetyBlogs) > 0)
                    <div>
                        <button type="button" class="accordion-trigger" data-mobile-accordion="safety"
                            aria-expanded="false">
                            <span>Safety & Support</span>
                            <svg viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd"
                                    d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z"
                                    clip-rule="evenodd" />
                            </svg>
                        </button>
                        <div class="accordion-content hidden" id="mobile-panel-safety">
                            @foreach ($safetyBlogs as $blog)
                                <a
                                    href="{{ route('blog.detail', ['category_slug' => $blog->category['slug'] ?? 'safety', 'blog_slug' => $blog['slug']]) }}">
                                    {{ $blog['title'] }}
                                </a>
                            @endforeach
                        </div>
                    </div>
                @endif

                <a href="{{ route('about.guide.profiles') }}" class="direct-nav-link">
                    Meet Your Guides
                </a>

                <a href="{{ route('blogs') }}" class="direct-nav-link">
                    Nepal Travel Guide
                </a>

                <div>
                    <button type="button" class="accordion-trigger" data-mobile-accordion="about"
                        aria-expanded="false">
                        <span>About EATH</span>
                        <svg viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd"
                                d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z"
                                clip-rule="evenodd" />
                        </svg>
                    </button>
                    <div class="accordion-content hidden" id="mobile-panel-about">
                        <a href="{{ route('about.our.story') }}">Our Story</a>
                        <a href="{{ route('responsible.travels') }}">Responsible Travel</a>
                    </div>
                </div>

                <a href="{{ route('contact.us') }}" class="direct-nav-link">
                    Contact Us
                </a>

                <div class="pt-2">
                    <button type="button" class="btn-eath btn-primary btn-md w-full btnOpenInquiry">
                        Plan My Himalayan Trek
                    </button>
                </div>
            </div>
        </div>
    </header>
