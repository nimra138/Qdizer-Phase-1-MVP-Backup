<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">

    <title>
        Progress Claim - {{ $quotation->quotation_number }}
    </title>

    <style>
        @page {
            size: A4 portrait;
            margin: 0;
        }

        * {
            box-sizing: border-box;
        }

        html,
        body {
            margin: 0;
            padding: 0;
            width: 210mm;
            height: 297mm;
        }

        body {
            font-family: DejaVu Sans, Arial, sans-serif;
            color: #1a242c;
            background: #ffffff;
            font-size: 8px;
            -webkit-print-color-adjust: exact;
            print-color-adjust: exact;
        }

        .sheet {
            /* width: 210mm;
            height: 297mm; */
            position: relative;
            background: #ffffff;
            padding: 13mm 15mm 18mm;
            overflow: hidden;
        }

        /* HEADER */
        .header-table {
            width: 100%;
            border-collapse: collapse;
        }

        .header-left {
            width: 60%;
            vertical-align: top;
        }

        .header-right {
            width: 40%;
            vertical-align: top;
            text-align: right;
        }

        .brand-name {
            margin: 0;
            font-size: 20px;
            font-weight: bold;
            color: #1a242c;
        }

        .brand-subtitle {
            margin-top: 3px;
            font-size: 7px;
            color: #6b7880;
            letter-spacing: 0.7px;
        }

        .claim-title {
            margin: 0;
            font-size: 23px;
            line-height: 1.2;
            font-weight: bold;
            color: #1a242c;
        }

        .claim-number {
            margin-top: 4px;
            font-size: 7px;
            color: #6b7880;
        }

        /* BAR */
        .bar {
            position: relative;
            width: 100%;
            height: 5px;
            margin: 7mm 0;
            background: #18394a;
        }

        .bar-orange {
            position: absolute;
            left: 0;
            top: 0;
            width: 27%;
            height: 5px;
            background: #df8612;
        }

        /* PROJECT */
        .project-table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 7mm 0;
            margin-left: -3.5mm;
        }

        .project-table td {
            vertical-align: top;
        }

        .project-main {
            width: 65%;
        }

        .project-period {
            width: 35%;
        }

        .box {
            border: 1px solid #d9e0e3;
            border-radius: 8px;
            padding: 4mm;
            min-height: 21mm;
        }

        .label {
            font-size: 6px;
            text-transform: uppercase;
            letter-spacing: 0.8px;
            color: #6b7880;
            font-weight: bold;
        }

        .value {
            margin-top: 3px;
            font-size: 8px;
            line-height: 1.55;
        }

        /* METRICS */
        .metrics {
            width: 100%;
            border-collapse: separate;
            border-spacing: 4mm 0;
            margin: 6mm 0 6mm -2mm;
        }

        .metrics td {
            width: 25%;
            vertical-align: top;
            background: #f5f7f7;
            border-top: 3px solid #df8612;
            padding: 4mm;
            height: 20mm;
        }

        .metric-label {
            display: block;
            font-size: 6px;
            color: #6b7880;
        }

        .metric-value {
            display: block;
            margin-top: 3px;
            font-size: 12px;
            font-weight: bold;
            color: #1a242c;
        }

        /* ITEMS TABLE */
        .items-table {
            width: 100%;
            border-collapse: collapse;
            table-layout: fixed;
        }

        .items-table th {
            background: #18394a;
            color: #ffffff;
            padding: 7px 5px;
            font-size: 6px;
            text-transform: uppercase;
            letter-spacing: 0.4px;
            font-weight: bold;
        }

        .items-table td {
            padding: 7px 5px;
            border-bottom: 1px solid #d9e0e3;
            font-size: 7px;
            vertical-align: top;
            word-wrap: break-word;
        }

        .items-table th:first-child,
        .items-table td:first-child {
            text-align: left;
        }

        .items-table th:not(:first-child),
        .items-table td:not(:first-child) {
            text-align: right;
        }

        .item-name {
            display: block;
            font-size: 7px;
            font-weight: bold;
        }

        .item-description {
            display: block;
            margin-top: 2px;
            font-size: 6px;
            line-height: 1.35;
            color: #6b7880;
        }

        /* CALCULATION */
        .calculation {
            width: 100%;
            border-collapse: separate;
            border-spacing: 8mm 0;
            margin-top: 6mm;
            margin-left: -4mm;
        }

        .calculation-notes {
            width: 60%;
            vertical-align: top;
        }

        .calculation-total {
            width: 40%;
            vertical-align: top;
        }

        .notes-box {
            border: 1px solid #d9e0e3;
            border-radius: 8px;
            padding: 4mm;
            min-height: 30mm;
            font-size: 7px;
            line-height: 1.55;
            color: #6b7880;
        }

        .notes-title {
            color: #1a242c;
            font-weight: bold;
        }

        /* TOTAL */
        .total-card {
            background: #18394a;
            color: #ffffff;
            border-radius: 9px;
            padding: 5mm;
        }

        .total-table {
            width: 100%;
            border-collapse: collapse;
        }

        .total-table td {
            padding: 4px 0;
            border: 0;
            font-size: 7px;
            color: #ccdce3;
        }

        .total-label {
            text-align: left;
        }

        .total-value {
            text-align: right;
            font-weight: bold;
        }

        .grand-total td {
            border-top: 1px solid #57717e;
            padding-top: 9px;
            font-size: 13px;
            color: #ffffff;
            font-weight: bold;
        }

        /* PROGRESS */
        .progress-section {
            margin-top: 7mm;
        }

        .progress-track {
            width: 100%;
            height: 9px;
            background: #edf1f2;
            border-radius: 8px;
            overflow: hidden;
        }

        .progress-fill {
            height: 9px;
            background: #df8612;
        }

        .progress-info {
            width: 100%;
            margin-top: 4px;
            border-collapse: collapse;
        }

        .progress-info td {
            border: 0;
            padding: 0;
            font-size: 7px;
            color: #6b7880;
        }

        .progress-left {
            text-align: left;
        }

        .progress-right {
            text-align: right;
        }

        /* APPROVALS */
        .approvals {
            width: 100%;
            border-collapse: separate;
            border-spacing: 10mm 0;
            margin-top: 10mm;
            margin-left: -5mm;
        }

        .approval {
            width: 33.33%;
            border-top: 1px solid #18394a;
            padding-top: 4px;
            font-size: 6px;
            color: #6b7880;
            vertical-align: top;
        }

        /* FOOTER */
        .footer {
            position: absolute;
            left: 15mm;
            right: 15mm;
            bottom: 7mm;
            border-top: 1px solid #d9e0e3;
            padding-top: 5px;
        }

        .footer-table {
            width: 100%;
            border-collapse: collapse;
        }

        .footer-table td {
            border: 0;
            padding: 0;
            font-size: 6px;
            color: #6b7880;
        }

        .footer-left {
            text-align: left;
            width: 50%;
        }

        .footer-right {
            text-align: right;
            width: 50%;
        }

        tr {
            page-break-inside: avoid;
        }

        table {
            page-break-inside: auto;
        }
    </style>
