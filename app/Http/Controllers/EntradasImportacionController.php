<?php

namespace App\Http\Controllers;

use App\Models\Entradas_Importacion;
use App\Models\IntImpoBod;
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
        //Creo la importacion
        $datos= new Entradas_Importacion();
        $datos->user_id = $request->user_id;
        $datos->save(); 
        return redirect('ingresos');
    }

    public function show($id)
    {
         //Obtengo todas las guias de la importacion seleccionada
         $guiasImportaciones=IntImpoBod::join('entradas__importacions' , 'int_impo_bods.int_impo_id', '=', 'entradas__importacions.id')
         ->join('entradas__bodegas' , 'int_impo_bods.int_bod_id', '=', 'entradas__bodegas.id')
         ->join('users' , 'entradas__bodegas.user_id', '=', 'users.id')
         ->select('entradas__bodegas.id' , 'entradas__bodegas.tgp' , 'entradas__bodegas.peso','entradas__bodegas.largo', 'entradas__bodegas.id_cdc',
         'entradas__bodegas.ancho', 'entradas__bodegas.alto', 'entradas__bodegas.peso_volumetrico', 'entradas__bodegas.volumen', 'users.name')
         ->where('entradas__importacions.id', '=', $id)
         ->get();

         return view('ingresos.guias', compact('guiasImportaciones' , 'id'));  
         //return response()->json($guiasImportaciones); 
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
