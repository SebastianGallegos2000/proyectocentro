<?php

namespace App\Http\Controllers;

use App\Models\Mascotas;
use App\Models\RazaMascota;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MascotasController extends Controller
{
    /**
     * Despliega la vista de las mascotas que posean el tutor_id que está logueado.
     */
    public function index()
    {
        $mascotas = Mascotas::where('tutor_id', Auth::user()->persona->tutor->id)->get();
        return view('tutorIndex', ['mascotas' => $mascotas]);
    }

    /**
     * Despliega el formulario para crear una nueva mascota, carga las razamascotas.
     */
    public function create()
    {
        $razamascotas = RazaMascota::all();
        return view('createMascota',compact('razamascotas'));   
    }

    /**
     * Se almacena la peticion en la base de datos.
     */
    public function store(Request $request)
    {
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

        $this->historial($mascota->id);


        return redirect(route('privada'));
    }

    /**
     * Muestra la vista de la mascota seleccionada.
     */
    public function list()
    {
        //Obtener todas las mascotas
        $mascotas = Mascotas::all();
        $razamascotas = RazaMascota::all();

        return view('mascotaList', compact('mascotas','razamascotas'));
    }

    /**
     * Se obtienen los datos de la mascota seleccionada para crear el pdf con el historial de atenciones.
     */
    public function historial($id)
    {
        //Obtener a la mascota y sus atenciones
        $mascota = Mascotas::find($id);
        // Cargar la relación 'solicitudcitas' junto con 'atenciones' si aún no está cargada.
        $mascota->load('solicitudcitas.atenciones');
        // Pasar el número de chip a la vista, si existe
        $numeroChip = $mascota->nroChip_Mascota ?? null;
        // Usar flatMap para aplanar todas las atenciones en una sola colección.
        // Luego, filtrar para mantener solo aquellas atenciones con estado_Atencion igual a 2.
        $atenciones = $mascota->solicitudcitas->flatMap(function ($solicitudCita) {
            return $solicitudCita->atenciones;
        })->filter(function ($atencion) {
            return $atencion->estado_Atencion == 2;
        });
        // Pasar datos a la vista que genera el PDF
        $datosParaPDF = [
            'mascota' => $mascota,
            'numeroChip' => $numeroChip,
            'atenciones' => $atenciones,
            // Otros datos necesarios para el PDF
        ];
    
        $pdf = PDF::loadView('historial', $datosParaPDF);
    

        $fechaActual = date('Y-m-d');
        $nombreArchivo = "Hoja_Procedimientos_{$mascota->nombre_Mascota}_{$fechaActual}.pdf";
        return $pdf->download($nombreArchivo);
    }

    /**
     * Se obtienen los datos de la mascota seleccionada para crear el pdf en forma de stream con el historial de atenciones.
     */
    public function historialStream($id)
    {
        //Obtener a la mascota y sus atenciones
        $mascota = Mascotas::find($id);
        // Cargar la relación 'solicitudcitas' junto con 'atenciones' si aún no está cargada.
        $mascota->load('solicitudcitas.atenciones');
        // Pasar el número de chip a la vista, si existe
        $numeroChip = $mascota->nroChip_Mascota ?? null;
        // Usar flatMap para aplanar todas las atenciones en una sola colección.
        // Luego, filtrar para mantener solo aquellas atenciones con estado_Atencion igual a 2.
        $atenciones = $mascota->solicitudcitas->flatMap(function ($solicitudCita) {
            return $solicitudCita->atenciones;
        })->filter(function ($atencion) {
            return $atencion->estado_Atencion == 2;
        });
        // Pasar datos a la vista que genera el PDF
        $datosParaPDF = [
            'mascota' => $mascota,
            'numeroChip' => $numeroChip,
            'atenciones' => $atenciones,
            // Otros datos necesarios para el PDF
        ];
    
        $pdf = PDF::loadView('historial', $datosParaPDF);
    

        $fechaActual = date('Y-m-d');
        $nombreArchivo = "Hoja_Procedimientos_{$mascota->nombre_Mascota}_{$fechaActual}.pdf";
        return $pdf->stream($nombreArchivo);
    }
}
