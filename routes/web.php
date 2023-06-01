<?php
use App\Http\Controllers\RidesController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\NotificationsController;




use App\Models\Rating;

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
    Route::patch('/profile/update-vehicle', [ProfileController::class, 'updateVehicle'])->name('profile.update.vehicle');

});
Route::get('/rides', [RidesController::class, 'index'])->name('rides.index');
Route::get('/rides/create', [RidesController::class, 'create'])->name('rides.create');

Route::get('/rides/{ride}', [RidesController::class, 'show'])->name('rides.show');
Route::post('/rides/{ride}/reserve', [RidesController::class, 'reserve'])->name('rides.reserve');
Route::post('/reservations', [ReservationsController::class, 'store'])->name('reservations.store');
Route::get('/rating',[RatingController::class,'rating']);
Route::post('/rides/store',[RidesController::class,'store'])->name('rides.store');


Route::get('/rides/{ride}/reserve-confirm', [RidesController::class, 'reserve'])->name('reserveconfirm');
Route::get('/rides/{ride}/reserve-confirm', [RidesController::class, 'getDriverInformation'])->name('infos');

Route::get('/reservations', [ReservationController::class, 'index'])->name('reservations.index');

Route::post('/reservations/{id}/drop', 'App\Http\Controllers\ReservationController@drop')->name('reservations.drop');
Route::get('/rating',[RatingController::class,'rating'])->name('rating.index');

Route::get('/rides/{ride}/reserve', [RidesController::class, 'reserve'])->name('rides.reserve');


Route::get('/reservations/{id}/mark-as-done', [ReservationController::class, 'markAsDone'])->name('reservations.markAsDone');
Route::post('/ratings/store', 'App\Http\Controllers\RatingController@store')->name('ratings.store');
Route::get('/ratings/store', 'App\Http\Controllers\RatingController@store')->name('ratings.store');
Route::get('/notifications', [App\Http\Controllers\NotificationsController::class, 'index'])->name('notifications.index');

Route::get('/rate/{reservation_id}', [RatingController::class, 'create'])->name('ratingcreate');


Route::post('/admin/review/store', [ReviewController::class, 'store'])->name('admin.review.store');
Route::post('/rating/store', [RatingController::class, 'store'])->name('rating.store');

Route::get('/reservations/{id}/drop', 'App\Http\Controllers\ReservationController@drop')->name('reservations.drop');













Route::get('/exemple', function () {
    return view('exemple');
});

require __DIR__.'/auth.php';

