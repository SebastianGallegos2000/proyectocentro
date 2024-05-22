<?php

namespace App\Http\Controllers;

use App\Models\RazaMascota;
use Illuminate\Http\Request;

class RazaMascotaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $razaMascota = RazaMascota::all();
        return view('razamascotaIndex', ['razaMascotas'=>$razaMascota]);    
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('createRazamascota');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre_Razamascota' =>'required'
        ]);

        RazaMascota::create($request->all());
        return redirect()->route('razamascotaIndex')->with('succes','La raza de la mascota fue agregado con éxito al sistema');
    }

    /**
     * Display the specified resource.
     */
    public function show(RazaMascota $razaMascota)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RazaMascota $razamascotum)
    {
        return view('editRazamascota',['razamascotum' =>$razamascotum]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, RazaMascota $razamascotum)
    {
        $request->validate([
            'nombre_Razamascota' =>'required'
        ]);

        $razamascotum->update($request ->all());
        return redirect()->route('razamascotaIndex')->with('succes','Se ha actualizado con éxito la raza de la mascota');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RazaMascota $razaMascota)
    {
        //
    }
}
