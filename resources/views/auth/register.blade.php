<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register - AquaLogix</title>

  <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

  <style>
    body {
      font-family: 'Open Sans', sans-serif;
      background: url('{{ asset('img/fact-bg.jpg') }}') no-repeat center center fixed;
      background-size: cover;
    }
    .overlay {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: rgba(0, 0, 0, 0.5);
    }
    .form-wrapper {
      position: relative;
      z-index: 1;
      display: flex;
      align-items: center;
      justify-content: center;
      min-height: 100vh;
      padding: 20px;
    }
    .card {
      border-radius: 1rem;
      background-color: rgba(255, 255, 255, 0.95);
      width: 100%;
      max-width: 400px;
    }
    .card-title {
      font-weight: bold;
      color: #007bff;
      text-align: center;
    }
  </style>
</head>
<body>
  <div class="overlay"></div>
  <div class="form-wrapper container">
    <div class="card p-4">
      <h2 class="card-title mb-4">Create Account</h2>

      <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="mb-3">
          <label class="form-label">Name</label>
          <input type="text" class="form-control" name="name" value="{{ old('name') }}" required>
          @error('name') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
          <label class="form-label">Email</label>
          <input type="email" class="form-control" name="email" value="{{ old('email') }}" required>
          @error('email') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
          <label class="form-label">Password</label>
          <input type="password" class="form-control" name="password" required>
          @error('password') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
          <label class="form-label">Confirm Password</label>
          <input type="password" class="form-control" name="password_confirmation" required>
        </div>

        <button type="submit" class="btn btn-primary w-100">Register</button>
        <p class="mt-3 text-center">Already have an account? <a href="{{ route('login') }}">Login</a></p>
      </form>
    </div>
  </div>
</body>
</html>
