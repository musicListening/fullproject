<!DOCTYPE html>
<html>
<head>
    <title>Manage Users - Admin</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
</head>
<body class="p-4">

    <h2 class="d-flex justify-content-between align-items-center">
        👥 Manage Users
        <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary btn-sm">⬅️ Back to Dashboard</a>
    </h2>

    @if(session('success'))
        <div class="alert alert-success mt-3">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger mt-3">{{ session('error') }}</div>
    @endif

    <table class="table table-bordered mt-4">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Registered At</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
<tr>
    <td>{{ $loop->iteration }}</td>
    <td>{{ $user->name ?? $user->first_name . ' ' . $user->last_name }}</td>
    <td>{{ $user->email }}</td>
    <td>{{ $user->created_at ? $user->created_at->format('Y-m-d') : 'N/A' }}</td>
    <td>
        <form method="POST" action="{{ route('admin.users.delete', $user->id) }}">
            @csrf
            @method('DELETE')
            <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
        </form>
    </td>
</tr>
@endforeach

        </tbody>
    </table>

</body>
</html>
