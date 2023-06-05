<?php

namespace App\Http\Controllers;
use App\Notifications\RideReservationNotification;
use Carbon\Carbon;
use Carbon\Traits\Timestamp;
use Illuminate\Http\Request;
use App\Models\rides;
use Illuminate\Support\Facades\Auth;
use App\Models\reservation;
use App\Models\User;
use App\Models\Rating;

use App\Http\Controllers\Exception;
class RidesController extends Controller

    {
        public function index(Request $request)
        {
            // Retrieve all the rides from the database
            $destination = $request->query('destination');
            $departure = $request->query('departure');

            $query = Rides::query();

            if ($destination) {
                $query->where('to', 'LIKE', '%' . $destination . '%');
            }

            if ($departure) {
                $query->where('from', 'LIKE', '%' . $departure . '%');
            }

            $rides = $query->get();
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
    $ride->departure_time=$req->departure_time;
    $ride->available_seats=$req->number_of_seats;
    $ride->source_latitude = $req->input('source_latitude');
    $ride->source_longitude = $req->input('source_longitude');
    $ride->destination_latitude = $req->input('destination_latitude');
    $ride->destination_longitude = $req->input('destination_longitude');

    $ride->save();
    return redirect()->route('rides.index');
}

public function reserve(Request $request, $id)
{
    $this->middleware('auth');

    // Retrieve the ride
    $ride = Rides::find($id);
    if (!$ride) {
        return redirect()->route('rides.index')->with('error', 'Ride not found.');
    }

    // Validate form data
    $request->validate([
        'num_passengers' => 'required|integer|min:1|max:' . $ride->available_seats,
        'notes' => 'nullable'
    ]);

    // Create a new reservation
    $reservation = new Reservation([
        'user_id' => Auth::id(),
        'num_passengers' => $request->input('num_passengers'),
        'notes' => $request->input('notes'),
        'is_dropped' => false,
        'ride_id' => $ride->id,
        'driver_id' => $ride->driver_id,
        'created_at' => now(),
        'updated_at' => now()
    ]);

    // Save the reservation to the database
    $ride->reservations()->save($reservation);

    // Update available seats for the ride
    $ride->available_seats -= $reservation->num_passengers;
    $ride->save();

    // Retrieve the driver
    $driver = $this->getDriverInformation($ride->driver_id);
    if ($driver) {
        // Send a notification to the driver
        $driver->notify(new RideReservationNotification($reservation, Auth::id()));
    }

    // Send a notification to the driver
    // Redirect to the reservation confirmation page
    return view('rides.reserveconfirm', compact('reservation', 'driver'));
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

public function getDriverInformation($id)
{
    $user = User::find($id);
    return $user;
}
public function getRideData($rideId)
    {
        $ride = Rides::findOrFail($rideId);

        $rideData = [
            'source_latitude' => $ride->source_latitude,
            'source_longitude' => $ride->source_longitude,
            'destination_latitude' => $ride->destination_latitude,
            'destination_longitude' => $ride->destination_longitude
        ];

        return response()->json($rideData);
    }
}


