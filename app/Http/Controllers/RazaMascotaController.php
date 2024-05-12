<?php

namespace App\Http\Controllers;

use App\Models\RazaMascota;
use Illuminate\Http\Request;

class RazaMascotaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $razaMascota = RazaMascota::latest()->paginate(5);
        return view('razamascota', ['razaMascotas'=>$razaMascota]);    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
    public function show(RazaMascota $razaMascota)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RazaMascota $razaMascota)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, RazaMascota $razaMascota)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RazaMascota $razaMascota)
    {
        //
    }
}
