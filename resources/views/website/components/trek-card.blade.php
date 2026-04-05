@php
    $destinationSlug = $package['destination']['slug'] ?? $package->destination->slug ?? null;
    $destinationName = $package['destination']['name'] ?? $package->destination->name ?? null;
    $image = $package['image'] ?? ($package->image ?? null);
    $name = $package['name'] ?? ($package->name ?? '');
@endphp

<article class="trek-card group overflow-hidden rounded-none"
    data-trek-name="{{ strtolower($name) }}">
    <a href="{{ $destinationSlug ? route('trek.show', ['destination' => $destinationSlug, 'slug' => $package['slug'] ?? $package->slug]) : '#' }}"
        class="relative aspect-[16/9] overflow-hidden block rounded-none">
        <div class="absolute inset-0 bg-cover bg-center transition duration-500 ease-out group-hover:scale-110"
            style="background-image:url('{{ $image }}')">
        </div>
        <div class="absolute inset-0 z-10 bg-gradient-to-t from-slate-900/70 via-slate-900/30 to-slate-900/10"></div>
        @if ($destinationName)
            <div class="absolute bottom-3 left-4 z-20 text-xs font-semibold uppercase tracking-[0.2em] text-slate-100">
                {{ $destinationName }}
            </div>
        @endif
    </a>
    <div class="py-4">
        <div class="flex items-center justify-center text-center">
            <h3 class="text-lg font-semibold">{{ $name }}</h3>
        </div>
    </div>
</article>
