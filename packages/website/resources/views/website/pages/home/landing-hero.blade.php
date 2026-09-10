<section class="relative min-h-[580px] lg:min-h-[720px] flex items-center bg-slate-950 overflow-hidden" aria-labelledby="hero-title">
    {{-- Background Image Carousel / Imagery --}}
    <div class="absolute inset-0 z-0">
        <div class="swiper hero-swiper h-full w-full">
            <div class="swiper-wrapper h-full w-full">
                @if ($mainBanner && !empty($mainBanner->image_urls))
                    @foreach ($mainBanner->image_urls as $image)
                        <div class="swiper-slide h-full w-full">
                            <img src="{{ $image }}" alt="{{ $mainBanner->alt_text ?? 'Nepal Himalayan Mountain Peaks' }}"
                                class="h-full w-full object-cover object-center" />
                        </div>
                    @endforeach
                @else
                    <div class="swiper-slide h-full w-full">
                        <img src="https://images.unsplash.com/photo-1584395631446-e41b0fc3f68d?q=80&w=1600&auto=format&fit=crop"
                            alt="Towering snow-capped Himalayan peak under crisp blue sky in Nepal"
                            class="h-full w-full object-cover object-center" />
                    </div>
                    <div class="swiper-slide h-full w-full">
                        <img src="https://images.unsplash.com/photo-1573331343892-976a013b7020?q=80&w=1600&auto=format&fit=crop"
                            alt="Himalayan ridgeline with prayer flags and layered mountain valleys"
                            class="h-full w-full object-cover object-center" />
                    </div>
                    <div class="swiper-slide h-full w-full">
                        <img src="https://images.unsplash.com/photo-1454496522488-7a8e488e8606?auto=format&fit=crop&w=1600&q=80"
                            alt="Everest Himalayan range alpine morning panorama"
                            class="h-full w-full object-cover object-center" />
                    </div>
                @endif
            </div>
        </div>
        {{-- Controlled contrast gradient overlay for editorial readability --}}
        <div class="absolute inset-0 bg-gradient-to-r from-slate-950/85 via-slate-950/60 to-slate-950/20 z-10"></div>
        <div class="absolute inset-0 bg-gradient-to-t from-slate-950/70 via-transparent to-slate-950/30 z-10"></div>
    </div>

    {{-- Hero Content Container --}}
    <div class="content-container relative z-20 py-20 lg:py-28">
        <div class="max-w-2xl text-white">
            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-white/15 backdrop-blur-md border border-white/20 text-xs font-semibold tracking-wider uppercase text-emerald-300 mb-5">
                <span class="h-2 w-2 rounded-full bg-emerald-400 animate-pulse" aria-hidden="true"></span>
                Local Mountain Leaders · Safety-First Operations
            </div>

            <h1 id="hero-title" class="font-display text-4xl sm:text-5xl lg:text-6xl font-semibold tracking-tight text-white leading-[1.08]">
                Himalayan Trekking <br />
                <span class="italic text-emerald-200">in Nepal</span>
            </h1>

            <p class="mt-5 text-base sm:text-lg text-slate-200 leading-relaxed font-sans max-w-xl">
                Authentic, safety-led expeditions across Everest, Annapurna, and Manaslu. Planned with altitude-aware acclimatization, licensed local guides, and 24/7 mountain support.
            </p>

            {{-- Dual CTAs: Primary Planning + Secondary Discovery --}}
            <div class="mt-8 flex flex-wrap items-center gap-4">
                <button type="button" class="btn-eath btn-accent btn-lg btnOpenInquiry shadow-lg" aria-label="Start planning your Himalayan trek">
                    <span>Plan My Trek</span>
                    <svg class="h-4 w-4 ml-1" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M3 10a.75.75 0 01.75-.75h10.638L10.23 5.29a.75.75 0 111.04-1.08l5.5 5.25a.75.75 0 010 1.08l-5.5 5.25a.75.75 0 11-1.04-1.08l4.158-3.96H3.75A.75.75 0 013 10z" clip-rule="evenodd" />
                    </svg>
                </button>

                <a href="#trek-discovery" class="btn-eath btn-outline-white btn-lg shadow-sm text-white">
                    <span class="text-white">Find My Trek</span>
                    <svg class="h-4 w-4 ml-1 text-white" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
                    </svg>
                </a>
            </div>

            {{-- Absorbed Trust Badges from legacy Taglines --}}
            <div class="mt-10 pt-6 border-t border-white/15 flex flex-wrap items-center gap-y-2 gap-x-6 text-xs text-slate-300 font-medium">
                <span class="inline-flex items-center gap-1.5">
                    <svg class="h-4 w-4 text-emerald-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z" clip-rule="evenodd" />
                    </svg>
                    Licensed Nepal Operator
                </span>
                <span class="inline-flex items-center gap-1.5">
                    <svg class="h-4 w-4 text-emerald-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z" clip-rule="evenodd" />
                    </svg>
                    Daily Altitude Briefings
                </span>
                <span class="inline-flex items-center gap-1.5">
                    <svg class="h-4 w-4 text-emerald-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z" clip-rule="evenodd" />
                    </svg>
                    24/7 Helicopter Rescue Readiness
                </span>
            </div>
        </div>
    </div>
</section>
