@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h2 class="mb-4">Your Cart</h2>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(count($cart) > 0)
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Product</th>
                <th>Price (Rs.)</th>
                <th>Quantity</th>
                <th>Subtotal</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @php $total = 0; @endphp
            @foreach($cart as $id => $details)
                @php $subtotal = $details['price'] * $details['quantity']; $total += $subtotal; @endphp
                <tr>
                    <td>{{ $details['name'] }}</td>
                    <td>{{ $details['price'] }}</td>
                    <td>{{ $details['quantity'] }}</td>
                    <td>{{ $subtotal }}</td>
                    <td>
                        <form action="{{ route('cart.remove', $id) }}" method="POST" onsubmit="return confirm('Remove this item?')">
                            @csrf
                            <button class="btn btn-sm btn-danger">Remove</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <h4>Total: Rs. {{ $total }}</h4>

    <form method="POST" action="{{ route('place.order') }}">
        @csrf
        <button type="submit" class="btn btn-success mt-3">Place Order</button>
    </form>
    @else
        <p>Your cart is empty.</p>
    @endif
</div>
@endsection
