@extends('layouts.app')

@section('contents')
<div class="container">
    <h1>Add Member</h1>
    <form action="{{ route('members.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="member_status">Member Status</label>
            <select name="member_status" class="form-control" required>
                <option value="active">Active</option>
                <option value="inactive">Inactive</option>
            </select>
        </div>
        <div class="form-group">
            <label for="membership_plan">Membership Plan</label>
            <input type="text" name="membership_plan" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="join_date">Join Date</label>
            <input type="date" name="join_date" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="phone_number">Phone Number</label>
            <input type="text" name="phone_number" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="birth_place">Birth Place</label>
            <input type="text" name="birth_place" class="form-control">
        </div>
        <div class="form-group">
            <label for="birth_date">Birth Date</label>
            <input type="date" name="birth_date" class="form-control">
        </div>
        <div class="form-group">
            <label for="address">Address</label>
            <input type="text" name="address" class="form-control">
        </div>
        <div class="form-group">
            <label for="member_status_in_gym">Member Status In Gym</label>
            <select name="member_status_in_gym" class="form-control">
                <option value="active">Active</option>
                <option value="inactive">Inactive</option>
            </select>
        </div>
        <div class="form-group">
            <label for="member_in_gym_on">Member In Gym On</label>
            <input type="date" name="member_in_gym_on" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Add Member</button>
    </form>

    @if (in_array(Auth::user()->is_role, [1, 2]))
        <a href="{{ url('camera-permission') }}" class="btn btn-primary mt-3">Cam Scanner</a>
    @endif
</div>
@endsection