</head>

<body>

@php

    /*
    |--------------------------------------------------------------------------
    | COMPANY
    |--------------------------------------------------------------------------
    */

    $company = $quotation->user->companyProfile ?? null;

    $companyName =
        $company?->company_name
        ?? $company?->name
        ?? 'Your Company';

    $companyEmail =
        $company?->email
        ?? $quotation->user?->email
        ?? '';

    $companyPhone =
        $company?->phone
        ?? $company?->phone_number
        ?? $quotation->user?->phone
        ?? '';

    $companyAddress =
        $company?->address
        ?? '';

    $companyTrn =
        $company?->trn
        ?? $company?->tax_number
        ?? '';


    /*
    |--------------------------------------------------------------------------
    | CURRENCY
    |--------------------------------------------------------------------------
    */

    $currency = $quotation->currency ?? 'AED';


    /*
    |--------------------------------------------------------------------------
    | CLIENT
    |--------------------------------------------------------------------------
    */

    $client = $quotation->client ?? null;

    $clientName =
        $client?->name
        ?? $client?->client_name
        ?? $client?->company_name
        ?? '';

    $clientAddress =
        $client?->address
        ?? '';

    $clientCity =
        $client?->city
        ?? '';

    $clientPhone =
        $client?->phone
        ?? $client?->phone_number
        ?? '';


    /*
    |--------------------------------------------------------------------------
    | DATES
    |--------------------------------------------------------------------------
    */

    $quotationDate =
        $quotation->date
        ?? $quotation->quotation_date
        ?? $quotation->created_at;

    $validUntil =
        $quotation->valid_until
        ?? (
            $quotation->created_at
                ? \Carbon\Carbon::parse(
                    $quotation->created_at
                )->addDays(7)
                : now()->addDays(7)
        );


    /*
    |--------------------------------------------------------------------------
    | QUOTATION
    |--------------------------------------------------------------------------
    */

    $quotationNumber =
        $quotation->quotation_number ?? '';

    $projectName =
        $quotation->project_name
        ?? $quotation->title
        ?? 'Construction / Technical Services';

    $contractNumber =
        $quotation->contract_number
        ?? $quotation->reference
        ?? '';

    $claimPeriod =
        $quotation->claim_period
        ?? '';


    /*
    |--------------------------------------------------------------------------
    | FINANCIAL VALUES
    |--------------------------------------------------------------------------
    */

    $subtotal =
        (float) (
            $quotation->subtotal
            ?? $quotation->sub_total
            ?? 0
        );

    $discount =
        (float) (
            $quotation->discount
            ?? 0
        );

    $vat =
        (float) (
            $quotation->vat
            ?? $quotation->tax
            ?? 0
        );

    $total =
        (float) (
            $quotation->total
            ?? (
                $subtotal
                - $discount
                + $vat
            )
        );


    /*
    |--------------------------------------------------------------------------
    | VAT PERCENTAGE
    |--------------------------------------------------------------------------
    */

    $vatPercentage = 0;

    $taxableAmount = $subtotal - $discount;

    if ($taxableAmount > 0 && $vat > 0) {
        $vatPercentage =
            ($vat / $taxableAmount) * 100;
    }


    /*
    |--------------------------------------------------------------------------
    | NET DUE
    |--------------------------------------------------------------------------
    */

    $netDue =
        $subtotal
        - $discount
        + $vat;


    /*
    |--------------------------------------------------------------------------
    | PREVIOUS CERTIFIED
    |--------------------------------------------------------------------------
    */

    $previousCertified =
        (float) (
            $quotation->previous_certified
            ?? 0
        );


    /*
    |--------------------------------------------------------------------------
    | CONTRACT VALUE
    |--------------------------------------------------------------------------
    */

    $contractValue =
        (float) (
            $quotation->contract_value
            ?? $subtotal
        );


    /*
    |--------------------------------------------------------------------------
    | PROGRESS
    |--------------------------------------------------------------------------
    */

    $progress = 0;

    if (
        isset($quotation->progress)
        && is_numeric($quotation->progress)
    ) {
        $progress =
            (float) $quotation->progress;
    }

    $progress = min(100, max(0, $progress));


    /*
    |--------------------------------------------------------------------------
    | NOTES
    |--------------------------------------------------------------------------
    */

    $notes =
        $quotation->notes
        ?? $quotation->terms
        ?? '';

