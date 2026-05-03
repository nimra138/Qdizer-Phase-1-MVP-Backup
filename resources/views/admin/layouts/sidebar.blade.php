<aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4" id="sidenav-main">

    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-xl-none" id="iconSidenav"></i>

        <a class="navbar-brand m-0" href="#">
            <img src="{{ asset('assets/img/logo-ct-dark.png') }}" class="navbar-brand-img h-100" alt="logo">
            <span class="ms-1 font-weight-bold">Admin Panel</span>
        </a>
    </div>

    <hr class="horizontal dark mt-0">

    <div class="collapse navbar-collapse w-auto">
        <ul class="navbar-nav">

            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}">
                    <i class="ni ni-tv-2 text-dark text-sm opacity-10"></i>
                    <span class="nav-link-text ms-1">Dashboard</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="ni ni-calendar-grid-58 text-dark text-sm opacity-10"></i>
                    <span class="nav-link-text ms-1">Tables</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="ni ni-credit-card text-dark text-sm opacity-10"></i>
                    <span class="nav-link-text ms-1">Billing</span>
                </a>
            </li>

            <li class="nav-item mt-3">
                <h6 class="ps-4 text-uppercase text-xs font-weight-bolder opacity-6">Account</h6>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="ni ni-single-02 text-dark text-sm opacity-10"></i>
                    <span class="nav-link-text ms-1">Profile</span>
                </a>
            </li>

        </ul>
    </div>

</aside>