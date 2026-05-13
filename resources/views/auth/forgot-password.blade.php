<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Email Password Reset Link') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Forgot Password</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400&family=Sora:wght@600&display=swap" rel="stylesheet">

<style>
body{font-family:Inter;background:#f6f7fb;}
h2{font-family:Sora;}
.auth-card{max-width:420px;margin:90px auto;background:#fff;padding:30px;border-radius:14px;}
</style>
</head>

<body>

<div class="auth-card">

<h2 class="text-center mb-3">Forgot Password</h2>

<p class="text-muted text-center small">
Enter your email and we’ll send reset instructions.
</p>

<form>
  <input class="form-control mb-3" placeholder="Email address">

  <button class="btn btn-primary w-100">Send Reset Link</button>

  <p class="text-center mt-3 small">
    <a href="login.html">Back to login</a>
  </p>
</form>

</div>

</body>
</html>