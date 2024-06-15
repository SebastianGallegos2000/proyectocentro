<?php

namespace App\Http\Controllers;

use App\Models\Comuna;
use App\Models\Persona;
use App\Models\Tutor;
use App\Models\User;
use App\Models\Mascotas;
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
        $tutor->fotocopiacarnet_Tutor = $request->file('fotocopiacarnet_Tutor')->storeAs('public/fotocopiacarnet', $persona->rut_Persona.'_'.'Fotocopia_Carnet'.'.pdf');
        $tutor->registrosocial_Tutor = $request->file('registrosocial_Tutor')->storeAs('public/registrosocial', $persona->rut_Persona .'_'.'Registro_Social'. '.pdf');
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
        //Si el usuario no modifica la contraseña, se mantiene la misma.
        if($request->password_Usuario == null){
            $user->update([
                'password_Usuario' => $user->password_Usuario
            ]);

        }else{
            $user->update([
                'password_Usuario' => Hash::make($request->password_Usuario)
            ]);
        }

        //Update a cada dato del tutor por separado. Si no se modificó el archivo, se mantiene el mismo.
        if($request->file('fotocopiacarnet_Tutor' && 'registrosocial_Tutor') == null){
            $tutor->update([
                'comuna_id' => $request->comuna_id,
                'estado_Tutor' => $tutor->estado_Tutor
            ]);
            return redirect(route('perfilTutor'))->with('success','Usuario actualizado con éxito en el sistema');   
        }
        else{
            $tutor->update([
                'fotocopiacarnet_Tutor' => $request->file('fotocopiacarnet_Tutor')->storeAs('public/fotocopiacarnet', $persona->rut_Persona.'_'.'Fotocopia_Carnet'.'.pdf'),
                'registrosocial_Tutor' => $request->file('registrosocial_Tutor')->storeAs('public/registrosocial', $persona->rut_Persona .'_'.'Registro_Social'. '.pdf'),
                'comuna_id' => $request->comuna_id,
                'estado_Tutor' => $request->estado_Tutor
            ]);

            return redirect(route('perfilTutor'))->with('success','Usuario actualizado con éxito en el sistema');   
        
        }
    }

    //Editar tutores desde la vista administrador
    public function editTutorAdmin($id)
    {
        $user = User::find($id);
        $comunas = Comuna::all();
    
    
        $persona = $user->persona;
        $tutor = $persona->tutor;
    

    
        return view('editTutorAdmin', ['user' => $user, 'persona' => $persona, 'tutor' => $tutor, 'comunas' => $comunas]);
    }

    //Actualizar tutores desde la vista administrador
    public function updateTutorAdmin(Request $request, $tutor)
    {
        $persona = Persona::find($tutor);
        $user = User::find($persona->user_id);
        $tutor = Tutor::find($tutor);
    
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
