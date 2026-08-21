
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Reset Password</title>

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

        .reset-card {
            max-width: 460px;
            margin: 0 auto;
        }

        .auth-logo {
            max-height: 60px;
            max-width: 180px;
            object-fit: contain;
        }

        .reset-icon {
            width: 68px;
            height: 68px;
            margin: 0 auto 20px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            background: rgba(255, 138, 0, 0.10);
            color: var(--accent, #ff8a00);
            font-size: 27px;
        }

        .password-wrapper {
            position: relative;
        }

        .password-wrapper .form-control {
            padding-right: 50px;
        }

        .password-toggle {
            position: absolute;
            right: 18px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            color: #6b7280;
            z-index: 10;
            font-size: 16px;
            transition: .2s;
        }

        .password-toggle:hover {
            color: var(--accent, #ff8a00);
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

            <div class="card-ui reset-card p-4 p-lg-5">

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

                {{-- Reset Icon --}}
                <div class="reset-icon">
                    <i class="fas fa-lock"></i>
                </div>

                {{-- Heading --}}
                <div class="text-center mb-4">

                    <h3 class="fw-bold mb-2">
                        Reset Password
                    </h3>

                    <p class="text-muted mb-0">
                        Enter your new password to secure your account.
                    </p>

                </div>

                {{-- Validation Errors --}}
                @if ($errors->any())
                    <div class="alert alert-danger rounded-4 border-0 mb-4">

                        <div class="fw-semibold mb-2">
                            Please fix the following:
                        </div>

                        <ul class="mb-0 ps-3">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>

                    </div>
                @endif

                {{-- Reset Password Form --}}
                <form method="POST" action="{{ route('password.update') }}">
                    @csrf

                    {{-- Reset Token --}}
                    <input
                        type="hidden"
                        name="token"
                        value="{{ $token }}"
                    >

                    {{-- Email --}}
                    <div class="mb-3">

                        <label for="email" class="form-label fw-semibold">
                            Email Address
                        </label>

                        <input
                            id="email"
                            type="email"
                            name="email"
                            class="form-control @error('email') is-invalid @enderror"
                            value="{{ old('email', request()->email) }}"
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

                    {{-- New Password --}}
                    <div class="mb-3">

                        <label for="password" class="form-label fw-semibold">
                            New Password
                        </label>

                        <div class="password-wrapper">

                            <input
                                id="password"
                                type="password"
                                name="password"
                                class="form-control @error('password') is-invalid @enderror"
                                placeholder="Enter new password"
                                autocomplete="new-password"
                                required
                            >

                            <i
                                class="fas fa-eye password-toggle"
                                onclick="togglePassword('password', this)"
                                aria-label="Show password"
                            ></i>

                        </div>

                        @error('password')
                            <div class="text-danger small mt-1">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>

                    {{-- Confirm Password --}}
                    <div class="mb-4">

                        <label for="password_confirmation" class="form-label fw-semibold">
                            Confirm Password
                        </label>

                        <div class="password-wrapper">

                            <input
                                id="password_confirmation"
                                type="password"
                                name="password_confirmation"
                                class="form-control"
                                placeholder="Confirm new password"
                                autocomplete="new-password"
                                required
                            >

                            <i
                                class="fas fa-eye password-toggle"
                                onclick="togglePassword('password_confirmation', this)"
                                aria-label="Show password"
                            ></i>

                        </div>

                        @error('password_confirmation')
                            <div class="text-danger small mt-1">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>

                    {{-- Submit --}}
                    <button
                        type="submit"
                        class="btn btn-accent w-100 py-3"
                    >
                        <i class="fas fa-lock me-2"></i>
                        Reset Password
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

    <script>
        function togglePassword(id, icon) {

            const input = document.getElementById(id);

            if (!input) {
                return;
            }

            if (input.type === "password") {

                input.type = "text";

                icon.classList.remove("fa-eye");
                icon.classList.add("fa-eye-slash");

                icon.setAttribute("aria-label", "Hide password");

            } else {

                input.type = "password";

                icon.classList.remove("fa-eye-slash");
                icon.classList.add("fa-eye");

                icon.setAttribute("aria-label", "Show password");
            }
        }
    </script>

</body>

</html>