<?php


namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Specialty;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function index()
    {
        $doctors = Doctor::with('specialty')->get(); 
        return view('doctors.index', compact('doctors'));
    }

    public function create()
    {
        $specialties = Specialty::all(); 
        return view('doctors.create', compact('specialties'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'specialty_id' => 'required|exists:specialties,id',
            'email' => 'required|email', 
            'phone' => 'required|string',
            'address' => 'required|string',
        ]);

        Doctor::create($request->all());
        return redirect()->route('doctors.index');
    }

    public function edit(Doctor $doctor)
    {
        $specialties = Specialty::all();
        return view('doctors.edit', compact('doctor', 'specialties'));
    }

    public function update(Request $request, Doctor $doctor)
    {
        $request->validate([
            'name' => 'required|string',
            'specialty_id' => 'required|exists:specialties,id',
            'email' => 'required|email|unique:doctors,email,' . $doctor->id,
            'phone' => 'required|string',
            'address' => 'required|string',
        ]);
    
        // Actualizar el registro existente
        $doctor->update($request->all());
    
        return redirect()->route('doctors.index');
    }
    

    public function destroy(Doctor $doctor)
    {
        $doctor->delete();
        return redirect()->route('doctors.index');
    }
}
