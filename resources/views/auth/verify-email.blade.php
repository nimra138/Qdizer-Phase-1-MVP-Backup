<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Verify Email</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500&family=Sora:wght@600&display=swap" rel="stylesheet">

<style>
body{font-family:Inter;background:#f6f7fb;}
h2{font-family:Sora;}
.card-box{max-width:520px;margin:90px auto;background:#fff;padding:30px;border-radius:14px;box-shadow:0 10px 30px rgba(0,0,0,.08);}
</style>
</head>

<body>

<div class="card-box text-center">

<h2>Email Verification</h2>

<p class="text-muted mt-3">
We sent a verification link to your email. Please verify your account.
</p>

<div class="alert alert-success">
Verification link sent successfully.
</div>

<form class="mb-3">
  <button class="btn btn-primary w-100">
    Resend Email
  </button>
</form>

<form>
  <button class="btn btn-link text-danger">
    Logout
  </button>
</form>

</div>

</body>
</html>