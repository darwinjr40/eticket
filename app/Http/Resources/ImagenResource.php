<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ImagenResource extends JsonResource
{
    public function toArray($request)
    {
        return[
            'id' => $this->id,
            'path' => $this->path,
            'pathPrivate' => $this->pathPrivate,
            'evento_id' => $this->evento_id,
            //es para que nos retorne las relaciones.
            'evento' => EventoResource::make($this->whenLoaded('evento')),              
        ];
    }
}
