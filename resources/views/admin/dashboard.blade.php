<!-- resources/views/admin/dashboard.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <style>
        body {
            font-family: sans-serif;
            padding: 2rem;
        }
    </style>
</head>
<body>
    <h1>Welcome Admin: {{ auth()->user()->name }}</h1>

    <ul>
        <li><a href="{{ url('/') }}">Go to Website Home</a></li>
        <li><a href="{{ route('logout') }}"
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            Logout
        </a></li>
    </ul>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
</body>
</html>
