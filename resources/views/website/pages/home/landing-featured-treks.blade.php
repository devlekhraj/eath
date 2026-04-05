<section class="featured-section py-16 sm:py-20 bg-sky-50">
    <div class="featured-inner max-w-7xl mx-auto px-2 sm:px-3 lg:px-4">
        <div class="flex items-end justify-between flex-nowrap gap-6">
            <div>
                <span class="inline-flex items-center text-sm font-semibold text-sky-600">Featured</span>
                <h2 class="mt-3 text-3xl sm:text-4xl font-semibold text-slate-900">Featured Himalayan Treks
                </h2>
                <p class="mt-3 text-base text-slate-600">FHandpicked itineraries with altitude-aware pacing
                    across Nepal's high Himalayas.</p>
            </div>
            <a href="/treks/"
                class="text-sm font-semibold text-slate-900 underline decoration-2 underline-offset-4 hover:text-slate-700">View
                All Himalayan Treks</a>
        </div>
        <div class="mt-10 grid gap-6 md:grid-cols-3">
            @foreach ($packages as $package)
                @include('website.components.trek-card', ['package' => $package])
            @endforeach
          
        </div>
    </div>
</section>
