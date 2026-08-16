<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">

    <title>
        Invoice {{ $quotation->quotation_number ?? '' }}
    </title>

    <style>

        @page {
            size: A4;
            margin: 0;
        }

        * {
            box-sizing: border-box;
        }

        html,
        body {
            margin: 0;
            padding: 0;
        }

        body {
            -webkit-print-color-adjust: exact;
            print-color-adjust: exact;
            background: #edf2f3;
            font-family: Arial, sans-serif;
            color: #101820;
            padding: 24px;
        }

        @media print {

            body {
                background: #fff !important;
            }

            .sheet {
                margin: 0 !important;
                box-shadow: none !important;
            }

        }


        /* ==============================
           PAGE
        ============================== */

        .sheet {
                /* width: 210mm;
                min-height: 297mm; */
            margin: auto;
            background: #fff;
            position: relative;

            padding: 18mm 17mm 15mm;
        }


        /* ==============================
           TOP
        ============================== */

        .top-table {
            width: 100%;
        }

        .brand-cell {
            width: 60%;
            vertical-align: top;
        }

        .invoice-cell {
            width: 40%;
            vertical-align: top;
            text-align: right;
        }


        /* ==============================
           LOGO
        ============================== */

        .logo-mark {
            width: 38px;
            height: 38px;
            background: #0b455b;
            color: #fff;

            text-align: center;
            font-weight: 900;
            font-size: 18px;

            line-height: 38px;

            border-radius: 11px;

            display: inline-block;
            vertical-align: middle;

            margin-right: 8px;
        }

        .brand-content {
            display: inline-block;
            vertical-align: middle;
        }

        .brand-content h1 {
            margin: 0;
            font-size: 19px;
        }

        .brand-content p {
            margin: 3px 0 0;

            font-size: 8px;
            color: #74808a;
        }


        /* ==============================
           INVOICE TITLE
        ============================== */

        .invoice h2 {
            margin: 0;

            font-size: 35px;

            letter-spacing: -1px;
        }

        .invoice small {
            color: #74808a;

            letter-spacing: 1px;
        }


        /* ==============================
           RULE
        ============================== */

        .rule {
            height: 1px;

            background: #e4e9ec;

            margin: 14mm 0 8mm;
        }


        /* ==============================
           META
        ============================== */

        .meta-table {
            width: 100%;
        }

        .meta-column {
            vertical-align: top;
        }

        .meta-column.one {
            width: 45%;
        }

        .meta-column.two {
            width: 27%;
        }

        .meta-column.three {
            width: 28%;
        }

        .label {
            font-size: 7px;

            letter-spacing: 1px;

            text-transform: uppercase;

            color: #74808a;

            font-weight: 800;
        }

        .value {
            font-size: 10px;

            line-height: 1.55;

            margin-top: 5px;
        }


        /* ==============================
           AMOUNT
        ============================== */

        .amount {
            margin: 13mm 0 7mm;

            text-align: right;
        }

        .amount-box {
            width: 70mm;

            border: 1px solid #e4e9ec;

            border-radius: 15px;

            padding: 15px;

            display: inline-block;

            text-align: left;
        }

        .amount-box small {
            font-size: 7px;

            color: #74808a;

            letter-spacing: 1px;
        }

        .amount-box strong {
            display: block;

            font-size: 27px;

            margin-top: 6px;
        }


        /* ==============================
           ITEMS
        ============================== */

        table {
            width: 100%;
            border-collapse: collapse;
        }

        .items-table th {
            font-size: 7px;

            letter-spacing: 1px;

            text-transform: uppercase;

            color: #74808a;

            padding: 10px 6px;

            border-bottom: 1px solid #101820;
        }

        .items-table td {
            font-size: 9px;

            padding: 13px 6px;

            border-bottom: 1px solid #e4e9ec;
        }

        .items-table th:first-child,
        .items-table td:first-child {
            text-align: left;
        }

        .items-table th:not(:first-child),
        .items-table td:not(:first-child) {
            text-align: right;
        }


        /* ==============================
           DESCRIPTION
        ============================== */

        .desc b {
            display: block;

            font-size: 10px;
        }

        .desc span {
            font-size: 7px;

            color: #74808a;
        }


        /* ==============================
           BOTTOM
        ============================== */

        .bottom-table {
            margin-top: 11mm;
        }

        .note-cell {
            width: 60%;

            vertical-align: top;

            padding-right: 16mm;
        }

        .totals-cell {
            width: 40%;

            vertical-align: top;
        }


        /* ==============================
           NOTE
        ============================== */

        .note {
            font-size: 8px;

            color: #74808a;

            line-height: 1.6;
        }

        .note-title {
            color: #101820;

            font-weight: bold;
        }


        /* ==============================
           TOTALS
        ============================== */

        .totals-table {
            width: 100%;
        }

        .totals-table td {
            border: 0;

            padding: 6px 0;

            font-size: 9px;
        }

        .total-label {
            text-align: left;
        }

        .total-value {
            text-align: right;
            font-weight: bold;
        }

        .grand td {
            border-top: 1px solid #101820;

            padding-top: 11px;

            font-size: 16px;

            font-weight: 900;
        }


        /* ==============================
           FOOTER
        ============================== */

        footer {
            position: absolute;

            left: 17mm;
            right: 17mm;
            bottom: 10mm;

            border-top: 1px solid #e4e9ec;

            padding-top: 7px;

            font-size: 7px;

            color: #74808a;
        }

        .footer-left {
            text-align: left;
        }

        .footer-right {
            text-align: right;
        }

    </style>

