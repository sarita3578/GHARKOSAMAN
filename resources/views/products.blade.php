{{-- resources/views/products.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>All Products - GharKoSaman</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .product-card:hover { box-shadow: 0 4px 10px rgba(0,0,0,0.1); transform: scale(1.02); transition: 0.3s; }
    </style>
</head>
<body>

@include('layouts.navbar')

<div class="container py-5">

    <h2 class="text-center mb-4">Browse All Products</h2>

    {{-- Filter, Sort & Search --}}
    <form method="GET" action="{{ route('products.index') }}" class="row mb-4">
        <div class="col-md-3">
            <select name="category" class="form-select" onchange="this.form.submit()">
                <option value="">All Categories</option>
                @foreach ($categories as $cat)
                    <option value="{{ $cat->id }}" {{ request('category') == $cat->id ? 'selected' : '' }}>
                        {{ $cat->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="col-md-3">
            <select name="sort" class="form-select" onchange="this.form.submit()">
                <option value="">Sort by Price</option>
                <option value="low_high" {{ request('sort') == 'low_high' ? 'selected' : '' }}>Low to High</option>
                <option value="high_low" {{ request('sort') == 'high_low' ? 'selected' : '' }}>High to Low</option>
            </select>
        </div>

        <div class="col-md-6">
            <input type="text" name="search" value="{{ request('search') }}" placeholder="Search products..." class="form-control" onblur="this.form.submit()">
        </div>
    </form>

    {{-- Products Grid --}}
    <div class="row">
        @forelse ($products as $product)
            <div class="col-md-3 mb-4">
                <div class="card product-card h-100">
                    <img src="{{ asset($product->image_url) }}" alt="{{ $product->name }}" class="card-img-top">
                    <div class="card-body text-center d-flex flex-column">
                        <h6 class="card-title">{{ $product->name }}</h6>
                        <p class="card-text mb-2">Rs. {{ $product->price }}</p>
                        <form action="{{ route('cart.add', $product->id) }}" method="POST" class="mt-auto">
                            @csrf
                            <button class="btn btn-sm btn-success">Add to Cart</button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <p class="text-center mt-5">No products found.</p>
        @endforelse
    </div>

    <div class="d-flex justify-content-center mt-4">
        {{ $products->withQueryString()->links() }}
    </div>

</div>

@include('layouts.footer')

</body>
</html>
