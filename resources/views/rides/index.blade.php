@extends('layouts.app')

@section('content')
    <div class="container rides-list">
        <h1>Choose Your Ride</h1>

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

    <style>
        .rides-list {
            background-color: #1a202c;
            color: white;
            padding: 20px;
            border-radius: 10px;
        }

        h1 {
            font-size: 40px;
            text-align: center;
            margin-bottom: 20px;
        }

        table {
            color: white;
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 10px;
            text-align: center;
            border-bottom: 1px solid #cbd5e0;
        }

        tr:hover {
            background-color: #4a5568;
        }

        a {
            color: #edf2f7;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        p {
            text-align: center;
            font-size: 20px;
            margin-top: 50px;
        }
    </style>
@endsection
