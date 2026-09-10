@extends('website.layout.master')
@section('content')

    <section class="relative h-[70vh] min-h-[520px] overflow-hidden bg-slate-950 text-white">
        <div class="absolute inset-0">
            <div class="h-full w-full bg-cover bg-center"
                style="background-image: url('https://cdn.eathways.com/gallery/2025/08/untitled-design-2.png');">
            </div>
            <div class="absolute inset-0 bg-gradient-to-b from-slate-950/20 via-slate-900/50 to-slate-950/60"></div>
        </div>
    </section>

    @php
        $destinationGroups = $packages
            ->filter(fn($pkg) => $pkg->destination)
            ->groupBy(fn($pkg) => $pkg->destination?->slug ?? $pkg->destination?->id);
    @endphp

    <section class="bg-white">
        <div class="max-w-7xl mx-auto px-2 sm:px-3 lg:px-4 py-12">
            <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
                <div>
                    <p class="text-sm font-semibold text-sky-600 uppercase tracking-wide">Treks</p>
                    <h2 class="text-3xl font-semibold text-slate-900 mt-2">Explore by Destination</h2>
                    <p class="text-slate-600 mt-1">Search and browse treks grouped by their destinations.</p>
                </div>
                <div class="w-full sm:w-80">
                    <label class="sr-only" for="trek-search">Search treks</label>
                    <div class="relative">
                        <input id="trek-search" type="search" placeholder="Search trek name..."
                            class="w-full rounded-md border border-slate-200 bg-white px-3 py-2 text-sm shadow-sm focus:border-sky-500 focus:ring-1 focus:ring-sky-500" />
                        <span class="pointer-events-none absolute right-3 top-2.5 text-slate-400">
                            <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="11" cy="11" r="7" />
                                <path d="m21 21-4.35-4.35" />
                            </svg>
                        </span>
                    </div>
                </div>
            </div>

            <div class="mt-8">
                <div class="flex flex-wrap gap-2" role="tablist">
                    @foreach ($destinationGroups as $slug => $treks)
                        @php $first = $loop->first; $destination = $treks->first()->destination; @endphp
                        <button type="button"
                            class="tab-button rounded-full border px-4 py-2 text-sm font-medium transition {{ $first ? 'bg-sky-600 text-white border-sky-600' : 'bg-white text-slate-700 border-slate-200 hover:border-sky-500' }}"
                            data-tab-target="tab-{{ $slug }}" role="tab" aria-selected="{{ $first ? 'true' : 'false' }}">
                            {{ $destination?->name ?? 'Destination' }}
                        </button>
                    @endforeach
                </div>

                <div class="mt-6">
                    @foreach ($destinationGroups as $slug => $treks)
                        @php $first = $loop->first; @endphp
                        <div id="tab-{{ $slug }}" class="tab-panel {{ $first ? '' : 'hidden' }}" role="tabpanel">
                            <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
                                @foreach ($treks as $package)
                                     @include('website.components.trek-card', ['package' => $package])
                                @endforeach
                            </div>

                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <script>
        (function() {
            const buttons = document.querySelectorAll('.tab-button');
            const panels = document.querySelectorAll('.tab-panel');
            const searchInput = document.getElementById('trek-search');
            const defaultTabId = buttons[0]?.dataset.tabTarget;

            const showPanel = (id) => {
                panels.forEach(panel => panel.classList.add('hidden'));
                buttons.forEach(btn => {
                    const active = btn.dataset.tabTarget === id;
                    btn.classList.toggle('bg-sky-600', active);
                    btn.classList.toggle('text-white', active);
                    btn.classList.toggle('border-sky-600', active);
                    btn.classList.toggle('bg-white', !active);
                    btn.classList.toggle('text-slate-700', !active);
                    btn.classList.toggle('border-slate-200', !active);
                });
                document.getElementById(id)?.classList.remove('hidden');
            };

            buttons.forEach(btn => {
                btn.addEventListener('click', () => {
                    showPanel(btn.dataset.tabTarget);
                    applySearch();
                });
            });

            const applySearch = () => {
                const term = (searchInput?.value || '').toLowerCase().trim();
                let targetPanelId = null;

                // Pass 1: compute matches per panel to decide target tab when searching
                panels.forEach(panel => {
                    const cards = panel.querySelectorAll('.trek-card');
                    let count = 0;
                    cards.forEach(card => {
                        const matches = card.dataset.trekName.includes(term);
                        if (matches) count++;
                    });
                    panel.dataset.matchCount = count;
                    if (term && !targetPanelId && count > 0) {
                        targetPanelId = panel.id;
                    }
                });

                const currentPanel = Array.from(panels).find(p => !p.classList.contains('hidden'));
                const shouldSwitch = term && targetPanelId && currentPanel?.id !== targetPanelId;
                const activePanel = shouldSwitch ? document.getElementById(targetPanelId) : currentPanel;

                if (shouldSwitch && activePanel) {
                    showPanel(activePanel.id);
                } else if (!term && defaultTabId && currentPanel?.id !== defaultTabId) {
                    showPanel(defaultTabId);
                }

                if (!activePanel) return;

                const cards = activePanel.querySelectorAll('.trek-card');
                let visibleCount = 0;
                cards.forEach(card => {
                    const matches = card.dataset.trekName.includes(term);
                    card.classList.toggle('hidden', !matches);
                    if (matches || !term) visibleCount++;
                });
                const noResults = activePanel.querySelector('.no-results');
                if (noResults) noResults.classList.toggle('hidden', visibleCount !== 0);
            };

            if (searchInput) {
                searchInput.addEventListener('input', applySearch);
            }

            applySearch();
        })();
    </script>
@endsection
