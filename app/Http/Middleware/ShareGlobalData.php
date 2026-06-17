<?php

namespace App\Http\Middleware;

use App\Models\Categoria;
use App\Models\Industria;
use App\Models\Servicio;
use Closure;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Symfony\Component\HttpFoundation\Response;

class ShareGlobalData
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        Inertia::share([
            'globalCategories' => function () {
                return Categoria::activos()
                    ->ordenados()
                    ->limit(15)
                    ->get()
                    ->map(fn($cat) => [
                        'id' => $cat->id,
                        'nombre' => $cat->nombre,
                        'slug' => $cat->slug,
                    ]);
            },
            'globalIndustries' => function () {
                return Industria::activos()
                    ->orderBy('nombre')
                    ->get()
                    ->map(fn($ind) => [
                        'id' => $ind->id,
                        'nombre' => $ind->nombre,
                        'slug' => $ind->slug,
                    ]);
            },
            'globalServices' => function () {
                return Servicio::activos()
                    ->orderBy('nombre')
                    ->get()
                    ->map(fn($serv) => [
                        'id' => $serv->id,
                        'nombre' => $serv->nombre,
                        'slug' => $serv->slug,
                    ]);
            },
        ]);

        return $next($request);
    }
}
