
<!DOCTYPE html>
<html>
<head>
	<title>Rides</title>
	<link href="{{ asset('css/rides.css') }}" rel="stylesheet">
    <style >
        /* Set background color for the page */
body {
    background-color: #f5f5f5;
  }
  
  /* Center the rides container */
  .container {
    margin: auto;
    max-width: 800px;
  }
  
  /* Style the table */
  table {
    width: 100%;
    border-collapse: collapse;
    background-color: white;
    box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
  }
  
  th, td {
    padding: 12px 15px;
    text-align: left;
    border-bottom: 1px solid #ddd;
  }
  
  th {
    background-color: #4CAF50;
    color: white;
  }
  
  /* Style the "Book Now" button */
  .book-now-btn {
    display: inline-block;
    background-color: #4CAF50;
    color: white;
    padding: 10px 20px;
    border-radius: 5px;
    text-decoration: none;
  }
  
  .book-now-btn:hover {
    background-color: #3e8e41;
  }
  
  /* Style the "Add Ride" button */
  .add-ride-btn {
    display: inline-block;
    background-color: #2196F3;
    color: white;
    padding: 10px 20px;
    border-radius: 5px;
    text-decoration: none;
    float: right;
    margin-bottom: 10px;
  }
  
  .add-ride-btn:hover {
    background-color: #0b7dda;
  } 
  </style>
</head>

<body>
	<div class="container">
		<h1>Rides</h1>
		<table>
			<thead>
				<tr>
					<th>Origin</th>
					<th>Destination</th>
					<th>Departure Time</th>
					<th>Available Seats</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($rides as $ride)
					<tr>
						<td>{{ $ride->origin }}</td>
						<td>{{ $ride->destination }}</td>
						<td>{{ $ride->departure_time }}</td>
						<td>{{ $ride->available_seats }}</td>
						<td>
							<a href="{{ route('rides.show', $ride) }}" class="btn btn-primary">View Details</a>
							<a href="{{ route('rides.reserve', $ride) }}" class="btn btn-success">Reserve Seat</a>
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</body>
</html>