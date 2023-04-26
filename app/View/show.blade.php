@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ $ride->title }}</div>

                    <div class="card-body">
                        <p>{{ $ride->description }}</p>
                        <p>From: {{ $ride->origin }}</p>
                        <p>To: {{ $ride->destination }}</p>
                        <p>Departure time: {{ $ride->departure_time }}</p>
                        <p>Number of seats available: {{ $ride->seats_available }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection