@extends('user.home.partials..app')

@section('title', 'QDizer | Professional Quotation Management Software')

@section('content')

<!-- ==========================================
Hero Section
=========================================== -->

<section class="hero-section position-relative overflow-hidden">

    <div class="container">

        <div class="row align-items-center min-vh-100">

            <div class="col-lg-6" data-aos="fade-right">

                <span class="badge bg-warning text-dark px-3 py-2 rounded-pill mb-4">
                    🚀 Trusted by 2,500+ Businesses
                </span>

                <h1 class="display-3 fw-bold mb-4">

                    Create Professional
                    <span class="text-warning">
                        Quotations
                    </span>

                    In Seconds

                </h1>

                <p class="lead text-muted mb-5">

                    QDizer helps contractors, suppliers and service businesses
                    create beautiful quotations, generate professional PDFs,
                    manage clients and share quotations instantly via WhatsApp.

                </p>

                <div class="d-flex flex-wrap gap-3">

                    <a href="{{ route('register') }}"
                       class="btn btn-warning btn-lg px-5 py-3">

                        Start Free Trial

                    </a>

                    <a href="#demo"
                       class="btn btn-outline-dark btn-lg px-5 py-3">

                        ▶ Watch Demo

                    </a>

                </div>

                <div class="row mt-5 g-4">

                    <div class="col-4">

                        <h2 class="fw-bold text-warning">
                            2500+
                        </h2>

                        <small class="text-muted">
                            Businesses
                        </small>

                    </div>

                    <div class="col-4">

                        <h2 class="fw-bold text-warning">
                            500K+
                        </h2>

                        <small class="text-muted">
                            Quotations
                        </small>

                    </div>

                    <div class="col-4">

                        <h2 class="fw-bold text-warning">
                            99.9%
                        </h2>

                        <small class="text-muted">
                            Uptime
                        </small>

                    </div>

                </div>

            </div>

            <div class="col-lg-6" data-aos="fade-left">

                <div class="position-relative">

                    <img src="https://placehold.co/900x650/F8F9FB/0e222e?text=QDizer+Dashboard"
                         class="img-fluid rounded-4 shadow-lg">

                    <div class="floating-card shadow">

                        <h6 class="mb-1">

                            PDF Generated

                        </h6>

                        <small class="text-muted">

                            Quote #QDZ-1025

                        </small>

                    </div>

                    <div class="floating-card-2 shadow">

                        <h6 class="mb-1">

                            WhatsApp Sent

                        </h6>

                        <small class="text-success">

                            Successfully Delivered

                        </small>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>



<!-- ==========================================
Trusted Companies
=========================================== -->

<section class="py-5 bg-light">

    <div class="container">

        <div class="text-center mb-5">

            <small class="text-uppercase text-muted fw-semibold">

                Trusted by Contractors Across UAE & Pakistan

            </small>

        </div>

        <div class="row text-center g-4">

            <div class="col-6 col-md-2">

                <div class="brand-card">

                    Prime Build

                </div>

            </div>

            <div class="col-6 col-md-2">

                <div class="brand-card">

                    Elite HVAC

                </div>

            </div>

            <div class="col-6 col-md-2">

                <div class="brand-card">

                    Smart Interiors

                </div>

            </div>

            <div class="col-6 col-md-2">

                <div class="brand-card">

                    Al Noor Group

                </div>

            </div>

            <div class="col-6 col-md-2">

                <div class="brand-card">

                    Vision Electric

                </div>

            </div>

            <div class="col-6 col-md-2">

                <div class="brand-card">

                    Sky Builders

                </div>

            </div>

        </div>

    </div>

</section>



<!-- ==========================================
Demo Video
=========================================== -->

