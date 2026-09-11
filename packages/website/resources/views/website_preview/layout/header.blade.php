@php
    $navTreks = \Website\Services\WebsiteCatalogRepository::getTreks();
    $navRegions = \Website\Services\WebsiteCatalogRepository::getRegions();
@endphp

<!-- 1. Skip to Main Content Link (First focusable element) -->
<a href="#website-main-content" class="website-skip-link">Skip to main content</a>

<!-- 2. Compact Top Trust / Website Bar -->
<div class="website-top-bar" role="region" aria-label="Website environment notice">
    <div class="website-container">
        <div class="website-top-bar__inner">
            <div class="website-top-bar__disclosure">
                <span class="website-badge website-badge--accent">WEBSITE PREVIEW</span>
                <span>Website preview — sample trips, prices and availability. No booking or inquiry will be sent.</span>
            </div>
            <div style="display: flex; align-items: center; gap: var(--space-4);">
                <span class="website-micro website-text-muted">Sample calendar: September 2030</span>
                <span class="website-text-muted" aria-hidden="true">|</span>
                <a href="{{ route('website.style-guide') }}" class="website-link website-micro">Style Guide</a>
            </div>
        </div>
    </div>
</div>

<!-- 3. Main Header (Opaque background, zero box-shadow) -->
<header class="website-header" role="banner">
    <div class="website-container">
        <div class="website-header__inner">
            <!-- Brand Logo -->
            <a href="{{ route('website.home') }}" class="website-brand" aria-label="EATH Ways Home (Website)" style="color: #ffffff;">
                <img src="/images/logo.png" alt="EATH Ways Logo" width="180" height="74" style="height: 72px; max-height: 76px; width: auto; aspect-ratio: 180 / 74; filter: brightness(0) invert(1);">
            </a>

            <!-- Desktop Primary Navigation -->
            <nav class="website-nav" aria-label="Primary navigation">
                <!-- Treks Dropdown Menu -->
                <div class="website-nav__item website-nav__item--dropdown">
                    <a href="{{ route('website.treks.index') }}"
                       class="website-nav__link"
                       {{ request()->routeIs('website.treks.*') ? 'aria-current="page"' : '' }}
                       aria-haspopup="true"
                       aria-expanded="false">
                        <svg class="website-nav__icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            <path d="m2 20 7-10 5 6 4-3 4 7H2z"></path>
                        </svg>
                        <span>Treks</span>
                        <svg class="website-nav__chevron" width="12" height="12" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenodd"/>
                        </svg>
                    </a>
                    <div class="website-nav__dropdown website-nav__dropdown--treks" role="menu">
                        <div class="website-nav__dropdown-header">
                            <span class="website-nav__dropdown-label">Featured Routes ({{ count($navTreks) }})</span>
                            <a href="{{ route('website.treks.index') }}" class="website-nav__dropdown-view-all">All Treks Directory &rarr;</a>
                        </div>
                        <div class="website-nav__dropdown-list">
                            @foreach($navTreks as $t)
                                <a href="{{ route('website.treks.show', ['slug' => $t['slug']]) }}" class="website-nav__trek-item" role="menuitem">
                                    <div class="website-nav__trek-main">
                                        <span class="website-nav__trek-name">{{ $t['name'] }}</span>
                                        <span class="website-nav__trek-meta">
                                            <span>{{ $t['duration_days'] }} Days</span>
                                            <span class="website-nav__dot" aria-hidden="true">&bull;</span>
                                            <span>{{ $t['region']['name'] ?? 'Nepal' }}</span>
                                            <span class="website-nav__dot" aria-hidden="true">&bull;</span>
                                            <span>{{ ucfirst($t['difficulty']) }}</span>
                                        </span>
                                    </div>
                                    <span class="website-nav__trek-arrow" aria-hidden="true">&rarr;</span>
                                </a>
                            @endforeach
                        </div>
                        <div class="website-nav__dropdown-footer">
                            <a href="{{ route('website.departures.index') }}" class="website-nav__dropdown-footer-action">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                    <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                                    <line x1="16" y1="2" x2="16" y2="6"></line>
                                    <line x1="8" y1="2" x2="8" y2="6"></line>
                                    <line x1="3" y1="10" x2="21" y2="10"></line>
                                </svg>
                                <span>Fixed Departures Calendar</span>
                            </a>
                            <a href="{{ route('website.compare') }}" class="website-nav__dropdown-footer-action">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                    <rect x="3" y="3" width="7" height="18"></rect>
                                    <rect x="14" y="3" width="7" height="18"></rect>
                                </svg>
                                <span>Compare Treks</span>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Destinations Mega Dropdown Menu -->
                <div class="website-nav__item website-nav__item--mega">
                    <a href="{{ route('website.destinations.index') }}"
                       class="website-nav__link"
                       {{ request()->routeIs('website.destinations.*') ? 'aria-current="page"' : '' }}
                       aria-haspopup="true"
                       aria-expanded="false">
                        <svg class="website-nav__icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                            <circle cx="12" cy="10" r="3"></circle>
                        </svg>
                        <span>Destinations</span>
                        <svg class="website-nav__chevron" width="12" height="12" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenodd"/>
                        </svg>
                    </a>
                    <div class="website-nav__mega-menu" role="region" aria-label="Destinations Mega Menu">
                        <div class="website-nav__mega-inner">
                            <!-- Top Section Header -->
                            <div class="website-nav__mega-header">
                                <div>
                                    <span class="website-badge website-badge--primary" style="font-size: 0.7rem; margin-bottom: 2px;">NEPAL TREKKING SANCTUARIES</span>
                                    <h3 class="website-nav__mega-heading">Explore by Mountain Region</h3>
                                </div>
                                <a href="{{ route('website.destinations.index') }}" class="website-link website-small" style="font-weight: 600;">
                                    All 5 Regions Overview &rarr;
                                </a>
                            </div>

                            <!-- Region list with hover-revealed route details -->
                            <div class="website-nav__mega-browser">
                                @foreach($navRegions as $reg)
                                    @php
                                        $regionImage = $reg['image'] ?? \Website\Support\WebsiteAssetRegistry::resolve("region-{$reg['slug']}", $reg['name']);
                                        $maxDuration = collect($reg['treks'] ?? [])->max('duration_days');
                                    @endphp
                                    <div class="website-nav__mega-region-group">
                                        <a href="{{ route('website.destinations.show', ['slug' => $reg['slug']]) }}" class="website-nav__mega-region-link">
                                            <span class="website-nav__mega-region-media" aria-hidden="true">
                                                <img src="{{ $regionImage['url'] }}"
                                                     alt=""
                                                     width="{{ $regionImage['width'] ?? 160 }}"
                                                     height="{{ $regionImage['height'] ?? 100 }}"
                                                     loading="lazy">
                                            </span>
                                            <span class="website-nav__mega-region-copy">
                                                <span class="website-nav__mega-region-title">{{ $reg['name'] }}</span>
                                                <span class="website-nav__mega-region-summary">
                                                    {{ $reg['trek_count'] }} {{ Str::plural('trek', $reg['trek_count']) }}
                                                    @if($maxDuration)
                                                        · up to {{ $maxDuration }}d
                                                    @endif
                                                </span>
                                            </span>
                                            <span class="website-nav__mega-region-meta">
                                                <span aria-hidden="true">&rarr;</span>
                                            </span>
                                        </a>

                                        <div class="website-nav__mega-panel">
                                            <div class="website-nav__mega-panel-header">
                                                <span class="website-nav__mega-panel-label">Selected Region</span>
                                                <h4 class="website-nav__mega-panel-title">{{ $reg['name'] }}</h4>
                                                <p class="website-nav__mega-intro">{{ $reg['intro'] ?? 'Explore curated Himalayan trekking routes in this region.' }}</p>
                                            </div>

                                            <div class="website-nav__mega-panel-routes">
                                                <div class="website-nav__mega-treks-title">Key Routes</div>
                                                <ul class="website-nav__mega-trek-list">
                                                    @foreach($reg['treks'] as $t)
                                                        <li>
                                                            <a href="{{ route('website.treks.show', ['slug' => $t['slug']]) }}" class="website-nav__mega-sublink">
                                                                <span class="website-nav__mega-subname">{{ $t['name'] }}</span>
                                                                <span class="website-nav__mega-subdays">{{ $t['duration_days'] }}d</span>
                                                            </a>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>

                                            <div class="website-nav__mega-panel-actions">
                                                <a href="{{ route('website.destinations.show', ['slug' => $reg['slug']]) }}" class="website-nav__mega-explore">
                                                    Explore {{ $reg['name'] }} &rarr;
                                                </a>
                                                <a href="{{ route('website.treks.index', ['region' => $reg['slug']]) }}" class="website-nav__mega-explore">
                                                    View Routes &rarr;
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            <!-- Bottom Information Bar -->
                            <div class="website-nav__mega-footer">
                                <div class="website-micro website-text-secondary">
                                    <span>Peak Himalayan Seasons: <strong>Autumn (Oct&ndash;Nov)</strong> &bull; <strong>Spring (Mar&ndash;Apr)</strong> &bull; Rain-Shadow Summer: <strong>Mustang</strong></span>
                                </div>
                                <div style="display: flex; gap: var(--space-4); align-items: center;">
                                    <a href="{{ route('website.experiences.index') }}" class="website-link website-micro">Browse by Experience Style &rarr;</a>
                                    <a href="{{ route('website.articles.index') }}" class="website-link website-micro">Trek Preparation Guides &rarr;</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Experiences Link -->
                <div class="website-nav__item">
                    <a href="{{ route('website.experiences.index') }}" class="website-nav__link" {{ request()->routeIs('website.experiences.*') ? 'aria-current="page"' : '' }}>
                        <svg class="website-nav__icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            <circle cx="12" cy="12" r="10"></circle>
                            <polygon points="16.24 7.76 14.12 14.12 7.76 16.24 9.88 9.88 16.24 7.76"></polygon>
                        </svg>
                        <span>Experiences</span>
                    </a>
                </div>

                <!-- Travel Guide Dropdown Menu (Blogs & When to Go merged) -->
                <div class="website-nav__item website-nav__item--dropdown">
                    <a href="{{ route('website.articles.index') }}"
                       class="website-nav__link"
                       {{ (request()->routeIs('website.articles.*') || request()->routeIs('website.months.*')) ? 'aria-current="page"' : '' }}
                       aria-haspopup="true"
                       aria-expanded="false">
                        <svg class="website-nav__icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path>
                            <path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path>
                        </svg>
                        <span>Travel Guide</span>
                        <svg class="website-nav__chevron" width="12" height="12" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenodd"/>
                        </svg>
                    </a>
                    <div class="website-nav__dropdown website-nav__dropdown--guide" role="menu">
                        <div class="website-nav__dropdown-header">
                            <span class="website-nav__dropdown-label">Planning &amp; Preparation</span>
                            <a href="{{ route('website.articles.index') }}" class="website-nav__dropdown-view-all">All Guides &rarr;</a>
                        </div>
                        <div class="website-nav__dropdown-list">
                            <!-- Blogs & Articles -->
                            <a href="{{ route('website.articles.index') }}" class="website-nav__guide-item" role="menuitem">
                                <div class="website-nav__guide-icon-box" aria-hidden="true">
                                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                                        <polyline points="14 2 14 8 20 8"></polyline>
                                        <line x1="16" y1="13" x2="8" y2="13"></line>
                                        <line x1="16" y1="17" x2="8" y2="17"></line>
                                        <polyline points="10 9 9 9 8 9"></polyline>
                                    </svg>
                                </div>
                                <div class="website-nav__guide-main">
                                    <span class="website-nav__guide-title">Blogs &amp; Travel Articles</span>
                                    <span class="website-nav__guide-desc">Practical route guides, gear checklists &amp; acclimatization tips</span>
                                </div>
                                <span class="website-nav__guide-arrow" aria-hidden="true">&rarr;</span>
                            </a>

                            <!-- When to Go (Best Seasons) -->
                            <a href="{{ route('website.months.index') }}" class="website-nav__guide-item" role="menuitem">
                                <div class="website-nav__guide-icon-box" aria-hidden="true">
                                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <rect x="3" y="4" width="18" height="18" rx="0" ry="0"></rect>
                                        <line x1="16" y1="2" x2="16" y2="6"></line>
                                        <line x1="8" y1="2" x2="8" y2="6"></line>
                                        <line x1="3" y1="10" x2="21" y2="10"></line>
                                    </svg>
                                </div>
                                <div class="website-nav__guide-main">
                                    <span class="website-nav__guide-title">When to Go (Best Seasons)</span>
                                    <span class="website-nav__guide-desc">12-month calendar of Himalayan weather windows &amp; crowd levels</span>
                                </div>
                                <span class="website-nav__guide-arrow" aria-hidden="true">&rarr;</span>
                            </a>

                            <!-- Safety & Acclimatization -->
                            <a href="{{ route('website.safety') }}" class="website-nav__guide-item" role="menuitem">
                                <div class="website-nav__guide-icon-box" aria-hidden="true">
                                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
                                        <polyline points="9 12 11 14 15 10"></polyline>
                                    </svg>
                                </div>
                                <div class="website-nav__guide-main">
                                    <span class="website-nav__guide-title">Safety &amp; Acclimatization</span>
                                    <span class="website-nav__guide-desc">Conservative ascent schedules, medical protocols &amp; rescue logistics</span>
                                </div>
                                <span class="website-nav__guide-arrow" aria-hidden="true">&rarr;</span>
                            </a>

                            <!-- Responsible Travel -->
                            <a href="{{ route('website.responsible') }}" class="website-nav__guide-item" role="menuitem">
                                <div class="website-nav__guide-icon-box" aria-hidden="true">
                                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <circle cx="12" cy="12" r="10"></circle>
                                        <path d="M12 2a14.5 14.5 0 0 0 0 20 14.5 14.5 0 0 0 0-20"></path>
                                        <path d="M2 12h20"></path>
                                    </svg>
                                </div>
                                <div class="website-nav__guide-main">
                                    <span class="website-nav__guide-title">Responsible Travel</span>
                                    <span class="website-nav__guide-desc">Leave No Trace principles, porter welfare &amp; community benefits</span>
                                </div>
                                <span class="website-nav__guide-arrow" aria-hidden="true">&rarr;</span>
                            </a>
                        </div>
                        <div class="website-nav__dropdown-footer">
                            <a href="{{ route('website.faqs') }}" class="website-nav__dropdown-footer-action" style="grid-column: 1 / -1; justify-content: space-between; padding: var(--space-3) var(--space-4) !important;">
                                <div style="display: flex; align-items: center; gap: var(--space-2);">
                                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                        <circle cx="12" cy="12" r="10"></circle>
                                        <path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"></path>
                                        <line x1="12" y1="17" x2="12.01" y2="17"></line>
                                    </svg>
                                    <span>Frequently Asked Questions (FAQs)</span>
                                </div>
                                <span>&rarr;</span>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Company Disclosure Dropdown -->
                <div class="website-nav__item website-nav__item--dropdown">
                    <button type="button" class="website-nav__link website-nav__link--button" aria-expanded="false" aria-haspopup="true">
                        <svg class="website-nav__icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                            <circle cx="9" cy="7" r="4"></circle>
                            <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                            <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                        </svg>
                        <span>Company</span>
                        <svg class="website-nav__chevron" width="12" height="12" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenodd"/>
                        </svg>
                    </button>
                    <div class="website-nav__dropdown" role="menu">
                        <a href="{{ route('website.about') }}" class="website-nav__company-item" role="menuitem">
                            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="16" x2="12" y2="12"></line><line x1="12" y1="8" x2="12.01" y2="8"></line></svg>
                            <span>About Us</span>
                        </a>
                        <a href="{{ route('website.guides.index') }}" class="website-nav__company-item" role="menuitem">
                            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5" cy="7" r="4"></circle><polyline points="17 11 19 13 23 9"></polyline></svg>
                            <span>Meet Our Guides</span>
                        </a>
                        <a href="{{ route('website.stories.index') }}" class="website-nav__company-item" role="menuitem">
                            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path></svg>
                            <span>Traveler Stories</span>
                        </a>
                        <a href="{{ route('website.safety') }}" class="website-nav__company-item" role="menuitem">
                            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path></svg>
                            <span>Safety &amp; Support</span>
                        </a>
                        <a href="{{ route('website.responsible') }}" class="website-nav__company-item" role="menuitem">
                            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="12" r="10"></circle><path d="M12 2a14.5 14.5 0 0 0 0 20 14.5 14.5 0 0 0 0-20"></path><path d="M2 12h20"></path></svg>
                            <span>Responsible Travel</span>
                        </a>
                        <a href="{{ route('website.contact') }}" class="website-nav__company-item" role="menuitem">
                            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
                            <span>Contact Us</span>
                        </a>
                    </div>
                </div>
            </nav>

            <!-- Actions: Compare Badge + Plan CTA + Mobile Menu Button -->
            <div class="website-header__actions">
                <!-- Compare Control with Dynamic Count Badge -->
                <a href="{{ route('website.compare') }}" class="website-btn website-btn--outline website-btn--compact" aria-label="Compare Shortlisted Treks">
                    <svg class="website-icon" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <rect x="3" y="3" width="7" height="18"></rect>
                        <rect x="14" y="3" width="7" height="18"></rect>
                    </svg>
                    <span>Compare</span>
                    <span class="website-badge website-badge--primary website-compare-count" style="display: none; padding: 0.15rem 0.45rem; font-size: 0.75rem;">0</span>
                </a>

                <!-- Primary Conversion Action -->
                <a href="{{ route('website.planner.start') }}" class="website-btn website-btn--primary website-btn--compact">
                    <svg class="website-icon" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <circle cx="12" cy="12" r="10"></circle>
                        <polygon points="16.24 7.76 14.12 14.12 7.76 16.24 9.88 9.88 16.24 7.76"></polygon>
                    </svg>
                    <span>Plan My Trek</span>
                </a>

                <!-- Mobile Menu Toggle Button -->
                <button type="button" id="website-mobile-menu-toggle" class="website-btn website-btn--ghost website-btn--icon" aria-label="Open mobile navigation menu" aria-expanded="false" aria-controls="website-mobile-drawer">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <line x1="3" y1="12" x2="21" y2="12"></line>
                        <line x1="3" y1="6" x2="21" y2="6"></line>
                        <line x1="3" y1="18" x2="21" y2="18"></line>
                    </svg>
                </button>
            </div>
        </div>
    </div>
