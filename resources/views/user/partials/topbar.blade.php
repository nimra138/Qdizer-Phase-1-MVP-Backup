<style>
    /* Desktop Topbar */
.desktop-topbar{
    position:fixed;
    top:0;
    left:280px;
    right:0;
    height:75px;
    background:rgba(255,255,255,.88);
    backdrop-filter:blur(16px);
    border-bottom:1px solid #e5e7eb;
    display:flex;
    justify-content:space-between;
    align-items:center;
    padding:0 28px;
    z-index:998;
}

.topbar-left h4{
    margin:0;
    font-weight:700;
}

.topbar-right{
    display:flex;
    align-items:center;
    gap:15px;
}

/* Bell */
.icon-btn{
    width:42px;
    height:42px;
    border:none;
    border-radius:12px;
    background:#f3f4f6;
    transition:.3s;
    cursor:pointer;
}

.icon-btn:hover{
    background:#e5e7eb;
}

/* User Dropdown Button */
.user-dropdown-btn{
    border:none;
    background:#f8fafc;
    border-radius:16px;
    padding:8px 14px;
    display:flex;
    align-items:center;
    gap:12px;
    cursor:pointer;
    transition:.3s;
}

.user-dropdown-btn:hover{
    background:#f1f5f9;
}

.user-dropdown-btn img{
    width:42px;
    height:42px;
    border-radius:50%;
    object-fit:cover;
}

.user-meta{
    text-align:left;
}

.user-meta h6{
    margin:0;
    font-size:14px;
    font-weight:600;
}

.user-meta small{
    color:#6b7280;
    font-size:12px;
}

/* Dropdown */
.user-dropdown{
    width:260px;
    border-radius:18px;
    padding:10px;
    margin-top:12px;
}

.dropdown-header{
    padding:12px;
}

.dropdown-item{
    display:flex;
    align-items:center;
    gap:12px;
    padding:12px 14px;
    border-radius:12px;
    transition:.3s;
}

.dropdown-item:hover{
    background:#f3f4f6;
}

.logout-btn{
    width:100%;
    border:none;
    background:none;
    text-align:left;
    color:#ef4444;
}

/* Mobile */
@media(max-width:991px){

    .desktop-topbar{
        display:none;
    }

    .mobile-topbar{
        display:flex;
    }
}
</style>
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
<!-- Mobile Topbar -->
<div class="mobile-topbar">

    <button class="menu-toggle" onclick="toggleSidebar()">
        ☰
    </button>

    {{-- <h4>QDizer</h4> --}}
    <!-- Brand (Mobile) -->
    <div class="sidebar-brand mb-0">
        <img src="{{ $logo }}" style="max-height:40px;">
    </div>

<!-- Mobile Button + Brand Wrapper -->

</div>

<!-- Desktop Topbar -->
<div class="desktop-topbar">

    <div class="topbar-left">
        <h4>@yield('title','Dashboard')</h4>
    </div>

    <div class="topbar-right">

        <!-- Notification -->
        {{-- <button class="icon-btn">
            <i class="fas fa-bell"></i>
        </button> --}}

        <!-- User Dropdown -->
        <div class="dropdown">

            <button class="user-dropdown-btn"
                    data-bs-toggle="dropdown">

                <img src="https://ui-avatars.com/api/?name={{ urlencode(auth()->user()->name) }}"
                     alt="">

                <div class="user-meta">
                    <h6>{{ auth()->user()->name }}</h6>
                    <small>{{ auth()->user()->email }}</small>
                </div>

                <i class="fas fa-chevron-down"></i>
            </button>

            <ul class="dropdown-menu dropdown-menu-end user-dropdown shadow border-0">

                <li class="dropdown-header">
                    <strong>{{ auth()->user()->name }}</strong><br>
                    <small>{{ auth()->user()->email }}</small>
                </li>

                <li><hr class="dropdown-divider"></li>

                <li>
                    <a class="dropdown-item" href="#">
                        <i class="fas fa-user"></i>
                        Profile
                    </a>
                </li>

                <li>
                    <a class="dropdown-item" href="#">
                        <i class="fas fa-cog"></i>
                        Settings
                    </a>
                </li>

                <li><hr class="dropdown-divider"></li>

                <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button class="dropdown-item logout-btn">
                            <i class="fas fa-sign-out-alt"></i>
                            Logout
                        </button>
                    </form>
                </li>

            </ul>

        </div>

    </div>

</div>