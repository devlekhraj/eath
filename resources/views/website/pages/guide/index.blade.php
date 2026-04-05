@extends('website.layout.master')
@section('content')

{{-- Hero Section remains unchanged --}}
<section class="relative h-[55vh] min-h-[420px] overflow-hidden">
    <div class="absolute inset-0">
        <img src="https://images.unsplash.com/photo-1464822759023-fed622ff2c3b?auto=format&fit=crop&w=1800&q=80"
            alt="Mountain landscape" class="h-full w-full object-cover" />
        <div class="absolute inset-0 bg-gradient-to-b from-slate-950/40 via-slate-900/60 to-slate-950/70"></div>
    </div>
    <div class="relative mx-auto flex h-full w-full max-w-7xl items-end px-6 pb-16">
        <div class="text-white">
            <p class="text-xs uppercase tracking-[0.4em] text-white/70 font-bold mb-2">Our Foundation</p>
            <h1 class="text-4xl font-bold sm:text-6xl tracking-tight mb-4">The Experts Behind Every Peak</h1>
            <p class="max-w-2xl text-lg text-white/80 leading-relaxed">
                Meet our certified guides—the heart of your journey, dedicated to safety, culture, and life-changing mountain experiences.
            </p>
        </div>
    </div>
</section>

<div class="bg-white py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid gap-10 sm:grid-cols-2 lg:grid-cols-3">
            @if (isset($guideList) && count($guideList) > 0)
            @foreach ($guideList as $guide)
            <div class="relative bg-white rounded border border-slate-100 shadow-sm p-10 text-center transition-all duration-500 hover:shadow-2xl hover:-translate-y-2 flex flex-col items-center group h-full">

                {{-- Featured Badge remains --}}
                <div class="absolute top-6 right-6 bg-amber-500 text-white text-[10px] font-black px-3 py-1.5 rounded-full flex items-center gap-1.5 shadow-sm uppercase tracking-widest">
                    <i class="fas fa-crown text-[8px]"></i>
                    Featured
                </div>

                {{-- Avatar --}}
                <div class="relative mb-8">
                    <div class="w-32 h-32 rounded-full overflow-hidden border-[6px] border-slate-50 shadow-inner">
                        <img src="{{ $guide->avatar }}" class="h-full w-full object-cover transition-transform duration-700 group-hover:scale-115" alt="{{ $guide->name }}">
                    </div>
                </div>

                {{-- Name & Title --}}
                <h3 class="text-2xl font-black text-slate-900 mb-1 tracking-tight">{{ $guide->name }}</h3>
                <p class="text-sm font-bold text-sky-600 mb-2 uppercase tracking-wide">
                    {{ $guide->license_number ? 'Senior Trekking Guide' : 'Adventure Specialist' }}
                </p>

                {{-- Location --}}
                <div class="flex items-center gap-1.5 text-xs font-bold text-slate-400 mb-8">
                    <i class="fas fa-map-marker-alt text-slate-300"></i>
                    Nepal, Himalayas
                </div>

                {{-- Stats Row --}}
                <div class="w-full flex items-center justify-between border-t border-slate-50 pt-6 mb-6 mt-auto">
                    <div class="flex items-center gap-1.5">
                        <i class="fas fa-star text-amber-400"></i>
                        <span class="text-sm font-black text-slate-900">{{ round($guide->reviews_avg_rating ?? 4.8, 1) }}</span>
                        <span class="text-xs font-bold text-slate-400">({{ $guide->reviews_count ?? 0 }})</span>
                    </div>
                    <div class="flex items-center gap-1.5 text-slate-500">
                        <i class="far fa-clock text-slate-300"></i>
                        <span class="text-xs font-bold uppercase tracking-wider">{{ $guide->experience_years ?? 12 }} years exp.</span>
                    </div>
                </div>

                {{-- Tags / Languages --}}
                <div class="flex flex-wrap items-center justify-center gap-2 mb-8">
                    @php
                    $tags = is_array($guide->language_spoken) ? $guide->language_spoken : ['English', 'Nepali'];
                    @endphp
                    @foreach(array_slice($tags, 0, 2) as $tag)
                    <span class="px-4 py-1.5 bg-slate-50 text-slate-500 text-[10px] font-black uppercase rounded-full border border-slate-100 tracking-widest">
                        {{ $tag }}
                    </span>
                    @endforeach
                    @if(count($tags) > 2)
                    <span class="text-[10px] font-black text-slate-300 uppercase tracking-widest">+{{ count($tags) - 2 }}</span>
                    @endif
                </div>

                {{-- Social Links Row --}}
               
            </div>
            @endforeach
            @else
            <div class="col-span-full py-20 text-center">
                <p class="text-slate-400 font-bold uppercase tracking-widest text-sm">No guides currently available on this trail.</p>
            </div>
            @endif
        </div>
    </div>
</div>

@endsection