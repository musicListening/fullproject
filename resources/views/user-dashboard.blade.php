<h1>User Dashboard</h1>
<p>Welcome, {{ auth()->user()->name }}</p>

<form method="POST" action="{{ route('logout') }}">
    @csrf
    <button type="submit">Logout</button>
</form>
