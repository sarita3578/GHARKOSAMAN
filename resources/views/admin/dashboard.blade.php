
@extends('admin.layouts.app')

@section('content')
<div class="container py-4">

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <h3>Admin Dashboard</h3>

    {{-- Dashboard Summary --}}
    <div class="row my-4">
        <div class="col-md-4">
            <div class="card p-3 bg-light text-center">
                <strong>Total Orders:</strong>
                <h4>{{ $totalOrders }}</h4>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card p-3 bg-light text-center">
                <strong>Total Users:</strong>
                <h4>{{ $totalUsers }}</h4>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card p-3 bg-light text-center">
                <strong>Total Revenue:</strong>
                <h4>Rs. {{ number_format($totalRevenue, 2) }}</h4>
            </div>
        </div>
    </div>

    {{-- Orders Section --}}
    <h4>All Orders</h4>
    <table class="table table-bordered">
        <thead>
            <tr><th>ID</th><th>User</th><th>Total</th><th>Status</th><th>Action</th></tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
                <tr>
                    <td>#{{ $order->id }}</td>
                    <td>{{ $order->user->name ?? 'Guest' }}</td>
                    <td>Rs. {{ number_format($order->total, 2) }}</td>
                    <td>{{ $order->status }}</td>
                    <td>
                        @if($order->user)
                            <a href="{{ route('admin.user.details', $order->user->id) }}" class="btn btn-sm btn-primary">View Customer</a>
                        @else
                            <span class="text-muted">N/A</span>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <hr class="my-4">

    {{-- Categories Section --}}
    <h4>Manage Categories</h4>
    <form action="{{ route('admin.categories.store') }}" method="POST" class="row g-2 mb-3">
        @csrf
        <div class="col-md-6">
            <input type="text" name="name" class="form-control" placeholder="New Category Name" required>
        </div>
        <div class="col-md-3">
            <button type="submit" class="btn btn-success">Add Category</button>
        </div>
    </form>
    <table class="table table-bordered">
        <thead><tr><th>S.N.</th><th>Category</th><th>Action</th></tr></thead>
        <tbody>
            @foreach ($categories as $index => $category)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $category->name }}</td>
                    <td>
                        <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST" onsubmit="return confirm('Delete this category?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <hr class="my-4">

    {{-- Products Section --}}
    <h4>Manage Products</h4>

    {{-- Add New Product --}}
    <form action="{{ route('admin.products.store') }}" method="POST" class="row g-2 mb-3">
        @csrf
        <div class="col-md-3">
            <input type="text" name="name" class="form-control" placeholder="Product Name" required>
        </div>
        <div class="col-md-2">
            <input type="number" name="price" class="form-control" placeholder="Price" required>
        </div>
        <div class="col-md-2">
            <input type="number" name="stock" class="form-control" placeholder="Stock Quantity" min="0" required>
        </div>
        <div class="col-md-3">
            <select name="category_id" class="form-select" required>
                <option value="" disabled selected>Select Category</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-2">
            <button type="submit" class="btn btn-success">Add Product</button>
        </div>
    </form>

    {{-- Product Table --}}
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Product</th>
                <th>Price</th>
                <th>Stock</th>
                <th>Category</th>  <!-- New column -->
                <th style="width: 200px;">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td>#{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>Rs. {{ number_format($product->price, 2) }}</td>
                    <td>{{ $product->stock }}</td>
                    <td>{{ $product->category->name ?? 'Uncategorized' }}</td> <!-- show category -->
                    <td>
                        <!-- Edit Button -->
                        <button class="btn btn-sm btn-warning"
                                data-bs-toggle="modal"
                                data-bs-target="#editProductModal{{ $product->id }}">
                            Edit
                        </button>

                        <!-- Delete Button -->
                        <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this product?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>

                <!-- Edit Modal -->
                <div class="modal fade" id="editProductModal{{ $product->id }}" tabindex="-1" aria-labelledby="editProductModalLabel{{ $product->id }}" aria-hidden="true">
                  <div class="modal-dialog">
                    <form action="{{ route('admin.products.update', $product->id) }}" method="POST">
                      @csrf
                      @method('PUT')
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="editProductModalLabel{{ $product->id }}">Edit Product</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          <div class="mb-3">
                            <label class="form-label">Product Name</label>
                            <input type="text" name="name" class="form-control" value="{{ $product->name }}" required>
                          </div>
                          <div class="mb-3">
                            <label class="form-label">Price</label>
                            <input type="number" name="price" class="form-control" value="{{ $product->price }}" required>
                          </div>
                          <div class="mb-3">
                            <label class="form-label">Stock Quantity</label>
                            <input type="number" name="stock" class="form-control" value="{{ $product->stock }}" min="0" required>
                          </div>
                          <div class="mb-3">
                            <label class="form-label">Category</label>
                            <select name="category_id" class="form-select" required>
                                <option value="" disabled>Select Category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                          </div>
                        </div>
                        <div class="modal-footer">
                          <button type="submit" class="btn btn-success">Update</button>
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
