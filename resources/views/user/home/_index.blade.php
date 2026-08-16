@extends('user.home.partials..app')

@section('title', 'QDizer | Professional Quotation Management Software')

@section('content')

   

    {{-- Hero Section  --}}
    <section class="hero-section position-relative overflow-hidden">

        <div class="container">

            <div class="row align-items-center">

                <div class="col-lg-6" data-aos="fade-right">

                    <span class="qd-eyebrow-badge">
                        ★ #1 Quotation Management Software for Service Businesses
                    </span>

                    <h1 class="qd-hero-title mt-4 mb-4">
                        Create. Send.<br>
                        Get Paid.<br>
                        <span class="text-warning-qd">From Anywhere.</span>
                    </h1>

                    <p class="lead text-muted mb-4">
                        Create professional quotations in 60 seconds,
                        send via WhatsApp, and get paid faster.
                    </p>

                    <div class="d-flex flex-wrap gap-3 mb-4">

                        <a href="{{ route('register') }}" class="btn qd-btn-dark btn-lg px-4 py-3">
                            Start 14-Day Free Trial
                        </a>
                        <a href="#" class="btn qd-btn-outline btn-lg px-4 py-3" data-bs-toggle="modal"
                            data-bs-target="#demoModal">
                            ▶ Watch Demo
                        </a>

                       

                    </div>

                    <div class="d-flex flex-wrap gap-4 qd-trust-row">
                        <span>✓ 14-Day Free Trial</span>
                        <span>✓ No Credit Card</span>
                        <span>✓ Cancel Anytime</span>
                    </div>

                </div>
                 <div class="modal fade" id="demoModal" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-dialog-centered">
                                <div class="modal-content">

                                    <div class="modal-header">
                                        <h5 class="modal-title">QDizer Demo</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>

                                    <div class="modal-body p-0">
                                        <div class="ratio ratio-16x9">
                                            <iframe src="https://www.youtube.com/embed/-vxpkUqL91g" title="QDizer Demo"
                                                frameborder="0"
                                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                                allowfullscreen>
                                            </iframe>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>
                <div class="col-lg-6 mt-5 mt-lg-0" data-aos="fade-left">

                    <div class="position-relative qd-hero-mockup">

                        <img src="https://placehold.co/900x600/0e222e/ffffff?text=QDizer+Dashboard"
                            class="img-fluid rounded-4 shadow-lg qd-laptop-img">

                        <img src="https://placehold.co/260x520/0e222e/ffffff?text=New+Quotation"
                            class="img-fluid rounded-4 shadow-lg qd-phone-img">

                    </div>

                </div>

            </div>

            <div class="text-center mt-5 pt-4">
                <small class="text-uppercase text-muted fw-semibold qd-small-label">
                    Trusted by service businesses across the region
                </small>

                <div class="row justify-content-center align-items-center mt-4 g-4 qd-brand-row">
                    <div class="col-6 col-md-2 fw-semibold text-muted">▲ Al Rahman Traders</div>
                    <div class="col-6 col-md-2 fw-semibold text-muted">◆ Bright Engineering</div>
                    <div class="col-6 col-md-2 fw-semibold text-muted">✻ Power Systems</div>
                    <div class="col-6 col-md-2 fw-semibold text-muted">✦ Smart Electric</div>
                    <div class="col-6 col-md-2 fw-semibold text-muted">🛡 BuildTech Solutions</div>
                </div>
            </div>

        </div>

    </section>


    {{-- Problem Section --}}

    <section class="py-5 qd-section-light" id="problem">

        <div class="container">

            <div class="text-center mb-5">
                <span class="qd-eyebrow">The Problem</span>
                <h2 class="qd-h2 mt-2">
                    Slow, messy quotations are<br>costing you clients.
                </h2>
            </div>

            <div class="row g-4">

                <div class="col-md-6 col-lg-3">
                    <div class="qd-problem-card h-100">
                        <div class="qd-problem-icon">🕐</div>
                        <h5 class="fw-bold mb-2">Time Consuming</h5>
                        <p class="text-muted mb-0">Creating quotations takes too much time.</p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3">
                    <div class="qd-problem-card h-100">
                        <div class="qd-problem-icon">📄</div>
                        <h5 class="fw-bold mb-2">Unprofessional</h5>
                        <p class="text-muted mb-0">Messy PDFs and screenshots reduce trust.</p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3">
                    <div class="qd-problem-card h-100">
                        <div class="qd-problem-icon">💬</div>
                        <h5 class="fw-bold mb-2">Hard to Follow Up</h5>
                        <p class="text-muted mb-0">No tracking means missed opportunities.</p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3">
                    <div class="qd-problem-card h-100">
                        <div class="qd-problem-icon">💰</div>
                        <h5 class="fw-bold mb-2">Deals Lost</h5>
                        <p class="text-muted mb-0">Slow responses mean competitors win.</p>
                    </div>
                </div>

            </div>

        </div>

    </section>

    {{-- How It Works --}}
    <section class="py-5" id="how-it-works">

        <div class="container">

            <span class="qd-eyebrow">How It Works</span>
            <h2 class="qd-h2 mt-2 mb-5">
                From quotation to payment<br>in 4 simple steps.
            </h2>

            <div class="row g-4 qd-steps-row">

                <div class="col-6 col-lg-3 text-center">
                    <div class="qd-step-icon">📝</div>
                    <h6 class="fw-bold mt-3 mb-1">1. Create</h6>
                    <p class="text-muted small mb-0">Create professional quotations in seconds.</p>
                </div>

                <div class="col-6 col-lg-3 text-center">
                    <div class="qd-step-icon">📤</div>
                    <h6 class="fw-bold mt-3 mb-1">2. Send</h6>
                    <p class="text-muted small mb-0">Send via PDF or WhatsApp with one click.</p>
                </div>

                <div class="col-6 col-lg-3 text-center">
                    <div class="qd-step-icon">👁️</div>
                    <h6 class="fw-bold mt-3 mb-1">3. Track</h6>
                    <p class="text-muted small mb-0">Track views and customer activity in real time.</p>
                </div>

                <div class="col-6 col-lg-3 text-center">
                    <div class="qd-step-icon">💳</div>
                    <h6 class="fw-bold mt-3 mb-1">4. Get Paid</h6>
                    <p class="text-muted small mb-0">Close more deals and get paid faster.</p>
                </div>

            </div>

        </div>

    </section>


    {{-- Built For Busy Businesses --}}
    <section class="py-5 qd-section-light" id="features">

        <div class="container">

            <div class="row align-items-center g-5">

                <div class="col-lg-5" data-aos="fade-right">

                    <span class="qd-eyebrow">Built For Busy Businesses</span>
                    <h2 class="qd-h2 mt-2 mb-4">
                        Everything you need.<br>All in one place.
                    </h2>

                    <ul class="list-unstyled qd-check-list">
                        <li>✓ Create quotations in seconds</li>
                        <li>✓ Send via WhatsApp or Email</li>
                        <li>✓ Track views and status in real time</li>
                        <li>✓ Manage clients and templates</li>
                        <li>✓ Export PDFs and share easily</li>
                    </ul>

                    <a href="#" class="btn qd-btn-dark mt-3 px-4">Explore Dashboard →</a>

                </div>

                <div class="col-lg-7" data-aos="fade-left">
                    <img src="https://placehold.co/900x600/0e222e/ffffff?text=QDizer+Dashboard"
                        class="img-fluid rounded-4 shadow-lg">
                </div>

            </div>

        </div>

    </section>


    {{-- Templates --}}
    <section class="py-5" id="templates">

        <div class="container">

            <span class="qd-eyebrow">Professional Templates</span>
            <h2 class="qd-h2 mt-2 mb-4">
                Beautiful templates that<br>represent your brand.
            </h2>
            <p class="text-muted mb-4">Choose from professionally designed templates or create your own.</p>

            <div class="row g-4 mb-4">
                <div class="col-6 col-lg-3">
                    <img src="https://placehold.co/300x400/ffffff/0e222e?text=Template+1"
                        class="img-fluid rounded-3 shadow-sm qd-template-img">
                </div>
                <div class="col-6 col-lg-3">
                    <img src="https://placehold.co/300x400/f5a623/0e222e?text=Template+2"
                        class="img-fluid rounded-3 shadow-sm qd-template-img">
                </div>
                <div class="col-6 col-lg-3">
                    <img src="https://placehold.co/300x400/0e222e/ffffff?text=Template+3"
                        class="img-fluid rounded-3 shadow-sm qd-template-img">
                </div>
                <div class="col-6 col-lg-3">
                    <img src="https://placehold.co/300x400/ffffff/0e222e?text=Template+4"
                        class="img-fluid rounded-3 shadow-sm qd-template-img">
                </div>
            </div>

            <a href="{{ route('register') }}" class="btn qd-btn-outline px-4">View All Templates →</a>

        </div>

    </section>


    {{-- Testimonials --}}
    
    <section class="py-5 qd-section-light" id="testimonials">

        <div class="container">

            <div class="text-center mb-5">
                <span class="qd-eyebrow">Testimonials</span>
                <h2 class="qd-h2 mt-2">Loved By Businesses</h2>
            </div>

            <div class="row g-4">

                <div class="col-lg-4">
                    <div class="card border-0 shadow-sm rounded-4 h-100">
                        <div class="card-body p-4">
                            <span class="text-warning-qd">★★★★★</span>
                            <p class="mt-3 text-muted">QDizer reduced our quotation time from 45 minutes to under 5
                                minutes.</p>
                            <hr>
                            <strong>Ahmed Khan</strong>
                            <div class="text-muted small">Al Rahman Traders</div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="card border-0 shadow-sm rounded-4 h-100">
                        <div class="card-body p-4">
                            <span class="text-warning-qd">★★★★★</span>
                            <p class="mt-3 text-muted">Our quotations now look premium and customers respond much faster.
                            </p>
                            <hr>
                            <strong>Ali Hassan</strong>
                            <div class="text-muted small">Bright Engineering</div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="card border-0 shadow-sm rounded-4 h-100">
                        <div class="card-body p-4">
                            <span class="text-warning-qd">★★★★★</span>
                            <p class="mt-3 text-muted">The WhatsApp sharing feature is amazing. Everything is now
                                organized.</p>
                            <hr>
                            <strong>Sarah Malik</strong>
                            <div class="text-muted small">Smart Electric</div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </section>


    {{-- Pricing --}}
    {{-- <section class="py-5" id="pricing">

    <div class="container">

        <div class="text-center mb-5">
            <span class="qd-eyebrow">Simple Pricing</span>
            <h2 class="qd-h2 mt-2 mb-3">Choose the plan that fits your business.</h2>

            <div class="qd-toggle mx-auto">
                <span class="qd-toggle-active">Monthly</span>
                <span>Yearly (Save 20%)</span>
            </div>
        </div>

        <div class="row g-4 justify-content-center">

            <div class="col-lg-4">
                <div class="qd-price-card h-100">
                    <div class="text-warning-qd mb-2">★★★★★</div>
                    <h4 class="fw-bold">Starter</h4>
                    <div class="qd-price">$19<span>/month</span></div>
                    <p class="text-muted small">Perfect for small businesses</p>
                    <ul class="list-unstyled qd-check-list my-4">
                        <li>✓ Up to 50 quotations / month</li>
                        <li>✓ 1 User</li>
                        <li>✓ Basic Templates</li>
                        <li>✓ PDF Export</li>
                        <li>✓ WhatsApp Integration</li>
                    </ul>
                    <a href="{{ route('register') }}" class="btn qd-btn-outline w-100">Start Free Trial</a>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="qd-price-card qd-price-card-popular h-100">
                    <span class="qd-popular-badge">Most Popular</span>
                    <h4 class="fw-bold">Professional</h4>
                    <div class="qd-price">$39<span>/month</span></div>
                    <p class="text-muted-light small">For growing businesses</p>
                    <ul class="list-unstyled qd-check-list my-4">
                        <li>✓ Unlimited quotations</li>
                        <li>✓ Up to 5 Users</li>
                        <li>✓ Premium Templates</li>
                        <li>✓ Analytics &amp; Tracking</li>
                        <li>✓ Priority Support</li>
                    </ul>
                    <a href="{{ route('register') }}" class="btn qd-btn-dark w-100">Start Free Trial</a>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="qd-price-card h-100">
                    <h4 class="fw-bold">Business</h4>
                    <div class="qd-price">$79<span>/month</span></div>
                    <p class="text-muted small">For teams and agencies</p>
                    <ul class="list-unstyled qd-check-list my-4">
                        <li>✓ Everything in Professional</li>
                        <li>✓ Unlimited Users</li>
                        <li>✓ Custom Branding</li>
                        <li>✓ API Access</li>
                        <li>✓ Dedicated Support</li>
                    </ul>
                    <a href="{{ route('register') }}" class="btn qd-btn-outline w-100">Start Free Trial</a>
                </div>
            </div>

        </div>

        <div class="text-center mt-4 qd-trust-row d-flex justify-content-center gap-4">
            <span>✓ 14-Day Free Trial</span>
            <span>✓ No Credit Card Required</span>
            <span>✓ Cancel Anytime</span>
        </div>

    </div>

</section> --}}
    <section class="py-5" id="pricing">
        <div class="container">

            <div class="text-center mb-5">
                <span class="qd-eyebrow">Simple Pricing</span>
                <h2 class="qd-h2 mt-2 mb-3">One Simple Plan for Every Business</h2>
                <p class="text-muted">
                    Everything you need to create, manage, and share professional quotations.
                </p>
            </div>

            <div class="row justify-content-center">
                <div class="col-lg-5 col-md-7">

                    <div class="qd-price-card qd-price-card-popular text-center h-100">
                        <span class="qd-popular-badge">Best Value</span>

                        <h4 class="fw-bold mb-2">QDizer Pro</h4>

                        <div class="qd-price">
                            79 AED <span>/ Month</span>
                        </div>

                        <p class="text-muted-light mb-4">
                            VAT Included • Cancel Anytime
                        </p>

                        <ul class="list-unstyled qd-check-list text-start mx-auto" style="max-width:280px;">
                            <li>✓ Unlimited Quotations</li>
                            <li>✓ Unlimited Clients</li>
                            <li>✓ Unlimited Services</li>
                            <li>✓ Premium PDF Export</li>
                            <li>✓ WhatsApp Sharing</li>
                            <li>✓ Priority Support</li>
                        </ul>

                        <a href="{{ route('register') }}" class="btn qd-btn-dark w-100 mt-3">
                            Start 7-Day Free Trial
                        </a>
                    </div>

                </div>
            </div>

            <div class="text-center mt-4 qd-trust-row d-flex justify-content-center gap-4 flex-wrap">
                <span>✓ 7-Day Free Trial</span>
                <span>✓ VAT Included</span>
                <span>✓ Cancel Anytime</span>
            </div>

        </div>
    </section>


    {{-- Final CTA --}}
  
    <section class="py-5">
        <div class="container">
            <div class="qd-final-cta d-flex flex-wrap align-items-center justify-content-between gap-3">

                <div class="d-flex align-items-center gap-3">
                    <span class="qd-cta-icon">⚡</span>
                    <div>
                        <h5 class="fw-bold mb-1 text-white">Start creating professional quotations today.</h5>
                        <p class="mb-0 text-light small">Join thousands of service businesses saving time and closing more
                            deals.</p>
                    </div>
                </div>

                <a href="{{ route('register') }}" class="btn qd-btn-amber px-4 py-2">Start Free Trial →</a>

            </div>
        </div>
    </section>




  

@endsection