<section id="demo" class="py-5">

    <div class="container">

        <div class="text-center mb-5">

            <span class="badge bg-warning text-dark mb-3">

                Product Demo

            </span>

            <h2 class="fw-bold">

                See QDizer In Action

            </h2>

            <p class="text-muted">

                Watch how easy it is to create quotations,
                generate PDFs and send them through WhatsApp.

            </p>

        </div>

        <div class="row justify-content-center">

            <div class="col-lg-10">

                <div class="video-card shadow-lg rounded-4 overflow-hidden">

                    <div class="ratio ratio-16x9">

                        <iframe
                            src="https://www.youtube.com/embed/dQw4w9WgXcQ"
                            title="QDizer Demo"
                            allowfullscreen>

                        </iframe>

                    </div>

                </div>

            </div>

        </div>

        <div class="row text-center mt-5 g-4">

            <div class="col-md-4">

                <div class="feature-mini">

                    <div class="icon-circle">

                        📄

                    </div>

                    <h5>

                        Create Quotation

                    </h5>

                    <p class="text-muted">

                        Build professional quotations within one minute.

                    </p>

                </div>

            </div>

            <div class="col-md-4">

                <div class="feature-mini">

                    <div class="icon-circle">

                        📑

                    </div>

                    <h5>

                        Generate PDF

                    </h5>

                    <p class="text-muted">

                        Download premium PDF layouts instantly.

                    </p>

                </div>

            </div>

            <div class="col-md-4">

                <div class="feature-mini">

                    <div class="icon-circle">

                        📲

                    </div>

                    <h5>

                        Share on WhatsApp

                    </h5>

                    <p class="text-muted">

                        Send quotations directly to your customers.

                    </p>

                </div>

            </div>

        </div>

    </div>

</section>
<!-- ==========================================
Problem Section
========================================== -->

<section class="py-5 bg-white">

    <div class="container">

        <div class="row align-items-center g-5">

            <div class="col-lg-6" data-aos="fade-right">

                <img src="https://placehold.co/650x500/F8F9FB/999999?text=Messy+Quotation+Process"
                     class="img-fluid rounded-4 shadow">

            </div>

            <div class="col-lg-6" data-aos="fade-left">

                <span class="badge bg-danger-subtle text-danger mb-3">
                    The Problem
                </span>

                <h2 class="fw-bold mb-4">
                    Still Creating Quotations
                    Using Excel & WhatsApp?
                </h2>

                <p class="text-muted mb-4">
                    Thousands of contractors still prepare quotations manually.
                    It wastes time, causes mistakes, and gives customers an
                    unprofessional first impression.
                </p>

                <div class="row">

                    <div class="col-12 mb-3">
                        ❌ Copy & Paste Customer Information Every Time
                    </div>

                    <div class="col-12 mb-3">
                        ❌ Unprofessional Word & Excel Documents
                    </div>

                    <div class="col-12 mb-3">
                        ❌ Difficult To Reuse Previous Quotations
                    </div>

                    <div class="col-12 mb-3">
                        ❌ No PDF Branding
                    </div>

                    <div class="col-12 mb-3">
                        ❌ Hard To Track Customer History
                    </div>

                    <div class="col-12">
                        ❌ No Centralized Quotation Management
                    </div>

                </div>

            </div>

        </div>

    </div>

</section>



<!-- ==========================================
Solution Section
========================================== -->

