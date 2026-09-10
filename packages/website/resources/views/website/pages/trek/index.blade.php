@extends('website.layout.master')
@section('content')

<section class="relative h-[70vh] min-h-[520px] overflow-hidden bg-slate-950 text-white">
    <div class="absolute inset-0">
        <div class="h-full w-full bg-cover bg-center"
            style="background-image: url('{{ $package->image ?? '/images/logo.png' }}');">
        </div>
        <div class="absolute inset-0 bg-gradient-to-b from-slate-950/20 via-slate-900/50 to-slate-950/60"></div>
    </div>

    <div
        class="relative mx-auto flex h-full w-full max-w-6xl flex-col items-center justify-end gap-6 px-6 pb-16 pt-24 text-center">
        <div
            class="inline-flex items-center gap-2 rounded-full border border-white/20 bg-white/10 px-4 py-1 text-xs uppercase tracking-[0.2em]">
            <span>Trek</span>
            <span class="h-1 w-1 rounded-full bg-white/60"></span>
            <span>{{ $package->slug }}</span>
        </div>
        <h1 class="text-4xl font-semibold tracking-tight uppercase sm:text-5xl lg:text-6xl">
            {{ $package->name }}
        </h1>
        <div class="flex flex-wrap items-center gap-4 text-sm text-white/80">
            @if ($package->destination)
            <span class="inline-flex items-center gap-2 rounded-full border border-white/20 bg-white/10 px-4 py-2">
                <span class="text-xs uppercase tracking-[0.2em]">Destination</span>
                <span class="text-white/90">{{ $package->destination->name }}</span>
            </span>
            @endif
            @if ($package->duration_days)
            <span class="inline-flex items-center gap-2 rounded-full border border-white/20 bg-white/10 px-4 py-2">
                <span class="text-xs uppercase tracking-[0.2em]">Duration</span>
                <span class="text-white/90">{{ $package->duration_days }} days</span>
            </span>
            @endif
            @if ($package->best_season)
            <span class="inline-flex items-center gap-2 rounded-full border border-white/20 bg-white/10 px-4 py-2">
                <span class="text-xs uppercase tracking-[0.2em]">Season</span>
                <span class="text-white/90">{{ $package->best_season }}</span>
            </span>
            @endif
        </div>
    </div>
</section>

