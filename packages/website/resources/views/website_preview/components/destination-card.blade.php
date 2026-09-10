@props(['region'])

@php
    $image = $region['image'] ?? \Website\Support\WebsiteAssetRegistry::resolve("region-{$region['slug']}", $region['name']);
@endphp

<article class="website-card website-card--interactive" style="padding: 0; overflow: hidden; position: relative; aspect-ratio: 4/5; display: flex; flex-direction: column; justify-content: flex-end;">
    <a href="{{ route('website.destinations.show', $region['slug']) }}" style="position: absolute; inset: 0; z-index: 1;" aria-label="Explore {{ $region['name'] }} Region"></a>

    <img src="{{ $image['url'] }}"
         alt="{{ $image['alt'] }}"
         width="{{ $image['width'] }}"
         height="{{ $image['height'] }}"
         loading="lazy"
         style="position: absolute; inset: 0; width: 100%; height: 100%; object-fit: cover; z-index: 0;">

    <div style="position: absolute; inset: 0; background: linear-gradient(to top, rgba(0, 0, 0, 0.92) 0%, rgba(0, 0, 0, 0.7) 25%, rgba(0, 0, 0, 0.15) 45%, transparent 55%); z-index: 1;"></div>

    <div style="position: relative; z-index: 2; padding: var(--space-5); color: #ffffff;">
        <span class="website-badge website-badge--warm" style="background: rgba(255, 255, 255, 0.2); color: #ffffff; border-color: rgba(255, 255, 255, 0.3); margin-bottom: var(--space-2);">
            {{ $region['trek_count'] ?? 0 }} Sample Treks
        </span>
        <h3 class="website-h3" style="color: #ffffff; margin-bottom: var(--space-1);">
            {{ $region['name'] }}
        </h3>
        <p class="website-small" style="color: rgba(255, 255, 255, 0.85); margin: 0; line-height: 1.4;">
            {{ $region['intro'] }}
        </p>
    </div>
</article>
