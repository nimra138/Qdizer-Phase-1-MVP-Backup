
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Login</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Sora:wght@600;700&display=swap"
        rel="stylesheet">

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <link href="{{ asset('user/style.css') }}" rel="stylesheet">
</head>

<body>

    <div class="container">

        @php
            $logo = asset('user/img/logo.png');
        @endphp

        <div class="card-ui p-4 mx-auto" style="max-width: 420px; margin-top: 90px;">

            {{-- Logo --}}
            <div class="text-center mb-3">
                <a href="{{ route('home') }}">
                    <img src="{{ $logo }}" alt="Logo" style="max-height: 60px;">
                </a>
            </div>

            {{-- Heading --}}
            <h2 class="text-center mb-2">Welcome Back</h2>

            <p class="text-muted text-center small mb-4">
                Login to your dashboard
            </p>

            {{-- Session Status --}}
            @if (session('status'))
                <div class="alert alert-success small">
                    {{ session('status') }}
                </div>
            @endif

            {{-- Login Form --}}
            <form method="POST" action="{{ route('login') }}">
                @csrf

                {{-- Email --}}
                <div class="mb-3">
                    <label for="email" class="form-label">
                        Email
                    </label>

                    <input
                        id="email"
                        class="form-control @error('email') is-invalid @enderror"
                        type="email"
                        name="email"
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

                {{-- Password --}}
                <div class="mb-3">
                    <label for="password" class="form-label">
                        Password
                    </label>

                    <div class="password-wrapper">
                        <input
                            id="password"
                            class="form-control @error('password') is-invalid @enderror"
                            type="password"
                            name="password"
                            placeholder="Enter your password"
                            autocomplete="current-password"
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

                {{-- Remember Me / Forgot Password --}}
                <div class="d-flex justify-content-between align-items-center mb-3">

                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="small">
                            Forgot Password?
                        </a>
                    @endif

                </div>

                {{-- Submit --}}
                <button type="submit" class="btn btn-accent w-100 py-2">
                    <i class="fas fa-sign-in-alt me-1"></i>
                    Login
                </button>

                {{-- Register --}}
                @if (Route::has('register'))
                    <p class="text-center mt-3 mb-0 small">
                        Don't have an account?
                        <a href="{{ route('register') }}">Register</a>
                    </p>
                @endif

            </form>

        </div>

    </div>

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
