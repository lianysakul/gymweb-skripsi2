@extends('layouts.app')

@section('contents')
<div class="container">
    <h1>Supplement Products</h1>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    @if ($message = Session::get('error'))
        <div class="alert alert-danger">
            <p>{{ $message }}</p>
        </div>
    @endif

    @if (Auth::user()->is_role == 2)
        <div class="mb-3">
            <a href="{{ route('mysupplementproducts.create') }}" class="btn btn-success">Add Product</a>
        </div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Prices</th>
                <th>Product Code</th>
                <th>Description</th>
                <th>Category</th>
                @if (Auth::user()->is_role == 2)
                <th>Action</th>
                @endif
            </tr>
        </thead>
        <tbody>
@foreach ($products as $mysupplementproduct)
    <tr>
        <td>{{ $mysupplementproduct->id }}</td>
        <td>{{ $mysupplementproduct->title }}</td>
        <td>Rp {{ number_format($mysupplementproduct->price, 0, ',', '.') }}</td>
        <td>{{ $mysupplementproduct->product_code }}</td>
        <td>{{ $mysupplementproduct->description }}</td>
        <td>{{ $mysupplementproduct->category }}</td>
        @if (Auth::user()->is_role == 2)
            <td>
                <a href="{{ route('mysupplementproducts.edit', $mysupplementproduct->id) }}" class="btn btn-primary">Edit</a>
                <form action="{{ route('mysupplementproducts.destroy', $mysupplementproduct->id) }}" method="POST" style="display:inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        @endif
    </tr>
@endforeach
        </tbody>
    </table>
</div>
@endsection
