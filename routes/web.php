<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LoginController;
use App\Http\Controllers\ModuloUsuarioController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\PalabraController;
use App\Http\Controllers\PanelController;
use App\Http\Controllers\NumerosController;
use App\Http\Controllers\AbecedarioController;
use App\Http\Controllers\VocalController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Middleware\RoleMiddleware;


Route::get('/', function () {
    return view('login');
})->name('login');

Route::get('/recuperar_contraseña', function () {
    return view('recuperar_contraseña');
})->name('recuperar_contraseña');

Route::get('/registrarse', function () {
    return view('register');
})->name('registrarse');

Route::post('/registrando', [LoginController::class,'registrar'])->name('registrar');

Route::post('/iniciar', [LoginController::class,'login'])->name('login.iniciar');

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLink'])->name('password.email');

Route::get('/reset-password', [ForgotPasswordController::class, 'showResetForm'])->name('password.reset');

Route::post('/reset-password', [ForgotPasswordController::class, 'reset'])->name('password.update');

// Route::get('/test-error', function () {
//     return response()->view('errors.503', [], 503);
// });



Route::middleware(['auth'])->group(function () {

    Route::get('/panel', [PanelController::class, 'panel'])->name('panel');
    Route::get('/numeros', [NumerosController::class, 'numeros'])->name('numeros');
    Route::get('/abecedario', [AbecedarioController::class, 'abecedario'])->name('abecedario');
    Route::get('/vocales', [VocalController::class, 'vocales'])->name('vocales');

    Route::get('/nueva-categoria', function () {
        return view('ingresar_categoria');
    })->name('nueva_categoria');

    Route::get('/nueva-palabra-usuario/{id}', function ($id) {
        return view('ingresar_palabra_usuario', ['id' => $id]);
    })->name('nueva_palabra_usuario');

    Route::middleware([RoleMiddleware::class])->group(function () {
        Route::get('/usuarios', [ModuloUsuarioController::class, 'usuarios'])->name('usuarios');

        Route::get('/nueva-palabra-clave', function () {
            return view('ingresar_palabra_clave');
        })->name('nueva_palabra_clave');

        Route::get('/nuevo-numero', function () {
            return view('ingresar_numero');
        })->name('nuevo_numero');

        Route::get('/nueva-letra', function () {
            return view('ingresar_letra');
        })->name('nueva_letra');

        Route::get('/nueva-vocal', function () {
            return view('ingresar_vocal');
        })->name('nueva_vocal');

        Route::get('/nueva-palabra', [PalabraController::class, 'categorias'])->name('nueva_palabra');

        Route::post('/guardar-palabra-clave', [PalabraController::class, 'registrar_palabra_clave'])->name('guardar_palabra_clave');
        Route::post('/guardar-numero', [NumerosController::class, 'registrar_numero'])->name('guardar_numero');
        Route::post('/guardar-letra', [AbecedarioController::class, 'registrar_letra'])->name('guardar_letra');
        Route::post('/guardar-vocal', [VocalController::class, 'registrar_vocal'])->name('guardar_vocal');

        Route::put('/usuarios/{id}/actualizar-rol', [ModuloUsuarioController::class, 'actualizarRol']);
        Route::put('/usuarios/{id}/deshabilitar', [ModuloUsuarioController::class, 'deshabilitarUsuario']);
    });

    Route::post('/guardar-categoria', [CategoriaController::class, 'registrar_categoria'])->name('guardar_categoria');
    Route::post('/guardar-palabra', [PalabraController::class, 'registrar_palabra'])->name('guardar_palabra');


    Route::get('/categoria/palabras/{id}', [PalabraController::class, 'palabras'])->name('palabras');
    Route::get('/categoria/palabra/{id}', [PalabraController::class, 'palabras_admin'])->name('palabras_admin');
});
