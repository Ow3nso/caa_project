<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FlightOpsController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {

    Route::get('/dashboard', function () {
        return redirect()->route('flight-ops.dashboard');
    })->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::prefix('flight-ops')->name('flight-ops.')->group(function () {
        Route::get('/',             [FlightOpsController::class, 'dashboard'])->name('dashboard');
        Route::get('/flights',      [FlightOpsController::class, 'flights'])->name('flights');
        Route::get('/flight-plans', [FlightOpsController::class, 'flightPlans'])->name('flight-plans');
        Route::get('/aircraft',     [FlightOpsController::class, 'aircraft'])->name('aircraft');
        Route::get('/crew',         [FlightOpsController::class, 'crew'])->name('crew');
        Route::get('/incidents',    [FlightOpsController::class, 'incidents'])->name('incidents');
    });

});

require __DIR__.'/auth.php';