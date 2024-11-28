@extends('layouts.app')

@section('contents')
<div class="container">
    <h1>Subscriptions</h1>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    @if (Auth::user()->is_role == 2)
        <div class="mb-3">
            <a href="{{ route('subscriptions.create') }}" class="btn btn-success">Add Subscription</a>
        </div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>Member ID</th>
                <th>Name</th>
                <th>Membership Type</th>
                <th>Start Date</th>
                <th>End Date</th> <!-- Pastikan kolom ini ada -->
                <th>Member Status</th>
                @if (Auth::user()->is_role == 2 || Auth::user()->is_role == 1 || Auth::user()->is_role == 0)
                    <th>Action</th>
                @endif
            </tr>
        </thead>
        <tbody>
            @foreach ($subscriptions as $subscription)
                <tr>
                    <td>{{ $subscription->member->member_id }}</td>
                    <td>{{ $subscription->member->user->name }}</td>
                    <td>{{ $subscription->membership_type }}</td>
                    <td>{{ $subscription->start_date }}</td>
                    <td>{{ $subscription->end_date }}</td> <!-- Pastikan kolom ini ada -->
                    <td>{{ $subscription->member_status }}</td>
                    @if (Auth::user()->is_role == 2 || Auth::user()->is_role == 1 || Auth::user()->is_role == 0)
                        <td>
                            @if (Auth::user()->is_role == 2)
                                <a href="{{ route('subscriptions.edit', $subscription->id) }}" class="btn btn-primary">Edit</a>
                                <form action="{{ route('subscriptions.destroy', $subscription->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            @endif
                            <a href="{{ route('subscriptions.show', $subscription->id) }}" class="btn btn-info">View</a>
                        </td>
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
