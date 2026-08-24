@extends('user.home.partials..app')

@section('title', 'Contact Us | QDizer')

@section('content')

<!-- =========================
Hero Section
========================= -->

<section class="py-5 bg-light">

    <div class="container py-5">

        <div class="row align-items-center">

            <div class="col-lg-6">

                <span class="badge bg-warning text-dark px-3 py-2 rounded-pill mb-3">
                    Contact Us
                </span>

                <h1 class="display-4 fw-bold mb-3">

                    We'd Love To
                    <span class="text-warning">
                        Hear From You
                    </span>

                </h1>

                <p class="lead text-muted">

                    Have a question, need technical support, or want to suggest a
                    new feature? Our team is here to help.

                </p>

            </div>

            <div class="col-lg-6 text-center">

                <img src="https://placehold.co/650x450/F8F9FB/0e222e?text=QDizer+Support"
                     class="img-fluid rounded-4 shadow">

            </div>

        </div>

    </div>

</section>



<!-- =========================
Contact Form
========================= -->

<section class="py-5">

    <div class="container">

        <div class="row g-5">

            <!-- Form -->

            <div class="col-lg-7">

                <div class="card border-0 shadow rounded-4">

                    <div class="card-body p-5">

                        <h3 class="fw-bold mb-4">

                            Send Us A Message

                        </h3>

                       @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
        <i class="fas fa-check-circle me-2"></i>
        {{ session('success') }}

        <button type="button"
                class="btn-close"
                data-bs-dismiss="alert"></button>
    </div>
@endif

@if ($errors->any())
    <div class="alert alert-danger alert-dismissible fade show mb-4" role="alert">

        <div class="fw-bold mb-2">
            <i class="fas fa-exclamation-circle me-2"></i>
            Please correct the following errors:
        </div>

        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>

        <button type="button"
                class="btn-close"
                data-bs-dismiss="alert"></button>

    </div>
@endif

<form  id="contactForm" action="{{ route('contact.store') }}" method="POST">

    @csrf

    <div class="row">

        <div class="col-md-6 mb-4">

            <label class="form-label fw-semibold">
                Full Name <span class="text-danger">*</span>
            </label>

            <input
                type="text"
                name="name"
                value="{{ old('name') }}"
                placeholder="John Smith"
                class="form-control form-control-lg @error('name') is-invalid @enderror">

            @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror

        </div>

        <div class="col-md-6 mb-4">

            <label class="form-label fw-semibold">
                Email Address <span class="text-danger">*</span>
            </label>

            <input
                type="email"
                name="email"
                value="{{ old('email') }}"
                placeholder="john@example.com"
                class="form-control form-control-lg @error('email') is-invalid @enderror">

            @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror

        </div>

    </div>

    <div class="row">

        <div class="col-md-6 mb-4">

    <label class="form-label fw-semibold">
        Phone Number <span class="text-danger">*</span>
    </label>

    <div class="input-group input-group-lg">

        <span class="input-group-text">
            +971
        </span>

        <input
            type="text"
            name="phone"
            class="form-control @error('phone') is-invalid @enderror"
            placeholder="50 123 4567"
            value="{{ old('phone') }}">

    </div>

    @error('phone')
        <div class="invalid-feedback d-block">
            {{ $message }}
        </div>
    @enderror

</div>
        {{-- <input type="hidden" name="phone_full" id="phone_full"> --}}
        <div class="col-md-6 mb-4">

            <label class="form-label fw-semibold">
                Subject <span class="text-danger">*</span>
            </label>

            <select
                name="subject"
                class="form-select form-select-lg @error('subject') is-invalid @enderror">

                <option value="">Select Subject</option>

                <option value="General Question"
                    {{ old('subject')=='General Question' ? 'selected' : '' }}>
                    General Question
                </option>

                <option value="Technical Issue"
                    {{ old('subject')=='Technical Issue' ? 'selected' : '' }}>
                    Technical Issue
                </option>

                <option value="Billing Question"
                    {{ old('subject')=='Billing Question' ? 'selected' : '' }}>
                    Billing Question
                </option>

                <option value="Feature Suggestion"
                    {{ old('subject')=='Feature Suggestion' ? 'selected' : '' }}>
                    Feature Suggestion
                </option>

            </select>

            @error('subject')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror

        </div>

    </div>

    <div class="mb-4">

        <label class="form-label fw-semibold">
            Message <span class="text-danger">*</span>
        </label>

        <textarea
            rows="6"
            name="message"
            placeholder="Write your message here..."
            class="form-control @error('message') is-invalid @enderror">{{ old('message') }}</textarea>

        @error('message')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror

    </div>

    <button type="submit" class="btn btn-warning btn-lg px-5 rounded-pill">

        <i class="fas fa-paper-plane me-2"></i>

        Send Message

    </button>

