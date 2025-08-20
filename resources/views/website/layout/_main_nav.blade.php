<div>
    <!-- Top Meta Bar -->
    <div class="bg-info">
        <div class="text-light py-2 px-3 d-flex justify-content-between small container">
            <div>
                <i class="fas fa-phone-alt"></i> +977 (984) 192-7372
                <i class="fas fa-envelope ms-3"></i> info@eathtravel.com
            </div>
            <div>
                <a href="#" class="text-light me-2"><i class="fab fa-facebook-f"></i></a>
                <a href="#" class="text-light me-2"><i class="fab fa-instagram"></i></a>
                <a href="#" class="text-light"><i class="fab fa-youtube"></i></a>
            </div>
        </div>
    </div>
    <!-- Navbar with Mega Menu -->
    {{-- <nav class="navbar navbar-expand-lg py-0" style="background: radial-gradient(circle at center, #f6faff 40%, #ffffff 100%);"> --}}
    <nav class="navbar navbar-expand-lg py-0"
        style="background: radial-gradient(circle at center, #ffffff 40%, #e9faff 100%);">
        <div class="container">
            <a class="navbar-brand fw-bold text-primary fs-4" href="/">
                <img src="/images/logo.png" alt="" height="70">
            </a>
            {{-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button> --}}

            <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                <ul class="navbar-nav gap-3">


                    <!-- Mega Menu -->
                    <li class="nav-item dropdown position-static">
                        <a class="nav-link dropdown-toggle" href="#" id="megaMenu"
                            data-bs-toggle="dropdown">Trekking
                            in Nepal</a>
                        <div class="dropdown-menu mt-0 p-0 border-0 border-radius-0 shadow-sm mega-menu"
                            aria-labelledby="megaMenu">
                            <div class="container px-4">
                                <div class="py-4">
                                    <div class="row g-4">
                                        @if (count($trekkingInNepal->children) > 0)
                                            @foreach ($trekkingInNepal->children as $region)
                                                <div class="col-md-3">
                                                    <h6 class="text-uppercase  mb-2 fw-bold">
                                                        {{ $region->name }}
                                                    </h6>
                                                    <ul class="list-unstyled">
                                                        @foreach ($region->travelPackages as $pack)
                                                            <li><a href="/packages/{{ $pack->slug }}"
                                                                    class="dropdown-item">
                                                                    {{ $pack->name }}</a></li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endforeach
                                        @else
                                            <div class="col-md-3">
                                                <h6 class="text-uppercase  mb-2 fw-bold">
                                                    Manaslu Region
                                                </h6>
                                                <ul class="list-unstyled">
                                                    <li><a href="#" class="dropdown-item">Manaslu Circuit & Tsum
                                                            Valley Trek - 21 Days</a></li>
                                                    <li><a href="#" class="dropdown-item">Tsum Valley Trek - 14
                                                            Days</a></li>
                                                    <li><a href="#" class="dropdown-item">Manaslu Circuit Trek -
                                                            15
                                                            Days</a></li>
                                                </ul>
                                            </div>
                                        @endif

                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>


                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="helicopterDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Helicopter Tours
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="helicopterDropdown" id="helicopter-tours">
                            @if ($helicopterTour && count($helicopterTour->travelPackages) > 0)
                                @foreach ($region->travelPackages as $pack)
                                    <li>
                                        <a href="/packages/{{ $pack->slug }}" class="dropdown-item d-flex align-items-center py-2">
                                            <div style="width: 20px;">
                                                <i class="fas fa-mountain text-info"></i>
                                            </div>
                                            <span class="ps-2"> {{ $pack->name }}</span>
                                        </a>
                                    </li>
                                @endforeach
                            @else
                            @endif
                            
                        </ul>



                    </li>

                    <li class="nav-item">
                        <a class="nav-link fw-semibold" href="/guide-profiles">Guide Profiles</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-semibold" href="/blogs">Blogs</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-semibold" href="/faq">FAQs</a>
                    </li>
                </ul>
            </div>
            <div>
             
                <!-- Navbar Toggler -->

                <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" style="border: 0"
                    data-bs-target="#offcanvasMenu" aria-controls="offcanvasMenu" aria-label="Toggle navigation">
                    <i class="fa-solid fa-bars" style="font-size: 28px;"></i>
                </button>


                <!-- Offcanvas Sidebar -->


            </div>

        </div>
    </nav>
    @include('website.layout.offset-canva')
</div>


<script>
    document.addEventListener("DOMContentLoaded", function() {
        const toggles = document.querySelectorAll(".toggle-icon");

        toggles.forEach(icon => {
            const target = document.querySelector(icon.dataset.target);

            target.addEventListener('show.bs.collapse', function() {
                icon.classList.remove('fa-chevron-down');
                icon.classList.add('fa-chevron-up');
            });

            target.addEventListener('hide.bs.collapse', function() {
                icon.classList.remove('fa-chevron-up');
                icon.classList.add('fa-chevron-down');
            });
        });
    });
</script>
