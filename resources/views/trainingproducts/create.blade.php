@extends('layouts.app')

@section('contents')
<div class="container">
    <h1>Add Training Product</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('trainingproducts.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" class="form-control" value="{{ old('title') }}">
        </div>
        <div class="form-group">
            <label for="product_code">Product Code</label>
            <input type="text" name="product_code" class="form-control" value="{{ old('product_code') }}">
        </div>
        <div class="form-group">
            <label for="facilities">Facilities</label>
            <textarea name="facilities" class="form-control">{{ old('facilities') }}</textarea>
        </div>

        <div id="prices-container">
            <h3>Prices</h3>
            <div class="price-item">
                <label for="prices[0][facility_option]">Facility Option</label>
                <input type="text" name="prices[0][facility_option]" value="{{ old('prices[0][facility_option]') }}">
                
                <label for="prices[0][price]">Price (Rupiah)</label>
                <input type="number" name="prices[0][price]" class="form-control" value="{{ old('prices[0][price]') }}">
            </div>
        </div>
        <button type="button" class="btn btn-secondary" onclick="addPriceField()">Add Price</button>
        <button type="submit" class="btn btn-primary">Add Product</button>
    </form>
</div>

<script>
    let priceIndex = 1;

    function addPriceField() {
        const container = document.getElementById('prices-container');
        const newPriceItem = document.createElement('div');
        newPriceItem.classList.add('price-item');

        newPriceItem.innerHTML = `
            <label for="prices[${priceIndex}][facility_option]">Facility Option</label>
            <input type="text" name="prices[${priceIndex}][facility_option]" class="form-control" required>
            
            <label for="prices[${priceIndex}][price]">Price (Rupiah)</label>
            <input type="number" name="prices[${priceIndex}][price]" class="form-control" required>
        `;

        container.appendChild(newPriceItem);
        priceIndex++;
    }
</script>
@endsection
