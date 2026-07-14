<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Welcome to QDizer Pro</title>
</head>

<body style="font-family:Arial,sans-serif;background:#f4f4f4;padding:30px;">

<div style="max-width:650px;margin:auto;background:#fff;padding:40px;border-radius:12px;">

    <h2 style="color:#4F46E5;">
        Welcome to QDizer Pro 🎉
    </h2>

    <p>Hello <strong>{{ $user->name }}</strong>,</p>

    <p>
        Your subscription has been activated successfully.
    </p>

    <p>
        You now have access to all QDizer Pro features.
    </p>

    <ul>
        <li>✔ Unlimited Quotations</li>
        <li>✔ Unlimited Clients</li>
        <li>✔ Unlimited Services</li>
        <li>✔ Premium PDF Export</li>
        <li>✔ WhatsApp Sharing</li>
        <li>✔ Priority Support</li>
    </ul>

    <p>
        Thank you for choosing <strong>QDizer</strong>.
    </p>

    <a href="{{ route('dashboard') }}"
       style="display:inline-block;
              padding:12px 24px;
              background:#4F46E5;
              color:#fff;
              text-decoration:none;
              border-radius:6px;">
        Go to Dashboard
    </a>

    <br><br>

    Regards,<br>
    <strong>QDizer Team</strong>

</div>

</body>
</html>