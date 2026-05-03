<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl">

    <div class="container-fluid py-1 px-3">

        {{-- Breadcrumb --}}
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0">
                <li class="breadcrumb-item text-sm">
                    <a class="opacity-5 text-dark" href="#">Pages</a>
                </li>
                <li class="breadcrumb-item text-sm text-dark active">
                    @yield('title')
                </li>
            </ol>
            <h6 class="font-weight-bolder mb-0">@yield('title')</h6>
        </nav>

        {{-- Right Side --}}
        <div class="collapse navbar-collapse mt-sm-0 mt-2">

            {{-- Search --}}
            <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-search"></i></span>
                    <input type="text" class="form-control" placeholder="Search...">
                </div>
            </div>

            {{-- User --}}
            <ul class="navbar-nav justify-content-end">

                <li class="nav-item d-flex align-items-center">
                    <a href="#" class="nav-link font-weight-bold px-0">
                        <i class="fa fa-user me-1"></i>
                        {{ auth()->user()->name ?? 'Admin' }}
                    </a>
                </li>

                {{-- Logout --}}
                <li class="nav-item d-flex align-items-center ms-3">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button class="btn btn-sm btn-outline-danger">Logout</button>
                    </form>
                </li>

            </ul>

        </div>

    </div>

</nav>