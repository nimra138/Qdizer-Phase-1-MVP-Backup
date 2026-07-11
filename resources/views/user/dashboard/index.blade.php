@extends('user.partials.app')

@section('title', 'Dashboard')

@section('content')

<div class="container-fluid py-4">

    {{-- =========================
        PAGE HEADER
    ========================== --}}
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h3 class="fw-bold mb-1">
                Welcome back, {{ auth()->user()->name }} 👋
            </h3>

            <p class="text-muted mb-0">
                Here's an overview of your business activity.
            </p>
        </div>

        <div>
            <span class="badge bg-light text-dark border px-3 py-2">
                <i class="fas fa-calendar-alt me-2"></i>
                {{ now()->format('d M Y') }}
            </span>
        </div>

    </div>

    {{-- =========================
        SUMMARY CARDS
    ========================== --}}
    <div class="row g-4">

        {{-- Clients --}}
        <div class="col-xl-3 col-md-6">

            <div class="card border-0 shadow-sm rounded-4 h-100">

                <div class="card-body">

                    <div class="d-flex justify-content-between align-items-center">

                        <div>

                            <small class="text-muted text-uppercase">
                                Clients
                            </small>

                            <h2 class="fw-bold mt-2 mb-0">
                                {{ $clients }}
                            </h2>

                        </div>

                        <div class="bg-primary bg-opacity-10 rounded-circle p-3">

                            <i class="fas fa-users text-primary fa-lg"></i>

                        </div>

                    </div>

                </div>

            </div>

        </div>

        {{-- Services --}}
        <div class="col-xl-3 col-md-6">

            <div class="card border-0 shadow-sm rounded-4 h-100">

                <div class="card-body">

                    <div class="d-flex justify-content-between align-items-center">

                        <div>

                            <small class="text-muted text-uppercase">
                                Services
                            </small>

                            <h2 class="fw-bold mt-2 mb-0">
                                {{ $services }}
                            </h2>

                        </div>

                        <div class="bg-success bg-opacity-10 rounded-circle p-3">

                            <i class="fas fa-briefcase text-success fa-lg"></i>

                        </div>

                    </div>

                </div>

            </div>

        </div>

        {{-- Quotations --}}
        <div class="col-xl-3 col-md-6">

            <div class="card border-0 shadow-sm rounded-4 h-100">

                <div class="card-body">

                    <div class="d-flex justify-content-between align-items-center">

                        <div>

                            <small class="text-muted text-uppercase">
                                Quotations
                            </small>

                            <h2 class="fw-bold mt-2 mb-0">
                                {{ $quotations }}
                            </h2>

                        </div>

                        <div class="bg-warning bg-opacity-10 rounded-circle p-3">

                            <i class="fas fa-file-invoice text-warning fa-lg"></i>

                        </div>

                    </div>

                </div>

            </div>

        </div>

        {{-- Trial / Subscription --}}
        <div class="col-xl-3 col-md-6">

            <div class="card border-0 shadow-sm rounded-4 h-100">

                <div class="card-body">

                    <div class="d-flex justify-content-between align-items-center mb-3">

                        <small class="text-muted text-uppercase">
                            Account Status
                        </small>

                        @if(auth()->user()->status == 'active')

                            <span class="badge bg-success">
                                Active
                            </span>

                        @else

                            <span class="badge bg-warning text-dark">
                                Free Trial
                            </span>

                        @endif

                    </div>

                    @if(auth()->user()->status == 'active')

                        {{-- <h3 class="fw-bold text-success mb-1">

                            {{ $daysLeft }}

                            <small class="fs-6">
                                Days
                            </small>

                        </h3> --}}

                        <p class="text-muted mb-3">
                            Subscription Remaining
                        </p>

                        <div class="small text-muted">

                            <div class="mb-1">

                                <strong>Expiry Date</strong>

                            </div>

                            {{ \Carbon\Carbon::parse($expiryDate)->format('d M Y') }}

                        </div>

                        <div class="progress mt-3" style="height:8px;">

                            <div
                                class="progress-bar bg-success"
                                style="width: {{ min(($daysLeft / 30) * 100,100) }}%">

                            </div>

                        </div>

                    @else

                        <h3 class="fw-bold text-warning mb-1">

                            {{ $daysLeft }}

                            <small class="fs-6">
                                Days
                            </small>

                        </h3>

                        <p class="text-muted mb-3">
                            Trial Remaining
                        </p>

                        <div class="small text-muted">

                            <div class="mb-1">

                                <strong>Trial Ends</strong>

                            </div>

                            {{ \Carbon\Carbon::parse($expiryDate)->format('d M Y') }}

                        </div>

                        <div class="progress mt-3" style="height:8px;">

                            <div
                                class="progress-bar bg-warning"
                                style="width: {{ min(($daysLeft / 7) * 100,100) }}%">

                            </div>

                        </div>

                    @endif

                </div>

            </div>

        </div>

    </div>

    {{-- =========================
        SECOND ROW STARTS HERE
    ========================== --}}
    <div class="row g-4 mt-2">
            {{-- =========================
        TOTAL REVENUE
    ========================== --}}
    <div class="col-lg-4">

        <div class="card border-0 shadow-sm rounded-4 h-100">

            <div class="card-body">

                <div class="d-flex justify-content-between align-items-center mb-3">

                    <div>

                        <small class="text-muted text-uppercase">
                            Total Revenue
                        </small>

                        <h2 class="fw-bold mt-2 mb-0">
                            AED {{ isset($revenue) ? number_format($revenue,2) : '0.00' }}
                        </h2>

                    </div>

                    <div class="bg-success bg-opacity-10 rounded-circle p-3">

                        <i class="fas fa-wallet text-success fa-lg"></i>

                    </div>

                </div>

                <hr>

                <div class="d-flex justify-content-between mb-2">

                    <span class="text-muted">
                        Total Quotations
                    </span>

                    <strong>
                        {{ $quotations }}
                    </strong>

                </div>

                <div class="d-flex justify-content-between">

                    <span class="text-muted">
                        Account Status
                    </span>

                    @if(auth()->user()->status == 'active')

                        <span class="badge bg-success">
                            Active
                        </span>

                    @else

                        <span class="badge bg-warning text-dark">
                            Trial
                        </span>

                    @endif

                </div>

            </div>

        </div>

    </div>

    {{-- =========================
        RECENT QUOTATIONS
    ========================== --}}
    <div class="col-lg-8">

        <div class="card border-0 shadow-sm rounded-4 h-100">

            <div class="card-header bg-white border-0 d-flex justify-content-between align-items-center py-3">

                <div>

                    <h5 class="fw-bold mb-0">
                        Recent Quotations
                    </h5>

                    <small class="text-muted">
                        Your latest generated quotations
                    </small>

                </div>

                <a href="{{ route('quotations.index') }}"
                   class="btn btn-outline-primary btn-sm rounded-pill">

                    View All

                </a>

            </div>

            <div class="card-body p-0">

                <div class="table-responsive">

                    <table class="table table-hover align-middle mb-0">

                        <thead class="table-light">

                            <tr>

                                <th>Quotation</th>

                                <th>Client</th>

                                <th>Total</th>

                                <th>Date</th>

                                <th>Status</th>

                            </tr>

                        </thead>

                        <tbody>

                            @forelse($recentQuotations as $quote)

                                <tr>

                                    <td>

                                        <strong>
                                            {{ $quote->quotation_number }}
                                        </strong>

                                    </td>

                                    <td>

                                        {{ $quote->client->client_name ?? 'N/A' }}

                                    </td>

                                    <td>

                                        <strong>
                                            AED {{ number_format($quote->total,2) }}
                                        </strong>

                                    </td>

                                    <td>

                                        {{ \Carbon\Carbon::parse($quote->date)->format('d M Y') }}

                                    </td>

                                    <td>

                                        @if($quote->status == 'draft')

                                            <span class="badge bg-warning text-dark">
                                                Draft
                                            </span>

                                        @elseif($quote->status == 'sent')

                                            <span class="badge bg-info">
                                                Sent
                                            </span>

                                        @elseif($quote->status == 'accepted')

                                            <span class="badge bg-success">
                                                Accepted
                                            </span>

                                        @elseif($quote->status == 'rejected')

                                            <span class="badge bg-danger">
                                                Rejected
                                            </span>

                                        @else

                                            <span class="badge bg-secondary">
                                                {{ ucfirst($quote->status) }}
                                            </span>

                                        @endif

                                    </td>

                                </tr>

                            @empty

                                <tr>

                                    <td colspan="5" class="text-center py-5">

                                        <i class="fas fa-file-invoice fa-3x text-muted mb-3"></i>

                                        <h6 class="fw-bold">
                                            No quotations found
                                        </h6>

                                        <small class="text-muted">

                                            Your recently created quotations will appear here.

                                        </small>

                                    </td>

                                </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>

            </div>

        </div>

    </div>

