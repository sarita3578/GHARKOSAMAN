
@extends('admin.layouts.app')

@section('content')
<div class="container py-4">
    <h4>Edit Product: {{ $product->name }}</h4>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- Product Name -->
        <div class="mb-3">
            <label>Product Name</label>
            <input type="text" name="name" value="{{ old('name', $product->name) }}" class="form-control" required>
        </div>

        <!-- Category -->
        <div class="mb-3">
            <label>Category</label>
            <select name="category_id" class="form-select" required>
                @foreach ($categories as $cat)
                    <option value="{{ $cat->id }}" {{ $product->category_id == $cat->id ? 'selected' : '' }}>
                        {{ $cat->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Price -->
        <div class="mb-3">
            <label>Price (Rs.)</label>
            <input type="number" name="price" value="{{ old('price', $product->price) }}" class="form-control" required>
        </div>

        <!-- Current Image Preview -->
        @if ($product->image)
        <div class="mb-3">
            <label>Current Image</label><br>
            <img src="{{ asset('storage/' . $product->image) }}" width="100" alt="Product Image">
        </div>
        @endif

        <!-- Upload New Image -->
        <div class="mb-3">
            <label>Change Image (optional)</label>
            <input type="file" name="image" class="form-control">
        </div>

        <!-- Submit -->
        <button class="btn btn-primary">Update Product</button>
        <a href="{{ route('admin.products.index') }}" class="btn btn-secondary ms-2">Cancel</a>
    </form>
</div>
@endsection
