<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>QDizer - Smart Quotation SaaS</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Sora:wght@600;700&display=swap" rel="stylesheet">

<link href="{{ asset('user/style.css') }}" rel="stylesheet">

</head>

<body>

@include('user.home.partials.header')

<!-- Hero -->

<section class="hero">
<div class="container text-center">

    <div class="hero-card">

        <span class="badge rounded-pill bg-light text-dark mb-3">
            Smart SaaS for Service Businesses 🚀
        </span>

        <h1 class="hero-title">
            Create & Share
            Professional Quotations
            in Seconds
        </h1>

        <p class="hero-text mt-4">
            QDizer helps businesses create beautiful quotations,
            generate PDFs and send them instantly through WhatsApp.
        </p>

        <div class="mt-4">

            <a href="{{ route('register') }}"
               class="btn btn-accent btn-lg btn-modern me-2">
                Start Free
            </a>

            <a href="https://wa.me/923000000000"
               class="btn btn-accent btn-lg btn-modern">
                Live Demo
            </a>

        </div>

        <div class="mt-4 text-muted small">
            Trusted by growing businesses worldwide
        </div>

    </div>

</div>
</section>

<!-- Features -->

<section class="section">
<div class="container">

    <h2 class="section-title text-center">
        Powerful Features
    </h2>

    <div class="row g-4">

        <div class="col-md-3">
            <div class="card-modern p-4 text-center">
                <div class="fs-1">📝</div>
                <h5 class="mt-3">Quotation Creation</h5>
                <p class="text-muted">
                    Build quotes quickly with reusable services.
                </p>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card-modern p-4 text-center">
                <div class="fs-1">📄</div>
                <h5 class="mt-3">PDF Export</h5>
                <p class="text-muted">
                    Professional branded PDFs instantly.
                </p>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card-modern p-4 text-center">
                <div class="fs-1">📲</div>
                <h5 class="mt-3">WhatsApp Share</h5>
                <p class="text-muted">
                    Send quotations directly to clients.
                </p>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card-modern p-4 text-center">
                <div class="fs-1">💳</div>
                <h5 class="mt-3">Subscription Plans</h5>
                <p class="text-muted">
                    Manage billing and upgrades easily.
                </p>
            </div>
        </div>

    </div>

</div>
</section>

<!-- How it works -->

<section class="section bg-light">
<div class="container">

<h2 class="section-title text-center">
How QDizer Works
</h2>

<div class="row g-4">

<div class="col-md-4">
<div class="card-modern p-4 text-center">
<h4>1</h4>
<h5>Create Quote</h5>
<p class="text-muted">
Add services & client details.
</p>
</div>
</div>

<div class="col-md-4">
<div class="card-modern p-4 text-center">
<h4>2</h4>
<h5>Generate PDF</h5>
<p class="text-muted">
Professional quotation instantly.
</p>
</div>
</div>

<div class="col-md-4">
<div class="card-modern p-4 text-center">
<h4>3</h4>
<h5>Share</h5>
<p class="text-muted">
WhatsApp or download PDF.
</p>
</div>
</div>

</div>
</div>
</section>

<!-- Pricing -->

<section class="section">
<div class="container">

<h2 class="section-title text-center">
Simple Pricing
</h2>

<div class="row justify-content-center g-4">

<div class="col-md-4">
<div class="card-modern p-4 text-center">
<h4>Trial</h4>
<h2 class="mt-3">$0</h2>
<p class="text-muted">
Limited features
</p>

<a href="{{ route('register') }}"
class="btn btn-outline-secondary btn-modern">
Start Trial
</a>
</div>
</div>

<div class="col-md-4">
<div class="card-modern pricing-pro p-4 text-center">

<div class="pricing-badge">
POPULAR
</div>

<h4>Pro Plan</h4>
<h2 class="mt-3" style="color:var(--primary)">
$9/mo
</h2>

<p class="text-muted">
Unlimited quotations + WhatsApp
</p>

<a href="{{ route('register') }}"
class="btn btn-accent btn-modern">
Get Started
</a>

</div>
</div>

</div>
</div>
</section>

<!-- CTA -->

<section class="section">
<div class="container">

<div class="cta text-center">

<h2 style="font-family:Sora;">
Ready to Grow Faster?
</h2>

<p class="mt-3">
Create professional quotations and impress clients.
</p>

<a href="{{ route('register') }}"
class="btn btn-light btn-lg btn-modern mt-3">
Create Free Account
</a>

</div>

</div>
</section>

@include('user.home.partials.footer')

</body>
</html>