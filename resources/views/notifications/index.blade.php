@extends('layouts.app')

@section('content')
<ul>
@forelse ($notifications as $notification)
<li>
<a href="{{ route('rides.map', ['id' => $notification->data['ride_id']]) }}">
<div style="background-color: #85dcc8; padding: 10px; border-radius: 5px; margin-bottom: 10px; cursor: pointer;">
<strong>A new reservation has been made on your ride!</strong><br>
</div>
</a>
</li>
@empty
<li>No notifications</li>
@endforelse
</ul>
@endsection
@section('title', 'Carpoolers')
<style>
h1 {
    color: rgb(177, 251, 226);
}
</style>


