<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Quotation {{ $quotation->quotation_number ?? '' }}</title>

    <style>
        /* ============================
           BASE / RESET
        ============================ */
        * {
            box-sizing: border-box;
        }

        body{
            font-family: DejaVu Sans, sans-serif;
            background:#ffffff;
            color:#1e293b;
            font-size:12px;
            margin:0;
            padding:30px 35px;
            line-height:1.5;
        }

        table{
            width:100%;
            border-collapse:collapse;
        }

        /* ============================
           TOP ACCENT BAR
        ============================ */
        .top-accent{
            height:7px;
            background:#1e40af;
            margin:-30px -35px 0 -35px;
        }

        /* ============================
           HEADER
        ============================ */
        .header-wrap{
            padding:22px 0 18px 0;
            border-bottom:3px solid #1e40af;
            margin-bottom:22px;
        }

        .logo{
            max-height:70px;
            max-width:200px;
        }

        .company-name-header{
            font-size:19px;
            font-weight:bold;
            color:#0f2557;
            margin-top:6px;
        }

        .company-tagline{
            color:#64748b;
            font-size:10.5px;
        }

        .doc-title-block{
            text-align:right;
        }

        .doc-title-block h1{
            margin:0;
            font-size:30px;
            color:#1e40af;
            letter-spacing:3px;
            font-weight:bold;
        }

        .doc-title-block .doc-sub{
            color:#64748b;
            font-size:10.5px;
            letter-spacing:1px;
            text-transform:uppercase;
        }

        .doc-number-pill{
            display:inline-block;
            background:#eef2ff;
            color:#1e40af;
            padding:5px 12px;
            border-radius:20px;
            font-size:11px;
            font-weight:bold;
            margin-top:8px;
        }

        /* ============================
           SECTION TITLES
        ============================ */
        .section-title{
            font-size:11px;
            font-weight:bold;
            color:#1e40af;
            text-transform:uppercase;
            letter-spacing:1px;
            margin-bottom:10px;
            padding-bottom:6px;
            border-bottom:1.5px solid #dbeafe;
        }

        /* ============================
           INFO CARDS (Company / Client)
        ============================ */
        .info-card{
            background:#f8fafc;
            border:1px solid #e2e8f0;
            border-top:3px solid #1e40af;
            border-radius:6px;
            padding:16px 18px;
            vertical-align:top;
        }

        .info-card .name-line{
            font-size:14px;
            font-weight:bold;
            color:#0f2557;
            margin-bottom:6px;
        }

        .info-card .muted{
            color:#475569;
            line-height:1.8;
        }

        .spacer-col{
            width:18px;
        }

        /* ============================
           QUOTATION INFO PANEL
        ============================ */
        .quote-panel{
            background:#1e40af;
            border-radius:6px;
            margin:20px 0;
            padding:14px 20px;
        }

        .quote-panel table td{
            color:#ffffff;
            padding:4px 10px;
            vertical-align:middle;
        }

        .quote-panel .qp-label{
            display:block;
            font-size:9px;
            text-transform:uppercase;
            letter-spacing:1px;
            color:#c7d7fb;
            margin-bottom:3px;
        }

        .quote-panel .qp-value{
            font-size:13px;
            font-weight:bold;
            color:#ffffff;
        }

        .quote-panel .divider-col{
            width:1px;
            background:#3b5fc4;
        }

        /* ============================
           SERVICES TABLE
        ============================ */
        .items{
            margin-top:6px;
        }

        .items thead th{
            background:#1e40af;
            color:#ffffff;
            padding:11px 12px;
            font-size:10.5px;
            text-transform:uppercase;
            letter-spacing:0.5px;
            text-align:left;
        }

        .items thead th.num{
            text-align:right;
        }

        .items tbody td{
            padding:10px 12px;
            border-bottom:1px solid #e5e7eb;
            font-size:11.5px;
            color:#1e293b;
        }

        .items tbody td.num{
            text-align:right;
        }

        .items tbody tr:nth-child(even){
            background:#f8fafc;
        }

        .items .item-name{
            font-weight:bold;
            color:#0f2557;
        }

        .items .item-desc{
            color:#94a3b8;
            font-size:10px;
        }

        /* ============================
           TOTALS BOX
        ============================ */
        .totals-wrap{
            width:100%;
            margin-top:18px;
        }

        .totals{
            width:290px;
            margin-left:auto;
            border:1px solid #e2e8f0;
            border-radius:6px;
            overflow:hidden;
        }

        .totals td{
            padding:10px 16px;
            font-size:11.5px;
            color:#334155;
        }

        .totals tr.line-row{
            border-bottom:1px solid #e5e7eb;
        }

        .totals tr.line-row td:last-child{
            text-align:right;
        }

        .totals tr.grand td{
            background:#1e40af;
            color:#ffffff;
            font-size:15px;
            font-weight:bold;
            padding:14px 16px;
        }

        .totals tr.grand td:last-child{
            text-align:right;
        }

        /* ============================
           NOTES
        ============================ */
        .notes-box{
            background:#f8fafc;
            border-left:4px solid #1e40af;
            padding:14px 16px;
            border-radius:4px;
            color:#475569;
            font-size:11.5px;
        }

        /* ============================
           TERMS
        ============================ */
        .terms-box{
            color:#475569;
            font-size:11px;
            line-height:1.8;
        }

        /* ============================
           SIGNATURE BLOCK
        ============================ */
        .signature-wrap{
            margin-top:40px;
        }

        .signature-line{
            border-top:1px solid #334155;
            padding-top:8px;
            margin-top:55px;
            font-size:10.5px;
            color:#64748b;
        }

        .signature-title{
            font-size:11.5px;
            font-weight:bold;
            color:#0f2557;
            margin-bottom:2px;
        }

        /* ============================
           FOOTER
        ============================ */
        .footer{
            margin-top:35px;
            padding-top:16px;
            border-top:1px solid #e2e8f0;
            text-align:center;
            color:#94a3b8;
            font-size:10px;
        }

        .footer .thanks{
            color:#1e40af;
            font-size:12px;
            font-weight:bold;
            margin-bottom:4px;
        }

        .section-block{
            margin-bottom:20px;
        }
    </style>
