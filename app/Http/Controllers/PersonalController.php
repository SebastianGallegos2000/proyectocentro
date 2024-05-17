<?php

namespace App\Http\Controllers;

use App\Models\Personal;
use Illuminate\Http\Request;

class PersonalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $personal = Personal::all();
        return view('usuarios', ['personals'=>$personal]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('/createPersonal');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'rut_Personal' => 'required',
            'dv_Personal'=> 'required',
            'password_Personal'=> 'required',
            'nombre_Personal'=> 'required',
            'apellido_Personal'=> 'required',
            'correo_Personal'=> 'required',
            'fechaNac_Personal'=> 'required',
            'telefono_Personal'=> 'required',
            'id_Especialidad_Personal'=> 'required',
            'id_Rol_Personal'=> 'required',
            'estado_Personal'=> 'required'
        ]);

        
        $rut = $request->input('rut_Personal');
        $dv = $request->input('dv_Personal');
        $password = $request->input('password_Personal');
        $name = $request->input('nombre_Personal');
        $apellido = $request->input('apellido_Personal');
        $email = $request->input('correo_Personal');
        $fechaNac = $request->input('fechaNac_Personal');
        $telefono = $request->input('telefono_Personal');
        $comuna = $request->input('id_Especialidad_Personal');
        $rol = $request->input('id_Rol_Personal');
        $estado = $request->input('estado_Personal');

        Personal::insert([
            'rut_Personal' => $rut,
            'dv_Personal' => $dv,
            'password_Personal' => $password,
            'nombre_Personal' => $name,
            'apellido_Personal' => $apellido,
            'correo_Personal' => $email,
            'fechaNac_Personal' => $fechaNac,
            'telefono_Personal' => $telefono,
            'id_Especialidad_Personal' => $comuna,
            'id_Rol_Personal' => $rol,
            'estado_Personal' => $estado
        ]);

        return redirect('/admin')->with('succes','Has creado tu usuario correctamente');    

    }

    /**
     * Display the specified resource.
     */
    public function show(Personal $personal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Personal $personal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Personal $personal)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Personal $personal)
    {
        //
    }
}
