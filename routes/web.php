<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\EjercicioController;
use App\Http\Controllers\RutinaController;
use App\Http\Controllers\EstadisticaController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('login');
});


// Rutas de autenticación

// renderiza el formulario de inicio de sesión
// Route::get('login', 'AuthController@showLoginForm');

// maneja la verificación de credenciales y autentica al usuario
// get o post segun enviemos o recibamos, nombre del controlador::class y nombre del metodo, name->nombre que le demos 
// en el fichero propio arriba del todo.
// Route::get('/estadistica', [EstadisticaController::class, 'mostrarGrafica'])->name('grafica');

Route::get('/ruta-solo-para-administradores', function () {
    // ...
})->middleware('auth', 'role:admin');

// cierra la sesion actual
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

// Route::get('register', 'AuthController@showRegistrationForm')->name('register');

Route::post('login', [AuthController::class, 'login_home'])->name('login');
Route::post('register', [AuthController::class, 'register'])->name('register');

// Route::get('vistaAdmin');

// VISTA USUARIO
Route::get('/usuario', [UsuarioController::class, 'index'])->name('usuario.index');
// Route::get('/usuario/create', [UsuarioController::class, 'create'])->name('usuario.create');
Route::post('/usuario/store', [UsuarioController::class, 'store'])->name('usuario.store');
Route::get('/usuario/{id}', [UsuarioController::class, 'show'])->name('usuario.show');
Route::get('/usuario/edit_user/{id}', [UsuarioController::class, 'show_edit'])->name('edit_user');
Route::post('/usuario/{id}', [UsuarioController::class, 'update'])->name('usuario.update');
Route::post('/usuario/update/{id}', [UsuarioController::class, 'updatepassword'])->name('usuario/update/password');
Route::delete('/usuario/{id}', [UsuarioController::class, 'destroy'])->name('usuario.destroy');

Route::get('/create_user', function () {
    return view('createUser');
});


// // VISTA EJERCICIO
Route::get('/ejercicio', [EjercicioController::class, 'index'])->name('ejercicio');
// Route::get('/ejercicio/create', [EjercicioController::class, 'create'])->name('ejercicio.create');
Route::post('/ejercicio/store', [EjercicioController::class, 'store'])->name('ejercicio.store');
Route::get('/ejercicio/{id}', [EjercicioController::class, 'show'])->name('ejercicio.show');
Route::get('/ejercicio/ver/{id}', [EjercicioController::class, 'show_edit_ejercicio'])->name('edit_ejercicio');
Route::post('/ejercicio/{id}', [EjercicioController::class, 'update'])->name('ejercicio.update');
Route::delete('/ejercicio/{id}', [EjercicioController::class, 'destroy'])->name('ejercicio.destroy');

Route::get('/create_ejercicio', function () {
    return view('createEjercicio');
});

// VISTA RUTINA
// Route::get('/rutina', [RutinaController::class, 'index'])->name('rutina.index');
// // Route::get('/rutina/create', [RutinaController::class, 'create'])->name('rutina.create');
// Route::post('/rutina/store', [RutinaController::class, 'store'])->name('rutina.store');
// Route::get('/rutina/{id}', [RutinaController::class, 'show'])->name('rutina.show');
// Route::get('/rutina/edit_rutina/{id}', [RutinaController::class, 'show_edit'])->name('edit_rutina');
// Route::post('/rutina/edit_rutina/{id}', [RutinaController::class, 'edit'])->name('rutina.edit');
// Route::put('/rutina/{id}', [RutinaController::class, 'update'])->name('rutina.update');
// Route::delete('/rutina/{id}', [RutinaController::class, 'destroy'])->name('rutina.destroy');

Route::get('/create_rutina', function () {
    return view('createRutina');
});
// Route::get('/rutina', [RutinaController::class, 'index'])->name('rutina.index');
Route::get('/rutina', [RutinaController::class, 'index'])->name('rutina');
Route::post('/rutina/store', [RutinaController::class, 'store'])->name('rutina.store');
Route::post('/ejercicio/store', [EjercicioController::class, 'store'])->name('ejercicio.store');
Route::delete('/rutina/{id}', [RutinaController::class, 'destroy'])->name('rutina.destroy');

// ESTADISTICAS

Route::get('/estadistica', [EstadisticaController::class, 'mostrarGrafica'])->name('grafica');
