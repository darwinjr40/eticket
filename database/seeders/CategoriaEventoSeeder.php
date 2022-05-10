<?php

namespace Database\Seeders;

use App\Models\categoriaEvento;
use Illuminate\Database\Seeder;

class CategoriaEventoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        categoriaEvento::create([
            'nombre' => 'Social' ,
            'descripcion' => 'para las confraternizaciones',            
        ]);

        categoriaEvento::create([
            'nombre' => 'Privado' ,
            'descripcion' => 'reuniones importantes',            
        ]);
    }
}
