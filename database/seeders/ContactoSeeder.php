<?php

namespace Database\Seeders;

use App\Models\Contacto;
use Illuminate\Database\Seeder;

class ContactoSeeder extends Seeder
{
    
    public function run()
    {
        Contacto::create([
            'nombre' => 'Arnol' ,
            'numero' => '12345678',
            'email' => 'arnol@gmail.com'
        ]);
    }
}
