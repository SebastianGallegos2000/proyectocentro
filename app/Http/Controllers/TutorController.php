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
     * Despliega un formulario para crear un usuario con el rol tutor.
     */
    public function create()
    {
        $comunas = Comuna::where('estado_Comuna', 1)->get();
        return view('createTutorAdmin', compact('comunas'));
    }

    /**
     * Almacena los datos ingresados en el formulario.
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
     * Despliega el perfil del tutor que está en la sesión.
     */
    public function show(Tutor $tutor)
    {
        return view('perfilTutor',$tutor);
        
    }

    /**
     * Despliega formulario para editar datos del tutor.
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
     * Actualiza los datos ingresados en el formulario edit.
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

    
    /**
     * Despliega la vista para editar los datos del tutor en la vista del Administrador.
     */
    public function editTutorAdmin($id)
    {
        $user = User::find($id);
        $comunas = Comuna::where('estado_Comuna', 1)->get();
        $persona = $user->persona;
        $tutor = $persona->tutor;

        return view('editTutorAdmin', ['user' => $user, 'persona' => $persona, 'tutor' => $tutor, 'comunas' => $comunas]);
    }

    /**
     * Actualiza los datos del tutor en la vista del Administrador.
     */
    public function updateTutorAdmin(Request $request, $tutor)
    {
        $persona = Persona::find($tutor);
        $user = User::find($persona->user_id);
        $tutor = Tutor::find($tutor);
    
        //Actualizar los datos
        //Si el usuario no modifica la contraseña, se mantiene la misma.
        if($request->password_Usuario != null){
            $user->password = Hash::make($request->password_Usuario);
        }
    
        $user->save();
    
        $tutor->update($request->all());
        $persona->update($request->all());
    
        return redirect(route('usuarios'))->with('success','Usuario actualizado con éxito en el sistema');   
    }


    /**
     * Despliega la vista para listar a los tutores.
     */
    public function list()
    {
        //Obtener todos los tutores del sistema.
        $tutores = Tutor::all();
        return view('tutoresList', compact('tutores',));
    }

    /**
     * Despliega las mascotas del tutor seleccionado.
     */
    public function mascotasTutor($id)
    {
        
        $tutor = Tutor::find($id);
        $mascotas = Mascotas::where('tutor_id', $tutor->id)->get();
        
        return view('mascotasTutor', compact('mascotas', 'tutor'));
    }


}
