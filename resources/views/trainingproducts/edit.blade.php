@extends('layouts.app')

@section('contents')

<div class="container">
    <h1>Edit Training Product</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('trainingproducts.update', $trainingproduct->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" class="form-control" value="{{ $trainingproduct->title }}">
        </div>
        
        <div class="form-group">
            <label for="product_code">Product Code</label>
            <input type="text" name="product_code" class="form-control" value="{{ $trainingproduct->product_code }}">
        </div>

        <div class="form-group">
            <label for="facilities">Facilities</label>
            <textarea name="facilities" class="form-control">{{ $trainingproduct->facilities }}</textarea>
        </div>

        <div id="prices-container">
            <h3>Prices</h3>
            @foreach ($trainingproduct->prices as $index => $price)
                <div class="price-item">
                    <label for="prices[{{ $index }}][facility_option]">Facility Option</label>
                    <input type="text" name="prices[{{ $index }}][facility_option]" class="form-control" value="{{ $price->facility_option }}" required>
                    
                    <label for="prices[{{ $index }}][price]">Price (Rupiah)</label>
                    <input type="number" name="prices[{{ $index }}][price]" class="form-control" value="{{ $price->price }}" required>
                </div>
            @endforeach
        </div>
        <button type="button" class="btn btn-secondary" onclick="addPriceField()">Add Price</button>
        <button type="submit" class="btn btn-primary">Update Product</button>
    </form>
</div>

<script>
    let priceIndex = {{ $trainingproduct->prices->count() }};

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
