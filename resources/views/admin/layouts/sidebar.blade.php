<aside class="sidebar p-3">

    <!-- Logo -->
    <div class="d-flex align-items-center mb-4">
        <i class="fas fa-layer-group text-primary fs-4"></i>
        <span class="ms-2 fw-bold fs-5">Admin SaaS</span>
    </div>

    <!-- Menu -->
    <ul class="nav flex-column gap-1">

        <li>
            <a href="{{ route('admin.dashboard') }}"
               class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <i class="fas fa-chart-line me-2"></i> Dashboard
            </a>
        </li>

        <li>
            <a href="{{ route('admin.user') }}" class="nav-link {{ request()->routeIs('admin.user') ? 'active' : '' }}">
                <i class="fas fa-users me-2"></i> Users
            </a>
        </li>

        <li>
            <a href="#" class="nav-link">
                <i class="fas fa-box me-2"></i> Products
            </a>
        </li>

        <li>
            <a href="#" class="nav-link">
                <i class="fas fa-file me-2"></i> Reports
            </a>
        </li>

        <hr>

        <li>
            <a href="#" class="nav-link">
                <i class="fas fa-user me-2"></i> Profile
            </a>
        </li>

        <li>
            <form method="POST" action="{{ route('admin.logout') }}">
                @csrf
                <button class="btn btn-sm btn-outline-danger w-100 mt-2">
                    Logout
                </button>
            </form>
        </li>

    </ul>

</aside>