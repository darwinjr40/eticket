<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FechaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return[
            'id' => $this->id,
            'fechaHora' => $this->fechaHora,
            'id_ubicacion' => $this->id_ubicacion,
            //es para que nos retorne las relaciones.
            'ubicacion' => UbicacionResource::make($this->whenLoaded('ubicacion')),           
        ];
        
    }
}
