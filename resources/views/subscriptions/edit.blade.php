@extends('layouts.app')

@section('contents')
<div class="container">
    <h1>Edit Subscription</h1>
    <form action="{{ route('subscriptions.update', $subscription->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="member_id">Member ID</label>
            <select name="member_id" class="form-control" required>
                @foreach ($members as $member)
                    <option value="{{ $member->member_id }}" {{ $subscription->member_id == $member->member_id ? 'selected' : '' }}>
                        {{ $member->member_id }} - {{ $member->user->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="membership_type">Membership Type</label>
            <input type="text" name="membership_type" class="form-control" value="{{ old('membership_type', $subscription->membership_type) }}" required>
        </div>
        <div class="form-group">
            <label for="start_date">Start Date</label>
            <input type="date" name="start_date" class="form-control" value="{{ old('start_date', $subscription->start_date) }}" required>
        </div>
        <div class="form-group">
            <label for="end_date">End Date</label>
            <input type="date" name="end_date" class="form-control" value="{{ old('end_date', $subscription->end_date) }}" required>
        </div>
        <div class="form-group">
            <label for="member_status">Member Status</label>
            <select name="member_status" class="form-control" required>
                <option value="active" {{ $subscription->member_status == 'active' ? 'selected' : '' }}>Active</option>
                <option value="inactive" {{ $subscription->member_status == 'inactive' ? 'selected' : '' }}>Inactive</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update Subscription</button>
    </form>
</div>
@endsection
