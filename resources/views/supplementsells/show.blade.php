@extends('layouts.app')

@section('contents')
<div class="container">
    <h1>Supplement Sell Details</h1>
    <a href="{{ route('supplementsells.index') }}" class="btn btn-primary mb-3">Back to List</a>
    <table class="table table-bordered">
        <tr>
            <th>Member ID</th>
            <td>{{ $supplementsell->member_id }}</td>
        </tr>
        <tr>
            <th>Training Type</th>
            <td>{{ $supplementsell->training_type }}</td>
        </tr>
        <tr>
            <th>Total Amount</th>
            <td>{{ $supplementsell->total_amount }}</td>
        </tr>
        <tr>
            <th>Payment Method</th>
            <td>{{ $supplementsell->payment_method }}</td>
        </tr>
        <tr>
            <th>Created On</th>
            <td>{{ $supplementsell->created_on }}</td>
        </tr>
        <tr>
            <th>Description</th>
            <td>{{ $supplementsell->description }}</td>
        </tr>
    </table>
    <a href="{{ route('supplementsells.edit', $supplementsell->id) }}" class="btn btn-warning">Edit</a>
    <form action="{{ route('supplementsells.destroy', $supplementsell->id) }}" method="POST" style="display:inline-block;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
    </form>
</div>
@endsection
