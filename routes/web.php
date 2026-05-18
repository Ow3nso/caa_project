<?php

use App\Http\Controllers\MedicalApplicationController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FlightOpsController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route::middleware('auth')->group(function () {

//     Route::get('/dashboard', function () {
//         return redirect()->route('flight-ops.dashboard');
//     })->name('dashboard');

Route::get('/success', function () { return view('success'); })->name('success');

// Public Service Pages
Route::prefix('services')->name('services.')->group(function () {
    Route::get('/aircraft', function () { return view('services.aircraft'); })->name('aircraft');
    Route::get('/mro', function () { return view('services.mro'); })->name('mro');
    Route::get('/flight', function () { return view('services.flight'); })->name('flight');
    Route::get('/medical', function () { return view('services.medical'); })->name('medical');
    Route::get('/organization', function () { return view('services.organization'); })->name('organization');
});

// Public Application Forms
Route::prefix('apply')->name('apply.')->group(function () {
    Route::get('/aircraft', function () { return view('aircraft.create'); })->name('aircraft');
    Route::get('/mro', function () { return view('mro.create'); })->name('mro');
    Route::get('/flight', function () { return view('flight.create'); })->name('flight');
    Route::get('/medical', function () { return view('medical.create'); })->name('medical');
    Route::post('/medical', [MedicalApplicationController::class, 'store'])->name('medical.store');
    Route::get('/organization', function () { return view('organization.create'); })->name('organization');
});

// Admin Routes
Route::middleware(['auth', 'verified', 'admin'])->group(function () {
    Route::get('/dashboard', function () { return view('dashboard'); })->name('dashboard');
    
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

    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('/aircraft', function () { return view('aircraft.index'); })->name('aircraft');
        Route::get('/mro', function () { return view('mro.index'); })->name('mro');
        Route::get('/mro/create', function () { return view('mro.create'); })->name('mro.create');
        Route::get('/flight', function () { return view('flight.index'); })->name('flight');
        Route::get('/medical', [MedicalApplicationController::class, 'adminIndex'])->name('medical');
        Route::get('/medical/{application}', [MedicalApplicationController::class, 'adminShow'])->name('medical.show');
        Route::post('/medical/{application}/ame-decision', [MedicalApplicationController::class, 'ameDecision'])->name('medical.ameDecision');
        Route::get('/organization', function () { return view('organization.index'); })->name('organization');
    });
});

require __DIR__.'/auth.php';