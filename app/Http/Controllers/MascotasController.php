<?php

namespace App\Http\Controllers;

use App\Models\Mascotas;
use App\Models\RazaMascota;
use App\Models\Tutor;
use App\Models\User;
use App\Models\Persona;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MascotasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mascotas = Mascotas::where('tutor_id', Auth::user()->persona->tutor->id)->get();
        return view('tutorIndex', ['mascotas' => $mascotas]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $razamascotas = RazaMascota::all();
        return view('createMascota',compact('razamascotas'));   
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd(Auth::user(), Auth::user()->persona, Auth::user()->persona->tutor);

        //Validar los datos - Los datos nroChip_Mascota puede ser null
        $request->validate([
            'nombre_Mascota' => 'required|string|max:50',
            'razamascota_id' => 'required|integer',
            'nroChip_Mascota' => 'nullable|integer',
            'peso_Mascota' => 'required|numeric',
            'edad_Mascota' => 'required|integer',
            'especie_Mascota' => 'required|string|max:50',
            'sexo_Mascota' => 'required|string|max:6',
            'estado_Mascota' => 'required|integer'
        ]);
        $mascota = new Mascotas();
        $mascota->id = Mascotas::max('id')+1;
        $mascota->tutor_id = Auth::user()->persona->tutor->id;
        $mascota->nombre_Mascota = ucfirst($request->nombre_Mascota);
        $mascota->razamascota_id = $request->razamascota_id;
        $mascota->nroChip_Mascota = $request->nroChip_Mascota;
        $mascota->peso_Mascota = $request->peso_Mascota;
        $mascota->edad_Mascota = $request->edad_Mascota;
        $mascota->especie_Mascota = $request->especie_Mascota;
        $mascota->sexo_Mascota = $request->sexo_Mascota;
        $mascota->estado_Mascota = $request->estado_Mascota;
        $mascota->save();

        return redirect(route('privada'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Mascotas $mascotas)
    {
        //
    }

    public function list()
    {
        //Obtener todas las mascotas
        $mascotas = Mascotas::all();
        $razamascotas = RazaMascota::all();

        return view('mascotaList', compact('mascotas','razamascotas'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Mascotas $mascotas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Mascotas $mascotas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mascotas $mascotas)
    {
        //
    }
}
