<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ApiController;



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

/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});*/

Route::post('/auth/login', [ApiController::class, 'loginUser']);//Funciona
// API
//Route::get('users', 'App\Http\Controllers\ApiController@getUsers');
//Route::get('/auth/getUsers', [ApiController::class, 'getUsers']);

Route::post('/auth/register', [ApiController::class, 'register']); // Registro de Atletas por fuera
// Route::post('/auth/login', [ApiController::class, 'loginUser']);
//Route::post('/auth/registeruser', [ApiController::class, 'RegistroNuevos']); // USUARIOS NUEVOS



Route::group(['middleware' => 'auth:api'], function () {
    
    // USUARIOS
    
    Route::get('/auth/getUsers', [ApiController::class, 'getUsers']);
    Route::post('/auth/createUser', [ApiController::class, 'createUser']); //Crear Usuario ADMIN
    Route::post('/auth/update/{id}', [ApiController::class, 'updateUser']);
    Route::delete('/auth/delete/{id}', [ApiController::class, 'deleteUser']);

    //EJERCICIOS
    Route::get('/auth/getEjercicios', [ApiController::class, 'getEjercicios']); //Funciona

    Route::post('/auth/ejercicio_lista/createEjercicio', [ApiController::class, 'createEjercicio']);
    Route::post('/auth/ejercicio_listas/{id}', [ApiController::class, 'updateEjercicio']);
    Route::delete('/auth/ejercicio_lista/{id}', [ApiController::class, 'deleteEjercicio']);

    //RUTINAS
    Route::get('/auth/getRutinas', [ApiController::class, 'getRutinas']);
    
    Route::post('/auth/rutina_lista', [ApiController::class, 'createRutina']);
    // Route::put('auth/rutina_lista/{id}', [ApiController::class, 'updateRutina']); NO LO METÍ
    Route::delete('auth/rutina_lista/{id}', [ApiController::class, 'deleteRutina']);


    Route::get('auth/getUser/{id}', [ApiController::class, 'getUser']);
    Route::get('auth/getEjercicio/{id}', [ApiController::class, 'getEjercicio']);
    Route::get('auth/rutinaxejercicios/{id}', [ApiController::class, 'getRutinax']); //ARREGLAR EN FLUTTERRRRRRR

    Route::get('/auth/getRutinasRandom', [ApiController::class, 'getRutinasRandom']);

});