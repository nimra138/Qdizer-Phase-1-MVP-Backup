@extends('user.partials.app')

@section('title', 'Subscription & Billing')

@section('content')
@php
    $user = auth()->user();

    $hasSubscription = $user->status === 'active';

    if ($hasSubscription) {
        $expiryDate = $user->trial_ends_at;
        $remainingDays = $expiryDate
            ? now()->diffInDays(\Carbon\Carbon::parse($expiryDate), false)
            : 0;
    } else {
        $expiryDate = $user->trial_end;
        $remainingDays = $expiryDate
            ? now()->diffInDays(\Carbon\Carbon::parse($expiryDate), false)
            : 0;
    }

    $remainingDays = max(0, $remainingDays);
@endphp

<div class="billing-wrapper">

    {{-- HERO --}}
    <div class="billing-hero">
        <div>
            <h2>Subscription & Billing</h2>
            <p>Manage your QDizer Pro plan, invoices, and renewals.</p>
        </div>

        @if(!$hasSubscription)
        <form method="POST" action="{{ route('subscribe') }}">
            @csrf
            <button class="btn btn-accent px-4 py-3">
                Upgrade Now
            </button>
        </form>
        @endif
    </div>

    {{-- STATS --}}
    <div class="row g-4 mb-4">

      <div class="col-xl-3 col-md-6">
    <div class="billing-stat">
        <div class="stat-icon">💎</div>

        <small>Current Plan</small>

        <h4>
            {{ $hasSubscription ? 'QDizer Pro' : 'Free Trial' }}
        </h4>
    </div>
</div>

       {{-- <div class="col-xl-3 col-md-6">
    <div class="billing-stat">

        <div class="stat-icon">⏳</div>

        <small>
            {{ $hasSubscription ? 'Subscription Remaining' : 'Trial Remaining' }}
        </small>

        <h4>
            {{ $remainingDays }} Days
        </h4>

    </div>
</div> --}}

        <div class="col-xl-3 col-md-6">

    <div class="billing-stat">

        <div class="stat-icon">📊</div>

        <small>Status</small>

        <h4>

            @if($hasSubscription)

                <span class="status-active">
                    Active
                </span>

            @else

                <span class="status-inactive">
                    Trial
                </span>

            @endif

        </h4>

    </div>

</div>
        <div class="col-xl-3 col-md-6">

    <div class="billing-stat">

        <div class="stat-icon">📅</div>

        <small>

            {{ $hasSubscription ? 'Subscription Expires' : 'Trial Ends' }}

        </small>

        <h4>

            {{ $expiryDate
                ? \Carbon\Carbon::parse($expiryDate)->format('d M Y')
                : '--' }}

        </h4>

    </div>

</div>
    {{-- MAIN SECTION --}}
    <div class="row g-4">

        {{-- Pricing --}}
        <div class="col-lg-8">
            <div class="pricing-card">
                <div class="plan-badge">PRO PLAN</div>

                <h2>QDizer Pro</h2>

                <div class="price-box">
                    79
                    <span>AED / month</span>
                </div>

                <p class="vat-text">
                    VAT Included • Cancel Anytime
                </p>

                <ul class="feature-list">
                    <li>✓ Unlimited Quotations</li>
                    <li>✓ Client Management</li>
                    <li>✓ Service Management</li>
                    <li>✓ Premium PDF Export</li>
                    <li>✓ WhatsApp Sharing</li>
                    <li>✓ Priority Support</li>
                </ul>

                @if(!$hasSubscription)
                    <form method="POST" action="{{ route('subscribe') }}">
                        @csrf
                        <button class="subscribe-btn">
                            Subscribe / Renew
                        </button>
                    </form>
                @else
                    <button class="active-btn">
                        Subscription Active
                    </button>
                @endif
            </div>
        </div>

        {{-- Usage --}}
        {{-- <div class="col-lg-4">
            <div class="usage-box card-ui">
                <h5>Usage This Month</h5>

                <div class="usage-item">
                    <small>Quotations Generated</small>
                    <div class="progress mt-2">
                        <div class="progress-bar" style="width:65%"></div>
                    </div>
                    <strong>325 / Unlimited</strong>
                </div>

                <div class="usage-item">
                    <small>Clients Added</small>
                    <div class="progress mt-2">
                        <div class="progress-bar" style="width:40%"></div>
                    </div>
                    <strong>42 Clients</strong>
                </div>
            </div>
        </div> --}}

    </div>

    {{-- Billing History --}}
    {{-- <div class="billing-history">
        <div class="history-header">
            <h4>Billing History</h4>
            <p>Your recent invoices and payments</p>
        </div>

        <div class="table-responsive">
            <table class="table billing-table">
                <thead>
                    <tr>
                        <th>Invoice</th>
                        <th>Date</th>
                        <th>Amount</th>
                        <th>Status</th>
                        <th>Download</th>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <td>#INV-1001</td>
                        <td>02 Jul 2026</td>
                        <td>79 AED</td>
                        <td><span class="paid-badge">Paid</span></td>
                        <td><button class="btn btn-sm btn-primary">PDF</button></td>
                    </tr>

                    <tr>
                        <td>#INV-1000</td>
                        <td>02 Jun 2026</td>
                        <td>79 AED</td>
                        <td><span class="paid-badge">Paid</span></td>
                        <td><button class="btn btn-sm btn-primary">PDF</button></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div> --}}

</div>
@endsection

