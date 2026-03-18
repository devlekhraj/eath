 <section class="py-14 sm:py-18 bg-white">
     <div class="max-w-7xl mx-auto px-2 sm:px-3 lg:px-4">
         <div class="flex items-end justify-between gap-6">
             <div>

                 <span class="inline-flex items-center text-sm font-semibold text-sky-600">Himalayan
                     Destinations</span>
                 <h2 class="mt-3 text-3xl sm:text-4xl font-semibold text-slate-900">Top Destinations</h2>
                 <p class="mt-3 text-base text-slate-600">Explore Nepal's Everest, Annapurna, and Manaslu
                     regions.</p>
             </div>
         </div>
         <div class="mt-8 grid gap-6 md:grid-cols-2">
             @foreach ($destinations as $destination)
                 <article class="group relative h-96">
                     <a href="/destinations/everest/" class="absolute inset-0 block overflow-hidden rounded-none">
                         <img src="{{ $destination['image'] }}"
                             alt="Everest region ridgeline"
                             class="h-full w-full object-cover transition duration-500 ease-out group-hover:scale-105" />
                         <div
                             class="absolute inset-0 bg-gradient-to-t from-slate-950/75 via-slate-900/30 to-transparent backdrop-blur-[1px] transition duration-300 ease-out group-hover:backdrop-blur-0">
                         </div>
                         <div class="absolute inset-0 flex items-center justify-center px-4 text-center text-white">
                             <h3 class="text-3xl sm:text-4xl font-bold tracking-[0.08em] uppercase">{{ $destination['name'] }}</h3>
                         </div>
                     </a>
                 </article>
             @endforeach
             
         </div>
     </div>
 </section>