@endphp


<section class="sheet">


    <!-- HEADER -->

    <table class="header-table">
        <tr>

            <td class="header-left">

                <div class="brand-name">
                    {{ $companyName }}
                </div>

                <div class="brand-subtitle">

                    @if($companyAddress)
                        {{ $companyAddress }}
                    @else
                        MEP · FIT-OUT · CIVIL WORKS
                    @endif

                </div>

            </td>


            <td class="header-right">

                <div class="claim-title">
                    Progress Claim
                </div>

                <div class="claim-number">

                    {{ $quotationNumber }}

                    @if($quotationDate)
                        ·
                        {{ \Carbon\Carbon::parse($quotationDate)->format('d M Y') }}
                    @endif

                </div>

            </td>

        </tr>
    </table>


    <!-- BAR -->

    <div class="bar">
        <div class="bar-orange"></div>
    </div>


    <!-- PROJECT -->

    <table class="project-table">

        <tr>

            <td class="project-main">

                <div class="box">

                    <div class="label">
                        Project
                    </div>

                    <div class="value">

                        <b>
                            {{ $projectName }}
                        </b>

                        @if($clientName)
                            <br>
                            Client: {{ $clientName }}
                        @endif

                        @if($contractNumber)
                            <br>
                            Contract: {{ $contractNumber }}
                        @endif

                    </div>

                </div>

            </td>


            <td class="project-period">

                <div class="box">

                    <div class="label">
                        Claim period
                    </div>

                    <div class="value">

                        @if($claimPeriod)

                            {{ $claimPeriod }}

                        @elseif($quotationDate)

                            {{ \Carbon\Carbon::parse($quotationDate)->format('d M Y') }}
                            -
                            {{ \Carbon\Carbon::parse($validUntil)->format('d M Y') }}

                        @endif

                        <br>

                        Payment due
                        {{ \Carbon\Carbon::parse($validUntil)->format('d M Y') }}

                    </div>

                </div>

            </td>

        </tr>

    </table>


    <!-- METRICS -->

    <table class="metrics">

        <tr>

            <td>

                <span class="metric-label">
                    Contract value
                </span>

                <span class="metric-value">
                    {{ $currency }}
                    {{ number_format($contractValue, 2) }}
                </span>

            </td>


            <td>

                <span class="metric-label">
                    Previous certified
                </span>

                <span class="metric-value">
                    {{ $currency }}
                    {{ number_format($previousCertified, 2) }}
                </span>

            </td>


            <td>

                <span class="metric-label">
                    Current claim
                </span>

                <span class="metric-value">
                    {{ $currency }}
                    {{ number_format($subtotal, 2) }}
                </span>

            </td>


            <td>

                <span class="metric-label">
                    Overall progress
                </span>

                <span class="metric-value">
                    {{ number_format($progress, 0) }}%
                </span>

            </td>

        </tr>

    </table>


    <!-- ITEMS -->

    <table class="items-table">

        <thead>

            <tr>

                <th style="width:34%;">
                    Work package
                </th>

                <th style="width:14%;">
                    Contract value
                </th>

                <th style="width:12%;">
                    Previous %
                </th>

                <th style="width:13%;">
                    This period %
                </th>

                <th style="width:11%;">
                    Total %
                </th>

                <th style="width:16%;">
                    Current amount
                </th>

            </tr>

        </thead>


        <tbody>

            @forelse($quotation->items as $item)

                @php

                    $service =
                        $item->service ?? null;

                    $serviceName =
                        $service?->name
                        ?? $service?->service_name
                        ?? $item->name
                        ?? $item->description
                        ?? 'Work Package';

                    $description =
                        $item->description
                        ?? $service?->description
                        ?? '';

                    $itemTotal =
                        (float) (
                            $item->total
                            ?? $item->amount
                            ?? (
                                ($item->quantity ?? 1)
                                *
                                ($item->unit_price ?? 0)
                            )
                        );

                    $itemContractValue =
                        (float) (
                            $item->contract_value
                            ?? $itemTotal
                        );

                    $previousProgress =
                        (float) (
                            $item->previous_progress
                            ?? $item->previous_percentage
                            ?? 0
                        );

                    $currentProgress =
                        (float) (
                            $item->progress
                            ?? $item->current_progress
                            ?? $item->current_percentage
                            ?? 0
                        );

                    $totalProgress =
                        (float) (
                            $item->total_progress
                            ?? $item->total_percentage
                            ?? (
                                $previousProgress
                                + $currentProgress
                            )
                        );

                    $totalProgress =
                        min(100, max(0, $totalProgress));

                @endphp


                <tr>

                    <td>

                        <span class="item-name">
                            {{ $serviceName }}
                        </span>

                        @if($description)

                            <span class="item-description">
                                {{ $description }}
                            </span>

                        @endif

                    </td>


                    <td>

                        {{ $currency }}
                        {{ number_format($itemContractValue, 2) }}

                    </td>


                    <td>
                        {{ number_format($previousProgress, 0) }}%
                    </td>


                    <td>
                        {{ number_format($currentProgress, 0) }}%
                    </td>


                    <td>
                        {{ number_format($totalProgress, 0) }}%
                    </td>


                    <td>

                        {{ $currency }}
                        {{ number_format($itemTotal, 2) }}

                    </td>

                </tr>


            @empty

                <tr>

                    <td
                        colspan="6"
                        style="
                            text-align:center;
                            padding:15px;
                            color:#6b7880;
                        "
                    >
                        No work packages found.
                    </td>

                </tr>

            @endforelse

        </tbody>

    </table>


    <!-- CALCULATION -->

    <table class="calculation">

        <tr>


            <!-- NOTES -->

            <td class="calculation-notes">

                <div class="notes-box">

                    <span class="notes-title">
                        Commercial notes
                    </span>

                    <br>

                    @if($notes)

                        {!! nl2br(e($notes)) !!}

                    @else

                        VAT is applied according to the
                        applicable tax rate.

                        This claim is subject to certification
                        and supporting project records.

                    @endif

                </div>

            </td>


            <!-- TOTAL -->

            <td class="calculation-total">

                <div class="total-card">

                    <table class="total-table">


                        <!-- GROSS CLAIM -->

                        <tr>

                            <td class="total-label">
                                Gross claim
                            </td>

                            <td class="total-value">

                                {{ $currency }}
                                {{ number_format($subtotal, 2) }}

                            </td>

                        </tr>


                        <!-- DISCOUNT -->

                        @if($discount > 0)

                            <tr>

                                <td class="total-label">
                                    Discount
                                </td>

                                <td class="total-value">

                                    -
                                    {{ $currency }}
                                    {{ number_format($discount, 2) }}

                                </td>

                            </tr>

                        @endif


                        <!-- VAT -->

                        <tr>

                            <td class="total-label">

                                VAT

                                @if($vatPercentage > 0)
                                    {{ number_format($vatPercentage, 0) }}%
                                @endif

                            </td>

                            <td class="total-value">

                                {{ $currency }}
                                {{ number_format($vat, 2) }}

                            </td>

                        </tr>


                        <!-- NET DUE -->

                        <tr class="grand-total">

                            <td>
                                Net due
                            </td>

                            <td style="text-align:right;">

                                {{ $currency }}
                                {{ number_format($netDue, 2) }}

                            </td>

                        </tr>

                    </table>

                </div>

            </td>

        </tr>

    </table>


    <!-- PROGRESS -->

    <div class="progress-section">

        <div class="progress-track">

            <div
                class="progress-fill"
                style="width: {{ $progress }}%;"
            ></div>

        </div>


        <table class="progress-info">

            <tr>

                <td class="progress-left">
                    Overall project progress
                </td>

                <td class="progress-right">

                    <b>
                        {{ number_format($progress, 0) }}%
                        complete
                    </b>

                </td>

            </tr>

        </table>

    </div>


    <!-- APPROVALS -->

    <table class="approvals">

        <tr>

            <td class="approval">
                Contractor submission
            </td>

            <td class="approval">
                Consultant certification
            </td>

            <td class="approval">
                Client approval
            </td>

        </tr>

    </table>


    <!-- FOOTER -->

    <div class="footer">

        <table class="footer-table">

            <tr>

                <td class="footer-left">

                    @if($companyTrn)

                        TRN {{ $companyTrn }}

                    @elseif($companyEmail)

                        {{ $companyEmail }}

                    @elseif($companyPhone)

                        {{ $companyPhone }}

                    @endif

                </td>


                <td class="footer-right">

                    {{ $companyName }}
                    · Generated with QDizer

                </td>

            </tr>

        </table>

    </div>


</section>

</body>
</html>