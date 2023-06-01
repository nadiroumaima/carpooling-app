

@extends('layouts.app')

@section('content')
    <h1>Notifications</h1>

    <ul>
        @forelse ($notifications as $notification)
            <li>
                <strong>Message:</strong> {{ $notification->data['message'] }}<br>
                <strong>User:</strong> {{ $notification->data['user_name'] }}<br>
                <strong>Email:</strong> {{ $notification->data['user_email'] }}<br>
                <strong>Ride ID:</strong> {{ $notification->data['ride_id'] }}<br>
                <strong>Departure Time:</strong> {{ $notification->data['departure_time'] }}<br>
                <strong>Pickup Location:</strong> {{ $notification->data['pickup_location'] }}<br>
            </li>
        @empty
            <li>No notifications</li>
        @endforelse
    </ul>
@endsection