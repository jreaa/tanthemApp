<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CabecerasResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'titulo' => $this->titulo,
            'subtitulo' => $this->subtitulo,
            'description' => $this->description,
            'id' => $this->id,
            'img' => $this->img
        ];
    }
}
