
@php
    $user = auth()->user();

    $statusColor = match($user->status) {
        'active' => 'success',
        'trial' => 'warning',
        'expired' => 'danger',
        default => 'secondary'
    };

    $logo = asset('user/img/logo.png');
@endphp

<!-- Mobile Button + Brand Wrapper -->
<div class="d-flex align-items-center justify-content-between d-lg-none px-3 py-2">

    <!-- Mobile Menu Button -->
    <button class="mobile-menu-btn" id="menuToggle">
        <i class="fas fa-bars"></i>
    </button>

    {{-- <!-- Brand (Mobile) -->
    <div class="sidebar-brand mb-0">
        <img src="{{ $logo }}" style="max-height:40px;">
    </div> --}}

</div>

<div class="sidebar-overlay" id="sidebarOverlay"></div>

<aside class="sidebar" id="sidebar">

    <!-- Brand -->
    <div>

        <div class="sidebar-brand mb-4">
            <a href="{{ route('home') }}">
            <img src="{{ $logo }}" style="max-height:60px;">
            </a>
        </div>

        <!-- Menu -->
        <ul class="sidebar-menu">

            <!-- Dashboard -->
            <li>
                <a href="{{ route('home') }}"
                   class="menu-link {{ request()->routeIs('home') ? 'active' : '' }}">
                    <div class="menu-left">
                        <i class="fas fa-house menu-icon"></i>
                        Dashboard
                    </div>
                </a>
            </li>

            

            <!-- Quotations -->
           <li>
    <button class="dropdown-btn" data-bs-toggle="collapse" data-bs-target="#quotationMenu">
        <div class="menu-left">
            <i class="fas fa-file-invoice menu-icon"></i>
            Quotations
        </div>
        <i class="fas fa-chevron-down"></i>
    </button>

    @php
        $expired = auth()->check() && auth()->user()->status == 'expired';
    @endphp

    <div class="collapse sho" id="quotationMenu">
        <ul class="submenu">

            <li>
                <a href="{{ $expired ? 'javascript:void(0)' : route('quotations.index') }}"
                   class="{{ $expired ? 'text-muted' : '' }}"
                   @if($expired)
                       onclick="alert('Your trial has expired. Please upgrade your subscription.')"
                   @endif>
                    <i class="fas fa-list"></i>
                    All Quotations
                </a>
            </li>

            <li>
                <a href="{{ $expired ? 'javascript:void(0)' : route('quotations.create') }}"
                   class="{{ $expired ? 'text-muted' : '' }}"
                   @if($expired)
                       onclick="alert('Your trial has expired. Please upgrade your subscription.')"
                   @endif>
                    <i class="fas fa-plus"></i>
                    Create Quotation
                </a>
            </li>

        </ul>
    </div>
</li>

            <!-- Clients -->
            <li>
                <button class="dropdown-btn" data-bs-toggle="collapse" data-bs-target="#clientMenu">
                    <div class="menu-left">
                        <i class="fas fa-users menu-icon"></i>
                        Clients
                    </div>
                    <i class="fas fa-chevron-down"></i>
                </button>

                <div class="collapse" id="clientMenu">
                    <ul class="submenu">
                        <li><a href="{{ route('clients.index') }}"><i class="fas fa-user-group"></i> All Clients</a></li>
                        <li><a href="{{ route('clients.create') }}"><i class="fas fa-user-plus"></i> Add Client</a></li>
                    </ul>
                </div>
            </li>
            <!-- Services -->
            <li>
                <button class="dropdown-btn" data-bs-toggle="collapse" data-bs-target="#servicesMenu">
                    <div class="menu-left">
                        <i class="fas fa-list menu-icon"></i>
                        Services
                    </div>
                    <i class="fas fa-chevron-down"></i>
                </button>

                <div class="collapse" id="servicesMenu">
                    <ul class="submenu">
                        <li><a href="{{ route('services.index') }}"><i class="fas fa-eye"></i> All Services</a></li>
                        <li><a href="{{ route('services.create') }}"><i class="fas fa-plus"></i> Create Service</a></li>
                    </ul>
                </div>
            </li>
            <!-- Settings -->
            <li>
                <button class="dropdown-btn" data-bs-toggle="collapse" data-bs-target="#settingsMenu">
                    <div class="menu-left">
                        <i class="fas fa-gear menu-icon"></i>
                        Company Settings
                    </div>
                    <i class="fas fa-chevron-down"></i>
                </button>

                <div class="collapse" id="settingsMenu">
                    <ul class="submenu">
                        <li><a href="{{ route('company.show') }}"><i class="fas fa-building"></i> Company Profile</a></li>
                        <li><a href="{{ route('company.edit') }}"><i class="fas fa-palette"></i>Company Edit</a></li>
                        {{-- <li><a href="#"><i class="fas fa-envelope"></i> Email Settings</a></li> --}}
                    </ul>
                </div>
            </li>

            <!-- Billing -->
            <li>
                <a href="#" class="menu-link">
                    <div class="menu-left">
                        <i class="fas fa-credit-card menu-icon"></i>
                        Billing / Subscription
                    </div>
                </a>
            </li>

        </ul>
    </div>

    <!-- Footer -->
    <div class="sidebar-footer">

        <!-- Plan -->
        <div class="plan-box mb-3">
            <small>Current Plan</small>
            <h6>
                <span class="badge bg-{{ $statusColor }}">
                    {{ ucfirst($user->status) }}
                </span>
                Subscription 🚀
            </h6>
        </div>

        <!-- User Dropdown -->
        <div class="dropdown">

            <button class="user-dropdown-btn" data-bs-toggle="dropdown">

                <img src="https://ui-avatars.com/api/?name={{ urlencode($user->name) }}" />

                <div class="user-meta">
                    <h6>{{ $user->name }}</h6>
                    <small>{{ $user->email }}</small>
                </div>

                <i class="fas fa-chevron-down"></i>

            </button>

            <ul class="dropdown-menu dropdown-menu-end shadow border-0">

                <li class="dropdown-header">
                    <strong>{{ $user->name }}</strong><br>
                    <small>{{ $user->email }}</small>
                </li>

                <li><hr></li>

                <li>
                    <a class="dropdown-item" href="{{ route('company.show') }}">
                        <i class="fas fa-user me-2"></i> Profile
                    </a>
                </li>

                <li>
                    <a class="dropdown-item" href="{{ route('company.edit') }}">
                        <i class="fas fa-gear me-2"></i> Settings
                    </a>
                </li>

                <li><hr></li>

                <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button class="dropdown-item text-danger">
                            <i class="fas fa-right-from-bracket me-2"></i> Logout
                        </button>
                    </form>
                </li>

            </ul>

        </div>

    </div>
</aside>
<script>

const menuToggle = document.getElementById('menuToggle');
const sidebar = document.getElementById('sidebar');
const overlay = document.getElementById('sidebarOverlay');

menuToggle.addEventListener('click', function () {
    sidebar.classList.toggle('show');
    overlay.classList.toggle('show');
});

overlay.addEventListener('click', function () {
    sidebar.classList.remove('show');
    overlay.classList.remove('show');
});

</script>