<!-- gallery section -->
<section class="py-12 pb-0 mb-4">
    <div class="max-w-7xl mx-auto px-2 sm:px-3 lg:px-4">
        <div class="flex items-end justify-between gap-6">
            <div>
                <span class="inline-flex items-center text-sm font-semibold text-sky-600">Photo Gallery</span>
                <h2 class="mt-3 text-3xl sm:text-4xl font-semibold text-slate-900">Best Moments</h2>
                <p class="mt-3 text-base text-slate-600">
                    Scenic highlights from {{ $package->destination->name ?? 'this trek' }}.
                </p>
            </div>
        </div>
    </div>
    <div class="mt-8 px-2 sm:px-3 lg:px-4">
        <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-3">
            @if (count($package->images_urls))
                @include('website.pages.home.partials.gallery-slider', [
                    'images' => $package->images_urls ?? [],
                ])
            @endif  
        </div>
    </div>
    <div id="gallery-lightbox" class="fixed inset-0 z-50 hidden">
        <div class="absolute inset-0 bg-black/80" data-gallery-close></div>
        <div class="relative z-10 flex h-full w-full items-center justify-center px-6 py-10">
            <button type="button"
                class="absolute right-6 top-6 rounded-full bg-white/10 p-2 text-white hover:bg-white/20"
                aria-label="Close gallery" data-gallery-close>
                <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                    stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                    <path d="M6 6l12 12M18 6l-12 12" />
                </svg>
            </button>
            <button type="button"
                class="absolute left-4 top-1/2 -translate-y-1/2 rounded-full bg-white/10 p-3 text-white hover:bg-white/20"
                aria-label="Previous image" data-gallery-prev>
                <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                    stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                    <path d="m15 18-6-6 6-6" />
                </svg>
            </button>
            <figure class="max-w-5xl">
                <img id="gallery-lightbox-image" src="" alt=""
                    class="max-h-[70vh] w-full rounded-none object-contain shadow-2xl opacity-0 transition-opacity duration-300" />
                <figcaption class="mt-4 text-center text-white">
                    <p id="gallery-lightbox-subtitle" class="text-xs uppercase tracking-[0.3em] text-white/70">
                    </p>
                    <h3 id="gallery-lightbox-title" class="mt-2 text-2xl font-semibold"></h3>
                </figcaption>
            </figure>
            <button type="button"
                class="absolute right-4 top-1/2 -translate-y-1/2 rounded-full bg-white/10 p-3 text-white hover:bg-white/20"
                aria-label="Next image" data-gallery-next>
                <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                    stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                    <path d="m9 18 6-6-6-6" />
                </svg>
            </button>
        </div>
    </div>
</section>