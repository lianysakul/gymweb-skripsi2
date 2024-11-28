<!-- resources/views/trainingsells/create.blade.php -->
@extends('layouts.app')

@section('contents')
<div class="container">
    <h1>Create Training Sell</h1>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('trainingsells.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="member_id">Member ID</label>
            <input type="number" name="member_id" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="training_type">Training Type</label>
            <select name="training_type" class="form-control" required>
                @foreach($training_products as $product)
                    <option value="{{ $product->title }}">{{ $product->title }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="total_amount">Total Amount</label>
            <input type="number" name="total_amount" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="payment_status">Payment Status</label>
            <select name="payment_status" class="form-control" required>
                <option value="on going">On Going</option>
                <option value="upcoming due">Upcoming Due</option>
                <option value="expired">Expired</option>
            </select>
        </div>
        <div class="form-group">
            <label for="payment_method">Payment Method</label>
            <select name="payment_method" class="form-control" required>
                <option value="cash">Cash</option>
                <option value="e-wallet">E-wallet</option>
            </select>
        </div>
        <div class="form-group">
            <label for="trainer">Trainer</label>
            <select name="trainer" class="form-control" required>
                <option value="none">No Trainer</option>
                @foreach($staff as $member)
                    <option value="{{ $member->name }}">{{ $member->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" class="form-control"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
