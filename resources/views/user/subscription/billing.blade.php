
@extends('user.partials.app')

@section('title', 'Subscription & Billing')

@section('content')

@php
    $user = auth()->user();

    $subscription = $subscription ?? null;

    $hasSubscription = $subscription && $subscription->valid();
    $isTrial = $subscription?->onTrial();

    $transactions = $transactions ?? collect();

    /*
    |--------------------------------------------------------------------------
    | Subscription Status
    |--------------------------------------------------------------------------
    */
    $subscriptionStatus = $subscription?->stripe_status;

    $isActive = $hasSubscription && $subscriptionStatus === 'active';
    $isCanceled = $subscription && $subscription->ends_at && !$subscription->ended();
@endphp

<div class="billing-wrapper mb-5">

    {{-- =========================================================
        HERO
    ========================================================== --}}
    <div class="billing-hero d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4">

        <div>
            <h2 class="mb-1">
                Subscription & Billing
            </h2>

            <p class="text-muted mb-0">
                Manage your QDizer subscription, invoices and payments.
            </p>
        </div>

        @if (!$hasSubscription)
            <form method="POST" action="{{ route('subscribe') }}">
                @csrf

                <button type="submit" class="btn btn-primary px-4">
                    <i class="fas fa-arrow-up me-1"></i>
                    Upgrade Now
                </button>
            </form>
        @endif

    </div>


    {{-- =========================================================
        SESSION MESSAGES
    ========================================================== --}}
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
            <i class="fas fa-circle-check me-2"></i>
            {{ session('success') }}

            <button type="button"
                    class="btn-close"
                    data-bs-dismiss="alert">
            </button>
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show mb-4" role="alert">
            <i class="fas fa-circle-exclamation me-2"></i>
            {{ session('error') }}

            <button type="button"
                    class="btn-close"
                    data-bs-dismiss="alert">
            </button>
        </div>
    @endif


    {{-- =========================================================
        STATS
    ========================================================== --}}
    <div class="row g-4 mb-4">

        {{-- Current Plan --}}
        <div class="col-lg-3 col-md-6">
            <div class="billing-stat card h-100 shadow-sm border-0">

                <div class="card-body">

                    <div class="fs-3 mb-2">
                        💎
                    </div>

                    <small class="text-muted">
                        Current Plan
                    </small>

                    <h4 class="mt-2 mb-0">

                        @if ($isActive)
                            QDizer Pro
                        @elseif ($isTrial)
                            Free Trial
                        @else
                            Free Plan
                        @endif

                    </h4>

                </div>

            </div>
        </div>


        {{-- Status --}}
        <div class="col-lg-3 col-md-6">
            <div class="billing-stat card h-100 shadow-sm border-0">

                <div class="card-body">

                    <div class="fs-3 mb-2">
                        📊
                    </div>

                    <small class="text-muted">
                        Status
                    </small>

                    <h4 class="mt-2">

                        @if ($isActive)

                            <span class="badge bg-success">
                                Active
                            </span>

                        @elseif ($isCanceled)

                            <span class="badge bg-danger">
                                Canceling
                            </span>

                        @elseif ($isTrial)

                            <span class="badge bg-warning text-dark">
                                Trial
                            </span>

                        @else

                            <span class="badge bg-secondary">
                                Inactive
                            </span>

                        @endif

                    </h4>

                </div>

            </div>
        </div>


        {{-- Payment Method --}}
        <div class="col-lg-3 col-md-6">
            <div class="billing-stat card h-100 shadow-sm border-0">

                <div class="card-body">

                    <div class="fs-3 mb-2">
                        💳
                    </div>

                    <small class="text-muted">
                        Payment Method
                    </small>

                    <h4 class="mt-2">

                        @if ($user->pm_type && $user->pm_last_four)

                            {{ strtoupper($user->pm_type) }}
                            **** {{ $user->pm_last_four }}

                        @else

                            <span class="text-muted">
                                Not Available
                            </span>

                        @endif

                    </h4>

                </div>

            </div>
        </div>


        {{-- Renewal --}}
        <div class="col-lg-3 col-md-6">
            <div class="billing-stat card h-100 shadow-sm border-0">

                <div class="card-body">

                    <div class="fs-3 mb-2">
                        📅
                    </div>

                    <small class="text-muted">
                        Renewal
                    </small>

                    <h4 class="mt-2">

                        @if ($hasSubscription)

                            @if ($subscription->ends_at)

                                {{ $subscription->ends_at->format('d M Y') }}

                            @else

                                Auto Renew

                            @endif

                        @else

                            <span class="text-muted">
                                --
                            </span>

                        @endif

                    </h4>

                </div>

            </div>
        </div>

    </div>


    {{-- =========================================================
        PLAN CARD
    ========================================================== --}}
    <div class="card shadow-sm border-0 mb-4">

        <div class="card-body p-4">

            <div class="row align-items-center">

                {{-- Plan Details --}}
                <div class="col-lg-8">

                    <span class="badge bg-primary mb-2">
                        PRO PLAN
                    </span>

                    <h2 class="mb-3">
                        QDizer Pro
                    </h2>

                    <h1 class="display-5 fw-bold">

                        79 AED

                        <small class="fs-5 text-muted">
                            / Month
                        </small>

                    </h1>

                    <p class="text-muted mb-0">
                        VAT Included • Cancel Anytime
                    </p>


                    {{-- Features --}}
                    <ul class="list-unstyled mt-4 mb-0">

                        <li class="mb-2">
                            <i class="fas fa-check text-success me-2"></i>
                            Unlimited Quotations
                        </li>

                        <li class="mb-2">
                            <i class="fas fa-check text-success me-2"></i>
                            Unlimited Clients
                        </li>

                        <li class="mb-2">
                            <i class="fas fa-check text-success me-2"></i>
                            Unlimited Services
                        </li>

                        <li class="mb-2">
                            <i class="fas fa-check text-success me-2"></i>
                            Premium PDF Export
                        </li>

                        <li class="mb-2">
                            <i class="fas fa-check text-success me-2"></i>
                            WhatsApp Sharing
                        </li>

                        <li>
                            <i class="fas fa-check text-success me-2"></i>
                            Priority Support
                        </li>

                    </ul>

                </div>


                {{-- Plan Action --}}
                <div class="col-lg-4 text-lg-end mt-4 mt-lg-0">

                    @if (!$hasSubscription)

                        <form method="POST" action="{{ route('subscribe') }}">
                            @csrf

                            <button
                                type="submit"
                                class="btn btn-primary btn-lg px-4"
                            >
                                <i class="fas fa-credit-card me-1"></i>
                                Subscribe Now
                            </button>
                        </form>

                    @elseif ($isCanceled)

                        <div>

                            <button
                                type="button"
                                class="btn btn-warning btn-lg"
                                disabled
                            >
                                Subscription Canceling
                            </button>

                            @if ($subscription->ends_at)

                                <div class="small text-muted mt-2">
                                    Access until
                                    {{ $subscription->ends_at->format('d M Y') }}
                                </div>

                            @endif

                        </div>

                    @else

                        <button
                            type="button"
                            class="btn btn-success btn-lg"
                            disabled
                        >
                            <i class="fas fa-check me-1"></i>
                            Subscription Active
                        </button>

                    @endif

                </div>

            </div>

        </div>

    </div>


    {{-- =========================================================
        PAYMENT HISTORY
    ========================================================== --}}
    <div class="card shadow-sm border-0">

        <div class="card-header bg-white py-3">

            <h4 class="mb-0">
                <i class="fas fa-receipt me-2"></i>
                Billing History
            </h4>

        </div>


        <div class="table-responsive">

            <table class="table table-hover align-middle mb-0">

                <thead class="table-light">

                    <tr>

                        <th>
                            Invoice
                        </th>

                        <th>
                            Date
                        </th>

                        <th>
                            Amount
                        </th>

                        <th>
                            Status
                        </th>

                    </tr>

                </thead>


                <tbody>

                    @forelse ($transactions as $transaction)

                        <tr>

                            {{-- Invoice --}}
                            <td>

                                <span class="fw-semibold">
                                    {{ $transaction->stripe_invoice_id ?? '--' }}
                                </span>

                            </td>


                            {{-- Date --}}
                            <td>

                                {{ optional($transaction->paid_at)->format('d M Y') ?? '--' }}

                            </td>


                            {{-- Amount --}}
                            <td>

                                <span class="fw-semibold">

                                    {{ strtoupper($transaction->currency ?? 'AED') }}

                                    {{ number_format((float) $transaction->total, 2) }}

                                </span>

                            </td>


                            {{-- Status --}}
                            <td>

                                @php
                                    $status = strtolower($transaction->status ?? 'unknown');
                                @endphp

                                @if ($status === 'paid' || $status === 'succeeded' || $status === 'success')

                                    <span class="badge bg-success">
                                        <i class="fas fa-check me-1"></i>
                                        {{ ucfirst($transaction->status) }}
                                    </span>

                                @elseif ($status === 'pending')

                                    <span class="badge bg-warning text-dark">
                                        <i class="fas fa-clock me-1"></i>
                                        Pending
                                    </span>

                                @elseif ($status === 'failed')

                                    <span class="badge bg-danger">
                                        <i class="fas fa-xmark me-1"></i>
                                        Failed
                                    </span>

                                @else

                                    <span class="badge bg-secondary">
                                        {{ ucfirst($transaction->status ?? 'Unknown') }}
                                    </span>

                                @endif

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td
                                colspan="4"
                                class="text-center py-5"
                            >

                                <div class="text-muted">

                                    <i class="fas fa-receipt fs-2 mb-3"></i>

                                    <p class="mb-0">
                                        No payment history found.
                                    </p>

                                </div>

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>


        {{-- Pagination --}}
        @if (method_exists($transactions, 'links'))

            <div class="card-footer bg-white">

                {{ $transactions->links() }}

            </div>

        @endif

    </div>

</div>

@endsection