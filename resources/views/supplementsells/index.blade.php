@extends('layouts.app')

@section('contents')
<div class="container">
    <h1>Supplement Sells</h1>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    @if (Auth::user()->is_role == 2)
        <div class="mb-3">
            <a href="{{ route('supplementsells.create') }}" class="btn btn-primary mb-3">Create New Supplement Sell</a>
        </div>
    @endif
    <div class="mb-3">
        @if (Auth::user()->is_role == 1 || Auth::user()->is_role == 2)
            <strong>Total Revenue:</strong> Rp{{ number_format($totalRevenue, 0, ',', '.') }} <br>        
        @endif
        <strong>Current Date:</strong> {{ $currentDate }}
    </div>
    
    <table class="table">
        <thead>
            <tr>
                <th>Member ID</th>
                <th>Supplement Type</th>
                <th>Total Amount</th>
                <th>Payment Method</th>
                <th>Created On</th>
                <th>Description</th>
                @if (Auth::user()->is_role == 2 || Auth::user()->is_role == 1)
                    <th>Action</th>
                @endif
            </tr>
        </thead>
        <tbody>
            @foreach ($supplementsells as $supplementsell)
                <tr>
                    <td>{{ $supplementsell->member_id }}</td>
                    <td>{{ $supplementsell->supplement_type }}</td>
                    <td>Rp{{ number_format($supplementsell->total_amount, 0, ',', '.') }}</td>
                    <td>{{ $supplementsell->payment_method }}</td>
                    <td>{{ $supplementsell->created_at }}</td>
                    <td>{{ $supplementsell->description }}</td>
                    @if (Auth::user()->is_role == 2 || Auth::user()->is_role == 1)
                        <td>
                            @if (Auth::user()->is_role == 2)
                                <a href="{{ route('supplementsells.edit', $supplementsell->id) }}" class="btn btn-primary">Edit</a>
                                <form action="{{ route('supplementsells.destroy', $supplementsell->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            @endif
                            <a href="{{ route('supplementsells.show', $supplementsell->id) }}" class="btn btn-info">View</a>
                        </td>
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
