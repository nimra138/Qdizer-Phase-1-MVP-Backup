@extends('admin.layouts.layout')

@section('title','Transaction Details')

@section('content')

<div class="row">
    <div class="col-lg-8 mx-auto">

        <div class="card shadow-sm border-0">

            <div class="card-header bg-whte d-flex justify-content-between align-items-center">
                <h4 class="mb-0">Transaction Details</h4>

                <a href="{{ route('admin.transactions.index') }}"
                   class="btn btn-secondary btn-sm">
                    Back
                </a>
            </div>

            <div class="card-body">

                <table class="table table-bordered align-middle">

                    <tr>
                        <th width="220">User</th>
                        <td>{{ $transaction->user?->name ?? 'N/A' }}</td>
                    </tr>

                    <tr>
                        <th>Email</th>
                        <td>{{ $transaction->user?->email ?? 'N/A' }}</td>
                    </tr>

                    <tr>
                        <th>Stripe Invoice ID</th>
                        <td>{{ $transaction->stripe_invoice_id ?? '-' }}</td>
                    </tr>

                    {{-- <tr>
                        <th>Stripe Subscription ID</th>
                        <td>{{ $transaction->stripe_subscription_id ?? '-' }}</td>
                    </tr>

                    <tr>
                        <th>Stripe Payment Intent</th>
                        <td>{{ $transaction->stripe_payment_intent ?? '-' }}</td>
                    </tr> --}}

                    <tr>
                        <th>Amount</th>
                        <td>{{ number_format($transaction->amount, 2) }}</td>
                    </tr>

                    {{-- <tr>
                        <th>VAT</th>
                        <td>{{ number_format($transaction->vat, 2) }}</td>
                    </tr> --}}

                    <tr>
                        <th>Total</th>
                        <td>
                            <strong>{{ number_format($transaction->total, 2) }}</strong>
                        </td>
                    </tr>

                    <tr>
                        <th>Currency</th>
                        <td>{{ strtoupper($transaction->currency) }}</td>
                    </tr>

                    <tr>
                        <th>Status</th>
                        <td>
                            @if($transaction->status == 'paid')
                                <span class="badge bg-success">Paid</span>
                            @elseif($transaction->status == 'pending')
                                <span class="badge bg-warning text-dark">Pending</span>
                            @elseif($transaction->status == 'failed')
                                <span class="badge bg-danger">Failed</span>
                            @else
                                <span class="badge bg-secondary">
                                    {{ ucfirst($transaction->status) }}
                                </span>
                            @endif
                        </td>
                    </tr>

                    <tr>
                        <th>Payment Method</th>
                        <td>{{ $transaction->payment_method ?? '-' }}</td>
                    </tr>

                    <tr>
                        <th>Paid At</th>
                        <td>
                            {{ optional($transaction->paid_at)->format('d M Y h:i A') ?? '-' }}
                        </td>
                    </tr>

                    {{-- <tr>
                        <th>Created At</th>
                        <td>{{ $transaction->created_at->format('d M Y h:i A') }}</td>
                    </tr>

                    <tr>
                        <th>Last Updated</th>
                        <td>{{ $transaction->updated_at->format('d M Y h:i A') }}</td>
                    </tr> --}}

                </table>

                @if(!empty($transaction->payload))

                    <hr>

                    <h5 class="mb-3">Stripe Payload</h5>

                    <pre class="bg-ligh border rounded p-3" style="max-height:500px; overflow:auto;">{{ json_encode($transaction->payload, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) }}</pre>

                @endif

            </div>

        </div>

    </div>
</div>

@endsection