<nav class="navbar navbar-expand-lg navbar-modern sticky-top">
    <div class="container">

        <a href="{{ route('home') }}" class="navbar-brand d-flex align-items-center">

    <img src="{{ asset('user/img/logo.png') }}"
         alt="QDizer Logo"
         style="height:40px; width:auto;">

</a>

        <!-- Mobile Toggle -->
        <button class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarMenu">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Menu -->
        <div class="collapse navbar-collapse"
             id="navbarMenu">

            <ul class="navbar-nav mx-auto gap-lg-3">

                <li class="nav-item">
                    <a class="nav-link"
                       href="{{ route('home') }}">
                        Home
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link"
                       href="{{ route('about.page') }}">
                        About
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link"
                       href="{{ route('features.page') }}">
                        Features
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link"
                       href="{{ route('pricing.page') }}">
                        Pricing
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link"
                       href="{{ route('contact.page') }}">
                        Contact
                    </a>
                </li>

            </ul>

            <div class="d-flex">

                @auth
                    <a href="{{ route('home') }}"
                       class="btn btn-primary btn-modern me-2">
                        Dashboard
                    </a>
                @else
                    <a href="{{ route('login') }}"
                       class="btn btn-outline-secondary btn-modern me-2">
                        Login
                    </a>

                    <a href="{{ route('register') }}"
                       class="btn btn-accent btn-modern">
                        Get Started
                    </a>
                @endauth

            </div>

        </div>
    </div>
</nav>