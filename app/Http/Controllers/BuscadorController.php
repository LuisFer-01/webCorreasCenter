<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Subcategoria;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Inertia\Inertia;

class BuscadorController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('q', '');

        $results = [];
        $categories = [];

        if ($query) {
            // Buscar en subcategorías
            $subcategorias = Subcategoria::activos()
                ->where('nombre', 'like', "%{$query}%")
                ->orWhere('descripcion', 'like', "%{$query}%")
                ->with('categoria')
                ->get()
                ->map(function ($sub) {
                    return [
                        'id' => $sub->id,
                        'nombre' => $sub->nombre,
                        'slug' => $sub->slug,
                        'descripcion_corta' => $sub->descripcion_corta,
                        'imagen' => $sub->imagen_url,
                        'url' => "/subcategoria/{$sub->slug}",
                        'tipo' => 'subcategoria',
                    ];
                });

            // Buscar en categorías
            $categorias = Categoria::activos()
                ->where('nombre', 'like', "%{$query}%")
                ->get()
                ->map(function ($cat) {
                    return [
                        'id' => $cat->id,
                        'nombre' => $cat->nombre,
                        'slug' => $cat->slug,
                        'descripcion_corta' => Str::limit($cat->descripcion, 100),
                        'imagen' => $cat->imagen_url,
                        'url' => "/categoria/{$cat->slug}",
                        'tipo' => 'categoria',
                    ];
                });

            $results = $categorias->merge($subcategorias)->toArray();
            $categories = Categoria::activos()->get();
        }

        return Inertia::render('search/Result', [
            'query' => $query,
            'results' => $results,
            'categories' => $categories,
        ]);
    }
}
