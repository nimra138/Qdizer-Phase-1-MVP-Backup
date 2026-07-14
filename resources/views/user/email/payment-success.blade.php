<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
</head>
<body style="font-family: Arial, sans-serif;">

<h2>Payment Successful 🎉</h2>

<p>Hello {{ $user->name }},</p>

<p>Thank you for your payment. Your subscription has been renewed successfully.</p>

<table cellpadding="8" cellspacing="0" border="1">
    <tr>
        <th align="left">Invoice</th>
        <td>{{ $transaction->stripe_invoice_id }}</td>
    </tr>

    <tr>
        <th align="left">Amount</th>
        <td>{{ $transaction->amount }} {{ $transaction->currency }}</td>
    </tr>

    <tr>
        <th align="left">VAT</th>
        <td>{{ $transaction->vat }} {{ $transaction->currency }}</td>
    </tr>

    <tr>
        <th align="left">Total</th>
        <td><strong>{{ $transaction->total }} {{ $transaction->currency }}</strong></td>
    </tr>

    <tr>
        <th align="left">Status</th>
        <td>{{ ucfirst($transaction->status) }}</td>
    </tr>

    <tr>
        <th align="left">Payment Date</th>
        <td>{{ $transaction->paid_at }}</td>
    </tr>
</table>

<p>
Thank you for choosing <strong>QDizer</strong>.
</p>

</body>
</html>