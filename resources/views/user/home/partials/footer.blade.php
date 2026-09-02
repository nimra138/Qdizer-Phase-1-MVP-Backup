<footer id="company">
    <div class="wrap">

        <div class="footer-grid footer-grid-refined">

            {{-- Brand --}}
            <div class="footer-brand">

                <a href="{{ route('main') }}" aria-label="QDizer home">
                    <img src="{{ $setting?->company_logo ? asset('storage/' . $setting->company_logo) : asset('user/assets/qdizer-logo.png') }}"
                        alt="{{ $setting->company_name ?? 'QDizer' }}">
                </a>

                <p>
                    Professional quotations created, shared and tracked
                    in seconds — built for service and contracting businesses.
                </p>

                <div class="footer-badges">
                    <span>🇦🇪 Made in UAE</span>
                    <span>Secure & encrypted</span>
                    <span>WhatsApp-first</span>
                </div>

            </div>


            {{-- Product --}}
            <div>

                <h4>Product</h4>

                <a href="{{ route('features') }}">
                    Features
                </a>

                <a href="{{ route('pricing') }}">
                    Templates
                </a>

                <a href="{{ route('pricing') }}">
                    Pricing
                </a>

                <a href="{{ route('features') }}">
                    Security
                </a>

            </div>


            {{-- Company --}}
            <div>

                <h4>Company</h4>

                <a href="{{ route('about') }}">
                    About
                </a>

                <a href="{{ route('contact') }}">
                    Contact
                </a>

            </div>


            {{-- Resources --}}
            <div id="resources">

                <h4>Resources</h4>

                <a href="{{ route('contact') }}">
                    Help Center
                </a>

                <a href="{{ route('contact') }}">
                    Contact Support
                </a>

            </div>


            {{-- Legal --}}
            <div>

                <h4>Legal</h4>

                <a href="#">
                    Terms
                </a>

                <a href="#">
                    Privacy
                </a>

                <a href="#">
                    Cookie Policy
                </a>

            </div>

        </div>


        {{-- Industries --}}
        <div class="footer-industries">

            <strong>Built for service businesses.</strong>

            <span>HVAC</span>
            <span>Electrical</span>
            <span>Plumbing</span>
            <span>Cleaning</span>
            <span>Maintenance</span>
            <span>Security</span>
            <span>Landscaping</span>

        </div>


        {{-- Footer Bottom --}}
        <div class="footer-bottom">

            <span>
                © {{ date('Y') }}
                {{ $setting->company_name ?? 'QDizer' }}.
                All rights reserved.
            </span>

            <span>
                Start simple. Grow with QDizer.
            </span>

        </div>

    </div>
</footer>
