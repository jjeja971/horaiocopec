<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AtendedorController;
use App\Http\Controllers\HorariosController;
use App\Http\Controllers\ControllerHorarioDos;
use App\Http\Controllers\Controller;
use App\Http\Controllers\AuthController;


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

Route::get('/', [Controller::class, 'login']);
Route::get('/Inicio', [Controller::class, 'Inicio']);

/*Route::get('/probando', function () {
    return view('proban2');
});*/

//---------------------ATENDEDOR CONTROLLER----

Route::get('/probando', [AtendedorController::class, 'probando']);
Route::get('/listaratendedores', [AtendedorController::class, 'listaratendedores']);
Route::get('/nuevoatendedor', [AtendedorController::class, 'natendedor']);
Route::get('/modatendedor/{rut}', [AtendedorController::class, 'matendedor']);

Route::post('/insertaratendedor', [AtendedorController::class, 'creaatendedor']);
Route::post('/modificaratendedor', [AtendedorController::class, 'matendedor']);

//---------------------HORARIO CONTROLLER----

Route::get('/regHorario', [HorariosController::class, 'registrarHorario']);
Route::get('/menuHorario', [HorariosController::class, 'menuHorario']);
Route::get('/horarioManual', [HorariosController::class, 'horarioManual']);
Route::get('/horarioAutomatico', [HorariosController::class, 'horarioAutomatico']);
Route::get('/interfazTurnos', [HorariosController::class, 'ITurnos']);
Route::get('/modificarTurno/{id}', [HorariosController::class, 'modTurno']);

Route::post('/registrarhorarios', [HorariosController::class, 'registrar_horario']);

//---------------------HORARIO2 CONTROLLER----

Route::get('/listahorario', [ControllerHorarioDos::class, 'listahorario']);
Route::get('/nuevohorario', [ControllerHorarioDos::class, 'nuevohorario']);


//---------------------AUTENTICACION CONTROLLER----

Route::get('/cerrar_sesion',[AuthController::class, 'cerrar_sesion']);

Route::post('/registrarse', [AuthController::class, 'iniciar_sesion']);





