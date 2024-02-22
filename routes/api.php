<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\EspecialidadesController;
use App\Http\Controllers\DuracionController;
use App\Http\Controllers\ServiciosController;
use App\Http\Controllers\SucursalesController;
use App\Http\Controllers\ComunasController;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\BoxController;
use App\Http\Controllers\TrabajadoresController;
use App\Http\Controllers\ProfesionesController;
use App\Http\Controllers\ClientesController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Artisan;
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
// Auth::routes();
//Language Translation
Route::get('index/{locale}', [App\Http\Controllers\HomeController::class, 'lang']);

Route::get('/', [App\Http\Controllers\HomeController::class, 'root'])->name('root');

//Update User Details
// Route::post('/update-profile/{id}', [App\Http\Controllers\HomeController::class, 'updateProfile'])->name('updateProfile');
// Route::post('/update-password/{id}', [App\Http\Controllers\HomeController::class, 'updatePassword'])->name('updatePassword');

Route::get('{any}', [App\Http\Controllers\HomeController::class, 'index'])->name('index');

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => 'cors'], function () {
    Route::controller(ServiciosController::class)->group(function (){
        Route::get('/servicios/lista-servicios', 'index');
        Route::get('/servicios/dataListaServicios', 'listaServicios');
        Route::post('/servicios', 'store');
        Route::get('/servicios/{id}', 'show');
        Route::put('/servicios/{id}', 'update');
        Route::delete('/servicios/{id}', 'destroy');
    });
});



Route::group(['middleware' => 'cors'], function () {
    Route::controller(SucursalesController::class)->group(function (){
        Route::get('/sucursales/lista-sucursales', 'index');
        Route::post('/sucursales', 'store');
        Route::get('/sucursales/{id}', 'show');
        Route::put('/sucursales/{id}', 'update');
        Route::delete('/sucursales/{id}', 'destroy');
    });
});

Route::group(['middleware' => 'cors'], function () {
    Route::controller(BoxController::class)->group(function (){
        Route::get('/box/lista-box/{id}', 'index');
        Route::post('/box', 'store');
        Route::get('/box/{id}', 'show');
        Route::put('/box/{id}', 'update');
        Route::delete('/box/{id}/{id_sucursal}', 'destroy');
    });
});

Route::group(['middleware' => 'cors'], function () {
    Route::controller(RolesController::class)->group(function (){
        Route::get('/roles/lista-roles', 'index');
        Route::post('/roles', 'store');
        Route::get('/roles/{id}', 'show');
        Route::put('/roles/{id}', 'update');
        Route::delete('/roles/{id}', 'destroy');
    });
});

Route::group(['middleware' => 'cors'], function () {
    Route::controller(ProfesionesController::class)->group(function (){
        Route::get('/profesiones/lista-profesiones', 'index');
        Route::post('/profesiones', 'store');
        Route::get('/profesiones/{id}', 'show');
        Route::put('/profesiones/{id}', 'update');
        Route::delete('/profesiones/{id}', 'destroy');
    });
});

Route::group(['middleware' => 'cors'], function () {
    Route::controller(EspecialidadesController::class)->group(function (){
        Route::get('especialidades/lista-especialidades', 'index');
        Route::post('/especialidades', 'store');
        Route::get('/especialidades/{id}', 'show');
        Route::put('/especialidades/{id}', 'update');
        Route::delete('/especialidades/{id}', 'destroy');
    });
});

Route::group(['middleware' => 'cors'], function () {
    Route::controller(DuracionController::class)->group(function (){
        Route::get('duracion/lista-duraciones', 'index');
    });
});

Route::group(['middleware' => 'cors'], function () {
    Route::controller(ClientesController::class)->group(function (){
        Route::get('/clientes/lista-clientes', 'index');
        Route::post('/clientes', 'store');
        Route::get('/clientes/{id}', 'show');
        Route::put('/clientes/{id}', 'update');
        Route::delete('/clientes/{id}', 'destroy');
    });
});

Route::group(['middleware' => 'cors'], function () {
    Route::controller(RegisterController::class)->group(function (){
        Route::get('/users/list-users', 'index');
        Route::post('/users', 'create');
        Route::get('/users/{id}', 'show');
        Route::put('/users/{id}', 'update');
        Route::delete('/users/{id}', 'destroy');
    });
});

Route::group(['middleware' => 'cors'], function () {
    Route::controller(RegionController::class)->group(function (){
        Route::get('/regiones/list-regiones', 'index');
    });
});

Route::group(['middleware' => 'cors'], function () {
    Route::controller(ComunasController::class)->group(function (){
        Route::get('/comunas/{id}', 'show');
    });
});

