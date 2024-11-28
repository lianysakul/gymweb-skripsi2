@extends('layouts.app')

@section('contents')
<div class="container">
    <h1>{{ $product->title }}</h1>

    <div class="mb-4">
        @foreach ($product->images as $image)
            <img src="{{ asset('storage/' . $image->path) }}" alt="{{ $product->title }}" class="img-thumbnail" width="100%">
        @endforeach
    </div>
    
    <p><strong>Price:</strong> {{ $product->price }}</p>
    <p><strong>Product Code:</strong> {{ $product->product_code }}</p>
    <p><strong>Description:</strong> {{ $product->description }}</p>
    <p><strong>Category:</strong> {{ $product->category }}</p>

    @if (Auth::user()->is_role == 2)
        <a href="{{ route('mysupplementproducts.edit', $product->id) }}" class="btn btn-primary">Edit</a>
        <form action="{{ route('mysupplementproducts.destroy', $product->id) }}" method="POST" style="display:inline-block;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>
    @endif
</div>
@endsection
