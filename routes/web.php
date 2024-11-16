<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\SpecialtyController;


Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});




// Route::get('doctors', [DoctorController::class,"index"] );

Route::resource('doctors', DoctorController::class);
Route::resource('specialties', SpecialtyController::class);



Route::resource('patients', PatientController::class);


