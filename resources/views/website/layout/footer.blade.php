<style>
    footer a,
    label {
        color: #626262;
    }

    .info {
        /* font-size: 0.9rem; */
    }

    footer ul {
        padding-left: 10px;
    }

    .facebook-color {
        color: #1877F2;
    }

    .instagram-color {
        background: radial-gradient(circle at 30% 107%, #fdf497 0%, #fdf497 5%, #fd5949 45%, #d6249f 60%, #285AEB 90%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .tiktok-color {
        color: #000000;
    }

    .twitter-color {
        color: #1DA1F2;
    }

    .linkedin-color {
        color: #0A66C2;
    }

    .google-color {
        color: #DB4437;
    }

    .youtube-color {
        color: #FF0000;
    }

    a.text-dark:hover,
    a:hover {
        opacity: 0.8;
        text-decoration: none;
    }
</style>

<footer class="pb-5">
    <div class="container-fluid theme-space">
        <div class="px-3 py-5">
            <div class="mb-4">
                <img src="{{ asset('images/fts-logo.png') }}" alt="" width="200">
            </div>
            <div>
                <div class="row">
                    <div class="col-12 col-md-4">
                        <div class="mb-4">
                            <h6>Contact Us</h6>
                            <div class="ps-2">
                                <div class="d-flex align-items-center mb-3">
                                    <i data-lucide="phone-call" class="me-2"></i>
                                    <div>
                                        <label>Phone Number</label>
                                        <p class="info">01 876 5430, (9860)-989-0999</p>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center">
                                    <i data-lucide="mail" class="me-2"></i>
                                    <div>
                                        <label>Email</label>
                                        <p class="info">info@fatafatsewa.com</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div>
                            <h6>Quick Links</h6>
                            <ul>
                                <li><a href="#">Apply For a Franchise</a></li>
                                <li><a href="#">Become Affiliate Partner</a></li>
                                <li><a href="#">Blogs</a></li>
                                <li><a href="#">Corporate Order</a></li>
                                <li><a href="#">Franchise Enquiry</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div>
                            <h6>Policy & Security</h6>
                            <ul>
                                <li><a href="#">Data Security</a></li>
                                <li><a href="#">Cancellation Policy</a></li>
                                <li><a href="#">Terms & Conditions</a></li>
                                <li><a href="#">Payments and Security</a></li>
                                <li><a href="#">Cookie Policy</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <div class="row">
                <div class="col-12 col-md-6">
                    <div>&copy; 2025 Fatafat Sewa Pvt Ltd | All Right Reserved</div>
                </div>
                <div class="col-12 col-md-6 d-flex gap-3 align-items-center justify-content-md-end mt-3 mt-md-0">
                    <!-- FontAwesome 6 social icons with brand colors -->
                    <a href="#" class="facebook-color" aria-label="Facebook">
                        <i class="fab fa-facebook-f fa-lg"></i>
                    </a>
                    <a href="#" class="instagram-color" aria-label="Instagram">
                        <i class="fab fa-instagram fa-lg"></i>
                    </a>
                    <a href="#" class="tiktok-color" aria-label="TikTok">
                        <i class="fab fa-tiktok fa-lg"></i>
                    </a>
                    <a href="#" class="twitter-color" aria-label="Twitter">
                        <i class="fab fa-twitter fa-lg"></i>
                    </a>
                    <a href="#" class="linkedin-color" aria-label="LinkedIn">
                        <i class="fab fa-linkedin-in fa-lg"></i>
                    </a>
                    <a href="#" class="google-color" aria-label="Google">
                        <i class="fab fa-google fa-lg"></i>
                    </a>
                    <a href="#" class="youtube-color" aria-label="YouTube">
                        <i class="fab fa-youtube fa-lg"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</footer>
