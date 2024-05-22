<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Persona;    
use App\Models\Tutores;
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

        //Insertar valores a Usuario
        $usuario = new User();
        
        $usuario->rut_Usuario = $request->rut_Persona;
        $usuario->password_Usuario = Hash::make($request->password_Persona);
        $usuario->estado_Usuario = 1;
        $usuario->save();

        //Insertar valores a Persona
        $persona = new Persona();

        $persona->rut_Persona = $request->rut_Persona;
        $persona->dv_Persona = $request->dv_Persona;
        $persona->nombre_Persona = $request->nombre_Persona;
        $persona->apellido_Persona = $request->apellido_Persona;
        $persona->correo_Persona = $request->correo_Persona;
        $persona->fechaNac_Persona = $request->fechaNac_Persona;
        $persona->telefono_Persona = $request->telefono_Persona;
        $persona->estado_Persona = 1;
        $persona->save();




        //Insertar los datos
        $tutor = new Tutores();

        $tutor->rut_Tutor = $request->rut_Tutor;
        $tutor->dv_Tutor = $request->dv_Tutor;
        $tutor->id_Comuna_Tutor = $request->id_Comuna_Tutor;
        $tutor->fotocopiacarnet_Tutor = $request->file('fotocopiacarnet_Tutor')->storeAs('public/fotocopiacarnet', $tutor->rut_Tutor.'_'.'Fotocopia_Carnet'.'.pdf');
        $tutor->registrosocial_Tutor = $request->file('registrosocial_Tutor')->storeAs('public/registrosocial', $tutor->rut_Tutor .'_'.'Registro_Social'. '.pdf');
        $tutor->id_Rol_Tutor = $request->id_Rol_Tutor;
        $tutor->estado_Tutor = $request->estado_Tutor;
        $tutor->save();

        Auth::login($tutor);
        return redirect(route('privada'));
    }

    public function login(Request $request){
        //Validaciones de los datos (Falta)

        $credenciales=[
            'rut_Tutor' => $request->rut_Tutor,
            'password_Tutor' => $request->password_Tutor,
            'estado_Tutor' => 1
        ];

        $remember = ($request->has('remember') ? true : false);
        if(Auth::attempt($credenciales, $remember)){
            $request->session()->regenerate();
            return redirect()->intended(route('privada'));
        }else{
            return back()->withErrors(['rut_Tutor' => 'Las credenciales ingresadas no son correctas']);
        }

    }

    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect(route('loginTutor'));
    }
}
