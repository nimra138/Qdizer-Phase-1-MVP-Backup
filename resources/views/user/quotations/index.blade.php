@extends('user.partials.app')

@section('title', 'Quotations')

@section('content')

<!-- HEADER -->
<div class="d-flex justify-content-between align-items-center mb-4">

    <div>
        <h4 class="mb-1" style="color: var(--primary);">Quotations</h4>
        <small class="text-muted">Manage all your client quotations</small>
    </div>

    <a href="{{ route('quotations.create') }}"
       class="btn btn-accent d-flex align-items-center gap-2 px-3 py-2">

        <i class="fas fa-plus"></i>
        Create Quotation

    </a>

</div>

<!-- STATS -->
<div class="row g-3 mb-4">

    <div class="col-md-4">
        <div class="card-ui p-3">
            <div class="text-muted">Total Quotations</div>
            <h4 class="mb-0" style="color: var(--primary);">
                {{ $quotations->total() }}
            </h4>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card-ui p-3">
            <div class="text-muted">This Page</div>
            <h4 class="mb-0" style="color: var(--primary);">
                {{ $quotations->count() }}
            </h4>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card-ui p-3">
            <div class="text-muted">Latest ID</div>
            <h4 class="mb-0" style="color: var(--primary);">
                {{ optional($quotations->first())->quotation_number ?? 'N/A' }}
            </h4>
        </div>
    </div>

</div>

<!-- TABLE CARD -->
<div class="card-ui">

    @if($quotations->count() > 0)

    <div class="table-responsive">

        <table class="table align-middle mb-0">

            <thead style="background: rgba(14,34,46,.04);">
                <tr>
                    <th>#</th>
                    <th>Quotation</th>
                    <th>Client</th>
                    <th>Date</th>
                    <th>Subtotal</th>
                    <th>VAT</th>
                    <th>Total</th>
                    <th>Status</th>
                    <th class="text-end">Actions</th>
                </tr>
            </thead>

            <tbody>

                @foreach($quotations as $quotation)

                <tr>

                    <td>{{ $loop->iteration }}</td>

                    <td>
                        <strong style="color: var(--primary);">
                            {{ $quotation->quotation_number }}
                        </strong>
                    </td>

                    <td>
                        {{ $quotation->client->client_name ?? 'N/A' }}
                        <br>
                        <small class="text-muted">
                            {{ $quotation->client->phone_number ?? '' }}
                        </small>
                    </td>

                    <td class="text-muted">
                        {{ $quotation->date }}
                    </td>

                    <td>
                        {{ number_format($quotation->subtotal, 2) }}
                    </td>

                    <td>
                        {{ number_format($quotation->vat, 2) }}
                    </td>

                    <td>
                        <strong style="color: var(--primary);">
                            {{ number_format($quotation->total, 2) }}
                        </strong>
                    </td>

                    <td>
                        <span class="badge bg-success">
                            Active
                        </span>
                    </td>

                    <!-- ACTIONS -->
                    <td class="text-end d-flex justify-content-end gap-2">

                        <a href="{{ route('quotations.show', $quotation->id) }}"
                           class="btn btn-sm"
                           style="background: var(--secondary); color:#fff; border-radius:10px;">
                            <i class="fas fa-eye"></i>
                        </a>

                        <a href="{{ route('quotations.edit', $quotation->id) }}"
                           class="btn btn-sm"
                           style="background: var(--primary); color:#fff; border-radius:10px;">
                            <i class="fas fa-pen"></i>
                        </a>

                        <a href="{{ route('quotations.template', $quotation->id) }}"
                           target="_blank"
                           class="btn btn-sm btn-accent">
                            <i class="fas fa-file-pdf"></i>
                        </a>

                        <form action="{{ route('quotations.destroy', $quotation->id) }}"
                              method="POST">

                            @csrf
                            @method('DELETE')

                            <button class="btn btn-sm"
                                    onclick="return confirm('Delete this quotation?')"
                                    style="background:#ef4444; color:#fff; border-radius:10px;">
                                <i class="fas fa-trash"></i>
                            </button>

                        </form>

                    </td>

                </tr>

                @endforeach

            </tbody>

        </table>

    </div>

    @else

    <!-- EMPTY STATE -->
    <div class="text-center py-5">

        <h5 class="text-muted">No Quotations Found</h5>
        <p class="text-muted">Start by creating your first quotation.</p>

        <a href="{{ route('quotations.create') }}"
           class="btn btn-accent px-4">
            <i class="fas fa-plus"></i>
            Create Quotation
        </a>

    </div>

    @endif

</div>

<!-- PAGINATION -->
@if($quotations->hasPages())
<div class="mt-3">
    {{ $quotations->links() }}
</div>
@endif

@endsection