<?php

namespace Database\Seeders;

use App\Models\Categoria;
use App\Models\Marca;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Obtener IDs de marcas por nombre para referenciarlas en JSON
        $marcasIds = Marca::pluck('id', 'nombre')->toArray();

        $categorias = [
            [
                'nombre' => 'Correas',
                'descripcion' => 'Correas industriales de alta resistencia para transmisión de potencia en todo tipo de maquinaria.',
                'icon' => 'categorias/correas-icon.svg',
                'imagen' => 'categorias/correas.jpg',
                'marcas_disponibles' => [
                    $marcasIds['Gates'] ?? 1,
                    $marcasIds['Mitsuba'] ?? 2,
                    $marcasIds['Megadyne'] ?? 3,
                    $marcasIds['PIX'] ?? 4,
                    $marcasIds['Perfect Power'] ?? 5,
                    $marcasIds['Abix'] ?? 6,
                ],
                'orden' => 1,
            ],
            [
                'nombre' => 'Mangueras',
                'descripcion' => 'Mangueras de alta presión para sistemas hidráulicos, neumáticos e industriales.',
                'icon' => 'categorias/mangueras-icon.svg',
                'imagen' => 'categorias/mangueras.jpg',
                'marcas_disponibles' => [
                    $marcasIds['Jason'] ?? 7,
                    $marcasIds['ZMTE'] ?? 8,
                    $marcasIds['Pabovi'] ?? 9,
                    $marcasIds['Semper'] ?? 10,
                ],
                'orden' => 2,
            ],
            [
                'nombre' => 'Rodamientos',
                'descripcion' => 'Rodamientos de precisión de las mejores marcas internacionales para todo tipo de aplicaciones.',
                'icon' => 'categorias/rodamientos-icon.svg',
                'imagen' => 'categorias/rodamientos.jpg',
                'marcas_disponibles' => [
                    $marcasIds['SKF'] ?? 11,
                    $marcasIds['FAG'] ?? 12,
                    $marcasIds['INA'] ?? 13,
                    $marcasIds['NSK'] ?? 14,
                    $marcasIds['NTN'] ?? 15,
                    $marcasIds['FBJ'] ?? 16,
                    $marcasIds['KFB'] ?? 17,
                    $marcasIds['F&D'] ?? 18,
                ],
                'orden' => 3,
            ],
            [
                'nombre' => 'Retenes, Sellos y O-rings',
                'descripcion' => 'Elementos de sellado industrial para prevenir fugas y proteger componentes mecánicos.',
                'icon' => 'categorias/retenes-icon.svg',
                'imagen' => 'categorias/retenes.jpg',
                'marcas_disponibles' => [
                    $marcasIds['SKF'] ?? 11,
                    $marcasIds['SAV'] ?? 19,
                    $marcasIds['ARCA'] ?? 20,
                    $marcasIds['GMORS'] ?? 21,
                    $marcasIds['HERCULES'] ?? 22,
                    $marcasIds['APC'] ?? 23,
                    $marcasIds['WORLD GASKET'] ?? 24,
                ],
                'orden' => 4,
            ],
            [
                'nombre' => 'Bandas Transportadoras Pesadas',
                'descripcion' => 'Bandas para transporte de materiales en minería, industria pesada y aplicaciones de alta demanda.',
                'icon' => 'categorias/bandas-pesadas-icon.svg',
                'imagen' => 'categorias/bandas-pesadas.jpg',
                'marcas_disponibles' => [],
                'orden' => 5,
            ],
            [
                'nombre' => 'Bandas Transportadoras Livianas',
                'descripcion' => 'Bandas para transporte de materiales en industria alimenticia, empaque y aplicaciones ligeras.',
                'icon' => 'categorias/bandas-livianas-icon.svg',
                'imagen' => 'categorias/bandas-livianas.jpg',
                'marcas_disponibles' => [],
                'orden' => 6,
            ],
            [
                'nombre' => 'Cadenas',
                'descripcion' => 'Cadenas de transmisión y transporte para aplicaciones pesadas e industriales.',
                'icon' => 'categorias/cadenas-icon.svg',
                'imagen' => 'categorias/cadenas.jpg',
                'marcas_disponibles' => [],
                'orden' => 7,
            ],
            [
                'nombre' => 'Poleas',
                'descripcion' => 'Elementos de transmisión de potencia diseñados para optimizar el movimiento en sistemas de correas y bandas.',
                'icon' => 'categorias/poleas-icon.svg',
                'imagen' => 'categorias/poleas.jpg',
                'marcas_disponibles' => [],
                'orden' => 8,
            ],
            [
                'nombre' => 'Piñones',
                'descripcion' => 'Componentes de precisión para transmisión de movimiento en sistemas de cadenas y maquinaria industrial.',
                'icon' => 'categorias/pinones-icon.svg',
                'imagen' => 'categorias/pinones.jpg',
                'marcas_disponibles' => [],
                'orden' => 9,
            ],
            [
                'nombre' => 'Niples, Conexiones y Conectores Hidráulicos',
                'descripcion' => 'Conexiones hidráulicas y neumáticas de precisión para sistemas industriales.',
                'icon' => 'categorias/niples-icon.svg',
                'imagen' => 'categorias/niples.jpg',
                'marcas_disponibles' => [],
                'orden' => 10,
            ],
            [
                'nombre' => 'Cilindros Hidráulicos y Neumáticos',
                'descripcion' => 'Componentes neumáticos e hidráulicos para optimizar movimientos y conexiones en maquinaria.',
                'icon' => 'categorias/cilindros-icon.svg',
                'imagen' => 'categorias/cilindros.jpg',
                'marcas_disponibles' => [],
                'orden' => 11,
            ],
            [
                'nombre' => 'Cangilones',
                'descripcion' => 'Elementos de elevación y transporte de materiales en sistemas de bandas transportadoras verticales.',
                'icon' => 'categorias/cangilones-icon.svg',
                'imagen' => 'categorias/cangilones.jpg',
                'marcas_disponibles' => [],
                'orden' => 12,
            ],
            [
                'nombre' => 'Cardanes',
                'descripcion' => 'Sistemas de transmisión de potencia para maquinaria agrícola e industrial.',
                'icon' => 'categorias/cardanes-icon.svg',
                'imagen' => 'categorias/cardanes.jpg',
                'marcas_disponibles' => [],
                'orden' => 13,
            ],
            [
                'nombre' => 'Cajas de Comandos',
                'descripcion' => 'Sistemas de control hidráulico para maquinaria agrícola e industrial.',
                'icon' => 'categorias/cajas-comandos-icon.svg',
                'imagen' => 'categorias/cajas-comandos.jpg',
                'marcas_disponibles' => [],
                'orden' => 14,
            ],
            [
                'nombre' => 'Abrazaderas',
                'descripcion' => 'Elementos de sujeción y fijación para mangueras, tuberías y componentes industriales.',
                'icon' => 'categorias/abrazaderas-icon.svg',
                'imagen' => 'categorias/abrazaderas.jpg',
                'marcas_disponibles' => [],
                'orden' => 15,
            ],
        ];

        foreach ($categorias as $categoria) {
            Categoria::create([
                'nombre' => $categoria['nombre'],
                'slug' => Str::slug($categoria['nombre']),
                'descripcion' => $categoria['descripcion'],
                'icon' => $categoria['icon'],
                'imagen' => $categoria['imagen'],
                'marcas_disponibles' => $categoria['marcas_disponibles'],
                'orden' => $categoria['orden'],
                'estado' => true,
            ]);
        }
    }
}
