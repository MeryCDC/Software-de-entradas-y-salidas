<?php

namespace App\Http\Controllers;

use App\Models\Entradas_Bodega;
use App\Models\IntImpoBod;
use Illuminate\Http\Request;

class EntradasBodegaController extends Controller
{
    public function index()
    {
        
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
         //Agrego la nueva entrada
         $datos= new Entradas_Bodega();
         $datos->tgp = $request->tgp;
         $datos->peso = $request->peso;
         $datos->largo = $request->largo;
         $datos->ancho = $request->ancho;
         $datos->alto = $request->alto;
         $datos->user_id = $request->user_id;
         $datos->save();  
         //return redirect('ingresos');

         //relaciono la tabla 
         // int_impo_id  int_bod_id
         $idNuevo = Entradas_Bodega::latest('id')->first(); 
         $relacion = new IntImpoBod();
         $relacion->int_impo_id = $request->id_importacion;
         $relacion->int_bod_id = $idNuevo['id'];
         $relacion->save();
         
         return redirect()->route('ingresos.guias' , $request->id_importacion);

         //return redirect('ingresos.guias');
         //return response()->json($datos); 
    }

    public function show(Entradas_Bodega $entradas_Bodega)
    {
        //
    }

    public function edit(Entradas_Bodega $entradas_Bodega)
    {
        //
    }

    public function update(Request $request, Entradas_Bodega $entradas_Bodega)
    {
        //
    }


    public function destroy(Entradas_Bodega $entradas_Bodega)
    {
        //
    }
}
