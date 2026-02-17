@extends('website.layout.master')
@section('content')
    @php
        $contactUsSubTitle =
            'We would love to hear from you! Whether you have questions, need assistance, or want to plan your next adventure with us, feel free to reach out.';
        $contactBannerImage =
            isset($settings['contact_page_banner']) && !empty($settings['contact_page_banner'])
                ? $settings['contact_page_banner']
                : 'https://images.unsplash.com/photo-1454496522488-7a8e488e8606?auto=format&fit=crop&w=1800&q=80';
    @endphp

    <section class="relative h-[50vh] min-h-[340px] overflow-hidden">
        <div class="absolute inset-0">
            <img src="{{ $contactBannerImage }}" alt="Contact us banner" class="h-full w-full object-cover" />
            <div class="absolute inset-0 bg-gradient-to-b from-slate-950/35 via-slate-900/55 to-slate-950/70"></div>
        </div>
        <div class="relative mx-auto flex h-full w-full max-w-7xl items-end px-6 pb-14">
            <div class="text-white">
                <p class="text-xs uppercase tracking-[0.3em] text-white/80">Get In Touch</p>
                <h1 class="mt-3 text-3xl font-semibold sm:text-5xl">
                    {{ isset($settings['contact_page_title']) ? $settings['contact_page_title'] : 'Contact Us' }}
                </h1>
                <p class="mt-3 max-w-2xl text-sm text-white/85 sm:text-base">
                    {{ isset($settings['contact_page_sub_title']) ? $settings['contact_page_sub_title'] : $contactUsSubTitle }}
                </p>
            </div>
        </div>
    </section>

    <section class="mx-auto w-full max-w-7xl px-6 py-12">
        <div class="grid gap-8 lg:grid-cols-[1.1fr,1fr]">
            <div class="rounded bg-white p-6 sm:p-8">
                <h2 class="text-2xl font-semibold text-slate-900">Contact Information</h2>
                <ul class="mt-6 space-y-5">
                    <li class="flex items-start gap-4">
                        <span
                            class="mt-1 inline-flex h-10 w-10 items-center justify-center rounded-full bg-sky-50 text-sky-600">
                            <i class="mdi mdi-map-marker text-xl"></i>
                        </span>
                        <div>
                            <h3 class="text-sm font-semibold uppercase tracking-wide text-slate-700">Our Address</h3>
                            <p class="mt-1 text-slate-600">
                                {{ isset($settings['address']) ? $settings['address'] : 'Bode-6, Bhaktapur' }}</p>
                        </div>
                    </li>
                    <li class="flex items-start gap-4">
                        <span
                            class="mt-1 inline-flex h-10 w-10 items-center justify-center rounded-full bg-sky-50 text-sky-600">
                            <i class="mdi mdi-phone text-xl"></i>
                        </span>
                        <div>
                            <h3 class="text-sm font-semibold uppercase tracking-wide text-slate-700">Phone</h3>
                            <p class="mt-1 text-slate-600">
                                {{ isset($settings['mobile']) ? $settings['mobile'] : '+977 (984) 192-7372' }}</p>
                        </div>
                    </li>
                    <li class="flex items-start gap-4">
                        <span
                            class="mt-1 inline-flex h-10 w-10 items-center justify-center rounded-full bg-sky-50 text-sky-600">
                            <i class="mdi mdi-email-outline text-xl"></i>
                        </span>
                        <div>
                            <h3 class="text-sm font-semibold uppercase tracking-wide text-slate-700">Email</h3>
                            <p class="mt-1 text-slate-600">
                                {{ isset($settings['email']) ? $settings['email'] : 'info@eathways.com' }}</p>
                        </div>
                    </li>
                    <li class="flex items-start gap-4">
                        <span
                            class="mt-1 inline-flex h-10 w-10 items-center justify-center rounded-full bg-sky-50 text-sky-600">
                            <i class="mdi mdi-clock-outline text-xl"></i>
                        </span>
                        <div>
                            <h3 class="text-sm font-semibold uppercase tracking-wide text-slate-700">Office Hours</h3>
                            <p class="mt-1 text-slate-600">Sunday - Friday: 9:00 AM - 6:00 PM</p>
                        </div>
                    </li>
                </ul>

                <div class="mt-8 pt-5">
                    <h3 class="text-sm font-semibold uppercase tracking-wide text-slate-700">Follow Us</h3>
                    <div class="mt-3 flex items-center gap-2">
                        @if (!empty($settings['facebook']))
                            <a href="{{ $settings['facebook'] }}" target="_blank"
                                class="inline-flex h-10 w-10 items-center justify-center rounded-full text-slate-600 transition hover:text-sky-600"
                                aria-label="Facebook">
                                <i class="mdi mdi-facebook text-xl"></i>
                            </a>
                        @endif
                        @if (!empty($settings['twitter']))
                            <a href="{{ $settings['twitter'] }}" target="_blank"
                                class="inline-flex h-10 w-10 items-center justify-center rounded-full text-slate-600 transition hover:text-sky-600"
                                aria-label="Twitter">
                                <i class="mdi mdi-twitter text-xl"></i>
                            </a>
                        @endif
                        @if (!empty($settings['instagram']))
                            <a href="{{ $settings['instagram'] }}" target="_blank"
                                class="inline-flex h-10 w-10 items-center justify-center rounded-full text-slate-600 transition hover:text-sky-600"
                                aria-label="Instagram">
                                <i class="mdi mdi-instagram text-xl"></i>
                            </a>
                        @endif
                        @if (!empty($settings['linked_in']))
                            <a href="{{ $settings['linked_in'] }}" target="_blank"
                                class="inline-flex h-10 w-10 items-center justify-center rounded-full text-slate-600 transition hover:text-sky-600"
                                aria-label="LinkedIn">
                                <i class="mdi mdi-linkedin text-xl"></i>
                            </a>
                        @endif
                        @if (!empty($settings['tiktok']))
                            <a href="{{ $settings['tiktok'] }}" target="_blank"
                                class="inline-flex h-10 w-10 items-center justify-center rounded-full text-slate-600 transition hover:text-sky-600"
                                aria-label="TikTok">
                                <i class="mdi mdi-music-note text-xl"></i>
                            </a>
                        @endif
                    </div>
                </div>
            </div>

            <div>
                <div class="aspect-[4/3] overflow-hidden rounded">
                    <div class="mapouter">
                        <div class="gmap_canvas"><iframe class="gmap_iframe" width="100%" frameborder="0" scrolling="no"
                                marginheight="0" marginwidth="0"
                                src="https://maps.google.com/maps?width=660&amp;height=527&amp;hl=en&amp;q=EATH&amp;t=&amp;z=16&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe><a
                                href="https://embed-googlemap.com">google maps embed</a></div>
                        <style>
                            .mapouter {
                                position: relative;
                                text-align: right;
                                width: 100%;
                                height: 627px;
                            }

                            .gmap_canvas {
                                overflow: hidden;
                                background: none !important;
                                width: 100%;
                                height: 627px;
                            }

                            .gmap_iframe {
                                height: 627px !important;
                            }
                        </style>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
