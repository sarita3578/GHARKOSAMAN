{{-- resources/views/cart.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Your Cart - GharKoSaman</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

@include('layouts.navbar')

<div class="container py-5">
    <h2 class="mb-4">Shopping Cart</h2>

    @if (session('cart') && count(session('cart')) > 0)
        <table class="table table-bordered align-middle">
            <thead>
                <tr>
                    <th>Product</th>
                    <th width="150">Price</th>
                    <th width="120">Quantity</th>
                    <th width="150">Subtotal</th>
                    <th width="100">Action</th>
                </tr>
            </thead>
            <tbody>
                @php $total = 0; @endphp
                @foreach (session('cart') as $id => $item)
                    @php
                        $subtotal = $item['price'] * $item['quantity'];
                        $total += $subtotal;
                    @endphp
                    <tr>
                        <td>
                            <strong>{{ $item['name'] }}</strong><br>
                            <small>{{ $item['description'] ?? '' }}</small>
                        </td>
                        <td>Rs. {{ $item['price'] }}</td>
                        <td>
                            <form action="{{ route('cart.update', $id) }}" method="POST" class="d-flex">
                                @csrf
                                @method('PUT')
                                <input type="number" name="quantity" value="{{ $item['quantity'] }}" class="form-control me-2" min="1">
                                <button class="btn btn-sm btn-primary">Update</button>
                            </form>
                        </td>
                        <td>Rs. {{ $subtotal }}</td>
                        <td>
                            <form action="{{ route('cart.remove', $id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger">Remove</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                <tr>
                    <td colspan="3" class="text-end"><strong>Total:</strong></td>
                    <td colspan="2"><strong>Rs. {{ $total }}</strong></td>
                </tr>
            </tbody>
        </table>

        <div class="text-end">
            <a href="{{ route('checkout') }}" class="btn btn-success btn-lg">Proceed to Checkout</a>
        </div>

    @else
        <p>Your cart is empty.</p>
    @endif
</div>

@include('layouts.footer')

</body>
</html>
