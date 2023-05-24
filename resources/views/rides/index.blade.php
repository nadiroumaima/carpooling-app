@extends('layouts.app')


@section('content')
<form method="GET" action="{{ route('rides.index') }}" class="mb-3">
    <div class="form-row">
        <div class="col-md-4">
            <label for="destination">Going to</label>
            <input id="destination" type="text" class="form-control" name="destination" value="{{ request()->query('destination') }}" placeholder="Enter destination">
        </div>
        <div class="col-md-4">
            <label for="departure">Leaving from</label>
            <input id="departure" type="text" class="form-control" name="departure" value="{{ request()->query('departure') }}" placeholder="Enter departure place">
        </div>
        <div class="col-md-4">
            <button type="submit" class="btn btn-primary">Filter</button>
            <a href="{{ route('rides.index') }}" class="btn btn-link">Clear Filter</a>
        </div>
    </div>
</form>
    <div class="container rides-list">
        <h1>Choose Your Ride</h1>
        

        
        


        @if (count($rides) > 0)
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Driver id</th>
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
                            <td>{{ $ride->driver_id }}</td>
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
            padding: 30px;
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
        form {
  background-color: #1a202c;
  color: white;
  padding: 20px;
  border-radius: 10px;
  margin-bottom: 20px;
  width: 50%;
  display: flex;
  align-items: center;
}



form label {
  color: white;
  font-weight: bold;
}

form input[type="text"] {
  background-color: #2d3748;
  color: white;
  border: none;
  padding: 10px;
  border-radius: 5px;
}

form button[type="submit"],
form a.btn {
  background-color: #4a5568;
  color: white;
  border: none;
  padding: 10px 20px;
  margin-top: 10px;
  border-radius: 5px;
  cursor: pointer;
}

form button[type="submit"]:hover,
form a.btn:hover {
  background-color: #718096;
}


    </style>
@endsection
