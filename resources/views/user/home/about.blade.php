@extends('user.home.partials..app')

@section('title', 'About Us | QDizer')

@section('content')

<!-- Hero -->
<section class="py-5 bg-light">
    <div class="container py-5">

        <div class="row align-items-center">

            <div class="col-lg-6" data-aos="fade-right">

                <span class="badge bg-warning text-dark px-3 py-2 rounded-pill mb-3">
                    About QDizer
                </span>

                <h1 class="display-4 fw-bold mb-4">
                    Helping Businesses Create
                    <span class="text-warning">Professional Quotations</span>
                </h1>

                <p class="lead text-muted mb-4">
                    QDizer is a cloud-based quotation management platform built for
                    contractors, suppliers, and service businesses. Our goal is to
                    simplify quotation creation while giving every business a
                    professional image.
                </p>

                <a href="{{ route('register') }}" class="btn btn-warning btn-lg px-4">
                    Start Free Trial
                </a>

            </div>

            <div class="col-lg-6 text-center" data-aos="fade-left">

                <img src="https://placehold.co/650x450?text=QDizer+Dashboard"
                    class="img-fluid rounded-4 shadow-lg">

            </div>

        </div>

    </div>
</section>

<!-- Mission -->
<section class="py-5">

    <div class="container">

        <div class="row g-5 align-items-center">

            <div class="col-lg-6" data-aos="fade-up">

                <img src="https://placehold.co/600x450?text=Our+Mission"
                    class="img-fluid rounded-4 shadow">

            </div>

            <div class="col-lg-6" data-aos="fade-up">

                <span class="badge bg-primary mb-3">
                    Our Mission
                </span>

                <h2 class="fw-bold mb-4">
                    Making Quotation Management Faster & Smarter
                </h2>

                <p class="text-muted mb-3">
                    Many businesses still create quotations using spreadsheets,
                    WhatsApp messages, or manually designed documents. This process
                    wastes time and looks unprofessional.
                </p>

                <p class="text-muted mb-4">
                    QDizer solves these challenges by providing an easy-to-use,
                    modern quotation management platform that helps businesses save
                    time, improve branding, and win more clients.
                </p>

                <div class="row">

                    <div class="col-6 mb-3">
                        ✅ Unlimited Quotations
                    </div>

                    <div class="col-6 mb-3">
                        ✅ Client Management
                    </div>

                    <div class="col-6 mb-3">
                        ✅ PDF Generator
                    </div>

                    <div class="col-6 mb-3">
                        ✅ WhatsApp Sharing
                    </div>

                </div>

            </div>

        </div>

    </div>

</section>

<!-- Stats -->
<section class="py-5 bg-light">

    <div class="container">

        <div class="row text-center g-4">

            <div class="col-md-3" data-aos="zoom-in">

                <div class="card border-0 shadow-sm rounded-4 p-4">

                    <h2 class="fw-bold text-warning">2,500+</h2>

                    <p class="mb-0 text-muted">
                        Businesses
                    </p>

                </div>

            </div>

            <div class="col-md-3" data-aos="zoom-in">

                <div class="card border-0 shadow-sm rounded-4 p-4">

                    <h2 class="fw-bold text-warning">500K+</h2>

                    <p class="mb-0 text-muted">
                        Quotations Created
                    </p>

                </div>

            </div>

            <div class="col-md-3" data-aos="zoom-in">

                <div class="card border-0 shadow-sm rounded-4 p-4">

                    <h2 class="fw-bold text-warning">18+</h2>

                    <p class="mb-0 text-muted">
                        Countries
                    </p>

                </div>

            </div>

            <div class="col-md-3" data-aos="zoom-in">

                <div class="card border-0 shadow-sm rounded-4 p-4">

                    <h2 class="fw-bold text-warning">99.9%</h2>

                    <p class="mb-0 text-muted">
                        Uptime
                    </p>

                </div>

            </div>

        </div>

    </div>

</section>

<!-- Why Choose -->
<section class="py-5">

    <div class="container">

        <div class="text-center mb-5">

            <h2 class="fw-bold">
                Why Choose QDizer?
            </h2>

            <p class="text-muted">
                Designed specifically for contractors and service businesses.
            </p>

        </div>

        <div class="row g-4">

            <div class="col-lg-4">

                <div class="card border-0 shadow-sm rounded-4 h-100">

                    <div class="card-body p-4">

                        <div class="display-5 mb-3">⚡</div>

                        <h4>Save Time</h4>

                        <p class="text-muted">
                            Create quotations in less than a minute using reusable
                            clients and services.
                        </p>

                    </div>

                </div>

            </div>

            <div class="col-lg-4">

                <div class="card border-0 shadow-sm rounded-4 h-100">

                    <div class="card-body p-4">

                        <div class="display-5 mb-3">📄</div>

                        <h4>Professional Branding</h4>

                        <p class="text-muted">
                            Generate premium PDF quotations with your logo and
                            company branding.
                        </p>

                    </div>

                </div>

            </div>

            <div class="col-lg-4">

                <div class="card border-0 shadow-sm rounded-4 h-100">

                    <div class="card-body p-4">

                        <div class="display-5 mb-3">📱</div>

                        <h4>Share Anywhere</h4>

                        <p class="text-muted">
                            Send quotations instantly through WhatsApp or download
                            high-quality PDF files.
                        </p>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>

<!-- Timeline -->
<section class="py-5 bg-light">

    <div class="container">

        <div class="text-center mb-5">

            <h2 class="fw-bold">
                Our Journey
            </h2>

        </div>

        <div class="row g-4 text-center">

            <div class="col-md-4">

                <div class="card border-0 shadow rounded-4 p-4">

                    <h3 class="text-warning">2025</h3>

                    <h5>Idea</h5>

                    <p class="text-muted">
                        QDizer was planned to modernize quotation management.
                    </p>

                </div>

            </div>

            <div class="col-md-4">

                <div class="card border-0 shadow rounded-4 p-4">

                    <h3 class="text-warning">2026</h3>

                    <h5>Launch</h5>

                    <p class="text-muted">
                        Public launch with quotation builder, PDF export, and
                        WhatsApp sharing.
                    </p>

                </div>

            </div>

            <div class="col-md-4">

                <div class="card border-0 shadow rounded-4 p-4">

                    <h3 class="text-warning">Future</h3>

                    <h5>AI Automation</h5>

                    <p class="text-muted">
                        AI-generated quotations, CRM integrations, and advanced
                        analytics.
                    </p>

                </div>

            </div>

        </div>

    </div>

</section>

<!-- CTA -->
<section class="py-5 text-white" style="background:#0e222e;">

    <div class="container text-center">

        <h2 class="fw-bold mb-3">
            Ready to Modernize Your Quotation Process?
        </h2>

        <p class="mb-4 text-light">
            Join thousands of businesses using QDizer to create professional
            quotations and impress their clients.
        </p>

        <a href="{{ route('register') }}" class="btn btn-warning btn-lg px-5">
            Start Your 7-Day Free Trial
        </a>

    </div>

</section>

@endsection