<section class="py-5 bg-light">

    <div class="container">

        <div class="text-center mb-5">

            <span class="badge bg-success mb-3">

                The Solution

            </span>

            <h2 class="fw-bold">

                QDizer Makes Everything Easy

            </h2>

            <p class="text-muted">

                Spend less time creating quotations and more time closing deals.

            </p>

        </div>

        <div class="row g-4">

            <div class="col-lg-4">

                <div class="card border-0 shadow-sm rounded-4 h-100">

                    <div class="card-body p-4">

                        <div class="display-5 mb-3">
                            ⚡
                        </div>

                        <h4 class="fw-bold">

                            Create In Seconds

                        </h4>

                        <p class="text-muted">

                            Generate beautiful quotations in less than one minute.

                        </p>

                    </div>

                </div>

            </div>

            <div class="col-lg-4">

                <div class="card border-0 shadow-sm rounded-4 h-100">

                    <div class="card-body p-4">

                        <div class="display-5 mb-3">
                            👥
                        </div>

                        <h4 class="fw-bold">

                            Save Clients

                        </h4>

                        <p class="text-muted">

                            Store customer information once and reuse forever.

                        </p>

                    </div>

                </div>

            </div>

            <div class="col-lg-4">

                <div class="card border-0 shadow-sm rounded-4 h-100">

                    <div class="card-body p-4">

                        <div class="display-5 mb-3">
                            📄
                        </div>

                        <h4 class="fw-bold">

                            Premium PDFs

                        </h4>

                        <p class="text-muted">

                            Professional quotation templates with company branding.

                        </p>

                    </div>

                </div>

            </div>

            <div class="col-lg-4">

                <div class="card border-0 shadow-sm rounded-4 h-100">

                    <div class="card-body p-4">

                        <div class="display-5 mb-3">
                            📲
                        </div>

                        <h4 class="fw-bold">

                            WhatsApp Sharing

                        </h4>

                        <p class="text-muted">

                            Send quotations directly to customers instantly.

                        </p>

                    </div>

                </div>

            </div>

            <div class="col-lg-4">

                <div class="card border-0 shadow-sm rounded-4 h-100">

                    <div class="card-body p-4">

                        <div class="display-5 mb-3">
                            📊
                        </div>

                        <h4 class="fw-bold">

                            Dashboard Analytics

                        </h4>

                        <p class="text-muted">

                            Track quotations, approvals and business growth.

                        </p>

                    </div>

                </div>

            </div>

            <div class="col-lg-4">

                <div class="card border-0 shadow-sm rounded-4 h-100">

                    <div class="card-body p-4">

                        <div class="display-5 mb-3">
                            ☁️
                        </div>

                        <h4 class="fw-bold">

                            Cloud Based

                        </h4>

                        <p class="text-muted">

                            Access your quotations from anywhere, anytime.

                        </p>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>



<!-- ==========================================
Feature Bento Grid
========================================== -->

<section class="py-5">

    <div class="container">

        <div class="text-center mb-5">

            <h2 class="fw-bold">

                Everything You Need In One Platform

            </h2>

            <p class="text-muted">

                Designed for contractors, suppliers, consultants and service businesses.

            </p>

        </div>

        <div class="row g-4">

            <div class="col-lg-6">

                <div class="card border-0 shadow rounded-4 h-100">

                    <div class="card-body p-5">

                        <h3 class="fw-bold mb-4">

                            📄 Smart Quotation Builder

                        </h3>

                        <p class="text-muted">

                            Build quotations using reusable services, automatic
                            numbering, taxes, discounts and professional layouts.

                        </p>

                        <img src="https://placehold.co/700x350/F8F9FB/0e222e?text=Quotation+Builder"
                             class="img-fluid rounded-3 mt-3">

                    </div>

                </div>

            </div>

            <div class="col-lg-6">

                <div class="row g-4">

                    <div class="col-12">

                        <div class="card border-0 shadow rounded-4">

                            <div class="card-body p-4">

                                <h5 class="fw-bold">

                                    👥 Client Management

                                </h5>

                                <p class="text-muted mb-0">

                                    Save unlimited customers with quotation history.

                                </p>

                            </div>

                        </div>

                    </div>

                    <div class="col-md-6">

                        <div class="card border-0 shadow rounded-4">

                            <div class="card-body p-4">

                                <h5>

                                    📑 PDF Export

                                </h5>

                                <small class="text-muted">

                                    Beautiful quotation templates.

                                </small>

                            </div>

                        </div>

                    </div>

                    <div class="col-md-6">

                        <div class="card border-0 shadow rounded-4">

                            <div class="card-body p-4">

                                <h5>

                                    📱 WhatsApp

                                </h5>

                                <small class="text-muted">

                                    One-click quotation sharing.

                                </small>

                            </div>

                        </div>

                    </div>

                    <div class="col-12">

                        <div class="card border-0 shadow rounded-4">

                            <div class="card-body p-4">

                                <h5 class="fw-bold">

                                    🏢 Company Branding

                                </h5>

                                <small class="text-muted">

                                    Add your logo, company details, VAT, terms &
                                    conditions and custom footer to every quotation.

                                </small>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>



<!-- ==========================================
Statistics
========================================== -->

