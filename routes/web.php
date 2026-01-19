<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DatosController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/usuario/{id}', function ($id) {
    return 'El Id del usuario es: ' . $id;
});

Route::get('/contacto', function () {
    $url = route('contacto');

    return 'pagina de contacto: ' . $url;

})->name('contacto');


Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::get('/usuarios', function () {
        return "Gestión de usuarios";
    });

    Route::get('/configuracion', function () {
        return "Configuración del sistema";
    });
});


Route::get('/formulario', function () {
    return view('formulario');
});


Route::post('/procesar-datos' , [DatosController::class, 'procesar']);


Route::get('/usuario', [UsuarioController::class, 'index']);
//Route::get('/usuario/{id}', [UsuarioController::class, 'show'])->name('usuario.show');

Route::get('usuario/store', [UsuarioController::class, 'store'])->name('usuario.store');


Route::get('/libros', function(){
    return view('libros');
});