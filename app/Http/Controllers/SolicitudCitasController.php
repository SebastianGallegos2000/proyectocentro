<?php

namespace App\Http\Controllers;

use App\Models\SolicitudCitas;
use App\Models\Mascotas;
use App\Models\TipoAtencion;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Models\BlockedDay;
use App\Models\BlockedTime;

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
        'estado_SolicitudCita' => 'required',
    ]);

        // Verificar si el día está bloqueado
        $diaBloqueado = BlockedDay::where('date', $request->fecha_SolicitudCita)->first();
        if ($diaBloqueado) {
            // Si el día está bloqueado, mostrar un mensaje de error
            return back()->withErrors(['error' => 'No puedes agendar en día bloqueado.']);
        }


        // Calcular la hora de término que es 30 minutos después de la hora de inicio
        $horaInicio = Carbon::createFromFormat('H:i:s', $request->horaInicio_SolicitudCita);
        $horaTermino = $horaInicio->addMinutes(30)->format('H:i:s');

        // Verificar si el horario está bloqueado
        $horaBloqueada = BlockedTime::where('blockDate', $request->fecha_SolicitudCita)
            ->where('hora_inicio', '<=', $request->horaInicio_SolicitudCita)
            ->where('hora_termino', '>=', $horaTermino)
            ->first();
        if ($horaBloqueada) {
            // Si el horario está bloqueado, mostrar un mensaje de error
            return back()->withErrors(['error' => 'No puedes agendar en un horario bloqueado.']);
        }


        // Verificar si ya existen dos solicitudes de cita con la misma fecha, misma hora de inicio y diferentes tipoatencion_id
        $existingSolicitudesCount = SolicitudCitas::where('fecha_SolicitudCita', $request->fecha_SolicitudCita)
            ->where('horaInicio_SolicitudCita', $request->horaInicio_SolicitudCita)
            ->distinct('tipoatencion_id')
            ->count();
        
        if ($existingSolicitudesCount >= 2) {
            // Si existen, mostrar un mensaje de error
            return back()->withErrors(['error' => 'No puede agendar porque ya existen dos citas con la misma fecha, misma hora de inicio y diferentes tipos de atención.']);
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
            $horaTermino = $horaInicio->copy()->addMinutes(30)->format('H:i:s');
        } else {
            $horaTermino = $horaInicio->copy()->addHour()->format('H:i:s');
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
    // Obtener las citas
    $citas = SolicitudCitas::where('estado_SolicitudCita', 1)->get();
    
    // Obtener los días bloqueados
    $blockedDays = DB::table('blocked_days')->get();

    // Obtener los horarios bloqueados
    $blockedTimes = DB::table('blocked_time')->get();

    $events = [];

    // Agregar las citas al array de eventos
    foreach ($citas as $cita) {
        $events[] = [
            'title' => $cita->mascota->nombre_Mascota . ' - ' . $cita->tipoatencion->nombre_TipoAtencion,
            'start' => $cita->fecha_SolicitudCita . 'T' . $cita->horaInicio_SolicitudCita,
            'end' => $cita->fecha_SolicitudCita . 'T' . $cita->horaTermino_SolicitudCita,
        ];
    }

    // Agregar los días bloqueados al array de eventos
    foreach ($blockedDays as $day) {
        $events[] = [
            'title' => 'Bloqueado',
            'start' => $day->date,
            'end' => $day->date,
            'display' => 'background',
            'overlap' => false,
            'color' => '#ff9f89'
        ];
    }

    // Agregar los horarios bloqueados al array de eventos
    foreach ($blockedTimes as $time) {
        $events[] = [
            'title' => 'Bloqueado',
            'start' => $time->blockDate . 'T' . $time->hora_inicio,
            'end' => $time->blockDate . 'T' . $time->hora_termino,
            'display' => 'background',
            'overlap' => false,
            'color' => '#ff9f89'
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
        ])->get(['horaInicio_SolicitudCita', 'horaFin_SolicitudCita']);
    
        // Convertir los horarios ocupados a un formato que FullCalendar pueda entender
        $events = [];
        foreach ($horariosOcupados as $horario) {
            $events[] = [
                'title' => 'Ocupado',
                'start' => $horario->horaInicio_SolicitudCita,
                'end' => $horario->horaFin_SolicitudCita,
                'color' => '#ff9f89'
            ];
        }
    
        // Devolver los horarios ocupados como un array
        return response()->json($events);
    }

    public function citaAgendada(SolicitudCitas $solicitud)
    {
    // Obtener la solicitud de la sesión
    $solicitud = session('solicitud');


        return view('agendada',['solicitud' => $solicitud]);
    }

    public function cancelar($id)
    {
        $solicitud = SolicitudCitas::find($id);
        $solicitud->estado_SolicitudCita = 0;
        $solicitud->save();

        return response()->json(['success' => true]);
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
