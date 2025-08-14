<h1>Admin Dashboard - Manage Products</h1>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Image</th>
            <th>Name</th>
            <th>Price (Rs.)</th>
            <th>Stock</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($products as $product)
        <tr>
            <form method="POST" action="{{ route('admin.products.update', $product->id) }}">
                @csrf
                <td>
                    @if($product->image)
                        <img src="{{ asset('img/'.$product->image) }}" width="80">
                    @endif
                </td>
                <td><input type="text" name="name" value="{{ $product->name }}" class="form-control"></td>
                <td><input type="number" name="price" value="{{ $product->price }}" class="form-control" step="0.01"></td>
                <td>
                    <select name="stock" class="form-control">
                        <option value="in-stock" {{ $product->stock=='in-stock'?'selected':'' }}>In Stock</option>
                        <option value="out-stock" {{ $product->stock=='out-stock'?'selected':'' }}>Out of Stock</option>
                    </select>
                </td>
                <td><button type="submit" class="btn btn-primary btn-sm">Save</button></td>
            </form>
        </tr>
        @endforeach
    </tbody>
</table>
