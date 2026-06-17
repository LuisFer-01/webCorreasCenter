<?php

namespace Database\Seeders;

use App\Models\Sucursal;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SucursalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sucursales = [
            [
                'nombre' => 'Oficina Central',
                'direccion' => 'Av. Principal #123, Santa Cruz de la Sierra',
                'telefono' => '+591 7 7306576',
                'whatsapp' => [
                    'numero' => '59177306576',
                    'mensaje_default' => 'Hola, me gustaría obtener más información sobre sus productos.',
                ],
                'email' => 'ventas@correascenter.com',
                'horarios' => [
                    'lunes_viernes' => '8:00 - 18:00',
                    'sabado' => '8:00 - 13:00',
                    'domingo' => 'Cerrado',
                ],
                'mapa_incrustado' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!..." width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>',
                'latitud' => -17.7832443,
                'longitud' => -63.1821652,
                'es_principal' => true,
            ],
            [
                'nombre' => 'Sucursal Banzer',
                'direccion' => 'Av. Cristo Redentor #456, Santa Cruz',
                'telefono' => '+591 7 500-8216',
                'whatsapp' => [
                    'numero' => '59175008216',
                    'mensaje_default' => 'Hola, estoy interesado en los productos de la Sucursal Banzer.',
                ],
                'email' => 'cajabanzer.correasc@gmail.com',
                'horarios' => [
                    'lunes_viernes' => '8:00 - 12:00 y 14:00 - 18:00',
                    'sabado' => '8:00 - 13:00',
                    'domingo' => 'Cerrado',
                ],
                'mapa_incrustado' => null,
                'latitud' => -17.7632145,
                'longitud' => -63.1723456,
                'es_principal' => false,
            ],
            [
                'nombre' => 'Sucursal Pampa de la Isla',
                'direccion' => 'Zona Industrial Pampa de la Isla, Santa Cruz',
                'telefono' => '+591 7 416-2510',
                'whatsapp' => [
                    'numero' => '59174162510',
                    'mensaje_default' => 'Hola, estoy interesado en los productos de la Sucursal Pampa de la Isla.',
                ],
                'email' => 'ronalsanchez@correascenter.com',
                'horarios' => [
                    'lunes_viernes' => '8:00 - 12:00 y 14:00 - 18:00',
                    'sabado' => '8:00 - 13:00',
                    'domingo' => 'Cerrado',
                ],
                'mapa_incrustado' => null,
                'latitud' => -17.7934567,
                'longitud' => -63.1567890,
                'es_principal' => false,
            ],
            [
                'nombre' => 'Sucursal Montero',
                'direccion' => 'Av. Hernando Siles #789, Montero',
                'telefono' => '+591 7 500-8215',
                'whatsapp' => [
                    'numero' => '59175008215',
                    'mensaje_default' => 'Hola, estoy interesado en los productos de la Sucursal Montero.',
                ],
                'email' => 'cajamontero.correasc@gmail.com',
                'horarios' => [
                    'lunes_viernes' => '8:00 - 12:00 y 14:00 - 18:00',
                    'sabado' => '8:00 - 13:00',
                    'domingo' => 'Cerrado',
                ],
                'mapa_incrustado' => null,
                'latitud' => -17.4832456,
                'longitud' => -63.2512345,
                'es_principal' => false,
            ],
        ];

        foreach ($sucursales as $sucursal) {
            Sucursal::create([
                'nombre' => $sucursal['nombre'],
                'direccion' => $sucursal['direccion'],
                'telefono' => $sucursal['telefono'],
                'whatsapp' => $sucursal['whatsapp'],
                'email' => $sucursal['email'],
                'horarios' => $sucursal['horarios'],
                'mapa_incrustado' => $sucursal['mapa_incrustado'],
                'latitud' => $sucursal['latitud'],
                'longitud' => $sucursal['longitud'],
                'es_principal' => $sucursal['es_principal'],
                'estado' => true,
            ]);
        }
    }
}
