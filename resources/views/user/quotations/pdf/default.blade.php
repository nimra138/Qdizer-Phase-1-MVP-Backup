<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Quotation</title>

<style>

body{
    font-family: DejaVu Sans,sans-serif;
    font-size:12px;
    color:#374151;
    margin:35px;
    background:#ffffff;
}

*{
    box-sizing:border-box;
}

table{
    width:100%;
    border-collapse:collapse;
}

h1,h2,h3,h4,p{
    margin:0;
}

.header{
    padding-bottom:25px;
    border-bottom:2px solid #f3f4f6;
}

.logo{
    max-height:70px;
}

.company{
    font-size:22px;
    font-weight:bold;
    color:#111827;
    margin-bottom:6px;
}

.small{
    color:#6b7280;
    line-height:1.6;
    font-size:11px;
}

.quote-title{
    text-align:right;
}

.quote-title h1{
    font-size:34px;
    color:#111827;
    letter-spacing:3px;
}

.quote-title span{
    color:#9ca3af;
    font-size:11px;
}

.section{
    margin-top:28px;
}

.section-title{

    font-size:11px;
    color:#9ca3af;
    text-transform:uppercase;
    letter-spacing:1px;
    margin-bottom:10px;
}

.info-box{
    border:1px solid #e5e7eb;
    border-radius:8px;
    padding:16px;
}

.items{
    margin-top:12px;
}

.items th{

    background:#f9fafb;
    color:#374151;
    font-size:11px;
    font-weight:bold;
    padding:12px;
    border-bottom:1px solid #e5e7eb;
    text-transform:uppercase;

}

.items td{

    padding:13px 12px;
    border-bottom:1px solid #f1f5f9;

}

.service{

    font-weight:bold;
    color:#111827;

}

.text-right{
    text-align:right;
}

.summary{

    width:320px;
    margin-left:auto;
    margin-top:25px;

}

.summary td{

    padding:10px 0;

}

.summary .label{

    color:#6b7280;

}

.summary .value{

    text-align:right;

}

.summary .grand td{

    border-top:2px solid #111827;
    padding-top:14px;
    font-size:17px;
    font-weight:bold;
    color:#111827;

}

.note{

    background:#f9fafb;
    border:1px solid #e5e7eb;
    padding:14px;
    border-radius:6px;
    line-height:1.7;

}

.footer{

    margin-top:70px;
    border-top:1px solid #e5e7eb;
    padding-top:20px;

}

.signature{

    width:220px;
    border-top:1px solid #111827;
    margin-top:60px;
    padding-top:8px;
    text-align:center;

}

.thankyou{

    font-size:16px;
    font-weight:bold;
    color:#111827;
    margin-bottom:8px;

}

</style>

</head>
<body>

@php
$company = $quotation->user->companyProfile;
@endphp

<!-- Header -->

<table class="header">

<tr>

<td width="55%">

@if($company?->logo)
<img src="{{ asset('storage/'.$company->logo) }}" class="logo">
@endif

<div class="company">
{{ $company->company_name ?? $quotation->user->company }}
</div>

<div class="small">
{{-- {{ $company->address }}<br> --}}
{{ $company->phone_number ?? $quotation->user->phone }}<br>
{{ $company->email ?? $quotation->user->email }}
</div>

</td>

<td width="45%" class="quote-title">

<h1>QUOTATION</h1>

<span>
Quotation # {{ $quotation->quotation_number }}
</span><br>

<span>
{{ \Carbon\Carbon::parse($quotation->date)->format('d M Y') }}
</span>

</td>

</tr>

</table>


<!-- Client -->

<div class="section">

<table>

<tr>

<td width="48%">

<div class="section-title">
Bill To
</div>

<div class="info-box">

<strong>{{ $quotation->client->client_name }}</strong><br><br>

<div class="small">

{{ $quotation->client->address }}<br>

{{ $quotation->client->phone_number }}<br>

{{ $quotation->client->email }}

</div>

</div>

</td>

<td width="4%"></td>

<td width="48%">

<div class="section-title">
Quotation Details
</div>

<div class="info-box">

<table>

<tr>

<td>Quotation No</td>
<td class="text-right">
{{ $quotation->quotation_number }}
</td>

</tr>

<tr>

<td>Date</td>

<td class="text-right">

{{ \Carbon\Carbon::parse($quotation->date)->format('d M Y') }}

</td>

</tr>

<tr>

<td>Currency</td>

<td class="text-right">

AED

</td>

</tr>

</table>

</div>

</td>

</tr>

</table>

</div>


<!-- Services -->

<div class="section">

<div class="section-title">
Items
</div>

<table class="items">

<thead>

<tr>

<th align="left">Description</th>

<th width="80">Qty</th>

<th width="140">Rate</th>

<th width="150">Amount</th>

</tr>

</thead>

<tbody>

@foreach($quotation->items as $item)

<tr>

<td>

<div class="service">

{{ $item->service->service_name }}

</div>

</td>

<td align="center">

{{ $item->quantity }}

</td>

<td class="text-right">

AED {{ number_format($item->unit_price,2) }}

</td>

<td class="text-right">

AED {{ number_format($item->total,2) }}

</td>

</tr>

@endforeach

</tbody>

</table>


<table class="summary">

<tr>

<td class="label">

Subtotal

</td>

<td class="value">

AED {{ number_format($quotation->subtotal,2) }}

</td>

</tr>

<tr>

<td class="label">

VAT

</td>

<td class="value">

AED {{ number_format($quotation->vat,2) }}

</td>

</tr>

<tr class="grand">

<td>

TOTAL

</td>

<td align="right">

AED {{ number_format($quotation->total,2) }}

</td>

</tr>

</table>

</div>


@if($quotation->notes)

<div class="section">

<div class="section-title">

Notes

</div>

<div class="note">

{{ $quotation->notes }}

</div>

</div>

@endif


@if($company?->default_terms)

<div class="section">

<div class="section-title">

Terms & Conditions

</div>

<div class="note">

{{ $company->default_terms }}

</div>

</div>

@endif


<div class="footer">

<div class="thankyou">

Thank you for your business.

</div>

<div class="small">

We appreciate the opportunity to work with you. Please contact us if you have any questions regarding this quotation.

</div>

<div class="signature">

Authorized Signature

</div>

</div>

</body>
</html>