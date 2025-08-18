<!DOCTYPE html>
<html lang="en_US">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>EATH Travel - Explore Adventure Tourism & Hospitality</title>

    {{-- Meta SEO --}}
    <meta name="title" content="EATH Travel - Explore Adventure Tourism & Hospitality in Nepal">
    <meta name="description"
        content="Experience immersive adventure tours and cultural journeys across Nepal with EATH Travel. Trusted since 2024. Book trekking, heritage, and custom travel packages now.">
    <meta name="keywords"
        content="Nepal travel, adventure tours, cultural trips, trekking in Nepal, EATH Travel, Himalayan tours, travel agency in Kathmandu, tourism in Nepal, Annapurna trek, Everest base camp">
    <meta name="author" content="EATH Travel">
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="{{ url()->current() }}">

    {{-- Open Graph / Facebook --}}
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="EATH Travel - Explore Adventure Tourism & Hospitality">
    <meta property="og:description"
        content="Experience immersive adventure tours and cultural journeys across Nepal. Trusted since 2008. Book now.">
    <meta property="og:image" content="{{ asset('images/og-image.jpeg') }}"> {{-- Recommended size: 1200x630px --}}

    {{-- Twitter --}}
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:url" content="{{ url()->current() }}">
    <meta name="twitter:title" content="EATH Travel - Explore Adventure Tourism & Hospitality">
    <meta name="twitter:description"
        content="Book unforgettable tours in Nepal. Trekking, cultural trips, and more from EATH Travel.">
    <meta name="twitter:image" content="{{ asset('images/og-image.jpeg') }}">

    {{-- Favicon --}}

    <!-- Standard Favicons -->
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon_io/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon_io/favicon-16x16.png">

    <!-- Apple Touch Icon -->
    <link rel="apple-touch-icon" sizes="180x180" href="/favicon_io/apple-touch-icon.png">

    <!-- Android Chrome / PWA Icons -->
    <link rel="icon" type="image/png" sizes="192x192" href="/favicon_io/android-chrome-192x192.png">
    <link rel="icon" type="image/png" sizes="512x512" href="/favicon_io/android-chrome-512x512.png">

    <!-- Web Manifest -->
    <link rel="manifest" href="/favicon_io/site.webmanifest">



    {{-- Google Fonts --}}
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">

    {{-- CSS & JS --}}
    @vite(['resources/website/scss/website.scss', 'resources/website/js/website.js'])

    {{-- JSON-LD Structured Data --}}
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "TravelAgency",
      "name": "EATH Travel",
      "url": "{{ url('/') }}",
      "logo": "{{ asset('images/logo.png') }}",
      "image": "{{ asset('images/og-image.jpeg') }}",
      "description": "EATH Travel offers trekking, cultural, and adventure tourism packages in Nepal. Trusted since 2008.",
      "telephone": "+977-9841927372",
      "email": "eathtravelnp@gmail.com",
      "address": {
        "@type": "PostalAddress",
        "streetAddress": "Thamel",
        "addressLocality": "Kathmandu",
        "addressCountry": "NP"
      },
      "sameAs": [
        "https://www.facebook.com/eathtravel",
        "https://www.instagram.com/eathtravel",
        "https://www.youtube.com/eathtravel",
        "https://www.tripadvisor.com/eathtravel"
      ]
    }
    </script>

</head>


<body>
    <!-- Modal structure -->
    <div class="modal fade" id="globalModal" tabindex="-1" aria-labelledby="globalModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content" style="border-radius: 4px;">
                <!-- Modal header -->
                <div class="modal-header">
                    <h5 class="modal-title" id="globalModalLabel">Modal Title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    This is the content of the modal.
                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    @include('website.layout._main_nav')
