<?php

use App\Http\Controllers\Api\Auth\LoginController;
use App\Http\Controllers\Api\EspacioApiController;
use App\Http\Controllers\Api\EventoApiController;
use App\Http\Controllers\Api\FechaApiController;
use App\Http\Controllers\Api\ImagenApiController;
use App\Http\Controllers\Api\SectorApiController;
use App\Http\Controllers\Api\TicketApiController;
use App\Http\Controllers\Api\UbicacionApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('login-api', [LoginController::class, 'store'])->name('api.login');
Route::apiResource('eventos-api', EventoApiController::class)->names('api.eventos');
Route::apiResource('imagenes-api', ImagenApiController::class)->names('api.imagenes');
Route::apiResource('ubicaciones', UbicacionApiController::class)->names('api.ubicaciones');



Route::apiResource('fechas-api', FechaApiController::class)->names('api.fechas');
Route::apiResource('sectores-api', SectorApiController::class)->names('api.sectores');
Route::apiResource('espacios-api', EspacioApiController::class)->names('api.espacios');
Route::apiResource('tickets-api', TicketApiController::class)->names('api.tickets');
