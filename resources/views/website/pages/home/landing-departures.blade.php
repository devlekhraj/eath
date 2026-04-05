<section class="py-12 sm:py-16 bg-white">
    <div class="max-w-7xl mx-auto px-2 sm:px-3 lg:px-4">
        <div class="rounded-md  bg-white">
            <div class="flex flex-col gap-6 lg:flex-row lg:items-center lg:justify-between">
                <div>
                    <h2 class="mt-2 text-2xl sm:text-3xl font-semibold text-slate-900">Find your trek</h2>
                    <p class="mt-2 text-base text-slate-600">Search by region, duration, or difficulty.</p>
                </div>
            </div>
        </div>
        <div>
            <div class="border-slate-200 py-6">
               
                <div class="mt-4" id="trek-results">
                    <div
                        class="hidden gap-x-3 sm:gap-x-12 border-b border-slate-200 pb-2 text-xs font-semibold uppercase tracking-[0.2em] text-slate-500 sm:grid sm:grid-cols-[1fr_120px_120px_180px]">
                        <span>Trip Name</span>
                        <span>Durations</span>
                        <span class="sm:text-right">Cost</span>
                        <span class="text-right" >Action</span>
                    </div>
                    <div class="divide-y divide-slate-200">

                        @foreach ($departures as $item)
                            <div class="grid gap-x-3 sm:gap-x-12 py-4 sm:grid-cols-[1fr_120px_120px_180px] sm:items-center">
                                <div>
                                    <span
                                        class="text-[0.65rem] font-semibold uppercase tracking-[0.2em] text-slate-500 sm:hidden">Trek Name</span>
                                    <p class="mt-1 text-sm font-semibold text-slate-900 sm:mt-0">{{ $item['package_name'] }}
                                    </p>
                                </div>
                                <div>
                                    <span
                                        class="text-[0.65rem] font-semibold uppercase tracking-[0.2em] text-slate-500 sm:hidden">Duration</span>
                                   <p class="mt-1 text-sm font-semibold sm:mt-0">{{ $item['days'] }} days  @if(isset($item['nights']) && $item['nights'] > 0) {{$item['nights']}} nights @endif</p>
                                </div>
                               
                                <div class="sm:text-right">
                                    <span
                                        class="text-[0.65rem] font-semibold uppercase tracking-[0.2em] text-slate-500 sm:hidden">Cost</span>
                                    <p class="mt-1 text-sm font-semibold text-slate-900 sm:mt-0">
                                        {{ $item['cost'] ?? 'n/a' }} USD</p>
                                </div>

                                <div class="flex sm:justify-end">
                                    <a href="{{ route('trek.show', ['destination' => $item['destination_slug'], 'slug' => $item['package_slug']]) }}"
                                        class="inline-flex items-center rounded-md border border-sky-200 px-4 py-2 text-xs font-semibold text-sky-700 hover:border-sky-300 hover:text-sky-800">
                                        Join this Group</a>
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
