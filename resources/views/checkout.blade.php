{{-- resources/views/checkout.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Checkout - GharKoSaman</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

@include('layouts.navbar')

<div class="container py-5">
    <h2 class="mb-4">Checkout</h2>

    @if (session('cart') && count(session('cart')) > 0)

    <form action="{{ route('checkout.place') }}" method="POST">
        @csrf
        <div class="row">
            <!-- Delivery Details -->
            <div class="col-md-6">
                <h4>Delivery Details</h4>
                <div class="mb-3">
                    <label>Full Name</label>
                    <input type="text" name="full_name" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Phone Number</label>
                    <input type="text" name="phone" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Delivery Address</label>
                    <textarea name="address" class="form-control" rows="3" required></textarea>
                </div>

                <div class="mb-3">
                    <label>Payment Method</label>
                    <select name="payment_method" class="form-select" required>
                        <option value="cod">Cash on Delivery</option>
                        <option value="esewa">eSewa</option>
                        <option value="khalti">Khalti</option>
                    </select>
                </div>
            </div>

            <!-- Order Summary -->
            <div class="col-md-6">
                <h4>Order Summary</h4>
                <ul class="list-group mb-3">
                    @php $total = 0; @endphp
                    @foreach (session('cart') as $item)
                        @php
                            $subtotal = $item['price'] * $item['quantity'];
                            $total += $subtotal;
                        @endphp
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            {{ $item['name'] }} x {{ $item['quantity'] }}
                            <span>Rs. {{ $subtotal }}</span>
                        </li>
                    @endforeach
                    <li class="list-group-item d-flex justify-content-between">
                        <strong>Total</strong>
                        <strong>Rs. {{ $total }}</strong>
                    </li>
                </ul>

                <button type="submit" class="btn btn-success btn-lg w-100">Place Order</button>
            </div>
        </div>
    </form>

    @else
        <p>Your cart is empty. <a href="{{ route('products.index') }}">Shop now</a></p>
    @endif
</div>

@include('layouts.footer')

</body>
</html>
