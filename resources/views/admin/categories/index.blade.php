@extends('admin.layouts.app')

@section('content')
<div class="container py-4">
    <h4>Manage Categories</h4>

    {{-- Add new --}}
    <form method="POST" action="{{ route('admin.categories.store') }}" class="d-flex my-3">
        @csrf
        <input type="text" name="name" class="form-control me-2" placeholder="New Category" required>
        <button class="btn btn-success">Add</button>
    </form>

    {{-- List --}}
    <table class="table table-bordered">
        <thead><tr><th>Name</th><th>Action</th></tr></thead>
        <tbody>
            @foreach ($categories as $cat)
            <tr>
                <td>{{ $cat->name }}</td>
                <td>
                    <form action="{{ route('admin.categories.destroy', $cat->id) }}" method="POST" onsubmit="return confirm('Delete?')" class="d-inline">
                        @csrf @method('DELETE')
                        <button class="btn btn-sm btn-danger">Delete</button>
                    </form>
                    <!-- Optional: Add update modal -->
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
