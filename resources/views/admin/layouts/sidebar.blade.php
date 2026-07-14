<aside class="sidebar p-3">

    <!-- Logo -->
    <div class="d-flex align-items-center mb-4">
        <i class="fas fa-file-signature text-primary fs-3"></i>
        <div class="ms-2">
            <h5 class="mb-0 fw-bold">Admin QDizer</h5>
            <small class="text-muted">Control Panel</small>
        </div>
    </div>

    <!-- Navigation -->
    <ul class="nav flex-column">

        <li class="nav-item mb-1">
            <a href="{{ route('admin.dashboard') }}"
                class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <i class="fas fa-chart-pie me-2"></i>
                Dashboard
            </a>
        </li>

        <li class="nav-item mb-1">
            <a href="{{ route('admin.users') }}"
                class="nav-link {{ request()->routeIs('admin.users*') ? 'active' : '' }}">
                <i class="fas fa-users me-2"></i>
                Users
            </a>
        </li>

        <li class="nav-item mb-1">
            <a href="{{ route('admin.clients') }}"
                class="nav-link {{ request()->routeIs('admin.clients') ? 'active' : '' }}">
                <i class="fas fa-building me-2"></i>
                Clients
            </a>
        </li>

        <li class="nav-item mb-1">
            <a href="{{ route('admin.services') }}"
                class="nav-link {{ request()->routeIs('admin.services') ? 'active' : '' }}">
                <i class="fas fa-briefcase me-2"></i>
                Services
            </a>
        </li>

        <li class="nav-item mb-1">
            <a href="{{ route('admin.quotations') }}"
                class="nav-link {{ request()->routeIs('admin.quotations') ? 'active' : '' }}">
                <i class="fas fa-file-invoice-dollar me-2"></i>
                Quotations
            </a>
        </li>

        {{-- <li class="nav-item mb-1">
            <a href="{{ route('admin.subscriptions') }}"
                class="nav-link {{ request()->routeIs('admin.subscriptions') ? 'active' : '' }}">
                <i class="fas fa-credit-card me-2"></i>
                Subscriptions
            </a>
        </li>

        <li class="nav-item mb-1">
            <a href="{{ route('admin.transactions') }}"
                class="nav-link {{ request()->routeIs('admin.transactions') ? 'active' : '' }}">
                <i class="fas fa-wallet me-2"></i>
                Transactions
            </a>
        </li>

        <li class="nav-item mb-1">
            <a href="{{ route('admin.reports') }}"
                class="nav-link {{ request()->routeIs('admin.reports') ? 'active' : '' }}">
                <i class="fas fa-chart-line me-2"></i>
                Reports
            </a>
        </li> --}}

        <li class="nav-item mb-1">
            <a href="{{ route('admin.settings') }}"
                class="nav-link {{ request()->routeIs('admin.settings') ? 'active' : '' }}">
                <i class="fas fa-cogs me-2"></i>
                Settings
            </a>
        </li>

        <hr class="my-3">

        {{-- <li class="nav-item mb-1">
            <a href="{{ route('admin.profile') }}"
                class="nav-link {{ request()->routeIs('admin.profile') ? 'active' : '' }}">
                <i class="fas fa-user-circle me-2"></i>
                My Profile
            </a>
        </li> --}}

        <li class="mt-3">
            <form action="{{ route('admin.logout') }}" method="POST">
                @csrf
                <button class="btn btn-danger w-100 rounded-3">
                    <i class="fas fa-sign-out-alt me-2"></i>
                    Logout
                </button>
            </form>
        </li>

    </ul>

</aside>