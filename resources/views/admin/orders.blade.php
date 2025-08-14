@if(session('success'))
    <div class="alert alert-success text-center mt-2">
        {{ session('success') }}
    </div>
@endif

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Admin Orders - AquaLogix</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <style>
        body {
            background: #f8f9fa;
            font-family: 'Lora', sans-serif;
        }
        .header {
            background: #007bff;
            color: white;
            padding: 15px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .header h2 {
            margin: 0;
        }
        .table-container {
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }
        .btn-back {
            margin-right: 10px;
        }
    </style>
</head>
<body>

    <!-- Admin Header -->
    <div class="header">
        <h2>Order Management</h2>
        <div>
            <a href="{{ route('admin.dashboard') }}" class="btn btn-light btn-sm btn-back">⬅ Dashboard</a>
            <a href="{{ route('pricing') }}" class="btn btn-warning btn-sm">View Pricing</a>
            <form method="POST" action="{{ route('logout') }}" style="display:inline;">
                @csrf
                <button type="submit" class="btn btn-danger btn-sm">Logout</button>
            </form>
        </div>
    </div>

    <div class="container mt-4">
        <div class="table-container">
            <h4 class="mb-3">All Orders</h4>
            <table class="table table-striped table-bordered">
                <thead class="table-primary">
                    <tr>
                        <th>ID</th>
                        <th>User</th>
                        <th>Items</th>
                        <th>Status</th>
                        <th>Address</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                    <tr>
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->user ? $order->user->email : 'Guest User' }}</td>
                        <td>{{ $order->cart_items }}</td>
                        <td><span class="badge bg-{{ $order->status=='pending'?'warning':'success' }}">{{ ucfirst($order->status) }}</span></td>
                        <td>{{ $order->delivery_address }}</td>
                        <td>
                            @if($order->status == 'pending')
                            <form method="POST" action="{{ route('admin.orders.complete', $order->id) }}" style="display:inline;">
                                @csrf
                                <button type="submit" class="btn btn-success btn-sm">Complete</button>
                            </form>
                            @endif
                            <form method="POST" action="{{ route('admin.orders.delete', $order->id) }}" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
