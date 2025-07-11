<nav class="navbar w-100 pt-3">
    <div class="container-fluid theme-space">
        <div class="row w-100 align-items-center">

            <!-- Brand -->
            <div class="col-6 col-md-2">
                <a class="navbar-brand" href="{{ url('/') }}" aria-label="FatafatSewa - Home">
                    <img src="{{ asset('images/fts-logo.png') }}" alt="FatafatSewa Logo" class="img-fluid"
                        style="max-height: 54px;" width="auto" height="54" loading="lazy">
                </a>
            </div>


            <!-- Search (Large screens only) -->
            <div class="col-6 col-md-6 d-none d-md-block">
                @include('website.layout.navbar._search-input')
            </div>

            <!-- Menu -->
            <div class="col-6 col-md-4 d-flex justify-content-end">
                <ul class="navbar-nav d-flex flex-row gap-3">
                    <li class="nav-item">
                        <a href="#" class="nav-link d-flex align-items-center fw-medium fs-5">
                            <i data-lucide="user" class="text-secondary me-1"></i> <span class="r-nav-item d-none d-md-inline">Account</span>

                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link d-flex align-items-center fw-medium fs-5">
                            <i data-lucide="shopping-bag" class="text-secondary me-1"></i>  <span class="r-nav-item d-none d-md-inline">Cart</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Search (Mobile only) -->
        <div id="nav-on-mobile" class="d-lg-none mt-3 w-100">
            @include('website.layout.navbar._search-input')
        </div>
        
        <div>
            @include('website.layout.navbar._nav_category')
        </div>
        
    </div>
</nav>
