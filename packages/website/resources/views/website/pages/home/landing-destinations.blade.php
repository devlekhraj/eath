<section class="section-eath bg-canvas" aria-labelledby="destinations-title">
    <div class="content-container">
        {{-- Section Header --}}
        <div class="flex flex-col sm:flex-row sm:items-end sm:justify-between gap-4 mb-8 sm:mb-10">
            <div>
                <span class="eyebrow-label text-primary font-semibold tracking-wider uppercase text-xs">Himalayan Geography</span>
                <h2 id="destinations-title" class="font-display text-2xl sm:text-3xl lg:text-4xl font-semibold text-stone-900 mt-1">
                    Explore Legendary Regions
                </h2>
                <p class="text-stone-600 text-sm sm:text-base mt-2 max-w-xl">
                    From the towering amphitheater of Everest to the diverse flora of Annapurna and the rugged seclusion of Manaslu.
                </p>
            </div>
            <div class="flex-shrink-0">
                <a href="{{ route('trek.list') }}" class="btn-eath btn-ghost text-primary text-sm font-semibold hover:underline inline-flex items-center gap-1.5">
                    <span>Browse All Trails</span>
                    <svg class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M3 10a.75.75 0 01.75-.75h10.638L10.23 5.29a.75.75 0 111.04-1.08l5.5 5.25a.75.75 0 010 1.08l-5.5 5.25a.75.75 0 11-1.04-1.08l4.158-3.96H3.75A.75.75 0 013 10z" clip-rule="evenodd" />
                    </svg>
                </a>
            </div>
        </div>

        {{-- Editorial Asymmetric / Responsive Destination Grid --}}
        @if(isset($destinations) && count($destinations) > 0)
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($destinations as $index => $destination)
                    @php
                        $slug = $destination->slug ?? $destination['slug'] ?? '';
                        $name = $destination->name ?? $destination['name'] ?? '';
                        $image = $destination->image ?? $destination['image'] ?? 'https://images.unsplash.com/photo-1544735716-392fe2489ffa?auto=format&fit=crop&w=1200&q=80';
                        $trekCount = isset($destination->treks) ? $destination->treks->count() : (isset($destination['treks']) ? count($destination['treks']) : 0);
                        $destUrl = route('destination.detail', ['slug' => $slug]);
                        // Asymmetric highlight for first destination if more than 2 items
                        $isFeatured = ($index === 0 && count($destinations) >= 3);
                    @endphp

                    <article class="group relative rounded-2xl overflow-hidden shadow-sm border border-stone-200/60 bg-stone-900 {{ $isFeatured ? 'lg:col-span-2 aspect-[16/10] sm:aspect-[16/10]' : 'aspect-[4/3] sm:aspect-[3/4]' }}">
                        <a href="{{ $destUrl }}" class="absolute inset-0 block overflow-hidden" aria-label="Explore {{ $name }} trekking region">
                            <img src="{{ $image }}"
                                 alt="{{ $name }} Himalayan trekking region and mountain trails"
                                 loading="lazy"
                                 class="h-full w-full object-cover transition-transform duration-700 ease-out group-hover:scale-105" />
                            
                            {{-- Dual Gradient Overlay for legibility --}}
                            <div class="absolute inset-0 bg-gradient-to-t from-stone-950/90 via-stone-950/40 to-transparent"></div>
                            <div class="absolute inset-0 bg-stone-950/10 transition-opacity duration-300 group-hover:opacity-0"></div>

                            {{-- Region Badge & Trek Counter --}}
                            <div class="absolute top-4 left-4 z-10 flex items-center gap-2">
                                <span class="badge-pill bg-white/90 text-stone-900 font-semibold backdrop-blur-sm shadow-sm text-xs">
                                    Region
                                </span>
                                @if($trekCount > 0)
                                    <span class="badge-pill bg-stone-900/80 text-emerald-300 backdrop-blur-sm text-xs border-stone-700">
                                        {{ $trekCount }} {{ \Illuminate\Support\Str::plural('Route', $trekCount) }}
                                    </span>
                                @endif
                            </div>

                            {{-- Content Area Bottom --}}
                            <div class="absolute inset-x-0 bottom-0 p-6 sm:p-8 z-10 flex flex-col justify-end text-white">
                                <h3 class="font-display text-2xl sm:text-3xl font-semibold text-white tracking-tight group-hover:text-emerald-200 transition-colors">
                                    {{ $name }}
                                </h3>
                                
                                <p class="text-xs sm:text-sm text-stone-200 mt-1.5 max-w-md line-clamp-2 font-sans">
                                    @if(str_contains(strtolower($name), 'everest'))
                                        Home to Mount Everest, Gokyo Lakes, high Sherpa monasteries, and legendary alpine valleys.
                                    @elseif(str_contains(strtolower($name), 'annapurna'))
                                        Diverse climate zones, deep gorges, panoramic viewpoints, and classic mountain teahouses.
                                    @elseif(str_contains(strtolower($name), 'manaslu'))
                                        Pristine Tibetan border trails, remote Larkya La pass, and authentic Himalayan wilderness.
                                    @elseif(str_contains(strtolower($name), 'langtang'))
                                        Close to Kathmandu with sacred Tamang heritage, serene pine forests, and alpine glaciated peaks.
                                    @else
                                        Pristine mountain itineraries planned with expert local Sherpa guidance.
                                    @endif
                                </p>

                                <div class="mt-4 flex items-center gap-2 text-xs font-semibold text-emerald-300 group-hover:text-white transition">
                                    <span>Explore Region Itineraries</span>
                                    <svg class="h-4 w-4 transition-transform group-hover:translate-x-1" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M3 10a.75.75 0 01.75-.75h10.638L10.23 5.29a.75.75 0 111.04-1.08l5.5 5.25a.75.75 0 010 1.08l-5.5 5.25a.75.75 0 11-1.04-1.08l4.158-3.96H3.75A.75.75 0 013 10z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </div>
                        </a>
                    </article>
                @endforeach
            </div>
        @else
            <div class="card-eath bg-surface p-8 text-center">
                <p class="text-stone-600 text-sm">Himalayan destination regions are loading.</p>
            </div>
        @endif
    </div>
</section>
