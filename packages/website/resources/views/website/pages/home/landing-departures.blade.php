<section id="fixed-departures" class="section-eath bg-warm border-b border-stone-200/80" aria-labelledby="departures-heading">
    <div class="content-container">
        {{-- Section Header --}}
        <div class="flex flex-col md:flex-row md:items-end md:justify-between gap-4 mb-8">
            <div>
                <span class="eyebrow-label text-accent font-semibold tracking-wider uppercase text-xs">Small Group Expeditions</span>
                <h2 id="departures-heading" class="font-display text-2xl sm:text-3xl lg:text-4xl font-semibold text-stone-900 mt-1">
                    Upcoming Fixed Departures
                </h2>
                <p class="text-stone-600 text-sm sm:text-base mt-2 max-w-2xl">
                    Join like-minded global trekkers on scheduled small-group itineraries with guaranteed departures and verified altitude pacing.
                </p>
            </div>

            <div class="flex items-center gap-3">
                <a href="{{ route('trek.list') }}" class="btn-eath btn-ghost text-primary text-sm font-semibold hover:underline inline-flex items-center gap-1.5">
                    <span>View All Routes</span>
                    <svg class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M3 10a.75.75 0 01.75-.75h10.638L10.23 5.29a.75.75 0 111.04-1.08l5.5 5.25a.75.75 0 010 1.08l-5.5 5.25a.75.75 0 11-1.04-1.08l4.158-3.96H3.75A.75.75 0 013 10z" clip-rule="evenodd" />
                    </svg>
                </a>
            </div>
        </div>

        {{-- Departures Table Card --}}
        <div class="card-eath bg-surface overflow-hidden border border-stone-200 shadow-sm">
            <div class="p-4 sm:p-5 bg-stone-50 border-b border-stone-200 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-2">
                <div class="flex items-center gap-2.5">
                    <span class="inline-block w-2.5 h-2.5 rounded-full bg-emerald-500 animate-pulse" aria-hidden="true"></span>
                    <span class="text-xs sm:text-sm font-medium text-stone-800">Confirmed Small Group Schedules · Max 10 Trekkers</span>
                </div>
                <span class="badge-pill bg-emerald-100 text-emerald-800 text-xs font-semibold self-start sm:self-auto">
                    Guaranteed Pacing
                </span>
            </div>

            {{-- Table Header Desktop --}}
            <div class="hidden sm:grid sm:grid-cols-[1.8fr_1fr_1fr_auto] gap-4 px-5 py-3 bg-stone-100 text-xs font-semibold uppercase tracking-wider text-stone-600 border-b border-stone-200">
                <span>Trek / Expedition</span>
                <span>Duration</span>
                <span>Starting Rate</span>
                <span class="text-right">Action</span>
            </div>

            {{-- Departures Rows --}}
            <div class="divide-y divide-stone-200">
                @foreach ($departures as $item)
                    <div class="p-4 sm:px-5 sm:py-4 grid grid-cols-1 sm:grid-cols-[1.8fr_1fr_1fr_auto] gap-3 sm:gap-4 items-center hover:bg-stone-50/70 transition">
                        <div>
                            <span class="text-[0.7rem] uppercase tracking-wider text-stone-400 font-semibold sm:hidden block mb-0.5">Trek</span>
                            <a href="{{ route('trek.show', ['destination' => $item['destination_slug'] ?? 'nepal', 'slug' => $item['package_slug']]) }}"
                               class="font-display font-medium text-base text-stone-900 hover:text-primary hover:underline">
                                {{ $item['package_name'] }}
                            </a>
                        </div>

                        <div>
                            <span class="text-[0.7rem] uppercase tracking-wider text-stone-400 font-semibold sm:hidden block mb-0.5">Duration</span>
                            <span class="text-xs sm:text-sm text-stone-700">
                                {{ $item['days'] }} Days
                                @if(isset($item['nights']) && $item['nights'] > 0)
                                    / {{ $item['nights'] }} Nights
                                @endif
                            </span>
                        </div>

                        <div>
                            <span class="text-[0.7rem] uppercase tracking-wider text-stone-400 font-semibold sm:hidden block mb-0.5">Price</span>
                            <span class="text-sm font-semibold text-primary">
                                ${{ number_format((float) ($item['cost'] ?? 0)) }}
                            </span>
                            <span class="text-xs text-stone-400">/ person</span>
                        </div>

                        <div class="flex sm:justify-end">
                            <a href="{{ route('trek.show', ['destination' => $item['destination_slug'] ?? 'nepal', 'slug' => $item['package_slug']]) }}"
                               class="btn-eath btn-primary btn-sm inline-flex items-center gap-1">
                                <span>Join This Group</span>
                                <svg class="h-3.5 w-3.5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M3 10a.75.75 0 01.75-.75h10.638L10.23 5.29a.75.75 0 111.04-1.08l5.5 5.25a.75.75 0 010 1.08l-5.5 5.25a.75.75 0 11-1.04-1.08l4.158-3.96H3.75A.75.75 0 013 10z" clip-rule="evenodd" />
                                </svg>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        {{-- Disclaimers & Custom Private Dates Link --}}
        <div class="mt-4 flex flex-wrap items-center justify-between gap-3 text-xs text-stone-500">
            <span>Guaranteed departures with certified Sherpa mountain leads · Transparent inclusive pricing</span>
            <button type="button" class="btnOpenInquiry text-primary font-medium hover:underline inline-flex items-center gap-1">
                Prefer private bespoke dates? Customize your journey &rarr;
            </button>
        </div>
    </div>
</section>
