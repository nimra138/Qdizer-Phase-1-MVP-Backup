<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Quotation</title>

    <style>
        body{
            font-family: DejaVu Sans, sans-serif;
            background:#f6f7fb;
            color:#0f172a;
            font-size:13px;
            margin:35px;
        }

        .top-accent{
            height:8px;
            background:#ff8a00;
            margin:-35px -35px 30px -35px;
        }

        .card{
            background:#fff;
            border:1px solid #e5e7eb;
            border-radius:14px;
            padding:22px;
            margin-bottom:22px;
        }

        .header-table{
            width:100%;
        }

        .logo{
            max-height:90px;
        }

        .title{
            text-align:right;
        }

        .title h1{
            margin:0;
            font-size:34px;
            color:#0e222e;
            letter-spacing:2px;
        }

        .title span{
            color:#ff8a00;
            font-size:13px;
        }

        .company-name{
            font-size:22px;
            font-weight:bold;
            margin-bottom:10px;
            color:#0e222e;
        }

        .muted{
            color:#6b7280;
            line-height:1.7;
        }

        .section-title{
            font-size:16px;
            font-weight:bold;
            margin-bottom:14px;
            color:#0e222e;
            border-left:4px solid #ff8a00;
            padding-left:10px;
        }

        table{
            width:100%;
            border-collapse:collapse;
        }

        .items th{
            background:#0e222e;
            color:#fff;
            padding:14px;
            font-size:12px;
            text-transform:uppercase;
            letter-spacing:1px;
        }

        .items td{
            padding:14px;
            border-bottom:1px solid #e5e7eb;
        }

        .items tr:nth-child(even){
            background:#fafafa;
        }

        .totals{
            width:340px;
            margin-left:auto;
            margin-top:25px;
            border:1px solid #e5e7eb;
            border-radius:10px;
            overflow:hidden;
        }

        .totals td{
            padding:12px 16px;
        }

        .totals tr{
            border-bottom:1px solid #e5e7eb;
        }

        .grand{
            background:#0e222e;
            color:#fff;
            font-size:18px;
            font-weight:bold;
        }

        .notes-box{
            background:#fff8f0;
            border-left:5px solid #ff8a00;
            padding:16px;
            border-radius:8px;
        }

        .footer{
            margin-top:40px;
            padding-top:20px;
            border-top:1px solid #ddd;
        }

        .signature{
            width:250px;
            border-top:1px solid #333;
            padding-top:8px;
            margin-top:50px;
        }
    </style>
</head>
<body>

@php
$company = $quotation->user->companyProfile;
@endphp

<div class="top-accent"></div>

<!-- Header -->
<div class="card">
    <table class="header-table">
        <tr>
            <td width="40%">
                @if(!empty($company?->logo))
                    <img src="{{ asset('storage/'.$company->logo) }}" class="logo">
                @endif
            </td>

            <td width="60%" class="title">
                <h1>QUOTATION</h1>
                <span>Professional Price Proposal</span>
            </td>
        </tr>
    </table>
</div>

<!-- Company + Client -->
<div class="card">
    <table>
        <tr>
            <td width="50%">
                <div class="section-title">Company Details</div>

                <div class="company-name">
                    {{ $company->company_name ?? $quotation->user->company }}
                </div>

                <div class="muted">
                    {{ $company->address ?? '' }}<br>
                    {{ $company->phone_number ?? $quotation->user->phone }}<br>
                    {{ $company->email ?? $quotation->user->email }}
                </div>
            </td>

            <td width="50%">
                <div class="section-title">Quotation Details</div>

                <div class="muted">
                    <strong>Quotation #:</strong> {{ $quotation->quotation_number }}<br>
                    <strong>Date:</strong> {{ \Carbon\Carbon::parse($quotation->date)->format('d M Y') }}<br>
                    <strong>Currency:</strong> AED
                </div>

                <br>

                <div class="section-title">Client Details</div>

                <div class="muted">
                    {{ $quotation->client->client_name }}<br>
                    {{ $quotation->client->phone_number }}<br>
                    {{ $quotation->client->email ?? '' }}<br>
                    {{ $quotation->client->address ?? '' }}
                </div>
            </td>
        </tr>
    </table>
</div>

<!-- Services -->
<div class="card">
    <div class="section-title">Services / Items</div>

    <table class="items">
        <thead>
            <tr>
                <th>Service</th>
                <th width="80">Qty</th>
                <th width="140">Unit Price</th>
                <th width="140">Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach($quotation->items as $item)
            <tr>
                <td>{{ $item->service->service_name }}</td>
                <td>{{ $item->quantity }}</td>
                <td>AED {{ number_format($item->unit_price,2) }}</td>
                <td>AED {{ number_format($item->total,2) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <table class="totals">
        <tr>
            <td>Subtotal</td>
            <td align="right">AED {{ number_format($quotation->subtotal,2) }}</td>
        </tr>

        <tr>
            <td>VAT</td>
            <td align="right">AED {{ number_format($quotation->vat,2) }}</td>
        </tr>

        <tr class="grand">
            <td>Total</td>
            <td align="right">AED {{ number_format($quotation->total,2) }}</td>
        </tr>
    </table>
</div>

@if($quotation->notes)
<div class="card">
    <div class="section-title">Notes</div>
    <div class="notes-box">
        {{ $quotation->notes }}
    </div>
</div>
@endif

@if($company?->default_terms)
<div class="card">
    <div class="section-title">Terms & Conditions</div>
    <div class="muted">
        {{ $company->default_terms }}
    </div>
</div>
@endif

<div class="footer">
    <strong>Thank you for choosing {{ $company->company_name ?? $quotation->user->company }}</strong>

    <div class="signature">
        Authorized Signature
    </div>
</div>

</body>
</html>