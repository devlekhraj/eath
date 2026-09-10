@props(['story'])

@php
    $image = $story['image'] ?? \Website\Support\WebsiteAssetRegistry::resolve($story['image_key'] ?? "story-{$story['id']}", $story['title']);
    $trek = $story['trek'] ?? \Website\Services\WebsiteCatalogRepository::findTrek($story['trek_id']);
@endphp

<article class="website-card website-card--interactive" style="display: flex; flex-direction: column; height: 100%; padding: 0; overflow: hidden;">
    <div style="aspect-ratio: 16/10; overflow: hidden; background: var(--color-background-warm);">
        <img src="{{ $image['url'] }}"
             alt="{{ $image['alt'] }}"
             width="{{ $image['width'] }}"
             height="{{ $image['height'] }}"
             loading="lazy"
             style="width: 100%; height: 100%; object-fit: cover; display: block;">
    </div>

    <div style="padding: var(--space-5); display: flex; flex-direction: column; flex-grow: 1;">
        <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: var(--space-2);">
            <span class="website-badge website-badge--accent" style="font-size: 0.7rem;">
                Fictional website narrative
            </span>
            @if($trek)
                <span class="website-micro website-text-muted">
                    {{ $trek['name'] }}
                </span>
            @endif
        </div>

        <h3 class="website-card-title" style="margin-bottom: var(--space-2);">
            <a href="{{ route('website.stories.show', $story['slug']) }}" class="website-link" style="color: inherit;">
                {{ $story['title'] }}
            </a>
        </h3>

        <p class="website-small website-text-secondary" style="margin-bottom: var(--space-4); line-height: 1.5; flex-grow: 1;">
            {{ $story['summary'] }}
        </p>

        <div style="margin-top: auto; padding-top: var(--space-3); border-top: 1px solid var(--color-border); display: flex; align-items: center; justify-content: space-between;">
            <span class="website-micro website-text-secondary">
                Story by {{ $story['traveler_name'] }}
            </span>
            <span class="website-btn website-btn--text" style="font-size: var(--type-small);">
                Read Story &rarr;
            </span>
        </div>
    </div>
</article>
