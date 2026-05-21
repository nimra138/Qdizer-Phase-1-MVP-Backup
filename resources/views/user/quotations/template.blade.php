<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Quotation</title>

    <style>

        body{
            font-family: DejaVu Sans, sans-serif;
            color:#222;
            font-size:13px;
            margin:30px;
        }

        .header{
            display:flex;
            justify-content:space-between;
            align-items:center;
            border-bottom:2px solid #0d6efd;
            padding-bottom:15px;
            margin-bottom:25px;
        }

        .logo{
            max-height:80px;
        }

        .company{
            text-align:right;
        }

        h1{
            margin:0;
            color:#0d6efd;
            font-size:28px;
        }

        .section{
            margin-bottom:25px;
        }

        table{
            width:100%;
            border-collapse:collapse;
        }

        table th{
            background:#0d6efd;
            color:#fff;
            padding:10px;
            text-align:left;
        }

        table td{
            border:1px solid #ddd;
            padding:10px;
        }

        .totals{
            width:320px;
            margin-left:auto;
            margin-top:20px;
        }

        .totals td{
            border:none;
            padding:6px;
        }

        .grand{
            font-size:18px;
            font-weight:bold;
            color:#0d6efd;
        }

        .footer{
            margin-top:40px;
            border-top:1px solid #ddd;
            padding-top:15px;
            font-size:12px;
            color:#666;
        }

    </style>

</head>
<body>

@php
$company = $quotation->user->companyProfile;
@endphp

{{-- HEADER --}}
<div class="header">

    <div>

        @if(!empty($company?->logo))
            <img src="{{ asset('storage/'.$company->logo) }}"
                 class="logo">
        @endif

    </div>

    <div class="company">

        <h1>QUOTATION</h1>

        <strong>
            {{ $company->company_name ?? $quotation->user->company }}
        </strong><br>

        {{ $company->address ?? '' }}<br>

        {{ $company->phone_number ?? $quotation->user->phone }}<br>

        {{ $company->email ?? $quotation->user->email }}<br>

        UAE | AED

        @if($company?->vat_registered)
            <br>
            VAT:
            {{ $company->vat_number }}
        @endif

    </div>

</div>

{{-- QUOTATION INFO --}}
<div class="section">

    <table>
        <tr>

            <td width="50%">

                <strong>Quotation No:</strong><br>
                {{ $quotation->quotation_number }}

                <br><br>

                <strong>Date:</strong><br>
                {{ \Carbon\Carbon::parse($quotation->date)->format('d M Y') }}

            </td>

            <td width="50%">

                <strong>Client Details</strong><br>

                {{ $quotation->client->client_name }}<br>

                {{ $quotation->client->phone_number }}<br>

                {{ $quotation->client->email ?? '' }}<br>

                {{ $quotation->client->address ?? '' }}

            </td>

        </tr>
    </table>

</div>

{{-- SERVICES --}}
<div class="section">

    <table>

        <thead>

            <tr>
                <th>Service</th>
                <th width="80">Qty</th>
                <th width="120">Unit Price</th>
                <th width="120">Total</th>
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

{{-- TOTALS --}}
<table class="totals">

    <tr>
        <td>Subtotal:</td>
        <td align="right">
            AED {{ number_format($quotation->subtotal,2) }}
        </td>
    </tr>

    <tr>
        <td>VAT:</td>
        <td align="right">
            AED {{ number_format($quotation->vat,2) }}
        </td>
    </tr>

    <tr class="grand">
        <td>Total:</td>
        <td align="right">
            AED {{ number_format($quotation->total,2) }}
        </td>
    </tr>

</table>

{{-- NOTES --}}
@if($quotation->notes)

<div class="section">

    <strong>Notes</strong>

    <p>
        {{ $quotation->notes }}
    </p>

</div>

@endif

{{-- TERMS --}}
@if($company?->default_terms)

<div class="section">

    <strong>Terms & Conditions</strong>

    <p>
        {{ $company->default_terms }}
    </p>

</div>

@endif

{{-- FOOTER --}}
<div class="footer">

    Thank you for choosing
    <strong>
        {{ $company->company_name ?? $quotation->user->company }}
    </strong>

</div>

</body>
</html>