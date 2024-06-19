<?php

namespace App\Http\Controllers;

use App\Models\SolicitudCitas;
use App\Models\Mascotas;
use App\Models\TipoAtencion;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Carbon\Carbon;

class SolicitudCitasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Mascotas $mascota):View
    {
        //Captura las tipoatencion
        $tipoatencion = TipoAtencion::all();

        return view('solicitud' , ['mascota' => $mascota, 'tipoatencion' => $tipoatencion]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Validacion de los campos
        $request->validate([
            'mascota_id' => 'required',
            'tipoatencion_id' => 'required',
            'fecha_SolicitudCita' => 'required',
            'horaInicio_SolicitudCita' => 'required',
            'horaTermino_SolicitudCita' => 'required',
            'estado_SolicitudCita' => 'required',
        ]);
    
        // Verificar si ya existe una solicitud de cita con la misma fecha, hora y tipo de atención
        $existingSolicitud = SolicitudCitas::where('fecha_SolicitudCita', $request->fecha_SolicitudCita)
            ->where('horaInicio_SolicitudCita', $request->horaInicio_SolicitudCita)
            ->where('tipoatencion_id', $request->tipoatencion_id)
            ->first();
    
        if ($existingSolicitud) {
            // Si existe, mostrar un mensaje de error
            return back()->withErrors(['error' => 'No puede agendar porque ya está agendado en ese horario.']);
        }
    
        //Se crea una nueva solicitud de cita
        $solicitud = new SolicitudCitas();
        //Se le asignan los datos del formulario
        $solicitud->mascota_id = $request->mascota_id;
        $solicitud->tipoatencion_id = $request->tipoatencion_id;
        $solicitud->fecha_SolicitudCita = $request->fecha_SolicitudCita;

        $solicitud->horaInicio_SolicitudCita = $request->horaInicio_SolicitudCita;

        // Calcula la hora de término
        $horaInicio = Carbon::createFromFormat('H:i:s', $request->horaInicio_SolicitudCita);
        if ($request->tipoatencion_id == 1) {
            $horaTermino = $horaInicio->addMinutes(30)->format('H:i:s');
        } else {
            $horaTermino = $horaInicio->addHour()->format('H:i:s');
        }

        $solicitud->horaTermino_SolicitudCita = $horaTermino;
        $solicitud->estado_SolicitudCita = $request->estado_SolicitudCita;
        $solicitud->save();
    
        // Almacenar la solicitud en la sesión
        session(['solicitud' => $solicitud]);


        return redirect()->route('citaAgendada', ['solicitud' => $solicitud]);
        //Se le envía un correo electrónico a la persona que agendó la cita
        //$to_name = Auth::user()->persona->nombre_Persona;
        //$to_email = Auth::user()->persona->correo_Persona;
        //$data = array('name' => 'Ogbonna Vitalis', 'body' => 'A test mail');
    
        //Mail::send('mail', $data, function($message) use ($to_name, $to_email) {
    }

    public function getEvents()
    {
        $solicitudes = SolicitudCitas::all();

        $events = [];

        foreach ($solicitudes as $solicitud) {
            $events[] = [
                'title' => $solicitud->tipoatencion->nombre_TipoAtencion . ' - ' . $solicitud->mascota->nombre_Mascota,
                'start' => $solicitud->fecha_SolicitudCita . 'T' . $solicitud->horaInicio_SolicitudCita,
                'end' => $solicitud->fecha_SolicitudCita . 'T' . $solicitud->horaTermino_SolicitudCita,
            ];
    }

        return response()->json($events);
    }

    public function getHorariosOcupados(Request $request)
    {
        $tipoatencion_id = $request->query('tipoatencion_id');
        $fecha_SolicitudCita = $request->query('fecha_SolicitudCita');
    
        // Buscar en la base de datos las citas que ya están programadas para el tipoatencion_id y la fecha_SolicitudCita dada
        $horariosOcupados = SolicitudCitas::where([
            ['tipoatencion_id', '=', $tipoatencion_id],
            ['fecha_SolicitudCita', '=', $fecha_SolicitudCita]
        ])->pluck('horaInicio_SolicitudCita');
    
        // Devolver los horarios ocupados como un array
        return response()->json($horariosOcupados->toArray());
    }

    public function citaAgendada(SolicitudCitas $solicitud)
    {
    // Obtener la solicitud de la sesión
    $solicitud = session('solicitud');


        return view('agendada',['solicitud' => $solicitud]);
    }

    /**
     * Display the specified resource.
     */
    public function show(SolicitudCitas $solicitudCitas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SolicitudCitas $solicitudCitas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SolicitudCitas $solicitudCitas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SolicitudCitas $solicitudCitas)
    {
        //
    }
}
