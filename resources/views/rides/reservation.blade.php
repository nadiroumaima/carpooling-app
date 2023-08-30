@extends('layouts.app')

@section('content')
<style>
  body{background: rgb(125,68,111);
background: linear-gradient(0deg, rgba(125,68,111,1) 5%, rgba(145,95,133,1) 45%, rgba(183,149,175,1) 71%, rgba(208,184,203,1) 85%, rgba(211,188,206,1) 85%, rgba(226,209,222,1) 100%, rgba(255,250,255,1) 100%);}
    h1 {
        font-size: 70px;
        font-weight: 600;
        background-image: linear-gradient(45deg, #553c9a, #ee4b2b);
        color: transparent;
        background-clip: text;
        -webkit-background-clip: text;
        text-align: center;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    table th,
    table td {
        padding: 12px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    table th {
        background-color: #ad8bbb;
        font-weight: bold;
        color: #333;
    }

    table tbody tr:nth-child(even) {
        background-color: #ad8bbb;
    }

    table tbody tr:hover {
        background-color: #ffc1b4;
    }
    .drop-button,
    .done-button,
    .rate-button {
        display: inline-block;
        padding: 10px 20px;
        background-color: #dc3545;
        color: #fff;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        text-decoration: none;
        font-size: 14px;
        transition: background-color 0.3s ease;
    }

    .done-button {
        background-color: #28a745;
    }

    

    .drop-button:hover,
    .done-button:hover {
        background-color: #c82333;
    }
    .btn-primary {
  display: inline-block;
  padding: 10px 20px;
  background-color: #007bff;
  color: #fff;
  border: none;
  border-radius: 4px;
  text-decoration: none;
}

.btn-primary:hover {
  background-color: #0069d9;
}

.btn-primary:focus,
.btn-primary.focus {
  outline: none;
  box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.5);
}

</style>
<body>
<h1>My reservations</h1>

@if(count($reservations) > 0)
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Source</th>
            <th>Destination</th>
            <th>Notes</th>
            <th>Status</th>
            <th>Created At</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($reservations as $reservation)
                @if($reservation->user_id == auth()->user()->id)
                    <tr>
                        <td>{{ $reservation->id }}</td>
                        <td>{{ $reservation->ride->from }}</td>
                        <td>{{ $reservation->ride->to }}</td>
                        <td>{{ $reservation->notes }}</td>
                        <td>
                            @if ($reservation->is_done == 1)
                                Done
                            @elseif ($reservation->is_dropped == 1)
                                Dropped
                            @else
                                Pending
                            @endif
                        </td>
                        <td>{{ $reservation->created_at }}</td>
                        <td>
                            @if($reservation->is_done == 0 && $reservation->is_dropped == 0)
                                <a href="{{ route('reservations.drop', ['id' => $reservation->id]) }}" class="drop-button">Drop Reservation</a>
                                <a href="{{ route('reservations.markAsDone', ['id' => $reservation->id]) }}" class="done-button">Mark as Done</a>
                            @elseif($reservation->is_done == 1)
                                <a href="{{ route('ratingcreate', ['reservation_id' => $reservation->id]) }}" class="btn btn-primary">Rate</a>
                            @endif
                        </td>
                    </tr>
                @endif
            @endforeach
        </tbody>
    </table>
@else
    <div style="display: flex; align-items: center; justify-content: center; height: 70vh;">
        <p style="font-family: 'Montserrat', sans-serif; font-size: 32px; color: #333333; font-weight: bold; text-align: center;">No reservations for now</p>
    </div>
@endif








           

            <footer class="site-footer" id="footer" style="background-color: #69015b; padding: 20px; text-align: center;">
                <p class="site-footer__fineprint" id="fineprint" style="font-family: 'Roboto', Arial, sans-serif; font-size: 14px; color: #f3f3f3;">Carpoolers | 2023</p>
            </footer>   
</body>     
           

@endsection

