<style>
    /* Hide Bootstrap's default dropdown caret */
    .nav-link.dropdown-toggle::after {
        display: none;
    }

    .dropdown-menu.show {
        display: block;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        border-radius: 6px !important;
        border: none !important;
    }

    #main-nav-category .nav-item a {
        position: relative;
        color: #000;
        font-weight: 600;
    }
</style>

@php
    $categories = [
        [
            'name' => 'Mobile',
            'icon' => 'chevron-down',
            'items' => [
                ['name' => 'Smartphones', 'icon' => 'smartphone'],
                ['name' => 'Feature Phones', 'icon' => 'phone'],
                ['name' => 'Accessories', 'icon' => 'headphones'],
                ['name' => 'Wearables', 'icon' => 'watch'],
            ],
        ],
        [
            'name' => 'Laptops',
            'icon' => 'chevron-down',
            'items' => [
                ['name' => 'Gaming Laptops', 'icon' => 'cpu'],
                ['name' => 'Business Laptops', 'icon' => 'briefcase'],
                ['name' => '2-in-1 Laptops', 'icon' => 'tablet'],
                ['name' => 'Laptop Accessories', 'icon' => 'usb'],
            ],
        ],
        [
            'name' => 'Cameras',
            'icon' => 'chevron-down',
            'items' => [
                ['name' => 'DSLR Cameras', 'icon' => 'camera'],
                ['name' => 'Video Cameras', 'icon' => 'video'],
                ['name' => 'Lenses', 'icon' => 'aperture'],
                ['name' => 'Camera Accessories', 'icon' => 'battery-charging'],
            ],
        ],
        [
            'name' => 'Audio',
            'icon' => 'chevron-down',
            'items' => [
                ['name' => 'Speakers', 'icon' => 'speaker'],
                ['name' => 'Headphones', 'icon' => 'headphones'],
                ['name' => 'Microphones', 'icon' => 'mic'],
                ['name' => 'Bluetooth Devices', 'icon' => 'bluetooth'],
            ],
        ],
        [
            'name' => 'TVs & Video',
            'icon' => 'chevron-down',
            'items' => [
                ['name' => 'Televisions', 'icon' => 'tv'],
                ['name' => 'Projectors', 'icon' => 'film'],
                ['name' => 'Remote Controls', 'icon' => 'remote-control'],
                ['name' => 'Video Accessories', 'icon' => 'camera'],
            ],
        ],
        [
            'name' => 'Mobile',
            'icon' => 'chevron-down',
            'items' => [
                ['name' => 'Smartphones', 'icon' => 'smartphone'],
                ['name' => 'Feature Phones', 'icon' => 'phone'],
                ['name' => 'Accessories', 'icon' => 'headphones'],
                ['name' => 'Wearables', 'icon' => 'watch'],
            ],
        ],
        [
            'name' => 'Laptops',
            'icon' => 'chevron-down',
            'items' => [
                ['name' => 'Gaming Laptops', 'icon' => 'cpu'],
                ['name' => 'Business Laptops', 'icon' => 'briefcase'],
                ['name' => '2-in-1 Laptops', 'icon' => 'tablet'],
                ['name' => 'Laptop Accessories', 'icon' => 'usb'],
            ],
        ],
        [
            'name' => 'Cameras',
            'icon' => 'chevron-down',
            'items' => [
                ['name' => 'DSLR Cameras', 'icon' => 'camera'],
                ['name' => 'Video Cameras', 'icon' => 'video'],
                ['name' => 'Lenses', 'icon' => 'aperture'],
                ['name' => 'Camera Accessories', 'icon' => 'battery-charging'],
            ],
        ],
        [
            'name' => 'Audio',
            'icon' => 'chevron-down',
            'items' => [
                ['name' => 'Speakers', 'icon' => 'speaker'],
                ['name' => 'Headphones', 'icon' => 'headphones'],
                ['name' => 'Microphones', 'icon' => 'mic'],
                ['name' => 'Bluetooth Devices', 'icon' => 'bluetooth'],
            ],
        ],
        [
            'name' => 'TVs & Video',
            'icon' => 'chevron-down',
            'items' => [
                ['name' => 'Televisions', 'icon' => 'tv'],
                ['name' => 'Projectors', 'icon' => 'film'],
                ['name' => 'Remote Controls', 'icon' => 'remote-control'],
                ['name' => 'Video Accessories', 'icon' => 'camera'],
            ],
        ],
        [
            'name' => 'Mobile',
            'icon' => 'chevron-down',
            'items' => [
                ['name' => 'Smartphones', 'icon' => 'smartphone'],
                ['name' => 'Feature Phones', 'icon' => 'phone'],
                ['name' => 'Accessories', 'icon' => 'headphones'],
                ['name' => 'Wearables', 'icon' => 'watch'],
            ],
        ],
        [
            'name' => 'Laptops',
            'icon' => 'chevron-down',
            'items' => [
                ['name' => 'Gaming Laptops', 'icon' => 'cpu'],
                ['name' => 'Business Laptops', 'icon' => 'briefcase'],
                ['name' => '2-in-1 Laptops', 'icon' => 'tablet'],
                ['name' => 'Laptop Accessories', 'icon' => 'usb'],
            ],
        ],
        [
            'name' => 'Cameras',
            'icon' => 'chevron-down',
            'items' => [
                ['name' => 'DSLR Cameras', 'icon' => 'camera'],
                ['name' => 'Video Cameras', 'icon' => 'video'],
                ['name' => 'Lenses', 'icon' => 'aperture'],
                ['name' => 'Camera Accessories', 'icon' => 'battery-charging'],
            ],
        ]
    ];
