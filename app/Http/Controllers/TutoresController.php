<?php

namespace App\Http\Controllers;

use App\Models\Tutores;
use Illuminate\Http\Request;

class TutoresController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('tutor');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('createTutor');
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
    public function show(Tutores $tutores)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tutores $tutores)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tutores $tutores)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tutores $tutores)
    {
        //
    }
}
