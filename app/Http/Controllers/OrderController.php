<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use App\Models\Customer;
use Barryvdh\DomPDF\Facade\Pdf;



class OrderController extends Controller
{
    /**
     * Store a new order from pricing page.
     */
    public function store(Request $request)
    {
        $request->validate([
        'cart_items' => 'required',
        'first_name' => 'required|string|max:255',
        'last_name' => 'required|string|max:255',
        'email' => 'required|email',
        'contact_number' => 'required|string|max:20',
        'card_name' => 'required|string|max:255',
        'card_number' => 'required|string|max:16',
        'delivery_address' => 'required|string|max:500',
    ]);

    $cartItems = json_decode($request->cart_items, true);
    $totalAmount = collect($cartItems)->sum(function ($item) {
        return $item['qty'] * $item['price'];
    });

    // Create customer
    $customer = Customer::firstOrCreate(
    ['email' => $request->email], // Unique field
    [
        'first_name' => $request->first_name,
        'last_name' => $request->last_name,
        'contact_number' => $request->contact_number,
        'delivery_address' => $request->delivery_address,
    ]
);

    // Save order
    $order = Order::create([
    'user_id' => Auth::id(),
    'customer_id' => $customer->id,
    'cart_items' => json_encode($cartItems),
    'card_name' => $request->card_name,
    'card_number' => $request->card_number,
    'delivery_address' => $request->delivery_address,
    'status' => 'pending',
    'total_amount' => $totalAmount,   // ✅ add this line
]);
        
    return redirect()->route('pricing')->with('success', '✅ Order placed! Your delivery is in progress.');
    }

    /**
     * Mark order as completed by user.
     */
    public function complete(Order $order)
    {
        // ✅ Ensure the order belongs to the logged-in user
        if ($order->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        // ✅ Update order status
        $order->status = 'completed';
        $order->save();

        return redirect()->route('pricing')
                         ->with('success', '✅ Delivery completed. Thank you for your order!');
    }

    /**
     * Show all user orders (optional).
     */
    public function index()
    {
        $orders = Order::where('user_id', Auth::id())->latest()->get();
        return view('orders.index', compact('orders'));
    }
    public function downloadPDF($id)
{
    $order = Order::findOrFail($id);

    $pdf = Pdf::loadView('bill', compact('order'));

    return $pdf->download('invoice_order_'.$order->id.'.pdf');
}
}
