<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Inertia\Inertia;

class CategoriaController extends Controller
{
    public function index()
    {
        $categorias = Categoria::activos()
            ->ordenados()
            ->get()
            ->map(function ($categoria) {
                return [
                    'id' => $categoria->id,
                    'nombre' => $categoria->nombre,
                    'slug' => $categoria->slug,
                    'descripcion' => $categoria->descripcion,
                    'descripcion_corta' => Str::limit($categoria->descripcion, 120),
                    'imagen' => $categoria->imagen_url,
                    'icon' => $categoria->icon_url,
                    'subcategorias_count' => $categoria->subcategorias_count,
                    'marcas_disponibles' => $categoria->getMarcasDisponiblesCollection()
                        ->map(fn($marca) => [
                            'id' => $marca->id,
                            'nombre' => $marca->nombre,
                            'logo' => $marca->logo_url,
                        ]),
                ];
            });

        return Inertia::render('categorias/Index', [
            'categorias' => $categorias,
        ]);
    }

    /**
     * Detalle de una categoría con sus subcategorías
     */
    public function show($slug)
    {
        $categoria = Categoria::where('slug', $slug)
            ->where('estado', true)
            ->firstOrFail();

        // Subcategorías activas ordenadas
        $subcategorias = $categoria->subcategoriasActivas()
            ->get()
            ->map(function ($subcategoria) {
                return [
                    'id' => $subcategoria->id,
                    'nombre' => $subcategoria->nombre,
                    'slug' => $subcategoria->slug,
                    'descripcion_corta' => $subcategoria->descripcion_corta,
                    'imagen' => $subcategoria->imagen_url,
                    'url' => $subcategoria->url,
                    'marcas_disponibles' => $subcategoria->getMarcasDisponiblesCollection()
                        ->map(fn($marca) => [
                            'id' => $marca->id,
                            'nombre' => $marca->nombre,
                            'logo' => $marca->logo_url,
                        ]),
                ];
            });

        // Categorías relacionadas (otras categorías para navegación)
        $otrasCategorias = Categoria::activos()
            ->where('id', '!=', $categoria->id)
            ->ordenados()
            ->limit(4)
            ->get()
            ->map(fn($cat) => [
                'nombre' => $cat->nombre,
                'slug' => $cat->slug,
            ]);

        return Inertia::render('categorias/Show', [
            'categoria' => [
                'id' => $categoria->id,
                'nombre' => $categoria->nombre,
                'slug' => $categoria->slug,
                'descripcion' => $categoria->descripcion,
                'imagen' => $categoria->imagen_url,
                'icon' => $categoria->icon_url,
                'marcas_disponibles' => $categoria->getMarcasDisponiblesCollection()
                    ->map(fn($marca) => [
                        'id' => $marca->id,
                        'nombre' => $marca->nombre,
                        'logo' => $marca->logo_url,
                    ]),
            ],
            'subcategorias' => $subcategorias,
            'otrasCategorias' => $otrasCategorias,
        ]);
    }
}
