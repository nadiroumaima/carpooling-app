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
                                    <td>{{ __('Driver_name') }}</td>
                                    <td>{{ $ride->driver_name}}</td>
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
                                    <td>{{ $ride->price_per_seat }}</td>
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




                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .card {
  width: 500px;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  border radius:10px;
}

.card-header {
  background-color: #7c436f; /* Updated background color to match #7c436f */
  font-size: 20px;
  font-weight: bold;
  padding: 20px;
  color: #FFFFFF; /* Updated text color to white */
}

.card-body {
  background-color: #f0e8f0; /* Adjusted background color to complement #7c436f */
  padding: 20px;
}

table {
  border-collapse: collapse;
  width: 100%;
}

th,
td {
  text-align: left;
  padding: 8px;
}

th {
  background-color: #a485a8; /* Adjusted background color to complement #7c436f */
  color: white;
}

tr:nth-child(even) {
  background-color: #e7e1e7; /* Adjusted background color to complement #7c436f */
}

.btn-primary {
  background-color: #7c436f; /* Updated background color to match #7c436f */
  color: white;
  border: none;
  padding: 10px 20px;
  border-radius: 5px;
  font-size: 16px;
  margin-top: 20px;
  display: inline-block;
}
.btn-primary:hover{background-color: #ff6f8e;
      border-color: #393d42;}

    </style>
@endsection
