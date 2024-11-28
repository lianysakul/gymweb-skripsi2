@extends('layouts.app')

@section('contents')
<div class="container">
    <h1>{{ $product->title }}</h1>

    <p><strong>Price:</strong> {{ $product->price }}</p>
    <p><strong>Product Code:</strong> {{ $product->product_code }}</p>
    <p><strong>Facilities:</strong> {{ $product->facilities }}</p>

    @if (Auth::user()->is_role == 2)
        <a href="{{ route('trainingproducts.edit', $product->id) }}" class="btn btn-primary">Edit</a>
        <form action="{{ route('trainingproducts.destroy', $product->id) }}" method="POST" style="display:inline-block;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>
    @endif
</div>
@endsection
