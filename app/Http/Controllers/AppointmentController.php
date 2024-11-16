<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Patient;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{

    public function index()
    {
        $appointments = Appointment::with(['doctor', 'patient'])->get(); 
        return view('appoiments.index', compact('appointments'));
    }


     public function store(Request $request)
     {

         $request->validate([
             'patient_id' => 'required|exists:patients,id',
             'doctor_id' => 'required|exists:doctors,id',
             'scheduled_at' => 'required|date|after:today',
         ]);
 
       
         $doctor = Doctor::find($request->doctor_id);
         $scheduledAt = Carbon::parse($request->scheduled_at);
 
  
         $isAvailable = $doctor->schedules->contains(function ($schedule) use ($scheduledAt) {
             return $scheduledAt->isSameDay(Carbon::parse($schedule->day)) && 
                 $scheduledAt->between(Carbon::parse($schedule->start_time), Carbon::parse($schedule->end_time));
         });
 
  
         if (!$isAvailable) {
             return back()->with('error', 'El doctor no está disponible en el horario seleccionado.');
         }
 

         Appointment::create([
             'patient_id' => $request->patient_id,
             'doctor_id' => $request->doctor_id,
             'scheduled_at' => $request->scheduled_at,
             'status' => 'scheduled', 
             'notes' => $request->notes ?? '',  
         ]);
 
         return redirect()->route('appointments.index')->with('success', 'Cita asignada correctamente');
     }

    public function show($id)
    {
        $appointment = Appointment::with(['doctor', 'patient'])->find($id);

        if (!$appointment) {
            return response()->json(['message' => 'Appointment not found'], 404);
        }

        return response()->json($appointment);
    }

    public function create (){

        $patients = Patient::all();
        $doctors = Doctor::all();
        
            return view('appoiments.create', compact("patient", "doctors"));
        
    
    }


    public function update(Request $request, $id)
    {
        $appointment = Appointment::find($id);

        if (!$appointment) {
            return response()->json(['message' => 'Appointment not found'], 404);
        }

        $appointment->update($request->all());
        return response()->json($appointment);
    }

    public function destroy($id)
    {
        $appointment = Appointment::find($id);

        if (!$appointment) {
            return response()->json(['message' => 'Appointment not found'], 404);
        }

        $appointment->delete();
        return response()->json(['message' => 'Appointment deleted successfully']);
    }
}
