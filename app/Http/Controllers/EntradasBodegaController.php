<?php

namespace App\Http\Controllers;

use App\Models\Entradas_Bodega;
use Illuminate\Http\Request;

class EntradasBodegaController extends Controller
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
