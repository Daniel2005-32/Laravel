<?php

use Illuminate\Support\Facades\Route;

use Illuminate\Http\Request;

use App\Http\Controllers\Datos;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\LibroController;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';


Route::middleware(['auth'])->group(function () {
    Route::get('/admin', function () {
    // Tu lógica aquí
    });

});



Route::post('/procesar-datos', [Datos::class, 'procesar']);



Route::get('/procesar-datos', [Datos::class, 'procesar']);


Route::get('/usuario', [UsuarioController::class, 'index']);
//Route::get('/usuario/{id}', [UsuarioController::class, 'show'])->name('usuario.show');


Route::get('/usuario/store', [UsuarioController::class, 'store'])->name('usuario.store');



Route::get('/libro', [LibroController::class, 'index'])->name('libro.index');
Route::get('/libro/create', [LibroController::class, 'create'])->name('libro.create');
Route::post('/libro/create', [LibroController::class, 'create'])->name('libro.create');

Route::get('/libro/edit/{i}', [LibroController::class, 'edit'])->name('libro.edit');
Route::post('/libro/edit', [LibroController::class, 'edit'])->name('libro.edit');

Route::get('/libro/show/{i}', [LibroController::class, 'show'])->name('libro.show');


Route::get('/libro/destroy/{i}', [LibroController::class, 'destroy'])->name('libro.destroy');
Route::post('/libro/destroy', [LibroController::class, 'destroy'])->name('libro.destroy');

