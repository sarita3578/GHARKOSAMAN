@extends('admin.layouts.app')

@section('content')
    <h2>Order Details (ID: {{ $order->id }})</h2>

    <p><strong>Customer Name:</strong> {{ $order->customer_name }}</p>
    <p><strong>Total:</strong> Rs. {{ $order->total }}</p>
    <p><strong>Status:</strong> {{ $order->status }}</p>

    <hr>

    <form method="POST" action="{{ route('admin.orders.status', $order->id) }}">
        @csrf
        @csrf

    <select name="status">
        <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Pending</option>
        <option value="processing" {{ $order->status == 'processing' ? 'selected' : '' }}>Processing</option>
        <option value="completed" {{ $order->status == 'completed' ? 'selected' : '' }}>Completed</option>
    </select>
        <button type="submit">Update</button>
    </form>
@endsection


