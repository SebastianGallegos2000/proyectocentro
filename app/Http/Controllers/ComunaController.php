<?php

namespace App\Http\Controllers;

use App\Models\Comuna;
use Illuminate\Http\Request;

class ComunaController extends Controller
{
    /**
     * Despliega la vista comunaIndex con los recursos de comuna.
     */
    public function index()
    {
        $comuna = Comuna::all();
        return view('comunaIndex', ['comunas'=>$comuna]);
    }

    /**
     * Despliega la vista con la vista para crear una comuna nueva.
     */
    public function create()
    {
        return view('createComuna');
    }

    /**
     * Almacena los datos de la comuna ingresada en el createComuna.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre_Comuna' =>'required',
            'estado_Comuna' =>'required'
        ]);

        $comuna = new Comuna();
        $comuna->nombre_Comuna = ucfirst($request->nombre_Comuna);
        $comuna->estado_Comuna = $request->estado_Comuna;
        $comuna->save();

        return redirect(route('comunaIndex'))->with('success','Comuna agregado con éxito al sistema');        
    }

    /**
     * Muestra el formulario con la comuna seleccionada para editar.
     */
    public function edit(Comuna $comuna)
    {
        return view('editComuna',['comuna'=> $comuna]);
    }

    /**
     * Actualiza los datos de la comuna seleccionada previamente.
     */
    public function update(Request $request, Comuna $comuna)
    {
        $request->validate([
        'nombre_Comuna',
        'estado_Comuna'
        ]);
        $comuna->nombre_Comuna = ucfirst($request->nombre_Comuna);
        $comuna->estado_Comuna = $request->estado_Comuna;
        $comuna->save();
        return redirect()->route('comunaIndex')->with('success','Comuna actualizada con éxito en el sistema');
    }

}
