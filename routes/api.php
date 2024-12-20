<?php

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VentaController;

use App\Models\Venta;
use Illuminate\Foundation\Auth\User;

use App\Http\Controllers\EquipoController;
use App\Http\Controllers\PilotoController;
use App\Http\Controllers\AutoController;
use App\Http\Controllers\CarreraController;
use App\Http\Controllers\ResultadoController;
use App\Http\Controllers\ConstructorController;
use App\Http\Controllers\CampeonatoController;
use App\Http\Controllers\PuntoController;
use App\Http\Controllers\PatrocinadorController;
use App\Http\Controllers\PatrocinioController;
use App\Http\Controllers\PersonalController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\HistorialDeCambioController;
use App\Http\Controllers\EventoEspecialController;
use App\Http\Controllers\EventoCarreraController;
use App\Http\Controllers\CircuitoController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//llamar atraves de la web
Route::apiResource('productos',ProductController::class);

Route::apiResource('usuarios',UserController::class);

Route::apiResource('equipos', EquipoController::class);
Route::apiResource('pilotos', PilotoController::class);
Route::apiResource('autos', AutoController::class);
Route::apiResource('carreras', CarreraController::class);
Route::apiResource('resultados', ResultadoController::class);
Route::apiResource('constructores', ConstructorController::class);
Route::apiResource('campeonatos', CampeonatoController::class);
Route::apiResource('puntos', PuntoController::class);
Route::apiResource('patrocinadores', PatrocinadorController::class);
Route::apiResource('patrocinios', PatrocinioController::class);
Route::apiResource('personal', PersonalController::class);
Route::apiResource('roles', RolController::class);
Route::apiResource('historial-de-cambios', HistorialDeCambioController::class);
Route::apiResource('eventos-especiales', EventoEspecialController::class);
Route::apiResource('eventos-carreras', EventoCarreraController::class);
Route::apiResource('circuitos', CircuitoController::class);



