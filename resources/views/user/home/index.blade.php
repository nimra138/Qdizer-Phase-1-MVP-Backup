<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QDizer - Smart Quotation SaaS</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
        }

        .hero {
            background: linear-gradient(135deg, #4e73df, #1cc88a);
            color: white;
            padding: 100px 0;
        }

        .section-padding {
            padding: 80px 0;
        }

        .feature-icon {
            font-size: 40px;
        }

        .cta {
            background: #4e73df;
            color: white;
            padding: 80px 0;
        }

        .card {
            border-radius: 12px;
        }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand fw-bold text-primary" href="#">QDizer</a>

        <div class="ms-auto">

            @auth
                <a href="{{ route('dashboard') }}" class="btn btn-success me-2">Dashboard</a>
            @else
                <a href="{{ route('login') }}" class="btn btn-outline-primary me-2">Login</a>
                <a href="{{ route('register') }}" class="btn btn-primary">Get Started</a>
            @endauth

        </div>
    </div>
</nav>

<!-- User Status Badge -->
<div class="container mt-3">
    @auth
        @if(auth()->user()->status == 'trial')
            <span class="badge bg-warning">Trial</span>
        @elseif(auth()->user()->status == 'active')
            <span class="badge bg-success">Active</span>
        @else
            <span class="badge bg-danger">Expired</span>
        @endif
    @endauth
</div>

<!-- Hero Section -->
<section class="hero text-center">
    <div class="container">
        <h1 class="fw-bold display-5 mb-3">
            Create & Share Professional Quotations in Seconds
        </h1>
        <p class="lead mb-4">
            QDizer helps service businesses create, manage, and send quotations via PDF & WhatsApp effortlessly.
        </p>

        <a href="{{ route('register') }}" class="btn btn-light btn-lg me-2">
            Start Free
        </a>

        <a href="https://wa.me/923000000000" class="btn btn-outline-light btn-lg">
            Live Demo
        </a>

        <p class="small mt-3">Trusted by service businesses 🚀</p>
    </div>
</section>

<!-- Features -->
<section class="section-padding text-center">
    <div class="container">
        <h2 class="fw-bold mb-5">Core Features</h2>
        <div class="row">

            <div class="col-md-3">
                <div class="feature-icon mb-3">📝</div>
                <h5>Quotation Creation</h5>
                <p>Create professional quotes easily with a simple interface.</p>
            </div>

            <div class="col-md-3">
                <div class="feature-icon mb-3">📄</div>
                <h5>PDF Generation</h5>
                <p>Download clean and branded quotation PDFs instantly.</p>
            </div>

            <div class="col-md-3">
                <div class="feature-icon mb-3">📲</div>
                <h5>WhatsApp Sharing</h5>
                <p>Send quotations directly to clients via WhatsApp.</p>
            </div>

            <div class="col-md-3">
                <div class="feature-icon mb-3">💳</div>
                <h5>Subscriptions</h5>
                <p>Manage plans and access features seamlessly.</p>
            </div>

        </div>
    </div>
</section>

<!-- How It Works -->
<section class="bg-light section-padding text-center">
    <div class="container">
        <h2 class="fw-bold mb-5">How It Works</h2>
        <div class="row">

            <div class="col-md-4">
                <h5>1. Create Quote</h5>
                <p>Add services, pricing, and client details.</p>
            </div>

            <div class="col-md-4">
                <h5>2. Generate PDF</h5>
                <p>Convert your quote into a professional document.</p>
            </div>

            <div class="col-md-4">
                <h5>3. Share Instantly</h5>
                <p>Send via WhatsApp or download.</p>
            </div>

        </div>
    </div>
</section>

<!-- Pricing -->
<section class="section-padding text-center">
    <div class="container">
        <h2 class="fw-bold mb-5">Simple Pricing</h2>

        <div class="row justify-content-center">

            <div class="col-md-4">
                <div class="card p-4 shadow-sm">
                    <h4>Free Trial</h4>
                    <h2>$0</h2>
                    <p>Limited features for testing</p>
                    <a href="{{ route('register') }}" class="btn btn-outline-primary">
                        Start Trial
                    </a>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card p-4 shadow border-primary">
                    <h4>Pro Plan</h4>
                    <h2>$9/month</h2>
                    <p>Full features + WhatsApp + PDF</p>
                    <a href="{{ route('register') }}" class="btn btn-primary">
                        Get Started
                    </a>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- CTA -->
<section class="cta text-center">
    <div class="container">
        <h2 class="fw-bold mb-3">Start Using QDizer Today</h2>
        <p class="mb-4">Simplify your quotation workflow and close deals faster.</p>

        <a href="{{ route('register') }}" class="btn btn-light btn-lg">
            Create Free Account
        </a>
    </div>
</section>

<!-- Footer -->
<footer class="text-center py-4 bg-dark text-white">
    <p class="mb-0">
        © {{ date('Y') }} QDizer — Built for Smart Businesses 🚀
    </p>
</footer>

</body>
</html>