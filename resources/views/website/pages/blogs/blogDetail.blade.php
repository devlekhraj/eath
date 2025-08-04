@extends('website.layout.master')
@section('content')

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">

            <div class="mb-4">
                <img src="{{ $blog['banner_url'] }}"
                    alt="{{ $blog['title'] }}"
                    title="{{ $blog['title'] }}"
                    class="img-fluid rounded-4 w-100"
                    style="object-fit: contain;">
            </div>

            <div class="px-5">
                <h1 class="fw-bold mb-3" style="font-size: 2rem;">{{ $blog['title'] }}</h1>
    
                <div class="mb-4 text-muted" style="font-size: 0.95rem;">
                    <i class="fas fa-user me-1"></i> By {{ $blog['author'] }} |
                    <i class="fas fa-calendar-alt ms-2 me-1"></i> {{ format_date($blog['published_at']) }}
                </div>
    
                <div class="text-muted vuetify-pro-tiptap-editor__content view markdown-theme-default">
                    {!! ($blog['content']) !!}
                </div>
    
                <div class="mt-5">
                    <a href="{{ url('/blogs') }}" class="btn btn-outline-primary rounded-pill px-4">
                        ← Back to Blogs
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
