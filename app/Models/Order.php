<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Customer;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'cart_items',
        'card_name',
        'card_number',
        'delivery_address',
        'status',
        'total_amount',
        'customer_id' // ← Add this if you're using the relation
    ];

    // ✅ Link order to user
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // ✅ Link order to customer
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
