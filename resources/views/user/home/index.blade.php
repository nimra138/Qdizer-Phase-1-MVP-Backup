<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>QDizer - Smart Quotation SaaS</title>

<!-- Bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Google Fonts (recommended for your system) -->
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Sora:wght@600;700&display=swap" rel="stylesheet">

<link href="{{ asset('user/style.css') }}" rel="stylesheet">

</head>

<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg" style="background: var(--card); border-bottom:1px solid var(--border);">
    <div class="container">
        <a class="navbar-brand fw-bold" style="color: var(--primary);" href="#">
            QDizer
        </a>

        <div class="ms-auto">

            @auth
                <a href="{{ route('dashboard') }}" class="btn btn-primary me-2">Dashboard</a>
            @else
                <a href="{{ route('login') }}" class="btn btn-outline-secondary me-2">Login</a>
                <a href="{{ route('register') }}" class="btn btn-accent">Get Started</a>
            @endauth

        </div>
    </div>
</nav>

<!-- User Status -->
<div class="container mt-3">
    @auth
        @if(auth()->user()->status == 'trial')
            <span class="badge" style="background: #facc15; color:#000;">Trial</span>
        @elseif(auth()->user()->status == 'active')
            <span class="badge" style="background: #22c55e;">Active</span>
        @else
            <span class="badge" style="background: #ef4444;">Expired</span>
        @endif
    @endauth
</div>

<!-- Hero Section -->
<section style="padding:80px 0; text-align:center;">
    <div class="container">

        <h1 style="font-family:Sora; color:var(--primary); font-weight:700; font-size:48px;">
            Create & Share Professional Quotations in Seconds
        </h1>

        <p class="mt-3" style="color:var(--text-muted); font-size:18px;">
            QDizer helps service businesses create, manage, and send quotations via PDF & WhatsApp effortlessly.
        </p>

        <div class="mt-4">
            <a href="{{ route('register') }}" class="btn btn-accent btn-lg me-2">
                Start Free
            </a>

            <a href="https://wa.me/923000000000" class="btn btn-primary btn-lg">
                Live Demo
            </a>
        </div>

        <p class="mt-3" style="color:var(--text-muted); font-size:14px;">
            Trusted by service businesses 🚀
        </p>

    </div>
</section>

<!-- Features -->
<section style="padding:70px 0; background: var(--background); text-align:center;">
    <div class="container">

        <h2 class="mb-5" style="font-family:Sora;">Core Features</h2>

        <div class="row g-4">

            <div class="col-md-3">
                <div class="card-ui p-4">
                    <div style="font-size:30px;">📝</div>
                    <h5 class="mt-2">Quotation Creation</h5>
                    <p style="color:var(--text-muted);">Create professional quotes easily.</p>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card-ui p-4">
                    <div style="font-size:30px;">📄</div>
                    <h5 class="mt-2">PDF Generation</h5>
                    <p style="color:var(--text-muted);">Download branded PDFs instantly.</p>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card-ui p-4">
                    <div style="font-size:30px;">📲</div>
                    <h5 class="mt-2">WhatsApp Sharing</h5>
                    <p style="color:var(--text-muted);">Send quotes directly to clients.</p>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card-ui p-4">
                    <div style="font-size:30px;">💳</div>
                    <h5 class="mt-2">Subscriptions</h5>
                    <p style="color:var(--text-muted);">Manage plans easily.</p>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- How It Works -->
<section style="padding:70px 0; text-align:center;">
    <div class="container">

        <h2 class="mb-5" style="font-family:Sora;">How It Works</h2>

        <div class="row">

            <div class="col-md-4">
                <div class="card-ui p-4">
                    <h5>1. Create Quote</h5>
                    <p style="color:var(--text-muted);">Add services and client details.</p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card-ui p-4">
                    <h5>2. Generate PDF</h5>
                    <p style="color:var(--text-muted);">Convert into professional document.</p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card-ui p-4">
                    <h5>3. Share Instantly</h5>
                    <p style="color:var(--text-muted);">Send via WhatsApp or download.</p>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- Pricing -->
<section style="padding:70px 0; background: var(--background); text-align:center;">
    <div class="container">

        <h2 class="mb-5" style="font-family:Sora;">Simple Pricing</h2>

        <div class="row justify-content-center g-4">

            <div class="col-md-4">
                <div class="card-ui p-4">
                    <h4>Free Trial</h4>
                    <h2 style="color:var(--primary);">$0</h2>
                    <p style="color:var(--text-muted);">Limited features</p>
                    <a href="{{ route('register') }}" class="btn btn-outline-secondary">
                        Start Trial
                    </a>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card-ui p-4" style="border:2px solid var(--accent);">
                    <h4>Pro Plan</h4>
                    <h2 style="color:var(--primary);">$9/month</h2>
                    <p style="color:var(--text-muted);">Full features + WhatsApp</p>
                    <a href="{{ route('register') }}" class="btn btn-accent">
                        Get Started
                    </a>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- CTA -->
<section style="padding:70px 0; background: var(--primary); color:white; text-align:center;">
    <div class="container">

        <h2 style="font-family:Sora;">Start Using QDizer Today</h2>
        <p class="mt-3">Simplify your quotation workflow and close deals faster.</p>

        <a href="{{ route('register') }}" class="btn btn-accent btn-lg mt-3">
            Create Free Account
        </a>

    </div>
</section>

<!-- Footer -->
<footer style="background:#0b1a23; color:white; text-align:center; padding:20px;">
    <p class="mb-0">
        © {{ date('Y') }} QDizer — Built for Smart Businesses 🚀
    </p>
</footer>

</body>
</html>