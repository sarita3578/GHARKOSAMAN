@extends('layouts.app')

@section('title', "Order #{$order->id}")

@section('content')
<div class="container py-5">
    <h1>Order #{{ $order->id }}</h1>
    <p><strong>Customer:</strong> {{ $order->customer_name ?? 'N/A' }}</p>
    <p><strong>Status:</strong> {{ ucfirst($order->status) }}</p>

    <h3>Ordered Items:</h3>
    <table class="table">
        <thead>
            <tr>
                <th>Product</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            @foreach($order->orderItems as $item)
            <tr>
                <td>{{ $item->product_name }}</td>
                <td>{{ $item->quantity }}</td>
                <td>Rs. {{ number_format($item->price, 2) }}</td>
                <td>Rs. {{ number_format($item->quantity * $item->price, 2) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <h4>Total: Rs. {{ number_format($order->total_price, 2) }}</h4>
</div>
@endsection

