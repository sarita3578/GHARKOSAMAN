<h4>Orders List</h4>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>#</th>
            <th>Customer</th>
            <th>Status</th>
            <th>Total</th>
            <th>Placed On</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($orders as $order)
        <tr>
            <td>{{ $order->id }}</td>
            <td>{{ $order->user->name ?? 'Guest' }}</td>
            <td>{{ ucfirst($order->status) }}</td>
            <td>Rs. {{ $order->total }}</td>
            <td>{{ $order->created_at->format('d M Y') }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
