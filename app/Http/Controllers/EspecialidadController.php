<?php

namespace App\Http\Controllers;

use App\Models\Especialidad;
use Illuminate\Http\Request;

class EspecialidadController extends Controller
{
    /**
     * Despliega todas las especialdiades en la vista.
     */
    public function index()
    {
        $especialidad = Especialidad::all();
        return view('especialidadIndex', ['especialidades'=>$especialidad]);
    }

    /**
     * Despliega formulario para crear una especialidad nueva.
     */
    public function create()
    {
        return view('createEspecialidad');
    }

    /**
     * Almacena los datos ingresados en el create.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre_Especialidad' =>'required',
            'estado_Especialidad' =>'required'
        ]);

        $especialidad = new Especialidad();
        $especialidad->nombre_Especialidad = ucfirst($request->nombre_Especialidad);
        $especialidad->estado_Especialidad = $request->estado_Especialidad;
        $especialidad->save();

        return redirect()->route('especialidadIndex')->with('succes','Especialidad agregado con éxito al sistema');    }

    /**
     * Muestra el formulario para editar la especialidad seleccionada.
     */
    public function edit(Especialidad $especialidad)
    {
        return view('editEspecialidad',['especialidad'=> $especialidad]);
    }

    /**
     * Actualiza los datos ingresados en la especialidad edit.
     */
    public function update(Request $request, Especialidad $especialidad)
    {
        $request->validate([
            'nombre_Especialidad',
            'estado_Especialidad'
            ]);
            $especialidad->nombre_Especialidad = ucfirst($request->nombre_Especialidad);
            $especialidad->estado_Especialidad = $request->estado_Especialidad;
            $especialidad->save();
            
            return redirect()->route('especialidadIndex')->with('succes','Especialidad actualizada con éxito en el sistema');
    }
}
