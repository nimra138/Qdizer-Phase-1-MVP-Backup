@extends('user.home.partials..app')

@section('title', 'Features | QDizer')

@section('content')

<!-- HERO -->
<section class="py-5 bg-light position-relative overflow-hidden">
    <div class="container py-5">

        <div class="row align-items-center">

            <div class="col-lg-6">

                <span class="badge bg-warning text-dark px-3 py-2 rounded-pill mb-3">
                    Powerful Features
                </span>

                <h1 class="display-4 fw-bold mb-4">
                    Everything You Need To
                    <span class="text-warning">
                        Manage Quotations
                    </span>
                </h1>

                <p class="lead text-muted mb-4">
                    QDizer helps contractors, service providers and businesses
                    create beautiful quotations, manage clients and generate
                    professional PDFs in seconds.
                </p>

                <div class="d-flex flex-wrap gap-3">

                    <a href="{{ route('register') }}"
                       class="btn btn-warning btn-lg px-4">
                        Start Free Trial
                    </a>

                    <a href="{{ route('pricing') }}"
                       class="btn btn-outline-dark btn-lg px-4">
                        View Pricing
                    </a>

                </div>

            </div>

            <div class="col-lg-6">

                <img src="https://placehold.co/700x500"
                     class="img-fluid rounded-4 shadow-lg">

            </div>

        </div>

    </div>
</section>





<!-- FEATURE INTRO -->

<section class="py-5">

    <div class="container">

        <div class="text-center mb-5">

            <h2 class="fw-bold">
                Built for Modern Businesses
            </h2>

            <p class="text-muted">
                Everything you need to create quotations faster and impress clients.
            </p>

        </div>



        <div class="row g-4">

            <div class="col-lg-4">

                <div class="card border-0 shadow-sm h-100 rounded-4">

                    <div class="card-body p-4">

                        <div class="display-6 mb-3">
                            📄
                        </div>

                        <h4>
                            Professional Quotations
                        </h4>

                        <p class="text-muted">
                            Create stunning quotations using beautiful templates
                            within minutes.
                        </p>

                    </div>

                </div>

            </div>

            <div class="col-lg-4">

                <div class="card border-0 shadow-sm h-100 rounded-4">

                    <div class="card-body p-4">

                        <div class="display-6 mb-3">
                            ⚡
                        </div>

                        <h4>
                            Lightning Fast
                        </h4>

                        <p class="text-muted">
                            Generate PDFs instantly without wasting time editing
                            documents manually.
                        </p>

                    </div>

                </div>

            </div>

            <div class="col-lg-4">

                <div class="card border-0 shadow-sm h-100 rounded-4">

                    <div class="card-body p-4">

                        <div class="display-6 mb-3">
                            📱
                        </div>

                        <h4>
                            WhatsApp Ready
                        </h4>

                        <p class="text-muted">
                            Send quotations directly to customers via WhatsApp
                            with one click.
                        </p>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>






<!-- QUOTATION BUILDER -->

<section class="py-5 bg-white">

<div class="container">

<div class="row align-items-center">

<div class="col-lg-6">

<img src="https://placehold.co/650x420"
class="img-fluid rounded-4 shadow">

</div>

<div class="col-lg-6">

<span class="badge bg-warning text-dark mb-3">
Quotation Builder
</span>

<h2 class="fw-bold mb-4">
Create Quotations in Less Than 60 Seconds
</h2>

<p class="text-muted mb-4">

Stop creating quotations in Excel.

QDizer lets you create branded quotations
using an intuitive builder.

</p>

<div class="row">

<div class="col-6 mb-3">

✔ Auto Quote Number

</div>

<div class="col-6 mb-3">

✔ VAT Support

</div>

<div class="col-6 mb-3">

✔ Discount Options

</div>

<div class="col-6 mb-3">

✔ Notes Section

</div>

<div class="col-6 mb-3">

✔ Expiry Date

</div>

<div class="col-6 mb-3">

✔ Multiple Services

</div>

<div class="col-6 mb-3">

✔ Terms & Conditions

</div>

<div class="col-6 mb-3">

✔ Company Logo

</div>

</div>

</div>

</div>

</div>

</section>








<!-- CLIENT MANAGEMENT -->

<section class="py-5 bg-light">

<div class="container">

<div class="row align-items-center">

<div class="col-lg-6 order-lg-2">

<img src="https://placehold.co/650x420"
class="img-fluid rounded-4 shadow">

</div>

<div class="col-lg-6">

<span class="badge bg-warning text-dark mb-3">

Client Management

</span>

<h2 class="fw-bold mb-4">

Manage Unlimited Clients

</h2>

<p class="text-muted mb-4">

Never type customer information again.

Store clients once and reuse them forever.

</p>

<ul class="list-unstyled">

<li class="mb-3">
✔ Client History
</li>

<li class="mb-3">
✔ Contact Information
</li>

<li class="mb-3">
✔ Company Details
</li>

<li class="mb-3">
✔ Previous Quotations
</li>

<li class="mb-3">
✔ Search Clients
</li>

<li class="mb-3">
✔ Favorite Customers
</li>

<li class="mb-3">
✔ Client Notes
</li>

</ul>

</div>

</div>

</div>

</section>

@endsection