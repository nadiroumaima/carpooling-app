@extends('layouts.app')

@section('content')
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

</tr>
@foreach ($ratings as $rating)
<tr>
<td>{{ $rating->driver_name }}</td>
<td>{{ $rating->passenger_id }}</td>
<td>  <span class="ratingStars">
    @for ($i = 1; $i <= $rating->rating; $i++)
        <span class="star">&#9733;</span>
    @endfor
</span></td>
<td>{{ $rating->comment }}</td>
<td>{{ $rating->created_at }}</td>

</tr>
@endforeach
</table>
</body>
<style>
    body {
    background-image: url('/tile_background.png');
  }
  .container {
	margin: 50px auto;
	padding: 20px;
	background-color: #baafb3;
	box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);
	border-radius: 5px;
}

h1 {
	font-size: 24px;
	font-weight: bold;
	color: #333333;
	margin-bottom: 20px;
}

table {
	width: 100%;
	border-collapse: collapse;
}

th, td {
	padding: 10px;
	border: 1px solid #EAEAEA;
}

th {
	background-color: #F0F0F0;
	color: #555555;
}

tr:nth-child(even) {
	background-color: #F8F8F8;
}

tr:hover {
	background-color: #EAEAEA;
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
	text-decoration: none;
}
.star {
            color: #ffce00; /* Yellow star color */
            font-size: 1.5rem;
        }

    </style>
    
@endsection