<section class="py-5 bg-dark text-white">

    <div class="container">

        <div class="row text-center g-4">

            <div class="col-md-3">

                <h2 class="display-5 fw-bold text-warning">
                    500K+
                </h2>

                <p class="mb-0">
                    Quotations Generated
                </p>

            </div>

            <div class="col-md-3">

                <h2 class="display-5 fw-bold text-warning">
                    2,500+
                </h2>

                <p class="mb-0">
                    Businesses
                </p>

            </div>

            <div class="col-md-3">

                <h2 class="display-5 fw-bold text-warning">
                    18+
                </h2>

                <p class="mb-0">
                    Countries
                </p>

            </div>

            <div class="col-md-3">

                <h2 class="display-5 fw-bold text-warning">
                    99.9%
                </h2>

                <p class="mb-0">
                    Cloud Uptime
                </p>

            </div>

        </div>

    </div>

</section>



<!-- ==========================================
Why QDizer
========================================== -->

<section class="py-5 bg-white">

    <div class="container">

        <div class="row align-items-center g-5">

            <div class="col-lg-6">

                <span class="badge bg-warning text-dark mb-3">
                    Why QDizer?
                </span>

                <h2 class="fw-bold mb-4">
                    Stop Wasting Hours Creating Quotations
                </h2>

                <p class="text-muted mb-4">
                    QDizer replaces spreadsheets, manual PDFs and repetitive work
                    with one fast and professional platform.
                </p>

                <ul class="list-unstyled">

                    <li class="mb-3">✅ Unlimited Quotations</li>

                    <li class="mb-3">✅ Unlimited Clients</li>

                    <li class="mb-3">✅ Reusable Services</li>

                    <li class="mb-3">✅ Premium PDF Templates</li>

                    <li class="mb-3">✅ WhatsApp Integration</li>

                    <li class="mb-3">✅ Business Dashboard</li>

                </ul>

            </div>

            <div class="col-lg-6">

                <img src="https://placehold.co/700x500/F8F9FB/0e222e?text=Business+Dashboard"
                     class="img-fluid rounded-4 shadow">

            </div>

        </div>

    </div>

</section>
<!-- ==========================================================
HOW IT WORKS
=========================================================== -->

<section class="py-5">

    <div class="container">

        <div class="text-center mb-5">

            <span class="badge bg-warning text-dark px-3 py-2 mb-3">
                Simple Workflow
            </span>

            <h2 class="fw-bold">
                Create & Send Quotations In 4 Easy Steps
            </h2>

            <p class="text-muted">
                From customer information to a professionally branded PDF in less than a minute.
            </p>

        </div>

        <div class="row g-4">

            <div class="col-lg-3 col-md-6">

                <div class="card border-0 shadow-sm rounded-4 h-100 text-center">

                    <div class="card-body p-4">

                        <div class="display-5 mb-3">👤</div>

                        <span class="badge bg-warning text-dark mb-3">
                            STEP 1
                        </span>

                        <h5 class="fw-bold">
                            Add Client
                        </h5>

                        <p class="text-muted mb-0">
                            Save your client's company details and contact information.
                        </p>

                    </div>

                </div>

            </div>

            <div class="col-lg-3 col-md-6">

                <div class="card border-0 shadow-sm rounded-4 h-100 text-center">

                    <div class="card-body p-4">

                        <div class="display-5 mb-3">🛠️</div>

                        <span class="badge bg-warning text-dark mb-3">
                            STEP 2
                        </span>

                        <h5 class="fw-bold">
                            Select Services
                        </h5>

                        <p class="text-muted mb-0">
                            Choose saved services or create new ones instantly.
                        </p>

                    </div>

                </div>

            </div>

            <div class="col-lg-3 col-md-6">

                <div class="card border-0 shadow-sm rounded-4 h-100 text-center">

                    <div class="card-body p-4">

                        <div class="display-5 mb-3">📄</div>

                        <span class="badge bg-warning text-dark mb-3">
                            STEP 3
                        </span>

                        <h5 class="fw-bold">
                            Generate PDF
                        </h5>

                        <p class="text-muted mb-0">
                            Download a beautifully branded quotation instantly.
                        </p>

                    </div>

                </div>

            </div>

            <div class="col-lg-3 col-md-6">

                <div class="card border-0 shadow-sm rounded-4 h-100 text-center">

                    <div class="card-body p-4">

                        <div class="display-5 mb-3">📲</div>

                        <span class="badge bg-warning text-dark mb-3">
                            STEP 4
                        </span>

                        <h5 class="fw-bold">
                            Share
                        </h5>

                        <p class="text-muted mb-0">
                            Send your quotation through WhatsApp or Email.
                        </p>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>



