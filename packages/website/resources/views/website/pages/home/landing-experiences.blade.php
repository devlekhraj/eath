<section class="section-eath bg-canvas" aria-labelledby="experiences-title">
    <div class="content-container">
        {{-- Section Header --}}
        <div class="flex flex-col sm:flex-row sm:items-end sm:justify-between gap-4 mb-8 sm:mb-10">
            <div>
                <span class="eyebrow-label text-primary font-semibold tracking-wider uppercase text-xs">Curated Travel Styles</span>
                <h2 id="experiences-title" class="font-display text-2xl sm:text-3xl lg:text-4xl font-semibold text-stone-900 mt-1">
                    Explore by Mountain Experience
                </h2>
                <p class="text-stone-600 text-sm sm:text-base mt-2 max-w-xl">
                    Choose your journey based on mountain aspirations—from legendary base camps to secluded alpine passes.
                </p>
            </div>
            <div class="flex-shrink-0">
                <a href="{{ route('trek.list') }}" class="btn-eath btn-ghost text-primary text-sm font-semibold hover:underline inline-flex items-center gap-1.5">
                    <span>All Itineraries</span>
                    <svg class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M3 10a.75.75 0 01.75-.75h10.638L10.23 5.29a.75.75 0 111.04-1.08l5.5 5.25a.75.75 0 010 1.08l-5.5 5.25a.75.75 0 11-1.04-1.08l4.158-3.96H3.75A.75.75 0 013 10z" clip-rule="evenodd" />
                    </svg>
                </a>
            </div>
        </div>

        {{-- 4-Column Motivation-Led Tiles Grid --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
            {{-- Tile 1: Base Camp Treks --}}
            <div class="group relative rounded-xl overflow-hidden aspect-[4/5] bg-stone-900 shadow-sm border border-stone-200/50">
                <img src="https://images.unsplash.com/photo-1544735716-392fe2489ffa?auto=format&fit=crop&w=800&q=80"
                     alt="Everest Base Camp expedition trail surrounded by towering Himalayan peaks"
                     loading="lazy"
                     class="absolute inset-0 h-full w-full object-cover transition-transform duration-700 ease-out group-hover:scale-105" />
                <div class="absolute inset-0 bg-gradient-to-t from-stone-950/90 via-stone-950/40 to-transparent"></div>
                <div class="absolute inset-0 p-5 flex flex-col justify-end text-white">
                    <span class="text-[0.7rem] font-semibold uppercase tracking-widest text-emerald-300 mb-1">Legendary Footsteps</span>
                    <h3 class="font-display text-xl font-semibold text-white leading-snug">
                        Base Camp Treks
                    </h3>
                    <p class="text-xs text-stone-200 mt-1 line-clamp-2">
                        Stand at the foot of the world's highest peaks in the Khumbu and Annapurna sanctuaries.
                    </p>
                    <a href="{{ route('trek.list') }}?q=base+camp" class="mt-3 inline-flex items-center text-xs font-semibold text-emerald-200 group-hover:text-white transition">
                        <span>View base camp routes</span>
                        <span class="ml-1 transition-transform group-hover:translate-x-1" aria-hidden="true">&rarr;</span>
                        <span class="sr-only">, Base Camp Treks</span>
                    </a>
                </div>
            </div>

            {{-- Tile 2: High Mountain Passes --}}
            <div class="group relative rounded-xl overflow-hidden aspect-[4/5] bg-stone-900 shadow-sm border border-stone-200/50">
                <img src="https://images.unsplash.com/photo-1506744038136-46273834b3fb?auto=format&fit=crop&w=800&q=80"
                     alt="Trekker crossing a snow-covered high altitude Himalayan pass"
                     loading="lazy"
                     class="absolute inset-0 h-full w-full object-cover transition-transform duration-700 ease-out group-hover:scale-105" />
                <div class="absolute inset-0 bg-gradient-to-t from-stone-950/90 via-stone-950/40 to-transparent"></div>
                <div class="absolute inset-0 p-5 flex flex-col justify-end text-white">
                    <span class="text-[0.7rem] font-semibold uppercase tracking-widest text-amber-300 mb-1">5,000m+ Traverses</span>
                    <h3 class="font-display text-xl font-semibold text-white leading-snug">
                        High Mountain Passes
                    </h3>
                    <p class="text-xs text-stone-200 mt-1 line-clamp-2">
                        Thrilling crossings including Thorong La, Cho La, and Renjo La with sweeping 360° panoramas.
                    </p>
                    <a href="{{ route('trek.list') }}?q=pass" class="mt-3 inline-flex items-center text-xs font-semibold text-amber-200 group-hover:text-white transition">
                        <span>Explore high passes</span>
                        <span class="ml-1 transition-transform group-hover:translate-x-1" aria-hidden="true">&rarr;</span>
                        <span class="sr-only">, High Mountain Passes</span>
                    </a>
                </div>
            </div>

            {{-- Tile 3: Short & Scenic Treks --}}
            <div class="group relative rounded-xl overflow-hidden aspect-[4/5] bg-stone-900 shadow-sm border border-stone-200/50">
                <img src="https://images.unsplash.com/photo-1516483638261-f4dbaf036963?auto=format&fit=crop&w=800&q=80"
                     alt="Sunrise over Annapurna mountain range with alpine rhododendrons"
                     loading="lazy"
                     class="absolute inset-0 h-full w-full object-cover transition-transform duration-700 ease-out group-hover:scale-105" />
                <div class="absolute inset-0 bg-gradient-to-t from-stone-950/90 via-stone-950/40 to-transparent"></div>
                <div class="absolute inset-0 p-5 flex flex-col justify-end text-white">
                    <span class="text-[0.7rem] font-semibold uppercase tracking-widest text-sky-300 mb-1">5–9 Day Journeys</span>
                    <h3 class="font-display text-xl font-semibold text-white leading-snug">
                        Short &amp; Scenic Treks
                    </h3>
                    <p class="text-xs text-stone-200 mt-1 line-clamp-2">
                        Accessible alpine vistas and comfortable teahouse trails like Poon Hill and Langtang.
                    </p>
                    <a href="{{ route('trek.list') }}?duration=short" class="mt-3 inline-flex items-center text-xs font-semibold text-sky-200 group-hover:text-white transition">
                        <span>Discover short routes</span>
                        <span class="ml-1 transition-transform group-hover:translate-x-1" aria-hidden="true">&rarr;</span>
                        <span class="sr-only">, Short & Scenic Treks</span>
                    </a>
                </div>
            </div>

            {{-- Tile 4: Remote Wilderness Circuits --}}
            <div class="group relative rounded-xl overflow-hidden aspect-[4/5] bg-stone-900 shadow-sm border border-stone-200/50">
                <img src="https://images.unsplash.com/photo-1464822759023-fed622ff2c3b?auto=format&fit=crop&w=800&q=80"
                     alt="Quiet Tibetan-style stone village and prayer flags along the Manaslu circuit"
                     loading="lazy"
                     class="absolute inset-0 h-full w-full object-cover transition-transform duration-700 ease-out group-hover:scale-105" />
                <div class="absolute inset-0 bg-gradient-to-t from-stone-950/90 via-stone-950/40 to-transparent"></div>
                <div class="absolute inset-0 p-5 flex flex-col justify-end text-white">
                    <span class="text-[0.7rem] font-semibold uppercase tracking-widest text-rose-300 mb-1">Restricted &amp; Untamed</span>
                    <h3 class="font-display text-xl font-semibold text-white leading-snug">
                        Wilderness Circuits
                    </h3>
                    <p class="text-xs text-stone-200 mt-1 line-clamp-2">
                        Preserved Tibetan Buddhist heritage and remote trails across Manaslu, Nar Phu, and Tsum.
                    </p>
                    <a href="{{ route('trek.list') }}?q=circuit" class="mt-3 inline-flex items-center text-xs font-semibold text-rose-200 group-hover:text-white transition">
                        <span>Explore remote circuits</span>
                        <span class="ml-1 transition-transform group-hover:translate-x-1" aria-hidden="true">&rarr;</span>
                        <span class="sr-only">, Wilderness Circuits</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
