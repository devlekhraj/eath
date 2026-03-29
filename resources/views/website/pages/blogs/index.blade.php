@extends('website.layout.master')
@section('content')
    <section class="relative h-[60vh] min-h-[420px] overflow-hidden bg-slate-950 text-white">
        <div class="absolute inset-0">
            <div class="h-full w-full bg-cover bg-center"
                style="background-image: url('https://cdn.eathways.com/gallery/2025/08/gokyo-2.png')">
            </div>
            <div class="absolute inset-0 bg-gradient-to-b from-slate-950/20 via-slate-900/50 to-slate-950/60"></div>
        </div>

        <div
            class="relative mx-auto flex h-full w-full max-w-6xl flex-col items-center justify-center gap-8 px-6 py-12 text-center">

            <h1 class="text-4xl font-semibold tracking-tight uppercase sm:text-5xl lg:text-6xl">
                Our Blogs
            </h1>

        </div>
    </section>


    <section class="featured-section py-16 sm:py-20 bg-sky-50">
        <div class="featured-inner max-w-7xl mx-auto px-2 sm:px-3 lg:px-4">
            @php
                $blogCount = is_countable($blogs) ? count($blogs) : 0;
                $cols = $blogCount % 3 === 0 ? 'md:grid-cols-3' : 'md:grid-cols-2';
            @endphp
            <div class="mt-10 grid gap-6 sm:grid-cols-2 {{ $cols }}">
                @foreach ($blogs as $blog)
                    <article class="group overflow-hidden rounded-none">
                        <a href="{{ url('blogs/' . $blog['slug']) }}"
                            class="relative aspect-[16/9] overflow-hidden block rounded-none">
                            <div class="absolute inset-0 bg-cover bg-center transition duration-500 ease-out group-hover:scale-110"
                                style="background-image:url('{{ $blog['banner_url'] }}')">
                            </div>
                            <div
                                class="absolute inset-0 z-10 bg-gradient-to-t from-slate-900/70 via-slate-900/30 to-slate-900/10">
                            </div>
                            {{-- <div
                                class="absolute bottom-3 left-4 z-20 text-xs font-semibold uppercase tracking-[0.2em] text-slate-100">
                                Annapurna
                            </div> --}}
                        </a>
                        <div class="py-4">
                            <div>
                                <h2 class="text-lg font-semibold">{{ $blog['title'] }}</h2>
                            </div>
                            <p class="mt-2 text-sm text-slate-600">{{ $blog['sub_title'] }}</p>
                            <p class="mt-2 text-xs uppercase tracking-[0.15em] text-slate-500">
                                {{ format_date($blog['published_at']) }}</p>
                        </div>
                    </article>
                @endforeach
            </div>
        </div>
    </section>
@endsection
