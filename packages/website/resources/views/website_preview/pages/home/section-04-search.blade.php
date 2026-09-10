@props(['regions', 'months'])

<section id="section-04-search" data-section="04-search" class="website-search-band" aria-label="Trek Discovery and Quick Search">
    <div class="website-container">
        <form method="GET" action="{{ route('website.treks.index') }}" class="website-search-band__form" role="search">
            <!-- Region Selector -->
            <div class="website-search-band__field">
                <label for="home-search-region" class="website-label">
                    Region
                </label>
                <select name="region" id="home-search-region" class="website-select">
                    <option value="">All Himalayan Regions</option>
                    @foreach($regions as $region)
                        <option value="{{ $region['slug'] }}">
                            {{ $region['name'] }} Region ({{ $region['trek_count'] }})
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Duration Range (Days Min & Max with Persistent Labels and No-JS Support) -->
            <div class="website-search-band__field">
                <label for="home-search-days-min" class="website-label">
                    Duration Range (Days)
                </label>
                <div class="website-search-band__range-inputs">
                    <input type="number"
                           name="days_min"
                           id="home-search-days-min"
                           class="website-input"
                           placeholder="Min (e.g. 7)"
                           min="1"
                           max="30"
                           aria-label="Minimum trek duration in days">
                    <span class="website-text-muted" style="align-self: center;" aria-hidden="true">&ndash;</span>
                    <input type="number"
                           name="days_max"
                           id="home-search-days-max"
                           class="website-input"
                           placeholder="Max (e.g. 16)"
                           min="1"
                           max="30"
                           aria-label="Maximum trek duration in days">
                </div>
            </div>

            <!-- Travel Month Selector -->
            <div class="website-search-band__field">
                <label for="home-search-month" class="website-label">
                    Travel Month
                </label>
                <select name="month" id="home-search-month" class="website-select">
                    <option value="">Any Travel Month</option>
                    @foreach($months as $month)
                        <option value="{{ $month['id'] }}" {{ (int)$month['id'] === 9 ? 'selected' : '' }}>
                            {{ $month['name'] }} ({{ $month['season'] }})
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Search Actions -->
            <div class="website-search-band__actions">
                <button type="submit" class="website-btn website-btn--primary">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                        <circle cx="11" cy="11" r="8"></circle>
                        <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                    </svg>
                    <span>Search Treks</span>
                </button>
                <div style="display: flex; flex-direction: column; gap: 2px;">
                    <a href="{{ route('website.treks.index') }}" class="website-link website-small" style="white-space: nowrap;">
                        More Filters &rarr;
                    </a>
                    <a href="{{ route('website.planner.start', ['mode' => 'discover']) }}" class="website-link website-micro website-text-muted" style="white-space: nowrap;">
                        Not sure? Find My Trek &rarr;
                    </a>
                </div>
            </div>
        </form>
    </div>
</section>
