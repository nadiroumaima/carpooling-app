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
                                    <td>{{ $ride->from }}</td>
                                </tr>
                                <tr>
                                    <td>{{ __('Destination') }}</td>
                                    <td>{{ $ride->to }}</td>
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
                                    <td>{{ $ride->available_seats }}</td>
                                </tr>
                                <tr>
                                    <td>{{ __('Price per Seat') }}</td>
                                    <td>{{ 50 }}</td>
                                </tr>
                            </tbody>
                        </table>

                                    @if (auth()->check()) {{-- Check if the user is authenticated --}}
                                    <button class="btn btn-primary" id="reserve-btn">Reserve</button>
                                    <form id="reserve-form" action="{{ route('rides.reserve', ['ride' => $ride->id]) }}" method="POST" style="display: none;">
                                        @csrf
                                        <div class="form-group">
                                            <label for="num_passengers">Number of Passengers:</label>
                                            <input type="number" name="num_passengers" id="num_passengers" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="notes">Notes:</label>
                                            <textarea name="notes" id="notes" class="form-control"></textarea>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Reserve</button>
                                    </form>
                                @else
                                    <p>Please login to reserve a seat.</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <script>
                document.getElementById('reserve-btn').addEventListener('click', function() {
                    document.getElementById('reserve-form').style.display = 'block';
                    this.style.display = 'none';
                });
            </script>
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
