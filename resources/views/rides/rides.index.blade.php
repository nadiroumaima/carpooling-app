
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Rides</title>
	<link rel="stylesheet" href="{{ asset('css/rides.css') }}">
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