<section class="mx-auto grid w-full max-w-7xl gap-10 px-6 py-12 lg:grid-cols-[2.2fr,1fr]">
    <div class="space-y-8">
        @if (!empty($package->highlights))
        <div class="rounded border-slate-200 bg-white p-6">
            <div class="flex items-center justify-between">
                <h2 class="text-2xl font-semibold text-slate-900">Trip highlights</h2>
                <span
                    class="rounded-full bg-slate-100 px-3 py-1 text-xs font-semibold uppercase tracking-wide text-slate-600">
                    Curated
                </span>
            </div>
            <div class="mt-6 grid gap-4 sm:grid-cols-2">
                @foreach ($package->highlights as $highlight)
                <div class="flex gap-4 rounded-xl border border-slate-200 bg-slate-50/70 p-4">
                    <div class="flex h-12 w-12 items-center justify-center rounded-full bg-white shadow">
                        <img src="{{ $highlight->icon_url }}" alt="{{ $highlight->highlight_name }}"
                            class="h-6 w-6 object-contain" />
                    </div>
                    <div>
                        <h3 class="text-base font-semibold text-slate-900">{{ $highlight->highlight_name }}</h3>
                        <p class="mt-1 text-sm text-slate-600">{{ $highlight->description }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endif

        @php
        $hasOverview = !empty(trim(strip_tags($package->description ?? '')));
        $hasItinerary = $package->itineraries->count() > 0;
        $hasIncludes = $package->inclusions->count() > 0;
        $hasExcludes = $package->exclusions->count() > 0;
        @endphp
        @if ($hasOverview || $hasItinerary || $hasIncludes || $hasExcludes)
        <div class="space-y-4" data-tab-group>
            <div class="flex flex-wrap gap-2" role="tablist" aria-label="Trek details tabs">
                @if ($hasOverview)
                <button type="button"
                    class="inline-flex items-center gap-2 rounded-lg border border-slate-200 bg-slate-200 px-4 py-2 text-sm font-semibold text-slate-700 transition duration-200 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-slate-500 focus-visible:ring-offset-2 tab-btn"
                    data-tab-btn="overview" role="tab" aria-controls="tab-panel-overview">
                    <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                        <path d="M4 5h16M4 12h16M4 19h10" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" />
                    </svg>
                    <span>Overview</span>
                </button>
                @endif
                @if ($hasItinerary)
                <button type="button"
                    class="inline-flex items-center gap-2 rounded-lg border border-slate-200 bg-slate-200 px-4 py-2 text-sm font-semibold text-slate-700 transition duration-200 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-slate-500 focus-visible:ring-offset-2 tab-btn"
                    data-tab-btn="itinerary" role="tab" aria-controls="tab-panel-itinerary">
                    <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                        <path d="M5 4h10a2 2 0 0 1 2 2v14l-4-2-4 2-4-2V6a2 2 0 0 1 2-2Z" stroke="currentColor"
                            stroke-width="2" stroke-linejoin="round" />
                    </svg>
                    <span>Itinerary</span>
                </button>
                @endif
                @if ($hasIncludes)
                <button type="button"
                    class="inline-flex items-center gap-2 rounded-lg border border-slate-200 bg-slate-200 px-4 py-2 text-sm font-semibold text-slate-700 transition duration-200 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-slate-500 focus-visible:ring-offset-2 tab-btn"
                    data-tab-btn="includes" role="tab" aria-controls="tab-panel-includes">
                    <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                        <path d="m5 12 4 4 10-10" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" />
                    </svg>
                    <span>Includes</span>
                </button>
                @endif
                @if ($hasExcludes)
                <button type="button"
                    class="inline-flex items-center gap-2 rounded-lg border border-slate-200 bg-slate-200 px-4 py-2 text-sm font-semibold text-slate-700 transition duration-200 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-slate-500 focus-visible:ring-offset-2 tab-btn"
                    data-tab-btn="excludes" role="tab" aria-controls="tab-panel-excludes">
                    <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                        <path d="m7 7 10 10M17 7 7 17" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" />
                    </svg>
                    <span>Excludes</span>
                </button>
                @endif
            </div>

            <div class="rounded border-slate-200 bg-white">
                @if ($hasOverview)
                <div id="tab-panel-overview" class="tab-panel p-6" data-tab-panel="overview" role="tabpanel">
                    <h2 class="text-2xl font-semibold text-slate-900">Overview</h2>
                    <div class="tiptap-container">
                        <div
                            class="prose prose-slate mt-4 max-w-none vuetify-pro-tiptap-editor__content view markdown-theme-default">
                            {!! $package->description !!}
                        </div>
                    </div>
                </div>
                @endif

                @if ($hasItinerary)
                <div id="tab-panel-itinerary" class="hidden tab-panel" data-tab-panel="itinerary"
                    role="tabpanel">
                    <h2 class="text-2xl font-semibold text-slate-900">Itinerary</h2>
                    <div class="mt-6 space-y-4">
                        @foreach ($package->itineraries as $key => $itinery)
                        <details
                            class="group rounded-xl border border-slate-200 bg-slate-50/70 p-4 vuetify-pro-tiptap-editor__content view markdown-theme-default">
                            <summary class="flex cursor-pointer list-none items-center justify-between">
                                <div class="flex items-center gap-3">
                                    <span
                                        class="flex h-10 w-10 items-center justify-center rounded-full bg-slate-900 text-sm font-semibold text-white">
                                        {{ $key + 1 }}
                                    </span>
                                    <span
                                        class="text-base font-semibold text-slate-900">{{ $itinery->title }}</span>
                                </div>
                                <span class="text-slate-400 transition group-open:rotate-45">+</span>
                            </summary>
                            <div class="prose prose-slate mt-4 max-w-none">
                                {!! $itinery->description !!}
                            </div>
                            @if ($itinery->highlights->isNotEmpty())
                            <div class="mt-4 grid gap-4 sm:grid-cols-2">
                                @foreach ($itinery->highlights as $highlight)
                                <div class="flex items-start gap-3">
                                    <div
                                        class="flex h-10 w-10 items-center justify-center rounded-lg bg-white shadow">
                                        <img src="{{ $highlight->icon_url }}"
                                            alt="{{ $highlight->highlight_name }}"
                                            class="h-5 w-5 object-contain" />
                                    </div>
                                    <div>
                                        <p class="text-sm font-semibold text-slate-800">
                                            {{ $highlight->highlight_name }}
                                        </p>
                                        <p class="text-sm text-slate-600">
                                            {{ $highlight->description }}
                                        </p>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            @endif
                        </details>
                        @endforeach
                    </div>
                </div>
                @endif

                @if ($hasIncludes)
                <div id="tab-panel-includes" class="hidden tab-panel" data-tab-panel="includes"
                    role="tabpanel">
                    <div class="rounded p-6">
                        <h2 class="text-2xl font-semibold text-emerald-900">What's included</h2>
                        <ul class="mt-4 space-y-3 text-sm text-emerald-900">
                            @foreach ($package->inclusions as $include)
                            <li class="flex items-start gap-3">
                                <span
                                    class="mt-1 inline-flex h-5 w-5 items-center justify-center rounded-full bg-emerald-600 text-xs text-white">✓</span>
                                <span class="font-medium">{{ $include->title }}</span>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                @endif

                @if ($hasExcludes)
                <div id="tab-panel-excludes" class="hidden tab-panel" data-tab-panel="excludes"
                    role="tabpanel">
                    <div class="rounded p-6">
                        <h2 class="text-2xl font-semibold text-rose-900">What's not included</h2>
                        <ul class="mt-4 space-y-3 text-sm text-rose-900">
                            @foreach ($package->exclusions as $exclude)
                            <li class="flex items-start gap-3">
                                <span
                                    class="mt-1 inline-flex h-5 w-5 items-center justify-center rounded-full bg-rose-600 text-xs text-white">×</span>
                                <span class="font-medium">{{ $exclude->title }}</span>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                @endif
            </div>
        </div>
        @endif

        {{-- @if (count($package->galleries))
                <div class="rounded border-slate-200 bg-white p-6 shadow-sm">
                    <h2 class="text-2xl font-semibold text-slate-900">Gallery</h2>
                    <div class="mt-6 grid gap-4 sm:grid-cols-2">
                        @foreach ($package->galleries as $image)
                            <div class="overflow-hidden rounded-xl">
                                <img src="{{ $image->url }}" alt="Gallery image" class="h-48 w-full object-cover" />
    </div>
    @endforeach
    </div>
    </div>
    @endif --}}
    </div>

    <aside class="space-y-6 lg:sticky lg:top-24 lg:self-start">
        @if ($package->fixedDeparture)
        <div class="rounded bg-gradient-to-br from-slate-900 via-slate-800 to-slate-700 p-6 text-white">
            <div
                class="mb-4 inline-flex items-center gap-2 rounded-full bg-white/10 px-3 py-1 text-xs uppercase tracking-[0.2em]">
                Fixed departure
            </div>
            @php
            $departure = $package->fixedDeparture;
            @endphp
            <h3 class="text-lg font-semibold">{{ $departure->title }}</h3>
            <p class="mt-1 text-3xl font-semibold">{{ format_price($departure->price) }}</p>
            <p class="mt-3 text-sm text-white/80">{{ $departure->description }}</p>
            <div class="mt-4 space-y-3 text-sm text-white/80">
                <div class="flex items-center justify-between">
                    <span>Group size</span>
                    <span class="font-semibold text-white">{{ $departure->group_size }}</span>
                </div>
                <div class="flex items-center justify-between">
                    <span>Duration</span>
                    <span class="font-semibold text-white">{{ $departure->duration }}</span>
                </div>
            </div>
            <button
                class="mt-5 w-full rounded-full bg-white px-4 py-3 text-sm font-semibold text-slate-900 btnOpenModal"
                data-type="featured_packages" data-id="{{ $departure['id'] }}">
                Join fixed departure
            </button>
        </div>
        @endif

        @if ($package->prices->count() > 0)
        <div class="rounded border-slate-200 bg-white p-6 shadow-sm">
            <div class="rounded-xl bg-slate-900 px-4 py-3 text-white">
                <p class="text-xs uppercase tracking-[0.2em] text-white/70">Price from</p>
                <p class="text-2xl font-semibold">{{ format_price($package->priceStart->price) }}</p>
            </div>

            <div class="mt-4 space-y-3">
                @foreach ($package->prices as $price)
                <div
                    class="flex items-center justify-between rounded-lg border border-slate-200 px-3 py-2 text-sm">
                    <span class="font-medium text-slate-700">{{ $price->title }}</span>
                    <span class="font-semibold text-emerald-600">{{ format_price($price->price) }}</span>
                </div>
                @endforeach
            </div>

            @if ($package->economyPrice)
            <div class="mt-4 rounded-lg border border-slate-200 bg-slate-50 p-3 text-sm">
                <p class="font-semibold text-slate-800">Economy price</p>
                <p class="text-emerald-600 font-semibold">{{ format_price($package->economyPrice->price) }}
                </p>
                <p class="mt-2 text-slate-600">{{ $package->economyPrice->description }}</p>
            </div>
            @endif

            <div class="mt-5 space-y-3">
                <button
                    class="inline-flex w-full items-center justify-center gap-2 rounded-full bg-emerald-600 px-4 py-3 text-sm font-semibold text-white shadow-sm transition hover:-translate-y-0.5 hover:bg-emerald-500 hover:shadow btnOpenInquiry"
                    data-type="travel_packages" data-id="{{ $package['id'] }}"
                    data-package-id="{{ $package['id'] }}"
                    data-package-title="{{ $package['name'] ?? ($package['title'] ?? '') }}"
                    data-destination-id="{{ $package->destination->id ?? '' }}">
                    <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <path d="M9 12l2 2 4-4" />
                        <path d="M20 12a8 8 0 1 1-16 0 8 8 0 0 1 16 0Z" />
                    </svg>
                    Instant booking
                </button>

                <button type="button"
                    class="inline-flex w-full items-center justify-center gap-2 rounded-full border border-slate-300 px-4 py-3 text-sm font-semibold text-slate-800 transition hover:-translate-y-0.5 hover:border-slate-900 hover:bg-slate-900 hover:text-white btnOpenInquiry"
                    data-type="travel_packages" data-id="{{ $package['id'] }}"
                    data-package-id="{{ $package['id'] }}"
                    data-package-title="{{ $package['name'] ?? ($package['title'] ?? '') }}"
                    data-destination-id="{{ $package->destination->id ?? '' }}">
                    <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <path d="M12 6v12" />
                        <path d="M18 12H6" />
                    </svg>
                    Customize trip
                </button>
            </div>
        </div>
        @endif

        <div class="rounded border-slate-200 bg-white p-6 shadow-sm">
            <h3 class="text-lg font-semibold text-slate-900">Need a custom plan?</h3>
            <p class="mt-2 text-sm text-slate-600">Tell us your dates, pace, and preferences. We will craft a tailored
                itinerary.</p>
            <a href="https://wa.me/9779867666656?text=Hello%2C%20I%27d%20like%20to%20plan%20a%20custom%20trek."
                class="mt-4 inline-flex w-full items-center justify-center gap-2 rounded-full border border-emerald-300 bg-emerald-50 px-4 py-3 text-sm font-semibold text-emerald-800 transition hover:-translate-y-0.5 hover:border-emerald-600 hover:bg-emerald-100 hover:text-emerald-900"
                target="_blank" rel="noopener">
                <svg class="h-4 w-4" viewBox="0 0 32 32" fill="currentColor" aria-hidden="true">
                    <path
                        d="M19.11 17.205c-.27-.135-1.6-.79-1.85-.88-.246-.09-.427-.135-.608.135-.18.27-.7.88-.855 1.06-.156.18-.31.202-.58.067-.27-.135-1.14-.42-2.173-1.34-.804-.716-1.345-1.6-1.5-1.87-.156-.27-.017-.416.118-.55.12-.12.27-.31.405-.465.135-.156.18-.27.27-.45.09-.18.045-.337-.022-.472-.067-.135-.608-1.466-.833-2.005-.22-.53-.446-.457-.608-.465l-.517-.01c-.18 0-.472.067-.72.337-.247.27-.945.924-.945 2.252 0 1.327.968 2.61 1.103 2.79.135.18 1.905 2.91 4.615 4.08.645.278 1.148.444 1.54.568.646.205 1.234.176 1.7.107.518-.077 1.6-.653 1.83-1.283.225-.63.225-1.17.157-1.283-.067-.112-.247-.18-.517-.315Z" />
                    <path
                        d="M16.004 4C9.375 4 4 9.373 4 16c0 2.118.555 4.144 1.606 5.94L4 28l6.258-1.642A11.96 11.96 0 0 0 16.004 28C22.63 28 28 22.627 28 16S22.63 4 16.004 4Zm0 21.818a9.82 9.82 0 0 1-5.018-1.377l-.36-.214-3.71.974.99-3.62-.235-.373A9.78 9.78 0 0 1 6.182 16c0-5.418 4.404-9.818 9.822-9.818 5.417 0 9.818 4.4 9.818 9.818 0 5.42-4.4 9.818-9.818 9.818Z" />
                </svg>
                WhatsApp our team
                <span>→</span>
            </a>
        </div>
    </aside>


</section>
{{-- section fixed departures --}}
@if ($package->departures)
<div class="mb-8">
    @include('website.pages.trek.partials.fixed-departures')
</div> 

@endif

{{-- gallery section --}}
@include('website.pages.home.landing-gallery', [
    'images' => $package->images_urls ?? [],
    'title' => 'Best Moments',
    'subtitle' => 'Scenic highlights from ' . ($package->destination->name ?? 'this trek') . '.',
    'badge' => 'Photo Gallery'
])




<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('[data-tab-group]').forEach(function(group) {
            const buttons = group.querySelectorAll('[data-tab-btn]');
            const panels = group.querySelectorAll('[data-tab-panel]');
            if (!buttons.length || !panels.length) {
                return;
            }

            const setTab = function(tabId) {
                buttons.forEach(function(button) {
                    const isActive = button.dataset.tabBtn === tabId;
                    button.classList.toggle('bg-slate-900', isActive);
                    button.classList.toggle('text-white', isActive);
                    button.classList.toggle('border-slate-900', isActive);
                    button.classList.toggle('shadow-sm', isActive);
                    button.classList.toggle('bg-slate-200', !isActive);
                    button.classList.toggle('text-slate-700', !isActive);
                    button.classList.toggle('border-slate-200', !isActive);
                    button.setAttribute('aria-selected', isActive ? 'true' : 'false');
                });

                panels.forEach(function(panel) {
                    const isActive = panel.dataset.tabPanel === tabId;
                    panel.classList.toggle('hidden', !isActive);
                });
            };

            buttons.forEach(function(button) {
                button.addEventListener('click', function() {
                    setTab(button.dataset.tabBtn);
                });
            });

            setTab(buttons[0].dataset.tabBtn);
        });
    });
</script>
@endsection