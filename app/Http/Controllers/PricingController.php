<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class PricingController extends Controller
{
    public function index()
    {
        $products = Product::all();

        if ($products->isEmpty()) {
            // Default products if DB is empty
            $products = collect([
                (object)['name' => '1.5L Sparkling Water', 'price' => 150, 'stock_status' => 'in-stock', 'image' => '1.5LSparkling Water.webp'],
                (object)['name' => '1L Purified Water', 'price' => 170, 'stock_status' => 'out-stock', 'image' => '1LPurified Water.webp'],
                (object)['name' => '5L Mineral Water', 'price' => 160, 'stock_status' => 'in-stock', 'image' => '5LMineral Water.webp'],
            ]);
        }

        return view('pricing', compact('products'));
    }
}

