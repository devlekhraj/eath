<section class="py-12 sm:py-16 bg-white">
    <div class="max-w-7xl mx-auto px-2 sm:px-3 lg:px-4">
        <div class="rounded-md  bg-white">
            <div class="flex flex-col gap-6 lg:flex-row lg:items-center lg:justify-between">
                <div>
                    <h2 class="mt-2 text-2xl sm:text-3xl font-semibold text-slate-900">Find your trek</h2>
                    <p class="mt-2 text-base text-slate-600">Search by region, duration, or difficulty.</p>
                </div>
                {{-- <form class="w-full max-w-2xl" id="trek-search-form" method="GET" action="{{ route('home') }}">
                    <div class="grid gap-3 sm:grid-cols-2 lg:grid-cols-[1.2fr_1fr_1fr_auto]">
                        <label class="sr-only" for="trek-search">Search treks</label>
                        <input id="trek-search" name="q" type="text" placeholder="Everest Base Camp"
                            value="{{ request('q') }}"
                            class="w-full rounded-md border border-slate-200 px-4 py-3 text-sm text-slate-900 focus:border-sky-500 focus:outline-none focus:ring-2 focus:ring-sky-200" />
                        <label class="sr-only" for="trek-region">Region</label>
                        <select id="trek-region" name="region"
                            class="w-full rounded-md border border-slate-200 bg-white px-4 py-3 text-sm text-slate-700 focus:border-sky-500 focus:outline-none focus:ring-2 focus:ring-sky-200">
                            <option value="" {{ request('region') == '' ? 'selected' : '' }}>All regions</option>
                            @foreach (collect($destinations ?? [])->sortBy('name') as $destination)
                                <option value="{{ $destination['slug'] }}"
                                    {{ request('region') == $destination['slug'] ? 'selected' : '' }}>
                                    {{ $destination['name'] }}
                                </option>
                            @endforeach
                        </select>
                        <label class="sr-only" for="trek-duration">Duration</label>
                        <select id="trek-duration" name="duration"
                            class="w-full rounded-md border border-slate-200 bg-white px-4 py-3 text-sm text-slate-700 focus:border-sky-500 focus:outline-none focus:ring-2 focus:ring-sky-200">
                            <option value="" {{ request('duration') == '' ? 'selected' : '' }}>Any duration
                            </option>
                            <option value="short" {{ request('duration') == 'short' ? 'selected' : '' }}>6–10 days
                            </option>
                            <option value="medium" {{ request('duration') == 'medium' ? 'selected' : '' }}>11–14 days
                            </option>
                            <option value="long" {{ request('duration') == 'long' ? 'selected' : '' }}>15+ days
                            </option>
                        </select>
                        <button type="submit" id="trek-search-btn"
                            class="inline-flex w-full items-center justify-center rounded-md bg-slate-900 px-5 py-3 text-sm font-semibold text-white transition hover:bg-slate-800 sm:col-span-2 lg:col-span-1">
                            <svg id="trek-search-icon" class="mr-2 h-5 w-5 text-white"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" stroke-width="2" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M21 21l-4.35-4.35m0 0A7.5 7.5 0 104.5 4.5a7.5 7.5 0 0012.15 12.15z" />
                            </svg>
                            <svg id="trek-search-spinner" class="mr-2 h-5 w-5 animate-spin text-white hidden"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                aria-hidden="true">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                                    stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v4a4 4 0 00-4 4H4z">
                                </path>
                            </svg>
                            <span>Search</span>
                        </button>
                    </div>
                </form> --}}
            </div>
        </div>
        <div>
            <div class="border-slate-200 py-6">
                {{-- <div class="flex items-center justify-between my-5">
                    <h4 class="text-sm font-semibold uppercase tracking-[0.25em] text-slate-500">Search Results
                    </h4>

                </div> --}}
                <div class="mt-4" id="trek-results">
                    <div
                        class="hidden gap-3 border-b border-slate-200 pb-2 text-xs font-semibold uppercase tracking-[0.2em] text-slate-500 sm:grid sm:grid-cols-[1.7fr_0.8fr_0.8fr_0.6fr_0.8fr_auto]">
                        <span>Trip Name</span>
                        <span>Days</span>
                        <span>Cost</span>
                        <span class="text-right">Action</span>
                    </div>
                    <div class="divide-y divide-slate-200">

                        @foreach ($departures as $item)
                            <div class="grid gap-3 py-4 sm:grid-cols-[1.7fr_0.8fr_0.8fr_0.6fr_0.8fr_auto] sm:items-center">
                                <div>
                                    <span
                                        class="text-[0.65rem] font-semibold uppercase tracking-[0.2em] text-slate-500 sm:hidden">Trek Name</span>
                                    <p class="mt-1 text-sm font-semibold text-slate-900 sm:mt-0">{{ $item['package_name'] }}
                                    </p>
                                </div>
                                <div>
                                    <span
                                        class="text-[0.65rem] font-semibold uppercase tracking-[0.2em] text-slate-500 sm:hidden">Duration</span>
                                   <p class="mt-1 text-sm font-semibold sm:mt-0">{{ $item['duration'] }} days</p>
                                </div>
                               
                                <div>
                                    <span
                                        class="text-[0.65rem] font-semibold uppercase tracking-[0.2em] text-slate-500 sm:hidden">Cost</span>
                                    <p class="mt-1 text-sm font-semibold text-slate-900 sm:mt-0">
                                        {{ $item['cost'] ?? 'n/a' }} USD</p>
                                </div>

                                <div class="flex sm:justify-end">
                                    <a href="{{ route('trek.show', ['destination' => $item['destination_slug'], 'slug' => $item['package_slug']]) }}"
                                        class="inline-flex items-center rounded-md border border-sky-200 px-4 py-2 text-xs font-semibold text-sky-700 hover:border-sky-300 hover:text-sky-800">
                                        Book</a>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    (function() {
        const form = document.getElementById('trek-search-form');
        const results = document.getElementById('trek-results');
        const btn = document.getElementById('trek-search-btn');
        const icon = document.getElementById('trek-search-icon');
        const spinner = document.getElementById('trek-search-spinner');
        if (!form || !results) return;

        form.addEventListener('submit', async (e) => {
            e.preventDefault();
            const formData = new FormData(form);
            const params = new URLSearchParams(formData);
            const url = `${form.action}?${params.toString()}`;

            if (btn) btn.disabled = true;
            if (icon) icon.classList.add('hidden');
            if (spinner) spinner.classList.remove('hidden');

            try {
                const resp = await fetch(url, {
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                });
                const html = await resp.text();
                const doc = new DOMParser().parseFromString(html, 'text/html');
                const newResults = doc.getElementById('trek-results');
                if (newResults) {
                    results.innerHTML = newResults.innerHTML;
                }
            } catch (err) {
                console.error('Search failed', err);
            } finally {
                if (btn) btn.disabled = false;
                if (icon) icon.classList.remove('hidden');
                if (spinner) spinner.classList.add('hidden');
            }
        });
    })();
</script>
