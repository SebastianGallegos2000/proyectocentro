<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BlockedTime;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class BlockTimeController extends Controller
{

    /**
     * Almacena las horas bloqueadas en la vista admin.
     */
    public function store(Request $request)
    {
        // Validar los campos
        $request->validate([
            'blockDate' => 'required|date',
            'hora_inicio' => 'required|date_format:H:i:s',
        ]);
    
        // Crear un nuevo horario bloqueado
        $blockedTime = new BlockedTime();
        $blockedTime->blockDate = $request->blockDate;
        $blockedTime->hora_inicio = $request->hora_inicio;

        // Calcular la hora de término que es 30 minutos después de la hora de inicio
        $hora_inicio = Carbon::createFromFormat('H:i:s', $request->hora_inicio);
        $blockedTime->hora_termino = $hora_inicio->addMinutes(30)->format('H:i:s');

        $blockedTime->save();
    
        // Redirigir al usuario con un mensaje de éxito
        return back()->with('success', 'Hora bloqueada con éxito.');
    }

    /**
     * Desbloquea una hora en la vista admin.
     */
    public function unblockTime(Request $request)
    {
        $date = $request->input('date');
        $time = $request->input('time');
        DB::table('blocked_time')->where('blockDate', $date)->where('hora_inicio', $time)->delete();
        return back()->with('success', 'Horario desbloqueado con éxito');
    }
}
