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
        //
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
