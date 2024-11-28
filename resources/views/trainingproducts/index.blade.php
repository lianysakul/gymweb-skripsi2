@extends('layouts.app')

@section('contents')
<div class="container">
    <h1>Training Products</h1>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    @if (Auth::user()->is_role == 2)
        <div class="mb-3">
            <a href="{{ route('trainingproducts.create') }}" class="btn btn-success mb-3">Add Product</a>
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Product Code</th>
                <th>Facilities</th>
                <th>Prices</th>
                @if (Auth::user()->is_role == 2)
                    <th>Action</th>
                @endif
            </tr>
        </thead>
        <tbody>
            @foreach ($trainingproducts as $trainingproduct)
                <tr>
                    <td>{{ $trainingproduct->id }}</td>
                    <td>{{ $trainingproduct->title }}</td>
                    <td>{{ $trainingproduct->product_code }}</td>
                    <td>{{ $trainingproduct->facilities }}</td>
                    <td>
                        <ul>
                            @foreach ($trainingproduct->prices as $price)
                                <li>{{ $price->facility_option }}: Rp {{ number_format($price->price, 0, ',', '.') }}</li>
                            @endforeach
                        </ul>
                    </td>
                    @if (Auth::user()->is_role == 2)
                        <td>
                            <a href="{{ route('trainingproducts.edit', $trainingproduct->id) }}" class="btn btn-primary">Edit</a>
                            <form action="{{ route('trainingproducts.destroy', $trainingproduct->id) }}" method="POST" style="display:inline-block;">
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
