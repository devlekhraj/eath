@extends('website_preview.layout.master')

@section('title', 'Website page not found | EATH')

@section('content')
<div class="website-section">
    <div class="website-container" style="max-width: 720px; text-align: center;">
        <span class="website-badge website-badge--accent">404 · Website recovery</span>
        <h1 class="website-h1" style="margin: var(--space-4) 0;">{{ $title }}</h1>
        <p class="website-lead website-text-secondary" style="margin-bottom: var(--space-8);">{{ $message }}</p>
        <div style="display: flex; justify-content: center; gap: var(--space-3); flex-wrap: wrap;">
            <a href="{{ route('website.home') }}" class="website-btn website-btn--primary">Return to website home</a>
            <a href="{{ route('website.treks.index') }}" class="website-btn website-btn--outline">Explore sample treks</a>
        </div>
    </div>
</div>
@endsection
