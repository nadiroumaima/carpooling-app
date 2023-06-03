<?php

namespace App\Http\Controllers;
use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\vehicles;
class vehiclesController extends Controller
{

    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'vehicle' => $request->vehicle(),
        ]);
    }
    public function updateVehicle(Request $request)
    {
        $user = auth()->user();

        // Retrieve the vehicle associated with the user, or create a new one if none exists
        $vehicle = $user->vehicle ?? new Vehicle();

        // Update the vehicle information
        $vehicle->license_plate = $request->input('license_plate');
        $vehicle->model = $request->input('model');
        $vehicle->brand = $request->input('brand');
        $vehicle->color = $request->input('color');
        $vehicle->capacity = $request->input('capacity');

        // Associate the vehicle with the user
        $vehicle->user()->associate($user);

        // Save the vehicle
        $vehicle->save();

        return view('profile.update-vehicle', ['vehicle' => $vehicle])->with('success', 'Vehicle information updated successfully.');
    }


}