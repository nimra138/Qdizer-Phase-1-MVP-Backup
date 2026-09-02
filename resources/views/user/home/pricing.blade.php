@extends('user.home.partials..app')

@section('title', 'Pricing | QDizer')

@section('content')

<!-- ==========================================
Hero
========================================== -->

<section class="py-5 bg-light">

    <div class="container py-5">

        <div class="text-center">

            <span class="badge bg-warning text-dark px-3 py-2 rounded-pill mb-3">
                Simple & Transparent Pricing
            </span>

            <h1 class="display-4 fw-bold mb-3">
                One Plan.
                <span class="text-warning">Everything Included.</span>
            </h1>

            <p class="lead text-muted mx-auto" style="max-width:700px;">

                No hidden charges. No complicated plans.
                Get access to every feature with one affordable monthly subscription.

            </p>

        </div>

    </div>

</section>



<!-- ==========================================
Pricing Card
========================================== -->

<section class="py-5">

    <div class="container">

        <div class="row justify-content-center">

            <div class="col-lg-5">

                <div class="card border-0 shadow-lg rounded-4 overflow-hidden">

                    <div class="card-header bg-warning text-center py-3">

                        <span class="fw-bold text-dark">
                            ⭐ MOST POPULAR
                        </span>

                    </div>

                    <div class="card-body p-5 text-center">

                        <h3 class="fw-bold mb-3">

                            Professional Plan

                        </h3>

                        <h1 class="display-2 fw-bold text-dark">

                            79

                            <small class="fs-3 text-muted">
                                AED
                            </small>

                        </h1>

                        <p class="text-muted mb-4">

                            Per Month

                        </p>

                        <hr>

                        <div class="text-start mt-4">

                            <p>✅ 7-Day Free Trial</p>

                            <p>✅ Unlimited Quotations</p>

                            <p>✅ Unlimited Clients</p>

                            <p>✅ Unlimited Services</p>

                            <p>✅ Professional PDF Templates</p>

                            <p>✅ Company Branding</p>

                            <p>✅ WhatsApp Sharing</p>

                            <p>✅ Dashboard & Reports</p>

                            <p>✅ Client History</p>

                            <p>✅ Email Support</p>

                            <p>✅ Future Updates Included</p>

                        </div>

                        <a href="{{ route('register') }}"
                           class="btn btn-warning btn-lg w-100 rounded-pill mt-4">

                            Start 7-Day Free Trial

                        </a>

                        <small class="text-muted d-block mt-3">

                            No credit card required.

                        </small>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>



<!-- ==========================================
Why Choose
========================================== -->

<section class="py-5 bg-light">

    <div class="container">

        <div class="text-center mb-5">

            <h2 class="fw-bold">

                Why Businesses Choose QDizer

            </h2>

            <p class="text-muted">

                Everything you need to manage quotations professionally.

            </p>

        </div>

        <div class="row g-4">

            <div class="col-lg-4">

                <div class="card border-0 shadow-sm rounded-4 h-100">

                    <div class="card-body p-4 text-center">

                        <div class="display-5 mb-3">
                            ⚡
                        </div>

                        <h4>

                            Save Time

                        </h4>

                        <p class="text-muted">

                            Create quotations in under one minute using reusable
                            clients and services.

                        </p>

                    </div>

                </div>

            </div>

            <div class="col-lg-4">

                <div class="card border-0 shadow-sm rounded-4 h-100">

                    <div class="card-body p-4 text-center">

                        <div class="display-5 mb-3">
                            📄
                        </div>

                        <h4>

                            Professional PDFs

                        </h4>

                        <p class="text-muted">

                            Impress clients with modern branded quotation templates.

                        </p>

                    </div>

                </div>

            </div>

            <div class="col-lg-4">

                <div class="card border-0 shadow-sm rounded-4 h-100">

                    <div class="card-body p-4 text-center">

                        <div class="display-5 mb-3">
                            📲
                        </div>

                        <h4>

                            Instant Sharing

                        </h4>

                        <p class="text-muted">

                            Share quotations directly through WhatsApp or Email.

                        </p>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>



