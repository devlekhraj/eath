{{-- <style>
    /* Hide Bootstrap's default dropdown caret */
    .nav-link.dropdown-toggle::after {
        display: none;
    }

    /* Improve dropdown look */
    .dropdown-menu.show {
        display: block;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        border-radius: 6px !important;
        border: none !important;
        z-index: 1050;
    }

    /* Scrollable horizontal nav */
    #main-nav-category {
        overflow-x: auto;
        overflow-y: visible; /* allow dropdowns */
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
        scroll-behavior: smooth;
        position: relative;
        z-index: 1;
    }

    #main-nav-category::-webkit-scrollbar {
        height: 6px;
    }

    #main-nav-category::-webkit-scrollbar-thumb {
        background: rgba(0, 0, 0, 0.2);
        border-radius: 10px;
    }

    #main-nav-category .nav {
        min-width: max-content;
    }

    #main-nav-category .nav-link {
        font-weight: 600;
        color: #000;
        padding: 0.5rem 1rem;
    }

    .nav-item.dropdown {
        position: relative;
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
        // Duplicate a few for scroll demo
        ['name' => 'Gadgets', 'icon' => 'chevron-down', 'items' => [['name' => 'Smart Home', 'icon' => 'home']]], 
        ['name' => 'Gaming', 'icon' => 'chevron-down', 'items' => [['name' => 'Consoles', 'icon' => 'gamepad-2']]],
        ['name' => 'Books', 'icon' => 'chevron-down', 'items' => [['name' => 'E-books', 'icon' => 'book-open'], ['name' => 'Novels', 'icon' => 'book']]], 
        ['name' => 'Accessories', 'icon' => 'chevron-down', 'items' => [['name' => 'Chargers', 'icon' => 'plug']]], 
    ];
@endphp

<div class="pt-4" id="main-nav-category">
    <ul class="nav d-flex flex-nowrap gap-2">
        @foreach ($categories as $category)
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" role="button"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    {{ $category['name'] }}
                    <i data-lucide="{{ $category['icon'] }}" class="ms-1"></i>
                </a>
                <ul class="dropdown-menu">
                    @foreach ($category['items'] as $item)
                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <i data-lucide="{{ $item['icon'] }}" class="me-2"></i>
                                {{ $item['name'] }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </li>
        @endforeach
    </ul>
</div> --}}

<style>
  /* Main nav styling */
  #main-nav-category {
    overflow-x: auto;
    white-space: nowrap;
    -webkit-overflow-scrolling: touch;
    scroll-behavior: smooth;
    position: relative;
    z-index: 1000;
    background: #fff;
    border-bottom: 1px solid #ddd;
  }
  #main-nav-category::-webkit-scrollbar {
    height: 6px;
  }
  #main-nav-category::-webkit-scrollbar-thumb {
    background: rgba(0, 0, 0, 0.2);
    border-radius: 10px;
  }
  #main-nav-category .nav {
    min-width: max-content;
  }
  #main-nav-category .nav-link {
    font-weight: 600;
    color: #000;
    padding: 0.5rem 1rem;
    display: inline-flex;
    align-items: center;
    gap: 0.3rem;
    cursor: pointer;
  }
  #main-nav-category .nav-link:hover,
  #main-nav-category .nav-link:focus {
    color: #ec9214;
    outline: none;
  }

  /* Hide caret */
  .nav-link.dropdown-toggle::after {
    display: none;
  }

  /* Mega menu container */
  .mega-menu-panel {
    position: absolute;
    top: 100%;
    left: 0;
    width: 100vw;
    background: #fff;
    box-shadow: 0 8px 24px rgba(0, 0, 0, 0.15);
    padding: 2rem 3rem;
    display: none;
    z-index: 999;
  }
  .nav-item:hover > .mega-menu-panel,
  .nav-item:focus-within > .mega-menu-panel {
    display: block;
  }

  /* Flex container inside mega menu */
  .mega-menu-content {
    display: flex;
    gap: 3rem;
    max-width: 1200px;
    margin: 0 auto;
    flex-wrap: wrap;
  }

  /* Columns inside mega menu */
  .mega-menu-column {
    flex: 1 1 200px;
    min-width: 180px;
  }

  .mega-menu-column > h6 {
    font-weight: 700;
    margin-bottom: 1rem;
    text-transform: uppercase;
    font-size: 0.9rem;
    color: #222;
  }

  .mega-menu-column a {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    color: #444;
    padding: 0.35rem 0;
    font-weight: 500;
    font-size: 0.9rem;
    transition: color 0.2s ease;
    text-decoration: none;
  }
  .mega-menu-column a:hover {
    color: #ec9214;
  }

  .mega-menu-column a i {
    stroke-width: 1.5;
  }

  /* Responsive: stack mega menu on smaller screens */
  @media (max-width: 991px) {
    .mega-menu-panel {
      position: static;
      width: 100%;
      box-shadow: none;
      padding: 1rem 1.5rem;
      display: none;
    }
    .nav-item:hover > .mega-menu-panel,
    .nav-item:focus-within > .mega-menu-panel {
      display: block;
    }
    .mega-menu-content {
      flex-direction: column;
      gap: 1.5rem;
      max-width: 100%;
    }
    #main-nav-category {
      overflow-x: visible;
    }
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
        // Duplicate a few for scroll demo
        ['name' => 'Gadgets', 'icon' => 'chevron-down', 'items' => [['name' => 'Smart Home', 'icon' => 'home']]], 
        ['name' => 'Gaming', 'icon' => 'chevron-down', 'items' => [['name' => 'Consoles', 'icon' => 'gamepad-2']]],
        ['name' => 'Books', 'icon' => 'chevron-down', 'items' => [['name' => 'E-books', 'icon' => 'book-open'], ['name' => 'Novels', 'icon' => 'book']]], 
        ['name' => 'Accessories', 'icon' => 'chevron-down', 'items' => [['name' => 'Chargers', 'icon' => 'plug']]], 
    ];
