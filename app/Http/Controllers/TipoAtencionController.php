<?php

namespace App\Http\Controllers;

use App\Models\TipoAtencion;
use Illuminate\Http\Request;

class TipoAtencionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tipoatencion = TipoAtencion::all();
        return view('tipoAtencionIndex', ['tipoatenciones'=>$tipoatencion]);    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('createTipoAtencion');
    }

    /**
     * Store a newly created resource in storage.
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
     * Display the specified resource.
     */
    public function show(TipoAtencion $tipoAtencion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TipoAtencion $tipoAtencion)
    {
        return view('editTipoAtencion',['tipoAtencion'=> $tipoAtencion]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TipoAtencion $tipoAtencion)
    {
        $request->validate([
            'nombre_TipoAtencion',
            'costo_TipoAtencion',
            'estado_TipoAtencion'
            ]);
    
            $tipoAtencion->update($request->all());
            return redirect()->route('tipoAtencionIndex')->with('success','Comuna actualizada con éxito en el sistema');
            
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TipoAtencion $tipoAtencion)
    {
        //
    }
}
