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
    <title>Safely Guided Himalayan Treks in Nepal | Everest, Annapurna, Manaslu</title>
    <link rel="stylesheet" href="/style.css" />
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
        @include('website.pages.home.landing-hero')


        {{-- section taglines --}}
        {{-- <section class="py-12 sm:py-16 bg-white">
            <div class="max-w-7xl mx-auto px-2 sm:px-3 lg:px-4">
                <div class="grid gap-10 lg:grid-cols-[1.1fr_0.9fr] items-stretch">
                    <div class="flex h-full flex-col">
                        <div
                            class="relative h-full overflow-hidden rounded-none border-sky-100 bg-gradient-to-br from-white via-white to-sky-50 px-6 py-6 sm:px-8">
                            <div class="absolute inset-0 bg-cover bg-center opacity-70"
                                style="background-image:url('https://images.unsplash.com/photo-1470770903676-69b98201ea1c?auto=format&fit=crop&w=1400&q=80')">
                            </div>
                            <div class="absolute inset-0 bg-gradient-to-tr from-white/90 via-white/80 to-sky-100/70">
                            </div>
                            <div class="relative z-10">
                                <h2 class="text-3xl sm:text-4xl font-semibold text-slate-900">Licensed Himalayan
                                    Trekking Specialists</h2>
                                <p class="mt-3 text-base text-slate-600">We specialize exclusively in Himalayan
                                    trekking
                                    in Nepal, focusing on the Everest, Annapurna, and Manaslu regions. Every route is
                                    planned with altitude safety, thoughtful acclimatization, and responsible travel at
                                    its core.</p>
                                <div
                                    class="mt-6 flex flex-wrap gap-3 text-[0.65rem] font-semibold uppercase tracking-[0.24em] text-sky-700">
                                    <span
                                        class="inline-flex items-center gap-2 rounded-md border border-sky-200 bg-sky-50 px-3 py-1">
                                        <span class="h-1.5 w-1.5 rounded-md bg-sky-500"></span>
                                        Licensed &amp; Registered
                                    </span>
                                    <span
                                        class="inline-flex items-center gap-2 rounded-md border border-sky-200 bg-sky-50 px-3 py-1">
                                        <span class="h-1.5 w-1.5 rounded-md bg-sky-500"></span>
                                        Nepal-only Focus
                                    </span>
                                    <span
                                        class="inline-flex items-center gap-2 rounded-md border border-sky-200 bg-sky-50 px-3 py-1">
                                        <span class="h-1.5 w-1.5 rounded-md bg-sky-500"></span>
                                        Safety-led Planning
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="relative h-full overflow-hidden rounded-none border-sky-100 bg-sky-50/70 p-6 sm:p-8">
                        <div class="absolute inset-0 bg-cover bg-center opacity-70"
                            style="background-image:url('https://images.unsplash.com/photo-1470770903676-69b98201ea1c?auto=format&fit=crop&w=1400&q=80')">
                        </div>
                        <div class="absolute inset-0 bg-gradient-to-br from-white/95 via-white/85 to-sky-100/60"></div>
                        <div class="relative z-10">
                            <h1 class="text-sm font-semibold uppercase tracking-[0.3em] text-slate-500">Why Trekkers
                                Choose Us</h1>
                            <div class="mt-6 grid gap-4 text-sm text-slate-700">
                                <div class="flex items-center gap-3">
                                    <span
                                        class="inline-flex h-8 w-8 items-center justify-center rounded-full bg-white text-sky-700 shadow-sm">
                                        <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                                            aria-hidden="true">
                                            <path d="m4.5 12.75 6 6 9-13.5" />
                                        </svg>
                                    </span>
                                    <span>Licensed &amp; registered Nepal trekking company.</span>
                                </div>
                                <div class="flex items-center gap-3">
                                    <span
                                        class="inline-flex h-8 w-8 items-center justify-center rounded-full bg-white text-sky-700 shadow-sm">
                                        <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                                            aria-hidden="true">
                                            <path d="m4.5 12.75 6 6 9-13.5" />
                                        </svg>
                                    </span>
                                    <span>10+ years experience guiding in the Himalayas.</span>
                                </div>
                                <div class="flex items-center gap-3">
                                    <span
                                        class="inline-flex h-8 w-8 items-center justify-center rounded-full bg-white text-sky-700 shadow-sm">
                                        <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                                            aria-hidden="true">
                                            <path d="m4.5 12.75 6 6 9-13.5" />
                                        </svg>
                                    </span>
                                    <span>Daily altitude monitoring &amp; safety briefings.</span>
                                </div>
                                <div class="flex items-center gap-3">
                                    <span
                                        class="inline-flex h-8 w-8 items-center justify-center rounded-full bg-white text-sky-700 shadow-sm">
                                        <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                                            aria-hidden="true">
                                            <path d="m4.5 12.75 6 6 9-13.5" />
                                        </svg>
                                    </span>
                                    <span>Emergency &amp; helicopter rescue coordination.</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> --}}
        @include('website.pages.home.landing-taglines')

        <!-- section search  -->
        {{-- <section class="py-12 sm:py-16 bg-white">
            <div class="max-w-7xl mx-auto px-2 sm:px-3 lg:px-4">
                <div class="rounded-md border border-slate-200 bg-white p-6 sm:p-8">
                    <div class="flex flex-col gap-6 lg:flex-row lg:items-center lg:justify-between">
                        <div>
                            <h2 class="mt-2 text-2xl sm:text-3xl font-semibold text-slate-900">Find your trek</h2>
                            <p class="mt-2 text-base text-slate-600">Search by region, duration, or difficulty.</p>
                        </div>
                        <form class="w-full max-w-2xl">
                            <div class="grid gap-3 sm:grid-cols-2 lg:grid-cols-[1.2fr_1fr_1fr_auto]">
                                <label class="sr-only" for="trek-search">Search treks</label>
                                <input id="trek-search" name="q" type="text" placeholder="Everest Base Camp"
                                    class="w-full rounded-md border border-slate-200 px-4 py-3 text-sm text-slate-900 focus:border-sky-500 focus:outline-none focus:ring-2 focus:ring-sky-200" />
                                <label class="sr-only" for="trek-region">Region</label>
                                <select id="trek-region" name="region"
                                    class="w-full rounded-md border border-slate-200 bg-white px-4 py-3 text-sm text-slate-700 focus:border-sky-500 focus:outline-none focus:ring-2 focus:ring-sky-200">
                                    <option value="">All regions</option>
                                    <option value="everest">Everest</option>
                                    <option value="annapurna">Annapurna</option>
                                    <option value="manaslu">Manaslu</option>
                                    <option value="langtang">Langtang</option>
                                </select>
                                <label class="sr-only" for="trek-duration">Duration</label>
                                <select id="trek-duration" name="duration"
                                    class="w-full rounded-md border border-slate-200 bg-white px-4 py-3 text-sm text-slate-700 focus:border-sky-500 focus:outline-none focus:ring-2 focus:ring-sky-200">
                                    <option value="">Any duration</option>
                                    <option value="short">6–10 days</option>
                                    <option value="medium">11–14 days</option>
                                    <option value="long">15+ days</option>
                                </select>
                                <button type="submit"
                                    class="inline-flex w-full items-center justify-center rounded-md bg-slate-900 px-5 py-3 text-sm font-semibold text-white transition hover:bg-slate-800 sm:col-span-2 lg:col-span-1">
                                    Search
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <div>
                    <div class="border-slate-200 py-6">
                        <div class="flex items-center justify-between my-5">
                            <h4 class="text-sm font-semibold uppercase tracking-[0.25em] text-slate-500">Search Results
                            </h4>

                        </div>
                        <div class="mt-4">
                            <div
                                class="hidden gap-3 border-b border-slate-200 pb-2 text-xs font-semibold uppercase tracking-[0.2em] text-slate-500 sm:grid sm:grid-cols-[1.7fr_0.8fr_0.8fr_0.6fr_0.8fr]">
                                <span>Trip Name</span>
                                <span>Departure</span>
                                <span>Region</span>
                                <span>Price</span>
                                <span class="text-right"></span>
                            </div>
                            <div class="divide-y divide-slate-200">
                                <div
                                    class="grid gap-3 py-4 sm:grid-cols-[1.7fr_0.8fr_0.8fr_0.6fr_0.8fr] sm:items-center">
                                    <div>
                                        <span
                                            class="text-[0.65rem] font-semibold uppercase tracking-[0.2em] text-slate-500 sm:hidden">Trip
                                            Name</span>
                                        <p class="mt-1 text-sm font-semibold text-slate-900 sm:mt-0">Everest Base Camp
                                            Trek – 15 Days
                                        </p>
                                    </div>
                                    <div>
                                        <span
                                            class="text-[0.65rem] font-semibold uppercase tracking-[0.2em] text-slate-500 sm:hidden">Departure</span>
                                        <p class="mt-1 text-sm text-slate-700 sm:mt-0">Flexible</p>
                                    </div>
                                    <div>
                                        <span
                                            class="text-[0.65rem] font-semibold uppercase tracking-[0.2em] text-slate-500 sm:hidden">Region</span>
                                        <p class="mt-1 text-sm font-semibold sm:mt-0">Everest</p>
                                    </div>
                                    <div>
                                        <span
                                            class="text-[0.65rem] font-semibold uppercase tracking-[0.2em] text-slate-500 sm:hidden">Price</span>
                                        <p class="mt-1 text-sm font-semibold text-slate-900 sm:mt-0">$1125 USD</p>
                                    </div>
                                    <div class="flex sm:justify-end">
                                        <a href="/contact/inquiry/"
                                            class="inline-flex items-center rounded-md border border-sky-200 px-4 py-2 text-xs font-semibold text-sky-700 hover:border-sky-300 hover:text-sky-800">View
                                            Detail</a>
                                    </div>
                                </div>
                                <div
                                    class="grid gap-3 py-4 sm:grid-cols-[1.7fr_0.8fr_0.8fr_0.6fr_0.8fr] sm:items-center">
                                    <div>
                                        <span
                                            class="text-[0.65rem] font-semibold uppercase tracking-[0.2em] text-slate-500 sm:hidden">Trip
                                            Name</span>
                                        <p class="mt-1 text-sm font-semibold text-slate-900 sm:mt-0">Manaslu Larke Pass
                                            Trek – 16 Days
                                        </p>
                                    </div>
                                    <div>
                                        <span
                                            class="text-[0.65rem] font-semibold uppercase tracking-[0.2em] text-slate-500 sm:hidden">Departure</span>
                                        <p class="mt-1 text-sm text-slate-700 sm:mt-0">Fixed</p>
                                    </div>
                                    <div>
                                        <span
                                            class="text-[0.65rem] font-semibold uppercase tracking-[0.2em] text-slate-500 sm:hidden">Region</span>
                                        <p class="mt-1 text-sm font-semibold sm:mt-0">Everest</p>
                                    </div>
                                    <div>
                                        <span
                                            class="text-[0.65rem] font-semibold uppercase tracking-[0.2em] text-slate-500 sm:hidden">Price</span>
                                        <p class="mt-1 text-sm font-semibold text-slate-900 sm:mt-0">$1120 USD</p>
                                    </div>
                                    <div class="flex sm:justify-end">
                                        <a href="/contact/inquiry/"
                                            class="inline-flex items-center rounded-md border border-sky-200 px-4 py-2 text-xs font-semibold text-sky-700 hover:border-sky-300 hover:text-sky-800">View
                                            Detail</a>
                                    </div>
                                </div>
                                <div
                                    class="grid gap-3 py-4 sm:grid-cols-[1.7fr_0.8fr_0.8fr_0.6fr_0.8fr] sm:items-center">
                                    <div>
                                        <span
                                            class="text-[0.65rem] font-semibold uppercase tracking-[0.2em] text-slate-500 sm:hidden">Trip
                                            Name</span>
                                        <p class="mt-1 text-sm font-semibold text-slate-900 sm:mt-0">Mardi Himal Trek –
                                            11 Days</p>
                                    </div>
                                    <div>
                                        <span
                                            class="text-[0.65rem] font-semibold uppercase tracking-[0.2em] text-slate-500 sm:hidden">Departure</span>
                                        <p class="mt-1 text-sm text-slate-700 sm:mt-0">Weekly</p>
                                    </div>
                                    <div>
                                        <span
                                            class="text-[0.65rem] font-semibold uppercase tracking-[0.2em] text-slate-500 sm:hidden">Region</span>
                                        <p class="mt-1 text-sm font-semibold sm:mt-0">Everest</p>
                                    </div>
                                    <div>
                                        <span
                                            class="text-[0.65rem] font-semibold uppercase tracking-[0.2em] text-slate-500 sm:hidden">Price</span>
                                        <p class="mt-1 text-sm font-semibold text-slate-900 sm:mt-0">$715 USD</p>
                                    </div>
                                    <div class="flex sm:justify-end">
                                        <a href="/contact/inquiry/"
                                            class="inline-flex items-center rounded-md border border-sky-200 px-4 py-2 text-xs font-semibold text-sky-700 hover:border-sky-300 hover:text-sky-800">View
                                            Detail</a>
                                    </div>
                                </div>
                                <div
                                    class="grid gap-3 py-4 sm:grid-cols-[1.7fr_0.8fr_0.8fr_0.6fr_0.8fr] sm:items-center">
                                    <div>
                                        <span
                                            class="text-[0.65rem] font-semibold uppercase tracking-[0.2em] text-slate-500 sm:hidden">Trip
                                            Name</span>
                                        <p class="mt-1 text-sm font-semibold text-slate-900 sm:mt-0">Manaslu Circuit
                                            Trek – 18 Days</p>
                                    </div>
                                    <div>
                                        <span
                                            class="text-[0.65rem] font-semibold uppercase tracking-[0.2em] text-slate-500 sm:hidden">Departure</span>
                                        <p class="mt-1 text-sm text-slate-700 sm:mt-0">Custom</p>
                                    </div>
                                    <div>
                                        <span
                                            class="text-[0.65rem] font-semibold uppercase tracking-[0.2em] text-slate-500 sm:hidden">Region</span>
                                        <p class="mt-1 text-sm font-semibold sm:mt-0">Everest</p>
                                    </div>
                                    <div>
                                        <span
                                            class="text-[0.65rem] font-semibold uppercase tracking-[0.2em] text-slate-500 sm:hidden">Price</span>
                                        <p class="mt-1 text-sm font-semibold text-slate-900 sm:mt-0">$1530 USD</p>
                                    </div>
                                    <div class="flex sm:justify-end">
                                        <a href="/contact/inquiry/"
                                            class="inline-flex items-center rounded-md border border-sky-200 px-4 py-2 text-xs font-semibold text-sky-700 hover:border-sky-300 hover:text-sky-800">View
                                            Detail</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> --}}
        @include('website.pages.home.landing-search-treks')

        <!-- section featured -->
        {{-- <section class="featured-section py-16 sm:py-20 bg-sky-50">
            <div class="featured-inner max-w-7xl mx-auto px-2 sm:px-3 lg:px-4">
                <div class="flex items-end justify-between flex-nowrap gap-6">
                    <div>
                        <span class="inline-flex items-center text-sm font-semibold text-sky-600">Featured</span>
                        <h2 class="mt-3 text-3xl sm:text-4xl font-semibold text-slate-900">Featured Himalayan Treks
                        </h2>
                        <p class="mt-3 text-base text-slate-600">FHandpicked itineraries with altitude-aware pacing
                            across Nepal's high Himalayas.</p>
                    </div>
                    <a href="/treks/"
                        class="text-sm font-semibold text-slate-900 underline decoration-2 underline-offset-4 hover:text-slate-700">View
                        All Himalayan Treks</a>
                </div>
                <div class="mt-10 grid gap-6 md:grid-cols-3">
                    <article class="group overflow-hidden rounded-none">
                        <a href="/treks/everest/everest-base-camp-trek/"
                            class="relative aspect-[16/9] overflow-hidden block rounded-none">
                            <div class="absolute inset-0 bg-cover bg-center transition duration-500 ease-out group-hover:scale-110"
                                style="background-image:url('https://plus.unsplash.com/premium_photo-1697729963745-8e14a76d48c2?q=80&w=1421&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D')">
                            </div>
                            <div
                                class="absolute inset-0 z-10 bg-gradient-to-t from-slate-900/70 via-slate-900/30 to-slate-900/10">
                            </div>
                            <div
                                class="absolute bottom-3 left-4 z-20 text-xs font-semibold uppercase tracking-[0.2em] text-slate-100">
                                Everest
                            </div>
                        </a>
                        <div class="py-4">
                            <div class="flex items-center justify-center text-center">
                                <h3 class="text-lg font-semibold">Everest Base Camp Trek</h3>
                            </div>

                            <div
                                class="trek-stats mt-4 flex flex-nowrap items-center justify-center gap-x-6 gap-y-2 text-sm text-slate-700">
                                <div class="flex flex-col items-center gap-1 text-center px-2 py-1">
                                    <svg class="h-6 w-6 text-slate-500" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round" aria-hidden="true">
                                        <path d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                    </svg>
                                    <span>12–14 Days</span>
                                </div>
                                <div class="flex flex-col items-center gap-1 text-center px-2 py-1">
                                    <svg class="h-6 w-6 text-slate-500" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round" aria-hidden="true">
                                        <path
                                            d="M2.25 18 9 11.25l4.306 4.306a11.95 11.95 0 0 1 5.814-5.518l2.74-1.22m0 0-5.94-2.281m5.94 2.28-2.28 5.941" />
                                    </svg>
                                    <span>5,364m</span>
                                </div>
                                <div class="flex flex-col items-center gap-1 text-center px-2 py-1">
                                    <svg class="h-6 w-6 text-slate-500" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round" aria-hidden="true">
                                        <path d="m3.75 13.5 10.5-11.25L12 10.5h8.25L9.75 21.75 12 13.5H3.75Z" />
                                    </svg>
                                    <span>Hard</span>
                                </div>
                            </div>
                        </div>
                    </article>
                    <article class="group overflow-hidden rounded-none">
                        <a href="/treks/annapurna/annapurna-base-camp-trek/"
                            class="relative aspect-[16/9] overflow-hidden block rounded-none">
                            <div class="absolute inset-0 bg-cover bg-center transition duration-500 ease-out group-hover:scale-110"
                                style="background-image:url('https://plus.unsplash.com/premium_photo-1697730124551-f3eabdd16b84?q=80&w=1470&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D')">
                            </div>
                            <div
                                class="absolute inset-0 z-10 bg-gradient-to-t from-slate-900/70 via-slate-900/30 to-slate-900/10">
                            </div>
                            <div
                                class="absolute bottom-3 left-4 z-20 text-xs font-semibold uppercase tracking-[0.2em] text-slate-100">
                                Annapurna
                            </div>
                        </a>
                        <div class="py-4">
                            <div class="flex items-center justify-center text-center">
                                <h3 class="text-lg font-semibold">Annapurna Base Camp Trek</h3>
                            </div>

                            <div
                                class="trek-stats mt-4 flex flex-nowrap items-center justify-center gap-x-6 gap-y-2 text-sm text-slate-700">
                                <div class="flex flex-col items-center gap-1 text-center px-2 py-1">
                                    <svg class="h-6 w-6 text-slate-500" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round" aria-hidden="true">
                                        <path d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                    </svg>
                                    <span>7–12 Days</span>
                                </div>
                                <div class="flex flex-col items-center gap-1 text-center px-2 py-1">
                                    <svg class="h-6 w-6 text-slate-500" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round" aria-hidden="true">
                                        <path
                                            d="M2.25 18 9 11.25l4.306 4.306a11.95 11.95 0 0 1 5.814-5.518l2.74-1.22m0 0-5.94-2.281m5.94 2.28-2.28 5.941" />
                                    </svg>
                                    <span>4,130m</span>
                                </div>
                                <div class="flex flex-col items-center gap-1 text-center px-2 py-1">
                                    <svg class="h-6 w-6 text-slate-500" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round" aria-hidden="true">
                                        <path d="m3.75 13.5 10.5-11.25L12 10.5h8.25L9.75 21.75 12 13.5H3.75Z" />
                                    </svg>
                                    <span>Moderate</span>
                                </div>
                            </div>
                        </div>
                    </article>
                    <article class="group overflow-hidden rounded-none">
                        <a href="/treks/manaslu/manaslu-circuit-trek/"
                            class="relative aspect-[16/9] overflow-hidden block rounded-none">
                            <div class="absolute inset-0 bg-cover bg-center transition duration-500 ease-out group-hover:scale-110"
                                style="background-image:url('https://images.unsplash.com/photo-1691516347496-f9ada8248715?q=80&w=1470&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D')">
                            </div>
                            <div
                                class="absolute inset-0 z-10 bg-gradient-to-t from-slate-900/70 via-slate-900/30 to-slate-900/10">
                            </div>
                            <div
                                class="absolute bottom-3 left-4 z-20 text-xs font-semibold uppercase tracking-[0.2em] text-slate-100">
                                Manaslu
                            </div>
                        </a>
                        <div class="py-4">
                            <div class="flex items-center justify-center text-center">
                                <h3 class="text-lg font-semibold">Manaslu Circuit Trek</h3>
                            </div>

                            <div
                                class="trek-stats mt-4 flex flex-nowrap items-center justify-center gap-x-6 gap-y-2 text-sm text-slate-700">
                                <div class="flex flex-col items-center gap-1 text-center px-2 py-1">
                                    <svg class="h-6 w-6 text-slate-500" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round" aria-hidden="true">
                                        <path d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                    </svg>
                                    <span>14–16 Days</span>
                                </div>
                                <div class="flex flex-col items-center gap-1 text-center px-2 py-1">
                                    <svg class="h-6 w-6 text-slate-500" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round" aria-hidden="true">
                                        <path
                                            d="M2.25 18 9 11.25l4.306 4.306a11.95 11.95 0 0 1 5.814-5.518l2.74-1.22m0 0-5.94-2.281m5.94 2.28-2.28 5.941" />
                                    </svg>
                                    <span>5,160m</span>
                                </div>
                                <div class="flex flex-col items-center gap-1 text-center px-2 py-1">
                                    <svg class="h-6 w-6 text-slate-500" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round" aria-hidden="true">
                                        <path d="m3.75 13.5 10.5-11.25L12 10.5h8.25L9.75 21.75 12 13.5H3.75Z" />
                                    </svg>
                                    <span>Advanced</span>
                                </div>
                            </div>
                        </div>
                    </article>
                    <article class="group overflow-hidden rounded-none">
                        <a href="/treks/everest/everest-gokyo-lakes-trek/"
                            class="relative aspect-[16/9] overflow-hidden block rounded-none">
                            <div class="absolute inset-0 bg-cover bg-center transition duration-500 ease-out group-hover:scale-110"
                                style="background-image:url('https://images.unsplash.com/photo-1580417442553-dcdfa76a09d6?q=80&w=1470&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D')">
                            </div>
                            <div
                                class="absolute inset-0 z-10 bg-gradient-to-t from-slate-900/70 via-slate-900/30 to-slate-900/10">
                            </div>
                            <div
                                class="absolute bottom-3 left-4 z-20 text-xs font-semibold uppercase tracking-[0.2em] text-slate-100">
                                Everest
                            </div>
                        </a>
                        <div class="py-4">
                            <div class="flex items-center justify-center text-center">
                                <h3 class="text-lg font-semibold">Everest Gokyo Lakes Trek</h3>
                            </div>

                            <div
                                class="trek-stats mt-4 flex flex-nowrap items-center justify-center gap-x-6 gap-y-2 text-sm text-slate-700">
                                <div class="flex flex-col items-center gap-1 text-center px-2 py-1">
                                    <svg class="h-6 w-6 text-slate-500" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round" aria-hidden="true">
                                        <path d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                    </svg>
                                    <span>12–14 Days</span>
                                </div>
                                <div class="flex flex-col items-center gap-1 text-center px-2 py-1">
                                    <svg class="h-6 w-6 text-slate-500" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round" aria-hidden="true">
                                        <path
                                            d="M2.25 18 9 11.25l4.306 4.306a11.95 11.95 0 0 1 5.814-5.518l2.74-1.22m0 0-5.94-2.281m5.94 2.28-2.28 5.941" />
                                    </svg>
                                    <span>5,357m</span>
                                </div>
                                <div class="flex flex-col items-center gap-1 text-center px-2 py-1">
                                    <svg class="h-6 w-6 text-slate-500" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round" aria-hidden="true">
                                        <path d="m3.75 13.5 10.5-11.25L12 10.5h8.25L9.75 21.75 12 13.5H3.75Z" />
                                    </svg>
                                    <span>Hard</span>
                                </div>
                            </div>
                        </div>
                    </article>
                    <article class="group overflow-hidden rounded-none">
                        <a href="/treks/everest/everest-three-passes-trek/"
                            class="relative aspect-[16/9] overflow-hidden block rounded-none">
                            <div class="absolute inset-0 bg-cover bg-center transition duration-500 ease-out group-hover:scale-110"
                                style="background-image:url('https://images.unsplash.com/photo-1609660062508-1ac4a930232d?q=80&w=1074&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D')">
                            </div>
                            <div
                                class="absolute inset-0 z-10 bg-gradient-to-t from-slate-900/70 via-slate-900/30 to-slate-900/10">
                            </div>
                            <div
                                class="absolute bottom-3 left-4 z-20 text-xs font-semibold uppercase tracking-[0.2em] text-slate-100">
                                Everest
                            </div>
                        </a>
                        <div class="py-4">
                            <div class="flex items-center justify-center text-center">
                                <h3 class="text-lg font-semibold">Everest Three Passes Trek</h3>
                            </div>

                            <div
                                class="trek-stats mt-4 flex flex-nowrap items-center justify-center gap-x-6 gap-y-2 text-sm text-slate-700">
                                <div class="flex flex-col items-center gap-1 text-center px-2 py-1">
                                    <svg class="h-6 w-6 text-slate-500" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round" aria-hidden="true">
                                        <path d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                    </svg>
                                    <span>18–20 Days</span>
                                </div>
                                <div class="flex flex-col items-center gap-1 text-center px-2 py-1">
                                    <svg class="h-6 w-6 text-slate-500" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round" aria-hidden="true">
                                        <path
                                            d="M2.25 18 9 11.25l4.306 4.306a11.95 11.95 0 0 1 5.814-5.518l2.74-1.22m0 0-5.94-2.281m5.94 2.28-2.28 5.941" />
                                    </svg>
                                    <span>5,535m</span>
                                </div>
                                <div class="flex flex-col items-center gap-1 text-center px-2 py-1">
                                    <svg class="h-6 w-6 text-slate-500" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round" aria-hidden="true">
                                        <path d="m3.75 13.5 10.5-11.25L12 10.5h8.25L9.75 21.75 12 13.5H3.75Z" />
                                    </svg>
                                    <span>Advanced</span>
                                </div>
                            </div>
                        </div>
                    </article>
                    <article class="group overflow-hidden rounded-none">
                        <a href="/treks/annapurna/annapurna-circuit-trek/"
                            class="relative aspect-[16/9] overflow-hidden block rounded-none">
                            <div class="absolute inset-0 bg-cover bg-center transition duration-500 ease-out group-hover:scale-110"
                                style="background-image:url('https://images.unsplash.com/photo-1501785888041-af3ef285b470?auto=format&fit=crop&w=1200&q=80')">
                            </div>
                            <div
                                class="absolute inset-0 z-10 bg-gradient-to-t from-slate-900/70 via-slate-900/30 to-slate-900/10">
                            </div>
                            <div
                                class="absolute bottom-3 left-4 z-20 text-xs font-semibold uppercase tracking-[0.2em] text-slate-100">
                                Annapurna
                            </div>
                        </a>
                        <div class="py-4">
                            <div class="flex items-center justify-center text-center">
                                <h3 class="text-lg font-semibold">Annapurna Circuit Trek</h3>
                            </div>

                            <div
                                class="trek-stats mt-4 flex flex-nowrap items-center justify-center gap-x-6 gap-y-2 text-sm text-slate-700">
                                <div class="flex flex-col items-center gap-1 text-center px-2 py-1">
                                    <svg class="h-6 w-6 text-slate-500" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round" aria-hidden="true">
                                        <path d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                    </svg>
                                    <span>12–16 Days</span>
                                </div>
                                <div class="flex flex-col items-center gap-1 text-center px-2 py-1">
                                    <svg class="h-6 w-6 text-slate-500" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round" aria-hidden="true">
                                        <path
                                            d="M2.25 18 9 11.25l4.306 4.306a11.95 11.95 0 0 1 5.814-5.518l2.74-1.22m0 0-5.94-2.281m5.94 2.28-2.28 5.941" />
                                    </svg>
                                    <span>5,416m</span>
                                </div>
                                <div class="flex flex-col items-center gap-1 text-center px-2 py-1">
                                    <svg class="h-6 w-6 text-slate-500" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round" aria-hidden="true">
                                        <path d="m3.75 13.5 10.5-11.25L12 10.5h8.25L9.75 21.75 12 13.5H3.75Z" />
                                    </svg>
                                    <span>Advanced</span>
                                </div>
                            </div>
                        </div>
                    </article>
                </div>
            </div>
        </section> --}}
        @include('website.pages.home.landing-featured-treks')

        <!-- section custom trek -->
        {{-- <section
            class="relative overflow-hidden bg-white py-16 sm:py-20">

            <div class="absolute inset-0 bg-white/40"></div>
            <div class="absolute inset-0 bg-gradient-to-r"></div>

            <div class="relative mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="grid items-center gap-10 lg:grid-cols-[1.2fr_0.8fr]">

                    <div>
                        <span class="inline-flex items-center gap-2 text-sm font-semibold text-sky-700">

                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M9.813 15.904 9 18.75l-.813-2.846a4.5 4.5 0 0 0-3.09-3.09L2.25 12l2.846-.813a4.5 4.5 0 0 0 3.09-3.09L9 5.25l.813 2.846a4.5 4.5 0 0 0 3.09 3.09L15.75 12l-2.846.813a4.5 4.5 0 0 0-3.09 3.09ZM18.259 8.715 18 9.75l-.259-1.035a3.375 3.375 0 0 0-2.455-2.455L14.25 6l1.035-.259a3.375 3.375 0 0 0 2.455-2.455L18 2.25l.259 1.035a3.375 3.375 0 0 0 2.455 2.455L21.75 6l-1.035.259a3.375 3.375 0 0 0-2.455 2.455Z" />
                            </svg>
                            Tailor-made itinerary
                        </span>

                        <h2 class="mt-3 text-3xl font-semibold tracking-tight text-slate-900 sm:text-4xl">
                            Custom Trek
                        </h2>

                        <p class="mt-4 max-w-2xl text-base leading-relaxed text-slate-700">
                            Work with our local team to build a private Nepal Himalaya itinerary focused on safety,
                            acclimatization, and the exact trekking experience you want.
                        </p>


                        <ul class="mt-6 grid gap-3 sm:grid-cols-2 text-sm text-slate-700">
                            <li class="flex items-start gap-2">

                                <svg xmlns="http://www.w3.org/2000/svg" class="mt-0.5 h-5 w-5 text-emerald-600"
                                    fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                    aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M9 12.75 11.25 15 15 9.75m6 2.25a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                </svg>
                                Route choice + acclimatization pacing
                            </li>
                            <li class="flex items-start gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="mt-0.5 h-5 w-5 text-emerald-600"
                                    fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                    aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M9 12.75 11.25 15 15 9.75m6 2.25a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                </svg>
                                Permit & logistics planning support
                            </li>
                            <li class="flex items-start gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="mt-0.5 h-5 w-5 text-emerald-600"
                                    fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                    aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M9 12.75 11.25 15 15 9.75m6 2.25a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                </svg>
                                Weather-aware adjustments
                            </li>
                            <li class="flex items-start gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="mt-0.5 h-5 w-5 text-emerald-600"
                                    fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                    aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M9 12.75 11.25 15 15 9.75m6 2.25a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                </svg>
                                Private guide & on-trail support
                            </li>
                        </ul>
                    </div>


                    <div class="rounded-2xl border-slate-200 p-6 border sm:p-8">
                        <h3 class="text-base font-semibold text-slate-900">
                            Plan with a local trekking team
                        </h3>
                        <p class="mt-2 text-sm leading-relaxed text-slate-600">
                            Dedicated consultation for route choice, pacing, permits, and logistics.
                        </p>

                        <div class="mt-6 flex flex-col gap-3">
                            <a href="/custom-trek/"
                                class="inline-flex items-center justify-center rounded-full bg-slate-900 px-6 py-3 text-sm font-semibold text-white shadow-sm hover:bg-slate-800 focus:outline-none focus-visible:ring-2 focus-visible:ring-slate-900 focus-visible:ring-offset-2">
                                Plan My Himalayan Trek
                            </a>

                            <a href="/contact/"
                                class="inline-flex items-center justify-center rounded-full bg-white px-6 py-3 text-sm font-semibold text-slate-900 ring-1 ring-inset ring-slate-200 hover:bg-slate-50 focus:outline-none focus-visible:ring-2 focus-visible:ring-slate-900 focus-visible:ring-offset-2">
                                Ask a question
                            </a>

                            <div class="flex flex-col gap-2 text-sm font-semibold text-slate-900">
                                <a href="https://wa.me/9779867666656"
                                    class="inline-flex items-center gap-2 hover:text-slate-700">
                                    <svg class="h-4 w-4" viewBox="0 0 32 32" fill="currentColor" aria-hidden="true">
                                        <path
                                            d="M19.11 17.205c-.27-.135-1.6-.79-1.85-.88-.246-.09-.427-.135-.608.135-.18.27-.7.88-.855 1.06-.156.18-.31.202-.58.067-.27-.135-1.14-.42-2.173-1.34-.804-.716-1.345-1.6-1.5-1.87-.156-.27-.017-.416.118-.55.12-.12.27-.31.405-.465.135-.156.18-.27.27-.45.09-.18.045-.337-.022-.472-.067-.135-.608-1.466-.833-2.005-.22-.53-.446-.457-.608-.465l-.517-.01c-.18 0-.472.067-.72.337-.247.27-.945.924-.945 2.252 0 1.327.968 2.61 1.103 2.79.135.18 1.905 2.91 4.615 4.08.645.278 1.148.444 1.54.568.646.205 1.234.176 1.7.107.518-.077 1.6-.653 1.83-1.283.225-.63.225-1.17.157-1.283-.067-.112-.247-.18-.517-.315ZM16.004 4C9.375 4 4 9.373 4 16c0 2.118.555 4.144 1.606 5.94L4 28l6.258-1.642A11.96 11.96 0 0 0 16.004 28C22.63 28 28 22.627 28 16S22.63 4 16.004 4Zm0 21.818a9.82 9.82 0 0 1-5.018-1.377l-.36-.214-3.71.974.99-3.62-.235-.373A9.78 9.78 0 0 1 6.182 16c0-5.418 4.404-9.818 9.822-9.818 5.417 0 9.818 4.4 9.818 9.818 0 5.42-4.4 9.818-9.818 9.818Z" />
                                    </svg>
                                    WhatsApp: +977 9867666656
                                </a>
                                <a href="mailto:eathways@gmail.com"
                                    class="inline-flex items-center gap-2 hover:text-slate-700">
                                    <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                                        aria-hidden="true">
                                        <path
                                            d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25H4.5a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5H4.5A2.25 2.25 0 0 0 2.25 6.75m19.5 0-9.75 6.75L2.25 6.75" />
                                    </svg>
                                    eathways@gmail.com
                                </a>
                            </div>

                            <p class="text-xs text-slate-500">
                                Response time usually within 24 hours.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section> --}}
        @include('website.pages.home.landing-custom-trek')


        {{-- section top destinations --}}
        {{-- <section class="py-14 sm:py-18 bg-white">
            <div class="max-w-7xl mx-auto px-2 sm:px-3 lg:px-4">
                <div class="flex items-end justify-between gap-6">
                    <div>

                        <span class="inline-flex items-center text-sm font-semibold text-sky-600">Himalayan
                            Destinations</span>
                        <h2 class="mt-3 text-3xl sm:text-4xl font-semibold text-slate-900">Top Destinations</h2>
                        <p class="mt-3 text-base text-slate-600">Explore Nepal's Everest, Annapurna, and Manaslu
                            regions.</p>
                    </div>
                </div>
                <div class="mt-8 grid gap-6 md:grid-cols-2">
                    <article class="group relative h-96">
                        <a href="/destinations/everest/" class="absolute inset-0 block overflow-hidden rounded-none">
                            <img src="https://plus.unsplash.com/premium_photo-1697730124551-f3eabdd16b84?q=80&w=1470&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                                alt="Everest region ridgeline"
                                class="h-full w-full object-cover transition duration-500 ease-out group-hover:scale-105" />
                            <div
                                class="absolute inset-0 bg-gradient-to-t from-slate-950/75 via-slate-900/30 to-transparent backdrop-blur-[1px] transition duration-300 ease-out group-hover:backdrop-blur-0">
                            </div>
                            <div class="absolute inset-0 flex items-center justify-center px-4 text-center text-white">
                                <h3 class="text-3xl sm:text-4xl font-bold tracking-[0.08em] uppercase">Everest</h3>
                            </div>
                        </a>
                    </article>
                    <article class="group relative h-96">
                        <a href="/destinations/annapurna/" class="absolute inset-0 block overflow-hidden rounded-none">
                            <img src="https://images.unsplash.com/photo-1616249140849-affc0f141c7e?q=80&w=1471&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                                alt="Annapurna range and forest trail"
                                class="h-full w-full object-cover transition duration-500 ease-out group-hover:scale-105" />
                            <div
                                class="absolute inset-0 bg-gradient-to-t from-slate-950/75 via-slate-900/30 to-transparent backdrop-blur-[1px] transition duration-300 ease-out group-hover:backdrop-blur-0">
                            </div>
                            <div class="absolute inset-0 flex items-center justify-center px-4 text-center text-white">
                                <h3 class="text-3xl sm:text-4xl font-bold tracking-[0.08em] uppercase">Annapurna</h3>
                            </div>
                        </a>
                    </article>
                    <article class="group relative h-96">
                        <a href="/destinations/manaslu/" class="absolute inset-0 block overflow-hidden rounded-none">
                            <img src="https://images.unsplash.com/photo-1615751278265-7b9529a95125?q=80&w=1470&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                                alt="Manaslu mountain panorama"
                                class="h-full w-full object-cover transition duration-500 ease-out group-hover:scale-105" />
                            <div
                                class="absolute inset-0 bg-gradient-to-t from-slate-950/75 via-slate-900/30 to-transparent backdrop-blur-[1px] transition duration-300 ease-out group-hover:backdrop-blur-0">
                            </div>
                            <div class="absolute inset-0 flex items-center justify-center px-4 text-center text-white">
                                <h3 class="text-3xl sm:text-4xl font-bold tracking-[0.08em] uppercase">Manaslu</h3>
                            </div>
                        </a>
                    </article>
                    <article class="group relative h-96">
                        <a href="/destinations/" class="absolute inset-0 block overflow-hidden rounded-none">
                            <img src="https://images.unsplash.com/photo-1575925368237-5c5689ec4cf3?q=80&w=735&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                                alt="Himalayan sunrise over distant peaks"
                                class="h-full w-full object-cover transition duration-500 ease-out group-hover:scale-105" />
                            <div
                                class="absolute inset-0 bg-gradient-to-t from-slate-950/75 via-slate-900/30 to-transparent backdrop-blur-[1px] transition duration-300 ease-out group-hover:backdrop-blur-0">
                            </div>
                            <div class="absolute inset-0 flex items-center justify-center px-4 text-center text-white">
                                <h3 class="text-3xl sm:text-4xl font-bold tracking-[0.08em] uppercase">High Himalaya
                                </h3>
                            </div>
                        </a>
                    </article>
                </div>
            </div>
        </section> --}}
        @include('website.pages.home.landing-destinations')

        {{-- section why choose us --}}
        {{-- <section class="relative py-40 sm:py-40 bg-white overflow-hidden">

            <div class="absolute inset-0"></div>
            <div class="max-w-7xl mx-auto px-2 sm:px-3 lg:px-4">

                <span class="inline-flex items-center text-sm font-semibold text-sky-600">Built for the
                    Himalayas</span>
                <h2 class="mt-3 text-3xl sm:text-4xl font-semibold text-slate-900">Why Choose Us</h2>
                <p class="mt-3 text-base text-slate-600">Focused on safety, local expertise, and consistent on-trail
                    support for every stage of your Himalayan journey.</p>
                <div class="mt-10 grid gap-10 md:grid-cols-2">
                    <a href="/safety/"
                        class="group transition focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-sky-400">
                        <div class="flex items-start gap-5">
                            <svg class="h-16 w-16 text-sky-600" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                <path
                                    d="M9 12.75 11.25 15 15 9.75m-3-7.036A11.959 11.959 0 0 1 3.598 6 11.99 11.99 0 0 0 3 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285Z" />
                            </svg>
                            <div>
                                <h3 class="text-lg font-semibold text-slate-900">Safety-First Himalayan Operations</h3>
                                <p class="mt-2 text-base text-slate-600">Structured briefings, weather-aware route
                                    planning, and careful pacing ensure steady progress and fewer altitude risks.</p>
                            </div>
                        </div>
                    </a>
                    <a href="/about/team/"
                        class="group transition focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-sky-400">
                        <div class="flex items-start gap-5">
                            <svg class="h-16 w-16 text-sky-600" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                <path
                                    d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z" />
                            </svg>
                            <div>
                                <h3 class="text-lg font-semibold text-slate-900">Experienced Local Himalayan Guides
                                </h3>
                                <p class="mt-2 text-base text-slate-600">Meet guides with deep knowledge of trails,
                                    culture,
                                    and altitude management who stay attentive to your comfort and safety.</p>
                            </div>
                        </div>
                    </a>
                    <a href="/safety/altitude-sickness/"
                        class="group transition focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-sky-400">
                        <div class="flex items-start gap-5">
                            <svg class="h-16 w-16 text-sky-600" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                <path
                                    d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z" />
                            </svg>
                            <div>
                                <h3 class="text-lg font-semibold text-slate-900">Altitude Sickness Awareness &amp;
                                    Prevention</h3>
                                <p class="mt-2 text-base text-slate-600">Learn our acclimatization strategy, symptom
                                    checks, and response protocols so you trek confidently at higher elevations.</p>
                            </div>
                        </div>
                    </a>
                    <a href="/safety/heli-rescue/"
                        class="group transition focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-sky-400">
                        <div class="flex items-start gap-5">
                            <svg class="h-16 w-16 text-sky-600" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                <path
                                    d="M16.712 4.33a9.027 9.027 0 0 1 1.652 1.306c.51.51.944 1.064 1.306 1.652M16.712 4.33l-3.448 4.138m3.448-4.138a9.014 9.014 0 0 0-9.424 0M19.67 7.288l-4.138 3.448m4.138-3.448a9.014 9.014 0 0 1 0 9.424m-4.138-5.976a3.736 3.736 0 0 0-.88-1.388 3.737 3.737 0 0 0-1.388-.88m2.268 2.268a3.765 3.765 0 0 1 0 2.528m-2.268-4.796a3.765 3.765 0 0 0-2.528 0m4.796 4.796c-.181.506-.475.982-.88 1.388a3.736 3.737 0 0 1-1.388.88m2.268-2.268 4.138 3.448m0 0a9.027 9.027 0 0 1-1.306 1.652c-.51.51-1.064.944-1.652 1.306m0 0-3.448-4.138m3.448 4.138a9.014 9.014 0 0 1-9.424 0m5.976-4.138a3.765 3.765 0 0 1-2.528 0m0 0a3.736 3.737 0 0 1-1.388-.88 3.737 3.737 0 0 1-.88-1.388m2.268 2.268L7.288 19.67m0 0a9.024 9.024 0 0 1-1.652-1.306 9.027 9.027 0 0 1-1.306-1.652m0 0 4.138-3.448M4.33 16.712a9.014 9.014 0 0 1 0-9.424m4.138 5.976a3.765 3.765 0 0 1 0-2.528m0 0c.181-.506.475-.982.88-1.388a3.736 3.737 0 0 1 1.388-.88m-2.268 2.268L4.33 7.288m6.406 1.18L7.288 4.33m0 0a9.024 9.024 0 0 0-1.652 1.306A9.025 9.025 0 0 0 4.33 7.288" />
                            </svg>
                            <div>
                                <h3 class="text-lg font-semibold text-slate-900">Emergency &amp; Helicopter Rescue
                                    Readiness</h3>
                                <p class="mt-2 text-base text-slate-600">Coordination pathways and 24-hour emergency
                                    readiness keep rescue support clear and fast in remote, high-altitude regions.</p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </section> --}}
        @include('website.pages.home.landing-why-choose-us')


        {{-- section gallery --}}
        {{-- <section class="py-12 sm:pt-16 bg-white pb-0">
            <div class="max-w-7xl mx-auto px-2 sm:px-3 lg:px-4">
                <div class="flex items-end justify-between gap-6">
                    <div>
                        <span class="inline-flex items-center text-sm font-semibold text-sky-600">Gallery</span>
                        <h2 class="mt-3 text-3xl sm:text-4xl font-semibold text-slate-900">Himalayan Moments</h2>
                        <p class="mt-3 text-base text-slate-600">Summit mornings, alpine trails, and mountain villages.
                        </p>
                    </div>
                </div>
            </div>
            <div class="mt-8 px-2 sm:px-3 lg:px-4">
                <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-3">
                    <button type="button" class="group relative overflow-hidden rounded-none text-left"
                        data-gallery-item
                        data-src="https://images.unsplash.com/photo-1454496522488-7a8e488e8606?auto=format&fit=crop&w=1400&q=80"
                        data-alt="Snowy Himalayan peak under a clear sky" data-title="Above the Clouds"
                        data-subtitle="Altitude">
                        <div class="relative aspect-[4/3] overflow-hidden">
                            <img src="https://images.unsplash.com/photo-1454496522488-7a8e488e8606?auto=format&fit=crop&w=1400&q=80"
                                alt="Snowy Himalayan peak under a clear sky"
                                class="h-full w-full object-cover object-center transition duration-500 ease-out group-hover:scale-105" />
                        </div>
                        <div
                            class="absolute inset-0 bg-gradient-to-t from-slate-950/50 via-slate-900/10 to-transparent">
                        </div>
                        <div class="absolute bottom-4 left-4 text-white">
                            <p class="text-xs uppercase tracking-[0.3em] text-white/80">Altitude</p>
                            <h3 class="mt-1 text-xl font-semibold">Above the Clouds</h3>
                        </div>
                    </button>
                    <button type="button" class="group relative overflow-hidden rounded-none text-left"
                        data-gallery-item
                        data-src="https://images.unsplash.com/photo-1469474968028-56623f02e42e?auto=format&fit=crop&w=1200&q=80"
                        data-alt="Sunrise light over Himalayan ridgeline" data-title="First Light"
                        data-subtitle="Ridge">
                        <div class="relative aspect-[4/3] overflow-hidden">
                            <img src="https://images.unsplash.com/photo-1469474968028-56623f02e42e?auto=format&fit=crop&w=1200&q=80"
                                alt="Sunrise light over Himalayan ridgeline"
                                class="h-full w-full object-cover object-center transition duration-500 ease-out group-hover:scale-105" />
                        </div>
                        <div
                            class="absolute inset-0 bg-gradient-to-t from-slate-950/50 via-slate-900/10 to-transparent">
                        </div>
                        <div class="absolute bottom-4 left-4 text-white">
                            <p class="text-xs uppercase tracking-[0.3em] text-white/80">Ridge</p>
                            <h3 class="mt-1 text-xl font-semibold">First Light</h3>
                        </div>
                    </button>
                    <button type="button" class="group relative overflow-hidden rounded-none text-left"
                        data-gallery-item
                        data-src="https://images.unsplash.com/photo-1500530855697-b586d89ba3ee?auto=format&fit=crop&w=1200&q=80"
                        data-alt="Mountain trail winding through forests" data-title="Forest Trails"
                        data-subtitle="Footpaths">
                        <div class="relative aspect-[4/3] overflow-hidden">
                            <img src="https://images.unsplash.com/photo-1500530855697-b586d89ba3ee?auto=format&fit=crop&w=1200&q=80"
                                alt="Mountain trail winding through forests"
                                class="h-full w-full object-cover object-center transition duration-500 ease-out group-hover:scale-105" />
                        </div>
                        <div
                            class="absolute inset-0 bg-gradient-to-t from-slate-950/50 via-slate-900/10 to-transparent">
                        </div>
                        <div class="absolute bottom-4 left-4 text-white">
                            <p class="text-xs uppercase tracking-[0.3em] text-white/80">Footpaths</p>
                            <h3 class="mt-1 text-xl font-semibold">Forest Trails</h3>
                        </div>
                    </button>
                    <button type="button" class="group relative overflow-hidden rounded-none text-left"
                        data-gallery-item
                        data-src="https://images.unsplash.com/photo-1470770903676-69b98201ea1c?auto=format&fit=crop&w=900&q=80"
                        data-alt="High mountain pass with dramatic clouds" data-title="High Pass"
                        data-subtitle="Weather">
                        <div class="relative aspect-[4/3] overflow-hidden">
                            <img src="https://images.unsplash.com/photo-1470770903676-69b98201ea1c?auto=format&fit=crop&w=900&q=80"
                                alt="High mountain pass with dramatic clouds"
                                class="h-full w-full object-cover object-center transition duration-500 ease-out group-hover:scale-105" />
                        </div>
                        <div
                            class="absolute inset-0 bg-gradient-to-t from-slate-950/50 via-slate-900/10 to-transparent">
                        </div>
                        <div class="absolute bottom-4 left-4 text-white">
                            <p class="text-xs uppercase tracking-[0.3em] text-white/80">Weather</p>
                            <h3 class="mt-1 text-xl font-semibold">High Pass</h3>
                        </div>
                    </button>
                    <button type="button" class="group relative overflow-hidden rounded-none text-left"
                        data-gallery-item
                        data-src="https://images.unsplash.com/photo-1501785888041-af3ef285b470?auto=format&fit=crop&w=1400&q=80"
                        data-alt="Himalayan valley with layered hills" data-title="Layered Valleys"
                        data-subtitle="Horizons">
                        <div class="relative aspect-[4/3] overflow-hidden">
                            <img src="https://images.unsplash.com/photo-1501785888041-af3ef285b470?auto=format&fit=crop&w=1400&q=80"
                                alt="Himalayan valley with layered hills"
                                class="h-full w-full object-cover object-center transition duration-500 ease-out group-hover:scale-105" />
                        </div>
                        <div
                            class="absolute inset-0 bg-gradient-to-t from-slate-950/50 via-slate-900/10 to-transparent">
                        </div>
                        <div class="absolute bottom-4 left-4 text-white">
                            <p class="text-xs uppercase tracking-[0.3em] text-white/80">Horizons</p>
                            <h3 class="mt-1 text-xl font-semibold">Layered Valleys</h3>
                        </div>
                    </button>
                    <button type="button" class="group relative overflow-hidden rounded-none text-left"
                        data-gallery-item
                        data-src="https://images.unsplash.com/photo-1482192505345-5655af888cc4?auto=format&fit=crop&w=1200&q=80"
                        data-alt="Prayer flags fluttering along a mountain path" data-title="Prayer Flags"
                        data-subtitle="Trails">
                        <div class="relative aspect-[4/3] overflow-hidden">
                            <img src="https://images.unsplash.com/photo-1482192505345-5655af888cc4?auto=format&fit=crop&w=1200&q=80"
                                alt="Prayer flags fluttering along a mountain path"
                                class="h-full w-full object-cover object-center transition duration-500 ease-out group-hover:scale-105" />
                        </div>
                        <div
                            class="absolute inset-0 bg-gradient-to-t from-slate-950/50 via-slate-900/10 to-transparent">
                        </div>
                        <div class="absolute bottom-4 left-4 text-white">
                            <p class="text-xs uppercase tracking-[0.3em] text-white/80">Trails</p>
                            <h3 class="mt-1 text-xl font-semibold">Prayer Flags</h3>
                        </div>
                    </button>
                </div>
            </div>
            <div id="gallery-lightbox" class="fixed inset-0 z-50 hidden">
                <div class="absolute inset-0 bg-black/80" data-gallery-close></div>
                <div class="relative z-10 flex h-full w-full items-center justify-center px-6 py-10">
                    <button type="button"
                        class="absolute right-6 top-6 rounded-full bg-white/10 p-2 text-white hover:bg-white/20"
                        aria-label="Close gallery" data-gallery-close>
                        <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                            stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            <path d="M6 6l12 12M18 6l-12 12" />
                        </svg>
                    </button>
                    <button type="button"
                        class="absolute left-4 top-1/2 -translate-y-1/2 rounded-full bg-white/10 p-3 text-white hover:bg-white/20"
                        aria-label="Previous image" data-gallery-prev>
                        <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                            stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            <path d="m15 18-6-6 6-6" />
                        </svg>
                    </button>
                    <figure class="max-w-5xl">
                        <img id="gallery-lightbox-image" src="" alt=""
                            class="max-h-[70vh] w-full rounded-none object-contain shadow-2xl opacity-0 transition-opacity duration-300" />
                        <figcaption class="mt-4 text-center text-white">
                            <p id="gallery-lightbox-subtitle" class="text-xs uppercase tracking-[0.3em] text-white/70">
                            </p>
                            <h3 id="gallery-lightbox-title" class="mt-2 text-2xl font-semibold"></h3>
                        </figcaption>
                    </figure>
                    <button type="button"
                        class="absolute right-4 top-1/2 -translate-y-1/2 rounded-full bg-white/10 p-3 text-white hover:bg-white/20"
                        aria-label="Next image" data-gallery-next>
                        <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                            stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            <path d="m9 18 6-6-6-6" />
                        </svg>
                    </button>
                </div>
            </div>
        </section> --}}
        @include('website.pages.home.landing-gallery')

        {{-- responsible tourism --}}
        {{-- <section class="responsible-section py-60 sm:py-60 bg-white">
            <svg class="responsible-bg" viewBox="0 0 1200 600" preserveAspectRatio="none" aria-hidden="true"
                focusable="false">
                <defs>
                    <linearGradient id="himalaya-wash" x1="0" y1="0" x2="1" y2="1">
                        <stop offset="0%" stop-color="#f8fafc" stop-opacity="0.85" />
                        <stop offset="55%" stop-color="#e0f2fe" stop-opacity="0.6" />
                        <stop offset="100%" stop-color="#bae6fd" stop-opacity="0.5" />
                    </linearGradient>
                </defs>
                <rect width="1200" height="600" fill="url(#himalaya-wash)" />
                <g fill="#ffffff" fill-opacity="0.9" stroke="#e2e8f0" stroke-opacity="0.7" stroke-width="1.2">
                    <path d="M0 430 L70 360 L120 380 L180 300 L250 340 L320 250 L390 320 L460 230 L520 300 L590 210 L660 290 L730 200 L800 310 L870 240 L940 320 L1010 260 L1080 340 L1200 300 L1200 600 L0 600 Z" />
                </g>
                <g fill="#f1f5f9" fill-opacity="0.9" stroke="#cbd5f5" stroke-opacity="0.6" stroke-width="1">
                    <path d="M0 470 L90 410 L150 430 L220 360 L290 400 L360 330 L430 390 L500 320 L570 380 L640 310 L710 370 L780 300 L850 380 L920 330 L990 390 L1060 340 L1130 410 L1200 380 L1200 600 L0 600 Z" />
                </g>
                <g fill="none" stroke="#0ea5e9" stroke-opacity="0.35" stroke-width="2" stroke-linecap="round">
                    <path d="M120 520 C220 480, 320 520, 420 490 S620 460, 760 500 980 520, 1120 480" />
                </g>
                <g fill="none" stroke="#94a3b8" stroke-opacity="0.35" stroke-width="1.2">
                    <path d="M0 120 C160 80, 320 160, 520 120 S900 80, 1200 140" />
                    <path d="M0 200 C180 160, 360 240, 560 200 S920 150, 1200 230" />
                    <path d="M0 280 C200 230, 400 310, 600 280 S940 220, 1200 300" />
                </g>
                <g fill="none" stroke="#0f172a" stroke-opacity="0.5" stroke-width="2">
                    <circle cx="210" cy="485" r="6" />
                    <path d="M210 491 L210 520" />
                    <path d="M210 500 L196 510" />
                    <path d="M210 505 L224 515" />
                    <path d="M214 498 L228 490" />
                </g>
            </svg>
            <div class="section-inner max-w-7xl mx-auto px-2 sm:px-3 lg:px-4">

                <div>
                    <span class="inline-flex items-center text-sm font-semibold text-sky-600">
                        Responsible Himalayan Tourism
                    </span>
                    <h2 class="mt-3 text-3xl sm:text-4xl font-semibold text-slate-900">
                        Responsible & Sustainable Travel
                    </h2>
                    <p class="mt-3 text-base text-slate-600">
                        We follow responsible practices that protect fragile high-altitude environments and support
                        local Himalayan communities.
                    </p>
                </div>


                <div class="mt-10 grid gap-6 md:grid-cols-3">

                    <a href="/responsible-travel/#community" class="group border-slate-200 p-6">
                        <div class="flex items-start gap-4">
                            <span class="inline-flex h-14 w-14 items-center justify-center text-sky-700">

                                <svg xmlns="http://www.w3.org/2000/svg" class="h-14 w-14" fill="none"
                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M18 18.72a9.094 9.094 0 0 0 3.741-6.003A3.75 3.75 0 0 0 18 9.75M15 18.75a9.094 9.094 0 0 0 3.741-6.003A3.75 3.75 0 0 0 15 9.75M6 18.72a9.094 9.094 0 0 1-3.741-6.003A3.75 3.75 0 0 1 6 9.75m9 9a9 9 0 0 1-9 0m9 0a9 9 0 0 0 3 0m-12 0a9 9 0 0 1-3 0m12-9a3.75 3.75 0 1 0-7.5 0m7.5 0a3.75 3.75 0 1 1-7.5 0m-6 0a3.75 3.75 0 1 0 7.5 0" />
                                </svg>
                            </span>

                            <div class="min-w-0">
                                <h3 class="text-lg font-semibold text-slate-900">
                                    Community Support
                                </h3>
                                <p class="mt-2 text-sm leading-relaxed text-slate-600">
                                    Local hiring, fair porter treatment, and contribution to village economies.
                                </p>

                                <div class="mt-4 inline-flex items-center gap-2 text-sm font-semibold text-sky-600">
                                    Learn more

                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="h-4 w-4 transition group-hover:translate-x-0.5" fill="none"
                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </a>


                    <a href="/responsible-travel/#environment" class="group border-slate-200 p-6">
                        <div class="flex items-start gap-4">
                            <span class="inline-flex h-14 w-14 items-center justify-center text-emerald-700">

                                <svg xmlns="http://www.w3.org/2000/svg" class="h-14 w-14" fill="none"
                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M21 12c0 5-4 9-9 9s-9-4-9-9 4-9 9-9 9 4 9 9Z" />
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M9 12c2.5 0 4.5-2 4.5-4.5S11.5 3 9 3m0 9c0 3 2.5 6 6 6" />
                                </svg>
                            </span>

                            <div class="min-w-0">
                                <h3 class="text-lg font-semibold text-slate-900">
                                    Environmental Responsibility
                                </h3>
                                <p class="mt-2 text-sm leading-relaxed text-slate-600">
                                    Leave-no-trace operations and waste management in trekking regions.
                                </p>

                                <div class="mt-4 inline-flex items-center gap-2 text-sm font-semibold text-sky-600">
                                    Learn more
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="h-4 w-4 transition group-hover:translate-x-0.5" fill="none"
                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </a>


                    <a href="/responsible-travel/#culture" class="group border-slate-200 p-6">
                        <div class="flex items-start gap-4">
                            <span class="inline-flex h-14 w-14 items-center justify-center text-violet-700">

                                <svg xmlns="http://www.w3.org/2000/svg" class="h-14 w-14" fill="none"
                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M12 21a9 9 0 1 0 0-18 9 9 0 0 0 0 18Z" />
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M3.6 9h16.8M3.6 15h16.8M12 3c2.5 2.8 3.7 5.9 3.7 9s-1.2 6.2-3.7 9c-2.5-2.8-3.7-5.9-3.7-9S9.5 5.8 12 3Z" />
                                </svg>
                            </span>

                            <div class="min-w-0">
                                <h3 class="text-lg font-semibold text-slate-900">
                                    Cultural Respect
                                </h3>
                                <p class="mt-2 text-sm leading-relaxed text-slate-600">
                                    Respectful practices for monasteries, villages, and local traditions.
                                </p>

                                <div class="mt-4 inline-flex items-center gap-2 text-sm font-semibold text-sky-600">
                                    Learn more
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="h-4 w-4 transition group-hover:translate-x-0.5" fill="none"
                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

            </div>
        </section> --}}
        @include('website.pages.home.landing-responsible-tourism')


        {{-- section how we work --}}
        {{-- <section class="relative py-60 sm:py-60 bg-white overflow-hidden">
            <div class="how-work-bg absolute inset-0 bg-cover bg-center"
                style="background-image:url('https://images.unsplash.com/photo-1691195954216-a5c52bc0b280?q=80&w=1470&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D')">
            </div>
            <div class="absolute inset-0"></div>
            <div class="relative z-10 max-w-7xl mx-auto px-2 sm:px-3 lg:px-4">
                <div class="flex flex-col gap-4 lg:flex-row lg:items-end lg:justify-between">
                    <div>
                        <span class="inline-flex items-center text-sm font-semibold text-white">Process</span>
                        <h2 class="mt-3 text-3xl sm:text-4xl font-semibold text-white">How We Work</h2>
                  
                    </div>
                </div>
            </div>
            <div class="relative z-10 mt-10">
                <div class="relative max-w-7xl mx-auto px-2 sm:px-3 lg:px-4 py-12">
                    <div class="relative">
                        <ol class="relative z-10 grid gap-10 md:grid-cols-5">
                            <li
                                class="relative z-10 flex flex-col items-center bg-white/90 px-4 py-5 text-center backdrop-blur md:translate-y-6">
                                <div
                                    class="flex h-20 w-20 items-center justify-center rounded-full border-[6px] border-sky-500 bg-white text-sky-600 shadow-lg">
                                    <svg class="h-10 w-10" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                                        aria-hidden="true">
                                        <path
                                            d="M20.25 8.511c.884.284 1.5 1.128 1.5 2.097v4.286c0 1.136-.847 2.1-1.98 2.193-.34.027-.68.052-1.02.072v3.091l-3-3c-1.354 0-2.694-.055-4.02-.163a2.115 2.115 0 0 1-.825-.242m9.345-8.334a2.126 2.126 0 0 0-.476-.095 48.64 48.64 0 0 0-8.048 0c-1.131.094-1.976 1.057-1.976 2.192v4.286c0 .837.46 1.58 1.155 1.951m9.345-8.334V6.637c0-1.621-1.152-3.026-2.76-3.235A48.455 48.455 0 0 0 11.25 3c-2.115 0-4.198.137-6.24.402-1.608.209-2.76 1.614-2.76 3.235v6.226c0 1.621 1.152 3.026 2.76 3.235.577.075 1.157.14 1.74.194V21l4.155-4.155" />
                                    </svg>
                                </div>
                                <h3 class="mt-4 text-base font-semibold text-slate-900">01. Share your goals</h3>
                                <p class="mt-2 text-sm text-slate-600">Region, timing, and experience level.</p>
                            </li>
                            <li
                                class="relative z-10 flex flex-col items-center bg-white/90 px-4 py-5 text-center backdrop-blur md:-translate-y-10">
                                <div
                                    class="flex h-20 w-20 items-center justify-center rounded-full border-[6px] border-emerald-500 bg-white text-emerald-600 shadow-lg">
                                    <svg class="h-10 w-10" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                                        aria-hidden="true">
                                        <path
                                            d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                                    </svg>
                                </div>
                                <h3 class="mt-4 text-base font-semibold text-slate-900">02. Receive an itinerary</h3>
                                <p class="mt-2 text-sm text-slate-600">Safety-led pacing with acclimatization.</p>
                            </li>
                            <li
                                class="relative z-10 flex flex-col items-center bg-white/90 px-4 py-5 text-center backdrop-blur md:translate-y-6">
                                <div
                                    class="flex h-20 w-20 items-center justify-center rounded-full border-[6px] border-amber-500 bg-white text-amber-600 shadow-lg">
                                    <svg class="h-10 w-10" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                                        aria-hidden="true">
                                        <path
                                            d="M8.25 7.5V6.108c0-1.135.845-2.098 1.976-2.192.373-.03.748-.057 1.123-.08M15.75 18H18a2.25 2.25 0 0 0 2.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 0 0-1.123-.08M15.75 18.75v-1.875a3.375 3.375 0 0 0-3.375-3.375h-1.5a1.125 1.125 0 0 1-1.125-1.125v-1.5A3.375 3.375 0 0 0 6.375 7.5H5.25m11.9-3.664A2.251 2.251 0 0 0 15 2.25h-1.5a2.251 2.251 0 0 0-2.15 1.586m5.8 0c.065.21.1.433.1.664v.75h-6V4.5c0-.231.035-.454.1-.664M6.75 7.5H4.875c-.621 0-1.125.504-1.125 1.125v12c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V16.5a9 9 0 0 0-9-9Z" />
                                    </svg>
                                </div>
                                <h3 class="mt-4 text-base font-semibold text-slate-900">03. Confirm logistics</h3>
                                <p class="mt-2 text-sm text-slate-600">Permits, guides, and lodging arranged.</p>
                            </li>
                            <li
                                class="relative z-10 flex flex-col items-center bg-white/90 px-4 py-5 text-center backdrop-blur md:-translate-y-10">
                                <div
                                    class="flex h-20 w-20 items-center justify-center rounded-full border-[6px] border-indigo-500 bg-white text-indigo-600 shadow-lg">
                                    <svg class="h-10 w-10" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                                        aria-hidden="true">
                                        <path
                                            d="M9 12.75 11.25 15 15 9.75m-3-7.036A11.959 11.959 0 0 1 3.598 6 11.99 11.99 0 0 0 3 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285Z" />
                                    </svg>
                                </div>
                                <h3 class="mt-4 text-base font-semibold text-slate-900">04. Prepare together</h3>
                                <p class="mt-2 text-sm text-slate-600">Briefings for gear, health, and safety.</p>
                            </li>
                            <li
                                class="relative z-10 flex flex-col items-center bg-white/90 px-4 py-5 text-center backdrop-blur md:translate-y-6">
                                <div
                                    class="flex h-20 w-20 items-center justify-center rounded-full border-[6px] border-rose-500 bg-white text-rose-600 shadow-lg">
                                    <svg class="h-10 w-10" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                                        aria-hidden="true">
                                        <path
                                            d="M9 6.75V15m6-6v8.25m.503 3.498 4.875-2.437c.381-.19.622-.58.622-1.006V4.82c0-.836-.88-1.38-1.628-1.006l-3.869 1.934c-.317.159-.69.159-1.006 0L9.503 3.252a1.125 1.125 0 0 0-1.006 0L3.622 5.689C3.24 5.88 3 6.27 3 6.695V19.18c0 .836.88 1.38 1.628 1.006l3.869-1.934c.317-.159.69-.159 1.006 0l4.994 2.497c.317.158.69.158 1.006 0Z" />
                                    </svg>
                                </div>
                                <h3 class="mt-4 text-base font-semibold text-slate-900">05. Trek with care</h3>
                                <p class="mt-2 text-sm text-slate-600">Daily checks and on-trail support.</p>
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </section> --}}
        @include('website.pages.home.landing-how-we-work')


        {{-- section safety & preparation --}}
        {{-- <section class="relative py-60 sm:py-60 bg-white overflow-hidden">
            <div class="absolute inset-0 bg-cover bg-center opacity-15"
                style="background-image:url('https://images.unsplash.com/photo-1500530855697-b586d89ba3ee?auto=format&fit=crop&w=1600&q=80')">
            </div>
            <div class="absolute inset-0 bg-gradient-to-b from-white/95 via-white/90 to-white"></div>
            <div class="relative max-w-7xl mx-auto px-2 sm:px-3 lg:px-4">
                <div class="flex flex-col gap-3 md:flex-row md:items-end md:justify-between">
                    <div>

                        <span class="inline-flex items-center text-sm font-semibold text-sky-600">Safety &
                            Preparation</span>
                        <h2 class="mt-3 text-3xl sm:text-4xl font-semibold text-slate-900">Safety &amp; Preparation
                            Overview</h2>
                        <p class="mt-3 text-base text-slate-600">Key planning resources for safe and well-prepared
                            Himalayan trekking in Nepal.</p>
                    </div>
                </div>
                <div class="mt-10 grid gap-10 md:grid-cols-2">
                    <a href="/safety/altitude-sickness/"
                        class="group transition focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-sky-400">
                        <div class="flex items-start gap-5">
                            <svg class="h-14 w-14 text-sky-600" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                <path
                                    d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z" />
                            </svg>
                            <div class="flex-1">
                                <h3 class="text-lg font-semibold text-slate-900">Altitude Sickness</h3>
                                <p class="mt-2 text-base text-slate-600">Understand symptoms, prevention, and response
                                    steps at altitude, plus how we monitor acclimatization day by day.</p>
                                <span class="mt-4 inline-flex items-center gap-2 text-sm font-semibold text-slate-900">
                                    Read Guide
                                    <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                                        aria-hidden="true">
                                        <path d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                                    </svg>
                                </span>
                            </div>
                        </div>
                    </a>
                    <a href="/safety/trek-briefing-process/"
                        class="group transition focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-sky-400">
                        <div class="flex items-start gap-5">
                            <svg class="h-14 w-14 text-sky-600" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                <path
                                    d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                            </svg>
                            <div class="flex-1">
                                <h3 class="text-lg font-semibold text-slate-900">Daily Trek Briefing Process</h3>
                                <p class="mt-2 text-base text-slate-600">Know what to expect each day, how we review
                                    conditions, and how plans stay aligned with your pace.</p>
                                <span class="mt-4 inline-flex items-center gap-2 text-sm font-semibold text-slate-900">
                                    Read Guide
                                    <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                                        aria-hidden="true">
                                        <path d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                                    </svg>
                                </span>
                            </div>
                        </div>
                    </a>
                    <a href="/safety/heli-rescue/"
                        class="group transition focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-sky-400">
                        <div class="flex items-start gap-5">
                            <svg class="h-14 w-14 text-sky-600" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                <path
                                    d="M16.712 4.33a9.027 9.027 0 0 1 1.652 1.306c.51.51.944 1.064 1.306 1.652M16.712 4.33l-3.448 4.138m3.448-4.138a9.014 9.014 0 0 0-9.424 0M19.67 7.288l-4.138 3.448m4.138-3.448a9.014 9.014 0 0 1 0 9.424m-4.138-5.976a3.736 3.736 0 0 0-.88-1.388 3.737 3.737 0 0 0-1.388-.88m2.268 2.268a3.765 3.765 0 0 1 0 2.528m-2.268-4.796a3.765 3.765 0 0 0-2.528 0m4.796 4.796c-.181.506-.475.982-.88 1.388a3.736 3.737 0 0 1-1.388.88m2.268-2.268 4.138 3.448m0 0a9.027 9.027 0 0 1-1.306 1.652c-.51.51-1.064.944-1.652 1.306m0 0-3.448-4.138m3.448 4.138a9.014 9.014 0 0 1-9.424 0m5.976-4.138a3.765 3.765 0 0 1-2.528 0m0 0a3.736 3.737 0 0 1-1.388-.88 3.737 3.737 0 0 1-.88-1.388m2.268 2.268L7.288 19.67m0 0a9.024 9.024 0 0 1-1.652-1.306 9.027 9.027 0 0 1-1.306-1.652m0 0 4.138-3.448M4.33 16.712a9.014 9.014 0 0 1 0-9.424m4.138 5.976a3.765 3.765 0 0 1 0-2.528m0 0c.181-.506.475-.982.88-1.388a3.736 3.737 0 0 1 1.388-.88m-2.268 2.268L4.33 7.288m6.406 1.18L7.288 4.33m0 0a9.024 9.024 0 0 0-1.652 1.306A9.025 9.025 0 0 0 4.33 7.288" />
                            </svg>
                            <div class="flex-1">
                                <h3 class="text-lg font-semibold text-slate-900">Emergency &amp; Heli Rescue</h3>
                                <p class="mt-2 text-base text-slate-600">Learn our response protocol, escalation flow,
                                    and rescue coordination steps for remote trails.</p>
                                <span class="mt-4 inline-flex items-center gap-2 text-sm font-semibold text-slate-900">
                                    Read Guide
                                    <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                                        aria-hidden="true">
                                        <path d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                                    </svg>
                                </span>
                            </div>
                        </div>
                    </a>
                    <a href="/safety/gear-checklist/"
                        class="group transition focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-sky-400">
                        <div class="flex items-start gap-5">
                            <svg class="h-14 w-14 text-sky-600" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                <path
                                    d="M11.35 3.836c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 0 0 .75-.75 2.25 2.25 0 0 0-.1-.664m-5.8 0A2.251 2.251 0 0 1 13.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m8.9-4.414c.376.023.75.05 1.124.08 1.131.094 1.976 1.057 1.976 2.192V16.5A2.25 2.25 0 0 1 18 18.75h-2.25m-7.5-10.5H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V18.75m-7.5-10.5h6.375c.621 0 1.125.504 1.125 1.125v9.375m-8.25-3 1.5 1.5 3-3.75" />
                            </svg>
                            <div class="flex-1">
                                <h3 class="text-lg font-semibold text-slate-900">Gear Checklist</h3>
                                <p class="mt-2 text-base text-slate-600">Pack confidently with the essentials for each
                                    season, from layered clothing to safety gear.</p>
                                <span class="mt-4 inline-flex items-center gap-2 text-sm font-semibold text-slate-900">
                                    View Checklist
                                    <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                                        aria-hidden="true">
                                        <path d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                                    </svg>
                                </span>
                            </div>
                        </div>
                    </a>
                </div>
                <p class="mt-6 text-sm text-slate-500">Always follow your guide’s instructions and acclimatize
                    responsibly.</p>
            </div>
        </section> --}}
        @include('website.pages.home.landing-safety-preparation')


        {{-- section newsletter --}}
        {{-- <section class="planning-section py-60 sm:py-60">
            <div class="planning-inner max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="relative overflow-hidden  ">

                    <div class="relative grid gap-8 lg:grid-cols-[1.2fr_0.8fr] items-center">

                        <div>
                            <span class="inline-flex items-center gap-2 text-sm font-semibold text-sky-700">

                                Trek Planning Updates
                            </span>

                            <h2 class="mt-3 text-3xl sm:text-4xl font-semibold tracking-tight text-slate-900">
                                Get Himalaya trekking tips in your inbox
                            </h2>

                            <p class="mt-3 text-base leading-relaxed text-slate-600">
                                Monthly safety guidance, packing checklists, seasonal trail notes, and itinerary
                                ideas—made for trekking in Nepal.
                            </p>

                            <ul class="mt-6 grid gap-3 sm:grid-cols-2 text-sm text-slate-700">
                                <li class="flex items-start gap-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="mt-0.5 h-5 w-5 text-emerald-600"
                                        fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                        aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M9 12.75 11.25 15 15 9.75m6 2.25a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                    </svg>
                                    Altitude & acclimatization tips
                                </li>
                                <li class="flex items-start gap-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="mt-0.5 h-5 w-5 text-emerald-600"
                                        fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                        aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M9 12.75 11.25 15 15 9.75m6 2.25a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                    </svg>
                                    Gear lists & packing reminders
                                </li>
                                <li class="flex items-start gap-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="mt-0.5 h-5 w-5 text-emerald-600"
                                        fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                        aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M9 12.75 11.25 15 15 9.75m6 2.25a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                    </svg>
                                    Best seasons & route notes
                                </li>
                                <li class="flex items-start gap-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="mt-0.5 h-5 w-5 text-emerald-600"
                                        fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                        aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M9 12.75 11.25 15 15 9.75m6 2.25a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                    </svg>
                                    No spam—unsubscribe anytime
                                </li>
                            </ul>
                        </div>


                        <div class="relative rounded-2xl bg-white p-6 sm:p-7 shadow-sm ring-1 ring-slate-200">
                            <form action="/newsletter/subscribe" method="POST" class="space-y-4">



                                <div>
                                    <label for="newsletter_email" class="sr-only">Email address</label>
                                    <input id="newsletter_email" name="email" type="email" required
                                        placeholder="Enter your email"
                                        class="w-full rounded-xl border border-slate-200 bg-white px-4 py-3 text-sm text-slate-900 placeholder:text-slate-400 shadow-sm focus:outline-none focus:ring-2 focus:ring-slate-900 focus:ring-offset-2" />
                                </div>

                                <button type="submit"
                                    class="w-full inline-flex items-center justify-center rounded-xl bg-slate-900 px-5 py-3 text-sm font-semibold text-white shadow-sm hover:bg-slate-800 focus:outline-none focus:ring-2 focus:ring-slate-900 focus:ring-offset-2">
                                    Subscribe
                                </button>

                                <p class="text-xs text-slate-500 leading-relaxed">
                                    By subscribing, you agree to receive email updates about trekking in Nepal. You can
                                    unsubscribe anytime.
                                </p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section> --}}
        @include('website.pages.home.landing-newsletter')


        {{-- inquiry panel --}}
        <button id="inquiry-toggle"
            class="inquiry-cta fixed right-0 bottom-10 z-50 -translate-y-1/2 bg-slate-900 px-4 py-3 text-sm font-semibold text-white shadow-lg hover:bg-slate-800 focus:outline-none focus-visible:ring-2 focus-visible:ring-slate-900 focus-visible:ring-offset-2">
            <span class="inline-flex items-center gap-2">
                Send Inquiry
                <svg class="telegram-zoom h-6 w-6" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                    <path
                        d="M21.79 3.19a.75.75 0 0 0-.78-.15L2.5 10.06a.75.75 0 0 0 .06 1.43l4.68 1.56 1.78 5.37a.75.75 0 0 0 1.28.28l2.78-2.78 4.44 3.28a.75.75 0 0 0 1.18-.46l3.75-14.25a.75.75 0 0 0-.64-1.3ZM8.4 12.55l9.54-6.07-7.98 7.4a.75.75 0 0 0-.22.68l.69 3.4-1.08-3.24a.75.75 0 0 0-.47-.48l-2.48-.83Z" />
                </svg>
            </span>
        </button>


        <div id="inquiry-panel" class="fixed inset-0 z-50">
            <div class="inquiry-backdrop absolute inset-0 bg-slate-900/40"></div>
            <aside class="inquiry-drawer absolute right-0 top-0 h-full w-full max-w-md bg-white shadow-xl">
                <div class="flex items-center justify-between border-b border-slate-200 px-6 py-4">
                    <div>
                        <p class="text-xs font-semibold uppercase tracking-[0.3em] text-slate-500">Inquiry</p>
                        <h3 class="mt-1 text-lg font-semibold text-slate-900">Plan Your Trek</h3>
                    </div>
                    <button id="inquiry-close"
                        class="rounded-full p-2 text-slate-500 hover:text-slate-700 focus:outline-none focus-visible:ring-2 focus-visible:ring-slate-900"
                        aria-label="Close inquiry panel">
                        <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                            stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            <path d="M6 6l12 12M18 6l-12 12" />
                        </svg>
                    </button>
                </div>
                <form class="px-6 py-6" action="#" method="post">
                    <label class="block text-sm font-semibold text-slate-900" for="inquiry-name">Full name</label>
                    <input id="inquiry-name" name="name" type="text" autocomplete="name" required
                        class="mt-2 w-full rounded-md border border-slate-200 px-3 py-2 text-sm text-slate-900 focus:border-slate-400 focus:outline-none focus:ring-2 focus:ring-slate-200" />

                    <label class="mt-4 block text-sm font-semibold text-slate-900" for="inquiry-email">Email</label>
                    <input id="inquiry-email" name="email" type="email" autocomplete="email" required
                        class="mt-2 w-full rounded-md border border-slate-200 px-3 py-2 text-sm text-slate-900 focus:border-slate-400 focus:outline-none focus:ring-2 focus:ring-slate-200" />

                    <label class="mt-4 block text-sm font-semibold text-slate-900" for="inquiry-phone">Phone /
                        WhatsApp</label>
                    <input id="inquiry-phone" name="phone" type="tel" autocomplete="tel"
                        class="mt-2 w-full rounded-md border border-slate-200 px-3 py-2 text-sm text-slate-900 focus:border-slate-400 focus:outline-none focus:ring-2 focus:ring-slate-200" />

                    <label class="mt-4 block text-sm font-semibold text-slate-900" for="inquiry-message">Your
                        plan</label>
                    <textarea id="inquiry-message" name="message" rows="4" required
                        class="mt-2 w-full rounded-md border border-slate-200 px-3 py-2 text-sm text-slate-900 focus:border-slate-400 focus:outline-none focus:ring-2 focus:ring-slate-200"></textarea>

                    <button type="submit"
                        class="mt-6 inline-flex w-full items-center justify-center rounded-md bg-slate-900 px-4 py-3 text-sm font-semibold text-white hover:bg-slate-800 focus:outline-none focus-visible:ring-2 focus-visible:ring-slate-900 focus-visible:ring-offset-2">
                        Send Inquiry
                    </button>
                    <a href="https://wa.me/9779867666656?text=Hello%2C%20I%27d%20like%20to%20inquire%20about%20a%20Himalayan%20trek."
                        class="mt-3 inline-flex w-full items-center justify-center gap-2 rounded-md border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm font-semibold text-emerald-700 hover:bg-emerald-100 focus:outline-none focus-visible:ring-2 focus-visible:ring-emerald-400 focus-visible:ring-offset-2"
                        target="_blank" rel="noopener">
                        <svg class="h-4 w-4" viewBox="0 0 32 32" fill="currentColor" aria-hidden="true">
                            <path
                                d="M19.11 17.205c-.27-.135-1.6-.79-1.85-.88-.246-.09-.427-.135-.608.135-.18.27-.7.88-.855 1.06-.156.18-.31.202-.58.067-.27-.135-1.14-.42-2.173-1.34-.804-.716-1.345-1.6-1.5-1.87-.156-.27-.017-.416.118-.55.12-.12.27-.31.405-.465.135-.156.18-.27.27-.45.09-.18.045-.337-.022-.472-.067-.135-.608-1.466-.833-2.005-.22-.53-.446-.457-.608-.465l-.517-.01c-.18 0-.472.067-.72.337-.247.27-.945.924-.945 2.252 0 1.327.968 2.61 1.103 2.79.135.18 1.905 2.91 4.615 4.08.645.278 1.148.444 1.54.568.646.205 1.234.176 1.7.107.518-.077 1.6-.653 1.83-1.283.225-.63.225-1.17.157-1.283-.067-.112-.247-.18-.517-.315ZM16.004 4C9.375 4 4 9.373 4 16c0 2.118.555 4.144 1.606 5.94L4 28l6.258-1.642A11.96 11.96 0 0 0 16.004 28C22.63 28 28 22.627 28 16S22.63 4 16.004 4Zm0 21.818a9.82 9.82 0 0 1-5.018-1.377l-.36-.214-3.71.974.99-3.62-.235-.373A9.78 9.78 0 0 1 6.182 16c0-5.418 4.404-9.818 9.822-9.818 5.417 0 9.818 4.4 9.818 9.818 0 5.42-4.4 9.818-9.818 9.818Z" />
                        </svg>
                        Message on WhatsApp
                    </a>
                    <p class="mt-3 text-xs text-slate-500">We reply within 24 hours with route and pricing options.
                    </p>
                </form>

            </aside>
        </div>

    </main>

    <footer class="site-footer border-slate-200">
        <div class="footer-inner max-w-7xl mx-auto px-2 sm:px-3 lg:px-4 py-12">
            <div class="grid gap-10 lg:grid-cols-[1.4fr_2fr]">
                <div>
                    <h3 class="text-lg font-semibold">Nepal Himalayan Trekking Specialists</h3>
                    <p class="mt-3 text-sm text-slate-600">Focused exclusively on Himalayan trekking in Nepal's
                        Everest,
                        Annapurna, and Manaslu regions with safety-first operations.</p>
                    <div class="mt-4 text-sm text-slate-600 space-y-2">
                        <div>Email: info@eathways.com</div>
                        <div>Phone: +977 (984) 192-7372</div>
                        <div style="display: flex">
                            <span>WhatsApp:</span>
                            <a href="https://wa.me/9841927372" aria-label="WhatsApp">
                                <svg viewBox="0 0 36 36" width="18" height="18" aria-hidden="true"
                                    focusable="false" style="vertical-align: middle;">
                                    <path fill="#25D366"
                                        d="M19.11 17.66c-.28-.14-1.67-.82-1.93-.91-.26-.09-.45-.14-.64.14-.19.28-.73.91-.9 1.1-.17.19-.33.21-.61.07-.28-.14-1.17-.43-2.22-1.38-.82-.73-1.38-1.64-1.54-1.92-.16-.28-.02-.43.12-.57.12-.12.28-.33.42-.49.14-.16.19-.28.28-.47.09-.19.05-.35-.02-.49-.07-.14-.64-1.55-.88-2.12-.23-.55-.47-.48-.64-.49-.17-.01-.35-.01-.54-.01-.19 0-.49.07-.75.35-.26.28-.99.96-.99 2.34 0 1.38 1.02 2.71 1.16 2.9.14.19 2.01 3.07 4.86 4.3.68.29 1.21.46 1.62.59.68.22 1.3.19 1.79.12.55-.08 1.67-.68 1.91-1.34.24-.66.24-1.23.17-1.34-.07-.11-.26-.17-.54-.31z" />
                                    <path fill="#25D366"
                                        d="M16.01 2.67C8.84 2.67 3.01 8.5 3.01 15.67c0 2.35.62 4.66 1.8 6.69L3 29.33l6.2-1.63c1.96 1.07 4.16 1.63 6.39 1.63 7.17 0 13-5.83 13-13S23.18 2.67 16.01 2.67zm0 23.66c-2.11 0-4.19-.56-6.01-1.62l-.43-.25-3.68.97.98-3.58-.27-.44a10.93 10.93 0 0 1-1.67-5.74c0-6.06 4.93-11 11-11s11 4.94 11 11-4.93 11-11 11z" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="grid gap-8 sm:grid-cols-2 lg:grid-cols-3 text-sm">
                    <div>
                        <h4 class="font-semibold">Himalayan Treks</h4>
                        <div class="mt-3 space-y-2 text-slate-600">
                            <a href="/treks/" class="block">All Treks</a>
                            <a href="/treks/everest/" class="block">Everest Treks</a>
                            <a href="/treks/annapurna/" class="block">Annapurna Treks</a>
                            <a href="/treks/manaslu/" class="block">Manaslu Treks</a>
                        </div>
                    </div>
                    <div>
                        <h4 class="font-semibold">Destinations</h4>
                        <div class="mt-3 space-y-2 text-slate-600">
                            <a href="/destinations/everest/" class="block">Everest Region</a>
                            <a href="/destinations/annapurna/" class="block">Annapurna Region</a>
                            <a href="/destinations/manaslu/" class="block">Manaslu Region</a>
                        </div>
                    </div>
                    <div>
                        <h4 class="font-semibold">Safety</h4>
                        <div class="mt-3 space-y-2 text-slate-600">
                            <a href="/safety/" class="block">Safety Overview</a>
                            <a href="/safety/altitude-sickness/" class="block">Altitude Sickness</a>
                            <a href="/safety/trek-briefing-process/" class="block">Daily Trek Briefing</a>
                            <a href="/safety/heli-rescue/" class="block">Emergency Rescue</a>
                            <a href="/safety/gear-checklist/" class="block">Gear Checklist</a>
                        </div>
                    </div>
                    <div>
                        <h4 class="font-semibold">Responsible Travel</h4>
                        <div class="mt-3 space-y-2 text-slate-600">
                            <a href="/responsible-travel/" class="block">Overview</a>
                            <a href="/responsible-travel/local-community-impact/" class="block">Local Community
                                Impact</a>
                            <a href="/responsible-travel/environmental-responsibility/" class="block">Environmental
                                Responsibility</a>
                            <a href="/responsible-travel/social-fund/" class="block">Social Fund</a>
                        </div>
                    </div>
                    <div>
                        <h4 class="font-semibold">Company</h4>
                        <div class="mt-3 space-y-2 text-slate-600">
                            <a href="/about/company/" class="block">About</a>
                            <a href="/about/team/" class="block">Team</a>
                            <a href="/about/licenses/" class="block">Licenses</a>
                            <a href="/about/why-us/" class="block">Why Us</a>
                            <a href="/about/reviews/" class="block">Reviews</a>
                        </div>
                    </div>
                    <div>
                        <h4 class="font-semibold">Contact</h4>
                        <div class="mt-3 space-y-2 text-slate-600">
                            <a href="/contact/" class="block">Contact</a>
                            <a href="/contact/inquiry/" class="block">Inquiry Form</a>
                            <a href="/terms/" class="block">Terms</a>
                            <a href="/privacy/" class="block">Privacy</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-10 border-t border-slate-200 pt-6 text-xs text-slate-500">© <?php echo date('Y') ?> EATH Travel Pvt Ltd. All
                rights reserved.</div>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script>
        const heroSwiper = new Swiper(".hero-swiper", {
            loop: true,
            autoplay: {
                delay: 5000,
                disableOnInteraction: false
            },
            effect: "fade",
            speed: 1200,
            fadeEffect: {
                crossFade: true
            }
        });

        const mobileMenuButton = document.getElementById("mobile-menu-button");
        const mobileMenu = document.getElementById("mobile-menu");

        mobileMenuButton.addEventListener("click", () => {
            const isOpen = mobileMenu.classList.toggle("hidden");
            const expanded = !isOpen;
            mobileMenuButton.setAttribute("aria-expanded", expanded.toString());
        });

        const galleryItems = Array.from(document.querySelectorAll("[data-gallery-item]"));
        const galleryLightbox = document.getElementById("gallery-lightbox");
        const galleryImage = document.getElementById("gallery-lightbox-image");
        const galleryTitle = document.getElementById("gallery-lightbox-title");
        const gallerySubtitle = document.getElementById("gallery-lightbox-subtitle");
        const galleryPrev = document.querySelector("[data-gallery-prev]");
        const galleryNext = document.querySelector("[data-gallery-next]");
        const galleryCloseButtons = document.querySelectorAll("[data-gallery-close]");
        let galleryIndex = 0;

        const openGallery = (index) => {
            const item = galleryItems[index];
            if (!item || !galleryLightbox || !galleryImage) {
                return;
            }
            galleryIndex = index;
            galleryImage.classList.add("opacity-0");
            const nextSrc = item.dataset.src || "";
            const nextAlt = item.dataset.alt || "";
            if (galleryTitle) {
                galleryTitle.textContent = item.dataset.title || "";
            }
            if (gallerySubtitle) {
                gallerySubtitle.textContent = item.dataset.subtitle || "";
            }
            const applyImage = () => {
                galleryImage.src = nextSrc;
                galleryImage.alt = nextAlt;
                requestAnimationFrame(() => {
                    galleryImage.classList.remove("opacity-0");
                });
            };
            if (galleryLightbox.classList.contains("hidden")) {
                galleryLightbox.classList.remove("hidden");
                document.body.classList.add("overflow-hidden");
                requestAnimationFrame(applyImage);
            } else {
                window.setTimeout(applyImage, 120);
            }
        };

        const closeGallery = () => {
            if (!galleryLightbox) {
                return;
            }
            if (galleryImage) {
                galleryImage.classList.add("opacity-0");
            }
            window.setTimeout(() => {
                galleryLightbox.classList.add("hidden");
                document.body.classList.remove("overflow-hidden");
            }, 200);
        };

        const showGalleryItem = (direction) => {
            if (!galleryItems.length) {
                return;
            }
            const nextIndex = (galleryIndex + direction + galleryItems.length) % galleryItems.length;
            openGallery(nextIndex);
        };

        galleryItems.forEach((item, index) => {
            item.addEventListener("click", () => openGallery(index));
        });

        if (galleryPrev) {
            galleryPrev.addEventListener("click", () => showGalleryItem(-1));
        }
        if (galleryNext) {
            galleryNext.addEventListener("click", () => showGalleryItem(1));
        }
        galleryCloseButtons.forEach((button) => {
            button.addEventListener("click", closeGallery);
        });

        window.addEventListener("keydown", (event) => {
            if (!galleryLightbox || galleryLightbox.classList.contains("hidden")) {
                return;
            }
            if (event.key === "Escape") {
                closeGallery();
            } else if (event.key === "ArrowRight") {
                showGalleryItem(1);
            } else if (event.key === "ArrowLeft") {
                showGalleryItem(-1);
            }
        });

        document.querySelectorAll("[data-accordion]").forEach((button) => {
            button.addEventListener("click", () => {
                const target = button.getAttribute("data-accordion");
                const panel = document.querySelector(`[data-accordion-panel="${target}"]`);
                const isHidden = panel.classList.toggle("hidden");
                button.setAttribute("aria-expanded", (!isHidden).toString());
                button.querySelector("span").textContent = isHidden ? "+" : "−";
            });
        });

        const header = document.querySelector(".site-header");
        const heroSection = document.querySelector(".hero-overlay");

        const updateHeaderStyle = () => {
            if (!header || !heroSection) {
                return;
            }
            const threshold = heroSection.offsetHeight - header.offsetHeight;
            header.classList.toggle("is-scrolled", window.scrollY > threshold);
        };

        updateHeaderStyle();
        window.addEventListener("scroll", updateHeaderStyle);
        window.addEventListener("resize", updateHeaderStyle);

        if (header) {
            const updateDropdownBackdrop = () => {
                const hasOpenDropdown = !!header.querySelector(".group:focus-within, .group:hover");
                document.body.classList.toggle("is-dropdown-open", hasOpenDropdown);
            };

            header.addEventListener("mouseover", updateDropdownBackdrop);
            header.addEventListener("mouseout", updateDropdownBackdrop);
            header.addEventListener("focusin", updateDropdownBackdrop);
            header.addEventListener("focusout", updateDropdownBackdrop);
        }

        const typingTarget = document.querySelector(".hero-typing span");
        if (typingTarget) {
            const typingText = typingTarget.dataset.text || typingTarget.textContent.trim();
            const prefersReducedMotion = window.matchMedia("(prefers-reduced-motion: reduce)").matches;
            if (prefersReducedMotion) {
                typingTarget.textContent = typingText;
            } else {
                let index = 0;
                let forward = true;
                const typeSpeed = 90;
                const deleteSpeed = 50;
                const holdDelay = 1200;
                const pauseDelay = 400;

                const tick = () => {
                    if (forward) {
                        index += 1;
                    } else {
                        index -= 1;
                    }

                    typingTarget.textContent = typingText.slice(0, index);

                    let delay = forward ? typeSpeed : deleteSpeed;
                    if (forward && index >= typingText.length) {
                        forward = false;
                        delay = holdDelay;
                    } else if (!forward && index <= 0) {
                        forward = true;
                        delay = pauseDelay;
                    }
                    window.setTimeout(tick, delay);
                };

                typingTarget.textContent = "";
                tick();
            }
        }

        const inquiryToggle = document.getElementById("inquiry-toggle");
        const inquiryPanel = document.getElementById("inquiry-panel");
        const inquiryClose = document.getElementById("inquiry-close");
        const inquiryBackdrop = document.querySelector("#inquiry-panel .inquiry-backdrop");

        if (inquiryToggle && inquiryPanel && inquiryClose && inquiryBackdrop) {
            const openInquiry = () => {
                inquiryPanel.classList.add("is-open");
                inquiryToggle.setAttribute("aria-expanded", "true");
            };
            const closeInquiry = () => {
                inquiryPanel.classList.remove("is-open");
                inquiryToggle.setAttribute("aria-expanded", "false");
            };

            inquiryToggle.setAttribute("aria-expanded", "false");
            inquiryToggle.setAttribute("aria-controls", "inquiry-panel");

            inquiryToggle.addEventListener("click", openInquiry);
            inquiryClose.addEventListener("click", closeInquiry);
            inquiryBackdrop.addEventListener("click", closeInquiry);
            window.addEventListener("keydown", (event) => {
                if (event.key === "Escape" && inquiryPanel.classList.contains("is-open")) {
                    closeInquiry();
                }
            });
        }
    </script>
</body>

</html>
