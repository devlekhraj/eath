<section class="section-eath bg-canvas" aria-labelledby="safety-title">
    <div class="content-container">
        <div class="card-eath bg-surface overflow-hidden border border-stone-200/80 shadow-md">
            <div class="grid grid-cols-1 lg:grid-cols-12 items-stretch">
                {{-- Left Column: Authentic High-Altitude Mountain Environment Photo --}}
                <div class="relative lg:col-span-5 min-h-[300px] sm:min-h-[380px] lg:min-h-full bg-stone-900">
                    <img src="https://images.unsplash.com/photo-1506744038136-46273834b3fb?auto=format&fit=crop&w=1000&q=80"
                         alt="Trekking team traversing high altitude mountain trail in Nepal with guide"
                         loading="lazy"
                         class="absolute inset-0 h-full w-full object-cover" />
                    <div class="absolute inset-0 bg-gradient-to-t lg:bg-gradient-to-r from-stone-950/90 via-stone-950/40 to-transparent"></div>

                    {{-- Bottom Pill --}}
                    <div class="absolute bottom-6 left-6 right-6 z-10 p-4 rounded-xl bg-stone-900/80 backdrop-blur-md border border-white/10 text-white">
                        <div class="flex items-center gap-3">
                            <div class="h-9 w-9 rounded-full bg-primary flex items-center justify-center flex-shrink-0 text-white">
                                <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75m-3-7.036A11.959 11.959 0 0 1 3.598 6 11.99 11.99 0 0 0 3 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285Z" />
                                </svg>
                            </div>
                            <div>
                                <h4 class="text-xs font-semibold text-emerald-300 uppercase tracking-wider">Zero-Compromise Protocol</h4>
                                <p class="text-xs text-stone-200 mt-0.5">Every expedition is equipped with medical kits, pulse oximeters, and active satellite check-ins.</p>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Right Column: Structured 3-Tier Mountain Safety System --}}
                <div class="lg:col-span-7 p-6 sm:p-10 lg:p-12 flex flex-col justify-between">
                    <div>
                        <span class="eyebrow-label text-primary font-semibold tracking-wider uppercase text-xs">Altitude &amp; Field Safety</span>
                        <h2 id="safety-title" class="font-display text-2xl sm:text-3xl lg:text-4xl font-semibold text-stone-900 mt-1.5 leading-tight">
                            Safety Engineered for the High Himalayas
                        </h2>
                        <p class="text-stone-600 text-sm sm:text-base mt-2.5 max-w-xl">
                            High-altitude trekking requires disciplined planning, conservative elevation gains, and experienced judgment. Here is how we safeguard your journey at every stage:
                        </p>

                        <div class="mt-8 space-y-6">
                            {{-- Pillar 1: Pre-Trek & Acclimatization Pacing --}}
                            <div class="flex items-start gap-4">
                                <div class="h-9 w-9 rounded-lg bg-emerald-50 text-emerald-800 flex items-center justify-center flex-shrink-0 font-display font-semibold text-sm border border-emerald-200">
                                    01
                                </div>
                                <div>
                                    <h3 class="font-display font-semibold text-base text-stone-900">Altitude Pacing &amp; Acclimatization</h3>
                                    <p class="text-xs sm:text-sm text-stone-600 mt-1 leading-relaxed">
                                        We strictly follow the "climb high, sleep low" rule. All itineraries above 3,500m include built-in acclimatization days in locations like Namche Bazaar and Dingboche before ascending toward passes.
                                    </p>
                                </div>
                            </div>

                            {{-- Pillar 2: Daily On-Trail Health Checks --}}
                            <div class="flex items-start gap-4">
                                <div class="h-9 w-9 rounded-lg bg-emerald-50 text-emerald-800 flex items-center justify-center flex-shrink-0 font-display font-semibold text-sm border border-emerald-200">
                                    02
                                </div>
                                <div>
                                    <h3 class="font-display font-semibold text-base text-stone-900">Daily Health Monitoring &amp; Briefings</h3>
                                    <p class="text-xs sm:text-sm text-stone-600 mt-1 leading-relaxed">
                                        Morning and evening oxygen saturation (SpO2) and heart-rate checks are recorded by your lead guide. Any early symptoms of AMS are identified immediately, and routes are adjusted without hesitation.
                                    </p>
                                </div>
                            </div>

                            {{-- Pillar 3: Emergency Helicopter & Field Rescue --}}
                            <div class="flex items-start gap-4">
                                <div class="h-9 w-9 rounded-lg bg-emerald-50 text-emerald-800 flex items-center justify-center flex-shrink-0 font-display font-semibold text-sm border border-emerald-200">
                                    03
                                </div>
                                <div>
                                    <h3 class="font-display font-semibold text-base text-stone-900">Helicopter Rescue &amp; 24/7 Dispatch Desk</h3>
                                    <p class="text-xs sm:text-sm text-stone-600 mt-1 leading-relaxed">
                                        Our Kathmandu operations desk coordinates with leading charter fleets and insurance providers for emergency medical evacuation in remote terrain, weather permitting.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Bottom Action Row --}}
                    <div class="mt-8 pt-6 border-t border-stone-200/80 flex flex-col sm:flex-row items-center justify-between gap-4">
                        <p class="text-xs text-stone-500">
                            Have pre-existing health conditions or altitude questions?
                        </p>
                        <a href="{{ route('contact.us') }}" class="btn-eath btn-secondary btn-sm w-full sm:w-auto font-semibold justify-center">
                            <span>Discuss Health &amp; Safety</span>
                            <svg class="h-3.5 w-3.5 ml-1" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M3 10a.75.75 0 01.75-.75h10.638L10.23 5.29a.75.75 0 111.04-1.08l5.5 5.25a.75.75 0 010 1.08l-5.5 5.25a.75.75 0 11-1.04-1.08l4.158-3.96H3.75A.75.75 0 013 10z" clip-rule="evenodd" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
