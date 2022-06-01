<?php

namespace App\Http\Resources;

use App\Models\Ubicacion;
use Illuminate\Http\Resources\Json\JsonResource;

class SectorResource extends JsonResource
{
   
    public function toArray($request)
    {
        return[
            'id' => $this->id,
            'nombre' => $this->nombre,
            'capacidad' => $this->capacidad,
            'referencia' => $this->referencia,
            'id_ubicacion' => $this->id_ubicacion,
            //es para que nos retorne las relaciones.
            'ubicacion' => UbicacionResource::make($this->whenLoaded('ubicacion')),
            //  'procesosA' => ProcesoResource::collection($this->whenLoaded('procesosA')),            
        ];
    }
}
