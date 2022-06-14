<?php

namespace Database\Seeders;

use App\Models\Contacto;
use App\Models\Fecha;
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
        $this->call(NotaVentaSeeder::class);

        //crea 10 registros de fechas
        Fecha::factory(15)->create();
    }
}
