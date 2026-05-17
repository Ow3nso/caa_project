<?php

use App\Http\Controllers\OrganizationController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Public Landing Page
Route::get('/', function () {
    return view('welcome');
});

// Main User Dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Authenticated Routes Group
Route::middleware('auth')->group(function () {
    
    // User Profile Routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Organization Management Routes
    Route::get('/organization/dashboard', [OrganizationController::class, 'dashboard'])->name('organization.dashboard');
    Route::get('/organization/setup', [OrganizationController::class, 'create'])->name('organization.create');
    Route::post('/organization/store', [OrganizationController::class, 'store'])->name('organization.store');
    
    // Organization Dynamic Actions (View, Edit/Approve, Update, Delete)
    Route::get('/organization/{id}', [OrganizationController::class, 'show'])->name('organization.show');
    Route::get('/organization/{id}/edit', [OrganizationController::class, 'edit'])->name('organization.edit');
    Route::put('/organization/{id}', [OrganizationController::class, 'update'])->name('organization.update');
    Route::delete('/organization/{id}', [OrganizationController::class, 'destroy'])->name('organization.destroy');
});

require __DIR__.'/auth.php';