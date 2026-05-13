<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Login</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Sora:wght@600;700&display=swap" rel="stylesheet">

<link href="{{ asset('user/style.css') }}" rel="stylesheet">
</head>

<body>

<div class="container">

  <div class="card-ui p-4 mx-auto" style="max-width:420px; margin-top:90px;">

    <h2 class="text-center mb-4">Welcome Back</h2>

    <p class="text-muted text-center small mb-4">
      Login to your dashboard
    </p>

    <form method="POST" action="{{ route('login') }}">
      @csrf

      <!-- Email -->
      <input 
        class="form-control mb-2" 
        type="email" 
        name="email"
        placeholder="Email"
        value="{{ old('email') }}"
        required
      >

      @error('email')
        <small class="text-danger">{{ $message }}</small>
      @enderror

      <!-- Password -->
      <input 
        class="form-control mb-2" 
        type="password" 
        name="password"
        placeholder="Password"
        required
      >

      @error('password')
        <small class="text-danger">{{ $message }}</small>
      @enderror

      <!-- Forgot Password -->
      <div class="d-flex justify-content-between mb-3">
        <a href="{{ route('password.request') }}" class="small">
          Forgot Password?
        </a>
      </div>

      <!-- Submit -->
      <button type="submit" class="btn btn-accent w-100 py-2">
        Login
      </button>

      <p class="text-center mt-3 small">
        Don't have account? <a href="{{ route('register') }}">Register</a>
      </p>

    </form>

  </div>

</div>

</body>
</html>