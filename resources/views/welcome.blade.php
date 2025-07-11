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

  <style>
    .swiper {
      width: 100%;
      height: 500px;
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
    .dropdown-menu {
      top: 100%;
      left: 0;
      right: 0;
      background-color: #fff;
    }
    .dropdown-menu h6 {
      font-weight: 600;
      margin-bottom: 0.75rem;
    }
  </style>

  @vite(['resources/scss/website.scss', 'resources/js/website.js'])
</head>
<body>

<!-- Top Meta Bar -->
<div class="bg-dark text-light py-2 px-3 d-flex justify-content-between small">
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

<!-- Navbar with Mega Menu -->
<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
  <div class="container">
    <a class="navbar-brand fw-bold" href="#">E.A.T.H Travel</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item"><a class="nav-link active" href="#">Home</a></li>

        <!-- Mega Menu -->
        <li class="nav-item dropdown position-static">
          <a class="nav-link dropdown-toggle" href="#" id="megaMenu" data-bs-toggle="dropdown">Packages</a>
          <div class="dropdown-menu w-100 mt-0 border-0 shadow" aria-labelledby="megaMenu">
            <div class="container py-4">
              <div class="row">
                <div class="col-md-3">
                  <h6 class="text-uppercase">Adventure</h6>
                  <ul class="list-unstyled">
                    <li><a href="#" class="dropdown-item">Everest Base Camp</a></li>
                    <li><a href="#" class="dropdown-item">Annapurna Circuit</a></li>
                    <li><a href="#" class="dropdown-item">White Water Rafting</a></li>
                  </ul>
                </div>
                <div class="col-md-3">
                  <h6 class="text-uppercase">Cultural</h6>
                  <ul class="list-unstyled">
                    <li><a href="#" class="dropdown-item">Lumbini Tour</a></li>
                    <li><a href="#" class="dropdown-item">Heritage Walks</a></li>
                    <li><a href="#" class="dropdown-item">Temples of Kathmandu</a></li>
                  </ul>
                </div>
                <div class="col-md-3">
                  <h6 class="text-uppercase">Nature</h6>
                  <ul class="list-unstyled">
                    <li><a href="#" class="dropdown-item">Pokhara Getaway</a></li>
                    <li><a href="#" class="dropdown-item">Chitwan Safari</a></li>
                    <li><a href="#" class="dropdown-item">Hiking in Nagarkot</a></li>
                  </ul>
                </div>
                <div class="col-md-3">
                  <h6 class="text-uppercase">Luxury</h6>
                  <ul class="list-unstyled">
                    <li><a href="#" class="dropdown-item">Luxury Helicopter Tours</a></li>
                    <li><a href="#" class="dropdown-item">5-Star Kathmandu</a></li>
                    <li><a href="#" class="dropdown-item">Private Guided Tours</a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </li>

        <li class="nav-item"><a class="nav-link" href="#">Activities</a></li>
        <li class="nav-item"><a class="nav-link" href="#">Blogs</a></li>
        <li class="nav-item"><a class="nav-link" href="#">Contact</a></li>
      </ul>
    </div>
  </div>
</nav>

<!-- Swiper Hero Slider -->
<div class="swiper mySwiper">
  <div class="swiper-wrapper">
    <div class="swiper-slide" style="background-image: url('https://images.unsplash.com/photo-1549880181-56a44cf4a9a9')">
      <div class="caption">
        <h2>Explore Nepal with E.A.T.H</h2>
        <p>Adventure, Culture, and Nature Await You</p>
      </div>
    </div>
    <div class="swiper-slide" style="background-image: url('https://images.unsplash.com/photo-1507537297725-24a1c029d3ca')">
      <div class="caption">
        <h2>Custom Travel Packages</h2>
        <p>Tailored tours for your perfect vacation</p>
      </div>
    </div>
    <div class="swiper-slide" style="background-image: url('https://images.unsplash.com/photo-1596436889106-be35e843f974')">
      <div class="caption">
        <h2>Trusted Since 2008</h2>
        <p>Thousands of happy travelers every year</p>
      </div>
    </div>
  </div>
</div>

<!-- Packages Section -->
<section class="py-5 bg-light">
  <div class="container">
    <h2 class="text-center mb-4">Top Travel Packages</h2>
    <div class="row g-4">
      @foreach ([
          'https://images.unsplash.com/photo-1582719478250-d9a9f6b1458f',
          'https://images.unsplash.com/photo-1526778548025-fa2f459cd5c1',
          'https://images.unsplash.com/photo-1532911557891-df962f4ff07b'
      ] as $image)
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
      @foreach ([
          'https://images.unsplash.com/photo-1558981033-0ba5eea27270',
          'https://images.unsplash.com/photo-1610275924805-56d155c3a7dc',
          'https://images.unsplash.com/photo-1543269865-cbf427effbad'
      ] as $activity)
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
      @foreach ([
          'https://images.unsplash.com/photo-1502920917128-1aa500764ce7',
          'https://images.unsplash.com/photo-1499696010184-5dfc46a7c3aa',
          'https://images.unsplash.com/photo-1506748686214-e9df14d4d9d0'
      ] as $blog)
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
