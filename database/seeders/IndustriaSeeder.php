<?php

namespace Database\Seeders;

use App\Models\Industria;
use App\Models\Servicio;
use App\Models\SubCategoria;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class IndustriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $subcatsIds = SubCategoria::pluck('id', 'nombre')->toArray();
        $serviciosIds = Servicio::pluck('id', 'nombre')->toArray();

        $industrias = [
            [
                'nombre' => 'Industria Alimenticia',
                'icono' => 'industrias/alimenticia.svg',
                'imagen' => 'industrias/alimenticia.jpg',
                'descripcion' => 'Soluciones especializadas para la industria alimenticia con productos que cumplen normativas sanitarias. Ofrecemos bandas transportadoras de grado alimenticio, rodamientos con lubricación apta para alimentos y sellos que garantizan la inocuidad de los productos.',
                'subcategorias_usadas' => [
                    $subcatsIds['Bandas Sintéticas'] ?? null,
                    $subcatsIds['Bandas Modulares'] ?? null,
                    $subcatsIds['Bandas de PTFE'] ?? null,
                    $subcatsIds['Cadenas de Acero Inoxidable'] ?? null,
                    $subcatsIds['Rodamientos de Bolas'] ?? null,
                    $subcatsIds['Cangilones de Nylon'] ?? null,
                ],
                'servicios_usados' => [
                    $serviciosIds['Asesoría Técnica Industrial'] ?? null,
                ],
            ],
            [
                'nombre' => 'Agroindustrial',
                'icono' => 'industrias/agroindustrial.svg',
                'imagen' => 'industrias/agroindustrial.jpg',
                'descripcion' => 'Productos resistentes para el exigente entorno agroindustrial. Proveemos correas, cadenas y rodamientos diseñados para soportar polvo, humedad y altas cargas, garantizando el funcionamiento continuo de maquinaria agrícola y de procesamiento.',
                'subcategorias_usadas' => [
                    $subcatsIds['Correas en V'] ?? null,
                    $subcatsIds['Cadenas Agrícolas'] ?? null,
                    $subcatsIds['Cardanes Agricolas'] ?? null,
                    $subcatsIds['Rodamientos de Rodillos'] ?? null,
                    $subcatsIds['Bandas Transportadoras Pesadas'] ?? null,
                ],
                'servicios_usados' => [
                    $serviciosIds['Asesoría Técnica Industrial'] ?? null,
                    $serviciosIds['Empalmes y Montaje de Bandas Transportadoras'] ?? null,
                ],
            ],
            [
                'nombre' => 'Industria Minera',
                'icono' => 'industrias/minera.svg',
                'imagen' => 'industrias/minera.jpg',
                'descripcion' => 'Soluciones robustas para la minería, una de las industrias más exigentes. Ofrecemos bandas transportadoras de alta resistencia, rodamientos para cargas pesadas y sistemas hidráulicos capaces de soportar las condiciones más extremas.',
                'subcategorias_usadas' => [
                    $subcatsIds['Bandas Lisas'] ?? null,
                    $subcatsIds['Bandas Nervadas'] ?? null,
                    $subcatsIds['Bandas Corrugadas'] ?? null,
                    $subcatsIds['Rodamientos de Rodillos'] ?? null,
                    $subcatsIds['Mangueras Hidráulicas'] ?? null,
                    $subcatsIds['Cangilones HD Stax (Heavy Duty)'] ?? null,
                ],
                'servicios_usados' => [
                    $serviciosIds['Empalmes y Montaje de Bandas Transportadoras'] ?? null,
                    $serviciosIds['Prensado de Mangueras'] ?? null,
                    $serviciosIds['Reparación de Cilindros'] ?? null,
                ],
            ],
            [
                'nombre' => 'Industria Metalúrgica',
                'icono' => 'industrias/metalurgica.svg',
                'imagen' => 'industrias/metalurgica.jpg',
                'descripcion' => 'Productos especializados para la industria metalúrgica que requieren precisión y resistencia. Proveemos sistemas de transmisión, rodamientos de alta capacidad y componentes hidráulicos para maquinaria de producción de metales.',
                'subcategorias_usadas' => [
                    $subcatsIds['Correas en V'] ?? null,
                    $subcatsIds['Correas Dentadas'] ?? null,
                    $subcatsIds['Rodamientos de Rodillos'] ?? null,
                    $subcatsIds['Rodamientos de Contacto Angular'] ?? null,
                    $subcatsIds['Cilindros Hidráulicos'] ?? null,
                ],
                'servicios_usados' => [
                    $serviciosIds['Asesoría Técnica Industrial'] ?? null,
                    $serviciosIds['Reparación de Cilindros'] ?? null,
                ],
            ],
            [
                'nombre' => 'Petróleo y Gas',
                'icono' => 'industrias/petroleo.svg',
                'imagen' => 'industrias/petroleo.jpg',
                'descripcion' => 'Soluciones para la industria petrolera y gasífera con productos que cumplen estándares internacionales. Ofrecemos mangueras de alta presión, sellos especializados y rodamientos para condiciones extremas de temperatura y presión.',
                'subcategorias_usadas' => [
                    $subcatsIds['Mangueras Hidráulicas'] ?? null,
                    $subcatsIds['Sellos Mecánicos'] ?? null,
                    $subcatsIds['Sellos Hidráulicos'] ?? null,
                    $subcatsIds['Rodamientos de Rodillos'] ?? null,
                ],
                'servicios_usados' => [
                    $serviciosIds['Prensado de Mangueras'] ?? null,
                    $serviciosIds['Fabricación de Sellos SKF'] ?? null,
                ],
            ],
            [
                'nombre' => 'Manufactura',
                'icono' => 'industrias/manufactura.svg',
                'imagen' => 'industrias/manufactura.jpg',
                'descripcion' => 'Soluciones integrales para la industria manufacturera. Proveemos todos los componentes necesarios para líneas de producción, desde correas de transmisión hasta sistemas de automatización con cilindros neumáticos.',
                'subcategorias_usadas' => [
                    $subcatsIds['Correas en V'] ?? null,
                    $subcatsIds['Correas Dentadas'] ?? null,
                    $subcatsIds['Cadenas de Rodillos de Precisión'] ?? null,
                    $subcatsIds['Rodamientos de Bolas'] ?? null,
                    $subcatsIds['Cilindros Neumáticos'] ?? null,
                    $subcatsIds['Bandas Transportadoras Livianas'] ?? null,
                ],
                'servicios_usados' => [
                    $serviciosIds['Asesoría Técnica Industrial'] ?? null,
                    $serviciosIds['Empalmes y Montaje de Bandas Transportadoras'] ?? null,
                ],
            ],
            [
                'nombre' => 'Construcción',
                'icono' => 'industrias/construccion.svg',
                'imagen' => 'industrias/construccion.jpg',
                'descripcion' => 'Productos resistentes para la industria de la construcción. Proveemos mangueras hidráulicas, cilindros, rodamientos y componentes para maquinaria pesada como excavadoras, grúas y equipos de movimiento de tierras.',
                'subcategorias_usadas' => [
                    $subcatsIds['Mangueras Hidráulicas'] ?? null,
                    $subcatsIds['Cilindros HTR (Tirantes)'] ?? null,
                    $subcatsIds['Rodamientos de Rodillos'] ?? null,
                    $subcatsIds['Niples Hidráulicos'] ?? null,
                    $subcatsIds['Conexiones Rápidas'] ?? null,
                ],
                'servicios_usados' => [
                    $serviciosIds['Prensado de Mangueras'] ?? null,
                    $serviciosIds['Reparación de Cilindros'] ?? null,
                ],
            ],
            [
                'nombre' => 'Transporte',
                'icono' => 'industrias/transporte.svg',
                'imagen' => 'industrias/transporte.jpg',
                'descripcion' => 'Soluciones para el sector transporte, incluyendo flotas de buses, camiones y vehículos comerciales. Ofrecemos correas, mangueras, rodamientos y componentes de dirección y suspensión.',
                'subcategorias_usadas' => [
                    $subcatsIds['Correas Acanaladas'] ?? null,
                    $subcatsIds['Correas en V'] ?? null,
                    $subcatsIds['Mangueras Hidráulicas'] ?? null,
                    $subcatsIds['Mangueras Neumáticas'] ?? null,
                    $subcatsIds['Rodamientos de Bolas'] ?? null,
                ],
                'servicios_usados' => [
                    $serviciosIds['Prensado de Mangueras'] ?? null,
                ],
            ],
            [
                'nombre' => 'Logística',
                'icono' => 'industrias/logistica.svg',
                'imagen' => 'industrias/logistica.jpg',
                'descripcion' => 'Soluciones para centros de distribución y logística. Proveemos bandas transportadoras, sistemas de automatización y componentes para optimizar el flujo de mercancías en almacenes y centros de distribución.',
                'subcategorias_usadas' => [
                    $subcatsIds['Bandas Lisas'] ?? null,
                    $subcatsIds['Bandas Modulares'] ?? null,
                    $subcatsIds['Cadenas de Rodillos de Precisión'] ?? null,
                    $subcatsIds['Cilindros Neumáticos'] ?? null,
                    $subcatsIds['Rodamientos de Bolas'] ?? null,
                ],
                'servicios_usados' => [
                    $serviciosIds['Asesoría Técnica Industrial'] ?? null,
                    $serviciosIds['Empalmes y Montaje de Bandas Transportadoras'] ?? null,
                ],
            ],
        ];

        foreach ($industrias as $industria) {
            // Filtrar valores null de los arrays
            $subcategoriasFiltradas = array_filter($industria['subcategorias_usadas']);
            $serviciosFiltrados = array_filter($industria['servicios_usados'] ?? []);

            Industria::create([
                'nombre' => $industria['nombre'],
                'slug' => Str::slug($industria['nombre']),
                'icono' => $industria['icono'],
                'imagen' => $industria['imagen'],
                'descripcion' => $industria['descripcion'],
                'subcategorias_usadas' => array_values($subcategoriasFiltradas),
                'servicios_usados' => array_values($serviciosFiltrados),
                'estado' => true,
            ]);
        }
    }
}
