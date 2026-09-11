@props(['article'])

@php
    $image = $article['image'] ?? \Website\Support\WebsiteAssetRegistry::resolve("article-{$article['slug']}", $article['title']);
@endphp

<article class="website-card website-card--interactive" style="display: flex; flex-direction: column; height: 100%; padding: 0; overflow: hidden; border-radius: 0 !important; box-shadow: none !important;">
    <div style="aspect-ratio: 16/10; overflow: hidden; background: var(--color-background-warm);">
        <img src="{{ $image['url'] }}"
             alt="{{ $image['alt'] }}"
             width="{{ $image['width'] }}"
             height="{{ $image['height'] }}"
             loading="lazy"
             style="width: 100%; height: 100%; object-fit: cover; display: block; border-radius: 0 !important; transition: transform 0.35s ease;">
    </div>

    <div style="padding: var(--space-5); display: flex; flex-direction: column; flex-grow: 1;">
        <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: var(--space-2);">
            <span style="color: var(--color-primary); font-size: 0.75rem; font-weight: 600; letter-spacing: 0.08em; text-transform: uppercase; background: transparent !important; border: none !important; padding: 0 !important;">
                {{ $article['category'] }}
            </span>
            <span class="website-micro website-text-muted">
                {{ $article['updated_date'] ?? 'September 2026' }}
            </span>
        </div>

        <h3 class="website-card-title" style="margin-bottom: var(--space-2);">
            <a href="{{ route('website.articles.show', $article['slug']) }}" class="website-link" style="color: inherit; text-decoration: none;">
                {{ $article['title'] }}
            </a>
        </h3>

        <p class="website-small website-text-secondary" style="margin-bottom: var(--space-4); line-height: 1.5; flex-grow: 1;">
            {{ $article['summary'] }}
        </p>

        <div style="margin-top: auto; padding-top: var(--space-3); border-top: 1px solid var(--color-border); display: flex; align-items: center; justify-content: space-between;">
            <span class="website-micro website-text-muted">
                {{ $article['author_label'] ?? 'EATH Mountain Editorial' }}
            </span>
            <a href="{{ route('website.articles.show', $article['slug']) }}" class="website-btn website-btn--text" style="font-size: var(--type-small); padding: 0; color: var(--color-primary); font-weight: 600; text-decoration: none;">
                Read Guide &rarr;
            </a>
        </div>
    </div>
</article>
