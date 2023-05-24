<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use Carbon\Traits\Timestamp;
use Illuminate\Http\Request;
use App\Models\rides;
use Illuminate\Support\Facades\Auth;
use App\Models\reservation;

class RidesController extends Controller

    {
        public function index()
        {
            // Retrieve all the rides from the database
        $rides = rides::all();

        // Return the view with the rides data
        return view('rides.index', compact('rides'));
        }

        public function create()
{
    return view('rides.create');
}


public function store(Request $req)
{
    $userId = auth()->id();
    $ride= new Rides;
    $ride->driver_id=$userId;
    $ride->driver_name='flane';
    $ride->date=Carbon::now();
    $ride->from=$req->source;
    $ride->to=$req->destination;
    $ride->departure_time=$req->deparature_time;
    $ride->available_seats=$req->number_of_seats;
    $ride->save();
}

/*public function store(Request $request)
{
    // Validate the form data
    $validatedData = $request->validate([
        'from' => 'required',
        'to' => 'required',
        'date' => 'required|date',
        'available_seats' => 'required|integer|min:1',
        'description' => 'nullable'
    ]);

    // Create a new ride with the validated data and save it to the database
    $ride = new Ride($validatedData);
    $ride->save();

    // Redirect the user to the newly created ride's page
    return redirect()->route('rides.show', ['ride' => $ride->id]);
}
    // Redirect the user to
*/

    public function reserve(Request $request, $id)
    {
        $ride = Rides::find($id);

        if(!$ride) {
            return redirect()->route('rides.index')->with('error', 'Ride not found.');
        }

        // Validate form data
        $request->validate([
            'num_passengers' => 'required|integer|min:1|max:' . $ride->available_seats,
            'notes' => 'nullable'
        ]);

        // Create a new reservation
        $reservation = new Reservation([
            'num_passengers' => $request->input('num_passengers'),
            'notes' => $request->input('notes'),
            'is_dropped' => false
        ]);

        // Save the reservation to the database
        $ride->reservations()->save($reservation);

        // Update available seats for the ride
        $ride->available_seats -= $reservation->num_passengers;
        $ride->save();

        // Redirect to the reservation confirmation page
        return view('rides.reserve-confirm', compact('reservation'));
    }

public function show($id)
{
    $ride = Rides::find($id);
    if(!$ride) {
        return redirect()->route('rides.index')->with('error', 'Ride not found.');
    }
    $reservations = $ride->reservations;
    return view('rides.show', compact('ride', 'reservations'));
}

    } //
