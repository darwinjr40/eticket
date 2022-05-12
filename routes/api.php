<?php

use App\Http\Controllers\Api\EventoApiController;
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


Route::apiResource('ubicaciones', UbicacionApiController::class)->names('api.ubicaciones');
Route::apiResource('eventos-api', EventoApiController::class)->names('api.eventos');

