@extends('admin.layouts.app')

@section('content')
<div class="container py-4">
    <h3>Customer Details: {{ $user->name }}</h3>
    <p><strong>Email:</strong> {{ $user->email }}</p>
    <p><strong>Registered on:</strong> {{ $user->created_at->format('d M Y') }}</p>

    <h4 class="mt-4">Orders by {{ $user->name }}</h4>

    @forelse ($user->orders as $order)
        <div class="card mb-4 shadow-sm">
            <div class="card-header">
                <strong>Order #{{ $order->id }}</strong> |
                <span class="text-capitalize">{{ $order->status }}</span> |
                <small>Placed on {{ $order->created_at->format('d M Y') }}</small>
            </div>
            <div class="card-body">
                <p><strong>Total:</strong> Rs. {{ number_format($order->total, 2) }}</p>

                @if ($order->items->isNotEmpty())
                    <table class="table table-sm table-bordered">
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th>Quantity</th>
                                <th>Price (each)</th>
                                <th>Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($order->items as $item)
                                <tr>
                                    <td>{{ $item->product->name ?? 'Product Deleted' }}</td>
                                    <td>{{ $item->quantity }}</td>
                                    <td>Rs. {{ number_format($item->price, 2) }}</td>
                                    <td>Rs. {{ number_format($item->price * $item->quantity, 2) }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <p>No products found in this order.</p>
                @endif
            </div>
        </div>
    @empty
        <p class="text-muted">No orders found for this user.</p>
    @endforelse

    <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary mt-3">Back to Dashboard</a>
</div>
@endsection

