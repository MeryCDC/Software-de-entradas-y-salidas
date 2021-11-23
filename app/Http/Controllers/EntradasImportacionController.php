<?php

namespace App\Http\Controllers;

use App\Models\Entradas_Importacion;
use Illuminate\Http\Request;

class EntradasImportacionController extends Controller
{
    public function index()
    {
        //Obtengo todas las importaciones
        $ingresos=Entradas_Importacion::join('users' , 'entradas__importacions.user_id', '=', 'users.id')
        ->select('entradas__importacions.id', 'entradas__importacions.created_at' ,'users.name')
        ->orderBy('entradas__importacions.id', 'desc')
        ->get();
        return view('ingresos.index', compact('ingresos'));
        //return response()->json($ingresos);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //Obtengo los datos generales de la minuta y el nombre del creador de la minuta
        $datos= new Entradas_Importacion();
        $datos->user_id = $request->user_id;
        $datos->save(); 

        return redirect('ingresos');
        //return response()->json($datos);
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
