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
            //PERMISOS PARA ADMINISTRADOR
            //Rol
        /*1*/   'acceso-rol',
            //permiso
        /*2*/   'acceso-permisos',
            //rol permiso
        /*3*/   'acceso-rol-permisos',
            //users
        /*4*/   'ver-users',
        /*5*/   'crear-users',
        /*6*/   'editar-users',
        /*7*/   'borrar-users',
            //clientes
        /*8*/    'ver-clientes',
        /*9*/    'crear-cliente',
        /*10*/    'editar-cliente',
        /*11*/    'borrar-cliente',
            //Contactos
        /*12*/    'ver-contactos',
        /*13*/    'crear-contactos',
        /*14*/    'editar-contactos',
        /*15*/    'borrar-contactos',
            //Categoria de Eventos
        /*16*/    'ver-categoriaEventos',
        /*17*/    'crear-categoriaEventos',
        /*18*/    'editar-categoriaEventos',
        /*19*/    'borrar-categoriaEventos',
            //Evento
        /*20*/    'ver-evento',
        /*21*/    'crear-evento',
        /*22*/    'editar-evento',
        /*23*/    'borrar-evento',
            //Ubicacion
        /*24*/    'ver-ubicacion',
        /*25*/    'crear-ubicacion',
        /*26*/    'editar-ubicacion',
        /*27*/    'borrar-ubicacion',
            //Fecha
        /*28*/    'ver-fecha',
        /*29*/    'crear-fecha',
        /*30*/    'editar-fecha',
        /*31*/    'borrar-fecha',
            //Imagenes
        /*32*/    'ver-imagenes',
        /*33*/    'crear-imagenes',
        /*34*/    'editar-imagenes',
        /*35*/    'borrar-imagenes',
            //Sector
        /*36*/    'ver-sector',
        /*37*/    'crear-sector',
        /*38*/    'editar-sector',
        /*39*/    'borrar-sector',
            //Espacio
        /*40*/    'ver-espacio',
        /*41*/    'crear-espacio',
        /*42*/    'editar-espacio',
        /*43*/    'borrar-espacio',
            //Ticket
        /*44*/    'ver-ticket',
        /*45*/    'crear-ticket',
        /*46*/    'editar-ticket',
        /*47*/    'borrar-ticket',
            //Tipo de Pago
        /*48*/    'ver-tipoPago',
        /*49*/    'crear-tipoPago',
        /*50*/    'editar-tipoPago',
        /*51*/    'borrar-tipoPago',
            //Datos de Pago
        /*52*/    'ver-datosPago',
        /*53*/    'crear-datosPago',
            //Nota de Venta
        /*54*/    'ver-notaVenta',
        /*55*/    'crear-notaVenta',
        /*56*/    'editar-notaVenta',
        /*57*/    'borrar-notaVenta',
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
            //Permisos para el rol Administrador
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
                'rol_id' => 1,
                'permission_id' => 5
            ],
            [
                'rol_id' => 1,
                'permission_id' => 6
            ],
            [
                'rol_id' => 1,
                'permission_id' => 7
            ],
            [
                'rol_id' => 1,
                'permission_id' => 8
            ],
            [
                'rol_id' => 1,
                'permission_id' => 10
            ],
            [
                'rol_id' => 1,
                'permission_id' => 11
            ],
            [
                'rol_id' => 1,
                'permission_id' => 12
            ],
            [
                'rol_id' => 1,
                'permission_id' => 13
            ],
            [
                'rol_id' => 1,
                'permission_id' => 14
            ],
            [
                'rol_id' => 1,
                'permission_id' => 15
            ],
            [
                'rol_id' => 1,
                'permission_id' => 16
            ],
            [
                'rol_id' => 1,
                'permission_id' => 17
            ],
            [
                'rol_id' => 1,
                'permission_id' => 18
            ],
            [
                'rol_id' => 1,
                'permission_id' => 19
            ],
            [
                'rol_id' => 1,
                'permission_id' => 20
            ],
            [
                'rol_id' => 1,
                'permission_id' => 21
            ],
            [
                'rol_id' => 1,
                'permission_id' => 22
            ],
            [
                'rol_id' => 1,
                'permission_id' => 23
            ],
            [
                'rol_id' => 1,
                'permission_id' => 24
            ],
            [
                'rol_id' => 1,
                'permission_id' => 25
            ],
            [
                'rol_id' => 1,
                'permission_id' => 26
            ],
            [
                'rol_id' => 1,
                'permission_id' => 27
            ],
            [
                'rol_id' => 1,
                'permission_id' => 28
            ],
            [
                'rol_id' => 1,
                'permission_id' => 29
            ],
            [
                'rol_id' => 1,
                'permission_id' => 30
            ],
            [
                'rol_id' => 1,
                'permission_id' => 31
            ],
            [
                'rol_id' => 1,
                'permission_id' => 32
            ],
            [
                'rol_id' => 1,
                'permission_id' => 33
            ],
            [
                'rol_id' => 1,
                'permission_id' => 34
            ],
            [
                'rol_id' => 1,
                'permission_id' => 35
            ],
            [
                'rol_id' => 1,
                'permission_id' => 36
            ],
            [
                'rol_id' => 1,
                'permission_id' => 37
            ],
            [
                'rol_id' => 1,
                'permission_id' => 38
            ],
            [
                'rol_id' => 1,
                'permission_id' => 39
            ],
            [
                'rol_id' => 1,
                'permission_id' => 40
            ],
            [
                'rol_id' => 1,
                'permission_id' => 41
            ],
            [
                'rol_id' => 1,
                'permission_id' => 42
            ],
            [
                'rol_id' => 1,
                'permission_id' => 48
            ],
            [
                'rol_id' => 1,
                'permission_id' => 49
            ],
            [
                'rol_id' => 1,
                'permission_id' => 50
            ],
            [
                'rol_id' => 1,
                'permission_id' => 51
            ],
            [
                'rol_id' => 1,
                'permission_id' => 52
            ],
            //Permisos para el rol Cliente
            [
                'rol_id' => 2,
                'permission_id' => 9
            ],
            [
                'rol_id' => 2,
                'permission_id' => 44
            ],
            [
                'rol_id' => 2,
                'permission_id' => 45
            ],
            [
                'rol_id' => 2,
                'permission_id' => 46
            ],
            [
                'rol_id' => 2,
                'permission_id' => 47
            ],
            [
                'rol_id' => 2,
                'permission_id' => 53
            ],
        ];

        rolPermiso::insert($rolPer);
    }
}
