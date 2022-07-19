<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TicketResource extends JsonResource
{
    
    public function toArray($request)
    {
        return[
            'id' => $this->id,
            'fecha_compra' => $this->created_at->format("Y-m-d H:i:s"),
            'fecha_lectura' => (!$this->fecha_lectura)? null : $this->fecha_lectura->format("Y-m-d H:i:s"),
            'precio' => $this->precio,
            // 'clave' => $this->clave,
            'cliente' => $this->cliente,
            'evento' => $this->evento,
            'ubicacion' => $this->ubicacion,
            'sector' => $this->sector,
            'espacio' => $this->espacio,
            'tipo' => $this->tipo,
            //es para que nos retorne las relaciones.
            // 'ubicacion' => UbicacionResource::make($this->whenLoaded('ubicacion')),
            //  'procesosA' => ProcesoResource::collection($this->whenLoaded('procesosA')),            
        ];
    }
}
