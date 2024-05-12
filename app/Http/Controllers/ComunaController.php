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
        $comuna = Comuna::latest()->paginate(5);
        return view('comuna', ['comunas'=>$comuna]);
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
            'nombre_Comuna' =>'required'

        ]);

        Comuna::create($request->all());
        //dd($request->all());
        return redirect()->route('comunas.index')->with('succes','Comuna agregado con éxito al sistema');        }

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
        'nombre_Comuna'
        ]);
        $comuna->update($request->all());
        return redirect()->route('comunas.index')->with('succes','Comuna actualizada con éxito en el sistema');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comuna $comuna)
    {
        //
    }
}
