@extends('website.layout.master')
<style>
    .accordion-button:not(.collapsed) {
        color: var(--bs-accordion-active-color);
        background-image: linear-gradient(90deg, #afddf8, #9cc8f8);
        background-size: 100% 100%;
        background-repeat: no-repeat;
        box-shadow: inset 0 calc(-1 * var(--bs-accordion-border-width)) 0 var(--bs-accordion-border-color);
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
                                <div class="mb-5">
                                    @if (!empty($package->highlights))
                                        <div class="p-4 rounded shadow-sm text-dark"
                                            style="background: linear-gradient(359deg, #f9fbff 10%, #d7eaff 100%); border: 1px solid #a7c7ff;">
                                            <h5 class="mb-4 fw-bold text-info d-flex align-items-center"
                                                style="letter-spacing: 0.05em;">
                                                <i class="fas fa-mountain-sun me-3 fs-4 text-info"></i>
                                                Trip Highlights
                                            </h5>

                                            <div class="row gy-4">
                                                @foreach ($package->highlights as $highlight)
                                                    <div class="col-12 col-md-4">
                                                        <div class="d-flex align-items-start gap-3">
                                                            <div class="bg-white rounded-circle shadow-sm d-flex justify-content-center align-items-center"
                                                                style="height: 50px; width: 50px; overflow: hidden; flex-shrink: 0;">
                                                                <img src="{{ $highlight->icon_url }}"
                                                                    alt="{{ $highlight->highlight_name }}"
                                                                    style="height: 30px; width: 30px; object-fit: contain;">
                                                            </div>
                                                            <div>
                                                                <p class="mb-1 text-info fw-semibold"
                                                                    style="font-size: 15px; letter-spacing: 0.4px;">
                                                                    {{ $highlight->highlight_name }}
                                                                </p>
                                                                <p class="mb-0"
                                                                    style="font-size: 14.5px; font-weight: 400; line-height: 1.6;">
                                                                    {{ $highlight->description }}
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>

                                            <!-- Review summary -->
                                            <div class="mt-5 d-flex align-items-center flex-wrap gap-3 border-top pt-3">
                                                <span class="badge bg-warning text-dark fs-6 px-3 py-2 shadow-sm">4.5</span>
                                                <div class="text-warning fs-5 d-flex gap-1" aria-label="Star rating">
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star-half-alt"></i>
                                                    <i class="far fa-star"></i>
                                                </div>
                                                <p class="mb-0 text-muted" style="font-size: 14px;">
                                                    Based on <strong>73</strong> verified reviews
                                                </p>
                                            </div>
                                        </div>
                                    @endif
                                </div>



                                <div>



                                    <div class="vuetify-pro-tiptap-editor__content view markdown-theme-default">
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
                                                                aria-controls="collapse{{ $key }}"
                                                                style="font-size: 1.15rem; gap: 0.75rem; padding: 1rem 1.25rem; border-radius: 0.5rem;">
                                                                <span
                                                                    class="d-flex justify-content-center align-items-center bg-info text-white rounded-circle"
                                                                    style="width: 38px; height: 38px;">
                                                                    <i class="fas fa-map-marker-alt fs-5"></i>
                                                                </span>
                                                                {{ $itinery->title }}
                                                            </button>
                                                        </h2>

                                                        <div id="collapse{{ $key }}"
                                                            class="accordion-collapse collapse"
                                                            aria-labelledby="heading{{ $key }}"
                                                            data-bs-parent="#itineraryAccordion">
                                                            <div class="accordion-body px-4 pb-4 pt-3 vuetify-pro-tiptap-editor__content view markdown-theme-default"
                                                                style="font-size: 1rem; line-height: 1.6;">
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

                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-4">
                            <div style="position: sticky; top:0" class="border rounded p-4">

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
                                            <div class="card border-0 shadow-sm mb-4"
                                                style="background: linear-gradient(90deg, #e3f2fd, #f1f8e9);">
                                                <div class="card-body d-flex align-items-start">
                                                    <div class="me-3">
                                                        <i class="fa-solid fa-tag fs-3 text-primary"></i>
                                                    </div>
                                                    <div>
                                                        <h5 class="mb-1 fw-semibold text-dark">
                                                            Economy Price: <p
                                                                class="text-success">{{ format_price($package->economyPrice->price) }}</p>
                                                        </h5>
                                                        <p class="mb-0 text-muted small">
                                                            {{ $package->economyPrice->description }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif

                                        {{-- CTA Button --}}
                                        <div>
                                            <a href="javascript:void(0)" class="btn w-100 text-white fw-semibold py-3"
                                                style="background: linear-gradient(90deg, #0d6efd, #6610f2); border: none; border-radius: 0.5rem;">
                                                Inquire Now <i class="fa-solid fa-arrow-right ms-2"></i>
                                            </a>
                                        </div>

                                    </div>
                                @endif

                            </div>
                        </div>
                    </div>





                </div>
            </div>
        </div>
    </div>

@endsection
