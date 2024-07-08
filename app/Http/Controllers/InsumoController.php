<?php

namespace App\Http\Controllers;

use App\Models\Insumo;
use App\Models\ModificacionInsumo;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class InsumoController extends Controller
{
    /**
     * Despliega los insumos en el sistema en el rol Personal.
     */
    public function index():View
    {
        $insumos= Insumo::all();
        return view('insumoIndex', ['insumos'=>$insumos]);
    }

    /**
     * Despliega los insumos en el sistema en el rol Administrador.
     */
    public function indexAdmin():View
    {
        $insumos= Insumo::all();
        return view('insumoIndexAdmin', ['insumos'=>$insumos]);
    }

    /**
     * Despliega el formulario para crear un nuevo insumo para el rol Personal.
     */
    public function create():View
    {
        return view('createInsumo');
    }

    /**
     * Despliega el formulario para crear un nuevo insumo para el rol Administrador.
     */
    public function createAdmin():View
    {
        return view('createInsumoAdmin');
    }

    /**
     * Almacena los datos ingresados en el createInsumo con el rol Personal.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'nombre_Insumo' =>'required',
            'cantidad_Insumo' => 'required',
            'stockCritico_Insumo' => 'required',
            'costo_Insumo' => 'required'

        ]);

        $insumo = new Insumo();
        $insumo->nombre_Insumo = ucfirst($request->nombre_Insumo);
        $insumo->cantidad_Insumo = $request->cantidad_Insumo;
        $insumo->costo_Insumo = $request->costo_Insumo;
        $insumo->stockCritico_Insumo = $request->stockCritico_Insumo;
        $insumo->estado_Insumo = $request->estado_Insumo;
        $insumo->save();


        return redirect(route('insumoIndex'))->with('success','Insumo agregado con éxito al sistema');    
    }


    /**
     * Almacena los datos ingresados en el createInsumo con el rol Administrador.
     */
    public function storeAdmin(Request $request): RedirectResponse
    {
        $request->validate([
            'nombre_Insumo' =>'required',
            'cantidad_Insumo' => 'required',
            'stockCritico_Insumo' => 'required',
            'costo_Insumo' => 'required'

        ]);

        $insumo = new Insumo();
        $insumo->nombre_Insumo = ucfirst($request->nombre_Insumo);
        $insumo->cantidad_Insumo = $request->cantidad_Insumo;
        $insumo->costo_Insumo = $request->costo_Insumo;
        $insumo->stockCritico_Insumo = $request->stockCritico_Insumo;
        $insumo->estado_Insumo = $request->estado_Insumo;
        $insumo->save();
        
        return redirect(route('insumoIndexAdmin'))->with('success','Insumo agregado con éxito al sistema');    
    }

    /**
     * Muestra el formulario para editar el insumo seleccionado con el rol Personal.
     */
    public function edit(Insumo $insumo): View
    {
        return view('editInsumo',['insumo'=> $insumo]);
    }

    /**
     * Muestra el formulario para editar el insumo seleccionado con el rol Administrador.
     */
    public function editInsumoAdmin(Insumo $insumo): View
    {
        return view('editInsumoAdmin',['insumo'=> $insumo]);
    }


    /**
     * Actualiza los datos ingresados en el editInsumo con el rol Personal.
     */
    public function update(Request $request, Insumo $insumo):RedirectResponse
    {
        $request->validate([
            'nombre_Insumo' =>'required',
            'stockCritico_Insumo' => 'required',
            'costo_Insumo' => 'required'

        ]);
        $insumo->nombre_Insumo = $request->nombre_Insumo;
        if ($request->has('cantidad_Insumo')) {
            $insumo->cantidad_Insumo = $request->cantidad_Insumo;
        }        $insumo->stockCritico_Insumo = $request->stockCritico_Insumo;
        $insumo->costo_Insumo = $request->costo_Insumo;
        $insumo->save();        
        return redirect()->route('insumoIndex')->with('success','Insumo actualizado con éxito al sistema');    
    }

    /**
     * Actualiza los datos ingresados en el editInsumo con el rol Administrador.
     */
    public function updateInsumoAdmin(Request $request, Insumo $insumo):RedirectResponse
    {
        $request->validate([
            'nombre_Insumo' =>'required',
            'cantidad_Insumo' => 'required',
            'stockCritico_Insumo' => 'required',
            'costo_Insumo' => 'required'

        ]);
        $insumo->nombre_Insumo = $request->nombre_Insumo;
        if ($request->has('cantidad_Insumo')) {
            $insumo->cantidad_Insumo = $request->cantidad_Insumo;
        }        $insumo->stockCritico_Insumo = $request->stockCritico_Insumo;
        $insumo->costo_Insumo = $request->costo_Insumo;
        $insumo->save();   
        return redirect()->route('insumoIndexAdmin')->with('success','Insumo actualizado con éxito al sistema');    
    }

    /**
     * Cambia el estado del insumo seleccionado a 0 con el rol Personal.
     */
    public function destroy($id)
    {
        $insumo = Insumo::find($id);
    
        if ($insumo == null) {
            return redirect(route('insumoIndex'))->with('error', 'Insumo no encontrado.');
        }
    
        $insumo->estado_Insumo = 0;
        $insumo->save();
    
        return redirect(route('insumoIndex'))->with('success', 'Insumo eliminado correctamente.');
    }

    /**
     * Cambia el estado del insumo seleccionado a 0 con el rol Administrador.
     */
    public function destroyAdmin($id)
    {
        $insumo = Insumo::find($id);
    
        if ($insumo == null) {
            return redirect(route('insumoIndexAdmin'))->with('error', 'Insumo no encontrado.');
        }
    
        $insumo->estado_Insumo = 0;
        $insumo->save();
    
        return redirect(route('insumoIndexAdmin'))->with('success', 'Insumo eliminado correctamente.');
    }

    /**
     * Cambia el estado del insumo seleccionado a 1 con el rol Personal.
     */
    public function activate($id){
        $insumo = Insumo::find($id);
    
        if ($insumo == null) {
            return redirect(route('insumoIndex'))->with('error', 'Insumo no encontrado.');
        }
    
        $insumo->estado_Insumo = 1;
        $insumo->save();
    
        return redirect(route('insumoIndex'))->with('success', 'Insumo activado correctamente.');
    }

    /**
     * Cambia el estado del insumo seleccionado a 1 con el rol Administrador.
     */
    public function activateAdmin($id){
        $insumo = Insumo::find($id);
    
        if ($insumo == null) {
            return redirect(route('insumoIndexAdmin'))->with('error', 'Insumo no encontrado.');
        }
    
        $insumo->estado_Insumo = 1;
        $insumo->save();
    
        return redirect(route('insumoIndexAdmin'))->with('success', 'Insumo activado correctamente.');
    }

    /**
     * Despliega la vista para agregar cantidad a un insumo.
     */
    public function agregarCantidadView($id)
    {
        $insumo = Insumo::findOrFail($id);
        return view('agregarCantidad', compact('insumo'));
    }
    
    /**
     * Procesa la cantidad ingresada en la vista agregarCantidad.
     */
    public function procesarCantidad(Request $request, $id)
    {
        $insumo = Insumo::findOrFail($id);
        $cantidadAgregar = $request->input('cantidad');
    
        $personalId = auth()->user()->persona->personal->id;
    
        // Actualizar la cantidad del insumo
        $insumo->cantidad_Insumo += $cantidadAgregar;
        $insumo->save();
    
        // Crear el registro de modificación
        $modificacion = new ModificacionInsumo();
        $modificacion->personal_id = $personalId;
        $modificacion->insumo_id = $id;
        $modificacion->fechayhora_ModificacionInsumo = now();
        $modificacion->cantidad_ModificacionInsumo = $cantidadAgregar;
        $modificacion->estado_ModificacionInsumo = 1;
        $modificacion->save();    
        return redirect()->route('insumoIndex')->with('success', 'Cantidad agregada correctamente.');
    }
}
