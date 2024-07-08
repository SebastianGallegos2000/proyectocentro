<?php

namespace App\Http\Controllers;

use App\Models\Admins;
use App\Models\Insumo;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Despliega la vista con los insumos en el sistema para mostrar en dashboard.
     */
    public function index()
    {
        $insumos = Insumo::all();
        return view('adminIndex', ['insumos'=>$insumos]);
    }

    /**
     * Despliega la vista con las citas.
     */
    public function citas()
    {
        return view('citasAdmin');
    }
}
