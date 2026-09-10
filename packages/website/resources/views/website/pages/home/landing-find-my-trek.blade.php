<section class="section-eath bg-warm border-b border-stone-200/80" aria-labelledby="find-trek-title">
    <div class="content-container">
        <div class="card-eath bg-surface overflow-hidden border border-stone-200/80 shadow-md">
            <div class="grid grid-cols-1 lg:grid-cols-12">
                {{-- Left Column: Editorial Photo with Real Guide Context --}}
                <div class="relative lg:col-span-5 min-h-[320px] sm:min-h-[420px] lg:min-h-full bg-stone-900">
                    <img src="https://images.unsplash.com/photo-1544735716-392fe2489ffa?auto=format&fit=crop&w=1000&q=80"
                         alt="EATH mountain guide checking safety route map with trekker in the Himalayas"
                         loading="lazy"
                         class="absolute inset-0 h-full w-full object-cover" />
                    <div class="absolute inset-0 bg-gradient-to-t lg:bg-gradient-to-r from-stone-950/90 via-stone-950/50 to-transparent"></div>

                    {{-- Floating Trust Badge --}}
                    <div class="absolute bottom-6 left-6 right-6 z-10 p-4 rounded-xl bg-stone-900/85 backdrop-blur-md border border-white/15 text-white">
                        <div class="flex items-center gap-3">
                            <div class="h-10 w-10 rounded-full bg-emerald-700/80 flex items-center justify-center flex-shrink-0 text-white font-semibold text-sm">
                                1:1
                            </div>
                            <div>
                                <p class="text-xs font-semibold text-emerald-300 uppercase tracking-wider">Expert Matching</p>
                                <p class="text-xs text-stone-200 mt-0.5">Matched directly with licensed local mountain leaders based on your fitness and timeline.</p>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Right Column: Guided Preference Tool & Conversion Action --}}
                <div class="lg:col-span-7 p-6 sm:p-10 lg:p-12 flex flex-col justify-between">
                    <div>
                        <span class="eyebrow-label text-accent font-semibold tracking-wider uppercase text-xs">Guided Trek Matcher</span>
                        <h2 id="find-trek-title" class="font-display text-2xl sm:text-3xl lg:text-4xl font-semibold text-stone-900 mt-1.5 leading-tight">
                            Not Sure Which Himalayan Trail Fits You?
                        </h2>
                        <p class="text-stone-600 text-sm sm:text-base mt-2.5 max-w-xl">
                            With over 30 classic passes, remote circuits, and base camp routes in Nepal, selecting the right altitude profile is vital for safety and enjoyment. Share your preferences below:
                        </p>

                        {{-- Preference Cues --}}
                        <div class="mt-8 space-y-5">
                            {{-- Preference 1: Duration --}}
                            <div>
                                <label class="block text-xs font-semibold uppercase tracking-wider text-stone-700 mb-2">
                                    1. How much time do you have in Nepal?
                                </label>
                                <div class="grid grid-cols-1 sm:grid-cols-3 gap-2 sm:gap-2.5">
                                    <button type="button" class="find-trek-chip active py-2.5 px-3 rounded-lg border border-primary bg-primary-soft text-primary text-xs font-medium text-center transition">
                                        7–10 Days
                                    </button>
                                    <button type="button" class="find-trek-chip py-2.5 px-3 rounded-lg border border-stone-200 bg-surface text-stone-700 hover:border-stone-300 text-xs font-medium text-center transition">
                                        11–14 Days
                                    </button>
                                    <button type="button" class="find-trek-chip py-2.5 px-3 rounded-lg border border-stone-200 bg-surface text-stone-700 hover:border-stone-300 text-xs font-medium text-center transition">
                                        15+ Days
                                    </button>
                                </div>
                            </div>

                            {{-- Preference 2: Fitness & Pace --}}
                            <div>
                                <label class="block text-xs font-semibold uppercase tracking-wider text-stone-700 mb-2">
                                    2. Your hiking experience &amp; desired altitude:
                                </label>
                                <div class="grid grid-cols-1 sm:grid-cols-3 gap-2 sm:gap-2.5">
                                    <button type="button" class="find-trek-chip py-2.5 px-3 rounded-lg border border-stone-200 bg-surface text-stone-700 hover:border-stone-300 text-xs font-medium text-center transition">
                                        Moderate (&lt;4,000m)
                                    </button>
                                    <button type="button" class="find-trek-chip active py-2.5 px-3 rounded-lg border border-primary bg-primary-soft text-primary text-xs font-medium text-center transition">
                                        Challenging (&lt;5,500m)
                                    </button>
                                    <button type="button" class="find-trek-chip py-2.5 px-3 rounded-lg border border-stone-200 bg-surface text-stone-700 hover:border-stone-300 text-xs font-medium text-center transition">
                                        High Pass Traverse
                                    </button>
                                </div>
                            </div>

                            {{-- Preference 3: Focus / Interest --}}
                            <div>
                                <label class="block text-xs font-semibold uppercase tracking-wider text-stone-700 mb-2">
                                    3. What matters most to you?
                                </label>
                                <div class="grid grid-cols-1 sm:grid-cols-3 gap-2 sm:gap-2.5">
                                    <button type="button" class="find-trek-chip active py-2.5 px-3 rounded-lg border border-primary bg-primary-soft text-primary text-xs font-medium text-center transition">
                                        Iconic Summits
                                    </button>
                                    <button type="button" class="find-trek-chip py-2.5 px-3 rounded-lg border border-stone-200 bg-surface text-stone-700 hover:border-stone-300 text-xs font-medium text-center transition">
                                        Quiet Wilderness
                                    </button>
                                    <button type="button" class="find-trek-chip py-2.5 px-3 rounded-lg border border-stone-200 bg-surface text-stone-700 hover:border-stone-300 text-xs font-medium text-center transition">
                                        Cultural Villages
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Action Area --}}
                    <div class="mt-8 pt-6 border-t border-stone-200/80 flex flex-col sm:flex-row items-center justify-between gap-4">
                        <div>
                            <p class="text-xs text-stone-600">
                                Receive a bespoke proposal within 24 hours with exact altitude pacing and transparent costs.
                            </p>
                        </div>
                        <div class="flex items-center gap-3 w-full sm:w-auto">
                            <button type="button" class="btn-eath btn-accent btn-md w-full sm:w-auto justify-center font-semibold btnOpenInquiry shadow-sm">
                                <span>Get My Trek Recommendation</span>
                                <svg class="h-4 w-4 ml-1.5" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M3 10a.75.75 0 01.75-.75h10.638L10.23 5.29a.75.75 0 111.04-1.08l5.5 5.25a.75.75 0 010 1.08l-5.5 5.25a.75.75 0 11-1.04-1.08l4.158-3.96H3.75A.75.75 0 013 10z" clip-rule="evenodd" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Scoped Interactive Chips Script --}}
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const chipButtons = document.querySelectorAll('.find-trek-chip');
        chipButtons.forEach(btn => {
            btn.addEventListener('click', function () {
                const parentRow = btn.parentElement;
                parentRow.querySelectorAll('.find-trek-chip').forEach(sibling => {
                    sibling.classList.remove('border-primary', 'bg-primary-soft', 'text-primary', 'active');
                    sibling.classList.add('border-stone-200', 'bg-surface', 'text-stone-700');
                });
                btn.classList.remove('border-stone-200', 'bg-surface', 'text-stone-700');
                btn.classList.add('border-primary', 'bg-primary-soft', 'text-primary', 'active');
            });
        });
    });
</script>
