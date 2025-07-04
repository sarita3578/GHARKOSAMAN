<h4>Product List</h4>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Price (Rs)</th>
            <th>Stock</th>
            <th>Category</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($products as $product)
        <tr>
            <td>{{ $product->id }}</td>
            <td>{{ $product->name }}</td>
            <td>{{ $product->price }}</td>
            <td>{{ $product->stock }}</td>
            <td>{{ $product->category->name ?? 'Uncategorized' }}</td>
        </tr>
        @empty
        <tr><td colspan="5">No products found.</td></tr>
        @endforelse
    </tbody>
</table>
