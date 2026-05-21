<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Forgot Password</title>

<!-- Bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Font Awesome -->
<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

<!-- Google Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

<style>
:root{
    --primary:#0e222e;
    --secondary:#576661;
    --background:#f6f7fb;
    --card:#ffffff;
    --accent:#ff8a00;
    --accent-hover:#e67600;
    --text-dark:#0f172a;
    --text-muted:#6b7280;
    --border:#e5e7eb;
    --shadow:0 10px 30px rgba(0,0,0,.08);
}

body{
    font-family:'Inter',sans-serif;
    background:var(--background);
    min-height:100vh;
    display:flex;
    align-items:center;
}

.card-ui{
    background:var(--card);
    border:1px solid var(--border);
    border-radius:24px;
    box-shadow:var(--shadow);
}

.form-control{
    min-height:52px;
    border-radius:14px;
    border:1px solid var(--border);
    padding:12px 16px;
    box-shadow:none;
}

.form-control:focus{
    border-color:var(--accent);
    box-shadow:0 0 0 4px rgba(255,138,0,.12);
}

.btn-accent{
    background:var(--accent);
    color:#fff;
    border:none;
    border-radius:14px;
    font-weight:600;
    transition:.25s;
}

.btn-accent:hover{
    background:var(--accent-hover);
    color:#fff;
}

.text-muted{
    color:var(--text-muted)!important;
}
</style>

</head>
<body>

<div class="container py-5">

    <div class="row justify-content-center">
        <div class="col-lg-5 col-md-7">

            <div class="card-ui p-4 p-lg-5">

                <div class="text-center mb-4">
                    <h3 class="fw-bold mb-2">Forgot Password</h3>
                    <p class="text-muted mb-0">
                        Enter your email address and we'll send you a password reset link.
                    </p>
                </div>

                @if(session('status'))
                <div class="alert alert-success rounded-4 border-0 mb-4">
                    {{ session('status') }}
                </div>
                @endif

                @error('email')
                <div class="alert alert-danger rounded-4 border-0 mb-4">
                    {{ $message }}
                </div>
                @enderror

                <form method="POST" action="{{ route('password.email') }}">
                    @csrf

                    <div class="mb-4">
                        <label class="form-label fw-semibold">
                            Email Address
                        </label>

                        <input type="email"
                               name="email"
                               class="form-control"
                               value="{{ old('email') }}"
                               placeholder="Enter Email"
                               required>
                    </div>

                    <button type="submit"
                            class="btn btn-accent w-100 py-3">
                        <i class="fas fa-paper-plane me-2"></i>
                        Send Reset Link
                    </button>

                </form>

            </div>

        </div>
    </div>

</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>