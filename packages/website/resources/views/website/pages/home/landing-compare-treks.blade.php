<section class="section-eath bg-warm border-b border-stone-200/80" aria-labelledby="compare-treks-title">
    <div class="content-container">
        {{-- Section Heading --}}
        <div class="flex flex-col md:flex-row md:items-end md:justify-between gap-4 mb-8 sm:mb-10">
            <div>
                <span class="eyebrow-label text-accent font-semibold tracking-wider uppercase text-xs">Route Decision Matrix</span>
                <h2 id="compare-treks-title" class="font-display text-2xl sm:text-3xl lg:text-4xl font-semibold text-stone-900 mt-1">
                    Compare Nepal's Classic Treks
                </h2>
                <p class="text-stone-600 text-sm sm:text-base mt-2 max-w-2xl">
                    Weighing Everest Base Camp against Annapurna or Manaslu? Compare key metrics side-by-side to choose the route best suited to your fitness, comfort, and mountain goals.
                </p>
            </div>
            <div class="flex-shrink-0">
                <button type="button" class="btn-eath btn-ghost text-primary text-sm font-semibold hover:underline inline-flex items-center gap-1.5 btnOpenInquiry">
                    <span>Discuss with an Expert</span>
                    <svg class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M3 10a.75.75 0 01.75-.75h10.638L10.23 5.29a.75.75 0 111.04-1.08l5.5 5.25a.75.75 0 010 1.08l-5.5 5.25a.75.75 0 11-1.04-1.08l4.158-3.96H3.75A.75.75 0 013 10z" clip-rule="evenodd" />
                    </svg>
                </button>
            </div>
        </div>

        {{-- Side-by-Side Comparison Container with Horizontal Scroll on Small Screens --}}
        <div class="card-eath bg-surface border border-stone-200 shadow-sm overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse min-w-[680px]">
                    <thead>
                        <tr class="bg-stone-100 border-b border-stone-200">
                            <th scope="col" class="py-4 px-5 text-xs font-semibold uppercase tracking-wider text-stone-600 w-1/4">
                                Metric / Feature
                            </th>
                            <th scope="col" class="py-4 px-5 w-1/4 border-l border-stone-200">
                                <span class="badge-pill bg-emerald-100 text-emerald-800 text-[0.65rem] font-semibold mb-1">Most Iconic</span>
                                <p class="font-display font-semibold text-base sm:text-lg text-stone-900 leading-tight">
                                    Everest Base Camp
                                </p>
                                <span class="text-xs text-stone-500 font-normal">Khumbu Region</span>
                            </th>
                            <th scope="col" class="py-4 px-5 w-1/4 border-l border-stone-200">
                                <span class="badge-pill bg-sky-100 text-sky-800 text-[0.65rem] font-semibold mb-1">Scenic Variety</span>
                                <p class="font-display font-semibold text-base sm:text-lg text-stone-900 leading-tight">
                                    Annapurna Circuit
                                </p>
                                <span class="text-xs text-stone-500 font-normal">Annapurna / Mustang</span>
                            </th>
                            <th scope="col" class="py-4 px-5 w-1/4 border-l border-stone-200">
                                <span class="badge-pill bg-amber-100 text-amber-800 text-[0.65rem] font-semibold mb-1">Wilderness &amp; Culture</span>
                                <p class="font-display font-semibold text-base sm:text-lg text-stone-900 leading-tight">
                                    Manaslu Circuit
                                </p>
                                <span class="text-xs text-stone-500 font-normal">Manaslu / Gorkha</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-stone-200 text-sm">
                        {{-- Row 1: Duration --}}
                        <tr class="hover:bg-stone-50/50">
                            <th scope="row" class="py-3.5 px-5 font-medium text-stone-900 text-xs uppercase tracking-wider">
                                Duration
                            </th>
                            <td class="py-3.5 px-5 text-stone-700 border-l border-stone-200">
                                <span class="font-semibold text-stone-900">15 Days</span>
                                <span class="text-xs text-stone-500 block">Kathmandu to Kathmandu</span>
                            </td>
                            <td class="py-3.5 px-5 text-stone-700 border-l border-stone-200">
                                <span class="font-semibold text-stone-900">14 Days</span>
                                <span class="text-xs text-stone-500 block">Pokhara / Besisahar start</span>
                            </td>
                            <td class="py-3.5 px-5 text-stone-700 border-l border-stone-200">
                                <span class="font-semibold text-stone-900">14 Days</span>
                                <span class="text-xs text-stone-500 block">Machha Khola start</span>
                            </td>
                        </tr>

                        {{-- Row 2: Max Altitude --}}
                        <tr class="hover:bg-stone-50/50">
                            <th scope="row" class="py-3.5 px-5 font-medium text-stone-900 text-xs uppercase tracking-wider">
                                Max Altitude
                            </th>
                            <td class="py-3.5 px-5 text-stone-700 border-l border-stone-200">
                                <span class="font-semibold text-stone-900">5,545 m</span>
                                <span class="text-xs text-stone-500 block">Kala Patthar viewpoint</span>
                            </td>
                            <td class="py-3.5 px-5 text-stone-700 border-l border-stone-200">
                                <span class="font-semibold text-stone-900">5,416 m</span>
                                <span class="text-xs text-stone-500 block">Thorong La Pass</span>
                            </td>
                            <td class="py-3.5 px-5 text-stone-700 border-l border-stone-200">
                                <span class="font-semibold text-stone-900">5,160 m</span>
                                <span class="text-xs text-stone-500 block">Larkya La Pass</span>
                            </td>
                        </tr>

                        {{-- Row 3: Physical Difficulty --}}
                        <tr class="hover:bg-stone-50/50">
                            <th scope="row" class="py-3.5 px-5 font-medium text-stone-900 text-xs uppercase tracking-wider">
                                Difficulty Grade
                            </th>
                            <td class="py-3.5 px-5 text-stone-700 border-l border-stone-200">
                                <span class="inline-flex items-center gap-1.5 text-xs font-semibold text-amber-800 bg-amber-50 px-2 py-0.5 rounded">
                                    Strenuous
                                </span>
                                <span class="text-xs text-stone-500 block mt-1">Sustained high elevation</span>
                            </td>
                            <td class="py-3.5 px-5 text-stone-700 border-l border-stone-200">
                                <span class="inline-flex items-center gap-1.5 text-xs font-semibold text-emerald-800 bg-emerald-50 px-2 py-0.5 rounded">
                                    Challenging
                                </span>
                                <span class="text-xs text-stone-500 block mt-1">Long pass day, gradual climb</span>
                            </td>
                            <td class="py-3.5 px-5 text-stone-700 border-l border-stone-200">
                                <span class="inline-flex items-center gap-1.5 text-xs font-semibold text-amber-800 bg-amber-50 px-2 py-0.5 rounded">
                                    Demanding
                                </span>
                                <span class="text-xs text-stone-500 block mt-1">Rugged terrain &amp; altitude</span>
                            </td>
                        </tr>

                        {{-- Row 4: Accommodation --}}
                        <tr class="hover:bg-stone-50/50">
                            <th scope="row" class="py-3.5 px-5 font-medium text-stone-900 text-xs uppercase tracking-wider">
                                Accommodation
                            </th>
                            <td class="py-3.5 px-5 text-stone-700 border-l border-stone-200 text-xs">
                                Established Sherpa teahouses &amp; lodges with bakery amenities
                            </td>
                            <td class="py-3.5 px-5 text-stone-700 border-l border-stone-200 text-xs">
                                Comfortable teahouses with heated dining rooms
                            </td>
                            <td class="py-3.5 px-5 text-stone-700 border-l border-stone-200 text-xs">
                                Authentic, rustic village teahouses with Tibetan hospitality
                            </td>
                        </tr>

                        {{-- Row 5: Permit Rules --}}
                        <tr class="hover:bg-stone-50/50">
                            <th scope="row" class="py-3.5 px-5 font-medium text-stone-900 text-xs uppercase tracking-wider">
                                Permits &amp; Regulations
                            </th>
                            <td class="py-3.5 px-5 text-stone-700 border-l border-stone-200 text-xs">
                                Sagarmatha National Park + Pasang Lhamu Entry
                            </td>
                            <td class="py-3.5 px-5 text-stone-700 border-l border-stone-200 text-xs">
                                ACAP Permit + TIMS Card
                            </td>
                            <td class="py-3.5 px-5 text-stone-700 border-l border-stone-200 text-xs">
                                <strong class="text-stone-900 font-semibold">Special Restricted Permit:</strong> min 2 trekkers + licensed guide mandatory
                            </td>
                        </tr>

                        {{-- Row 6: Starting Price --}}
                        <tr class="hover:bg-stone-50/50 bg-stone-50/30">
                            <th scope="row" class="py-3.5 px-5 font-medium text-stone-900 text-xs uppercase tracking-wider">
                                Starting Price
                            </th>
                            <td class="py-3.5 px-5 text-stone-900 border-l border-stone-200">
                                <span class="font-display font-semibold text-lg text-primary">$1,615</span>
                                <span class="text-xs text-stone-500 font-normal">USD / person</span>
                            </td>
                            <td class="py-3.5 px-5 text-stone-900 border-l border-stone-200">
                                <span class="font-display font-semibold text-lg text-primary">$1,100</span>
                                <span class="text-xs text-stone-500 font-normal">USD / person</span>
                            </td>
                            <td class="py-3.5 px-5 text-stone-900 border-l border-stone-200">
                                <span class="font-display font-semibold text-lg text-primary">$1,230</span>
                                <span class="text-xs text-stone-500 font-normal">USD / person</span>
                            </td>
                        </tr>

                        {{-- Row 7: Action Links --}}
                        <tr class="bg-stone-50/80">
                            <th scope="row" class="py-4 px-5 text-xs text-stone-500">
                                Action
                            </th>
                            <td class="py-4 px-5 border-l border-stone-200">
                                <a href="{{ route('trek.show', ['destination' => 'everest', 'slug' => 'journey-to-everest-base-camp-a-comprehensive-15-day-itinerary']) }}"
                                   class="btn-eath btn-primary btn-sm w-full justify-center text-xs font-semibold">
                                    <span>Everest Itinerary</span>
                                </a>
                            </td>
                            <td class="py-4 px-5 border-l border-stone-200">
                                <a href="{{ route('trek.show', ['destination' => 'annapurna', 'slug' => 'the-annapurna-circuit-trek-an-epic-14-day-himalayan-odyssey']) }}"
                                   class="btn-eath btn-secondary btn-sm w-full justify-center text-xs font-semibold">
                                    <span>Annapurna Itinerary</span>
                                </a>
                            </td>
                            <td class="py-4 px-5 border-l border-stone-200">
                                <a href="{{ route('trek.show', ['destination' => 'manaslu', 'slug' => 'manaslu-circuit-trek-a-journey-through-untouched-himalayan-beauty-and-culture']) }}"
                                   class="btn-eath btn-secondary btn-sm w-full justify-center text-xs font-semibold">
                                    <span>Manaslu Itinerary</span>
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            {{-- Mobile Scroll Hint --}}
            <div class="sm:hidden px-4 py-2 bg-stone-100 text-stone-500 text-[0.7rem] text-center border-t border-stone-200 flex items-center justify-center gap-1">
                <span>&larr; Scroll horizontally to compare all routes &rarr;</span>
            </div>
        </div>
    </div>
</section>
