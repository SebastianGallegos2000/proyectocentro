<?php

namespace App\Http\Controllers;

use App\Models\Personal;
use App\Models\User;
use App\Models\Persona;
use App\Models\Insumo;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Especialidad;
use App\Models\SolicitudCitas;
use Illuminate\Http\Request;


class PersonalController extends Controller
{
    /**
     * Despliega a todo el personal que se encuentra en la base de datos.
     */
    public function index()
    {
        $personal = Personal::all();
        return view('usuarios', ['personals'=>$personal]);
    }

    /**
     * Despliega los datos del personal que inició sesión y los insumos para ser mostrados en el dashboard.
     */
    public function indexPersonal(){
        $personal = Personal::all();
        $insumos = Insumo::all();

        return view('personalIndex', ['personals'=>$personal,'insumos'=>$insumos]);
    }

    /**
     * Despliega el formulario para crear un personal.
     */
    public function create()
    {
        $especialidades = Especialidad::all();
        return view('createPersonal', compact('especialidades'));
    }

    /**
     * Almacena los datos del personal creado en el formulario.
     */
    public function store(Request $request)
    {
        //Validar los datos
        $request->validate([
            'rut_Persona' => ['required', 'numeric', 'valid_rut:'.$request->dv_Persona],
            'dv_Persona' => 'required|string|max:1',
            'nombre_Persona' => 'required|string|max:50',
            'apellido_Persona' => 'required|string|max:50',
            'correo_Persona' => 'required|email|max:50',
            'fechaNac_Persona' => 'required|date',
            'telefono_Persona' => 'required|string|max:12',
            'estado_Persona' => 'required|integer',
            'password_Usuario' => 'required|string|max:50',
            'estado_Usuario' => 'required|integer',
            'rol_id' => 'required|integer',
            'especialidad_id' => 'required|integer',
            'estado_Personal' => 'required|integer'
        ]);

        //Insertar datos en la tabla usuarios
        $usuario = new User();
        $usuario->id = User::all()->max('id') + 1;
        $usuario->password_Usuario = Hash::make($request->password_Usuario);
        $usuario->estado_Usuario = $request->estado_Usuario;
        $usuario->rol_id = $request->rol_id;
        $usuario->save();

        //Insertar datos en la tabla personas
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

        //Insertar datos en la tabla personal
        $personal = new Personal();
        $personal->id = Personal::all()->max('id') + 1;
        $personal->persona_id = $persona->id;
        $personal->especialidad_id = $request->especialidad_id;
        $personal->estado_Personal = $request->estado_Personal;
        $personal->save();


        return redirect('/usuarios')->with('success','Has creado tu usuario correctamente');    

    }

    /**
     * Despliega el perfil del personal.
     */
    public function show(Personal $personal)
    {
        //Llamar el nombre de la especialidad
        $especialidad = Especialidad::find($personal->especialidad_id);
        return view('perfilPersonal',$personal, ['especialidad'=>$especialidad]);
    }

    /**
     * Despliega el formulario para editar datos del personal.
     */
    public function edit(Personal $personal, Persona $persona, User $usuario)
    {
        //Busca el id de la persona que está logueada
        $user = Auth::user();
        $persona = Persona::where('user_id', $user->id)->first();
        $personal = Personal::where('persona_id', $persona->id)->first();
        $especialidades = Especialidad::all();

        return view('editPersonal', compact('user','persona','personal','especialidades'));
    }

    /**
     * Actualiza los datos del personal.
     */
    public function update(Request $request, Personal $personal)
    {
        $user = Auth::user();
        $persona = Persona::where('user_id', $user->id)->first();
        $personal = Personal::where('persona_id', $persona->id)->first();
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

        $personal->update($request->all());

            return redirect(route('perfilPersonal'))->with('success','Usuario actualizado con éxito en el sistema');     
    }

    /**
     * Despliega la vista para editar los datos del personal en la vista del Administrador.
     */
    public function editPersonalAdmin($id)
    {
        $personal = Personal::find($id);
        $especialidades = Especialidad::all();
        return view('editPersonalAdmin', compact('especialidades','personal'));
    }


    /**
     * Actualiza los datos del personal en la vista del Administrador.
     */
    public function updatePersonalAdmin(Request $request, $personal)
    {

        $persona = Persona::find($personal);
        $user = User::find($persona->user_id);
        $personal = Personal::find($personal);

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

        $personal->update($request->all());

        return redirect()->route('usuarios')->with('success','Has actualizado tu perfil correctamente');
    }

    /**
     * Carga la vista y los datos de las citas agendadas.
     */
    public function citas(Personal $personal)
    {
        $citas = $personal->citas;
        $solicitudes = SolicitudCitas::all();
        return view('citasPersonal', compact('citas','solicitudes'));
    
    }

}
