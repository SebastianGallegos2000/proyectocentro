<?php

namespace App\Http\Controllers;

use App\Models\Atenciones;
use App\Models\Mascotas;
use App\Models\SolicitudCitas;
use Illuminate\Http\Request;

class AtencionesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        $solicitud = SolicitudCitas::find($id);
        $mascota = $solicitud->mascota;
        $user = auth()->user();
        return view('atencion', ['solicitud' => $solicitud, 'mascota' => $mascota, 'user' => $user]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Atenciones $atenciones)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Atenciones $atenciones)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Atenciones $atenciones)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Atenciones $atenciones)
    {
        //
    }
}
