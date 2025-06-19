@extends('layouts.app')

@section('title', 'Home')

@section('content')

<div class="container mx-auto px-4 py-8">
    <h1 class="text-2xl font-bold mb-6">Featured Products</h1>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @foreach ($products as $product)
            <div class="border rounded-xl p-4 shadow hover:shadow-md transition text-center">
                {{-- Product Image --}}
                <img src="{{ asset($product->image_url) }}"
     alt="{{ $product->name }}"
     class="w-full h-48 object-cover rounded mb-3">


                {{-- Product Name --}}
                <h2 class="text-lg font-semibold">{{ $product->name }}</h2>

                {{-- Product Price --}}
                <p class="text-gray-600">Rs {{ number_format($product->price, 2) }}</p>
            </div>
        @endforeach
    </div>
</div>

@endsection
