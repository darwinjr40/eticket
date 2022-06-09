<?php

namespace Database\Seeders;

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
            'precio' => '0',
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
            'precio' => '0',
            'latitud' => '-17.770478430611302',
            'longitud' => '-63.18252361111451',
            'evento_id' => '1',
        ]);

        Ubicacion::create([
            'nombre' => 'Clinica melendres1010',
            'direccion' => 'doble via la guardia entre 2do y 3er anillo',
            'telefono' => '87946132',
            'capacidad' => '200',
            'capacidad_disponible' => '200',
            'precio' => '0',
            'latitud' => '-17.80293471806719',
            'longitud' => '-63.198996300471464',
            'evento_id' => '1',
        ]);

        Ubicacion::create([
            'nombre' => 'san aurelio',
            'direccion' => '4to anillo',
            'telefono' => '74128536',
            'capacidad' => '1000',
            'capacidad_disponible' => '1000',
            'precio' => '0',
            'latitud' => '-17.810912457723425',
            'longitud' => '-63.16035783581544',
            'evento_id' => '2',
        ]);

        Ubicacion::create([
            'nombre' => 'transito',
            'direccion' => 'santos dumont 3er anillo',
            'telefono' => '74196325',
            'capacidad' => '50',
            'capacidad_disponible' => '50',
            'precio' => '0',
            'latitud' => '-17.813935958226825',
            'longitud' => '-63.18258798413087',
            'evento_id' => '1',
        ]);
    }
}
