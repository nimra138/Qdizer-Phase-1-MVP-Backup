@extends('admin.layouts.layout')

@section('title','Quotations')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h3 class="fw-bold mb-1">Quotation Management</h3>
        <p class="text-muted mb-0">Manage all quotations created by users.</p>
    </div>
</div>

{{-- Statistics --}}
<div class="row g-3 mb-4">

    <div class="col-lg-3 col-md-6">
        <div class="card border-0 shadow-sm">
            <div class="card-body">
                <small class="text-muted">Total Quotations</small>
                <h2 class="fw-bold">{{ $quotations->total() }}</h2>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-6">
        <div class="card border-0 shadow-sm">
            <div class="card-body">
                <small class="text-muted">Today's Quotations</small>
                <h2 class="fw-bold">
                    {{ \App\Models\Quotation::whereDate('created_at',today())->count() }}
                </h2>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-6">
        <div class="card border-0 shadow-sm">
            <div class="card-body">
                <small class="text-muted">Total Value</small>
                <h2 class="fw-bold">
                    {{ number_format(\App\Models\Quotation::sum('total'),2) }}
                </h2>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-6">
        <div class="card border-0 shadow-sm">
            <div class="card-body">
                <small class="text-muted">This Month</small>
                <h2 class="fw-bold">
                    {{ \App\Models\Quotation::whereMonth('created_at',now()->month)->count() }}
                </h2>
            </div>
        </div>
    </div>

</div>

<div class="card shadow-sm border-0">

    <div class="card-body">

        <form method="GET">

            <div class="row mb-3">

                <div class="col-md-4">

                    <input
                        type="text"
                        name="search"
                        class="form-control"
                        value="{{ request('search') }}"
                        placeholder="Search quotation, client or user...">

                </div>

                <div class="col-md-2">

                    <button class="btn btn-primary">
                        Search
                    </button>

                </div>

            </div>

        </form>

        <div class="table-responsive">

            <table class="table table-hover align-middle">

                <thead class="table-lght">

                    <tr>

                        <th>#</th>

                        <th>Quotation</th>

                        <th>Client</th>

                        <th>User</th>

                        <th>Total</th>

                        <th>Date</th>

                        <th>PDF</th>

                        <th>Action</th>

                    </tr>

                </thead>

                <tbody>

                @forelse($quotations as $quotation)

                    <tr>

                        <td>{{ $quotation->id }}</td>

                        <td>
                            <strong>
                                {{ $quotation->quotation_number }}
                            </strong>
                        </td>

                        <td>
                            {{ $quotation->client->client_name ?? '-' }}
                        </td>

                        <td>
                            {{ $quotation->user->name ?? '-' }}
                        </td>

                        <td>
                            {{ number_format($quotation->total,2) }}
                        </td>

                        <td>
                            {{ $quotation->created_at->format('d M Y') }}
                        </td>

                        <td>

                            @if($quotation->pdf_path)

                                <a href="{{ asset('storage/'.$quotation->pdf_path) }}"
                                   target="_blank"
                                   class="btn btn-success btn-sm">

                                    <i class="fas fa-file-pdf"></i>

                                </a>

                            @else

                                <span class="badge bg-secondary">
                                    No PDF
                                </span>

                            @endif

                        </td>

                        <td>

                            <a href="{{ route('admin.quotations.show',$quotation->id) }}"
                               class="btn btn-primary btn-sm">

                                <i class="fas fa-eye"></i>

                            </a>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="8" class="text-center py-5">

                            No quotations found.

                        </td>

                    </tr>

                @endforelse

                </tbody>

            </table>

        </div>

        <div class="mt-4">

            {{ $quotations->withQueryString()->links('pagination::bootstrap-5') }}

        </div>

    </div>

</div>

@endsection