<?php

namespace App\Http\Controllers;

use App\Models\TipoAtencion;
use Illuminate\Http\Request;

class TipoAtencionController extends Controller
{
    /**
     * Despliega todas las tipo atencion que están en el sistema.
     */
    public function index()
    {
        $tipoatencion = TipoAtencion::all();
        return view('tipoAtencionIndex', ['tipoatenciones'=>$tipoatencion]);    }

    /**
     * Despliega el formulario para crear una nueva tipo de atencion.
     */
    public function create()
    {
        return view('createTipoAtencion');
    }

    /**
     * Almacena la informacion.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre_TipoAtencion' =>'required',
            'costo_TipoAtencion' =>'required',
            'estado_TipoAtencion' =>'required'
        ]);

        $tipoatencion = new TipoAtencion();
        $tipoatencion->nombre_TipoAtencion = ucfirst($request->nombre_TipoAtencion);
        $tipoatencion->costo_TipoAtencion = $request->costo_TipoAtencion;
        $tipoatencion->estado_TipoAtencion = $request->estado_TipoAtencion;
        $tipoatencion->save();

        return redirect(route('tipoAtencionIndex'))->with('success','Tipo de Atención agregado con éxito al sistema');

    }

    /**
     * Despliega un formulario para editar la tipo atencion seleccionada.
     */
    public function edit(TipoAtencion $tipoAtencion)
    {
        return view('editTipoAtencion',['tipoAtencion'=> $tipoAtencion]);
    }

    /**
     * Actualiza los datos del tipo atencion seleccionado.
     */
    public function update(Request $request, TipoAtencion $tipoAtencion)
    {
        $request->validate([
            'nombre_TipoAtencion',
            'costo_TipoAtencion',
            'estado_TipoAtencion'
            ]);
            $tipoAtencion->nombre_TipoAtencion = ucfirst($request->nombre_TipoAtencion);
            $tipoAtencion->costo_TipoAtencion = $request->costo_TipoAtencion;
            $tipoAtencion->estado_TipoAtencion = $request->estado_TipoAtencion;
            $tipoAtencion->save();

            return redirect()->route('tipoAtencionIndex')->with('success','Comuna actualizada con éxito en el sistema');
            
    }

}
