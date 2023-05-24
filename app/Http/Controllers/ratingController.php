<?php

namespace App\Http\Controllers;
use App\Models\Rating;
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
}
