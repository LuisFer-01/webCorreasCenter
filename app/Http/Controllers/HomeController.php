<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Industria;
use App\Models\Marca;
use App\Models\Servicio;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Inertia\Inertia;

class HomeController extends Controller
{
    public function index()
    {
        // Categorías destacadas (primeras 6 por orden)
        $categoriasDestacadas = Categoria::activos()
            ->ordenados()
            ->limit(6)
            ->get()
            ->map(function ($categoria) {
                return [
                    'id' => $categoria->id,
                    'nombre' => $categoria->nombre,
                    'slug' => $categoria->slug,
                    'descripcion_corta' => Str::limit($categoria->descripcion, 80),
                    'imagen' => $categoria->imagen_url,
                    'icon' => $categoria->icon_url,
                    'subcategorias_count' => $categoria->subcategorias_count,
                ];
            });

        // Servicios destacados (primeros 3)
        $serviciosDestacados = Servicio::activos()
            ->limit(3)
            ->get()
            ->map(function ($servicio) {
                return [
                    'id' => $servicio->id,
                    'nombre' => $servicio->nombre,
                    'slug' => $servicio->slug,
                    'descripcion_corta' => $servicio->descripcion_corta,
                    'imagen' => $servicio->imagen_url,
                ];
            });

        // Industrias (todas para mostrar en landing)
        $industrias = Industria::activos()
            ->orderBy('nombre')
            ->get()
            ->map(function ($industria) {
                return [
                    'id' => $industria->id,
                    'nombre' => $industria->nombre,
                    'slug' => $industria->slug,
                    'descripcion' => Str::limit($industria->descripcion, 100),
                    'icono' => $industria->icono_url,
                    'imagen' => $industria->imagen_url,
                ];
            });

        // Marcas para el carrusel
        $marcas = Marca::activos()
            ->orderBy('nombre')
            ->get()
            ->map(function ($marca) {
                return [
                    'id' => $marca->id,
                    'nombre' => $marca->nombre,
                    'logo' => $marca->logo_url,
                ];
            });

        return Inertia::render('Landing/Home', [
            'categoriasDestacadas' => $categoriasDestacadas,
            'serviciosDestacados' => $serviciosDestacados,
            'industrias' => $industrias,
            'marcas' => $marcas,
        ]);
    }
}
