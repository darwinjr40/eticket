<?php

namespace Database\Seeders;

use App\Models\NotaVenta;
use App\Models\Ticket;
use Illuminate\Database\Seeder;

class NotaVentaSeeder extends Seeder
{
    
    public function run()
    {
        NotaVenta::create([
            'nombre' => 'Darwin Mamani Paco',
            'nit' => '12345678',
            'correo' => 'darwin@gmail.com',
            'total' => 500,
        ]);


        NotaVenta::create([
            'nombre' => 'Erick Vidal',
            'nit' => '7418563',
            'correo' => 'erick@gmail.com',
            'total' => '500',
        ]);

        Ticket::create([
            'ubicacion_id' => '6',
            'sector_id' => '5',
            // 'espacio_id' => '',
            'nota_venta_id' => '1',
            // 'fecha' => '',
            'precio' => '200',
            'clave' => 'aerasfasdreafd3',
            'cliente' => 'darwin mamani',
            'evento' => 'concierto',
            'ubicacion' => 'Clinica melendres',
            'sector' => 'san aurelio',
            // 'espacio' => '',
            // 'tipo' => '',
        ]);

        Ticket::create([
            'ubicacion_id' => '6',
            'sector_id' => '6',
            // 'espacio_id' => '',
            'nota_venta_id' => '1',
            // 'fecha' => '',
            'precio' => '50',
            'clave' => 'asdfgarfas12fdsaf',
            'cliente' => 'darwin mamani',
            'evento' => 'concierto',
            'ubicacion' => 'Clinica melendres',
            'sector' => 'san aurelio',
            // 'espacio' => '',
            // 'tipo' => '',
        ]);

        Ticket::create([
            'ubicacion_id' => '7',
            'sector_id' => '7',
            'espacio_id' => '1',
            'nota_venta_id' => '1',
            // 'fecha' => '',
            'precio' => '200',
            'clave' => 'asdfgarfas12fdsaf',
            'cliente' => 'darwin mamani',
            'evento' => 'concierto',
            'ubicacion' => 'san aurelio',
            'sector' => 'san aurelio',
            'espacio' => 'a1',
            // 'tipo' => '',
        ]);

        Ticket::create([
            'ubicacion_id' => '7',
            'sector_id' => '7',
            'espacio_id' => '6',
            'nota_venta_id' => '1',
            // 'fecha' => '',
            'precio' => '800',
            'clave' => 'asdfgarfas12fdsaf',
            'cliente' => 'darwin mamani',
            'evento' => 'concierto',
            'ubicacion' => 'san aurelio',
            'sector' => 'san aurelio',
            'espacio' => 'a6',
            // 'tipo' => '',
        ]);


        Ticket::create([
            'ubicacion_id' => '7',
            'sector_id' => '8',
            'espacio_id' => '25',
            'nota_venta_id' => '1',
            // 'fecha' => '',
            'precio' => '100',
            'clave' => 'asdfgarfas12fdsaf',
            'cliente' => 'darwin mamani',
            'evento' => 'concierto',
            'ubicacion' => 'san aurelio',
            'sector' => 'san aurelio',
            'espacio' => 'a15',
            // 'tipo' => '',
        ]);




    }
}
