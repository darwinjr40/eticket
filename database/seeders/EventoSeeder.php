<?php

namespace Database\Seeders;

use App\Models\Evento;
use App\Models\Imagen;
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

        Imagen::create([
            'evento_id' => 1,
            'path' => 'https://s3service12.s3.amazonaws.com/1/9lvjsF3l6vyiomAF5dGhEiwPVJdSTwwlMsXPy0MV.webp',
            'pathPrivate' => '1/9lvjsF3l6vyiomAF5dGhEiwPVJdSTwwlMsXPy0MV.webp'
        ]);

        Imagen::create([
            'evento_id' => 1,
            'path' => 'https://s3service12.s3.amazonaws.com/1/MY1otzR04PnNrVao73CgDQRc47BgWftCPtrv9Wgc.png',
            'pathPrivate' => '1/MY1otzR04PnNrVao73CgDQRc47BgWftCPtrv9Wgc.png'
        ]);
    }
}