@endphp

<nav id="main-nav-category" aria-label="Primary navigation">
  <ul class="nav d-flex flex-nowrap gap-2 position-relative">
    @foreach ($categories as $category)
      <li class="nav-item position-relative" tabindex="0">
        <a class="nav-link" href="#" aria-haspopup="true" aria-expanded="false">
          {{ $category['name'] }}
          <i data-lucide="{{ $category['icon'] }}"></i>
        </a>

        <div class="mega-menu-panel" role="menu" aria-label="{{ $category['name'] }} submenu">
          <div class="mega-menu-content">
            <div class="mega-menu-column">
              <h6>{{ $category['name'] }} Categories</h6>
              @foreach ($category['items'] as $item)
                <a href="#" role="menuitem" tabindex="-1">
                  <i data-lucide="{{ $item['icon'] }}"></i>
                  {{ $item['name'] }}
                </a>
              @endforeach
            </div>
          </div>
        </div>
      </li>
    @endforeach
  </ul>
</nav>

<script>
  document.addEventListener("DOMContentLoaded", () => {
    if (window.lucide) lucide.replace();

    // Accessibility: toggle aria-expanded on nav-links
    const navItems = document.querySelectorAll("#main-nav-category .nav-item");

    navItems.forEach(item => {
      const link = item.querySelector(".nav-link");
      const panel = item.querySelector(".mega-menu-panel");

      link.addEventListener("focus", () => {
        navItems.forEach(i => {
          i.querySelector(".nav-link").setAttribute("aria-expanded", "false");
          i.querySelector(".mega-menu-panel").style.display = "none";
        });
        link.setAttribute("aria-expanded", "true");
        panel.style.display = "block";
      });

      // Hide on blur if focus moves outside item
      item.addEventListener("focusout", e => {
        // Delay needed because focus moves within item
        setTimeout(() => {
          if (!item.contains(document.activeElement)) {
            link.setAttribute("aria-expanded", "false");
            panel.style.display = "none";
          }
        }, 100);
      });
    });

    // Optional: close mega menus on outside click
    document.addEventListener("click", e => {
      if (!e.target.closest("#main-nav-category")) {
        navItems.forEach(i => {
          i.querySelector(".nav-link").setAttribute("aria-expanded", "false");
          i.querySelector(".mega-menu-panel").style.display = "none";
        });
      }
    });
  });
</script>
