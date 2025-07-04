<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\DeliveryPerson;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function placeOrder(Request $request)
    {
        $cart = session()->get('cart', []);

        if (empty($cart)) {
            return redirect()->route('cart.show')->with('error', 'Your cart is empty.');
        }

        // Assign a random available delivery person (improve logic later if needed)
        $deliveryPerson = DeliveryPerson::inRandomOrder()->first();

        $total = 0;
        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }

        $order = Order::create([
            'user_id' => Auth::id(),
            'delivery_person_id' => $deliveryPerson ? $deliveryPerson->id : null,
            'status' => 'Pending',
            'total_amount' => $total,
            'payment_method' => 'cod', // cash on delivery (you can customize this)
        ]);

        foreach ($cart as $productId => $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $productId,
                'quantity' => $item['quantity'],
                'price' => $item['price'],
            ]);
        }

        session()->forget('cart');

        return redirect()->route('cart.show')->with('success', 'Order placed and delivery person assigned!');
    }
}
