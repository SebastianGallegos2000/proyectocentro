<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Personal;
use App\Models\Tutores;

class UsuarioController extends Controller
{
    public function __invoke()
    {
        $personal = Personal::all();
        $tutores = Tutores::with('comuna')->get();
    
        return view('usuarios', ['personal' => $personal, 'tutores' => $tutores]);
    }

}
