<?php

namespace App\Http\Controllers;

use App\Models\Insumo;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class InsumoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index():View
    {
        $insumos= Insumo::latest()->paginate(5);
        return view('insumoPersonal', ['insumos'=>$insumos]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create():View
    {
        return view('createInsumo');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'nombre_Insumo' =>'required',
            'cantidad_Insumo' => 'required',
            'costo_Insumo' => 'required'

        ]);

        Insumo::create($request->all());
        //dd($request->all());
        return redirect()->route('insumo.index')->with('succes','Insumo agregado con éxito al sistema');    
    }

    /**
     * Display the specified resource.
     */
    public function show(Insumo $insumo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Insumo $insumo): View
    {
        //dd($insumo);
        return view('editInsumo',['insumo'=> $insumo]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Insumo $insumo):RedirectResponse
    {
        $request->validate([
            'nombre_Insumo' =>'required',
            'cantidad_Insumo' => 'required',
            'costo_Insumo' => 'required'

        ]);
        $insumo->update($request->all());
        return redirect()->route('insumo.index')->with('succes','Insumo actualizado con éxito al sistema');    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Insumo $insumo)
    {
        //
    }
}
