<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('admin-dashboard', compact('products'));
    }

    // ✅ Add new product
    public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'price' => 'required|numeric',
        'stock_status' => 'required',
        'image' => 'nullable|string'
    ]);

    Product::create($request->all());

    return redirect()->route('admin.dashboard')
                     ->with('success', '✅ Product Added Successfully!');
}

    // ✅ Update product
    public function update(Request $request, Product $product)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'price' => 'required|numeric',
        'stock_status' => 'required'
    ]);

    $product->update($request->only('name','price','stock_status'));

    return redirect()->route('admin.dashboard')
                     ->with('success', '✅ Product Updated Successfully!');
}

    // ✅ Delete product
    public function destroy(Product $product)
{
    $product->delete();
    return redirect()->route('admin.dashboard')
                     ->with('success', '✅ Product Deleted Successfully!');
}
}
