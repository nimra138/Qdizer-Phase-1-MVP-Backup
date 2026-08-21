
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Register</title>

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

        <div class="card-ui p-4 mx-auto" style="max-width: 460px; margin-top: 70px;">

            {{-- Logo --}}
            <div class="text-center mb-3">
                <a href="{{ route('home') }}">
                    <img src="{{ $logo }}" alt="Logo" style="max-height: 60px;">
                </a>
            </div>

            {{-- Heading --}}
            <h2 class="text-center mb-2">Create Account</h2>

            <p class="text-muted text-center small mb-4">
                Create your account to get started
            </p>

            {{-- Registration Form --}}
            <form method="POST" action="{{ route('register') }}">
                @csrf

                {{-- Full Name --}}
                <div class="mb-3">
                    <label for="name" class="form-label">
                        Full Name
                    </label>

                    <input
                        id="name"
                        class="form-control @error('name') is-invalid @enderror"
                        type="text"
                        name="name"
                        placeholder="Enter your full name"
                        value="{{ old('name') }}"
                        autocomplete="name"
                        required
                        autofocus
                    >

                    @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                {{-- Company Name --}}
                <div class="mb-3">
                    <label for="company" class="form-label">
                        Company Name
                    </label>

                    <input
                        id="company"
                        class="form-control @error('company') is-invalid @enderror"
                        type="text"
                        name="company"
                        placeholder="Enter your company name"
                        value="{{ old('company') }}"
                        autocomplete="organization"
                        required
                    >

                    @error('company')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                {{-- Phone --}}
                <div class="mb-3">

                    <label for="phone" class="form-label">
                        Phone Number
                    </label>

                    <div class="input-group">

                        <span class="input-group-text">
                            +971
                        </span>

                        <input
                            id="phone"
                            type="tel"
                            name="phone"
                            class="form-control @error('phone') is-invalid @enderror"
                            placeholder="50 123 4567"
                            value="{{ old('phone') }}"
                            autocomplete="tel"
                            required
                        >

                    </div>

                    @error('phone')
                        <div class="text-danger small mt-1">
                            {{ $message }}
                        </div>
                    @enderror

                </div>

                {{-- Email --}}
                <div class="mb-3">

                    <label for="email" class="form-label">
                        Email Address
                    </label>

                    <input
                        id="email"
                        class="form-control @error('email') is-invalid @enderror"
                        type="email"
                        name="email"
                        placeholder="Enter your email"
                        value="{{ old('email') }}"
                        autocomplete="email"
                        required
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
                            placeholder="Create a password"
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

                    <label for="password_confirmation" class="form-label">
                        Confirm Password
                    </label>

                    <div class="password-wrapper">

                        <input
                            id="password_confirmation"
                            class="form-control"
                            type="password"
                            name="password_confirmation"
                            placeholder="Confirm your password"
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
                <button type="submit" class="btn btn-accent w-100 py-2">
                    <i class="fas fa-user-plus me-1"></i>
                    Register
                </button>

                {{-- Login --}}
                <p class="text-center mt-3 mb-0 small">
                    Already have an account?
                    <a href="{{ route('login') }}">
                        Login
                    </a>
                </p>

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
