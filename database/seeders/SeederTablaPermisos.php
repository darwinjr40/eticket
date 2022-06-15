<?php

namespace Database\Seeders;

use App\Models\rol;
use App\Models\rolPermiso;
use Illuminate\Database\Seeder;
use App\Models\permiso;

class SeederTablaPermisos extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permisos = [
            //Roles
            'ver-rol',
            'crear-rol',
            'editar-rol',
            'borrar-rol',

            //Categoria de Eventos
            'ver-categoriaEvento',
            'crear-categoriaEvento',
            'editar-categoriaEvento',
            'borrar-categoriaEvento',


            'ver-cliente'
        ];
        foreach($permisos as $permiso){
            permiso::create(['name'=>$permiso]);
        }
        $roles = [
            //Administrador
            'Administrador',
            //Cliente
            'Cliente'
        ];
        foreach($roles as $rol){
            rol::create(['name'=>$rol]);
        }
        $rolPer = [
            [
                'rol_id' => 1,
                'permission_id' => 1
            ],
            [
                'rol_id' => 1,
                'permission_id' => 2
            ],
            [
                'rol_id' => 1,
                'permission_id' => 3
            ],
            [
                'rol_id' => 1,
                'permission_id' => 4
            ],
            [
                'rol_id' => 2,
                'permission_id' => 5
            ],
        ];

        rolPermiso::insert($rolPer);
    }
}
