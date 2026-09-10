@extends('website_preview.layout.master')

@section('title', ($title ?? 'Website Preview') . ' | EATH Website')

@section('content')
<div class="website-section">
    <div class="website-container">
        <div class="website-card" style="max-width: 720px; margin: 0 auto; text-align: center; padding: var(--space-12) var(--space-8);">
            <span class="website-badge website-badge--accent" style="margin-bottom: var(--space-3);">
                Scheduled for {{ $phase ?? 'Upcoming Phase' }}
            </span>
            <h1 class="website-h2" style="margin-bottom: var(--space-4);">
                {{ $title ?? 'Page in Progress' }}
            </h1>
            <p class="website-body website-text-secondary" style="margin-bottom: var(--space-6); max-width: 540px; margin-left: auto; margin-right: auto;">
                This page route is active and wired into the website navigation contract. Substantive content and custom section components are scheduled for implementation in {{ $phase ?? 'its dedicated phase' }}.
            </p>

            <div style="display: flex; justify-content: center; gap: var(--space-3); flex-wrap: wrap;">
                <a href="{{ route('website.home') }}" class="website-btn website-btn--primary">
                    Return to Website Home
                </a>
                <a href="{{ route('website.style-guide') }}" class="website-btn website-btn--outline">
                    View Design System
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
