<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\TicketResource;
use App\Http\Resources\UbicacionResource;
use App\Models\Ticket;
use App\Models\Ubicacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class UbicacionApiController extends Controller       
{
    public function __construct(){
        // $this->middleware('auth:api');
        // $this->middleware('auth:sanctum');
    }
    
    public function index()
    {
        $ubicacion = Ubicacion::included()
                    ->filter()
                    ->sort()
                    ->getOrPaginate();
        return UbicacionResource::collection($ubicacion);
    }

    public function store(Request $request)
    {
        $date = request()->validate(Ubicacion::$rules);
        $ubicacion = Ubicacion::create($request->all());
        return UbicacionResource::make($ubicacion);
    }


    public function show($id)
    {
        $ubicacion = Ubicacion::included()->findOrFail($id);
        return UbicacionResource::make($ubicacion);
    }

    public function update(Request $request,  $id)
    {
        $ubicacion = Ubicacion::findOrFail($id);
        request()->validate(Ubicacion::$rules);
        $ubicacion->update($request->all());
        $ubicacion->save();
        return UbicacionResource::make($ubicacion);
    }

    public function destroy($id)
    {
        $ubicacion = Ubicacion::findOrFail($id);
        $ubicacion->delete();
        return UbicacionResource::make($ubicacion);
    }

    public function correspondeTicket($ubicacion_id, $ticket_key)
    {
        try {
            $desencriptada = Crypt::decryptString($ticket_key);  
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Ticket no encontrado',
                'error' => 'Ocurrio un problema',
            ], 401);
        }

        $ticket = Ticket::where('clave', $desencriptada)->first();
        if (!$ticket) {
            return response()->json([
                'message' => 'Ticket no encontrado',
                'error' => 'Ocurrio un problema',
            ], 401);
        }
        
        $ubicacion = Ubicacion::where('id', $ubicacion_id)->first();
        if (!$ubicacion) {
            return response()->json([
                'message' => 'No existe la ubicacion',
                'error' => 'Ocurrio un problema',
            ], 401);
        }
        // $ubicacion = Ubicacion::findOrFail($ubicacion_id);
        // if ($ticket->espacio_id) {
        //     $ubicacion = $ticket->Espacio->Sector->Ubicacion->where('id', $ubicacion_id)->first();
        // } else if ($ticket->sector_id) {
        //     $ubicacion = $ticket->Sector->Ubicacion->where('id', $ubicacion_id)->first();
        // } else if ($ticket->ubicacion_id) {
        //     $ubicacion = $ticket->Ubicacion->where('id', $ubicacion_id)->first();
        // }
        
        if (!$ubicacion) {
            return response()->json([
                'message' => 'Ticket no corresponde a la ubicacion',
                'error' => 'Ocurrio un problema',
            ], 401);
        }

        return response()->json([
            'ticket' => TicketResource::make($ticket),
            'message' => 'Ticket encontrado',
            'success' => 'Exito, ',
        ], 200);
    }
}
