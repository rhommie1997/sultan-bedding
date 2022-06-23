<h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted text-uppercase">
    <span>MENU</span>
  </h6>
  <ul class="nav flex-column">
    <li class="nav-item">
      <a class="nav-link {{ ($title === "home") ? 'active' : ''}}" aria-current="page" href="/">
        <span data-feather="home" class="align-text-bottom"></span>
        Home
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link {{ ($title === "Products") ?  'active' : ($title === "Product") ? 'active' : ''}}" href="/products">
        <span data-feather="package" class="align-text-bottom"></span>
        Products
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link {{ ($title === "Seprei Products") ? 'active' : ''}}" href="/kategori/kategori-seprei">
        <span data-feather="package" class="align-text-bottom"></span>
        All in Sprei
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link  {{ ($title === "Bedcover Products") ? 'active' : ''}}" href="/kategori/kategori-bedcover">
        <span data-feather="package" class="align-text-bottom"></span>
        All in Bedcover
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link {{ ($title === "Other Products") ? 'active' : ''}}" href="/products/other">
        <span data-feather="package" class="align-text-bottom"></span>
        All in Sarban & Sargul
      </a>
    </li>
  </ul>