@props(['guide'])

@php
    $image = $guide['image'] ?? \Website\Support\WebsiteAssetRegistry::resolve($guide['image_key'] ?? "guide-{$guide['id']}", $guide['name'], 400, 400);
@endphp

<article class="website-card" style="display: flex; flex-direction: column; height: 100%; text-align: center; padding: var(--space-6);">
    <div style="width: 120px; height: 120px; margin: 0 auto var(--space-4); border-radius: 0; overflow: hidden; background: var(--color-background-warm); border: 2px solid var(--color-border);">
        <img src="{{ $image['url'] }}"
             alt="{{ $image['alt'] }}"
             width="120"
             height="120"
             loading="lazy"
             style="width: 100%; height: 100%; object-fit: cover;">
    </div>

    <span class="website-badge website-badge--accent" style="margin: 0 auto var(--space-2); font-size: 0.7rem;">
        Fictional website profile
    </span>

    <h3 class="website-card-title" style="margin-bottom: var(--space-1);">
        <a href="{{ route('website.guides.show', $guide['slug']) }}" class="website-link" style="color: inherit;">
            {{ $guide['name'] }}
        </a>
    </h3>

    <span class="website-small website-text-secondary" style="margin-bottom: var(--space-3); font-weight: 500;">
        {{ $guide['role'] }}
    </span>

    <p class="website-small website-text-secondary" style="margin-bottom: var(--space-4); line-height: 1.5; flex-grow: 1;">
        {{ $guide['biography'] }}
    </p>

    <div style="margin-top: auto; padding-top: var(--space-3); border-top: 1px solid var(--color-border);">
        <a href="{{ route('website.guides.show', $guide['slug']) }}" class="website-btn website-btn--outline website-btn--compact" style="width: 100%;">
            View Profile
        </a>
    </div>
</article>
