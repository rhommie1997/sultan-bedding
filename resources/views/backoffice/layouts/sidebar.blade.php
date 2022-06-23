<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link {{ Request::is('backoffice') ? 'active' : ''}}" aria-current="page" href="/backoffice">
            <span data-feather="home" class="align-text-bottom"></span>
            Dashboard
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('backoffice/products*') ? 'active' : ''}}" href="/backoffice/products">
            <span data-feather="file" class="align-text-bottom"></span>
            My Products
          </a>
        </li>
      </ul>

      @can('admin')
      <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
        <span>ADMINSTRATOR</span>
      </h6>
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link {{ Request::is('backoffice/kategori*') ? 'active' : ''}}" aria-current="page" href="/backoffice/kategori">
            <span data-feather="grid" class="align-text-bottom"></span>
            Kategori Settings
          </a>
        </li>
      </ul>
      @endcan
  
    </div>
  </nav>
