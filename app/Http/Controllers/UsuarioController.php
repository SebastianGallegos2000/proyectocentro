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
        $personales = User::where('rol_id', '2')->with(['persona.personal' => function ($query) {
            $query->with('especialidad');
        }])->get();        
        $tutores = User::where('rol_id', '1')->with(['persona.tutor.comuna'])->get();
        return view('usuarios', ['personales' => $personales, 'tutores' => $tutores]);
    }
}
