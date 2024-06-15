<?php

namespace App\Http\Controllers;

use App\Models\Admins;
use App\Models\Insumo;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $insumos = Insumo::all();
        return view('adminIndex', ['insumos'=>$insumos]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function citas()
    {
        return view('citasAdmin');
    }


    //Funcionalidad para bloquear el día seleccionado
    public function bloquearDia(Request $request)
    {

    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Admins $admins)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Admins $admins)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Admins $admins)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Admins $admins)
    {
        //
    }
}
