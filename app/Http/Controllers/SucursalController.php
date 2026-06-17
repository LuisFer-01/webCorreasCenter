<?php

namespace App\Http\Controllers;

use App\Models\Sucursal;
use Illuminate\Http\Request;
use Inertia\Inertia;

class SucursalController extends Controller
{
    public function index()
    {
        // Sucursal principal primero
        $sucursalPrincipal = Sucursal::activos()
            ->principales()
            ->first();

        // Otras sucursales
        $otrasSucursales = Sucursal::activos()
            ->where('es_principal', false)
            ->orderBy('nombre')
            ->get();

        $formatSucursal = function ($sucursal) {
            return [
                'id' => $sucursal->id,
                'nombre' => $sucursal->nombre,
                'direccion' => $sucursal->direccion,
                'telefono' => $sucursal->telefono,
                'telefono_llamada' => $sucursal->telefono_llamada,
                'whatsapp' => $sucursal->whatsapp,
                'whatsapp_url' => $sucursal->whatsapp_url,
                'email' => $sucursal->email,
                'horarios' => $sucursal->horarios_formateados,
                'mapa_incrustado' => $sucursal->mapa_incrustado,
                'coordenadas' => $sucursal->coordenadas,
                'google_maps_url' => $sucursal->google_maps_url,
                'tiene_coordenadas' => $sucursal->tieneCoordenadas(),
                'tiene_mapa_incrustado' => $sucursal->tieneMapaIncrustado(),
                'es_principal' => $sucursal->es_principal,
            ];
        };

        return Inertia::render('Contact/Index', [
            'sucursalPrincipal' => $sucursalPrincipal ? $formatSucursal($sucursalPrincipal) : null,
            'otrasSucursales' => $otrasSucursales->map($formatSucursal),
        ]);
    }
}
