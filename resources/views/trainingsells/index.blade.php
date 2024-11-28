<!-- resources/views/trainingsells/index.blade.php -->
@extends('layouts.app')

@section('contents')
<div class="container">
    <h1>Training Sells</h1>
    
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if (Auth::user()->is_role == 2)
    <div class="mb-3">
        <a href="{{ route('trainingsells.create') }}" class="btn btn-primary mb-3">Create New Training Sell</a>
    </div>
    @endif
    <div class="mb-3">
        @if($user->is_role == 1 || $user->is_role == 2)
        <strong>Total Revenue:</strong> Rp{{ number_format($totalRevenue, 0, ',', '.') }} <br>        
        @endif
        <strong>Current Date:</strong> {{ $currentDate }}
    </div>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Member ID</th>
                <th>Training Type</th>
                <th>Total Amount</th>
                <th>Payment Status</th>
                <th>Payment Method</th>
                <th>Trainer</th>
                <th>Created On</th>
                <th>Description</th>
                @if($user->is_role == 2)
                <th>Actions</th>
                @endif
            </tr>
        </thead>
        <tbody>
            @forelse($trainingsells as $trainingsell)
                <tr>
                    <td>{{ $trainingsell->member_id }}</td>
                    <td>{{ $trainingsell->training_type }}</td>
                    <td>Rp{{ number_format($trainingsell->total_amount, 0, ',', '.') }}</td>                    
                    <td>
                        <span style="
                            @if($trainingsell->payment_status == 'on going') background-color: green; color: white; padding: 5px; border-radius: 3px;
                            @elseif($trainingsell->payment_status == 'upcoming due') background-color: yellow; color: black; padding: 5px; border-radius: 3px;
                            @elseif($trainingsell->payment_status == 'expired') background-color: red; color: white; padding: 5px; border-radius: 3px;
                            @endif
                        ">
                            {{ $trainingsell->payment_status }}
                        </span>
                    </td>
                    <td>{{ $trainingsell->payment_method }}</td>
                    <td>{{ $trainingsell->trainer }}</td>
                    <td>{{ $trainingsell->created_on }}</td>
                    <td>{{ $trainingsell->description }}</td>
                    @if($user->is_role == 2)
                    <td>
                        <a href="{{ route('trainingsells.show', $trainingsell->id) }}" class="btn btn-info">View</a>
                        <a href="{{ route('trainingsells.edit', $trainingsell->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('trainingsells.destroy', $trainingsell->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                    @endif
                </tr>
            @empty
                <tr>
                    <td colspan="10">No training sells found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
