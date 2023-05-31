<?php

namespace App\Http\Controllers;
use App\Models\Rating;
use App\Models\reservation;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ratingController extends Controller
{
    public function rating() {
        /*$ratings=DB::table('ratings')->select('driver_id','passenger_id','rating','comment','created_at','updated_at');
        $data=compact('ratings');*/
        $ratings = DB::select('select * from ratings');
        return view('rides.rating',['ratings'=>$ratings]);
        /*dd($ratings);
        return view('rides.rating')->with($data);*/
    }

    public function store(Request $request)
    {
        // Retrieve the necessary data from the request
        $rating = $request->input('rating');
        $comment = $request->input('comment');
        $reservationId = $request->input('reservation_id');

        // Assuming you have access to the reservation data
        $reservation = Reservation::findOrFail($reservationId);
        $driverId = $reservation->ride->driver_id;
        $passengerId = $reservation->user_id;

        // Create a new Rating instance
        $newRating = new Rating();

        // Set the attributes of the new rating
        $newRating->reservation_id = $reservationId;
        $newRating->driver_id = $driverId;
        $newRating->passenger_id = $passengerId;
        $newRating->rating = $rating;
        $newRating->comment = $comment;

        // Save the new rating to the database
        $newRating->save();

        // Optionally, you can redirect the user or display a success message
        return redirect()->route('reservations.index')->with('success', 'Rating added successfully.');
    }


}
