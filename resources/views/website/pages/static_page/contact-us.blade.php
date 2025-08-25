@extends('website.layout.master')
@section('content')
    <div class="container py-5">

        @php 
            $contactUsSubTitle = "We would love to hear from you! Whether you have questions, need assistance, or want to plan your next adventure with us, feel free to reach out."
        @endphp
        <div class="row gx-5 align-items-center">
            <!-- Contact Information -->
            <div class="col-lg-6 mb-5 mb-lg-0">
                <div class="bg-white p-5 rounded">
                    <h2 class="mb-4 fw-bold text-info">{{ isset($settings['contact_page_title']) ? $settings['contact_page_title'] : 'Contact Us' }}</h2>
                    <p class="mb-4 text-muted">
                        {{ isset($settings['contact_page_sub_title']) ? $settings['contact_page_sub_title'] : $contactUsSubTitle }}
                        
                    </p>
                    <ul class="list-unstyled">
                        <li class="mb-3 d-flex align-items-start">
                            <span class="me-3 fs-4 text-info">
                                <i class="fas fa-map-marker-alt"></i>
                            </span>
                            <div>
                                <h6 class="mb-1 fw-semibold">Our Address</h6>
                                <p class="mb-0 text-muted">
                                    {{ isset($settings['address']) ? $settings['address'] : 'Bode-6, Bhaktapur' }}</p>
                            </div>
                        </li>

                        <li class="mb-3 d-flex align-items-start">
                            <span class="me-3 fs-4 text-info">
                                <i class="fas fa-phone"></i>
                            </span>
                            <div>
                                <h6 class="mb-1 fw-semibold">Phone</h6>
                                <p class="mb-0 text-muted">
                                    {{ isset($settings['mobile']) ? $settings['mobile'] : '+977 (984) 192-7372' }}</p>
                            </div>
                        </li>

                        <li class="mb-3 d-flex align-items-start">
                            <span class="me-3 fs-4 text-info">
                                <i class="fas fa-envelope"></i>
                            </span>
                            <div>
                                <h6 class="mb-1 fw-semibold">Email</h6>
                                <p class="mb-0 text-muted">
                                    {{ isset($settings['email']) ? $settings['email'] : 'info@eathways.com' }}</p>
                            </div>
                        </li>

                        <li class="d-flex align-items-start">
                            <span class="me-3 fs-4 text-info">
                                <i class="fas fa-clock"></i>
                            </span>
                            <div>
                                <h6 class="mb-1 fw-semibold">Office Hours</h6>
                                <p class="mb-0 text-muted">Sunday - Friday: 9:00 AM - 6:00 PM</p>
                            </div>
                        </li>
                    </ul>

                    <div class="mt-4">
                        <h6 class="fw-semibold mb-2">Follow Us</h6>
                        @if (!empty($settings['facebook']))
                            <a href="{{ $settings['facebook'] }}" target="_blank" class="me-3 text-info fs-4" aria-label="Facebook">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                        @endif

                        @if (!empty($settings['twitter']))
                            <a href="{{ $settings['twitter'] }}" target="_blank" class="me-3 text-info fs-4" aria-label="Twitter">
                                <i class="fab fa-twitter"></i>
                            </a>
                        @endif

                        @if (!empty($settings['instagram']))
                            <a href="{{ $settings['instagram'] }}" target="_blank" class="me-3 text-info fs-4" aria-label="Instagram">
                                <i class="fab fa-instagram"></i>
                            </a>
                        @endif

                        @if (!empty($settings['linked_in']))
                            <a href="{{ $settings['linked_in'] }}" target="_blank" class="me-3 text-info fs-4" aria-label="LinkedIn">
                                <i class="fab fa-linkedin-in"></i>
                            </a>
                        @endif

                        @if (!empty($settings['tiktok']))
                            <a href="{{ $settings['tiktok'] }}" target="_blank" class="me-3 text-info fs-4" aria-label="TokTok">
                                <i class="fab fa-tiktok"></i>
                            </a>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Google Map -->
            <div class="col-lg-6">
                <div class="ratio ratio-16x9 rounded shadow-sm border">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3532.2492254385053!2d85.31247651508012!3d27.709231332792503!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb1991d2ec895f%3A0x2b37c8151f4119a5!2sKathmandu%2C%20Nepal!5e0!3m2!1sen!2sus!4v1689102094589!5m2!1sen!2sus"
                        style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"
                        title="Our Location on Map"></iframe>
                </div>
            </div>
        </div>
    </div>
@endsection