<!-- ==========================================
Comparison
========================================== -->

<section class="py-5">

    <div class="container">

        <div class="text-center mb-5">

            <h2 class="fw-bold">

                QDizer vs Traditional Method

            </h2>

        </div>

        <div class="table-responsive">

            <table class="table table-bordered align-middle">

                <thead class="table-dark">

                    <tr>

                        <th>Feature</th>

                        <th>Excel / Word</th>

                        <th>QDizer</th>

                    </tr>

                </thead>

                <tbody>

                    <tr>

                        <td>Professional PDFs</td>

                        <td>❌</td>

                        <td>✅</td>

                    </tr>

                    <tr>

                        <td>Client Management</td>

                        <td>❌</td>

                        <td>✅</td>

                    </tr>

                    <tr>

                        <td>Unlimited Quotations</td>

                        <td>❌</td>

                        <td>✅</td>

                    </tr>

                    <tr>

                        <td>WhatsApp Sharing</td>

                        <td>❌</td>

                        <td>✅</td>

                    </tr>

                    <tr>

                        <td>Dashboard</td>

                        <td>❌</td>

                        <td>✅</td>

                    </tr>

                    <tr>

                        <td>Cloud Access</td>

                        <td>❌</td>

                        <td>✅</td>

                    </tr>

                </tbody>

            </table>

        </div>

    </div>

</section>



<!-- ==========================================
FAQ
========================================== -->

<section class="py-5 bg-light">

    <div class="container">

        <div class="text-center mb-5">

            <h2 class="fw-bold">

                Frequently Asked Questions

            </h2>

        </div>

        <div class="accordion" id="pricingFAQ">

            <div class="accordion-item rounded-3 mb-3">

                <h2 class="accordion-header">

                    <button class="accordion-button"
                            data-bs-toggle="collapse"
                            data-bs-target="#q1">

                        Is there a free trial?

                    </button>

                </h2>

                <div id="q1"
                     class="accordion-collapse collapse show"
                     data-bs-parent="#pricingFAQ">

                    <div class="accordion-body">

                        Yes, every new account receives a full 7-day free trial.

                    </div>

                </div>

            </div>

            <div class="accordion-item rounded-3 mb-3">

                <h2 class="accordion-header">

                    <button class="accordion-button collapsed"
                            data-bs-toggle="collapse"
                            data-bs-target="#q2">

                        Can I cancel anytime?

                    </button>

                </h2>

                <div id="q2"
                     class="accordion-collapse collapse"
                     data-bs-parent="#pricingFAQ">

                    <div class="accordion-body">

                        Absolutely. There are no long-term contracts.

                    </div>

                </div>

            </div>

            <div class="accordion-item rounded-3">

                <h2 class="accordion-header">

                    <button class="accordion-button collapsed"
                            data-bs-toggle="collapse"
                            data-bs-target="#q3">

                        Do I get future updates?

                    </button>

                </h2>

                <div id="q3"
                     class="accordion-collapse collapse"
                     data-bs-parent="#pricingFAQ">

                    <div class="accordion-body">

                        Yes. Every subscription includes all future updates.

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>



<!-- ==========================================
CTA
========================================== -->

<section class="py-5 text-white"
    style="background:#0e222e;">

    <div class="container text-center">

        <h2 class="display-5 fw-bold mb-3">

            Ready To Grow Your Business?

        </h2>

        <p class="lead mb-4 text-light">

            Join thousands of businesses using QDizer
            to create professional quotations in seconds.

        </p>

        <a href="{{ route('register') }}"
           class="btn btn-warning btn-lg rounded-pill px-5 me-3">

            Start Free Trial

        </a>

        <a href="{{ route('contact') }}"
           class="btn btn-outline-light btn-lg rounded-pill px-5">

            Contact Sales

        </a>

    </div>

</section>

@endsection