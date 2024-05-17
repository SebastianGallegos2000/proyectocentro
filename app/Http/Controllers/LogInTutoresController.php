<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Tutores;


class LogInTutoresController extends Controller
{
    //public function register(Request $request){
    //    //Validar los datos
//
    //    $tutor = new Tutores();
    //    $tutor->rut = $request->rut;
    //    $tutor->passwprd = Hash::make($request->password);
//
    //    $tutor->save();
    //    Auth::login($tutor);
    //    return redirect(route('tutor'));
//
    //}
//
    //public function login(Request $request){
//
//
    //}
//
    //public function logout(Request $request){
    //    Auth::logout();
    //    $request->session()->invalidate();
    //    $request->session()->regenerateToken();
    //    return redirect('/auth/loginTutor');
    //}
    public function __invoke()
    {
        return view('/auth/loginTutor');
    }
}
