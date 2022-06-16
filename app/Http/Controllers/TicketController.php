<?php

namespace App\Http\Controllers;

use App\Models\Espacio;
use App\Models\Evento;
use App\Models\Fecha;
use App\Models\Imagen;
use App\Models\Sector;
use App\Models\Ticket;
use App\Models\Ubicacion;
use Illuminate\Http\Request;

class TicketController extends Controller
{

    public function crearEvento(Request $request)
    {
        // return $request;
        $ubicacion = Ubicacion::find($request['ubicacion_id']);
        $evento = Evento::where('id', $ubicacion->evento_id)->first();
        $fecha = Fecha::find($request['fecha_id']);
        $sector = Sector::find($request['sector_id']);
        if (!isset($request['tickets'])) { // No existe tickets
            $tickets = array();
        } else {
            $tickets = json_decode($request['tickets'], true);
            $t = [];
            $mensaje = [];
            if (isset($request['espacio_id'])) { //hay espacios
                $n = count($request['espacio_id']);
                $v = $request['espacio_id'];
                for ($i = 0; $i < $n; $i++) {
                    $espacio = Espacio::find($v[$i]);
                    $t = [];
                    $t['id'] = count($tickets);
                    $t['fecha']  = $fecha->fechaHora;
                    $t['clave']  = $this->generarCodigo(6);
                    $t['cliente']  = 'el autenticado';
                    $t['evento']  = $evento->titulo;
                    $t['ubicacion']  = $ubicacion->nombre;

                    $t['espacio_id']  = $espacio->id;
                    $t['precio']  = $espacio->precio;
                    $t['cantidad']  = 1;
                    $t['sector']  = $sector->nombre;
                    $t['espacio']  = $espacio->numero . '-' . $espacio->descripcion;
                    array_push($tickets, $t);
                    $mensaje['success'] = '!Exito, Se agrego a la lista';
                }//$request['cantidad'] <= cantidad
            } else if (isset($request['sector_id']) && $request['sector_id']) { //existe sector
                if ($request['cantidad'] > $sector->capacidad_disponible) {
                    $mensaje['error'] = '!Error, Stock insuficiente';
                } else {
                    $t['id'] = count($tickets);
                    $t['fecha']  = $fecha->fechaHora;
                    $t['clave']  = $this->generarCodigo(6);
                    $t['cliente']  = 'el autenticado';
                    $t['evento']  = $evento->titulo;
                    $t['ubicacion']  = $ubicacion->nombre;
    
                    $t['sector_id']  = $sector->id;
                    $t['precio']  = $sector->precio;
                    $t['cantidad']  = $request['cantidad'];
                    $t['sector']  = $sector->nombre;
                    $t['espacio']  = '';
                    array_push($tickets, $t);
                    $mensaje['success'] = '!Exito, Se agrego a la lista';
                }
                
            } else { //hay solo ubicacion
                if ($request['cantidad'] > $ubicacion->capacidad_disponible) {
                    $mensaje['error'] = '!Error, Stock insuficiente';
                } else {
                    $t['id'] = count($tickets);
                    $t['fecha']  = $fecha->fechaHora;
                    $t['clave']  = $this->generarCodigo(6);
                    $t['cliente']  = 'el autenticado';
                    $t['evento']  = $evento->titulo;
                    $t['ubicacion']  = $ubicacion->nombre;    
                    $t['ubicacion_id']  = $ubicacion->id;
                    $t['precio']  = $ubicacion->precio;
                    $t['cantidad']  = $request['cantidad'];
                    $t['sector']  = '';
                    $t['espacio']  = '';
                    array_push($tickets, $t);
                    $mensaje['success'] = '!Exito, Se agrego a la lista';
                }
            }
        }
        // return $tickets;
        $evento_id = $evento->id;
        $ubicaciones = Ubicacion::where('evento_id', $evento_id)->get();
        $imagenes = Imagen::where('evento_id', $evento_id)->get();
        return view('compras.tickets.createLista1', compact('imagenes', 'ubicaciones', 'tickets'), $mensaje);
    }

    // public function crearEvento2(Request $request)
    // {
    //     $evento_id = 1;
    //     $ubicaciones = Ubicacion::where('evento_id', $evento_id)->get();
    //     $tickets = array();
    //     return view('compras.tickets.createLista', compact('ubicaciones',  'tickets'));
    // }

    public function crearEvento1($evento_id, $tickets=array())
    {
        // $evento_id = 3;
        if(\Illuminate\Support\Facades\Auth::user()) {
            $ubicaciones = Ubicacion::where('evento_id', $evento_id)->get();
            $imagenes = Imagen::where('evento_id', $evento_id)->get();
            return view('compras.tickets.createLista1', compact('imagenes','ubicaciones',  'tickets'));
        }else{
            return redirect()->route('login');
        }
    }

    public function destroyEvento(Request $request, $id)
    {
        $tickets = json_decode($request['tickets'], true);
        unset($tickets[$id]);
        $evento_id = $request['evento_id'];
        $ubicaciones = Ubicacion::where('evento_id', $evento_id)->get();
        return view('compras.tickets.createLista1', compact('ubicaciones', 'tickets'));
    }

    public function index()
    {
        return "index";
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
        // dd($request);
        if (isset($request['tickets'])) {
            $tickets = json_decode($request['tickets'], true);
            $n = count($tickets);
            // Ticket::create($tickets[0]);

            for ($i = 0; $i < $n; $i++) {
                Ticket::create($tickets[$i]);
            }
        }
        return "exito";
    }

    public function show(Ticket $ticket)
    {
        //
    }

    public function edit(Ticket $ticket)
    {
        //
    }

    public function update(Request $request, Ticket $ticket)
    {
        //
    }

    public function destroy($id)
    {
        return "eliminar xd-" . $id;
    }

    //funcion que genera codigo
    public function generarCodigo($longitud)
    {
        $key = '';
        $pattern = '1234567890abcdefghijklmnopqrstuvwxyz';
        $max = strlen($pattern) - 1;
        for ($i = 0; $i < $longitud; $i++) {
            $key .= $pattern[mt_rand(0, $max)];
        }
        return $key;
    }
}
