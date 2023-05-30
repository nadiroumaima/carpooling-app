@extends('layouts.app')

@section('content')
<style>
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
</style>  
    <h1>My resevations</h1>

    @if(count($reservations) > 0)
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    
                    <th>Source</th>
                    <th>Destination</th>
                    <th>Notes</th>
                    <th>statue</th>
                    <th>Created At</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($reservations as $reservation)
                    <tr>
                        <td>{{ $reservation->id }}</td>
                        
                        <td>{{ $reservation->ride->from }}</td>
                        <td>{{ $reservation->ride->to }}</td>
                        <td>{{ $reservation->notes }}</td>
                        <td> @if ($reservation->is_dropped == 1)
                            Dropped
                          @else
                            {{ $reservation->is_dropped }}
                          @endif</td>
                        <td>{{ $reservation->created_at }}</td>
                        <td><a href="{{ route('reservations.drop', ['id' => $reservation->id]) }}" class="drop-button">Drop Reservation</a>

                            
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>Aucune réservation trouvée.</p>
    @endif

@endsection
