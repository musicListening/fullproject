<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;

class AdminOrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('user')->orderBy('created_at', 'desc')->get();
        return view('admin.orders', compact('orders'));
    }

    public function complete(Order $order)
    {
    $order->status = 'completed';
    $order->save();

    return redirect()->route('admin.orders')
        ->with('success', '✅ Order marked as completed!');
    }

    public function destroy(Order $order)
    {
    $order->delete();

    return redirect()->route('admin.orders')
        ->with('success', '🗑️ Order deleted successfully!');
    }

}
