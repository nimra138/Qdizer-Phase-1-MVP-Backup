
<section class="py-5 bg-dark text-white">

    <div class="container">

        <div class="row g-5">

            <div class="col-lg-4">

                <h3 class="fw-bold text-warning">

                      <div class="sidebar-brand mb-4">

    @if($setting?->company_logo)

        <a  class="navbar-brand"  href="{{ route('main') }}">

            <img src="{{ asset('storage/'.$setting->company_logo) }}"
                 alt="QDizer"
                 
                  height="42">

        </a>

    @else

        <a href="{{ route('home') }}">
            <h5>{{ $setting->company_name ?? 'QDizer' }}</h5>
        </a>

    @endif

                </h3>

                <p class="text-light">

                    Modern quotation management software
                    for contractors, suppliers,
                    consultants and service businesses.

                </p>

                <div class="d-flex gap-3 fs-4">

                    <a href="#" class="text-white">

                        <i class="bi bi-facebook"></i>

                    </a>

                    <a href="#" class="text-white">

                        <i class="bi bi-linkedin"></i>

                    </a>

                    <a href="#" class="text-white">

                        <i class="bi bi-instagram"></i>

                    </a>

                    <a href="#" class="text-white">

                        <i class="bi bi-youtube"></i>

                    </a>

                </div>

            </div>

            <div class="col-lg-2">

                <h5>

                    Product

                </h5>

                <ul class="list-unstyled">

                    <li class="mb-2">
                        <a href="{{ route('features') }}"
                           class="text-light text-decoration-none">
                            Features
                        </a>
                    </li>

                    <li class="mb-2">
                        <a href="{{ route('pricing') }}"
                           class="text-light text-decoration-none">
                            Pricing
                        </a>
                    </li>

                    <li class="mb-2">
                        <a href="{{ route('about') }}"
                           class="text-light text-decoration-none">
                            About
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('contact') }}"
                           class="text-light text-decoration-none">
                            Contact
                        </a>
                    </li>

                </ul>

            </div>

            <div class="col-lg-3">

                <h5>

                    Resources

                </h5>

                <ul class="list-unstyled">

                    <li class="mb-2">Documentation</li>

                    <li class="mb-2">Help Center</li>

                    <li class="mb-2">Privacy Policy</li>

                    <li>Terms & Conditions</li>

                </ul>

            </div>

           <div class="col-lg-3">

    <h5>Contact</h5>

    <p class="mb-2">
        📧 {{ $setting->company_email ?? 'support@qdizer.com' }}
    </p>

    <p class="mb-2">
        📞 {{ $setting->company_phone ?? '+971 50 123 4567' }}
    </p>

    <p class="mb-0">
        📍 {!! nl2br(e($setting->company_address ?? 'Business Bay, Dubai, UAE')) !!}
    </p>

</div>

        </div>

        <hr class="border-secondary my-5">

        <div class="row">

            <div class="col-md-6">

                © {{ date('Y') }}
                QDizer.
                All Rights Reserved.

            </div>

            <div class="col-md-6 text-md-end">

                Designed by
                <strong>Amberbyte</strong>

            </div>

        </div>

    </div>

</section>