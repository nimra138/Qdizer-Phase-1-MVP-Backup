@extends('user.partials.app')

@section('title', 'Quotation Details')

@section('content')

<div class="container-fluid py-4">

    {{-- HEADER --}}
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h3 class="mb-0">
                {{ $quotation->quotation_number }}
            </h3>
            <small class="text-muted">
                Date: {{ $quotation->date }}
            </small>
        </div>

        <div class="d-flex gap-2">

            {{-- PDF --}}
            <a href="#"
               class="btn btn-primary rounded-3">
                Download PDF
            </a>

            {{-- PRINT --}}
            <button onclick="window.print()"
                    class="btn btn-light border rounded-3">
                Print
            </button>

        </div>

    </div>

    <div class="row g-4">

        {{-- LEFT: CLIENT INFO --}}
        <div class="col-md-4">

            <div class="card border-0 shadow-sm rounded-4">

                <div class="card-body">

                    <h5 class="mb-3">Client Information</h5>

                    <div class="mb-2">
                        <small class="text-muted">Name</small>
                        <div class="fw-bold">
                            {{ $quotation->client->client_name }}
                        </div>
                    </div>

                    <div class="mb-2">
                        <small class="text-muted">Phone</small>
                        <div>
                            {{ $quotation->client->phone_number }}
                        </div>
                    </div>

                    @if($quotation->client->email)
                    <div class="mb-2">
                        <small class="text-muted">Email</small>
                        <div>
                            {{ $quotation->client->email }}
                        </div>
                    </div>
                    @endif

                    @if($quotation->client->address)
                    <div class="mb-2">
                        <small class="text-muted">Address</small>
                        <div>
                            {{ $quotation->client->address }}
                        </div>
                    </div>
                    @endif

                </div>

            </div>

        </div>

        {{-- RIGHT: QUOTATION ITEMS --}}
        <div class="col-md-8">

            <div class="card border-0 shadow-sm rounded-4">

                <div class="card-body">

                    <h5 class="mb-3">Quotation Items</h5>

                    <div class="table-responsive">

                        <table class="table align-middle">

                            <thead class="table-light">
                                <tr>
                                    <th>Service</th>
                                    <th>Unit Price</th>
                                    <th>Qty</th>
                                    <th>Total</th>
                                </tr>
                            </thead>

                            <tbody>

                                @foreach($quotation->items as $item)

                                <tr>

                                    <td>
                                        {{ $item->service->service_name }}
                                    </td>

                                    <td>
                                        {{ number_format($item->unit_price, 2) }}
                                    </td>

                                    <td>
                                        {{ $item->quantity }}
                                    </td>

                                    <td>
                                        <strong>
                                            {{ number_format($item->total, 2) }}
                                        </strong>
                                    </td>

                                </tr>

                                @endforeach

                            </tbody>

                        </table>

                    </div>

                    {{-- TOTAL SECTION --}}
                    <hr>

                    <div class="row">

                        <div class="col-md-6">

                            @if($quotation->notes)
                            <div class="mt-2">
                                <h6>Notes</h6>
                                <p class="text-muted">
                                    {{ $quotation->notes }}
                                </p>
                            </div>
                            @endif

                        </div>

                        <div class="col-md-6 text-end">

                            <div class="mb-1">
                                Subtotal:
                                <strong>
                                    {{ number_format($quotation->subtotal, 2) }}
                                </strong>
                            </div>

                            <div class="mb-1">
                                VAT:
                                <strong>
                                    {{ number_format($quotation->vat, 2) }}
                                </strong>
                            </div>

                            <div class="fs-5">
                                Total:
                                <strong class="text-primary">
                                    {{ number_format($quotation->total, 2) }}
                                </strong>
                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection