<?php

namespace Database\Seeders;

use App\Models\Categoria;
use App\Models\Marca;
use App\Models\SubCategoria;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class SubCategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categoriasIds = Categoria::pluck('id', 'nombre')->toArray();
        $marcasIds = Marca::pluck('id', 'nombre')->toArray();

        $subcategorias = [
            // CORREAS
            [
                'categoria_id' => $categoriasIds['Correas'],
                'nombre' => 'Correas en V',
                'imagen' => 'subcategorias/correas-en-v.jpg',
                'descripcion' => 'Correas en V de alta resistencia para transmisión de potencia en maquinaria industrial, agrícola y de HVAC. Disponibles en múltiples secciones y longitudes.',
                'descripcion_corta' => 'Transmisión de potencia confiable para maquinaria industrial.',
                'marcas_disponibles' => [
                    $marcasIds['Gates'] ?? 1,
                    $marcasIds['Mitsuba'] ?? 2,
                    $marcasIds['PIX'] ?? 4,
                    $marcasIds['Perfect Power'] ?? 5,
                ],
                'orden' => 1,
            ],
            [
                'categoria_id' => $categoriasIds['Correas'],
                'nombre' => 'Correas Dentadas',
                'imagen' => 'subcategorias/correas-dentadas.jpg',
                'descripcion' => 'Correas dentadas de sincronización para aplicaciones que requieren precisión en el movimiento. Disponibles en perfiles HTD, GT, T y MXL.',
                'descripcion_corta' => 'Sincronización precisa para maquinaria de alta precisión.',
                'marcas_disponibles' => [
                    $marcasIds['Mitsuba'] ?? 2,
                    $marcasIds['Megadyne'] ?? 3,
                    $marcasIds['Gates'] ?? 1,
                ],
                'orden' => 2,
            ],
            [
                'categoria_id' => $categoriasIds['Correas'],
                'nombre' => 'Correas Variadoras',
                'imagen' => 'subcategorias/correas-variadoras.jpg',
                'descripcion' => 'Correas variadoras de velocidad para sistemas de transmisión con regulación continua. Ideales para aplicaciones donde se requiere ajuste de velocidad.',
                'descripcion_corta' => 'Regulación continua de velocidad en sistemas de transmisión.',
                'marcas_disponibles' => [
                    $marcasIds['PIX'] ?? 4,
                    $marcasIds['Gates'] ?? 1,
                ],
                'orden' => 3,
            ],
            [
                'categoria_id' => $categoriasIds['Correas'],
                'nombre' => 'Correas Acanaladas',
                'imagen' => 'subcategorias/correas-acanaladas.jpg',
                'descripcion' => 'Correas acanaladas multi-estriadas para equipos de alta velocidad y transmisión eficiente. Ideales para aplicaciones compactas.',
                'descripcion_corta' => 'Transmisión eficiente para equipos de alta velocidad.',
                'marcas_disponibles' => [
                    $marcasIds['Gates'] ?? 1,
                    $marcasIds['Mitsuba'] ?? 2,
                ],
                'orden' => 4,
            ],

            // MANGUERAS
            [
                'categoria_id' => $categoriasIds['Mangueras'],
                'nombre' => 'Mangueras Hidráulicas',
                'imagen' => 'subcategorias/mangueras-hidraulicas.jpg',
                'descripcion' => 'Mangueras hidráulicas de alta presión con trenzado de acero para sistemas hidráulicos industriales. Disponibles en R1, R2 y R12.',
                'descripcion_corta' => 'Alta presión para sistemas hidráulicos industriales.',
                'marcas_disponibles' => [
                    $marcasIds['Pabovi'] ?? 9,
                    $marcasIds['Jason'] ?? 7,
                ],
                'orden' => 1,
            ],
            [
                'categoria_id' => $categoriasIds['Mangueras'],
                'nombre' => 'Mangueras de Succión y de Descarga',
                'imagen' => 'subcategorias/mangueras-succion.jpg',
                'descripcion' => 'Mangueras de succión y descarga para líquidos, sólidos y materiales abrasivos. Reforzadas con espiral de acero.',
                'descripcion_corta' => 'Para succión y descarga de líquidos y sólidos.',
                'marcas_disponibles' => [
                    $marcasIds['ZMTE'] ?? 8,
                    $marcasIds['Semper'] ?? 10,
                ],
                'orden' => 2,
            ],
            [
                'categoria_id' => $categoriasIds['Mangueras'],
                'nombre' => 'Mangueras Multiusos',
                'imagen' => 'subcategorias/mangueras-multiusos.jpg',
                'descripcion' => 'Mangueras multiusos para aire, agua, aceites y diversos fluidos. Versátiles para múltiples aplicaciones industriales.',
                'descripcion_corta' => 'Versátiles para aire, agua y aceites.',
                'marcas_disponibles' => [
                    $marcasIds['Semper'] ?? 10,
                ],
                'orden' => 3,
            ],
            [
                'categoria_id' => $categoriasIds['Mangueras'],
                'nombre' => 'Mangueras Neumáticas',
                'imagen' => 'subcategorias/mangueras-neumaticas.jpg',
                'descripcion' => 'Mangueras neumáticas de poliuretano y nylon para sistemas de aire comprimido. Flexibles y resistentes.',
                'descripcion_corta' => 'Para sistemas de aire comprimido.',
                'marcas_disponibles' => [
                    $marcasIds['Pabovi'] ?? 9,
                ],
                'orden' => 4,
            ],

            // RODAMIENTOS
            [
                'categoria_id' => $categoriasIds['Rodamientos'],
                'nombre' => 'Rodamientos de Rodillos',
                'imagen' => 'subcategorias/rodamientos-rodillos.jpg',
                'descripcion' => 'Rodamientos de rodillos esféricos, cilíndricos y cónicos para cargas pesadas y aplicaciones industriales exigentes.',
                'descripcion_corta' => 'Para cargas pesadas y aplicaciones exigentes.',
                'marcas_disponibles' => [
                    $marcasIds['SKF'] ?? 11,
                    $marcasIds['FAG'] ?? 12,
                    $marcasIds['NSK'] ?? 14,
                ],
                'orden' => 1,
            ],
            [
                'categoria_id' => $categoriasIds['Rodamientos'],
                'nombre' => 'Rodamientos de Bolas',
                'imagen' => 'subcategorias/rodamientos-bolas.jpg',
                'descripcion' => 'Rodamientos de bolas de ranura profunda y contacto angular para aplicaciones de alta velocidad y precisión.',
                'descripcion_corta' => 'Alta velocidad y precisión.',
                'marcas_disponibles' => [
                    $marcasIds['SKF'] ?? 11,
                    $marcasIds['FAG'] ?? 12,
                    $marcasIds['NSK'] ?? 14,
                    $marcasIds['NTN'] ?? 15,
                ],
                'orden' => 2,
            ],
            [
                'categoria_id' => $categoriasIds['Rodamientos'],
                'nombre' => 'Rodamientos de Agujas',
                'imagen' => 'subcategorias/rodamientos-agujas.jpg',
                'descripcion' => 'Rodamientos de agujas para aplicaciones con espacio radial limitado y alta capacidad de carga.',
                'descripcion_corta' => 'Para espacios radiales limitados.',
                'marcas_disponibles' => [
                    $marcasIds['INA'] ?? 13,
                    $marcasIds['SKF'] ?? 11,
                ],
                'orden' => 3,
            ],
            [
                'categoria_id' => $categoriasIds['Rodamientos'],
                'nombre' => 'Rodamientos Axiales',
                'imagen' => 'subcategorias/rodamientos-axiales.jpg',
                'descripcion' => 'Rodamientos axiales de bolas y rodillos para cargas unidireccionales y bidireccionales.',
                'descripcion_corta' => 'Para cargas axiales unidireccionales y bidireccionales.',
                'marcas_disponibles' => [
                    $marcasIds['NTN'] ?? 15,
                    $marcasIds['SKF'] ?? 11,
                ],
                'orden' => 4,
            ],
            [
                'categoria_id' => $categoriasIds['Rodamientos'],
                'nombre' => 'Rodamientos Lineales',
                'imagen' => 'subcategorias/rodamientos-lineales.jpg',
                'descripcion' => 'Rodamientos lineales para guías de desplazamiento y aplicaciones de automatización.',
                'descripcion_corta' => 'Para guías de desplazamiento y automatización.',
                'marcas_disponibles' => [
                    $marcasIds['SKF'] ?? 11,
                ],
                'orden' => 5,
            ],
            [
                'categoria_id' => $categoriasIds['Rodamientos'],
                'nombre' => 'Rodamientos Esféricos',
                'imagen' => 'subcategorias/rodamientos-esfericos.jpg',
                'descripcion' => 'Rodamientos esféricos autoalineables para aplicaciones con desalineación angular.',
                'descripcion_corta' => 'Autoalineables para desalineación angular.',
                'marcas_disponibles' => [
                    $marcasIds['FBJ'] ?? 16,
                    $marcasIds['SKF'] ?? 11,
                ],
                'orden' => 6,
            ],
            [
                'categoria_id' => $categoriasIds['Rodamientos'],
                'nombre' => 'Rodamientos Cilíndricos',
                'imagen' => 'subcategorias/rodamientos-cilindricos.jpg',
                'descripcion' => 'Rodamientos de rodillos cilíndricos de una o varias hileras para altas cargas radiales.',
                'descripcion_corta' => 'Altas cargas radiales.',
                'marcas_disponibles' => [
                    $marcasIds['KFB'] ?? 17,
                    $marcasIds['FAG'] ?? 12,
                ],
                'orden' => 7,
            ],
            [
                'categoria_id' => $categoriasIds['Rodamientos'],
                'nombre' => 'Rodamientos de Contacto Angular',
                'imagen' => 'subcategorias/rodamientos-contacto.jpg',
                'descripcion' => 'Rodamientos de contacto angular para cargas combinadas radiales y axiales.',
                'descripcion_corta' => 'Para cargas combinadas radiales y axiales.',
                'marcas_disponibles' => [
                    $marcasIds['F&D'] ?? 18,
                    $marcasIds['SKF'] ?? 11,
                ],
                'orden' => 8,
            ],
            [
                'categoria_id' => $categoriasIds['Rodamientos'],
                'nombre' => 'Chumaceras',
                'imagen' => 'subcategorias/chumaceras.jpg',
                'descripcion' => 'Chumaceras con rodamiento insertado para soportes de ejes y aplicaciones industriales.',
                'descripcion_corta' => 'Soportes de ejes para aplicaciones industriales.',
                'marcas_disponibles' => [
                    $marcasIds['SKF'] ?? 11,
                ],
                'orden' => 9,
            ],

            // RETENES Y SELLOS
            [
                'categoria_id' => $categoriasIds['Retenes, Sellos y O-rings'],
                'nombre' => 'Retenes',
                'imagen' => 'subcategorias/retenes.jpg',
                'descripcion' => 'Retenes de labio para ejes rotativos, disponibles en múltiples medidas y materiales para diversas aplicaciones.',
                'descripcion_corta' => 'Sellado para ejes rotativos.',
                'marcas_disponibles' => [
                    $marcasIds['SKF'] ?? 11,
                    $marcasIds['SAV'] ?? 19,
                ],
                'orden' => 1,
            ],
            [
                'categoria_id' => $categoriasIds['Retenes, Sellos y O-rings'],
                'nombre' => 'Sellos Mecánicos',
                'imagen' => 'subcategorias/sellos-mecanicos.jpg',
                'descripcion' => 'Sellos mecánicos para bombas centrifugas, compresores y equipos rotativos. Alta resistencia al desgaste.',
                'descripcion_corta' => 'Para bombas y equipos rotativos.',
                'marcas_disponibles' => [
                    $marcasIds['ARCA'] ?? 20,
                ],
                'orden' => 2,
            ],
            [
                'categoria_id' => $categoriasIds['Retenes, Sellos y O-rings'],
                'nombre' => 'O-Rings',
                'imagen' => 'subcategorias/o-rings.jpg',
                'descripcion' => 'O-rings de nitrilo, vitón, silicona y otros materiales para sellado estático y dinámico.',
                'descripcion_corta' => 'Sellado estático y dinámico.',
                'marcas_disponibles' => [
                    $marcasIds['GMORS'] ?? 21,
                ],
                'orden' => 3,
            ],
            [
                'categoria_id' => $categoriasIds['Retenes, Sellos y O-rings'],
                'nombre' => 'Sellos Hidráulicos',
                'imagen' => 'subcategorias/sellos-hidraulicos.jpg',
                'descripcion' => 'Sellos hidráulicos tipo U-cup, V-pack y especiales para cilindros hidráulicos de alta presión.',
                'descripcion_corta' => 'Para cilindros hidráulicos de alta presión.',
                'marcas_disponibles' => [
                    $marcasIds['HERCULES'] ?? 22,
                ],
                'orden' => 4,
            ],
            [
                'categoria_id' => $categoriasIds['Retenes, Sellos y O-rings'],
                'nombre' => 'Sellos Neumáticos',
                'imagen' => 'subcategorias/sellos-neumaticos.jpg',
                'descripcion' => 'Sellos para pistones y vástagos neumáticos. Diseñados para baja fricción y larga vida útil.',
                'descripcion_corta' => 'Para pistones y vástagos neumáticos.',
                'marcas_disponibles' => [
                    $marcasIds['APC'] ?? 23,
                ],
                'orden' => 5,
            ],

            // BANDAS TRANSPORTADORAS PESADAS
            [
                'categoria_id' => $categoriasIds['Bandas Transportadoras Pesadas'],
                'nombre' => 'Bandas Lisas',
                'imagen' => 'subcategorias/bandas-lisas.jpg',
                'descripcion' => 'Bandas transportadoras lisas para minería, industria pesada y transporte de materiales a granel.',
                'descripcion_corta' => 'Para minería e industria pesada.',
                'marcas_disponibles' => [],
                'orden' => 1,
            ],
            [
                'categoria_id' => $categoriasIds['Bandas Transportadoras Pesadas'],
                'nombre' => 'Bandas Nervadas',
                'imagen' => 'subcategorias/bandas-nervadas.jpg',
                'descripcion' => 'Bandas con nervaduras transversales para transporte inclinado de materiales.',
                'descripcion_corta' => 'Para transporte inclinado.',
                'marcas_disponibles' => [],
                'orden' => 2,
            ],
            [
                'categoria_id' => $categoriasIds['Bandas Transportadoras Pesadas'],
                'nombre' => 'Bandas Verticales',
                'imagen' => 'subcategorias/bandas-verticales.jpg',
                'descripcion' => 'Bandas con perfiles para transporte vertical de materiales a granel.',
                'descripcion_corta' => 'Para transporte vertical.',
                'marcas_disponibles' => [],
                'orden' => 3,
            ],
            [
                'categoria_id' => $categoriasIds['Bandas Transportadoras Pesadas'],
                'nombre' => 'Bandas con Bordes',
                'imagen' => 'subcategorias/bandas-bordes.jpg',
                'descripcion' => 'Bandas con bordes laterales elevados para contener material durante el transporte.',
                'descripcion_corta' => 'Con bordes elevados para contener material.',
                'marcas_disponibles' => [],
                'orden' => 4,
            ],
            [
                'categoria_id' => $categoriasIds['Bandas Transportadoras Pesadas'],
                'nombre' => 'Bandas Corrugadas',
                'imagen' => 'subcategorias/bandas-corrugadas.jpg',
                'descripcion' => 'Bandas corrugadas con faldones laterales para transporte en ángulos pronunciados.',
                'descripcion_corta' => 'Para ángulos pronunciados.',
                'marcas_disponibles' => [],
                'orden' => 5,
            ],

            // BANDAS TRANSPORTADORAS LIVIANAS
            [
                'categoria_id' => $categoriasIds['Bandas Transportadoras Livianas'],
                'nombre' => 'Bandas Sintéticas',
                'imagen' => 'subcategorias/bandas-sinteticas.jpg',
                'descripcion' => 'Bandas sintéticas de PVC y PU para industria alimenticia y aplicaciones ligeras.',
                'descripcion_corta' => 'Para industria alimenticia.',
                'marcas_disponibles' => [],
                'orden' => 1,
            ],
            [
                'categoria_id' => $categoriasIds['Bandas Transportadoras Livianas'],
                'nombre' => 'Bandas Modulares',
                'imagen' => 'subcategorias/bandas-modulares.jpg',
                'descripcion' => 'Bandas modulares plásticas para procesos de lavado, secado y transporte ligero.',
                'descripcion_corta' => 'Para lavado, secado y transporte ligero.',
                'marcas_disponibles' => [],
                'orden' => 2,
            ],
            [
                'categoria_id' => $categoriasIds['Bandas Transportadoras Livianas'],
                'nombre' => 'Bandas de PTFE',
                'imagen' => 'subcategorias/bandas-ptfe.jpg',
                'descripcion' => 'Bandas de teflón antiadherentes para hornos y procesos de alta temperatura.',
                'descripcion_corta' => 'Antiadherentes para hornos.',
                'marcas_disponibles' => [],
                'orden' => 3,
            ],
            [
                'categoria_id' => $categoriasIds['Bandas Transportadoras Livianas'],
                'nombre' => 'Bandas Homogéneas',
                'imagen' => 'subcategorias/bandas-homogeneas.jpg',
                'descripcion' => 'Bandas homogéneas de poliuretano para aplicaciones especiales.',
                'descripcion_corta' => 'De poliuretano para aplicaciones especiales.',
                'marcas_disponibles' => [],
                'orden' => 4,
            ],
            [
                'categoria_id' => $categoriasIds['Bandas Transportadoras Livianas'],
                'nombre' => 'Bandas de Caucho Ligeras',
                'imagen' => 'subcategorias/bandas-caucho.jpg',
                'descripcion' => 'Bandas de caucho para transporte ligero y aplicaciones generales.',
                'descripcion_corta' => 'Para transporte ligero.',
                'marcas_disponibles' => [],
                'orden' => 5,
            ],

            // CADENAS
            [
                'categoria_id' => $categoriasIds['Cadenas'],
                'nombre' => 'Cadenas de Rodillos de Precisión',
                'imagen' => 'subcategorias/cadenas-rodillos.jpg',
                'descripcion' => 'Cadenas de rodillos de precisión para transmisión de potencia en maquinaria industrial.',
                'descripcion_corta' => 'Transmisión de potencia de precisión.',
                'marcas_disponibles' => [],
                'orden' => 1,
            ],
            [
                'categoria_id' => $categoriasIds['Cadenas'],
                'nombre' => 'Cadenas de Acero Inoxidable',
                'imagen' => 'subcategorias/cadenas-inox.jpg',
                'descripcion' => 'Cadenas de acero inoxidable resistentes a la corrosión para industria alimenticia.',
                'descripcion_corta' => 'Resistentes a la corrosión.',
                'marcas_disponibles' => [],
                'orden' => 2,
            ],
            [
                'categoria_id' => $categoriasIds['Cadenas'],
                'nombre' => 'Cadenas de Transmisión',
                'imagen' => 'subcategorias/cadenas-transmision.jpg',
                'descripcion' => 'Cadenas de transmisión de alta resistencia para aplicaciones industriales pesadas.',
                'descripcion_corta' => 'Alta resistencia para aplicaciones pesadas.',
                'marcas_disponibles' => [],
                'orden' => 3,
            ],
            [
                'categoria_id' => $categoriasIds['Cadenas'],
                'nombre' => 'Cadenas con Transportador',
                'imagen' => 'subcategorias/cadenas-transportador.jpg',
                'descripcion' => 'Cadenas con placas de transporte para sistemas de conveying.',
                'descripcion_corta' => 'Para sistemas de conveying.',
                'marcas_disponibles' => [],
                'orden' => 4,
            ],
            [
                'categoria_id' => $categoriasIds['Cadenas'],
                'nombre' => 'Cadenas Agrícolas',
                'imagen' => 'subcategorias/cadenas-agricolas.jpg',
                'descripcion' => 'Cadenas especiales para maquinaria agrícola y cosechadoras.',
                'descripcion_corta' => 'Para maquinaria agrícola.',
                'marcas_disponibles' => [],
                'orden' => 5,
            ],

            // POLEAS
            [
                'categoria_id' => $categoriasIds['Poleas'],
                'nombre' => 'Poleas en V de Taladro Cónico y Cilíndrico',
                'imagen' => 'subcategorias/poleas-v.jpg',
                'descripcion' => 'Poleas en V con sistema de fijación por bushing cónico o cilíndrico para fácil instalación.',
                'descripcion_corta' => 'Con fijación por bushing.',
                'marcas_disponibles' => [],
                'orden' => 1,
            ],
            [
                'categoria_id' => $categoriasIds['Poleas'],
                'nombre' => 'Poleas Sincrónicas',
                'imagen' => 'subcategorias/poleas-sincronas.jpg',
                'descripcion' => 'Poleas sincronizadas para correas dentadas HTD, GT, T y MXL.',
                'descripcion_corta' => 'Para correas dentadas.',
                'marcas_disponibles' => [],
                'orden' => 2,
            ],
            [
                'categoria_id' => $categoriasIds['Poleas'],
                'nombre' => 'Poleas MI-Lock',
                'imagen' => 'subcategorias/poleas-milock.jpg',
                'descripcion' => 'Poleas con sistema de fijación MI-Lock para instalación sin herramientas especiales.',
                'descripcion_corta' => 'Sistema MI-Lock de fácil instalación.',
                'marcas_disponibles' => [],
                'orden' => 3,
            ],

            // PIÑONES
            [
                'categoria_id' => $categoriasIds['Piñones'],
                'nombre' => 'Piñones de taladro cónico',
                'imagen' => 'subcategorias/pinones-conico.jpg',
                'descripcion' => 'Piñones con taladro cónico para cadenas de rodillos de precisión.',
                'descripcion_corta' => 'Con taladro cónico.',
                'marcas_disponibles' => [],
                'orden' => 1,
            ],
            [
                'categoria_id' => $categoriasIds['Piñones'],
                'nombre' => 'Piñones con agujero piloto',
                'imagen' => 'subcategorias/pinones-piloto.jpg',
                'descripcion' => 'Piñones con agujero piloto para mecanizado según aplicación.',
                'descripcion_corta' => 'Con agujero piloto.',
                'marcas_disponibles' => [],
                'orden' => 2,
            ],
            [
                'categoria_id' => $categoriasIds['Piñones'],
                'nombre' => 'Piñones simples de taladro cónico para 2 cadenas',
                'imagen' => 'subcategorias/pinones-doble-conico.jpg',
                'descripcion' => 'Piñones dobles con taladro cónico para transmisión con dos cadenas.',
                'descripcion_corta' => 'Dobles con taladro cónico.',
                'marcas_disponibles' => [],
                'orden' => 3,
            ],
            [
                'categoria_id' => $categoriasIds['Piñones'],
                'nombre' => 'Piñones simples con agujero piloto para 2 cadenas',
                'imagen' => 'subcategorias/pinones-doble-piloto.jpg',
                'descripcion' => 'Piñones dobles con agujero piloto para dos cadenas.',
                'descripcion_corta' => 'Dobles con agujero piloto.',
                'marcas_disponibles' => [],
                'orden' => 4,
            ],

            // NIPLES Y CONEXIONES
            [
                'categoria_id' => $categoriasIds['Niples, Conexiones y Conectores Hidráulicos'],
                'nombre' => 'Niples Hidráulicos',
                'imagen' => 'subcategorias/niples-hidraulicos.jpg',
                'descripcion' => 'Niples hidráulicos de alta presión para conexiones de mangueras hidráulicas.',
                'descripcion_corta' => 'Alta presión para mangueras hidráulicas.',
                'marcas_disponibles' => [],
                'orden' => 1,
            ],
            [
                'categoria_id' => $categoriasIds['Niples, Conexiones y Conectores Hidráulicos'],
                'nombre' => 'Niples de Cobre',
                'imagen' => 'subcategorias/niples-cobre.jpg',
                'descripcion' => 'Niples de cobre para conexiones neumáticas y de baja presión.',
                'descripcion_corta' => 'Para conexiones neumáticas.',
                'marcas_disponibles' => [],
                'orden' => 2,
            ],
            [
                'categoria_id' => $categoriasIds['Niples, Conexiones y Conectores Hidráulicos'],
                'nombre' => 'Conexiones Rápidas',
                'imagen' => 'subcategorias/conexiones-rapidas.jpg',
                'descripcion' => 'Conexiones rápidas para sistemas hidráulicos y neumáticos.',
                'descripcion_corta' => 'Para sistemas hidráulicos y neumáticos.',
                'marcas_disponibles' => [],
                'orden' => 3,
            ],
            [
                'categoria_id' => $categoriasIds['Niples, Conexiones y Conectores Hidráulicos'],
                'nombre' => 'Adaptadores',
                'imagen' => 'subcategorias/adaptadores.jpg',
                'descripcion' => 'Adaptadores de roscas BSP, NPT y métricas para diversas aplicaciones.',
                'descripcion_corta' => 'Adaptadores de roscas diversas.',
                'marcas_disponibles' => [],
                'orden' => 4,
            ],
            [
                'categoria_id' => $categoriasIds['Niples, Conexiones y Conectores Hidráulicos'],
                'nombre' => 'Conectores Rápidos',
                'imagen' => 'subcategorias/conectores-rapidos.jpg',
                'descripcion' => 'Conectores rápidos macho y hembra para acoples rápidos.',
                'descripcion_corta' => 'Para acoples rápidos.',
                'marcas_disponibles' => [],
                'orden' => 5,
            ],

            // CILINDROS
            [
                'categoria_id' => $categoriasIds['Cilindros Hidráulicos y Neumáticos'],
                'nombre' => 'Cilindros Neumáticos',
                'imagen' => 'subcategorias/cilindros-neumaticos.jpg',
                'descripcion' => 'Cilindros neumáticos de doble y simple efecto para automatización industrial.',
                'descripcion_corta' => 'Para automatización industrial.',
                'marcas_disponibles' => [],
                'orden' => 1,
            ],
            [
                'categoria_id' => $categoriasIds['Cilindros Hidráulicos y Neumáticos'],
                'nombre' => 'Cilindros HTR (Tirantes)',
                'imagen' => 'subcategorias/cilindros-htr.jpg',
                'descripcion' => 'Cilindros hidráulicos tipo HTR con tirantes para aplicaciones industriales generales.',
                'descripcion_corta' => 'Con tirantes para uso industrial.',
                'marcas_disponibles' => [],
                'orden' => 2,
            ],
            [
                'categoria_id' => $categoriasIds['Cilindros Hidráulicos y Neumáticos'],
                'nombre' => 'Cilindros HCW (Patentado)',
                'imagen' => 'subcategorias/cilindros-hcw.jpg',
                'descripcion' => 'Cilindros hidráulicos patentados HCW de diseño exclusivo.',
                'descripcion_corta' => 'Diseño patentado exclusivo.',
                'marcas_disponibles' => [],
                'orden' => 3,
            ],

            // CANGILONES
            [
                'categoria_id' => $categoriasIds['Cangilones'],
                'nombre' => 'Cangilones HD Stax (Heavy Duty)',
                'imagen' => 'subcategorias/cangilones-hd.jpg',
                'descripcion' => 'Cangilones de alta resistencia para elevadores de alta capacidad.',
                'descripcion_corta' => 'Alta resistencia para alta capacidad.',
                'marcas_disponibles' => [],
                'orden' => 1,
            ],
            [
                'categoria_id' => $categoriasIds['Cangilones'],
                'nombre' => 'Cangilones de Nylon',
                'imagen' => 'subcategorias/cangilones-nylon.jpg',
                'descripcion' => 'Cangilones de nylon para industria alimenticia y aplicaciones no contaminantes.',
                'descripcion_corta' => 'Para industria alimenticia.',
                'marcas_disponibles' => [],
                'orden' => 2,
            ],
            [
                'categoria_id' => $categoriasIds['Cangilones'],
                'nombre' => 'Cangilones de Poliuretano',
                'imagen' => 'subcategorias/cangilones-poliuretano.jpg',
                'descripcion' => 'Cangilones de poliuretano resistentes al desgaste y abrasión.',
                'descripcion_corta' => 'Resistentes al desgaste.',
                'marcas_disponibles' => [],
                'orden' => 3,
            ],
            [
                'categoria_id' => $categoriasIds['Cangilones'],
                'nombre' => 'Pernos',
                'imagen' => 'subcategorias/pernos-cangilones.jpg',
                'descripcion' => 'Pernos especiales para fijación de cangilones a bandas elevadoras.',
                'descripcion_corta' => 'Para fijación de cangilones.',
                'marcas_disponibles' => [],
                'orden' => 4,
            ],
            [
                'categoria_id' => $categoriasIds['Cangilones'],
                'nombre' => 'Grapas de Empalme Mecánico',
                'imagen' => 'subcategorias/grapas-empalme.jpg',
                'descripcion' => 'Grapas para empalme mecánico de bandas transportadoras.',
                'descripcion_corta' => 'Para empalme de bandas.',
                'marcas_disponibles' => [],
                'orden' => 5,
            ],
            [
                'categoria_id' => $categoriasIds['Cangilones'],
                'nombre' => 'Laterales (Sky Rubbers)',
                'imagen' => 'subcategorias/laterales-sky-rubbers.jpg',
                'descripcion' => 'Laterales de goma Sky Rubbers para cangilones y bandas.',
                'descripcion_corta' => 'Laterales de goma Sky Rubbers.',
                'marcas_disponibles' => [],
                'orden' => 6,
            ],

            // CARDANES
            [
                'categoria_id' => $categoriasIds['Cardanes'],
                'nombre' => 'Cardanes Agrícolas',
                'imagen' => 'subcategorias/cardanes-agricolas.jpg',
                'descripcion' => 'Cardanes para maquinaria agrícola, tractores y cosechadoras.',
                'descripcion_corta' => 'Para maquinaria agrícola.',
                'marcas_disponibles' => [],
                'orden' => 1,
            ],

            // CAJAS DE COMANDOS
            [
                'categoria_id' => $categoriasIds['Cajas de Comandos'],
                'nombre' => 'Caja de Comando de 1 Palanca',
                'imagen' => 'subcategorias/caja-1-palanca.jpg',
                'descripcion' => 'Caja de comando hidráulico de 1 palanca para control de cilindros.',
                'descripcion_corta' => 'Control de 1 cilindro.',
                'marcas_disponibles' => [],
                'orden' => 1,
            ],
            [
                'categoria_id' => $categoriasIds['Cajas de Comandos'],
                'nombre' => 'Caja de Comandos de 2 Palancas',
                'imagen' => 'subcategorias/caja-2-palancas.jpg',
                'descripcion' => 'Caja de comando hidráulico de 2 palancas para control simultáneo.',
                'descripcion_corta' => 'Control de 2 cilindros.',
                'marcas_disponibles' => [],
                'orden' => 2,
            ],
            [
                'categoria_id' => $categoriasIds['Cajas de Comandos'],
                'nombre' => 'Caja de Comandos de 3 Palancas',
                'imagen' => 'subcategorias/caja-3-palancas.jpg',
                'descripcion' => 'Caja de comando hidráulico de 3 palancas.',
                'descripcion_corta' => 'Control de 3 cilindros.',
                'marcas_disponibles' => [],
                'orden' => 3,
            ],
            [
                'categoria_id' => $categoriasIds['Cajas de Comandos'],
                'nombre' => 'Caja de Comandos de 4 Palancas',
                'imagen' => 'subcategorias/caja-4-palancas.jpg',
                'descripcion' => 'Caja de comando hidráulico de 4 palancas.',
                'descripcion_corta' => 'Control de 4 cilindros.',
                'marcas_disponibles' => [],
                'orden' => 4,
            ],
            [
                'categoria_id' => $categoriasIds['Cajas de Comandos'],
                'nombre' => 'Caja de Comandos de 5 Palancas',
                'imagen' => 'subcategorias/caja-5-palancas.jpg',
                'descripcion' => 'Caja de comando hidráulico de 5 palancas.',
                'descripcion_corta' => 'Control de 5 cilindros.',
                'marcas_disponibles' => [],
                'orden' => 5,
            ],
            [
                'categoria_id' => $categoriasIds['Cajas de Comandos'],
                'nombre' => 'Caja de Comandos de 6 Palancas',
                'imagen' => 'subcategorias/caja-6-palancas.jpg',
                'descripcion' => 'Caja de comando hidráulico de 6 palancas.',
                'descripcion_corta' => 'Control de 6 cilindros.',
                'marcas_disponibles' => [],
                'orden' => 6,
            ],

            // ABRAZADERAS
            [
                'categoria_id' => $categoriasIds['Abrazaderas'],
                'nombre' => 'Abrazaderas Galvanizadas',
                'imagen' => 'subcategorias/abrazaderas-galvanizadas.jpg',
                'descripcion' => 'Abrazaderas galvanizadas resistentes a la corrosión.',
                'descripcion_corta' => 'Resistentes a la corrosión.',
                'marcas_disponibles' => [],
                'orden' => 1,
            ],
            [
                'categoria_id' => $categoriasIds['Abrazaderas'],
                'nombre' => 'Abrazaderas Inoxidables',
                'imagen' => 'subcategorias/abrazaderas-inox.jpg',
                'descripcion' => 'Abrazaderas de acero inoxidable para aplicaciones exigentes.',
                'descripcion_corta' => 'De acero inoxidable.',
                'marcas_disponibles' => [],
                'orden' => 2,
            ],
            [
                'categoria_id' => $categoriasIds['Abrazaderas'],
                'nombre' => 'Abrazaderas de Tornillo',
                'imagen' => 'subcategorias/abrazaderas-tornillo.jpg',
                'descripcion' => 'Abrazaderas con tornillo de sujeción ajustable.',
                'descripcion_corta' => 'Con tornillo ajustable.',
                'marcas_disponibles' => [],
                'orden' => 3,
            ],
            [
                'categoria_id' => $categoriasIds['Abrazaderas'],
                'nombre' => 'Abrazaderas de Alambre',
                'imagen' => 'subcategorias/abrazaderas-alambre.jpg',
                'descripcion' => 'Abrazaderas tipo alambre con resorte para fijación rápida.',
                'descripcion_corta' => 'Con resorte para fijación rápida.',
                'marcas_disponibles' => [],
                'orden' => 4,
            ],
        ];

        foreach ($subcategorias as $subcategoria) {
            SubCategoria::create([
                'categoria_id' => $subcategoria['categoria_id'],
                'nombre' => $subcategoria['nombre'],
                'slug' => Str::slug($subcategoria['nombre']),
                'imagen' => $subcategoria['imagen'],
                'descripcion' => $subcategoria['descripcion'],
                'descripcion_corta' => $subcategoria['descripcion_corta'],
                'marcas_disponibles' => $subcategoria['marcas_disponibles'],
                'orden' => $subcategoria['orden'],
                'estado' => true,
            ]);
        }
    }
}
