@extends('admin.layouts.app')

@section('content')
<div class="container py-4">
    <h4>All Orders</h4>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead><tr><th>Order ID</th><th>User</th><th>Total</th><th>Status</th><th>Actions</th></tr></thead>
        <tbody>
            @foreach ($orders as $order)
            <tr>
                <td>#{{ $order->id }}</td>
                <td>{{ $order->user->name ?? 'Guest' }}</td>
                <td>Rs. {{ $order->total }}</td>
                <td>
                    <form method="POST" action="{{ route('admin.orders.status', $order->id) }}">
                        @csrf
                        <select name="status" onchange="this.form.submit()" class="form-select">
                            <option value="Pending" {{ $order->status == 'Pending' ? 'selected' : '' }}>Pending</option>
                            <option value="Delivered" {{ $order->status == 'Delivered' ? 'selected' : '' }}>Delivered</option>
                        </select>
                    </form>
                </td>
                <td>
                    <a href="{{ route('admin.orders.show', $order->id) }}" class="btn btn-sm btn-info">View</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection




