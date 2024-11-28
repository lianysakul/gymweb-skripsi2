@extends('layouts.app')

@section('contents')
<div class="container">
    <h1>Subscription Details</h1>

    <div class="row">
        <div class="col-md-6">
            <label class="labels">Member ID</label>
            <p>{{ $subscription->member->member_id }}</p>
        </div>
        <div class="col-md-6">
            <label class="labels">Name</label>
            <p>{{ $subscription->member->user->name }}</p>
        </div>
        <div class="col-md-6">
            <label class="labels">Membership Type</label>
            <p>{{ $subscription->membership_type }}</p>
        </div>
        <div class="col-md-6">
            <label class="labels">Start Date</label>
            <p>{{ $subscription->start_date }}</p>
        </div>
        <div class="col-md-6">
            <label class="labels">End Date</label>
            <p>{{ $subscription->end_date }}</p>
        </div>
        <div class="col-md-6">
            <label class="labels">Member Status</label>
            <p>{{ $subscription->member_status }}</p>
        </div>
    </div>
</div>
@endsection
