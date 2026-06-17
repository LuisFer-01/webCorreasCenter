<?php

namespace App\Http\Controllers;

use App\Models\Servicio;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Inertia\Inertia;

class ServicioController extends Controller
{
    public function index()
    {
        $servicios = Servicio::activos()
            ->orderBy('nombre')
            ->get()
            ->map(function ($servicio) {
                return [
                    'id' => $servicio->id,
                    'nombre' => $servicio->nombre,
                    'slug' => $servicio->slug,
                    'descripcion_corta' => $servicio->descripcion_corta,
                    'descripcion' => Str::limit($servicio->descripcion, 150),
                    'imagen' => $servicio->imagen_url,
                    'tiene_beneficios' => $servicio->tieneBeneficios(),
                    'beneficios_count' => count($servicio->beneficios ?? []),
                ];
            });

        return Inertia::render('servicios/Index', [
            'servicios' => $servicios,
        ]);
    }

    /**
     * Detalle de un servicio
     */
    public function show($slug)
    {
        $servicio = Servicio::where('slug', $slug)
            ->where('estado', true)
            ->firstOrFail();

        // Otros servicios relacionados
        $otrosServicios = Servicio::activos()
            ->where('id', '!=', $servicio->id)
            ->orderBy('nombre')
            ->limit(3)
            ->get()
            ->map(fn($s) => [
                'nombre' => $s->nombre,
                'slug' => $s->slug,
                'descripcion_corta' => $s->descripcion_corta,
                'imagen' => $s->imagen_url,
            ]);

        return Inertia::render('servicios/Show', [
            'servicio' => [
                'id' => $servicio->id,
                'nombre' => $servicio->nombre,
                'slug' => $servicio->slug,
                'descripcion' => $servicio->descripcion,
                'imagen' => $servicio->imagen_url,
                'galeria' => $servicio->galeria_urls,
                'beneficios' => $servicio->beneficios,
                'tiene_galeria' => $servicio->tieneGaleria(),
                'tiene_beneficios' => $servicio->tieneBeneficios(),
            ],
            'otrosServicios' => $otrosServicios,
        ]);
    }
}
