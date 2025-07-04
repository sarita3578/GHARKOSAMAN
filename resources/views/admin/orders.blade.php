<!DOCTYPE html>
<html>
<head>
    <title>Admin Orders</title>
</head>
<body>

    <h1>All Orders</h1>

    @if($orders->count())
        <table border="1" cellpadding="10" cellspacing="0">
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th>Customer Name</th>
                    <th>Total Price</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->customer_name ?? 'N/A' }}</td> {{-- Adjust field names to your DB --}}
                    <td>{{ $order->total_price ?? 'N/A' }}</td>
                    <td>{{ $order->status ?? 'Pending' }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No orders found.</p>
    @endif

</body>
</html>