</div>

{{-- =========================
    THIRD ROW STARTS HERE
========================= --}}
<div class="row mt-4">
        {{-- =========================
        GENERATED PDF FILES
    ========================== --}}
    <div class="col-12">

        <div class="card border-0 shadow-sm rounded-4">

            <div class="card-header bg-white border-0 py-3 d-flex justify-content-between align-items-center">

                <div>

                    <h5 class="fw-bold mb-0">
                        Generated PDF Files
                    </h5>

                    <small class="text-muted">
                        All generated quotation PDFs
                    </small>

                </div>

                <span class="badge bg-primary fs-6">
                    {{ $pdfs->count() }} Files
                </span>

            </div>

            <div class="card-body p-0">

                <div class="table-responsive">

                    <table class="table table-hover align-middle mb-0">

                        <thead class="table-light">

                            <tr>

                                <th width="60">#</th>

                                <th>Quotation</th>

                                <th>PDF File</th>

                                <th>Size</th>

                                <th>Generated</th>

                                <th width="170">Actions</th>

                            </tr>

                        </thead>

                        <tbody>

                        @forelse($pdfs as $pdf)

                            <tr>

                                <td>
                                    {{ $loop->iteration }}
                                </td>

                                <td>

                                    <strong>
                                        {{ $pdf->quotation_number }}
                                    </strong>

                                </td>

                                <td>

                                    <div class="d-flex align-items-center">

                                        <div class="me-3">

                                            <i class="fas fa-file-pdf fa-2x text-danger"></i>

                                        </div>

                                        <div>

                                            <strong>
                                                {{ basename($pdf->pdf_path) }}
                                            </strong>

                                            <br>

                                            <small class="text-muted">
                                                PDF Document
                                            </small>

                                        </div>

                                    </div>

                                </td>

                                <td>

                                    <span class="badge bg-light text-dark">

                                        {{ $pdf->size }} KB

                                    </span>

                                </td>

                                <td>

                                    @if($pdf->pdf_generated_at)

                                        {{ \Carbon\Carbon::parse($pdf->pdf_generated_at)->format('d M Y') }}

                                        <br>

                                        <small class="text-muted">

                                            {{ \Carbon\Carbon::parse($pdf->pdf_generated_at)->format('h:i A') }}

                                        </small>

                                    @else

                                        -

                                    @endif

                                </td>

                                <td>

                                    <div class="btn-group">

                                        <a href="{{ $pdf->url }}"
                                           target="_blank"
                                           class="btn btn-sm btn-outline-primary">

                                            <i class="fas fa-eye"></i>

                                        </a>

                                        <a href="{{ $pdf->url }}"
                                           download
                                           class="btn btn-sm btn-outline-success">

                                            <i class="fas fa-download"></i>

                                        </a>

                                    </div>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="6" class="text-center py-5">

                                    <i class="fas fa-file-pdf fa-4x text-danger opacity-25 mb-3"></i>

                                    <h5 class="fw-bold">

                                        No PDF Files Found

                                    </h5>

                                    <p class="text-muted mb-3">

                                        Generated quotation PDFs will appear here.

                                    </p>

                                    <a href="{{ route('quotations.create') }}"
                                       class="btn btn-primary rounded-pill px-4">

                                        <i class="fas fa-plus me-2"></i>

                                        Create Quotation

                                    </a>

                                </td>

                            </tr>

                        @endforelse

                        </tbody>

                    </table>

                </div>

            </div>

        </div>

    </div>

</div>

{{-- Footer --}}
<div class="text-center mt-5">

    <small class="text-muted">

        © {{ date('Y') }} QDizer • Smart Quotation Management System

    </small>

</div>

</div>

@endsection