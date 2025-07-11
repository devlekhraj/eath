<style>
  /* Override Bootstrap dropdown-menu width for mega menu */
  .dropdown-menu.mega-menu {
    width: 100%;            /* full width or set fixed width */
    left: 0 !important;     /* align to container start */
    right: 0 !important;    /* align to container end */
    padding: 1rem 2rem;
    border-radius: 0;
  }

  /* Layout for mega menu columns */
  .mega-menu .row > div {
    padding: 0 1rem;
  }

  /* Optional: style links inside mega menu */
  .mega-menu .dropdown-item {
    padding: 0.25rem 0;
  }

  /* Show mega menu on hover */
  .nav-item.dropdown:hover > .dropdown-menu.mega-menu {
    display: block;
  }
</style>

<ul class="nav">
  <li class="nav-item dropdown position-static">
    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
      All Categories
    </a>
    <div class="dropdown-menu mega-menu p-4">
      <div class="container">
        <div class="row">
          <div class="col-lg-3">
            <h6 class="text-uppercase">Category 1</h6>
            <a class="dropdown-item" href="#">Item 1-1</a>
            <a class="dropdown-item" href="#">Item 1-2</a>
            <a class="dropdown-item" href="#">Item 1-3</a>
          </div>
          <div class="col-lg-3">
            <h6 class="text-uppercase">Category 2</h6>
            <a class="dropdown-item" href="#">Item 2-1</a>
            <a class="dropdown-item" href="#">Item 2-2</a>
            <a class="dropdown-item" href="#">Item 2-3</a>
          </div>
          <div class="col-lg-3">
            <h6 class="text-uppercase">Category 3</h6>
            <a class="dropdown-item" href="#">Item 3-1</a>
            <a class="dropdown-item" href="#">Item 3-2</a>
            <a class="dropdown-item" href="#">Item 3-3</a>
          </div>
          <div class="col-lg-3">
            <h6 class="text-uppercase">Category 4</h6>
            <a class="dropdown-item" href="#">Item 4-1</a>
            <a class="dropdown-item" href="#">Item 4-2</a>
            <a class="dropdown-item" href="#">Item 4-3</a>
          </div>
        </div>
      </div>
    </div>
  </li>
  <li>
    <a href="">Mobile</a>
  </li>
  <li>
    <a href="">Laptops</a>
  </li>
</ul>

<script>
  // Optional: keep Bootstrap dropdown JS functionality on click as fallback
  // or remove data-bs-toggle for hover only
</script>