</head>


<body>


@php

    $company = $quotation->user->companyProfile ?? null;

    $companyName =
        $company?->company_name
        ?? $quotation->user?->company
        ?? 'Your Company';

    $companyEmail =
        $company?->email
        ?? $quotation->user?->email
        ?? '';

    $companyPhone =
        $company?->phone_number
        ?? $quotation->user?->phone
        ?? '';

    $companyAddress =
        $company?->address
        ?? '';

    $currency =
        $quotation->currency
        ?? 'AED';

@endphp


<section class="sheet">


    <!-- ==========================================
         TOP HEADER
    =========================================== -->

    <table class="top-table">

        <tr>


            <!-- COMPANY -->

            <td class="brand-cell">

                <span class="logo-mark">
                    Q
                </span>

                <span class="brand-content">

                    <h1>
                        {{ $companyName }}
                    </h1>

                    <p>

                        @if(!empty($company?->tagline))

                            {{ $company->tagline }}

                        @elseif(!empty($companyAddress))

                            {{ $companyAddress }}

                        @else

                            Professional Services

                        @endif

                    </p>

                </span>

            </td>


            <!-- INVOICE -->

            <td class="invoice-cell">

                <div class="invoice">

                    <h2>
                        Invoice
                    </h2>

                    <small>

                        {{ $quotation->quotation_number ?? '' }}

                    </small>

                </div>

            </td>

        </tr>

    </table>


    <div class="rule"></div>


    <!-- ==========================================
         META
    =========================================== -->

    <table class="meta-table">

        <tr>


            <!-- BILL TO -->

            <td class="meta-column one">

                <div class="label">
                    Bill to
                </div>

                <div class="value">

                    <b>
                        {{ $quotation->client?->client_name ?? '' }}
                    </b>


                    @if(!empty($quotation->client?->address))

                        <br>

                        {{ $quotation->client->address }}

                    @endif


                    @if(!empty($quotation->client?->phone_number))

                        <br>

                        {{ $quotation->client->phone_number }}

                    @endif


                    @if(!empty($quotation->client?->email))

                        <br>

                        {{ $quotation->client->email }}

                    @endif

                </div>

            </td>


            <!-- DATE -->

            <td class="meta-column two">

                <div class="label">
                    Issued
                </div>

                <div class="value">

                    {{ \Carbon\Carbon::parse($quotation->date)->format('d M Y') }}

                </div>


                <div
                    class="label"
                    style="margin-top:10px;"
                >
                    Due
                </div>

                <div class="value">

                  

                        {{ \Carbon\Carbon::parse($quotation->created_at)->addDays(7)->format('d M Y') }}


                </div>

            </td>


            <!-- PAYMENT -->

            <td class="meta-column three">

                <div class="label">
                    Payment
                </div>

                <div class="value">

                    Bank transfer

                    @if(!empty($company?->trn))

                        <br>

                        TRN {{ $company->trn }}

                    @endif

                </div>

            </td>

        </tr>

    </table>


    <!-- ==========================================
         AMOUNT DUE
    =========================================== -->

    <div class="amount">

        <div class="amount-box">

            <small>
                AMOUNT DUE
            </small>

            <strong>

                {{ $currency }}
                {{ number_format((float)$quotation->total, 2) }}

            </strong>

        </div>

    </div>


    <!-- ==========================================
         ITEMS
    =========================================== -->

    <table class="items-table">

        <thead>

            <tr>

                <th style="width:43%;">
                    Description
                </th>

                <th style="width:10%;">
                    Qty
                </th>

                <th style="width:16%;">
                    Rate
                </th>

                <th style="width:13%;">
                    VAT
                </th>

                <th style="width:18%;">
                    Amount
                </th>

            </tr>

        </thead>


        <tbody>

            @forelse($quotation->items as $item)

                @php

                    $itemSubtotal =
                        (float)$item->quantity *
                        (float)$item->unit_price;

                    /*
                     * Display VAT proportionally per item.
                     * The actual quotation VAT remains
                     * quotation-level data.
                     */

                    $itemVatRate = 0;

                    if (
                        $quotation->subtotal > 0 &&
                        $quotation->vat > 0
                    ) {
                        $itemVatRate =
                            (
                                $quotation->vat /
                                $quotation->subtotal
                            ) * 100;
                    }

                @endphp


                <tr>


                    <!-- DESCRIPTION -->

                    <td class="desc">

                        <b>

                            {{ $item->service?->service_name ?? 'Service' }}

                        </b>


                        @if(!empty($item->description))

                            <span>

                                {{ $item->description }}

                            </span>

                        @endif

                    </td>


                    <!-- QTY -->

                    <td>

                        {{ $item->quantity }}

                    </td>


                    <!-- RATE -->

                    <td>

                        {{ $currency }}
                        {{ number_format((float)$item->unit_price, 2) }}

                    </td>


                    <!-- VAT -->

                    <td>

                        {{ number_format($itemVatRate, 0) }}%

                    </td>


                    <!-- AMOUNT -->

                    <td>

                        {{ $currency }}
                        {{ number_format((float)$item->total, 2) }}

                    </td>

                </tr>


            @empty

                <tr>

                    <td
                        colspan="5"
                        style="text-align:center;padding:20px;color:#74808a;"
                    >

                        No services added.

                    </td>

                </tr>

            @endforelse

        </tbody>

    </table>


    <!-- ==========================================
         BOTTOM
    =========================================== -->

    <table class="bottom-table">

        <tr>


            <!-- PAYMENT TERMS -->

            <td class="note-cell">

                <div class="note">

                    <span class="note-title">
                        Payment terms
                    </span>

                    <br>


                    @if(!empty($quotation->notes))

                        {!! nl2br(e($quotation->notes)) !!}

                    @elseif(!empty($company?->default_terms))

                        {!! nl2br(e($company->default_terms)) !!}

                    @else

                        Payment is due according to the agreed
                        quotation terms.

                    @endif

                </div>

            </td>


            <!-- TOTALS -->

            <td class="totals-cell">

                <table class="totals-table">


                    <!-- SUBTOTAL -->

                    <tr>

                        <td class="total-label">

                            Subtotal

                        </td>

                        <td class="total-value">

                            {{ $currency }}
                            {{ number_format((float)$quotation->subtotal, 2) }}

                        </td>

                    </tr>


                    <!-- VAT -->

                    <tr>

                        <td class="total-label">

                            VAT

                            @if(
                                $quotation->subtotal > 0 &&
                                $quotation->vat > 0
                            )

                                {{ number_format(
                                    (
                                        $quotation->vat /
                                        $quotation->subtotal
                                    ) * 100,
                                    0
                                ) }}%

                            @endif

                        </td>

                        <td class="total-value">

                            {{ $currency }}
                            {{ number_format((float)$quotation->vat, 2) }}

                        </td>

                    </tr>


                    <!-- DISCOUNT -->

                    @if(!empty($quotation->discount))

                        <tr>

                            <td class="total-label">

                                Discount

                            </td>

                            <td class="total-value">

                                - {{ $currency }}
                                {{ number_format((float)$quotation->discount, 2) }}

                            </td>

                        </tr>

                    @endif


                    <!-- TOTAL -->

                    <tr class="grand">

                        <td>

                            Total

                        </td>

                        <td style="text-align:right;">

                            {{ $currency }}
                            {{ number_format((float)$quotation->total, 2) }}

                        </td>

                    </tr>


                </table>

            </td>

        </tr>

    </table>


    <!-- ==========================================
         FOOTER
    =========================================== -->

    <footer>

        <table>

            <tr>

                <td
                    class="footer-left"
                    style="
                        border:0;
                        padding:0;
                        font-size:7px;
                        color:#74808a;
                    "
                >

                    {{ $companyEmail }}

                </td>


                <td
                    class="footer-right"
                    style="
                        border:0;
                        padding:0;
                        font-size:7px;
                        color:#74808a;
                    "
                >

                    Generated with QDizer

                </td>

            </tr>

        </table>

    </footer>


</section>

</body>

</html>