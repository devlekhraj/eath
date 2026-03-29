@extends('website.layout.master')
@section('content')
    <style>
        body {
            background-color: #fbfdff;
        }

        .blog-page-bg {
            position: relative;
            overflow: hidden;
            background-image:
                radial-gradient(circle at 12% 18%, rgba(14, 165, 233, 0.12), transparent 35%),
                radial-gradient(circle at 88% 10%, rgba(16, 185, 129, 0.12), transparent 32%),
                radial-gradient(circle at 30% 90%, rgba(99, 102, 241, 0.12), transparent 38%),
                radial-gradient(circle at 92% 80%, rgba(251, 191, 36, 0.12), transparent 38%);
        }

        .blog-layout {
            display: grid;
            grid-template-columns: minmax(0, 1fr);
            gap: 2rem;
            width: 100%;
        }

        @media (min-width: 768px) {
            .blog-layout {
                grid-template-columns: minmax(0, 1fr) minmax(0, 320px);
            }
        }

        /* .blog-hero {
                    background: #ffffff;
                } */

        .blog-date {
            font-size: 0.8rem;
            letter-spacing: 0.1em;
            text-transform: uppercase;
            color: #94a3b8;
        }

        .blog-title {
            font-weight: 800;
            letter-spacing: -0.02em;
            color: #0f172a;
            line-height: 1.1;
            font-size: xx-large;
        }

        .blog-subtitle {
            color: #475569;
            font-size: 1.05rem;
            line-height: 1.6;
        }

        .blog-tags {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 0.5rem;
        }

        .blog-tag {
            display: inline-flex;
            align-items: center;
            padding: 0.35rem 0.75rem;
            border-radius: 999px;
            border: 1px solid #e2e8f0;
            background: #f8fafc;
            color: #475569;
            font-size: 0.78rem;
            text-transform: uppercase;
            letter-spacing: 0.08em;
            font-weight: 600;
        }

        .blog-banner {
            overflow: hidden;
        }

        .blog-banner img {
            width: 100%;
            height: auto;
            max-height: 520px;
            object-fit: cover;
            display: block;
        }

        .blog-banner figcaption {
            margin-top: 0.6rem;
            color: #475569;
            font-size: 0.85rem;
            line-height: 1.4;
            font-style: italic;
            text-align: center;
        }

        .blog-content {
            color: #1e293b;
            font-size: 1.05rem;
            line-height: 1.9;
            padding: 0 80px;
        }

        .blog-content h1,
        .blog-content h2,
        .blog-content h3,
        .blog-content h4 {
            color: #0f172a;
            font-weight: 700;
            margin-top: 2rem;
            margin-bottom: 0.75rem;
        }

        .blog-content p {
            margin-bottom: 1.2rem;
        }

        .blog-content ul,
        .blog-content ol {
            padding-left: 1.25rem;
            margin-bottom: 1.2rem;
        }

        .blog-content blockquote {
            border-left: 4px solid #0ea5e9;
            padding: 0.75rem 1.25rem;
            background: #f0f9ff;
            color: #0f172a;
            border-radius: 12px;
            margin: 1.5rem 0;
        }

        .blog-content img {
            max-width: 100%;
            height: auto;
            border-radius: 12px;
            margin: 1.5rem 0;
        }

        .blog-share {
            position: sticky;
            top: 120px;
            display: inline-flex;
            flex-direction: row;
            gap: 0.65rem;
            align-items: center;
            justify-content: center;
            padding: 0.55rem 0.9rem;
            border-radius: 999px;
            border: 1px solid #e2e8f0;
            background: #ffffff;
            color: #94a3b8;
            font-size: 0.72rem;
            text-transform: uppercase;
            letter-spacing: 0.18em;
        }

        .share-btn {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            border: 1px solid #e2e8f0;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            color: #64748b;
            background: #ffffff;
            transition: all 0.2s ease;
            text-decoration: none;
        }

        .share-btn:hover {
            color: #0f172a;
            border-color: #94a3b8;
            transform: translateY(-2px);
            box-shadow: 0 8px 18px rgba(15, 23, 42, 0.12);
        }

        .share-label {
            writing-mode: horizontal-tb;
            transform: none;
            font-weight: 600;
        }

        @media (max-width: 991px) {
            .blog-share {
                position: static;
                flex-direction: row;
                justify-content: center;
                margin-top: 2rem;
                padding: 0.65rem 1rem;
                border-radius: 999px;
            }
        }

        .related-title {
            font-weight: 700;
            letter-spacing: 0.04em;
            text-transform: uppercase;
            font-size: 0.9rem;
            color: #64748b;
        }

        .related-card {
            border: 1px solid #eef2f7;
            border-radius: 16px;
            overflow: hidden;
            background: #ffffff;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .blog-aside .aside-card {
            background: transparent;
            /* border: 1px solid #e5e7eb; */
            border-radius: 16px;
            padding: 1.25rem;
            box-shadow: none;
        }

        .author-card {
            display: flex;
            gap: 1rem;
            align-items: center;
        }

        .author-avatar {
            width: 64px;
            height: 64px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid #e2e8f0;
        }

        .author-name {
            font-weight: 700;
            color: #0f172a;
            margin-bottom: 0.25rem;
        }

        .author-bio {
            color: #475569;
            font-size: 0.92rem;
            line-height: 1.5;
            margin: 0;
        }

        .author-socials {
            display: flex;
            gap: 0.5rem;
            margin-top: 0.75rem;
        }

        .author-social {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            border: 1px solid #e5e7eb;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            color: #475569;
            text-decoration: none;
            font-weight: 700;
            font-size: 0.8rem;
            transition: transform 0.2s ease, border-color 0.2s ease, color 0.2s ease;
        }

        .author-social:hover {
            color: #0f172a;
            border-color: #94a3b8;
            transform: translateY(-2px);
        }

        .aside-section-title {
            font-size: 0.85rem;
            letter-spacing: 0.08em;
            text-transform: uppercase;
            color: #64748b;
            font-weight: 700;
            margin-bottom: 0.75rem;
        }

        .related-list {
            display: grid;
            gap: 0.75rem;
        }

        .related-item {
            display: grid;
            grid-template-columns: 72px 1fr;
            gap: 0.75rem;
            align-items: center;
            padding: 0.6rem;
            min-height: 120px;
            /* border-radius: 12px; */
            /* border: 1px solid #eef2f7; */
            background: #ffffff;
            transition: transform 0.2s ease, box-shadow 0.2s ease, border-color 0.2s ease;
        }

        .related-item:hover {
            transform: translateY(-2px);
            border-color: #cbd5f5;
            box-shadow: 0 10px 18px rgba(15, 23, 42, 0.08);
        }

        .related-thumb {
            width: 72px;
            height: 72px;
            border-radius: 10px;
            object-fit: cover;
        }

        .related-title {
            font-weight: 700;
            color: #0f172a;
            font-size: 0.95rem;
            margin-bottom: 0.2rem;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .related-meta {
            color: #64748b;
            font-size: 0.78rem;
        }

        .related-excerpt {
            color: #475569;
            font-size: 0.85rem;
            margin-top: 0.35rem;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .featured-trek {
            display: grid;
            grid-template-columns: 84px 1fr;
            gap: 0.85rem;
            align-items: center;
            padding: 0.6rem;
            border-radius: 12px;
            border: 1px solid #eef2f7;
            background: #ffffff;
            transition: transform 0.2s ease, box-shadow 0.2s ease, border-color 0.2s ease;
        }

        .featured-trek:hover {
            transform: translateY(-2px);
            border-color: #cbd5f5;
            box-shadow: 0 10px 18px rgba(15, 23, 42, 0.08);
        }

        .featured-thumb {
            width: 84px;
            height: 84px;
            border-radius: 10px;
            object-fit: cover;
        }

        .featured-title {
            font-weight: 700;
            color: #0f172a;
            font-size: 1rem;
            margin-bottom: 0.25rem;
        }

        .featured-meta {
            color: #64748b;
            font-size: 0.82rem;
            margin-bottom: 0.35rem;
        }

        .featured-cta {
            color: #0ea5e9;
            font-weight: 700;
            font-size: 0.85rem;
            text-transform: uppercase;
            letter-spacing: 0.06em;
        }

        .quick-facts {
            display: grid;
            gap: 0.6rem;
        }

        .quick-fact {
            display: flex;
            justify-content: space-between;
            gap: 1rem;
            padding-bottom: 0.6rem;
            border-bottom: 1px dashed #e2e8f0;
        }

        .quick-fact:last-child {
            border-bottom: none;
            padding-bottom: 0;
        }

        .quick-label {
            color: #64748b;
            font-size: 0.82rem;
            text-transform: uppercase;
            letter-spacing: 0.08em;
            font-weight: 700;
        }

        .quick-value {
            color: #0f172a;
            font-weight: 600;
            font-size: 0.9rem;
            text-align: right;
        }

        .cta-card {
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            padding: 1rem;
        }

        .cta-title {
            font-weight: 700;
            color: #0f172a;
            font-size: 1rem;
            margin-bottom: 0.35rem;
        }

        .cta-text {
            color: #475569;
            font-size: 0.9rem;
            margin-bottom: 0.85rem;
        }

        .cta-button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 0.5rem 0.9rem;
            border-radius: 999px;
            background: #0ea5e9;
            color: #ffffff;
            font-weight: 700;
            font-size: 0.82rem;
            text-transform: uppercase;
            letter-spacing: 0.08em;
            text-decoration: none;
        }

        .resource-list {
            display: grid;
            gap: 0.5rem;
        }

        .resource-link {
            display: inline-flex;
            align-items: center;
            justify-content: space-between;
            padding: 0.55rem 0.75rem;
            border: 1px solid #eef2f7;
            color: #0f172a;
            text-decoration: none;
            font-weight: 600;
            font-size: 0.9rem;
            background: #ffffff;
            transition: transform 0.2s ease, border-color 0.2s ease, box-shadow 0.2s ease;
        }

        .resource-link:hover {
            transform: translateY(-2px);
            border-color: #cbd5f5;
            box-shadow: 0 10px 18px rgba(15, 23, 42, 0.08);
        }

        .related-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 16px 30px rgba(15, 23, 42, 0.12);
        }

        .related-card img {
            height: 190px;
            object-fit: cover;
        }

        .related-excerpt {
            color: #64748b;
            font-size: 0.92rem;
            line-height: 1.5;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
    </style>

    @php
        $displayDate = $blog->published_at ?? $blog->created_at;
        $bannerImage = $blog->banner_url ?? ($blog->cover_image ?? '/images/logo.png');
        $tags = !empty($blog->meta_keyword) ? array_filter(array_map('trim', explode(',', $blog->meta_keyword))) : [];
    @endphp
    {{-- <section class="relative h-[70vh] max-h-[400px] overflow-hidden bg-slate-950 text-white">
        <div class="absolute inset-0">
            <div class="h-full w-full bg-cover bg-center"
                style="background-image: url('{{ $bannerImage ?? '/images/logo.png' }}');">
            </div>
            <div class="absolute inset-0 bg-gradient-to-b from-slate-950/20 via-slate-900/50 to-slate-950/60"></div>
        </div>
    </section> --}}

    <div class="blog-page-bg">
        <div class="relative mx-auto flex h-full w-full max-w-7xl flex-col items-center justify-end gap-6 px-6 pb-16 pt-24">
            <div class="blog-layout">
                <div class="blog-main">
                    <div>
                        <section class="blog-hero">
                            <div class="py-5">
                                <div class="mx-auto">
                                    <div class="blog-date mb-2">
                                        {{ $displayDate ? 'Published ' . format_date($displayDate) : '' }}
                                    </div>
                                    <h1 class="blog-title mb-2">{{ $blog->title }}</h1>
                                    @if (!empty($blog->sub_title))
                                        <p class="blog-subtitle mb-3">{{ $blog->sub_title }}</p>
                                    @endif

                                </div>
                            </div>
                        </section>


                        <section>
                            <figure class="blog-banner mb-5">
                                <img src="{{ $bannerImage }}" class="shadow-sm rounded" alt="{{ $blog->title }}" loading="lazy">
                                {{-- <figcaption>{{ $blog }}</figcaption> --}}
                            </figure>
                        </section>

                        <section class="container pb-5">
                            <div class="row justify-content-center">
                                <div class="col-lg-9 col-xl-8">
                                    <div class="blog-content px-10">
                                        {!! $blog->content !!}
                                    </div>
                                </div>
                               
                            </div>
                           
                        </section>

                    </div>
                </div>
                @include('website.pages.blogs._blogAside', ['relatedBlogs' => $relatedBlogs, 'blog' => $blog])
            </div>

        </div>
    </div>
@endsection
