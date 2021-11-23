<?php

use App\Http\Controllers\EntradasBodegaController;
use App\Http\Controllers\EntradasImportacionController;
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

/* Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
 */

Auth::routes();

Route::get('/home', [EntradasBodegaController::class, 'index'])->middleware('auth')->name('home');

Route::group(['middleware' => 'auth'], function () 
{
    Route::get('/', [EntradasBodegaController::class , 'index'])->name('home');
}); 


/*|-------------------------------------------------------------------------- */

Route::resource('/ingresos' , EntradasImportacionController::class );

Route::resource('/entradas' , EntradasBodegaController::class );

Route::get('/ingresos/{id}/guias', [EntradasImportacionController::class, 'show'])->name('ingresos.guias');
