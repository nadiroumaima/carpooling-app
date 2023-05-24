<?php
use App\Http\Controllers\RidesController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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
Route::post('/rides', [RidesController::class, 'store'])->name('rides.store');
Route::get('/rides/{ride}', [RidesController::class, 'show'])->name('rides.show');
Route::get('/rides/{ride}/reserve', [RidesController::class, 'reserve'])->name('rides.reserve');
Route::post('/reservations', [ReservationsController::class, 'store'])->name('reservations.store');






Route::get('/exemple', function () {
    return view('exemple');
});

require __DIR__.'/auth.php';

