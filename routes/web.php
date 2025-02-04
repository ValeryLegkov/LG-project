<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ListingController;
use App\Models\User;

/*{-- LISTING ROUTES --}*/

// Get All Listings
Route::get('/', [ListingController::class, 'index']);

// Show Create Form
Route::get('/listings/create', [ListingController::class, 'create'])->middleware('auth');

// Store Listing Data
Route::post('/listings', [ListingController::class, 'store'])->middleware('auth');

// Show Edit Form
Route::get('/listings/{listing}/edit', [ListingController::class, 'edit'])->middleware('auth');

// Update Listing
Route::put('/listings/{listing}', [ListingController::class, 'update'])->middleware('auth');

// Delete Listing
Route::delete('/listings/{listing}', [ListingController::class, 'destroy'])->middleware('auth');

// Manage Listings
Route::get('/listings/manage', [ListingController::class, 'manage'])->middleware('auth')->name('listings.manage');

// Get Single Listing
Route::get('/listings/{listing}', [ListingController::class, 'show']);


/*{-- USER ROUTES --}*/

// Show Register Form / Create User
Route::get('/register', [UserController::class, 'create'])->name('register')->middleware('guest');

// Create New User
Route::post('/users', [UserController::class, 'store'])->name('users.store');

// Logout User
Route::post('/logout', [UserController::class, 'logout'])->name('logout')->middleware('auth');

// Show Login Form
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');

// Authenticate User
Route::post('/users/authenticate', [UserController::class, 'authenticate']);

