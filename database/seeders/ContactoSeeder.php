<?php

namespace Database\Seeders;

use App\Models\Contacto;
use Illuminate\Database\Seeder;

class ContactoSeeder extends Seeder
{
    
    public function run()
    {
        Contacto::create([
            'nombre' => 'Erwin' ,
            'numero' => '75412586',
            'email' => 'erwin@gmail.com'
        ]);


        Contacto::create([
            'nombre' => 'Carlos' ,
            'numero' => '74125863',
            'email' => 'carlos@gmail.com'
        ]);
    }
}
