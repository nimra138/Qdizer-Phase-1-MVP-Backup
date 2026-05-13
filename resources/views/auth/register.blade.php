<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Register</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500&family=Sora:wght@600;700&display=swap" rel="stylesheet">

<link href="{{ asset('user/style.css') }}" rel="stylesheet">
</head>

<body>

<div class="container">

  <div class="card-ui p-4 mx-auto" style="max-width:460px; margin-top:70px;">
    
    <h2 class="text-center mb-4">Create Account</h2>

    <form method="POST" action="{{ route('register') }}">
      @csrf

      <!-- Name -->
      <input 
        class="form-control mb-2" 
        type="text"
        name="name"
        placeholder="Full Name"
        value="{{ old('name') }}"
        required
        >
        @error('name')
          <small class="text-danger">{{ $message }}</small>
        @enderror
      <!--Company name Name -->
      <input 
        class="form-control mb-2" 
        type="text"
        name="company"
        placeholder="Company Name"
        value="{{ old('company') }}"
        required
      >

      @error('company')
        <small class="text-danger">{{ $message }}</small>
      @enderror

      <!-- Phone -->
      <input 
        class="form-control mb-2" 
        type="phone"
        name="phone"
        placeholder="Phone #"
        value="{{ old('phone') }}"
        required
      >

      @error('phone')
        <small class="text-danger">{{ $message }}</small>
      @enderror

      
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

      <!-- Confirm Password -->
      <input 
        class="form-control mb-3" 
        type="password"
        name="password_confirmation"
        placeholder="Confirm Password"
        required
      >

      <!-- Submit -->
      <button type="submit" class="btn btn-accent w-100 py-2">
        Register
      </button>

      <p class="text-center mt-3 small">
        Already have account? <a href="{{ route('login') }}">Login</a>
      </p>

    </form>

  </div>

</div>

</body>
</html>