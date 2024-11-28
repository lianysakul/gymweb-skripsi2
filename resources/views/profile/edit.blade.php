@extends('layouts.app')

@section('contents')
<div class="container">
    <h1>Edit Profile</h1>
    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $user->name) }}" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control" value="{{ $user->email }}" disabled>
        </div>
        <div class="form-group">
            <label for="birth_place">Birth Place</label>
            <input type="text" name="birth_place" class="form-control" value="{{ old('birth_place', $user->birth_place) }}">
        </div>
        <div class="form-group">
            <label for="birth_date">Birth Date</label>
            <input type="date" name="birth_date" class="form-control" value="{{ old('birth_date', $user->birth_date) }}">
        </div>
        <div class="form-group">
            <label for="address">Address</label>
            <input type="text" name="address" class="form-control" value="{{ old('address', $user->address) }}">
        </div>
        <div class="form-group">
            <label for="phone_number">Phone Number</label>
            <input type="text" name="phone_number" class="form-control" value="{{ old('phone_number', $user->phone_number) }}" required>
        </div>
        <div class="form-group">
            <label for="profile_picture">Profile Picture</label>
            <input type="file" name="profile_picture" class="form-control">
            @if ($user->profile_picture)
                <img src="{{ asset('storage/' . $user->profile_picture) }}" alt="Profile Picture" style="width: 150px; margin-top: 10px;">
            @endif
        </div>
        <div class="form-group">
            <label for="membership_plan">Membership Plan</label>
            <input type="text" name="membership_plan" class="form-control" value="{{ old('membership_plan', $member->membership_plan) }}" required>
        </div>
        <div class="form-group">
            <label for="member_status">Member Status</label>
            <input type="text" name="member_status" class="form-control" value="{{ $member->member_status }}" disabled>
        </div>
        <button type="submit" class="btn btn-primary">Update Profile</button>
    </form>
</div>
@endsection
