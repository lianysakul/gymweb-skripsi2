@extends('layouts.app')

@section('contents')
<div class="container">
    <h1>Staff List</h1>
    
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if (Auth::user()->is_role == 2)
        <div class="mb-3">
            <a href="{{ route('staff.create') }}" class="btn btn-success mb-3">Add New Staff</a>
        </div>
    @endif
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Gender</th>
                <th>Position</th>
                <th>Hire Date</th>
                <th>Phone Number</th>
                <th>Status</th>
                @if(Auth::user()->is_role == 2)
                <th>Actions</th>
                @endif
            </tr>
        </thead>
        <tbody>
            @forelse($staff as $member)
                <tr>
                    <td>{{ $member->id }}</td>
                    <td>{{ $member->name }}</td>
                    <td>{{ $member->gender }}</td>
                    <td>{{ $member->position }}</td>
                    <td>{{ $member->hire_date }}</td>
                    <td>{{ $member->phone_number }}</td>
                    <td>
                        <span style="
                            @if($member->status == 'active') background-color: green; color: white; padding: 5px; border-radius: 3px;
                            @elseif($member->status == 'inactive') background-color: red; color: white; padding: 5px; border-radius: 3px;
                            @endif
                        ">
                            {{ $member->status }}
                        </span>
                    </td>
                    @if(Auth::user()->is_role == 2)
                    <td>
                        <a href="{{ route('staff.show', $member->id) }}" class="btn btn-info">View</a>
                        <a href="{{ route('staff.edit', $member->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('staff.destroy', $member->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                    @endif
                </tr>
            @empty
                <tr>
                    <td colspan="8">No staff found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
