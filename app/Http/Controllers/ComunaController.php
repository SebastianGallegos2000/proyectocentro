<?php

namespace App\Http\Controllers;

use App\Models\Comuna;
use Illuminate\Http\Request;

class ComunaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comuna = Comuna::all();
        return view('comunaIndex', ['comunas'=>$comuna]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('createComuna');
    }

    /**
     * Store a newly created resource in storage.
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
     * Display the specified resource.
     */
    public function show(Comuna $comuna)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comuna $comuna)
    {
        return view('editComuna',['comuna'=> $comuna]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comuna $comuna)
    {
        $request->validate([
        'nombre_Comuna',
        'estado_Comuna'
        ]);

        $comuna->update($request->all());
        return redirect()->route('comunaIndex')->with('success','Comuna actualizada con éxito en el sistema');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comuna $comuna)
    {
        //
    }
}
