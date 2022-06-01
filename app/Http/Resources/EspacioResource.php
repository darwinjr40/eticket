<?php

namespace App\Http\Resources;

use App\Models\Sector;
use Illuminate\Http\Resources\Json\JsonResource;

class EspacioResource extends JsonResource
{
    
    public function toArray($request)
    {
        return[
            'id' => $this->id,
            'numero' => $this->numero,
            'descripcion' => $this->descripcion,
            'capacidad' => $this->capacidad,
            'id_sector' => $this->id_sector,
            //es para que nos retorne las relaciones.
            'sector' => SectorResource::make($this->whenLoaded('sector')),              
        ];
    }
}
