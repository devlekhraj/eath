
    <style>
        /* ===== HERO BACKGROUND (animated gradient) ===== */
        .hero-bg-gradient {
            position: relative;
            overflow: hidden;
            background: linear-gradient(120deg,
                    #f5fbff 0%,
                    #dff4ff 25%,
                    #b3e5ff 55%,
                    #81cdff 80%,
                    #55b8ff 100%);
            background-size: 200% 200%;
            animation: heroGradientMove 18s ease-in-out infinite;
            /* padding-top: 90px;
            padding-bottom: 90px; */
            width: 100%;
        }

        @keyframes heroGradientMove {
            0% {
                background-position: 0% 50%;
            }

            50% {
                background-position: 100% 50%;
            }

            100% {
                background-position: 0% 50%;
            }
        }

        /* Light decorative circles (cloud-ish) */
        .hero-bg-gradient::before,
        .hero-bg-gradient::after {
            content: "";
            position: absolute;
            border-radius: 999px;
            background: rgba(255, 255, 255, 0.26);
            filter: blur(2px);
            z-index: 0;
        }

        .hero-bg-gradient::before {
            width: 260px;
            height: 260px;
            top: -60px;
            left: -40px;
            opacity: 0.55;
        }

        .hero-bg-gradient::after {
            width: 220px;
            height: 220px;
            bottom: -40px;
            right: 10%;
            opacity: 0.35;
        }

        /* Plane icon + extra shapes */
        .hero-plane,
        .hero-orbit {
            position: absolute;
            z-index: 0;
            opacity: 0.22;
        }

        /* Thin orbit line behind plane */
        .hero-orbit {
            width: 260px;
            height: 260px;
            border-radius: 999px;
            border: 1px dashed rgba(255, 255, 255, 0.7);
            top: 10%;
            right: 8%;
            transform: rotate(-12deg);
        }

        /* Plane itself (Font Awesome) */
        .hero-plane {
            color: #ffffff;
            font-size: 1.8rem;
            top: 16%;
            right: 4%;
            animation: planeFly 14s linear infinite;
        }

        @keyframes planeFly {
            0% {
                transform: translate(60px, 40px) rotate(12deg);
            }

            50% {
                transform: translate(-40px, -10px) rotate(12deg);
            }

            100% {
                transform: translate(60px, 40px) rotate(12deg);
            }
        }

        /* Make sure main content is above shapes */
        .hero-section .container,
        .hero-section .row {
            position: relative;
            z-index: 1;
        }

        /* ===== LAYOUT ===== */
        .hero-section {
            position: relative;
            overflow: hidden;
        }

        .hero-content {
            padding-right: 30px;
        }

        .hero-image-container {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        /* ===== HEADING & TEXT ===== */
        .hero-section h1 {
            line-height: 1.15;
        }

        .text-tagline {
            color: rgb(236, 146, 20) !important;
            letter-spacing: 0.12em;
            font-size: 0.8rem;
            display: inline-block;
            margin-top: 14px;
        }

        .hero-desc {
            font-size: 1.05rem;
            line-height: 1.75;
            color: #1f2933;
            max-width: 94%;
            font-weight: 400;
            letter-spacing: 0.2px;
            opacity: 0.95;
            margin-top: 18px;
        }

        /* Animated gradient text "Are You Ready?" */
        .gradient-text {
            background: linear-gradient(90deg, #00aaff, #007ad6, #f63939);
            background-size: 200% auto;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            display: inline-block;
            animation: gradientMove 3.5s ease-in-out infinite;
        }

        @keyframes gradientMove {
            0% {
                background-position: 0% 50%;
            }

            50% {
                background-position: 100% 50%;
            }

            100% {
                background-position: 0% 50%;
            }
        }

        /* ===== BUTTONS ===== */
        .hero-btn-primary {
            background: linear-gradient(135deg, #0095ff, #006fd6);
            color: #fff !important;
            padding: 12px 26px;
            border-radius: 10px;
            font-weight: 600;
            font-size: 1rem;
            transition: 0.25s ease;
            box-shadow: 0 6px 16px rgba(0, 123, 255, 0.25);
            border: none;
        }

        .hero-btn-primary:hover {
            background: linear-gradient(135deg, #007fe0, #005bb8);
            transform: translateY(-2px);
            color: #fff !important;
        }

        .hero-btn-outline {
            border: 2px solid #0095ff;
            color: #0095ff !important;
            padding: 12px 26px;
            border-radius: 10px;
            font-weight: 600;
            font-size: 1rem;
            transition: 0.25s ease;
            background: transparent;
            box-shadow: 0 0 0 rgba(0, 0, 0, 0);
        }

        .hero-btn-outline:hover {
            background: rgba(0, 149, 255, 0.08);
            transform: translateY(-2px);
            color: #007ad6 !important;
            border-color: #0095ff;
        }

        .btn-icon {
            font-size: 1.1rem;
            line-height: 1;
            display: inline-block;
        }

        /* ===== HERO IMAGE (RIGHT SIDE) ===== */
        .hero-main-image {
            width: 100%;
            max-width: 520px;
            animation: floatEffect 6s ease-in-out infinite;
        }

        @keyframes floatEffect {
            0% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-10px);
            }

            100% {
                transform: translateY(0px);
            }
        }

        /* ===== RESPONSIVE ===== */
        @media (max-width: 992px) {
            .hero-content {
                text-align: center;
                padding-right: 0;
            }

            .hero-desc {
                margin-left: auto;
                margin-right: auto;
            }

            .hero-main-image {
                max-width: 420px;
                margin-top: 30px;
            }

            .hero-bg-gradient {
                padding-top: 60px;
                padding-bottom: 60px;
            }

            .d-flex.gap-3.mt-4 {
                justify-content: center;
                flex-wrap: wrap;
            }
        }
    </style>


    <section class="hero-bg-gradient hero-section">
        <!-- background shapes -->
        <div class="hero-orbit"></div>
        <i class="fa-solid fa-plane-departure hero-plane"></i>

        <div class="container">
            <div class="row align-items-center">

                <!-- LEFT -->
                <div class="col-lg-5 hero-content">
                    <h1 class="display-5 fw-bold mt-2">
                        Adventure Awaits in the Himalayas<br>
                        <span class="gradient-text">Are You Ready?</span>
                    </h1>

                    <small class="text-uppercase text-tagline fw-semibold">
                        Easy Access To Himalayas · @php date('Y') @endphp
                        <!-- in Blade: {{ now()->year }} -->
                    </small>

                    <p class="hero-desc">
                        Embark on legendary journeys to Everest Base Camp, Annapurna, Pokhara, and Chitwan — where
                        adventure, culture, and nature blend into unforgettable memories.
                    </p>

                    <div class="d-flex gap-3 mt-4">
                        <a href="#" class="btn hero-btn-primary d-flex align-items-center gap-2">
                            Explore Packages
                            <i class="fa-solid fa-arrow-right btn-icon"></i>
                        </a>

                        <a href="#" class="btn hero-btn-outline d-flex align-items-center gap-2">
                            <i class="fa-solid fa-play btn-icon"></i>
                            Plan Your Trip
                        </a>
                    </div>
                </div>

                <!-- RIGHT -->
                <div class="col-lg-7 hero-image-container">
                    <!-- Replace with your actual PNG (transparent background ideal) -->
                    <img src="/images/2.png" class="hero-main-image" alt="Nepal Hero Image">
                </div>

            </div>
        </div>
    </section>

