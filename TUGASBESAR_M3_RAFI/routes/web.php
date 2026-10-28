<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfilDriverController; // Wajib dipanggil!

// Halaman awal bawaan Laravel
Route::get('/', function () {
    return view('welcome');
});

// jembatan
Route::resource('profil_driver', ProfilDriverController::class);