<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\EventoResource;
use App\Models\Evento;
use Illuminate\Http\Request;

class EventoApiController extends Controller
{

    public function index()
    {
        $evento = Evento::included()
                    ->filter()
                    ->sort()
                    ->getOrPaginate();
        return EventoResource::collection($evento);
    }

    public function store(Request $request)
    {
        request()->validate(Evento::$rules);
        $evento = Evento::create($request->all());
        return EventoResource::make($evento);
    }


    public function show($id)
    {
        $evento = Evento::included()->findOrFail($id);
        return EventoResource::make($evento);
    }

    public function update(Request $request,  $id)
    {
        $evento = Evento::findOrFail($id);
        request()->validate(Evento::$rules);
        $evento->update($request->all());
        $evento->save();
        return EventoResource::make($evento);
    }

    public function destroy($id)
    {
        $evento = Evento::findOrFail($id);
        $evento -> delete();
        return EventoResource::make($evento);
    }
    
    public function UbicacionesDisponibles($id)
    {       
        $evento = Evento::find($id);
        if ($evento) {
            return response([
                'message' => 'Se encontraron ubicaciones',
                'success' => 'Exito',
                'ubicaciones' => $evento->ubicacionesDisponibles,
            ], 200);
        }
        return response([
            'message' => '!No Existe la Ubicacion',
            'error' => 'Ocurrio un problema'
        ], 400);    
    }
}
