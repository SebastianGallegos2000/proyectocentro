<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Persona;

class LogInPersonalesController
{

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
        
        // Verifica la contraseña del usuario Administrador. (No se encuentra encriptada)
        if ($usuario->rol_id === 3) {
            if ($validatedData['password_Usuario'] !== $usuario->password_Usuario) {
                return back()->withErrors(['password_Usuario' => 'La contraseña no es correcta']);
            }
        } else {
            // Para otros usuarios, verifica la contraseña encriptada
            if (!Hash::check($validatedData['password_Usuario'], $usuario->password_Usuario)) {
                return back()->withErrors(['password_Usuario' => 'La contraseña no es correcta']);
            }
        }

        //Verificar que el rol sea 2 o 3
        if ($usuario->rol_id !== 2 && $usuario->rol_id !== 3) {
            return back()->withErrors(['rut_Persona' => 'El usuario no tiene permisos para acceder']);
        }

        // Autenticación del usuario
        Auth::login($usuario);

        // Redirigir al usuario basado en su rol
        if ($usuario->rol_id === 3) {
            return redirect()->route('adminIndex');
        } else {
            // Redirige a la ruta que corresponda para el rol 2
            return redirect()->route('privadaPersonal');
        }
    }
    
    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect(route('loginPersonal'));
    }


}