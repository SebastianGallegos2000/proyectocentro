<?php

namespace App\Http\Controllers;

use App\Models\Insumos;
use Illuminate\Http\Request;

class InsumosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('insumoPersonal');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('createInsumo');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre_Insumo' =>'required',
            'cantidad_Insumo' => 'required',
            'costo_Insumo' => 'required'

        ]);

        Insumos::create($request->all());
        //dd($request->all());
        return redirect()->route('insumos.index')->with('succes','Insumo agregado con éxito al sistema');    
    }

    /**
     * Display the specified resource.
     */
    public function show(Insumos $insumos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Insumos $insumos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Insumos $insumos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Insumos $insumos)
    {
        //
    }
}
