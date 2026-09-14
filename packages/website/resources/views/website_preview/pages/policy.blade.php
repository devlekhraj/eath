@extends('website_preview.layout.master')

@section('title', ($policy['title'] ?? 'Policy') . ' | EATH Trekking Website')
@section('meta_description', $policy['intro'] ?? 'Official EATH platform operational policy.')

@section('content')
<div class="website-section" style="padding-top: var(--space-6); padding-bottom: var(--space-16);">
    <div class="website-container" style="max-width: 900px;">
        <div style="color: var(--color-accent); font-weight: 600; text-transform: uppercase; letter-spacing: 0.08em; font-size: 0.8rem; margin-bottom: var(--space-2); background: transparent !important; border: none !important; padding: 0 !important;">
            Operational Policy
        </div>

        <h1 class="website-h1" style="margin: 0 0 var(--space-4);">
            {{ $policy['title'] ?? 'Policy' }}
        </h1>

        @php
            $noticeTitle = $policy['notice_title'] ?? null;
            $noticeBody = $policy['notice_body'] ?? 'Website policy layout — not binding terms; professional and business review required before launch.';
        @endphp
        <div class="website-card" style="padding: var(--space-4) var(--space-5); margin-bottom: var(--space-8); background: var(--color-background-warm); border: 1px solid var(--color-border); border-left: 4px solid var(--color-accent); border-radius: 0 !important; box-shadow: none !important;">
            @if(!empty($noticeTitle))
                <strong class="website-small" style="display: block; color: var(--color-text); margin-bottom: 2px;">
                    {{ $noticeTitle }}:
                </strong>
            @endif
            <p class="website-small website-text-secondary" style="margin: 0; line-height: 1.55;">
                {{ $noticeBody }}
            </p>
        </div>

        @if(!empty($policy['intro']))
            <p class="website-lead website-text-secondary" style="max-width: 760px; margin-bottom: var(--space-6);">
                {{ $policy['intro'] }}
            </p>
        @endif

        @if(!empty($policy['sections']) && count($policy['sections']) > 0)
            <nav aria-label="Policy contents" style="margin: var(--space-8) 0; padding: var(--space-5); background: var(--color-surface); border: 1px solid var(--color-border); border-radius: 0 !important;">
                <div style="color: var(--color-primary); font-weight: 600; text-transform: uppercase; letter-spacing: 0.08em; font-size: 0.8rem; margin-bottom: var(--space-2); background: transparent !important; border: none !important; padding: 0 !important;">Table of Contents</div>
                <ol style="line-height: 1.8; padding-left: var(--space-5); margin: 0;">
                    @foreach($policy['sections'] as $index => $section)
                        <li>
                            <a class="website-link text-primary text-decoration-underline" href="#policy-section-{{ $index + 1 }}">
                                {{ $section['heading'] }}
                            </a>
                        </li>
                    @endforeach
                </ol>
            </nav>

            <div class="website-policy-reading" style="max-width: 800px;">
                @foreach($policy['sections'] as $index => $section)
                    <section id="policy-section-{{ $index + 1 }}" style="padding: var(--space-6) 0; border-top: 1px solid var(--color-border);">
                        <h2 class="website-h3" style="margin-bottom: var(--space-3);">
                            {{ $section['heading'] }}
                        </h2>
                        <div class="website-body website-text-secondary" style="line-height: 1.7;">
                            {!! $section['body'] !!}
                        </div>
                    </section>
                @endforeach
            </div>
        @elseif(!empty($policy['body']))
            <div class="website-policy-reading" style="max-width: 800px; padding: var(--space-6) 0; border-top: 1px solid var(--color-border);">
                <div class="website-body website-text-secondary" style="line-height: 1.7;">
                    {!! $policy['body'] !!}
                </div>
            </div>
        @endif

        <div style="margin-top: var(--space-10); display: flex; gap: var(--space-3); flex-wrap: wrap;">
            <a href="{{ route('website.contact') }}" class="website-btn website-btn--primary" style="border-radius: 0 !important;">
                Contact Our Team
            </a>
            <a href="{{ route('website.home') }}" class="website-btn website-btn--outline" style="border-radius: 0 !important;">
                Back to Website Home
            </a>
        </div>
    </div>
</div>
@endsection
