@extends('website.layout.master')
@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-10">

                <div class="mb-4">
                    <img src="{{ $blog['banner_url'] }}" alt="{{ $blog['title'] }}" title="{{ $blog['title'] }}"
                        class="img-fluid rounded-4 w-100" style="object-fit: contain;">
                </div>

                <div class="px-5">
                    <h1 class="fw-bold mb-3" style="font-size: 2rem;">{{ $blog['title'] }}</h1>

                    <div class="mb-4 text-muted" style="font-size: 0.95rem;">
                        <i class="fas fa-user me-1"></i> By {{ $blog['author'] }} |
                        <i class="fas fa-calendar-alt ms-2 me-1"></i> {{ format_date($blog['published_at']) }}
                    </div>

                    <div class="text-muted vuetify-pro-tiptap-editor__content view markdown-theme-default">
                        {!! $blog['content'] !!}
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
    @if (count($relatedBlogs) > 0)
        <section class="recent-articles-section py-5">
            <div class="container py-5">
                {{-- <div class="text-center mb-5">
            <h2 class="section-title">Recent Articles</h2>
            <p class="section-subtitle">Stay updated with our latest travel stories and tips</p>
        </div> --}}
                <div class="text-center mb-5">
                    <h2 class="fw-bold display-7 text-primary mb-2">Related Blogs</h2>
                    {{-- <p class="text-muted fs-5">Stay updated with our latest travel stories and tips</p> --}}
                </div>
                <div class="row g-4">
                    @foreach ($relatedBlogs as $blog)
                        <div class="col-md-4">
                            <div class="card h-100 article-card">
                                <a href="{{ url('blogs/' . $blog['slug']) }}"
                                    class="text-decoration-none text-dark d-block h-100">
                                    <img src="{{ $blog['banner_url'] }}" class="card-img-top" alt="{{ $blog['title'] }}">
                                    <div class="card-body">
                                        <p class="text-muted small mb-1">
                                            {{ \Carbon\Carbon::parse($blog['published_at'])->format('M d, Y') }}</p>
                                        <h5 class="card-title text-primary">{{ $blog['title'] }}</h5>
                                        <p class="card-text">{{ $blog['sub_title'] }}</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
@endsection
