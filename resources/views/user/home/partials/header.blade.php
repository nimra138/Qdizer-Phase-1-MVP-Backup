<header>
    <div class="trustbar">
        <div class="wrap trustbar-inner">
            <span>Built for service & contracting businesses</span>
            <span>WhatsApp-first quotation workflow</span>
            <span>Create professional quotations in under 60 seconds</span>
            <span>🇦🇪 Made in UAE</span>
            <span>VAT Ready</span>
            <span>Monthly or annual plans</span>
        </div>
    </div>

    <nav class="navbar" aria-label="Main navigation">
        <div class="wrap nav-inner">

            {{-- Logo --}}
            @if ($setting?->company_logo)
                <a class="brand" href="{{ route('main') }}" aria-label="QDizer home">

                    <img src="{{ asset('storage/' . $setting->company_logo) }}"
                        alt="{{ $setting->company_name ?? 'QDizer' }}">

                </a>
            @else
                <a class="brand" href="{{ route('main') }}" aria-label="QDizer home">

                    {{ $setting->company_name ?? 'QDizer' }}

                </a>
            @endif


            {{-- Mobile Menu --}}
            <button class="menu-toggle" aria-label="Open menu" aria-expanded="false">

                <span></span>
                <span></span>
                <span></span>

            </button>


            {{-- Navigation Links --}}
            <div class="nav-links">

                <a href="{{ route('main') }}" class="{{ request()->routeIs('main') ? 'active' : '' }}">
                    Product
                </a>

                <a href="{{ route('features') }}" class="{{ request()->routeIs('features') ? 'active' : '' }}">
                    Templates
                </a>

                <a href="{{ route('pricing') }}" class="{{ request()->routeIs('pricing') ? 'active' : '' }}">
                    Pricing
                </a>

                <a href="{{ route('about') }}" class="{{ request()->routeIs('about') ? 'active' : '' }}">
                    Customers
                </a>

                <a href="{{ route('contact') }}" class="{{ request()->routeIs('contact') ? 'active' : '' }}">
                    Resources
                </a>

                <a href="{{ route('about') }}" class="{{ request()->routeIs('about') ? 'active' : '' }}">
                    Company
                </a>

            </div>


            {{-- Authentication Actions --}}
            <div class="nav-actions">

                @auth

                    @if (auth()->user()->email_verified_at)
                        <a class="login-link" href="{{ route('home') }}">
                            Dashboard
                        </a>
                    @endif
                @else
                    <a class="login-link" href="{{ route('login') }}">
                        Login
                    </a>

                    <a class="btn btn-gold btn-small" href="{{ route('register') }}">

                        Start 14-Day Free Trial <span>→</span>

                    </a>

                @endauth

            </div>

        </div>
    </nav>
</header>

{{-- <nav class="navbar navbar-expand-lg navbar-light fixed-top navbar-modern">

    <div class="container">

       
        <div class="sidebar-brand mb-4">

            @if ($setting?->company_logo)
                <a class="navbar-brand" href="{{ route('main') }}">

                    <img src="{{ asset('storage/' . $setting->company_logo) }}" alt="QDizer" height="42">

                </a>
            @else
                <a href="{{ route('home') }}">
                    <h5>{{ $setting->company_name ?? 'QDizer' }}</h5>
                </a>
            @endif

        </div>

        <!-- Mobile -->

        <button class="navbar-toggler border-0 shadow-none" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarMenu">

            <span class="navbar-toggler-icon"></span>

        </button>

        <div class="collapse navbar-collapse" id="navbarMenu">

            <ul class="navbar-nav mx-auto">

                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('main') ? 'active' : '' }}" href="{{ route('main') }}">
                        Home
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('features') ? 'active' : '' }}"
                        href="{{ route('features') }}">
                        Features
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('pricing') ? 'active' : '' }}"
                        href="{{ route('pricing') }}">
                        Pricing
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}" href="{{ route('about') }}">
                        About
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('contact') ? 'active' : '' }}"
                        href="{{ route('contact') }}">
                        Contact
                    </a>
                </li>

            </ul>

            <div class="d-flex align-items-center gap-2">

                @auth

                    @if (auth()->user()->email_verified_at)
                        <a href="{{ route('home') }}" class="btn btn-warning px-4 rounded-pill fw-semibold">

                            Dashboard

                        </a>
                    @endif
                @else
                    <a href="{{ route('login') }}" class="btn btn-light border rounded-pill px-4">

                        Login

                    </a>

                    <a href="{{ route('register') }}" class="btn btn-warning rounded-pill px-4 fw-semibold">

                        Start Free Trial

                    </a>

                @endauth

            </div>

        </div>

    </div>

</nav> --}}
<style>
    /* ===========================
Navbar
=========================== */

    .navbar-modern {

        background: rgba(255, 255, 255, .90);

        backdrop-filter: blur(18px);

        -webkit-backdrop-filter: blur(18px);

        border-bottom: 1px solid rgba(0, 0, 0, .05);

        padding: 16px 0;

        transition: .3s;

        z-index: 999;

    }

    .navbar-brand img {

        transition: .3s;

    }

    .navbar-brand img:hover {

        transform: scale(1.04);

    }

    .nav-link {

        color: #576661;

        font-weight: 600;

        margin: 0 10px;

        position: relative;

        transition: .3s;

    }

    .nav-link:hover {

        color: #ff8a00;

    }

    .nav-link.active {

        color: #ff8a00 !important;

    }

    .nav-link.active::after {

        content: '';

        position: absolute;

        left: 0;

        bottom: -8px;

        width: 100%;

        height: 3px;

        background: #ff8a00;

        border-radius: 20px;

    }

    .btn-warning {

        background: #ff8a00;

        border: none;

        color: #fff;

    }

    .btn-warning:hover {

        background: #e67800;

    }

    .btn-light {

        background: #fff;

    }

    @media(max-width:991px) {

        .navbar-collapse {

            background: #fff;

            margin-top: 15px;

            padding: 20px;

            border-radius: 18px;

            box-shadow: 0 10px 40px rgba(0, 0, 0, .08);

        }

        .navbar-nav {

            margin-bottom: 20px;

        }

        .nav-link {

            margin: 10px 0;

        }

    }
</style>
