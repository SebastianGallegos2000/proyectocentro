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
    public function create()
    {
        $comunas = Comuna::all();
        return view('createTutorAdmin', compact('comunas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        //Insertar datos en la tabl usuarios.
        $usuario = new User();
        $usuario->id= User::all()->max('id') + 1;
        $usuario->password_Usuario = Hash::make($request->password_Usuario);
        $usuario->estado_Usuario = $request->estado_Usuario;
        $usuario->rol_id = $request->rol_id;
        $usuario->save();

        //Insertar en la tabla personas.
        $persona = new Persona();
        $persona->id = Persona::all()->max('id') + 1;
        $persona->user_id = $usuario->id;
        $persona->rut_Persona = $request->rut_Persona;
        $persona->dv_Persona = $request->dv_Persona;
        $persona->nombre_Persona = ucfirst($request->nombre_Persona);
        $persona->apellido_Persona = ucfirst($request->apellido_Persona);
        $persona->correo_Persona = $request->correo_Persona;
        $persona->fechaNac_Persona = $request->fechaNac_Persona;
        $persona->telefono_Persona = $request->telefono_Persona;
        $persona->estado_Persona = $request->estado_Persona;
        $persona->save();

        //Insertar en la tabla tutores.



        $tutor = new Tutor();
    
        $tutor->persona_id = $persona->id;
        $tutor->fotocopiacarnet_Tutor = $request->file('fotocopiacarnet_Tutor')->storeAs('public/fotocopiacarnet', $persona->apellido_Persona.'_'.'Fotocopia_Carnet'.'.pdf');
        $tutor->registrosocial_Tutor = $request->file('registrosocial_Tutor')->storeAs('public/registrosocial', $persona->apellido_Persona .'_'.'Registro_Social'. '.pdf');
        $tutor->comuna_id = $request->comuna_id;
        $tutor->estado_Tutor = $request->estado_Tutor;
        $tutor->save();
    
        return redirect()->route('usuarios')->with('success','Has creado tu usuario correctamente');
    }

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
        //Busca el id de la persona que está logueada
        $user = Auth::user();
        $persona = Persona::where('user_id', $user->id)->first();
        $tutor = Tutor::where('persona_id', $persona->id)->first();
        $comunas = Comuna::all();
        return view('editTutor', compact('tutor','persona','user','comunas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $user = Auth::user();
        $persona = Persona::where('user_id', $user->id)->first();
        $tutor = Tutor::where('persona_id', $persona->id)->first();
        //Validación de los campos
        

        //Actualizar los datos
        $persona->update($request->all());
        $user->update([
            'password_Usuario' => Hash::make($request->password_Usuario)
        ]);
        $tutor->update($request->all());

            return redirect(route('perfilTutor'))->with('success','Usuario actualizado con éxito en el sistema');   
        
    }

    //Editar tutores desde la vista administrador
    public function editAdmin(Request $request)
    {
        //Busca los datos de la persona seleccionada.
        $tutor = Tutor::find($request->id);

        $comunas = Comuna::all();
        return view('editTutorAdmin', compact('tutor','comunas'));
    }

    //Actualizar tutores desde la vista administrador
    public function updateAdmin(Request $request)
    {
        $persona = Persona::find($request->id);
        $user = User::find($persona->user_id);
        $tutor = Tutor::find($request->id);


        //Actualizar los datos
        $persona->update($request->all());
        $user->update([
            'password_Usuario' => Hash::make($request->password_Usuario)
        ]);
        $tutor->update($request->all());

            return redirect(route('usuarios'))->with('success','Usuario actualizado con éxito en el sistema');   
        
    }


    public function list()
    {
        //Obtener todos los tutores del sistema.
        $tutores = User::where('rol_id', '1')->with(['persona.tutor.comuna'])->get();
        return view('tutoresList', compact('tutores',));
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tutor $tutor)
    {
        //
    }
}
