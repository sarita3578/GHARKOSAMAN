<!DOCTYPE html>
<html>
<head>
    <title>Delivery Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light p-5">

<div class="container">
    <h2>Welcome, {{ $deliveryPerson->name }}</h2>
    <hr>

    <h4>Your Assigned Orders</h4>

    @if ($orders->isEmpty())
        <p>No orders assigned yet.</p>
    @else
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th>User Name</th>
                    <th>Email</th>
                    <th>Contact Number</th>
                    <th>Address</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                    <tr>
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->user->name ?? 'N/A' }}</td>
                        <td>{{ $order->user->email ?? 'N/A' }}</td>
                        <td>{{ $order->user->phone ?? 'N/A' }}</td>
                        <td>{{ $order->user->address ?? 'N/A' }}</td>
                        <td>{{ ucfirst($order->status) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

    <form method="POST" action="{{ route('delivery.logout') }}">
        @csrf
        <button type="submit" class="btn btn-danger">Logout</button>
    </form>
</div>

</body>
</html>
