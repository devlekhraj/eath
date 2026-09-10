@php
    $featuredGuides = \Admin\Models\Guide::where('status', 'active')->take(3)->get();
@endphp

@if($featuredGuides->count() > 0)
    <section class="section-eath bg-warm border-b border-stone-200/80" aria-labelledby="guides-title">
        <div class="content-container">
            {{-- Section Heading --}}
            <div class="flex flex-col sm:flex-row sm:items-end sm:justify-between gap-4 mb-8 sm:mb-10">
                <div>
                    <span class="eyebrow-label text-primary font-semibold tracking-wider uppercase text-xs">Our Mountain Leaders</span>
                    <h2 id="guides-title" class="font-display text-2xl sm:text-3xl lg:text-4xl font-semibold text-stone-900 mt-1">
                        Meet Your Licensed Sherpa &amp; Guides
                    </h2>
                    <p class="text-stone-600 text-sm sm:text-base mt-2 max-w-xl">
                        Born and raised in the Himalayas, our certified mountain guides combine wilderness safety training with intimate knowledge of high trails and Sherpa heritage.
                    </p>
                </div>
                <div class="flex-shrink-0">
                    <a href="{{ route('about.guide.profiles') }}" class="btn-eath btn-ghost text-primary text-sm font-semibold hover:underline inline-flex items-center gap-1.5">
                        <span>All Mountain Leaders</span>
                        <svg class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M3 10a.75.75 0 01.75-.75h10.638L10.23 5.29a.75.75 0 111.04-1.08l5.5 5.25a.75.75 0 010 1.08l-5.5 5.25a.75.75 0 11-1.04-1.08l4.158-3.96H3.75A.75.75 0 013 10z" clip-rule="evenodd" />
                        </svg>
                    </a>
                </div>
            </div>

            {{-- 3 Real Guide Profiles Grid --}}
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @foreach ($featuredGuides as $guide)
                    <article class="card-eath bg-surface p-5 sm:p-6 flex flex-col justify-between border border-stone-200 shadow-sm group">
                        <div>
                            {{-- Guide Portrait --}}
                            <div class="relative aspect-square rounded-xl overflow-hidden mb-5 bg-stone-100">
                                @php
                                    $photoUrl = !empty($guide->photo) ? asset('storage/' . $guide->photo) : 'https://images.unsplash.com/photo-1544735716-392fe2489ffa?auto=format&fit=crop&w=600&q=80';
                                @endphp
                                <img src="{{ $photoUrl }}"
                                     alt="EATH mountain guide {{ $guide->name }}"
                                     loading="lazy"
                                     class="h-full w-full object-cover object-top transition-transform duration-500 ease-out group-hover:scale-105"
                                     onerror="this.onerror=null;this.src='https://images.unsplash.com/photo-1544735716-392fe2489ffa?auto=format&fit=crop&w=600&q=80';" />
                                <div class="absolute inset-0 bg-gradient-to-t from-stone-950/60 via-transparent to-transparent"></div>
                                <div class="absolute bottom-3 left-3 right-3 flex items-center justify-between text-white">
                                    <span class="badge-pill bg-white/90 text-primary text-[0.65rem] font-semibold backdrop-blur-sm">
                                        Licensed Guide
                                    </span>
                                    @if(!empty($guide->experience_years))
                                        <span class="text-xs text-emerald-200 font-semibold drop-shadow-sm">
                                            {{ $guide->experience_years }}+ Years Field Lead
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <h3 class="font-display font-semibold text-lg text-stone-900 group-hover:text-primary transition-colors">
                                {{ $guide->name }}
                            </h3>

                            <p class="text-xs text-stone-500 mt-1">
                                High Himalayan Mountain Leader
                            </p>

                            @if(!empty($guide->language_spoken) && is_array($guide->language_spoken))
                                <div class="mt-3 flex flex-wrap gap-1.5">
                                    @foreach($guide->language_spoken as $lang)
                                        <span class="px-2 py-0.5 rounded bg-stone-100 text-stone-600 text-[0.65rem] font-medium">
                                            {{ $lang }}
                                        </span>
                                    @endforeach
                                </div>
                            @endif

                            @if(!empty($guide->bio))
                                <p class="text-xs text-stone-600 mt-3 line-clamp-3 leading-relaxed">
                                    {{ $guide->bio }}
                                </p>
                            @endif
                        </div>

                        <div class="mt-5 pt-3 border-t border-stone-100 flex items-center justify-between">
                            <span class="text-[0.7rem] text-stone-500 font-medium">Wilderness First Aid</span>
                            <a href="{{ route('about.guide.profiles') }}" class="link-cta text-xs font-semibold">
                                <span>View Profile</span>
                                <svg class="h-3.5 w-3.5" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M3 10a.75.75 0 01.75-.75h10.638L10.23 5.29a.75.75 0 111.04-1.08l5.5 5.25a.75.75 0 010 1.08l-5.5 5.25a.75.75 0 11-1.04-1.08l4.158-3.96H3.75A.75.75 0 013 10z" clip-rule="evenodd" />
                                </svg>
                            </a>
                        </div>
                    </article>
                @endforeach
            </div>
        </div>
    </section>
@endif
