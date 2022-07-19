<?php

namespace Database\Seeders;

use App\Models\EventoUser;
use Illuminate\Database\Seeder;

class EventoUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        EventoUser::create([
            'user_id' => 3, 
            'evento_id' => 1,
            'fecha' => now()->format("Y-m-d H:i:s"),
        ]);
        EventoUser::create([
            'user_id' => 3, 
            'evento_id' => 2,
            'fecha' => now()->format("Y-m-d H:i:s"),
        ]);
        EventoUser::create([
            'user_id' => 4, 
            'evento_id' => 2,
            'fecha' => now()->format("Y-m-d H:i:s"),
        ]);
        EventoUser::create([
            'user_id' => 4, 
            'evento_id' => 3,
            'fecha' => now()->format("Y-m-d H:i:s"),
        ]);
    }
}
