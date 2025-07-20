<div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasMenu" aria-labelledby="offcanvasMenuLabel">

    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasMenuLabel">Menu</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <ul class="nav flex-column">

            <!-- Home -->
            <li class="nav-item">
                <a class="nav-link text-primary" href="#">Home</a>
            </li>

            <!-- Trekking in Nepal -->
            <li class="nav-item">
                <a class="nav-link text-primary d-flex justify-content-between align-items-center"
                    data-bs-toggle="collapse" href="#trekkingSubmenu" role="button" aria-expanded="false"
                    aria-controls="trekkingSubmenu">
                    Trekking in Nepal
                    <i class="fa-solid fa-chevron-down ms-2 toggle-icon" data-target="#trekkingSubmenu"></i>
                </a>
                <div class="collapse" id="trekkingSubmenu">
                    <ul class="nav flex-column ms-3">
                        <li class="nav-item">
                            <a class="nav-link text-secondary" href="#">Everest Region</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-secondary d-flex justify-content-between align-items-center"
                                data-bs-toggle="collapse" href="#annapurnaSubmenu" role="button" aria-expanded="false"
                                aria-controls="annapurnaSubmenu">
                                Annapurna Region
                                <i class="fa-solid fa-chevron-down ms-2 toggle-icon"
                                    data-target="#annapurnaSubmenu"></i>
                            </a>
                            <div class="collapse" id="annapurnaSubmenu">
                                <ul class="nav flex-column ms-3">
                                    <li class="nav-item"><a class="nav-link text-secondary" href="#">Mardi
                                            Himal</a></li>
                                    <li class="nav-item"><a class="nav-link text-secondary" href="#">Poon
                                            Hill</a></li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-secondary" href="#">Langtang Region</a>
                        </li>
                    </ul>
                </div>
            </li>

            <!-- Heli Tours -->
            <li class="nav-item">
                <a class="nav-link text-primary d-flex justify-content-between align-items-center"
                    data-bs-toggle="collapse" href="#heliToursSubmenu" role="button" aria-expanded="false"
                    aria-controls="heliToursSubmenu">
                    Heli Tours
                    <i class="fa-solid fa-chevron-down ms-2 toggle-icon" data-target="#heliToursSubmenu"></i>
                </a>
                <div class="collapse" id="heliToursSubmenu">
                    <ul class="nav flex-column ms-3">
                        <li class="nav-item"><a class="nav-link text-secondary" href="#">Everest Heli Tour</a>
                        </li>
                        <li class="nav-item"><a class="nav-link text-secondary" href="#">Annapurna Heli Tour</a>
                        </li>
                        <li class="nav-item"><a class="nav-link text-secondary" href="#">Gosaikunda Heli Tour</a>
                        </li>
                    </ul>
                </div>
            </li>

        </ul>
    </div>
</div>
