<?php

namespace App\Http\Controllers;

use App\Models\Atenciones;
use App\Models\Mascotas;
use App\Models\SolicitudCitas;
use App\Models\Insumo;
use App\Models\InsumoAtenciones;
use Illuminate\Http\Request;

class AtencionesController extends Controller
{
    /**
     * Muestra la vista con los recursos de solicitud, mascota y user.
     */
    public function create($id)
    {
        $solicitud = SolicitudCitas::find($id);
        $mascota = $solicitud->mascota;
        $user = auth()->user();

        $insumos = Insumo::all();
        return view('atencion', ['solicitud' => $solicitud, 'mascota' => $mascota, 'user' => $user, 'insumos'=>$insumos]);
    }

    /**
     * Guarda la información en la base de datos.
     */
    public function store(Request $request)
    {
        //Validacion de los campos
        $request->validate([
            'solicitudcita_id' => 'required|unique:atenciones,solicitudcita_id',
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
        return redirect()->route('citasPersonal')->with('success','Ha terminado con éxito la atención la atención');

    }
}
