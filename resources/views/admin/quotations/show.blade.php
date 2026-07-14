@extends('admin.layouts.layout')

@section('title','Quotation Details')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h3 class="fw-bold mb-1">Quotation Details</h3>
            <p class="text-muted mb-0">
                View complete quotation information.
            </p>
        </div>

        <div>

            @if($quotation->pdf_path)
                <a href="{{ asset('storage/'.$quotation->pdf_path) }}"
                   target="_blank"
                   class="btn btn-success">
                    <i class="fas fa-file-pdf me-2"></i>Download PDF
                </a>
            @endif

            <a href="{{ route('admin.quotations') }}"
               class="btn btn-secondary">
                <i class="fas fa-arrow-left me-2"></i>Back
            </a>

        </div>

    </div>

    <div class="row">

        <!-- LEFT -->

        <div class="col-lg-4">

            <div class="card border-0 shadow-sm mb-4">

                <div class="card-header bg-whie">
                    <h5 class="mb-0">
                        Quotation Information
                    </h5>
                </div>

                <div class="card-body">

                    <table class="table table-borderless">

                        <tr>
                            <th width="40%">Quotation #</th>
                            <td>{{ $quotation->quotation_number }}</td>
                        </tr>

                        <tr>
                            <th>Date</th>
                            <td>{{ \Carbon\Carbon::parse($quotation->date)->format('d M Y') }}</td>
                        </tr>

                        <tr>
                            <th>Template</th>
                            <td>{{ ucfirst($quotation->template) }}</td>
                        </tr>

                        <tr>
                            <th>Created By</th>
                            <td>{{ $quotation->user->name }}</td>
                        </tr>

                        <tr>
                            <th>Email</th>
                            <td>{{ $quotation->user->email }}</td>
                        </tr>

                        <tr>
                            <th>Created</th>
                            <td>{{ $quotation->created_at->diffForHumans() }}</td>
                        </tr>

                    </table>

                </div>

            </div>

            <div class="card border-0 shadow-sm">

                <div class="card-header bg-wite">

                    <h5 class="mb-0">
                        Client Information
                    </h5>

                </div>

                <div class="card-body">

                    <table class="table table-borderless">

                        <tr>
                            <th>Name</th>
                            <td>{{ $quotation->client->client_name }}</td>
                        </tr>

                        {{-- <tr>
                            <th>Company</th>
                            <td>{{ $quotation->client->company }}</td>
                        </tr> --}}

                        <tr>
                            <th>Email</th>
                            <td>{{ $quotation->client->email }}</td>
                        </tr>

                        <tr>
                            <th>Phone</th>
                            <td>{{ $quotation->client->phone_number }}</td>
                        </tr>

                        <tr>
                            <th>Address</th>
                            <td>{{ $quotation->client->address }}</td>
                        </tr>

                    </table>

                </div>

            </div>

        </div>

        <!-- RIGHT -->

        <div class="col-lg-8">

            <div class="card border-0 shadow-sm mb-4">

                <div class="card-header bg-whte">

                    <h5 class="mb-0">
                        Quotation Items
                    </h5>

                </div>

                <div class="table-responsive">

                    <table class="table table-hover mb-0">

                        <thead class="table-liht">

                            <tr>

                                <th>#</th>

                                <th>Service</th>

                                <th width="120">Qty</th>

                                <th width="150">Price</th>

                                <th width="150">Total</th>

                            </tr>

                        </thead>

                        <tbody>

                        @forelse($quotation->items as $item)

                            <tr>

                                <td>{{ $loop->iteration }}</td>

                                <td>{{ $item->service->service_name ?? '-' }}</td>

                                <td>{{ $item->quantity }}</td>

                                <td>{{ number_format($item->unit_price,2) }}</td>

                                <td>{{ number_format($item->total,2) }}</td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="5" class="text-center">

                                    No items found.

                                </td>

                            </tr>

                        @endforelse

                        </tbody>

                    </table>

                </div>

            </div>

            <div class="row">

                <div class="col-lg-6">

                    <div class="card border-0 shadow-sm">

                        <div class="card-header bgwhite">

                            <h5 class="mb-0">
                                Notes
                            </h5>

                        </div>

                        <div class="card-body">

                            {{ $quotation->notes ?: 'No notes available.' }}

                        </div>

                    </div>

                </div>

                <div class="col-lg-6">

                    <div class="card border-0 shadow-sm">

                        <div class="card-header bg-whie">

                            <h5 class="mb-0">
                                Summary
                            </h5>

                        </div>

                        <div class="card-body">

                            <table class="table table-borderless">

                                <tr>
                                    <th>Subtotal</th>
                                    <td class="text-end">
                                        {{ number_format($quotation->subtotal,2) }}
                                    </td>
                                </tr>

                                <tr>
                                    <th>VAT</th>
                                    <td class="text-end">
                                        {{ number_format($quotation->vat,2) }}
                                    </td>
                                </tr>

                                <tr>
                                    <th>Total</th>
                                    <td class="text-end fw-bold fs-5 text-primary">
                                        {{ number_format($quotation->total,2) }}
                                    </td>
                                </tr>

                            </table>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection