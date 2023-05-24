@extends('layouts.app')

@section('content')
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
<h1>View all the ratings</h1>
<table border = "1">
<tr>
<th>Driver</th>
<th>Passenger</th>
<th>Rating</th>
<th>Additional Comment</th>
<th>Created at</th>
<th>Updated at</th>
</tr>
@foreach ($ratings as $rating)
<tr>
<td>{{ $rating->driver_id }}</td>
<td>{{ $rating->passenger_id }}</td>
<td>{{ $rating->rating }}</td>
<td>{{ $rating->comment }}</td>
<td>{{ $rating->created_at }}</td>
<td>{{ $rating->updated_at }}</td>
</tr>
@endforeach
</table>
</body>
</html>
