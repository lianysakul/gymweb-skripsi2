@extends('layouts.app')

@section('contents')

<div class="container">
    <h1>Add New Supplement Product</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('mysupplementproducts.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" class="form-control" value="{{ old('title') }}">
        </div>

        <div class="form-group">
            <label for="price">Prices (Rupiah)</label>
            <input type="number" name="price" class="form-control" value="{{ old('price') }}">
        </div>

        <div class="form-group">
            <label for="product_code">Product Code</label>
            <input type="text" name="product_code" class="form-control" value="{{ old('product_code') }}">
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" class="form-control">{{ old('description') }}</textarea>
        </div>

        <div class="form-group">
            <label for="category">Category</label>
            <textarea name="category" class="form-control">{{ old('category') }}</textarea>
        </div>

        <button type="submit" class="btn btn-success">Add Product</button>
    </form>
</div>
@endsection
