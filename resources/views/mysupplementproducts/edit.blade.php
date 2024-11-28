@extends('layouts.app')

@section('contents')

<div class="container">
    <h1>Edit Supplement Product</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('mysupplementproducts.update', $mysupplementproduct->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" class="form-control" value="{{ $mysupplementproduct->title }}">
        </div>

        <div class="form-group">
            <label for="price">Prices (Rupiah)</label>
            <input type="number" name="price" class="form-control" value="{{ $mysupplementproduct->price }}">
        </div>

        <div class="form-group">
            <label for="product_code">Product Code</label>
            <input type="text" name="product_code" class="form-control" value="{{ $mysupplementproduct->product_code }}">
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" class="form-control">{{ $mysupplementproduct->description }}</textarea>
        </div>

        <div class="form-group">
            <label for="category">Category</label>
            <textarea name="category" class="form-control">{{ $mysupplementproduct->category }}</textarea>
        </div>

        <div class="form-group">
            <label for="images">Current Images</label><br>
            @foreach ($mysupplementproduct->images as $image)
                <img src="{{ asset('storage/' . $image->path) }}" alt="{{ $mysupplementproduct->title }}" class="img-thumbnail" width="100">
            @endforeach
        </div>

        <button type="submit" class="btn btn-success">Update Product</button>
    </form>
</div>

@endsection
