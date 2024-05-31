<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rol;


class RolController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rols = Rol::all();
        return view('rolesIndex', ['rols'=>$rols]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('createRol');
    }

    /**
     * Store a newly created resource in storage.
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
     * Display the specified resource.
     */
    public function show(string $rol)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Rol $role)
    {
        return view('editRol',['role'=> $role]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Rol $role)
    {
        $request->validate([
            'nombre_Rol' => 'required'
        ]);

        $role->update($request->all());
        return redirect()->route('rolesIndex')->with('succes','Rol actualizado correctamente en el sistema');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $rol)
    {
        //
    }
}
