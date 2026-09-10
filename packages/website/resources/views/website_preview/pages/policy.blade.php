@extends('website_preview.layout.master')

@section('title', $policy['title'] . ' | EATH')
@section('meta_description', $policy['intro'])

@section('content')
<div class="website-section">
    <div class="website-container" style="max-width: 900px;">
        <span class="website-badge website-badge--accent">Draft sample</span>
        <h1 class="website-h1" style="margin: var(--space-3) 0 var(--space-4);">{{ $policy['title'] }}</h1>
        <div class="website-card" style="padding: var(--space-4) var(--space-5); margin-bottom: var(--space-8); background: var(--color-background-warm); border: 1px solid var(--color-border);">
            <strong>Website policy layout — not binding terms; professional and business review required before launch.</strong>
        </div>
        <p class="website-lead website-text-secondary" style="max-width: 760px;">{{ $policy['intro'] }}</p>

        <nav aria-label="Policy contents" style="margin: var(--space-8) 0;">
            <h2 class="website-h4">On this page</h2>
            <ol style="line-height: 1.8; padding-left: var(--space-5);">
                @foreach($policy['sections'] as $index => $section)
                    <li><a class="website-link text-primary text-decoration-underline" href="#policy-section-{{ $index + 1 }}">{{ $section['heading'] }}</a></li>
                @endforeach
            </ol>
        </nav>

        <div class="website-policy-reading" style="max-width: 800px;">
            @foreach($policy['sections'] as $index => $section)
                <section id="policy-section-{{ $index + 1 }}" style="padding: var(--space-6) 0; border-top: 1px solid var(--color-border);">
                    <h2 class="website-h3">{{ $section['heading'] }}</h2>
                    <p class="website-body website-text-secondary">{{ $section['body'] }}</p>
                </section>
            @endforeach
        </div>

        <div style="margin-top: var(--space-8); display: flex; gap: var(--space-3); flex-wrap: wrap;">
            <a href="{{ route('website.contact') }}" class="website-btn website-btn--primary">Contact (Website)</a>
            <a href="{{ route('website.home') }}" class="website-btn website-btn--outline">Back to Website Home</a>
        </div>
    </div>
</div>
@endsection
