<?php

use App\Http\Controllers\BarCodeController;
use App\Http\Controllers\EntradasBodegaController;
use App\Http\Controllers\EntradasImportacionController;
use App\Http\Controllers\SalidasImportacionController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('/home', [EntradasImportacionController::class, 'index'])->middleware('auth')->name('home');

Route::group(['middleware' => 'auth'], function () 
{
    Route::get('/', [EntradasImportacionController::class , 'index'])->name('home');
}); 


/*|-------------------------------------------------------------------------- */

Route::resource('/ingresos' , EntradasImportacionController::class );

Route::get('/ingresos/{id}/guias', [EntradasImportacionController::class, 'show'])->name('ingresos.guias');

Route::resource('/salidas' , SalidasImportacionController::class );
