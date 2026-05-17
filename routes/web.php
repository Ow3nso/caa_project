<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FlightOpsController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/success', function () {
    return view('success');
})->name('success');


Route::prefix('services')->name('services.')->group(function () {
    Route::get('/aircraft', fn() => view('services.aircraft'))->name('aircraft');
    Route::get('/mro', fn() => view('services.mro'))->name('mro');
    Route::get('/flight', fn() => view('services.flight'))->name('flight');
    Route::get('/medical', fn() => view('services.medical'))->name('medical');
    Route::get('/organization', fn() => view('services.organization'))->name('organization');
});


Route::prefix('apply')->name('apply.')->group(function () {
    Route::get('/aircraft', fn() => view('aircraft.create'))->name('aircraft');
    Route::get('/mro', fn() => view('mro.create'))->name('mro');
    Route::get('/flight', fn() => view('flight.create'))->name('flight');
    Route::get('/medical', fn() => view('medical.create'))->name('medical');
    Route::get('/organization', fn() => view('organization.create'))->name('organization');
});


Route::middleware(['auth'])->group(function () {

    
    Route::get('/dashboard', function () {
        return view('dashboard');
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

    
    Route::middleware(['verified', 'admin'])->prefix('admin')->name('admin.')->group(function () {

        Route::get('/aircraft', fn() => view('aircraft.index'))->name('aircraft');
        Route::get('/mro', fn() => view('mro.index'))->name('mro');
        Route::get('/flight', fn() => view('flight.index'))->name('flight');
        Route::get('/medical', fn() => view('medical.index'))->name('medical');
        Route::get('/organization', fn() => view('organization.index'))->name('organization');
    });

});


require __DIR__.'/auth.php';