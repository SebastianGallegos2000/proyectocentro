<?php

namespace App\Http\Controllers;

use App\Models\Comuna;
use App\Models\Persona;
use App\Models\Tutor;
use App\Models\User;
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
        return view('perfilTutor',$tutor);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tutor $tutor, Persona $persona, User $usuario)
    {
        $persona = Persona::find($tutor->persona_id);
        $usuario = User::find($persona->user_id);
        return view('editTutor', compact('tutor','persona','usuario'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tutor $tutor, Persona $persona, User $usuario)
    {
        //Validación de los campos
        $request->validate([
            'rut_Persona'=>'required',
            'dv_Persona'=>'required',
            'password_Usuario'=>'required',
            'nombre_Persona'=>'required',
            'apellido_Persona'=>'required',
            'correo_Persona'=>'required',
            'fechaNac_Persona'=>'required',
            'telefono_Persona'=>'required',
            'comuna_id'=>'required',
            'fotocopiacarnet_Tutor'=>'required',
            'registrosocial_Tutor'=>'required',
            'estado_Persona'=>'required',
            'estado_Usuario'=>'required',
            'estado_Tutor'=>'required'
        ]);
            $persona->update($request->rut_Persona);
            $persona->update($request->dv_Persona);
            $usuario->update($request->password_Usuario);
            $persona->update($request->nombre_Persona);
            $persona->update($request->apellido_Persona);
            $persona->update($request->correo_Persona);
            $persona->update($request->fechaNac_Persona);
            $persona->update($request->telefono_Persona);
            $tutor->update($request->comuna_id);
            $tutor->update($request->fotocopiacarnet_Tutor);
            $tutor->update($request->registrosocial_Tutor);
            $persona->update($request->estado_Persona);
            $usuario->update($request->estado_Usuario);
            $tutor->update($request->estado_Tutor);

            return redirect('usuarios')->with('success','Usuario actualizado con éxito en el sistema');    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tutor $tutor)
    {
        //
    }
}
