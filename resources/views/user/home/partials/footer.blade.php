<footer class="footer pt-5 pb-4">

    <div class="container">

        <div class="row g-4">

            <!-- Brand -->
            <div class="col-lg-4">
                 <a href="{{ route('home') }}" class="navbar-brand d-flex align-items-center">

    <img src="{{ asset('user/img/logo.png') }}"
         alt="QDizer Logo"
         style="height:40px; width:auto;">

</a>

                <p class="text- mt-3">
                    Smart quotation SaaS for businesses to create,
                    export and share quotations instantly.
                </p>
            </div>

            <!-- Pages -->
            <div class="col-lg-2">
                <h6 class="fw-bold mb-3">Pages</h6>

                <ul class="list-unstyled">

                    <li>
                        <a href="{{ route('home') }}">
                            Home
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('about.page') }}">
                            About
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('features.page') }}">
                            Features
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('pricing.page') }}">
                            Pricing
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('contact.page') }}">
                            Contact
                        </a>
                    </li>

                </ul>
            </div>

            <!-- Account -->
            <div class="col-lg-3">
                <h6 class="fw-bold mb-3">
                    Account
                </h6>

                <ul class="list-unstyled">

                    <li>
                        <a href="{{ route('login') }}">
                            Login
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('register') }}">
                            Register
                        </a>
                    </li>

                </ul>
            </div>

            <!-- Contact -->
            <div class="col-lg-3">
                <h6 class="fw- mb-3">
                    Contact
                </h6>

                <p class="text- mb-1">
                    support@qdizer.com
                </p>

                <p class="text-">
                    +92 300 0000000
                </p>
            </div>

        </div>

        <hr>

        <div class="text-center text-muted small">
            © {{ date('Y') }} QDizer — Smart Quotation SaaS
        </div>

    </div>

</footer>