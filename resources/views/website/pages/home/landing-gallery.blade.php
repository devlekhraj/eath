 <section class="py-12 sm:pt-16 bg-white pb-0">
     <div class="max-w-7xl mx-auto px-2 sm:px-3 lg:px-4">
         <div class="flex items-end justify-between gap-6">
             <div>
                 <span class="inline-flex items-center text-sm font-semibold text-sky-600">Gallery</span>
                 <h2 class="mt-3 text-3xl sm:text-4xl font-semibold text-slate-900">Himalayan Moments</h2>
                 <p class="mt-3 text-base text-slate-600">Summit mornings, alpine trails, and mountain villages.
                 </p>
             </div>
         </div>
     </div>
     <div class="mt-8 px-2 sm:px-3 lg:px-4">
         <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-3">
             @if ($galleryImage)
                 @foreach ($galleryImage->image_urls as $img)
                     <button type="button" class="group relative overflow-hidden rounded-none text-left"
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
                 @endforeach
             @else
                 <button type="button" class="group relative overflow-hidden rounded-none text-left" data-gallery-item
                     data-src="https://images.unsplash.com/photo-1454496522488-7a8e488e8606?auto=format&fit=crop&w=1400&q=80"
                     data-alt="Snowy Himalayan peak under a clear sky" data-title="Above the Clouds"
                     data-subtitle="Altitude">
                     <div class="relative aspect-[4/3] overflow-hidden">
                         <img src="https://images.unsplash.com/photo-1454496522488-7a8e488e8606?auto=format&fit=crop&w=1400&q=80"
                             alt="Snowy Himalayan peak under a clear sky"
                             class="h-full w-full object-cover object-center transition duration-500 ease-out group-hover:scale-105" />
                     </div>
                     <div class="absolute inset-0 bg-gradient-to-t from-slate-950/50 via-slate-900/10 to-transparent">
                     </div>
                     <div class="absolute bottom-4 left-4 text-white">
                         <p class="text-xs uppercase tracking-[0.3em] text-white/80">Altitude</p>
                         <h3 class="mt-1 text-xl font-semibold">Above the Clouds</h3>
                     </div>
                 </button>
                 <button type="button" class="group relative overflow-hidden rounded-none text-left" data-gallery-item
                     data-src="https://images.unsplash.com/photo-1469474968028-56623f02e42e?auto=format&fit=crop&w=1200&q=80"
                     data-alt="Sunrise light over Himalayan ridgeline" data-title="First Light" data-subtitle="Ridge">
                     <div class="relative aspect-[4/3] overflow-hidden">
                         <img src="https://images.unsplash.com/photo-1469474968028-56623f02e42e?auto=format&fit=crop&w=1200&q=80"
                             alt="Sunrise light over Himalayan ridgeline"
                             class="h-full w-full object-cover object-center transition duration-500 ease-out group-hover:scale-105" />
                     </div>
                     <div class="absolute inset-0 bg-gradient-to-t from-slate-950/50 via-slate-900/10 to-transparent">
                     </div>
                     <div class="absolute bottom-4 left-4 text-white">
                         <p class="text-xs uppercase tracking-[0.3em] text-white/80">Ridge</p>
                         <h3 class="mt-1 text-xl font-semibold">First Light</h3>
                     </div>
                 </button>
                 <button type="button" class="group relative overflow-hidden rounded-none text-left" data-gallery-item
                     data-src="https://images.unsplash.com/photo-1500530855697-b586d89ba3ee?auto=format&fit=crop&w=1200&q=80"
                     data-alt="Mountain trail winding through forests" data-title="Forest Trails"
                     data-subtitle="Footpaths">
                     <div class="relative aspect-[4/3] overflow-hidden">
                         <img src="https://images.unsplash.com/photo-1500530855697-b586d89ba3ee?auto=format&fit=crop&w=1200&q=80"
                             alt="Mountain trail winding through forests"
                             class="h-full w-full object-cover object-center transition duration-500 ease-out group-hover:scale-105" />
                     </div>
                     <div class="absolute inset-0 bg-gradient-to-t from-slate-950/50 via-slate-900/10 to-transparent">
                     </div>
                     <div class="absolute bottom-4 left-4 text-white">
                         <p class="text-xs uppercase tracking-[0.3em] text-white/80">Footpaths</p>
                         <h3 class="mt-1 text-xl font-semibold">Forest Trails</h3>
                     </div>
                 </button>
                 <button type="button" class="group relative overflow-hidden rounded-none text-left" data-gallery-item
                     data-src="https://images.unsplash.com/photo-1470770903676-69b98201ea1c?auto=format&fit=crop&w=900&q=80"
                     data-alt="High mountain pass with dramatic clouds" data-title="High Pass" data-subtitle="Weather">
                     <div class="relative aspect-[4/3] overflow-hidden">
                         <img src="https://images.unsplash.com/photo-1470770903676-69b98201ea1c?auto=format&fit=crop&w=900&q=80"
                             alt="High mountain pass with dramatic clouds"
                             class="h-full w-full object-cover object-center transition duration-500 ease-out group-hover:scale-105" />
                     </div>
                     <div class="absolute inset-0 bg-gradient-to-t from-slate-950/50 via-slate-900/10 to-transparent">
                     </div>
                     <div class="absolute bottom-4 left-4 text-white">
                         <p class="text-xs uppercase tracking-[0.3em] text-white/80">Weather</p>
                         <h3 class="mt-1 text-xl font-semibold">High Pass</h3>
                     </div>
                 </button>
                 <button type="button" class="group relative overflow-hidden rounded-none text-left" data-gallery-item
                     data-src="https://images.unsplash.com/photo-1501785888041-af3ef285b470?auto=format&fit=crop&w=1400&q=80"
                     data-alt="Himalayan valley with layered hills" data-title="Layered Valleys"
                     data-subtitle="Horizons">
                     <div class="relative aspect-[4/3] overflow-hidden">
                         <img src="https://images.unsplash.com/photo-1501785888041-af3ef285b470?auto=format&fit=crop&w=1400&q=80"
                             alt="Himalayan valley with layered hills"
                             class="h-full w-full object-cover object-center transition duration-500 ease-out group-hover:scale-105" />
                     </div>
                     <div class="absolute inset-0 bg-gradient-to-t from-slate-950/50 via-slate-900/10 to-transparent">
                     </div>
                     <div class="absolute bottom-4 left-4 text-white">
                         <p class="text-xs uppercase tracking-[0.3em] text-white/80">Horizons</p>
                         <h3 class="mt-1 text-xl font-semibold">Layered Valleys</h3>
                     </div>
                 </button>
                 <button type="button" class="group relative overflow-hidden rounded-none text-left" data-gallery-item
                     data-src="https://images.unsplash.com/photo-1482192505345-5655af888cc4?auto=format&fit=crop&w=1200&q=80"
                     data-alt="Prayer flags fluttering along a mountain path" data-title="Prayer Flags"
                     data-subtitle="Trails">
                     <div class="relative aspect-[4/3] overflow-hidden">
                         <img src="https://images.unsplash.com/photo-1482192505345-5655af888cc4?auto=format&fit=crop&w=1200&q=80"
                             alt="Prayer flags fluttering along a mountain path"
                             class="h-full w-full object-cover object-center transition duration-500 ease-out group-hover:scale-105" />
                     </div>
                     <div class="absolute inset-0 bg-gradient-to-t from-slate-950/50 via-slate-900/10 to-transparent">
                     </div>
                     <div class="absolute bottom-4 left-4 text-white">
                         <p class="text-xs uppercase tracking-[0.3em] text-white/80">Trails</p>
                         <h3 class="mt-1 text-xl font-semibold">Prayer Flags</h3>
                     </div>
                 </button>
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
