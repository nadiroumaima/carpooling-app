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
        <tr>
            <td>{{ $reservation->id }}</td>
            <td>{{ $reservation->ride->from }}</td>
            <td>{{ $reservation->ride->to }}</td>
            <td>{{ $reservation->notes }}</td>
            <td>
                @if ($reservation->is_done == 1)
                Done
                @else
                @if ($reservation->is_dropped == 1)
                Dropped
                @else
                pending
                @endif
                @endif
            </td>
            <td>{{ $reservation->created_at }}</td>
            <td>
                @if($reservation->is_done == 0 and $reservation->is_dropped == 0)
                    <a href="{{ route('reservations.drop', ['id' => $reservation->id]) }}" class="drop-button">Drop Reservation</a>
                    <a href="{{ route('reservations.markAsDone', ['id' => $reservation->id]) }}" class="done-button">Mark as Done</a>
                @elseif($reservation->is_done == 1)
                <a href="{{ route('ratings.store', $reservation->id) }}" class="rate-button">Rate</a>
                @endif
            </td>
            </tr>
            @endforeach
            </tbody>
            </table>
            @else
            <p>Aucune réservation trouvée.</p>
            @endif

            <!-- Rating Form Overlay -->
            <div id="rating-form-overlay">
                <div id="rating-form-container">
                    <h3>Rate Reservation</h3>
                    <form action="{{ route('ratings.store') }}" method="POST">
                        @csrf
                        <input type="hidden" id="reservation-id-input" name="reservation_id" value="">

                        <label for="driver-id" hidden>Driver ID:</label>
                        <input type="hidden" id="driver-id" name="driver_id" value="{{ $reservation->ride->driver_id }}" required readonly>

                        <label for="passenger-id" hidden>Passenger ID:</label>
                        <input type="hidden" id="passenger-id" name="passenger_id" value="{{ $reservation->user_id }}" required readonly>

                        <label for="rating">Rating:</label>
                        <input type="number" id="rating" name="rating" min="1" max="5" required>

                        <label for="comment">Comment:</label>
                        <textarea id="comment" name="comment" required></textarea>

                        <button type="submit">Submit Rating</button>
                    </form>

                    <button id="close-rating-form-btn">Close</button>
                </div>
            </div>

            <script>
                // Get the rating form overlay and close button
                const ratingFormOverlay = document.getElementById('rating-form-overlay');
                const closeRatingFormBtn = document.getElementById('close-rating-form-btn');

                // Get all rate buttons in the table
                const rateButtons = document.getElementsByClassName('rate-button');

                // Loop through each rate button and attach a click event listener
                Array.from(rateButtons).forEach(function(button) {
                    button.addEventListener('click', function() {
                        // Get the reservation ID associated with the button
                        const reservationId = button.dataset.reservationId;

                        // Set the reservation ID in the hidden input field of the form
                        document.getElementById('reservation-id-input').value = reservationId;

                        // Show the rating form overlay
                        ratingFormOverlay.style.display = 'block';
                    });
                });

                // Attach a click event listener to the close button
                closeRatingFormBtn.addEventListener('click', function() {
                    // Hide the rating form overlay
                    ratingFormOverlay.style.display = 'none';
                });
            </script>
            <script>
                // Get the rating form overlay and close button
                const ratingFormOverlay = document.getElementById('rating-form-overlay');
                const closeRatingFormBtn = document.getElementById('close-rating-form-btn');

                // Get the rate button
                const rateButton = document.getElementById('rate-button');

                // Attach a click event listener to the rate button
                rateButton.addEventListener('click', function() {
                    // Get the reservation ID from the data attribute
                    const reservationId = rateButton.dataset.reservationId;

                    // Set the reservation ID in the hidden input field of the form
                    document.getElementById('reservation-id-input').value = reservationId;

                    // Show the rating form overlay
                    ratingFormOverlay.style.display = 'block';
                });

                // Attach a click event listener to the close button
                closeRatingFormBtn.addEventListener('click', function() {
                    // Hide the rating form overlay
                    ratingFormOverlay.style.display = 'none';
                });
            </script>

@endsection

<style>
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

    .rate-button {
        background-color: #16bee8;
    }

    .drop-button:hover,
    .done-button:hover {
        background-color: #c82333;
    }
</style>

<!-- JavaScript to handle the rating form overlay -->
