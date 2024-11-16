<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\DoctorSchedule;
use Illuminate\Http\Request;

class DoctorScheduleController extends Controller
{
    public function create(Doctor $doctor)
    {
        return view('doctor_schedules.create', compact('doctor'));
    }

    // Almacenar los horarios en la tabla doctor_schedules
    public function store(Request $request, Doctor $doctor)
    {
        // Validar los datos del formulario
        $request->validate([
            'day' => 'required|string|in:1,2,3,4,5,6,7', 
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time', 
        ]);

        // Crear el horario para el doctor
        $doctor->schedules()->create([
            'day' => $request->day,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
            'doctor_id' => $doctor->id,
        ]);

        $doctors = Doctor::with('specialty')->get(); 
        return view('doctors.index', compact('doctors'));

    }
}
