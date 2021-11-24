<?php

namespace App\Http\Controllers;

use App\Models\Entradas_Bodega;
use Illuminate\Http\Request;

class BarCodeController extends Controller
{
    // index
    public function index($id)
    {
        /* id */
        $guia = Entradas_Bodega::findOrFail($id);
        return view('barcode.index', compact('guia'));
    }
}
