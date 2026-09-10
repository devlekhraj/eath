@props([
    'eyebrow' => null,
    'title' => '',
    'subtitle' => null,
    'centered' => false,
    'level' => 'h2',
    'actionUrl' => null,
    'actionText' => null,
])

<div class="website-section-heading" style="margin-bottom: var(--space-8); display: flex; flex-wrap: wrap; justify-content: space-between; align-items: flex-end; gap: var(--space-4); {{ $centered ? 'text-align: center; max-width: 720px; margin-left: auto; margin-right: auto; justify-content: center;' : '' }}">
    <div style="max-width: 760px;">
        @if($eyebrow)
            <span class="website-eyebrow" style="margin-bottom: var(--space-2); display: inline-block;">
                {{ $eyebrow }}
            </span>
        @endif

        <{{ $level }} class="{{ $level === 'h1' ? 'website-h1' : ($level === 'h3' ? 'website-h3' : 'website-h2') }}" style="color: var(--color-text); font-weight: 600; text-rendering: optimizeLegibility;">
            {{ $title }}
        </{{ $level }}>

        @if($subtitle)
            <p class="website-body-large website-text-secondary" style="margin-top: var(--space-3); margin-bottom: 0; line-height: 1.6;">
                {{ $subtitle }}
            </p>
        @endif
    </div>

    @if($actionUrl && $actionText && !$centered)
        <a href="{{ $actionUrl }}" class="website-btn website-btn--text" style="font-size: var(--type-small); font-weight: 600; color: var(--color-primary); white-space: nowrap; margin-bottom: var(--space-1);">
            {!! $actionText !!}
        </a>
    @endif
</div>
