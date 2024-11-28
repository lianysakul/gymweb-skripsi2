@extends('layouts.app')

@section('contents')
<div class="container">
    <h1>Member Status</h1>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Status</th>
                <th>Status In Gym</th>
                <th>Last Active At</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($members as $member)
                <tr>
                    <td>{{ $member->id }}</td>
                    <td>{{ $member->user->name }}</td>
                    <td>{{ $member->user->email }}</td>
                    <td>{{ $member->member_status }}</td>
                    <td>{{ $member->member_status_in_gym }}</td>
                    <td>{{ $member->last_active_at }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
