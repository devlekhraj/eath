<section class="py-12 sm:py-16 bg-white">
    <div class="max-w-7xl mx-auto px-2 sm:px-3 lg:px-4">
        <div class="rounded-md border border-slate-200 bg-white p-6 sm:p-8">
            <div class="flex flex-col gap-6 lg:flex-row lg:items-center lg:justify-between">
                <div>
                    <h2 class="mt-2 text-2xl sm:text-3xl font-semibold text-slate-900">Find your trek</h2>
                    <p class="mt-2 text-base text-slate-600">Search by region, duration, or difficulty.</p>
                </div>
                <form class="w-full max-w-2xl">
                    <div class="grid gap-3 sm:grid-cols-2 lg:grid-cols-[1.2fr_1fr_1fr_auto]">
                        <label class="sr-only" for="trek-search">Search treks</label>
                        <input id="trek-search" name="q" type="text" placeholder="Everest Base Camp"
                            class="w-full rounded-md border border-slate-200 px-4 py-3 text-sm text-slate-900 focus:border-sky-500 focus:outline-none focus:ring-2 focus:ring-sky-200" />
                        <label class="sr-only" for="trek-region">Region</label>
                        <select id="trek-region" name="region"
                            class="w-full rounded-md border border-slate-200 bg-white px-4 py-3 text-sm text-slate-700 focus:border-sky-500 focus:outline-none focus:ring-2 focus:ring-sky-200">
                            <option value="">All regions</option>
                            <option value="everest">Everest</option>
                            <option value="annapurna">Annapurna</option>
                            <option value="manaslu">Manaslu</option>
                            <option value="langtang">Langtang</option>
                        </select>
                        <label class="sr-only" for="trek-duration">Duration</label>
                        <select id="trek-duration" name="duration"
                            class="w-full rounded-md border border-slate-200 bg-white px-4 py-3 text-sm text-slate-700 focus:border-sky-500 focus:outline-none focus:ring-2 focus:ring-sky-200">
                            <option value="">Any duration</option>
                            <option value="short">6–10 days</option>
                            <option value="medium">11–14 days</option>
                            <option value="long">15+ days</option>
                        </select>
                        <button type="submit"
                            class="inline-flex w-full items-center justify-center rounded-md bg-slate-900 px-5 py-3 text-sm font-semibold text-white transition hover:bg-slate-800 sm:col-span-2 lg:col-span-1">
                            Search
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <div>
            <div class="border-slate-200 py-6">
                <div class="flex items-center justify-between my-5">
                    <h4 class="text-sm font-semibold uppercase tracking-[0.25em] text-slate-500">Search Results
                    </h4>

                </div>
                <div class="mt-4">
                    <div
                        class="hidden gap-3 border-b border-slate-200 pb-2 text-xs font-semibold uppercase tracking-[0.2em] text-slate-500 sm:grid sm:grid-cols-[1.7fr_0.8fr_0.8fr_0.6fr_0.8fr]">
                        <span>Trip Name</span>
                        <span>Departure</span>
                        <span>Region</span>
                        <span>Price</span>
                        <span class="text-right"></span>
                    </div>
                    <div class="divide-y divide-slate-200">
                        @foreach ($hotPackages as $item)
                            <div class="grid gap-3 py-4 sm:grid-cols-[1.7fr_0.8fr_0.8fr_0.6fr_0.8fr] sm:items-center">
                                <div>
                                    <span
                                        class="text-[0.65rem] font-semibold uppercase tracking-[0.2em] text-slate-500 sm:hidden">{{$item->name}}</span>
                                    <p class="mt-1 text-sm font-semibold text-slate-900 sm:mt-0">{{$item->name}}</p>
                                </div>
                                <div>
                                    <span
                                        class="text-[0.65rem] font-semibold uppercase tracking-[0.2em] text-slate-500 sm:hidden">Departure</span>
                                    <p class="mt-1 text-sm text-slate-700 sm:mt-0">Flexible</p>
                                </div>
                                <div>
                                    <span
                                        class="text-[0.65rem] font-semibold uppercase tracking-[0.2em] text-slate-500 sm:hidden">Region</span>
                                    <p class="mt-1 text-sm font-semibold sm:mt-0">{{ $item->destination?->name }}</p>
                                </div>
                                <div>
                                    <span
                                        class="text-[0.65rem] font-semibold uppercase tracking-[0.2em] text-slate-500 sm:hidden">Price</span>
                                    <p class="mt-1 text-sm font-semibold text-slate-900 sm:mt-0">{{ $item->min_price ??'n/a' }} USD</p>
                                </div>
                                {{-- <div class="flex sm:justify-end">
                                    <a href="/contact/inquiry/"
                                        class="inline-flex items-center rounded-md border border-sky-200 px-4 py-2 text-xs font-semibold text-sky-700 hover:border-sky-300 hover:text-sky-800">View
                                        Detail</a>
                                </div> --}}
                                <div class="flex sm:justify-end">
                                    <a href="/treks/{{ $item->slug }}"
                                        class="inline-flex items-center rounded-md border border-sky-200 px-4 py-2 text-xs font-semibold text-sky-700 hover:border-sky-300 hover:text-sky-800">View
                                        Detail</a>
                                </div>
                            </div>
                        @endforeach
                        {{-- <div class="grid gap-3 py-4 sm:grid-cols-[1.7fr_0.8fr_0.8fr_0.6fr_0.8fr] sm:items-center">
                            <div>
                                <span
                                    class="text-[0.65rem] font-semibold uppercase tracking-[0.2em] text-slate-500 sm:hidden">Trip
                                    Name</span>
                                <p class="mt-1 text-sm font-semibold text-slate-900 sm:mt-0">Everest Base Camp
                                    Trek – 15 Days
                                </p>
                            </div>
                            <div>
                                <span
                                    class="text-[0.65rem] font-semibold uppercase tracking-[0.2em] text-slate-500 sm:hidden">Departure</span>
                                <p class="mt-1 text-sm text-slate-700 sm:mt-0">Flexible</p>
                            </div>
                            <div>
                                <span
                                    class="text-[0.65rem] font-semibold uppercase tracking-[0.2em] text-slate-500 sm:hidden">Region</span>
                                <p class="mt-1 text-sm font-semibold sm:mt-0">Everest</p>
                            </div>
                            <div>
                                <span
                                    class="text-[0.65rem] font-semibold uppercase tracking-[0.2em] text-slate-500 sm:hidden">Price</span>
                                <p class="mt-1 text-sm font-semibold text-slate-900 sm:mt-0">$1125 USD</p>
                            </div>
                            <div class="flex sm:justify-end">
                                <a href="/contact/inquiry/"
                                    class="inline-flex items-center rounded-md border border-sky-200 px-4 py-2 text-xs font-semibold text-sky-700 hover:border-sky-300 hover:text-sky-800">View
                                    Detail</a>
                            </div>
                        </div>
                        <div class="grid gap-3 py-4 sm:grid-cols-[1.7fr_0.8fr_0.8fr_0.6fr_0.8fr] sm:items-center">
                            <div>
                                <span
                                    class="text-[0.65rem] font-semibold uppercase tracking-[0.2em] text-slate-500 sm:hidden">Trip
                                    Name</span>
                                <p class="mt-1 text-sm font-semibold text-slate-900 sm:mt-0">Manaslu Larke Pass
                                    Trek – 16 Days
                                </p>
                            </div>
                            <div>
                                <span
                                    class="text-[0.65rem] font-semibold uppercase tracking-[0.2em] text-slate-500 sm:hidden">Departure</span>
                                <p class="mt-1 text-sm text-slate-700 sm:mt-0">Fixed</p>
                            </div>
                            <div>
                                <span
                                    class="text-[0.65rem] font-semibold uppercase tracking-[0.2em] text-slate-500 sm:hidden">Region</span>
                                <p class="mt-1 text-sm font-semibold sm:mt-0">Everest</p>
                            </div>
                            <div>
                                <span
                                    class="text-[0.65rem] font-semibold uppercase tracking-[0.2em] text-slate-500 sm:hidden">Price</span>
                                <p class="mt-1 text-sm font-semibold text-slate-900 sm:mt-0">$1120 USD</p>
                            </div>
                            <div class="flex sm:justify-end">
                                <a href="/contact/inquiry/"
                                    class="inline-flex items-center rounded-md border border-sky-200 px-4 py-2 text-xs font-semibold text-sky-700 hover:border-sky-300 hover:text-sky-800">View
                                    Detail</a>
                            </div>
                        </div>
                        <div class="grid gap-3 py-4 sm:grid-cols-[1.7fr_0.8fr_0.8fr_0.6fr_0.8fr] sm:items-center">
                            <div>
                                <span
                                    class="text-[0.65rem] font-semibold uppercase tracking-[0.2em] text-slate-500 sm:hidden">Trip
                                    Name</span>
                                <p class="mt-1 text-sm font-semibold text-slate-900 sm:mt-0">Mardi Himal Trek –
                                    11 Days</p>
                            </div>
                            <div>
                                <span
                                    class="text-[0.65rem] font-semibold uppercase tracking-[0.2em] text-slate-500 sm:hidden">Departure</span>
                                <p class="mt-1 text-sm text-slate-700 sm:mt-0">Weekly</p>
                            </div>
                            <div>
                                <span
                                    class="text-[0.65rem] font-semibold uppercase tracking-[0.2em] text-slate-500 sm:hidden">Region</span>
                                <p class="mt-1 text-sm font-semibold sm:mt-0">Everest</p>
                            </div>
                            <div>
                                <span
                                    class="text-[0.65rem] font-semibold uppercase tracking-[0.2em] text-slate-500 sm:hidden">Price</span>
                                <p class="mt-1 text-sm font-semibold text-slate-900 sm:mt-0">$715 USD</p>
                            </div>
                            <div class="flex sm:justify-end">
                                <a href="/contact/inquiry/"
                                    class="inline-flex items-center rounded-md border border-sky-200 px-4 py-2 text-xs font-semibold text-sky-700 hover:border-sky-300 hover:text-sky-800">View
                                    Detail</a>
                            </div>
                        </div>
                        <div class="grid gap-3 py-4 sm:grid-cols-[1.7fr_0.8fr_0.8fr_0.6fr_0.8fr] sm:items-center">
                            <div>
                                <span
                                    class="text-[0.65rem] font-semibold uppercase tracking-[0.2em] text-slate-500 sm:hidden">Trip
                                    Name</span>
                                <p class="mt-1 text-sm font-semibold text-slate-900 sm:mt-0">Manaslu Circuit
                                    Trek – 18 Days</p>
                            </div>
                            <div>
                                <span
                                    class="text-[0.65rem] font-semibold uppercase tracking-[0.2em] text-slate-500 sm:hidden">Departure</span>
                                <p class="mt-1 text-sm text-slate-700 sm:mt-0">Custom</p>
                            </div>
                            <div>
                                <span
                                    class="text-[0.65rem] font-semibold uppercase tracking-[0.2em] text-slate-500 sm:hidden">Region</span>
                                <p class="mt-1 text-sm font-semibold sm:mt-0">Everest</p>
                            </div>
                            <div>
                                <span
                                    class="text-[0.65rem] font-semibold uppercase tracking-[0.2em] text-slate-500 sm:hidden">Price</span>
                                <p class="mt-1 text-sm font-semibold text-slate-900 sm:mt-0">$1530 USD</p>
                            </div>
                            <div class="flex sm:justify-end">
                                <a href="/contact/inquiry/"
                                    class="inline-flex items-center rounded-md border border-sky-200 px-4 py-2 text-xs font-semibold text-sky-700 hover:border-sky-300 hover:text-sky-800">View
                                    Detail</a>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
