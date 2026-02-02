<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LibroController;
use App\Http\Controllers\UsuarioController;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::middleware(['auth'])->group(function () {
    // Admin Dashboard
    Route::get('/admin', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    // Rutas para Libros
    Route::get('/libros', [LibroController::class, 'index'])->name('libro.index');
    Route::match(['get', 'post'], '/libros/crear', [LibroController::class, 'create'])->name('libro.create');
    Route::get('/libros/mostrar/{id}', [LibroController::class, 'show'])->name('libro.show');
    Route::match(['get', 'post'], '/libros/editar/{id?}', [LibroController::class, 'edit'])->name('libro.edit');
    Route::match(['get', 'post'], '/libros/borrar/{id?}', [LibroController::class, 'destroy'])->name('libro.destroy');

    // Rutas para Usuarios
    Route::get('/usuarios/mostrar/{id}', [UsuarioController::class, 'show'])->name('usuario.show');
});

require __DIR__.'/auth.php';