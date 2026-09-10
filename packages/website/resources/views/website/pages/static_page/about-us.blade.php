@extends('website.layout.master')
@section('content')
    {{-- section banner --}}
    <section class="relative h-[55vh] min-h-[380px] overflow-hidden">
        <div class="absolute inset-0">
            <img src="https://images.unsplash.com/photo-1464822759023-fed622ff2c3b?auto=format&fit=crop&w=1800&q=80"
                alt="Mountain landscape" class="h-full w-full object-cover" />
            <div class="absolute inset-0 bg-gradient-to-b from-slate-950/30 via-slate-900/55 to-slate-950/65"></div>
        </div>

        <div class="relative mx-auto flex h-full w-full max-w-7xl items-end px-6 pb-14">
            <div class="text-white">
                <p class="text-xs uppercase tracking-[0.3em] text-white/80">Who We Are</p>
                <h1 class="mt-3 text-3xl font-semibold sm:text-5xl">About E.A.T.H</h1>
                <p class="mt-3 max-w-2xl text-sm text-white/85 sm:text-base">
                    Meet the people, values, and vision behind every journey we create.
                </p>
            </div>
        </div>
    </section>

    {{-- section page content --}}
    <section class="mx-auto w-full max-w-7xl px-6 py-12">
        <div class="vuetify-pro-tiptap-editor__content view markdown-theme-default">
            <div>
                {!! $page->content !!}
            </div>
        </div>
    </section>
@endsection
