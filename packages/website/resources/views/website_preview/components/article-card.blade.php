@props(['article'])

@php
    $image = $article['image'] ?? \Website\Support\WebsiteAssetRegistry::resolve("article-{$article['slug']}", $article['title']);
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
            <span class="website-badge website-badge--warm" style="text-transform: capitalize;">
                {{ $article['category'] }}
            </span>
            <span class="website-micro website-text-muted">
                {{ $article['updated_date'] ?? 'September 2030' }}
            </span>
        </div>

        <h3 class="website-card-title" style="margin-bottom: var(--space-2);">
            <a href="{{ route('website.articles.show', $article['slug']) }}" class="website-link" style="color: inherit;">
                {{ $article['title'] }}
            </a>
        </h3>

        <p class="website-small website-text-secondary" style="margin-bottom: var(--space-4); line-height: 1.5; flex-grow: 1;">
            {{ $article['summary'] }}
        </p>

        <div style="margin-top: auto; padding-top: var(--space-3); border-top: 1px solid var(--color-border); display: flex; align-items: center; justify-content: space-between;">
            <span class="website-micro website-text-muted">
                {{ $article['author_label'] ?? 'EATH Website Editorial' }}
            </span>
            <span class="website-btn website-btn--text" style="font-size: var(--type-small);">
                Read Guide &rarr;
            </span>
        </div>
    </div>
</article>
