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

                        <form action="{{ route('rides.reserve', ['id' => $ride->id]) }}" method="POST">
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

a.btn-primary {
  background-color: #7c436f; /* Updated background color to match #7c436f */
  color: white;
  border: none;
  padding: 10px 20px;
  border-radius: 5px;
  font-size: 16px;
  margin-top: 20px;
  display: inline-block;
}
a.btn-primary:hover{background-color: #ff6f8e;
      border-color: #393d42;}

    
    </style>
@endsection
