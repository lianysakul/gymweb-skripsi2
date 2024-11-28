@extends('layouts.app')

@section('contents')
<div class="container">
    <h1>Member Details</h1>

    <div class="row">
        <div class="col-md-6">
            <label class="labels">Member ID</label>
            <p>{{ $member->member_id }}</p>
        </div>
        <div class="col-md-6">
            <label class="labels">Name</label>
            <p>{{ $member->name }}</p>
        </div>
        <div class="col-md-6">
            <label class="labels">Email</label>
            <p>{{ $member->user->email }}</p>
        </div>
        <div class="col-md-6">
            <label class="labels">Member Status</label>
            <p>{{ $member->member_status }}</p>
        </div>
        <div class="col-md-6">
            <label class="labels">Membership Plan</label>
            <p>{{ $member->membership_plan }}</p>
        </div>
        <div class="col-md-6">
            <label class="labels">Place of Birth</label>
            <p>{{ $member->birth_place }}</p>
        </div>
        <div class="col-md-6">
            <label class="labels">Birth Date</label>
            <p>{{ $member->birth_date }}</p>
        </div>
        <div class="col-md-6">
            <label class="labels">Address</label>
            <p>{{ $member->address }}</p>
        </div>
        <div class="col-md-6">
            <label class="labels">Phone Number</label>
            <p>{{ $member->phone_number }}</p>
        </div>
        <div class="col-md-6">
            <label class="labels">Join Date</label>
            <p>{{ $member->join_date }}</p>
        </div>
        <div class="col-md-6">
            <label class="labels">Member Status In Gym</label>
            <p>{{ $member->member_status_in_gym ?? 'Inactive' }}</p>
        </div>
        <div class="col-md-6">
            <label class="labels">Member In Gym On</label>
            <p>{{ $member->member_in_gym_on ?? 'N/A' }}</p>
        </div>
    </div>

    @if (in_array(Auth::user()->is_role, [1, 2]))
        <a href="{{ url('camera-permission') }}" class="btn btn-primary mt-3">Cam Scanner</a>
    @endif

    @if (Auth::user()->is_role == 2)
        <a href="{{ route('members.edit', $member->member_id) }}" class="btn btn-primary mt-3">Update Member</a>
    @endif
</div>
@endsection
