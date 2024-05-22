<?php


namespace App\Http\Controllers;

use App\Models\Admins;
use App\Models\Personales;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Suppoert\Facades\Hash;

class LogInPersonalesController
{

    public function login(Request $request){

        $credenciales=[
            'rut_Personal' => $request->rut_Personal,
            'password_Personal' => $request->password_Personal,
            'rut_Admin' => $request->rut_Admin,
            'password_Admin' => $request->password_Admin,
            'estado_Personal' => 1,
            'estado_Admin' => 1
        ];

        //Variable para recordar la sesión
        $remember = ($request->has('remember') ? true : false);

        if(Auth::attempt($credenciales, $remember)){
            $request->session()->regenerate();
            return redirect()->intended(route('indexPersonal'));
            }else{
                return back()->withErrors(['rut_Personal' => 'Las credenciales ingresadas no son correctas']);
            }
    }
    
    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/loginPersonal');
    }


}