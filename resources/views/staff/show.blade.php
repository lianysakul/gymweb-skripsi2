@extends('layouts.app')

@section('contents')
<div class="container">
    <h1>Staff Details</h1>
    <a href="{{ route('staff.index') }}" class="btn btn-primary mb-3">Back to List</a>
    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <td>{{ $staff->id }}</td>
        </tr>
        <tr>
            <th>Name</th>
            <td>{{ $staff->name }}</td>
        </tr>
        <tr>
            <th>Gender</th>
            <td>{{ $staff->gender }}</td>
        </tr>
        <tr>
            <th>Position</th>
            <td>{{ $staff->position }}</td>
        </tr>
        <tr>
            <th>Hire Date</th>
            <td>{{ $staff->hire_date }}</td>
        </tr>
        <tr>
            <th>Phone Number</th>
            <td>{{ $staff->phone_number }}</td>
        </tr>
        <tr>
            <th>Status</th>
            <td>{{ $staff->status }}</td>
        </tr>
    </table>
    <a href="{{ route('staff.edit', $staff->id) }}" class="btn btn-warning">Edit</a>
    <form action="{{ route('staff.destroy', $staff->id) }}" method="POST" style="display:inline-block;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
    </form>
</div>
@endsection
