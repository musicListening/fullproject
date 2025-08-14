<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Login - AquaLogix</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <style>
        .header { background-color: black !important; }
        .navmenu ul li a { color: white !important; }
        .navmenu ul li a.active { color: gold !important; }
    </style>
</head>
<body>

<header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container d-flex align-items-center justify-content-between">
        <h1 class="sitename">AquaLogix</h1>
        <nav id="navmenu" class="navmenu">
            <ul>
                <li><a href="{{ url('/') }}">Home</a></li>
                <li><a href="{{ route('pricing') }}">Pricing</a></li>
                <li><a href="{{ route('login') }}" class="active">Login</a></li>
                <li><a href="{{ route('register') }}">Register</a></li>
            </ul>
        </nav>
    </div>
</header>

<section class="vh-100" style="margin-top:100px;">
    <div class="container h-custom">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-md-6">
                <img src="{{ asset('img/login-concept-illustration_114360-4525.avif') }}" class="img-fluid" alt="Login">
            </div>
            <div class="col-md-6">
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="mb-4">
                        <label class="form-label">Email address</label>
                        <input type="email" name="email" class="form-control form-control-lg" value="{{ old('email') }}" required autofocus>
                        @error('email') <div class="text-danger">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" name="password" class="form-control form-control-lg" required>
                        @error('password') <div class="text-danger">{{ $message }}</div> @enderror
                    </div>

                    <button type="submit" class="btn btn-primary btn-lg w-100">Login</button>

                    <p class="mt-3">Don't have an account? <a href="{{ route('register') }}">Register</a></p>
                </form>
            </div>
        </div>
    </div>
</section>

</body>
</html>
