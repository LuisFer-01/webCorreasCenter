<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\{
    HomeController,
    CategoriaController,
    SubCategoriaController,
    ServicioController,
    IndustriaController,
    SucursalController,
    BuscadorController
};

// Home / Landing Page
Route::get('/', [HomeController::class, 'index'])->name('home');

// Categorías
Route::get('/categorias', [CategoriaController::class, 'index'])->name('categorias.index');
Route::get('/categoria/{slug}', [CategoriaController::class, 'show'])->name('categorias.show');

// Subcategorías (detalle técnico)
Route::get('/subcategoria/{slug}', [SubCategoriaController::class, 'show'])->name('subcategorias.show');

// Servicios
Route::get('/servicios', [ServicioController::class, 'index'])->name('servicios.index');
Route::get('/servicio/{slug}', [ServicioController::class, 'show'])->name('servicios.show');

// Aplicaciones / Industrias
Route::get('/aplicaciones', [IndustriaController::class, 'index'])->name('aplicaciones.index');
Route::get('/aplicacion/{slug}', [IndustriaController::class, 'show'])->name('aplicaciones.show');

// Contacto / Sucursales
Route::get('/contacto', [SucursalController::class, 'index'])->name('contacto');

// Búsqueda
Route::get('/buscar', [BuscadorController::class, 'search'])->name('buscar');
Route::get('/api/sugerencias', [BuscadorController::class, 'suggestions'])->name('api.sugerencias');

// Redirecciones amigables (opcional, para URLs antiguas)
Route::get('/productos', function () {
    return redirect()->route('categorias.index');
});

Route::get('/acerca-de', function () {
    return redirect()->route('home');
    // O si tienes una página específica: return Inertia::render('About');
});

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
