<?php

namespace App\Http\Controllers;

use App\Models\Industria;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Inertia\Inertia;

class IndustriaController extends Controller
{
    public function index()
    {
        $industrias = Industria::activos()
            ->orderBy('nombre')
            ->get()
            ->map(function ($industria) {
                return [
                    'id' => $industria->id,
                    'nombre' => $industria->nombre,
                    'slug' => $industria->slug,
                    'descripcion' => Str::limit($industria->descripcion, 120),
                    'icono' => $industria->icono_url,
                    'imagen' => $industria->imagen_url,
                    'subcategorias_count' => $industria->subcategorias_count,
                    'servicios_count' => $industria->servicios_count,
                ];
            });

        return Inertia::render('Applications/Index', [
            'industrias' => $industrias,
        ]);
    }

    /**
     * Detalle de una industria con subcategorías y servicios relacionados
     */
    public function show($slug)
    {
        $industria = Industria::where('slug', $slug)
            ->where('estado', true)
            ->firstOrFail();

        // Subcategorías relacionadas
        $subcategoriasRelacionadas = $industria->subcategorias()->map(function ($sub) {
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

        // Servicios relacionados
        $serviciosRelacionados = $industria->servicios()->map(function ($servicio) {
            return [
                'id' => $servicio->id,
                'nombre' => $servicio->nombre,
                'slug' => $servicio->slug,
                'descripcion_corta' => $servicio->descripcion_corta,
                'imagen' => $servicio->imagen_url,
            ];
        });

        // Otras industrias
        $otrasIndustrias = Industria::activos()
            ->where('id', '!=', $industria->id)
            ->orderBy('nombre')
            ->limit(4)
            ->get()
            ->map(fn($ind) => [
                'nombre' => $ind->nombre,
                'slug' => $ind->slug,
                'icono' => $ind->icono_url,
            ]);

        return Inertia::render('Applications/Show', [
            'industria' => [
                'id' => $industria->id,
                'nombre' => $industria->nombre,
                'slug' => $industria->slug,
                'descripcion' => $industria->descripcion,
                'icono' => $industria->icono_url,
                'imagen' => $industria->imagen_url,
            ],
            'subcategoriasRelacionadas' => $subcategoriasRelacionadas,
            'serviciosRelacionados' => $serviciosRelacionados,
            'otrasIndustrias' => $otrasIndustrias,
        ]);
    }
}
