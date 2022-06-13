<?php

namespace Database\Seeders;

use App\Models\Evento;
use App\Models\Imagen;
use App\Models\Sector;
use Illuminate\Database\Seeder;

class EventoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Evento::create([
            'titulo'=> 'Conferencias Uagrm',
            'descripcion'=> 'Publico',
            'estado'=> 'inicio',
            'id_categoria' => '1',
            'id_contacto' => '1'
        ]);

        Evento::create([
            'titulo'=> 'Conferencia',
            'descripcion'=> 'Publico',
            'estado'=> 'inicio',
            'id_categoria' => '2',
            'id_contacto' => '2'
        ]);

        Evento::create([
            'titulo'=> 'Concierto',
            'descripcion'=> 'Rock',
            'estado'=> 'inicio',
            'id_categoria' => '2',
            'id_contacto' => '2'
        ]);

        Imagen::create([
            'evento_id' => 1,
            'path' => 'https://s3service12.s3.amazonaws.com/1/1CguGn7CyUSS7frwteOB37yTiLtCUq6zWwlcCdTX.jpg',
            'pathPrivate' => '1/1CguGn7CyUSS7frwteOB37yTiLtCUq6zWwlcCdTX.jpg'
        ]);

        Imagen::create([
            'evento_id' => 2,
            'path' => 'https://s3service12.s3.amazonaws.com/1/YR8QNIrE2rOq0aN320ctis4ZftrXv5guAW3acc9A.jpg',
            'pathPrivate' => '1/YR8QNIrE2rOq0aN320ctis4ZftrXv5guAW3acc9A.jpg'
        ]);

        Imagen::create([
            'evento_id' => 3,
            'path' => 'https://s3service12.s3.amazonaws.com/1/QEybepluhsVHUFsNReE5k3X7zFU8nfp5Bau0ViHQ.webp',
            'pathPrivate' => '1/QEybepluhsVHUFsNReE5k3X7zFU8nfp5Bau0ViHQ.webp'
        ]);


        
    }
}
