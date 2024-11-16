<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    // Mostrar todas las citas
    public function index()
    {
        $appointments = Appointment::with(['doctor', 'patient'])->get(); // Relacionar doctor y paciente
        return response()->json($appointments);
    }

    // Crear una nueva cita
    public function store(Request $request)
    {
        $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'doctor_id' => 'required|exists:doctors,id',
            'appointment_date' => 'required|date',
            'status' => 'required|string|in:pending,confirmed,cancelled', // Estado de la cita
            'notes' => 'nullable|string',
        ]);

        $appointment = Appointment::create($request->all());
        return response()->json($appointment, 201);
    }

    // Mostrar una cita específica
    public function show($id)
    {
        $appointment = Appointment::with(['doctor', 'patient'])->find($id);

        if (!$appointment) {
            return response()->json(['message' => 'Appointment not found'], 404);
        }

        return response()->json($appointment);
    }

    // Actualizar una cita
    public function update(Request $request, $id)
    {
        $appointment = Appointment::find($id);

        if (!$appointment) {
            return response()->json(['message' => 'Appointment not found'], 404);
        }

        $appointment->update($request->all());
        return response()->json($appointment);
    }

    // Eliminar una cita
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
