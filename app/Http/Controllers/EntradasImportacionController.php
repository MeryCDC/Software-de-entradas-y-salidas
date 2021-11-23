<?php

namespace App\Http\Controllers;

use App\Models\Entradas_Importacion;
use Illuminate\Http\Request;

class EntradasImportacionController extends Controller
{
    public function index()
    {
        return view('ingresos.index');
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $fecha_actual = date('Y-m-d H:i:s');
        //Obtengo los datos generales de la minuta y el nombre del creador de la minuta
        $datos= new Entradas_Bodega;
        $datos->Fecha = $fecha_actual;
        $datos->user_id = $request->user_id;
        /* $datos->save(); */
        return response()->json($datos);
    }

    public function show(Entradas_Importacion $entradas_Importacion)
    {
        return view('ingresos.guias');   
    }

    public function edit(Entradas_Importacion $entradas_Importacion)
    {
        //
    }

    public function update(Request $request, Entradas_Importacion $entradas_Importacion)
    {
        //
    }

    public function destroy(Entradas_Importacion $entradas_Importacion)
    {
        //
    }
}
