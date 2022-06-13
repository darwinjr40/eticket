<?php

namespace App\Http\Controllers;

use App\Models\Fecha;
use App\Models\Ticket;
use App\Models\Ubicacion;
use Illuminate\Http\Request;

class TicketController extends Controller
{
 
    public function crearEvento(Request $request)
    {
        return $request;
        $ubicacion = Ubicacion::find($request['ubicacion_id']);
        $fecha = Fecha::find($request['fecha_id']);
        $request['fecha_id'] = $fecha['id'];
        $request['fecha'] = $fecha['fechaHora'];
        $request['ubicacion_id'] = $ubicacion['id'];
        $request['ubicacion'] = $ubicacion['nombre'];        
        if (isset($request['tickets'])) {             
            $tickets = json_decode($request['tickets'], true);              
            $t = [
                "id" => count($tickets),
                "fecha" => $request['fecha'],
                "precio" => '10',
                "clave" => "",
                "cliente" => "",
                "evento" => "",
                "ubicacion" => $request['ubicacion'],
                "tipo" => "",
                "espacio" => "",
                "cantidad" => $request['cantidad'],
                "ubicacion_id" => $request['ubicacion_id'],
                "sector_id" => $request['sector_id'],
                "espacio_id" => $request['espacio_id'],
            ];
            array_push($tickets, $t);        
        } else {
            $tickets = array();
        }    
        // return $tickets;
        $evento_id = 1;
        $ubicaciones = Ubicacion::where('evento_id', $evento_id)->get();
        return view('compras.tickets.createLista', compact('ubicaciones', 'tickets'));
    }

    public function crearEvento2(Request $request)
    {
        $evento_id = 1;
        $ubicaciones = Ubicacion::where('evento_id', $evento_id)->get();         
        $tickets = array();
        return view('compras.tickets.createLista', compact('ubicaciones',  'tickets'));

    }

    public function crearEvento1(Request $request)
    {
        $evento_id = 3;
        $ubicaciones = Ubicacion::where('evento_id', $evento_id)->get();         
        $tickets = array();
        return view('compras.tickets.createLista1', compact('ubicaciones',  'tickets'));

    }

    public function destroyEvento(Request $request, $id)
    {
        $tickets = json_decode($request['tickets'], true);  
        unset($tickets[$id]);
        $evento_id = 1;
        $ubicaciones = Ubicacion::where('evento_id', $evento_id)->get();
        return view('compras.tickets.createLista', compact('ubicaciones', 'tickets'));
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

            for($i=0; $i < $n ; $i++) { 
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
        return "eliminar xd-".$id;
    }



    


}
