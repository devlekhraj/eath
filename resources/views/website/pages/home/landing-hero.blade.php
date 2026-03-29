 <section class="relative h-[75vh] min-h-[520px] hero-overlay" aria-labelledby="hero-title">

     <div class="absolute inset-0">
         <div class="swiper hero-swiper">
             <div class="swiper-wrapper">
                 @if ($mainBanner && $mainBanner->image_urls)
                     @foreach ($mainBanner->image_urls as $image)
                         <div class="swiper-slide">
                             <img src="{{ $image }}" alt="{{ $mainBanner->alt_text }}"
                                 class="h-full w-full object-cover" />
                         </div>
                     @endforeach
                 @else
                     <div class="swiper-slide">
                         <img src="https://images.unsplash.com/photo-1584395631446-e41b0fc3f68d?q=80&w=1470&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                             alt="Himalayan peaks under a clear blue sky" class="h-full w-full object-cover" />
                     </div>
                     <div class="swiper-slide">
                         <img src="https://images.unsplash.com/photo-1573331343892-976a013b7020?q=80&w=1470&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D?auto=format&fit=crop&w=1600&q=80"
                             alt="Himalayan ridgeline with layered mountains" class="h-full w-full object-cover" />
                     </div>
                     <div class="swiper-slide">
                         <img src="https://images.unsplash.com/photo-1454496522488-7a8e488e8606?auto=format&fit=crop&w=1600&q=80"
                             alt="Himalayan snow peaks under a clear sky" class="h-full w-full object-cover" />
                     </div>
                 @endif
             </div>
         </div>
     </div>

   
     <div class="absolute inset-0 hero-content ">
         <div class="mx-auto max-w-7xl px-2 sm:px-3 lg:px-4 h-full flex items-center justify-start text-left">
             <div class="text-white p-6">
                 <p class="hero-typing text-xs sm:text-sm uppercase tracking-[0.35em] text-white/80">
                     <span data-text="Easy Access to the Himalayas · @php echo date('Y'); @endphp">Easy Access to the Himalayas ·
                         @php echo date('Y'); @endphp</span>
                 </p>
                 <h1 id="hero-title" class="mt-4 text-3xl sm:text-5xl lg:text-6xl font-extrabold tracking-[0.08em]">
                     Himalayan Trekking <br />
                     in <span class="clip-text">Nepal</span>
                 </h1>
                 <p
                     class="mt-4 inline-flex clip-text max-w-2xl items-center rounded-md bg-white/15 py-2 text-base sm:text-lg font-semibold tracking-[0.04em] text-white">
                     Licensed &amp; safety-led treks across Everest, Annapurna &amp; Manaslu.
                 </p>

             </div>
         </div>
     </div>

 </section>
