<section class="section-eath bg-warm border-b border-stone-200/80" aria-labelledby="featured-treks-title">
    <div class="content-container">
        {{-- Section Header --}}
        <div class="flex flex-col md:flex-row md:items-end md:justify-between gap-4 mb-8 sm:mb-10">
            <div>
                <span class="eyebrow-label text-accent font-semibold tracking-wider uppercase text-xs">Handpicked Expeditions</span>
                <h2 id="featured-treks-title" class="font-display text-2xl sm:text-3xl lg:text-4xl font-semibold text-stone-900 mt-1">
                    Featured Himalayan Treks
                </h2>
                <p class="text-stone-600 text-sm sm:text-base mt-2 max-w-2xl">
                    Carefully paced itineraries across Nepal's premier trekking circuits, engineered with verified altitude acclimatization.
                </p>
            </div>

            <div class="flex items-center gap-3">
                <a href="{{ route('trek.list') }}" class="btn-eath btn-ghost text-primary text-sm font-semibold hover:underline inline-flex items-center gap-1.5">
                    <span>Explore All Himalayan Treks</span>
                    <svg class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M3 10a.75.75 0 01.75-.75h10.638L10.23 5.29a.75.75 0 111.04-1.08l5.5 5.25a.75.75 0 010 1.08l-5.5 5.25a.75.75 0 11-1.04-1.08l4.158-3.96H3.75A.75.75 0 013 10z" clip-rule="evenodd" />
                    </svg>
                </a>
            </div>
        </div>

        {{-- Interactive Tab Filter (Featured vs Fixed Departures) --}}
        @if(isset($departures) && count($departures) > 0)
            <div class="flex items-center gap-4 mb-8 border-b border-stone-200 overflow-x-auto whitespace-nowrap pb-0.5" role="tablist" aria-label="Trek viewing modes">
                <button type="button" role="tab" id="tab-featured" aria-selected="true" aria-controls="panel-featured"
                        class="tab-toggle-btn pb-3 px-1 text-sm font-semibold text-primary border-b-2 border-primary transition flex items-center gap-2">
                    <span>Featured Itineraries</span>
                    <span class="badge-pill bg-stone-200/80 text-stone-700 text-[0.65rem] px-2 py-0.5">{{ count($packages ?? []) }}</span>
                </button>
                <button type="button" role="tab" id="tab-departures" aria-selected="false" aria-controls="panel-departures" tabindex="-1"
                        class="tab-toggle-btn pb-3 px-1 text-sm font-medium text-stone-500 border-b-2 border-transparent hover:text-stone-800 transition flex items-center gap-2">
                    <span>Upcoming Fixed Departures</span>
                    <span class="badge-pill bg-emerald-100 text-emerald-800 text-[0.65rem] px-2 py-0.5 font-semibold">{{ count($departures) }}</span>
                </button>
            </div>
        @endif

        {{-- Panel 1: Featured Treks Grid --}}
        <div id="panel-featured" role="tabpanel" aria-labelledby="tab-featured">
            @if(isset($packages) && count($packages) > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 sm:gap-8">
                    @foreach ($packages as $package)
                        @include('website.components.trek-card', ['package' => $package])
                    @endforeach
                </div>
            @else
                <div class="card-eath bg-surface p-8 text-center">
                    <p class="text-stone-600 text-sm">No featured treks are currently available.</p>
                </div>
            @endif
        </div>

        {{-- Panel 2: Fixed Departures Table (Preserved from legacy landing-departures) --}}
        @if(isset($departures) && count($departures) > 0)
            <div id="panel-departures" role="tabpanel" aria-labelledby="tab-departures" class="hidden">
                <div class="card-eath bg-surface overflow-hidden border border-stone-200 shadow-sm">
                    <div class="p-4 sm:p-5 bg-stone-50 border-b border-stone-200 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-2">
                        <div>
                            <h3 class="font-display font-semibold text-base sm:text-lg text-stone-900">Guaranteed Small-Group Departures</h3>
                            <p class="text-xs sm:text-sm text-stone-600 mt-0.5">Join like-minded global trekkers with guaranteed departures and fixed pricing.</p>
                        </div>
                        <span class="badge-pill bg-emerald-100 text-emerald-800 text-xs font-semibold self-start sm:self-auto">
                            Max 10 Trekkers Per Group
                        </span>
                    </div>

                    {{-- Table Header Desktop --}}
                    <div class="hidden sm:grid sm:grid-cols-[1.8fr_1fr_1fr_auto] gap-4 px-5 py-3 bg-stone-100 text-xs font-semibold uppercase tracking-wider text-stone-600 border-b border-stone-200">
                        <span>Trek / Expedition</span>
                        <span>Duration</span>
                        <span>Starting Price</span>
                        <span class="text-right">Action</span>
                    </div>

                    {{-- Departures Rows --}}
                    <div class="divide-y divide-stone-200">
                        @foreach ($departures as $item)
                            <div class="p-4 sm:px-5 sm:py-3.5 grid grid-cols-1 sm:grid-cols-[1.8fr_1fr_1fr_auto] gap-3 sm:gap-4 items-center hover:bg-stone-50/60 transition">
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
                                    <span class="text-sm font-semibold text-stone-900">
                                        ${{ number_format((float)($item['cost'] ?? 0)) }} <span class="text-xs font-normal text-stone-500">USD</span>
                                    </span>
                                </div>

                                <div class="flex sm:justify-end pt-2 sm:pt-0">
                                    <a href="{{ route('trek.show', ['destination' => $item['destination_slug'] ?? 'nepal', 'slug' => $item['package_slug']]) }}"
                                       class="btn-eath btn-primary btn-sm whitespace-nowrap text-xs font-semibold">
                                        <span>Join This Group</span>
                                        <svg class="h-3.5 w-3.5 ml-1" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M3 10a.75.75 0 01.75-.75h10.638L10.23 5.29a.75.75 0 111.04-1.08l5.5 5.25a.75.75 0 010 1.08l-5.5 5.25a.75.75 0 11-1.04-1.08l4.158-3.96H3.75A.75.75 0 013 10z" clip-rule="evenodd" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endif
    </div>
</section>

{{-- Scoped Tabs Toggle Script --}}
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const tabFeatured = document.getElementById('tab-featured');
        const tabDepartures = document.getElementById('tab-departures');
        const panelFeatured = document.getElementById('panel-featured');
        const panelDepartures = document.getElementById('panel-departures');

        if (!tabFeatured || !tabDepartures || !panelFeatured || !panelDepartures) return;

        function selectTab(selectedTab, activePanel, otherTab, hiddenPanel) {
            selectedTab.setAttribute('aria-selected', 'true');
            selectedTab.removeAttribute('tabindex');
            selectedTab.classList.remove('text-stone-500', 'border-transparent');
            selectedTab.classList.add('text-primary', 'border-primary');

            otherTab.setAttribute('aria-selected', 'false');
            otherTab.setAttribute('tabindex', '-1');
            otherTab.classList.remove('text-primary', 'border-primary');
            otherTab.classList.add('text-stone-500', 'border-transparent');

            activePanel.classList.remove('hidden');
            hiddenPanel.classList.add('hidden');
        }

        tabFeatured.addEventListener('click', () => selectTab(tabFeatured, panelFeatured, tabDepartures, panelDepartures));
        tabDepartures.addEventListener('click', () => selectTab(tabDepartures, panelDepartures, tabFeatured, panelFeatured));
    });
</script>
