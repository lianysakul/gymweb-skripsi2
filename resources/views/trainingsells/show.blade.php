<!-- resources/views/trainingsells/show.blade.php -->
@extends('layouts.app')

@section('contents')
<div class="container">
    <h1>Training Sell Details</h1>
    <a href="{{ route('trainingsells.index') }}" class="btn btn-primary mb-3">Back to List</a>
    <table class="table table-bordered">
        <tr>
            <th>Member ID</th>
            <td>{{ $trainingsell->member_id }}</td>
        </tr>
        <tr>
            <th>Training Type</th>
            <td>{{ $trainingsell->training_type }}</td>
        </tr>
        <tr>
            <th>Total Amount</th>
            <td>{{ $trainingsell->total_amount }}</td>
        </tr>
        <tr>
            <th>Payment Status</th>
            <td>{{ $trainingsell->payment_status }}</td>
        </tr>
        <tr>
            <th>Payment Method</th>
            <td>{{ $trainingsell->payment_method }}</td>
        </tr>
        <tr>
            <th>Trainer</th>
            <td>{{ $trainingsell->trainer }}</td>
        </tr>
        <tr>
            <th>Created On</th>
            <td>{{ $trainingsell->created_on }}</td>
        </tr>
        <tr>
            <th>Description</th>
            <td>{{ $trainingsell->description }}</td>
        </tr>
    </table>
    <a href="{{ route('trainingsells.edit', $trainingsell->id) }}" class="btn btn-warning">Edit</a>
    <form action="{{ route('trainingsells.destroy', $trainingsell->id) }}" method="POST" style="display:inline-block;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
    </form>
</div>
@endsection
