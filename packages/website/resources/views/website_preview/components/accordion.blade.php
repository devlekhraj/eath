@props(['items' => []])

<div class="website-accordion" style="display: flex; flex-direction: column; gap: var(--space-3);">
    @foreach($items as $item)
        <details class="website-card" style="padding: 0; overflow: hidden; border-radius: var(--radius-md);">
            <summary style="padding: var(--space-4) var(--space-5); font-weight: 500; font-size: var(--type-body); color: var(--color-text); cursor: pointer; list-style: none; display: flex; align-items: center; justify-content: space-between; user-select: none;">
                <span>{{ $item['title'] ?? $item['question'] ?? '' }}</span>
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" style="transition: transform var(--transition-fast); flex-shrink: 0; margin-left: var(--space-3);">
                    <polyline points="6 9 12 15 18 9"></polyline>
                </svg>
            </summary>
            <div style="padding: 0 var(--space-5) var(--space-5); color: var(--color-text-secondary); font-size: var(--type-small); line-height: 1.6; border-top: 1px solid var(--color-border); margin-top: -1px; padding-top: var(--space-4);">
                {!! $item['content'] ?? $item['answer'] ?? '' !!}
            </div>
        </details>
    @endforeach
</div>
