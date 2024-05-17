<?php

namespace App\Http\Controllers;

use App\Models\Especialidad;
use Illuminate\Http\Request;

class EspecialidadController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $especialidad = Especialidad::latest()->paginate(5);
        return view('especialidad', ['especialidades'=>$especialidad]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('createEspecialidad');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre_Especialidad' =>'required'

        ]);

        Especialidad::create($request->all());
        //dd($request->all());
        return redirect()->route('especialidad.index')->with('succes','Especialidad agregado con éxito al sistema');    }

    /**
     * Display the specified resource.
     */
    public function show(Especialidad $especialidad)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Especialidad $especialidad)
    {
        return view('editEspecialidad',['especialidad'=> $especialidad]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Especialidad $especialidad)
    {
        $request->validate([
            'nombre_Especialidad'
            ]);
            $especialidad->update($request->all());
            return redirect()->route('especialidad.index')->with('succes','Especialidad actualizada con éxito en el sistema');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Especialidad $especialidad)
    {
        //
    }
}
