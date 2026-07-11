<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Quotation</title>
<style>
@page{margin:20px;}
body{font-family:DejaVu Sans,sans-serif;font-size:12px;color:#333}
.top{height:8px;background:#2563eb;margin-bottom:15px}
table{width:100%;border-collapse:collapse}
.header td{vertical-align:top}
.logo{height:70px}
.title{text-align:right}
.title h1{margin:0;color:#1e40af;font-size:28px}
.card{border:1px solid #ddd;padding:15px;margin-bottom:15px}
.section{font-weight:bold;color:#2563eb;margin-bottom:8px}
.items th{background:#1e40af;color:#fff;padding:8px}
.items td{padding:8px;border-bottom:1px solid #eee}
.items tr:nth-child(even){background:#f8fafc}
.totals{width:320px;margin-left:auto;margin-top:10px}
.totals td{padding:6px}
.total{background:#2563eb;color:#fff;font-weight:bold}
.note{background:#f8fafc;border-left:4px solid #2563eb;padding:10px}
.footer{margin-top:30px;border-top:1px solid #ddd;padding-top:10px;font-size:11px;color:#777;text-align:center}
.signature{margin-top:40px;width:220px;margin-left:auto;text-align:center}
.line{border-top:1px solid #000;margin-bottom:5px}
</style>
</head>
<body>
@php($company=$quotation->user->companyProfile)
<div class="top"></div>

<div class="card">
<table class="header">
<tr>
<td width="45%">
@if(!empty($company?->logo))
<img class="logo" src="{{ public_path('storage/'.$company->logo) }}">
@endif
</td>
<td width="55%" class="title">
<h1>QUOTATION</h1>
<div>#{{ $quotation->quotation_number }}</div>
<div>{{ \Carbon\Carbon::parse($quotation->date)->format('d M Y') }}</div>
</td>
</tr>
</table>
</div>

<div class="card">
<table>
<tr>
<td width="50%">
<div class="section">Company Details</div>
<strong>{{ $company->company_name ?? $quotation->user->company }}</strong><br>
{{ $company->address ?? '' }}<br>
{{ $company->phone_number ?? $quotation->user->phone }}<br>
{{ $company->email ?? $quotation->user->email }}
</td>
<td width="50%">
<div class="section">Bill To</div>
<strong>{{ $quotation->client->client_name }}</strong><br>
{{ $quotation->client->phone_number }}<br>
{{ $quotation->client->email }}<br>
{{ $quotation->client->address }}
</td>
</tr>
</table>
</div>

<div class="card">
<div class="section">Quotation Items</div>
<table class="items">
<thead>
<tr>
<th width="5%">#</th>
<th>Service</th>
<th width="10%">Qty</th>
<th width="20%">Unit Price</th>
<th width="20%">Total</th>
</tr>
</thead>
<tbody>
@foreach($quotation->items as $item)
<tr>
<td>{{ $loop->iteration }}</td>
<td>{{ $item->service->service_name }}</td>
<td>{{ $item->quantity }}</td>
<td align="right">AED {{ number_format($item->unit_price,2) }}</td>
<td align="right">AED {{ number_format($item->total,2) }}</td>
</tr>
@endforeach
</tbody>
</table>

<table class="totals">
<tr><td>Subtotal</td><td align="right">AED {{ number_format($quotation->subtotal,2) }}</td></tr>
<tr><td>VAT</td><td align="right">AED {{ number_format($quotation->vat,2) }}</td></tr>
<tr class="total"><td>Total</td><td align="right">AED {{ number_format($quotation->total,2) }}</td></tr>
</table>
<div style="clear:both"></div>
</div>

@if($quotation->notes)
<div class="card">
<div class="section">Notes</div>
<div class="note">{{ $quotation->notes }}</div>
</div>
@endif

@if($company?->default_terms)
<div class="card">
<div class="section">Terms & Conditions</div>
{{ $company->default_terms }}
</div>
@endif

<div class="signature">
<div class="line"></div>
Authorized Signature
</div>

<div class="footer">
Thank you for your business.<br>
{{ $company->company_name ?? $quotation->user->company }} |
{{ $company->email ?? $quotation->user->email }} |
{{ $company->phone_number ?? $quotation->user->phone }}
</div>
</body>
</html>
