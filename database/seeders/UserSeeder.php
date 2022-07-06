<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'=> 'darwin',
            'email'=> 'darwinjr40@gmail.com',
            'password'=> Hash::make('00000000'),
            'rol_id'=> 1
        ]);

        User::create([
            'name'=> 'stephani heredia',
            'email'=> 'stephani.hc.97@gmail.com',
            'password'=> Hash::make('123456789'),
            'rol_id'=> 1
        ]);
        //empleado
        User::create([
            'name'=> 'alejandro chumacero',
            'email'=> 'chumacero@gmail.com',
            'password'=> Hash::make('00000000'),
            'rol_id'=> 3
        ]);


    }
}
