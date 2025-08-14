<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Order;

class PageController extends Controller
{
    public function home()
    {
        return view('home');
    }

    public function pricing()
    {
        $products = Product::all();

        $orders = [];
        if (Auth::check()) {
            $orders = Order::where('user_id', Auth::id())->latest()->get();
        }

        return view('pricing', compact('products', 'orders'));
    }
}
