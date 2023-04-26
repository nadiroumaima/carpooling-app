
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Rides</h1>

        @if (count($rides) > 0)
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Driver Name</th>
                        <th>From</th>
                        <th>To</th>
                        <th>Departure Time</th>
                        <th>Available Seats</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($rides as $ride)
                        <tr>
                            <td>{{ $ride->id }}</td>
                            <td>{{ $ride->driver_name }}</td>
                            <td>{{ $ride->from }}</td>
                            <td>{{ $ride->to }}</td>
                            <td>{{ $ride->departure_time }}</td>
                            <td>{{ $ride->available_seats }}</td>
                            <td><a href="{{ route('rides.show', $ride->id) }}">View Details</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>No rides found.</p>
        @endif
    </div>
@endsection