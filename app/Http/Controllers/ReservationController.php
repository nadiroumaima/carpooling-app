<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ride;
use Illuminate\Support\Facades\Auth;
use App\Models\reservation;
use App\Models\User;

class ReservationController extends Controller
{
    public function index()
    {
        $reservations = reservation::all();


        return view('rides.reservation', compact('reservations'));
    }
    public function drop($id)
{
    // Retrieve the reservation with the specified ID
    $reservation = reservation::findOrFail($id);

    // Check if the reservation is already dropped
    if ($reservation->is_dropped) {
        // If the reservation is already dropped, you can handle it as per your application's logic
        return redirect()->route('reservations.index')->with('error', 'Reservation is already dropped.');
    }

    // Perform any necessary operations to drop the reservation
    // For example, you can update the 'is_dropped' field to mark the reservation as dropped
    $reservation->is_dropped = true;
    $reservation->save();

    // Optionally, you can redirect the user back to the reservations page or display a success message
    return redirect()->route('reservations.index')->with('success', 'Reservation dropped successfully.');
}


}
