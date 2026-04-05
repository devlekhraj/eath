<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description"
        content="Safely guided Himalayan treks in Nepal with experienced local guides for Everest, Annapurna, and Manaslu regions." />
    <meta name="keywords"
        content="Nepal Himalayan trekking, Everest Base Camp Trek, Annapurna Base Camp Trek, Manaslu Circuit Trek, Nepal trekking company" />
    <meta name="author" content="Himalayan Trekking Company" />
    <meta property="og:title" content="Safely Guided Himalayan Treks in Nepal" />
    <meta property="og:description"
        content="Trek the Nepal Himalayas with experienced local guides, daily safety briefings, and altitude-aware itineraries." />
    <meta property="og:type" content="website" />
    <meta property="og:locale" content="en_US" />
    <link rel="preload" as="image"
        href="https://images.unsplash.com/photo-1470770903676-69b98201ea1c?auto=format&fit=crop&w=1600&q=80" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://unpkg.com/@mdi/font@6.x/css/materialdesignicons.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    <title>Safely Guided Himalayan Treks in Nepal | Everest, Annapurna, Manaslu</title>
    {{-- <link rel="stylesheet" href="/style.css" /> --}}
    <style>
        .hero-content {
            position: relative;
            z-index: 2;
        }

        .swiper {
            height: 100%;
        }

        .hero-swiper .swiper-slide {
            position: relative;
            overflow: hidden;
        }

        .hero-swiper .swiper-wrapper {
            transition-timing-function: cubic-bezier(0.22, 0.61, 0.36, 1);
        }

        .hero-swiper .swiper-slide::after {
            content: "";
            position: absolute;
            inset: 0;
            background: linear-gradient(90deg, rgba(17, 26, 48, 0.786) 0%, rgba(15, 23, 42, 0.081) 50%, rgba(255, 255, 255, 0) 100%);
            z-index: 1;
        }

        .hero-swiper img {
            position: relative;
            z-index: 0;
        }

        body {
            font-size: 16px;
            line-height: 1.65;
        }

        h1,
        h2,
        h3 {
            line-height: 1.2;
        }

        h4 {
            line-height: 1.3;
        }

        p {
            line-height: 1.7;
        }

        .hero-swiper .swiper-slide-active img {
            animation: heroZoom 20s linear infinite;
        }

        @keyframes heroZoom {
            0% {
                transform: scale(1);
            }

            50% {
                transform: scale(1.08);
            }

            100% {
                transform: scale(1);
            }
        }

        @media (prefers-reduced-motion: reduce) {
            .hero-swiper .swiper-slide-active img {
                animation: none;
            }
        }

        .site-header {
            color: #ffffff;
        }

        .site-header .nav-link,
        .site-header .nav-button {
            color: rgba(255, 255, 255, 0.9);
        }

        .site-header .nav-link:hover,
        .site-header .nav-button:hover {
            color: #ffffff;
        }

        .site-header .nav-cta {
            background: #3AA5E9;
            color: #ffffff;
        }

        .site-header.is-scrolled {
            color: #0f172a;
        }

        .site-header.is-scrolled .nav-link,
        .site-header.is-scrolled .nav-button {
            color: #0f172a;
        }

        .site-header.is-scrolled .nav-link:hover,
        .site-header.is-scrolled .nav-button:hover {
            color: #0f172a;
        }

        .site-header.is-scrolled .nav-cta {
            background: #0f172a;
            color: #ffffff;
        }

        .site-header .nav-link,
        .site-header .nav-button,
        .site-header .nav-cta {
            transition: color 200ms ease, transform 200ms ease, background-color 200ms ease, opacity 200ms ease;
        }

        .site-header .nav-link,
        .site-header .nav-button {
            position: relative;
        }

        .site-header .nav-link::after,
        .site-header .nav-button::after {
            content: "";
            position: absolute;
            left: 50%;
            bottom: 6px;
            width: 0;
            height: 2px;
            background: currentColor;
            opacity: 0.6;
            transform: translateX(-50%);
            transition: width 200ms ease, opacity 200ms ease;
        }

        .site-header .nav-link:hover::after,
        .site-header .nav-button:hover::after,
        .site-header .nav-link:focus-visible::after,
        .site-header .nav-button:focus-visible::after {
            width: 100%;
            opacity: 1;
        }

        .site-header .nav-link.is-active::after,
        .site-header .nav-button.is-active::after,
        .site-header .nav-link[aria-current="page"]::after {
            width: 100%;
            opacity: 1;
        }

        .site-header .nav-cta:hover {
            transform: translateY(-1px);
        }

        .nav-dropdown {
            transform: translateY(-6px);
            transition: opacity 200ms ease, transform 220ms ease;
        }

        .group:hover>.nav-dropdown,
        .group:focus-within>.nav-dropdown {
            transform: translateY(0);
        }

        .nav-backdrop {
            position: fixed;
            inset: 0;
            background: rgba(15, 23, 42, 0.45);
            backdrop-filter: blur(2px);
            opacity: 0;
            pointer-events: none;
            transition: opacity 200ms ease;
            z-index: 40;
        }

        .nav-shell {
            position: relative;
            z-index: 60;
        }

        body.is-dropdown-open .nav-backdrop {
            opacity: 1;
            pointer-events: auto;
        }

        .site-header .nav-dropdown {
            z-index: 70;
        }

        @media (prefers-reduced-motion: reduce) {

            .site-header .nav-link,
            .site-header .nav-button,
            .site-header .nav-cta,
            .nav-dropdown {
                transition: none;
            }

            .site-header .nav-cta:hover {
                transform: none;
            }

            .site-header .nav-link::after,
            .site-header .nav-button::after {
                transition: none;
            }

            .nav-backdrop {
                transition: none;
            }
        }

        .nav-dropdown {
            background: #ffffff;
            color: #0f172a;
        }

        .nav-dropdown a {
            color: #0f172a;
            transition: color 180ms ease;
        }

        .nav-dropdown a:hover {
            color: #1e293b;
        }

        .nav-dropdown a:focus-visible {
            outline: none;
            box-shadow: 0 0 0 2px rgba(14, 165, 233, 0.3);
        }

        .nav-dropdown .menu-list {
            display: grid;
            gap: 8px;
        }

        .nav-dropdown .text-slate-600 {
            color: #475569;
        }

        .nav-dropdown .text-slate-800,
        .nav-dropdown .text-slate-900 {
            color: #0f172a;
        }

        .hero-title {
            color: #ffffff;
            /* font-weight: 900; */
            /* background-image: url('https://plus.unsplash.com/premium_photo-1697730124551-f3eabdd16b84?q=80&w=1470&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D');
            background-clip: text;
            -webkit-background-clip: text;
            color: transparent;
            background-position: center;
            background-size: 140% 140%;
            animation: heroTitleZoom 16s ease-in-out infinite; */
        }

        .clip-text {
            font-weight: 900;
            background-image: url('https://img.drz.lazcdn.com/static/np/p/bd6ab6193b6452c6ae23f4c104c9b823.jpg_720x720q80.jpg');
            background-clip: text;
            -webkit-background-clip: text;
            color: transparent;
            background-position: center;
            background-size: 140% 140%;
            animation: heroTitleZoom 16s ease-in-out infinite;
        }

        .gradient-text {
            background: linear-gradient(90deg, #00aaff, #007ad6, #f63939);
            background-size: 200% auto;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            display: inline-block;
            animation: gradientMove 3.5s ease-in-out infinite;
        }

        @keyframes gradientMove {
            0% {
                background-position: 0% 50%;
            }

            50% {
                background-position: 100% 50%;
            }

            100% {
                background-position: 0% 50%;
            }
        }

        @keyframes heroTitleZoom {
            0% {
                background-size: 130% 130%;
            }

            50% {
                background-size: 160% 160%;
            }

            100% {
                background-size: 130% 130%;
            }
        }

        .hero-typing span {
            display: inline-block;
            border-right: 2px solid rgba(255, 255, 255, 0.75);
            padding-right: 6px;
            white-space: nowrap;
            animation: heroCaret 0.9s step-end infinite;
        }

        @keyframes heroTitleReveal {
            0% {
                opacity: 0;
                transform: translateY(18px) scale(0.98);
                letter-spacing: 0.35em;
            }

            100% {
                opacity: 1;
                transform: translateY(0) scale(1);
                letter-spacing: 0.18em;
            }
        }

        @keyframes heroTitleGradient {
            0% {
                background-position: 0% 50%;
            }

            100% {
                background-position: 100% 50%;
            }
        }

        @keyframes heroCaret {

            0%,
            100% {
                border-color: rgba(255, 255, 255, 0);
            }

            50% {
                border-color: rgba(255, 255, 255, 0.8);
            }
        }

        @media (prefers-reduced-motion: reduce) {
            .hero-title {
                animation: none;
            }

            .hero-typing span {
                animation: none;
            }
        }

        .trek-stats>div:nth-child(1) svg {
            color: #64748b;
        }

        .trek-stats>div:nth-child(2) svg {
            color: #2563eb;
        }

        .trek-stats>div:nth-child(3) svg {
            color: #f59e0b;
        }

        #inquiry-panel {
            pointer-events: none;
        }

        #inquiry-panel .inquiry-backdrop {
            opacity: 0;
            transition: opacity 200ms ease;
        }

        #inquiry-panel .inquiry-drawer {
            transform: translateX(100%);
            transition: transform 260ms ease;
        }

        #inquiry-panel.is-open {
            pointer-events: auto;
        }

        #inquiry-panel.is-open .inquiry-backdrop {
            opacity: 1;
        }

        #inquiry-panel.is-open .inquiry-drawer {
            transform: translateX(0);
        }

        .inquiry-cta {
            position: relative;
        }

        .inquiry-cta {
            border-right: 0;
            border-top-left-radius: 4px;
            border-bottom-left-radius: 4px;
            background: linear-gradient(#0ea5e9, #0ea5e9) padding-box,
                linear-gradient(120deg, #0ea5e9, #373b3c, #38bdf8, #252b26, #0ea5e9) border-box;
            background-size: 100% 100%, 300% 300%;
            animation: inquiryBorderShift 4.4s linear infinite;
            font-weight: 900 !important;
        }

        @keyframes inquiryBorderShift {
            0% {
                background-position: 0% 50%, 0% 50%;
            }

            100% {
                background-position: 0% 50%, 100% 50%;
            }
        }

        .social-dock {
            position: fixed;
            left: 0.75rem;
            top: 50%;
            transform: translateY(-50%);
            z-index: 50;
            display: flex;
            flex-direction: column;
        }

        .social-dock a {
            width: 2.5rem;
            height: 2.5rem;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            background: #fff;
            color: #0f172a;
        }

        .social-dock a:hover {
            background: #f8fafc;
        }

        .social-dock .social-facebook {
            color: #1877f2;
        }

        .social-dock .social-twitter {
            color: #1d9bf0;
        }

        .social-dock .social-instagram {
            color: #e1306c;
        }

        .social-dock .social-tripadvisor {
            color: #00af87;
        }

        .social-dock .social-linkedin {
            color: #0a66c2;
        }

        .social-dock .social-whatsapp {
            color: #25d366;
        }

        .social-dock .social-email {
            color: #0f172a;
        }

        .social-dock .social-phone {
            color: #0284c7;
        }

        .social-dock svg {
            width: 1.35rem;
            height: 1.35rem;
        }

        .telegram-spin {
            animation: telegramSpin 3s linear infinite;
            transform-origin: center;
        }

        @keyframes telegramSpin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        .telegram-zoom {
            animation: telegramZoom 1.8s ease-in-out infinite;
            transform-origin: center;
        }

        @keyframes telegramZoom {

            0%,
            100% {
                transform: scale(1);
            }

            50% {
                transform: scale(1.33);
            }
        }

        .how-work-bg {
            background-size: 130% 130%;
            animation: howWorkPanZoom 18s ease-in-out infinite;
            transform-origin: center;
        }

        @keyframes howWorkPanZoom {
            0% {
                background-position: 20% 30%;
                transform: scale(1);
            }

            50% {
                background-position: 80% 60%;
                transform: scale(1.06);
            }

            100% {
                background-position: 20% 30%;
                transform: scale(1);
            }
        }

        @media (prefers-reduced-motion: reduce) {
            .how-work-bg {
                animation: none;
            }
        }

        .how-work-section {
            background: #ffffff;
        }

        .how-work-wave {
            position: absolute;
            inset: 0;
            pointer-events: none;
            opacity: 0.35;
        }

        .how-work-wave::before,
        .how-work-wave::after {
            content: "";
            position: absolute;
            inset: 0;
            background-repeat: repeat-x;
            background-size: 220px 80px;
        }

        .how-work-wave::before {
            top: -10px;
            bottom: auto;
            height: 220px;
            background-image:
                radial-gradient(circle at 20px 40px, rgba(148, 163, 184, 0.35) 14px, transparent 15px),
                radial-gradient(circle at 120px 40px, rgba(14, 165, 233, 0.22) 18px, transparent 19px);
            filter: blur(0.4px);
        }

        .how-work-wave::after {
            bottom: -10px;
            top: auto;
            height: 240px;
            background-image:
                radial-gradient(circle at 40px 30px, rgba(94, 234, 212, 0.22) 16px, transparent 17px),
                radial-gradient(circle at 160px 30px, rgba(56, 189, 248, 0.18) 20px, transparent 21px);
            transform: rotate(1deg);
        }

        .text-sky-600 {
            letter-spacing: 3px;
            text-transform: uppercase;
        }

        .responsible-section {
            position: relative;
            background: #ffffff;
            overflow: hidden;
        }

        .responsible-bg {
            position: absolute;
            inset: 0;
            width: 100%;
            height: 100%;
            opacity: 0.25;
            pointer-events: none;
        }

        .responsible-section .section-inner {
            position: relative;
            z-index: 1;
        }

        .featured-section {
            position: relative;
            background: #f8fcff;
            overflow: hidden;
        }

        .featured-section::before {
            content: "";
            position: absolute;
            inset: 0;
            opacity: 0.18;
            pointer-events: none;
            background-image:
                radial-gradient(circle at 20px 20px, rgba(14, 165, 233, 0.3) 2px, transparent 3px),
                radial-gradient(circle at 60px 60px, rgba(56, 189, 248, 0.25) 2px, transparent 3px);
            background-size: 80px 80px;
            animation: featuredDrift 22s linear infinite;
            z-index: 0;
        }

        .featured-section::after {
            content: "";
            position: absolute;
            inset: 0;
            pointer-events: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 1200 300'%3E%3Cpath fill='%23ffffff' fill-opacity='0.65' d='M0 260 L80 210 L140 230 L220 170 L300 220 L380 150 L460 210 L540 130 L620 200 L700 120 L780 210 L860 140 L940 220 L1020 160 L1100 230 L1200 190 L1200 300 L0 300 Z'/%3E%3Cpath fill='%23f8fafc' fill-opacity='0.75' d='M0 280 L100 235 L180 250 L260 205 L340 245 L420 190 L500 240 L580 180 L660 235 L740 170 L820 240 L900 190 L980 245 L1060 205 L1140 250 L1200 230 L1200 300 L0 300 Z'/%3E%3C/svg%3E");
            background-repeat: repeat-x;
            background-size: 1200px 280px;
            background-position: 0 100%;
            opacity: 0.7;
            animation: featuredMountains 36s linear infinite;
            z-index: 0;
        }

        .featured-inner {
            position: relative;
            z-index: 1;
        }

        .site-footer {
            position: relative;
            background: #ffffff;
            overflow: hidden;
        }

        .site-footer .footer-inner {
            position: relative;
            z-index: 1;
        }

        .planning-section {
            position: relative;
            background: #ffffff;
            overflow: hidden;
        }

        .planning-section::before {
            content: "";
            position: absolute;
            inset: 0;
            opacity: 0.18;
            pointer-events: none;
            background-image:
                radial-gradient(circle at 10% 20%, rgba(56, 189, 248, 0.25) 0%, transparent 50%),
                radial-gradient(circle at 90% 30%, rgba(148, 163, 184, 0.22) 0%, transparent 55%),
                repeating-linear-gradient(135deg,
                    rgba(186, 230, 253, 0.35) 0px,
                    rgba(186, 230, 253, 0.35) 2px,
                    transparent 2px,
                    transparent 24px);
        }

        .planning-section .planning-inner {
            position: relative;
            z-index: 1;
        }
    </style>
</head>

<body class="bg-slate-50 text-slate-900 antialiased">
    <div class="nav-backdrop" aria-hidden="true"></div>
    <main>

        {{-- hero section --}}
        {{-- <section class="relative h-[75vh] min-h-[520px] hero-overlay" aria-labelledby="hero-title">

            <div class="absolute inset-0">
                <div class="swiper hero-swiper">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <img src="https://images.unsplash.com/photo-1584395631446-e41b0fc3f68d?q=80&w=1470&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                                alt="Himalayan peaks under a clear blue sky" class="h-full w-full object-cover" />
                        </div>
                        <div class="swiper-slide">
                            <img src="https://images.unsplash.com/photo-1573331343892-976a013b7020?q=80&w=1470&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D?auto=format&fit=crop&w=1600&q=80"
                                alt="Himalayan ridgeline with layered mountains" class="h-full w-full object-cover" />
                        </div>
                        <div class="swiper-slide">
                            <img src="https://images.unsplash.com/photo-1454496522488-7a8e488e8606?auto=format&fit=crop&w=1600&q=80"
                                alt="Himalayan snow peaks under a clear sky" class="h-full w-full object-cover" />
                        </div>
                    </div>
                </div>
            </div>

            <header class="site-header fixed top-0 left-0 right-0 z-50 backdrop-blur">
                <div class="nav-shell max-w-7xl mx-auto px-2 sm:px-3 lg:px-4">
                    <div class="flex items-center justify-between">
                        <a href="/" class="flex items-center gap-2 py-2" aria-label="Himalayan trekking home">
                            <span class="text-lg font-semibold tracking-tight">EATH Travel</span>
                        </a>
                        <nav class="hidden lg:flex items-center gap-6" aria-label="Primary">
                            <div class="relative group">
                                <button type="button"
                                    class="nav-button flex items-center gap-1 py-6 text-sm font-medium"
                                    aria-expanded="false" aria-haspopup="true">
                                    Treks
                                    <svg class="h-3.5 w-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                                        aria-hidden="true">
                                        <path d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                                    </svg>
                                </button>
                                <div
                                    class="nav-dropdown absolute left-0 top-full -mt-px w-80 backdrop-blur-xl opacity-0 invisible group-hover:opacity-100 group-hover:visible group-focus-within:opacity-100 group-focus-within:visible transition overflow-hidden">
                                    <div class="p-4 pt-6 grid gap-3 text-sm">
                                        <a href="/treks/" class="font-semibold text-slate-900">All Treks</a>
                                        <div>
                                            <a href="/treks/everest/" class="font-semibold text-slate-800">Everest
                                                Treks</a>
                                            <div class="menu-list mt-2">
                                                <a href="/treks/everest/everest-base-camp-trek/"
                                                    class="text-slate-600 hover:text-slate-900">Everest Base Camp
                                                    Trek</a>
                                                <a href="/treks/everest/everest-gokyo-lakes-trek/"
                                                    class="text-slate-600 hover:text-slate-900">Everest Gokyo Lakes
                                                    Trek</a>
                                                <a href="/treks/everest/everest-three-passes-trek/"
                                                    class="text-slate-600 hover:text-slate-900">Everest Three Passes
                                                    Trek</a>
                                            </div>
                                        </div>
                                        <div>
                                            <a href="/treks/annapurna/" class="font-semibold text-slate-800">Annapurna
                                                Treks</a>
                                            <div class="menu-list mt-2">
                                                <a href="/treks/annapurna/annapurna-base-camp-trek/"
                                                    class="text-slate-600 hover:text-slate-900">Annapurna Base Camp
                                                    Trek</a>
                                                <a href="/treks/annapurna/annapurna-circuit-trek/"
                                                    class="text-slate-600 hover:text-slate-900">Annapurna Circuit
                                                    Trek</a>
                                                <a href="/treks/annapurna/ghorepani-poon-hill-trek/"
                                                    class="text-slate-600 hover:text-slate-900">Ghorepani Poon Hill
                                                    Trek</a>
                                            </div>
                                        </div>
                                        <div>
                                            <a href="/treks/manaslu/" class="font-semibold text-slate-800">Manaslu
                                                Treks</a>
                                            <div class="menu-list mt-2">
                                                <a href="/treks/manaslu/manaslu-circuit-trek/"
                                                    class="text-slate-600 hover:text-slate-900">Manaslu Circuit Trek</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="relative group">
                                <button type="button"
                                    class="nav-button flex items-center gap-1 py-6 text-sm font-medium"
                                    aria-expanded="false" aria-haspopup="true">
                                    Destinations
                                    <svg class="h-3.5 w-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                                        aria-hidden="true">
                                        <path d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                                    </svg>
                                </button>
                                <div
                                    class="nav-dropdown absolute left-0 top-full -mt-px w-80 backdrop-blur-xl opacity-0 invisible group-hover:opacity-100 group-hover:visible group-focus-within:opacity-100 group-focus-within:visible transition overflow-hidden">
                                    <div class="p-4 pt-6 grid gap-3 text-sm">
                                        <a href="/destinations/" class="font-semibold text-slate-900">All
                                            Destinations</a>
                                        <div>
                                            <a href="/destinations/everest/"
                                                class="font-semibold text-slate-800">Everest
                                                Region</a>
                                            <div class="menu-list mt-2">
                                                <a href="/destinations/everest/about/"
                                                    class="text-slate-600 hover:text-slate-900">About Everest
                                                    Region</a>
                                                <a href="/destinations/everest/treks/"
                                                    class="text-slate-600 hover:text-slate-900">Treks in Everest
                                                    Region</a>
                                            </div>
                                        </div>
                                        <div>
                                            <a href="/destinations/annapurna/"
                                                class="font-semibold text-slate-800">Annapurna
                                                Region</a>
                                            <div class="menu-list mt-2">
                                                <a href="/destinations/annapurna/about/"
                                                    class="text-slate-600 hover:text-slate-900">About Annapurna
                                                    Region</a>
                                                <a href="/destinations/annapurna/treks/"
                                                    class="text-slate-600 hover:text-slate-900">Treks in Annapurna
                                                    Region</a>
                                            </div>
                                        </div>
                                        <div>
                                            <a href="/destinations/manaslu/"
                                                class="font-semibold text-slate-800">Manaslu
                                                Region</a>
                                            <div class="menu-list mt-2">
                                                <a href="/destinations/manaslu/about/"
                                                    class="text-slate-600 hover:text-slate-900">About Manaslu
                                                    Region</a>
                                                <a href="/destinations/manaslu/treks/"
                                                    class="text-slate-600 hover:text-slate-900">Treks in Manaslu
                                                    Region</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <a href="/custom-trek/"
                                class="nav-link inline-flex items-center gap-2 py-3 text-sm font-medium">
                                <svg class="h-3.5 w-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                                    aria-hidden="true">
                                    <path
                                        d="M9 6.75V15m6-6v8.25m.503 3.498 4.875-2.437c.381-.19.622-.58.622-1.006V4.82c0-.836-.88-1.38-1.628-1.006l-3.869 1.934c-.317.159-.69.159-1.006 0L9.503 3.252a1.125 1.125 0 0 0-1.006 0L3.622 5.689C3.24 5.88 3 6.27 3 6.695V19.18c0 .836.88 1.38 1.628 1.006l3.869-1.934c.317-.159.69-.159 1.006 0l4.994 2.497c.317.158.69.158 1.006 0Z" />
                                </svg>
                                Custom Trip</a>
                            <div class="relative group">
                                <a href="/safety/"
                                    class="nav-link inline-flex items-center gap-2 py-3 text-sm font-medium">

                                    Safety
                                    <svg class="h-3.5 w-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                                        aria-hidden="true">
                                        <path d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                                    </svg>
                                </a>
                                <div
                                    class="nav-dropdown absolute left-0 top-full -mt-px w-72 backdrop-blur-xl opacity-0 invisible group-hover:opacity-100 group-hover:visible group-focus-within:opacity-100 group-focus-within:visible transition overflow-hidden">
                                    <div class="p-4 pt-6 grid gap-2 text-sm">
                                        <a href="/safety/altitude-sickness/"
                                            class="text-slate-600 hover:text-slate-900">Altitude Sickness</a>
                                        <a href="/safety/trek-briefing-process/"
                                            class="text-slate-600 hover:text-slate-900">Daily Trek Briefing Process</a>
                                        <a href="/safety/heli-rescue/"
                                            class="text-slate-600 hover:text-slate-900">Emergency
                                            &amp; Heli Rescue</a>
                                        <a href="/safety/trekking-insurance/"
                                            class="text-slate-600 hover:text-slate-900">Trekking Insurance</a>
                                        <a href="/safety/gear-checklist/"
                                            class="text-slate-600 hover:text-slate-900">Gear
                                            Checklist</a>
                                    </div>
                                </div>
                            </div>
                            <div class="relative group">
                                <a href="/responsible-travel/"
                                    class="nav-link inline-flex items-center gap-2 py-3 text-sm font-medium">

                                    Responsible Travel
                                    <svg class="h-3.5 w-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                                        aria-hidden="true">
                                        <path d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                                    </svg>
                                </a>
                                <div
                                    class="nav-dropdown absolute left-0 top-full -mt-px w-72 backdrop-blur-xl opacity-0 invisible group-hover:opacity-100 group-hover:visible group-focus-within:opacity-100 group-focus-within:visible transition overflow-hidden">
                                    <div class="p-4 pt-6 grid gap-2 text-sm">
                                        <a href="/responsible-travel/local-community-impact/"
                                            class="text-slate-600 hover:text-slate-900">Local Community Impact</a>
                                        <a href="/responsible-travel/environmental-responsibility/"
                                            class="text-slate-600 hover:text-slate-900">Environmental
                                            Responsibility</a>
                                        <a href="/responsible-travel/social-fund/"
                                            class="text-slate-600 hover:text-slate-900">Social Fund</a>
                                    </div>
                                </div>
                            </div>
                            <div class="relative group">
                                <a href="/about/company/"
                                    class="nav-link inline-flex items-center gap-2 py-3 text-sm font-medium">

                                    About

                                    <svg class="h-3.5 w-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                                        aria-hidden="true">
                                        <path d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                                    </svg>
                                </a>
                                <div
                                    class="nav-dropdown absolute left-0 top-full -mt-px w-64 backdrop-blur-xl opacity-0 invisible group-hover:opacity-100 group-hover:visible group-focus-within:opacity-100 group-focus-within:visible transition overflow-hidden">
                                    <div class="p-4 pt-6 grid gap-2 text-sm">
                                        <a href="/about/team/" class="text-slate-600 hover:text-slate-900">Team</a>
                                        <a href="/about/licenses/"
                                            class="text-slate-600 hover:text-slate-900">Licenses</a>
                                        <a href="/about/why-us/" class="text-slate-600 hover:text-slate-900">Why
                                            Us</a>
                                        <a href="/about/reviews/"
                                            class="text-slate-600 hover:text-slate-900">Reviews</a>
                                    </div>
                                </div>
                            </div>
                            <div class="relative group">
                                <a href="/contact/"
                                    class="nav-link inline-flex items-center gap-2 py-3 text-sm font-medium">

                                    Contact
                                    <svg class="h-3.5 w-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                                        aria-hidden="true">
                                        <path d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                                    </svg>
                                </a>
                                <div
                                    class="nav-dropdown absolute left-0 top-full -mt-px w-64 backdrop-blur-xl opacity-0 invisible group-hover:opacity-100 group-hover:visible group-focus-within:opacity-100 group-focus-within:visible transition overflow-hidden">
                                    <div class="p-4 pt-6 grid gap-2 text-sm">
                                        <a href="/contact/inquiry/" class="text-slate-600 hover:text-slate-900">Inquiry
                                            Form</a>
                                    </div>
                                </div>
                            </div>
                        </nav>
                        <div class="hidden lg:flex items-center gap-4">
                            <a href="/account/"
                                class="nav-cta group inline-flex items-center gap-2 rounded-md px-4 py-3 text-sm font-semibold hover:opacity-90">
                                <span>Account</span>
                                <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                                    aria-hidden="true">
                                    <path
                                        d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                </svg>
                            </a>
                        </div>
                        <button id="mobile-menu-button" type="button"
                            class="lg:hidden inline-flex items-center justify-center rounded-md p-3 text-current"
                            aria-label="Open menu" aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                <path d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                            </svg>
                        </button>
                    </div>
                </div>
                <div id="mobile-menu" class="lg:hidden hidden border-t border-slate-200 bg-white">
                    <div class="px-4 py-4 space-y-4">
                        <div>
                            <button type="button"
                                class="w-full flex items-center justify-between text-left text-sm font-semibold text-slate-800"
                                data-accordion="treks" aria-expanded="false">
                                Treks
                                <span aria-hidden="true">+</span>
                            </button>
                            <div class="mt-3 space-y-2 hidden" data-accordion-panel="treks">
                                <a href="/treks/" class="block text-sm text-slate-600">All Treks</a>
                                <a href="/treks/everest/" class="block text-sm font-semibold text-slate-700">Everest
                                    Treks</a>
                                <a href="/treks/everest/everest-base-camp-trek/"
                                    class="block text-sm text-slate-600">Everest
                                    Base Camp Trek</a>
                                <a href="/treks/everest/everest-gokyo-lakes-trek/"
                                    class="block text-sm text-slate-600">Everest
                                    Gokyo Lakes Trek</a>
                                <a href="/treks/everest/everest-three-passes-trek/"
                                    class="block text-sm text-slate-600">Everest
                                    Three Passes Trek</a>
                                <a href="/treks/annapurna/" class="block text-sm font-semibold text-slate-700">Annapurna
                                    Treks</a>
                                <a href="/treks/annapurna/annapurna-base-camp-trek/"
                                    class="block text-sm text-slate-600">Annapurna Base Camp Trek</a>
                                <a href="/treks/annapurna/annapurna-circuit-trek/"
                                    class="block text-sm text-slate-600">Annapurna Circuit Trek</a>
                                <a href="/treks/annapurna/ghorepani-poon-hill-trek/"
                                    class="block text-sm text-slate-600">Ghorepani Poon Hill Trek</a>
                                <a href="/treks/manaslu/" class="block text-sm font-semibold text-slate-700">Manaslu
                                    Treks</a>
                                <a href="/treks/manaslu/manaslu-circuit-trek/"
                                    class="block text-sm text-slate-600">Manaslu
                                    Circuit Trek</a>
                            </div>
                        </div>
                        <div>
                            <button type="button"
                                class="w-full flex items-center justify-between text-left text-sm font-semibold text-slate-800"
                                data-accordion="destinations" aria-expanded="false">
                                Destinations
                                <span aria-hidden="true">+</span>
                            </button>
                            <div class="mt-3 space-y-2 hidden" data-accordion-panel="destinations">
                                <a href="/destinations/" class="block text-sm text-slate-600">All Destinations</a>
                                <a href="/destinations/everest/"
                                    class="block text-sm font-semibold text-slate-700">Everest
                                    Region</a>
                                <a href="/destinations/everest/about/" class="block text-sm text-slate-600">About
                                    Everest
                                    Region</a>
                                <a href="/destinations/everest/treks/" class="block text-sm text-slate-600">Treks in
                                    Everest
                                    Region</a>
                                <a href="/destinations/annapurna/"
                                    class="block text-sm font-semibold text-slate-700">Annapurna
                                    Region</a>
                                <a href="/destinations/annapurna/about/" class="block text-sm text-slate-600">About
                                    Annapurna
                                    Region</a>
                                <a href="/destinations/annapurna/treks/" class="block text-sm text-slate-600">Treks in
                                    Annapurna
                                    Region</a>
                                <a href="/destinations/manaslu/"
                                    class="block text-sm font-semibold text-slate-700">Manaslu
                                    Region</a>
                                <a href="/destinations/manaslu/about/" class="block text-sm text-slate-600">About
                                    Manaslu
                                    Region</a>
                                <a href="/destinations/manaslu/treks/" class="block text-sm text-slate-600">Treks in
                                    Manaslu
                                    Region</a>
                            </div>
                        </div>
                        <a href="/custom-trek/" class="block text-sm font-semibold text-slate-800">Custom Trip</a>
                        <a href="/safety/" class="block text-sm font-semibold text-slate-800">Safety</a>
                        <a href="/responsible-travel/" class="block text-sm font-semibold text-slate-800">Responsible
                            Travel</a>
                        <a href="/about/company/" class="block text-sm font-semibold text-slate-800">About</a>
                        <a href="/contact/" class="block text-sm font-semibold text-slate-800">Contact</a>
                        <a href="/custom-trek/"
                            class="inline-flex items-center justify-center rounded-full bg-slate-900 px-4 py-2 text-sm font-semibold text-white">Plan
                            My Himalayan Trek</a>
                    </div>
                </div>
            </header>

            <div class="absolute inset-0 hero-content">
                <div class="mx-auto max-w-7xl px-2 sm:px-3 lg:px-4 h-full flex items-center justify-start text-left">
                    <div class="text-white">
                        <p class="text-xs sm:text-sm uppercase tracking-[0.35em] text-white/80">
                            Easy Access to the Himalayas · 2025
                        </p>
                        <h1 id="hero-title"
                            class="mt-4 text-3xl sm:text-5xl lg:text-6xl font-extrabold tracking-[0.08em]">
                            Himalayan Trekking <br />
                            in <span class="clip-text">Nepal</span>
                        </h1>
                        <p
                            class="mt-4 inline-flex clip-text max-w-2xl items-center rounded-md bg-white/15 px-4 py-2 text-base sm:text-lg font-semibold tracking-[0.04em] text-white backdrop-blur">
                            Licensed &amp; safety-led treks across Everest, Annapurna &amp; Manaslu.
                        </p>

                    </div>
                </div>
            </div>

        </section> --}}
        <header class="site-header fixed top-0 left-0 right-0 z-50 backdrop-blur">
            <div class="nav-shell max-w-7xl mx-auto px-2 sm:px-3 lg:px-4">
                <div class="flex items-center justify-between">
                    <a href="/" class="flex flex-col items-center py-2" aria-label="Himalayan trekking home">
                        <div style="height: 28px; width: 110px;">
                            <img src="/images/logo.png" alt="EATH Travel"
                                style="height: 100%; width: 100%; object-fit: contain;">
                        </div>
                        <span class="text-lg font-semibold tracking-tight mt-1">EATH Travel</span>
                    </a>
                    <nav class="hidden lg:flex items-center gap-6" aria-label="Primary">
                        <div class="relative group">
                            <button type="button" class="nav-button flex items-center gap-1 py-6 text-sm font-medium"
                                aria-expanded="false" aria-haspopup="true">
                                Destinations
                                <svg class="h-3.5 w-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                                    aria-hidden="true">
                                    <path d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                                </svg>
                            </button>
                            <div
                                class="nav-dropdown absolute left-0 top-full -mt-px w-80 backdrop-blur-xl opacity-0 invisible group-hover:opacity-100 group-hover:visible group-focus-within:opacity-100 group-focus-within:visible transition overflow-hidden">
                                <div class="p-4 pt-6 grid gap-3 text-sm">
                                    @foreach ($menus as $menu)
                                        <div>
                                            <a href="{{ route('destination.detail', ['slug' => $menu['slug']]) }}"
                                                class="font-semibold text-slate-800">{{ $menu['name'] }}</a>
                                            <div class="menu-list mt-2">
                                                @foreach ($menu['treks'] as $trek)
                                                    <a href="{{ route('trek.show', ['destination' => $menu['slug'], 'slug' => $trek['slug']]) }}"
                                                        class="text-slate-600 hover:text-slate-900">{{ $trek['name'] }}</a>
                                                @endforeach
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <a href="javascript:void(0)"
                            class="nav-link inline-flex items-center gap-2 py-3 text-sm font-medium btnOpenInquiry">
                            <svg class="h-3.5 w-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                <path
                                    d="M9 6.75V15m6-6v8.25m.503 3.498 4.875-2.437c.381-.19.622-.58.622-1.006V4.82c0-.836-.88-1.38-1.628-1.006l-3.869 1.934c-.317.159-.69.159-1.006 0L9.503 3.252a1.125 1.125 0 0 0-1.006 0L3.622 5.689C3.24 5.88 3 6.27 3 6.695V19.18c0 .836.88 1.38 1.628 1.006l3.869-1.934c.317-.159.69-.159 1.006 0l4.994 2.497c.317.158.69.158 1.006 0Z" />
                            </svg>
                            Custom Trip</a>
                        <div class="relative group">
                            <a href="javascript:void(0)"
                                class="nav-link inline-flex items-center gap-2 py-3 text-sm font-medium">

                                Safety
                                <svg class="h-3.5 w-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                                    aria-hidden="true">
                                    <path d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                                </svg>
                            </a>
                            <div
                                class="nav-dropdown absolute left-0 top-full -mt-px w-72 backdrop-blur-xl opacity-0 invisible group-hover:opacity-100 group-hover:visible group-focus-within:opacity-100 group-focus-within:visible transition overflow-hidden">
                                <div class="p-4 pt-6 grid gap-2 text-sm">
                                    @foreach ($safetyBlogs as $blog)
                                        <a href="{{ route('blog.detail', ['category_slug' => $blog->category['slug'], 'blog_slug' => $blog['slug']]) }}"
                                            class="text-slate-600 hover:text-slate-900">{{ $blog['title'] }}</a>
                                    @endforeach

                                </div>
                            </div>
                        </div>
                        <div class="relative group">
                            <a href="{{ route('about.guide.profiles') }}"
                                class="nav-link inline-flex items-center gap-2 py-3 text-sm font-medium">

                                Guide Profles
                              
                            </a>
                    
                        </div>
                        <div class="relative group">
                            <a href="{{ route('blogs') }}"
                                class="nav-link inline-flex items-center gap-2 py-3 text-sm font-medium">

                                Blogs
                                {{-- <svg class="h-3.5 w-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                                    aria-hidden="true">
                                    <path d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                                </svg> --}}
                            </a>
                            {{-- <div
                                class="nav-dropdown absolute left-0 top-full -mt-px w-72 backdrop-blur-xl opacity-0 invisible group-hover:opacity-100 group-hover:visible group-focus-within:opacity-100 group-focus-within:visible transition overflow-hidden">
                                <div class="p-4 pt-6 grid gap-2 text-sm">
                                    <a href="/responsible-travel/local-community-impact/"
                                        class="text-slate-600 hover:text-slate-900">Local Community Impact</a>
                                    <a href="/responsible-travel/environmental-responsibility/"
                                        class="text-slate-600 hover:text-slate-900">Environmental
                                        Responsibility</a>
                                    <a href="/responsible-travel/social-fund/"
                                        class="text-slate-600 hover:text-slate-900">Social Fund</a>
                                </div>
                            </div> --}}
                        </div>
                        <div class="relative group">
                            <a href="javascript:void(0)"
                                class="nav-link inline-flex items-center gap-2 py-3 text-sm font-medium">

                                About

                                <svg class="h-3.5 w-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                                    aria-hidden="true">
                                    <path d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                                </svg>
                            </a>
                            <div
                                class="nav-dropdown absolute left-0 top-full -mt-px w-64 backdrop-blur-xl opacity-0 invisible group-hover:opacity-100 group-hover:visible group-focus-within:opacity-100 group-focus-within:visible transition overflow-hidden">
                                <div class="p-4 pt-6 grid gap-2 text-sm">
                                    <a href="{{ route('about.our.story') }}"
                                        class="text-slate-600 hover:text-slate-900">Our Story</a>
                                    {{-- <a href="{{ route('about.guide.profiles') }}" class="text-slate-600 hover:text-slate-900">Guide Profiles</a> --}}
                                    {{-- <a href="/about/licenses/"
                                        class="text-slate-600 hover:text-slate-900">Licenses</a> --}}
                                    {{-- <a href="/about/why-us/" class="text-slate-600 hover:text-slate-900">Why
                                        Us</a>
                                    <a href="/about/reviews/" class="text-slate-600 hover:text-slate-900">Reviews</a> --}}
                                </div>
                            </div>
                        </div>
                        <div class="relative group">
                            <a href="/contact-us/"
                                class="nav-link inline-flex items-center gap-2 py-3 text-sm font-medium">

                                Contact
                                {{-- <svg class="h-3.5 w-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                                    aria-hidden="true">
                                    <path d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                                </svg> --}}
                            </a>
                            {{-- <div
                                class="nav-dropdown absolute left-0 top-full -mt-px w-64 backdrop-blur-xl opacity-0 invisible group-hover:opacity-100 group-hover:visible group-focus-within:opacity-100 group-focus-within:visible transition overflow-hidden">
                                <div class="p-4 pt-6 grid gap-2 text-sm">
                                    <a href="/contact/inquiry/" class="text-slate-600 hover:text-slate-900">Inquiry
                                        Form</a>
                                </div>
                            </div> --}}
                        </div>
                    </nav>
                    <div class="hidden lg:flex items-center gap-4">
                        <a href="/account/"
                            class="nav-cta group inline-flex items-center gap-2 rounded-md px-4 py-3 text-sm font-semibold hover:opacity-90">
                            <span>Account</span>
                            <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                                aria-hidden="true">
                                <path
                                    d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                            </svg>
                        </a>
                    </div>
                    <button id="mobile-menu-button" type="button"
                        class="lg:hidden inline-flex items-center justify-center rounded-md p-3 text-current"
                        aria-label="Open menu" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            <path d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                        </svg>
                    </button>
                </div>
            </div>
            <div id="mobile-menu" class="lg:hidden hidden border-t border-slate-200 bg-white">
                <div class="px-4 py-4 space-y-4">
                    <div>
                        <button type="button"
                            class="w-full flex items-center justify-between text-left text-sm font-semibold text-slate-800"
                            data-accordion="treks" aria-expanded="false">
                            Treks
                            <span aria-hidden="true">+</span>
                        </button>
                        <div class="mt-3 space-y-2 hidden" data-accordion-panel="treks">
                            <a href="/treks/" class="block text-sm text-slate-600">All Treks</a>
                            <a href="/treks/everest/" class="block text-sm font-semibold text-slate-700">Everest
                                Treks</a>
                            <a href="/treks/everest/everest-base-camp-trek/"
                                class="block text-sm text-slate-600">Everest
                                Base Camp Trek</a>
                            <a href="/treks/everest/everest-gokyo-lakes-trek/"
                                class="block text-sm text-slate-600">Everest
                                Gokyo Lakes Trek</a>
                            <a href="/treks/everest/everest-three-passes-trek/"
                                class="block text-sm text-slate-600">Everest
                                Three Passes Trek</a>
                            <a href="/treks/annapurna/" class="block text-sm font-semibold text-slate-700">Annapurna
                                Treks</a>
                            <a href="/treks/annapurna/annapurna-base-camp-trek/"
                                class="block text-sm text-slate-600">Annapurna Base Camp Trek</a>
                            <a href="/treks/annapurna/annapurna-circuit-trek/"
                                class="block text-sm text-slate-600">Annapurna Circuit Trek</a>
                            <a href="/treks/annapurna/ghorepani-poon-hill-trek/"
                                class="block text-sm text-slate-600">Ghorepani Poon Hill Trek</a>
                            <a href="/treks/manaslu/" class="block text-sm font-semibold text-slate-700">Manaslu
                                Treks</a>
                            <a href="/treks/manaslu/manaslu-circuit-trek/"
                                class="block text-sm text-slate-600">Manaslu
                                Circuit Trek</a>
                        </div>
                    </div>
                    <div>
                        <button type="button"
                            class="w-full flex items-center justify-between text-left text-sm font-semibold text-slate-800"
                            data-accordion="destinations" aria-expanded="false">
                            Destinations
                            <span aria-hidden="true">+</span>
                        </button>
                        <div class="mt-3 space-y-2 hidden" data-accordion-panel="destinations">
                            <a href="/destinations/" class="block text-sm text-slate-600">All Destinations</a>
                            <a href="/destinations/everest/"
                                class="block text-sm font-semibold text-slate-700">Everest
                                Region</a>
                            <a href="/destinations/everest/about/" class="block text-sm text-slate-600">About
                                Everest
                                Region</a>
                            <a href="/destinations/everest/treks/" class="block text-sm text-slate-600">Treks in
                                Everest
                                Region</a>
                            <a href="/destinations/annapurna/"
                                class="block text-sm font-semibold text-slate-700">Annapurna
                                Region</a>
                            <a href="/destinations/annapurna/about/" class="block text-sm text-slate-600">About
                                Annapurna
                                Region</a>
                            <a href="/destinations/annapurna/treks/" class="block text-sm text-slate-600">Treks in
                                Annapurna
                                Region</a>
                            <a href="/destinations/manaslu/"
                                class="block text-sm font-semibold text-slate-700">Manaslu
                                Region</a>
                            <a href="/destinations/manaslu/about/" class="block text-sm text-slate-600">About
                                Manaslu
                                Region</a>
                            <a href="/destinations/manaslu/treks/" class="block text-sm text-slate-600">Treks in
                                Manaslu
                                Region</a>
                        </div>
                    </div>
                    <a href="/custom-trek/" class="block text-sm font-semibold text-slate-800">Custom Trip</a>
                    <a href="/safety/" class="block text-sm font-semibold text-slate-800">Safety</a>
                    <a href="/responsible-travel/" class="block text-sm font-semibold text-slate-800">Responsible
                        Travel</a>
                    <a href="/about/company/" class="block text-sm font-semibold text-slate-800">About</a>
                    <a href="/contact/" class="block text-sm font-semibold text-slate-800">Contact</a>
                    <a href="/custom-trek/"
                        class="inline-flex items-center justify-center rounded-full bg-slate-900 px-4 py-2 text-sm font-semibold text-white">Plan
                        My Himalayan Trek</a>
                </div>
            </div>
        </header>
