@extends('layouts.app')

@section('contents')
<div class="container">
    <h1>Edit Member</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('members.update', $member->member_id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control" value="{{ $member->name }}" required>
        </div>
        
        <div class="form-group">
            <label for="phone_number">Phone Number</label>
            <input type="text" name="phone_number" class="form-control" value="{{ $member->phone_number }}" required>
        </div>

        <div class="form-group">
            <label for="member_status">Status</label>
            <select name="member_status" class="form-control" required>
                <option value="active" {{ $member->member_status == 'active' ? 'selected' : '' }}>Active</option>
                <option value="inactive" {{ $member->member_status == 'inactive' ? 'selected' : '' }}>Inactive</option>
            </select>
        </div>

        <div class="form-group">
            <label for="membership_plan">Membership Plan</label>
            <input type="text" name="membership_plan" class="form-control" value="{{ $member->membership_plan }}" required>
        </div>

        <div class="form-group">
            <label for="birth_place">Birth Place</label>
            <input type="text" name="birth_place" class="form-control" value="{{ $member->birth_place }}">
        </div>

        <div class="form-group">
            <label for="birth_date">Birth Date</label>
            <input type="date" name="birth_date" class="form-control" value="{{ $member->birth_date }}">
        </div>

        <div class="form-group">
            <label for="address">Address</label>
            <input type="text" name="address" class="form-control" value="{{ $member->address }}">
        </div>
        
        <div class="form-group">
            <label for="member_status_in_gym">Member Status In Gym</label>
            <select name="member_status_in_gym" class="form-control">
                <option value="active" {{ $member->member_status_in_gym == 'active' ? 'selected' : '' }}>Active</option>
                <option value="inactive" {{ $member->member_status_in_gym == 'inactive' ? 'selected' : '' }}>Inactive</option>
            </select>
        </div>
        
        <div class="form-group">
            <label for="member_in_gym_on">Member In Gym On</label>
            <input type="date" name="member_in_gym_on" class="form-control" value="{{ $member->member_in_gym_on }}">
        </div>

        <button type="submit" class="btn btn-primary">Update Member</button>
    </form>

    @if (in_array(Auth::user()->is_role, [1, 2]))
        <a href="{{ url('camera-permission') }}" class="btn btn-primary mt-3">Cam Scanner</a>
    @endif
</div>
@endsection
