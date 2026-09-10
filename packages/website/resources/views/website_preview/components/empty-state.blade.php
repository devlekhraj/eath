@props([
    'title' => 'No matches found',
    'message' => 'Try adjusting or clearing your search filters to explore other Himalayan routes.',
    'resetUrl' => null,
    'resetLabel' => 'Reset All Filters',
])

<div class="website-card website-card--warm" style="text-align: center; padding: var(--space-12) var(--space-6); max-width: 600px; margin: var(--space-8) auto;">
    <div style="width: 56px; height: 56px; margin: 0 auto var(--space-4); border-radius: 0; background: var(--color-surface); border: 1px solid var(--color-border); display: grid; place-content: center; color: var(--color-text-muted);">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
            <circle cx="11" cy="11" r="8"></circle>
            <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
        </svg>
    </div>

    <h3 class="website-card-title" style="margin-bottom: var(--space-2);">
        {{ $title }}
    </h3>

    <p class="website-small website-text-secondary" style="margin-bottom: var(--space-6); max-width: 440px; margin-left: auto; margin-right: auto;">
        {{ $message }}
    </p>

    @if($resetUrl)
        <a href="{{ $resetUrl }}" class="website-btn website-btn--outline website-btn--compact">
            {{ $resetLabel }}
        </a>
    @endif
</div>
