<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

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
    Route::get('/organization', function () { return view('organization.create'); })->name('organization');
});

// Admin Routes
Route::middleware(['auth', 'verified', 'admin'])->group(function () {
    Route::get('/dashboard', function () { return view('dashboard'); })->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('/aircraft', function () { return view('aircraft.index'); })->name('aircraft');
        Route::get('/mro', function () { return view('mro.index'); })->name('mro');
        Route::get('/mro/create', function () { return view('mro.create'); })->name('mro.create');
        Route::get('/flight', function () { return view('flight.index'); })->name('flight');
        Route::get('/medical', function () { return view('medical.index'); })->name('medical');
        Route::get('/organization', function () { return view('organization.index'); })->name('organization');
    });
});

require __DIR__.'/auth.php';
