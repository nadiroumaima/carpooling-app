@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="ratings-heading">Recent Ratings</h1>
        <table class="rating-table">
            <tr>
                <th>Driver</th>
                <th>Passenger</th>
                <th>Rating</th>
                <th>Additional Comment</th>
                <th>Created at</th>
            </tr>
            @foreach ($ratings as $rating)
                <tr>
                    <td>{{ $rating->driver_id }}</td>
                    <td>{{ $rating->passenger_id }}</td>
                    <td>@for ($i = 1; $i <= $rating->rating; $i++)
                        <span class="star">&#9733;</span>
                    @endfor</td>
                    <td>{{ $rating->comment }}</td>
                    <td>{{ $rating->created_at }}</td>
                </tr>
            @endforeach
        </table>
    </div>

    <style>
        body {
            background-color: #f8f9fa;
        }

        .ratings-heading {
            background-color: #89b39e; /* Similar green color */
            color: #fff;
            font-size: 2.5rem;
            text-align: center;
            border-radius: 10px;
            padding: 10px;
            margin-bottom: 20px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
        }

        .rating-table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
        }

        .rating-table th,
        .rating-table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        .rating-table th {
            background-color: #7c436f;
            color: #fff;
            font-size: 1.5rem;
            font-weight: bold;
        }

        .rating-table tr:nth-child(even) {
            background-color: #f0f5f4; /* Light sage green */
        }
        .star {
            color: #ffce00; /* Yellow star color */
            font-size: 1.5rem;
        }
    </style>
@endsection