</head>
<body>

@php
    $company = $quotation->user->companyProfile ?? null;
    $companyName = $company->company_name ?? ($quotation->user->company ?? 'Your Company');
@endphp

<div class="top-accent"></div>

<!-- ===================== HEADER ===================== -->
<div class="header-wrap">
    <table>
        <tr>
            <td width="55%" style="vertical-align:top;">
                @if(!empty($company->logo))
                    <img src="{{ asset('storage/'.$company?->logo) }}" class="logo"><br>
                @endif
                <div class="company-name-header">{{ $companyName }}</div>
                @if(!empty($company->tagline))
                    <div class="company-tagline">{{ $company->tagline }}</div>
                @endif
            </td>
            <td width="45%" class="doc-title-block" style="vertical-align:top;">
                <h1>QUOTATION</h1>
                <div class="doc-sub">Official Price Proposal</div>
                <div class="doc-number-pill">{{ $quotation->quotation_number }}</div>
            </td>
        </tr>
    </table>
</div>

<!-- ===================== COMPANY + CLIENT CARDS ===================== -->
<div class="section-block">
    <table>
        <tr>
            <td width="48%" class="info-card">
                <div class="section-title">From</div>
                <div class="name-line">{{ $companyName }}</div>
                <div class="muted">
                    {{ $company->address ?? '' }}<br>
                    {{ $company->phone_number ?? $quotation->user->phone }}<br>
                    {{ $company->email ?? $quotation->user->email }}
                </div>
            </td>

            <td class="spacer-col"></td>

            <td width="48%" class="info-card">
                <div class="section-title">Quotation For</div>
                <div class="name-line">{{ $quotation->client->client_name }}</div>
                <div class="muted">
                    {{ $quotation->client->phone_number }}<br>
                    {{ $quotation->client->email ?? '' }}<br>
                    {{ $quotation->client->address ?? '' }}
                </div>
            </td>
        </tr>
    </table>
