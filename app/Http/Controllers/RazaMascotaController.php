<?php

namespace App\Http\Controllers;

use App\Models\RazaMascota;
use Illuminate\Http\Request;

class RazaMascotaController extends Controller
{
    /**
     * Despliega a las razas de las mascotas que se encuentran en la base de datos.
     */
    public function index()
    {
        $razaMascota = RazaMascota::all();
        return view('razamascotaIndex', ['razaMascotas'=>$razaMascota]);    
    }

    /**
     * Despliega el formulario para crear una nueva Raza de Mascota.
     */
    public function create()
    {
        return view('createRazamascota');
    }

    /**
     * Almacena los datos ingresados para la Raza de Mascota.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre_Razamascota' =>'required',
            'estado_Razamascota' =>'required'
        ]);

        $razamascotum = new RazaMascota();
        $razamascotum->nombre_Razamascota = ucfirst($request->nombre_Razamascota);
        $razamascotum->estado_Razamascota = $request->estado_Razamascota;
        $razamascotum->save();

        return redirect()->route('razamascotaIndex')->with('success','La raza de la mascota fue agregado con éxito al sistema');
    }

    /**
     * Despliega el formulario para editar la raza de mascota seleccionada.
     */
    public function edit(RazaMascota $razamascotum)
    {
        return view('editRazamascota',['razamascotum' =>$razamascotum]);
    }

    /**
     * Actualiza los datos de al mascota seleccionada.
     */
    public function update(Request $request, RazaMascota $razamascotum)
    {
        $request->validate([
            'nombre_Razamascota' =>'required'
        ]);
        
        $razamascotum->update($request ->all());
        return redirect()->route('razamascotaIndex')->with('succes','Se ha actualizado con éxito la raza de la mascota');
    }
}
