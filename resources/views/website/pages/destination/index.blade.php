@extends('website.layout.master')
@section('content')

<section class="relative h-[60vh] min-h-[420px] overflow-hidden bg-slate-950 text-white">
    <div class="absolute inset-0">
        <div class="h-full w-full bg-cover bg-center"
            style="background-image: url('{{ $destination->image ?? '/images/logo.png' }}');">
        </div>
        <div class="absolute inset-0 bg-gradient-to-b from-slate-950/20 via-slate-900/50 to-slate-950/60"></div>
    </div>

    <div class="relative mx-auto flex h-full w-full max-w-6xl flex-col items-center justify-center gap-8 px-6 py-12 text-center">

        <h1 class="text-4xl font-semibold tracking-tight uppercase sm:text-5xl lg:text-6xl">
            {{ $destination->name }}
        </h1>
      
    </div>
</section>


    <section class="mx-auto grid w-full max-w-7xl gap-10 px-6 py-12">
        <div class="grid gap-10 lg:grid-cols-[2fr,1fr]">
            <div class="space-y-6">

                @if(!empty($destination->description))
                    <div class="border-slate-200 bg-white p-6 tiptap-container">
                        <h3 class="text-xl font-semibold text-slate-900">About {{ $destination->name }}</h3>
                        <div class="prose prose-slate mt-4 max-w-none vuetify-pro-tiptap-editor__content view markdown-theme-default">
                            {!! $destination->description !!}
                        </div>
                    </div>
                @endif

            </div>

            <aside class="space-y-4">
                <div class="border-slate-200 bg-white p-6">
                    <div class="flex items-center justify-between">
                        <h3 class="text-lg font-semibold text-slate-900">Related treks</h3>
                        <span class="rounded-full bg-slate-100 px-3 py-1 text-xs font-semibold uppercase tracking-wide text-slate-600">
                            {{ $destination->treks?->count() ?? 0 }} options
                        </span>
                    </div>
                    <div class="mt-4 grid gap-3">
                        @forelse($destination->treks as $trek)
                            <a href="{{ route('trek.show', ['destination' => $destination->slug, 'slug' => $trek->slug]) }}"
                                class="group flex gap-4 rounded border border-slate-200 bg-slate-50/70 p-4 transition hover:border-slate-300">
                                <div class="h-16 w-24 flex-shrink-0 overflow-hidden rounded bg-slate-100">
                                    <img src="{{ $trek->image ?? '/images/logo.png' }}" alt="{{ $trek->name }}"
                                        class="h-full w-full object-cover transition group-hover:scale-105">
                                </div>
                                <div class="flex flex-1 items-start justify-between">
                                    <div>
                                        <h4 class="text-base font-semibold text-slate-900 group-hover:text-slate-950">
                                            {{ $trek->name }}
                                        </h4>
                                        <p class="mt-2 text-xs uppercase tracking-[0.2em] text-slate-400">
                                            {{ $trek->slug }}
                                        </p>
                                    </div>
                                    <span class="text-slate-400 group-hover:text-slate-600">↗</span>
                                </div>
                            </a>
                        @empty
                            <p class="text-sm text-slate-500">No treks have been published for this destination yet.</p>
                        @endforelse
                    </div>
                </div>
            </aside>
        </div>
    </section>

@endsection
