
@extends('user.partials.app')

@section('title', 'Subscription & Billing')

@section('content')

@php
    $user = auth()->user();
    // dd($subscription);
    // die;
    $subscription = $subscription ?? null;

    $hasSubscription = $subscription && $subscription->valid();

    $isTrial = $subscription?->onTrial();

    $transactions = $transactions ?? collect();
@endphp

<div class="billing-wrapper mb-5">

    {{-- HERO --}}
    <div class="billing-hero d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2>Subscription & Billing</h2>
            <p class="text-muted mb-0">
                Manage your QDizer subscription, invoices and payments.
            </p>
        </div>

        @if(!$hasSubscription)
            <form method="POST" action="{{ route('subscribe') }}">
                @csrf
                <button class="btn btn-primary px-4">
                    Upgrade Now
                </button>
            </form>
        @endif
    </div>

    {{-- STATS --}}
    <div class="row g-4 mb-4">

        <div class="col-lg-3 col-md-6">
            <div class="billing-stat card h-100">
                <div class="card-body">
                    <div class="fs-3 mb-2">💎</div>

                    <small class="text-muted">
                        Current Plan
                    </small>

                    <h4 class="mt-2">
                        {{ $hasSubscription ? 'QDizer Pro' : 'Free Trial' }}
                    </h4>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6">
            <div class="billing-stat card h-100">
                <div class="card-body">

                    <div class="fs-3 mb-2">📊</div>

                    <small class="text-muted">
                        Status
                    </small>

                    <h4 class="mt-2">

                        @if($hasSubscription)

                            <span class="badge bg-success">
                                {{ ucfirst($subscription->stripe_status) }}
                            </span>

                        @else

                            <span class="badge bg-warning text-dark">
                                Trial
                            </span>

                        @endif

                    </h4>

                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6">
            <div class="billing-stat card h-100">
                <div class="card-body">

                    <div class="fs-3 mb-2">💳</div>

                    <small class="text-muted">
                        Payment Method
                    </small>

                    <h4 class="mt-2">

                        @if($user->pm_type)

                            {{ strtoupper($user->pm_type) }}
                            **** {{ $user->pm_last_four }}

                        @else

                            Card

                        @endif

                    </h4>

                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6">
            <div class="billing-stat card h-100">
                <div class="card-body">

                    <div class="fs-3 mb-2">📅</div>

                    <small class="text-muted">
                        Renewal
                    </small>

                    <h4 class="mt-2">

                        @if($hasSubscription)

                            @if($subscription->ends_at)

                                {{ $subscription->ends_at->format('d M Y') }}

                            @else

                                Auto Renew

                            @endif

                        @else

                            --

                        @endif

                    </h4>

                </div>
            </div>
        </div>

    </div>

    {{-- PLAN CARD --}}
    <div class="card shadow-sm mb-4">

        <div class="card-body">

            <div class="row align-items-center">

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

                    <p class="text-muted">
                        VAT Included • Cancel Anytime
                    </p>

                    <ul class="list-unstyled mt-4">

                        <li>✔ Unlimited Quotations</li>
                        <li>✔ Unlimited Clients</li>
                        <li>✔ Unlimited Services</li>
                        <li>✔ Premium PDF Export</li>
                        <li>✔ WhatsApp Sharing</li>
                        <li>✔ Priority Support</li>

                    </ul>

                </div>

                <div class="col-lg-4 text-lg-end mt-4 mt-lg-0">

                    @if(!$hasSubscription)

                        <form method="POST" action="{{ route('subscribe') }}">
                            @csrf

                            <button class="btn btn-primary btn-lg">
                                Subscribe Now
                            </button>

                        </form>

                    @else

                        <button class="btn btn-success btn-lg" disabled>
                            Subscription Active
                        </button>

                    @endif

                </div>

            </div>

        </div>

    </div>
    {{-- @if($subscription && $subscription->valid())

<form action="{{ route('billing.cancel') }}"
      method="POST">

    @csrf

    <button
        class="btn btn-danger"
        onclick="return confirm('Cancel your subscription?')">

        Cancel Subscription

    </button>

</form>

@endif --}}
    {{-- PAYMENT HISTORY --}}
    <div class="card shadow-sm">

        <div class="card-header bg-white">

            <h4 class="mb-0">
                Billing History
            </h4>

        </div>

        <div class="table-responsive">

            <table class="table table-hover align-middle mb-0">

                <thead>

                    <tr>

                        <th>Invoice</th>

                        <th>Date</th>

                        <th>Amount</th>

                        <th>Status</th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($transactions as $transaction)

                        <tr>

                            <td>
                                {{ $transaction->stripe_invoice_id }}
                            </td>

                            <td>
                                {{ optional($transaction->paid_at)->format('d M Y') }}
                            </td>

                            <td>
                                {{ $transaction->currency }}
                                {{ number_format($transaction->total,2) }}
                            </td>

                            <td>

                                <span class="badge bg-success">

                                    {{ ucfirst($transaction->status) }}

                                </span>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="4" class="text-center py-5">

                                No payment history found.

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

        @if(method_exists($transactions,'links'))

            <div class="card-footer bg-white">

                {{ $transactions->links() }}

            </div>

        @endif

    </div>

</div>

@endsection

