<section class="featured-section py-16 sm:py-20 bg-sky-50">
    <div class="featured-inner max-w-7xl mx-auto px-2 sm:px-3 lg:px-4">
        <div class="flex items-end justify-between flex-nowrap gap-6">
            <div>
                <span class="inline-flex items-center text-sm font-semibold text-sky-600">Featured</span>
                <h2 class="mt-3 text-3xl sm:text-4xl font-semibold text-slate-900">Featured Himalayan Treks
                </h2>
                <p class="mt-3 text-base text-slate-600">FHandpicked itineraries with altitude-aware pacing
                    across Nepal's high Himalayas.</p>
            </div>
            <a href="/treks/"
                class="text-sm font-semibold text-slate-900 underline decoration-2 underline-offset-4 hover:text-slate-700">View
                All Himalayan Treks</a>
        </div>
        <div class="mt-10 grid gap-6 md:grid-cols-3">
            @foreach ($packages as $package)
            <article class="group overflow-hidden rounded-none">
                {{-- <a href="/treks/everest/everest-base-camp-trek/" --}}
                <a href="/treks/{{ $package->slug }}"
                    class="relative aspect-[16/9] overflow-hidden block rounded-none">
                    <div class="absolute inset-0 bg-cover bg-center transition duration-500 ease-out group-hover:scale-110"
                        style="background-image:url('{{ $package['image'] }}')">
                    </div>
                    <div
                        class="absolute inset-0 z-10 bg-gradient-to-t from-slate-900/70 via-slate-900/30 to-slate-900/10">
                    </div>
                    <div
                        class="absolute bottom-3 left-4 z-20 text-xs font-semibold uppercase tracking-[0.2em] text-slate-100">
                        Everest
                    </div>
                </a>
                <div class="py-4">
                    <div class="flex items-center justify-center text-center">
                        <h3 class="text-lg font-semibold">{{ $package['name'] }}</h3>
                    </div>

                    {{-- <div
                        class="trek-stats mt-4 flex flex-nowrap items-center justify-center gap-x-6 gap-y-2 text-sm text-slate-700">
                        <div class="flex flex-col items-center gap-1 text-center px-2 py-1">
                            <svg class="h-6 w-6 text-slate-500" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                <path d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            </svg>
                            <span>12–14 Days</span>
                        </div>
                        <div class="flex flex-col items-center gap-1 text-center px-2 py-1">
                            <svg class="h-6 w-6 text-slate-500" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                <path
                                    d="M2.25 18 9 11.25l4.306 4.306a11.95 11.95 0 0 1 5.814-5.518l2.74-1.22m0 0-5.94-2.281m5.94 2.28-2.28 5.941" />
                            </svg>
                            <span>5,364m</span>
                        </div>
                        <div class="flex flex-col items-center gap-1 text-center px-2 py-1">
                            <svg class="h-6 w-6 text-slate-500" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                <path d="m3.75 13.5 10.5-11.25L12 10.5h8.25L9.75 21.75 12 13.5H3.75Z" />
                            </svg>
                            <span>Hard</span>
                        </div>
                    </div> --}}
                </div>
            </article>
            @endforeach
            {{-- <article class="group overflow-hidden rounded-none">
                <a href="/treks/annapurna/annapurna-base-camp-trek/"
                    class="relative aspect-[16/9] overflow-hidden block rounded-none">
                    <div class="absolute inset-0 bg-cover bg-center transition duration-500 ease-out group-hover:scale-110"
                        style="background-image:url('https://plus.unsplash.com/premium_photo-1697730124551-f3eabdd16b84?q=80&w=1470&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D')">
                    </div>
                    <div
                        class="absolute inset-0 z-10 bg-gradient-to-t from-slate-900/70 via-slate-900/30 to-slate-900/10">
                    </div>
                    <div
                        class="absolute bottom-3 left-4 z-20 text-xs font-semibold uppercase tracking-[0.2em] text-slate-100">
                        Annapurna
                    </div>
                </a>
                <div class="py-4">
                    <div class="flex items-center justify-center text-center">
                        <h3 class="text-lg font-semibold">Annapurna Base Camp Trek</h3>
                    </div>

                    <div
                        class="trek-stats mt-4 flex flex-nowrap items-center justify-center gap-x-6 gap-y-2 text-sm text-slate-700">
                        <div class="flex flex-col items-center gap-1 text-center px-2 py-1">
                            <svg class="h-6 w-6 text-slate-500" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                <path d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            </svg>
                            <span>7–12 Days</span>
                        </div>
                        <div class="flex flex-col items-center gap-1 text-center px-2 py-1">
                            <svg class="h-6 w-6 text-slate-500" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                <path
                                    d="M2.25 18 9 11.25l4.306 4.306a11.95 11.95 0 0 1 5.814-5.518l2.74-1.22m0 0-5.94-2.281m5.94 2.28-2.28 5.941" />
                            </svg>
                            <span>4,130m</span>
                        </div>
                        <div class="flex flex-col items-center gap-1 text-center px-2 py-1">
                            <svg class="h-6 w-6 text-slate-500" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                <path d="m3.75 13.5 10.5-11.25L12 10.5h8.25L9.75 21.75 12 13.5H3.75Z" />
                            </svg>
                            <span>Moderate</span>
                        </div>
                    </div>
                </div>
            </article>
            <article class="group overflow-hidden rounded-none">
                <a href="/treks/manaslu/manaslu-circuit-trek/"
                    class="relative aspect-[16/9] overflow-hidden block rounded-none">
                    <div class="absolute inset-0 bg-cover bg-center transition duration-500 ease-out group-hover:scale-110"
                        style="background-image:url('https://images.unsplash.com/photo-1691516347496-f9ada8248715?q=80&w=1470&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D')">
                    </div>
                    <div
                        class="absolute inset-0 z-10 bg-gradient-to-t from-slate-900/70 via-slate-900/30 to-slate-900/10">
                    </div>
                    <div
                        class="absolute bottom-3 left-4 z-20 text-xs font-semibold uppercase tracking-[0.2em] text-slate-100">
                        Manaslu
                    </div>
                </a>
                <div class="py-4">
                    <div class="flex items-center justify-center text-center">
                        <h3 class="text-lg font-semibold">Manaslu Circuit Trek</h3>
                    </div>

                    <div
                        class="trek-stats mt-4 flex flex-nowrap items-center justify-center gap-x-6 gap-y-2 text-sm text-slate-700">
                        <div class="flex flex-col items-center gap-1 text-center px-2 py-1">
                            <svg class="h-6 w-6 text-slate-500" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round" aria-hidden="true">
                                <path d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            </svg>
                            <span>14–16 Days</span>
                        </div>
                        <div class="flex flex-col items-center gap-1 text-center px-2 py-1">
                            <svg class="h-6 w-6 text-slate-500" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round" aria-hidden="true">
                                <path
                                    d="M2.25 18 9 11.25l4.306 4.306a11.95 11.95 0 0 1 5.814-5.518l2.74-1.22m0 0-5.94-2.281m5.94 2.28-2.28 5.941" />
                            </svg>
                            <span>5,160m</span>
                        </div>
                        <div class="flex flex-col items-center gap-1 text-center px-2 py-1">
                            <svg class="h-6 w-6 text-slate-500" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round" aria-hidden="true">
                                <path d="m3.75 13.5 10.5-11.25L12 10.5h8.25L9.75 21.75 12 13.5H3.75Z" />
                            </svg>
                            <span>Advanced</span>
                        </div>
                    </div>
                </div>
            </article>
            <article class="group overflow-hidden rounded-none">
                <a href="/treks/everest/everest-gokyo-lakes-trek/"
                    class="relative aspect-[16/9] overflow-hidden block rounded-none">
                    <div class="absolute inset-0 bg-cover bg-center transition duration-500 ease-out group-hover:scale-110"
                        style="background-image:url('https://images.unsplash.com/photo-1580417442553-dcdfa76a09d6?q=80&w=1470&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D')">
                    </div>
                    <div
                        class="absolute inset-0 z-10 bg-gradient-to-t from-slate-900/70 via-slate-900/30 to-slate-900/10">
                    </div>
                    <div
                        class="absolute bottom-3 left-4 z-20 text-xs font-semibold uppercase tracking-[0.2em] text-slate-100">
                        Everest
                    </div>
                </a>
                <div class="py-4">
                    <div class="flex items-center justify-center text-center">
                        <h3 class="text-lg font-semibold">Everest Gokyo Lakes Trek</h3>
                    </div>

                    <div
                        class="trek-stats mt-4 flex flex-nowrap items-center justify-center gap-x-6 gap-y-2 text-sm text-slate-700">
                        <div class="flex flex-col items-center gap-1 text-center px-2 py-1">
                            <svg class="h-6 w-6 text-slate-500" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round" aria-hidden="true">
                                <path d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            </svg>
                            <span>12–14 Days</span>
                        </div>
                        <div class="flex flex-col items-center gap-1 text-center px-2 py-1">
                            <svg class="h-6 w-6 text-slate-500" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round" aria-hidden="true">
                                <path
                                    d="M2.25 18 9 11.25l4.306 4.306a11.95 11.95 0 0 1 5.814-5.518l2.74-1.22m0 0-5.94-2.281m5.94 2.28-2.28 5.941" />
                            </svg>
                            <span>5,357m</span>
                        </div>
                        <div class="flex flex-col items-center gap-1 text-center px-2 py-1">
                            <svg class="h-6 w-6 text-slate-500" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round" aria-hidden="true">
                                <path d="m3.75 13.5 10.5-11.25L12 10.5h8.25L9.75 21.75 12 13.5H3.75Z" />
                            </svg>
                            <span>Hard</span>
                        </div>
                    </div>
                </div>
            </article>
            <article class="group overflow-hidden rounded-none">
                <a href="/treks/everest/everest-three-passes-trek/"
                    class="relative aspect-[16/9] overflow-hidden block rounded-none">
                    <div class="absolute inset-0 bg-cover bg-center transition duration-500 ease-out group-hover:scale-110"
                        style="background-image:url('https://images.unsplash.com/photo-1609660062508-1ac4a930232d?q=80&w=1074&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D')">
                    </div>
                    <div
                        class="absolute inset-0 z-10 bg-gradient-to-t from-slate-900/70 via-slate-900/30 to-slate-900/10">
                    </div>
                    <div
                        class="absolute bottom-3 left-4 z-20 text-xs font-semibold uppercase tracking-[0.2em] text-slate-100">
                        Everest
                    </div>
                </a>
                <div class="py-4">
                    <div class="flex items-center justify-center text-center">
                        <h3 class="text-lg font-semibold">Everest Three Passes Trek</h3>
                    </div>

                    <div
                        class="trek-stats mt-4 flex flex-nowrap items-center justify-center gap-x-6 gap-y-2 text-sm text-slate-700">
                        <div class="flex flex-col items-center gap-1 text-center px-2 py-1">
                            <svg class="h-6 w-6 text-slate-500" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round" aria-hidden="true">
                                <path d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            </svg>
                            <span>18–20 Days</span>
                        </div>
                        <div class="flex flex-col items-center gap-1 text-center px-2 py-1">
                            <svg class="h-6 w-6 text-slate-500" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round" aria-hidden="true">
                                <path
                                    d="M2.25 18 9 11.25l4.306 4.306a11.95 11.95 0 0 1 5.814-5.518l2.74-1.22m0 0-5.94-2.281m5.94 2.28-2.28 5.941" />
                            </svg>
                            <span>5,535m</span>
                        </div>
                        <div class="flex flex-col items-center gap-1 text-center px-2 py-1">
                            <svg class="h-6 w-6 text-slate-500" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round" aria-hidden="true">
                                <path d="m3.75 13.5 10.5-11.25L12 10.5h8.25L9.75 21.75 12 13.5H3.75Z" />
                            </svg>
                            <span>Advanced</span>
                        </div>
                    </div>
                </div>
            </article>
            <article class="group overflow-hidden rounded-none">
                <a href="/treks/annapurna/annapurna-circuit-trek/"
                    class="relative aspect-[16/9] overflow-hidden block rounded-none">
                    <div class="absolute inset-0 bg-cover bg-center transition duration-500 ease-out group-hover:scale-110"
                        style="background-image:url('https://images.unsplash.com/photo-1501785888041-af3ef285b470?auto=format&fit=crop&w=1200&q=80')">
                    </div>
                    <div
                        class="absolute inset-0 z-10 bg-gradient-to-t from-slate-900/70 via-slate-900/30 to-slate-900/10">
                    </div>
                    <div
                        class="absolute bottom-3 left-4 z-20 text-xs font-semibold uppercase tracking-[0.2em] text-slate-100">
                        Annapurna
                    </div>
                </a>
                <div class="py-4">
                    <div class="flex items-center justify-center text-center">
                        <h3 class="text-lg font-semibold">Annapurna Circuit Trek</h3>
                    </div>

                    <div
                        class="trek-stats mt-4 flex flex-nowrap items-center justify-center gap-x-6 gap-y-2 text-sm text-slate-700">
                        <div class="flex flex-col items-center gap-1 text-center px-2 py-1">
                            <svg class="h-6 w-6 text-slate-500" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round" aria-hidden="true">
                                <path d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            </svg>
                            <span>12–16 Days</span>
                        </div>
                        <div class="flex flex-col items-center gap-1 text-center px-2 py-1">
                            <svg class="h-6 w-6 text-slate-500" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round" aria-hidden="true">
                                <path
                                    d="M2.25 18 9 11.25l4.306 4.306a11.95 11.95 0 0 1 5.814-5.518l2.74-1.22m0 0-5.94-2.281m5.94 2.28-2.28 5.941" />
                            </svg>
                            <span>5,416m</span>
                        </div>
                        <div class="flex flex-col items-center gap-1 text-center px-2 py-1">
                            <svg class="h-6 w-6 text-slate-500" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round" aria-hidden="true">
                                <path d="m3.75 13.5 10.5-11.25L12 10.5h8.25L9.75 21.75 12 13.5H3.75Z" />
                            </svg>
                            <span>Advanced</span>
                        </div>
                    </div>
                </div>
            </article> --}}
        </div>
    </div>
</section>
