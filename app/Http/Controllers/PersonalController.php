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
     * Display a listing of the resource.
     */
    public function index()
    {
        $personal = Personal::all();
        return view('usuarios', ['personals'=>$personal]);
    }

    public function indexPersonal(){
        $personal = Personal::all();
        $insumos = Insumo::all();

        return view('personalIndex', ['personals'=>$personal,'insumos'=>$insumos]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $especialidades = Especialidad::all();
        return view('createPersonal', compact('especialidades'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Validar los datos
        $request->validate([
            'rut_Persona' => 'required|integer',
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
     * Display the specified resource.
     */
    public function show(Personal $personal)
    {
        //Llamar el nombre de la especialidad
        $especialidad = Especialidad::find($personal->especialidad_id);
        return view('perfilPersonal',$personal, ['especialidad'=>$especialidad]);
    }

    /**
     * Show the form for editing the specified resource.
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

    public function editPersonalAdmin($id)
    {
        $personal = Personal::find($id);
        $especialidades = Especialidad::all();
        return view('editPersonalAdmin', compact('especialidades','personal'));
    }


    public function updatePersonalAdmin(Request $request)
    {
        //Validar los datos
        $request->validate([
            'rut_Persona' => 'required|integer',
            'dv_Persona' => 'required|string|max:1',
            'password_Usuario' => 'required|string|max:50',
            'nombre_Persona' => 'required|string|max:50',
            'apellido_Persona' => 'required|string|max:50',
            'correo_Persona' => 'required|email|max:50',
            'fechaNac_Persona' => 'required|date',
            'telefono_Persona' => 'required|string|max:12',
            'especialidad_id' => 'required|integer',
            'estado_Persona' => 'required|integer',
            'estado_Usuario' => 'required|integer',
            'estado_Personal' => 'required|integer'
        ]);

        $personal = Personal::find(Auth::user()->persona->personal->id);
        $persona = Persona::find(Auth::user()->persona->id);
        $usuario = User::find(Auth::id());

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
     * Update the specified resource in storage.
     */


    /**
     * Remove the specified resource from storage.
     */


    public function citas(Personal $personal)
    {
        //Se obtienen las Solicitudes de citas que tienen la fecha del dia de hoy
        //$citas = $personal->solicitudcitas->where('fecha_SolicitudCita', date('Y-m-d'));
        //return view('citasPersonal', ['citas'=>$citas]);
        
        $citas = $personal->citas;
        //Se obtienen todas las solicitudes de citas y se ordenan en base a la fecha la más antigua al ultimo
        $solicitudes = SolicitudCitas::all();
        return view('citasPersonal', compact('citas','solicitudes'));
    
    }

    public function destroy(Personal $personal)
    {
        //
    }
}
