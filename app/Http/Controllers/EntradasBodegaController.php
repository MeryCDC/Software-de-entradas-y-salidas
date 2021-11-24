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
         $datos = new Entradas_Bodega();
         $datos->tgp = $request->tgp;
         $datos->peso = $request->peso;
         $datos->largo = $request->largo;
         $datos->ancho = $request->ancho;
         $datos->alto = $request->alto;
         $datos->user_id = $request->user_id;
         $datos->save();  

         $idNuevo = Entradas_Bodega::latest('id')->first(); 

         //En caso de ingresar un tracking
         if(!empty($datos->tgp)){
            $cdc = Entradas_Bodega::find($idNuevo['id']);

            $searchString = " ";
            $replaceString = "";
            $originalTGP = $idNuevo['tgp']; 
            $outputTGP = str_replace($searchString, $replaceString, $originalTGP); 

            $id_nuestro =  $outputTGP.'-'. $idNuevo['id'];
            $cdc->id_cdc = $id_nuestro;
            $cdc->save();
         }


         //relaciono con la tabla intermedia
         $relacion = new IntImpoBod();
         $relacion->int_impo_id = $request->id_importacion;
         $relacion->int_bod_id = $idNuevo['id'];
         $relacion->save();
         
         return redirect()->route('ingresos.guias' , $request->id_importacion);
         //return response()->json($idNuevo); 
    }

    public function show(Entradas_Bodega $entradas_Bodega)
    {
        //
    }

    public function edit($id)
    {
        $ingreso = Entradas_Bodega::find($id);
        return view('entradas.editar', compact('ingreso'));
        //return view('ingresos.index', compact('ingresos'));
    }

    public function update(Request $request, $id)
    {
        $ingreso = request()->except('_token' , '_method');
        Entradas_Bodega::where('id' , '=' , $id)->update($ingreso);
        return redirect()->route('entradas.edit' , $id)->with('editEntrada', 'Cambios guardados correctamente'); 
    }


    public function destroy(Entradas_Bodega $entradas_Bodega)
    {
        //
    }
}
