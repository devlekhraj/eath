@extends('website.layout.master')
@section('content')
    <style>
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
         
            width: 100%;
        }

        @media (min-width: 768px) {
            .blog-layout {
                grid-template-columns: minmax(0, 1fr) minmax(0, 320px);
            }
        }
    </style>
    <div class="blog-page-bg">
        <div class="relative mx-auto flex h-full w-full max-w-7xl flex-col items-center justify-end gap-6 px-6 pb-16 pt-24">
            <div class="blog-layout">

                <div class="container py-5 vuetify-pro-tiptap-editor__content view markdown-theme-default">
                    <div>
                        {!! $page->content !!}
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
