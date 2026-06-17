<?php

namespace Database\Seeders;

use App\Models\Marca;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class MarcaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $marcas = [
            // Correas
            ['nombre' => 'Gates', 'logo' => 'marcas/gates.png', 'descripcion' => 'Líder mundial en tecnología de transmisión de potencia.', 'website' => 'https://www.gates.com'],
            ['nombre' => 'Mitsuba', 'logo' => 'marcas/mitsuba.png', 'descripcion' => 'Fabricante de correas de alta calidad para aplicaciones industriales.'],
            ['nombre' => 'Megadyne', 'logo' => 'marcas/megadyne.png', 'descripcion' => 'Especialistas en correas dentadas y de sincronización.'],
            ['nombre' => 'PIX', 'logo' => 'marcas/pix.png', 'descripcion' => 'Correas de transmisión de alto rendimiento.', 'website' => 'https://www.pixtrans.com'],
            ['nombre' => 'Perfect Power', 'logo' => 'marcas/perfect-power.png', 'descripcion' => 'Correas industriales de calidad premium.'],
            ['nombre' => 'Abix', 'logo' => 'marcas/abix.png', 'descripcion' => 'Correas industriales de alta resistencia.'],

            // Mangueras
            ['nombre' => 'Jason', 'logo' => 'marcas/jason.png', 'descripcion' => 'Mangueras hidráulicas de alta presión.'],
            ['nombre' => 'ZMTE', 'logo' => 'marcas/zmte.png', 'descripcion' => 'Mangueras industriales y de succión.'],
            ['nombre' => 'Pabovi', 'logo' => 'marcas/pabovi.png', 'descripcion' => 'Mangueras hidráulicas y neumáticas de calidad.'],
            ['nombre' => 'Semper', 'logo' => 'marcas/semper.png', 'descripcion' => 'Mangueras multiusos para diversas aplicaciones.'],

            // Rodamientos
            ['nombre' => 'SKF', 'logo' => 'marcas/skf.png', 'descripcion' => 'Líder mundial en rodamientos, sellos y servicios.', 'website' => 'https://www.skf.com'],
            ['nombre' => 'FAG', 'logo' => 'marcas/fag.png', 'descripcion' => 'Rodamientos de precisión para aplicaciones industriales.'],
            ['nombre' => 'INA', 'logo' => 'marcas/ina.png', 'descripcion' => 'Rodamientos de agujas y componentes de precisión.'],
            ['nombre' => 'NSK', 'logo' => 'marcas/nsk.png', 'descripcion' => 'Rodamientos de alta calidad para maquinaria industrial.'],
            ['nombre' => 'NTN', 'logo' => 'marcas/ntn.png', 'descripcion' => 'Rodamientos y componentes mecánicos de precisión.'],
            ['nombre' => 'FBJ', 'logo' => 'marcas/fbj.png', 'descripcion' => 'Rodamientos de calidad europea.'],
            ['nombre' => 'KFB', 'logo' => 'marcas/kfb.png', 'descripcion' => 'Rodamientos industriales de alto rendimiento.'],
            ['nombre' => 'F&D', 'logo' => 'marcas/fd.png', 'descripcion' => 'Rodamientos de contacto angular y especiales.'],

            // Retenes y Sellos
            ['nombre' => 'SAV', 'logo' => 'marcas/sav.png', 'descripcion' => 'Retenes industriales de alta calidad.'],
            ['nombre' => 'ARCA', 'logo' => 'marcas/arca.png', 'descripcion' => 'Sellos mecánicos para bombas y equipos rotativos.'],
            ['nombre' => 'GMORS', 'logo' => 'marcas/gmors.png', 'descripcion' => 'O-rings y sellos de precisión.'],
            ['nombre' => 'HERCULES', 'logo' => 'marcas/hercules.png', 'descripcion' => 'Sellos hidráulicos de alto rendimiento.'],
            ['nombre' => 'APC', 'logo' => 'marcas/apc.png', 'descripcion' => 'Sellos neumáticos y componentes.'],
            ['nombre' => 'WORLD GASKET', 'logo' => 'marcas/world-gasket.png', 'descripcion' => 'Juntas y empaquetaduras industriales.'],
        ];

        foreach ($marcas as $marca) {
            Marca::create([
                'nombre' => $marca['nombre'],
                'slug' => Str::slug($marca['nombre']),
                'logo' => $marca['logo'],
                'descripcion' => $marca['descripcion'] ?? null,
                'website' => $marca['website'] ?? null,
                'estado' => true,
            ]);
        }
    }
}
