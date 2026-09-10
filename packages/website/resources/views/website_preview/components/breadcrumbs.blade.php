@props(['breadcrumbs' => []])

@if(!empty($breadcrumbs))
<nav aria-label="Breadcrumb" class="website-breadcrumbs">
    <ol itemscope itemtype="https://schema.org/BreadcrumbList">
        @foreach($breadcrumbs as $index => $crumb)
            <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                @if(!empty($crumb['url']) && !$loop->last)
                    <a itemprop="item" href="{{ $crumb['url'] }}">
                        <span itemprop="name">{{ $crumb['label'] }}</span>
                    </a>
                @else
                    <span itemprop="name" aria-current="page">{{ $crumb['label'] }}</span>
                @endif
                <meta itemprop="position" content="{{ $index + 1 }}">
            </li>
        @endforeach
    </ol>
</nav>
@endif
