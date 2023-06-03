<?php
namespace App\Http\Controllers;
use Carbon\Carbon;
use Carbon\Traits\Timestamp;
use Illuminate\Http\Request;
use App\Models\ride;
use Illuminate\Support\Facades\Auth;
use App\Models\reservation;
use App\Models\User;
use App\Models\Vehicle;

class RidesController extends Controller
    {
        public function index(Request $request)
        {
            // Retrieve all the rides from the database
            $destination = $request->query('destination');
            $departure = $request->query('departure');
        
            $query = Ride::query();
        
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
    $userId = Auth::id();
    $user = auth()->user();

    if (is_null($user->vehicle)) {
        // Create a new vehicle
        $vehicle = new Vehicle();
        $vehicle->user_id = $userId;
        $vehicle->license_plate = $req->license_plate;
        $vehicle->model = $req->model;
        $vehicle->brand = $req->brand;
        $vehicle->capacity = $req->capacity;
        $vehicle->color = $req->color;
        $vehicle->save(); 

        $user->vehicle_id = $vehicle->id;
        $user->save();
       
       
    }
    $ride= new ride();
    $ride->driver_id=$userId;
    $ride->driver_name=$user->name;
    $ride->date=Carbon::now();
    $ride->from=$req->source;
    $ride->to=$req->destination;
    $ride->departure_time=$req->departure_time;
    $ride->available_seats=$req->number_of_seats;
    $ride->save();
    return redirect()->route('rides.index');
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
    {   $this->middleware('auth');
        $ride = ride::find($id);
        if(!$ride) {
            return redirect()->route('rides.index')->with('error', 'Ride not found.');
        }
        // Validate form data0
        $request->validate([
            'num_passengers' => 'required|integer|min:1|max:' . $ride->available_seats,
            'notes' => 'nullable'
        ]);
        // Create a new reservation
        

        $reservation = new Reservation([
            'user_id' =>  Auth::check() ? Auth::id() : true,
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
        $driver = $this->getDriverInformation($ride->driver_id);
        // Update available seats for the ride
        $ride->available_seats -= $reservation->num_passengers;
        $ride->save();
        // Redirect to the reservation confirmation page
        return view('rides.reserveconfirm', compact('reservation','driver'));
    }
    
public function show($id)
{
    $ride = ride::find($id);
    if(!$ride) {
        return redirect()->route('rides.index')->with('error', 'Ride not found.');
    }
    $reservations = $ride->reservations;
    return view('rides.show', compact('ride', 'reservations'));
}

public function getDriverInformation($id)
{
    $user = User::find($id);

    if (!$user) {
        return null; // Handle the case where the user is not found
    }

    $driverInformation = [
        'name' => $user->name,
        'email' => $user->email,
        'number' => $user->phone_number,
        'picture' => $user->picture,
        
    ];
    return $driverInformation;
}

}
