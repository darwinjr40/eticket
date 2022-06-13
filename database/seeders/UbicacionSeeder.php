<?php

namespace Database\Seeders;

use App\Models\Espacio;
use App\Models\Sector;
use App\Models\Ubicacion;
use Illuminate\Database\Seeder;

class UbicacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Ubicacion::create([
            'nombre' => 'Mercado Ramada',
            'direccion' => 'Doble via la guardia. Entre 1er y 2do anillo',
            'telefono' => '74136985',
            'capacidad' => '500',
            'capacidad_disponible' => '500',
            'precio' => '100',
            'latitud' => '-17.79587591028036',
            'longitud' => '-63.19108522229005',
            'evento_id' => '1',
        ]);

        Ubicacion::create([
            'nombre' => 'Cristo redentor',
            'direccion' => '2do anillo norte',
            'telefono' => '72182712',
            'capacidad' => '1000',
            'capacidad_disponible' => '1000',
            'precio' => '200',
            'latitud' => '-17.770478430611302',
            'longitud' => '-63.18252361111451',
            'evento_id' => '1',
        ]);

        Ubicacion::create([
            'nombre' => 'transito',
            'direccion' => 'santos dumont 3er anillo',
            'telefono' => '74196325',
            'capacidad' => 50,
            'capacidad_disponible' => 50,
            'precio' => 300,
            'latitud' => '-17.813935958226825',
            'longitud' => '-63.18258798413087',
            'evento_id' => '1',
        ]);


        //---------------------------------------------------------------
        Ubicacion::create([
            'nombre' => 'Clinica melendres',
            'direccion' => 'doble via la guardia entre 2do y 3er anillo',
            'telefono' => '87946132',
            'capacidad' => '200',
            'capacidad_disponible' => '200',
            'precio' => '0',
            'latitud' => '-17.80293471806719',
            'longitud' => '-63.198996300471464',
            'evento_id' => '2',
        ]);

        Sector::create([
            'nombre' => 'vip',
            'capacidad' => 50,
            'capacidad_disponible' => 50,
            'precio' => 200,
            'referencia' => '1do piso N.15',
            'id_ubicacion' => 4
        ]);

        Sector::create([
            'nombre' => 'general',
            'capacidad' => 150,
            'capacidad_disponible' => 150,
            'precio' => 50,
            'referencia' => '2do piso N.16',
            'id_ubicacion' => 4
        ]);
        //---------------------------------------------------------------
        Ubicacion::create([
            'nombre' => 'san aurelio',
            'direccion' => '4to anillo',
            'telefono' => '74128536',
            'capacidad' => '300',
            'capacidad_disponible' => '300',
            'precio' => '0',
            'latitud' => '-17.810912457723425',
            'longitud' => '-63.16035783581544',
            'evento_id' => '2',
        ]);


        Sector::create([
            'nombre' => 'vip ultra',
            'capacidad' => 100,
            'capacidad_disponible' => 100,
            'precio' => 250,
            'referencia' => '1do piso N.15',
            'id_ubicacion' => 5
        ]);

        Sector::create([
            'nombre' => 'vip simple',
            'capacidad' => 200,
            'capacidad_disponible' => 200,
            'precio' => 100,
            'referencia' => '2do piso N.16',
            'id_ubicacion' => 5
        ]);

        //Ubicaciones sectores y espacio---------------------------------------------------------------

        //---------------------------------------------------------------
        Ubicacion::create([
            'nombre' => 'Clinica melendres',
            'direccion' => 'doble via la guardia entre 2do y 3er anillo',
            'telefono' => '87946132',
            'capacidad' => '200',
            'capacidad_disponible' => '200',
            'precio' => '0',
            'latitud' => '-17.80293471806719',
            'longitud' => '-63.198996300471464',
            'evento_id' => '2',
        ]);

        Sector::create([
            'nombre' => 'vip',
            'capacidad' => 50,
            'capacidad_disponible' => 50,
            'precio' => 200,
            'referencia' => '1do piso N.15',
            'id_ubicacion' => 6
        ]);



        Sector::create([
            'nombre' => 'general',
            'capacidad' => 150,
            'capacidad_disponible' => 150,
            'precio' => 50,
            'referencia' => '2do piso N.16',
            'id_ubicacion' => 6
        ]);
        //---------------------------------------------------------------
        Ubicacion::create([
            'nombre' => 'san aurelio',
            'direccion' => '4to anillo',
            'telefono' => '74128536',
            'capacidad' => '300',
            'capacidad_disponible' => '300',
            'precio' => '0',
            'latitud' => '-17.810912457723425',
            'longitud' => '-63.16035783581544',
            'evento_id' => '3',
        ]);


        Sector::create([
            'nombre' => 'vip ultra',
            'capacidad' => 100,
            'capacidad_disponible' => 100,
            'precio' => 0,
            'referencia' => '1do piso N.15',
            'id_ubicacion' => 7
        ]);

        for ($i=1; $i <= 5 ; $i++) { 
            Espacio::create([
                'numero' => 'a'.$i,
                'descripcion' => 'silla',
                'capacidad' => 1,
                'estado' => 'disponible',
                'precio' => 200,
                'id_sector' => 7,     
            ]);
        }

        for ($i=1; $i <= 5 ; $i++) { 
            Espacio::create([
                'numero' => 'a'.($i+5),
                'descripcion' => 'mesa',
                'capacidad' => 5,
                'estado' => 'disponible',
                'precio' => 800,
                'id_sector' => 7,     
            ]);
        }

        Sector::create([
            'nombre' => 'vip simple',
            'capacidad' => 200,
            'capacidad_disponible' => 200,
            'precio' => 0,
            'referencia' => '2do piso N.16',
            'id_ubicacion' => 7
        ]);

        for ($i=1; $i <= 20 ; $i++) { 
            Espacio::create([
                'numero' => 'a'.$i,
                'descripcion' => 'silla',
                'capacidad' => 1,
                'estado' => 'disponible',
                'precio' => 100,
                'id_sector' => 8,     
            ]);
        }

        //---------------------------------------------------------------


        //---------------------------------------------------------------

    }
}
