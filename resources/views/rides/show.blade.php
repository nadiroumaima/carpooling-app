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

    <style>
        .card-header {
            background-color: #E2E8F0;
            font-size: 20px;
            font-weight: bold;
            padding: 20px;
            color: #4A5568;
        }

        .card-body {
            background-color: #EDF2F7;
            padding: 20px;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #A0AEC0;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #D6DBDF;
        }

        a.btn-primary {
            background-color: #2D3748;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 16px;
            margin-top: 20px;
            display: inline-block;
        }
    </style>
@endsection
