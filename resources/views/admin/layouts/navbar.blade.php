<nav class="topbar navbar navbar-expand-lg px-4 py-3">

    <!-- Sidebar Toggle -->
    <button class="btn btn-light d-lg-none" onclick="toggleSidebar()">
        <i class="fas fa-bars"></i>
    </button>

    <!-- Title -->
    <div class="ms-3">
        <h5 class="mb-0 fw-bold">@yield('title')</h5>
    </div>

    <!-- Right Side -->
    <div class="ms-auto d-flex align-items-center gap-3">

        <!-- Search -->
        <div class="d-none d-md-block">
            <input type="text" class="form-control form-control-sm rounded-3" placeholder="Search...">
        </div>

        <!-- User -->
        <div class="dropdown">

            <a class="d-flex align-items-center text-decoration-none" data-bs-toggle="dropdown">

                <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center"
                     style="width:38px;height:38px;">
                    {{ strtoupper(substr(auth()->user()->name ?? 'A',0,1)) }}
                </div>

                <span class="ms-2 d-none d-md-block">
                    {{ auth()->user()->name ?? 'Admin' }}
                </span>

            </a>

            <ul class="dropdown-menu dropdown-menu-end shadow border-0">

                <li><a class="dropdown-item" href="#">Profile</a></li>
                <li><a class="dropdown-item" href="#">Settings</a></li>

                <li><hr></li>

                <li>
                    <form method="POST" action="{{ route('admin.logout') }}">
                        @csrf
                        <button class="dropdown-item text-danger">Logout</button>
                    </form>
                </li>

            </ul>

        </div>

    </div>

</nav>