<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Reset Password</title>

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
.password-wrapper{
    position:relative;
}

.password-wrapper .form-control{
    padding-right:50px;
}

.password-toggle{
    position:absolute;
    right:18px;
    top:50%;
    transform:translateY(-50%);
    cursor:pointer;
    color:#6b7280;
    z-index:10;
    font-size:16px;
    transition:.2s;
}

.password-toggle:hover{
    color:var(--accent);
}
</style>

</head>
<body>

<div class="container py-5">

    <div class="row justify-content-center">
        <div class="col-lg-5 col-md-7">

            <div class="card-ui p-4 p-lg-5">

                <div class="text-center mb-4">
                    <h3 class="fw-bold mb-2">Reset Password</h3>
                    <p class="text-muted mb-0">
                        Enter your new password to secure your account.
                    </p>
                </div>

                @if ($errors->any())
                    <div class="alert alert-danger rounded-4 border-0 mb-4">
                        <ul class="mb-0 ps-3">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('password.update') }}">
                    @csrf

                    <input type="hidden"
                           name="token"
                           value="{{ $token }}">

                    <!-- Email -->
                    <div class="mb-3">
                        <label class="form-label fw-semibold">
                            Email Address
                        </label>

                        <input type="email"
                               name="email"
                               class="form-control"
                               value="{{ old('email', request()->email) }}"
                               placeholder="Enter your email"
                               required>
                    </div>

                   <!-- Password -->
                    <div class="mb-3">
                        <label class="form-label fw-semibold">
                            New Password
                        </label>

                        <div class="password-wrapper">
                            <input type="password"
                                name="password"
                                id="password"
                                class="form-control"
                                placeholder="Enter new password"
                                required>

                            <i class="fas fa-eye password-toggle"
                            onclick="togglePassword('password', this)"></i>
                        </div>
                    </div>

                    <!-- Confirm Password -->
                    <div class="mb-4">
                        <label class="form-label fw-semibold">
                            Confirm Password
                        </label>

                        <div class="password-wrapper">
                            <input type="password"
                                name="password_confirmation"
                                id="password_confirmation"
                                class="form-control"
                                placeholder="Confirm new password"
                                required>

                            <i class="fas fa-eye password-toggle"
                            onclick="togglePassword('password_confirmation', this)"></i>
                        </div>
                    </div>

                    <button type="submit"
                            class="btn btn-accent w-100 py-3">
                        <i class="fas fa-lock me-2"></i>
                        Reset Password
                    </button>

                </form>

            </div>

        </div>
    </div>

</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
function togglePassword(id, icon) {
    const input = document.getElementById(id);

    if (input.type === "password") {
        input.type = "text";
        icon.classList.remove("fa-eye");
        icon.classList.add("fa-eye-slash");
    } else {
        input.type = "password";
        icon.classList.remove("fa-eye-slash");
        icon.classList.add("fa-eye");
    }
}
</script>
</body>
</html>