<!-- ==========================================================
Dashboard Preview
=========================================================== -->

<section class="py-5 bg-light">

    <div class="container">

        <div class="row align-items-center g-5">

            <div class="col-lg-6">

                <span class="badge bg-primary mb-3">

                    Dashboard

                </span>

                <h2 class="fw-bold mb-4">

                    One Dashboard.
                    Complete Business Overview.

                </h2>

                <p class="text-muted mb-4">

                    Monitor quotations, clients, services,
                    subscriptions and business performance from one place.

                </p>

                <div class="row">

                    <div class="col-6 mb-3">

                        ✅ Recent Quotations

                    </div>

                    <div class="col-6 mb-3">

                        ✅ Client Database

                    </div>

                    <div class="col-6 mb-3">

                        ✅ Subscription Status

                    </div>

                    <div class="col-6 mb-3">

                        ✅ Revenue Reports

                    </div>

                    <div class="col-6 mb-3">

                        ✅ Pending Quotations

                    </div>

                    <div class="col-6 mb-3">

                        ✅ Monthly Analytics

                    </div>

                </div>

            </div>

            <div class="col-lg-6">

                <img src="https://placehold.co/900x600/F8F9FB/0e222e?text=QDizer+Dashboard"
                     class="img-fluid rounded-4 shadow-lg">

            </div>

        </div>

    </div>

</section>



<!-- ==========================================================
Testimonials
=========================================================== -->

<section class="py-5">

    <div class="container">

        <div class="text-center mb-5">

            <span class="badge bg-success mb-3">

                Testimonials

            </span>

            <h2 class="fw-bold">

                Loved By Businesses

            </h2>

        </div>

        <div class="row g-4">

            <div class="col-lg-4">

                <div class="card border-0 shadow rounded-4 h-100">

                    <div class="card-body p-4">

                        ⭐⭐⭐⭐⭐

                        <p class="mt-3 text-muted">

                            QDizer reduced our quotation time from
                            45 minutes to under 5 minutes.

                        </p>

                        <hr>

                        <strong>

                            Ahmed Khan

                        </strong>

                        <div class="text-muted">

                            Prime Build LLC

                        </div>

                    </div>

                </div>

            </div>

            <div class="col-lg-4">

                <div class="card border-0 shadow rounded-4 h-100">

                    <div class="card-body p-4">

                        ⭐⭐⭐⭐⭐

                        <p class="mt-3 text-muted">

                            Our quotations now look premium and customers
                            respond much faster.

                        </p>

                        <hr>

                        <strong>

                            Ali Hassan

                        </strong>

                        <div class="text-muted">

                            Elite HVAC

                        </div>

                    </div>

                </div>

            </div>

            <div class="col-lg-4">

                <div class="card border-0 shadow rounded-4 h-100">

                    <div class="card-body p-4">

                        ⭐⭐⭐⭐⭐

                        <p class="mt-3 text-muted">

                            The WhatsApp sharing feature is amazing.
                            Everything is now organized.

                        </p>

                        <hr>

                        <strong>

                            Sarah Malik

                        </strong>

                        <div class="text-muted">

                            Smart Interiors

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>



<!-- ==========================================================
Pricing
=========================================================== -->

