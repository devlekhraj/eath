<section class="section-eath bg-warm border-b border-stone-200/80" aria-labelledby="reviews-title">
    <div class="content-container">
        {{-- Section Heading --}}
        <div class="flex flex-col sm:flex-row sm:items-end sm:justify-between gap-4 mb-8 sm:mb-10">
            <div>
                <span class="eyebrow-label text-accent font-semibold tracking-wider uppercase text-xs">Human Social Proof</span>
                <h2 id="reviews-title" class="font-display text-2xl sm:text-3xl lg:text-4xl font-semibold text-stone-900 mt-1">
                    Traveler Stories &amp; Mountain Memories
                </h2>
                <p class="text-stone-600 text-sm sm:text-base mt-2 max-w-xl">
                    Genuine experiences from adventurers who walked Nepal's high trails with our local guides.
                </p>
            </div>
            <div class="flex-shrink-0">
                <a href="{{ route('trek.list') }}" class="btn-eath btn-ghost text-primary text-sm font-semibold hover:underline inline-flex items-center gap-1.5">
                    <span>Explore All Expeditions</span>
                    <svg class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M3 10a.75.75 0 01.75-.75h10.638L10.23 5.29a.75.75 0 111.04-1.08l5.5 5.25a.75.75 0 010 1.08l-5.5 5.25a.75.75 0 11-1.04-1.08l4.158-3.96H3.75A.75.75 0 013 10z" clip-rule="evenodd" />
                    </svg>
                </a>
            </div>
        </div>

        {{-- 3-Card Editorial Traveler Experience Grid --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            {{-- Story 1: Everest Trail --}}
            <article class="card-eath bg-surface p-6 sm:p-7 flex flex-col justify-between border border-stone-200 shadow-sm">
                <div>
                    <div class="relative aspect-editorial rounded-lg overflow-hidden mb-5 bg-stone-100">
                        <img src="https://images.unsplash.com/photo-1544735716-392fe2489ffa?auto=format&fit=crop&w=800&q=80"
                             alt="Trekkers arriving at Everest Base Camp glacier moraine"
                             loading="lazy"
                             class="h-full w-full object-cover" />
                        <span class="absolute bottom-2.5 left-2.5 badge-pill bg-stone-900/80 text-emerald-300 text-[0.65rem] border-stone-700">
                            Everest Base Camp Trail
                        </span>
                    </div>

                    <blockquote class="text-sm sm:text-base text-stone-800 leading-relaxed italic">
                        "The gradual acclimatization pace through Namche and Dingboche made all the difference. Our guide checked our oxygen levels every evening and adjusted the daily walking pace so we reached Kala Patthar feeling strong and energized."
                    </blockquote>
                </div>

                <div class="mt-6 pt-4 border-t border-stone-100 flex items-center justify-between">
                    <div>
                        <h4 class="font-display font-semibold text-sm text-stone-900">Autumn Khumbu Trekker</h4>
                        <p class="text-xs text-stone-500">15-Day Everest Expedition</p>
                    </div>
                    <span class="text-xs font-semibold text-primary">October Season</span>
                </div>
            </article>

            {{-- Story 2: Annapurna Sanctuary --}}
            <article class="card-eath bg-surface p-6 sm:p-7 flex flex-col justify-between border border-stone-200 shadow-sm">
                <div>
                    <div class="relative aspect-editorial rounded-lg overflow-hidden mb-5 bg-stone-100">
                        <img src="https://images.unsplash.com/photo-1516483638261-f4dbaf036963?auto=format&fit=crop&w=800&q=80"
                             alt="Sunrise illuminating Machapuchare and Annapurna peaks"
                             loading="lazy"
                             class="h-full w-full object-cover" />
                        <span class="absolute bottom-2.5 left-2.5 badge-pill bg-stone-900/80 text-sky-300 text-[0.65rem] border-stone-700">
                            Annapurna Sanctuary
                        </span>
                    </div>

                    <blockquote class="text-sm sm:text-base text-stone-800 leading-relaxed italic">
                        "Waking up inside the 360-degree amphitheater of Annapurna Base Camp surrounded by towering 7,000m and 8,000m peaks at sunrise was the most awe-inspiring moment of our lives. The logistics and teahouses were seamless."
                    </blockquote>
                </div>

                <div class="mt-6 pt-4 border-t border-stone-100 flex items-center justify-between">
                    <div>
                        <h4 class="font-display font-semibold text-sm text-stone-900">Spring ABC Adventurer</h4>
                        <p class="text-xs text-stone-500">14-Day Annapurna Journey</p>
                    </div>
                    <span class="text-xs font-semibold text-primary">April Season</span>
                </div>
            </article>

            {{-- Story 3: Manaslu Circuit --}}
            <article class="card-eath bg-surface p-6 sm:p-7 flex flex-col justify-between border border-stone-200 shadow-sm">
                <div>
                    <div class="relative aspect-editorial rounded-lg overflow-hidden mb-5 bg-stone-100">
                        <img src="https://images.unsplash.com/photo-1464822759023-fed622ff2c3b?auto=format&fit=crop&w=800&q=80"
                             alt="Quiet Tibetan village and Larkya La pass trail in Manaslu"
                             loading="lazy"
                             class="h-full w-full object-cover" />
                        <span class="absolute bottom-2.5 left-2.5 badge-pill bg-stone-900/80 text-amber-300 text-[0.65rem] border-stone-700">
                            Manaslu Wilderness
                        </span>
                    </div>

                    <blockquote class="text-sm sm:text-base text-stone-800 leading-relaxed italic">
                        "If you want wild, authentic mountain culture without the crowds of mainstream trails, the Manaslu Circuit is unmatched. Crossing Larkya La at dawn with prayer flags whipping in the wind was pure Himalayan magic."
                    </blockquote>
                </div>

                <div class="mt-6 pt-4 border-t border-stone-100 flex items-center justify-between">
                    <div>
                        <h4 class="font-display font-semibold text-sm text-stone-900">High Pass Circuit Trekker</h4>
                        <p class="text-xs text-stone-500">14-Day Manaslu Traverse</p>
                    </div>
                    <span class="text-xs font-semibold text-primary">November Season</span>
                </div>
            </article>
        </div>
    </div>
</section>
