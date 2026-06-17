<?php

namespace Database\Seeders;

use App\Models\Servicio;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ServicioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $servicios = [
            [
                'nombre' => 'Fabricación de Sellos SKF',
                'descripcion' => 'Servicio autorizado SKF para la fabricación de sellos y retenes en Bolivia. Contamos con la licencia exclusiva para producir sellos SKF con los más altos estándares de calidad internacional, garantizando durabilidad y rendimiento óptimo en sus aplicaciones industriales.',
                'descripcion_corta' => 'Licencia exclusiva SKF para Bolivia.',
                'imagen' => 'servicios/sellos-skf.jpg',
                'galeria' => [
                    'servicios/sellos-skf-1.jpg',
                    'servicios/sellos-skf-2.jpg',
                    'servicios/sellos-skf-3.jpg',
                ],
                'beneficios' => [
                    'Fabricación autorizada SKF',
                    'Calidad internacional garantizada',
                    'Entrega rápida',
                    'Medidas personalizadas',
                    'Asesoría técnica especializada',
                ],
            ],
            [
                'nombre' => 'Prensado de Mangueras',
                'descripcion' => 'Servicio profesional de prensado de mangueras hidráulicas con equipos de última generación. Realizamos el armado completo de mangueras con terminales según las especificaciones requeridas, garantizando estanqueidad y resistencia a alta presión.',
                'descripcion_corta' => 'Armado profesional de mangueras hidráulicas.',
                'imagen' => 'servicios/prensado-mangueras.jpg',
                'galeria' => [
                    'servicios/prensado-1.jpg',
                    'servicios/prensado-2.jpg',
                ],
                'beneficios' => [
                    'Equipos de prensado de última generación',
                    'Terminales de alta calidad',
                    'Pruebas de presión',
                    'Entrega inmediata',
                    'Asesoría en selección de mangueras',
                ],
            ],
            [
                'nombre' => 'Reparación de Cilindros',
                'descripcion' => 'Servicio especializado de reparación y mantenimiento de cilindros hidráulicos y neumáticos. Realizamos el diagnóstico completo, cambio de sellos, rectificado de camisas y pruebas de funcionamiento para devolver su cilindro a condiciones óptimas.',
                'descripcion_corta' => 'Reparación integral de cilindros hidráulicos.',
                'imagen' => 'servicios/reparacion-cilindros.jpg',
                'galeria' => [
                    'servicios/cilindros-1.jpg',
                    'servicios/cilindros-2.jpg',
                ],
                'beneficios' => [
                    'Diagnóstico completo',
                    'Cambio de sellos y empaques',
                    'Rectificado de camisas',
                    'Pruebas de presión y funcionamiento',
                    'Garantía del servicio',
                ],
            ],
            [
                'nombre' => 'Fabricación de O-rings',
                'descripcion' => 'Fabricación de O-rings a medida en diversos materiales (NBR, Vitón, Silicona, EPDM) para aplicaciones específicas. Contamos con moldes para una amplia variedad de tamaños y la capacidad de producir O-rings especiales según sus requerimientos.',
                'descripcion_corta' => 'O-rings a medida en diversos materiales.',
                'imagen' => 'servicios/fabricacion-orings.jpg',
                'galeria' => [
                    'servicios/orings-1.jpg',
                    'servicios/orings-2.jpg',
                ],
                'beneficios' => [
                    'Amplia variedad de materiales',
                    'Producción a medida',
                    'Entrega rápida',
                    'Calidad certificada',
                    'Asesoría en selección de material',
                ],
            ],
            [
                'nombre' => 'Asesoría Técnica Industrial',
                'descripcion' => 'Consultoría especializada para optimizar sistemas de transmisión, hidráulica y neumática. Nuestro equipo de ingenieros analiza sus aplicaciones y le recomienda las mejores soluciones técnicas para mejorar el rendimiento y reducir costos operativos.',
                'descripcion_corta' => 'Consultoría especializada en sistemas industriales.',
                'imagen' => 'servicios/asesoria-tecnica.jpg',
                'galeria' => [
                    'servicios/asesoria-1.jpg',
                    'servicios/asesoria-2.jpg',
                ],
                'beneficios' => [
                    'Análisis técnico especializado',
                    'Optimización de sistemas',
                    'Reducción de costos operativos',
                    'Mejora de rendimiento',
                    'Capacitación técnica',
                ],
            ],
            [
                'nombre' => 'Empalmes y Montaje de Bandas Transportadoras',
                'descripcion' => 'Servicio especializado de empalmes vulcanizados y mecánicos, así como montaje profesional de bandas transportadoras pesadas y livianas. Contamos con técnicos certificados y equipos especializados para realizar trabajos en sitio con la mayor calidad y seguridad.',
                'descripcion_corta' => 'Empalmes y montaje profesional de bandas.',
                'imagen' => 'servicios/empalmes-bandas.jpg',
                'galeria' => [
                    'servicios/empalmes-1.jpg',
                    'servicios/empalmes-2.jpg',
                    'servicios/empalmes-3.jpg',
                ],
                'beneficios' => [
                    'Empalmes vulcanizados en caliente y frío',
                    'Empalmes mecánicos',
                    'Montaje en sitio',
                    'Técnicos certificados',
                    'Minimización de tiempos de inactividad',
                ],
            ],
        ];

        foreach ($servicios as $servicio) {
            Servicio::create([
                'nombre' => $servicio['nombre'],
                'slug' => Str::slug($servicio['nombre']),
                'descripcion' => $servicio['descripcion'],
                'descripcion_corta' => $servicio['descripcion_corta'],
                'imagen' => $servicio['imagen'],
                'galeria' => $servicio['galeria'],
                'beneficios' => $servicio['beneficios'],
                'estado' => true,
            ]);
        }
    }
}
