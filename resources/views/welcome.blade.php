@extends('layouts.app')

@section('title', 'Welcome to GharKoSaman')

@section('content')
<div class="container py-5">

    {{-- Hero Section --}}
    <div class="text-center mb-5">
        <h1 class="display-4 fw-bold">Welcome to GharKoSaman</h1>
        <p class="lead text-muted">Your trusted partner for daily essentials, delivered instantly in Pokhara!</p>
        <a href="{{ route('products.index') }}" class="btn btn-success px-4 py-2">Shop Now</a>
    </div>

    {{-- Top Products Section --}}
    <h2 class="mb-4">Top Products</h2>

    <div class="row row-cols-1 row-cols-md-4 g-4">
        @foreach ($products as $product)
            <div class="col">
                <div class="card h-100 shadow-sm">
                    <img src="{{ asset($product->images_url) }}" class="card-img-top" alt="{{ $product->name }}" style="height: 200px; object-fit: contain;">
                    <div class="card-body text-center">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text text-muted">Rs. {{ $product->price }}</p>
                        <a href="#" class="btn btn-outline-success btn-sm">Add to Cart</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

</div>
@endsection

