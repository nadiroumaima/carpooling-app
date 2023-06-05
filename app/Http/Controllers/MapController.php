<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rides;

class MapController extends Controller
{
    public function show($id)
    {
        $ride = Rides::findOrFail($id);
    return view('rides.map', compact('ride'));
    }
    public function fetchRideData($id){
    $ride = Rides::findOrFail($id);

        $sourceLatitude = $ride->source_latitude;
        $sourceLongitude = $ride->source_longitude;
        $destinationLatitude = $ride->destination_latitude;
        $destinationLongitude = $ride->destination_longitude;

        // Log the coordinates to the console
        \Log::info('Source Latitude: ' . $sourceLatitude);
        \Log::info('Source Longitude: ' . $sourceLongitude);
        \Log::info('Destination Latitude: ' . $destinationLatitude);
        \Log::info('Destination Longitude: ' . $destinationLongitude);
}
}
