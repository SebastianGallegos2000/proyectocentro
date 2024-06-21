<?php

namespace App\Http\Controllers;

use App\Models\Atenciones;
use App\Models\Mascotas; // Add this line
use App\Models\SolicitudCitas;
use App\Models\Insumo; // Add this line
use App\Models\InsumoAtenciones;
use App\Models\Personal; // Add this line
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

        $insumos = Insumo::where('estado_Insumo', 1)->get();
        return view('atencion', ['solicitud' => $solicitud, 'mascota' => $mascota, 'user' => $user, 'insumos'=>$insumos]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Validacion de los campos
        $request->validate([
            'solicitudcita_id' => 'required',
            'personal_id' => 'required',
            'observacion_Atencion' => 'required',
            'peso_Atencion' => 'required',
            'estado_Atencion' => 'required',
            'insumos' => 'required|array',
            'insumos.*' => 'required|exists:insumos,id', // Asegura que cada ID de insumo exista en la tabla de insumos
            'cantidad' => 'required|array',
            'cantidad.*' => 'required|numeric' // Asegura que cada cantidad sea un número
        ]);
        // Crear una nueva Atencion
        $atencion = Atenciones::create([
            'solicitudcita_id' => $request->solicitudcita_id,
            'personal_id' => $request->personal_id,
            'observacion_Atencion' => $request->observacion_Atencion,
            'peso_Atencion' => $request->peso_Atencion,
            'estado_Atencion' => $request->estado_Atencion,
        ]);

        // Crear InsumoAtenciones asociadas
        for ($i = 0; $i < count($request->insumos); $i++) {
            InsumoAtenciones::create([
                'id_Insumo_Nav' => $request->insumos[$i],
                'id_Atencion_Nav' => $atencion->id,
                'cantidad' => $request->cantidad[$i]
            ]);

                // Buscar el insumo en la base de datos
                $insumo = Insumo::find($request->insumos[$i]);

                // Restar la cantidad utilizada de la cantidad total del insumo
                $insumo->cantidad_Insumo -= $request->cantidad[$i];

                // Guardar el insumo actualizado
                $insumo->save();
        }
        // Cambia el estado de la solicitud de cita
        $solicitud = SolicitudCitas::find($request->solicitudcita_id);
        $solicitud->estado_SolicitudCita = 2;
        $solicitud->save();

        // Si el usuario ingresó un número de chip
        if ($request->has('nroChip_Mascota')) {
            // Buscar la mascota asociada a la solicitud de cita
            $mascota = Mascotas::find($solicitud->mascota_id);
        
            // Actualizar el número de chip de la mascota
            $mascota->nroChip_Mascota = $request->nroChip_Mascota;
            $mascota->update();
        }

        //for ($i = 0; $i < count($request->insumos); $i++) {
        //    $insumo = new Insumo;
        //    $insumo->nombre_Insumo = $request->insumos[$i];
        //    $insumo->cantidad = $request->cantidad[$i];
        //    $insumo->atencion_id = $atencion->id; // Asume que tienes una relación entre insumos y atenciones
        //    $insumo->save();
        //}
        return redirect()->route('citasPersonal')->with('success','Ha terminado con éxito la atención la atención');

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
