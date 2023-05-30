<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ride;
use Illuminate\Support\Facades\Auth;
use App\Models\reservation;
use App\Models\User;

class ReservationController extends Controller
{
    public function index()
    {
        $reservations = reservation::all();

        return view('rides.reservation', compact('reservations'));
    }
}
