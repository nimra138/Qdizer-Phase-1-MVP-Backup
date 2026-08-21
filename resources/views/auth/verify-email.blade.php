
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Verify Email</title>

    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    {{-- Font Awesome --}}
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    {{-- Google Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Sora:wght@600;700&display=swap"
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

        .verify-card {
            max-width: 520px;
            margin: 0 auto;
        }

        .auth-logo {
            max-height: 60px;
            max-width: 180px;
            object-fit: contain;
        }

        .verify-icon {
            width: 72px;
            height: 72px;
            margin: 0 auto 22px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            background: rgba(255, 138, 0, 0.10);
            color: var(--accent, #ff8a00);
            font-size: 30px;
        }

        .verify-title {
            font-family: 'Sora', sans-serif;
        }

        .verify-email {
            font-weight: 600;
            color: var(--text-dark, #0f172a);
        }

        .resend-message {
            border-radius: 14px;
        }

        .logout-btn {
            text-decoration: none;
            font-weight: 500;
        }
    </style>
</head>

<body>

    <div class="container py-5">

        <div class="auth-wrapper">

            <div class="card-ui verify-card p-4 p-lg-5">

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

                {{-- Verification Icon --}}
                <div class="verify-icon">
                    <i class="fas fa-envelope-circle-check"></i>
                </div>

                {{-- Heading --}}
                <div class="text-center">

                    <h2 class="verify-title fw-bold mb-3">
                        Verify Your Email
                    </h2>

                    <p class="text-muted mb-3">
                        Thanks for creating an account!
                        Before continuing, please verify your email address
                        by clicking the verification link we sent to you.
                    </p>

                    @auth
                        <p class="verify-email mb-4">
                            {{ auth()->user()->email }}
                        </p>
                    @endauth

                </div>

                {{-- Success Message --}}
                @if (session('status') == 'verification-link-sent')
                    <div class="alert alert-success resend-message border-0">
                        <i class="fas fa-check-circle me-2"></i>
                        A new verification link has been sent to your email address.
                    </div>
                @endif

                {{-- Resend Verification Email --}}
                <form method="POST" action="{{ route('verification.send') }}" class="mb-3">
                    @csrf

                    <button
                        type="submit"
                        class="btn btn-accent w-100 py-3"
                    >
                        <i class="fas fa-paper-plane me-2"></i>
                        Resend Verification Email
                    </button>
                </form>

                {{-- Logout --}}
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <button
                        type="submit"
                        class="btn btn-link text-danger w-100 text-decoration-none"
                    >
                        <i class="fas fa-right-from-bracket me-1"></i>
                        Logout
                    </button>
                </form>

            </div>

        </div>

    </div>

    {{-- Bootstrap JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