@endphp

<div class="pt-4" id="main-nav-category">
    <ul class="nav">
        @foreach ($categories as $category)
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" role="button"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    {{ $category['name'] }}
                    <i data-lucide="{{ $category['icon'] }}" class="ms-auto"></i>
                </a>
                <ul class="dropdown-menu">
                    @foreach ($category['items'] as $item)
                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <i data-lucide="{{ $item['icon'] }}" class="me-2"></i> {{ $item['name'] }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </li>
        @endforeach
    </ul>
</div>


{{-- <div class="pt-4" id="main-nav-category">
    <ul class="nav">

        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" role="button"
                data-bs-toggle="dropdown" aria-expanded="false">
                Mobile
                <i data-lucide="chevron-down" class="ms-auto"></i>
            </a>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item d-flex align-items-center" href="#"><i data-lucide="smartphone"
                            class="me-2"></i> Smartphones</a></li>
                <li><a class="dropdown-item d-flex align-items-center" href="#"><i data-lucide="phone"
                            class="me-2"></i> Feature Phones</a></li>
                <li><a class="dropdown-item d-flex align-items-center" href="#"><i data-lucide="headphones"
                            class="me-2"></i> Accessories</a></li>
                <li><a class="dropdown-item d-flex align-items-center" href="#"><i data-lucide="watch"
                            class="me-2"></i> Wearables</a></li>
            </ul>
        </li>

        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" role="button"
                data-bs-toggle="dropdown" aria-expanded="false">
                Laptops
                <i data-lucide="chevron-down" class="ms-auto"></i>
            </a>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item d-flex align-items-center" href="#"><i data-lucide="cpu"
                            class="me-2"></i> Gaming Laptops</a></li>
                <li><a class="dropdown-item d-flex align-items-center" href="#"><i data-lucide="briefcase"
                            class="me-2"></i> Business Laptops</a></li>
                <li><a class="dropdown-item d-flex align-items-center" href="#"><i data-lucide="tablet"
                            class="me-2"></i> 2-in-1 Laptops</a></li>
                <li><a class="dropdown-item d-flex align-items-center" href="#"><i data-lucide="usb"
                            class="me-2"></i> Laptop Accessories</a></li>
            </ul>
        </li>

        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" role="button"
                data-bs-toggle="dropdown" aria-expanded="false">
                Cameras
                <i data-lucide="chevron-down" class="ms-auto"></i>
            </a>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item d-flex align-items-center" href="#"><i data-lucide="camera"
                            class="me-2"></i> DSLR Cameras</a></li>
                <li><a class="dropdown-item d-flex align-items-center" href="#"><i data-lucide="video"
                            class="me-2"></i> Video Cameras</a></li>
                <li><a class="dropdown-item d-flex align-items-center" href="#"><i data-lucide="aperture"
                            class="me-2"></i> Lenses</a></li>
                <li><a class="dropdown-item d-flex align-items-center" href="#"><i data-lucide="battery-charging"
                            class="me-2"></i> Camera Accessories</a></li>
            </ul>
        </li>

        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" role="button"
                data-bs-toggle="dropdown" aria-expanded="false">
                Audio
                <i data-lucide="chevron-down" class="ms-auto"></i>
            </a>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item d-flex align-items-center" href="#"><i data-lucide="speaker"
                            class="me-2"></i> Speakers</a></li>
                <li><a class="dropdown-item d-flex align-items-center" href="#"><i data-lucide="headphones"
                            class="me-2"></i> Headphones</a></li>
                <li><a class="dropdown-item d-flex align-items-center" href="#"><i data-lucide="mic"
                            class="me-2"></i> Microphones</a></li>
                <li><a class="dropdown-item d-flex align-items-center" href="#"><i data-lucide="bluetooth"
                            class="me-2"></i> Bluetooth Devices</a></li>
            </ul>
        </li>

        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" role="button"
                data-bs-toggle="dropdown" aria-expanded="false">
                TVs & Video
                <i data-lucide="chevron-down" class="ms-auto"></i>
            </a>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item d-flex align-items-center" href="#"><i data-lucide="tv"
                            class="me-2"></i> Televisions</a></li>
                <li><a class="dropdown-item d-flex align-items-center" href="#"><i data-lucide="film"
                            class="me-2"></i> Projectors</a></li>
                <li><a class="dropdown-item d-flex align-items-center" href="#"><i data-lucide="remote-control"
                            class="me-2"></i> Remote Controls</a></li>
                <li><a class="dropdown-item d-flex align-items-center" href="#"><i data-lucide="camera"
                            class="me-2"></i> Video Accessories</a></li>
            </ul>
        </li>

    </ul>
</div> --}}
