{{-- resources/views/category.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ $category->name }} - Products | GharKoSaman</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .product-card:hover { box-shadow: 0 4px 10px rgba(0,0,0,0.1); transform: scale(1.02); transition: 0.3s; }
    </style>
</head>
<body>

@include('layouts.navbar')

<div class="container py-5">

    <h2 class="mb-4">Category: {{ $category->name }}</h2>

    @if ($products->count())
        <div class="row">
            @foreach ($products as $product)
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
            @endforeach
        </div>

        <div class="d-flex justify-content-center mt-4">
            {{ $products->links() }}
        </div>
    @else
        <p>No products found in this category.</p>
    @endif

</div>

@include('layouts.footer')

</body>
</html>
