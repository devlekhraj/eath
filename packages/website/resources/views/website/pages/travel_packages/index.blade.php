@extends('website.layout.master')
<style>
    .accordion-button:not(.collapsed) {
        color: var(--bs-accordion-active-color);
        background-image: linear-gradient(90deg, #afddf8, #9cc8f8);
        background-size: 100% 100%;
        background-repeat: no-repeat;
        box-shadow: inset 0 calc(-1 * var(--bs-accordion-border-width)) 0 var(--bs-accordion-border-color);
    }



    .trip-highlights-wrapper {
        background: linear-gradient(135deg, #00bcd4 0%, #7e57c2 100%);
        color: white;
    }

    .highlight-card {
        background: #ffffff;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }

    .highlight-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15);
    }

    .icon-circle {
        background: #f1f1f1;
        border-radius: 50%;
        height: 50px;
        width: 50px;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-shrink: 0;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    .icon-circle img {
        height: 28px;
        width: 28px;
        object-fit: contain;
    }


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

    .exclusive-card {
        position: relative;
        border-radius: 0.75rem;
        overflow: hidden;
        /* Premium main gradient */
        background: linear-gradient(135deg, #6a11cb, #2575fc);
        /* purple → blue gradient */
        color: #ffffff;
    }

    .card-inner {
        padding: 1.5rem;
    }

    /* Sections */
    .section {
        margin-bottom: 1.25rem;
    }

    .section:last-child {
        margin-bottom: 0;
    }

    /* Extra info blocks with subtle gradients */
    .info-block {
        background: linear-gradient(90deg, rgba(255, 255, 255, 0.15), rgba(255, 255, 255, 0.05));
        padding: 0.75rem 1rem;
        border-radius: 0.5rem;
        margin-bottom: 0.75rem;
        display: flex;
        align-items: center;
    }

    .info-block i {
        margin-right: 0.5rem;
        color: #ffd700;
        /* gold accent icon */
    }

    .ribbon {
        position: absolute;
        top: 0;
        right: 0;
        padding: 0.25rem 0.75rem;
        font-size: 0.8rem;
        font-weight: 700;
        color: white;
        background: linear-gradient(90deg, #ff9800, #f44336);
        border-bottom-left-radius: 0.5rem;
    }
</style>
@section('content')
    {{-- Banner Section --}}
    @include('website.pages.travel_packages.package-banner', [
        'banners' => $package->images_urls,
    ])

    <div>
        <div class="container py-5">
            <div class="row gy-4">
                {{-- Main Content --}}
                <div class="col-md-12">

                    <div class="row">
                        <div class="col-12 col-md-8">
                            <div>
                                {{-- Package Title --}}
                                <div class="py-4">
                                    <h1 class="mb-3" style="font-weight: 800">{{ $package->name }}</h1>
                                </div>

                                {{-- Highlights Section --}}
                                @if (!empty($package->highlights))
                                    <div class="mb-5 trip-highlights-wrapper rounded-3 overflow-hidden shadow">
                                        <div class="p-4 p-md-5">
                                            <!-- Section Heading -->
                                            <h4 class="mb-4 fw-bold text-white d-flex align-items-center"
                                                style="letter-spacing: 0.05em;">
                                                <i class="fas fa-mountain-sun me-3 fs-4 text-warning"></i>
                                                Trip Highlights
                                            </h4>

                                            <!-- Highlights Grid -->
                                            <div class="row gy-4">
                                                @foreach ($package->highlights as $highlight)
                                                    <div class="col-12 col-md-6 col-lg-4">
                                                        <div
                                                            class="highlight-card h-100 p-3 d-flex align-items-start gap-3 rounded-3">
                                                            <div class="icon-circle">
                                                                <img src="{{ $highlight->icon_url }}"
                                                                    alt="{{ $highlight->highlight_name }}">
                                                            </div>
                                                            <div>
                                                                <p class="mb-1 text-dark fw-semibold"
                                                                    style="font-size: 16px;">
                                                                    {{ $highlight->highlight_name }}
                                                                </p>
                                                                <p class="mb-0 text-muted"
                                                                    style="font-size: 14px; line-height: 1.6;">
                                                                    {{ $highlight->description }}
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>

                                            <!-- Review Summary -->
                                            <div
                                                class="mt-5 pt-4 d-flex align-items-center flex-wrap gap-3 border-top border-white">
                                                <span class="badge bg-warning text-dark fs-6 px-3 py-2 shadow-sm">4.5</span>
                                                <div class="text-warning fs-5 d-flex gap-1" aria-label="Star rating">
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star-half-alt"></i>
                                                    <i class="far fa-star"></i>
                                                </div>
                                                <p class="mb-0 text-white-30" style="font-size: 14px;">
                                                    Based on <strong>73</strong> verified reviews
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                @endif


                                <div>

                                    <div class="content-viewer note-editable-content">
                                        {!! $package->description !!}
                                    </div>

                                    <hr class="pt-4 mb-4">


                                    @if ($package->itineraries->count() > 0)
                                        <div class="mb-5">
                                            <h2 class="fw-bold mb-4 d-flex align-items-center"
                                                style="letter-spacing: 0.07em; color: #222; gap: 0.5rem;">
                                                <i class="fas fa-route text-info fs-3"></i>
                                                Itineraries
                                            </h2>


                                            <div class="accordion" id="itineraryAccordion">
                                                @foreach ($package->itineraries as $key => $itinery)
                                                    <div class="accordion-item mb-4 shadow-sm rounded border border-0"
                                                        style="background: #fff; box-shadow: 0 4px 10px rgb(0 0 0 / 0.05);">
                                                        <h2 class="accordion-header" id="heading{{ $key }}">
                                                            <button
                                                                class="accordion-button collapsed d-flex align-items-center fw-semibold text-dark"
                                                                type="button" data-bs-toggle="collapse"
                                                                data-bs-target="#collapse{{ $key }}"
                                                                aria-expanded="false"
                                                                aria-controls="collapse{{ $key }}" style="">

                                                                <div class="d-flex justify-content-center align-items-center bg-info text-white"
                                                                    style="min-width: 38px; height: 38px; border-radius: 50%;">
                                                                    <i class="fas fa-map-marker-alt fs-5"></i>
                                                                </div>

                                                                <span class="ms-2"> {{ $itinery->title }}</span>
                                                            </button>
                                                        </h2>

                                                        <div id="collapse{{ $key }}"
                                                            class="accordion-collapse collapse"
                                                            aria-labelledby="heading{{ $key }}"
                                                            data-bs-parent="#itineraryAccordion">
                                                            <div
                                                                class="accordion-body px-4 pb-4 pt-3 content-viewer note-editable-content">
                                                                {!! $itinery->description !!}

                                                                @if ($itinery->highlights->isNotEmpty())
                                                                    <div class="mt-4">
                                                                        <div class="row g-4">
                                                                            @foreach ($itinery->highlights as $highlight)
                                                                                <div class="col-12 col-md-4">
                                                                                    <div
                                                                                        class="d-flex align-items-start gap-3">
                                                                                        <div class="flex-shrink-0 rounded bg-light p-2 d-flex justify-content-center align-items-center"
                                                                                            style="width: 48px; height: 48px;">
                                                                                            <img src="{{ $highlight->icon_url }}"
                                                                                                alt="{{ $highlight->highlight_name }}"
                                                                                                style="max-height: 32px; max-width: 32px; object-fit: contain;" />
                                                                                        </div>
                                                                                        <div>
                                                                                            <p class="mb-1 fw-semibold text-muted"
                                                                                                style="font-size: 14px;">
                                                                                                {{ $highlight->highlight_name }}
                                                                                            </p>
                                                                                            <p class="mb-0"
                                                                                                style="font-size: 15px; color: #333;">
                                                                                                {{ $highlight->description }}
                                                                                            </p>
                                                                                        </div>
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


                                    @if ($package->inclusions->count() > 0)
                                        <div class="mb-5 p-4 bg-white rounded shadow-sm border border-success">
                                            <h2 class="fw-bold text-success mb-3" style="letter-spacing: 0.05em;">
                                                What's Included
                                            </h2>
                                            <ul class="list-unstyled ps-3 mb-0">
                                                @foreach ($package->inclusions as $include)
                                                    <li class="d-flex align-items-center mb-3">
                                                        <i class="fas fa-check-circle text-success me-3 fs-5"></i>
                                                        <span class="fw-semibold text-dark">{{ $include->title }}</span>
                                                    </li>
                                                @endforeach

                                            </ul>
                                        </div>
                                    @endif


                                    @if ($package->exclusions->count() > 0)
                                        <div class="mb-4 p-4 bg-white rounded shadow-sm border border-danger">
                                            <h2 class="fw-bold text-danger mb-3" style="letter-spacing: 0.05em;">
                                                What's Not Included
                                            </h2>
                                            <ul class="list-unstyled ps-3 mb-0">

                                                @foreach ($package->exclusions as $exclude)
                                                    <li class="d-flex align-items-center mb-3">
                                                        <i class="fas fa-times-circle text-danger me-3 fs-5"></i>
                                                        <span class="fw-semibold text-dark">{{ $exclude->title }}</span>
                                                    </li>
                                                @endforeach

                                            </ul>
                                        </div>
                                    @endif
                                    {{-- Gallery --}}
                                    @if (count($package->galleries))
                                        <section class="mt-5">
                                            <h3
                                                class="fw-semibold text-primary mb-4 border-start border-4 border-primary ps-3">
                                                Gallery
                                            </h3>
                                            <div class="row g-4">
                                                @foreach ($package->galleries as $image)
                                                    <div class="col-6 col-md-6">
                                                        <div class="ratio ratio-4x3 rounded overflow-hidden gallery-image"
                                                            style="cursor: pointer; transition: box-shadow 0.3s ease;"
                                                            title="Click to enlarge">
                                                            <img src="{{ $image->url }}" alt="Project Image"
                                                                class="rounded" />
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </section>
                                    @endif

                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-4">
                            <div style="position: sticky; top:0" class="border rounded p-4">
                                @if ($package->fixedDeparture)
                                    <div class="mb-5">
                                        <div class="exclusive-card mb-4">
                                            <div class="ribbon">Fixed Departure</div>
                                            <div class="card-inner mt-3">

                                                @php
                                                    $departure = $package->fixedDeparture;
                                                @endphp
                                                <!-- Title & Price -->
                                                <div class="section">
                                                    <div class="mb-3">
                                                        <h5 class="fw-semibold mb-1">{{ $departure->title }}</h5>
                                                        <h2 class="fw-bold mb-0 text-white">
                                                            {{ format_price($departure->price) }}
                                                        </h2>

                                                    </div>
                                                    <p class="small mb-0 mt-1">
                                                        {{ $departure->description }}
                                                    </p>
                                                </div>

                                                <!-- Extra Info -->
                                                <div class="section">
                                                    <div class="info-block">
                                                        <div style="width:30px">
                                                            <i class="fa-solid fa-calendar-check"></i>
                                                        </div>
                                                        <div>

                                                            <span class="fw-semibold">Departure Date:</span>
                                                            <span>12 Oct 2025</span>
                                                        </div>
                                                    </div>

                                                    <div class="info-block">
                                                        <div style="width:30px">
                                                            <i class="fa-solid fa-users"></i>
                                                        </div>
                                                        <div>
                                                            <span class="fw-semibold">Group Size:</span>
                                                            <span>{{ $departure->group_size }} people</span>
                                                        </div>
                                                    </div>

                                                    <div class="info-block">
                                                        <div style="width:30px">
                                                            <i class="fa-solid fa-clock"></i>
                                                        </div>
                                                        <div>
                                                            <span class="fw-semibold">Duration:</span>
                                                            <span>{{ $departure->duration }}</span>
                                                        </div>
                                                    </div>

                                                </div>

                                                <!-- Button -->
                                                <div class="section">
                                                    <button class="btn w-100 text-white fw-semibold py-3 btnOpenModal"
                                                        data-type="featured_packages" data-id="{{ $departure['id'] }}"
                                                        style="background: linear-gradient(90deg, #ff9800, #f44336); border: none; border-radius: 0.5rem;">
                                                        Join Now <i class="fa-solid fa-arrow-right ms-2"></i>
                                                    </button>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                @endif

                                @if ($package->prices->count() > 0)
                                    <div class="">

                                        {{-- Price From --}}
                                        <div class="p-4 rounded shadow-sm mb-4"
                                            style="background: linear-gradient(90deg, #0d6efd, #0dcaf0);">
                                            <p class="mb-1 text-white fw-medium">Price From:</p>
                                            <h2 class="text-white fw-bold">
                                                {{ format_price($package->priceStart->price) }}
                                            </h2>
                                        </div>

                                        {{-- Group Pricing Table --}}
                                        <div class="table-responsive">
                                            <table class="table text-center align-middle rounded overflow-hidden"
                                                style="border-collapse: separate; border-spacing: 0 1rem;">
                                                <thead>
                                                    <tr>
                                                        <th scope="col" class="py-3 px-4 text-primary"
                                                            style="font-weight: 600; font-size: 1.05rem; border-radius: 0.5rem 0 0 0.5rem;">
                                                            No. of People
                                                        </th>
                                                        <th scope="col" class="py-3 px-4 text-primary"
                                                            style="font-weight: 600; font-size: 1.05rem; border-radius: 0 0.5rem 0.5rem 0;">
                                                            Price / Person
                                                        </th>
                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    @foreach ($package->prices as $price)
                                                        <tr
                                                            style="background-color: #ffffff; border-radius: 0.5rem; box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);">
                                                            <td class="py-3 px-4 fw-semibold text-capitalize border-end">
                                                                {{ $price->title }}</td>
                                                            <td class="py-3 px-4 fw-bold text-success">
                                                                {{ format_price($price->price) }}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>

                                        {{-- Economy Price --}}
                                        @if ($package->economyPrice)
                                            <div class="card border-0 shadow-sm mb-2"
                                                style="background: linear-gradient(90deg, #e3f2fd, #f1f8e9);">
                                                <div class="card-body d-flex align-items-start">
                                                    <div class="me-3">
                                                        <i class="fa-solid fa-tag fs-3 text-primary"></i>
                                                    </div>
                                                    <div>
                                                        <h5 class="mb-1 fw-semibold text-dark">
                                                            Economy Price: <p class="text-success">
                                                                {{ format_price($package->economyPrice->price) }}</p>
                                                        </h5>
                                                        <p class="mb-0 text-muted small">
                                                            {{ $package->economyPrice->description }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                        <div class="mb-4">
                                            <div class="">
                                                <button class="btn w-100 text-white fw-semibold py-3 btnOpenModal"
                                                    data-type="travel_packages" data-id="{{ $package['id'] }}"
                                                    style="background: linear-gradient(90deg, #0d6efd, #6610f2); border: none; border-radius: 0.5rem;">
                                                    Check Availability <i class="fa-solid fa-arrow-right ms-2"></i>
                                                </button>
                                            </div>
                                        </div>

                                        {{-- CTA Button --}}

                                    </div>
                                @endif


                            </div>
                        </div>
                    </div>





                </div>
            </div>

        </div>
        @if ($relatedPackages->count() > 0)
            <div class="container py-5" style="background: radial-gradient(circle at center, #f6faff 40%, #ffffff 100%);">
                <div class="text-center mb-4 py-4">
                    <h2 class="mb-2"><strong>Discover Other Treks</strong></h2>
                    <p class="text-muted">
                        Discover more travel experiences you may like, carefully curated for you.
                    </p>
                </div>

                <div class="row g-4">
                    @foreach ($relatedPackages as $package)
                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="card border-0  h-100 position-relative package-card">
                                <a href="/packages/{{ $package->slug }}" class="text-decoration-none text-dark">
                                    <img src="{{ $package['image'] }}" alt="{{ $package['name'] }}"
                                        class="card-img-top"
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

        {{-- @if ($parentCategories->count() > 0)
            <div class="container my-5">
                <div class="text-center mb-4 py-4">
                    <h2 class="mb-2"><strong>Browse by Region</strong></h2>
                    <p class="text-muted">Explore destinations across different regions.</p>
                </div>

                <div class="row g-4">
                    @foreach ($parentCategories as $parent)
                        <div class="col-12">
                            <div class="border-0 h-100 category-parent">
                                <div class="">

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
        @endif --}}

        @if (count($relatedBlogs) > 0)
            <section class="recent-articles-section py-5">
                <div class="container py-5">
                    {{-- <div class="text-center mb-5">
            <h2 class="section-title">Recent Articles</h2>
            <p class="section-subtitle">Stay updated with our latest travel stories and tips</p>
        </div> --}}
                    <div class="mb-4">
                        <h2 class="fw-bold display-7 text-primary mb-2">Blogs</h2>
                        <p class="text-muted">Stay updated with our latest travel stories and tips</p>
                    </div>
                    <div class="row g-4">
                        @foreach ($relatedBlogs as $blog)
                            <div class="col-md-4">
                                <div class="card h-100 article-card">
                                    <a href="{{ url('blogs/' . $blog['slug']) }}"
                                        class="text-decoration-none text-dark d-block h-100">
                                        <img src="{{ $blog['banner_url'] }}" class="card-img-top"
                                            alt="{{ $blog['title'] }}">
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

    </div>

@endsection
