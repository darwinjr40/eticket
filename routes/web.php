<?php

use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriaEventoController;
use App\Http\Controllers\ContactoController;
use App\Http\Controllers\EventoController;
use App\Http\Controllers\FechaController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\SectorController;
use App\Http\Controllers\EspacioController;
use App\Models\Contacto;
use App\Http\Controllers\ImagenController;
use App\Http\Controllers\Ubicacion1Controller;
use App\Http\Controllers\UbicacionController;
use Illuminate\Support\Facades\Auth;


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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();
Route::group(['middelware'=>['auth']],function(){
    Route::resource('roles',RolController::class);
    Route::resource('usuarios',UsuarioController::class);
    Route::resource('categoriaEventos',CategoriaEventoController::class);
    Route::resource('permisos',PermissionController::class);
    Route::resource('sectors',SectorController::class);
    Route::resource('espacios',EspacioController::class);
    Route::resource('contactos',ContactoController::class);
    Route::resource('eventos',EventoController::class);
    Route::get('espacios_sector/{id_sector}',[EspacioController::class,'indexSector'])->name('espacios.indexSector');
    Route::post('espacios_sector/{id_sector}',[EspacioController::class,'storeEspacioSector'])->name('espacios.storeEspacioSector');
    Route::resource('fechas',FechaController::class);
    Route::get('sector_ubicacion/{id_sector}',[SectorController::class,'indexUbicacion'])->name('sectors.indexUbicacion');
    Route::post('sector_ubicacion/{id_sector}',[SectorController::class,'storeUbicacionSector'])->name('sectors.storeUbicacionSector');

    // Route::Post('eventos', [EventoController::class, 'storeEvento'])->name('eventos.storeEvento');

});
























Route::resource('ubicacions', UbicacionController::class);
Route::get('ubicacions/{id}/editEvento', [UbicacionController::class, 'editEvento'])->name('ubicacions.editEvento');
// Route::get('ubicacion', [UbicacionController::class, 'mapa'])->name('ubicacions.mapa');
Route::resource('imagens', ImagenController::class);
