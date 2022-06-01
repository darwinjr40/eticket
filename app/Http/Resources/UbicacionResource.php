<?php

namespace App\Http\Resources;

use App\Models\Sector;
use Illuminate\Http\Resources\Json\JsonResource;

class UbicacionResource extends JsonResource
{

    public function toArray($request)
    {
        return[
            'id' => $this->id,
            'evento_id' => $this->evento_id ,
            'nombre' => $this->nombre , 
            'direccion' => $this->direccion ,
            'telefono' => $this->telefono,
            'capacidad' => $this->capacidad ,
            'latitud' => $this->latitud ,
            'longitud' => $this->longitud,
            //es para que nos retorne las relaciones.
            'evento' => EventoResource::make($this->whenLoaded('evento')),
            'sectores' => SectorResource::collection($this->whenLoaded('sectores')),
            'fechas' => FechaResource::collection($this->whenLoaded('fechas')),
        ];
    }
}
