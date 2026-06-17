<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    HomeController,
    CategoriaController,
    SubCategoriaController,
    ServicioController,
    IndustriaController,
    SucursalController,
    BuscadorController
};
use Inertia\Inertia;

// Home / Landing Page (DEBE IR PRIMERO)
Route::get('/', [HomeController::class, 'index'])->name('home');

// Categorías
Route::get('/categorias', [CategoriaController::class, 'index'])->name('categorias.index');
Route::get('/categoria/{slug}', [CategoriaController::class, 'show'])->name('categorias.show');

// Subcategorías
Route::get('/subcategoria/{slug}', [SubCategoriaController::class, 'show'])->name('subcategorias.show');

// Servicios
Route::get('/servicios', [ServicioController::class, 'index'])->name('servicios.index');
Route::get('/servicio/{slug}', [ServicioController::class, 'show'])->name('servicios.show');

// Aplicaciones / Industrias
Route::get('/aplicaciones', [IndustriaController::class, 'index'])->name('aplicaciones.index');
Route::get('/aplicacion/{slug}', [IndustriaController::class, 'show'])->name('aplicaciones.show');

// Sucursales
Route::get('/sucursales', [SucursalController::class, 'index'])->name('sucursales');

// Búsqueda
Route::get('/buscar', [BuscadorController::class, 'search'])->name('buscar');
Route::get('/api/sugerencias', [BuscadorController::class, 'suggestions'])->name('api.sugerencias');

// Redirecciones
Route::get('/productos', function () {
    return redirect()->route('categorias.index');
});

Route::get('/acerca-de', function () {
    return redirect()->route('home');
});

// Dashboard y Auth (Breeze)
Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
