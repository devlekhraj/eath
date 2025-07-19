<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>E.A.T.H Travel - Explore Adventure Tourism & Hospitality</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link
        href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600&family=Lato:wght@400;700&display=swap"
        rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&family=Mulish:ital,wght@0,200..1000;1,200..1000&display=swap"
        rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet" />

    <style>
        * {
            /* font-family: "DM Sans", sans-serif; */
            font-family: "Poppins", sans-serif;
        }

        .swiper {
            width: 100%;
            height: 600px;
        }

        .swiper-slide {
            position: relative;
            background-position: center;
            background-size: cover;
        }

        .swiper-slide .caption {
            position: absolute;
            bottom: 60px;
            left: 60px;
            color: #fff;
            background: rgba(0, 0, 0, 0.4);
            padding: 20px;
            border-radius: 8px;
        }



        /* Ensure the mega menu aligns with the container */
        /* Center the mega menu and restrict width to container size */
        .navbar .dropdown.position-static .dropdown-menu {

            left: 50%;
            transform: translateX(-50%);
            width: 100%;
            /* max-width: 1140px; */
            border-top-left-radius: 0;
            border-top-right-radius: 0;
            border-bottom-left-radius: 4px;
            border-bottom-right-radius: 4px;
        }

       
    </style>


    @vite(['resources/website/scss/website.scss', 'resources/website/js/website.js'])
</head>

