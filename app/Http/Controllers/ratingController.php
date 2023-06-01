<?php

namespace App\Http\Controllers;
use App\Models\Rating;
use App\Models\reservation;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class RatingController extends Controller
{
    public function rating() {
        /*$ratings=DB::table('ratings')->select('driver_id','passenger_id','rating','comment','created_at','updated_at');
        $data=compact('ratings');*/
        $ratings = DB::select('select * from ratings');
        return view('rides.rating',['ratings'=>$ratings]);
        /*dd($ratings);
        return view('rides.rating')->with($data);*/
    }

    

    

public function create($reservationId)
{
    // Retrieve the reservation based on the reservation ID
    $reservation = reservation::findOrFail($reservationId);

    // Check if a rating already exists for the reservation
    $rating = $reservation->rating;

    return view('ratingcreate', [
        'reservation' => $reservation,
        'rating' => $rating,
       
    ]);

}



    
public function store(Request $request)
{
    // Validate the form input
    $validatedData = $request->validate([
        'rating' => 'required',
        'comment' => 'required|max:200',
        'reservation_id' => 'required',
    ]);

    // Retrieve the necessary data from the validated request
    $rating = $validatedData['rating'];
    $comment = $validatedData['comment'];
    $reservationId = $validatedData['reservation_id'];

    // Retrieve the reservation based on the reservation_id
    $reservation = reservation::findOrFail($reservationId);

    // Create a new Rating instance
    $newRating = new Rating();

    // Set the attributes of the new rating
    $newRating->reservation_id = $reservationId;
    $newRating->driver_id = $reservation->ride->driver_id;
    $newRating->passenger_id = $reservation->user_id;
    $newRating->rating = $rating;
    $newRating->comment = $comment;

    // Save the new rating to the database
    $newRating->save();

    // Optionally, you can redirect the user or display a success message
    return redirect()->back()->with('success', 'Rating added successfully.');
}


}