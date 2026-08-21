
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Forgot Password</title>

    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    {{-- Font Awesome --}}
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    {{-- Google Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap"
        rel="stylesheet">

    {{-- Main User CSS --}}
    <link href="{{ asset('user/style.css') }}" rel="stylesheet">

    <style>
        body {
            min-height: 100vh;
            display: flex;
            align-items: center;
        }

        .auth-wrapper {
            width: 100%;
        }

        .forgot-card {
            max-width: 460px;
            margin: 0 auto;
        }

        .auth-logo {
            max-height: 60px;
            max-width: 180px;
            object-fit: contain;
        }

        .info-icon {
            width: 64px;
            height: 64px;
            border-radius: 50%;
            background: rgba(255, 138, 0, 0.10);
            color: var(--accent, #ff8a00);
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            font-size: 26px;
        }

        .form-label {
            color: var(--text-dark, #0f172a);
        }

        .back-login {
            text-decoration: none;
            font-weight: 500;
        }
    </style>
</head>

<body>

    <div class="container py-5">

        <div class="auth-wrapper">

            <div class="card-ui forgot-card p-4 p-lg-5">

                {{-- Logo --}}
                <div class="text-center mb-4">
                    <a href="{{ route('home') }}">
                        <img
                            src="{{ asset('user/img/logo.png') }}"
                            alt="Logo"
                            class="auth-logo"
                        >
                    </a>
                </div>

                {{-- Icon --}}
                <div class="info-icon">
                    <i class="fas fa-lock"></i>
                </div>

                {{-- Heading --}}
                <div class="text-center mb-4">

                    <h3 class="fw-bold mb-2">
                        Forgot Password?
                    </h3>

                    <p class="text-muted mb-0">
                        Enter your email address and we'll send you a password reset link.
                    </p>

                </div>

                {{-- Success Message --}}
                @if (session('status'))
                    <div class="alert alert-success rounded-4 border-0 mb-4">
                        <i class="fas fa-check-circle me-2"></i>
                        {{ session('status') }}
                    </div>
                @endif

                {{-- Validation Error --}}
                @error('email')
                    <div class="alert alert-danger rounded-4 border-0 mb-4">
                        <i class="fas fa-exclamation-circle me-2"></i>
                        {{ $message }}
                    </div>
                @enderror

                {{-- Forgot Password Form --}}
                <form method="POST" action="{{ route('password.email') }}">
                    @csrf

                    {{-- Email --}}
                    <div class="mb-4">

                        <label for="email" class="form-label fw-semibold">
                            Email Address
                        </label>

                        <input
                            id="email"
                            type="email"
                            name="email"
                            class="form-control @error('email') is-invalid @enderror"
                            value="{{ old('email') }}"
                            placeholder="Enter your email"
                            autocomplete="email"
                            required
                            autofocus
                        >

                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>

                    {{-- Submit --}}
                    <button
                        type="submit"
                        class="btn btn-accent w-100 py-3"
                    >
                        <i class="fas fa-paper-plane me-2"></i>
                        Send Reset Link
                    </button>

                </form>

                {{-- Back to Login --}}
                <div class="text-center mt-4">

                    <a
                        href="{{ route('login') }}"
                        class="back-login"
                    >
                        <i class="fas fa-arrow-left me-1"></i>
                        Back to Login
                    </a>

                </div>

            </div>

        </div>

    </div>

    {{-- Bootstrap JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>