<!-- resources/views/trainingsells/edit.blade.php -->
@extends('layouts.app')

@section('contents')
<div class="container">
    <h1>Edit Training Sell</h1>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('trainingsells.update', $trainingsell->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="member_id">Member ID</label>
            <input type="number" name="member_id" class="form-control" value="{{ $trainingsell->member_id }}" required>
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
            <input type="number" name="total_amount" class="form-control" value="{{ $trainingsell->total_amount }}" required>
        </div>
        <div class="form-group">
            <label for="payment_status">Payment Status</label>
            <select name="payment_status" class="form-control" required>
                <option value="on going" {{ $trainingsell->payment_status == 'on going' ? 'selected' : '' }}>On Going</option>
                <option value="upcoming due" {{ $trainingsell->payment_status == 'upcoming due' ? 'selected' : '' }}>Upcoming Due</option>
                <option value="expired" {{ $trainingsell->payment_status == 'expired' ? 'selected' : '' }}>Expired</option>
            </select>
        </div>
        <div class="form-group">
            <label for="payment_method">Payment Method</label>
            <select name="payment_method" class="form-control" required>
                <option value="cash" {{ $trainingsell->payment_method == 'cash' ? 'selected' : '' }}>Cash</option>
                <option value="e-wallet" {{ $trainingsell->payment_method == 'e-wallet' ? 'selected' : '' }}>E-wallet</option>
            </select>
        </div>
        <div class="form-group">
            <label for="trainer">Trainer</label>
            <select name="trainer" class="form-control" required>
                @foreach($staff as $member)
                    <option value="{{ $member->name }}" {{ $trainingsell->trainer == $member->name ? 'selected' : '' }}>{{ $member->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" class="form-control">{{ $trainingsell->description }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
