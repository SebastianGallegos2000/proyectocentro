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
        $personal = Personal::all();
        $tutores = User::where('id_Rol_Usuario', '1')->with(['persona','persona.tutor','persona.tutor.comuna'])->get();
        return view('usuarios', ['personal' => $personal, 'tutores' => $tutores]);
    }
}
