@extends('layouts.app')

@section('content')
    <h1>Mes Réservations</h1>

    @if(count($reservations) > 0)
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Notes</th>
                    <th>Source</th>
                    <th>Destination</th>
                    <th>statue</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                </tr>
            </thead>
            <tbody>
                @foreach($reservations as $reservation)
                    <tr>
                        <td>{{ $reservation->id }}</td>
                        <td>{{ $reservation->notes }}</td>
                        <td>{{ $reservation->ride->from }}</td>
                        <td>{{ $reservation->ride->to }}</td>
                        <td>{{ $reservation->is_dropped }}</td>
                        <td>{{ $reservation->created_at }}</td>
                        <td>{{ $reservation->updated_at }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>Aucune réservation trouvée.</p>
    @endif

@endsection
