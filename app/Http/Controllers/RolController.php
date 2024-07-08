<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rol;


class RolController extends Controller
{
    /**
     * Despliega todos los roles que se encuentran en la plataforma.
     */
    public function index()
    {
        $rols = Rol::all();
        return view('rolesIndex', ['rols'=>$rols]);
    }

    /**
     * Despliega el formulario para crear un rol nuevo.
     */
    public function create()
    {
        return view('createRol');
    }

    /**
     * Se almacena el rol agregado.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre_Rol' =>'required',
            'estado_Rol' =>'required'
        ]);

        $rol = new Rol();
        $rol->nombre_Rol = ucfirst($request->nombre_Rol);
        $rol->estado_Rol = $request->estado_Rol;
        $rol->save();

        return redirect()->route('rolesIndex')->with('succes','Rol agregado con éxito al sistema');  
    }

    /**
     * Despliega un formulario para editar el rol seleccionado.
     */
    public function edit(Rol $role)
    {
        return view('editRol',['role'=> $role]);
    }

    /**
     * Actualiza el rol editado.
     */
    public function update(Request $request, Rol $role)
    {
        $request->validate([
            'nombre_Rol' => 'required'
        ]);

        $role->update($request->all());
        return redirect()->route('rolesIndex')->with('succes','Rol actualizado correctamente en el sistema');
    }
}
