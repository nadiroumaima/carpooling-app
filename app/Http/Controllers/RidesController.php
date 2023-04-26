<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ride;
use Illuminate\Support\Facades\Auth;
use App\Models\reservation;

class RidesController extends Controller

    {
        public function index()
        {
            // Retrieve all the rides from the database
        $rides = Ride::all();

        // Return the view with the rides data
        return view('rides.index', compact('rides'));
        }
    
        public function create()
        {
             // Return the view for creating a new ride
        return view('rides.create');
        }
    
        public function store(Request $request)
        {
           // Validate the request data
        $request->validate([
            'source' => 'required',
            'destination' => 'required',
            'date' => 'required|date',
            'time' => 'required',
            'seats_available' => 'required|integer|min:1',
            'price_per_seat' => 'required|numeric|min:0',
        ]);

        // Create a new ride record in the database
        $ride = new Ride();
        $ride->source = $request->input('source');
        $ride->destination = $request->input('destination');
        $ride->date = $request->input('date');
        $ride->time = $request->input('time');
        $ride->seats_available = $request->input('seats_available');
        $ride->price_per_seat = $request->input('price_per_seat');
        $ride->user_id = auth()->user()->id; // Set the authenticated user ID as the owner of the ride
        $ride->save();

        // Redirect the user to the index page with a success message
        return redirect()->route('rides.index')->with('success', 'Ride created successfully!');
        }
    
        public function reserve(Request $request, $id)
{
    $ride = Ride::find($id);

    if(!$ride) {
        return redirect()->route('rides.index')->with('error', 'Ride not found.');
    }

    // Validate form data
    $request->validate([
        'pickup_location' => 'required',
        'dropoff_location' => 'required',
        'seats' => 'required|integer|min:1|max:' . $ride->available_seats
    ]);

    // Create a new reservation
    $reservation = new Reservation([
        'pickup_location' => $request->input('pickup_location'),
        'dropoff_location' => $request->input('dropoff_location'),
        'seats' => $request->input('seats'),
        'status' => 1, // 1 for active, 0 for dropped
    ]);

    // Save the reservation to the database
    $ride->reservations()->save($reservation);

    // Update available seats for the ride
    $ride->available_seats -= $reservation->seats;
    $ride->save();

    // Redirect to the reservation confirmation page
    return view('rides.reserve-confirm', compact('reservation'));
}
public function show($id)
{
    $ride = Ride::find($id);
    if(!$ride) {
        return redirect()->route('rides.index')->with('error', 'Ride not found.');
    }
    return view('rides.show', compact('ride'));
}
    } //