</div>

<!-- ===================== QUOTATION INFO PANEL ===================== -->
<div class="quote-panel">
    <table>
        <tr>
            <td width="33%">
                <span class="qp-label">Quotation Number</span>
                <span class="qp-value">{{ $quotation->quotation_number }}</span>
            </td>
            <td class="divider-col"></td>
            <td width="33%">
                <span class="qp-label">Date Issued</span>
                <span class="qp-value">{{ \Carbon\Carbon::parse($quotation->date)->format('d M Y') }}</span>
            </td>
            <td class="divider-col"></td>
            <td width="33%">
                <span class="qp-label">Currency</span>
                <span class="qp-value">AED</span>
            </td>
        </tr>
    </table>
</div>

<!-- ===================== SERVICES TABLE ===================== -->
<div class="section-block">
    <div class="section-title">Services / Items</div>

    <table class="items">
        <thead>
            <tr>
                <th width="46%">Service</th>
                <th width="12%" class="num">Qty</th>
                <th width="20%" class="num">Unit Price</th>
                <th width="22%" class="num">Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach($quotation->items as $item)
            <tr>
                <td>
                    <div class="item-name">{{ $item->service->service_name }}</div>
                    @if(!empty($item->description))
                        <div class="item-desc">{{ $item->description }}</div>
                    @endif
                </td>
                <td class="num">{{ $item->quantity }}</td>
                <td class="num">AED {{ number_format($item->unit_price,2) }}</td>
                <td class="num">AED {{ number_format($item->total,2) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <!-- ===================== TOTALS ===================== -->
    <div class="totals-wrap">
        <table class="totals">
            <tr class="line-row">
                <td>Subtotal</td>
                <td>AED {{ number_format($quotation->subtotal,2) }}</td>
            </tr>
            <tr class="line-row">
                <td>VAT</td>
                <td>AED {{ number_format($quotation->vat,2) }}</td>
            </tr>
            @if(!empty($quotation->discount))
            <tr class="line-row">
                <td>Discount</td>
                <td>- AED {{ number_format($quotation->discount,2) }}</td>
            </tr>
            @endif
            <tr class="grand">
                <td>Total Due</td>
                <td>AED {{ number_format($quotation->total,2) }}</td>
            </tr>
        </table>
    </div>
</div>

<!-- ===================== NOTES ===================== -->
@if(!empty($quotation->notes))
<div class="section-block">
    <div class="section-title">Notes</div>
    <div class="notes-box">
        {{ $quotation->notes }}
    </div>
</div>
@endif

<!-- ===================== TERMS & CONDITIONS ===================== -->
@if(!empty($company->default_terms))
<div class="section-block">
    <div class="section-title">Terms &amp; Conditions</div>
    <div class="terms-box">
        {!! nl2br(e($company->default_terms)) !!}
    </div>
</div>
@endif

<!-- ===================== SIGNATURE BLOCK ===================== -->
<div class="signature-wrap">
    <table>
        <tr>
            <td width="48%">
                <div class="signature-line">
                    <div class="signature-title">{{ $companyName }}</div>
                    Authorized Signature
                </div>
            </td>
            <td class="spacer-col"></td>
            <td width="48%">
                <div class="signature-line">
                    <div class="signature-title">{{ $quotation->client->client_name }}</div>
                    Client Acceptance Signature
                </div>
            </td>
        </tr>
    </table>
</div>

<!-- ===================== FOOTER ===================== -->
<div class="footer">
    <div class="thanks">Thank you for choosing {{ $companyName }}</div>
    <div>
        {{ $company->address ?? '' }}
        @if(!empty($company->phone_number ?? $quotation->user->phone)) &bull; {{ $company->phone_number ?? $quotation->user->phone }} @endif
        @if(!empty($company->email ?? $quotation->user->email)) &bull; {{ $company->email ?? $quotation->user->email }} @endif
    </div>
    <div>This is a computer-generated quotation and is valid as per the terms stated above.</div>
</div>

</body>
</html>