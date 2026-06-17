<?php

namespace Database\Seeders;

use App\Models\DetalleSubCategoria;
use App\Models\SubCategoria;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DetalleSubCategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Obtener IDs de subcategorías
        $subcats = SubCategoria::pluck('id', 'nombre')->toArray();

        $detalles = [
            // CORREAS EN V
            [
                'subcategoria_id' => $subcats['Correas en V'] ?? null,
                'caracteristicas' => [
                    'perfiles_disponibles' => ['A', 'B', 'C', 'D', 'E', '3V', '5V', '8V'],
                    'rango_longitud' => '12" a 600"',
                    'temperatura_operacion' => '-30°C a +80°C',
                    'velocidad_maxima' => '30 m/s',
                    'resistencia_aceites' => 'Alta',
                    'resistencia_estatica' => 'Conductiva (ISO 1813)',
                ],
                'gama_productos' => [
                    'seccion_a' => ['nombre' => 'Sección A', 'imagen' => 'gamas/correa-a.jpg', 'descripcion' => 'Perfil estándar para aplicaciones ligeras'],
                    'seccion_b' => ['nombre' => 'Sección B', 'imagen' => 'gamas/correa-b.jpg', 'descripcion' => 'Perfil medio para aplicaciones generales'],
                    'seccion_c' => ['nombre' => 'Sección C', 'imagen' => 'gamas/correa-c.jpg', 'descripcion' => 'Perfil grande para aplicaciones pesadas'],
                    'seccion_d' => ['nombre' => 'Sección D', 'imagen' => 'gamas/correa-d.jpg', 'descripcion' => 'Perfil extra grande para alta potencia'],
                    'seccion_e' => ['nombre' => 'Sección E', 'imagen' => 'gamas/correa-e.jpg', 'descripcion' => 'Perfil máximo para aplicaciones industriales'],
                ],
                'medidas_productos' => [
                    'seccion_a' => ['ancho_superior' => '12.7 mm (0.50")', 'espesor' => '7.9 mm (0.31")', 'angulo' => '40°'],
                    'seccion_b' => ['ancho_superior' => '16.7 mm (0.66")', 'espesor' => '10.3 mm (0.41")', 'angulo' => '40°'],
                    'seccion_c' => ['ancho_superior' => '22.2 mm (0.875")', 'espesor' => '13.5 mm (0.53")', 'angulo' => '40°'],
                    'seccion_d' => ['ancho_superior' => '31.8 mm (1.25")', 'espesor' => '19.0 mm (0.75")', 'angulo' => '40°'],
                    'seccion_e' => ['ancho_superior' => '38.1 mm (1.50")', 'espesor' => '23.0 mm (0.91")', 'angulo' => '40°'],
                ],
                'construccion' => [
                    'cubierta' => 'Mezcla de algodón con poliéster',
                    'cuerda_tension' => 'Poliéster de alta tenacidad',
                    'alma' => 'Caucho natural/SBR de alta elasticidad',
                    'tratamiento' => 'Resistente a aceites y temperaturas',
                ],
                'aplicaciones' => [
                    'Industria general',
                    'Equipos de HVAC',
                    'Agricultura',
                    'Césped y Jardín',
                    'Compresores de aire',
                    'Bombas industriales',
                    'Ventiladores',
                ],
            ],

            // CORREAS DENTADAS
            [
                'subcategoria_id' => $subcats['Correas Dentadas'] ?? null,
                'caracteristicas' => [
                    'perfiles_disponibles' => ['HTD 3M', 'HTD 5M', 'HTD 8M', 'HTD 14M', 'T5', 'T10', 'T20', 'MXL', 'XL', 'L', 'H'],
                    'rango_longitud' => '150 mm a 5000 mm',
                    'temperatura_operacion' => '-30°C a +100°C',
                    'velocidad_maxima' => '80 m/s',
                    'precision_sincronizacion' => '±0.5 mm',
                    'ruido' => 'Bajo',
                ],
                'gama_productos' => [
                    'htd' => ['nombre' => 'Serie HTD', 'imagen' => 'gamas/correa-htd.jpg', 'descripcion' => 'Dientes curvos de alto torque'],
                    'gt' => ['nombre' => 'Serie GT', 'imagen' => 'gamas/correa-gt.jpg', 'descripcion' => 'Generación mejorada de HTD'],
                    't' => ['nombre' => 'Serie T', 'imagen' => 'gamas/correa-t.jpg', 'descripcion' => 'Dientes trapezoidales estándar'],
                    'mxl_xl' => ['nombre' => 'Serie MXL/XL/L/H', 'imagen' => 'gamas/correa-mxl.jpg', 'descripcion' => 'Paso en pulgadas'],
                ],
                'medidas_productos' => [
                    'htd_3m' => ['paso' => '3 mm', 'altura_diente' => '1.17 mm', 'ancho_base' => '2.36 mm'],
                    'htd_5m' => ['paso' => '5 mm', 'altura_diente' => '1.95 mm', 'ancho_base' => '3.90 mm'],
                    'htd_8m' => ['paso' => '8 mm', 'altura_diente' => '3.10 mm', 'ancho_base' => '6.10 mm'],
                    't5' => ['paso' => '5 mm', 'altura_diente' => '2.25 mm', 'ancho_base' => '3.50 mm'],
                    't10' => ['paso' => '10 mm', 'altura_diente' => '4.50 mm', 'ancho_base' => '7.00 mm'],
                ],
                'construccion' => [
                    'cuerpo' => 'Poliuretano o caucho cloropreno',
                    'refuerzo' => 'Cordón de acero o Kevlar',
                    'dientes' => 'Caucho reforzado con nylon',
                    'recubrimiento' => 'Opcional de nylon para mayor durabilidad',
                ],
                'aplicaciones' => [
                    'Maquinaria de empaque',
                    'Equipos de impresión',
                    'Robótica industrial',
                    'Máquinas herramienta CNC',
                    'Sistemas de transporte sincronizado',
                    'Equipos médicos',
                ],
            ],

            // RODAMIENTOS DE BOLAS
            [
                'subcategoria_id' => $subcats['Rodamientos de Bolas'] ?? null,
                'caracteristicas' => [
                    'tipos' => ['Ranura profunda', 'Contacto angular', 'Autosellados', 'Abiertos'],
                    'series_disponibles' => ['6000', '6200', '6300', '6800', '6900'],
                    'rango_diametro' => '3 mm a 200 mm',
                    'temperatura_operacion' => '-30°C a +120°C',
                    'velocidad_maxima' => 'Hasta 30,000 RPM',
                    'precision' => 'ABEC 1, 3, 5, 7, 9',
                ],
                'gama_productos' => [
                    'serie_6000' => ['nombre' => 'Serie 6000', 'imagen' => 'gamas/rod-6000.jpg', 'descripcion' => 'Ligera para aplicaciones compactas'],
                    'serie_6200' => ['nombre' => 'Serie 6200', 'imagen' => 'gamas/rod-6200.jpg', 'descripcion' => 'Ligera estándar uso general'],
                    'serie_6300' => ['nombre' => 'Serie 6300', 'imagen' => 'gamas/rod-6300.jpg', 'descripcion' => 'Mediana para cargas moderadas'],
                    'serie_6800' => ['nombre' => 'Serie 6800', 'imagen' => 'gamas/rod-6800.jpg', 'descripcion' => 'Extra delgada'],
                ],
                'medidas_productos' => [
                    '6205' => ['diametro_interno' => '25 mm', 'diametro_externo' => '52 mm', 'ancho' => '15 mm'],
                    '6206' => ['diametro_interno' => '30 mm', 'diametro_externo' => '62 mm', 'ancho' => '16 mm'],
                    '6308' => ['diametro_interno' => '40 mm', 'diametro_externo' => '90 mm', 'ancho' => '23 mm'],
                    '6310' => ['diametro_interno' => '50 mm', 'diametro_externo' => '110 mm', 'ancho' => '27 mm'],
                ],
                'construccion' => [
                    'anillos' => 'Acero al cromo de alta calidad (SAE 52100)',
                    'bolas' => 'Acero de alta precisión',
                    'jaula' => 'Acero prensado, poliamida o latón',
                    'lubricacion' => 'Grasa de litio o aceite según aplicación',
                ],
                'aplicaciones' => [
                    'Motores eléctricos',
                    'Bombas centrifugas',
                    'Ventiladores industriales',
                    'Cajas reductoras',
                    'Maquinaria textil',
                    'Equipos agrícolas',
                ],
            ],

            // MANGUERAS HIDRÁULICAS
            [
                'subcategoria_id' => $subcats['Mangueras Hidráulicas'] ?? null,
                'caracteristicas' => [
                    'tipos' => ['R1 (1 trenzado)', 'R2 (2 trenzados)', 'R12 (4 espirales)', 'R13 (4 espirales alta presión)'],
                    'rangos_presion' => '250 a 420 bar según tipo',
                    'diametros_disponibles' => '1/4" a 2"',
                    'temperatura_operacion' => '-40°C a +120°C',
                    'fluido_compatible' => 'Aceites minerales, agua-glicol, emulsiones',
                ],
                'gama_productos' => [
                    'r1' => ['nombre' => 'SAE 100 R1', 'imagen' => 'gamas/manguera-r1.jpg', 'descripcion' => 'Baja/media presión, 1 trenzado'],
                    'r2' => ['nombre' => 'SAE 100 R2', 'imagen' => 'gamas/manguera-r2.jpg', 'descripcion' => 'Media presión, 2 trenzados'],
                    'r12' => ['nombre' => 'SAE 100 R12', 'imagen' => 'gamas/manguera-r12.jpg', 'descripcion' => 'Alta presión, 4 espirales'],
                ],
                'medidas_productos' => [
                    '1_4' => ['diametro_interno' => '6.4 mm (1/4")', 'diametro_externo' => '13.5 mm', 'presion_max' => '225 bar'],
                    '3_8' => ['diametro_interno' => '9.5 mm (3/8")', 'diametro_externo' => '16.7 mm', 'presion_max' => '210 bar'],
                    '1_2' => ['diametro_interno' => '12.7 mm (1/2")', 'diametro_externo' => '20.6 mm', 'presion_max' => '190 bar'],
                    '3_4' => ['diametro_interno' => '19.0 mm (3/4")', 'diametro_externo' => '27.0 mm', 'presion_max' => '160 bar'],
                    '1' => ['diametro_interno' => '25.4 mm (1")', 'diametro_externo' => '34.9 mm', 'presion_max' => '130 bar'],
                ],
                'construccion' => [
                    'tubo_interno' => 'Caucho sintético resistente al aceite (NBR)',
                    'refuerzo' => 'Trenzado de acero de alta tenacidad',
                    'cubierta' => 'Caucho sintético resistente a abrasión e intemperie',
                ],
                'aplicaciones' => [
                    'Maquinaria pesada',
                    'Excavadoras y retroexcavadoras',
                    'Prensas hidráulicas',
                    'Equipos agrícolas',
                    'Sistemas hidráulicos industriales',
                    'Grúas y elevadores',
                ],
            ],
        ];

        foreach ($detalles as $detalle) {
            if ($detalle['subcategoria_id']) {
                DetalleSubCategoria::create([
                    'subcategoria_id' => $detalle['subcategoria_id'],
                    'caracteristicas' => $detalle['caracteristicas'],
                    'gama_productos' => $detalle['gama_productos'],
                    'medidas_productos' => $detalle['medidas_productos'],
                    'construccion' => $detalle['construccion'],
                    'aplicaciones' => $detalle['aplicaciones'],
                    'estado' => true,
                ]);
            }
        }
    }
}