</form>


                    </div>

                </div>

            </div>

            <!-- Contact Info -->

            <div class="col-lg-5">

    <div class="card border-0 shadow rounded-4 mb-4">

        <div class="card-body p-4">

            <h4 class="fw-bold mb-4">
                Contact Information
            </h4>


            <div class="mb-4">
 
                <h6 class="fw-bold">
                    📧 Email
                </h6>

                <p class="text-muted mb-0">
                    {{ $setting->company_email ?? 'support@qdizer.com' }}
                </p>

            </div>



            <div class="mb-4">

                <h6 class="fw-bold">
                    📞 Phone
                </h6>

                <p class="text-muted mb-0">
                    {{ $setting->company_phone ?? '+971 50 123 4567' }}
                </p>

            </div>



            <div class="mb-4">

                <h6 class="fw-bold">
                    📍 Office
                </h6>

                <p class="text-muted mb-0">

                    {!! nl2br(e($setting->company_address ?? 'Business Bay, Dubai, UAE')) !!}

                </p>

            </div>



            <div>

                <h6 class="fw-bold">
                    🕒 Working Hours
                </h6>

                <p class="text-muted mb-0">

                    Monday - Friday<br>

                    9:00 AM - 6:00 PM

                </p>

            </div>


        </div>

    </div>




    <div class="card border-0 shadow rounded-4">


        <div class="card-body p-4">


            <h4 class="fw-bold mb-4">
                Why Contact Us?
            </h4>


            <ul class="list-unstyled">


                <li class="mb-3">
                    ✅ Product Demo Requests
                </li>


                <li class="mb-3">
                    ✅ Technical Support
                </li>


                <li class="mb-3">
                    ✅ Billing Assistance
                </li>


                <li class="mb-3">
                    ✅ Partnership Opportunities
                </li>


                <li>
                    ✅ Feature Suggestions
                </li>


            </ul>


        </div>


    </div>


</div>

        </div>

    </div>

</section>



<!-- =========================
FAQ
========================= -->

<section class="py-5 bg-light">

    <div class="container">

        <div class="text-center mb-5">

            <h2 class="fw-bold">

                Frequently Asked Questions

            </h2>

        </div>

        <div class="accordion" id="faq">

            <div class="accordion-item rounded-4 mb-3">

                <h2 class="accordion-header">

                    <button class="accordion-button"
                            data-bs-toggle="collapse"
                            data-bs-target="#faq1">

                        How quickly will I receive a response?

                    </button>

                </h2>

                <div id="faq1"
                     class="accordion-collapse collapse show"
                     data-bs-parent="#faq">

                    <div class="accordion-body">

                        We usually reply within one business day.

                    </div>

                </div>

            </div>

            <div class="accordion-item rounded-4 mb-3">

                <h2 class="accordion-header">

                    <button class="accordion-button collapsed"
                            data-bs-toggle="collapse"
                            data-bs-target="#faq2">

                        Can I request a product demo?

                    </button>

                </h2>

                <div id="faq2"
                     class="accordion-collapse collapse"
                     data-bs-parent="#faq">

                    <div class="accordion-body">

                        Yes! Contact us and we'll arrange a personalized demo.

                    </div>

                </div>

            </div>

            <div class="accordion-item rounded-4">

                <h2 class="accordion-header">

                    <button class="accordion-button collapsed"
                            data-bs-toggle="collapse"
                            data-bs-target="#faq3">

                        Do you provide technical support?

                    </button>

                </h2>

                <div id="faq3"
                     class="accordion-collapse collapse"
                     data-bs-parent="#faq">

                    <div class="accordion-body">

                        Yes. Premium customers receive dedicated technical support.

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>



<!-- =========================
CTA
========================= -->

<section class="py-5 text-white" style="background:#0e222e;">

    <div class="container text-center">

        <h2 class="display-5 fw-bold">

            Ready To Create Better Quotations?

        </h2>

        <p class="lead text-light mb-4">

            Join thousands of contractors and service businesses using
            QDizer every day.

        </p>

        <a href="{{ route('register') }}"
           class="btn btn-warning btn-lg rounded-pill px-5">

            Start Your 7-Day Free Trial

        </a>

    </div>

</section>

@endsection