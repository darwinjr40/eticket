<?php

namespace Database\Seeders;

use App\Models\Evento;
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
            'estado'=> 'desactivado',
            'id_categoria' => '1',
            'id_contacto' => '1'
        ]);

        Evento::create([
            'titulo'=> 'Conferencia',
            'descripcion'=> 'Publico',
            'estado'=> 'desactivado',
            'id_categoria' => '2',
            'id_contacto' => '2'
        ]);
    }
}