<body>

    <!-- Top Meta Bar -->
    <div class="bg-info">
        <div class="text-light py-2 px-3 d-flex justify-content-between small container">
            <div>
                <i class="fas fa-phone-alt"></i> +977 (986) 098-9998
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
    <nav class="navbar navbar-expand-lg navbar-light bg-white py-3">
        <div class="container">
            <a class="navbar-brand fw-bold text-primary fs-4" href="#">E.A.T.H Travel</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                <ul class="navbar-nav gap-3">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="destinationDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Destinations
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="destinationDropdown" id="destination">
                            <li>
                                <a class="dropdown-item py-2 d-flex align-items-center" href="#">
                                    <div style="width: 20px;">
                                        <i class="fas fa-calendar-day text-info"></i>
                                    </div>
                                    <span class="ms-2">Day Tours</span>
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item py-2 d-flex align-items-center" href="#">
                                    <div style="width: 20px;">
                                        <i class="fas fa-flag text-info"></i>
                                    </div>
                                    <span class="ms-2">Nepal Tours</span>
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item py-2 d-flex align-items-center" href="#">
                                    <div style="width: 20px;">
                                        <i class="fas fa-helicopter text-info"></i>
                                    </div>
                                    <span class="ms-2">Helicopter Tours</span>
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item py-2 d-flex align-items-center" href="#">
                                    <div style="width: 20px;">
                                        <i class="fas fa-hiking text-info"></i>
                                    </div>
                                    <span class="ms-2">Trekking in Nepal</span>
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item py-2 d-flex align-items-center" href="#">
                                    <div style="width: 20px;">
                                        <i class="fas fa-mountain text-info"></i>
                                    </div>
                                    <span class="ms-2">Peak Climbing in Nepal</span>
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item py-2 d-flex align-items-center" href="#">
                                    <div style="width: 20px;">
                                        <i class="fas fa-bolt text-info"></i>
                                    </div>
                                    <span class="ms-2">Adventure Sports in Nepal</span>
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item py-2 d-flex align-items-center" href="#">
                                    <div style="width: 20px;">
                                        <i class="fas fa-ring text-info"></i>
                                    </div>
                                    <span class="ms-2">Destination Wedding in Nepal</span>
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item py-2 d-flex align-items-center" href="#">
                                    <div style="width: 20px;">
                                        <i class="fas fa-utensils text-info"></i>
                                    </div>
                                    <span class="ms-2">Cooking Classes in Kathmandu</span>
                                </a>
                            </li>
                        </ul>


                    </li>


                    <!-- Mega Menu -->
                    <li class="nav-item dropdown position-static">
                        <a class="nav-link dropdown-toggle" href="#" id="megaMenu"
                            data-bs-toggle="dropdown">Trekking in Nepal</a>
                        <div class="dropdown-menu mt-0 p-0 border-0 border-radius-0 shadow-sm mega-menu"
                            aria-labelledby="megaMenu">
                            <div class="container px-4">
                                <div class="py-4">
                                    <div class="row g-4">
                                        <!-- Everest Region -->
                                        <div class="col-md-3">
                                            <h6 class="text-uppercase text-info mb-2 fw-bold">
                                                 Everest Region
                                            </h6>
                                            <ul class="list-unstyled">
                                                <li><a href="#" class="dropdown-item">Everest Base Camp Trek -
                                                        15 Days</a></li>
                                                <li><a href="#" class="dropdown-item">Mount Everest Base Camp
                                                        Trek</a></li>
                                                <li><a href="#" class="dropdown-item">Pikey Peak Trek - 9
                                                        Days</a></li>
                                                <li><a href="#" class="dropdown-item">Footprint Special Everest
                                                        BC Trek - 16 Days</a></li>
                                                <li><a href="#" class="dropdown-item">Everest Base Camp Luxury
                                                        Trek - 13 Days</a></li>
                                                <li><a href="#" class="dropdown-item">Gokyo Lakes & Renjola Pass
                                                        Trek - 15 Days</a></li>
                                                <li><a href="#" class="dropdown-item">Everest Panorama Trek - 8
                                                        Days</a></li>
                                                <li><a href="#" class="dropdown-item">Everest BC Yoga Trek - 16
                                                        Days</a></li>
                                                <li><a href="#" class="dropdown-item">Everest Helicopter Trek -
                                                        13 Days</a></li>
                                                <li><a href="#" class="dropdown-item">Everest Three Pass Trek -
                                                        21 Days</a></li>
                                                <li><a href="#" class="dropdown-item">Everest Chola Pass Trek -
                                                        18 Days</a></li>
                                                <li><a href="#" class="dropdown-item">Everest Base Camp Trek -
                                                        12 Days</a></li>
                                                <li><a href="#" class="dropdown-item">Everest Base Camp via
                                                        Salleri - 18 Days</a></li>
                                            </ul>
                                        </div>

                                        <!-- Annapurna Region -->
                                        <div class="col-md-3">
                                            <h6 class="text-uppercase text-info mb-2 fw-bold">
                                               Annapurna Region
                                            </h6>
                                            <ul class="list-unstyled">
                                                <li><a href="#" class="dropdown-item">Tilicho Lake Trek - 9
                                                        Days</a></li>
                                                <li><a href="#" class="dropdown-item">Ghorepani Poon Hill Trek -
                                                        8 Days</a></li>
                                                <li><a href="#" class="dropdown-item">Mardi Himal Trek - 9
                                                        Days</a></li>
                                                <li><a href="#" class="dropdown-item">Annapurna Circuit &
                                                        Tilicho Lake Trek</a></li>
                                                <li><a href="#" class="dropdown-item">Khopra Danda Trek - 10
                                                        Days</a></li>
                                                <li><a href="#" class="dropdown-item">Nar-Phu Valley Trek - 13
                                                        Days</a></li>
                                                <li><a href="#" class="dropdown-item">ABC with Poonhill - 13
                                                        Days</a></li>
                                                <li><a href="#" class="dropdown-item">Annapurna Circuit Trek -
                                                        13 Days</a></li>
                                                <li><a href="#" class="dropdown-item">Mardi Himal Base Camp Yoga
                                                        Trek</a></li>
                                                <li><a href="#" class="dropdown-item">ABC Trek - 8 Days</a></li>
                                                <li><a href="#" class="dropdown-item">Annapurna Circuit Biking
                                                        Trek - 14 Days</a></li>
                                            </ul>
                                        </div>

                                        <!-- Manaslu & Langtang Region -->
                                        <div class="col-md-3">
                                            <h6 class="text-uppercase text-info mb-2 fw-bold">
                                                Manaslu Region
                                            </h6>
                                            <ul class="list-unstyled">
                                                <li><a href="#" class="dropdown-item">Manaslu Circuit & Tsum
                                                        Valley Trek - 21 Days</a></li>
                                                <li><a href="#" class="dropdown-item">Tsum Valley Trek - 14
                                                        Days</a></li>
                                                <li><a href="#" class="dropdown-item">Manaslu Circuit Trek - 15
                                                        Days</a></li>
                                            </ul>

                                            <h6 class="text-uppercase text-info mt-4 mb-2 fw-bold">
                                               Langtang Region
                                            </h6>
                                            <ul class="list-unstyled">
                                                <li><a href="#" class="dropdown-item">Yala Peak Climbing - 14
                                                        Days</a></li>
                                                <li><a href="#" class="dropdown-item">Langtang Valley Trek - 11
                                                        Days</a></li>
                                                <li><a href="#" class="dropdown-item">Ruby Valley Trek - 12
                                                        Days</a></li>
                                                <li><a href="#" class="dropdown-item">Langtang & Gosaikunda Trek
                                                        - 16 Days</a></li>
                                            </ul>
                                        </div>

                                        <!-- Western & Eastern Region -->
                                        <div class="col-md-3">
                                            <h6 class="text-uppercase text-info mb-2 fw-bold">
                                               Western Region
                                            </h6>
                                            <ul class="list-unstyled">
                                                <li><a href="#" class="dropdown-item">Rara Lake Trek Package - 8
                                                        Days</a></li>
                                                <li><a href="#" class="dropdown-item">Upper Dolpo Circuit Trek -
                                                        26 Days</a></li>
                                                <li><a href="#" class="dropdown-item">API Himal Base Camp Trek -
                                                        17 Days</a></li>
                                                <li><a href="#" class="dropdown-item">Shey Phoksundo Lake Trek -
                                                        11 Days</a></li>
                                                <li><a href="#" class="dropdown-item">Mustang Region Trek &
                                                        Tours</a></li>
                                                <li><a href="#" class="dropdown-item">Upper Mustang Jeep Tour -
                                                        13 Days</a></li>
                                                <li><a href="#" class="dropdown-item">Upper Mustang Trek - 17
                                                        Days</a></li>
                                            </ul>

                                            <h6 class="text-uppercase text-info mt-4 mb-2 fw-bold">
                                               Eastern
                                                Region
                                            </h6>
                                            <ul class="list-unstyled">
                                                <li><a href="#" class="dropdown-item">Kanchenjunga Circuit/Base
                                                        Camp Trek - 20 Days</a></li>
                                            </ul>
                                        </div>
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
                            <li>
                                <a class="dropdown-item py-2 d-flex align-items-center" href="#">
                                    <div style="width: 20px;">
                                        <i class="fas fa-mountain text-info"></i>
                                    </div>
                                    <span class="ms-2">Everest Heli Tour with Kalapatthar Landing</span>
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item py-2 d-flex align-items-center" href="#">
                                    <div style="width: 20px;">
                                        <i class="fas fa-church text-info"></i>
                                    </div>
                                    <span class="ms-2">Muktinath Helicopter Tour</span>
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item py-2 d-flex align-items-center" href="#">
                                    <div style="width: 20px;">
                                        <i class="fas fa-water text-info"></i>
                                    </div>
                                    <span class="ms-2">Gosaikunda Heli Tour</span>
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item py-2 d-flex align-items-center" href="#">
                                    <div style="width: 20px;">
                                        <i class="fas fa-mountain-sun text-info"></i>
                                    </div>
                                    <span class="ms-2">Mount Everest Heli Tour</span>
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item py-2 d-flex align-items-center" href="#">
                                    <div style="width: 20px;">
                                        <i class="fas fa-tree text-info"></i>
                                    </div>
                                    <span class="ms-2">Langtang Valley Heli Tour - Day Tour</span>
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item py-2 d-flex align-items-center" href="#">
                                    <div style="width: 20px;">
                                        <i class="fas fa-hiking text-info"></i>
                                    </div>
                                    <span class="ms-2">Mardi Himal Heli Tour</span>
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item py-2 d-flex align-items-center" href="#">
                                    <div style="width: 20px;">
                                        <i class="fas fa-sun text-info"></i>
                                    </div>
                                    <span class="ms-2">Annapurna Heli Tour</span>
                                </a>
                            </li>
                        </ul>



                    </li>

                    <li class="nav-item">
                        <a class="nav-link fw-semibold" href="#">Travel Guides</a>
                    </li>
                </ul>
            </div>
            <div class="d-flex align-items-center">
                <i class="fas fa-user-circle me-2 text-primary" style="font-size: 2rem"></i>
                <strong class="text-primary">Login</strong>

            </div>

        </div>
    </nav>


    <!-- Swiper Hero Slider -->
    <div class="swiper mySwiper">
        <div class="swiper-wrapper">
            <div class="swiper-slide"
                style="background-image: url('https://images.unsplash.com/photo-1549880181-56a44cf4a9a9')">
                {{-- <div class="caption">
                    <h2>Explore Nepal with E.A.T.H</h2>
                    <p>Adventure, Culture, and Nature Await You</p>
                </div> --}}
            </div>
            <div class="swiper-slide"
                style="background-image: url('https://images.unsplash.com/photo-1507537297725-24a1c029d3ca')">
                {{-- <div class="caption">
                    <h2>Custom Travel Packages</h2>
                    <p>Tailored tours for your perfect vacation</p>
                </div> --}}
            </div>
            <div class="swiper-slide"
                style="background-image: url('https://images.unsplash.com/photo-1596436889106-be35e843f974')">
                {{-- <div class="caption">
                    <h2>Trusted Since 2008</h2>
                    <p>Thousands of happy travelers every year</p>
                </div> --}}
            </div>
        </div>
    </div>

    <!-- Packages Section -->
    <section class="py-5 bg-light">
        <div class="container">
            <h2 class="text-center mb-4">Top Travel Packages</h2>
            <div class="row g-4">
                @foreach (['https://images.unsplash.com/photo-1582719478250-d9a9f6b1458f', 'https://images.unsplash.com/photo-1526778548025-fa2f459cd5c1', 'https://images.unsplash.com/photo-1532911557891-df962f4ff07b'] as $image)
                    <div class="col-md-4">
                        <div class="card h-100 shadow-sm">
                            <img src="{{ $image }}" class="card-img-top" alt="Package Image">
                            <div class="card-body">
                                <h5 class="card-title">Adventure in Nepal</h5>
                                <p class="card-text">Explore the best trails and sights with our guided tours.</p>
                            </div>
                            <div class="card-footer text-end">
                                <a href="#" class="btn btn-primary">View Package</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Recent Activities -->
    <section class="py-5">
        <div class="container">
            <h2 class="text-center mb-4">Recent Activities</h2>
            <div class="row g-4">
                @foreach (['https://images.unsplash.com/photo-1558981033-0ba5eea27270', 'https://images.unsplash.com/photo-1610275924805-56d155c3a7dc', 'https://images.unsplash.com/photo-1543269865-cbf427effbad'] as $activity)
                    <div class="col-md-4">
                        <img src="{{ $activity }}" class="img-fluid rounded shadow-sm" alt="Activity">
                        <h6 class="mt-2">Memorable Trekking Moments</h6>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Blog Section -->
    <section class="py-5 bg-light">
        <div class="container">
            <h2 class="text-center mb-4">Latest from Our Blog</h2>
            <div class="row g-4">
                @foreach (['https://images.unsplash.com/photo-1502920917128-1aa500764ce7', 'https://images.unsplash.com/photo-1499696010184-5dfc46a7c3aa', 'https://images.unsplash.com/photo-1506748686214-e9df14d4d9d0'] as $blog)
                    <div class="col-md-4">
                        <div class="card h-100">
                            <img src="{{ $blog }}" class="card-img-top" alt="Blog">
                            <div class="card-body">
                                <h5 class="card-title">Top Travel Tips</h5>
                                <p class="card-text">Read insights and tips from seasoned travelers and guides.</p>
                            </div>
                            <div class="card-footer">
                                <a href="#" class="text-decoration-none">Read More →</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-dark text-light pt-5 pb-3">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h5>E.A.T.H Travel</h5>
                    <p>Explore Adventure Tourism & Hospitality across Nepal. Trusted since 2008.</p>
                </div>
                <div class="col-md-4">
                    <h6>Quick Links</h6>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-light text-decoration-none">Home</a></li>
                        <li><a href="#" class="text-light text-decoration-none">Packages</a></li>
                        <li><a href="#" class="text-light text-decoration-none">Activities</a></li>
                        <li><a href="#" class="text-light text-decoration-none">Contact</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h6>Contact Us</h6>
                    <p><i class="fas fa-map-marker-alt"></i> Thamel, Kathmandu, Nepal</p>
                    <p><i class="fas fa-phone"></i> +977 9800000000</p>
                    <p><i class="fas fa-envelope"></i> support@eathtravel.com</p>
                </div>
            </div>
            <div class="text-center mt-3">
                &copy; {{ date('Y') }} E.A.T.H Travel. All Rights Reserved.
            </div>
        </div>
    </footer>

    <!-- JS Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script>
        new Swiper(".mySwiper", {
            loop: true,
            autoplay: {
                delay: 4000,
                disableOnInteraction: false,
            },
            effect: "fade",
        });
    </script>

</body>

</html>
