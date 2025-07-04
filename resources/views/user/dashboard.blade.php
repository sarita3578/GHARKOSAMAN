@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h2 class="mb-4">Welcome, {{ Auth::user()->name ?? 'User' }} 👋</h2>

    <div class="row">
        <!-- Sidebar -->
        <div class="col-md-3">
            <ul class="nav nav-pills flex-column" id="dashboardTabs" role="tablist">
                <li class="nav-item mb-2">
                    <button class="nav-link active" data-bs-toggle="pill" data-bs-target="#orders" type="button">🧾 Order History</button>
                </li>
                <li class="nav-item mb-2">
                    <button class="nav-link" data-bs-toggle="pill" data-bs-target="#profile" type="button">👤 Profile</button>
                </li>
                <li class="nav-item">
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button class="btn btn-danger w-100 mt-2">🚪 Logout</button>
                    </form>
                </li>
            </ul>
        </div>

        <!-- Content -->
        <div class="col-md-9">
            <div class="tab-content">
                
                <!-- Orders -->
                <div class="tab-pane fade show active" id="orders" role="tabpanel">
                    <h4 class="mb-3">Your Orders</h4>
                    @if (isset($orders) && $orders->count())
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Order #</th>
                                    <th>Date</th>
                                    <th>Total</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                    <tr>
                                        <td>#{{ $order->id }}</td>
                                        <td>{{ $order->created_at->format('d M Y') }}</td>
                                        <td>Rs. {{ $order->total_amount }}</td>
                                        <td>
                                            <span class="badge bg-{{ strtolower($order->status) === 'delivered' ? 'success' : 'warning' }}">
                                                {{ $order->status }}
                                            </span>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <p>You haven't placed any orders yet.</p>
                    @endif

                    <a href="{{ route('welcome') }}" class="btn btn-secondary mt-3">← Back to Home</a>
                </div>

                <!-- Profile -->
                <div class="tab-pane fade" id="profile" role="tabpanel">
                    <h4 class="mb-3">Update Profile</h4>

                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    <form method="POST" action="{{ route('user.update') }}">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label>Name</label>
                            <input type="text" name="name" value="{{ Auth::user()->name }}" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label>Email</label>
                            <input type="email" name="email" value="{{ Auth::user()->email }}" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label>New Password <small class="text-muted">(optional)</small></label>
                            <input type="password" name="password" class="form-control">
                        </div>

                        <button class="btn btn-primary">Update Profile</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
