<?php

namespace Database\Seeders;

use App\Models\TipoPago;
use Illuminate\Database\Seeder;

class TipoPagoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TipoPago::create([
            'forma' => 'Tigo Money',
        ]);

        TipoPago::create([
            'forma' => 'Tarjeta Debito o Credito',
        ]);
    }
}
