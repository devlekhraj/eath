<section class="section-eath bg-canvas" aria-labelledby="travel-month-title">
    <div class="content-container">
        {{-- Section Heading --}}
        <div class="flex flex-col sm:flex-row sm:items-end sm:justify-between gap-4 mb-8 sm:mb-10">
            <div>
                <span class="eyebrow-label text-primary font-semibold tracking-wider uppercase text-xs">Nepal Seasonality Guide</span>
                <h2 id="travel-month-title" class="font-display text-2xl sm:text-3xl lg:text-4xl font-semibold text-stone-900 mt-1">
                    When Are You Planning to Trek?
                </h2>
                <p class="text-stone-600 text-sm sm:text-base mt-2 max-w-2xl">
                    Himalayan weather shapes every journey. Select your intended travel month to see mountain conditions, visibility, and recommended trails.
                </p>
            </div>
            <div class="flex-shrink-0">
                <a href="{{ route('contact.us') }}" class="btn-eath btn-ghost text-primary text-sm font-semibold hover:underline inline-flex items-center gap-1.5">
                    <span>Ask Our Season Specialists</span>
                    <svg class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M3 10a.75.75 0 01.75-.75h10.638L10.23 5.29a.75.75 0 111.04-1.08l5.5 5.25a.75.75 0 010 1.08l-5.5 5.25a.75.75 0 11-1.04-1.08l4.158-3.96H3.75A.75.75 0 013 10z" clip-rule="evenodd" />
                    </svg>
                </a>
            </div>
        </div>

        {{-- 12-Month Button Selector --}}
        <div class="card-eath bg-surface p-4 sm:p-5 border border-stone-200/80 shadow-sm mb-6">
            <div class="grid grid-cols-4 sm:grid-cols-6 lg:grid-cols-12 gap-2" role="tablist" aria-label="Select trekking month">
                @php
                    $months = [
                        ['id' => 'jan', 'short' => 'Jan', 'full' => 'January', 'season' => 'winter'],
                        ['id' => 'feb', 'short' => 'Feb', 'full' => 'February', 'season' => 'winter'],
                        ['id' => 'mar', 'short' => 'Mar', 'full' => 'March', 'season' => 'spring'],
                        ['id' => 'apr', 'short' => 'Apr', 'full' => 'April', 'season' => 'spring'],
                        ['id' => 'may', 'short' => 'May', 'full' => 'May', 'season' => 'spring'],
                        ['id' => 'jun', 'short' => 'Jun', 'full' => 'June', 'season' => 'monsoon'],
                        ['id' => 'jul', 'short' => 'Jul', 'full' => 'July', 'season' => 'monsoon'],
                        ['id' => 'aug', 'short' => 'Aug', 'full' => 'August', 'season' => 'monsoon'],
                        ['id' => 'sep', 'short' => 'Sep', 'full' => 'September', 'season' => 'autumn'],
                        ['id' => 'oct', 'short' => 'Oct', 'full' => 'October', 'season' => 'autumn'],
                        ['id' => 'nov', 'short' => 'Nov', 'full' => 'November', 'season' => 'autumn'],
                        ['id' => 'dec', 'short' => 'Dec', 'full' => 'December', 'season' => 'winter'],
                    ];
                @endphp

                @foreach($months as $m)
                    @php $isDefault = ($m['id'] === 'oct'); @endphp
                    <button type="button" role="tab" id="btn-month-{{ $m['id'] }}"
                            data-month="{{ $m['id'] }}"
                            aria-selected="{{ $isDefault ? 'true' : 'false' }}"
                            aria-controls="month-detail-card"
                            class="month-btn py-2.5 px-2 rounded-lg border text-center transition flex flex-col items-center justify-center gap-0.5 {{ $isDefault ? 'border-primary bg-primary text-white font-semibold shadow-sm' : 'border-stone-200 bg-canvas text-stone-700 hover:border-stone-300 font-medium' }}">
                        <span class="text-xs tracking-wider uppercase">{{ $m['short'] }}</span>
                        <span class="text-[0.65rem] opacity-75 {{ $isDefault ? 'text-white/80' : 'text-stone-500' }}">
                            {{ ucfirst($m['season']) }}
                        </span>
                    </button>
                @endforeach
            </div>
        </div>

        {{-- Dynamic Month Condition & Recommended Trails Card --}}
        <div id="month-detail-card" class="card-eath bg-warm p-6 sm:p-8 border border-stone-200" aria-live="polite">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center">
                {{-- Weather & Season Summary --}}
                <div class="lg:col-span-6">
                    <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-emerald-100 text-emerald-800 text-xs font-semibold uppercase tracking-wider mb-3" id="month-season-badge">
                        Prime Autumn Season
                    </div>
                    <h3 class="font-display text-2xl sm:text-3xl font-semibold text-stone-900" id="month-title">
                        October Trekking in Nepal
                    </h3>
                    <p class="text-sm sm:text-base text-stone-700 mt-2.5 leading-relaxed" id="month-description">
                        Widely regarded as the golden month for Himalayan trekking. With the monsoon departed, the air is extraordinarily clear, offering pristine mountain visibility, stable high-pressure systems, and comfortable daytime temperatures across high passes.
                    </p>

                    <div class="mt-6 grid grid-cols-2 sm:grid-cols-3 gap-3">
                        <div class="p-3 bg-surface rounded-lg border border-stone-200">
                            <span class="text-[0.7rem] uppercase tracking-wider text-stone-400 font-semibold block">Visibility</span>
                            <span class="text-sm font-semibold text-stone-900" id="month-visibility">Crystal Clear (95%)</span>
                        </div>
                        <div class="p-3 bg-surface rounded-lg border border-stone-200">
                            <span class="text-[0.7rem] uppercase tracking-wider text-stone-400 font-semibold block">High Pass Temp</span>
                            <span class="text-sm font-semibold text-stone-900" id="month-temp">-5°C to 12°C</span>
                        </div>
                        <div class="p-3 bg-surface rounded-lg border border-stone-200 col-span-2 sm:col-span-1">
                            <span class="text-[0.7rem] uppercase tracking-wider text-stone-400 font-semibold block">Trail Crowds</span>
                            <span class="text-sm font-semibold text-stone-900" id="month-crowds">Popular / Active</span>
                        </div>
                    </div>
                </div>

                {{-- Recommended Top Routes for this Month --}}
                <div class="lg:col-span-6 border-t lg:border-t-0 lg:border-l border-stone-200 pt-6 lg:pt-0 lg:pl-8">
                    <h4 class="text-xs font-semibold uppercase tracking-wider text-stone-500 mb-4">
                        Ideal Trails for <span id="month-name-sub">October</span>
                    </h4>

                    <div class="space-y-3" id="month-routes">
                        <a href="{{ route('trek.list') }}?q=everest" class="p-3.5 bg-surface rounded-lg border border-stone-200 hover:border-primary flex items-center justify-between group transition">
                            <div>
                                <h5 class="font-display font-medium text-stone-900 text-sm sm:text-base group-hover:text-primary transition">Everest Base Camp &amp; Kala Patthar</h5>
                                <p class="text-xs text-stone-500">15 Days · Max 5,545m · High Khumbu Vistas</p>
                            </div>
                            <span class="text-primary font-semibold text-xs inline-flex items-center gap-1">
                                <span>Details</span>
                                <svg class="h-3.5 w-3.5 transition-transform group-hover:translate-x-1" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M3 10a.75.75 0 01.75-.75h10.638L10.23 5.29a.75.75 0 111.04-1.08l5.5 5.25a.75.75 0 010 1.08l-5.5 5.25a.75.75 0 11-1.04-1.08l4.158-3.96H3.75A.75.75 0 013 10z" clip-rule="evenodd" />
                                </svg>
                            </span>
                        </a>

                        <a href="{{ route('trek.list') }}?q=manaslu" class="p-3.5 bg-surface rounded-lg border border-stone-200 hover:border-primary flex items-center justify-between group transition">
                            <div>
                                <h5 class="font-display font-medium text-stone-900 text-sm sm:text-base group-hover:text-primary transition">Manaslu Circuit &amp; Larkya La Pass</h5>
                                <p class="text-xs text-stone-500">14 Days · Max 5,160m · Remote Tibetan Border</p>
                            </div>
                            <span class="text-primary font-semibold text-xs inline-flex items-center gap-1">
                                <span>Details</span>
                                <svg class="h-3.5 w-3.5 transition-transform group-hover:translate-x-1" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M3 10a.75.75 0 01.75-.75h10.638L10.23 5.29a.75.75 0 111.04-1.08l5.5 5.25a.75.75 0 010 1.08l-5.5 5.25a.75.75 0 11-1.04-1.08l4.158-3.96H3.75A.75.75 0 013 10z" clip-rule="evenodd" />
                                </svg>
                            </span>
                        </a>

                        <a href="{{ route('trek.list') }}?q=annapurna" class="p-3.5 bg-surface rounded-lg border border-stone-200 hover:border-primary flex items-center justify-between group transition">
                            <div>
                                <h5 class="font-display font-medium text-stone-900 text-sm sm:text-base group-hover:text-primary transition">Annapurna Circuit &amp; Thorong La</h5>
                                <p class="text-xs text-stone-500">14 Days · Max 5,416m · Epic Mountain Odyssey</p>
                            </div>
                            <span class="text-primary font-semibold text-xs inline-flex items-center gap-1">
                                <span>Details</span>
                                <svg class="h-3.5 w-3.5 transition-transform group-hover:translate-x-1" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M3 10a.75.75 0 01.75-.75h10.638L10.23 5.29a.75.75 0 111.04-1.08l5.5 5.25a.75.75 0 010 1.08l-5.5 5.25a.75.75 0 11-1.04-1.08l4.158-3.96H3.75A.75.75 0 013 10z" clip-rule="evenodd" />
                                </svg>
                            </span>
                        </a>
                    </div>

                    <div class="mt-4 pt-3 border-t border-stone-200/80 flex items-center justify-between">
                        <span class="text-xs text-stone-500">Planning around this window?</span>
                        <button type="button" class="btnOpenInquiry text-xs font-semibold text-accent hover:underline inline-flex items-center gap-1">
                            <span>Inquire for Custom Dates</span>
                            &rarr;
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Progressive Scoped JavaScript for Season Switcher --}}
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const monthData = {
            jan: {
                season: 'Winter Season',
                title: 'January Trekking in Nepal',
                desc: 'Crisp, sunny days with brilliant blue skies and very few trekkers. High passes (over 5,000m) can be snowbound, making lower alpine circuits like Poon Hill, Khopra Ridge, and Kathmandu Valley ridgelines ideal.',
                visibility: 'Outstanding (90%)',
                temp: '-15°C to 8°C',
                crowds: 'Very Quiet / Solitary',
                routes: [
                    { name: 'Ghorepani Poon Hill Panorama', meta: '5–7 Days · Max 3,210m · Crisp Sunrises', query: 'poon+hill' },
                    { name: 'Khopra Danda Wilderness', meta: '9–11 Days · Max 3,660m · Uncrowded Vistas', query: 'khopra' },
                    { name: 'Langtang Valley Cultural Trek', meta: '8 Days · Max 3,870m · Sacred Tamang Trails', query: 'langtang' }
                ]
            },
            feb: {
                season: 'Late Winter / Early Spring',
                title: 'February Trekking in Nepal',
                desc: 'Temperatures begin to warm at lower elevations while mountain passes remain snowy and pristine. Low to medium-altitude treks offer peaceful lodges and emerging rhododendron buds.',
                visibility: 'Very Clear (85%)',
                temp: '-10°C to 10°C',
                crowds: 'Quiet / Increasing',
                routes: [
                    { name: 'Annapurna Panorama & Poon Hill', meta: '7 Days · Max 3,210m · Classic Sunrises', query: 'poon+hill' },
                    { name: 'Langtang Valley Expedition', meta: '8 Days · Max 3,870m · Quiet Lodges', query: 'langtang' },
                    { name: 'Everest View Trek (Tengboche)', meta: '7 Days · Max 3,867m · Sherpa Monasteries', query: 'everest' }
                ]
            },
            mar: {
                season: 'Spring Rhododendron Season',
                title: 'March Trekking in Nepal',
                desc: 'Spring blossoms burst across Nepal\'s hillsides. Days are increasingly warm and longer, rhododendrons bloom in red and pink, and high mountain routes reopen for the main trekking calendar.',
                visibility: 'Good to Clear (85%)',
                temp: '-6°C to 15°C',
                crowds: 'Moderate / Festive',
                routes: [
                    { name: 'Annapurna Base Camp Sanctuary', meta: '12–14 Days · Max 4,130m · Alpine Bloom', query: 'annapurna+base+camp' },
                    { name: 'Everest Base Camp & Kala Patthar', meta: '15 Days · Max 5,545m · Khumbu Glaciers', query: 'everest' },
                    { name: 'Langtang Valley & Kyanjin Gompa', meta: '9 Days · Max 3,870m · Glaciated Peaks', query: 'langtang' }
                ]
            },
            apr: {
                season: 'Peak Spring Season',
                title: 'April Trekking in Nepal',
                desc: 'One of the best months of the year. Stable warm weather, blooming alpine forests, and active expedition teams setting up camp on Everest make this a thrilling time to be in the high mountains.',
                visibility: 'Excellent (90%)',
                temp: '-3°C to 18°C',
                crowds: 'Active / Peak',
                routes: [
                    { name: 'Everest Base Camp Trek', meta: '15 Days · Max 5,545m · High Mountain Atmosphere', query: 'everest' },
                    { name: 'Annapurna Circuit & Thorong La', meta: '14 Days · Max 5,416m · High Pass Open', query: 'annapurna' },
                    { name: 'Manaslu Circuit Traverse', meta: '14 Days · Max 5,160m · Remote & Wild', query: 'manaslu' }
                ]
            },
            may: {
                season: 'Late Spring / Warm Climbs',
                title: 'May Trekking in Nepal',
                desc: 'Warmer temperatures even at 4,000m+ elevations. Ideal for high passes and summit attempts. Afternoon cloud builds occasionally, but morning mountain views are breathtaking.',
                visibility: 'Good in Mornings (80%)',
                temp: '0°C to 22°C',
                crowds: 'Active / Tapering',
                routes: [
                    { name: 'Everest Three Passes Trek', meta: '18 Days · Max 5,535m · Highest Passes', query: 'everest' },
                    { name: 'Annapurna Base Camp Sanctuary', meta: '12 Days · Max 4,130m · Lush Amphitheater', query: 'annapurna' },
                    { name: 'Manaslu Circuit Trek', meta: '14 Days · Max 5,160m · Wild Rhododendrons', query: 'manaslu' }
                ]
            },
            jun: {
                season: 'Rain-Shadow / Trans-Himalaya',
                title: 'June Trekking in Nepal',
                desc: 'While the south receives monsoon rain, the northern Tibetan plateau remains in an arid rain shadow. Perfect for Upper Mustang, Nar Phu, and Dolpo.',
                visibility: 'High in Rain-Shadow (80%)',
                temp: '5°C to 24°C',
                crowds: 'Low on main / Selective',
                routes: [
                    { name: 'Upper Mustang Walled Kingdom', meta: '12–14 Days · Max 3,820m · Arid Tibetan Plateau', query: 'mustang' },
                    { name: 'Nar Phu Lost Valley Trek', meta: '14 Days · Max 5,306m · Rain-Shadow Sanctuary', query: 'nar+phu' },
                    { name: 'Lower Mustang & Muktinath', meta: '7 Days · Max 3,760m · Sacred Temples', query: 'annapurna' }
                ]
            },
            jul: {
                season: 'Monsoon Rain-Shadow Expeditions',
                title: 'July Trekking in Nepal',
                desc: 'Main trails feature lush green terraced farms and active waterfalls. Rain-shadow valleys behind the 8,000m Annapurna and Dhaulagiri massifs stay dry and fascinating.',
                visibility: 'Clear in Rain Shadow',
                temp: '8°C to 25°C',
                crowds: 'Very Low',
                routes: [
                    { name: 'Upper Mustang Ancient Caves', meta: '14 Days · Max 3,820m · Completely Rain-Sheltered', query: 'mustang' },
                    { name: 'Nar Phu Hidden Valleys', meta: '14 Days · Max 5,306m · Medieval Monasteries', query: 'nar+phu' }
                ]
            },
            aug: {
                season: 'Trans-Himalayan Festivals',
                title: 'August Trekking in Nepal',
                desc: 'Late monsoon season brings vibrant wildflowers and alpine meadows. Upper Mustang and high rain-shadow routes offer incredible cultural festivals and dry trekking trails.',
                visibility: 'Clear in Rain Shadow',
                temp: '8°C to 25°C',
                crowds: 'Low',
                routes: [
                    { name: 'Upper Mustang Plateau Trek', meta: '14 Days · Max 3,820m · Lo Manthang Palace', query: 'mustang' },
                    { name: 'Nar Phu & Kang La Pass', meta: '14 Days · Max 5,306m · Remote Himalayan Odyssey', query: 'nar+phu' }
                ]
            },
            sep: {
                season: 'Early Autumn Rejuvenation',
                title: 'September Trekking in Nepal',
                desc: 'Rains taper off mid-month leaving the Himalayas lush, vibrant, and dust-free. Crystal clear air returns with crisp mountain views and uncrowded trails.',
                visibility: 'High & Improving (85%)',
                temp: '2°C to 20°C',
                crowds: 'Moderate / Opening',
                routes: [
                    { name: 'Everest Base Camp Trek', meta: '15 Days · Max 5,545m · Fresh Alpine Air', query: 'everest' },
                    { name: 'Manaslu Circuit & Larkya La', meta: '14 Days · Max 5,160m · Pristine Trails', query: 'manaslu' },
                    { name: 'Annapurna Circuit Trek', meta: '14 Days · Max 5,416m · Dramatic Contrast', query: 'annapurna' }
                ]
            },
            oct: {
                season: 'Prime Autumn Season',
                title: 'October Trekking in Nepal',
                desc: 'Widely regarded as the golden month for Himalayan trekking. With the monsoon departed, the air is extraordinarily clear, offering pristine mountain visibility, stable high-pressure systems, and comfortable daytime temperatures across high passes.',
                visibility: 'Crystal Clear (95%)',
                temp: '-5°C to 12°C',
                crowds: 'Popular / Active',
                routes: [
                    { name: 'Everest Base Camp & Kala Patthar', meta: '15 Days · Max 5,545m · High Khumbu Vistas', query: 'everest' },
                    { name: 'Manaslu Circuit & Larkya La Pass', meta: '14 Days · Max 5,160m · Remote Tibetan Border', query: 'manaslu' },
                    { name: 'Annapurna Circuit & Thorong La', meta: '14 Days · Max 5,416m · Epic Mountain Odyssey', query: 'annapurna' }
                ]
            },
            nov: {
                season: 'Crisp Late Autumn',
                title: 'November Trekking in Nepal',
                desc: 'Superb mountain visibility continues with dry, sunny weather. High altitudes grow colder at night, but daytime walking conditions are near perfection with thinning crowds.',
                visibility: 'Exceptional (95%)',
                temp: '-8°C to 10°C',
                crowds: 'Moderate / Thinning',
                routes: [
                    { name: 'Everest Base Camp Trek', meta: '15 Days · Max 5,545m · Sharp Clear Horizons', query: 'everest' },
                    { name: 'Annapurna Sanctuary / Base Camp', meta: '12 Days · Max 4,130m · 360° Amphitheater', query: 'annapurna' },
                    { name: 'Langtang Valley Panorama', meta: '8 Days · Max 3,870m · Serene Lodges', query: 'langtang' }
                ]
            },
            dec: {
                season: 'Winter Alpine Serenity',
                title: 'December Trekking in Nepal',
                desc: 'Dry, sunny, and peaceful. Snow covers the higher ridges, while lower to mid-altitude treks offer crisp mountain vistas and warm teahouse hospitality without any crowds.',
                visibility: 'Sharp & Clear (90%)',
                temp: '-12°C to 8°C',
                crowds: 'Quiet / Tranquil',
                routes: [
                    { name: 'Ghorepani Poon Hill Trek', meta: '5–7 Days · Max 3,210m · Crisp Sunrises', query: 'poon+hill' },
                    { name: 'Khopra Danda & Lake', meta: '9 Days · Max 3,660m · Panoramic Solitude', query: 'khopra' },
                    { name: 'Everest Panorama to Namche', meta: '7 Days · Max 3,867m · Clear Winter Vistas', query: 'everest' }
                ]
            }
        };

        const buttons = document.querySelectorAll('.month-btn');
        const badge = document.getElementById('month-season-badge');
        const title = document.getElementById('month-title');
        const desc = document.getElementById('month-description');
        const vis = document.getElementById('month-visibility');
        const temp = document.getElementById('month-temp');
        const crowds = document.getElementById('month-crowds');
        const subName = document.getElementById('month-name-sub');
        const routesContainer = document.getElementById('month-routes');

        buttons.forEach(btn => {
            btn.addEventListener('click', function () {
                const mKey = btn.getAttribute('data-month');
                const data = monthData[mKey];
                if (!data) return;

                buttons.forEach(b => {
                    b.setAttribute('aria-selected', 'false');
                    b.classList.remove('border-primary', 'bg-primary', 'text-white', 'shadow-sm');
                    b.classList.add('border-stone-200', 'bg-canvas', 'text-stone-700');
                    const spanSub = b.querySelector('span:last-child');
                    if (spanSub) {
                        spanSub.classList.remove('text-white/80');
                        spanSub.classList.add('text-stone-500');
                    }
                });

                btn.setAttribute('aria-selected', 'true');
                btn.classList.remove('border-stone-200', 'bg-canvas', 'text-stone-700');
                btn.classList.add('border-primary', 'bg-primary', 'text-white', 'shadow-sm');
                const activeSub = btn.querySelector('span:last-child');
                if (activeSub) {
                    activeSub.classList.remove('text-stone-500');
                    activeSub.classList.add('text-white/80');
                }

                if (badge) badge.textContent = data.season;
                if (title) title.textContent = data.title;
                if (desc) desc.textContent = data.desc;
                if (vis) vis.textContent = data.visibility;
                if (temp) temp.textContent = data.temp;
                if (crowds) crowds.textContent = data.crowds;
                if (subName) subName.textContent = btn.querySelector('span:first-child').textContent;

                if (routesContainer) {
                    routesContainer.innerHTML = data.routes.map(r => `
                        <a href="{{ route('trek.list') }}?q=${encodeURIComponent(r.query)}" class="p-3.5 bg-surface rounded-lg border border-stone-200 hover:border-primary flex items-center justify-between group transition">
                            <div>
                                <h5 class="font-display font-medium text-stone-900 text-sm sm:text-base group-hover:text-primary transition">${r.name}</h5>
                                <p class="text-xs text-stone-500">${r.meta}</p>
                            </div>
                            <span class="text-primary font-semibold text-xs inline-flex items-center gap-1">
                                <span>Details</span>
                                <svg class="h-3.5 w-3.5 transition-transform group-hover:translate-x-1" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M3 10a.75.75 0 01.75-.75h10.638L10.23 5.29a.75.75 0 111.04-1.08l5.5 5.25a.75.75 0 010 1.08l-5.5 5.25a.75.75 0 11-1.04-1.08l4.158-3.96H3.75A.75.75 0 013 10z" clip-rule="evenodd" />
                                </svg>
                            </span>
                        </a>
                    `).join('');
                }
            });
        });
    });
</script>
