<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LibroController;
use App\Http\Controllers\FamiliaProfesionalController;

// Página principal pública
Route::get('/', function () {
    return view('welcome');
});

// Rutas de autenticación (Breeze)
require __DIR__.'/auth.php';

// Rutas protegidas (requieren autenticación)
Route::middleware(['auth', 'verified'])->group(function () {
    
    // Dashboard principal
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Panel de administración
    Route::get('/admin', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    // Perfil de usuario
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Rutas para Libros (CRUD)
    Route::prefix('libro')->name('libro.')->group(function () {
        Route::get('/', [LibroController::class, 'index'])->name('index'); // Listar libros
        Route::get('/create', [LibroController::class, 'create'])->name('create'); // Form crear
        Route::post('/', [LibroController::class, 'store'])->name('store'); // Guardar libro
        Route::get('/{id}', [LibroController::class, 'show'])->name('show'); // Ver detalles
        Route::get('/{id}/edit', [LibroController::class, 'edit'])->name('edit'); // Form editar
        Route::put('/{id}', [LibroController::class, 'update'])->name('update'); // Actualizar libro
        Route::delete('/{id}', [LibroController::class, 'destroy'])->name('destroy'); // Eliminar libro
    });

    // Rutas para Familias Profesionales (CRUD)
    Route::prefix('familias_profesionales')->name('familias_profesionales.')->group(function () {
        Route::get('/', [FamiliaProfesionalController::class, 'index'])->name('index');
        Route::get('/create', [FamiliaProfesionalController::class, 'create'])->name('create');
        Route::post('/', [FamiliaProfesionalController::class, 'store'])->name('store');
        Route::get('/{id}', [FamiliaProfesionalController::class, 'show'])->name('show');
        Route::get('/{id}/edit', [FamiliaProfesionalController::class, 'edit'])->name('edit');
        Route::put('/{id}', [FamiliaProfesionalController::class, 'update'])->name('update');
        Route::delete('/{id}', [FamiliaProfesionalController::class, 'destroy'])->name('destroy');
    });
});