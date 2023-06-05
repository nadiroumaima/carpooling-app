<?php
use App\Http\Controllers\RidesController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ratingController;
use App\Http\Controllers\MapController;

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
Auth::routes(['verify'=>true]);
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::patch('/profile/update-vehicle', [ProfileController::class, 'updateVehicle'])->name('profile.update.vehicle');

});
Route::get('/rides', [RidesController::class, 'index'])->name('rides.index');
Route::get('/rides/create', [RidesController::class, 'create'])->name('rides.create');
Route::get('/rides/{ride}', [RidesController::class, 'show'])->name('rides.show');
Route::post('/rides/{ride}/reserve', [RidesController::class, 'reserve'])->name('rides.reserve');
Route::get('/rides/{ride}/reserve', [RidesController::class, 'show'])->name('rides.reserve');
Route::post('/reservations', [ReservationsController::class, 'reserve'])->name('reservations.store');
Route::get('/reservations', [RidesController::class, 'store'])->name('reservations.show');
Route::get('/rating',[ratingController::class,'rating'])->name('rating.index');
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
    return view('tempmap2');
});
Route::get('/map3', function () {
    return view('rides/tempmap2');
});
Route::post('/driver-location', [LocationController::class, 'driverLocation']);
Route::post('/passenger-location', [LocationController::class, 'passengerLocation']);

Route::post('/logout', 'Auth\LoginController@logout')->name('logout');

require __DIR__.'/auth.php';


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/rides/reserve-confirm', [RidesController::class, 'reserve'])->name('reserveconfirm');
Route::post('/reservations/{id}/drop', 'App\Http\Controllers\ReservationController@drop')->name('reservations.drop');
Route::get('/reservations', [ReservationController::class, 'index'])->name('reservations.index');
Route::get('/reservations/{id}/drop', 'App\Http\Controllers\ReservationController@drop')->name('reservations.drop');
Route::get('/reservations/{id}/mark-as-done', [ReservationController::class, 'markAsDone'])->name('reservations.markAsDone');
Route::post('/ratings/store', 'App\Http\Controllers\RatingController@store')->name('ratings.store');
Route::get('/ratings/store', 'App\Http\Controllers\RatingController@store')->name('ratings.store');
Route::get('/notifications', [App\Http\Controllers\NotificationsController::class, 'index'])->name('notifications.index');
Route::get('map/{id}', 'App\Http\Controllers\MapController@show')->name('rides.map');
