@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Ride Details') }}</div>

                    <div class="card-body">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td>{{ __('Source') }}</td>
                                    <td>{{ $ride->source }}</td>
                                </tr>
                                <tr>
                                    <td>{{ __('Destination') }}</td>
                                    <td>{{ $ride->destination }}</td>
                                </tr>
                                <tr>
                                    <td>{{ __('Date') }}</td>
                                    <td>{{ $ride->date }}</td>
                                </tr>
                                <tr>
                                    <td>{{ __('Time') }}</td>
                                    <td>{{ $ride->time }}</td>
                                </tr>
                                <tr>
                                    <td>{{ __('Seats Available') }}</td>
                                    <td>{{ $ride->seats_available }}</td>
                                </tr>
                                <tr>
                                    <td>{{ __('Price per Seat') }}</td>
                                    <td>{{ $ride->price_per_seat }}</td>
                                </tr>
                            </tbody>
                        </table>

                        <a href="{{ route('rides.reserve', ['ride' => $ride]) }}" class="btn btn-primary">{{ __('Reserve a Seat') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection