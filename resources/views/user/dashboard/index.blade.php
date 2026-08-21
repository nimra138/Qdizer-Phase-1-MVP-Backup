@extends('user.partials.app')

@section('title', 'Dashboard')

@section('content')

    @php
    use Carbon\Carbon;

    $user = auth()->user();

    /*
    |--------------------------------------------------------------------------
    | Trial
    |--------------------------------------------------------------------------
    */

    $trialStart = $user->trial_start
        ? Carbon::parse($user->trial_start)
        : null;

    $trialEnd = $user->trial_end
        ? Carbon::parse($user->trial_end)
        : null;

    $isTrial = (
        $user->status === 'trial' &&
        $trialEnd &&
        $trialEnd->isFuture()
    );

    
    $trialDaysLeft = $isTrial
    ? (int) ceil(max(0, now()->diffInDays($trialEnd, false)))
    : null;
    $trialProgress = 0;

    if ($trialStart && $trialEnd) {

        $totalTrialSeconds = $trialStart->diffInSeconds($trialEnd);

        $elapsedTrialSeconds = now()->diffInSeconds(
            $trialStart,
            false
        );

        if ($totalTrialSeconds > 0) {
            $trialProgress = min(
                100,
                max(
                    0,
                    ($elapsedTrialSeconds / $totalTrialSeconds) * 100
                )
            );
        }
    }

    /*
    |--------------------------------------------------------------------------
    | Subscription
    |--------------------------------------------------------------------------
    */

    $subscriptionStart = $user->subscription_start
        ? Carbon::parse($user->subscription_start)
        : null;

    $subscriptionEnd = $user->subscription_end
        ? Carbon::parse($user->subscription_end)
        : null;

    $isActive = (
        $user->status === 'active' &&
        $subscriptionEnd &&
        $subscriptionEnd->isFuture()
    );

    $subscriptionDaysLeft = $isActive
    ? (int) ceil(max(0, now()->diffInDays($subscriptionEnd, false)))
    : null;

    $subscriptionProgress = 0;

    if ($subscriptionStart && $subscriptionEnd) {

        $totalSubscriptionSeconds =
            $subscriptionStart->diffInSeconds($subscriptionEnd);

        $elapsedSubscriptionSeconds =
            now()->diffInSeconds($subscriptionStart, false);

        if ($totalSubscriptionSeconds > 0) {

            $subscriptionProgress = min(
                100,
                max(
                    0,
                    ($elapsedSubscriptionSeconds / $totalSubscriptionSeconds) * 100
                )
            );
        }
    }

    /*
    |--------------------------------------------------------------------------
    | Canceling
    |--------------------------------------------------------------------------
    */

    $isCanceling = (
        $user->status === 'cancelled' &&
        $subscriptionEnd &&
        $subscriptionEnd->isFuture()
    );

    /*
    |--------------------------------------------------------------------------
    | Display Dates
    |--------------------------------------------------------------------------
    */

    $trialEndsAt = $trialEnd;
    $subscriptionEndsAt = $subscriptionEnd;

@endphp

    <div class="container-fluid py-4">

        {{-- =========================
        PAGE HEADER
    ========================== --}}
        <div class="d-flex flex-wrap justify-content-between align-items-center mb-4">

            <div>
                <h3 class="fw-bold mb-1">
                    Welcome back, {{ $user->name }} 👋
                </h3>

                <p class="text-muted mb-0">
                    Here's an overview of your business activity.
                </p>
            </div>

            <div class="mt-3 mt-md-0">

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


            {{-- =========================
            CLIENTS
        ========================== --}}
            <div class="col-xl-4 col-md-6">

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


            {{-- =========================
            SERVICES
        ========================== --}}
            <div class="col-xl-4 col-md-6">

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


            {{-- =========================
            QUOTATIONS
        ========================== --}}
            <div class="col-xl-4 col-md-6">

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

            
            {{-- =========================
            ACCOUNT STATUS
        ========================== --}}
            <div class="col-xl-12 col-md-6">

                <div class="card border-0 shadow-sm rounded-4 h-100">

                    <div class="card-body">

                        {{-- =========================
                STATUS HEADER
            ========================== --}}

                        <div class="d-flex justify-content-between align-items-center mb-3">

                            <small class="text-muted text-uppercase">
                                Account Status
                            </small>

                            {{-- ACTIVE --}}
                            @if ($isActive)
                                <span class="badge bg-success">
                                    Active
                                </span>

                                {{-- CANCELING --}}
                            @elseif ($isCanceling)
                                <span class="badge bg-warning text-dark">
                                    Canceling
                                </span>

                                {{-- TRIAL --}}
                            @elseif ($isTrial)
                                <span class="badge bg-warning text-dark">
                                    Trial
                                </span>

                                {{-- EXPIRED / INACTIVE --}}
                            @else
                                <span class="badge bg-danger">
                                    Inactive
                                </span>
                            @endif

                        </div>


                        {{-- =====================================================
                7 DAY FREE TRIAL
            ====================================================== --}}

                        @if ($isTrial)

                            <h3 class="fw-bold text-warning">

                                {{ $trialDaysLeft }}

                                <small class="fs-6">
                                    {{ Str::plural('Day', $trialDaysLeft) }}
                                </small>

                            </h3>

                            <p class="text-muted mb-3">
                                Free Trial Remaining
                            </p>


                            {{-- Trial End Date --}}

                            @if ($trialEndsAt)
                                <div class="small text-muted">

                                    Trial Ends

                                    <br>

                                    <strong>
                                        {{ $trialEndsAt->format('d M Y') }}
                                    </strong>

                                </div>
                            @endif


                            {{-- Trial Progress --}}

                            <div class="progress mt-3" style="height:8px;">

                                <div class="progress-bar bg-warning" style="width: {{ $trialProgress }}%;"></div>

                            </div>


                            <div class="d-flex justify-content-between mt-2">

                                <small class="text-muted">
                                    7 Day Free Trial
                                </small>

                                <small class="text-muted">
                                    {{ round($trialProgress) }}%
                                </small>

                            </div>


                            {{-- Upgrade Button --}}

                            <a href="{{ route('billing') }}" class="btn btn-warning text-dark w-100 mt-3">

                                <i class="fas fa-arrow-up me-1"></i>

                                Upgrade Now

                            </a>


                            {{-- =====================================================
                30 DAY PAID SUBSCRIPTION
            ====================================================== --}}
                        @elseif ($isActive)
                            <h3 class="fw-bold text-success">

                                @if ($subscriptionDaysLeft !== null)
                                    {{ $subscriptionDaysLeft }}

                                    <small class="fs-6">
                                        {{ Str::plural('Day', $subscriptionDaysLeft) }}
                                    </small>
                                @else
                                    Active
                                @endif

                            </h3>

                            <p class="text-muted mb-3">
                                Subscription Active
                            </p>


                            {{-- Subscription End --}}

                            @if ($subscriptionEndsAt)
                                <div class="small text-muted">

                                    Subscription Ends

                                    <br>

                                    <strong>
                                        {{ $subscriptionEndsAt->format('d M Y') }}
                                    </strong>

                                </div>
                            @else
                                <div class="small text-muted">

                                    <i class="fas fa-rotate me-1"></i>

                                    Auto Renew Enabled

                                </div>
                            @endif


                            {{-- 30 Day Progress --}}

                            @if ($subscriptionEndsAt)
                                <div class="progress mt-3" style="height:8px;">

                                    <div class="progress-bar bg-success" style="width: {{ $subscriptionProgress }}%;">
                                    </div>

                                </div>


                                <div class="d-flex justify-content-between mt-2">

                                    <small class="text-muted">
                                        30 Day Subscription
                                    </small>

                                    <small class="text-muted">
                                        {{ round($subscriptionProgress) }}%
                                    </small>

                                </div>
                            @endif


                            <a href="{{ route('billing') }}" class="btn btn-outline-success w-100 mt-3">

                                <i class="fas fa-credit-card me-1"></i>

                                Manage Billing

                            </a>


                            {{-- =====================================================
                CANCELING
            ====================================================== --}}
                        @elseif ($isCanceling)
                            <h3 class="fw-bold text-warning">

                                {{ $subscriptionDaysLeft }}

                                <small class="fs-6">
                                    {{ Str::plural('Day', $subscriptionDaysLeft) }}
                                </small>

                            </h3>

                            <p class="text-muted mb-3">
                                Subscription Canceling
                            </p>


                            @if ($subscriptionEndsAt)
                                <div class="small text-muted">

                                    Access Until

                                    <br>

                                    <strong>
                                        {{ $subscriptionEndsAt->format('d M Y') }}
                                    </strong>

                                </div>
                            @endif


                            <a href="{{ route('billing') }}" class="btn btn-warning text-dark w-100 mt-3">

                                View Billing

                            </a>


                            {{-- =====================================================
                EXPIRED / NO SUBSCRIPTION
            ====================================================== --}}
                        @else
                            <h3 class="fw-bold text-danger">
                                Inactive
                            </h3>

                            <p class="text-muted">
                                Your trial or subscription has expired.
                            </p>


                            <a href="{{ route('billing') }}" class="btn btn-primary w-100 mt-3">

                                <i class="fas fa-credit-card me-1"></i>

                                Subscribe Now

                            </a>

                        @endif

                    </div>

                </div>

            </div>

        </div>


        {{-- =========================
        SECOND ROW
    ========================== --}}
        <div class="row g-4 mt-2">


            {{-- =========================
            RECENT QUOTATIONS
        ========================== --}}
            <div class="col-lg-12">

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

                        <a href="{{ route('quotations.index') }}" class="btn btn-outline-primary btn-sm rounded-pill">
                            View All
                        </a>

                    </div>


                    <div class="card-body p-0">

                        <div class="table-responsive">

                            <table class="table table-hover align-middle mb-0">

                                <thead class="table-light">

                                    <tr>

                                        <th>
                                            Quotation
                                        </th>

                                        <th>
                                            Client
                                        </th>

                                        <th>
                                            Total
                                        </th>

                                        <th>
                                            Date
                                        </th>

                                        <th>
                                            Status
                                        </th>

                                    </tr>

                                </thead>


                                <tbody>

                                    @forelse ($recentQuotations as $quote)
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
                                                    AED {{ number_format($quote->total, 2) }}
                                                </strong>

                                            </td>


                                            <td>

                                                {{ \Carbon\Carbon::parse($quote->date)->format('d M Y') }}

                                            </td>


                                            <td>

                                                @if ($quote->status == 'draft')
                                                    <span class="badge bg-warning text-dark">
                                                        Draft
                                                    </span>
                                                @elseif ($quote->status == 'sent')
                                                    <span class="badge bg-info">
                                                        Sent
                                                    </span>
                                                @elseif ($quote->status == 'accepted')
                                                    <span class="badge bg-success">
                                                        Accepted
                                                    </span>
                                                @elseif ($quote->status == 'rejected')
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
        THIRD ROW
    ========================== --}}
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

                                        <th width="60">
                                            #
                                        </th>

                                        <th>
                                            Quotation
                                        </th>

                                        <th>
                                            PDF File
                                        </th>

                                        <th>
                                            Size
                                        </th>

                                        <th>
                                            Generated
                                        </th>

                                        <th width="170">
                                            Actions
                                        </th>

                                    </tr>

                                </thead>


                                <tbody>

                                    @forelse ($pdfs as $pdf)
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

                                                @if ($pdf->pdf_generated_at)
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

                                                    <a href="{{ $pdf->url }}" target="_blank"
                                                        class="btn btn-sm btn-outline-primary" title="View PDF">
                                                        <i class="fas fa-eye"></i>
                                                    </a>

                                                    <a href="{{ $pdf->url }}" download
                                                        class="btn btn-sm btn-outline-success" title="Download PDF">
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

    </div>

@endsection
