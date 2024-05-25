<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Personal;
use App\Models\Tutores;
use App\Models\Persona;
use App\Models\User;

class UsuarioController extends Controller
{
    public function __invoke()
    {
        $personal = User::where('rol_id', '2')->with(['persona.personal.especialidad'])->get();
        $tutores = User::where('rol_id', '1')->with(['persona.tutor.comuna'])->get();
        return view('usuarios', ['personal' => $personal, 'tutores' => $tutores]);
    }
}
