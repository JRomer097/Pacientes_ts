<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PruebaController;
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

//Route::get('/', function () {
//    return view('welcome');
//});

//Route::get('/prueba', [PruebaController::class, 'index']);

//Principal
Route::get('/', [PruebaController::class, 'index'])->name('pacientes.index');

//Editar Pacientes
Route::get('pacientes/editar/{pacientes}',[PruebaController::class, 'editar'])->name('pacientes.editar');

//Actualiza la informacion del paciente
Route::get('paciente/editar/{pacientes}', [PruebaController::class, 'update'])->name('pacientes.update');

//Ventana de gráficas
Route::get('pacientes/graficar/{pacientes}',[PruebaController::class, 'graficar'])->name('grafica.graficar');

//Guardar un nuevo paciente
Route::post('pacientes', [PruebaController::class, 'store'])->name('pacientes.store');

//Borrar un paciente
Route::delete('pacientes/{pacientes}', [PruebaController::class, 'delete'])->name('pacientes.delete');