</header>

<!-- Mobile Navigation Drawer -->
<div id="website-mobile-drawer" class="website-drawer" role="dialog" aria-modal="true" aria-label="Mobile Navigation Menu">
    <div class="website-drawer__backdrop" id="website-mobile-backdrop"></div>
    <div class="website-drawer__panel">
        <div style="display: flex; align-items: center; justify-content: space-between; padding-bottom: var(--space-4); border-bottom: 1px solid var(--color-border);">
            <img src="/images/logo.png" alt="EATH Ways Logo" width="130" height="46" style="height: 44px; width: auto;">
            <button type="button" id="website-mobile-menu-close" class="website-btn website-btn--ghost website-btn--icon" aria-label="Close navigation menu">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                    <line x1="18" y1="6" x2="6" y2="18"></line>
                    <line x1="6" y1="6" x2="18" y2="18"></line>
                </svg>
            </button>
        </div>

        <nav class="website-drawer__links" aria-label="Mobile links">
            <a href="{{ route('website.home') }}">
                <svg class="website-drawer__icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="m3 9 9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                <span>Home</span>
            </a>
            <a href="{{ route('website.treks.index') }}">
                <svg class="website-drawer__icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="m2 20 7-10 5 6 4-3 4 7H2z"></path></svg>
                <span>All Treks</span>
            </a>
            <a href="{{ route('website.destinations.index') }}">
                <svg class="website-drawer__icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>
                <span>Destinations</span>
            </a>
            <a href="{{ route('website.experiences.index') }}">
                <svg class="website-drawer__icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="12" r="10"></circle><polygon points="16.24 7.76 14.12 14.12 7.76 16.24 9.88 9.88 16.24 7.76"></polygon></svg>
                <span>Experiences</span>
            </a>
            <a href="{{ route('website.articles.index') }}">
                <svg class="website-drawer__icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line></svg>
                <span>Blogs &amp; Articles</span>
            </a>
            <a href="{{ route('website.months.index') }}">
                <svg class="website-drawer__icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="3" y="4" width="18" height="18" rx="0" ry="0"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                <span>When to Go Calendar</span>
            </a>
            <hr class="website-divider" style="margin: var(--space-3) 0;">
            <a href="{{ route('website.about') }}">
                <svg class="website-drawer__icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="16" x2="12" y2="12"></line><line x1="12" y1="8" x2="12.01" y2="8"></line></svg>
                <span>About Us</span>
            </a>
            <a href="{{ route('website.guides.index') }}">
                <svg class="website-drawer__icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5" cy="7" r="4"></circle><polyline points="17 11 19 13 23 9"></polyline></svg>
                <span>Meet Our Guides</span>
            </a>
            <a href="{{ route('website.stories.index') }}">
                <svg class="website-drawer__icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path></svg>
                <span>Traveler Stories</span>
            </a>
            <a href="{{ route('website.safety') }}">
                <svg class="website-drawer__icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path></svg>
                <span>Safety &amp; Support</span>
            </a>
            <a href="{{ route('website.responsible') }}">
                <svg class="website-drawer__icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="12" r="10"></circle><path d="M12 2a14.5 14.5 0 0 0 0 20 14.5 14.5 0 0 0 0-20"></path><path d="M2 12h20"></path></svg>
                <span>Responsible Travel</span>
            </a>
            <a href="{{ route('website.contact') }}">
                <svg class="website-drawer__icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
                <span>Contact Us</span>
            </a>
            <a href="{{ route('website.style-guide') }}">
                <svg class="website-drawer__icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polygon points="12 2 2 7 12 12 22 7 12 2"></polygon><polyline points="2 17 12 22 22 17"></polyline><polyline points="2 12 12 17 22 12"></polyline></svg>
                <span>Design System</span>
            </a>
        </nav>

        <div style="margin-top: auto; padding-top: var(--space-6); display: flex; flex-direction: column; gap: var(--space-2);">
            <a href="{{ route('website.planner.start', ['mode' => 'discover']) }}" class="website-btn website-btn--accent" style="width: 100%;">
                <svg class="website-icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                    <circle cx="12" cy="12" r="10"></circle>
                    <polygon points="16.24 7.76 14.12 14.12 7.76 16.24 9.88 9.88 16.24 7.76"></polygon>
                </svg>
                <span>Find My Trek</span>
            </a>
            <div style="display: flex; gap: var(--space-2);">
                <a href="{{ route('website.compare') }}" class="website-btn website-btn--outline" style="flex: 1;">
                    <svg class="website-icon" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <rect x="3" y="3" width="7" height="18"></rect>
                        <rect x="14" y="3" width="7" height="18"></rect>
                    </svg>
                    <span>Compare</span>
                </a>
                <a href="{{ route('website.planner.start') }}" class="website-btn website-btn--primary" style="flex: 1;">
                    <svg class="website-icon" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <circle cx="12" cy="12" r="10"></circle>
                        <polygon points="16.24 7.76 14.12 14.12 7.76 16.24 9.88 9.88 16.24 7.76"></polygon>
                    </svg>
                    <span>Plan My Trek</span>
                </a>
            </div>
        </div>
    </div>
</div>
