@extends('layouts.app')

@section('contents')
<div class="container">
    <h1>Profile</h1>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <div class="mb-3">
        <h2>Profile Details</h2>
        <p>Name: {{ $user->name }}</p>
        <p>Email: {{ $user->email }}</p>
        <p>Birth Place: {{ $user->birth_place }}</p>
        <p>Birth Date: {{ $user->birth_date }}</p>
        <p>Address: {{ $user->address }}</p>
        <p>Phone Number: {{ $user->phone_number }}</p>
        @if ($member)
            <p>Membership Plan: {{ $member->membership_plan }}</p>
            <p>Member Status: {{ $member->member_status }}</p>
            <p>Join Date: {{ $member->join_date }}</p>
        @else
            <p>Membership Plan: N/A</p>
            <p>Member Status: N/A</p>
            <p>Join Date: N/A</p>
        @endif
        <!-- Tambahkan informasi profil lainnya di sini -->
    </div>

    @if(Auth::user()->is_role == '0')
        <a href="{{ route('profile.edit') }}" class="btn btn-primary mb-3">Update Profile</a>
    @endif
</div>
@endsection
