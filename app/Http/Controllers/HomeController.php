<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Servicio;
use App\Models\Industria;
use App\Models\Marca;
use App\Models\SubCategoria;
use App\Models\Sucursal;
use Illuminate\Support\Str;
use Inertia\Inertia;

class HomeController extends Controller
{
    /**
     * Página principal - Landing Page
     */
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
                        ])
                        ->take(4), // Solo mostrar 4 marcas en el landing
                ];
            });

        // Todas las categorías para el menú
        $todasCategorias = Categoria::activos()
            ->ordenados()
            ->get()
            ->map(fn($cat) => [
                'id' => $cat->id,
                'nombre' => $cat->nombre,
                'slug' => $cat->slug,
            ]);

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
                    'descripcion' => Str::limit($servicio->descripcion, 150),
                    'imagen' => $servicio->imagen_url,
                    'tiene_beneficios' => $servicio->tieneBeneficios(),
                    'beneficios_count' => count($servicio->beneficios ?? []),
                ];
            });

        // Industrias/Aplicaciones (todas para mostrar en landing)
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
                    'subcategorias_count' => $industria->subcategorias_count,
                    'servicios_count' => $industria->servicios_count,
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
                    'descripcion' => $marca->descripcion,
                ];
            });

        // Sucursales (solo las activas)
        $sucursales = Sucursal::activos()
            ->orderBy('es_principal', 'desc')
            ->orderBy('nombre')
            ->get()
            ->map(function ($sucursal) {
                return [
                    'id' => $sucursal->id,
                    'nombre' => $sucursal->nombre,
                    'direccion' => $sucursal->direccion,
                    'telefono' => $sucursal->telefono,
                    'telefono_llamada' => $sucursal->telefono_llamada,
                    'whatsapp_url' => $sucursal->whatsapp_url,
                    'email' => $sucursal->email,
                    'es_principal' => $sucursal->es_principal,
                ];
            });

        // Estadísticas para el landing
        $stats = [
            'total_categorias' => Categoria::activos()->count(),
            'total_subcategorias' => SubCategoria::activos()->count(),
            'total_marcas' => Marca::activos()->count(),
            'total_servicios' => Servicio::activos()->count(),
            'total_industrias' => Industria::activos()->count(),
        ];

        return Inertia::render('landing/Home', [
            'categoriasDestacadas' => $categoriasDestacadas,
            'todasCategorias' => $todasCategorias,
            'serviciosDestacados' => $serviciosDestacados,
            'industrias' => $industrias,
            'marcas' => $marcas,
            'sucursales' => $sucursales,
            'stats' => $stats,
        ]);
    }
}
