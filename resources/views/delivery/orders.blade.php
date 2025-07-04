<!DOCTYPE html>
<html>
<head>
    <title>Delivery Orders</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4">

<div class="container">
    <h2>Your Assigned Orders</h2>
    <table class="table table-bordered mt-4">
        <thead>
            <tr>
                <th>Order ID</th>
                <th>User Name</th>
                <th>User Email</th>
                <th>Order Status</th>
                <th>Order Date</th>
                <th>Delivery Address</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->user->name ?? 'N/A' }}</td>
                    <td>{{ $order->user->email ?? 'N/A' }}</td>
                    <td>{{ $order->status }}</td>
                    <td>{{ $order->created_at->format('Y-m-d') }}</td>
                    <td>{{ $order->delivery_address ?? 'N/A' }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center">No orders assigned to you yet.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <a href="{{ route('delivery.dashboard') }}" class="btn btn-primary">Back to Dashboard</a>
</div>

</body>
</html>
