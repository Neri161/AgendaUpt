<?php

use App\Http\Controllers\AgendaController;
use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Route;

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
    return redirect()->route('login');
});

Route::get('/login', [UsuarioController::class, 'login'])->name('login');
Route::get('/registro', [UsuarioController::class, 'registro'])->name('registro');
Route::post('/registroForm', [UsuarioController::class, 'registrar'])->name('registro.form');
Route::post('/verificarCredenciales', [UsuarioController::class, 'verificarCredenciales'])->name('login.form');
Route::get('/cerrarSesion', [UsuarioController::class, 'cerrarSesion'])->name('cerrar.sesion');
Route::get('/recuperar', [UsuarioController::class, 'recuperar'])->name('correo');
Route::post('/recuperarContrasenia', [UsuarioController::class, 'recuperarContrasenia'])->name('recuperar.contrasenia');
Route::post('/codigo', [UsuarioController::class, 'codigo'])->name('contrasenia');
Route::post('/cambio/codigo', [UsuarioController::class, 'cambio'])->name('cambio');


Route::prefix('/usuario')->middleware("VerificarUsuario")->group(function () {
    Route::get('/inicio', [UsuarioController::class, 'inicio'])->name('usuario.inicio');
    Route::get('/registrocontacto', [UsuarioController::class, 'registroContacto'])->name('usuario.rcontacto');
    Route::get('/listacontacto/{id?}', [UsuarioController::class, 'listaContacto'])->name('usuario.lcontacto');
    Route::post('/registrocontacto', [AgendaController::class, 'registro'])->name('rcontacto');
    Route::get('/registrocumple/{id?}', [UsuarioController::class, 'registroCumpleanio'])->name('usuario.rcumple');
    Route::get('/registrocita', [UsuarioController::class, 'registroCita'])->name('usuario.rcita');
});


