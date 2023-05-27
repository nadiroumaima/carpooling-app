<?php
use App\Http\Controllers\RidesController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ratingController;
use Illuminate\Support\Facades\Route;
use App\Events\driverMoved;
use Illuminate\Support\Facades\Broadcast;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::get('/rides', [RidesController::class, 'index'])->name('rides.index');
Route::get('/rides/create', [RidesController::class, 'create'])->name('rides.create');
Route::get('/rides/{ride}', [RidesController::class, 'show'])->name('rides.show');
Route::post('/rides/{ride}/reserve', [RidesController::class, 'reserve'])->name('rides.reserve');
Route::get('/rides/{ride}/reserve', [RidesController::class, 'show'])->name('rides.reserve');
Route::post('/reservations', [ReservationsController::class, 'reserve'])->name('reservations.store');
Route::get('/reservations', [RidesController::class, 'store'])->name('reservations.show');
Route::get('/rating',[ratingController::class,'rating']);
Route::post('/rides/store',[RidesController::class,'store'])->name('rides.store');
Route::get('/map', function () {
    return view('map');
});
Route::get('/move', function () {
    // event(new CarMoved(53.6304438,10.0472128));
    // event(new CarMoved(53.6304438,10.0472128));
    event(new driverMoved(53.6315479,10.0470709));
    dump('Driver moved');
});
Route::get('/map2', function () {
    return view('map2');
});
require __DIR__.'/auth.php';