<section class="py-5 bg-light">

    <div class="container">

        <div class="text-center mb-5">

            <span class="badge bg-warning text-dark mb-3">

                Pricing

            </span>

            <h2 class="fw-bold">

                Simple Pricing

            </h2>

            <p class="text-muted">

                No hidden fees. Cancel anytime.

            </p>

        </div>

        <div class="row justify-content-center">

            <div class="col-lg-5">

                <div class="card border-0 shadow-lg rounded-4">

                    <div class="card-body p-5 text-center">

                        <span class="badge bg-warning text-dark mb-3">

                            MOST POPULAR

                        </span>

                        <h3 class="fw-bold">

                            Professional Plan

                        </h3>

                        <div class="display-3 fw-bold my-4">

                            79 AED

                        </div>

                        <div class="text-muted mb-4">

                            Per Month

                        </div>

                        <hr>

                        <div class="text-start">

                            <p>✅ 7-Day Free Trial</p>

                            <p>✅ Unlimited Quotations</p>

                            <p>✅ Unlimited Clients</p>

                            <p>✅ Unlimited Services</p>

                            <p>✅ Premium PDF Templates</p>

                            <p>✅ WhatsApp Sharing</p>

                            <p>✅ Business Dashboard</p>

                            <p>✅ Email Support</p>

                        </div>

                        <a href="{{ route('register') }}"
                           class="btn btn-warning btn-lg w-100 mt-4">

                            Start Free Trial

                        </a>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>



<!-- ==========================================================
Trusted Numbers
=========================================================== -->

<section class="py-5 bg-dark text-white">

    <div class="container">

        <div class="row text-center">

            <div class="col-lg-3">

                <h2 class="display-5 fw-bold text-warning">

                    500K+

                </h2>

                <p>

                    Quotations Generated

                </p>

            </div>

            <div class="col-lg-3">

                <h2 class="display-5 fw-bold text-warning">

                    2,500+

                </h2>

                <p>

                    Businesses

                </p>

            </div>

            <div class="col-lg-3">

                <h2 class="display-5 fw-bold text-warning">

                    1.2M+

                </h2>

                <p>

                    PDFs Downloaded

                </p>

            </div>

            <div class="col-lg-3">

                <h2 class="display-5 fw-bold text-warning">

                    99.9%

                </h2>

                <p>

                    Uptime

                </p>

            </div>

        </div>

    </div>

</section>
<!-- =====================================================
FAQ Section
====================================================== -->

<section class="py-5 bg-white">

    <div class="container">

        <div class="text-center mb-5">

            <span class="badge bg-warning text-dark px-3 py-2 rounded-pill">
                Frequently Asked Questions
            </span>

            <h2 class="display-5 fw-bold mt-3">
                Have Questions?
            </h2>

            <p class="text-muted">
                Everything you need to know about QDizer.
            </p>

        </div>

        <div class="row justify-content-center">

            <div class="col-lg-9">

                <div class="accordion accordion-flush shadow rounded-4 overflow-hidden"
                    id="faqAccordion">

                    <div class="accordion-item">

                        <h2 class="accordion-header">

                            <button class="accordion-button"
                                type="button"
                                data-bs-toggle="collapse"
                                data-bs-target="#faq1">

                                How long is the free trial?

                            </button>

                        </h2>

                        <div id="faq1"
                            class="accordion-collapse collapse show"
                            data-bs-parent="#faqAccordion">

                            <div class="accordion-body">

                                Every new account receives a full
                                <strong>7-Day Free Trial</strong> with access to
                                all premium features.

                            </div>

                        </div>

                    </div>

                    <div class="accordion-item">

                        <h2 class="accordion-header">

                            <button class="accordion-button collapsed"
                                data-bs-toggle="collapse"
                                data-bs-target="#faq2">

                                Can I cancel anytime?

                            </button>

                        </h2>

                        <div id="faq2"
                            class="accordion-collapse collapse"
                            data-bs-parent="#faqAccordion">

                            <div class="accordion-body">

                                Yes. There are no long-term contracts.
                                Cancel whenever you like.

                            </div>

                        </div>

                    </div>

                    <div class="accordion-item">

                        <h2 class="accordion-header">

                            <button class="accordion-button collapsed"
                                data-bs-toggle="collapse"
                                data-bs-target="#faq3">

                                Can I use my own company logo?

                            </button>

                        </h2>

                        <div id="faq3"
                            class="accordion-collapse collapse"
                            data-bs-parent="#faqAccordion">

                            <div class="accordion-body">

                                Absolutely. Upload your company logo and
                                customize your quotation PDFs with your own
                                branding.

                            </div>

                        </div>

                    </div>

                    <div class="accordion-item">

                        <h2 class="accordion-header">

                            <button class="accordion-button collapsed"
                                data-bs-toggle="collapse"
                                data-bs-target="#faq4">

                                Can I share quotations through WhatsApp?

                            </button>

                        </h2>

                        <div id="faq4"
                            class="accordion-collapse collapse"
                            data-bs-parent="#faqAccordion">

                            <div class="accordion-body">

                                Yes.
                                Share quotations directly to customers via
                                WhatsApp with just one click.

                            </div>

                        </div>

                    </div>

                    <div class="accordion-item">

                        <h2 class="accordion-header">

                            <button class="accordion-button collapsed"
                                data-bs-toggle="collapse"
                                data-bs-target="#faq5">

                                Is there any limit on quotations?

                            </button>

                        </h2>

                        <div id="faq5"
                            class="accordion-collapse collapse"
                            data-bs-parent="#faqAccordion">

                            <div class="accordion-body">

                                No.
                                Premium subscribers can create unlimited
                                quotations, clients and services.

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>





