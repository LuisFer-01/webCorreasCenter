<?php

namespace App\Http\Controllers;

use App\Models\Subcategoria;
use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Inertia\Inertia;

class BuscadorController extends Controller
{
    /**
     * Página de resultados de búsqueda
     */
    public function search(Request $request)
    {
        $query = $request->input('q', '');

        if (empty($query)) {
            return Inertia::render('search/Results', [
                'query' => '',
                'resultados' => [],
                'categorias' => [],
                'totalResultados' => 0,
            ]);
        }

        // Buscar en subcategorías
        $subcategorias = Subcategoria::activos()
            ->where(function ($q) use ($query) {
                $q->where('nombre', 'like', "%{$query}%")
                  ->orWhere('descripcion', 'like', "%{$query}%")
                  ->orWhere('descripcion_corta', 'like', "%{$query}%");
            })
            ->with(['categoria'])
            ->orderBy('nombre')
            ->get()
            ->map(function ($sub) {
                return [
                    'id' => $sub->id,
                    'nombre' => $sub->nombre,
                    'slug' => $sub->slug,
                    'descripcion_corta' => $sub->descripcion_corta,
                    'imagen' => $sub->imagen_url,
                    'tipo' => 'subcategoria',
                    'categoria' => [
                        'nombre' => $sub->categoria->nombre,
                        'slug' => $sub->categoria->slug,
                    ],
                    'marcas_disponibles' => $sub->getMarcasDisponiblesCollection()
                        ->map(fn($marca) => [
                            'id' => $marca->id,
                            'nombre' => $marca->nombre,
                            'logo' => $marca->logo_url,
                        ]),
                ];
            });

        // Buscar en categorías
        $categorias = Categoria::activos()
            ->where('nombre', 'like', "%{$query}%")
            ->orWhere('descripcion', 'like', "%{$query}%")
            ->orderBy('nombre')
            ->get()
            ->map(fn($cat) => [
                'id' => $cat->id,
                'nombre' => $cat->nombre,
                'slug' => $cat->slug,
                'descripcion_corta' => Str::limit($cat->descripcion, 100),
                'imagen' => $cat->imagen_url,
                'tipo' => 'categoria',
                'subcategorias_count' => $cat->subcategorias_count,
            ]);

        $totalResultados = $subcategorias->count() + $categorias->count();

        return Inertia::render('search/Result', [
            'query' => $query,
            'resultados' => $subcategorias,
            'categorias' => $categorias,
            'totalResultados' => $totalResultados,
        ]);
    }

    /**
     * API para autocompletado (JSON)
     */
    public function suggestions(Request $request)
    {
        $query = $request->input('q', '');

        if (strlen($query) < 2) {
            return response()->json([]);
        }

        $subcategorias = Subcategoria::activos()
            ->where('nombre', 'like', "%{$query}%")
            ->limit(5)
            ->get()
            ->map(fn($sub) => [
                'nombre' => $sub->nombre,
                'slug' => $sub->slug,
                'tipo' => 'subcategoria',
                'categoria' => $sub->categoria->nombre ?? '',
            ]);

        $categorias = Categoria::activos()
            ->where('nombre', 'like', "%{$query}%")
            ->limit(3)
            ->get()
            ->map(fn($cat) => [
                'nombre' => $cat->nombre,
                'slug' => $cat->slug,
                'tipo' => 'categoria',
            ]);

        return response()->json($categorias->merge($subcategorias));
    }
}
