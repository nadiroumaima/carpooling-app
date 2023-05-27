<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use Carbon\Traits\Timestamp;
use Illuminate\Http\Request;
use App\Models\rides;
use Illuminate\Support\Facades\Auth;
use App\Models\reservation;
use App\Http\Controllers\Exception;
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
    $user = auth()->user();
    $ride= new Rides;
    $ride->driver_id=$userId;
    $ride->driver_name=$user->name;
    $ride->date=Carbon::now();
    $ride->from=$req->source;
    $ride->to=$req->destination;
    $ride->departure_time=$req->deparature_time;
    $ride->available_seats=$req->number_of_seats;
    $ride->save();
    return redirect()->route('rides.index');
}

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
            'is_dropped' => false,
            'ride_id'=>$ride->id,
            'driver_id' => $ride->driver_id,
            'user_id' => auth()->id(),
            'created_at' => now(),
            'updated_at' => now()
        ]);

        // Save the reservation to the database
        $ride->reservations()->save($reservation);

        // Update available seats for the ride
        $ride->available_seats -= $reservation->num_passengers;
        $ride->save();

        // Redirect to the reservation confirmation page
        return view('rides.reserve-confirm', compact('reservation'));
    }

/*public function show($id)
{
    $ride = Rides::find($id);
    if(!$ride) {
        return redirect()->route('rides.index')->with('error', 'Ride not found.');
    }
    $ride = Rides::find('ride_id');
    $reservations = $ride->reservations;
    return view('rides.show', compact('ride', 'reservations'));
}


*/
public function show($id)
{
    $ride = Rides::find($id);

    if (!$ride) {
        return redirect()->route('rides.index')->with('error', 'Ride not found.');
    }
    /*$ride = Rides::find($id);
    $reservation = new Reservation();
    $reservations = $reservation->getReservationsByRide($id) ?? collect();
*/
    return view('rides.show', compact('ride'));
}
    } //

