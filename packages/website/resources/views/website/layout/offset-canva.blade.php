<style>
    .offcanvas .nav-item {
        margin-bottom: 10px
    }
</style>
<div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasMenu" aria-labelledby="offcanvasMenuLabel">

    <div class="offcanvas-header">
        <div class="">
            <a class="navbar-brand fw-bold text-primary fs-4" href="/">
                <img src="/images/logo.png" alt="" height="70">
            </a>
            <h5 class="fw-bold text-primary mb-0" id="offcanvasMenuLabel">EATH Travel Pvt. Ltd</h5>
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <ul class="nav flex-column">

            <!-- Home -->
            <li class="nav-item">
                <a href="/">Home</a>
            </li>

            <!-- Trekking in Nepal -->
            <li class="nav-item">
                <a class="d-flex justify-content-between align-items-center" data-bs-toggle="collapse"
                    href="#trekkingSubmenu" role="button" aria-expanded="false" aria-controls="trekkingSubmenu">
                    Trekking in Nepal
                    <i class="fa-solid fa-chevron-down ms-2 toggle-icon" data-target="#trekkingSubmenu"></i>
                </a>
                @if (count($trekkingInNepal->children) > 0)
                    <div class="collapse" id="trekkingSubmenu">
                        <ul class="nav flex-column ps-2">
                            @foreach ($trekkingInNepal->children as $region)
                                <li class="mb-3 ms-2">
                                    <a class="text-primary" href="#"
                                        style="font-weight: 500">{{ $region->name }}</a>
                                    @if ($region->travelPackages->count() > 0)
                                        <ul class="nav flex-column">
                                            @foreach ($region->travelPackages as $pack)
                                                <li class="d-flex mb-1">
                                                    <div style="widows: 20px">
                                                        <i class="fas fa-angle-right text-primary me-2"></i>
                                                    </div>
                                                    <div>
                                                        <a style="font-weight: 500; font-size:0.9rem"
                                                            href="/packages/{{ $pack->slug }}"
                                                            class="">{{ $pack->name }}</a>
                                                    </div>
                                                </li>
                                            @endforeach
                                        </ul>
                                    @endif

                                </li>
                            @endforeach
                        </ul>
                    </div>
                @else
                @endif
            </li>

            <!-- Heli Tours -->
            {{-- <li class="nav-item">
                <a class="d-flex justify-content-between align-items-center" data-bs-toggle="collapse"
                    href="#heliToursSubmenu" role="button" aria-expanded="false" aria-controls="heliToursSubmenu">
                    Heli Tours
                    <i class="fa-solid fa-chevron-down ms-2 toggle-icon" data-target="#heliToursSubmenu"></i>
                </a>

            </li> --}}
            <li class="nav-item">
                <a href="/guide-profiles">Guide Profiles</a>
            </li>
            <li class="nav-item">
                <a href="/blogs">Blogs</a>
            </li>
            <li class="nav-item">
                <a href="/about-us">About Us</a>
            </li>
            <li class="nav-item">
                <a href="/faq">FAQs</a>
            </li>

        </ul>
    </div>
</div>
