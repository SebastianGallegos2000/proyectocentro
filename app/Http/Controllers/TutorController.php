<?php

namespace App\Http\Controllers;

use App\Models\Tutor;
use App\Models\Tutores;
use Illuminate\Http\Request;

class TutorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tutor= Tutores::latest();
        return view('tutor',$tutor);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('/auth/createTutor');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'rut_Tutor' => 'required',
            'dv_Tutor' => 'required',
            'nombre_Tutor' => 'required',
            'apellido_Tutor' => 'required',
            'correo_Tutor' => 'required',
            'fechaNac_Tutor' => 'required',
            'telefono_Tutor' => 'required',
            'id_Comuna_Tutor' => 'required',
            'fotocopiacarnet_Tutor' => 'required',
            'registrosocial_Tutor' => 'required',
            'id_Rol_Tutor' => 'required',
            'estado_Tutor' => 'required'
        ]);

        $rut = $request->input('rut_Tutor');
        $dv = $request->input('dv_Tutor');
        $password = $request->input('password_Tutor');
        $name = $request->input('nombre_Tutor');
        $apellido = $request->input('apellido_Tutor');
        $email = $request->input('correo_Tutor');
        $fechaNac = $request->input('fechaNac_Tutor');
        $telefono = $request->input('telefono_Tutor');
        $comuna = $request->input('id_Comuna_Tutor');
        $pathFotocopiaCarnet = $request->file('fotocopiacarnet_Tutor')->storeAs('public/fotocopiacarnet', $rut .'_'.'Fotocopia_Carnet'. '.pdf');
        $pathRegistroSocial = $request->file('registrosocial_Tutor')->storeAs('public/registrosocial', $rut .'_'.'Registro_Social'. '.pdf');
        $rol = $request->input('id_Rol_Tutor');
        $estado = $request->input('estado_Tutor');

        Tutores::insert([
            'rut_Tutor' => $rut,
            'dv_Tutor' => $dv,
            'password_Tutor' => $password,
            'nombre_Tutor' => $name,
            'apellido_Tutor' => $apellido,
            'correo_Tutor' => $email,
            'fechaNac_Tutor' => $fechaNac,
            'telefono_Tutor' => $telefono,
            'id_Comuna_Tutor' => $comuna,
            'fotocopiacarnet_Tutor' => $pathFotocopiaCarnet,
            'registrosocial_Tutor' => $pathRegistroSocial,
            'id_Rol_Tutor' => $rol,
            'estado_Tutor' => $estado
        ]);



        //dd($request);
        
        return redirect()->route('loginTutor')->with('succes','Has creado tu usuario correctamente');    

    }

    /**
     * Display the specified resource.
     */
    public function show(Tutores $tutor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tutores $tutor)
    {
        return view('editTutor',['tutor'=> $tutor]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tutores $tutor)
    {
        $request->validate([
            'password_Tutor',
            'nombre_Tutor',
            'apellido_Tutor',
            'correo_Tutor',
            'fechaNac_Tutor',
            'telefono_Tutor',
            'id_Comuna_Tutor',
            'fotocopiacarnet_Tutor',
            'registrosocial_Tutor',
            'id_Rol_Tutor',
            'estado_Tutor'
            
            ]);
            $tutor->update($request->all());
            return redirect('usuarios')->with('succes','Comuna actualizada con éxito en el sistema');    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tutores $tutor)
    {
        //
    }
}
