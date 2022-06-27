<?php

namespace App\Http\Controllers;

use App\Models\registro_pulsera;
use Illuminate\Http\Request;

class RegistroPulseraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dato = registro_pulsera::all();
        return $dato;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\registro_pulsera  $registro_pulsera
     * @return \Illuminate\Http\Response
     */
    public function show(registro_pulsera $registro_pulsera)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\registro_pulsera  $registro_pulsera
     * @return \Illuminate\Http\Response
     */
    public function edit(registro_pulsera $registro_pulsera)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\registro_pulsera  $registro_pulsera
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, registro_pulsera $registro_pulsera)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\registro_pulsera  $registro_pulsera
     * @return \Illuminate\Http\Response
     */
    public function destroy(registro_pulsera $registro_pulsera)
    {
        //
    }
}
