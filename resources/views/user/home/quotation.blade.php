@extends('user.home.partials..app')


@section('title','Quotation')

@section('content')

<div class="container py-5">

    <div class="card shadow border-0 rounded-4">

        <div class="card-body p-5">

            {{-- Header --}}
            <div class="row align-items-center mb-5">

                <div class="col-md-8">

                    @php
                        $company = $quotation->user->companyProfile;
                    @endphp

                    @if($company?->logo)
                        <img src="{{ asset('storage/'.$company->logo) }}"
                             style="max-height:80px"
                             class="mb-3">
                    @endif

                    <h3 class="fw-bold mb-1">
                        {{ $company->company_name ?? $quotation->user->company }}
                    </h3>

                    <p class="text-muted mb-0">
                        {{ $company->address }}
                    </p>

                    <p class="text-muted mb-0">
                        {{ $company->phone_number }}
                    </p>

                    <p class="text-muted">
                        {{ $company->email }}
                    </p>

                </div>

                <div class="col-md-4 text-md-end">

                    <h2 class="fw-bold">
                        QUOTATION
                    </h2>

                    <p class="mb-1">
                        <strong>No:</strong>
                        {{ $quotation->quotation_number }}
                    </p>

                    <p>
                        <strong>Date:</strong>
                        {{ \Carbon\Carbon::parse($quotation->date)->format('d M Y') }}
                    </p>

                </div>

            </div>

            {{-- Client --}}
            <div class="row mb-5">

                <div class="col-md-6">

                    <div class="border rounded-3 p-4 h-100">

                        <h5 class="fw-bold mb-3">
                            Bill To
                        </h5>

                        <strong>
                            {{ $quotation->client->client_name }}
                        </strong>

                        <br>

                        {{ $quotation->client->address }}

                        <br>

                        {{ $quotation->client->phone_number }}

                        <br>

                        {{ $quotation->client->email }}

                    </div>

                </div>

                <div class="col-md-6">

                    <div class="border rounded-3 p-4 h-100">

                        <h5 class="fw-bold mb-3">
                            Summary
                        </h5>

                        <table class="table table-borderless mb-0">

                            <tr>

                                <td>Subtotal</td>

                                <td class="text-end">
                                    AED {{ number_format($quotation->subtotal,2) }}
                                </td>

                            </tr>

                            <tr>

                                <td>VAT</td>

                                <td class="text-end">
                                    AED {{ number_format($quotation->vat,2) }}
                                </td>

                            </tr>

                            <tr class="fw-bold fs-5">

                                <td>Total</td>

                                <td class="text-end text-success">
                                    AED {{ number_format($quotation->total,2) }}
                                </td>

                            </tr>

                        </table>

                    </div>

                </div>

            </div>

            {{-- Items --}}

            <h4 class="fw-bold mb-3">
                Services
            </h4>

            <div class="table-responsive">

                <table class="table table-bordered align-middle">

                    <thead class="table-light">

                    <tr>

                        <th>Service</th>

                        <th width="120">Qty</th>

                        <th width="180">Unit Price</th>

                        <th width="180">Amount</th>

                    </tr>

                    </thead>

                    <tbody>

                    @foreach($quotation->items as $item)

                        <tr>

                            <td>

                                {{ $item->service->service_name }}

                            </td>

                            <td>

                                {{ $item->quantity }}

                            </td>

                            <td>

                                AED {{ number_format($item->unit_price,2) }}

                            </td>

                            <td>

                                AED {{ number_format($item->total,2) }}

                            </td>

                        </tr>

                    @endforeach

                    </tbody>

                </table>

            </div>

            {{-- Notes --}}

            @if($quotation->notes)

                <div class="mt-5">

                    <h5 class="fw-bold">
                        Notes
                    </h5>

                    <div class="border rounded-3 p-3 bg-light">

                        {{ $quotation->notes }}

                    </div>

                </div>

            @endif

            {{-- Terms --}}

            @if($company?->default_terms)

                <div class="mt-4">

                    <h5 class="fw-bold">
                        Terms & Conditions
                    </h5>

                    <div class="border rounded-3 p-3 bg-light">

                        {{ $company->default_terms }}

                    </div>

                </div>

            @endif

            {{-- Buttons --}}

            <div class="text-center mt-5">

                <a href="{{ route('quotation.download',$quotation->quotation_number) }}"
                   class="btn btn-success px-4">

                    <i class="fas fa-download me-2"></i>

                    Download PDF

                </a>

                <button onclick="window.print()"
                        class="btn btn-dark px-4 ms-2">

                    <i class="fas fa-print me-2"></i>

                    Print

                </button>

            </div>

        </div>

    </div>

</div>

@endsection