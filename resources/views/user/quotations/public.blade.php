<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>
        Quotation {{ $quotation->quotation_number }}
    </title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #f5f7fb;
        }

        .card {
            border: none;
            border-radius: 18px;
        }

        .table th {
            background: #f8f9fa;
        }

        .logo {
            max-height: 70px;
        }
    </style>

</head>

<body>

    <div class="container py-5">

        <div class="row justify-content-center">

            <div class="col-lg-10">

                <div class="card shadow">

                    <div class="card-body p-5">

                        <!-- Header -->

                        <div class="d-flex justify-content-between align-items-center mb-5">

                            <div>

                                @if ($setting?->company_logo)
                                    <img src="{{ asset('storage/' . $setting->company_logo) }}" class="logo mb-3">
                                @endif

                                <h3 class="fw-bold mb-1">

                                    {{ $setting->company_name }}

                                </h3>

                                <p class="text-muted mb-0">

                                    {{ $setting->company_email }}

                                </p>

                                <p class="text-muted">

                                    {{ $setting->company_phone }}

                                </p>

                            </div>


                            <div class="text-end">

                                <h2 class="fw-bold">

                                    QUOTATION

                                </h2>

                                <p>

                                    <strong>No:</strong>

                                    {{ $quotation->quotation_number }}

                                </p>

                                <p>

                                    <strong>Date:</strong>

                                    {{ \Carbon\Carbon::parse($quotation->date)->format('d M Y') }}

                                </p>

                            </div>

                        </div>

                        <hr>

                        <!-- Client -->

                        <div class="row mb-4">

                            <div class="col-md-6">

                                <h5>

                                    Bill To

                                </h5>

                                <strong>

                                    {{ $quotation->client->client_name }}

                                </strong>

                                <br>

                                {{ $quotation->client->email }}

                                <br>

                                {{ $quotation->client->phone_number }}

                            </div>

                            <div class="col-md-6 text-end">

                                @if ($quotation->expiry_date)
                                    <p>

                                        <strong>Valid Until:</strong>

                                        {{ \Carbon\Carbon::parse($quotation->expiry_date)->format('d M Y') }}

                                    </p>
                                @endif

                            </div>

                        </div>

                        <!-- Items -->

                        <div class="table-responsive">

                            <table class="table table-bordered">

                                <thead>

                                    <tr>

                                        <th>#</th>

                                        <th>Description</th>

                                        <th width="100">

                                            Qty

                                        </th>

                                        <th width="120">

                                            Price

                                        </th>

                                        <th width="120">

                                            Total

                                        </th>

                                    </tr>

                                </thead>

                                <tbody>

                                    @foreach ($quotation->items as $item)
                                        <tr>

                                            <td>

                                                {{ $loop->iteration }}

                                            </td>

                                            <td>

                                                {{ $item->service->service_name }}

                                            </td>

                                            <td>

                                                {{ $item->quantity }}

                                            </td>

                                            <td>

                                                {{ number_format($item->unit_price, 2) }}

                                            </td>

                                            <td>

                                                {{ number_format($item->total, 2) }}

                                            </td>

                                        </tr>
                                    @endforeach

                                </tbody>

                            </table>

                        </div>

                        <!-- Totals -->

                        <div class="row justify-content-end mt-4">

                            <div class="col-md-5">

                                <table class="table">

                                    <tr>

                                        <th>

                                            Subtotal

                                        </th>

                                        <td class="text-end">

                                            {{ number_format($quotation->subtotal, 2) }}

                                        </td>

                                    </tr>

                                    <tr>

                                        <th>

                                            VAT

                                        </th>

                                        <td class="text-end">

                                            {{ number_format($quotation->vat, 2) }}

                                        </td>

                                    </tr>

                                    <tr class="table-primary">

                                        <th>

                                            Grand Total

                                        </th>

                                        <td class="text-end fw-bold">

                                            {{ number_format($quotation->total, 2) }}

                                            {{ $setting->currency_symbol }}

                                        </td>

                                    </tr>

                                </table>

                            </div>

                        </div>

                        <!-- Notes -->

                        @if ($quotation->notes)
                            <div class="mt-5">

                                <h5>

                                    Notes

                                </h5>

                                <p>

                                    {{ $quotation->notes }}

                                </p>

                            </div>
                        @endif

                        <!-- Terms -->

                        @if ($quotation->terms)
                            <div class="mt-4">

                                <h5>

                                    Terms & Conditions

                                </h5>

                                <p>

                                    {{ $quotation->terms }}

                                </p>

                            </div>
                        @endif

                        <hr>

                        <!-- Buttons -->

                        <div class="text-center mt-5">

                            <a href="{{ route('quotation.download',$quotation) }}" target="_blank"
                                class="btn btn-danger px-4">

                                Download PDF

                            </a>

                            {{-- <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $setting->company_phone) }}"
                                class="btn btn-success px-4">

                                Contact Us

                            </a> --}}

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</body>

</html>
