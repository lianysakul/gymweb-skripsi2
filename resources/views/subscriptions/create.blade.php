@extends('layouts.app')

@section('contents')
<div class="container">
    <h1>Add Subscription</h1>
    <form action="{{ route('subscriptions.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="member_id">Member ID</label>
            <select name="member_id" class="form-control" required>
                @foreach ($members as $member)
                    <option value="{{ $member->member_id }}">{{ $member->member_id }} - {{ $member->user->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="membership_type">Membership Type</label>
            <input type="text" name="membership_type" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="start_date">Start Date</label>
            <input type="date" name="start_date" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="end_date">End Date</label>
            <input type="date" name="end_date" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="member_status">Member Status</label>
            <select name="member_status" class="form-control" required>
                <option value="active">Active</option>
                <option value="inactive">Inactive</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Add Subscription</button>
    </form>
</div>
@endsection
