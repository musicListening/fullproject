@if(session('success'))
    <div class="alert alert-success text-center">
        {{ session('success') }}
    </div>
@endif
@if(session('error'))
    <div class="alert alert-danger text-center">
        {{ session('error') }}
    </div>
@endif

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Admin Dashboard - AquaLogix</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap & Icons -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-icons.css') }}">

    <style>
        body {
            font-family: 'Lora', sans-serif;
            background-color: #f8f9fa;
        }
        .dashboard-header {
            background: #007bff;
            color: white;
            padding: 15px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .dashboard-header h2 { margin: 0; }
        .product-card {
            background: white;
            border-radius: 8px;
            padding: 15px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            margin-bottom: 20px;
        }
        .form-control, .btn {
            border-radius: 5px;
        }
        .logout-btn {
            color: white;
            border: 1px solid white;
            padding: 5px 12px;
            border-radius: 5px;
            background: transparent;
            transition: 0.3s;
        }
        .logout-btn:hover {
            background: white;
            color: #007bff;
        }
    </style>
</head>
<body>

    <!-- Header -->
    <div class="dashboard-header d-flex justify-content-between align-items-center">
    <h2>Admin Dashboard</h2>
    <div>
        <a href="{{ route('admin.users') }}" class="btn btn-primary">👥 Manage Users</a>
        <a href="{{ route('pricing') }}" class="btn btn-warning">Pricing Page</a>
        <a href="{{ route('admin.orders') }}" class="btn btn-info">Manage Orders</a>
        <form method="POST" action="{{ route('logout') }}" style="display:inline;">
            @csrf
            <button type="submit" class="btn btn-danger">Logout</button>
        </form>
    </div>
</div>



    <div class="container mt-4">

        <!-- ✅ Add Product Form -->
        <h4 class="mb-3">Add New Product</h4>
        <div class="product-card mb-4">
            <form method="POST" action="{{ route('admin.products.store') }}">
                @csrf
                <div class="row">
                    <div class="col-md-3">
                        <input type="text" name="name" class="form-control" placeholder="Product Name" required>
                    </div>
                    <div class="col-md-2">
                        <input type="number" step="0.01" name="price" class="form-control" placeholder="Price" required>
                    </div>
                    <div class="col-md-2">
                        <select name="stock_status" class="form-control">
                            <option value="in-stock">In Stock</option>
                            <option value="out-stock">Out of Stock</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <input type="text" name="image" class="form-control" placeholder="Image filename (e.g., product.jpg)">
                    </div>
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-success w-100">Add Product</button>
                    </div>
                </div>
            </form>
        </div>

        <!-- ✅ Manage Existing Products -->
        <h4 class="mb-3">Manage Products</h4>
        <div class="row">
            @foreach($products as $product)
            <div class="col-md-4">
                <div class="product-card">
                    <form method="POST" action="{{ route('admin.products.update', $product->id) }}">
                        @csrf
                        <div class="mb-2">
                            <label class="form-label">Name</label>
                            <input type="text" name="name" class="form-control" value="{{ $product->name }}">
                        </div>
                        <div class="mb-2">
                            <label class="form-label">Price</label>
                            <input type="number" step="0.01" name="price" class="form-control" value="{{ $product->price }}">
                        </div>
                        <div class="mb-2">
                            <label class="form-label">Stock Status</label>
                            <select name="stock_status" class="form-control">
                                <option value="in-stock" {{ $product->stock_status=='in-stock'?'selected':'' }}>In Stock</option>
                                <option value="out-stock" {{ $product->stock_status=='out-stock'?'selected':'' }}>Out of Stock</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary w-100 mb-2">Save</button>
                    </form>

                    <!-- ✅ Delete Product -->
                    <form method="POST" action="{{ route('admin.products.delete', $product->id) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger w-100" onclick="return confirm('Delete this product?')">Delete</button>
                    </form>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    

</body>
</html>
