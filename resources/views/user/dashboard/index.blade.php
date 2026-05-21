@extends('user.partials.app')

@section('title', 'Dashboard')

@section('content')

<div class="container-fluid py-4">

    {{-- HEADER --}}
    <div class="mb-4">
        <h3 class="mb-1">
            Welcome back 👋
        </h3>

        <small class="text-muted">
            Business overview & quotation analytics
        </small>
    </div>

    {{-- CARDS --}}
    <div class="row g-4 mb-4">

        {{-- CLIENTS --}}
        <div class="col-md-3">
            <div class="card border-0 shadow-sm rounded-4 p-4">

                <div class="text-muted mb-2">
                    Clients
                </div>

                <h3 class="mb-0">
                    {{ $clients }}
                </h3>

            </div>
        </div>

        {{-- SERVICES --}}
        <div class="col-md-3">
            <div class="card border-0 shadow-sm rounded-4 p-4">

                <div class="text-muted mb-2">
                    Services
                </div>

                <h3 class="mb-0">
                    {{ $services }}
                </h3>

            </div>
        </div>

        {{-- QUOTATIONS --}}
        <div class="col-md-3">
            <div class="card border-0 shadow-sm rounded-4 p-4">

                <div class="text-muted mb-2">
                    Quotations
                </div>

                <h3 class="mb-0">
                    {{ $quotations }}
                </h3>

            </div>
        </div>

        {{-- TRIAL --}}
        <div class="col-md-3">
            <div class="card border-0 shadow-sm rounded-4 p-4">

                <div class="text-muted mb-2">
                    Trial Remaining
                </div>

                <h3 class="mb-0 text-primary">
                    {{-- {{ $trialDays }} Days --}}
                    {{ $daysLeft }} Days {{ $hoursLeft }} Hours
                </h3>

            </div>
        </div>

    </div>

    {{-- SECOND ROW --}}
    <div class="row g-4">

        {{-- REVENUE --}}
        <div class="col-lg-4">

            <div class="card border-0 shadow-sm rounded-4 p-4 h-100">

                <small class="text-muted">
                    Total Revenue
                </small>

                <h2 class="mt-2">
                    AED 
                    {{-- {{ number_format($revenue,2) }} --}}
                </h2>

                <small class="text-success">
                    From Final Quotations
                </small>

            </div>

        </div>

        {{-- RECENT QUOTES --}}
        <div class="col-lg-8">

            <div class="card border-0 shadow-sm rounded-4">

                <div class="card-header bg-white border-0 pt-4 px-4">
                    <h5 class="mb-0">
                        Recent Quotations
                    </h5>
                </div>

                <div class="card-body">

                    <div class="table-responsive">

                        <table class="table align-middle">

                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Client</th>
                                    <th>Total</th>
                                    <th>Status</th>
                                </tr>
                            </thead>

                            <tbody>

                                @forelse($recentQuotations as $quote)

                                <tr>

                                    <td>
                                        {{ $quote->quotation_number }}
                                    </td>

                                    <td>
                                        {{ $quote->client->client_name ?? '-' }}
                                    </td>

                                    <td>
                                        AED {{ number_format($quote->total,2) }}
                                    </td>

                                    <td>

                                        @if($quote->status=='draft')
                                            <span class="badge bg-warning">
                                                Draft
                                            </span>
                                        @else
                                            <span class="badge bg-success">
                                                Final
                                            </span>
                                        @endif

                                    </td>

                                </tr>

                                @empty

                                <tr>
                                    <td colspan="4"
                                        class="text-center text-muted py-4">
                                        No quotations found
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