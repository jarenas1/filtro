<?php

use App\Http\Controllers\AppointmentController;
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
Route::resource('appoiments', AppointmentController::class);

use App\Http\Controllers\DoctorScheduleController;

Route::get('doctor_schedules/create/{doctor}', [DoctorScheduleController::class, 'create'])->name('doctor_schedules.create');
Route::post('doctor_schedules/store/{doctor}', [DoctorScheduleController::class, 'store'])->name('doctor_schedules.store');





Route::resource('patients', PatientController::class);


