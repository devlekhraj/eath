@props(['experience'])

@php
    $image = $experience['image'] ?? \Website\Support\WebsiteAssetRegistry::resolve("experience-{$experience['slug']}", $experience['name']);
@endphp

<article class="website-card website-card--interactive" style="padding: 0; overflow: hidden; position: relative; aspect-ratio: 16/10; display: flex; flex-direction: column; justify-content: flex-end;">
    <a href="{{ route('website.experiences.show', $experience['slug']) }}" style="position: absolute; inset: 0; z-index: 1;" aria-label="Explore {{ $experience['name'] }} Experience"></a>

    <img src="{{ $image['url'] }}"
         alt="{{ $image['alt'] }}"
         width="{{ $image['width'] }}"
         height="{{ $image['height'] }}"
         loading="lazy"
         style="position: absolute; inset: 0; width: 100%; height: 100%; object-fit: cover; z-index: 0;">

    <div style="position: absolute; inset: 0; background: linear-gradient(to top, rgba(0, 0, 0, 0.95) 0%, rgba(0, 0, 0, 0.75) 45%, rgba(0, 0, 0, 0.2) 65%, transparent 75%); z-index: 1;"></div>

    <div style="position: relative; z-index: 2; padding: var(--space-5); color: #ffffff;">
        <span class="website-card-badge" style="display: inline-flex; align-items: center; padding: 0.25rem 0.625rem; background: var(--color-accent, #ff0048); color: var(--color-primary-soft, #f0f9ff); font-size: var(--type-micro); font-weight: 700; letter-spacing: 0.08em; text-transform: uppercase; margin-bottom: var(--space-2); border-radius: 0 !important; border: none;">
            {{ $experience['trek_count'] ?? 0 }} Treks Tagged
        </span>
        <h3 class="website-card-title" style="color: var(--color-primary-vivid, #2FB8FF); font-weight: 600; font-size: 1.25rem; line-height: 1.3; margin-bottom: var(--space-1);">
            {{ $experience['name'] }}
        </h3>
        <p class="website-small" style="color: rgba(255, 255, 255, 0.92); font-size: var(--type-small); font-weight: 400; margin: 0; line-height: 1.45;">
            {{ $experience['intro'] }}
        </p>
    </div>
</article>
