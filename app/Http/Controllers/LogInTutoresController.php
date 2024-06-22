<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Persona;    
use App\Models\Tutor;
use App\Models\Comuna;


class LogInTutoresController extends Controller
{
    public function registerView(){
        $comunas = Comuna::all();
        return view('createTutor', compact('comunas'));
    }

    public function register(Request $request){

        //validar los datos
        $request->validate([
            'rut_Persona' => ['required', 'numeric', 'valid_rut:'.$request->dv_Persona],
            'dv_Persona' => 'required|size:1',
            'nombre_Persona' => 'required|string|max:50',
            'apellido_Persona' => 'required|string|max:50',
            'correo_Persona' => 'required|email|max:50',
            'fechaNac_Persona' => 'required|date',
            'telefono_Persona' => 'required|string|max:12',
            'estado_Persona' => 'required|integer',
            'password_Usuario' => 'required|string|max:50',
            'estado_Usuario' => 'required|integer',
            'rol_id' => 'required|integer',
            'fotocopiacarnet_Tutor' => 'required|file|max:2048',
            'registrosocial_Tutor' => 'required|file|max:2048',
            'comuna_id' => 'required|integer',
            'estado_Tutor' => 'required|integer'
        ]);


    // Insertar en la tabla usuarios
    $usuario = new User();
    $usuario->id= User::all()->max('id') + 1;
    $usuario->password_Usuario = Hash::make($request->password_Usuario);
    $usuario->estado_Usuario = $request->estado_Usuario;
    $usuario->rol_id = $request->rol_id;
    $usuario->save();


    // Insertar en la tabla personas
    $persona = new Persona();
    //entregarle un id incremental a la persona
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


    

    // Insertar en la tabla tutores
    $tutor = new Tutor();
    $tutor->persona_id = $persona->id;
    //Captura el rut de la persona y le agrega el nombre del archivo
    $tutor->fotocopiacarnet_Tutor = $request->file('fotocopiacarnet_Tutor')->storeAs('public/fotocopiacarnet', $request->rut_Persona.'_'.'Fotocopia_Carnet'.'.pdf');
    $tutor->registrosocial_Tutor = $request->file('registrosocial_Tutor')->storeAs('public/registrosocial', $request->rut_Persona .'_'.'Registro_Social'. '.pdf');
    
    //$tutor->fotocopiacarnet_Tutor = $request->file('fotocopiacarnet_Tutor')->storeAs('public/fotocopiacarnet', $persona->rut_Persona.'_'.'Fotocopia_Carnet'.'.pdf');
    //$tutor->registrosocial_Tutor = $request->file('registrosocial_Tutor')->storeAs('public/registrosocial', $persona->rut_Persona .'_'.'Registro_Social'. '.pdf');
    $tutor->comuna_id = $request->comuna_id;
    $tutor->estado_Tutor = $request->estado_Tutor;
    $tutor->save();

        Auth::login($usuario);
        return redirect(route('privada'));
    }

    public function login(Request $request)
    {
        // Validacion de los datos
        $validatedData = $request->validate([
            'rut_Persona' => 'required',
            'password_Usuario' => 'required',
        ]);
        
        // Se obtiene a la persona asociada al RUT
        $persona = Persona::where('rut_Persona', $validatedData['rut_Persona'])->first();
        
        if (!$persona) {
            return back()->withErrors(['rut_Persona' => 'Rut ingresado no existe en la base de datos']);
        }
        
        // Se obtiene al usuario asociado a la persona
        $usuario = User::find($persona->user_id);
        
        if (!$usuario) {
            return back()->withErrors(['rut_Persona' => 'Ningún usuario asociado con el RUT']);
        }
        
        if (!Hash::check(
            $validatedData['password_Usuario'], $usuario->password_Usuario)) {
            return back()->withErrors(['password_Usuario' => 'La contraseña no es correcta']);
        }
        //Verificar que el rol sea 1
        if ($usuario->rol_id !== 1) {
            return back()->withErrors(['rut_Persona' => 'El usuario no tiene permisos para acceder']);
        }

        // Autenticación del usuario
        Auth::login($usuario);

        $request->session()->regenerate();

        return redirect()->intended(route('privada'));
    }

    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect(route('loginTutor'));
    }
}
