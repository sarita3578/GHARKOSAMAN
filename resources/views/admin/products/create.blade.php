
@extends('admin.layouts.app')

@section('content')
<div class="container py-4">
    <h4>Add New Product</h4>

    <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label>Product Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Category</label>
            <select name="category_id" class="form-select" required>
                <option disabled selected>Select category</option>
                @foreach ($categories as $cat)
                    <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Price (Rs.)</label>
            <input type="number" name="price" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Product Image</label>
            <input type="file" name="image" class="form-control">
        </div>

        <button class="btn btn-success">Create Product</button>
    </form>
</div>
@endsection