<!-- =====================================================
Newsletter
====================================================== -->

<section class="py-5 bg-light">

    <div class="container">

        <div class="row justify-content-center">

            <div class="col-lg-8 text-center">

                <span class="badge bg-primary mb-3">

                    Stay Updated

                </span>

                <h2 class="fw-bold mb-3">

                    Get Product Updates

                </h2>

                <p class="text-muted mb-4">

                    Receive feature announcements,
                    product updates and business tips.

                </p>

                <form class="row g-3 justify-content-center">

                    <div class="col-md-8">

                        <input type="email"
                               class="form-control form-control-lg"
                               placeholder="Enter your email">

                    </div>

                    <div class="col-md-4">

                        <button class="btn btn-warning btn-lg w-100">

                            Subscribe

                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>

</section>





<!-- =====================================================
Final CTA
====================================================== -->

<section class="py-5 text-white"
    style="background:#0e222e;">

    <div class="container">

        <div class="row align-items-center">

            <div class="col-lg-8">

                <h2 class="display-5 fw-bold mb-3">

                    Ready To Transform
                    Your Quotation Process?

                </h2>

                <p class="lead text-light">

                    Join thousands of contractors and businesses
                    already using QDizer to create
                    professional quotations in minutes.

                </p>

            </div>

            <div class="col-lg-4 text-lg-end mt-4 mt-lg-0">

                <a href="{{ route('register') }}"
                    class="btn btn-warning btn-lg px-5 me-2">

                    Start Free Trial

                </a>

                <a href="#demo"
                    class="btn btn-outline-light btn-lg">

                    Watch Demo

                </a>

            </div>

        </div>

    </div>

</section>








<!-- ==========================================
Extra CSS
=========================================== -->

<style>

.hero-section{

background:#f8f9fb;

}

.hero-section h1{

font-family:'Sora',sans-serif;

}

.floating-card{

position:absolute;

top:40px;

left:-20px;

background:#fff;

padding:15px 20px;

border-radius:16px;

}

.floating-card-2{

position:absolute;

bottom:30px;

right:-20px;

background:#fff;

padding:15px 20px;

border-radius:16px;

}

.brand-card{

background:#fff;

padding:25px;

border-radius:16px;

font-weight:700;

box-shadow:0 8px 25px rgba(0,0,0,.06);

transition:.3s;

}

.brand-card:hover{

transform:translateY(-8px);

}

.video-card{

background:#fff;

}

.icon-circle{

width:80px;

height:80px;

background:#fff7e8;

display:flex;

align-items:center;

justify-content:center;

font-size:35px;

border-radius:50%;

margin:auto;

margin-bottom:20px;

}

.feature-mini{

padding:25px;

}

</style>

@endsection