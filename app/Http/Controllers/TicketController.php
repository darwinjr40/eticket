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
        // return $a;
        $ubicacion = Ubicacion::find($request['ubicacion_id']);
        $fecha = Fecha::find($request['fecha_id']);
        $request['fecha_id'] = $fecha['id'];
        $request['fecha'] = $fecha['fechaHora'];
        $request['ubicacion_id'] = $ubicacion['id'];
        $request['ubicacion'] = $ubicacion['nombre'];
        $t = [
            "id" => 1,
            "fecha" => $request['fecha'],
            "precio" => "",
            "clave" => "",
            "cliente" => "",
            "evento" => "",
            "ubicacion" => $request['ubicacion'],
            "tipo" => "",
            "espacio" => "",
            "cantidad" => $request['cantidad'],
        ];
        if (!$request['tickets']) { //crear
            $tickets = [ $t];
            //   return $tickets;
        } else {
            $tickets = json_decode($request['tickets'], true);            
            array_push($tickets, $t);
        }
        // return $tickets;

        $evento_id = 1;
        $ubicaciones = Ubicacion::where('evento_id', $evento_id)->get();
        return view('compras.tickets.createLista', compact('ubicaciones', 'tickets'));
    }

    public function crearEvento1(Request $request)
    {
        $evento_id = 1;
        $ubicaciones = Ubicacion::where('evento_id', $evento_id)->get();        
        $tickets = [];
        return view('compras.tickets.createLista', compact('ubicaciones',  'tickets'));
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
        dd($request);
        return redirect()->route('tickets.addEvento');
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
