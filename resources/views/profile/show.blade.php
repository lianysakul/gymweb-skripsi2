@extends('layouts.app')

@section('contents')
<div class="container">
    <h1>Profile Details</h1>
    <div class="card">
        <div class="card-header">
            <h2>{{ $user->name }}</h2>
        </div>
        <div class="card-body">
            <p><strong>Email:</strong> {{ $user->email }}</p>
            <p><strong>Birth Place:</strong> {{ $user->birth_place }}</p>
            <p><strong>Birth Date:</strong> {{ $user->birth_date }}</p>
            <p><strong>Address:</strong> {{ $user->address }}</p>
            <p><strong>Phone Number:</strong> {{ $user->phone_number }}</p>
            @if ($user->profile_picture)
                <img src="{{ asset('storage/' . $user->profile_picture) }}" alt="Profile Picture" style="width: 150px;">
            @endif
        </div>
    </div>

    <div class="mt-4">
        <h2>Member Details</h2>
        @if ($member)
            <p><strong>Membership Plan:</strong> {{ $member->membership_plan }}</p>
            <p><strong>Member Status:</strong> {{ $member->member_status }}</p>
            <p><strong>Join Date:</strong> {{ $member->join_date }}</p>
        @else
            <p><strong>Membership Plan:</strong> N/A</p>
            <p><strong>Member Status:</strong> N/A</p>
            <p><strong>Join Date:</strong> N/A</p>
        @endif
    </div>

    @if(Auth::user()->is_role == '0')
        <a href="{{ route('profile.edit') }}" class="btn btn-primary">Update Profile</a>
    @endif
</div>
@endsection
