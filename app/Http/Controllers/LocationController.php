<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\DriverLocationUpdated;
use App\Events\PassengerLocationUpdated;
use App\Models\Locations;

class LocationController extends Controller
{
    public function driverLocation(Request $request)
    {
        // Validate the request data
        $request->validate([
            'driver_id' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
        ]);

        // Extract the data from the request
        $driverId = $request->input('driver_id');
        $latitude = $request->input('latitude');
        $longitude = $request->input('longitude');

        // Save the driver's location to the database or any other storage mechanism
        // ...

        // Broadcast the driver's location update to the subscribed passengers
        $location = new Locations(); // Create an instance of the Location model
        $location->driver_id = $driverId;
        $location->latitude = $latitude;
        $location->longitude = $longitude;
        $location->save();

        event(new DriverLocationUpdated($location));

        // Return a response
        return response()->json(['message' => 'Driver location updated successfully']);
    }

    public function passengerLocation(Request $request)
    {
        // Validate the request data
        $request->validate([
            'passenger_id' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
        ]);

        // Extract the data from the request
        $passengerId = $request->input('passenger_id');
        $latitude = $request->input('latitude');
        $longitude = $request->input('longitude');

        // Save the passenger's location to the database or any other storage mechanism
        // ...

        // Broadcast the passenger's location update to the subscribed drivers
        event(new PassengerLocationUpdated($passengerId, $latitude, $longitude));

        // Return a response
        return response()->json(['message' => 'Passenger location updated successfully']);
    }
}
