 <section class="relative h-[75vh] min-h-[520px] hero-overlay" aria-labelledby="hero-title">

     <div class="absolute inset-0">
         <div class="swiper hero-swiper">
             <div class="swiper-wrapper">
                 @if ($mainBanner && $mainBanner->image_urls)
                     @foreach ($mainBanner->image_urls as $image)
                         <div class="swiper-slide">
                             <img src="{{ $image }}" alt="{{ $mainBanner->alt_text }}"
                                 class="h-full w-full object-cover" />
                         </div>
                     @endforeach
                 @else
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
                 @endif
             </div>
         </div>
     </div>

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
                             Treks
                             <svg class="h-3.5 w-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                 stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                 <path d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                             </svg>
                         </button>
                         <div
                             class="nav-dropdown absolute left-0 top-full -mt-px w-80 backdrop-blur-xl opacity-0 invisible group-hover:opacity-100 group-hover:visible group-focus-within:opacity-100 group-focus-within:visible transition overflow-hidden">
                             <div class="p-4 pt-6 grid gap-3 text-sm">
                                 <a href="/treks/" class="font-semibold text-slate-900">All Treks</a>
                                 @foreach ($menus as $menu)
                                     <div>
                                         <a href="{{ $menu['slug'] }}"
                                             class="font-semibold text-slate-800">{{ $menu['name'] }}</a>
                                         <div class="menu-list mt-2">
                                             @foreach ($menu['treks'] as $trek)
                                                 <a href="/treks/{{ $trek['slug'] }}"
                                                     class="text-slate-600 hover:text-slate-900">{{ $trek['name'] }}</a>
                                             @endforeach
                                         </div>
                                     </div>
                                 @endforeach
                                 {{-- <div>
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
                                 </div> --}}
                             </div>
                         </div>
                     </div>
                     <div class="relative group">
                         <button type="button" class="nav-button flex items-center gap-1 py-6 text-sm font-medium"
                             aria-expanded="false" aria-haspopup="true">
                             Destinations
                             <svg class="h-3.5 w-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                 stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                 <path d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                             </svg>
                         </button>
                         <div
                             class="nav-dropdown absolute left-0 top-full -mt-px w-80 backdrop-blur-xl opacity-0 invisible group-hover:opacity-100 group-hover:visible group-focus-within:opacity-100 group-focus-within:visible transition overflow-hidden">
                             <div class="p-4 pt-6 grid gap-3 text-sm">
                                 <a href="/destinations/" class="font-semibold text-slate-900">All
                                     Destinations</a>

                                 @foreach ($menus as $menu)
                                     <div>
                                         <a href="{{ $menu['slug'] }}"
                                             class="font-semibold text-slate-800">{{ $menu['name'] }}</a>
                                         <div class="menu-list mt-2">
                                             @foreach ($menu['treks'] as $trek)
                                                 <a href="/treks/{{ $trek['slug'] }}"
                                                     class="text-slate-600 hover:text-slate-900">{{ $trek['name'] }}</a>
                                             @endforeach
                                         </div>
                                     </div>
                                 @endforeach
                                 {{-- <div>
                                     <a href="/destinations/everest/" class="font-semibold text-slate-800">Everest
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
                                     <a href="/destinations/annapurna/" class="font-semibold text-slate-800">Annapurna
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
                                     <a href="/destinations/manaslu/" class="font-semibold text-slate-800">Manaslu
                                         Region</a>
                                     <div class="menu-list mt-2">
                                         <a href="/destinations/manaslu/about/"
                                             class="text-slate-600 hover:text-slate-900">About Manaslu
                                             Region</a>
                                         <a href="/destinations/manaslu/treks/"
                                             class="text-slate-600 hover:text-slate-900">Treks in Manaslu
                                             Region</a>
                                     </div>
                                 </div> --}}
                             </div>
                         </div>
                     </div>
                     <a href="/custom-trek/" class="nav-link inline-flex items-center gap-2 py-3 text-sm font-medium">
                         <svg class="h-3.5 w-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                             stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                             <path
                                 d="M9 6.75V15m6-6v8.25m.503 3.498 4.875-2.437c.381-.19.622-.58.622-1.006V4.82c0-.836-.88-1.38-1.628-1.006l-3.869 1.934c-.317.159-.69.159-1.006 0L9.503 3.252a1.125 1.125 0 0 0-1.006 0L3.622 5.689C3.24 5.88 3 6.27 3 6.695V19.18c0 .836.88 1.38 1.628 1.006l3.869-1.934c.317-.159.69-.159 1.006 0l4.994 2.497c.317.158.69.158 1.006 0Z" />
                         </svg>
                         Custom Trip</a>
                     <div class="relative group">
                         <a href="/safety/" class="nav-link inline-flex items-center gap-2 py-3 text-sm font-medium">

                             Safety
                             <svg class="h-3.5 w-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                 stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
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
                                 <a href="/safety/heli-rescue/" class="text-slate-600 hover:text-slate-900">Emergency
                                     &amp; Heli Rescue</a>
                                 <a href="/safety/trekking-insurance/"
                                     class="text-slate-600 hover:text-slate-900">Trekking Insurance</a>
                                 <a href="/safety/gear-checklist/" class="text-slate-600 hover:text-slate-900">Gear
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
                                 <a href="/about/licenses/" class="text-slate-600 hover:text-slate-900">Licenses</a>
                                 <a href="/about/why-us/" class="text-slate-600 hover:text-slate-900">Why
                                     Us</a>
                                 <a href="/about/reviews/" class="text-slate-600 hover:text-slate-900">Reviews</a>
                             </div>
                         </div>
                     </div>
                     <div class="relative group">
                         <a href="/contact/" class="nav-link inline-flex items-center gap-2 py-3 text-sm font-medium">

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
                             stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
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
                         <a href="/treks/everest/everest-base-camp-trek/" class="block text-sm text-slate-600">Everest
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
                         <a href="/treks/manaslu/manaslu-circuit-trek/" class="block text-sm text-slate-600">Manaslu
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
                         <a href="/destinations/everest/" class="block text-sm font-semibold text-slate-700">Everest
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
                         <a href="/destinations/manaslu/" class="block text-sm font-semibold text-slate-700">Manaslu
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

     <div class="absolute inset-0 hero-content ">
         <div class="mx-auto max-w-7xl px-2 sm:px-3 lg:px-4 h-full flex items-center justify-start text-left">
             <div class="text-white p-6">
                 <p class="hero-typing text-xs sm:text-sm uppercase tracking-[0.35em] text-white/80">
                     <span data-text="Easy Access to the Himalayas · 2025">Easy Access to the Himalayas ·
                         @php echo date('Y'); @endphp</span>
                 </p>
                 <h1 id="hero-title" class="mt-4 text-3xl sm:text-5xl lg:text-6xl font-extrabold tracking-[0.08em]">
                     Himalayan Trekking <br />
                     in <span class="clip-text">Nepal</span>
                 </h1>
                 <p
                     class="mt-4 inline-flex clip-text max-w-2xl items-center rounded-md bg-white/15 py-2 text-base sm:text-lg font-semibold tracking-[0.04em] text-white">
                     Licensed &amp; safety-led treks across Everest, Annapurna &amp; Manaslu.
                 </p>

             </div>
         </div>
     </div>

 </section>
