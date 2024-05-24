<?php

namespace App\Http\Controllers;

use App\Models\Comuna;
use App\Models\Tutor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class TutorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    //public function index()
    //{
    //    $tutor= Tutor::all();
    //    return view('tutorIndex',$tutor);
    //}

    /**
     * Show the form for creating a new resource.
     */
    //public function create()
    //{
    //    $comunas = Comuna::all();
    //    return view('createTutor', compact('comunas'));
    //}

    /**
     * Store a newly created resource in storage.
     */
    //public function store(Request $request)
    //{
    //    $request->validate([
    //        'rut_Tutor' => 'required',
    //        'dv_Tutor' => 'required',
    //        'nombre_Tutor' => 'required',
    //        'apellido_Tutor' => 'required',
    //        'correo_Tutor' => 'required',
    //        'fechaNac_Tutor' => 'required',
    //        'telefono_Tutor' => 'required',
    //        'id_Comuna_Tutor' => 'required',
    //        'fotocopiacarnet_Tutor' => 'required',
    //        'registrosocial_Tutor' => 'required',
    //        'id_Rol_Tutor' => 'required',
    //        'estado_Tutor' => 'required'
    //    ]);
    //
    //    $tutor = new Tutor();
    //
    //    $tutor->rut_Tutor = $request->rut_Tutor;
    //    $tutor->dv_Tutor = $request->dv_Tutor;
    //    $tutor->password_Tutor = Hash::make($request->password_Tutor);
    //    $tutor->nombre_Tutor = $request->nombre_Tutor;
    //    $tutor->apellido_Tutor = $request->apellido_Tutor;
    //    $tutor->correo_Tutor = $request->correo_Tutor;
    //    $tutor->fechaNac_Tutor = $request->fechaNac_Tutor;
    //    $tutor->telefono_Tutor = $request->telefono_Tutor;
    //    $tutor->id_Comuna_Tutor = $request->id_Comuna_Tutor;
    //    $tutor->fotocopiacarnet_Tutor = $request->file('fotocopiacarnet_Tutor')->storeAs('public/fotocopiacarnet', $tutor->rut_Tutor.'_'.'Fotocopia_Carnet'.'.pdf');
    //    $tutor->registrosocial_Tutor = $request->file('registrosocial_Tutor')->storeAs('public/registrosocial', $tutor->rut_Tutor .'_'.'Registro_Social'. '.pdf');
    //    $tutor->id_Rol_Tutor = $request->id_Rol_Tutor;
    //    $tutor->estado_Tutor = $request->estado_Tutor;
    //    $tutor->save();
    //
    //
    //    //dd($request);
    //    Auth::login($tutor);
    //    return redirect()->route('tutorIndex')->with('success','Has creado tu usuario correctamente');
    //
    //}

    /**
     * Display the specified resource.
     */
    public function show(Tutor $tutor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tutor $tutor)
    {
        return view('editTutor',['tutor'=> $tutor]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tutor $tutor)
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
    public function destroy(Tutor $tutor)
    {
        //
    }
}
