@extends('layouts.app')

@section('content')
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