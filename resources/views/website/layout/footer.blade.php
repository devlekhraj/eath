<style>
    .footer-clean {
        background: radial-gradient(circle at center, #e3f2fd 20%, #ffffff 100%);
        color: #333;
    }

    .footer-link {
        color: #6c757d;
        text-decoration: none;
        transition: all 0.2s ease-in-out;
    }

    .footer-link:hover {
        color: #0d6efd;
        text-decoration: underline;
    }
</style>
<footer class="pt-5 pb-4 position-relative footer-clean text-dark">
    <!-- WhatsApp Floating Button -->
    <a href="https://wa.me/9841927372" target="_blank"
        class="position-fixed bottom-0 end-0 m-4 bg-success text-white rounded-circle d-flex justify-content-center align-items-center shadow-lg"
        style="width: 52px; height: 52px; z-index: 1050;" aria-label="Chat on WhatsApp">
        <i class="fab fa-whatsapp fs-4"></i>
    </a>

    <div class="container">
        <div class="row gy-4">
            <!-- Logo and About -->
            <div class="col-lg-4 col-md-6">
                <a class="navbar-brand fw-bold text-primary fs-4" href="#">
                    <img src="/images/logo.png" alt="E.A.T.H Travel Logo" height="70">
                </a>
                <h5 class="fw-bold text-dark mb-3 mt-2">
                    {{ isset($settings['company_name']) ? $settings['company_name'] : 'EATH TRAVEL CO. LTD' }}</h5>
                <p class="text-muted small">
                    {{ isset($settings['footer_text'])
                        ? $settings['footer_text']
                        : 'We specialize in immersive adventures and cultural experiences across Nepal. Trusted since 2008 by
                                        global explorers.' }}

                </p>
                <div class="d-flex gap-3 mt-3">
                    @if (!empty($settings['facebook']))
                        <a href="{{$settings['facebook']}}" target="_blank" class="text-dark fs-5"><i class="fab fa-facebook-f"></i></a>
                    @endif
                    @if (!empty($settings['instagram']))
                        <a href="{{$settings['instagram']}}" target="_blank" class="text-dark fs-5"><i class="fab fa-instagram"></i></a>
                    @endif
                    @if (!empty($settings['youtube']))
                        <a href="{{$settings['youtube']}}" target="_blank" class="text-dark fs-5"><i class="fab fa-youtube"></i></a>
                    @endif
                    @if (!empty($settings['tiktok']))
                        <a href="{{$settings['tiktok']}}" target="_blank" class="text-dark fs-5"><i class="fab fa-tripadvisor"></i></a>
                    @endif
                </div>
            </div>

            <!-- Quick Links -->
            <div class="col-lg-2 col-md-6">
                <h6 class="text-uppercase text-dark mb-3 fw-semibold">Explore</h6>
                <ul class="list-unstyled small">
                    <li><a href="/" class="footer-link">Home</a></li>
                    <li><a href="/guide-profiles" class="footer-link">Our Guides</a></li>
                    <li><a href="/about-us" class="footer-link">About Us</a></li>
                    <li><a href="/contact-us" class="footer-link">Contact Us</a></li>
                </ul>
            </div>

            <!-- Customer Support -->
            <div class="col-lg-3 col-md-6">
                <h6 class="text-uppercase text-dark mb-3 fw-semibold">Help & Support</h6>
                <ul class="list-unstyled small">
                    <li><a href="/terms-and-conditions" class="footer-link">Terms & Conditions</a></li>
                    <li><a href="/privacy-policy" class="footer-link">Privacy Policy</a></li>
                    <li><a href="/faq" class="footer-link">FAQs</a></li>
                </ul>
            </div>


            <!-- Contact Info -->
            <div class="col-lg-3 col-md-6">
                <h6 class="text-uppercase text-dark mb-3 fw-semibold">Contact Us</h6>
                <p class="text-muted small mb-2">
                    <i class="fas fa-map-marker-alt me-2 text-primary"></i>
                    {{ isset($settings['address']) ? $settings['address'] : 'Bode-6, Bhaktapur' }}
                </p>
                <p class="text-muted small mb-2">
                    <i class="fas fa-phone me-2 text-primary"></i>
                    <a href="tel:{{ isset($settings['mobile']) ? $settings['mobile'] : '9841927372' }}"
                        class="footer-link">
                        {{ isset($settings['mobile']) ? $settings['mobile'] : '+9779841927372' }}</a>
                </p>
                <p class="text-muted small mb-2">
                    <i class="fas fa-envelope me-2 text-primary"></i>
                    <a href="mailto:{{ isset($settings['email']) ? $settings['email'] : 'info@eathways.com' }}"
                        class="footer-link">
                        {{ isset($settings['email']) ? $settings['email'] : 'support@eathtravel.com' }}</a>
                </p>
                <p class="text-muted small">
                    <i class="fas fa-globe me-2 text-primary"></i>
                    <a href="{{ isset($settings['website']) ? $settings['website'] : 'https://www.eathways.com' }}"
                        target="_blank" rel="noopener noreferrer"
                        class="footer-link">{{ isset($settings['website']) ? $settings['website'] : 'https://www.eathways.com' }}</a>
                </p>
            </div>
        </div>

        <hr class="my-4 border-light">

        <!-- Bottom Bar -->
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-center small text-muted">
            <span>&copy; {{ date('Y') }}
                {{ isset($settings['company_name']) ? $settings['company_name'] : 'EATH TRAVEL CO. LTD' }}. All rights
                reserved.</span>
            <span>Developed by <a class="text-primary fw-medium" target="_blank" href="https://lekhrajrai.com.np">Lekh
                    Raj Rai</a></span>
        </div>
    </div>
</footer>





</body>

</html>
