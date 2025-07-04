<h4>Category List</h4>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Products Count</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($categories as $category)
        <tr>
            <td>{{ $category->id }}</td>
            <td>{{ $category->name }}</td>
            <td>{{ $category->products->count() }}</td>
        </tr>
        @empty
        <tr><td colspan="3">No categories found.</td></tr>
        @endforelse
    </tbody>
</table>
