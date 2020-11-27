<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AtendedorController;
use App\Http\Controllers\HorariosController;

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

Route::get('/', function () {
    return view('welcome');
});

/*Route::get('/probando', function () {
    return view('proban2');
});*/
Route::get('/login', [AtendedorController::class, 'login']);
Route::get('/probando', [AtendedorController::class, 'probando']);
Route::get('/menuHorario', [AtendedorController::class, 'menuHorario']);
Route::get('/horarioManual', [AtendedorController::class, 'horarioManual']);
Route::get('/horarioAutomatico', [AtendedorController::class, 'horarioAutomatico']);

Route::get('/listaratendedores', [AtendedorController::class, 'listaratendedores']);
Route::get('/nuevoatendedor', [AtendedorController::class, 'natendedor']);
Route::get('/modatendedor/{rut}', [AtendedorController::class, 'matendedor']);

Route::get('/regHorario', [HorariosController::class, 'registrarHorario']);

Route::post('/insertaratendedor', [AtendedorController::class, 'creaatendedor']);
Route::post('/modificaratendedor', [AtendedorController::class, 'matendedor']);

