<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\SubCategoria;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Inertia\Inertia;

class BuscadorController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('q', '');

        if (empty($query)) {
            return Inertia::render('Search/Results', [
                'query' => '',
                'resultados' => [],
                'categorias' => [],
            ]);
        }

        // Buscar en subcategorías (nombre, descripción)
        $subcategorias = Subcategoria::activos()
            ->where(function ($q) use ($query) {
                $q->where('nombre', 'like', "%{$query}%")
                  ->orWhere('descripcion', 'like', "%{$query}%")
                  ->orWhere('descripcion_corta', 'like', "%{$query}%");
            })
            ->with('categoria')
            ->orderBy('nombre')
            ->get()
            ->map(function ($sub) {
                return [
                    'id' => $sub->id,
                    'nombre' => $sub->nombre,
                    'slug' => $sub->slug,
                    'descripcion_corta' => $sub->descripcion_corta,
                    'imagen' => $sub->imagen_url,
                    'categoria' => [
                        'nombre' => $sub->categoria->nombre,
                        'slug' => $sub->categoria->slug,
                    ],
                ];
            });

        // Buscar en categorías
        $categorias = Categoria::activos()
            ->where('nombre', 'like', "%{$query}%")
            ->orderBy('nombre')
            ->get()
            ->map(fn($cat) => [
                'id' => $cat->id,
                'nombre' => $cat->nombre,
                'slug' => $cat->slug,
                'descripcion_corta' => Str::limit($cat->descripcion, 100),
                'imagen' => $cat->imagen_url,
            ]);

        return Inertia::render('Search/Results', [
            'query' => $query,
            'resultados' => $subcategorias,
            'categorias' => $categorias,
        ]);
    }

    /**
     * Autocompletado para el buscador (API ligera)
     */
    public function suggestions(Request $request)
    {
        $query = $request->input('q', '');

        if (strlen($query) < 2) {
            return response()->json([]);
        }

        $subcategorias = SubCategoria::activos()
            ->where('nombre', 'like', "%{$query}%")
            ->limit(5)
            ->get()
            ->map(fn($sub) => [
                'nombre' => $sub->nombre,
                'slug' => $sub->slug,
                'tipo' => 'subcategoria',
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
