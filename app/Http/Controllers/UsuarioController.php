<?php

namespace App\Http\Controllers;

use App\Models\Personal;
use App\Models\Tutor;
use App\Models\Especialidad;

class UsuarioController extends Controller
{
    public function index()
    {
        $personales = Personal::all();
        $especialidades= Especialidad::all();
        $tutores = Tutor::all();
        return view('usuarios', ['personales' => $personales, 'tutores' => $tutores,'especialidades'=>$especialidades]);
    }
}
