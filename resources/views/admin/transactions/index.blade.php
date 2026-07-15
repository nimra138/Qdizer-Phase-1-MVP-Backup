@extends('admin.layouts.layout')

@section('title','Transaction History')

@section('content')

<div class="card shadow-sm border-0">

    <div class="card-header bg-white">
        <h4 class="mb-0">Subscription Transactions</h4>
    </div>

    <div class="card-body">

        <div class="table-responsive">

            <table class="table table-hover align-middle">

                <thead>

                    <tr>
                        <th>#</th>
                        <th>User</th>
                        <th>Invoice</th>
                        <th>Total</th>
                        <th>Currency</th>
                        <th>Status</th>
                        <th>Paid At</th>
                        <th>Action</th>
                    </tr>

                </thead>

                <tbody>

                @forelse($transactions as $transaction)

                    <tr>

                        <td>{{ $transaction->id }}</td>

                        <td>
                            {{ $transaction->user?->name }}
                            <br>
                            <small class="text-muted">
                                {{ $transaction->user?->email }}
                            </small>
                        </td>

                        <td>{{ $transaction->stripe_invoice_id }}</td>

                        <td>
                            {{ number_format($transaction->total,2) }}
                        </td>

                        <td>{{ strtoupper($transaction->currency) }}</td>

                        <td>

                            @if($transaction->status == 'paid')

                                <span class="badge bg-success">
                                    Paid
                                </span>

                            @elseif($transaction->status == 'pending')

                                <span class="badge bg-warning">
                                    Pending
                                </span>

                            @else

                                <span class="badge bg-danger">
                                    {{ ucfirst($transaction->status) }}
                                </span>

                            @endif

                        </td>

                        <td>

                            {{ optional($transaction->paid_at)->format('d M Y h:i A') }}

                        </td>

                        <td>

                            <a href="{{ route('admin.transactions.show',$transaction) }}"
                               class="btn btn-primary btn-sm">

                                View

                            </a>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="8" class="text-center">

                            No Transactions Found.

                        </td>

                    </tr>

                @endforelse

                </tbody>

            </table>

        </div>

        {{ $transactions->links() }}

    </div>

</div>

@endsection