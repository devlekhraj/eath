@php
    $destinationSlug = $package['destination']['slug'] ?? ($package->destination->slug ?? null);
    $destinationName = $package['destination']['name'] ?? ($package->destination->name ?? null);
    $image = $package['image'] ?? ($package->image ?? null);
    $name = $package['name'] ?? ($package->name ?? '');
    $days = $package['duration_days'] ?? ($package->duration_days ?? null);
    $nights = $package['duration_nights'] ?? ($package->duration_nights ?? null);
    $minPrice = $package['min_price'] ?? ($package->min_price ?? null);
    $trekUrl = $destinationSlug 
        ? route('trek.show', ['destination' => $destinationSlug, 'slug' => $package['slug'] ?? $package->slug])
        : '#';
@endphp

<article class="card-eath card-interactive flex flex-col h-full group" data-trek-name="{{ strtolower($name) }}">
    <a href="{{ $trekUrl }}" class="relative aspect-trek overflow-hidden block" aria-label="View itinerary for {{ $name }}">
        <img src="{{ $image ?: 'https://images.unsplash.com/photo-1544735716-392fe2489ffa?auto=format&fit=crop&w=800&q=80' }}"
            alt="{{ $name }} in {{ $destinationName ?: 'Nepal Himalayas' }}"
            class="h-full w-full object-cover transition duration-500 ease-out group-hover:scale-105"
            loading="lazy" />
        <div class="absolute inset-0 bg-gradient-to-t from-slate-950/70 via-slate-900/20 to-transparent"></div>
        
        @if ($destinationName)
            <div class="absolute top-3 left-3 z-10">
                <span class="badge-pill bg-white/90 text-primary backdrop-blur-sm shadow-sm">
                    {{ $destinationName }}
                </span>
            </div>
        @endif

        @if ($minPrice)
            <div class="absolute bottom-3 right-3 z-10">
                <span class="inline-flex items-center px-2.5 py-1 rounded-md text-xs font-semibold bg-slate-900/85 text-white backdrop-blur-sm">
                    From ${{ number_format($minPrice) }}
                </span>
            </div>
        @endif
    </a>

    <div class="p-5 flex flex-col flex-1 justify-between bg-surface">
        <div>
            @if ($days)
                <div class="flex items-center gap-3 text-xs text-slate-500 font-medium mb-2">
                    <span class="inline-flex items-center gap-1">
                        <svg class="h-3.5 w-3.5 text-primary" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M5.75 2a.75.75 0 01.75.75V4h7V2.75a.75.75 0 011.5 0V4h.25A2.75 2.75 0 0118 6.75v8.5A2.75 2.75 0 0115.25 18H4.75A2.75 2.75 0 012 15.25v-8.5A2.75 2.75 0 014.75 4H5V2.75A.75.75 0 015.75 2zm-1 5.5c-.69 0-1.25.56-1.25 1.25v6.5c0 .69.56 1.25 1.25 1.25h10.5c.69 0 1.25-.56 1.25-1.25v-6.5c0-.69-.56-1.25-1.25-1.25H4.75z" clip-rule="evenodd" />
                        </svg>
                        {{ $days }} Days @if($nights) · {{ $nights }} Nights @endif
                    </span>
                    <span>·</span>
                    <span class="text-secondary font-semibold">Teahouse Trek</span>
                </div>
            @endif

            <h3 class="font-display text-lg sm:text-xl font-semibold text-slate-900 leading-snug group-hover:text-primary transition-colors">
                <a href="{{ $trekUrl }}">{{ $name }}</a>
            </h3>
        </div>

        <div class="mt-4 pt-3 border-t border-slate-100 flex items-center justify-between">
            <span class="text-xs text-slate-500">Altitude-safe pacing</span>
            <a href="{{ $trekUrl }}" class="link-cta text-xs font-semibold" tabindex="-1" aria-hidden="true">
                <span>View Route</span>
                <svg class="h-3.5 w-3.5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M3 10a.75.75 0 01.75-.75h10.638L10.23 5.29a.75.75 0 111.04-1.08l5.5 5.25a.75.75 0 010 1.08l-5.5 5.25a.75.75 0 11-1.04-1.08l4.158-3.96H3.75A.75.75 0 013 10z" clip-rule="evenodd" />
                </svg>
            </a>
        </div>
    </div>
</article>
