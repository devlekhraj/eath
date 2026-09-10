<section id="trek-discovery" class="section-eath bg-warm border-b border-stone-200/80" aria-labelledby="search-section-title">
    <div class="content-container">
        {{-- Section Heading --}}
        <div class="flex flex-col md:flex-row md:items-end md:justify-between gap-4 mb-8">
            <div>
                <span class="eyebrow-label text-accent font-semibold tracking-wider uppercase text-xs">Find Your Himalayan Journey</span>
                <h2 id="search-section-title" class="font-display text-2xl sm:text-3xl lg:text-4xl font-semibold text-stone-900 mt-1">
                    Search Treks by Region &amp; Duration
                </h2>
                <p class="text-stone-600 text-sm sm:text-base mt-2 max-w-2xl">
                    Discover handpicked routes across Nepal's iconic ranges. Filter by geography, trip length, or specific high-altitude trails.
                </p>
            </div>
            <div class="flex-shrink-0">
                <a href="{{ route('trek.list') }}" class="btn-eath btn-ghost text-primary text-sm font-semibold hover:underline inline-flex items-center gap-1.5">
                    <span>Explore All Treks</span>
                    <svg class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M3 10a.75.75 0 01.75-.75h10.638L10.23 5.29a.75.75 0 111.04-1.08l5.5 5.25a.75.75 0 010 1.08l-5.5 5.25a.75.75 0 11-1.04-1.08l4.158-3.96H3.75A.75.75 0 013 10z" clip-rule="evenodd" />
                    </svg>
                </a>
            </div>
        </div>

        {{-- Functional Search Form Bar --}}
        <div class="card-eath bg-surface p-5 sm:p-6 shadow-sm border border-stone-200">
            <form id="trek-search-form" method="GET" action="{{ route('home') }}" class="space-y-4">
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 items-end">
                    {{-- Region Selector --}}
                    <div>
                        <label for="trek-region" class="block text-xs font-semibold uppercase tracking-wider text-stone-700 mb-1.5">
                            Destination / Region
                        </label>
                        <select id="trek-region" name="region" class="input-eath cursor-pointer">
                            <option value="" {{ request('region') == '' ? 'selected' : '' }}>All Himalayan Regions</option>
                            @if(isset($destinations) && count($destinations) > 0)
                                @foreach(collect($destinations)->sortBy('name') as $dest)
                                    <option value="{{ $dest->slug ?? $dest['slug'] }}" {{ request('region') == ($dest->slug ?? $dest['slug']) ? 'selected' : '' }}>
                                        {{ $dest->name ?? $dest['name'] }}
                                    </option>
                                @endforeach
                            @else
                                <option value="everest" {{ request('region') == 'everest' ? 'selected' : '' }}>Everest Region</option>
                                <option value="annapurna" {{ request('region') == 'annapurna' ? 'selected' : '' }}>Annapurna Region</option>
                                <option value="manaslu" {{ request('region') == 'manaslu' ? 'selected' : '' }}>Manaslu Region</option>
                                <option value="langtang" {{ request('region') == 'langtang' ? 'selected' : '' }}>Langtang Region</option>
                                <option value="mustang" {{ request('region') == 'mustang' ? 'selected' : '' }}>Mustang Region</option>
                            @endif
                        </select>
                    </div>

                    {{-- Duration Selector --}}
                    <div>
                        <label for="trek-duration" class="block text-xs font-semibold uppercase tracking-wider text-stone-700 mb-1.5">
                            Duration
                        </label>
                        <select id="trek-duration" name="duration" class="input-eath cursor-pointer">
                            <option value="" {{ request('duration') == '' ? 'selected' : '' }}>Any Trip Length</option>
                            <option value="short" {{ request('duration') == 'short' ? 'selected' : '' }}>Short (6–10 Days)</option>
                            <option value="medium" {{ request('duration') == 'medium' ? 'selected' : '' }}>Classic (11–14 Days)</option>
                            <option value="long" {{ request('duration') == 'long' ? 'selected' : '' }}>Expedition (15+ Days)</option>
                        </select>
                    </div>

                    {{-- Keyword Input --}}
                    <div>
                        <label for="trek-search-input" class="block text-xs font-semibold uppercase tracking-wider text-stone-700 mb-1.5">
                            Trek Name or Trail
                        </label>
                        <input id="trek-search-input" name="q" type="text" value="{{ request('q') }}"
                                placeholder="e.g. Everest Base Camp, Circuit"
                                class="input-eath" />
                    </div>

                    {{-- Action Button --}}
                    <div>
                        <button type="submit" id="trek-search-btn" class="btn-eath btn-primary w-full h-[46px] justify-center text-sm font-semibold">
                            <svg id="trek-search-icon" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-4.35-4.35m0 0A7.5 7.5 0 104.5 4.5a7.5 7.5 0 0012.15 12.15z" />
                            </svg>
                            <svg id="trek-search-spinner" class="h-4 w-4 mr-2 animate-spin hidden" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" aria-hidden="true">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v4a4 4 0 00-4 4H4z"></path>
                            </svg>
                            <span>Search Treks</span>
                        </button>
                    </div>
                </div>
            </form>
        </div>

        {{-- Dynamic Search Results Area --}}
        <div class="mt-8">
            <div id="trek-results" aria-live="polite">
                @php
                    $websiteTreks = collect([
                        (object)[
                            'name' => 'Everest Base Camp & Kala Patthar',
                            'slug' => 'everest-base-camp-trek',
                            'destination_name' => 'Everest Region',
                            'destination_slug' => 'everest',
                            'duration_days' => 15,
                            'duration_nights' => 14,
                            'price' => 1250,
                            'departure' => 'Daily / Flexible',
                            'difficulty' => 'Challenging',
                            'altitude' => '5,545m',
                            'badge' => 'Iconic Route',
                        ],
                        (object)[
                            'name' => 'Annapurna Circuit & Thorong La Pass',
                            'slug' => 'annapurna-circuit-trek',
                            'destination_name' => 'Annapurna Region',
                            'destination_slug' => 'annapurna',
                            'duration_days' => 14,
                            'duration_nights' => 13,
                            'price' => 1150,
                            'departure' => 'Weekly Departures',
                            'difficulty' => 'Strenuous',
                            'altitude' => '5,416m',
                            'badge' => 'Classic Circuit',
                        ],
                        (object)[
                            'name' => 'Manaslu Circuit & Larke Pass',
                            'slug' => 'manaslu-circuit-trek',
                            'destination_name' => 'Manaslu Region',
                            'destination_slug' => 'manaslu',
                            'duration_days' => 16,
                            'duration_nights' => 15,
                            'price' => 1220,
                            'departure' => 'Fixed Groups',
                            'difficulty' => 'Strenuous',
                            'altitude' => '5,106m',
                            'badge' => 'Restricted Wilderness',
                        ],
                        (object)[
                            'name' => 'Mardi Himal Ridge Trek',
                            'slug' => 'mardi-himal-trek',
                            'destination_name' => 'Annapurna Region',
                            'destination_slug' => 'annapurna',
                            'duration_days' => 9,
                            'duration_nights' => 8,
                            'price' => 720,
                            'departure' => 'Weekly Departures',
                            'difficulty' => 'Moderate',
                            'altitude' => '4,500m',
                            'badge' => 'Scenic Ridge',
                        ],
                        (object)[
                            'name' => 'Gokyo Lakes & Cho La Pass',
                            'slug' => 'gokyo-lakes-cho-la-pass-trek',
                            'destination_name' => 'Everest Region',
                            'destination_slug' => 'everest',
                            'duration_days' => 16,
                            'duration_nights' => 15,
                            'price' => 1380,
                            'departure' => 'Weekly Departures',
                            'difficulty' => 'Challenging',
                            'altitude' => '5,420m',
                            'badge' => 'Glacial Lakes',
                        ],
                        (object)[
                            'name' => 'Langtang Valley & Kyanjin Gompa',
                            'slug' => 'langtang-valley-trek',
                            'destination_name' => 'Langtang Region',
                            'destination_slug' => 'langtang',
                            'duration_days' => 8,
                            'duration_nights' => 7,
                            'price' => 680,
                            'departure' => 'Daily / Flexible',
                            'difficulty' => 'Moderate',
                            'altitude' => '3,870m',
                            'badge' => 'Cultural Heritage',
                        ],
                    ]);

                    $dbRows = (isset($searchResults) && $searchResults->count() > 0)
                        ? $searchResults
                        : ((isset($hotPackages) && $hotPackages->count() > 0) ? $hotPackages : ((isset($packages) && $packages->count() > 0) ? $packages : collect()));

                    if ($dbRows->count() > 0) {
                        $displayRows = $dbRows;
                    } else {
                        // User instruction: "result list out with website data don't put empty"
                        $reqQ = strtolower(trim(request('q', '')));
                        $reqRegion = strtolower(trim(request('region', '')));
                        $reqDuration = trim(request('duration', ''));

                        $filteredWebsite = $websiteTreks->filter(function($trek) use ($reqQ, $reqRegion, $reqDuration) {
                            if ($reqQ && !str_contains(strtolower($trek->name), $reqQ) && !str_contains(strtolower($trek->destination_name), $reqQ)) {
                                return false;
                            }
                            if ($reqRegion && !str_contains(strtolower($trek->destination_slug), $reqRegion) && !str_contains(strtolower($trek->destination_name), $reqRegion)) {
                                return false;
                            }
                            if ($reqDuration === 'short' && ($trek->duration_days < 6 || $trek->duration_days > 10)) {
                                return false;
                            }
                            if ($reqDuration === 'medium' && ($trek->duration_days < 11 || $trek->duration_days > 14)) {
                                return false;
                            }
                            if ($reqDuration === 'long' && $trek->duration_days < 15) {
                                return false;
                            }
                            return true;
                        });

                        // Never put empty: show filtered or fall back to all websiteTreks
                        $displayRows = $filteredWebsite->count() > 0 ? $filteredWebsite : $websiteTreks;
                    }
                @endphp

                <div class="mb-4 flex items-center justify-between">
                    <p class="text-xs font-semibold uppercase tracking-widest text-stone-500">
                        @if(isset($searchResults) && $searchResults->count() > 0)
                            Found {{ $displayRows->count() }} Matching {{ \Illuminate\Support\Str::plural('Route', $displayRows->count()) }}
                        @elseif(request('q') || request('region') || request('duration'))
                            Filtered Himalayan Routes ({{ $displayRows->count() }})
                        @else
                            Featured High-Altitude Expeditions ({{ $displayRows->count() }})
                        @endif
                    </p>
                    <span class="text-xs text-stone-400 hidden sm:inline">Paced with Daily Acclimatization</span>
                </div>

                {{-- Desktop Table Header --}}
                <div class="hidden sm:grid sm:grid-cols-[1.8fr_1fr_1fr_1fr_auto] gap-4 px-4 py-3 bg-stone-100 rounded-t-lg border border-stone-200 text-xs font-semibold uppercase tracking-wider text-stone-600">
                    <span>Route / Trek</span>
                    <span>Region</span>
                    <span>Duration</span>
                    <span>From Price</span>
                    <span class="text-right">Itinerary</span>
                </div>

                {{-- Results List --}}
                <div class="divide-y divide-stone-200 bg-surface rounded-b-lg sm:rounded-b-lg border border-stone-200 sm:border-t-0 shadow-sm overflow-hidden">
                    @foreach ($displayRows as $item)
                        @php
                            $isDbModel = is_object($item) && isset($item->exists) && $item->exists;
                            $name = $item->name ?? '';
                            $slug = $item->slug ?? '';
                            $regionName = $item->destination->name ?? $item->destination_name ?? 'Nepal Himalayas';
                            $regionSlug = $item->destination->slug ?? $item->destination_slug ?? 'nepal';
                            $days = $item->duration_days ?? null;
                            $nights = $item->duration_nights ?? null;
                            $price = $item->price ?? $item->min_price ?? null;
                            $badge = $item->badge ?? ($days ? $days . ' Days' : null);
                        @endphp
                        <div class="p-4 sm:px-4 sm:py-3.5 grid grid-cols-1 sm:grid-cols-[1.8fr_1fr_1fr_1fr_auto] gap-3 sm:gap-4 items-center hover:bg-stone-50/80 transition">
                            {{-- Route Name --}}
                            <div>
                                <span class="text-[0.7rem] uppercase tracking-wider text-stone-400 font-semibold sm:hidden block mb-0.5">Route</span>
                                <div class="flex items-center gap-2">
                                    @if($isDbModel)
                                        <a href="{{ route('trek.show', ['destination' => $regionSlug, 'slug' => $slug]) }}"
                                           class="font-display font-medium text-base text-stone-900 hover:text-primary hover:underline">
                                            {{ $name }}
                                        </a>
                                    @else
                                        <button type="button"
                                                class="font-display font-medium text-base text-stone-900 hover:text-primary hover:underline text-left btnOpenInquiry"
                                                data-package-title="{{ $name }}">
                                            {{ $name }}
                                        </button>
                                    @endif
                                    @if(!empty($badge))
                                        <span class="hidden md:inline-block badge-pill bg-stone-100 text-stone-600 text-[0.65rem] px-2 py-0.5">
                                            {{ $badge }}
                                        </span>
                                    @endif
                                </div>
                            </div>

                            {{-- Region --}}
                            <div>
                                <span class="text-[0.7rem] uppercase tracking-wider text-stone-400 font-semibold sm:hidden block mb-0.5">Region</span>
                                <span class="inline-flex items-center text-xs font-medium text-stone-700">
                                    <svg class="h-3.5 w-3.5 mr-1 text-stone-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                    {{ $regionName }}
                                </span>
                            </div>

                            {{-- Duration --}}
                            <div>
                                <span class="text-[0.7rem] uppercase tracking-wider text-stone-400 font-semibold sm:hidden block mb-0.5">Duration</span>
                                <span class="text-xs text-stone-700">
                                    @if(!empty($days))
                                        {{ $days }} Days
                                        @if(!empty($nights))
                                            / {{ $nights }} Nights
                                        @endif
                                    @else
                                        Flexible
                                    @endif
                                </span>
                            </div>

                            {{-- Price --}}
                            <div>
                                <span class="text-[0.7rem] uppercase tracking-wider text-stone-400 font-semibold sm:hidden block mb-0.5">Price</span>
                                <span class="text-sm font-semibold text-stone-900">
                                    @if(!empty($price))
                                        ${{ number_format((float)$price) }} <span class="text-xs font-normal text-stone-500">USD</span>
                                    @else
                                        Inquire
                                    @endif
                                </span>
                            </div>

                            {{-- Action CTA --}}
                            <div class="flex justify-end pt-2 sm:pt-0">
                                @if($isDbModel)
                                    <a href="{{ route('trek.show', ['destination' => $regionSlug, 'slug' => $slug]) }}"
                                       class="btn-eath btn-secondary btn-sm whitespace-nowrap text-xs font-semibold">
                                        View Itinerary
                                    </a>
                                @else
                                    <button type="button"
                                            class="btn-eath btn-secondary btn-sm whitespace-nowrap text-xs font-semibold btnOpenInquiry"
                                            data-package-title="{{ $name }}">
                                        View Itinerary
                                    </button>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Scoped Progressive JavaScript for Live Search --}}
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const form = document.getElementById('trek-search-form');
        const results = document.getElementById('trek-results');
        const btn = document.getElementById('trek-search-btn');
        const icon = document.getElementById('trek-search-icon');
        const spinner = document.getElementById('trek-search-spinner');

        if (!form || !results) return;

        form.addEventListener('submit', async function (e) {
            e.preventDefault();
            const formData = new FormData(form);
            const params = new URLSearchParams(formData);
            const url = `${form.action}?${params.toString()}`;

            if (btn) btn.disabled = true;
            if (icon) icon.classList.add('hidden');
            if (spinner) spinner.classList.remove('hidden');

            try {
                const response = await fetch(url, {
                    headers: { 'X-Requested-With': 'XMLHttpRequest' }
                });
                const html = await response.text();
                const parser = new DOMParser();
                const doc = parser.parseFromString(html, 'text/html');
                const newResults = doc.getElementById('trek-results');

                if (newResults) {
                    results.innerHTML = newResults.innerHTML;
                    // Update browser history query parameters without full reload
                    window.history.replaceState({}, '', url);
                }
            } catch (err) {
                console.error('EATH trek search request failed:', err);
                form.submit(); // fallback to standard GET navigation
            } finally {
                if (btn) btn.disabled = false;
                if (icon) icon.classList.remove('hidden');
                if (spinner) spinner.classList.add('hidden');
            }
        });
    });
</script>
