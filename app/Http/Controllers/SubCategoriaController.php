<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\SubCategoria;
use Illuminate\Http\Request;
use Inertia\Inertia;

class SubCategoriaController extends Controller
{
    public function show($slug)
    {
        $subcategoria = SubCategoria::with(['categoria', 'detalles'])
            ->where('slug', $slug)
            ->where('estado', true)
            ->firstOrFail();

        $categoria = $subcategoria->categoria;

        // Obtener detalles técnicos
        $detalles = $subcategoria->detalles;

        // Subcategorías hermanas (de la misma categoría)
        $subcategoriasHermanas = $categoria->subcategoriasActivas()
            ->where('id', '!=', $subcategoria->id)
            ->get()
            ->map(fn($sub) => [
                'nombre' => $sub->nombre,
                'slug' => $sub->slug,
                'imagen' => $sub->imagen_url,
            ]);

        // Otras categorías para navegación
        $otrasCategorias = Categoria::activos()
            ->where('id', '!=', $categoria->id)
            ->ordenados()
            ->limit(5)
            ->get()
            ->map(fn($cat) => [
                'nombre' => $cat->nombre,
                'slug' => $cat->slug,
            ]);

        return Inertia::render('subcategorias/Show', [
            'subcategoria' => [
                'id' => $subcategoria->id,
                'nombre' => $subcategoria->nombre,
                'slug' => $subcategoria->slug,
                'descripcion' => $subcategoria->descripcion,
                'imagen' => $subcategoria->imagen_url,
                'marcas_disponibles' => $subcategoria->getMarcasDisponiblesCollection()
                    ->map(fn($marca) => [
                        'id' => $marca->id,
                        'nombre' => $marca->nombre,
                        'logo' => $marca->logo_url,
                    ]),
            ],
            'categoria' => [
                'nombre' => $categoria->nombre,
                'slug' => $categoria->slug,
            ],
            'detalles' => $detalles ? [
                'caracteristicas' => $detalles->caracteristicas,
                'gama_productos' => $detalles->gama_productos,
                'medidas_productos' => $detalles->medidas_productos,
                'construccion' => $detalles->construccion,
                'aplicaciones' => $detalles->aplicaciones,
                'tiene_caracteristicas' => $detalles->tieneCaracteristicas(),
                'tiene_gama_productos' => $detalles->tieneGamaProductos(),
                'tiene_medidas' => $detalles->tieneMedidas(),
                'tiene_construccion' => $detalles->tieneConstruccion(),
                'tiene_aplicaciones' => $detalles->tieneAplicaciones(),
            ] : null,
            'subcategoriasHermanas' => $subcategoriasHermanas,
            'otrasCategorias' => $otrasCategorias,
        ]);
    }
}
