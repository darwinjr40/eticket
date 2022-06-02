<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TicketResource extends JsonResource
{
    
    public function toArray($request)
    {
        return[
            'id' => $this->id,
            'fecha' => $this->fecha,
            'precio' => $this->precio,
            'clave' => $this->clave,
            'cliente' => $this->cliente,
            'evento' => $this->evento,
            'ubicacion' => $this->ubicacion,
            'espacio' => $this->espacio,
            'tipo' => $this->tipo,
            //es para que nos retorne las relaciones.
            // 'ubicacion' => UbicacionResource::make($this->whenLoaded('ubicacion')),
            //  'procesosA' => ProcesoResource::collection($this->whenLoaded('procesosA')),            
        ];
    }
}
