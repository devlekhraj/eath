@extends('website_preview.layout.master')

@section('title', 'Frequently Asked Questions (Website) | EATH')
@section('meta_description', 'Search sample EATH planning questions and answers in the website preview.')

@section('content')
<div class="website-section">
    <div class="website-container" style="max-width: 900px;">
        <img src="{{ $heroImage['url'] }}" alt="{{ $heroImage['alt'] }}" width="{{ $heroImage['width'] }}" height="{{ $heroImage['height'] }}" loading="eager" decoding="async" style="width:100%; height:auto; aspect-ratio:16/9; object-fit:cover; margin-bottom:var(--space-8);">
        @include('website_preview.components.section-heading', [
            'eyebrow' => 'Website FAQ',
            'title' => 'Frequently Asked Questions',
            'subtitle' => 'Browse sample answers about choosing, planning and comparing illustrative trek ideas. Nothing here is legal, medical or operational advice.',
            'level' => 'h1',
        ])

        <form method="GET" action="{{ route('website.faqs') }}" role="search" style="display: flex; gap: var(--space-3); flex-wrap: wrap; margin-bottom: var(--space-8);">
            <label for="faq-search" class="website-sr-only">Search questions</label>
            <input id="faq-search" name="q" value="{{ $query }}" type="search" maxlength="120" placeholder="Search questions" class="website-input" style="flex: 1 1 260px;">
            @if($category !== '')<input type="hidden" name="category" value="{{ $category }}">@endif
            <button type="submit" class="website-btn website-btn--primary">Search</button>
            @if($query !== '' || $category !== '')
                <a href="{{ route('website.faqs') }}" class="website-btn website-btn--outline">View all</a>
            @endif
        </form>

        <nav aria-label="FAQ categories" style="display: flex; flex-wrap: wrap; gap: var(--space-2); margin-bottom: var(--space-8);">
            <a href="{{ route('website.faqs', $query !== '' ? ['q' => $query] : []) }}" class="website-btn website-btn--{{ $category === '' ? 'primary' : 'outline' }} website-btn--compact">All questions ({{ array_sum($categories) }})</a>
            @foreach($categories as $key => $count)
                <a href="{{ route('website.faqs', array_filter(['q' => $query, 'category' => $key])) }}" class="website-btn website-btn--{{ $category === $key ? 'primary' : 'outline' }} website-btn--compact">{{ ucfirst($key) }} ({{ $count }})</a>
            @endforeach
        </nav>

        @if(count($faqs) === 0)
            @include('website_preview.components.empty-state', ['title' => 'No sample questions found', 'message' => 'Try another search or view all FAQ categories.', 'resetUrl' => route('website.faqs'), 'resetLabel' => 'Clear search'])
        @else
            <div class="website-faq-list" aria-label="Frequently asked questions">
                @foreach($faqs as $faq)
                    <details id="faq-{{ $faq['id'] }}" style="border-bottom: 1px solid var(--color-border); padding: var(--space-4) 0;">
                        <summary style="cursor: pointer; min-height: 44px; display: flex; align-items: center; justify-content: space-between; gap: var(--space-4); font-size: var(--type-body); font-weight: 500;">
                            <span>{{ $faq['question'] }}</span><span aria-hidden="true">+</span>
                        </summary>
                        <p class="website-body website-text-secondary" style="max-width: 760px; margin: var(--space-3) 0 0;">{{ $faq['answer'] }}</p>
                    </details>
                @endforeach
            </div>
        @endif

        <section style="margin-top: var(--space-12); padding-top: var(--space-8); border-top: 1px solid var(--color-border);">
            <h2 class="website-h3">Still planning?</h2>
            <p class="website-body website-text-secondary">Ask a sample question through the simulated contact form, or use the guided planner to compare preferences.</p>
            <div style="display: flex; gap: var(--space-3); flex-wrap: wrap;">
                <a href="{{ route('website.contact') }}" class="website-btn website-btn--primary">Contact (Website)</a>
                <a href="{{ route('website.planner.start') }}" class="website-btn website-btn--outline">Plan My Trek</a>
            </div>
        </section>
    </div>
</div>
@endsection
