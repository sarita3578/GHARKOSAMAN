<!DOCTYPE html>
<html>
<head>
    <title>{{ $category->name }} - GharKoSaman</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container py-5">

    {{-- Show all categories --}}
    <h3>Browse Categories</h3>
    <div class="mb-4">
        @foreach ($categories as $cat)
            <a href="/category/{{ $cat->id }}" class="btn btn-outline-secondary me-2 mb-2">
                {{ $cat->name }}
            </a>
        @endforeach
    </div>

    {{-- Show products in selected category --}}
    <h2 class="mb-4">Products in "{{ $category->name }}"</h2>
    <div class="row">
        @forelse ($products as $product)
            <div class="col-md-3 mb-4">
                <div class="card h-100">
                    <img src="{{ asset('images/' . $product->image) }}" class="card-img-top" height="150">
                    <div class="card-body">
                        <h5>{{ $product->name }}</h5>
                        <p>Rs. {{ $product->price }}</p>
                    </div>
                </div>
            </div>
        @empty
            <p>No products found in this category.</p>
        @endforelse
    </div>
</div>

</body>
</html>

