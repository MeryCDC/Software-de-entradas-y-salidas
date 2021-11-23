<?php

namespace App\Http\Controllers;

use App\Models\Salidas_Importacion;
use Illuminate\Http\Request;

class SalidasImportacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $salidas = Salidas_Importacion::join('users' , 'salidas__importacions.user_id', '=', 'users.id')
        ->select('salidas__importacions.id', 'salidas__importacions.created_at' ,'users.name')
        ->orderBy('salidas__importacions.id', 'desc')
        ->get();
        return view('salidas.index', compact('salidas'));
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
        $datos= new Salidas_Importacion();
        $datos->user_id = $request->user_id;
        $datos->save(); 

        return redirect('salidas');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Salidas_Importacion  $salidas_Importacion
     * @return \Illuminate\Http\Response
     */
    public function show(Salidas_Importacion $salidas_Importacion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Salidas_Importacion  $salidas_Importacion
     * @return \Illuminate\Http\Response
     */
    public function edit(Salidas_Importacion $salidas_Importacion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Salidas_Importacion  $salidas_Importacion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Salidas_Importacion $salidas_Importacion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Salidas_Importacion  $salidas_Importacion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Salidas_Importacion $salidas_Importacion)
    {
        //
    }
}
