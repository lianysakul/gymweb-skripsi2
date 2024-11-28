@extends('layouts.app')

@section('contents')
<div class="container">
    <h1>Members</h1>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Status</th>
                <th>Plan</th>
                <th>Join Date</th>
                <th>Phone</th>
                <th>Status In Gym</th>
                <th>In Gym On</th>
                @if (Auth::user()->is_role == 2 || Auth::user()->is_role == 1)
                    <th>Action</th>
                @endif
            </tr>
        </thead>
        <tbody>
            @foreach ($members as $member)
                <tr>
                    <td>{{ $member->member_id }}</td>
                    <td>{{ $member->name }}</td>
                    <td>{{ $member->user->email }}</td>
                    <td>{{ $member->member_status }}</td>
                    <td>{{ $member->membership_plan }}</td>
                    <td>{{ $member->join_date }}</td>
                    <td>{{ $member->phone_number }}</td>
                    <td>{{ $member->member_status_in_gym ?? 'Inactive' }}</td>
                    <td>{{ $member->member_in_gym_on ?? 'N/A' }}</td>
                    @if (Auth::user()->is_role == 2 || Auth::user()->is_role == 1)
                        <td>
                            @if (Auth::user()->is_role == 2)
                                <a href="{{ route('members.edit', $member->member_id) }}" class="btn btn-primary">Edit</a>
                                <form action="{{ route('members.destroy', $member->member_id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            @endif
                            <a href="{{ route('members.show', $member->member_id) }}" class="btn btn-info">View</a>
                            <a href="{{ url('camera-permission') }}" class="btn btn-primary">Cam Scanner</a>
                        </td>
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
