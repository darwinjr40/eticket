<?php

namespace Database\Seeders;

use App\Models\Contacto;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //
        // \App\Models\User::factory(10)->create();
        $this->call(UserSeeder::class);
        $this->call(ContactoSeeder::class);
        $this->call(CategoriaEventoSeeder::class);
        $this->call(EventoSeeder::class);
        $this->call(UbicacionSeeder::class);
    }
}
