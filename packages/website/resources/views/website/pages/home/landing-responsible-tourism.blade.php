<section class="section-eath bg-canvas" aria-labelledby="responsible-travel-title">
    <div class="content-container">
        {{-- Section Heading --}}
        <div class="flex flex-col md:flex-row md:items-end md:justify-between gap-4 mb-10 sm:mb-12">
            <div>
                <span class="eyebrow-label text-primary font-semibold tracking-wider uppercase text-xs">Sustainable Practice</span>
                <h2 id="responsible-travel-title" class="font-display text-2xl sm:text-3xl lg:text-4xl font-semibold text-stone-900 mt-1">
                    Responsible Himalayan Tourism
                </h2>
                <p class="text-stone-600 text-sm sm:text-base mt-2 max-w-2xl">
                    The Himalayas are fragile ecosystems and home to ancient mountain communities. We operate with strict conservation ethics and fair treatment for every team member.
                </p>
            </div>
            <div class="flex-shrink-0">
                <a href="{{ route('responsible.travels') }}" class="btn-eath btn-ghost text-primary text-sm font-semibold hover:underline inline-flex items-center gap-1.5">
                    <span>Our Sustainability Policy</span>
                    <svg class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M3 10a.75.75 0 01.75-.75h10.638L10.23 5.29a.75.75 0 111.04-1.08l5.5 5.25a.75.75 0 010 1.08l-5.5 5.25a.75.75 0 11-1.04-1.08l4.158-3.96H3.75A.75.75 0 013 10z" clip-rule="evenodd" />
                    </svg>
                </a>
            </div>
        </div>

        {{-- 3 Pillars Grid --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 sm:gap-8">
            {{-- Pillar 1: Community Support --}}
            <div class="p-6 sm:p-7 rounded-xl bg-surface border border-stone-200/80 shadow-sm flex flex-col justify-between">
                <div>
                    <div class="h-11 w-11 rounded-lg bg-emerald-50 text-emerald-800 flex items-center justify-center mb-5 border border-emerald-200">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.75">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z" />
                        </svg>
                    </div>
                    <h3 class="font-display font-semibold text-lg text-stone-900">Local Mountain Communities</h3>
                    <p class="text-xs sm:text-sm text-stone-600 mt-2.5 leading-relaxed">
                        We partner directly with family-run teahouses and village cooperatives across the Khumbu, Annapurna, and Manaslu circuits—ensuring your trekking expenditures directly benefit local economies.
                    </p>
                </div>
                <div class="mt-5 pt-3 border-t border-stone-100 text-xs text-emerald-800 font-semibold">
                    100% Locally Retained Impact
                </div>
            </div>

            {{-- Pillar 2: Alpine Conservation --}}
            <div class="p-6 sm:p-7 rounded-xl bg-surface border border-stone-200/80 shadow-sm flex flex-col justify-between">
                <div>
                    <div class="h-11 w-11 rounded-lg bg-emerald-50 text-emerald-800 flex items-center justify-center mb-5 border border-emerald-200">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.75">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 3v2.25m6.364.386-1.591 1.591M21 12h-2.25m-.386 6.364-1.591-1.591M12 18.75V21m-4.773-4.227-1.591 1.591M5.25 12H3m4.227-4.773L5.636 5.636M15.75 12a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0Z" />
                        </svg>
                    </div>
                    <h3 class="font-display font-semibold text-lg text-stone-900">Leave No Trace &amp; Plastic Free</h3>
                    <p class="text-xs sm:text-sm text-stone-600 mt-2.5 leading-relaxed">
                        We strictly discourage single-use plastic bottles on trails, providing safe water purification tablets and filter systems. All expedition waste is packed out of high-altitude national parks.
                    </p>
                </div>
                <div class="mt-5 pt-3 border-t border-stone-100 text-xs text-emerald-800 font-semibold">
                    Zero-Waste Himalayan Policy
                </div>
            </div>

            {{-- Pillar 3: Porter & Crew Welfare --}}
            <div class="p-6 sm:p-7 rounded-xl bg-surface border border-stone-200/80 shadow-sm flex flex-col justify-between">
                <div>
                    <div class="h-11 w-11 rounded-lg bg-emerald-50 text-emerald-800 flex items-center justify-center mb-5 border border-emerald-200">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.75">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75m-3-7.036A11.959 11.959 0 0 1 3.598 6 11.99 11.99 0 0 0 3 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285Z" />
                        </svg>
                    </div>
                    <h3 class="font-display font-semibold text-lg text-stone-900">Fair Porter &amp; Crew Welfare</h3>
                    <p class="text-xs sm:text-sm text-stone-600 mt-2.5 leading-relaxed">
                        Our porters and support crews are the true backbone of every expedition. We mandate strict 20kg maximum pack weight limits, provide cold-weather alpine gear, fair wages, and full medical rescue insurance.
                    </p>
                </div>
                <div class="mt-5 pt-3 border-t border-stone-100 text-xs text-emerald-800 font-semibold">
                    IPPG Ethical Standards
                </div>
            </div>
        </div>
    </div>
</section>
