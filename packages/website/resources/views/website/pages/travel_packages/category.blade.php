@extends('website.layout.master')
<style>
    .category-card {
        border-radius: 14px;
        background: linear-gradient(135deg, #ffffff 0%, #d1e8ff 100%);
        /* subtle light gradient */
        padding: 2px;
        /* space for border if needed */
        position: relative;
        transition: transform 0.25s ease, box-shadow 0.25s ease;
        color: #212529;
        /* dark text for readability */
    }

    .category-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 6px 18px rgba(0, 0, 0, 0.08);
        background: linear-gradient(135deg, #ffffff 0%, #e6ebf1 100%);
    }


    .category-card::before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        border-radius: 14px;
        padding: 2px;
        /* thickness of the border */
        background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
        -webkit-mask:
            linear-gradient(#fff 0 0) content-box,
            linear-gradient(#fff 0 0);
        -webkit-mask-composite: destination-out;
        mask-composite: exclude;
        /* For Firefox */
        pointer-events: none;
    }

    .category-card .card-body {
        border-radius: 12px;
        /* background: #f8f9fa; */
        /* inner card background */
        height: 100%;
        padding: 1rem;
    }

    /* .category-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 6px 18px rgba(0, 0, 0, 0.1);
    } */
</style>
@section('content')

    <div>

        @if ($category->travelPackages->count() > 0)
            <div class="container py-5" style="background: radial-gradient(circle at center, #f6faff 40%, #ffffff 100%);">
                <div class="text-center mb-4 py-4">
                    <h2 class="mb-2"><strong>{{ $category->name }}</strong></h2>
                    <p class="text-muted">
                        Explore carefully curated travel experiences within the {{ $category->name }} category.
                    </p>
                </div>


                <div class="row g-4">
                    @foreach ($category->travelPackages as $package)
                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="card border-0  h-100 position-relative package-card">
                                <a href="/packages/{{ $package->slug }}" class="text-decoration-none text-dark">
                                    <img src="{{ $package['image'] }}" alt="{{ $package['name'] }}" class="card-img-top"
                                        style="height: 200px; object-fit: cover; border-top-left-radius: .75rem; border-top-right-radius: .75rem;">

                                    <div class="card-body p-3 d-flex flex-column">
                                        <!-- Title -->
                                        <h6 class="fw-semibold mb-2">{{ $package['name'] }}</h6>

                                        <!-- Price + Rating -->
                                        <div class="d-flex justify-content-between align-items-center mb-2">
                                            <p class="fw-bold text-primary mb-0">
                                                {{ format_price($package['min_price']) }}
                                            </p>
                                            <div class="d-flex align-items-center small text-warning">
                                                @php
                                                    $fullStars = floor($package['rating']);
                                                    $halfStar = $package['rating'] - $fullStars >= 0.5 ? 1 : 0;
                                                    $emptyStars = 5 - $fullStars - $halfStar;
                                                @endphp
                                                @for ($i = 0; $i < $fullStars; $i++)
                                                    <i class="fa-solid fa-star me-1"></i>
                                                @endfor
                                                @if ($halfStar)
                                                    <i class="fa-solid fa-star-half-stroke me-1"></i>
                                                @endif
                                                @for ($i = 0; $i < $emptyStars; $i++)
                                                    <i class="fa-regular fa-star me-1"></i>
                                                @endfor
                                            </div>
                                        </div>

                                        <!-- Duration + People -->
                                        {{-- <div class="d-flex gap-3 text-muted small mb-3">
                                            <div><i class="fa-regular fa-clock me-1"></i> {{ $package['duration'] }}
                                            </div>
                                            <div><i class="fa-solid fa-user-group me-1"></i> {{ $package['people'] }}
                                                People</div>
                                        </div> --}}

                                        <!-- Popular Tag -->
                                        <span
                                            class="badge bg-success position-absolute top-0 end-0 rounded-0 rounded-bottom-start">
                                            Popular
                                        </span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif

        @if ($parentCategories->count() > 0)
            <div class="container my-5">
                <div class="text-center mb-4 py-4">
                    <h2 class="mb-2"><strong>Other Regions</strong></h2>
                    <p class="text-muted">
                        Explore a variety of travel regions and discover packages tailored to your interests.
                    </p>
                </div>


                <div class="row g-4">
                    @foreach ($parentCategories as $parent)
                        <div class="col-12">
                            <div class="border-0 h-100 category-parent">
                                <div class="">
                                    <!-- Parent category -->
                                    {{-- <h5 class="fw-bold d-flex justify-content-between align-items-center mb-3">
                                        <a href="/categories/{{ $parent->slug }}" class="text-dark text-decoration-none">
                                            {{ $parent->name }}
                                        </a>
                                        <span class="badge bg-primary">{{ $parent->packages_count }}</span>
                                    </h5> --}}

                                    <!-- Children -->
                                    @if ($parent->children->count())
                                        <div>
                                            <div class="row">
                                                @foreach ($parent->children as $child)
                                                    <div class="col-6 col-md-4 col-lg-3 mb-4">
                                                        <div class="">
                                                            <a href="/categories/{{ $child->slug }}"
                                                                class="text-decoration-none">
                                                                <div class="category-card">
                                                                    <div class="card-body text-center">
                                                                        <div class="mb-3">
                                                                            <i
                                                                                class="fa-solid fa-mountain-sun fa-2x text-primary"></i>
                                                                        </div>
                                                                        <h6 class="fw-semibold mb-1">{{ $child->name }}
                                                                        </h6>
                                                                        <p class="small mb-0">
                                                                            {{ $child->travel_packages_count ?? '0' }}
                                                                            Packages</p>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif

    </div>

@endsection
