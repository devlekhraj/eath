@php($images = $images ?? [])

@if (!empty($images))
    @foreach ($images as $img)
        <div class="swiper-slide h-full">
            <button type="button" class="group relative h-full overflow-hidden rounded-none text-left"
                data-gallery-item data-src="{{ $img }}"
                data-alt="Snowy Himalayan peak under a clear sky"
                data-title=""
                data-subtitle="">
                <div class="relative aspect-[4/3] overflow-hidden">
                    <img src="{{ $img }}" alt="Snowy Himalayan peak under a clear sky"
                        class="h-full w-full object-cover object-center transition duration-500 ease-out group-hover:scale-105" />
                </div>
                <div
                    class="absolute inset-0 bg-gradient-to-t from-slate-950/50 via-slate-900/10 to-transparent">
                </div>
                <div class="absolute bottom-4 left-4 text-white">
                    <p class="text-xs uppercase tracking-[0.3em] text-white/80"></p>
                    <h3 class="mt-1 text-xl font-semibold"></h3>
                </div>
            </button>
        </div>
    @endforeach
@endif
