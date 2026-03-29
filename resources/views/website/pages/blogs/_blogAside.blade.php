@php
    $authorName = $blog->author ?: 'Eathways Team';
    $authorBio = $blog->meta_description ?: 'Stories, guides, and tips from the Eathways team.';
    $authorAvatar = $blog->author_avatar
        ?? $blog->author_image
        ?? $blog->author_photo
        ?? asset('images/logo.png');
@endphp

<div class="blog-aside">
    {{-- <div class="aside-card mb-4">
        <div class="aside-section-title">Author Info</div>
        <div class="author-card">
            <img src="{{ $authorAvatar }}" class="author-avatar" alt="{{ $authorName }}" loading="lazy">
            <div>
                <div class="author-name">{{ $authorName }}</div>
                <p class="author-bio">{{ $authorBio }}</p>
                <div class="author-socials">
                    <a class="author-social" href="#" aria-label="Author Facebook" title="Facebook">f</a>
                    <a class="author-social" href="#" aria-label="Author X" title="X">x</a>
                    <a class="author-social" href="#" aria-label="Author Instagram" title="Instagram">ig</a>
                    <a class="author-social" href="#" aria-label="Author LinkedIn" title="LinkedIn">in</a>
                </div>
            </div>
        </div>
    </div> --}}

    {{-- <div class="aside-card mb-4">
        <div class="aside-section-title">Featured Trek</div>
        <a href="#" class="text-decoration-none text-reset">
            <div class="featured-trek">
                <img src="{{ $blog->banner_url ?? ($blog->cover_image ?? '/images/logo.png') }}"
                    class="featured-thumb" alt="Featured trek" loading="lazy">
                <div>
                    <div class="featured-title">Annapurna Panorama Trek</div>
                    <div class="featured-meta">Best season: Oct - Nov · 8 days</div>
                    <div class="featured-cta">View trek details</div>
                </div>
            </div>
        </a>
    </div> --}}

    {{-- <div class="aside-card mb-4">
        <div class="aside-section-title">Quick Facts</div>
        <div class="quick-facts">
            <div class="quick-fact">
                <span class="quick-label">Region</span>
                <span class="quick-value">Nepal Himalayas</span>
            </div>
            <div class="quick-fact">
                <span class="quick-label">Difficulty</span>
                <span class="quick-value">Moderate</span>
            </div>
            <div class="quick-fact">
                <span class="quick-label">Best Time</span>
                <span class="quick-value">Oct - Dec</span>
            </div>
            <div class="quick-fact">
                <span class="quick-label">Ideal For</span>
                <span class="quick-value">First-time trekkers</span>
            </div>
        </div>
    </div> --}}

    @if (!empty($relatedBlogs) && $relatedBlogs->count())
    <div class="aside-card mb-4">
        <div class="aside-section-title">Related Posts</div>
        <div class="related-list">
            @foreach ($relatedBlogs as $item)
                <a href="{{ url('blogs/' . $item->slug) }}" class="text-decoration-none text-reset related-item rounded-lg">
                    <img src="{{ $item->banner_url ?? ($item->cover_image ?? '/images/logo.png') }}"
                        class="related-thumb" alt="{{ $item->title }}" loading="lazy">
                    <div>
                        <div class="related-title">{{ $item->title }}</div>
                        <div class="related-meta">
                            {{ format_date($item->published_at ?? $item->created_at) }}
                        </div>
                        @if (!empty($item->sub_title))
                            <div class="related-excerpt">{{ $item->sub_title }}</div>
                        @endif
                    </div>
                </a>
            @endforeach
        </div>
    </div>
    @endif

    {{-- <div class="aside-card mb-4">
        <div class="aside-section-title">Trip Inquiry</div>
        <div class="cta-card rounded-lg">
            <div class="cta-title">Plan your next trek with us</div>
            <div class="cta-text">Get a custom itinerary and quick answers from our team.</div>
            <a href="{{ url('contact') }}" class="cta-button">Send an inquiry</a>
        </div>
    </div> --}}

    {{-- <div class="aside-card">
        <div class="aside-section-title">Travel Resources</div>
        <div class="resource-list">
            <a href="#" class="resource-link rounded-lg">Packing checklist</a>
            <a href="#" class="resource-link rounded-lg">Altitude safety guide</a>
            <a href="#" class="resource-link rounded-lg">Permits and documents</a>
            <a href="#" class="resource-link rounded-lg">Travel insurance tips</a>
        </div>
    </div> --}}
</div>
