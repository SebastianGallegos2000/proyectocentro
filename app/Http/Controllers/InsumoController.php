<?php

namespace App\Http\Controllers;

use App\Models\Insumo;
use App\Models\ModificacionInsumo; // Add this line
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class InsumoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index():View
    {
        $insumos= Insumo::all();
        return view('insumoIndex', ['insumos'=>$insumos]);
    }

    public function indexAdmin():View
    {
        $insumos= Insumo::all();
        return view('insumoIndexAdmin', ['insumos'=>$insumos]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create():View
    {
        return view('createInsumo');
    }

    public function createAdmin():View
    {
        return view('createInsumoAdmin');
    }

    /**
     * Store a newly created resource in storage.
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
     * Display the specified resource.
     */
    public function show(Insumo $insumo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Insumo $insumo): View
    {
        return view('editInsumo',['insumo'=> $insumo]);
    }

    public function editInsumoAdmin(Insumo $insumo): View
    {
        return view('editInsumoAdmin',['insumo'=> $insumo]);
    }

    /**
     * Update the specified resource in storage.
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
     * Remove the specified resource from storage.
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

    public function activate($id){
        $insumo = Insumo::find($id);
    
        if ($insumo == null) {
            return redirect(route('insumoIndex'))->with('error', 'Insumo no encontrado.');
        }
    
        $insumo->estado_Insumo = 1;
        $insumo->save();
    
        return redirect(route('insumoIndex'))->with('success', 'Insumo activado correctamente.');
    }

    public function activateAdmin($id){
        $insumo = Insumo::find($id);
    
        if ($insumo == null) {
            return redirect(route('insumoIndexAdmin'))->with('error', 'Insumo no encontrado.');
        }
    
        $insumo->estado_Insumo = 1;
        $insumo->save();
    
        return redirect(route('insumoIndexAdmin'))->with('success', 'Insumo activado correctamente.');
    }

    public function agregarCantidadView($id)
    {
        $insumo = Insumo::findOrFail($id);
        return view('agregarCantidad', compact('insumo'));
    }
    
    public function procesarCantidad(Request $request, $id)
    {
        $insumo = Insumo::findOrFail($id);
        $cantidadAgregar = $request->input('cantidad');
    
        // Asumiendo que tienes un modelo User que está relacionado con Personal
        $personalId = auth()->user()->persona->personal->id; // Asegúrate de ajustar esta línea según tu estructura de base de datos
    
        // Actualizar la cantidad del insumo
        $insumo->cantidad_Insumo += $cantidadAgregar;
        $insumo->save();
    
        // Crear el registro de modificación
        $modificacion = new ModificacionInsumo();
        $modificacion->personal_id = $personalId;
        $modificacion->insumo_id = $id;
        $modificacion->fechayhora_ModificacionInsumo = now();
        $modificacion->cantidad_ModificacionInsumo = $cantidadAgregar;
        $modificacion->estado_ModificacionInsumo = 1; // Asumiendo que 1 es el estado activo
        $modificacion->save();    
        return redirect()->route('insumoIndex')->with('success', 'Cantidad agregada correctamente.');
    }
}
