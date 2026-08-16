<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">

    <title>
        Quotation {{ $quotation->quotation_number ?? '' }}
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
            font-family: DejaVu Sans, Arial, sans-serif;
            color: #1b2730;
            background: #ffffff;
            font-size: 9px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        /* =========================
           PAGE
        ========================= */

        .sheet {
            width: 210mm;
            min-height: 297mm;
            background: #ffffff;
            position: relative;
        }

        /* =========================
           HEADER
        ========================= */

        .header {
            background: #0c3546;
            color: #ffffff;
            padding: 15mm 17mm 12mm 17mm;
            border-bottom: 5px solid #d39418;
        }

        .brand-table {
            width: 100%;
        }

        .brand-left {
            width: 60%;
            vertical-align: top;
        }

        .brand-right {
            width: 40%;
            vertical-align: top;
            text-align: right;
        }

        .company-logo {
            max-width: 150px;
            max-height: 50px;
            margin-bottom: 7px;
        }

        .company-name {
            margin: 0;
            font-size: 23px;
            font-weight: bold;
            color: #ffffff;
        }

        .tagline {
            margin-top: 5px;
            color: #c9dce2;
            font-size: 8px;
            letter-spacing: 1px;
        }

        .document-title {
            margin: 0;
            font-size: 28px;
            font-weight: bold;
            color: #ffffff;
        }

        .document-number {
            margin-top: 6px;
            color: #d8e5e9;
            font-size: 9px;
        }

        /* =========================
           HEADER META
        ========================= */

        .meta-table {
            margin-top: 28px;
        }

        .meta-cell {
            width: 33.33%;
            vertical-align: top;
        }

        .meta-label {
            display: block;
            color: #a8c4ce;
            font-size: 7px;
            letter-spacing: 1px;
            margin-bottom: 4px;
        }

        .meta-value {
            color: #ffffff;
            font-size: 10px;
            font-weight: bold;
        }

        /* =========================
           CONTENT
        ========================= */

        .content {
            padding: 13mm 17mm 30mm 17mm;
        }

        /* =========================
           CLIENT
        ========================= */

        .client-table {
            margin-bottom: 10mm;
        }

        .client-box {
            width: 68%;
            background: #f6f8f8;
            border-left: 4px solid #d39418;
            padding: 15px;
            vertical-align: top;
        }

        .status-box {
            width: 32%;
            vertical-align: middle;
            text-align: center;
            padding-left: 15px;
        }

        .client-label {
            color: #687780;
            font-size: 7px;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .client-name {
            margin-top: 5px;
            font-size: 11px;
            font-weight: bold;
            color: #1b2730;
        }

        .client-details {
            margin-top: 5px;
            font-size: 9px;
            line-height: 1.6;
            color: #687780;
        }

        .status {
            border: 1px solid #b9dec8;
            background: #edf8f1;
            color: #1f8050;
            padding: 12px 8px;
            border-radius: 12px;
            font-size: 8px;
            font-weight: bold;
        }

        /* =========================
           ITEMS TABLE
        ========================= */

        .items-table {
            width: 100%;
            border-collapse: collapse;
        }

        .items-table th {
            background: #0c3546;
            color: #ffffff;
            padding: 10px 8px;
            font-size: 7px;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: .7px;
        }

        .items-table td {
            padding: 11px 8px;
            font-size: 9px;
            border-bottom: 1px solid #dce5e8;
            vertical-align: top;
        }

        .items-table tr:nth-child(even) td {
            background: #fafbfb;
        }

        .service-column {
            width: 46%;
            text-align: left;
        }

        .qty-column {
            width: 10%;
            text-align: right;
        }

        .price-column {
            width: 20%;
            text-align: right;
        }

        .total-column {
            width: 24%;
            text-align: right;
        }

        .service-name {
            font-size: 10px;
            font-weight: bold;
            color: #1b2730;
        }

        .service-description {
            display: block;
            margin-top: 3px;
            font-size: 7px;
            color: #687780;
            line-height: 1.4;
        }

        .number {
            text-align: right;
            white-space: nowrap;
        }

        /* =========================
           SUMMARY
        ========================= */

        .summary-table {
            margin-top: 11mm;
        }

        .terms-cell {
            width: 58%;
            vertical-align: top;
            padding-right: 14mm;
        }

        .totals-cell {
            width: 42%;
            vertical-align: top;
        }

        .terms-box {
            border: 1px solid #dce5e8;
            padding: 15px;
            color: #687780;
            font-size: 8px;
            line-height: 1.6;
        }

        .terms-title {
            color: #1b2730;
            font-weight: bold;
            font-size: 9px;
            margin-bottom: 7px;
        }

        .total-card {
            background: #0c3546;
            color: #ffffff;
            padding: 15px;
        }

        .total-row {
            width: 100%;
            padding: 5px 0;
        }

        .total-label {
            color: #d4e3e8;
            font-size: 9px;
            text-align: left;
        }

        .total-value {
            color: #d4e3e8;
            font-size: 9px;
            font-weight: bold;
            text-align: right;
        }

        .grand-row {
            border-top: 1px solid #55717c;
            margin-top: 6px;
            padding-top: 12px;
        }

        .grand-label {
            color: #ffffff;
            font-size: 15px;
            font-weight: bold;
        }

        .grand-value {
            color: #ffffff;
            font-size: 15px;
            font-weight: bold;
            text-align: right;
        }

        /* =========================
           PAYMENT / CONTACT
        ========================= */

        .bottom-table {
            margin-top: 10mm;
        }

        .bottom-cell {
            width: 50%;
            vertical-align: top;
            padding-right: 10px;
        }

        .bottom-cell:last-child {
            padding-left: 10px;
            padding-right: 0;
        }

        .bottom-box {
            border-top: 2px solid #d39418;
            padding-top: 10px;
            color: #687780;
            font-size: 8px;
            line-height: 1.7;
        }

        .bottom-title {
            color: #1b2730;
            font-weight: bold;
            font-size: 9px;
        }

        /* =========================
           FOOTER
        ========================= */

        .footer {
            position: absolute;
            left: 17mm;
            right: 17mm;
            bottom: 9mm;
            border-top: 1px solid #dce5e8;
            padding-top: 7px;
        }

        .footer-left {
            text-align: left;
            color: #687780;
            font-size: 7px;
        }

        .footer-right {
            text-align: right;
            color: #687780;
            font-size: 7px;
        }

    </style>
</head>


<body>

@php

    $company = $quotation->user->companyProfile ?? null;

    $companyName = $company?->company_name
        ?? $quotation->user?->company
        ?? 'Your Company';

    $companyPhone = $company?->phone_number
        ?? $quotation->user?->phone
        ?? '';

    $companyEmail = $company?->email
        ?? $quotation->user?->email
        ?? '';

    $companyAddress = $company?->address ?? '';

    $currency = $quotation->currency ?? 'AED';

@endphp


<section class="sheet">


    <!-- =====================================================
         HEADER
    ====================================================== -->

    <div class="header">

        <table class="brand-table">

            <tr>

                <td class="brand-left">

                    @if(!empty($company?->logo))

                        <img
                            src="{{ public_path('storage/' . $company->logo) }}"
                            class="company-logo"
                        >

                    @endif

                    <div class="company-name">
                        {{ $companyName }}
                    </div>

                    @if(!empty($company?->tagline))

                        <div class="tagline">
                            {{ strtoupper($company->tagline) }}
                        </div>

                    @else

                        <div class="tagline">
                            PROFESSIONAL SERVICE. RELIABLE DELIVERY.
                        </div>

                    @endif

                </td>


                <td class="brand-right">

                    <div class="document-title">
                        QUOTATION
                    </div>

                    <div class="document-number">
                        {{ $quotation->quotation_number ?? '' }}
                    </div>

                </td>

            </tr>

        </table>


        <table class="meta-table">

            <tr>

                <td class="meta-cell">

                    <span class="meta-label">
                        ISSUED
                    </span>

                    <span class="meta-value">

                        {{ \Carbon\Carbon::parse($quotation->date)->format('d M Y') }}

                    </span>

                </td>


                <td class="meta-cell">

                    <span class="meta-label">
                        VALID UNTIL
                    </span>

                    <span class="meta-value">

                        @if(!empty($quotation->valid_until))

                            {{ \Carbon\Carbon::parse($quotation->valid_until)->format('d M Y') }}

                        @else

                            —

                        @endif

                    </span>

                </td>


                <td class="meta-cell">

                    <span class="meta-label">
                        CURRENCY
                    </span>

                    <span class="meta-value">
                        {{ $currency }}
                    </span>

                </td>

            </tr>

        </table>

    </div>


    <!-- =====================================================
         CONTENT
    ====================================================== -->

    <div class="content">


        <!-- =================================================
             CUSTOMER
        ================================================== -->

        <table class="client-table">

            <tr>

                <td class="client-box">

                    <div class="client-label">
                        Quotation For
                    </div>

                    <div class="client-name">

                        {{ $quotation->client?->client_name ?? '' }}

                    </div>

                    <div class="client-details">

                        @if(!empty($quotation->client?->address))

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


                <td class="status-box">

                    <div class="status">

                        ✓ QUOTATION

                    </div>

                </td>

            </tr>

        </table>


        <!-- =================================================
             SERVICES
        ================================================== -->

        <table class="items-table">

            <thead>

                <tr>

                    <th class="service-column">
                        Service Description
                    </th>

                    <th class="qty-column">
                        Qty
                    </th>

                    <th class="price-column">
                        Unit Price
                    </th>

                    <th class="total-column">
                        Total
                    </th>

                </tr>

            </thead>


            <tbody>

                @forelse($quotation->items as $item)

                    <tr>

                        <td class="service-column">

                            <div class="service-name">

                                {{ $item->service?->service_name ?? 'Service' }}

                            </div>


                            @if(!empty($item->description))

                                <span class="service-description">

                                    {{ $item->description }}

                                </span>

                            @endif

                        </td>


                        <td class="qty-column number">

                            {{ $item->quantity }}

                        </td>


                        <td class="price-column number">

                            {{ $currency }}
                            {{ number_format((float)$item->unit_price, 2) }}

                        </td>


                        <td class="total-column number">

                            {{ $currency }}
                            {{ number_format((float)$item->total, 2) }}

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="4" style="text-align:center; padding:20px; color:#687780;">

                            No services added.

                        </td>

                    </tr>

                @endforelse

            </tbody>

        </table>


        <!-- =================================================
             SUMMARY
        ================================================== -->

        <table class="summary-table">

            <tr>


                <!-- TERMS -->

                <td class="terms-cell">

                    <div class="terms-box">

                        <div class="terms-title">
                            Terms and Notes
                        </div>


                        @if(!empty($quotation->notes))

                            {!! nl2br(e($quotation->notes)) !!}

                        @endif


                        @if(!empty($quotation->notes) && !empty($company?->default_terms))

                            <br>
                            <br>

                        @endif


                        @if(!empty($company?->default_terms))

                            {!! nl2br(e($company->default_terms)) !!}

                        @endif


                        @if(
                            empty($quotation->notes) &&
                            empty($company?->default_terms)
                        )

                            Payment terms and conditions are subject
                            to the quotation agreement.

                        @endif

                    </div>

                </td>


                <!-- TOTALS -->

                <td class="totals-cell">

                    <div class="total-card">

                        <table>

                            <tr class="total-row">

                                <td class="total-label">
                                    Subtotal
                                </td>

                                <td class="total-value">

                                    {{ $currency }}
                                    {{ number_format((float)$quotation->subtotal, 2) }}

                                </td>

                            </tr>


                            <tr class="total-row">

                                <td class="total-label">
                                    VAT
                                </td>

                                <td class="total-value">

                                    {{ $currency }}
                                    {{ number_format($quotation->vat, 2) }}

                                </td>

                            </tr>


                            @if(!empty($quotation->discount))

                                <tr class="total-row">

                                    <td class="total-label">
                                        Discount
                                    </td>

                                    <td class="total-value">

                                        - {{ $currency }}
                                        {{ number_format((float)$quotation->discount, 2) }}

                                    </td>

                                </tr>

                            @endif


                            <tr>

                                <td colspan="2"
                                    class="grand-row">

                                    <table>

                                        <tr>

                                            <td class="grand-label">
                                                Total
                                            </td>

                                            <td class="grand-value">

                                                {{ $currency }}
                                                {{ number_format((float)$quotation->total, 2) }}

                                            </td>

                                        </tr>

                                    </table>

                                </td>

                            </tr>

                        </table>

                    </div>

                </td>

            </tr>

        </table>


        <!-- =================================================
             PAYMENT / CONTACT
        ================================================== -->

        <table class="bottom-table">

            <tr>


                <!-- PAYMENT -->

                <td class="bottom-cell">

                    <div class="bottom-box">

                        <div class="bottom-title">
                            Payment Details
                        </div>

                        @if(!empty($company?->bank_name))

                            {{ $company->bank_name }}

                        @endif


                        @if(!empty($company?->bank_name) && !empty($company?->iban))

                            <br>

                        @endif


                        @if(!empty($company?->iban))

                            IBAN {{ $company->iban }}

                        @endif


                        @if(
                            empty($company?->bank_name) &&
                            empty($company?->iban)
                        )

                            Payment details available upon request.

                        @endif

                    </div>

                </td>


                <!-- CONTACT -->

                <td class="bottom-cell">

                    <div class="bottom-box">

                        <div class="bottom-title">
                            Contact
                        </div>


                        @if(!empty($companyEmail))

                            {{ $companyEmail }}

                        @endif


                        @if(!empty($companyPhone))

                            <br>
                            {{ $companyPhone }}

                        @endif


                        @if(!empty($companyAddress))

                            <br>
                            {{ $companyAddress }}

                        @endif

                    </div>

                </td>

            </tr>

        </table>


    </div>


    <!-- =====================================================
         FOOTER
    ====================================================== -->

    <div class="footer">

        <table>

            <tr>

                <td class="footer-left">

                    {{ $company?->website ?? '' }}

                </td>

                <td class="footer-right">

                    {{ $quotation->quotation_number ?? '' }}
                    · QDizer

                </td>

            </tr>

        </table>

    </div>


</section>

</body>

</html>