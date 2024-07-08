<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BlockDayController extends Controller
{

    /**
     * Almacena los días bloqueados en la vista admin..
     */
    public function store(Request $request)
    {
        $blockDate = $request->input('blockDateOnly');
    
        // Crear un nuevo registro en la tabla blocked_days
        DB::table('blocked_days')->insert([
            'date' => $blockDate,
            'reason' => 'Bloqueado'
        ]);
    
        return back()->with('success', 'Día bloqueado exitosamente');
    }


    /**
     * Desbloquea un día en la vista admin.
     */
    public function unblockDay(Request $request)
    {
        $date = $request->input('date');
        DB::table('blocked_days')->where('date', $date)->delete();
        return back()->with('success', 'Día desbloqueado con éxito');
    }
}
