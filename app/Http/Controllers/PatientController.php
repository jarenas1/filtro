<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PatientController extends Controller
{
    public function index()
    {
        // Obtenemos todos los pacientes con su usuario asociado
        $patients = Patient::with('user')->get();
        return view('patients.index', compact('patients'));
    }

    public function create()
    {
        // Obtenemos todos los usuarios disponibles
        $users = User::all();
        return view('patients.create', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:patients,email',
            'password' => 'required|string|min:8'
        ]);

        $user = User::create($request->all());

        Patient::create([
            'email' => $user->email,
            'password' => $user->password,
            'name' => $user->name,
            'user_id' => $user->id,
        ]);
        return redirect()->route('patients.index');
    }

    public function edit(Patient $patient)
    {
        // Obtenemos todos los usuarios para asociar con el paciente
        $users = User::all();
        return view('patients.edit', compact('patient', 'users'));
    }

    public function update(Request $request, Patient $patient)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:patients,email,' . $patient->id, // Ignora el email actual
            'password' => 'nullable|string|min:8', // Contraseña opcional
        ]);
    
        // Actualiza los datos del paciente
        $patient->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password ? Hash::make($request->password) : $patient->password, // Si hay una nueva contraseña, la ciframos
        ]);
    
        return redirect()->route('patients.index')->with('success', 'Patient updated successfully!');
    }

    public function destroy(Patient $patient)
    {
        // Usamos el método 'delete' de SoftDeletes
        $patient->delete();

        // Redirigir a la lista de pacientes con un mensaje de éxito
        return redirect()->route('patients.index')->with('success', 'Patient deleted successfully!');
    }
}
