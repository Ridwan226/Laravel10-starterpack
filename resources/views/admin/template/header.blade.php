  <div class="app-header header sticky">
    <div class="container-fluid main-container">
      <div class="d-flex">
        <a aria-label="Hide Sidebar" class="app-sidebar__toggle" data-bs-toggle="sidebar" href="javascript:void(0)"></a>
        <!-- sidebar-toggle-->
        <a class="logo-horizontal" href="{{ url('administrator/dashboard') }}">
          <img src="{{ asset('assets/admin/images/brand/logo.png') }}" class="header-brand-img desktop-logo"
            alt="logo">
          <img src="{{ asset('assets/admin/images/brand/logo-3.png') }}" class="header-brand-img light-logo1"
            alt="logo">
        </a>
        <!-- LOGO -->

        <div class="d-flex order-lg-2 ms-auto header-right-icons">

          <!-- SEARCH -->
          <div class="navbar navbar-collapse responsive-navbar p-0">
            <div class="collapse navbar-collapse" id="navbarSupportedContent-4">
              <div class="d-flex order-lg-2">


                <!-- SIDE-MENU -->
                <div class="dropdown d-flex profile-1">
                  <a href="javascript:void(0)" data-bs-toggle="dropdown" class="nav-link leading-none d-flex">
                    <img src="{{ asset('assets/admin/images/users/21.jpg') }}" alt="profile-user"
                      class="avatar  profile-user brround cover-image">
                  </a>
                  <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <div class="drop-heading">
                      <div class="text-center">
                        <h5 class="text-dark mb-0 fs-14 fw-semibold">Percy Kewshun</h5>
                        <small class="text-muted">Senior Admin</small>
                      </div>
                    </div>
                    <div class="dropdown-divider m-0"></div>
                    <a class="dropdown-item" href="profile.html">
                      <i class="dropdown-icon fe fe-user"></i> Profile
                    </a>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                      onclick="event.preventDefault();    document.getElementById('logout-form').submit();">
                      <i class="dropdown-icon fe fe-alert-circle"></i> Sign out
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                      @csrf
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
