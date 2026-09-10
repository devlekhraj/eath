@props(['trek'])

@php
    $image = $trek['image'] ?? \Website\Support\WebsiteAssetRegistry::resolve("trek-{$trek['id']}", $trek['name']);
    $priceFormatted = \Website\Support\WebsiteMoneyFormatter::format($trek['price_minor']);
@endphp

<article class="website-card" style="display: flex; flex-direction: column; height: 100%; padding: 0; overflow: hidden;">
    <!-- Trek Thumbnail -->
    <div style="position: relative; aspect-ratio: 16/10; overflow: hidden; background: var(--color-background-warm);">
        <img src="{{ $image['url'] }}"
             alt="{{ $image['alt'] }}"
             width="{{ $image['width'] }}"
             height="{{ $image['height'] }}"
             loading="lazy"
             style="width: 100%; height: 100%; object-fit: cover; display: block;">

        <div style="position: absolute; top: var(--space-3); left: var(--space-3); display: flex; gap: var(--space-1);">
            <span class="website-badge website-badge--warm" style="background: rgba(255, 255, 255, 0.92); color: var(--color-text);">
                {{ $trek['duration_days'] }} Days
            </span>
            <span class="website-badge website-badge--warm" style="background: rgba(255, 255, 255, 0.92); color: var(--color-text); text-transform: capitalize;">
                {{ $trek['difficulty'] }}
            </span>
        </div>
    </div>

    <!-- Content Body -->
    <div style="padding: var(--space-5); display: flex; flex-direction: column; flex-grow: 1;">
        <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: var(--space-2);">
            <span class="website-micro website-text-secondary" style="text-transform: uppercase; letter-spacing: 0.05em;">
                {{ $trek['region']['name'] ?? 'Nepal' }}
            </span>
            <span class="website-micro website-text-muted">
                Up to {{ $trek['max_altitude_m'] }}m
            </span>
        </div>

        <h3 class="website-card-title" style="margin-bottom: var(--space-2);">
            <a href="{{ route('website.treks.show', $trek['slug']) }}" class="website-link" style="color: inherit;">
                {{ $trek['name'] }}
            </a>
        </h3>

        <p class="website-small website-text-secondary" style="margin-bottom: var(--space-4); line-height: 1.5; flex-grow: 1;">
            {{ $trek['summary'] }}
        </p>

        <!-- Trek Card Footer: Dedicated Price Row & Balanced 50/50 Actions Row -->
        <div class="website-trek-card__footer">
            <div class="website-trek-card__price-row">
                <div class="website-trek-card__price-val">
                    <span class="website-micro website-text-muted">From</span>
                    <span class="website-trek-card__amount">{{ $priceFormatted }}</span>
                    <span class="website-micro website-text-muted">USD</span>
                </div>
                <span class="website-micro website-text-secondary">per person</span>
            </div>

            <!-- Card Actions: Independent View Trek & Compare Toggle -->
            <div class="website-trek-card__actions">
                <a href="{{ route('website.treks.show', $trek['slug']) }}" class="website-btn website-btn--primary website-trek-card__btn">
                    <svg class="website-icon" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <path d="m2 20 7-10 5 6 4-3 4 7H2z"></path>
                    </svg>
                    <span>View Trek</span>
                </a>
                <a href="{{ route('website.compare', ['treks' => [$trek['id']]]) }}"
                   role="button"
                   class="website-btn website-btn--outline website-compare-btn website-trek-card__btn"
                   data-trek-id="{{ $trek['id'] }}"
                   aria-pressed="false"
                   aria-label="Add {{ $trek['name'] }} to comparison">
                    <svg class="website-icon" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <rect x="3" y="3" width="7" height="18"></rect>
                        <rect x="14" y="3" width="7" height="18"></rect>
                    </svg>
                    <span>Compare</span>
                </a>
            </div>
        </div>
    </div>
</article>
