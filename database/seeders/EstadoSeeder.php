<?php

namespace Database\Seeders;

use App\Models\Estado;
use Illuminate\Database\Seeder;

class EstadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $estados = [
            'inicio',
            'fin',
            'proceso',
            'preparacion'
        ];
        foreach($estados as $estado){
            Estado::create(['nombre'=>$estado]);
        }
    }
}
