<?php

namespace App\Http\Controllers;

use App\Models\Specialty;
use Illuminate\Http\Request;

class SpecialtyController extends Controller
{
    public function index()
    {
        $specialties = Specialty::all();
        return view('specialties.index', compact('specialties'));
    }

    public function create()
    {
        return view('specialties.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:specialties,name',
        ]);

        Specialty::create($request->all());
        return redirect()->route('specialties.index');
    }

    public function edit(Specialty $specialty)
    {
        return view('specialties.edit', compact('specialty'));
    }

    public function update(Request $request, Specialty $specialty)
    {
        $request->validate([
            'name' => 'required|string|unique:specialties,name,' . $specialty->id,
        ]);

        $specialty->update($request->all());
        return redirect()->route('specialties.index');
    }

    public function destroy(Specialty $specialty)
    {
        $specialty->delete();
        return redirect()->route('specialties.index');
    }
}
